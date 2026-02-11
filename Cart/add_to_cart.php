<?php
session_start();

// Ensure all required fields are set before adding to the cart
if (isset($_POST['product_id'], $_POST['product_name'], $_POST['product_price'], $_POST['product_image'])) {
    $product_id    = $_POST['product_id'];
    $product_name  = !empty($_POST['product_name']) ? $_POST['product_name'] : "Unnamed Product";
    $product_price = is_numeric($_POST['product_price']) ? $_POST['product_price'] : 0;
    $product_image = !empty($_POST['product_image']) ? $_POST['product_image'] : "default.jpg";

    // Initialize cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add or update product in session cart
    if (isset($_SESSION['cart'][$product_id]) && is_array($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$product_id] = [
            'name'     => $product_name,
            'price'    => $product_price,
            'image'    => $product_image,
            'quantity' => 1
        ];
    }

    // Redirect to cart page
    header("Location: cart.php");
    exit();
} else {
    echo "Error: Missing product details.";
}
?>
