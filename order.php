<?php
include "navbar.php";
include "koneksi.php";

if(isset($_GET['product_id'])) {
    $product_id = $koneksi->real_escape_string($_GET['product_id']);
    $sql = "SELECT * FROM products WHERE id = '$product_id'";
    $result = $koneksi->query($sql);
    $product = $result->fetch_assoc();
} else {
    header("Location: shop.php");
    exit();
}
?>

<div class="container" style="margin-top: 100px;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Pemesanan</h3>
                </div>
                <div class="panel-body">
                    <?php
                    if(isset($_GET['pesan'])) {
                        if($_GET['pesan'] == "success"){
                            echo "<div class='alert alert-success'>Pesanan berhasil dibuat!</div>";
                        } else if($_GET['pesan'] == "error"){
                            echo "<div class='alert alert-danger'>Terjadi kesalahan!</div>";
                        }
                    }
                    ?>
                    <form id="orderForm" action="proses-order.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                        
                        <div class="form-group">
                            <label>Nama Produk:</label>
                            <p class="form-control-static"><?php echo $product['name']; ?></p>
                        </div>

                        <div class="form-group">
                            <label>Harga:</label>
                            <p class="form-control-static">Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></p>
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
                        <button type="button" class="btn btn-default" onclick="history.back()">Kembali</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>