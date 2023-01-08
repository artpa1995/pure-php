<?php

session_start();

if(!isset($_SESSION['user_id'])){
    header('location:../login.php');die;
}
include ('../config/connect.php');

$loged_in_user = $_SESSION['user_id'];

if(isset($_POST['submit'])){
    $target_dir = "../gallery/";
    foreach ($_FILES['image']['tmp_name'] as $key => $value) {
        $target_name = uniqid().basename($_FILES["image"]["name"][$key]);
        $target_name = trim($target_name);
        $target_file = $target_dir.$target_name;

        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check file size
        if ($_FILES["image"]["size"][$key] > 5000000000) {
            echo "Sorry, your file is too large.";
            die;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            die;
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $target_file)) {
            $insert = "INSERT INTO `gallery` (`user_id`,`name`) VALUES ('$loged_in_user','$target_name')";
            $query = mysqli_query($connect, $insert);
        }
    }
        if ($query) {
            header('location:gallery');
            die;
        }
}
