<?php
include 'db.php'; // Include your DB connection

// Assuming POST data received from a form or API
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$user_id = $_POST['user_id']; // Get the user ID

// Insert payment details into the database
$sql = "INSERT INTO payments (user_id, amount, payment_method, status) VALUES ('$user_id', '$amount', '$payment_method', 'Pending')";

if ($conn->query($sql) === TRUE) {
    echo "Payment record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
