<?php
session_start();
	if(!isset($_SESSION['username'])){
    	header("Location: login.php");
	}
?>

<!doctype html>
<html>
<head>
	<title>MyFace</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
	<link rel="stylesheet"  href="css/custom.css" />
	<script src="js/jquery-1.8.2-min.js"></script>
	<script src="js/mobileinit.js"></script>
	<script src="js/jquery.mobile-1.2.0.min.js"></script>
	<script src="js/application.js"></script>
</head> 

<body> 
	<div data-role="page" data-theme="a">
		
		<div data-role="header" color="purple">
			<h2><font size="5" font face="Helvetica">MyFace</font></h2>
			<a href="landing.html">Log out</a>
		</div>
		
		<div data-role="content">
			<p><center><font size="2" font face="Helvetica"><b>Today's question to ponder:</font></b></p>
			
			<div id = "thinker">
			<img src="pics/thinking.jpg" alt="home_img.jpg" style="max-height:250px; "/>
			</div>
			
				<p><i> <font size="2" font face="Helvetica">Would you rather lose all of your old memories,<br> or never be able to make new ones?</i></font></font></p>
		</div>
		
	<div data-role="footer" data-theme="c">
	
	<div class="ui-body ui-body-b" style="text-align:center">
		<fieldset class="ui-grid-a">
	
			<div class="ui-block-a"><a href="indexcam.php" rel="external"><button type="submit" data-role="button" data-inline="true" data-theme="c">Answer: make a face!</button></a></div>
			
		
			<div class="ui-block-b"><a href="pictures.php" rel="external"><button type="submit" data-role="button" data-inline="true" data-theme="c">View archive</button></a></div>
		</fieldset>
	</div>		
	</div>
	
	</div>
</body>
</html>