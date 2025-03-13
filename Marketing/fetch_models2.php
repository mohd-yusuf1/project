<?php
// Database connection for second database
$conn2 = new mysqli("localhost", "root", "", "customer_info");

if ($conn2->connect_error) {
    die("Connection failed to Database2: " . $conn2->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product'];

    // Prepare and execute a query to get models based on the selected product
    $stmt = $conn2->prepare("
        SELECT model_number 
        FROM models 
        JOIN products ON models.product_id = products.id 
        WHERE products.name = ?
    ");
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $result = $stmt->get_result();

    // Generate options for the model select dropdown
    if ($result->num_rows > 0) {
        echo "<option value='' disabled selected>Select or Type Model</option>";
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . htmlspecialchars($row['model_number']) . "'>" . htmlspecialchars($row['model_number']) . "</option>";
        }
    } else {
        // If no models are found, show an empty option
        echo "<option value='' disabled>No Models Found</option>";
    }

    $stmt->close();
}
?>
