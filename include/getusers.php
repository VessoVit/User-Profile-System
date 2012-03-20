<?php
if(!defined('DB_USER')) require("../config.php");

mysql_connect(localhost, DB_USER, DB_PASS);
@mysql_select_db(DB_NAME) or die("Database not found");
$query = "SELECT * FROM " . USER_TABLE;
$tblcontent = mysql_query($query);
$tblrows = mysql_numrows($tblcontent);
mysql_close();

$i=0;
$returnstring = "";
while ($i < $tblrows)
  {
  $returnstring .= mysql_result($tblcontent, $i, "name") . " || ";
  $returnstring .= mysql_result($tblcontent, $i, "email");
  $returnstring .= "<br>";
  $i++;
  }

echo $returnstring;
echo "Table end.";
?>