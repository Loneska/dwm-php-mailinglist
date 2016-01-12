<?php

	if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
        include_once 'main.php';
	}
?>

<div class="container">		
			
		<?php

			if(isset($emailError) && $emailError ==  Constants::EMAIL_ALREADY_EXIST){
				echo '<div class="alert alert-danger" role="alert">Désolé mais cette adresse mail semble avoir déjà été enregistrée ou bien celle-ci n’est pas valide, veuillez inclure «@» dans l’adresse.</div>';
			}
		
		?>	
			
			<form action="register.php" method="POST">
				<div class="row">
					<div class="col-md-9">
						<div class="form-group">
							<input type="email" placeholder="Mon email" class="form-control"  id="email" name="newsletterSubscriberEmail" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<input type="submit" value="S'inscrire" class="btn btn-success" />
						</div>
					</div>					
				</div>
			</form>
			
</div>