<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include ('../config/connect.php');

if(isset($_GET['userId'])){     
   $id = $_GET['userId'];
   if(mysqli_query($connect,"DELETE FROM `users` WHERE id = '$id'")){
    header("Location:users");die;
   } 
}
header("Location:users");die;
?>
