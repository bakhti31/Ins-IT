<?php 
	
	session_start();
	
	if ($_GET['logout']) 
	{
		$_SESSION['admin']="";
	}

	if ($_SESSION['admin']=="") 
	{
		header('Location: http://localhost/DTSB/admin/login.php');
	}
	
	include '../config/fungsi.php';
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../dist/css/bootstrap.css">
</head>
<body>
	<div class="bd-highlight text-center text-white bg-dark px-5 float-left" style="position: fixed;height: 100vh">
	  <div class="p-2 bd-highlight"><h4 class="display-5">Admin Page</h4></div>
	  <div class="p-2 bd-highlight">
	  	<div class="card h-100 bg-secondary">
  	     <div class="card-body">
  	       <h5 class="card-title"><?php echo $_SESSION['admin']; ?></h5>
  	       <p class="card-text">
  	       	<a href="profile.php" class="btn text-white bg-primary">Profile</a>
  	       	<a href="?logout=1" class="btn text-white bg-danger">Sign Out</a>
  	       </p>
  	     </div>
  	   </div>
	  </div>
	  <hr class="border-white">
	  <div class="p-2 bd-highlight">
	  	<a class="btn text-white border-white w-100" href="index.php">Beranda</a>
	  </div>
	  <div class="p-2 bd-highlight">
	  	<a class="btn text-white border-white w-100" href="users.php">Users</a>
	  </div>
	  <div class="p-2 bd-highlight">
	  	<a class="btn text-white border-white w-100" href="tutorial.php">Tutorial</a>
	  </div>
	  <div class="p-2 bd-highlight">
	  	<a class="btn text-white border-white w-100" href="information.php">Information</a>
	  </div>
	  <div class="p-2 bd-highlight">
	  	<a class="btn text-white border-white w-100" href="request.php">Request Tutorial</a>
	  </div>
	</div>
	<div class="container-fluid" style="margin-left: 28%; width: 72%;">