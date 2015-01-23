<?php
include ("../model/number_db.php");
class Numbers {

	function give_username_pass(){
		$data = $_GET["input_one"];
		$data2 = $_GET["input_two"];
		$re = $data." ".$data2;
		return $re;
	}
}
//Below are just for testing purpose;
/*
$var = new Numbers();
echo $var->give_me_one();
echo $var->give_me_two();
*/
?>