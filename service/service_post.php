<?php
session_start();
require '../login_check.php';
require '../db.php';

$main_title = $_POST['main_title'];
$description = $_POST['description'];

$insert = "INSERT INTO services(main_title, description)VALUES('$main_title', '$description')";
mysqli_query($db_connect, $insert);
header('location:service.php');

?>