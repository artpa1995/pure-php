<?php
session_start();
include('../config/connect.php');
function category($parent_id=0,$mark=''){
    global $connect;
    $select = mysqli_query($connect,"SELECT * FROM `category` WHERE `parent_id`='$parent_id'");
    if(mysqli_num_rows($select)){
        while ($data = mysqli_fetch_assoc($select)){
            $name = $data['name'];
            $catId = $data['id'];
            echo "<option value=$catId> $mark $name </option>";
            category($catId,'---');
        }
    }
}

include ('../layout/header.php')
?>

<div class="offset-md-3 col-md-6 py-3">
	<h3 class="display-4 text-center mb-3">Create Post</h3>
	<form action="insertprocess.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		<label for="categorySelect">Category</label>
		<select name="category" class="form-control" id="categorySelect">
            <?php category();  ?>
		</select>
	  </div>
	   <div class="form-group">
		<label for="postImage" class="btn btn-outline-info">Choose Post Main Image</label>
		<input name="main_image" type="file" class="d-none" id="postImage">
	  </div>
	  <div class="form-group">
		<label for="titleInput">Title</label>
		<input name="title" type="text" class="form-control" id="titleInput" placeholder='Title for your post' >
	  </div>
	  <div class="form-group">
		<label for="contentTextarea">Content</label>
		<textarea name="content" class="form-control" id="contentTextarea" rows="6"></textarea>
	  </div>
	  <input name="publish" class="btn btn-outline-info float-right" type="submit" value="publish">
	</form>
</div>


<?php 
include('../layout/footer.php')
?>