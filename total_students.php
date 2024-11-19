<?php
include 'db.php'; // Include the database connection

$sql = "SELECT COUNT(*) as total_students FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>Total Students Registered: " . $row['total_students'] . "</h3>";
} else {
    echo "<h3>No students found.</h3>";
}

$conn->close();
?>
