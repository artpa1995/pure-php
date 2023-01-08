<?php
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            
            $userId = "";
            if (isset($column[0])) {
                $userId = mysqli_real_escape_string($conn, $column[0]);
            }
            $userName = "";
            if (isset($column[1])) {
                $userName = mysqli_real_escape_string($conn, $column[1]);
            }
            $password = "";
            if (isset($column[2])) {
                $password = mysqli_real_escape_string($conn, $column[2]);
            }
            $firstName = "";
            if (isset($column[3])) {
                $firstName = mysqli_real_escape_string($conn, $column[3]);
            }
            $lastName = "";
            if (isset($column[4])) {
                $lastName = mysqli_real_escape_string($conn, $column[4]);
            }
            $work = "";
            if (isset($column[5])) {
                $work = mysqli_real_escape_string($conn, $column[5]);
            }
            
            $sqlInsert = "INSERT into product (product_code,name,img,about_pro,price,day)
                   values (?,?,?,?,?,?)";
            $paramType = "isssss";
            $paramArray = array(
                $userId,
                $userName,
                $password,
                $firstName,
                $lastName,
                $work
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>
<?php
include "layout/header.php";
?>





    <h2>Import CSV file into Mysql using PHP</h2>

    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>">
        <?php if(!empty($message)) { echo $message; } ?>
        </div>
    <div class="outer-scontainer">
        <div class="row">

            <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport"
                enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn-submit">Import</button>
                    <br />

                </div>

            </form>

        </div>
               <?php
            $sqlSelect = "SELECT * FROM product";
            $result = $db->select($sqlSelect);
            if (! empty($result)) {
                ?>
            <table id='userTable'>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>User Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>

                </tr>
            </thead>
<?php
                
                foreach ($result as $row) {
                    ?>
                    
                <tbody>
                <tr>
                    <td><?php  echo $row['product_code']; ?></td>
                    <td><?php  echo $row['name']; ?></td>
                    <td><?php  echo $row['img']; ?></td>
                    <td><?php  echo $row['about_pro']; ?></td>
                    <td><?php  echo $row['price']; ?></td>
                    <td><?php  echo $row['day']; ?></td>
                </tr>
                    <?php
                }
                ?>
                </tbody>
        </table>
        <?php } ?>
    </div>

<?php include "layout/footer.php"; ?>

<?php /*
use Phppot\DataSource;

require_once 'DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();

if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 100000, ",")) !== FALSE) {
            
            $product_code = "";
            if (isset($column[0])) {
                $product_code = mysqli_real_escape_string($conn, $column[0]);
            }
            $name = "";
            if (isset($column[1])) {
                $name = mysqli_real_escape_string($conn, $column[1]);
            }
            $img = "";
            if (isset($column[2])) {
                $img = mysqli_real_escape_string($conn, $column[2]);
            }
            $about_pro = "";
            if (isset($column[3])) {
                $about_pro = mysqli_real_escape_string($conn, $column[3]);
            }
            $price = "";
            if (isset($column[4])) {
                $price = mysqli_real_escape_string($conn, $column[4]);
            }
            $day = "";
            if (isset($column[5])) {
                $day = mysqli_real_escape_string($conn, $column[5]);
            }
           
            
            
            $sqlInsert = "INSERT into `product` (`product_code`,`name`,`img`,`about_pro`,`price`,`day`)
                   values (?,?,?,?,?,?)";
            $paramType = "issss";
            $paramArray = array(
                $product_code,
                $name,
                $img,
                $about_pro,
                $price,
                $day
            );
            $insertId = $db->insert($sqlInsert, $paramType, $paramArray);
            
            if (! empty($insertId)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}*/
?>