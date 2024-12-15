<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM products WHERE id='$id'";
    
    if ($koneksi->query($sql) === TRUE) {
        header('Location: data-produk.php?pesan=success');
    } else {
        header('Location: data-produk.php?pesan=error');
    }
    exit;
}
?>