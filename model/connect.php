<?php
$con = mysqli_connect("localhost","root","root","imgupload");

if(!$con){
	echo "FAIL".mysqli_connect_error();	
}

?>