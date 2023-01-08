<?php

include('../config/connect.php');

if(isset($_POST['exp']) && !empty($_POST['exp'])){
	
	$exp = $_POST['exp'];
	$select_query = mysqli_query($connect, "SELECT * FROM `products` WHERE `name` LIKE '%$exp%'");

	if(mysqli_num_rows($select_query)){
		while($row = mysqli_fetch_assoc($select_query)){
			$posts[] = $row;
		}
	}
	else {
		$posts = [
		    'error' => 'Your search did not give any result'
        ];
	}
	
	echo json_encode($posts);die;
}


$select = mysqli_query($connect, "SELECT `name` FROM `products`");

if(mysqli_num_rows($select)){
    while($row = mysqli_fetch_assoc($select)){
        $posts[] = $row['name'];
    }
    echo json_encode($posts);die;
}

	
?>