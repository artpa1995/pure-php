<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../login');
    die;
}
$loged_user = $_SESSION['user_id'];

include('../config/connect.php');

if(isset($_POST['publish'])) {
    $target_dir = "../uploads/";
    $target_name = uniqid(). basename($_FILES["main_image"]["name"]);
    $target_file = $target_dir . $target_name;


    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        die;
    }

    $content = $_POST['content'];
    $category = $_POST['category'];
    $title = $_POST['title'];


    if (move_uploaded_file($_FILES["main_image"]["tmp_name"], $target_file)) {

        $post_query = mysqli_query($connect,"INSERT INTO `post`(`user_id`, `content`, `category_id`, `title`,`img`) VALUES ('$loged_user','$content','$category', '$title','$target_name')");
        if($post_query) {
            echo "exav";
            var_dump($content );
            var_dump( $category );
             var_dump( $title);
           var_dump($target_name );
           // header('location:blog');
        }
    }

}
//echo $_POST['content'];

?>