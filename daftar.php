<?php 

include 'config/fungsi.php';
session_start();
if (isset($_POST['jk'])) {
  $pemakai=$_POST['pemakai'];
  $sandi=$_POST['rahasia'];
  $nama=$_POST['nama'];
  $jk=$_POST['jk'];
  $alamat=$_POST['alamat'];

  if (daftar("user",$pemakai,$sandi,$nama,$jk,$alamat)) {
    $_SESSION['pengguna']=$pemakai; //menyimpan session
    header("Location: http://localhost/DTSB/index.php");
  }else{
    header("Location: http://localhost/DTSB/daftar.php#salah");
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
      <div class="card">
        <h5 class="card-header">Ins IT</h5>
        <div class="card-body">
          <form action="" method="post">
            <div class="form-row">
                <div class="col">
                  <label for="username">Nama Pemakai: </label>
                  <div class="input-group flex-nowrap">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="addon-wrapping">@</span>
                    </div>
                    <input type="text" id="username" name="pemakai" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                  </div>
                </div>
                <div class="col">
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
                </div>
              </div>
              <label for="fullname">Nama Lengkap</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                  </span>
                </div>
                <input type="text"  id="fullname" name="nama" aria-label="Last name" class="form-control" placeholder="Fullname">
              </div>
              <label class="mr-sm-2" for="inlineFormCustomSelect">Jenis Kelamin</label>
              <select class="custom-select mr-sm-2" name="jk" id="inlineFormCustomSelect">
                <option value="L">Laki Laki</option>
                <option value="P" selected>Perempuan</option>
              </select>
              <label for="alamat">Alamat</label>
              <textarea name="alamat" id="alamat" cols="10" rows="2" class="form-control"></textarea>
              <br>
              <button class="btn btn-dark">Daftar</button>
              <a href="login.php">Sudah Memiliki Akun</a>
          </form>
        </div>
      </div>
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