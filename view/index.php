<!doctype html>
<html>
<head>
<!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--Let browser know website is optimized for mobile-->
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta charset="UTF-8">
    <title>Adv Dynamic Content</title>

</head>

<body>
	<div class="container">
    	<div class="row">
        	<div class="col s12 header">Assignment: Profile</div>
        </div>
        
        <!-- note: Phase 1 -->
         <form id="insertUserForm">
        <div class="row block-content">
        	<div class="col s3">
        		<div class="form-group center med-content">
                    	<label>User</label>
                           <input type="text" class="form-control" id="uid" value="1" placeholder="user ID" required>
               </div>
           </div>
           <div class="col s3">
        		<div class="form-group center med-content">
                    	<label>Add Profile Pic</label>
                        <input type="text" class="form-control" id="profilePicPath" placeholder="http://">
               </div>
           </div>
           <div class="col s3 center med-content">
        		<div class="form-group center">
                		<label>Insert a profile picture for user.</label>
                    	<button id="insertProfilePicButton" class="btn waves-effect waves-light btn-large" type="submit" name="action">SUBMIT<i class="mdi-action-perm-contact-cal right"></i></button>
               </div>
           </div>
           <div id="insertUserMsgBox" class="col s3 center med-content">	
           </div>
        </div><!-- end of row-->
        </form>
        
        <!-- note: Phase 2 -->
        <form id="insertImageForm">
         <div class="row block-content-2">
        	<div class="col s3">
        		<div class="form-group center med-content">
                     <label>User</label>
                      <p class="form-control-static" id="uid-mirror"></p>
               </div>
           </div>
           <div class="col s3">
        		<div class="form-group center med-content">
                	<label>Image URL</label>
                    <input type="text" class="form-control" id="imagePath" placeholder="http://">
               </div>
           </div>
           <div class="col s3 center med-content">
        		<div class="form-group center">
                	<label>Insert an image for user.</label>
                    <button type="submit" id="insertImageButton" class="btn waves-effect waves-light btn-large">SUBMIT <i class="mdi-image-add-to-photos right"></i></button>
               </div>
           </div>
           <div id="insertImageMsgBox" class="col s3 center med-content">	
           </div>
        </div><!-- end of row-->
     </form>
     
     <!-- note: Phase 0 -->
     <div class="row crazy-images-button-div">
        <div class="col s3">&nbsp;</div><div class="col s6"><center><button type="submit" id="getInfo" class="btn waves-effect waves-light btn-large"><i class="mdi-action-grade left"></i> GET <i class="mdi-action-grade right"></i></button></center></div><div class="col s3">&nbsp;</div>
     </div>
     
     <div class="row">
         <div class="col s12" id="images-div">
            <table id="profilepics-table" class="hoverable">
            	<tbody>
                </tbody>
            </table>
            
            <table id="images-table" class="hoverable">
            	<tbody>
                </tbody>
            </table>
         </div>
     </div>
    </div><!-- end of container-->

	  <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
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
			  
			 $("#images-div").html(' <table id="images-table" class="hoverable"><tbody></tbody></table><table id="profilepics-table" class="hoverable"><tbody></tbody></table>'); // clear whatever from previous
			  
			  //profile pics
			 $("#profilepics-table").append("<thead><th>Profile pics:</th></thead>");
			  
			  for (var i in resp["profile"]) {
					var profile = resp["profile"][i];
						
				  	$("#profilepics-table > tbody:last").append("<tr><td><img src="+profile+" class='myprofilepics circle images' data-profileid='"+i+"'/></td></tr>");  
			   }
				  
				$(".myprofilepics").click(function(e) {
						$.ajax({
							url: "../controller/listen.php",
							data: {mode:2, pid: $(this).data("profileid")},
							dataType:"json",
							type: "GET",
							success: function(profile_comment) {
								//console.log(e.target);
								//$(e.target).after( document.createTextNode( profile_comment ) );
								$(e.target).after("<div class='comment'>"+profile_comment+"</div>");
							},
							error: function(resp2) {
								console.log(resp);
							}
						});  
					});
			  
			  //images
			  $("#images-table").append("<thead><th>Images:</th></thead>");
			  for (var i in resp["images"]) {
				var image = resp["images"][i];
			
				  $("#images-table > tbody:last").append("<tr><td><img src="+image+" class='myimages circle images' data-imageid='"+i+"' /></td></tr>");  
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
								//$(e.target).after( document.createTextNode( image_comment ) );
								$(e.target).after("<div class='comment'>"+image_comment+"</div>");
							},
							error: function(resp2) {
								console.log(resp);
							}
						});  
					});
			  
			},
			error: function(resp) {
					console.log(resp);
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
		  
    });
</script>
</body>
</html>