<?php include 'navbar.php'; ?>

   <!-- Contact Section -->
   <div class="container contact-section">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Hubungi Kami</h2>
        </div>
    </div>
    <div class="row contact-info">
        <div class="col-md-4 text-center">
            <i class="fas fa-map-marker-alt fa-2x"></i>
            <p>203, Stabat, Langkat, Sumatera Utara</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fas fa-phone fa-2x"></i>
            <p>+62 8587 2445</p>
        </div>
        <div class="col-md-4 text-center">
            <i class="fas fa-envelope fa-2x"></i>
            <p>support@wiztech.com</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=stabat+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <h3>Send Us Email</h3>
            <?php
    if (isset($_GET['pesan'])) {
        if ($_GET['pesan'] == 'success') {
            echo "<div class='alert alert-success'>Pesan Anda berhasil dikirim!</div>";
        } else if ($_GET['pesan'] == 'error') {
            echo "<div class='alert alert-danger'>Maaf, terjadi kesalahan. Silakan coba lagi.</div>";
        }
    }
    ?>
            <form action="proses-contact.php" method="POST">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group col-md-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                </div>
                <div class="form-group col-md-12">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-danger">SEND</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Contact Section end -->

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