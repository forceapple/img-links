<?php

$con = mysqli_connect("localhost", "root", "root", "numbers");

if(mysqli_connect_errno()){
	echo "you should take a bath" . mysqli_connect_error();
}

?>