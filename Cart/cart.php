<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2 class="text-center">Your Cart</h2>
        <?php
        $cart_items = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
        $total_price = 0;

        if (!empty($cart_items)) {
            echo '<table class="table table-bordered text-center">
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>';

            foreach ($cart_items as $product_id => $item) {
                if (!is_array($item)) continue;

                // ✅ Ensure all values exist before displaying
                $product_name = isset($item['name']) && !empty($item['name']) ? htmlspecialchars($item['name']) : "No Name";
                $product_price = isset($item['price']) && is_numeric($item['price']) ? $item['price'] : 0;
                $product_image = isset($item['image']) && !empty($item['image']) ? htmlspecialchars($item['image']) : "default.jpg";
                $product_quantity = isset($item['quantity']) ? $item['quantity'] : 1;

                echo '<tr>
                        <td><img src="../php/upload/' . $product_image . '" class="img-thumbnail" style="width: 60px; height: 60px;"></td>
                        <td>' . $product_name . '</td>
                        <td>₹ ' . $product_price . '</td>
                        <td>
                            <form method="post" action="update_cart.php">
                                <input type="hidden" name="product_id" value="' . $product_id . '">
                                <input type="number" name="quantity" value="' . $product_quantity . '" min="1" class="form-control w-50">
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                        <td>₹ ' . ($product_price * $product_quantity) . '</td>
                        <td>
                            <form method="post" action="remove_cart.php">
                                <input type="hidden" name="product_id" value="' . $product_id . '">
                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                            </form>
                        </td>
                    </tr>';

                $total_price += $product_price * $product_quantity;
            }

            echo '</table>
                  <div class="text-end"><strong>Total Price: ₹ ' . $total_price . '</strong></div>
                  <div class="text-center my-3">
                      <a href="../process-order/checkout.php" class="btn btn-success">Proceed to Checkout</a>
                  </div>';
        } else {
            echo '<p class="text-center">Your cart is empty.</p>';
        }
        ?>
    </div>
</body>
</html>
