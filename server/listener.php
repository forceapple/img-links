<?php
include ("show.php");
//initialize controller
$data = new show();

if (isset($_POST['noun'])){
	$user_noun = strip_tags($_POST['noun']);
	$data->insert_noun($user_noun);
	header('location: ../view/main.php');
}
if (isset($_POST['verb'])){
	$user_verb = strip_tags($_POST['verb']);
	$data->insert_verb($user_verb);
	header('location: ../view/main.php');
}
if (isset($_POST['name'])){
	$user_name = strip_tags($_POST['name']);
	$data->insert_name($user_name);	
	header('location: ../view/main.php');
}

?>