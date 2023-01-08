<?php 
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../login');
    die;
}
include('../config/connect.php');
include('../layout/header.php');

 //$select = mysqli_query($connect,"SELECT post.*,category.name FROM `post` INNER JOIN `category` on post.category_id = category.id");


										  
										   
?>

<div class="col-sm-2">
	<div class="catContainer">
	<h4>Categories</h4>
	<a class='categories d-block' href='#'>All</a>
	<?php 
	$sql = "SELECT `name` FROM `category`";
	
	if($res = mysqli_query($connect, $sql)) {
		while($row = mysqli_fetch_assoc($res)) {
			$category = ucwords($row['name']);
			echo "<a class='categories d-block' href='#'>$category</a>";
		}
	}
	
	?>
	</div>
	
</div>

<div id="postContainer" class="col-sm-8 mt-5">
apranqner

</div>


<?php 
include('../layout/footer.php');
?>