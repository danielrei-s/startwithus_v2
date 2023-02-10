<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');

if( $_SESSION['login'] == TRUE){

// estabelecer a liga��o � base de dados
include ("connect.php");

// inicializa��o de vari�veis
$nomeErr = $emailErr = $passwordErr= "";
$nome = $email = $password = $hidden = $disabled = "";
$query = "SELECT * FROM projects"; //Todo o conteudo da tabela prjects
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>StartWithUs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">StartWith<span>Us</span></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
          <li><a class="nav-link scrollto " href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto active " href="index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="close_session.php" class="get-started-btn scrollto">Logout</a>

    </div>
  </header><!-- End Header -->

  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <main>
          <br>
          <br>
            <h1><strong>PROJECT LIST</strong></h1>
            <div class="d-flex justify-content-center">
            <div class="col-xl-11 col-xl-11">
            <div class="icon-box">
            <section id="main-content">
      <section class="wrapper">
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
            <div class="table-wrapper-scroll-y my-custom-scrollbar" style="height:500px; overflow-y: auto;">
              <table class="awsome-table" id="hidden-table-info">                
                <thead>
                <tbody>
                <th><h5>Project</h5></th>
                <th><h5>Description</h5></th>
                <th><h5>Raise Objective</h5></th>
                <th><h5>Initial Date</h5></th>
                <th><h5>Owner</h5></th>
                <th><h5>Expert Needs</h5></th>
                <th><h5>Details</h5></th>
                <?php while($registo = mysqli_fetch_array($result)){ ?>
                <?php for($x= 0; $x < mysqli_num_rows($result); $x++){
                  $idOwner = $registo["idOwner"];
                  $query2 = "SELECT * FROM users WHERE idUSER = " .$idOwner; //Saber quem é o owner pelo idOwner
                  $result2 = mysqli_query($conn, $query2);
                  $registo2 = mysqli_fetch_array($result2)?>
                <tr>
                    <td><?php echo $registo["projectName"];  ?></td>
                    <td><?php echo $registo["summaryDescription"];     ?></td>
                    <td><?php echo $registo["raiseObjective"]; ?></td>
                    <td><?php echo $registo["initialDate"]; ?></td>
                    <td><?php echo $registo2["firstName"]; echo $registo2["lastName"];  ?></td>
                    <td><?php echo $registo["expertNeeds"] ?></td>
                    <td><a class="nav-link scrollto active" href="portfolio-details.php">Learn more</a></td>
                        <?php break; } ?>
                </tr>
                        <?php } ?>
                </thead>
                </tbody>
              </table>
            </div>
          </div>
          <!-- page end-->
        </div>
      </div>
    </div>
      </div>
      </div>
      </div>
      </div>
        <!-- /row -->
        </section>
        <!-- /wrapper -->

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
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Research projects</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Invest in projects</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Host your project</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contact">Become a member of our team</a></li>
            </ul>
          </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>GRUPO 2 - StartWithUs</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed with <a href="boostrap.com">Boostrap 5</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>
  </body>
</html>
<?php
// fechar a liga��o � base de dados
mysqli_close ($conn);

} else {
  header ('Location: login.php');
} 
?>