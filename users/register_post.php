<?php
session_start();

require '../db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$con_pass = $_POST['con_pass'];
$gender = $_POST['gender'];

// password criteria start
$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[!,#,$,%,^,&,*,-,+]@', $password);
// password criteria end

// email validation start
$valid = filter_var($email, FILTER_VALIDATE_EMAIL);
// email validation end

$flag = false;

// name err start
if(!$name){
    $flag = true;
    $_SESSION['name_err'] = 'Please Enter Your Name!';
}
else{
    $_SESSION['old_name'] = $name;
}
// name err end

// email err start
if(!$email){
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email!';
}
else{
    if(!$valid){
        $flag = true;
        $_SESSION['old_email'] = $email;
        $_SESSION['email_err'] = 'Please Enter Valid Email !';
    }
    else{
        $_SESSION['old_email'] = $email;
    }
}
// email err end

// password err start
if(!$password){
    $flag = true;
    $_SESSION['password_err'] = 'Please Enter Your Password!';
}
else{
    $_SESSION['old_password'] = $password;
    if(!$upper){
        $flag = true;
        $_SESSION['password_err'] = 'Please Enter UpperCase!';
    }
    if(!$lower){
        $flag = true;
        $_SESSION['password_err'] = 'Please Enter lowerCase!';
    }
    if(!$number){
        $flag = true;
        $_SESSION['password_err'] = 'Please Enter Number!';
    }
    if(!$spsl){
        $flag = true;
        $_SESSION['password_err'] = 'Please Enter Special Character!';
    }
    if(strlen($password) < 6){
        $flag = true;
        $_SESSION['password_err'] = 'Mn 6 Character!';
    }
}
// password err end

// con pass err start
if(!$con_pass){
    $flag = true;
    $_SESSION['con_pass_err'] = 'Please Confirm Your Password!';
}
else{
    $_SESSION['old_con_pass'] = $con_pass;
    if($con_pass != $password){
        $flag = true;
        $_SESSION['con_pass_err'] = 'Please Confirm Your Password!';
    }
}

// gender err start
if(!$gender){
    $flag = true;
    $_SESSION['gender_err'] = 'Please Select Your Gender!';
}
else{
    $_SESSION['old_gender'] = $gender;
}
// gender err end



if($flag){
    header('location:users.php');
}
else{
    $_SESSION['success'] = 'Registration Successfully !';
    header('location:users.php');
    
    $after_hash = password_hash($password, PASSWORD_DEFAULT);
    $insert = "INSERT INTO users(name, email, password, gender)VALUE('$name', '$email', '$after_hash ', '$gender')";
    mysqli_query( $db_connect,  $insert);
}

?>