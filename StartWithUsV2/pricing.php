<?php

//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartWithUs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
<link rel="stylesheet" type="text/css" href="ddajaxsidepanel.css" />

<script src="ddajaxsidepanel.js">

/***********************************************
* Ajax Side Panel script- (c) Dynamic Drive (www.dynamicdrive.com)
* Please keep this notice intact
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/

</script>
  <!-- Favicons -->
  <link href="assets/img/companyLogo.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">StartWith<span>Us</span></a></h1>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto active " href="index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="close_session.php" class="get-started-btn scrollto">LOGOUT</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Pricing</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Pricing</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

<!-- ======= Pricing Section ======= -->
<section id="pricing" class="section-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Plant the seeds of your success with <span>us</span> and watch them blossom into realities.</h2>
          <span class="section-divider"></span>
        </div>
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3>Single Project</h3>
              <h4><sup>&euro;</sup>4<span> project</span></h4>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i>  Access project full description</li>
                <li><i class="bi bi-check-circle-fill"></i>  Access project full financials</li>
                <li><i class="bi bi-check-circle-fill"></i>  Chat with project owner</li>
                <li><i class="bi bi-x-circle"></i>      Costumer support 24/7</li>
                <li><i class="bi bi-x-circle"></i>      Project comparison (head-to-head)</li>
              </ul>
              <a href="index.php#portfolio" class="get-started-btn">Buy Now</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box featured">
              <h3>Multiple Projects</h3>
              <h4><sup>&euro;</sup>7,5<span> month</span></h4>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Access project full description</li>
                <li><i class="bi bi-check-circle-fill"></i> Access project full financials</li>
                <li><i class="bi bi-check-circle-fill"></i> Chat with project owner</li>
                <li><i class="bi bi-check-circle-fill"></i> Costumer support 24/7</li>
                <li><i class="bi bi-x-circle"></i> Project comparison (head-to-head)</li>
              </ul>
              <a href="index.php#portfolio" class="get-started-btn">Buy Now</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box">
              <h3>Year-round Investor</h3>
              <h4><sup>&euro;</sup>85<span> year</span></h4>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> Access project full description</li>
                <li><i class="bi bi-check-circle-fill"></i> Access project full financials</li>
                <li><i class="bi bi-check-circle-fill"></i> Chat with project owner</li>
                <li><i class="bi bi-check-circle-fill"></i> Costumer support 24/7</li>
                <li><i class="bi bi-check-circle-fill"></i> Project comparison (head-to-head)</li>
              </ul>
              <a href="index.php#portfolio" class="get-started-btn">Buy Now</a>
            </div>
          </div>

        </div>
      </div>
    </section><!-- End Pricing Section -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>StartWith<span>Us</span></h3>
              <p>
                Av. Vasco da Gama <br>
                VNG 4400, Portugal<br><br>
                <strong>Phone:</strong> +395 912 345 678<br>
                <strong>Email:</strong> admin@admin.pt<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="politicadeinformacao.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe today to our Newsletter!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>StartWithUs</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>