<?php 

include 'template.php';
if (isset($_POST['title'])) {
	$title 		= $_POST['title'];
	$content 	= $_POST['content'];
	$date 		= date("Y-m-d H:i:s");
	$tags 		= $_POST['tags'];
	$query = post("info",$title,$content,$tags,$date,"0");
	if ($query) {
		header("Location: http://localhost/DTSB/admin/information.php");
	}else{
		header("Location: http://localhost/DTSB/admin/addinfo.php?error=1");
	}
}


 ?>
<div class="row">
  <div class="col">
  	<h1>Create Informasi</h1>
	<form action="" method="post" class="form">
		<label for="title">Title</label>
		<input type="text" class="form-control" placeholder="Title" id="title" name="title">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control" cols="30" rows="5"></textarea>
		<label for="tags">Tags</label>
		<input type="text" class="form-control" id="tags" name="tags" placeholder="Tags"><br>
		<button class="btn btn-primary">Submit</button>
	</form>
	<?php if (isset($_GET['error'])): ?>
		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		  <strong>Sorry</strong> Can't Create please contact Bakhti admin
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		  </button>
		</div>
	<?php endif ?>
  </div>
</div>

 <?php 

include 'endtemplate.php';

  ?>