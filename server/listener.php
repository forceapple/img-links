<?php
include ("../model/user_CRUD_functions.php");

class adding{
	function add_user(){
		$data = $_POST["name"];
		$data2 = $_POST["image"];
		$db = new user_db();
		$var = $db->add_user($data,$data2);
	}
}
?>