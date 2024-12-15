<?php $page = basename($_SERVER['PHP_SELF']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="bootstrap/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="dataTable/datatables.min.css">
    <link rel="stylesheet" href="bootstrap/bootstrap/fonts/glyphicons-halflings-regular.svg">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>WizTech</title>
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
                <li class="<?= $page == 'shop.php' ? 'active' : '' ?>"><a href="shop.php">SHOP</a></li>
                <li class="<?= $page == 'about.php' ? 'active' : '' ?>"><a href="about.php">ABOUT</a></li>
                <li class="<?= $page == 'contact.php' ? 'active' : '' ?>"><a href="contact.php">CONTACT</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
                <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span><span class="badge">3</span></a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- navbar end -->