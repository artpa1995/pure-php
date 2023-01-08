<?php 
 
 if(isset($_POST['submit'])){ 
       
   foreach($_POST['quantity'] as $key => $val) { 
       if($val==0) { 
           unset($_SESSION['cart'][$key]); 
       }else{ 
           $_SESSION['cart'][$key]['quantity']=$val; 
       } 
   } 
     
} 

   if(isset($_GET['action']) && $_GET['action']=="add"){ 
         
       $id=intval($_GET['id']); 
         
       if(isset($_SESSION['cart'][$id])){ 
             
           $_SESSION['cart'][$id]['quantity']++; 
             
       }else{ 
           
             
           $sql_s="SELECT * FROM products   WHERE id={$id}"; 
           $query_s=mysqli_query($connect, $sql_s ); 
           if(mysqli_num_rows($query_s)!=0){ 
               $row_s=mysqli_fetch_array($query_s); 
                 
               $_SESSION['cart'][$row_s['id']]=array( 
                       "quantity" => 1, 
                       "price" => $row_s['price'] 
                   ); 
                 
           }else{ 
        
               $message="This product id it's invalid!";    
           } 
             
       } 
         
   } 
  
?>

<nav class="navbar navbar-expand-sm navbar-dark">
 <form class="form-inline" action="" method="post">
   <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
   <button class="btn btn-info localization" type="submit"  caption="pntrel">Փնտրել</button>
 </form>
</nav>

<h1 class="localization" caption="produ">Ապրանքների ցուցակ</h1> 
<?php 
       if(isset($message)){ 
           echo "<h2>$message</h2>"; 
       } 
     
   ?> 
   
   <table> 
       <tr> 
           <th class="localization" caption="foto">Նկար</th>
           <th class="localization" caption="name">Անուն</th> 
           <th class="localization" caption="tesak">Տեսակ</th> 
           <th class="localization" caption="gin">Գին</th>
           <th class="localization" caption="or">Օր</th>
           <th class="localization" caption="patver">Պատվիրել</th> 
       </tr> 
     
       <?php 
       
   $loged_in_user = $_SESSION['user_id'];
   $select_query = "SELECT * FROM `users` WHERE `id`='$loged_in_user'";
   $result_id = mysqli_query($connect, $select_query);
   $user_data = mysqli_fetch_assoc($result_id);


  
 if(isset($_POST["search"])){
   $search_value=$_POST["search"];

   $sql=( "SELECT * FROM `products` WHERE `name` LIKE '%$search_value%' LIMIT 5");
   $query=mysqli_query($connect,$sql); 
     
   while ($row=mysqli_fetch_array($query)) { 
       
       if($user_data['gender'] == 'Male') {
            $row['price']= $row['price'];
       }
       else {
           $row['price']= $row['price']+(($row['price'])/100)*30;
       }
         
?> 
  <tr class="prod">  
           <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
           <td><?php echo $row['name'] ?></td> 
           <td><?php echo $row['description'] ?></td> 
           <td><?php echo $row['price'] ?>$</td> 
           <td><?php echo $row['days'] ?></td> 
           <td>
                <form method="post" action="product.php"> 
                   <button type="submit" class="btn btn-success" name="submit" class="localization btn btn-info" caption="Update"><i class="fas fa-shopping-cart"></i></button> 
                   <input type="number"  class="btn btn karz" name="quantity[<?php echo $row['id'] ?>]" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" />
                </form>
           </td> 
       </tr> 
       
       
<?php 
         
   } 
}else {
   $sql=( "SELECT * FROM `products` WHERE `name` LIMIT 5");
   $query=mysqli_query($connect,$sql); 
     
   while ($row=mysqli_fetch_array($query)) { 
      
       if($user_data['gender'] == 'Male') {
         $row['price']= $row['price'];
       }
       else {
           $row['price']= $row['price']+(($row['price'])/100)*30;
       } 
?> 
  <tr class="prod">  
           <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
           <td><?php echo $row['name'] ?></td> 
           <td><?php echo $row['description'] ?></td> 
           <td><?php echo $row['price'] ?>$</td> 
           <td><?php echo $row['days'] ?></td> 
           <td>
                <form method="post" action="product.php"> 
                   <button type="submit" class="btn btn-success" name="submit" class="localization btn btn-info" caption="Update"><i class="fas fa-shopping-cart"></i></button> 
                   <input type="number"  class="btn btn karz"  name="quantity[<?php echo $row['id'] ?>]" value="<?php echo isset($_SESSION['cart'][$row['id']]['quantity'])? $_SESSION['cart'][$row['id']]['quantity'] : 1; ?>" />
                </form>
           </td>
           
       </tr> 
       
       
<?php 
         
   }
}
?>
<?php
 
 if(isset($_POST["search"])){
   $search_value=$_POST["search"];

   $sql=( "SELECT * FROM `products` WHERE `category_id` LIKE '%$search_value%' LIMIT 5");
   $query=mysqli_query($connect,$sql); 
     
   while ($row=mysqli_fetch_array($query)) { 
       
       if($user_data['gender'] == 'Male') {

  $row['price']= $row['price'];
       }
       else {
           $row['price']= $row['price']+(($row['price'])/100)*30;
       }
         
?> 
  <tr class="prod">  
           <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
           <td><?php echo $row['name'] ?></td> 
           <td><?php echo $row['description'] ?></td> 
           <td><?php echo $row['price'] ?>$</td> 
           <td><?php echo $row['days'] ?></td> 
           <td>
                <form method="post" action="product.php"> 
                   <button type="submit" class="btn btn-success" name="submit" class="localization btn btn-info" caption="Update"><i class="fas fa-shopping-cart"></i></button> 
                   <input type="number"  class="btn btn karz"   name="quantity[<?php echo $row['id'] ?>]" value="<?php echo isset($_SESSION['cart'][$row['id']]['quantity'])? $_SESSION['cart'][$row['id']]['quantity'] : 1; ?>" />
                </form>
           </td>
           
       </tr> 
       
       
<?php 
         
   } 
}else {
   $sql=( "SELECT * FROM `products` WHERE `category_id` LIMIT 5");
   $query=mysqli_query($connect,$sql); 
     
   while ($row=mysqli_fetch_array($query)) { 
      
       if($user_data['gender'] == 'Male') {

  $row['price']= $row['price'];
       }
       else {
           $row['price']= $row['price']+(($row['price'])/100)*30;
       }
         
?> 
  <tr class="prod">  
           <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
           <td><?php echo $row['name'] ?></td> 
           <td><?php echo $row['description'] ?></td> 
           <td><?php echo $row['price'] ?>$</td> 
           <td><?php echo $row['days'] ?></td> 
           <td>
                <form method="post" action="product.php"> 
                   <button type="submit" class="btn btn-success" name="submit" class="localization btn btn-info" caption="Update"><i class="fas fa-shopping-cart"></i></button> 
                   <input type="number"  class="btn btn karz"   name="quantity[<?php echo $row['id'] ?>]" value="<?php echo isset($_SESSION['cart'][$row['id']]['quantity'])? $_SESSION['cart'][$row['id']]['quantity'] : 1; ?>" />
                </form>
           </td>
           
       </tr> 
       
       
<?php 
         
   }
}
?>
<!-- <a class="btn btn-success" href="product.php?page=products&action=add&id=<?php //echo $row['id'] ?>" caption="patver" class="localization"><i class="fas fa-shopping-cart"></i></a> -->
   </table>

<?php
   