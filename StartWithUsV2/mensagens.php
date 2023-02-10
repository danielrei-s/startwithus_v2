<?php
session_start();
include ("connect.php");
$idUser = $_SESSION["id"];
$idProjeto= $_GET["idProjeto"];

$owner= $_GET["owner"];

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
      if($owner == "n")
      {

   
    ?> 

    <form action="gravamensagem.php" method="post">
      <label for="id"style="display:none;">ID:</label>
      <input type="hidden" id="id" name="id">

      <label for="idProject"style="display:none;">ID Project:</label>
      <input type="hidden" id="idProject" name="idProject">

      <label for="idAction"style="display:none;">ID Action:</label>
      <input type="hidden" id="idAction" name="idAction">

      <label for="idSender"style="display:none;">ID Sender:</label>
      <input type="hidden" id="idSender" name="idSender">

      <label for="senderName"style="display:none;">Nome Emissor:</label>
      <input type="hidden" id="idSender" name="<?php echo $userFirstName ?>">

      <label for="idReceiver"style="display:none;">ID Receiver:</label>
      <input type="hidden" id="idReceiver" name="idReceiver">

      <label for="sendDate">Data de Envio:</label>
      <input type="text" id="sendDate" name="sendDate" value="<?php echo date('d-m-Y H:i:s'); ?>"><br><br>


      <label for="type"style="display:none;">Type:</label>
      <input type="hidden" id="type" name="type">

      <label for="proposalValue">Valor da proposta:</label>
      <input type="number" id="proposalValue" name="proposalValue" step="0.01"><br><br>


      <label for="proposalPercentage">Percentagem pretendida:</label>
      <input type="number" id="proposalPercentage" name="proposalPercentage" step="0.01"><br><br>

      <label for="counterProposalValue"style="display:none;">Counter Proposal Value:</label>
      <input type="hidden" id="counterProposalValue" name="counterProposalValue">

      <label for="counterProposalPercentage"style="display:none;">Counter Proposal Percentage:</label>
      <input type="hidden" id="counterProposalPercentage" name="counterProposalPercentage">

      <button type="button" onclick="AcceptProposal()">Accept Proposal</button><br><br>

      <label for="PaymentConfirmed"style="display:none;">Payment Confirmed:</label>
      <input type="hidden" id="PaymentConfirmed" name="PaymentConfirmed"><br><br>

      <input type="button" value="Enviar">
      </form>
  
          <?php
      }
    ?>
  </body >

  </html>

