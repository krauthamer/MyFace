
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
	<div data-role="page">
	
		<div data-role="header" color="purple">
		<a href="landing.html" data-inline="true">Back</a>	
			<h2><font face="Helvetica" font size="5">Register</font></h2>
		</div>


<?php
  require_once('appvars.php');
  require_once('config.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  if (isset($_POST['submit'])) {
    // Grab the profile data from the POST
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $password1 = mysqli_real_escape_string($dbc, trim($_POST['password1']));
    $password2 = mysqli_real_escape_string($dbc, trim($_POST['password2']));

    if (!empty($username) && !empty($password1) && !empty($password2) && ($password1 == $password2)) {
      // Make sure someone isn't already registered using this username
      $query = "SELECT * FROM users WHERE username = '$username'";
      $data = mysqli_query($dbc, $query);
      if (mysqli_num_rows($data) == 0) {
        // The username is unique, so insert the data into the database
        $query = "INSERT INTO users (username, password) VALUES ('$username', SHA('$password1'))";
        mysqli_query($dbc, $query);

        // Confirm success with the user
        echo '<p>Your new account has been successfully created. You\'re now ready to <a href="login.php">log in</a>.</p>';

        mysqli_close($dbc);
        exit();
      }
      else {
        // An account already exists for this username, so display an error message
        echo '<p class="error">An account already exists for this username.</p>';
        $username = "";
      }
    }
    else {
      echo '<p class="error">You must enter all of the sign-up data, including the desired password twice.</p>';
    }
  }

  mysqli_close($dbc);
?>

  <p><font face="Helvetica"><center>Sign up with your desired username and password to start making memories. <br>We know you want to.</center></p>
  <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <fieldset>
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" value="<?php if (!empty($username)) echo $username; ?>" /><br />
      <label for="password1">Password:</label>
      <input type="password" id="password1" name="password1" /><br />
      <label for="password2">Password (retype):</label>
      <input type="password" id="password2" name="password2" /><br />
    </fieldset>
    <input type="submit" value="Sign Up" name="submit" />
  </form>
	
	<div data-role="footer" data-theme="c">
	</div>	
	</div>
</body>
</html>