<?php 
    session_start(); 
    include ('../layout/header.php');
    require("../config/connect.php"); 
    if(isset($_POST['submit'])){ 
        
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        }   
    } 
    if(isset($_GET['page'])){     
        $pages=array("products", "cart");    
        if(in_array($_GET['page'], $pages)) {       
            $_page=$_GET['page'];      
        }else{     
            $_page="products";    
        }   
    }else{   
        $_page="products";   
    } 
?>  
    <div id="container" class="container">
        <div class="row">
        <div id="main" class="col-sm-9"> 
    <?php require($_page.".php")?>
        </div><!--end main-->    
        <div id="sidebar" class="col-sm-3"> 
        <h1 class="localization" caption="zambyux">Զամբյուղ</h1>  
<?php 
  
    if(isset($_SESSION['cart'])){ 
          
        $sql="SELECT * FROM products WHERE id IN ("; 
          
        foreach($_SESSION['cart'] as $id => $value) { 
            $sql.=$id.","; 
        } 
          
        $sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
        $query=mysqli_query($connect, $sql);
        if ($query) {
            # code...
     
        while($row=mysqli_fetch_array($query)){ 
              
        ?> 
        <form method="post" action="product.php"> 
            <p><?php echo $row['name'] ?> x <input type="number" class="btn btn karzi" name="quantity[<?php echo $row['id'] ?>]" value="<?php echo $_SESSION['cart'][$row['id']]['quantity'] ?>" />
                     <button type="submit" name="submit" class="localization btn btn-info" caption="Update">Թարմացնել զամբյուղը</button> 
             </p> 
        </form>
        <?php 
              
        } 
    } else{
        echo"<p class='localization' caption='chyntrel'>դուք չեք ընտրել ապրանք</>";
    }
    ?> 
        <hr /> 
        <a href="product.php?page=cart" class="localization btn btn-info" caption="zambyux">Զամբյուղ</a> 
    <?php 
          
    }else{ 
        echo "<p class='localization' caption='empty'>Ձեր զամբյուղը դատարկ է: Խնդրում ենք ավելացնել որոշ ապրանքներ.</>";
    } 
?>
        </div><!--end sidebar-->
    </div>
    </div><!--end container-->
</div>

</div>
<?php
     
include '../layout/footer.php';
