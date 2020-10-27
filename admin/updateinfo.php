<?php 

include 'template.php';

$id=0;
if ($_GET['id']) {
	$id=$_GET['id'];
}else{
	header("Location: http://localhost/DTSB/admin/information.php");
}

$query=read("info","*","WHERE id=".$id);
$fetch=mysqli_fetch_assoc($query);

if (isset($_POST['title'])) {
	$title 		= $_POST['title'];
	$content 	= $_POST['content'];
	$tags 		= $_POST['tags'];
	$creator 	= $fetch['creator'];
	$date 		= date("Y-m-d H:i:s");
	$query 		= updatepost("info",$id,$title,$content,$tags,$date,$creator);
	echo $query;
	if ($query) {
		header("Location: http://localhost/DTSB/admin/information.php");
	}else{
		header("Location: http://localhost/DTSB/admin/updateinfo.php?id=$id&error=1");
	}
}



 ?>
<div class="row">
  <div class="col">
  	<h1>Update Information</h1>
	<form action="" method="post" class="form">
		<label for="title">Title</label>
		<input type="text" class="form-control" placeholder="Title" id="title" name="title" value="<?php echo $fetch['title']; ?>">
		<label for="content">Content</label>
		<textarea name="content" id="content" class="form-control" cols="30" rows="5"><?php echo $fetch['content']; ?></textarea>
		<label for="tags">Tags</label>
		<input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="<?php echo $fetch['tags']; ?>"><br>
		<button class="btn btn-primary">Submit</button>
	</form>
  </div>
</div>

 <?php 

include 'endtemplate.php';

  ?>