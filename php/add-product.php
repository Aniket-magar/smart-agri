<?php
// Database connection
include('../db/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    $target = "upload/" . basename($image);

    // Insert product into the database
    $query = "INSERT INTO products (name, price, category, description, image) VALUES ('$name', '$price', '$category', '$description', '$image')";
    if (mysqli_query($conn, $query)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "<script>
                    window.location.href = '../admin/admin.php';
                    alert('Product added successfully!');
                  </script>";
        } else {
            echo "<script>
                    alert('Failed to upload the image.');
                    window.location.href = '../admin/admin.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($conn) . "');
                window.location.href = 'admin.php';
              </script>";
    }
}
?>
