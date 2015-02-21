<?php
require_once('project_controller.php');
//$_GET['mode'] = 0;
//$_GET['uid'] = 1;

if(isset ($_GET['mode'])){
	switch($_GET['mode']){
		case 0:
		{
				$user = new User();
				echo json_encode($user->get_user_info($_GET['uid']));
		}
		break;
		case 1: {
			$user = new User();
			echo json_encode($user->get_comments_by_image_id($_GET['iid']));	
		} 
		break;
		case 2: {
			$user = new User();
			echo json_encode($user->get_comments_by_profile_id($_GET['pid']));	
		} 
		break;
	}
}



// 1 - get all the comments for  - get_comments_by_user_id($uid)
// echo json_encode($arr);
// 






if(isset($_POST['phase'])){
	switch($_POST['phase']){
		case 1: //insert profile pic
			if(isset($_POST['username']) && isset($_POST['ppic'])){
				$user = new User();
				$user->insert_profile($_POST['ppic'], $_POST['username']);
			}
		break;

		case 2:
			if(isset($_POST['username']) && isset($_POST['image'])){
				$user = new User();
				$user->insert_img_by_user($_POST['image'], $_POST['username']);
			}
		break;
	}
}




?>