<?php
include ("../model/user_CRUD_functions.php");
class show {
	//returns a random noun (string)
	public function get_random_noun(){
		$db = new quiz_db();
		$nouns = $db->get_nouns();
		$randIndex = array_rand($nouns);

		$noun = $nouns[$randIndex];
		return $noun;
	}

	//returns a random verb (string)
	public function get_random_verb(){
		$db = new quiz_db();
		$verbs = $db->get_verbs();
		$randIndex = array_rand($verbs);
		return $verbs[$randIndex];
	}

	//returns a random name (string)
	public function get_random_name(){
		$db = new quiz_db();
		$names = $db->get_names();
		$randIndex = array_rand($names);
		return $names[$randIndex];

	}

	//passes the noun to DB to insert the noun
	public function insert_noun($noun){
		$db = new quiz_db();
		$db->insert_noun($noun);
	}

	//passes the verb to DB to insert the verb
	public function insert_verb($verb){
		$db = new quiz_db();
		$db->insert_verb($verb);
	}

	//passes the name to DB to insert the name
	public function insert_name($name){
		$db = new quiz_db();
		$db->insert_name($user_name);
	}

}

//$test = new show();
//print_r($test->get_random_noun());
	
?>