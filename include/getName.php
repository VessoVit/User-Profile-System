<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("sqlConf.php");

$id = sanitize($_GET['id'],'sql');

mysql_connect(localhost, DB_USER, DB_PASS);
@mysql_select_db(DB_NAME) or die( "Database not found");

$query = "SELECT * FROM " . USER_TABLE . " WHERE id=$id";
$received;
if(mysql_fetch_object(mysql_query($query)))
  {
  $received = mysql_fetch_object(mysql_query($query));
  }

mysql_close();

echo $received->name;

?>