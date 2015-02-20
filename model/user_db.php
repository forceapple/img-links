<?php

require ("connect.php");
class User_DB{
	function get_comments_by_uid($uid){
		global $con;
		
		$query = "SELECT * FROM comments LEFT JOIN user_comments ON user_comments.comment_id = comments.id WHERE user_id =".$uid;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				$query2 = "SELECT COUNT(comment_id) FROM votes WHERE comment_id=".$row['comment_id'];
				$result2 = mysqli_query($con, $query2);
				$votes = mysqli_fetch_row($result2);
				//print_r($votes);
				$arr['comment'] = $row['comment'];
				$arr['votes'] = $votes[0];
				$arr2[]=$arr;
			}
			print_r($arr2);
			return $arr;
		}
	}
	function down_vote_comment($cid){

	}
	function up_vote_comment($cid){

	}
	function get_comment_vote($cid){

	}
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
	
	function get_profile_by_user_id($uid) {
		global $con;
		$query = "SELECT * FROM profile LEFT JOIN user_profiles ON user_profiles.profile_id = profile.id LEFT JOIN user ON user.id = user_profiles.user_id WHERE user.id = ".$uid;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				$index = $row["profile_id"];
				$arr[$index] = $row['path'];
			}
			return $arr;
		}
	}
	
	function get_comments_by_image_id($iid) {
		global $con;
		$query = "SELECT * FROM images LEFT JOIN images_comments ON images_comments.image_id = images.id LEFT JOIN comments ON comments.id = images_comments.comment_id WHERE images.id = ".$iid;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				array_push($arr, $row['comment']);
			}
			return $arr;
		}
	}
	
	function get_comments_by_profile_id($pid) {
		global $con;
		$query = "SELECT * FROM profile LEFT JOIN profiles_comments ON profiles_comments.profile_id = profile.id LEFT JOIN comments ON comments.id = profiles_comments.comment_id WHERE profile.id = ".$pid;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				array_push($arr, $row['comment']);
			}
			return $arr;
		}
	}
	
	
	function insert_profile($path, $uid) {
		global $con;
		$query = "INSERT INTO profile(path) values ('".$path."')";	
		$result = mysqli_query($con, $query);
		
		if ($result) 
		{
			$pid = mysqli_insert_id($con);
			$query = "INSERT INTO user_profiles (user_id, profile_id) VALUES (".$uid.", ".$pid.")";
			$result = mysqli_query($con, $query);
		}
	}

	function get_all_imgs_by_user_id($id){
		global $con;
		$query = "SELECT * FROM images LEFT JOIN user_images ON user_images.image_id = images.id LEFT JOIN user ON user.id = user_images.user_id WHERE user.id = ".$id;
		$result = mysqli_query($con, $query);
		if($result){
			$arr = array();
			while($row = mysqli_fetch_array($result)){
				$index = $row["image_id"];
				$arr[$index] = $row['path'];
			}
			return $arr;
		}
	}
	
	function insert_profilepic_by_user($path, $username){
		global $con;
		$query_id = "SELECT id FROM user WHERE username='".$username."'";
		$res_id = mysqli_query($con, $query_id);
		//found an id
		$res_row = mysqli_fetch_row($res_id);

		$profile_query = "INSERT INTO profile (path) VALUES ('".$path."')";
		$result = mysqli_query($con, $profile_query);	
		$profile_id =  mysqli_insert_id($con);

		if($result){
			$user_profiles_query = "INSERT INTO user_profiles (user_id, profile_id) VALUES (".$username.", ".$profile_id.")";
			$result = mysqli_query($con, $user_profiles_query);
		}else{
			return false;
		}
	}

	function insert_img_by_user($path,$username){
		global $con;
		$query_id = "SELECT id FROM user WHERE username='".$username."'";
		$res_id = mysqli_query($con, $query_id);
		//found an id
		$res_row = mysqli_fetch_row($res_id);

		$image_query = "INSERT INTO images (path) VALUES ('".$path."')";
		$result = mysqli_query($con, $image_query);
		$image_id = mysqli_insert_id($con);
		
		if($result){
			$user_images = "INSERT INTO user_images (user_id, image_id) VALUES (".$username.",".$image_id.")";
			$result = mysqli_query($con, $user_images);
		}else{
			return false;
		}
	}
	function create_user($username,$password,$uimg_path){
		global $con;
		$query = "INSERT INTO user (username, password, uimg_path) VALUES ('".$username."','".$password."','".$uimg_path."')";
		$result = mysqli_query($con, $query);

		if($result== false){
			return false;
		}
	}
}

	$db = new User_DB();
	//print_r($db->insert_profile("test3.jpg", 1));
	$test = "1";
	$db->get_comments_by_uid($test);

	//$db->insert_img_by_user('122.jpg','Ilya');