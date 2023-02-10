<?php
session_start();


$idProject= $_GET["idProject"];
$idAction= $_GET["idAction"];
$idSender= $_GET["idSender"];
$idReceiver= $_GET["idReceiver"];
$sendDate= $_GET["sendDate"];
$type= $_GET["type"];
$proposalValue= $_GET["proposalValue"];
$proposalPercentage= $_GET["proposalPercentage"];
$counterProposalValue= $_GET["counterProposalValue"];
$counterProposalPercentage= $_GET["counterProposalPercentage"];
$Accept= $_GET["Accept"];
$PaymentConfirmed= $_GET["PaymentConfirmed"];

echo $idProject || "<br>";


echo $idAction;



?>


