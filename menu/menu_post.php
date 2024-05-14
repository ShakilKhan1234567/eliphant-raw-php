<?php
session_start();
require '../login_check.php';
require '../db.php';

$menu_name = $_POST['menu_name'];

$insert = "INSERT INTO menus(menu_name)VALUES('$menu_name')";
mysqli_query($db_connect, $insert);
header('location:menu.php');
?>