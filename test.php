<?php
session_start();
include 'config/connect.php';
include 'config/functions.php';

/*$column_names = array('first_name', 'last_name', 'email');
$sql = sql_select($connect,'users', $column_names);
echo '<pre>';
var_dump(mysqli_fetch_assoc($sql));
echo '</pre>';*/

$fname = 'dfdsf';
$lname = 'sdfdsfdsf';

$data = [
    'first_name' => $fname,
    'last_name' => $lname
];

$cond = [
    'id' => 88
];
/*$query = sql_delete($connect,'users',$cond);*/

/*$query = sql_update($connect, 'users',$data,$cond );*/

/*$query = sql_insert($connect, 'users',$data );
if($query){
    echo '1';
}*/

$column_names =['first_name', 'last_name', 'email'];
$sql = sql_select($connect,'users',$cond,'first_name');
?>