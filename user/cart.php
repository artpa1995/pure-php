<?php 
session_start(); 
  $user_id = isset($_SESSION['user_id'])? $_SESSION['user_id'] : '';
  if(isset($_POST['submit'])){ 
        
      foreach($_POST['quantity'] as $key => $val) { 
          if($val==0) { 
              unset($_SESSION['cart'][$key]); 
          }else{ 
              $_SESSION['cart'][$key]['quantity']=$val; 
          } 
      }    
  } 
  if(isset($_GET['page']) && $_GET['page'] == 'delete'){ 

 
    unset($_SESSION['cart'][$_GET['id']]); 
    header('location: product.php?page=cart');die;
   
} 
 
  if(isset($_POST['submitt'])){
    

    $sql="SELECT * FROM products WHERE id IN ("; 
                      
    foreach($_SESSION['cart'] as $id => $value) { 
        $sql.=$id.","; 
    } 
      
    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
    $query=mysqli_query($connect, $sql); 
    $totalprice=0; 
    if ($query) {
    while($row=mysqli_fetch_array($query)){ 
        $proname=$row['name'];
        $subtotal=$_SESSION['cart'][$row['id']]['quantity']; 
        $sqll = "SELECT `phone` FROM `users` WHERE `id`='$user_id'";
        $queryy = mysqli_query($connect, $sqll);
        $roww = mysqli_fetch_array($queryy);
        $user_phone = $roww['phone'];
        $a = [
            'user_id'=> $user_id,
        'proname'=>$proname,
        'subtotal'=> $subtotal,
        'user_phone'=> $user_phone,
        ];
        $ins = "INSERT INTO `basket` (`user_id`,`products_name`,`score`,`user_phone`) VALUES ('$user_id','$proname','$subtotal','$user_phone')";
        $insert = mysqli_query($connect,"INSERT INTO `basket` (`user_id`,`products_name`,`score`,`user_phone`) VALUES ('$user_id','$proname','$subtotal','$user_phone')");
//    echo "<pre>";
//         print_r($ins);
//    print_r($a);
   
}
// die;
    if($insert){
       
        echo"<p class='localization patver' caption='yntrel'>Պատվերը կատարված է</>";
       if(!isset($_SESSION['cart'])){
        header('location: product');die;
       }

    }else{
        echo "chexav";die;
    }
}else{
    echo"<p class='localization' caption='chyntrel'>Դուք չեք ընտրել ապրանք</>";
}
   
  }


?> 
<h1 class="localization" caption="View">Զամբյուղի պարունակություն</h1> 
<a href="product.php" class='localization btn btn-info' caption='veradarnal' style="border: 1px solid ;">Վերադառնալ ապրանքներին</a> 
<form method="post" action="product.php?page=cart"> 
      
    <table> 
          
        <tr> 
        <th class="localization" caption="foto">Նկար</th>
        <th class="localization" caption="name">Անուն</th> 
        <th class="localization" caption="Quantity">Քանակ</th> 
        <th class="localization" caption="gin">Գին</th>
        <th class="localization" caption="Items">Ապրանքների արժեք</th> 
        </tr> 
          
        <?php 
         
            $sql="SELECT * FROM products WHERE id IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
                    $query=mysqli_query($connect, $sql); 
                    $totalprice=0; 
                    if ($query) {
                        
                   
                    while($row=mysqli_fetch_array($query)){ 
                        $subtotal=$_SESSION['cart'][$row['id']]['quantity']*$row['price']; 
                        $totalprice+=$subtotal; 
                    ?> 
                        <tr> 
                            <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
                            <td><?php echo $row['name'] ?></td> 
                            <td><input type="number" class="btn btn karzi" name="quantity[<?php echo $row['id'] ?>]" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" /></td> 
                            <td><?php echo $row['price'] ?>$</td> 
                            <td><?php echo $_SESSION['cart'][$row['id']]['quantity']*$row['price'] ?>$</td> 
                            <td><a style="border:1px solid; border-radius:5px; padding:3px" href="cart.php?page=delete&action=delete&id=<?php echo $row['id'] ?>">X</a></td> 
                        </tr> 
                    <?php 
                          
                    } 
                }else{
                    echo"<p class='localization' caption='chyntrel'>Դուք չեք ընտրել ապրանք</>";
                }
        ?> 
                    <tr> 
                        <td colspan="4" class="localization" caption="Total">Ընդհանուր գումար: </td>
                        <td colspan="4" ><?php echo $totalprice ?> </td>
                    </tr> 
          
    </table> 
    <br /> 
    <button type="submit" name="submit" class="localization btn btn-info" caption="Update">Թարմացնել զամբյուղը</button> 
    <button type="submit" name="submitt" class="localization btn btn-success" caption="Order">Պատվիրել</button> 
</form> 
<br /> 
<!-- <p class="localization" caption="jnjel">Ապրանքը ջնջելու համար նրա քանակը դարձրեք 0</p> -->
