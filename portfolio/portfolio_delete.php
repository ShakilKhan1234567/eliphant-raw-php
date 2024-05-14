<?php
session_start();
require '../login_check.php';
require '../db.php';

$id = $_GET['id'];

$select_image = "SELECT * FROM portfolios WHERE id=$id";
$select_result = mysqli_query($db_connect, $select_image);
$after_assoc = mysqli_fetch_assoc($select_result);

$delete_from = '../upload/portfolio/'.$after_assoc['photo'];
unlink($delete_from);

$delete = "DELETE FROM portfolios WHERE id=$id";
mysqli_query($db_connect, $delete);
$_SESSION['delete'] = 'successfully deleted!';
header('location:portfolio.php');
?>