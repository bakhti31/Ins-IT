<?php 

include 'template.php';

 ?>

		<div class="row">
		    <div class="col">
		      <h1>Summary</h1>
		      <hr>
		      <h3>Table Information</h3>
		      <table class="table border-1 text-center">
		      	<thead>
		      		<th>Dates</th>
		      		<th>User Registered</th>
		      		<th>Tutorial Posted</th>
		      		<th>Information Posted</th>
		      	</thead>
		      	<?php 
		      		// $query = query("
		      		// 	SELECT 
		      		// 	t.data AS dates,
		      		// 	count(user) AS users,
		      		// 	count(tutorial) AS tutorials,
		      		// 	count(info) AS infos 
		      		// 	FROM (
		      		// 		SELECT 
		      		// 		DATE(date) AS data,id AS user,null AS tutorial, null AS info 
		      		// 		FROM user
		      		// 		UNION ALL 
		      		// 		SELECT 
		      		// 		DATE(date)AS data, null AS user, id AS tutorial, null AS info 
		      		// 		FROM tutorial 
		      		// 		UNION ALL 
		      		// 		SELECT 
		      		// 		DATE(date)AS data,null AS user, null AS tutorial, id AS info 
		      		// 		FROM info
		      		// 	) t
		      		// 	GROUP BY t.data DESC");
		      		$query = read(
		      			"(SELECT DATE(date) AS data,id AS user,null AS tutorial, null AS info FROM user UNION ALL SELECT DATE(date)AS data, null AS user, id AS tutorial, null AS info FROM tutorial UNION ALL SELECT DATE(date)AS data,null AS user, null AS tutorial, id AS info FROM info) t"
		      			,"t.data AS dates, count(user) AS users, count(tutorial) AS tutorials,count(info) AS infos "
		      			,"GROUP BY t.data DESC");
		      		while ($data = mysqli_fetch_assoc($query)) { 
		      	?>
		      	<tr>
		      		<td><?=$data['dates'];?></td>
		      		<td><?=$data['users']; ?></td>
		      		<td><?=$data['tutorials']; ?></td>
		      		<td><?=$data['infos']; ?></td>
		      	</tr>
		      	<?php
		      		}
		      	 ?>
		      </table>
		    </div>
		</div>
	<?php include 'endtemplate.php'; ?>