<?php
$conn = new mysqli('localhost', 'root', '', 'agristuff');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 #gets id from address 
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

   
    $query = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $product = $result->fetch_assoc();
    } else {
        echo "<p class='text-center'>Product not found.</p>";
        exit();
    }
} else {
    echo "<p class='text-center'>Invalid product ID.</p>";
    exit();
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <link rel="stylesheet" href="pdp.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="../Homepage/index.php">Agri Store</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="../php/upload/<?php echo htmlspecialchars($product['image']); ?>" class="img-fluid" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="col-md-6">
            <h1><?php echo htmlspecialchars($product['name']); ?></h1>
            <p class="price">₹ <?php echo htmlspecialchars($product['price']); ?></p>
            <p class="description"><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
            <button class="btn btn-primary btn-lg">Add to Cart</button>
        </div>
    </div>
</div>

<footer class="bg-dark text-light text-center py-4">
    <p>&copy; 2025 Agriculture Store. All rights reserved.</p>
</footer>

</body>
</html>
