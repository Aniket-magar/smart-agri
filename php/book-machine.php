<?php
include '../db/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "UPDATE machines SET available = 0 WHERE id = $id";
    mysqli_query($conn, $query);
    echo "<script>alert('Machine booked successfully!'); window.location.href='index.php';</script>";
}
?>
