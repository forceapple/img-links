<?php
include ("../model/user_CRUD_functions.php");
class show {

	function get_name(){
		$db = new user_db();
		$data = $db->get_users();
		$store = array();
		foreach($data as $key=>$value){
			array_push($store, $value["name"]);
		}
	//var_dump($store);
	return $store;
	}

	function get_img(){
		$db = new user_db();
		$data = $db->get_users();
		$store = array();
		foreach($data as $key=>$value){
			array_push($store, $value["picture"]);
		}
	//var_dump($store);
	return $store;

	}
	function add_user(){
		$data = $_POST["name"];
		$data2 = $_POST["image"];
		$db = new user_db();
		$var = $db->add_user($data,$data2);
	}

}
//$user = new show();
//$user->get_img();
//echo $user->get_name();
//Below are just for testing purpose;
/*
$var = new Numbers();
echo $var->give_me_one();
echo $var->give_me_two();
*/
?>