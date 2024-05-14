<?php
session_start();
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$email_exist = "SELECT COUNT(*) AS total FROM users WHERE email = '$email'";
$email_exist_result = mysqli_query($db_connect, $email_exist );
$after_assoc = mysqli_fetch_assoc($email_exist_result);

if($after_assoc['total'] == 1 ){
$user_pass = "SELECT * FROM users WHERE email= '$email'";
$pass_exist_result = mysqli_query($db_connect, $user_pass);
$after_assoc_pass = mysqli_fetch_assoc($pass_exist_result );

if(password_verify($password, $after_assoc_pass['password'])){
    $_SESSION['login_success'] = 'login successfully';
    $_SESSION['id'] = $after_assoc_pass['id'];
    header('location:dashboard.php');
    }
    else{
        header('location:login.php');
        $_SESSION['password_exist'] = 'password does not exist';
    }
    
}
else{
    header('location:login.php');
    $_SESSION['eml_exist'] = 'Email does not exist';
}







?>