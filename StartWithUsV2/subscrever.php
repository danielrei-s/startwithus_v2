<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');

// estabelecer a liga��o � base de dados
include ("connect.php");


// inicializa��o de vari�veis
$projectnameErr = $descriptionErr = $passwordErr= "";
$projectname = $description = $password = $hidden = $disabled = "";
$query = "teste";

if( $_SESSION['login'] == TRUE){


// verifica se foi inserido c?digo
function test_input($dados) {
	$dados = trim($dados);
	$dados = stripslashes($dados);
	$dados = htmlspecialchars($dados);
	return $dados;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["projectname"])) {
      $projectnameErr = "Add your projects name!";
    } else {
      $projectname = test_input($_POST["projectname"]);
      // verifica se o name contem carateres com ou sem assento e espaços
      if (!preg_match("/^[a-zA-Z-' ]*$/",$projectname)) {
        $projectnameErr = "Project name shouldnt contain special chars.";
      }
    }
    
    if (empty($_POST["description"])) {
      $descriptionErr = "Add a description for your project!";
    } else {
      $description = test_input($_POST["description"]);
    }
  
    if (empty($_POST["valuation"])) {
      $valuation = 0;
    } else {
      $valuation = test_input($_POST["valuation"]);
    }
  
    if (empty($_POST["price"])) {
      $price = 0;
    } else {
      $price = test_input($_POST["price"]);
    }
  
    if ($projectname != "" && $description != "" && $valuation != "" && $price != "") {
      $query = "INSERT INTO projects (id, name, description, valuation, price, investors, bangel)
      VALUES ('', '$projectname',  '$description', '$valuation', '$price', '0','0')";
      mysqli_query ($conn,$query);
      $disabled = "disabled";
      $hidden = "hidden";
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
          <li><a class="nav-link scrollto" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php#about">About</a></li>
          <li><a class="nav-link scrollto active" href="index.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="close_session.php" class="get-started-btn scrollto">Terminar Sess&atilde;o</a>

    </div>
  </header><!-- End Header -->


  <div id="popup-bg" style="display:none; background-color: rgba(0, 0, 0, 0.5); position:fixed; top:0; left:0; width:100%; height:100%; z-index:999;"></div>
<div id="popup" style="display:none; background-color: white; position:fixed; top:40%; left:40%; width:25; height:25%; z-index:1000; padding:20px;">
  <?php
    if($_SERVER["REQUEST_METHOD"] == "POST" AND $projectnameErr =="" AND $descriptionErr == "" AND $passwordErr =="") {
      ?>
    <h2>Project has been submitted!</h2>
    <h3>Waiting review.</h3>
    <br>
    <button id="popup-close" class="btn btn-warning">Close</button>
      <?php
    }	
    if($projectnameErr !="" OR $descriptionErr != "" OR $passwordErr !="") {
      ?>
    <h4>Alerta!</h4>
    <hr>
    <p><?PHP echo $projectnameErr ?></p>
    <p><?PHP echo $descriptionErr ?></p>
    <p><?PHP echo $passwordErr ?></p>
    <button id="popup-close" class="btn btn-warning">Close</button>
      <?php
    }	
  ?>
</div>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const popup = document.getElementById("popup");
    const popupBg = document.getElementById("popup-bg");
    const popupClose = document.getElementById("popup-close");

    popupClose.addEventListener("click", function() {
      popup.style.display = "none";
      popupBg.style.display = "none";
    });

    <?php
      if($_SERVER["REQUEST_METHOD"] == "POST" OR $projectnameErr !="" OR $descriptionErr != "" OR $passwordErr !="") {
        ?>
        popup.style.display = "block";
        popupBg.style.display = "block";
        <?php
      }
    ?>
  });
</script>
  

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
            <main>
                <h1><strong>HOST  YOUR  PROJECT  WITH  <span>US</span></strong></h1>
                <div class="d-flex justify-content-center">
                <div class="col-xl-6 col-lg-6">
                <div class="icon-box">
                <section id="main-content">
          <section class="wrapper">
                    <div class="container-fluid">
                    <form name="frmInserir" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <div class="form-group">
                          <label for="projectName">Name of the Project</label>
                          <input name="projectname" type="text" value="<?php echo $projectname;?>" class="form-control" id="projectName" placeholder="Enter Name of the Project" <?php echo $disabled ?>>
                        </div>
                        <div class="form-group">
                          <label for="projectDescription">Description</label>
                          <textarea name="description" value="<?php echo $description;?>" class="form-control" id="projectDescription" rows="3" <?php echo $disabled ?>></textarea>
                        </div>
                        <div class="form-group">
                          <label for="projectPrice">Price</label>
                          <input name="price" type="text" class="form-control" id="projectPrice" placeholder="Enter Price" <?php echo $disabled ?>>
                        </div>
                        <div class="form-group">
                          <label for="projectValuation">Valuation</label>
                          <input  name="valuation" type="text" class="form-control" id="projectValuation" placeholder="Enter Valuation" <?php echo $disabled ?>>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-warning" <?php echo $disabled ?>>Submit</button>
                      </form>
                    </div>
                    <!-- /row -->
            </section>
                    <!-- /wrapper -->
                </div>
                </div>
                </div>
          </div><!-- /.container -->
        </div>
  </section>
<!-- End Hero -->



<!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-6 col-md-6">
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
  <script src="assets/vendor/php-description-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-description-form/validate.js"></script>


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