<?php
session_start();
require '../login_check.php';
require '../db.php';

$description = $_POST['description'];
$name = $_POST['name'];
$name_about = $_POST['name_about'];

$insert = "INSERT INTO testimonials(description, name, name_about, photo)VALUES('$description', '$name', '$name_about', '$photo')";
mysqli_query($db_connect, $insert);
header('location:testimonial.php');
$id = mysqli_insert_id($db_connect);

$photo = $_FILES['photo'];
$after_explode = explode('.', $photo['name']);
$extension = end($after_explode);
$file_name = $id.'.'.$extension;
$new_location = '../upload/testimonial/'.$file_name;
move_uploaded_file($photo['tmp_name'], $new_location);

$update = "UPDATE testimonials SET photo='$file_name' WHERE id=$id";
mysqli_query($db_connect, $update);
$_SESSION['success'] = "Successfully Updated";
header('location:testimonial.php');
?>