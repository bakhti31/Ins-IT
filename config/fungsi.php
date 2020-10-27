<?php 

include 'koneksi.php'; // mengirimkan koneksi ke database

// Fungsi Dasar SQL
function query ($query)
{
	global $conn; // Agar Mendapatkan variable $conn dari file diluar fungsi
	$sql = mysqli_query($conn,$query);
	if ($sql) {
		return $sql; // Jika benar kembalikan query
	}else{
		mysqli_error($conn); // Jika Salah Tampilkan Error
	}
}

function create ($table, $field, $value) // add('user','username,password,leveladmin','')
{
	$sql = "INSERT INTO $table ($field) VALUES (".$value.") ";
	return query($sql);
}

function read ($table, $field, $args="")
{
	$sql = "SELECT $field FROM $table ".$args;
	return query($sql);
}

function update ($table, $update, $id)
{
	$sql = "UPDATE $table SET ".$update." WHERE id = $id";
	return query($sql);
}

function delete ($table, $id)
{
	$sql = "DELETE FROM `$table` WHERE id = $id";
	return query($sql);
}

// Fungsi Tambahan
function daftar ($table, $username, $password, $fullname, $gender, $address) 
{ 	// daftar ('user','han','hin','han hin hun','P',"Disini");
	$query = create($table, "username, password, fullname, gender, address", "'".$username."',
			 '".$password."','".$fullname."', '".$gender."', '".$address."'");

	if ($query){
		return true;
	}else{
		return false;
	}
}

function masuk ($username, $password, $table="user") 
{	// masuk("Bakhti","KataSandiRahasia");
	$result = read($table, "username","WHERE username='".$username."' AND password='".$password."'");

	if (mysqli_num_rows($result) > 0) {
		return true;
	}else{
		return false;
	}
}

function updates ($table, $id, $username, $password, $fullname, $gender, $address)
{
	$query = update($table, "
			 username  = '".$username."'
			 ,password = '".$password."'
			 ,fullname = '".$fullname."'
			 , gender  = '".$gender."'
			 , address = '".$address."'"
			, $id);
	
	if ($query) {
		return true;
	}else{
		return false;
	}
}

function post ($table, $title, $content, $tags, $date, $creator)
{
	$query = create($table, "title, content, tags, date, creator", "'".$title."', '".$content."', '".$tags."', '".$date."', '".$creator."' ");
	if ($query) {
		return true;
	}else{
		return false;
	}
}
function updatepost($table,$id,$title,$content,$tags,$date,$creator)
{
	$query = update($table
		,"title = '".$title."',
		content = '".$content."', 
		tags 	= '".$tags."',
		date 	= '".$date."', 
		creator = '".$creator."'"
		,$id);
	if ($query) {
		return true;
	}else{
		return false;
	}
}
//admin command 
function level($username)
{
	$query = read("admin","level","WHERE username='".$username."'");
	if ($fetch=mysqli_fetch_assoc($query)) {
		return $fetch['level'];
	}else{
		return false;
	}
}
function canI($username,$what,$todo)
{
	switch ($what) {
		case 'users':
			$levels = array(1,2);
			break;
		case 'request':
			$levels = array(1,3);
			break;
		case 'tutorial':
			$levels = array(1,3);
			break;
		case 'admin':
			$levels = array(1);
			break;
		default:
			$levels = array(1,3);
			break;
	}
	$level=level($username);
	if (in_array($level, $levels)) {
		return $todo;
	}else{
		echo "Sorry you Can't Do this";
	}

	
}
 ?>