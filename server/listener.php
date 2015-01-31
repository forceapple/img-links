<?php
include ("show.php");
session_start();
//initialize controller
$data = new show();

if (isset($_POST['noun'])){
	$user_noun = strip_tags($_POST['noun']);
	if($data->insert_noun($user_noun)){
		$_SESSION['status']   = "success";
	}else{
		$_SESSION['status']   = "fail";
	}
	header('location: ../view/main.php');
}
if (isset($_POST['verb'])){
	$user_verb = strip_tags($_POST['verb']);
	if($data->insert_verb($user_verb)){
		$_SESSION['status']   = "success";
	}else{
		$_SESSION['status']   = "fail";
	}
	header('location: ../view/main.php');
}
if (isset($_POST['name'])){
	$user_name = strip_tags($_POST['name']);
	if($data->insert_name($user_name)){
		$_SESSION['status']   = "success";
	}else{
		$_SESSION['status']   = "fail";
	}
	header('location: ../view/main.php');
}

?>