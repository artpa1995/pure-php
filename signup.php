<?php
session_start();
if(isset($_SESSION['admin_id'])){
    header('location:admin/index');
}
include 'layout/header.php';
?>

<form class="regform" action="regProcess.php" method="post">
	<h3 class="text-muted localization"  caption="grancvel">Գրանցվել</h3>
	<input type="text" name="first_name" class="localization" caption="anun"  placeholder="Անուն" required value="<?php echo (isset($_SESSION['first'])) ? $_SESSION['first'] : ''; ?>">
        <?php  if(isset($_SESSION['error_f'])){
            echo "<div class='alert alert-danger alert-dismissible fade show'><button type='button' class='close' data-dismiss='alert'>&times;</button>"
                    .$_SESSION['error_f'].
                 "</div>";
        };unset($_SESSION['error_f']);  ?>
	<input type="text" name="last_name" class="localization" caption="azganun" placeholder="Ազգանուն" required>
	<input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" >
<input type="text" id="phone" name="phone"class="localization" caption="heraxos"  placeholder="Հեռ․․․ " required>

		<span id="error_email"></span>
	<input type="password" name="password" class="localization" caption="parol" placeholder="Գաղտնաբառ" required>
	<input type="password" name="confPassword" class="localization" caption="krknakiparol"  placeholder="Կրկնեք գաղտնաբառը" required>
	<label class="localization" caption="irav">
		
		Իրավաբանական անձ
	</label><input type="radio" name="gender" value="Male">
	<label class="localization" caption="fiz">Ֆիզիկանական անձ</label>	<input type="radio" name="gender" value="Female">
	
	<button type="submit" name="submit"  class=" localization"  caption="grancvel">Գրանցվել</button>
</form>

<?php
include 'layout/footer.php';
?>
