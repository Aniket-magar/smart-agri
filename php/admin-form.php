<?php
// Include database connection
include('../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    
    // Handle image upload
    $image = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageFolder = 'uploads/' . $image;

    if (move_uploaded_file($imageTmpName, $imageFolder)) {
        // Insert product into the database
        $sql = "INSERT INTO products (name, category, description, price, image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $category, $description, $price, $image);
        
        if ($stmt->execute()) {
            echo "Product inserted successfully!";
        } else {
            echo "Error inserting product: " . $stmt->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>
