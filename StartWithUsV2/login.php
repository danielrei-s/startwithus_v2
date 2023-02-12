<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'utf-8');

// inicializa��o de vari�veis
$passwordErr = $emailErr = $autErr = $msgErr = "";
$password = $email = "";

// estabelecer a liga��o � base de dados
include ("connect.php");

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["login"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn,"SELECT * FROM users WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);
      if (mysqli_num_rows($result) > 0){
        if(($row["emailValidation"]) == 0){
          $msgErr = "You haven't validated your email yet!";
        }
        elseif(($row["status"]) == 0){
          $msgErr = "Your user has been suspended, contact the moderator!";
        }
        elseif($password == $row["password"]){
          $_SESSION['id'] = $row["idUser"];
          $_SESSION['login'] = TRUE;
          if (($row["idType"]) == 2){
              header("Location: index.php");
          }
          elseif(($row["idType"]) == 1){
              header("Location: index.php");
          }
      } else {
        $autErr ="Please check your username and/or password!";
      }
  
      }
    }

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
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
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
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="registar.php" class="get-started-btn scrollto">REGISTER</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>Login<span>!</span></h1>
          <h2>Login to start your journey with us.</h2>
        </div>
      </div>

      
      <!-- LOGIN -->
      <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" AND ($passwordErr !="" OR $emailErr != "" OR $autErr !="" OR $msgErr !="")) {
      ?>
      <br>
      <div class="alert alert-danger">
        <h4 style="color:#842029;">Alert!</h4>
        <?php
          echo $autErr;
          echo $emailErr;
          echo $passwordErr;
          echo $msgErr;
        ?>
      </div>
      <?php } ?><!-- /.info -->

      <div class="row gy-4 mt-5 justify-content-center" data-aos="zoom-in" data-aos-delay="250">
            <div class="row">
            <br>
            <div class="col-lg-3"></div>
            <div class="col-lg-6">
            <form class="form-group" method="post" action="login.php" style="background-color: transparent;">
              <input type="email" class="form-control" name="email"  placeholder="Email" value="<?php echo $email; ?>" required autofocus><br>
              <input type="password" class="form-control" name="password" placeholder="Password" required><br>
              <div class="row">
              <button type="submit" name="login" class="btn btn-warning">Login</button>
              </div>
            </form>
          </div>
          </div>
        </div>
  </section><!-- End Hero -->

 

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
                <a href="#" class="twitter"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="facebook"><i class="ri-facebook-circle-fill"></i></a>
                <a href="#" class="instagram"><i class="ri-instagram-fill"></i></a>
                <a href="#" class="google-plus"><i class="ri-skype-fill"></i></a>
                <a href="#" class="linkedin"><i class="ri-linkedin-fill"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#services">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="politicadeinformacao.php">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#portfolio">Research projects</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="pricing.php">Invest in projects</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#cta">Host your project</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="index.php#contact">Become a member of our team</a></li>
            </ul>
          </div>
        </div>
      </div>
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
  mysqli_close($conn);
?>