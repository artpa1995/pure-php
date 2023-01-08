<?php
include ('../config/connect.php');
$dleletimg="../gallery/";
if(isset($_GET ['id']) && !empty($_GET ['id'])){
    $name = $_GET ['id'];
    mysqli_query($connect,"DELETE FROM `basket` WHERE id = '$name'");
  
        if(file_exists($name)){
            unlink($name);
        }
        header("Location:gallery");
    }
else{
    header("Location:gallery");die;
}
?>