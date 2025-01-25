<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../bootstrap/bootstrap/fonts/glyphicons-halflings-regular.svg">
    <link rel="stylesheet" href="../dataTable/datatables.min.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>WizTech | Admin</title>
</head>

<body>
<!-- navbar start -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Wiz<span>Tech.</span></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="<?= $page == 'index.php' ? 'active' : '' ?>"><a href="index.php">HOME</a></li>
                <li class="<?= $page == 'tambah-produk.php' ? 'active' : '' ?>"><a href="tambah-produk.php">Tambah Produk</a></li>
                <li class="<?= $page == 'data-produk.php' ? 'active' : '' ?>"><a href="data-produk.php">Data Produk</a></li>
                <li class="<?= $page == 'data-order.php' ? 'active' : '' ?>"><a href="data-order.php">Data Order</a></li>
                <li class="<?= $page == 'pesan.php' ? 'active' : '' ?>"><a href="pesan.php">Data Pesan</a></li>
                <li class="<?= $page == 'tampil-user.php' ? 'active' : '' ?>"><a href="tampil-user.php">Data User</a></li>
                <li class="<?= $page == 'tampil-blog.php' ? 'active' : '' ?>"><a href="tampil-blog.php">Data Blog</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="<?= $page == 'profile.php' ? 'active' : '' ?>"><a href="profile.php"><span class="glyphicon glyphicon-user"></span></a></li>
                <li><a href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->