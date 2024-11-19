<?php
$servername = "localhost"; // Change if your server is different
$username = "root"; // Default username for phpMyAdmin
$password = "root"; // Default password (leave empty if you didn't set any)
$dbname = "hostel_management"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
