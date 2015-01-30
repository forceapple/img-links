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
 <form action="" method="post">
	 <input type="submit" class="generate_btn" name="generate_btn" value="Generate a sentence">
 </form>
 	<?php
	if (isset($_POST['generate_btn']))
	{
		$word = new show();
		$noun=$word->get_random_noun();
		$verb= $word->get_random_verb();
		$name= $word->get_random_name();
	
		$random_sentence = $name." ".$verb." ".$noun;
		echo $random_sentence;
	}
?>
 </div>
</div>	

</body>
</html>