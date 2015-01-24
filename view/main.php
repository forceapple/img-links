<?php
	include("../server/show.php");

?>
<html>
<head>
<title>Lab</title>

<link rel="stylesheet" type="text/css" href="../style/main.css">
</head>


<body>

<div class="post-wrapper">
	
	<div class="images"><img src=""</img></div>

	
</div>	
<form action="../server/listener.php" method="post">
	<input name="name"type="text" placeholder="Name..."></input>
	<input name="image" type="text" placeholder="Image..."></input>
	<input name="tags" type="text" placeholder="tags seperated by comma...">
	<input type="submit" value="submit">
</form>

<?php
	$user = new show();
	$name=$user->get_name();

	foreach($name as $key => $value) {
		echo "<h1>".$value."</h1>";	
	}
	
	$picture=$user->get_img();

	foreach($picture as $key => $val) {
		echo "<img src='".$val."'/>";	
	}
?>


</body>
</html>