<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $product_id = $koneksi->real_escape_string($_POST['product_id']);
    $customer_name = $koneksi->real_escape_string($_POST['customer_name']);
    $phone = $koneksi->real_escape_string($_POST['phone']);
    $address = $koneksi->real_escape_string($_POST['address']);
    $quantity = (int)$_POST['quantity'];
    $product_price = (float)$_POST['product_price'];
    
    // Verifikasi product_id ada di database
    $check_product = $koneksi->query("SELECT id FROM products WHERE id = '$product_id'");
    if ($check_product->num_rows == 0) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "?pesan=error&error=invalid_product#orderModal");
        exit();
    }
    
    // Hitung total harga
    $total_price = $quantity * $product_price;
    
    // Query untuk menyimpan order
    $sql = "INSERT INTO orders (product_id, customer_name, phone, address, quantity, total_price) 
            VALUES ('$product_id', '$customer_name', '$phone', '$address', '$quantity', '$total_price')";
    
    if ($koneksi->query($sql) === TRUE) {
        // Redirect ke halaman order dengan pesan sukses
        header("Location: order.php?product_id=" . $product_id . "&pesan=success");
    } else {
        // Redirect ke halaman modal dengan pesan error
        header("Location: order.php?product_id=" . $product_id . "&pesan=error&error=" . urlencode($koneksi->error));
    }
    exit();
} else {
    // Jika bukan method POST, redirect ke halaman utama
    header("Location: index.php");
    exit();
}
?>
