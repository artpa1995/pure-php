<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include '../config/connect.php';
$num_row = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM `basket`"));

$limit = 10;
$num_page = ceil($num_row/$limit);
if(isset($_GET['pageId'])){
    $pageId = $_GET['pageId'];
}
else {
    $pageId = 1;
}
$offset = $limit*($pageId-1);

$select = "SELECT * FROM `basket` ORDER BY `created_at` DESC LIMIT $limit OFFSET $offset";
$query = mysqli_query($connect,$select);




include "layout/header.php";
?>
    <table class="table table-bordered">
            <tr>
               
                <th>Id</th>
                <th>User Id</th>
                <th>user-phone</th>
                <th>product-name</th>
                <th>Status</th>
                <th>qanak</th>
                <th>Created At</th>
                <th>Approved/Delete</th>
            </tr>
            
        <?php while ($row=mysqli_fetch_assoc($query)){ 

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
                <td><?=$row['id']; ?></td>
                <td><?=$row['user_id']; ?></td>
                <td><?=$row['user_phone']; ?></td>
                <td><?=$row['products_name']; ?></td>
                <td><?= $row['status']; ?></td>
                <td><?=$row['score']; ?></td>
                <td><?=$row['created_at']; ?></td>
                <td>
              
              
              
                
                 <div><a href="#" data-id="<?=$row['id'] ?>" class="btn btn-info approve" role="button" <?php echo ($row['status']==1) ? 'disabled' : '';   ?>>Approved</a></div>
                 <div><a href="#" data-id="<?=$row['id'] ?>" class="btn btn-info approve1" role="button" <?php echo ($row['status']==2) ? 'disabled' : '';   ?>>Approved1</a></div>
                 <div><a href="#" data-id="<?=$row['id'] ?>" class="btn btn-info approve2" role="button" <?php echo ($row['status']==3) ? 'disabled' : '';   ?>>Approved1</a></div>


         
                
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?=$row['id']; ?>">Delete</button>

                            <!-- Modal -->
                            <div id="<?=$row['id']; ?>" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Are you sure you want permanently delete selected item(s)?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="delete.php?id=<?=$row['id']  ?>" class="btn btn-danger" role="button">Yes</a>
                                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>

                                        </div>
                                    </div>

                                </div>
                            </div>

                </td>

            </tr>
        <?php  } ?>

    </table>

    <center>
        <ul class="pagination ">
            <?php for($i=1;$i<=$num_page;$i++){  ?>
            <li><a class="pagid" href="<?=$i ?>" ><?=$i ?></a></li>
            <?php  } ?>
        </ul>
    </center>

</div>




<?php include "layout/footer.php"; ?>
