<?php 

include 'template.php';

if (isset($_POST['username'])) {
	$id       = $_GET['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$fullname = $_POST['fullname'];
	$gender   = $_POST['gender'];
	$address  = $_POST['address'];
	$query    = daftar("user", $username, $password, $fullname, $gender, $address);
	if ($query) {
		header("Location: http://localhost/DTSB/admin/index.php");
	}else{
		header("Location: http://localhost/DTSB/admin/adduser.php?&error=1");
	}
}
?>
		<div class="row">
		    <div class="col">
		    	<h1>Update Data</h1><hr>
		    	<form action="" class="form" method="post">
		    		<div class="input-group row">
		    			<div class="col">
		    				<label for="username">Username:&nbsp;</label>
		    				<input type="text" class="form-control" id="username" name="username" placeholder="Username">
		    			</div>
		    			<div class="col">
		    				<label for="password">Password:&nbsp;</label>
		    				<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		    			</div>
		    		</div>
		    		<label for="fullname">Fullname: </label>
		    		<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
		    		<label for="gender">Gender: </label>
		    		<select name="gender" id="gender" class="custom-select">
		    			<option value="P">Female</option>
		    			<option value="L">Male</option>
		    		</select><br>
		    		<label for="address">Address: </label>
		    		<textarea name="address" id="address" rows="5" class="form-control" placeholder="Address"></textarea><br>
		    		<button class="btn btn-outline-warning">
		    			Submit
		    		</button>
		    	</form>
		    	<?php if (isset($_GET['error'])): ?>
		    		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		    		  <strong>Error When adding user</strong> please contact admin bakhti for detail
		    		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    		    <span aria-hidden="true">&times;</span>
		    		  </button>
		    		</div>
		    	<?php endif ?>
		    </div>
		</div>
	</div>
</body>
<script>
	function check() {
		var re=document.getElementById('re-type');
		var pass=document.getElementById('new-password');
		if (re.value != pass.value) {
			alert("title","Sorry Password Didn't match");
			re.focus();
		}
	}
</script>
<script src="../dist/js/jquery.js"></script>
<script src="../dist/js/bootstrap.js"></script>
</html>
