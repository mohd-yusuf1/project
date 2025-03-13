<?php
session_start();
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}


// Assuming you are using MySQL with PDO to insert the data into the database
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'order_management';

$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Sanitize input data to prevent SQL injection and other issues
    $current_date_time = htmlspecialchars($_POST['current_date_time']);
    $client_id = htmlspecialchars($_POST['client_id']);
    $client_name = htmlspecialchars($_POST['client_name']);
    $address = htmlspecialchars($_POST['address']);
    $city = htmlspecialchars($_POST['city']);
    $state = htmlspecialchars($_POST['state']);
    $phone_no = htmlspecialchars($_POST['phone_no']);
    $whatsapp_no = htmlspecialchars($_POST['whatsapp_no']);
    $alt_no = htmlspecialchars($_POST['alt_no']);
    $email = htmlspecialchars($_POST['email']);
    $sale_person = htmlspecialchars($_POST['sale_person']);
    
    include "db.php";
    
    try {
        // Create a PDO instance
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // SQL query to insert data into the database
        $sql = "INSERT INTO client_info (client_id, user_id, current_date_time, client_name, email, phone_no, alt_no, whatsapp_no, city, state, address, sale_person) 
                VALUES (:client_id, :user_id, :current_date_time, :client_name, :email, :phone_no, :alt_no, :whatsapp_no, :city, :state, :address,:sale_person)";
        
        // Prepare statement
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':current_date_time', $current_date_time);
        $stmt->bindParam(':client_id', $client_id);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':client_name', $client_name);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':state', $state);
        $stmt->bindParam(':phone_no', $phone_no);
        $stmt->bindParam(':whatsapp_no', $whatsapp_no);
        $stmt->bindParam(':alt_no', $alt_no);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':sale_person', $sale_person);
        
        // Execute the statement
        if ($stmt->execute()) {
            // Redirect to another page with a success message after 2 seconds
            echo "<script>alert('Customer information submitted successfully.'); window.location.href='order_form.php';</script>";
            exit();
        } else {
            echo "Error: Unable to submit the information.";
        }
        
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Error: " . $e->getMessage();
    }
}
?>
