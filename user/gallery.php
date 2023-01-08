<?php
session_start();
$user_id = $_SESSION['user_id'];
if(!isset($user_id)){
    header('location:../login.php');
    die;
}
include "../config/connect.php";
include '../layout/header.php';

?>

</div>

<?php
    $num_row = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `basket`  WHERE `user_id`='$user_id'"));
    $limit = 2;
    $num_page = ceil($num_row/$limit);
    if(isset($_GET['pageId'])){
        $pageId = $_GET['pageId'];
    }
    else {
        $pageId = 1;
    }
    $offset = $limit*($pageId-1);

    $select = "SELECT * FROM `basket` WHERE `user_id`=$user_id ORDER BY `created_at` DESC LIMIT $limit OFFSET $offset ";

    $query = mysqli_query($connect, $select);

    for ($data = []; $row = mysqli_fetch_assoc($query); $data[] = $row);
    
?>
<div>
    <table class="table table-bordered">
        <?php foreach($data as $row):

                switch ($row['status']) {
                    case 0:
                        $row['status']="պատվերը սպասման մեջ է";
                        break;
                    case 1:
                        $row['status']="պատվերը ընդունվեց";
                        break;
                    case 2:
                        $row['status']="պատվերը ճանապահին է";
                        break;
                    default:
                    $row['status']="պատվերը սպասման մեջ է";    }
                
            ?>
                <tr>
                    <th class="ap">zakaz</th>
                    <td class="ap">qanak:<?=$row['score']; ?></td>
                    <td class="ap">apranqi anun: <?=$row['products_name']; ?></td>
                    <td class="ap">status:<?=$row['status']; ?></td>
                    <td class="ap">jamanak:<?=$row['created_at']; ?></td>
                </tr>
        <?php  endforeach; ?> 
    </table>
        <ul class="pagination ">
            <?php 
                for($i=1;$i<=$num_page;$i++){ 
                    $size = "" ;
                 
                  if($pageId == $i){
                    $size = "color:red;" ;
                  }
                  echo '<li><a style="'.$size.'" class="pagid" href="gallery.php?pageId='.$i.'" >'.$i.'</a></li>';
              }
            ?>
        </ul>   

</div>

<?php
include '../layout/footer.php';
