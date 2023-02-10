<?php
session_start();
include ("connect.php");
$idUser = $_SESSION["id"];
// $idProjeto= $_GET["idProjeto"];
$idProject= "2";


// $owner= $_GET["owner"];
$owner= "4";

$result = mysqli_query($conn,"SELECT * FROM users WHERE idUser = $idUser");
  $row = mysqli_fetch_assoc($result);
  $userFirstName = $row["firstName"];
  $userLastName = $row["lastName"];
?>

<html>
   <head> 

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
  
  <style>
      pi {
        background-color: #ffc451;
        color: #fff;
        padding: 15px 30px 20px 40px;
      }

      form {
      width: 500px;
      margin: 0 auto;
      text-align: left;
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
   }

   label {

        color: #ffc451;
     
      font-weight: bold;
      margin-top: 10px;
      display: block;
   }

   input[type="text"], input[type="email"], input[type="date"], select {
      width: 100%;
      padding: 10px;
      margin-top: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
   }

   input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      background-color: #444444;
      color: #ffc451;
      border: none;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
   }

   input[type="submit"]:hover {
      background-color: #ffc451;
      color: #444444;
   }
    </style>

  </head> 
  
  <body>  



    <?php
      if($owner == "4")
      {
        $projectsOwners =  mysqli_query($conn, "SELECT Distinct idOwner FROM Projects WHERE idProject = $idProject");
        $projectsOwner = mysqli_fetch_assoc($projectsOwners);
        $projOwner = $projectsOwner["idOwner"];
        $comIteractions = mysqli_query($conn,"SELECT distinct * FROM messages WHERE (idSender = $idUser or idSender = $projOwner) and (idReceiver = $projOwner or idReceiver = $idUser) ");
        $comIteraction = mysqli_fetch_assoc($comIteractions);
        if($comIteraction){
          $idAction= $comIteraction["idAction"]  ;
        }else{
          $getMaxidActions = mysqli_query($conn,"SELECT * FROM messages ORDER BY idAction DESC LIMIT 0, 1");
          $getMaxidAction = mysqli_fetch_assoc($getMaxidActions);        
          $idAction=  $getMaxidAction["idAction"] + 1;
        }
        $idSender= $idUser;
        $idReceiver= $projectsOwner["idOwner"];
        // $sendDate= now();
        $mFlag= "0";
        $proposalValue= "0";
        $proposalPercentage= "0";
        $counterProposalValue= "0";
        $counterProposalPercentage= "0";
        $Accept= "0";
        $PaymentConfirmed= "0";
    ?> 
</br></br></br></br></br></br></br>
    <form action="gravamensagem.php" method="post">
      <label for="id"style="display:none;">ID:</label>
      <input type="hidden" id="id" name="id">

      <label for="idProject"style="display:none;">ID Project:</label>
      <input type="hidden" id="idProject" name="idProject" value="<?php  echo $idProject ?>">

      <label for="idAction"style="display:none;">ID Action:</label>
      <input type="hidden" id="idAction" name="idAction" value="<?php  echo $idAction ?>">

      <label for="idSender"style="display:none;">ID Sender:</label>
      <input type="hidden" id="idSender" name="idSender" value="<?php  echo $idSender ?>">

      <!-- <label for="senderName"style="display:none;">Nome Emissor:</label>
      <input type="hidden" id="idSender" name="<?php echo $userFirstName ?>"> -->

      <label for="idReceiver"style="display:none;">ID Receiver:</label>
      <input type="hidden" id="idReceiver" name="idReceiver" value="<?php  echo $idReceiver ?>">

      <label for="sendDate">Data de Envio:</label>
      <input type="text" id="sendDate" name="sendDate" size="10" value="<?php echo date('d-m-Y'); ?>"><br><br>


      <label for="type"style="display:none;">mFlag:</label>
      <input type="hidden" id="type" name="mFlag" value="<?php  echo $mFlag ?>">

      <label for="proposalValue">Valor da proposta:</label>
      <input type="number" id="proposalValue" name="proposalValue"  value="<?php  echo $proposalValue ?>" step="0.01"><br><br>


      <label for="proposalPercentage">Percentagem pretendida:</label>
      <input type="number" id="proposalPercentage" name="proposalPercentage"  value="<?php  echo $proposalPercentage ?>" step="0.01"><br><br>

      <label for="counterProposalValue"style="display:none;">Counter Proposal Value:</label>
      <input type="hidden" id="counterProposalValue" name="counterProposalValue" value="<?php  echo $counterProposalValue ?>">

      <label for="counterProposalPercentage"style="display:none;">Counter Proposal Percentage:</label>
      <input type="hidden" id="counterProposalPercentage" name="counterProposalPercentage" value="<?php  echo $counterProposalPercentage ?>">

      <label for="PaymentConfirmed"style="display:none;">Payment Confirmed:</label>
      <input type="hidden" id="PaymentConfirmed" name="PaymentConfirmed" value="<?php  echo $PaymentConfirmed ?>"><br><br>
      <input type="image" name="submit" border="0" src="assets/img/sendButton.png" alt="Send"> 
      
      </form>
  
          <?php
      }
    ?>
  </body >

  </html>

