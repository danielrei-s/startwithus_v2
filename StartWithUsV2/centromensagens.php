<?php

//inicializar sess�o
session_start();

// codifica��o de carateres
ini_set('default_charset', 'ISO8859-1');
include ("connect.php");
if(empty($_SESSION["id"])){
  header("Location: login.php");
}
$idUser = $_SESSION["id"];
//$idProjeto= $_GET["idProjeto"];
$idProject='2';
$contador = 0;

//$owner= $_GET["owner"];

$result = mysqli_query($conn,"SELECT * FROM users WHERE idUser = $idUser");
  $row = mysqli_fetch_assoc($result);
  $userFirstName = $row["firstName"];
  $userLastName = $row["lastName"];
  

  $resultProjectsWithMessages =  mysqli_query($conn, "SELECT Distinct * FROM messages WHERE idAction = $idUser");
  $rowsProjectsAllMessages = null;

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
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

<script type="text/javascript" src="ddaccordion.js">

/***********************************************
* Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* Please keep this notice intact
***********************************************/

</script>


<script type="text/javascript">


ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: false, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})


</script>

<style type="text/css">

/* The grid: Three equal columns that floats next to each other */
.column {
float: left;
width: 20%;
padding: 50px;
text-align: center;
font-size: 10px;
cursor: pointer;
color: white;
}

.containerTab {
padding: 20px;
color: white;
}

/* Clear floats after the columns */
.row:after {
content: "";
display: table;
clear: both;
}

/* Closable button inside the image */
.closebtn {
float: right;
color: white;
font-size: 10px;
cursor: pointer;
}

.arrowlistmenu{
width: auto; /*width of accordion menu*/
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}

.arrowlistmenu .MenuWorkList{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 12px Verdana, Arial, Helvetica, sans-serif;
color: #B5CCE5;
/* border: 2px Groove #B5CCE5; */
background: #fff url(titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;

}

.arrowlistmenu .menuheader{ /*CSS class for menu headers in general (expanding or not!)*/
font: bold 12px Arial;
color: #000;
background: #ffc451 url(titlebar.png) repeat-x center left;
margin-bottom: 10px; /*bottom spacing between header and rest of content*/
text-transform: uppercase;
padding: 4px 0 4px 10px; /*header text is indented 10px*/
cursor: hand;
cursor: pointer;

}

.arrowlistmenu .openheader{ /*CSS class to apply to expandable header when it's expanded*/
font-family:Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
background: #ffc451 url(titlebar.png) repeat-x center left;
}

.arrowlistmenu ul{ /*CSS for UL of each sub menu*/
list-style-type: none;
margin: 0;
padding: 0;
margin-bottom: 8px; /*bottom spacing between each UL and rest of content*/
}

.arrowlistmenu ul li{
padding-bottom: 2px; /*bottom spacing between menu items*/
}

.arrowlistmenu ul li .opensubheader{ /*Open state CSS for sub menu header*/
background: lightgreen !important;

}

.arrowlistmenu ul li .closedsubheader{ /*Closed state CSS for sub menu header*/
background: lightgreen !important;
}

.arrowlistmenu ul li a{
color: #000000;
display: block;
padding: 2px 0;
padding-left: 9px;
text-decoration: none;
font-weight: bold;
border-bottom: 1px solid #dadada;
font-size: 90%;
font-family: Verdana, Arial, Helvetica, sans-serif;
background-image: url(arrowbullet.png);
background-repeat: no-repeat;
background-position: center left;
}

.arrowlistmenu ul li a:visited{
color: #000000;
}

.arrowlistmenu ul li a:hover{ /*hover state CSS*/
background-color: #004993;
color:#FFFFFF
}

.arrowlistmenu ul li a.subexpandable:hover{ /*hover state CSS for sub menu header*/
background: lightblue;
}



