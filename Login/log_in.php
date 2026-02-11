<?php
session_start();
include '../db/config.php'; // Ensure this file contains $conn = new mysqli(...);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = trim($_POST['mobile']);
    $password = trim($_POST['password']);

    // Use a prepared statement to prevent SQL injection
    $query = "SELECT * FROM users WHERE mobile = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $mobile);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Store user data in session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['mobile'] = $user['mobile'];

        // Redirect to dashboard
        header("Location: ../dashboard.php");
        exit();
    } else {
        $_SESSION["error"] = "Invalid Mobile Number or Password.";
        header("Location: ../Login/login.php");
        exit();
    }
}
?>
