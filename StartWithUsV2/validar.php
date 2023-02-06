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
    $select = mysqli_query ($conn,"SELECT idUser FROM users WHERE email = '$email' AND token = '$token'");
    if(mysqli_num_rows($select) > 0){
        $update = mysqli_query ($conn, "UPDATE users SET emailValidation = 1, token = '', status = 1, dateModified = '$currentDate'  WHERE email = '$email'");
    } echo 
    "<script> alert('Email validado com sucesso!'); window.location.href='login.php'; </script>";
    }
}

?>

