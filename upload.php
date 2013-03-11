<?php
include ("config.php");

function bytesToSize1024($bytes, $precision = 2) {
    $unit = array('B','KB','MB');
    return @round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), $precision).' '.$unit[$i];
}
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


$sFileName = $_FILES['image_file']['name'];
$sFileType = $_FILES['image_file']['type'];
$sFileSize = bytesToSize1024($_FILES['image_file']['size'], 1);
$question = "Would you rather sleep or get good grades….?";

if (move_uploaded_file($_FILES['image_file']['tmp_name'], "uploads/".$_FILES['image_file']['name'])) {
   //$result = mysql_query("INSERT INTO  `c_cs147_rose34`.`photos` (`user`, `photo`) VALUES ('$_POST['username']', 'uploads/".$_FILES['image_file']['name']."');");
   $query = "INSERT INTO photos (user, photo, question) VALUES ('" .$_POST['username']. "', 'uploads/".$_FILES['image_file']['name']."', '".$question."');";
   $result = mysql_query($query);
} 

echo <<<EOF
<p>Your file: {$sFileName} has been successsfully received.</p>
<p>Type: {$sFileType}</p>
<p>Size: {$sFileSize}</p>
EOF;
?>