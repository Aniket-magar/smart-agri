<?php
include '../db/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Manage Machines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4">Manage Harvesting Machines</h2>
        <a href="../php/add-machine.php" class="btn btn-success">Add New Machine</a>

        <table class="table table-striped mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Contact</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM machines";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['category']}</td>
                            <td>" . ($row['available'] ? "Available" : "Busy") . "</td>
                            <td>{$row['contact']}</td>
                            <td>
                                <a href='update-machine.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='../php/delete-machine.php?id={$row['id']}' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
