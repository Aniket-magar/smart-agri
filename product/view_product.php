<?php
include 'db_connect.php'; // Database connection file

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product details
$query = "SELECT * FROM products WHERE id = $product_id";
$result = mysqli_query($conn, $query);
$product = mysqli_fetch_assoc($result);

if (!$product) {
    echo "<h2>Product not found!</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?> - Product Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="product-container">
        <div class="product-image">
            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        </div>
        <div class="product-details">
            <h1><?php echo $product['name']; ?></h1>
            <p class="price">$<?php echo number_format($product['price'], 2); ?></p>
            <p class="description"><?php echo $product['description']; ?></p>
            <button class="btn buy-now">Buy Now</button>
            <button class="btn add-to-cart">Add to Cart</button>
        </div>
    </div>

    <div class="similar-products">
        <h2>Similar Products</h2>
        <div class="product-list">
            <?php
            $similar_query = "SELECT * FROM products WHERE category = '{$product['category']}' AND id != $product_id LIMIT 4";
            $similar_result = mysqli_query($conn, $similar_query);
            while ($similar = mysqli_fetch_assoc($similar_result)) {
                echo "<div class='product-item'>
                        <a href='product.php?id={$similar['id']}'>
                            <img src='{$similar['image']}' alt='{$similar['name']}'>
                            <p>{$similar['name']}</p>
                            <p class='price'>$" . number_format($similar['price'], 2) . "</p>
                        </a>
                      </div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
