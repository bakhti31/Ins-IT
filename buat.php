<?php 

include 'config/fungsi.php';

session_start();
$id=0;

if (!$_SESSION['pengguna']||$_SESSION['pengguna']=="") {
	header("Location: http://localhost/DTSB/login.php");
}else{
	$cek=read('user','*',"WHERE username='".$_SESSION['pengguna']."'");
	$data=mysqli_fetch_assoc($cek);
	$id=$data['id'];
}

if (isset($_POST['title'])) {
	$title = $_POST['title'];
	$content = $_POST['content'];
	$tags = $_POST['tags'];
	$date = date("Y-m-d H:i:s");
  $post = $_POST['post'];
	$query = post($post, $title, $content, $tags, $date, $id);
	if ($query) {
    if ($post == "tutorial") {
      header("Location: http://localhost/DTSB/tutorial.php");
    }else{
      header("Location: http://localhost/DTSB/informasi.php");
    }
	}else{
		header("Location: http://localhost/DTSB/buat.php?id=$id&error=1");
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
  <style>
    html,body{
      height: 100%;
    }
  </style>
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
    <div class="container py-1">
      <form action="" method="post" class="form">
        <label for="post">Kategori: </label>
        <select name="post" id="post">
          <option value="tutorial">Tutorial</option>
          <option value="info">Informasi</option>
        </select><br>
      	<label for="title">Judul: </label>
      	<input type="text" id="title" class="form-control" name="title">
      	<label for="content">Isi: </label>
      	<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
      	<label for="tags">Tag: </label>
      	<input type="text" id="tags" name="tags" class="form-control">
      	<button class="btn btn-primary">Kirim</button>
      </form>
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

<?php mysqli_close($conn); ?>