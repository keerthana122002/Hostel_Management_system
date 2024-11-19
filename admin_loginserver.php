<?php
session_start();
$servername = "localhost"; // Database server
$username = "root"; // Database username
$password = "root"; // Database password
$dbname = "hostel_management"; // Database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind
    $stmt = $conn->prepare("SELECT password FROM admin_signup WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User exists, verify password
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        if (password_verify($password, $hashedPassword)) {
            // Login successful
            echo "<script>alert('Login successful!'); window.location.href = 'admin.html';</script>";
        } else {
            // Invalid password
            echo "<script>alert('Invalid password. Please try again or sign up.');window.location.href = 'right.html'</script>";
        }
    } else {
        // User does not exist
        echo "<script>alert('Invalid user. Please sign up.');window.location.href = 'right.html'</script>";
    }

    $stmt->close();
}
$conn->close();
?>
