<?php
session_start();
class Database{
	private $conn;
	function __construct($host,$user,$password,$dbName)
	{
		$this->conn=new mysqli($host,$user,$password,$dbName);
	}
	public function login($data)
	{
		$email=$data['email'];
		$password=($data['password']);
		$result=$this->conn->query("SELECT * FROM `admin` WHERE email='$email' and password='$password'");
		$user=$result->fetch_assoc();
		if(isset($user['id'])){
			$_SESSION['userID']=$user['id'];
			return true;
		}else{
			$_SESSION['error']='Invalid email or password';
			return false;
		}
	}
	public function logout()
	{
		session_destroy();
		return true;
	}
	public function get_category()
	{
		$result=$this->conn->query("SELECT * FROM `category`");
		return $result;
	}
	public function add_category($name)
	{
		if($name!=''){
			$this->conn->query("INSERT INTO `category` (`name`) VALUES ('$name')");
		}
	}
}