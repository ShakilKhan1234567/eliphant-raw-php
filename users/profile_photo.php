<?php
session_start();
require '../login_check.php';
require '../db.php';

$photo = $_FILES['photo'];
$after_explode = explode('.',$photo['name']);
$extension = end($after_explode);
$allow_extension = array ('jpg','JPG','PNG','png','gif','GIF');
$user_id = $_SESSION['id'];

$select = "SELECT * FROM users WHERE id=$user_id";
$select_result = mysqli_query($db_connect, $select);
$after_assoc = mysqli_fetch_assoc($select_result);

if($after_assoc['photo'] == null){
    if(in_array($extension, $allow_extension)){
        if($photo['size'] <=4000000){
         $file_name = $user_id.'.'.$extension;
         $new_location = '../upload/user/'.$file_name;
         move_uploaded_file($photo['tmp_name'], $new_location);
         
         $update = "UPDATE users SET photo='$file_name' WHERE id=$user_id";
         mysqli_query($db_connect, $update);
         $_SESSION['photo_update'] = 'Photo Successfully Updated';
         header('location:profile.php');
        }
        else{
            $_SESSION['size'] = 'Maximum Size 4MB';
            header('location:profile.php');
        }
    }
    else{
        $_SESSION['extension_err'] = 'Extension Must Be Type Of jpg, png, gif';
        header('location:profile.php'); 
    }
}
else{
    $delete_from ='../upload/user/'.$after_assoc['photo'];
    unlink($delete_from); 
    
    if(in_array($extension, $allow_extension)){
        if($photo['size'] <=4000000){
         $file_name = $user_id.'.'.$extension;
         $new_location = '../upload/user/'.$file_name;
         move_uploaded_file($photo['tmp_name'], $new_location);
         
         $update = "UPDATE users SET photo='$file_name' WHERE id=$user_id";
         mysqli_query($db_connect, $update);
         $_SESSION['photo_update'] = 'Photo Successfully Updated';
         header('location:profile.php');
        }
        else{
            $_SESSION['size'] = 'Maximum Size 4MB';
            header('location:profile.php');
        }
    }
    else{
        $_SESSION['extension_err'] = 'Extension Must Be Type Of jpg, png, gif';
        header('location:profile.php'); 
    }
}

?>