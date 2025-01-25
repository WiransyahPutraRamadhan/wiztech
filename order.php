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

<style>
.order-container {
    margin-top: 120px;
    margin-bottom: 50px;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    overflow: hidden;
}

.order-header {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    padding: 30px;
    text-align: center;
}

.order-header h3 {
    margin: 0;
    font-size: 24px;
    font-weight: 600;
}

.order-content {
    padding: 40px;
}

.product-info {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 30px;
}

.form-group label {
    font-weight: 600;
    color: #2d3436;
    margin-bottom: 10px;
}

.form-control {
    border: 2px solid #eee;
    border-radius: 8px;
    padding: 12px 15px;
    height: auto;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #e74c3c;
    box-shadow: none;
}

textarea.form-control {
    min-height: 100px;
}

.btn-order {
    background: linear-gradient(135deg, #e74c3c, #c0392b);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-order:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
}

.btn-back {
    background: #f1f2f6;
    color: #2d3436;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
}

.btn-back:hover {
    background: #e4e5e7;
}

.alert {
    border-radius: 8px;
    padding: 15px 20px;
    margin-bottom: 25px;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="order-container">
                <div class="order-header">
                    <h3>Form Pemesanan Produk</h3>
                </div>
                <div class="order-content">
                    <?php
                    if(isset($_GET['pesan'])) {
                        if($_GET['pesan'] == "success"){
                            echo "<div class='alert alert-success'><i class='fa fa-check-circle'></i> Pesanan berhasil dibuat!</div>";
                        } else if($_GET['pesan'] == "error"){
                            echo "<div class='alert alert-danger'><i class='fa fa-times-circle'></i> Terjadi kesalahan!</div>";
                        }
                    }
                    ?>
                    
                    <div class="product-info">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 style="color: #2d3436; margin-top: 0;">Detail Produk</h4>
                                <p><strong>Nama Produk:</strong><br><?php echo $product['name']; ?></p>
                                <p><strong>Harga:</strong><br>Rp<?php echo number_format($product['price'], 0, ',', '.'); ?></p>
                            </div>
                        </div>
                    </div>

                    <form id="orderForm" class="order-form" action="proses-order.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $product['price']; ?>">
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="customer_name">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="customer_name" placeholder="Masukkan nama lengkap Anda" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">No. Telepon</label>
                                    <input type="tel" class="form-control" name="phone" placeholder="Contoh: 08123456789" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <textarea class="form-control" name="address" placeholder="Masukkan alamat lengkap pengiriman" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Jumlah</label>
                            <input type="number" class="form-control" name="quantity" min="1" value="1" required>
                        </div>

                        <div class="form-group" style="margin-top: 30px;">
                            <button type="submit" class="btn btn-order">Pesan Sekarang</button>
                            <button type="button" class="btn btn-back" onclick="history.back()">Kembali</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>