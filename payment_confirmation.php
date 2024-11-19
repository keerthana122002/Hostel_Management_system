<?php
// Simulate fetching data after payment
$transaction_id = "123456789";
$amount_paid = "14,098";
$payment_method = "Credit Card";

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("university.jpg"); /* Add your background image path */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 20px;
        }
        .confirmation-container {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
            border-radius: 10px;
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }
        h2 {
            color: #28a745;
        }
        .confirmation-details {
            margin: 20px 0;
        }
        .confirmation-details p {
            font-size: 18px;
            margin: 5px 0;
        }
        .btn-home {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
        }
        .btn-home:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="confirmation-container">
    <h2>Payment Successful!</h2>
    <div class="confirmation-details">
        <p>Thank you for your payment.</p>
        <p><strong>Transaction ID:</strong> #' . $transaction_id . '</p>
        <p><strong>Amount Paid:</strong> ₹ ' . $amount_paid . '/-</p>
        <p><strong>Payment Method:</strong> ' . $payment_method . '</p>
        <p>Your payment has been successfully processed, and your hostel booking is confirmed.</p>
    </div>
    <a href="home.html" class="btn-home">Return to Home</a>
</div>

</body>
</html>';
?>
