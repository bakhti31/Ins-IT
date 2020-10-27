<?php 

include 'template.php';

if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	if (delete("user",$id)) {
		// echo "<script>alert('berhasil dihapus');</script>";
	}else{
		// echo "<script>alert('Gagal dihapus');</script>";
	}
}
else if (isset($_GET['update'])) {
	$id=$_GET['update'];
	header('Location: http://localhost/DTSB/admin/updateuser.php?id='.$id);
}


 ?>

		<div class="row">
		    <div class="col">
		      <h1>Data Report</h1>
		      <hr>
		      <h3>Users Report</h3>
		      <a href="adduser.php" class="btn btn-primary">Tambah user</a>
		      <table class="table border-1 text-center">
		      	<thead>
		      		<th>Dates</th>
		      		<th>Username</th>
		      		<th>Fullname</th>
		      		<th>Gender</th>
		      		<th>Action</th>
		      	</thead>
		      	<?php 
		      		$query = read("user","*", "ORDER BY date DESC");
		      		while ($data = mysqli_fetch_assoc($query)) { 
		      	?>
		      	<tr>
		      		<td><?=substr($data['date'], 0,10);?></td>
		      		<td><?=$data['username']; ?></td>
		      		<td><?=$data['fullname']; ?></td>
		      		<td><?=$data['gender']; ?></td>
		      		<td>
		      			<a class="btn btn-danger" href="?delete=<?=$data['id'];?>">Delete</a>	
		      			<a class="btn btn-warning" href="?update=<?=$data['id'];?>">Update</a>
		      		</td>
		      	</tr>
		      	<?php
		      		}
		      	 ?>
		      </table>
		    </div>
		</div>
	