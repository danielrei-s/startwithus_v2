<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');


// estabelecer a liga��o � base de dados
include ("connect.php");

// inicializa��o de vari�veis
$query = "SELECT * FROM contatos";
$result = mysqli_query($conn, $query);
@$codigo = $_POST["codigo"];
$queryDELETE = "DELETE FROM contatos WHERE codigo = ".$codigo;
$sucess = '';

if($_SERVER["REQUEST_METHOD"] == "POST") {
  
  if (!empty($_POST["codigo"])) {
    if(mysqli_num_rows($result) > 0){
      mysqli_query ($conn, $queryDELETE);
      mysqli_close ($conn);
      $sucess = 'SUCESSO! Apagado.';
    }
    }else{
    echo "<h1>ID de utilizador nao existe.</h1>";
    echo $queryDELETE;
  }
}
if( $_SESSION['login'] == TRUE){


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

      <h1 class="logo me-auto me-lg-0"><a href="index2.php">StartWith<span>Us</span></a></h1>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="close_session.php" class="get-started-btn scrollto">Terminar Sess&atilde;o</a>

    </div>
  </header><!-- End Header -->

  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <main>

            <h1><strong>Apagar Utilizador</strong></h1>
            <div class="d-flex justify-content-center">
            <div class="col-xl-8 col-lg-8">
            <div class="icon-box">
            <section id="main-content">
      <section class="wrapper">
        <h2> <?php echo $sucess; ?> </h2>
        <h2><i class="fa fa-angle-right"></i>Utilizadores</h2>
        <div class="row mb">
          <!-- page start-->
          <div class="content-panel">
            <div class="adv-table">
              <div class="table-wrapper-scroll-y my-custom-scrollbar">
              <table class="display table table-bordered mb-0" id="hidden-table-info">
                <thead>
                <tbody>
                <th><h3>Nome</h3></th>
                <th><h3>E-mail</h3></th>
                <th><h3>Codigo</h3></th>
                <?php while($registo = mysqli_fetch_array($result)){ ?>
                <?php for($x= 0; $x < mysqli_num_rows($result); $x++){?>
                <tr>
                    <td><?php echo $registo["nome"];  ?></td>
                    <td><?php echo $registo["email"];     ?></td>
                    <td><?php echo $registo["codigo"]; ?></td>
                        <?php break; } ?>
                </tr>
                        <?php } ?>
                </thead>
                </tbody>
                </div>
              </table>
            </div>

            <br>
            

            <div class="table2"><!---------------------------------------------- contentor do formulario ------------------------>
        <form class="form-horizontal" role="form" name="frmInserir" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label col-form-label-lg" for="codigo">Apagar</label>
              <div class="col-sm-10">
                <input class="form-control form-control-lg" name="codigo" type="text" value="<?php echo $codigo;?>" placeholder="ID utilizador.." >
              </div>
            </div>
            <div class="row mb-3" >
              <div class="col-sm-10 offset-sm-2">
                <div class="btn-group">
                <button class="btn btn-success" name="gravar" type="submit" value="Submit">Apagar</button>
                <button class="btn btn-danger" name="limpar" type="reset" value="Reset">Limpar</button>
                </div>
              </div>
            </div>
        </form>
      </div><!-- /.container -->
          </div>
          <!-- page end-->
        </div>
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
                </div>
                </div>
            </div>
        </div><!-- /.container -->
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
            <h4>Links Uteis</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="index2.php">HOME</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="perfil.php">Utilizadores</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="politicadeinformacao.php">Privacy policy</a></li>
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

// fechar a liga��o � base de dados
mysqli_close ($conn);

                }else {
  header ('Location: login.php');
} 
?>