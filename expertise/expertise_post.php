<?php
session_start();
require '../login_check.php';
require '../db.php';

$topic = $_POST['topic'];
$percentage = $_POST['percentage'];

$insert = "INSERT INTO expertises(topic, percentage)VALUES('$topic', '$percentage')";
mysqli_query($db_connect, $insert);

header('location:expertise.php');
$_SESSION['success'] = 'Expertise added'
?>