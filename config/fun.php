<?php 


/**
 * 
 */
class SQLnya
{
	public $conn; //Membuat koneksi
	public $query; //Menyimpan query
	public function __construct($host,$username,$password,$db)
	{
		$this->conn=mysqli_connect($host,$username,$password,$db)or die('Sorry Connection to database Error');
	}
	public function query($value)
	{
		global $conn;
		$query=mysqli_query($this->conn,$value);
		if ($query) {
			$this->query=$query;
			return $this;
		}else{
			$error=mysqli_error($this->conn);
			echo $error;
			return $error;
		}
	}
	public function insert($table,$field,$value)
	{
		return query("INSERT INTO $table($field) VALUES ($value)");
	}
	public function row($value='')
	{
		if ($query) {
			return mysqli_num_rows($query);
		}
		else{
			return mysqli_num_rows($this->query);
		}	
	}

	public function fetch($query="")
	{
		if ($query) {
			return mysqli_fetch_assoc($query);
		}
		else{
			return mysqli_fetch_assoc($this->query);
		}
	}
}
/**
 * 
 */
class user extends SQLnya
{
	public function login($username,$password)
	{
		// global $this->query;
		$sql=$this-query("SELECT * FROM user WHERE username='".$username."' AND password='".$password."' ");
		if ($sql->row() < 1) {
			return $this;
		}else{
			return false;
		}
	}
}


$test=new user("localhost","username","password","db_latihan");
$query=$test->login('bakhti','password');
print_r($test->fetch($query));
echo $test->row();
$fetch=$query->fetch();
foreach ($fetch as $fullname) {
	echo $fullname['fullname'];
}

 ?>