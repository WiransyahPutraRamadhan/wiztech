<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $koneksi->real_escape_string($_POST['order_id']);
    $status = $koneksi->real_escape_string($_POST['status']);
    
    $sql = "UPDATE orders SET status = '$status' WHERE id = '$order_id'";
    
    if ($koneksi->query($sql) === TRUE) {
        header('Location: data-order.php?pesan=success');
    } else {
        header('Location: data-order.php?pesan=error');
    }
    exit;
}
?>
