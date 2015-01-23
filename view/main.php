<?php
	include("../server/number.php");
?>
<html>
<head>
<title>Lab</title>
</head>

<body>

<form method="GET">
<input name="input_one" type="text"></input>
<input name="input_two" type="password"></input>
<input  name="but "type="submit"></input>
</form>
<?php
	$var = new Numbers();
	echo $var->give_username_pass($word);


?>
</body>
</html>