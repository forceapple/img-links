<?php
require_once('../model/user_db.php');
class User{
	
	function get_user_info($uid) {
		$db = new User_DB;
		
		$arr = array();
		$profiles = $db->get_profile_by_user_id($uid);
		$imgs = $db->get_all_imgs_by_user_id($uid);
		$arr["profile"] = $profiles;
		$arr["images"] = $imgs; // $arr["images"]: ["image_id"] = comment
		return $arr;	
	}
	
	function insert_profile($path, $uid) 
	{
		$db = new User_DB();
		$db->insert_profilepic_by_user($path, $uid);
	}

	function insert_img_by_user($path,$username){
		$db = new User_DB();
		if($db->insert_img_by_user($path, $username)){
			return true;
		}
		return false;
	}

	function create_user($username,$password,$uimg_path){
		$db = new User_DB();
		if($db->create_user($username, $password, $uimg_path)){
			return true;
		}
		return false;
	}

	function get_all_img(){
		$db = new User_DB();
		return $db->get_all_img();
	}
	
	function get_comments_by_image_id($iid)
	{
		$sv = new User_DB();
		return $sv->get_comments_by_image_id($iid);
		
	}
	
	function get_comments_by_profile_id($pid)
	{
		$sv = new User_DB();
		return $sv->get_comments_by_profile_id($pid);
		
	}
}

//$db = new User();
//print_r($db->get_user_info(1));

?>