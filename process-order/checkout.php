<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$conn = new mysqli("localhost", "root", "", "agristuff");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    die("<h2 class='text-center'>Your cart is empty. <a href='../Cart/cart.php'>Go to Cart</a></h2>");
}

// Calculate total price
$total_price = 0;
foreach ($_SESSION['cart'] as $product) {
    if (!is_array($product)) continue;
    $total_price += $product['price'] * $product['quantity'];
}

// Process order when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $payment_method = $_POST['payment_method'] ?? 'Cash on Delivery';

    // Insert order into `orders` table
    // Insert order into `orders` table
$stmt = $conn->prepare("INSERT INTO orders (user_name, email, address, total_price, payment_method) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssd", $name, $email, $address, $total_price, $payment_method); // ✅ Fix: 5 variables, 5 types
$stmt->execute();
$order_id = $stmt->insert_id; // Get last inserted order ID
$stmt->close();


    // Insert each item into `order_items` table
    foreach ($_SESSION['cart'] as $product) {
        if (!is_array($product)) continue;
        $stmt = $conn->prepare("INSERT INTO order_items (order_id, product_name, price, quantity) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isdi", $order_id, $product['name'], $product['price'], $product['quantity']);
        $stmt->execute();
        $stmt->close();
    }

    // Store order ID in session and clear the cart
    $_SESSION['order_id'] = $order_id;
    unset($_SESSION['cart']);

    // Redirect to order confirmation page
    header("Location: order_confirmation.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container my-5">
    <h2 class="text-center">Checkout</h2>

    <h4>Order Summary:</h4>
    <table class="table table-bordered">
        <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Total</th>
        </tr>
        <?php foreach ($_SESSION['cart'] as $product) { ?>
            <tr>
                <td><?php echo htmlspecialchars($product['name']); ?></td>
                <td>₹<?php echo $product['price']; ?></td>
                <td><?php echo $product['quantity']; ?></td>
                <td>₹<?php echo $product['price'] * $product['quantity']; ?></td>
            </tr>
        <?php } ?>
    </table>
    <h4 class="text-end">Total Price: ₹<?php echo $total_price; ?></h4>

    <form method="post" action="">
        <h4>Billing Details:</h4>
        <div class="mb-3">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Address:</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <h4>Payment Method:</h4>
        <div class="mb-3">
            <input type="radio" name="payment_method" value="Cash on Delivery" required> Cash on Delivery (COD) <br>
            <input type="radio" name="payment_method" value="UPI" required> UPI <br>
            <input type="radio" name="payment_method" value="Debit/Credit Card" required> Debit/Credit Card <br>
            <input type="radio" name="payment_method" value="Net Banking" required> Net Banking
        </div>

        <button type="submit" class="btn btn-success w-100">Place Order</button>
    </form>
</div>
</body>
</html>
