<?php

if(!function_exists('sanitize')) require("sanitizer.php");
if(!defined('DB_USER')) require("../config.php");

$term = sanitize($_POST['term'],'sql');


/* if ($term!='' or $term=='Type your interest') {
	echo "You didn't fill in an interest!";
} 
else { */
	mysql_connect(localhost, DB_USER, DB_PASS);
	@mysql_select_db(DB_NAME) or die( "Database not found");
	
	$query = "INSERT INTO " . TERM_TABLE . " VALUES ('', '$term')";
	mysql_query($query);
	mysql_close();
	header('Location: ../include/getTerms.php'); 
	//}
?>