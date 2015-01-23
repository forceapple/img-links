<?php

require ("../model/connect.php");

class NumberDB{

	private $arr;
	function get_number(){
		$arr = array(
			1,
			2,
			3,
			4,
			5,
		);

		return $arr;
	}
	function get_all_words(){
		global $con;
		$query ="SELECT * FROM number";
		$result =mysqli_query($con, $query);
		if($result){
			$arr = array();
			while ($row = mysqli_fetch_array($result)){
				array_push($arr, $row["words"]);
			}
			return $arr;
		}
	}
}
/*$db = new NumberDB();
$db->get_all_words();*/
?>