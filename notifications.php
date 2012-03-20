<?php
	// login to the database
	$query = "SELECT * FROM ddaRel WHERE friend_id = '$_SESSION[user_id]' AND rel_status = '0'";
	$result = mysql_query($query);
	$row = mysql_num_rows($result);
	if ($row < 1) { // there are new requests
	   echo "<a href='requests.php'>You have ".$row." new friend requests</a>";
	} else {
	 echo "No new requests.";
	}

?>