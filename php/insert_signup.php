<?php
session_start(); // Start session to store messages
include("../db/config.php");

// Extract POST data
extract($_POST);

// Hash the password for security
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL query to insert data into the users table
$sql = "INSERT INTO Signup (fullname, district, taluka, village, address, mobile, password, land_area) 
        VALUES ('$fullname', '$district', '$taluka', '$village', '$address', '$mobile', '$hashed_password', '$land_area')";

if (mysqli_query($conn, $sql)) {
    $_SESSION['message'] = "Account created successfully! Please log in.";
    header('location: ../Login/login.php'); 
    exit(); // Ensure script stops after redirection
} else {
    echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
}

// Close database connection
$conn->close();
?>
