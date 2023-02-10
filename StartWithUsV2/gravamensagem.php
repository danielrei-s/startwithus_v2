<?php
session_start();
include ("connect.php");

 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    // collect value of input field
    $idProject= $_POST["idProject"];
    $idAction= $_POST["idAction"];
    $idSender= $_POST["idSender"];
    $idReceiver= $_POST["idReceiver"];
    $sendDate= date('Y-m-d');
    $mFlag= $_POST["mFlag"];
    $proposalValue= $_POST["proposalValue"];
    $proposalPercentage= $_POST["proposalPercentage"];
    $counterProposalValue= $_POST["counterProposalValue"];
    $counterProposalPercentage= $_POST["counterProposalPercentage"];
    $sql = "INSERT INTO messages (idProject, idAction, idSender, idReceiver,sendDate, mFlag,proposalValue, proposalPercentage, counterProposalValue, counterProposalPercentage, Accept, PaymentConfirmed) 
    VALUES ('".$idProject."','".$idAction."','".$idSender."','".$idReceiver."','".$sendDate."','".$mFlag."','".$proposalValue."','".$proposalPercentage."','".$counterProposalValue."','".$counterProposalPercentage."','0','0')";
    // $sql="insert into messages (idProject, user_validator ,ano, mes) values ('".$utilizador."','".$validador."','".$ano."','".$mes."')";
    $rs = mysqli_query($conn,$sql);
    ?>
    <script>
         window.history.back();
    </script>
<?php
}





?>


