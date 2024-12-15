<?php
include "navbar.php";
include "koneksi.php";

$products_per_page = 12;

$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $products_per_page;
$total_products_result = $koneksi->query("SELECT COUNT(*) as total FROM products");
$total_products = $total_products_result->fetch_assoc()['total'];
$total_pages = ceil($total_products / $products_per_page);

$sql = "SELECT * FROM products ORDER BY created_at DESC LIMIT $products_per_page OFFSET $offset";
$result = $koneksi->query($sql);
?>
    <!-- filter start  -->
    <div class="container">
        <div class="filter-container">
            <div class="search-input">
                <input type="text" placeholder="Search products...">
                <button class="search-btn">Search</button>
            </div>
            <div class="results-info">Showing all product</div>
            <div class="dropdown">
                <button class="dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="true">
                    Sort by popular
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    <li><a href="#">Sort by popularity</a></li>
                    <li><a href="#">Sort by reviews</a></li>
                    <li><a href="#">Sort by ratings</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- filter end  -->

<!-- product start -->
<div class="container">
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
        ?>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="product-card" data-product-id="<?php echo $row['id']; ?>">
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
<!-- product end -->

<!-- Modal Pemesanan -->
<div class="modal fade" id="orderModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Form Pemesanan</h4>
                </div>
                <div class="modal-body">
                    <form id="orderForm" action="proses-order.php" method="POST">
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="hidden" name="product_price" id="product_price">
                        
                        <div class="form-group">
                            <label>Nama Produk:</label>
                            <p id="product_name" class="form-control-static"></p>
                        </div>

                        <div class="form-group">
                            <label>Harga:</label>
                            <p id="price_display" class="form-control-static"></p>
                        </div>

                        <div class="form-group">
                            <label for="customer_name">Nama Lengkap:</label>
                            <input type="text" class="form-control" name="customer_name" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">No. Telepon:</label>
                            <input type="tel" class="form-control" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Lengkap:</label>
                            <textarea class="form-control" name="address" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Jumlah:</label>
                            <input type="number" class="form-control" name="quantity" min="1" value="1" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
   <!-- pagination start -->
   <div class="container">
    <nav aria-label="Page navigation">
        <ul class="pagination pagination-centered">
            <?php if ($current_page > 1): ?>
                <li>
                    <a href="?page=<?php echo $current_page - 1; ?>" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="<?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>

            <?php if ($current_page < $total_pages): ?>
                <li>
                    <a href="?page=<?php echo $current_page + 1; ?>" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
<!-- pagination end -->

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
