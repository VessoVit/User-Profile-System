<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("sqlConf.php");


if(isset($_GET['changename']))
  {
  $name = sanitize($_GET['name'],'sql');
  $id = sanitize($_GET['id'],'sql');
  if($name == '')
	{
	echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='1;URL=../editprofile.php'></HEAD>
	  <BODY>You have to fill stuff in!</BODY></HTML>";
	}
  else
	{
	mysql_connect(localhost, DB_USER, DB_PASS);
	@mysql_select_db(DB_NAME) or die( "Database not found");
	$query = "UPDATE " . USER_TABLE . "SET name='$name' WHERE id=$id";
	mysql_query($query);
	mysql_close();
	}
  }

if(isset($_GET['changepass']))
  {
  $password = sanitize($_GET['password'],'sql');
  $new = sanitize($_GET['new'],'sql');
  if($password == '' && $new == '')
	{
	echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='1;URL=../editprofile.php'></HEAD>
	  <BODY>You have to fill stuff in!</BODY></HTML>";
	}
  else if($password == '')
	{
	echo "<HTML><HEAD><META HTTP-EQUIV='refresh' CONTENT='1;URL=../editprofile.php'></HEAD>
	<BODY>You have to fill in the old password!</BODY></HTML>";
	}
  else
	{
	mysql_connect(localhost, DB_USER, DB_PASS);
	@mysql_select_db(DB_NAME) or die( "Database not found");
	$query = "UPDATE " . USER_TABLE . "SET password='$new' WHERE password=$password";
	mysql_query($query);
	mysql_close();
	}
  }
//header("Location: ../profile.php?id=");
?>