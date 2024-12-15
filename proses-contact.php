<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $koneksi->real_escape_string($_POST['name']);
    $email = $koneksi->real_escape_string($_POST['email']);
    $subject = $koneksi->real_escape_string($_POST['subject']);
    $message = $koneksi->real_escape_string($_POST['message']);

    $sql = "INSERT INTO messages (name, email, subject, message) 
            VALUES ('$name', '$email', '$subject', '$message')";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: contact.php?pesan=success');
    } else {
        header('Location: contact.php?pesan=error');
    }
    exit();
}
?>