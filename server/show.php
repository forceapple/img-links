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
	function add_user($name,$img){
		$data = $name;
		$data2 = $img;
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

	//returns a random noun (string)
	public function get_random_noun(){
		$db = new user_db();
		$nouns = $db->get_nouns();
		$randIndex = array_rand($nouns);
		return $nouns[$randIndex];
	}

	//returns a random verb (string)
	public function get_random_verb(){
		$db = new user_db();
		$verbs = $db->get_verbs();
		$randIndex = array_rand($verbs);
		return $verbs[$randIndex];
	}

	//returns a random name (string)
	public function get_random_name(){
		$db = new user_db();
		$names = $db->get_names();
		$randIndex = array_rand($names);
		return $names[$randIndex];

	}

	//passes the noun to DB to insert the noun
	public function insert_noun($var){
		$user_noun = strip_tags($_POST['noun']);
		$db = new user_db();
		$db->insert_noun($user_noun);
	}

	//passes the verb to DB to insert the verb
	public function insert_verb($var){
		$user_verb = strip_tags($_POST['verb']);
		$db = new user_db();
		$db->insert_verb($user_verb);
	}

	//passes the name to DB to insert the name
	public function insert_name($var){
		$user_name = strip_tags($_POST['name']);
		$db = new user_db();
		$db->insert_name($user_name);
	}
?>