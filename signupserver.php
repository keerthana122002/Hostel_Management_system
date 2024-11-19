<?php
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
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO signup (username, gender, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $gender, $email, $hashedPassword);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Signup successful! You can now log in.'); window.location.href = 'user_login.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); error in signup</script>";
    }

    $stmt->close();
}
$conn->close();
?>
