<?php 
session_start();
include('../config/connect.php');
$arr = [];
if (isset($_POST['category']) && $_POST['category']!='All'){
    $cat_name = $_POST['category'];
    $sql = mysqli_query($connect,"SELECT products.*,category.name FROM `products` INNER JOIN `category` on products.category_id = category.id WHERE category.name='$cat_name'");
   // var_dump( $sql);
} else{
    $sql = mysqli_query($connect,"SELECT products.*,category.name FROM `products` INNER JOIN `category` on products.category_id = category.id");
//var_dump( $sql);
}

 while ($data = mysqli_fetch_assoc($sql)){
    $arr[] = $data;

}

echo json_encode($arr);

?>