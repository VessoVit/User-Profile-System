	<?php
		include 'header.php';
	?>
	
	<div class="row">
		<div class="six columns centered">
			<div class="panel">
				<h2>Login</h2>
				<form class='nice' action='include/loginUser.php'>
					<h4>Email</h4>
					<input type='text' name='email'></br>
					<h4>Password</h4>
					<input type='password' name='password'></br>
					<input type='submit' class='blue nice button' value='Log in' name='submit'><br />
			</form>

	<?php 
		include 'register.php'
	?>


			</div>
		</div>
	</div>
	
	<?php
		include 'footer.php'; 
	?>
	