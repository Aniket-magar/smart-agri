<?php
session_start();

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = intval($_POST['quantity']); // Ensure quantity is an integer

    if (isset($_SESSION['cart'][$product_id]) && is_array($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] = max(1, $quantity); // Prevents negative values
    }
}

header("Location: cart.php");
exit();
?>
