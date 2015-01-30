<?php
include ("show.php");
if (isset($_POST['name']) && isset($_POST['image']))
{
	$name = $_POST['name'];
	$img = $_POST['image'];
	
	$forum = new show();
	$forum->add_user($name, $img);
}

?>