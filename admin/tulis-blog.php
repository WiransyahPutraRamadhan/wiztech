<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "navbar.php";
include "../koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $konten = $koneksi->real_escape_string($_POST['konten']);
    
    $target_dir = "../images/blog/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $gambar = $_FILES['gambar']['name'];
    $target_file = $target_dir . basename($gambar);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
    if (!in_array($imageFileType, $allowed_types)) {
        echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diizinkan!'); window.location = 'tulis-blog.php';</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
        $gambar_path = "images/blog/" . $gambar;
        
        $sql = "INSERT INTO blog (judul, konten, gambar, tanggal) 
                VALUES ('$judul', '$konten', '$gambar_path', NOW())";

        if ($koneksi->query($sql) === TRUE) {
            header('Location: tulis-blog.php?pesan=success');
            exit;
        } else {
            header('Location: tulis-blog.php?pesan=error');
            exit;
        }
    } else {
        header('Location: tulis-blog.php?pesan=error');
        exit;
    }
}
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Tulis Blog Baru</h3>
            <?php
                    if (isset($_GET['pesan']) && $_GET['pesan'] == 'success') {
                        echo "<div class='alert alert-success'>Blog berhasil ditambahkan!</div>";
                    } elseif (isset($_GET['pesan']) && $_GET['pesan'] == 'error') {
                        echo "<div class='alert alert-danger'>Gagal menambahkan blog!</div>";
                    }
                    ?>

            <div class="panel-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="form-group">
                        <label for="konten">Konten</label>
                        <textarea class="form-control" id="konten" name="konten" rows="10" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah Blog</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>