<?php
session_start();
require '../login_check.php';
require '../db.php';

$sub_title = $_POST['sub_title'];
$main_title = $_POST['main_title'];
$description = $_POST['description'];
$action_name = $_POST['action_name'];
$action_link = $_POST['action_link'];

$banner_img= $_FILES['banner_photo'];
$after_explode = explode('.',$banner_img['name']);
$extension = end($after_explode);
$allow_extension = array('jpg', 'png','gif', 'JPG', 'PNG', 'GIF');

$select = "SELECT * FROM banners";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($banner_img['name'] == ''){
    $update = "UPDATE banners SET sub_title='$sub_title', main_title='$main_title', description='$description', action_name='$action_name', action_link= '$action_link'";
    mysqli_query($db_connect, $update);
    $_SESSION['text_update'] = 'Successfully Updated';
    header('location:banner.php');
}
else{
    $delete_from = '../upload/banner'.$after_assoc['banner_photo'];
    unlink($delete_from);
   if(in_array($extension, $allow_extension )){
        if($banner_img['size'] <= 4000000){
            $file_name = 'banner'.'.'.$extension;
            $new_location = '../upload/banner/'.$file_name;
            move_uploaded_file($banner_img['tmp_name'], $new_location);

            $update = "UPDATE banners SET sub_title='$sub_title', main_title='$main_title', description='$description', action_name='$action_name', action_link= '$action_link', banner_photo='$file_name'";
            mysqli_query($db_connect, $update);
            $_SESSION['photo_update'] = 'Successfully Updated';
            header('location:banner.php');
        }
   }
    else{

    }
    
}
?>