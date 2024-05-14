<?php
require '../db.php';
$id = $_GET['id'];
$delete_expertise = "DELETE FROM expertises WHERE id=$id";
mysqli_query($db_connect, $delete_expertise);
header('location:expertise.php');
?>