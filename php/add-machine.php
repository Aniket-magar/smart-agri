<?php
include '../db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Handle Image Upload
    $targetDir = "../php/upload/";  // Folder to store images
    $imageName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

    // Insert into database
    $query = "INSERT INTO machines (name, category, available, contact, image) 
              VALUES ('$name', '$category', 1, '$contact', '$targetFilePath')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Machine added successfully!'); window.location.href='../admin/machinery-admin.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Machine</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Add Harvesting Machine</h2>
        <form action="../php/add-machine.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label class="form-label">Machine Name</label>
        <input type="text" class="form-control" name="name" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Category</label>
        <select class="form-control" name="category" required>
            <option value="Tractor">Tractor</option>
            <option value="Harvester">Harvester</option>
            <option value="Combine">Combine</option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Contact Number</label>
        <input type="text" class="form-control" name="contact" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Machine Image</label>
        <input type="file" class="form-control" name="image" accept="image/*" required>
    </div>
    <button type="submit" class="btn btn-primary">Add Machine</button>
</form>

    </div>
</body>
</html>
