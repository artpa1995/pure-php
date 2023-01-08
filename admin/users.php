<?php
session_start();
if(!isset($_SESSION['admin_id'])){
    header('location:../login');
    die;
}
include '../config/connect.php';
include "layout/header.php";

$select_query = "SELECT * FROM `users`";
$result = mysqli_query($connect, $select_query);
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
?>
         
<table class="table-bordered">
    <tr>
        <th>ID</th>
        <th>FIRST NAME</th>
        <th>LAST NAME</th>
        <th>IMG</th>
        <th>EMAIL</th>
        <th>PHONE</th>
        <th>DATE</th>
        <th>ROLE</th>
    </tr>
    <? foreach($data as $el): ?>
        <tr>
            <td><?=$el['id']?></td> 
            <td><?=$el['first_name']?></td> 
            <td><?=$el['last_name']?></td> 
            <td><?if(isset($el['avatar'])): ?><img src="../uploads/<?=$el['avatar']?>" alt="" style="width: 120px; height:100px"><? endif;?></td>  
            <td><?=$el['email']?></td> 
            <td><?=$el['phone']?></td> 
            <td><?=$el['created_at']?></td> 
            <td>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><?=$el['role']?>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="userRole.php?userRole=user&id=<?=$el['id']?>">user</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="1" href="userRole.php?userRole=admin&id=<?=$el['id']?>">admin</a></li>
                    </ul>
                </div>      
            </td>  
            <td><a class="btn btn-danger" href="deluser.php?userId=<?=$el['id']?>">DELETE</a></td>   
        </tr>
    <? endforeach; ?>
</table>
<?php include "layout/footer.php"; ?>

