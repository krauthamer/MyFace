<?php
session_start();
include("config.php");


// Clear the error message
	$error_msg = "";

 // If the user isn't logged in, try to log them in
     if (isset($_POST['submit'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $user_username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $user_password = mysqli_real_escape_string($dbc, trim($_POST['password']));

      if (!empty($user_username) && !empty($user_password)) {
        // Look up the username and password in the database
        $query = "select * from users where username='$user_username' AND password = SHA('$user_password')";
        $data = mysqli_query($dbc, $query);

        if (mysqli_num_rows($data) == 1) {
          // The log-in is OK so set the user ID and username session vars (and cookies), and redirect to the home page
          $row = mysqli_fetch_array($data);
          $_SESSION['username'] = $row['username'];
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          header('Location: index.php');
        }
        else {
          // The username/password are incorrect so set an error message
          $error_msg = 'Sorry, you must enter a valid username and password to log in.';
          //header('Location: landing.html');
        }
      }
    }
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
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
	<div data-role="page">
		<div data-role="header" color="purple">
			<a href="http://stanford.edu/~rose34/cgi-bin/My%20Face/landing.html" data-inline="true">Back</a>	
			<h2><font face="Helvetica" font size="5">Login</font></h2>
		</div>
	<p>
	<center>
	<div id = "campic">
	<img src="pics/takepic.jpg" alt="home_img.jpg" style="max-height:250px; "/>
	</div>
	</center>
	</p>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <label for="username">Username:</label>
      <input type="text" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password">Password:</label>
      <input type="password" name="password" />
    </fieldset>
   <input type="submit" value="Log In" name="submit"/> 
 	 </form>
</body>
</html>