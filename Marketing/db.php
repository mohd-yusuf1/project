<?php
$servername = "localhost"; // Change if using a remote server
$username = "root"; // Database username
$password = ""; // Database password (keep empty if using XAMPP)
$dbname = "order_management"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character encoding to support special characters
$conn->set_charset("utf8");

?>
