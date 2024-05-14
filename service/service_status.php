<?php
session_start();
require '../login_check.php';
require '../db.php';

$id = $_GET['id'];
$select = "SELECT * FROM services WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_count = "SELECT COUNT(*) as total FROM services WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_count_assoc = mysqli_fetch_assoc($select_count_result); 

if($after_assoc['status'] == 0){
 if($after_count_assoc['total'] >= 6){
     $_SESSION['max_service'] = 'Maximum 6 Item Allowed';
     header('location:service.php');
 }
 else{
    $update = "UPDATE services SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:service.php');
 }
}
else{
    if($after_count_assoc['total'] <= 4){
        $_SESSION['min_service'] = 'Minimum 4 Item Allowed';
        header('location:service.php');
    }
    else{
        $update = "UPDATE services SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:service.php');
    }
}
?>