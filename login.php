<?php 
session_start();
include "config/fungsi.php";

if (isset($_POST["pemakai"])) {
  $pemakai = $_POST["pemakai"];
  $sandi = $_POST["rahasia"];
  if (masuk($pemakai, $sandi)) {
    $_SESSION['pengguna']=$pemakai; //menjadikan session
    header("Location: http://localhost/DTSB/index.php");
  }else{
    header("Location: http://localhost/DTSB/login.php#salah");
  }
}

if ($_SESSION['pengguna']) {
  header("Location: http://localhost/DTSB/index.php");
}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>redesign</title>
  <link rel="stylesheet" href="dist/css/bootstrap.css">
  <link rel="stylesheet" href="dist/css/bootstrap-grid.css">
  <link rel="stylesheet" href="dist/css/bootstrap-reboot.css">
  <link rel="stylesheet" href="dist/css/style.css">
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
        <h5 class="card-header">Ins IT</h5>
        <div class="card-body">
          <form action="" method="post">
            <label for="username">Nama Pemakai: </label>
            <div class="input-group flex-nowrap">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">@</span>
              </div>
              <input type="text" id="username" name="pemakai" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <label for="password">Kata Sandi: </label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-key-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                  </svg>
                </span>
              </div>
              <input type="password" id="password" name="rahasia" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            <br>
            <button class="btn btn-dark">Login</button>
            <a href="daftar.php">Belum Memiliki Akun</a>
          </form>
        </div>
      </div>
    </div>
    <div class="row absolute-bottom bg-dark text-light py-1">
      <div class="col">
        <p>Terima Kasih Telah mengunjungi website ini</p>
        <p>
          Donasi :<br>
          Paypal/Dana/Phone: 082297177440
        </p>
      </div>
      <div class="col">
        Alamat : JL. Slamet Riyadi, Gang 4 No 23 RT 32, Karang Asam, Samarinda, Indonesia <br><br>
        <p>Copyright Bakhti&copy;2020</p>
      </div>
    </div>
  </div>
</body>
<script src="dist/js/jquery.js"></script>
<script src="dist/js/bootstrap.js"></script>
<script src="dist/js/bootstrap.bundle.js"></script>
<script>
  $('.carousel').carousel()
</script>
</html>
<?php mysqli_close($conn); ?>