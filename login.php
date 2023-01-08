<?php
session_start();
if(isset($_SESSION['admin_id'])){
    header('location:admin/index');
}

include 'layout/header.php';
?>

<form class="regform" action="logProcess.php" method="post">
    <h3 class="text-muted localization" caption="mutq">Մուտք</h3>
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" class="localization" caption="parol" name="password" placeholder="Գաղտնաբառ" required>
    <button type="submit" name="submit" value="Մուտք" class="localization" caption="mutq">Մուտք</button>
</form>

<?php
include 'layout/footer.php';
?>
