<?php
require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

$after_hash = password_hash($password , PASSWORD_DEFAULT);
$user_id = $_POST['user_id'];

if(!$password){
    $update = "UPDATE users SET name='$name', email='$email' WHERE id=$user_id";
    mysqli_query($db_connect, $update);
    header('location:users.php');
}
else{
    $update = "UPDATE users SET name='$name', email='$email', password='$after_hash' WHERE id=$user_id";
    mysqli_query($db_connect, $update);
    header('location:users.php');
}
?>