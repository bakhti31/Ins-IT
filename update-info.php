<?php 

session_start();
if ($_SESSION['pengguna']=="") {
	header("Location: http://localhost/DTSB/login.php");
}

if ($_GET['id']=="") {
	header("Location: http://location/DTSB/informasi.php");
}

include 'config/fungsi.php';

$konten=read('info','*','WHERE id='.$_GET['id']);
$data=mysqli_fetch_assoc($konten);
$pengguna=read('user','*',"WHERE username = '".$_SESSION['pengguna']."'");

$data_pengguna=mysqli_fetch_assoc($pengguna);

if ($data_pengguna['id']!=$data['creator']) {
	// echo "<script>alert('Anda bukan Pemilik Artikel ini</script>";
	header('Location: http://localhost/DTSB/profile.php');
}

if (isset($_POST['title'])) {
  $title    = $_POST['title'];
  $content  = $_POST['content'];
  $tags     = $_POST['tags'];
  $creator  = $data_pengguna['id'];
  $date     = date("Y-m-d H:i:s");
  $query    = updatepost("info",$id,$title,$content,$tags,$date,$creator);
  echo $query;
  if ($query) {
    header("Location: http://localhost/DTSB/profile.php");
  }else{
    header("Location: http://localhost/DTSB/update-info.php?id=$id&error=1");
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
     <div class="container py-4">
       <form action="" method="post" class="form">
       	<label for="title">Judul: </label>
       	<input type="text" id="title" class="form-control" name="title" value="<?php echo $data['title']; ?>">
       	<label for="content">Isi: </label>
       	<textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $data['content']; ?></textarea>
       	<label for="tags">Tag: </label>
       	<input type="text" id="tags" name="tags" class="form-control" value="<?php echo $data['tags']; ?>">
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