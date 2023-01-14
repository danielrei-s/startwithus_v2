<?php 
require "connect.php";

if($_GET){
    if(isset($_GET["email"])){
        $email = $_GET["email"];
        if($email == ''){
            unset($email);
        }
    }
    if(isset($_GET["token"])){
        $token = $_GET["token"];
        if($token == ''){
            unset($token);
        }
}
if(!empty($email) && !empty($token)){
    $select = mysqli_query ($db,"SELECT idUtilizador FROM utilizadores WHERE email = '$email' AND token = '$token'");
    if(mysqli_num_rows($select) > 0){
        $update = mysqli_query ($db, "UPDATE utilizadores SET validaEmail = 1, token = '', status = 1, dataModificacao = '$currentDate'  WHERE email = '$email'");
    } echo 
    "<script> alert('Email validado com sucesso!'); window.location.href='login.php'; </script>";
    }
}

?>

