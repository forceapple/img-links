<!doctype html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="UTF-8">
<title>Assignment Profile</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/style.css">
</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col-xs-12 header">Assignment: Profile</div>
        </div>
        
        <!-- note: Phase 1 -->
         <form id="insertUserForm">
        <div class="row block-content">
        	<div class="col-lg-3">
        		<div class="form-group center med-content">
                    	<label>User</label>
                           <input type="text" class="form-control" id="uid" value="1" placeholder="user ID" required>
               </div>
           </div>
           <div class="col-lg-3">
        		<div class="form-group center med-content">
                    	<label>Add Profile Pic</label>
                        <input type="text" class="form-control" id="profilePicPath" placeholder="http://">
               </div>
           </div>
           <div class="col-lg-3 center med-content">
        		<div class="form-group center">
                		<label>Insert a profile picture for user.</label>
                    	 <button type="submit" id="insertProfilePicButton" class="btn btn-primary btn-block">ADD PROFILE PIC URL</button>
               </div>
           </div>
           <div id="insertUserMsgBox" class="col-lg-3 center med-content">	
           </div>
        </div><!-- end of row-->
        </form>
        
        <!-- note: Phase 2 -->
        <form id="insertImageForm">
         <div class="row block-content-2">
        	<div class="col-lg-3">
        		<div class="form-group center med-content">
                     <label>User</label>
                      <p class="form-control-static" id="uid-mirror"></p>
               </div>
           </div>
           <div class="col-lg-3">
        		<div class="form-group center med-content">
                	<label>Image URL</label>
                    <input type="text" class="form-control" id="imagePath" placeholder="http://">
               </div>
           </div>
           <div class="col-lg-3 center med-content">
        		<div class="form-group center">
                	<label>Insert an image for user.</label>
                    <button type="submit" id="insertImageButton" class="btn btn-info btn-block">ADD IMAGE URL</button>
               </div>
           </div>
           <div id="insertImageMsgBox" class="col-lg-3 center med-content">	
           </div>
        </div><!-- end of row-->
     </form>
     
     <!-- note: Phase 0 -->
     <div class="row crazy-images-button-div">
     	<!--<div class="col-lg-3"></div><div class="col-lg-6"><button type="submit" id="getAllCrazyImagesButton" class="btn btn-lg btn-danger btn-block">GET THOSE CRAZY IMAGES</button></div><div class="col-lg-3"></div>-->
        <div class="col-lg-3"></div><div class="col-lg-6"><button type="submit" id="getInfo" class="btn btn-lg btn-danger btn-block">GET USER INFO</button></div><div class="col-lg-3"></div>
     </div>
     
     <div class="row">
         <div class="col-lg-12" id="images-div">
            
         </div>
     </div>
    </div><!-- end of container-->
    
    <!--
	<button id="getimages">GET THE CRAZY IMAGES</button><br><br>
    
    <label>Image Path:</label> <input type="text" id="img_path"><br>
    <label>User ID:</label> <input type="text" id="uid"><br>
    <label>Profile Picture Path:</label> <input type="text" id="profile_image_path"><br>
    <button id="insertimage">INSERT IMAGE</button>
	<div id="images">
    </div>
   	-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script>
  $(document).ready(
    function() {
		
	$("#uid-mirror").text($("#uid").val());	
	$("#uid").on("input", function() {
		$("#uid-mirror").text($("#uid").val());	
	});
		
	$("#getInfo").click(function() {
        $.ajax({
        url: "../controller/listen.php",
        data: {mode: 0, uid: $("#uid").val()},
        type: "GET",
        dataType: "json",
        success: function (resp) {
          console.log(resp); 
		  
		  $("#images-div").html(" "); // clear whatever from previous
		  
		  //profile pics
		  $("#images-div").append("<h1>Profile pics:</h1>");
		  
		  for (var i in resp["profile"]) {
            var profile = resp["profile"][i];
					
          $("#images-div").append("<img src="+profile+" class='myprofilepics img-thumbnail images' data-profileid='"+i+"'/>");  
          }
		  
		   $(".myprofilepics").click(function(e) {
				$.ajax({
					url: "../controller/listen.php",
					data: {mode:2, pid: $(this).data("profileid")},
					dataType:"json",
					type: "GET",
					success: function(profile_comment) {
						//console.log(e.target);
						$(e.target).after( document.createTextNode( profile_comment ) );
					},
					error: function(resp2) {
						console.log(resp);
					}
				});  
			});
          
		  //images
		  $("#images-div").append("<h1>Images:</h1>");
		  for (var i in resp["images"]) {
            var image = resp["images"][i];
		
          $("#images-div").append("<img src="+image+" class='myimages img-circle images' data-imageid='"+i+"' />");  
          }
		  
		  $(".myimages").click(function(e) {
				$.ajax({
					url: "../controller/listen.php",
					data: {mode:1, iid: $(this).data("imageid")},
					dataType:"json",
					type: "GET",
					success: function(image_comment) {
						//console.log("myimages "+image_comment);
						//console.log(e.target);
						$(e.target).after( document.createTextNode( image_comment ) );
					},
					error: function(resp2) {
						console.log(resp);
					}
				});  
			});
		  
        },
		error: function(resp) {
			
		},
      });   
      });
		
		
      $("#getAllCrazyImagesButton").click(function() {
        $.ajax({
        url: "../controller/listen.php",
        data: {phase: 0},
        type: "GET",
        dataType: "json",
        async: false,
        success: function (imagesArr) {
          console.log(imagesArr); //supposedly returns an associative array
          /*
          $arr[0,1,2,3,..] where 0,1,2,3,.. is an associative array
            $arr = array{
                [0] => array{
                imagePath=>test.jpg,
                username=>test,
                profilePic=>testPic.jpg
                },
                [1] => array{
                imagePath=>test1.jpg,
                username=>test1,
                profilePic=>testPic1.jpg
                },
                etc.
            }
          */
          for (var i in imagesArr) {
            var imageRowHTML =  '<div class="row images-row"><div class="col-lg-4"><img src="'+imagesArr[i].imagePath+'" class="user_image" height=150 width=150 border=1 /></div><div class="col-lg-8 images-row-info"><div class="valign">Added by <a href="#">'+imagesArr[i].username+'</a> <img src="'+imagesArr[i].profilePic+'" class="profile_pic" height=50 width=50 border=1></div></div></div>';
            $("#images-div").append(imageRowHTML);  
          }
        },
      });   
      });
      
      $("#insertProfilePicButton").click(function() {
        $.ajax({
          url: "../controller/listen.php",
          data: {phase: 1, ppic: $("#profilePicPath").val(), username: $("#uid").val()},
          type: "POST",
          dataType: "json",
          async: false,
          success: function (resp) {
            console.log(resp);
            $("#insertUserMsgBox").html("<br><p class='bg-success'>Successfully added a profile picture!</p>");  
          },
        });   
      });
      
      $("#insertImageButton").click(function() {
        $.ajax({
          url: "../controller/listen.php",
          data: {phase: 2, image: $("#imagePath").val(), username: $("#uid").val()},
          type: "POST",
          dataType: "json",
          async: false,
          success: function (resp) {
            console.log(resp);
            $("#insertImageMsgBox").html("<br><p class='bg-success'>Successfully added an image!</p>"); 
          },
        });   
      });
    }
  );
</script>
</body>
</html>