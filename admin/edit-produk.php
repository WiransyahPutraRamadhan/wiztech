<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "navbar.php";
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $koneksi->real_escape_string($_GET['id']);
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = $koneksi->query($sql);
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $koneksi->real_escape_string($_POST['name']);
    $category = $koneksi->real_escape_string($_POST['category']);
    $price = $koneksi->real_escape_string($_POST['price']);
    $old_price = !empty($_POST['old_price']) ? $koneksi->real_escape_string($_POST['old_price']) : $price;
    $id = $koneksi->real_escape_string($_POST['id']);
    
    // Handle image upload
    $image = $product['image']; // Default to existing image
    if (!empty($_FILES['image']['name'])) {
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = "images/" . basename($_FILES["image"]["name"]);
            } else {
                echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
            }
        } else {
            echo "<script>alert('File is not an image.');</script>";
        }
    }

    $sql = "UPDATE products SET name='$name', category='$category', price='$price', old_price='$old_price', image='$image' WHERE id='$id'";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: data-produk.php?pesan=updated');
    } else {
        echo "<script>alert('Error: " . $koneksi->error . "');</script>";
    }
}
?>

<div class="container" style="margin-top: 100px;">
    <h1>Edit Produk</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $product['name']; ?>" required>
        </div>
        <div class="form-group">
            <label for="category">Kategori</label>
            <input type="text" class="form-control" id="category" name="category" value="<?php echo $product['category']; ?>" required>
        </div>
        <div class="form-group">
            <label for="price">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="<?php echo $product['price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="old_price">Harga Lama</label>
            <input type="number" class="form-control" id="old_price" name="old_price" value="<?php echo $product['old_price']; ?>">
        </div>
        <div class="form-group">
            <label for="image">Gambar Produk</label>
            <input type="file" class="form-control" id="image" name="image">
            <img src="../<?php echo $product['image']; ?>" width="100" style="margin-top: 10px;">
        </div>
        <button type="submit" class="btn btn-primary">Update Produk</button>
    </form>
</div>

<?php include "footer.php"; ?>