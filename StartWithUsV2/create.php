<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');


// estabelecer a liga��o � base de dados
include ("connect.php");

// inicializa��o de vari�veis
$nomeErr = $emailErr = $passwordErr= "";
$nome = $email = $password = $hidden = $disabled = "";

// verifica se foi inserido c?digo
function test_input($dados) {
	$dados = trim($dados);
	$dados = stripslashes($dados);
	$dados = htmlspecialchars($dados);
	return $dados;
  }

if($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["nome"])) {
		$nomeErr = "PF digite o Nome!";
	  } else {
      $nome = test_input($_POST["nome"]);
      // verifica se o nome contem carateres com ou sem assento e espa�os
      if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        $nomeErr = "O Nome n�o deve conter cararteres especiais ou n�meros.";
      }
	  }
	  
	  if (empty($_POST["email"])) {
		$emailErr = "PF digite o Email!";
	  } else {
      $email = test_input($_POST["email"]);
      // verifica o formato do email
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "O formato do Email � inv�lido.";
      }
    }

    
    if (strlen($_POST["password"]) < 5) {    
      $passwordErr = "A password deve ter pelo menos 5 carateres";
      } elseif ($_POST["password"] != $_POST["rpassword"]){
        $passwordErr = "As passwords n�o coincidem. PF introduza novamente as passwords.";
        } else { 
          $password = test_input($_POST["password"]);
      }

	if ($nomeErr =="" AND $emailErr == "" AND $passwordErr == ""){
		$query = "INSERT INTO contatos (nome, email, password)
		VALUES ('$nome',  '$email', '$password')";
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
        <h1><strong>Inserir Utilizador</strong></h1>
        
        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST" AND $nomeErr =="" AND $emailErr == "" AND $passwordErr =="") {
            ?>
          <div>
              <h2>
              Os dados foram inseridos com sucesso.
              </h2>
          </div>
          <?php
            }	
            ?>
        <?php if($nomeErr !="" OR $emailErr != "" OR $passwordErr !="") { ?>
          <div>
            <h4>Alerta!</h4>
            <hr>
            <p><?PHP echo $nomeErr ?></p>
            <p><?PHP echo $emailErr ?></p>
            <p><?PHP echo $passwordErr ?></p>
          </div>
          <?php }	?>
        </div><!-- /.info -->
        
        <div><!-- contentor do formulario --> 
        <div class="d-flex justify-content-center">
        <div class="col-xl-4 col-lg-4">
          <div class="icon-box">
            <form name="frmInserir" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
              <div>
                <label>Nome </label>
                <div >
                  <input name="nome" type="text" value="<?php echo $nome;?>" placeholder="Nome" <?php echo $disabled ?>>
                </div>
              </div>
              <div>
                <label>Email </label>
                <div>
              <input name="email" type="email" value="<?php echo $email;?>" placeholder="Email" <?php echo $disabled ?>>
            </div>
          </div>
          <div <?php echo $hidden ?>>
            <label>Password </label>
            <div>
              <input name="password" type="password" placeholder="Password [min. 5 caracteres]"/>
            </div>
          </div>
          <div <?php echo $hidden ?>>
            <label>Repetir password </label>
            <div>
              <input name="rpassword" type="password" placeholder="Repetir a password"/>
            </div>
          </div>
          <div>
            <div>
              <div>	
                <br>
                <button name="gravar" type="submit" <?php echo $disabled ?>>Gravar</button>
                <button name="limpar" type="reset" >Limpar</button>
                <br>
                <a href="index2.php">Voltar ao inicio</a>
              </div>
            </div>
          </div>
        </form>
      </div><!-- /.container -->
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
?>