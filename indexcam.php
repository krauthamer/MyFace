<?php
session_start();
	if(!isset($_SESSION['username'])){
    	header("Location: login.php");
	}
?>

<!DOCTYPE html>
<html lang="en" >
    <head>
    <title>UploadPhoto</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/jquery.mobile-1.2.0.min.css" />
	<link rel="stylesheet"  href="css/custom.css" />
	<script src="js/script.js"></script>
	<script src="js/jquery-1.8.2-min.js"></script>
	<script src="js/mobileinit.js"></script>
	<script src="js/jquery.mobile-1.2.0.min.js"></script>
	<script src="js/application.js"></script>
</head> 
    <body>
    <div data-role="page">
		<div data-role="header" color="purple">
			<a href="index.php" data-inline="true" data-mini="true">Back</a>	
			<h2><font face="Helvetica" font size="5">UploadPhoto</font></h2>
		</div>

      <div class="container">

            
            <div class="upload_form_cont">
                <form id="upload_form" enctype="multipart/form-data" method="post" action="upload.php">
                    <div>
                      <center>  
                        <div><input type="file" name="image_file" id="image_file" onchange="fileSelected();" /></div>
                        <input type="hidden" name="username" value="<?=$_SESSION['username'] ?>"/>
                    </center></div>
                    <div>
                        <input type="button" value="Upload" onclick="startUploading()" />
                    </div>
                    <div id="fileinfo">
                        <div id="filename"></div>
                        <div id="filesize"></div>
                        <div id="filetype"></div>
                        <div id="filedim"></div>
                    </div>
                    <div id="error">You should select valid image files only!</div>


                    <div id="progress_info">
                        <div id="progress"></div>
                        <div id="progress_percent">&nbsp;</div>
                        <div class="clear_both"></div>
                        <div id="upload_response"></div>
                    </div>
                </form>

                <img id="preview" />
            </div>
        </div>
    </body>
</html>

                    <div id="error2"> </div>
                    <div id="abort"> </div>
                   <div id="warnsize"> </div>