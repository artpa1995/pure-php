<?php
session_start();
include('../config/connect.php');
include '../config/functions.php';

if(isset($_GET['data'])){

    $id = $_GET['data'];
}
$sql = mysqli_query($connect,
    "SELECT products.*,category.name,products.name,products.description,products.price
            FROM `products` 
            INNER JOIN `category` 
            on products.name = category.id,products.id = products.name
            WHERE products.id = '$id';
            ");
if(mysqli_num_rows($sql)) {
    $row = mysqli_fetch_assoc($sql);
}
else{
    header('location:blog');
};

$output = time_elapsed_string($row['created_at']);

include "../layout/header.php";

?>
    <div class="col-sm-8 mx-auto text-center" >
        <p>
            <span class="autor">Created By <?=$row['name'].' '.$row[''].' '.$output ?></span>
            <span>Category: <?=$row['name'] ?></span>
        </p>
        <h1> <?=$row['price'] ?>  </h1>
        <img src="../uploads/<?=$row['img'] ?>" alt="" class="img-fluid ">
        <p><?=$row['description'] ?></p>


    </div>






<?php
include "../layout/footer.php";


