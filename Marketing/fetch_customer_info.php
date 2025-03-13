<?php
// fetch_customer_suggestions.php
include "db.php";
// Database connection settings


// Get the query from the URL parameter
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Sanitize the input
$query = $conn->real_escape_string($query);

// Prepare the SQL query to search for customers by name
$sql = "SELECT client_id, client_name, email, phone_no, alt_no, whatsapp_no, city, state, address, sale_person
        FROM client_info 
        WHERE client_name LIKE '%$query%' LIMIT 10";  // Limit to 10 results
$result = $conn->query($sql);

// Prepare the response
$response = ['suggestions' => []];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['suggestions'][] = $row;
    }
}

// Close the connection
$conn->close();

// Return the suggestions as JSON
echo json_encode($response);
?>
