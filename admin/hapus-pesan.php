<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
}
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    
    $sql = "DELETE FROM messages WHERE id='$id'";
    
    if ($koneksi->query($sql) === TRUE) {
        header('Location: pesan.php?pesan=success');
    } else {
        header('Location: pesan.php?pesan=error');
    }
}
?>