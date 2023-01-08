<?php
session_start();

include '../config/connect.php';
$loged_in_user = $_SESSION['user_id'];
if(isset($_POST['oldpass'])&& isset($_POST['newpass']) && isset($_POST['confpass'])){

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];
    $confpass = $_POST['confpass'];

    $select = "SELECT password FROM `users` WHERE `id`='$loged_in_user'";
    $query = mysqli_query($connect,$select);
    $row = mysqli_fetch_assoc($query);

    if(password_verify($oldpass,$row['password'])){

        if($newpass==$confpass){

            $newpass = crypt($newpass);
            $update = "UPDATE `users` SET `password`='$newpass' WHERE `id`='$loged_in_user'";
            $query1 = mysqli_query($connect,$update);
            if($query1){
                session_destroy();
                header('location:../login.php');die;
            }

        }
        else{
            header('location:profile.php');die;
        }
    }
    else{
        header('location:profile.php');die;
    }

}