<?php
include 'db.php'; // Including the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $full_name = $_POST['full_name'];
    $reg_no = $_POST['reg_no'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $hostel_name = $_POST['hostel_name'];
    $course = $_POST['course'];
    $department = $_POST['department'];
    $joining_year = $_POST['joining_year'];
    $passedout_year = $_POST['passedout_year'];

    // Validation for email and phone format (if needed)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format.");
    }

    if (!preg_match('/^\d{10}$/', $phone)) {
        die("Invalid phone number. It must be 10 digits.");
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO users (full_name, reg_no, email, phone, gender, hostel_name, course, department, joining_year, passedout_year) 
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $full_name, $reg_no, $email, $phone, $gender, $hostel_name, $course, $department, $joining_year, $passedout_year);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!'); window.location.href='payment.html';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "'); window.location.href='register_form.html';</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
