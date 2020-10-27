<?php 

include_once("../config/fungsi.php");

if (isset($_POST['username'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$masuk = masuk($username, $password, 'admin');
	if ($masuk) {
		session_start();
		$_SESSION['admin']=$username;
		header("Location: http://localhost/DTSB/admin/index.php");
	}else{
		header("Location: http://localhost/DTSB/admin/login.php?error=1");
	}

}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="../dist/css/bootstrap.css">
	<link rel="stylesheet" href="../dist/css/style.css">
</head>
<body>
	<div class="container-fluid bg-dark" style="height: 100vh; padding-top: 100px">
		<div class="card w-50 m-auto">
		  <div class="card-header text-center">
		    LOGIN ADMIN
		  </div>
		  <div class="card-body">
		  	<form action="" method="post">
		  		<div class="form-group">
		  			<label for="username">Username :</label>
		  			<input type="text" id="username" name="username" class="form-control" placeholder="Username">
		  		</div>
		  		<div class="form-group">
		  			<label for="password">Password :</label>
		  			<input type="password" id="password" name="password" class="form-control" placeholder="Password">
		  		</div>
		  		<button class="btn btn-dark">Login</button>
		  	</form>
		  	<?php if (isset($_GET['error'])): ?>
		    		<div class="alert alert-warning alert-dismissible fade show" role="alert">
		    		  <strong>Error Login</strong> Username or Password Wrong
		    		  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    		    <span aria-hidden="true">&times;</span>
		    		  </button>
		    		</div>
		    	<?php endif ?>
		  </div>
		  <div class="card-footer text-muted">
		  	Copyright By Bakhti &copy; 2020 Ins IT
		  </div>
		</div>
	</div>
</body>
</html>