<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("../sqlConf.php");

$user_ID = sanitize($_POST['user_ID'],'sql');
$friend_ID = sanitize($_POST['friend_ID'],'sql');

if ($user_ID=='' or $friend_ID=='')
  {
  echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=../profile.php'></HEAD>
  <BODY>You need to fill in all fields!</BODY></HTML>";
  }
else
  {
  mysql_connect(localhost, DB_USER, DB_PASS);
  @mysql_select_db(DB_NAME) or die( "Database not found");
  $query = "Select * FROM " . REL_TABLE . " WHERE user_ID in ($user_ID, $friend_ID) AND friend_ID in ($user_ID, $friend_ID)";
  $existent = mysql_query($query);
  if(mysql_numrows($existent) > 0)
	{
	$asObject = mysql_fetch_object($existent);
	if($asObject->rel_status == 0)
	  {
	  echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=../profile.php'></HEAD>
	  <BODY>There is already a pending friend request!</BODY></HTML>";
	  }
	else
	  {
	  echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='2;URL=../profile.php'></HEAD>
	  <BODY>You are already friends!</BODY></HTML>";
	  }
	mysql_close();
	}
  else // 
	{
	$query = "INSERT INTO " . REL_TABLE . " VALUES ('$user_ID', '$friend_ID', '0')";
	mysql_query($query);
	mysql_close();
	header('Location: ../profile.php'); // TODDDDDO
	}
  }
?>