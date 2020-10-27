<?php 

include 'template.php';

if (isset($_GET['delete'])) {
	// $id=$_GET['delete'];
	// if (delete("request",$id)) {
		// echo "<script>alert('berhasil dihapus');</script>";
	// }else{
		// echo "<script>alert('Gagal dihapus');</script>";
	// }
}
else if (isset($_GET['update'])) {
	$id=$_GET['update'];
	header('Location: http://localhost/DTSB/admin/updatereq.php?id='.$id);
}


 ?>
		<div class="row">
		    <div class="col">
		      <h1>Data Report</h1>
		      <hr>
		      <h3>Request Report</h3>
		      <table class="table border-1 text-center">
		      	<thead>
		      		<th>Date</th>
		      		<th>Title</th>
		      		<th>Creator</th>
		      		<th>Content</th>
		      		<th>Action</th>
		      	</thead>
		      	<?php 
		      		$query = read("request","*");
		      		while ($data = mysqli_fetch_assoc($query)) { 
		      	?>
		      	<tr>
		      		<td><?=substr($data['date'], 0,10);?></td>
		      		<td><?=substr($data['title'], 0, 30); ?></td>
		      		<?php 
	      		    	$whois=read("user","username","WHERE id=".$data['creator']);
	      		    	$who=mysqli_fetch_assoc($whois);
	      		    ?>
	      			<td><?=$who['username']?:"admin" ?></td>
		      		<td><?=substr($data['content'], 0, 25); ?></td>
		      		<td>
		      			<a class="btn btn-warning" href="?update=<?=$data['id'];?>">Update</a>
		      		</td>
		      	</tr>
		      	<?php
		      		}
		      	 ?>
		      </table>
		    </div>
		</div>
	