<?php include "../koneksi.php"; ?>

    <!-- Footer -->
    <footer class="footer" style="background-color: #f8f9fa; padding: 20px 0; margin-top: 50px; position: relative; bottom: 0; width: 100%;">
        <div class="container">
            <div class="row">
            <div class="col-md-3">
                    <h5 id="brand">Wiz<span>Tech.</span></h5>
            </div>
                <div class="col-md-3">
                    <h5>WizTech Admin Panel</h5>
                    <p>Panel administrasi untuk mengelola konten website WizTech</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Login sebagai: <?php echo $_SESSION['username']; ?></p>
                    <p>Terakhir login: <?php 
                        $sql = "SELECT last_login FROM user WHERE user_id = '".$_SESSION['user_id']."'";
                        $result = $koneksi->query($sql);
                        if ($result->num_rows > 0) {
                            $row = $result->fetch_assoc();
                            echo date('d/m/Y H:i', strtotime($row['last_login']));
                        }
                    ?></p>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p>&copy; <?php echo date('Y'); ?> WizTech Admin Panel. All rights reserved.</p>
            </div>
        </div>
    </footer>
    <!-- Footer end -->
<script src="../bootstrap/jquery/dist/jquery.min.js"></script>
<script src="../bootstrap/bootstrap/js/bootstrap.min.js"></script>
<script src="../dataTable/datatables.min.js"></script>
<script src="../bootstrap/plugins/ckeditor/ckeditor.js"></script>
<script src="../dataTable/table.js"></script>
<script>
    CKEDITOR.replace('konten');
</script>
</body>

</html>