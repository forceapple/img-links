<?php

class adding{
	function add_user(){
		$data = $_POST["name"];
		$data2 = $_POST["image"];
		echo $data.$data2;

	}
}
$var = new adding();
$var->add_user();
?>