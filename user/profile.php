<?php
	session_start();
	if(!isset($_SESSION['user_id'])){
		header('location:../login.php');die;
	}
	include ('../config/connect.php');

	$loged_in_user = $_SESSION['user_id'];
	$select_query = "SELECT * FROM `users` WHERE `id`='$loged_in_user'";
	$result_id = mysqli_query($connect, $select_query);
	$user_data = mysqli_fetch_assoc($result_id);
    
include ('../layout/header.php');

?>

<div class="container-fluid ">
	<div class="container user-cover-img flex-end">
		<div class="row flex-end">
			<div class="col-md-3">
				<?php
                if ($user_data['avatar']){
                    $img = $user_data['avatar'];
                    echo "<img src='../uploads/$img' width='240' height='240'>";
                } else {
                    if($user_data['gender'] == 'Male') {
                        echo '<img src="../images/maleavatar.jpg" width="240" height="240">';
                    }
                    else {
                        echo '<img src="../images/mexanik.jpg" width="240" height="240">';
                    }
                }

				?>
                <form action="updateAvatar" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" >
                    </div>
                    <input type="hidden" value="<?= $img; ?>" name="currentImg">
                    <input type="submit" name="submit" value="Change Image">
                </form>
			</div>
			<div class="col-md-3 align-bottom">
				<?php
					echo '<h2 id="username">';
					echo $user_data['first_name'].' '.$user_data['last_name'];
					echo '</h2>';
				?>
			</div>
			<div class=" col-md-3">
				<button id="edit-profile-btn" type="button" caption="editpro" class="btn btn-info float-right localization" data-toggle="modal" data-target="#editModal">Փոփոել էջը</button>
				
				<!-- Modal -->
				<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
					<div class="modal-content">
					  <div class="modal-header">
						<h5 class="modal-title localization" id="ModalLabel" caption="editpro">Փոփոել էջը</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						  <span aria-hidden="true">&times;</span>
						</button>
					  </div>
					  <div class="modal-body">
						<form method="post">
						  <div class="form-group">
							<input type="text" class="form-control" name="first_name" id="firstname" value="<?= $user_data['first_name']; ?>">
						  </div>
						  <div class="form-group">
							<input type="text" class="form-control" name="last_name" id="lastname" value="<?=  $user_data['last_name']; ?>">
						  </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                            <button type="submit" id="save_changes" name="chane"  class="btn btn-primary"><i class="fas fa-check-circle"></i></button>
                        </form>
					  </div>



					</div>
				  </div>
				</div>
			</div>
            <!-- Change Password-->

            <div class="col-md-3 ">
                <button id="change-pass-btn" type="button" class="btn btn-info float-right localization" data-toggle="modal" data-target="#changeModal" caption="chanjpass">Փոխել գաղտնաբառը</button>

                <!-- Modal -->
                <div class="modal fade" id="changeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="ModalLabel">Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="changePassword.php">
                                    <div class="form-group">
                                        <label for="oldpass">Old Password</label>
                                        <input type="password" class="form-control" name="oldpass" id="oldpass">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass">New Password</label>
                                        <input type="password" class="form-control" name="newpass" id="newpass">
                                    </div>
                                    <div class="form-group">
                                        <label for="confpass">Confirm Password</label>
                                        <input type="password" class="form-control" name="confpass" id="confpass">
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
                                    <button type="submit" id="save" name="changePass"  class="btn btn-primary"><i class="fas fa-check-circle"></i></button>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
		</div>




	</div>
</div>



<?php
include ('../layout/footer.php');
