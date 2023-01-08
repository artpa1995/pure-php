<?php
include ('../config/connect.php');




?>
<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>



<?php


?>
<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">
</form>

<?php
$search_value=$_POST["search"];
//$con=new mysqli($servername,$username,$password,$dbname);
if($connect->connect_error){
    echo 'Connection Faild: '.$connect->connect_error;
    }else{
        $sql=( "SELECT * FROM `products` WHERE `name` LIKE '%$search_value%'");

        $res=$connect->query($sql);

        while($row=$res->fetch_assoc()){
           


            }       

        }
?>
<?php 
        if(isset($message)){ 
            echo "<h2>$message</h2>"; 
        } 
      
    ?> 
    <table> 
        <tr> 
            <th>Name</th> 
            <th>Description</th> 
            <th>Price</th> 
            <th>Action</th> 
        </tr> 
      
        <?php 
  
    $sql="SELECT * FROM `products`  WHERE `name` LIKE '%$search_value%'"; 
    $query=mysqli_query($connect,$sql); 
      
    while ($row=mysqli_fetch_array($query)) { 
          
?> 
        <tr> 
            <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td><?php echo $row['price'] ?>$</td> 
            <td><?php echo $row['days'] ?></td> 
            <td><a href="product.php?page=products&action=add&id=<?php echo $row['id'] ?>">Add to cart</a></td>  
        </tr> 
<?php 
          
    } 
  
?>
    </table>
    