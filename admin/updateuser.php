<?php 


include 'template.php';

if (!isset($_GET['id']))
{
	header("Location: http://localhost/DTSB/admin/index.php");

}
else{
	$id=$_GET['id'];
	if (isset($_POST['username'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		if ($_POST['retype']!="") {
			$re=$_POST['retype'];
			$new=$_POST['newpassword'];
			if ($re==$new) {
				$password=$re;
			}else{
				header("Location: http://localhost/DTSB/admin/updateuser.php?id=$id&&error=1");
			}
		}
		$fullname = $_POST['fullname'];
		$gender   = $_POST['gender'];
		$address  = $_POST['address'];
		$query    = updates("user", $id, $username, $password, $fullname, $gender, $address);
		if ($query) {
			header("Location: http://localhost/DTSB/admin/users.php");
		}else{
			header("Location: http://localhost/DTSB/admin/updateuser.php?id=$id&&error=1");
		}
	}


	$query=read("user","*","WHERE id=".$id);
	$fetch=mysqli_fetch_assoc($query);
?>
		<div class="row">
		    <div class="col">
		    	<h1>Update Data</h1><hr>
		    	<form action="" class="form" method="post">
		    		<div class="input-group">
		    			<label for="username">Username:&nbsp;</label>
		    			<input type="text" class="form-control" id="username" name="username" value="<?php echo $fetch['username']; ?>">
		    			<label for="password">Password:&nbsp;</label>
		    			<input type="password" class="form-control" id="password" name="password" value="<?php echo $fetch['password']; ?>">
		    		</div>
		    		<div class="input-group row">
		    			<div class="col">
		    				<label for="new-password">New Password</label>
		    				<input type="password" name="newpassword" class="form-control" id="new-password" placeholder="Type Your New Password">
		    			</div>
		    			<div class="col">
		    				<label for="re-type">Retype your new password</label>
		    				<input type="password" onblur="check()" name="retype" id="re-type" class="form-control" placeholder="Retype your new password">
		    			</div>
		    		</div>
		    		<label for="fullname">Fullname: </label>
		    		<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname" value="<?php echo $fetch['fullname']; ?>">
		    		<label for="gender">Gender: </label>
		    		<select name="gender" id="gender" class="custom-select">
		    			<option value="P" <?php if ($fetch['gender']=="P"): ?>
		    				selected
		    			<?php endif ?>>Female</option>
		    			<option value="L" <?php if ($fetch['gender']=='L'): ?>
		    				selected
		    			<?php endif ?>>Male</option>
		    		</select><br>
		    		<label for="address">Address: </label>
		    		<textarea name="address" id="address" rows="5" class="form-control" placeholder="Address"><?php echo $fetch['address']; ?></textarea><br>
		    		<button class="btn btn-outline-warning">
		    			submit
		    		</button>
		    	</form>
		    	<?php if (isset($_GET['error'])): ?>
		    		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		    		  <strong>Maaf Kesalahan saat update</strong> Mohon dicek kembali atau hubungi admin Bakhti untuk lebih jelasnya
		    		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    		    <span aria-hidden="true">&times;</span>
		    		  </button>
		    		</div>
		    	<?php endif ?>
		    	<script>
		    		function check() {
		    			var re=document.getElementById('re-type');
		    			var pass=document.getElementById('new-password');
		    			if (re.value != pass.value) {
		    				alert("Sorry Password Didn't match");
		    				// re.focus();
		    			}
		    		}
		    	</script>
		    </div>
		</div>
<?php
include 'endtemplate.php';
}

 ?>