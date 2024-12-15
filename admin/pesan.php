<?php
session_start();
if (empty($_SESSION['user_id'])) {
    header('Location: ../login.php');
}
include "navbar.php";
include "../koneksi.php";
?>

<div class="container" style="margin-top: 100px;">
    <h1>Data Pesan</h1>
    <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            echo "<div class='alert alert-success'>Pesan berhasil dihapus!</div>";
        } else if ($_GET['pesan'] == 'error') {
            echo "<div class='alert alert-danger'>Error: " . $koneksi->error . "</div>";
        }
    }
    ?>
    <table id="data-table" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sql = "SELECT * FROM messages ORDER BY created_at DESC";
            $result = $koneksi->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['message']; ?></td>
                        <td><?php echo date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
                        <td>
                            <a href="hapus-pesan.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus pesan ini?')">
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