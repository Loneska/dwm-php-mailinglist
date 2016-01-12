<?php

	if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
        include 'main.php';
	}
?>

<div class="container">		
			
		<?php

			if(isset($emailError)){
				echo '<div class="alert alert-danger" role="alert">Authentification impossible !</div>';
			}
		
		?>	
			
			<form action="login.php" method="POST">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text"  class="form-control"  id="username" name="username" />
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password"  class="form-control"  id="password" name="password" />
				</div>
				<div class="form-group">
					<input type="submit" value="Me connecter !" class="btn btn-success" />
				</div>
			</form>
			
</div>