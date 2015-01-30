<?php
	include("../server/show.php");

?>
<html>
<head>
<title>Sentence Generator</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
<style>
html {
	font-family: 'Open Sans', sans-serif;
	font-weight: 300;
	}
#wrapper {
	margin: auto auto;
	width: 70%;
	}
input {
	padding: 1.5em;
	font-size: 2em;
	margin: 1em;
	font-weight: 400;
	text-align: center;
	}
.submit_btn {
	background-color: #78B9DD;
	color: #fff;
	width: auto;
	padding-left: 3em;
	padding-right: 3em;
	text-align: center;
	}
.generate_btn {
	background-color: #78B9DD;
	font-size: 0.5em;
	color: #fff;
	width: auto;
	padding-left: 3em;
	padding-right: 3em;
	text-align: center;
	}
h1 {
	text-align: center;
	}
form {
	 display: inline-block;
    text-align: center;
	}
	
#random-text-box {
	font-size: 4em;	
	font-weight: semi-bold;
	text-align: center;
	color: #EF6906;
	height: 600px;
	background-color: #F4F3E1;
	margin-bottom: 1em;
	}
</style>
</head>


<body>

<div id="wrapper">
	
	<h1>Sentence Generator</h1>
<form action="../server/listener.php" method="post">
	<input name="name"type="text" placeholder="Name"><br>
    <input type="submit" class="submit_btn" name="name_btn" value="submit">
	<input name="verb" type="text" placeholder="Verb"><br>
    <input type="submit" class="submit_btn" name="verb_btn" value="submit">
	<input name="noun" type="text" placeholder="Noun"><br>
    <input type="submit" class="submit_btn" name="noun_btn" value="submit">
</form>
	
 <div id="random-text-box">
 <input type="submit" class="generate_btn" value="Generate a sentence">
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
 </div>
</div>	

</body>
</html>