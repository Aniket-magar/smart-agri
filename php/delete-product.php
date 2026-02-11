<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database configuration file
include '../db/config.php';

// Check if the 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Get the product ID and ensure it's an integer

    // Prepare the DELETE query
    $query = "DELETE FROM products WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param('i', $id); // Bind the product ID to the query
        if ($stmt->execute()) {
            // If deletion is successful, redirect to the manage products page
            header("Location: admin-products.php?status=success");
            exit();
        } else {
            // If an error occurs, log the error and redirect with an error status
            error_log("Error executing query: " . $stmt->error);
            header("Location: admin-products.php?status=error");
            exit();
        }
        $stmt->close();
    } else {
        // Log and redirect with an error if the query couldn't be prepared
        error_log("Query preparation failed: " . $conn->error);
        header("Location: admin-products.php?status=error");
        exit();
    }
} else {
    // Redirect if the 'id' parameter is missing
    header("Location: admin-products.php?status=missing_id");
    exit();
}

// Close the database connection
$conn->close();
?>
