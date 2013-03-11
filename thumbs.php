<?php

session_start();
	include("config.php");
	if(!isset($_SESSION['username'])){
    	header("Location: login.php");
	}


	$imagesArr	= array();
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$result = mysql_query("select * from photos ");
		$i = 1;
		while(($row = mysql_fetch_array($result)) && ($i<13))
 		{	
 			$imagesArr[] = array('src' 	=> $row['photo'],
										 'alt'	=> 'images/'.$album.'/'.$file,
										 'desc'	=> $row['question']);	
 		
	}
	$json 		= $imagesArr; 
	$encoded 	= json_encode($json);
	echo $encoded;
	unset($encoded);
?>