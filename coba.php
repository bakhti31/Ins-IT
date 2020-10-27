<?php 

include 'config/fungsi.php';

// mysqli_query("SELECT convert (varchar , getdate()-1 , 112) ");
 
// $query = read("user","CAST(user.date AS DATE) AS waktu, count(id) as banyak", "GROUP BY waktu desc");

// **********************************************************
// $user = uni("user",
// 	"CAST(user.date AS DATE) AS DATES, count(user.id) as users", 
// 	"GROUP BY DATES desc");
// $tutor = uni("tutorial",
// 	"CAST(tutorial.date AS DATE) AS DAT, count(tutorial.id) as tutorials", 
// 	"GROUP BY DAT desc");

// $query = daterecord($user,$tutor);


// echo "<pre>";
// while ($a=mysqli_fetch_assoc($query)){
// 	print_r($a);
// }
// echo "</pre>selesai";
// **************************************************************

// $query = read("user","CAST(user.date AS DATE) AS waktu, count(user.id) as banyak, count(tutorial.id) as tutorial", "GROUP BY waktu desc
	// FULL OUTER JOIN tutorial ON
	// waktu = (SELECT CAST(tutorial.date AS DATE) AS waktu FROM tutorial GROUP BY DATES desc)");
// $query2 = read(
	// "(SELECT CAST(user.date AS DATE) AS DATES, count(id) as users FROM user GROUP BY DATES desc),
	// (SELECT CAST(tutorial.date AS DATE) AS DATES, count(id) as tutorial FROM tutorial GROUP BY DATES desc)",
	// "DATES,users,tutorial", 
	// "desc");
// ******************************************************
// $query = read("user","CAST(user.date AS DATE) AS DATES"
// 	,"UNION
// 	SELECT CAST(tutorial.date AS DATE) AS DATES FROM tutorial
// 	UNION
// 	SELECT CAST(info.date AS DATE) AS DATES FROM info
// 	");
// echo "<pre>";
// while ( $b = mysqli_fetch_assoc($query)){
// 	print_r($b);
// }
// echo "</pre>";
// ***********************************************************
// "SELECT 
// 	CAST(user.date AS DATE) AS waktu,
// 	COUNT(DISTINCT user.id), COUNT(DISTINCT tutorial.id) COUNT(DISTINCT info.id)
// FROM user 
// JOIN tutorial ON CAST(tutorial.date AS DATE) = CAST(user.date AS DATE)
// JOIN info ON CAST(info.date AS DATE) = CAST(user.date AS DATE)
// GROUP BY waktu"
// *******************************************************************

// $query = read("user","user.id AS usere, tutorial.id AS tute, info.id AS infoe","
// 		JOIN tutorial ON tutorial.creator = user.id
// 		JOIN info ON info.creator = user.id 
// 	");


// *************************************************************************
echo "<pre>";
while ( $b = mysqli_fetch_assoc($query)){
	print_r($b);
}
echo "</pre>";

 ?>