<?php
// Database connection
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch product details
    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $product = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    // Update product in the database
    if (!empty($image)) {
        $query = "UPDATE products SET name='$name', price='$price', category='$category', description='$description', image='$image' WHERE id=$id";
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $query = "UPDATE products SET name='$name', price='$price', category='$category', description='$description' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "Product updated successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form action="edit-product.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" required><br>
        <label>Category:</label>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br>
        <label>Image:</label>
        <input type="file" name="image"><br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
