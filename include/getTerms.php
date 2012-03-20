<?php
require("../config.php");
mysql_connect(localhost, DB_USER, DB_PASS);
@mysql_select_db(DB_NAME) or die("Database not found"); 
$query = "SELECT * FROM " . TERM_TABLE . "WHERE id=$id";
$tblcontent = mysql_query($query);
$tblrows = mysql_numrows($tblcontent);
mysql_close();

$i=0;
$returnstring = "";
while ($i < $tblrows)
{
$returnstring .= mysql_result($tblcontent, $i, "term") . " , ";
$returnstring .= "<br>";
$i++;
}
echo $returnstring;
echo "That's it.";
?>