</style>

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
          <li><a class="nav-link scrollto active " href="index.php#portfolio">Projects</a></li>
          <li><a class="nav-link scrollto" href="index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="index.php#contact">Contact</a></li>
          <?php
              if ( !empty( $_SESSION['id'] )) {
                $idUser = $_SESSION['id'];
                $result = mysqli_query($conn,"SELECT * FROM messages WHERE idAction = $idUser and mFlag = '0'" );
                $row = mysqli_fetch_assoc($result);
                if (!$row) {
            ?>
                <li style="margin-left: 30px;"><a href="centromensagens.php"><img width="30px" src="assets/img/mail.png" alt="Mail"></a></li>
            <?php
              } else {
            ?>
                <li style="margin-left: 30px;"><a href="centromensagens.php"><img width="30px" src="assets/img/mailNew.png" alt="Mail"></a></li>
            <?php                
              }
            }
            ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <!-- <a href="#about" class="get-started-btn scrollto">Get Started</a> -->
      <a href="close_session.php" class="get-started-btn scrollto">LOGOUT</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Message Center</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Message Center</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="centro_mensagens" class="centro_mensagens">
    
						
												<div class="arrowlistmenu">
                        <table  width="80%" align="center" border="2" bordercoler="#ffc451" cellspacing="0" cellpadding="2">
								      	<tr>
										    <td >
													<?php 
                          // $idUser = '4';
														$arrayUnique =  mysqli_query($conn, "SELECT Distinct idProject, idAction FROM messages WHERE (idSender = $idUser or idReceiver = $idUser)");
														while ($arrUnique = mysqli_fetch_array($arrayUnique)) 
														 {
                              $projectsRows =  mysqli_query($conn, "SELECT Distinct idOwner, projectName FROM Projects WHERE idProject = $arrUnique[0]");
                              $projectRow = mysqli_fetch_assoc($projectsRows);
                              $array = mysqli_query($conn, "SELECT * FROM messages WHERE idAction = $arrUnique[1] LIMIT 1");
                              $arr = mysqli_fetch_assoc($array);
                              if($arr["idSender"] == $projectRow["idOwner"])
                              {
                                $angelID = $arr["idReceiver"];
                              }
                              else{
                                $angelID = $arr["idSender"];  
                              }



                              $userRows =  mysqli_query($conn, "SELECT Distinct firstName FROM Users WHERE idUser = $angelID");
                              $userRow = mysqli_fetch_assoc($userRows);                         

                                               
 
                               if($idUser!= $projectRow["idOwner"])
                               {
                                 $tituloConj = $projectRow["projectName"];
                                // $tituloConj = $arr[1];
                               }else
                               {

                                 $tituloConj = $projectRow["projectName"]." - ".$userRow["firstName"];
                               }

												 ?>
														 	 <h3 class="MenuWorkList expandable [0]"> 
															 		<table width="100%">
																		<tr>
																			<td  width="100%" bgcolor="#535353" Style="Color:#ffc451; text-align:left">	
																				<b><?php echo $tituloConj; ?> </b>																
																			</td>
																			
																		</tr>
																	</table>

															 
															 </h3>
															  <ul class="categoryitems">
															  			<!-- <table width="80%" border="0" align="left" margin-left="20px"> -->
                                      <table style="margin-left: 30px; margin-bottom: 20px; width: 90%; border: 0; float: left;">
																			<tr>
                                            
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="15%"> Date</td>
																					<td bgcolor="#535353" Style="Color: #ffc451" align="center" width="20%"> From</td>
																					<td bgcolor="#535353" Style="Color: #ffc451" align="center" width="20%"> To </td>
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="10%"> Proposal Value</td>
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="10%"> Proposal Percentage </td>
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="5%"> Counter-Proposal</td>
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="5%"> Accept </td>
                                          <td bgcolor="#535353" Style="Color: #ffc451" align="center" width="5%" > Decline</td>
                                          <td Style="border:0"></td>
																				</tr>

																		<?php	
																  	
																			$array_det=mysqli_query($conn, "SELECT * FROM messages WHERE idAction = $arrUnique[1] order by sendDate DESC");
																			// $cor = '#E0E0E0';
                                      $contador = 0;
                                      $cor = '#757575';
                                      $dataMaisRecente = true;
																			//alterna no detalhe as cores das linhas
																			while ($arr_det  = mysqli_fetch_array($array_det)) 
																			 {	

																					 $contador = $contador +1 ;
																					if($contador % 2 == 0) 
																						//  $cor = '#BCBCBC';
                                            $cor = '#535353';
																					else
																						 $cor = '#757575';
																			
																			?>	
																				 <tr>		
																						
																						<!-- <td class="texto_pequeno" bgcolor="<?php echo $cor ?>" ><?php echo $arr_det[1] ?></td>												
																						<td class="texto_pequeno" bgcolor="<?php echo $cor ?>" ><?php echo $arr_det[2] ?></td> -->
                                            <?php 
                                            $idmsg = $arr_det["id"];
                                            $alteramFlagQuery=mysqli_query($conn, "UPDATE messages SET mFlag ='1' WHERE id=$idmsg");
                                            if($projectRow["idOwner"] != $arr_det["idSender"])
                                            {
                                              $from = $userRow["firstName"];
                                              $to = "Owner";
                                              $proposalV = $arr_det["proposalValue"];
                                              $proposalP = $arr_det["proposalPercentage"];
                                            }else{
                                              $from = "Owner";
                                              $to = $userRow["firstName"]; 
                                              $proposalV = $arr_det["counterProposalValue"];
                                              $proposalP = $arr_det["counterProposalPercentage"];                                             
                                            }
                                            $msgdate = date('d-m-Y', strtotime($arr_det["sendDate"]));
                                            ?>
                                            <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ><?php echo $msgdate ?></td>		
                                            <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ><?php echo $from ?></td>												
																						<td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ><?php echo $to ?></td>	
                                            <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ><?php echo $proposalV ?></td>												
																						<td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ><?php echo $proposalP ?></td>	
                                            <?php 
                                            if($dataMaisRecente)
                                            {
                                              ?>	
	                                          <td align="center"  bgcolor="<?php echo $cor ?>"> 																			
																								<a title="Contra-proposta" onClick="contraProposta(<?php echo "'".$user."'" ?>, <?php echo "'".$ano."'" ?>, <?php echo "'".$mes."'" ?>,<?php echo "'".$r_horas_1[19]."'" ?>)" >
                                                <a href="contraProposta.php?id=<?php echo $arr_det[0]  ?>" rel="ajaxpanel" id="MySlideBar">
																								<img align="middle" src="assets/img/question.png" width="20" border="0" alt="Counter-Proposal" title="Counter-Proposal"/>
																								</a>
																							</td>	
                                              <td align="center"  bgcolor="<?php echo $cor ?>">
                                                <a title="Aprova" onClick="aprovaProposta(<?php echo "'".$user."'" ?>, <?php echo "'".$ano."'" ?>, <?php echo "'".$mes."'" ?>,<?php echo "'".$r_horas_1[19]."'" ?>)" >
																									<img align="middle" src="assets/img/approve.png" width="20" border="0" alt="Accept" title="Accept"/>
																								</a>			
																							</td>
    	
                                              <td align="center"  bgcolor="<?php echo $cor ?>"> 																			
																								<a title="Rejeitar" onClick="declina(<?php echo "'".$user."'" ?>, <?php echo "'".$ano."'" ?>, <?php echo "'".$mes."'" ?>,<?php echo "'".$r_horas_1[19]."'" ?>)" >
																								<img align="middle" src="assets/img/reject.png" width="20" border="0" alt="Decline" title="Decline"/>
																								</a>
																							</td>
                                              
                                              <?php
                                              $dataMaisRecente = false; 
                                            }
                                            else
                                            {
                                              ?>
                                              <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ></td>	
                                              <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ></td>												
                                              <td class="texto_pequeno" Style="Color: #ffc451" bgcolor="<?php echo $cor ?>" ></td>	
                                            <?php
                                            }
                                              ?>	
						
			
																						</TR>
                                            
																		<?php
																		    }
																		?>
																		</table>
																	  </ul>	   
												<?php }	?>
                        </td>
									 
                   </tr>
                   </table>
												</div>
									
					




    </section><!-- End centro_mensagens Section -->

  </main><!-- End #main -->

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