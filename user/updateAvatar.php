<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header('location:../login.php');die;
}
include ('../config/connect.php');

$loged_in_user = $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $target_dir = "../uploads/";
    $target_name = uniqid(). basename($_FILES["image"]["name"]);
    $target_file = $target_dir . $target_name;

    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        die;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        
       die;
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $update = "UPDATE `users` SET `avatar`='$target_name' WHERE `id`='$loged_in_user'";
        $query = mysqli_query($connect,$update);
        if(isset($_POST['currentImg']) && !empty($_POST['currentImg'])){
            $currentImg = $_POST['currentImg'];
            if(file_exists($target_dir.$currentImg)){
                unlink($target_dir.$currentImg);
            }
        }
        if($query){
            header('location:profile');
            die;
        }
    }
}
