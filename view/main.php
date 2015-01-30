
<html>
<head>
<title>Sentence Generator</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,300' rel='stylesheet' type='text/css'>
<style>
html {
	font-family: 'Open Sans', sans-serif;
	}
#wrapper {
	margin: auto auto;
	width: 800px;
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
	}
</style>
</head>


<body>

<div id="wrapper">
	
	<h1>Sentence Generator</h1>
<form action="../server/listener.php" method="post">
	<input name="name"type="text" placeholder="Name"></input>
	<input name="verb" type="text" placeholder="Verb"></input>
	<input name="noun" type="text" placeholder="Noun"><br>
	<input type="submit" class="submit_btn" value="submit">
</form>
	
 <div id="random-text-box">
 	Random generated text placeholder
 </div>
</div>	



</body>
</html>