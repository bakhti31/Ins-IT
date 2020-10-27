<?php 
session_start();
include 'config/fungsi.php';
$cari = $_GET['cari'];
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
    <div class="container py-5" style="min-height: 435px;">
      <form action="">
        <div class="input-group">
          <input type="search" class="form-control" name="cari" placeholder="Cari disini" value="<?php echo $cari ?>">
          <button class="btn border">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
              <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
            </svg>
          </button>
        </div>
      </form><br>
    	<table class="table">
    		<thead>
    			<th>Judul</th>
    			<th>Upload</th>
    			<th>Pembuat</th>
    			<th>label</th>
    		</thead>
      <?php 
      $query = read("tutorial","*");
      if ($_GET['cari']) {
        $cari = $_GET['cari'];
        $query = read("tutorial","*","WHERE title LIKE '%$cari%' OR tags LIKE '%$cari%'");
      }
      
      while ($fetch=mysqli_fetch_assoc($query)) {
      ?>
      		<tr>
      			<td><a href="baca-tutor.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['title']; ?></a></td>
      			<td><?php echo $fetch['date']; ?></td>
            <?php 
              $whois=read("user","username","WHERE id=".$fetch['creator']);
              $who=mysqli_fetch_assoc($whois);
             ?>
            <td><?php echo $who['username'] ?></td>
      			<td><?php echo $fetch['tags']; ?></td>
      		</tr>
      <?php 
        }
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
<script type="text/javascript" src="dist/js/jquery.js"></script>
<script type="text/javascript" src="dist/js/bootstrap.js"></script>
</html>

<?php mysqli_close($conn); ?>