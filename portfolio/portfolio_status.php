<?php
session_start();
require '../login_check.php';
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM portfolios WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_count = "SELECT COUNT(*) as total FROM portfolios WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$select_count_assoc = mysqli_fetch_assoc($select_count_result);

if($after_assoc['status'] == 0){

    $update = "UPDATE portfolios SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:portfolio.php');

}
else{
  if($select_count_assoc['total'] <= 5){
    $_SESSION['min_port'] = "Minimum 5 Item Allowed";
    header('location:portfolio.php');
  }
  else{
    $update = "UPDATE portfolios SET status=0 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:portfolio.php');
  }

}
?>