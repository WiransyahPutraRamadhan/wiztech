<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
}
include "navbar.php";
include "../koneksi.php";
?>

<div class="container" style="margin-top: 100px;">
    <h1>Data Pesanan</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            echo "<div class='alert alert-success'>Status pesanan berhasil diperbarui!</div>";
        } else if ($_GET['pesan'] == 'error') {
            echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
        }
    }
    ?>
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Status</th>
                <th>Tanggal Order</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT o.*, p.name as product_name 
                    FROM orders o 
                    JOIN products p ON o.product_id = p.id 
                    ORDER BY o.order_date DESC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td>
                            <?php echo $row['customer_name']; ?><br>
                            <small>Tel: <?php echo $row['phone']; ?></small><br>
                            <small>Alamat: <?php echo $row['address']; ?></small>
                        </td>
                        <td><?php echo $row['product_name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td>Rp<?php echo number_format($row['total_price'], 0, ',', '.'); ?></td>
                        <td>
                            <form action="update-status.php" method="POST" style="display: inline;">
                                <input type="hidden" name="order_id" value="<?php echo $row['id']; ?>">
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="pending" <?php echo $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                    <option value="processing" <?php echo $row['status'] == 'processing' ? 'selected' : ''; ?>>Processing</option>
                                    <option value="shipped" <?php echo $row['status'] == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                                    <option value="delivered" <?php echo $row['status'] == 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                                    <option value="cancelled" <?php echo $row['status'] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['order_date'])); ?></td>
                        <td>
                            <a href="hapus-order.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesanan ini?')">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>