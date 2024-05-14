<?php
session_start();
require '../login_check.php';
require '../db.php';

$title = $_POST['title'];
$sub_title = $_POST['sub_title'];

$insert = "INSERT INTO portfolios(title, sub_title)VALUES('$title', '$sub_title')";
mysqli_query($db_connect, $insert);
header('location:portfolio.php');
$last_id = mysqli_insert_id($db_connect);

$photo = $_FILES['photo'];
$after_explode = explode('.',$photo['name']);
$extension = end($after_explode);
$file_name = $last_id.'.'.$extension;
$new_location = '../upload/portfolio/'.$file_name;
move_uploaded_file($photo['tmp_name'], $new_location);

$update = "UPDATE portfolios SET photo='$file_name' WHERE id=$last_id";
mysqli_query($db_connect, $update);
$_SESSION['success'] = 'Successfully Updated';
header('location:portfolio.php');

?>