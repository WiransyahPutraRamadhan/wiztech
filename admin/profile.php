<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>
<?php include "navbar.php"; ?>
    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-12">
                <form action="proses-edit-profile.php" method="POST">
                <?php
                $id=$_SESSION['user_id'];
                include "../koneksi.php";
                $tampil=$koneksi->query("select * from user where user_id='$id'");
                $row=$tampil->fetch_assoc();
                ?>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" class="form-control">
                        <input type="text" name="username" value="<?php echo $row['username']?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="<?php echo $row['email']?>" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" value="<?php echo $row['password']?>" class="form-control">
                    </div>
                    
                    <input type="submit" name="kirim" value="Ubah Data" class="btn btn-info">
                </form>
            </div>
        </div>
                <br>
                <div class="row">
                <div class="col-md-6">
                    <form action="upload-foto.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="hidden" name="user_id" value="<?php echo $row['user_id']?>" class="form-control">
                            <input type="file" name="foto" accept=".png, .jpg, .jpeg" value="<?php echo $row['foto']?>" class="form-control">
                        </div>

                        <input type="submit" name="kirim" value="Upload Foto" class="btn btn-warning">
                    </form>
                </div>
                <div class="col-md-6">
                    <?php
                        if ($row['foto'] == "") {
                            echo '<img src="../images/man/man.png" width="120px" height="120px">';
                        } else {
                            echo '<img src="../images/man/' . $row['foto'] . '" width="120px" height="120px">';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include "footer.php";?>