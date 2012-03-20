<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("../config.php");

$name = sanitize($_POST['name'],'sql');
$email = sanitize($_POST['email'],'sql');
$password = sanitize($_POST['password'],'sql');

if ($name=='' or $email=='' or $password=='')
  {
  echo "You sneed to fill in all fields!";
  }
else
  {
  mysql_connect(localhost, DB_USER, DB_PASS);
  @mysql_select_db(DB_NAME) or die( "Database not found");
  $query = "Select * FROM " . USER_TABLE . " WHERE email='$email'";
  $sameemails = mysql_query($query);
  if(mysql_numrows($sameemails) > 0)
	{
	echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=..'></HEAD>
	<BODY>USER ALREADY EXISTS!</BODY></HTML>";
	mysql_close();
	}
  else // 
	{
	$query = "INSERT INTO " . USER_TABLE . " VALUES ('', '$name', '$email', '$password')";
	mysql_query($query);
	mysql_close();
	header('Location: ../include/getusers.php'); // TODDDDDO
	}
  }
?>