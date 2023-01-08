<?php
session_start();
if(isset($_SESSION['user_id'])){
	header('location:user/profile');
}
if(isset($_SESSION['admin_id'])){
    header('location:admin/index');
}
	include 'layout/header.php';
?>

<div class="container-fluid" >

	<div class="container ">
	
	<div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
    <li data-target="#demo" data-slide-to="3"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="uploads/arajin.jpg" alt="Los Angeles" width="1100" height="450">
    </div>
    <div class="carousel-item">
      <img src="uploads/erkrord.jpg" alt="Chicago" width="1100" height="450">
    </div>
    <div class="carousel-item">
      <img src="uploads/erorrd.jpg" alt="New York" width="1100" height="450">
    </div>
    <div class="carousel-item">
      <img src="uploads/chororrd.jpg" alt="New York" width="1100" height="450">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>

	</div>

</div>	

<div class="container-fluid" >


	<div class="container ">
  <a href="https://internet.am/hosting-packages">domain u hosting</a>
		
	
  <nav class="navbar navbar-expand-sm navbar-dark po">
  <form class="form-inline" action="" method="post">
    <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
    <button class="btn btn-info localization" type="submit" name="submit"  caption="pntrel">Փնտրել</button>
  </form>
</nav>
  <table class="cucak"> 
        <tr> 
            <th class="localization" caption="foto">Նկար</th>
            <th class="localization" caption="name">Անուն</th> 
            <th class="localization" caption="tesak">Տեսակ</th> 
            <th class="localization" caption="gin">Գին</th>
            <th class="localization" caption="or">Օր</th>
            
        </tr> 
      
        <?php 
      require("config/connect.php"); 
      if(isset($_POST["search"])){
      $search_value=$_POST["search"];
  $sql=( "SELECT * FROM `products` WHERE  `name` LIKE '%$search_value%' LIMIT 5");
    $query=mysqli_query($connect,$sql); 
      
  while ($row=mysqli_fetch_array($query)) { 
      /*  if($user_data['gender'] == 'Male') {

   $row['price']= $row['price'];
        }
        else {
            $row['price']= (($row['price'])*100)/30;
        }*/
        
        $row['price']= (($row['price'])/100)*30;
?> 
   <tr class="prod"> 
            <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td><?php echo $row['price'] ?>$</td> 
            <td><?php echo $row['days'] ?></td>  
        </tr> 
        
        
<?php 
          
    } 
      
?>
<?php
 $sql=( "SELECT * FROM `products` WHERE   `category_id` LIKE '%$search_value%' LIMIT 5");
    $query=mysqli_query($connect,$sql); 
      
  while ($row=mysqli_fetch_array($query)) { 
      /*  if($user_data['gender'] == 'Male') {

   $row['price']= $row['price'];
        }
        else {
            $row['price']= (($row['price'])*100)/30;
        }*/
        
        $row['price']= (($row['price'])/100)*30;
?> 
   <tr class="prod"> 
            <td><img src="../uploads/<?=$row['img']; ?>" width="100"></td>
            <td><?php echo $row['name'] ?></td> 
            <td><?php echo $row['description'] ?></td> 
            <td><?php echo $row['price'] ?>$</td> 
            <td><?php echo $row['days'] ?></td>  
        </tr> 
        
        
<?php 
          
    } 
      }
?>
<!--<a class="btn btn-success" href="product.php?page=products&action=add&id=<?php /* echo $row['id']*/ ?>" caption="patver" class="localization"><i class="fas fa-shopping-cart"></i></a>-->
    </table>
    <div class="row">
				<div class="col-sm-3" style="background-color:lavender;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and</div>
				<div class="col-sm-3" style="background-color:lavenderblush;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,</div>
				<div class="col-sm-3" style="background-color:lavender;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap i</div>
				<div class="col-sm-3" style="background-color:lavenderblush;">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also thenchanged. </div>
			</div>
    </div>
     
	</div>
<?php 
	include 'layout/footer.php';
?>