<?php

require ("connect.php");
class User_DB{
	function get_all_img(){
		global $con;
		$query = "SELECT * FROM user_images";
		$result = mysqli_query($con, $query);
		if($result){
			$everything = array();
			$arr = array();
			$arr2 = array();
			$usernames_with_img= array();
			while($row = mysqli_fetch_array($result)){
				
					$arr2['user_id'] = $row['user_id'];
					$arr2['image_id'] = $row['image_id'];
					$arr[] = $arr2;

			}

			foreach($arr as $key => $value){
				$userid= $value['user_id'];
				//print_r($userid);
				$imageid= $value['image_id'];
				$getuser = "SELECT username, uimg_path FROM user WHERE id=".$userid;
				$getimg = "SELECT `path` FROM images WHERE id=".$imageid;
				$get_usernames = mysqli_query($con, $getuser);
				$get_img_paths = mysqli_query($con, $getimg);
				//print_r($get_img_paths);
				while ($row = mysqli_fetch_array($get_img_paths)){
					$image_path = $row['path'];
				}
				while($row = mysqli_fetch_array($get_usernames)){

						$usernames_with_img['username'] = $row['username'];
						$usernames_with_img['profilePic'] = $row['uimg_path'];
						$usernames_with_img['imagePath'] = $image_path;
						array_push($everything, $usernames_with_img);
						//print_r($get_usernames);
				}
				//print_r($usernames_with_img);
			}
		
			return $everything;
	
		}

	}

	function get_all_imgs_by_user_id($id){
		global $con;
		$query = "SELECT * FROM images LEFT JOIN user_images ON user_images.image_id = images.id LEFT JOIN user ON user.id = user_images.user_id WHERE user.id = ".$id;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				array_push($arr, $row['path']);
			}
			return $arr;
		}
	}

	function insert_img_by_user($path,$username){
		global $con;
		$query = "INSERT INTO images (path) VALUES ('".$path."')";
		$result = mysqli_query($con, $query);
		if($result){
			$query = "INSERT INTO user_images (user_id, image_id) VALUES ('".$username."','".mysqli_insert_id($con)."')";
			$result = mysqli_query($con, $query);
		}else{
			return false;
		}
	}
	function create_user($username,$password,$uimg_path){

		global $con;
		$query = "INSERT INTO user (username, password, uimg_path) VALUES ('".$username."','".$password."','".$uimg_path."')";
		$result = mysqli_query($con, $query);

		if($result){
			return true;
		}
		return false;
	}
}

	//$db = new User_DB();
	//print_r($db->get_all_img());
	//$db->get_all_img();

