<?php 

include 'template.php';

if (isset($_GET['delete'])) {
	$id=$_GET['delete'];
	if (delete("info",$id)) {
		// echo "<script>alert('berhasil dihapus');</script>";
	}else{
		// echo "<script>alert('Gagal dihapus');</script>";
	}
}
else if (isset($_GET['update'])) {
	$id=$_GET['update'];
	header('Location: http://localhost/DTSB/admin/updateinfo.php?id='.$id);
}


 ?>
		<div class="row">
		    <div class="col">
		      <h1>Data Report</h1>
		      <hr>
		      <h3>Information Report</h3>
		      <a href="addinfo.php" class="btn btn-primary">Tambah Data</a>
		      <table class="table border-1 text-center">
		      	<thead>
		      		<th>Date</th>
		      		<th>Title</th>
		      		<th>Creator</th>
		      		<th>Tags</th>
		      		<th>Action</th>
		      	</thead>
		      	<?php 
		      		$query = read("info","*");
		      		while ($data = mysqli_fetch_assoc($query)) { 
		      	?>
		      	<tr>
		      		<td><?=substr($data['date'], 0,10);?></td>
		      		<td><?=substr($data['title'], 0, 20)."..."; ?></td>
		      		<?php 
	      		    	$whois=read("user","username","WHERE id=".$data['creator']);
	      		    	$who=mysqli_fetch_assoc($whois);
	      		    ?>
	      			<td><?php echo $who['username']?:"admin" ?></td>
		      		<td><?=$data['tags'] ?></td>
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
	