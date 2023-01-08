<?php
session_start();
include 'config/connect.php';

if(isset($_POST['submit'])){
    if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
        $first_name = mysqli_real_escape_string($connect,$_POST['first_name']);
        $_SESSION['first'] = $first_name;
    } else{

        $_SESSION['error_f'] = "Firstname is missing";
        header('location:signup.php');die;
    }
    if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
        $last_name = mysqli_real_escape_string($connect,$_POST['last_name']);
    } else{

        $_SESSION['error_l'] = "Lastname is missing";
        header('location:signup.php');die;
    }

    if(isset($_POST['email']) && !empty($_POST['email'])){
        $email = $_POST['email'];
        $select = "SELECT email FROM `users` WHERE `email`='$email'";
        $query =  mysqli_query($connect, $select);
        if(mysqli_num_rows($query)){
            header('location:signup.php');die;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $_SESSION['error_e'] = "$email is not a valid email address";
            header('location:signup.php');die;
        }
    } else{
        $_SESSION['error_e'] = "Email is missing";
        header('location:signup.php');die;
    }
    $confPassword = $_POST['confPassword'];
    if(isset($_POST['password']) && !empty($_POST['password'])){
        $password = mysqli_real_escape_string($connect,$_POST['password']);
    } else{

        $_SESSION['error_p'] = "Password is missing";
        header('location:signup.php');die;
    }

    if(isset($_POST['gender']) && !empty($_POST['gender'])){
        $gender = $_POST['gender'];
    } else{

        $_SESSION['error_g'] = "Gender is missing";
        header('location:signup.php');die;
    }
    if(isset($_POST['phone']) && !empty($_POST['phone'])){
        $phone = $_POST['phone'];
    } else{

        $_SESSION['error_b'] = "phone is missing";
        header('location:signup.php');die;
    }

    if($confPassword==$password){
        $password = crypt($password, '$1$rasmusle$');
        $insert = "INSERT INTO `users` (`first_name`,`last_name`, `email`, `password`, `gender`, `phone`) VALUES ('$first_name','$last_name', '$email', '$password', '$gender', '$phone')";
        $query = mysqli_query($connect, $insert);
        if($query){
            header('location:login.php');
        } else{
            $_SESSION['error_m'] = 'Something went wrong';
            header('location:signup.php');die;
        }
    } else{

        header('location:signup.php');die;
    }

}