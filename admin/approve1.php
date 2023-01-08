<?php
include ('../config/connect.php');

if(isset($_GET ['id']) && !empty($_GET ['id'])) {
    $id = $_GET ['id'];
    $update = "UPDATE `basket` SET `status`=2 WHERE `id`='$id'";
    $query = mysqli_query($connect,$update);

    if($query){
        $select = mysqli_query($connect,"SELECT `status` FROM `basket` WHERE `status`=2 AND `id`='$id'");
        $row = mysqli_fetch_assoc($select);
        $arr = [

            'msg' => 'Status successfuly was updated!',
            'status' =>$row['status']
        ];

        echo json_encode($arr);
    }

}

