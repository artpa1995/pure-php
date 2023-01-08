<?php
include 'config/connect.php';

if(isset($_POST['email'])){

    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $select = "SELECT email FROM `users` WHERE `email`='$email'";
        $query =  mysqli_query($connect, $select);
        if(mysqli_num_rows($query)){
            $arr = [
                'error'=>"$email is already exists!",
            ];
        }
    } 
    
    elseif(empty($email)){
        $arr = [
            'error'=>"Email is missing",
        ];
    }
    else{

        $arr = [
            'error'=>"$email is not a valid email address"
        ];
    }

    echo json_encode($arr);die;

}

