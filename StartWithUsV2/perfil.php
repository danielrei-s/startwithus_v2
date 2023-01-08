<?php
//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');

if( $_SESSION['login'] == TRUE){

// estabelecer a liga��o � base de dados
include ("connect.php");

// inicializa��o de vari�veis

@$user = $_POST["user"];  
$query = 'SELECT codigo FROM contatos WHERE nome="'.$user.'"';
$result= mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
@$query2 = "SELECT * FROM comments WHERE toID=".$row["codigo"];
$comentario = '';
$row2 = '';
$row3 = '';


if($_SERVER["REQUEST_METHOD"] == "POST") {
  if(isset($_POST['form'])){
    switch ($_POST['form']) {
      case "pesquisa":
        echo "submitted A";
        if ($_POST["user"] != "" && $row != "") {
          $result2 = mysqli_query($conn, $query2);
          if(mysqli_num_rows($result2) > 0){
              $row2 = mysqli_fetch_array ($result2);
              @$query3 = "SELECT nome FROM contatos WHERE codigo=".$row2["fromID"];
              $result3 =  mysqli_query($conn, $query3);
              $row3 = mysqli_fetch_array ($result3);
            }else{  
              echo "<h1>Nao existe comentarios.</h1>";
            }
        }else{
          echo "<h1>Nao existe usuario.</h1>";
        }
        break;

      case "inserircomentario":
          echo "submitted B";
          if ($_POST["user"] != "" && $row != "") {

            # Adicionar um comentario à base de dados
            $comentario = $_POST["conteudocom"];
            $queryComentario = "INSERT INTO comments (fromID, toID, comentario)
              VALUES (" . $_SESSION['codigo'] . ", " . $row['codigo'] . ", '" . $comentario ."')";
            if (mysqli_query($conn, $queryComentario)) {
              echo "New record created successfully";
            } else {
              echo "Error: " . $queryComentario . "<br>" . mysqli_error($conn);
            }

            $result2 = mysqli_query($conn, $query2);
            #Ir buscar comentarios
            if(mysqli_num_rows($result2) > 0){
              $row2 = mysqli_fetch_array ($result2);
              @$query3 = "SELECT nome FROM contatos WHERE codigo=".$row2["fromID"];
              $result3 =  mysqli_query($conn, $query3);
              $row3 = mysqli_fetch_array ($result3);
            }else{  
              echo "<h1>Nao existe comentarios.</h1>";
            }
        }else{
          echo "<h1>Nao existe usuario.</h1>";
        }
          break;

      default:
          echo "What are you doing?";
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
          <li><a class="nav-link scrollto" href="index2.php">HOME</a></li>
          <li><a class="nav-link scrollto" href="listar.php">Listar Utilizadores</a></li>
          <li><a class="nav-link scrollto" href="create.php">Inserir Utilizadores</a></li>
          <li><a class="nav-link scrollto" href="alterar.php">Alterar Utilizadores</a></li>
          <li><a class="nav-link scrollto" href="apagar.php">Apagar Utilizadores</a></li>
          <li><a class="nav-link scrollto active" href="perfil.php">Perfil</a></li>
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
            <h1><strong>Perfil</strong></h1>
  
            <br>
            <h3>Procure perfil de utilizador</h3>
  <div class="table2"><!---------------------------------------------- contentor da PESQUISA ------------------------>
    <form class="form-horizontal" role="form" name="frmInserir" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <input type="hidden" name="form" value="pesquisa">
      <div class="row mb-3">
          <label class="col-sm-1 col-form-label col-form-label" for="user">Nome:</label>
          <div class="col-sm-2">
            <input class="form-control form-control-" name="user" type="search" id="searchBox" value="" placeholder="Procurar user..." >
              
          </div>
        </div>
        <div class="row mb-3" >
          <div class="col-sm-1 offset-sm-1">
            <div class="btn-group">
              <button class="btn btn-success" name="gravar" type="submit" value="Submit">Procurar</button>
              <button class="btn btn-danger" name="limpar" type="reset" value="Reset">Limpar</button>
            </div>
          </div>
        </div>
    </form>
</div><!-- /.container -->
            </section><!-- End Hero -->         
            
  <div class="container">
    <div class="comment-wrapper">
      <div class="panel panel-info">
        <div class="panel-heading">
          <h2> Comentarios sobre <?php echo $user; ?> </h2>

        </div>
      <div class="panel-body">
        <?php if ($row != "") { ?> 
          <form  role="form" name="formInserirComentario" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="form" value="inserircomentario">
            <input type="hidden" name="user" value="<?php echo $user; ?>">
            <textarea name="conteudocom" class="form-control" placeholder="Escreva o seu comentario..." rows="3"></textarea>
              <br>
            <button class="btn btn-info pull-right" name ="butaoSubmeter" type = "submit" value="Submit">Postar</button>
          </form>
          <div class="clearfix"></div>
          <hr>
        <?php } ?>
          <ul class="media-list">
            <?php while($row2 != NULL){ ?>
                <li class="media">
                    <a href="#" class="pull-left">
                        <img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
                    </a>
                    <div class="media-body">
                        <span class="text-muted pull-right">
                            <small class="text-muted"><?php echo $row2["timestamp"]; ?></small>
                        </span>
                        <strong class="text-success"><?php echo $row3["nome"]; ?></strong>
                        <p>
                          <?php echo $row2["comentario"];  ?> 
                          </p>
                        </div>
                    </li>
                <?php 
                  $row2 = mysqli_fetch_array($result2);
                  if ($row2 != NULL) {
                    @$query3 = "SELECT nome FROM contatos WHERE codigo=".$row2["fromID"];
                    $result3 =  mysqli_query($conn, $query3);
                    $row3 = mysqli_fetch_array ($result3);
                  }
                } 
                ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
 
                  
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
              <li><i class="bx bx-chevron-right"></i> <a href="index2.php">Home</a></li>
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

} else {
  header ('Location: login.php');
} 
?>
