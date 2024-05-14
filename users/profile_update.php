<?php
session_start();
require '../login_check.php';
require '../db.php';

$name = $_POST['name'];
$old_password = $_POST['old_password'];
$password = $_POST['password'];

$after_hash = password_hash($password, PASSWORD_DEFAULT);
$user_id = $_POST['user_id'];
$user_pass = "SELECT * FROM users WHERE id=$user_id";
$user_pass_result = mysqli_query($db_connect, $user_pass);
$after_assoc = mysqli_fetch_assoc($user_pass_result);


if($password){
   if(password_verify($old_password, $after_assoc['password'])){
    $update = "UPDATE users SET name='$name', password='$after_hash' WHERE id=$user_id";
    mysqli_query($db_connect,  $update);
    header('location:profile.php');
    $_SESSION['update'] = 'Profile Updated';
   }
   else{
    header('location:profile.php');
    $_SESSION['wrong_pass'] = 'Password Does Not Match';
   }
}
else{
    $update = "UPDATE users SET name='$name' WHERE id=$user_id";
    mysqli_query($db_connect,  $update);
    header('location:profile.php');
    $_SESSION['update'] = 'Profile Updated';
}

?>