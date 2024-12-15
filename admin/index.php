<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
}
?>
<?php 
include "navbar.php";
include "../koneksi.php";
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-12">
                <div class="jumbotron">
            <h1>Selamat Datang <?php echo $_SESSION['username']; ?></h1>
            <p>Di Panel Admin WizTech - Kelola toko komputer</p>
            <p>Anda dapat mengelola produk, blog, dan lainnya</p>
        <a href="data-produk.php" class="btn btn-primary">Kelola Produk</a>
            <a href="tampil-blog.php" class="btn btn-primary">Kelola Blog</a>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>