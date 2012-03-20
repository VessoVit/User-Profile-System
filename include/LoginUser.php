<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("../config.php");

$email = sanitize($_GET['email'],'sql');
$password = sanitize($_GET['password'],'sql');

if ($email=='' or $password=='')
  {
  echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=..'></HEAD>
  <BODY>You need to fill in all fields!</BODY></HTML>";
  }
else
  {
  mysql_connect(localhost, DB_USER, DB_PASS);
  @mysql_select_db(DB_NAME) or die( "Database not found");
  $query = "Select * FROM " . USER_TABLE . " WHERE email='$email' AND password='$password'";
  $receivedData = mysql_query($query);
  if($receivedData == NULL)
	{
	echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=..'></HEAD>
	<BODY> <?php
		include 'header.php';
	?>
	  Wrong PASSWORD or EMAIL!</BODY></HTML>";
	mysql_close();
	}
  else
	{
	$asObject = mysql_fetch_object($receivedData);
	$redirect = "Location: ../profile.php?id=" . $asObject->id;
	mysql_close();
	header($redirect);
	}
  }
?>