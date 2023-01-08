<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include '../config/connect.php';
if(isset($_POST['create'])){
    if(isset($_POST['cat']) && !empty($_POST['cat'])){
        $cat = $_POST['cat'];
    }
    else{
        header('location:category?failed=Category is missing!');

        die;
    }
	$sql = "SELECT `name` FROM `category` WHERE `name`='$cat' LIMIT 1";
	if($select = mysqli_query($connect, $sql)){
		if(mysqli_num_rows($select) > 0) {
			header('location:category?exists=Category already exists!');
		}
		else {
			$insert = mysqli_query($connect,"INSERT INTO `category` (`name`) VALUES ('$cat')");
			if($insert){
				header('location:category?success=Category is created!');

			}
		}
	}

    
}


include "layout/header.php"; ?>


<div class="col-md-4">

    <h2 class="text-center">Create Category</h2>
    <form  method="post">
        <div class="form-group">
            <label for="cat">Category Name</label>
            <input type="text" class="form-control" name="cat" id="cat">
        </div>
        <?php 
		if(isset($_GET['failed'])) {
            $msg = $_GET['failed'];
            echo "<p id='createCategoryMsg' class='alert alert-danger'>  $msg </p>";
        }
        elseif(isset($_GET['success'])) {
            $msg = $_GET['success'];
            echo "<p id='createCategoryMsg' class='alert alert-success'>  $msg </p>";
        }
		elseif(isset($_GET['exists'])) {
			$msg = $_GET['exists'];
			echo "<p id='createCategoryMsg' class='alert alert-danger'> $msg </p>";
		}
        ?>
        <input type="submit" class="btn btn-default" value="Create" name="create">
    </form>
    

</div>




<?php include "layout/footer.php"; ?>
