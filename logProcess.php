<?php
session_start();
include 'config/connect.php';
if (isset($_POST['email']) && isset($_POST['password'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $query = "SELECT * FROM `users` WHERE `email`='$email'";
    $result = mysqli_query($connect,$query);

    $data = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)){
        if (password_verify($password,$data['password'])) {
                 if($data['role']=='user'){
                   $_SESSION['user_id']= $data['id'];

                   header('location:user/profile');die;
                 }  else{
                    $_SESSION['admin_id']= $data['id'];
                    header('location:admin/index');die;
                 }
        }
        else{
            header('location:login');die;
        }
    } else{
        header('location:login');die;
    }

}

?>