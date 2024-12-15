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
    $sql = "SELECT * FROM blog WHERE id='$id'";
    $result = $koneksi->query($sql);
    $blog = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $koneksi->real_escape_string($_POST['judul']);
    $konten = $koneksi->real_escape_string($_POST['konten']);
    $gambar_path = $blog['gambar'];

    if (!empty($_FILES['gambar']['name'])) {
        $target_dir = "../images/blog/";
        $gambar = $_FILES['gambar']['name'];
        $target_file = $target_dir . basename($gambar);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($imageFileType, $allowed_types)) {
            echo "<script>alert('Hanya file JPG, JPEG, PNG & GIF yang diizinkan!');window.location='edit-blog.php?id=$id';</script>";
            exit;
        }

        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {
            $gambar_path = "images/blog/" . $gambar;
        }
    }

    $sql = "UPDATE blog SET judul='$judul', konten='$konten', gambar='$gambar_path' WHERE id='$id'";

    if ($koneksi->query($sql) === TRUE) {
        header('Location: tampil-blog.php?pesan=editBerhasil');
        exit;
    } else {
        header('Location: edit-blog.php?id=$id&pesan=error');
        exit;
    }
}
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Edit Blog</h3>
                    <?php
                    if (isset($_GET['pesan']) && $_GET['pesan'] == 'error') {
                        echo "<div class='alert alert-danger'>Gagal mengedit blog!</div>";
                    }
                    ?>
                </div>
                <div class="panel-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" class="form-control" id="judul" name="judul" value="<?php echo $blog['judul']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea class="form-control" id="konten" name="konten" rows="10" required><?php echo $blog['konten']; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                            <p>Gambar saat ini: <img src="../<?php echo $blog['gambar']; ?>" width="100"></p>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>