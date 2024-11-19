<?php
include 'db.php'; // Include the database connection

$sql = "SELECT * FROM users WHERE gender = 'Male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h3>Boys Hostel Details:</h3>";
    echo "<table border='1'>
            <tr>
                <th>Full Name</th>
                <th>Register Number</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Hostel</th>
                <th>Course</th>
                <th>Department</th>
                <th>Joining Year</th>
                <th>Passed Out Year</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['full_name']}</td>
                <td>{$row['reg_no']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['hostel_name']}</td>
                <td>{$row['course']}</td>
                <td>{$row['department']}</td>
                <td>{$row['joining_year']}</td>
                <td>{$row['passedout_year']}</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "<h3>No male students found.</h3>";
}

$conn->close();
?>
