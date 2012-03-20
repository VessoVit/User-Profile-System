<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("sqlConf.php");

$email = sanitize(stripslashes($_POST['email']), 'trim_urle');

mysql_connect(localhost, DB_USER, DB_PASS);
@mysql_select_db(DB_NAME) or die( "Database not found");
$query = "SELECT * FROM " . USER_TABLE . " WHERE email='$email'";
$received = mysql_fetch_object(mysql_query($query));
mysql_close();
//$email = stripslashes($email);
$subject = "Your DDA Password!";
$body = "Your password for DDA is:<br>" . $received->password . "<br>Have fun!";
if (mail($email, $subject, $body)) echo("<p>Message successfully sent!</p>");
else echo("<p>Message delivery failed...</p>");
?>