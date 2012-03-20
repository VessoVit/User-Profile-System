<?php

if(!function_exists('sanitize')) require("classes/sanitizer.php");
if(!defined('DB_USER')) require("../config.php");

$search = sanitize($_GET['search'],'sql');

mysql_connect(localhost, DB_USER, DB_PASS);
@mysql_select_db(DB_NAME) or die( "Database not found");

$query = "SELECT * FROM " . USER_TABLE . " WHERE name='$search'";
$received = mysql_fetch_object(mysql_query($query));

mysql_close();

if ($received == NULL) {
	echo 'Nobody found';
	}

else { 
echo $received->name;
	}

?>