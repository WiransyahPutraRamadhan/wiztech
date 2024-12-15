<?php include 'navbar.php'; ?>

    <!-- carousel start -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="images/carousel/amd.jpg" alt="Slide 1">
            </div>

            <div class="item">
                <img src="images/carousel/nvida-gpu.png" alt="Slide 2">
            </div>

            <div class="item">
                <img src="images/carousel/intel.png" alt="Slide 3">
            </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- carousel end -->

    <!-- Brand Section -->
    <div class="container brand-section">
        <div class="row text-center">
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/acer.png" alt="acer" class="brand-logo">
            </div>
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/amd.png" alt="amd" class="brand-logo">
            </div>
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/intel.png" alt="intel" class="brand-logo">
            </div>
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/lenovo.png" alt="lenovo" class="brand-logo">
            </div>
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/msi.png" alt="msi" class="brand-logo">
            </div>
            <div class="col-12 col-md-4 col-lg-2 col-sm-6">
                <img src="images/logo-brand/nvidia.png" alt="nvidia" class="brand-logo">
            </div>
        </div>
    </div>
    <!-- Brand Section end -->

    <!-- best product start -->
    <div class="container">
        <div class="text-center">
            <h1 style="color: #e74c3c;">Best Products</h1>
        </div>
        <div class="row">
        <?php
        include 'koneksi.php';
        $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="product-card">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h5><?php echo $row['name']; ?></h5>
                <p class="rating">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    4.5 (100)
                </p>
                <p class="old-price">Rp<?php echo number_format($row['old_price'], 0, ',', '.'); ?></p>
                <p class="price">Rp<?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                <div class="product-buttons">                
                    <a href="#orderModal" data-toggle="modal"><button class="btn btn-primary btn-buy-now">Buy Now</button></a>
                    <button class="btn btn-success btn-add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
    </div>
    <!-- best product end -->

    <!-- Promosi Section -->
    <div class="promosi-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="text-uppercase">Kinerja Ekstrem</h6>
                    <h1>Komponen Komputer Terbaik</h1>
                    <p>Bersiaplah sepanjang tahun dengan pilihan komponen komputer terbaik kami. Pilih dari berbagai merk untuk meningkatkan performa komputer Anda.</p>
                    <a href="shop.html" class="btn btn-primary">Belanja Sekarang →</a>
                </div>
                <div class="col-md-6">
                    <img src="images/carousel/amd.jpg" class="img-responsive" alt="Promosi Gambar">
                </div>
            </div>
        </div>
    </div>
    <!-- Promosi Section end -->

<!-- produk baru start -->
<div class="container">
        <div class="text-center">
            <h1 style="color: #e74c3c;">Best Products</h1>
        </div>
        <div class="row">
        <?php
        include "koneksi.php";
        $sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="product-card">
                <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
                <h5><?php echo $row['name']; ?></h5>
                <p class="rating">
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star"></span>
                    <span class="glyphicon glyphicon-star-empty"></span>
                    4.5 (100)
                </p>
                <p class="old-price">Rp<?php echo number_format($row['old_price'], 0, ',', '.'); ?></p>
                <p class="price">Rp<?php echo number_format($row['price'], 0, ',', '.'); ?></p>
                <div class="product-buttons">
                    <a href="#orderModal" data-toggle="modal"><button class="btn btn-primary btn-buy-now">Buy Now</button></a>
                    <button class="btn btn-success btn-add-to-cart">Add to Cart</button>
                </div>
            </div>
        </div>
        <?php
            }
        }
        ?>
    </div>
    </div>
<!-- produk baru end -->



<!-- testimonials -->
<div class="testimonials" class="carousel slide" data-ride="carousel" data-interval="3000">
    <div class="container">
        <h2 class="text-center">Apa Kata Pelanggan Kami</h2>
        <p class="text-center">Beberapa kata pelanggan kami</p>
        <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                <li data-target="#testimonial-carousel" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (1).jpg" alt="Andi Pratama" class="img-circle">
                            <h4>Andi Pratama</h4>
                            <p class="title">Desainer Grafis</p>
                            <p>Produk ini sangat luar biasa! Komputer saya menjadi lebih cepat dan efisien setelah menggunakan komponen ini.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (2).jpg" alt="Budi Santoso" class="img-circle">
                            <h4>Budi Santoso</h4>
                            <p class="title">Manajer</p>
                            <p>Saya sangat puas dengan hasilnya. Komputer saya tidak pernah mengalami lag lagi.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (3).jpg" alt="Cahyo Nugroho" class="img-circle">
                            <h4>Cahyo Nugroho</h4>
                            <p class="title">Desainer</p>
                            <p>Komponen ini sangat membantu meningkatkan performa komputer saya. Saya merasa lebih produktif sekarang.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="row">
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (4).jpg" alt="Dedi Setiawan" class="img-circle">
                            <h4>Dedi Setiawan</h4>
                            <p class="title">Insinyur Perangkat Lunak</p>
                            <p>Produk ini sangat efektif. Komputer saya menjadi lebih stabil dan cepat.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (5).jpg" alt="Eko Saputra" class="img-circle">
                            <h4>Eko Saputra</h4>
                            <p class="title">Spesialis Pemasaran</p>
                            <p>Saya sangat menyukai produk ini. Komputer saya menjadi lebih handal dan tidak mudah panas.</p>
                        </div>
                        <div class="col-sm-4 text-center">
                            <img src="images/man/man (6).jpg" alt="Fajar Hidayat" class="img-circle">
                            <h4>Fajar Hidayat</h4>
                            <p class="title">Pengusaha</p>
                            <p>Produk ini sangat membantu mengatasi masalah komputer saya. Saya sangat merekomendasikannya.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- testimonials end -->

<!-- blog start -->
<?php
include 'koneksi.php';
$sql = "SELECT * FROM blog ORDER BY tanggal DESC LIMIT 5";
$result = $koneksi->query($sql);
?>

<div class="container">
        <div class="text-center">
            <h1 style="color: #e74c3c;">Blog Terbaru</h1>
        </div>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class='col-md-4'>
                    <h3><?php echo $row['judul']; ?></h3>
                    <img src='<?php echo $row['gambar']; ?>' alt='<?php echo $row['judul']; ?>' style='width:100%;'>
                    <p><?php echo substr($row['konten'], 0, 100) . "..."; ?></p>
                    <a href='blog.php?id=<?php echo $row['id']; ?>'>Baca Selengkapnya</a>
                </div>
                <?php
            }
        } else {
            echo "<p>Tidak ada blog terbaru.</p>";
        }
        ?>
    </div>
</div>
<!-- blog end  -->
    <!-- newsletter start-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Dapatkan Info Terbaru Seputar Teknologi</h4>
            </div>
            <div class="col-md-4">
                <form class="form-inline">
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email">
                    </div>
                    <button type="submit" class="btn btn-danger">SUBSCRIBE</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <ul class="list-inline">
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-google"></i></a></li>
                    <li><a href="#"><i class="fab fa-behance"></i></a></li>
                    <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- newsletter end -->

<?php include 'footer.php'; ?>