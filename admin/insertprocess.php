<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
$loged_user =1;

include('../config/connect.php');

if(isset($_POST['publish'])) {
  
    $target_dir = "../uploads/";
    $target_name = /*uniqid().*/ basename($_FILES["main_image"]["name"]);
    $target_file = $target_dir . $target_name;


    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        die;
    }

    $content = $_POST['content'];
    $category = $_POST['categoryyy'];
    $title = $_POST['gin'];
    $orer = $_POST['orer'];
    $kategor = $_POST['kategor'];
   // $a = "INSERT INTO `products`(`name`, `description`, `price`, `img`, `days`, `category_id`) VALUES ('$category','$content','$title','$target_name', '$orer', ' $kategor')";

    // echo "<pre>";
    // print_r($a);
    // die;

    if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {
      //  $post_query = mysqli_query($connect,"INSERT INTO `post`(`content`, `category_id`, `title`,`img`) VALUES ('$content','$category', '$title','$target_name')");

$post_query = mysqli_query($connect,"INSERT INTO `products`(`name`, `description`, `price`, `img`, `days`, `category_id`) VALUES ('$category','$content','$title','$target_name', '$orer', ' $kategor')");

        if($post_query) {
            
            header('location:editor.php');
        }else{
            echo"chexav1";
            die;
        }
    }else{
        echo"chexav2";
        die;
    }

}

?>
