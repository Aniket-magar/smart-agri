<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "agristuff");

// Get order details
$order_id = $_SESSION['order_id'] ?? null;
if (!$order_id) {
    die("<h2 class='text-center'>No order found. <a href='../product.php'>Shop Now</a></h2>");
}

$query = "SELECT * FROM orders WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();
$stmt->close();

// Get ordered items
$query = "SELECT * FROM order_items WHERE order_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $order_id);
$stmt->execute();
$items = $stmt->get_result();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5 text-center">
    <h2>Order Confirmation</h2>
    <p>Thank you, <strong><?php echo htmlspecialchars($order['user_name']); ?></strong>!</p>
    <p>Your order has been placed successfully.</p>
    <p><strong>Total Amount Paid:</strong> ₹<?php echo $order['total_price']; ?></p>
    <p>Delivery Address: <?php echo htmlspecialchars($order['address']); ?></p>
    <a href="../product/product.php" class="btn btn-primary">Continue Shopping</a>
</div>
</body>
</html>
