<?php
session_start();

include '../config/connect.php';
if(isset($_POST['first_name']) && isset($_POST['last_name'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$loged_user = $_SESSION['user_id'];
	$sql_update = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name' WHERE `id`='$loged_user'";
	$query_update = mysqli_query($connect, $sql_update);
	if($query_update) {
		$sql_select = "SELECT `first_name`, `last_name` FROM `users` WHERE `id`='$loged_user'";
		$query_select = mysqli_query($connect, $sql_select);
		$array = mysqli_fetch_assoc($query_select);
	}
	echo json_encode($array);
}