<?php

include 'template.php';

$id=0;
if ($_GET['id']) {
	$id=$_GET['id'];
}else{
	header("Location: http://localhost/DTSB/admin/tutorial.php");
}

$query=read("tutorial","*","WHERE id=".$id);
$fetch=mysqli_fetch_assoc($query);



if (isset($_POST['title'])) {
	$title 		= $_POST['title'];
	$content 	= $_POST['content'];
	$tags 		= $_POST['tags'];
	$creator 	= $fetch['creator'];
	$date 		= date("Y-m-d H:i:s");
	$query = updatepost("tutorial",$id,$title,$content,$tags,$date,$creator);
	echo $query;
	if ($query) {
		header("Location: http://localhost/DTSB/admin/tutorial.php");
	}else{
		header("Location: http://localhost/DTSB/admin/updatetutor.php?id=$id&error=1");
	}
}

 ?>
<div class="row">
  <div class="col">
  	<h1>Update Tutorial</h1>
	<form action="" method="post" class="form">
		<label for="title">Title</label>
		<input type="text" class="form-control" placeholder="Title" id="title" name="title" value="<?php echo $fetch['title']; ?>">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control" cols="30" rows="5"><?php echo $fetch['content']; ?></textarea>
		<label for="tags">Tags</label>
		<input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="<?php echo $fetch['tags']; ?>"><br>
		<button class="btn btn-primary">Submit</button>
		<?php if (isset($_GET['error'])): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Error When adding user</strong> please contact admin bakhti for detail
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
		<?php endif ?>
	</form>
  </div>
</div>

 <?php 

include 'endtemplate.php';

  ?>