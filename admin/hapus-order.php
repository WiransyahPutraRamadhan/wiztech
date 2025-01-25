<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM orders WHERE id='$id'";
    
    if ($koneksi->query($sql) === TRUE) {
        header('Location: data-order.php?pesan=success');
    } else {
        header('Location: data-order.php?pesan=error');
    }
    exit;
}
?>