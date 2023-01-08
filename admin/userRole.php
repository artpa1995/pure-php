<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include ('../config/connect.php');

if(isset($_GET['userRole']) && isset($_GET['id'])){     
    $role = $_GET['userRole'];
    $id = $_GET['id'];

    if($role == 'admin'){
        $update = "UPDATE `users` SET `role` = 2 WHERE `id`='$id'";
        $query = mysqli_query($connect,$update);
    }
    if($role == 'user'){
        $update = "UPDATE `users` SET `role` = 1 WHERE `id`='$id'";
        $query = mysqli_query($connect,$update);
    }
}
header("Location:users");die;
?>
