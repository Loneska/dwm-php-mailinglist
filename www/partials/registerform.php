<?php

	if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
        include_once 'main.php';
	}
?>

<div class="container">		
			
		<?php

			if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
				echo '<div class="alert alert-danger" role="alert">Votre email existe déjà !</div>';
			}
		
		?>	
			
			<form action="register.php" method="POST">
				<div class="form-group">
					<label for="email">M'inscrire</label>
					<input type="email" placeholder="Mon email" class="form-control"  id="email" name="newsletterSubscriberEmail" />
				</div>
				<div class="form-group">
					<input type="submit" value="M'inscrire" class="btn btn-success" />
				</div>
			</form>
			
</div>