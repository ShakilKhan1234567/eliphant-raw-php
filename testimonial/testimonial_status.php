<?php
session_start();
require '../login_check.php';
require '../db.php';

$id = $_GET['id'];
$select = "SELECT * FROM testimonials WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

$select_count = "SELECT COUNT(*) as total FROM testimonials WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_count_assoc = mysqli_fetch_assoc($select_count_result); 

if($after_assoc['status'] == 0){
    if($after_count_assoc['total'] >= 5){
        $_SESSION['mx_test'] = 'Maximum 5 Item Allowed';
        header('location:testimonial.php');
    }
    $update = "UPDATE testimonials SET status=1 WHERE id=$id";
    mysqli_query($db_connect, $update);
    header('location:testimonial.php');
 
}
else{
    if($after_count_assoc['total'] <= 3){
        $_SESSION['min_test'] = 'Minimum 3 Item Allowed';
        header('location:testimonial.php');
    }
    else{
        $update = "UPDATE testimonials SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:testimonial.php');
    }
}
?>