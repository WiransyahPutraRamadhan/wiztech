<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit;
}
include "navbar.php";
include "../koneksi.php";
?>

<div class="container" style="margin-top: 100px;">
    <h1>Daftar Blog</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            echo "<div class='alert alert-success'>Blog berhasil dihapus!</div>";
        } else if ($_GET['pesan'] == 'error') {
            echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
        }
    }
    ?>
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Tanggal</th>
                <th>
                    <a href="tulis-blog.php" class="btn btn-primary">
                        <i class="glyphicon glyphicon-plus"></i>
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM blog ORDER BY tanggal DESC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $row['judul']; ?>
                </td>
                <td><img src="../<?php echo $row['gambar']; ?>" width="100"></td>
                <td>
                    <?php echo date('d/m/Y H:i', strtotime($row['tanggal'])); ?>
                </td>
                <td>
                    <a href="edit-blog.php?id=<?php echo $row['id']; ?>">
                        <button class="btn btn-sm btn-warning glyphicon glyphicon-edit"></button>
                    </a>
                    <a href="hapus-blog.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus blog ini?')">
                        <button class="btn btn-sm btn-danger glyphicon glyphicon-trash"></button>
                    </a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Tidak ada blog</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "footer.php"; ?>