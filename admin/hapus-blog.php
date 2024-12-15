<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $sql = "DELETE FROM blog WHERE id='$id'";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: tampil-blog.php?pesan=success');
    } else {
        header('Location: tampil-blog.php?pesan=error');
    }
}
?>