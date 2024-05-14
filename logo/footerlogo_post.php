<?php
session_start();
require '../login_check.php';
require '../db.php';

$logo = $_FILES['footer_logo'];
$after_explode = explode('.', $logo['name']);
$extension = end($after_explode);
$allowed_extension = array ( 'png','PNG','jpg', 'JPG', 'gif');

$select = "SELECT * FROM footer_logos";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['logo'] == null){
  if(in_array($extension, $allowed_extension )){
    if($logo['size'] <= 4000000){
      $file_name ='footer_logo'.'.'.$extension;
      $new_location = '../upload/logo/'. $file_name;
      move_uploaded_file($logo['tmp_name'], $new_location);
      $_SESSION['logo_success'] = 'Logo Successfully Changed';
      header('location:logo.php');
    }
    else{
     $_SESSION['logo_size_err'] = 'Maximum Size 4MB';
     header('location:logo.php');
    }
 }
 else{
     $_SESSION['logo_err'] = 'Logo Must Be Type Of  png';
     header('location:logo.php');
 }
}
else{
 $delete_from = '../upload/logo/'.$after_assoc['logo'];
 unlink( $delete_from );

 if(in_array($extension, $allowed_extension )){
  if($logo['size'] <= 4000000){
    $file_name ='footer_logo'.'.'.$extension;
    $new_location = '../upload/logo/'. $file_name;
    move_uploaded_file($logo['tmp_name'], $new_location);
    $_SESSION['footerlogo_success'] = 'Logo Successfully Changed';

    $update = "UPDATE footer_logos SET logo= '$file_name'";
    mysqli_query($db_connect, $update);
    header('location:logo.php');
  }
  else{
   $_SESSION['footer logo_size_err'] = 'Maximum Size 4MB';
   header('location:logo.php');
  }
}
else{
   $_SESSION['footerlogo_err'] = 'Logo Must Be Type Of  png';
   header('location:logo.php');
}
}
?>