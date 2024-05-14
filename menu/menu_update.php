<?php
session_start();
require '../login_check.php';
require '../db.php';

$id = $_GET['id'];

$select = "SELECT * FROM menus WHERE id=$id";
$select_result = mysqli_query($db_connect, $select);
$select_result_assoc = mysqli_fetch_assoc($select_result);

$select_count = "SELECT COUNT(*) as total FROM menus WHERE status=1";
$select_count_result = mysqli_query($db_connect, $select_count);
$after_count_assoc = mysqli_fetch_assoc($select_count_result);

if($select_result_assoc['status'] == 0){
    if($after_count_assoc['total'] >= 6){
        $_SESSION['max_expertise'] = 'Maximum 6 item allowed';
        header('location:menu.php');
     }
     else{
        $update = "UPDATE menus SET status=1 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:menu.php');
     }
}
else{
    if($after_count_assoc['total'] <= 4){
        $_SESSION['min_expertise'] = 'Minumun 4 item allowed';
        header('location:menu.php');
     }
     else{
        $update = "UPDATE menus SET status=0 WHERE id=$id";
        mysqli_query($db_connect, $update);
        header('location:menu.php');
     }
   
}
?>