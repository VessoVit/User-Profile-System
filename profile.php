	<?php
		include 'header.php';
	?>
<div class='row'>
  		<div class='eight centered columns'>
  			<div class='panel'>
				<h2>Pending Friendships</h2>
					
					<p><?php include('notifications.php'); ?></p>
					
			</div>			
		</div>
		
		<div class='nine centered columns'>	
			<div class='panel'>	
				<h2>Add interests</h2>
				
				<form action= "include/addTerm.php">
					<input type='text' name='Type your interest'>
				<input type=submit class='blue nice button' value='Add!'>
				</form>
				
			</div>
		</div>
		
	
	<div class='row'>
		<div class='ten centered columns'>
			<div class='panel'>
				<h2>Kick out Friend(s)</h2>
					<select>
						<option value='friend_ID'>[usr_name]</option> 
						<!-- And so on..loop? -->
						<option value='friend_ID'>Vesso</option> 
						<option value='friend_ID'>Isa</option> 
						<option value='friend_ID'>Raphael</option>
						<option value='friend_ID'>Cecile</option> 
					</select>
				<p><a href='user.html' class='red nice button'>End friendship!</a></p></div>
	</div>
		
</div>
<div class='eleven centered columns'>	
	<div class='panel'>	
		<h2>People you may know..</h2>
			

	</div>

</div>
	<?php
		include 'footer.php';
	?>
