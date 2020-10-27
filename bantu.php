<?php 
session_start();
include 'config/fungsi.php';

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
    	<table class="table">
    		<thead>
    			<th>Judul</th>
    			<th>Upload</th>
    			<th>Penanya</th>
    		</thead>
      <?php 
      $query = read("request","*");
      
      while ($fetch=mysqli_fetch_assoc($query)) {
      ?>
      		<tr>
      			<td><a href="baca-request.php?id=<?php echo $fetch['id']; ?>"><?php echo $fetch['title']; ?></a></td>
      			<td><?php echo $fetch['date']; ?></td>
      			<?php 
              $whois=read("user","username","WHERE id=".$fetch['creator']);
              $who=mysqli_fetch_assoc($whois);
             ?>
            <td><?php echo $who['username']?:"admin" ?></td>
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
<script src="dist/js/jquery.js"></script>
<script src="dist/js/bootstrap.js"></script>
</html>

<?php mysqli_close($conn); ?>