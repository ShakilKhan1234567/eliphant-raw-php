<?php
session_start();
require '../login_check.php';
require '../db.php';

$title = $_POST['title'];
$action_name = $_POST['action_name'];
$action_link = $_POST['action_link'];

$update = "UPDATE works SET title='$title', action_name='$action_name', action_link='$action_link'";
mysqli_query($db_connect, $update);
$_SESSION['update_work'] = 'Successfully Updated';
header('location:work_together.php');

?>