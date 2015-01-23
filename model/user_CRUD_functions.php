<?php 
	//create, read, update, delete users
	
	require("connect.php");
	
	class user_db{
		
		function add_user($name, $picture) {
			global $con;
			$query = "INSERT INTO `users`(`id`, `name`, `picture`) VALUES (null,'".$name."','".$picture."')";
			$result = mysqli_query($con, $query);
			
			if ($result) {
				
			}
		}
		
		function get_users() {
			global $con;
			$query = "SELECT * FROM users";
			$result = mysqli_query($con, $query);
			
			if ($result) {
				$arr = array();
				while ($row = mysqli_fetch_array($result)) {
					$user_data =array(
					"name"=>$row['name'],
					"comment"=>$row['picture']);
					array_push($arr, $user_data);
				}	
				
				return $arr;
			}
		}
		
		function update_user() {
			
		}
		
		function delete_user() {
			
		}
			
	}
	
	$db = new user_db();
	print_r($db->get_users());
	

?>