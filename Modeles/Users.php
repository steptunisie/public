<?php
/**
 * 
 *
 * @author Eya  Nextweb
 */
class Users {
	public $tableName = 'clients';
	private $id_insert;
	
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'makook_dbmakook'; //Define database username
		$dbPassword = '&ei{|Kr9!tpn'; //Define database password
		$dbName = 'makook_annonce'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	function last_id(){
		return $this->id_insert;
	}
	function checkUser($oauth_provider,$region,$password,$oauth_uid,$fname,$lname,$email,$gender,$locale,$link,$picture,$valid){
		echo 'valid'.$valid;
                $new_password = md5($password);
                
		$prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
                  
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET region = '".$region."', password = '".$new_password."',oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."',gpluslink = '".$link."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
			$this->id_insert=  $this->connect->GetID();
		}else{
                  //  die("INSERT INTO $this->tableName SET oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s"));
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET region = '".$region."',password = '".$new_password."',oauth_provider = '".$oauth_provider."', oauth_uid = '".$oauth_uid."', fname = '".$fname."', lname = '".$lname."', email = '".$email."', gender = '".$gender."', locale = '".$locale."', picture = '".$picture."', gpluslink = '".$link."', created = '".date("Y-m-d H:i:s")."',valid = '".$valid."', modified = '".date("Y-m-d H:i:s")."'") or die(mysqli_error($this->connect));
			$this->id_insert=  $this->connect->GetID();
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_provider = '".$oauth_provider."' AND oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>