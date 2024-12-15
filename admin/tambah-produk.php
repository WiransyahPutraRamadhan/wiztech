<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "navbar.php";
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $koneksi->real_escape_string($_POST['name']);
    $category = $koneksi->real_escape_string($_POST['category']);
    $price = $koneksi->real_escape_string($_POST['price']);
    $old_price = !empty($_POST['old_price']) ? $koneksi->real_escape_string($_POST['old_price']) : $price;

    $target_dir = "../images/" . $category . "/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $image = $_FILES['image']['name'];
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowed_types)) {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diizinkan!');window.location='tambah-produk.php';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $image_path = "images/" . $category . "/" . $image;
        
        $sql = "INSERT INTO products (name, category, price, old_price, image) 
                VALUES ('$name', '$category', '$price', '$old_price', '$image_path')";

        if ($koneksi->query($sql) === TRUE) {
            header('Location: tambah-produk.php?pesan=success');
            exit;
        } else {
            header('Location: tambah-produk.php?pesan=error');
            exit;
        }
    } else {
        header('Location: tambah-produk.php?pesan=error');
        exit;
    }
}
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Produk Baru</h3>
                    <?php
                    if (isset($_GET['pesan']) && $_GET['pesan'] == 'success') {
                        echo "<div class='alert alert-success'>Produk berhasil ditambahkan!</div>";
                    } elseif (isset($_GET['pesan']) && $_GET['pesan'] == 'error') {
                        echo "<div class='alert alert-danger'>Gagal mengupload file!</div>";
                    }
                    ?>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="category">Kategori</label>
                            <select class="form-control" id="category" name="category" required>
                                <option value="CPU">CPU</option>
                                <option value="Mobo">Motherboard</option>
                                <option value="RAM">RAM</option>
                                <option value="PSU">Power Supply</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="price">Harga</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="form-group">
                            <label for="old_price">Harga Lama (Opsional)</label>
                            <input type="number" class="form-control" id="old_price" name="old_price">
                        </div>

                        <div class="form-group">
                            <label for="image">Gambar Produk</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Produk</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>