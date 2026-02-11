<?php
session_start();
include("../db/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    // Query to check if user exists
    $sql = "SELECT id, fullname, password FROM signup WHERE mobile = '$mobile'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['fullname'] = $row['fullname'];
            
            // Redirect to dashboard or homepage
            header("Location: ../Homepage/index.php");
            exit();
        } else {
            $_SESSION["error"] = "Incorrect password!";
        }
    } else {
        $_SESSION["error"] = "Mobile number not registered!";
    }

    // Redirect back to login page if error
    header("Location: ../Login/login.php");
    exit();
}
?>
