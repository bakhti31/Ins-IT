<?php 

session_start();
if ($_SESSION['pengguna']=="") {
	header("Location: http://localhost/DTSB/login.php");
}

include 'config/fungsi.php';

$pengguna=read('user','*',"WHERE username='".$_SESSION['pengguna']."'");
$data=mysqli_fetch_assoc($pengguna);

if ($info=$_GET['hapusinfo']) {
	$konten=read('info',"creator","WHERE id=".$info);
	$data_konten=mysqli_fetch_assoc($konten);
	if ($data['id']==$data_konten['creator']) {
		delete("info", $info);
	}else{
		echo "<script>alert('Maaf Ini Bukan Milik anda')</script>";
	}
}elseif ($tutor=$_GET['hapustutor']) {
	$konten=read('tutorial',"creator","WHERE id=".$tutor);
	$data_konten=mysqli_fetch_assoc($konten);
	if ($data['id']==$data_konten['creator']) {
		delete("tutorial", $tutor);
	}else{
		echo "<script>alert('Maaf Ini Bukan Milik anda')</script>";
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>redesign</title>
  <link rel="stylesheet" href="dist/css/bootstrap.css">
</head>
<body>
  <div class="bg-primary align-self-baseline" style="padding: 0; margin: 0;">
    <div class="row container-fluid justify-content-around" >
      <div class="col-4 text-center py-5">
        <a href="informasi.php" class="btn btn-outline-light">Informasi</a>
      </div>
      <div class="col-2 text-center float-left" style="top: calc(5vh);">
        <div class="border rounded-circle rounded-lg bg-white zindex-tooltip" style="width: 120px; height: 120px; font-size: 5em;">
          <a class="display-5 text-dark" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            IT
          </a>
        </div>
      </div>
      <div class="col-4 text-center py-5">
        <a href="tutorial.php" class="btn btn-outline-light">Tutorial</a>
      </div>
    </div>
    <div class="row">
      <div class="col">
          <div class="collapse" id="navbarToggleExternalContent">
            <div class="bg-primary p-4">
            <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link btn-primary" href="index.php">Home</a>
                </li>
                <?php if (!$_SESSION['pengguna']): ?>
                <li class="nav-item">
                  <a class="nav-link btn-primary" href="login.php">Masuk</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn-primary" href="daftar.php">Daftar</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                  <a class="nav-link btn-primary" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btn-primary" href="index.php?logout=true">Logout</a>
                </li>
                <?php endif ?>
              </ul>
            </div>
          </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="container py-5">
    	<div class="card">
    	  <div class="card-body">
    	    <h5 class="card-title"><?php echo $data['fullname']; ?></h5>
    	    <h6 class="card-subtitle mb-2 text-muted"><?php echo $data['username']; ?></h6>
    	    <p class="card-text">Alamat: <?php echo $data['address'] ?><br> Bergabung pada : <?php echo $data['date'] ?></p>
          <!-- <a href="update-profile.php">Update Data Diri</a> WIP-->
    	  </div>
    	</div><br>
    	<h4>Postingan Informasi</h4>
    	<table class="table">
    		<thead>
    			<th>Judul</th>
    			<th>Upload</th>
    			<th>label</th>
    			<th>Aksi</th>
    		</thead>
      <?php 
      // $query=read("info","*","Limit 0,6");
      $query=read("info","*","WHERE creator=".$data['id']);

      while ($fetch=mysqli_fetch_assoc($query)) {
      ?>
      		<tr>
      			<td><a href="baca-info.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['title']; ?></a></td>
      			<td><?php echo $fetch['date']; ?></td>
      			<td><?php echo $fetch['tags']; ?></td>
      			<td><a href="?hapusinfo=<?php echo $fetch['id']; ?>" class="btn btn-danger">Hapus</a><a href="update-info.php?id=<?php echo $fetch['id']; ?>" class="btn btn-warning">Edit</a></td>
      		</tr>
      <?php }

       ?>

    	</table>
    	<br>
    	<h4>Postingan Tutorial</h4>
    	<table class="table">
    		<thead>
    			<th>Judul</th>
    			<th>Upload</th>
    			<th>label</th>
    			<th>Aksi</th>
    		</thead>
      <?php 
      // $query=read("info","*","Limit 0,6");
      $query=read("tutorial","*","WHERE creator=".$data['id']);

      while ($fetch=mysqli_fetch_assoc($query)) {
      ?>
      		<tr>
      			<td><a href="baca-tutor.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['title']; ?></a></td>
      			<td><?php echo $fetch['date']; ?></td>
      			<td><?php echo $fetch['tags']; ?></td>
      			<td><a href="?hapustutor=<?php echo $fetch['id']; ?>" class="btn btn-danger">Hapus</a><a href="update-tutorial.php?id=<?php echo $fetch['id']; ?>" class="btn btn-warning">Edit</a></td>
      		</tr>
      <?php }

       ?>

    	</table>
    </div>
    <div class="row absolute-bottom bg-dark text-light py-1">
      <div class="col">
        <p>Terima Kasih Telah mengunjungi website ini
          Donasi :<br>
          Paypal/Dana/Phone: 082297177440
        </p>
      </div>
      <div class="col">
        <p>Alamat : JL. Slamet Riyadi, Gang 4 No 23 RT 32, Karang Asam, Samarinda, Indonesia <br>
        Copyright Bakhti&copy;2020</p>
      </div>
    </div>
  </div>
</body>
<script src="dist/js/jquery.js"></script>
<script src="dist/js/bootstrap.js"></script>
</html>