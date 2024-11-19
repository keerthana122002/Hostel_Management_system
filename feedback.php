<?php
// Step 1: Database connection
$servername = "localhost"; // Your database server
$username = "root"; // Your database username
$password = "root"; // Your database password
$dbname = "hostel_management"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Step 3: Prepare and bind
$stmt = $conn->prepare("INSERT INTO feedback (name, email, message) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);

// Step 4: Execute the statement
if ($stmt->execute()) {
    // Redirect to a thank-you page after successful submission
    header("Location: thankyou.html"); // Ensure this file exists
    exit();
} else {
    echo "Error: " . $stmt->error; // Show error message if something goes wrong
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
