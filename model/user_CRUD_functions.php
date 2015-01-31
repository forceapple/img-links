<?php 
	//create, read, update, delete users
	
	require("connect.php");

	
	class quiz_db{
		
		function insert_name($name) {
			global $con;
			$query = "INSERT INTO  name(`name`) VALUES ('".$name."')";
			$result = mysqli_query($con, $query);
		
		}
		function insert_noun($noun) {
			global $con;
			$query = "INSERT INTO nouns (`nouns`) VALUES ('".$noun."')";
			$result = mysqli_query($con, $query);
		
		}
		function insert_verb($verb) {
			global $con;
			$query = "INSERT INTO verbs ( `verbs`) VALUES ('".$verb."')";
			$result = mysqli_query($con, $query);
		
		}
		
		function get_names() {
			global $con;
			$query = "SELECT * FROM name";
			$result = mysqli_query($con, $query);
			
			if ($result) {
				$arr = array();
				while ($row = mysqli_fetch_array($result)) {
					$user_data =$row['name'];
					array_push($arr, $user_data );
				}	
				
				return $arr;
			}
		}
		function get_nouns() {
			global $con;
			$query = "SELECT * FROM nouns";
			$result = mysqli_query($con, $query);
			
			if ($result) {
				$arr = array();
				while ($row = mysqli_fetch_array($result)) {
					$user_data =$row['nouns'];
					array_push($arr, $user_data);
				}	
				
				return $arr;
			}
		}
		function get_verbs() {
			global $con;
			$query = "SELECT * FROM verbs";
			$result = mysqli_query($con, $query);
			
			if ($result) {
				$arr = array();
				while ($row = mysqli_fetch_array($result)) {
					$user_data =$row['verbs'];
					array_push($arr, $user_data);
				}	
				
				return $arr;
			}
		}
		
	
			
	}
	//$name="john snow";

	//$db = new quiz_db();
	//print_r($db->get_name());
	//$db->insert_name($name);

?>