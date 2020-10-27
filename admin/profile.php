<?php 
	
include 'template.php';
	$admin=$_SESSION['admin'];
	$query=read('admin','*',"WHERE username='".$admin."'");
	$fetch=mysqli_fetch_assoc($query);
 ?>
 		<h1 class="text-center">Your Profile</h1>
		<div class="card m-auto w-50 ml-5">
		  <div class="card-img-top p-4 text-center"><br>
  	    	<svg width="8em" height="8em" viewBox="0 0 16 16" class="bi bi-person-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  	     		<path fill-rule="evenodd" d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
  	    	</svg>
  	 	  </div>
		  <div class="card-body">
	        <h5 class="card-title"><?php echo $fetch['username']; ?></h5>
	        <p class="card-text">
	        	<table class="table">
	        		<tr>
	        			<td>Name: </td>
	        			<td><?php echo $fetch['fullname']; ?></td>
	        		</tr>
	        		<tr>
	        			<td>Address: </td>
	        			<td><?php echo $fetch['address']; ?></td>
	        		</tr>
	        		<tr>
	        			<td>Username: </td>
	        			<td>admin</td>
	        		</tr>
	        		<tr>
	        			<td>Password: </td>
	        			<td><?php echo substr($fetch['password'], 0,1); ?></td>
	        		</tr>
	        	</table>
	        </p>
	        <p class="card-text">
	        	Admin Level <?php echo $fetch['level']; ?>
	        </p>
	      </div>
		</div>
	</div>
</body>
</html>