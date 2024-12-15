<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
}
?>
<?php include "navbar.php"; ?>
<?php include "../koneksi.php"; ?>

<div class="container" style="margin-top: 100px;">
    <h1>Data Produk</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            echo "<div class='alert alert-success'>Produk berhasil dihapus!</div>";
        } else if ($_GET['pesan'] == 'error') {
            echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
        } else if ($_GET['pesan'] == 'updated') {
            echo "<div class='alert alert-success'>Produk berhasil diperbarui!</div>";
        }
    }
    ?>
    <table id="data-table" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Harga Lama</th>
                <th>Gambar</th>
                <th>
                    <a href="tambah-produk.php" class="btn btn-primary btn-sm">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM products ORDER BY created_at DESC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td style="text-align: center;"><?php echo $no++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['category']; ?></td>
                        <td>Rp<?php echo number_format($row['price'], 0, ',', '.'); ?></td>
                        <td>Rp<?php echo number_format($row['old_price'], 0, ',', '.'); ?></td>
                        <td><img src="../<?php echo $row['image']; ?>" width="100"></td>
                        <td>
                            <a href="edit-produk.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </a>
                            <a href="hapus-produk.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus produk ini?')">
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