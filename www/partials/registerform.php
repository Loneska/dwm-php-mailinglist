			
			
		<?php

			if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
				echo "Votre email existe déjà !";
			}
		
		?>	
			
			<form action="register.php" method="POST">
				<div class="form-group">
					<label>M'inscrire</label>
					<input type="email" name="newsletterSubscriberEmail" />
				</div>
				<div class="form-group">
					<input type="submit" value="M'inscrire" />
				</div>
			</form>