<?php

include_once './partials/header.php';
include_once './partials/main_admin.php';
if(!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == null){
        
        header('Location: login.php');      
}

require_once('./../class/NewsletterSubscriberManager.class.php');
?>
	<div class="container">
	<?php
	$NSManager = new NewsletterSubscriberManager();
	
	if(isset($_POST['newsletterSubscriberEmail']) && isset($_POST['id']) && isset($_POST['token'])){
		
		
		extract($_POST);
		
		$NSManager->Update($id, $newsletterSubscriberEmail, $token);
		
		header('Location: subscriberlist.php');      
	}
	
	if(isset($_GET['id'])){
		$subscriber = $NSManager->Read($_GET['id']);
		?>
			<form action="edit.php" method="POST">
					<div class="row">
						<div class="col-md-9">
							<div class="form-group">
								<input type="email" placeholder="Mon email" class="form-control"  id="email" name="newsletterSubscriberEmail" value="<?php echo $subscriber[0]->Email;?>" />
							</div>
						</div>
						<input type="hidden" value="<?php echo $subscriber[0]->NewsletterSubscriberID;?>" name="id"/>
						<input type="hidden" value="<?php echo $subscriber[0]->Token;?>" name="token"/>
	
						<div class="col-md-3">
							<div class="form-group">
								<input type="submit" value="Editer" class="btn btn-success" />
							</div>
						</div>					
					</div>
				</form>
		
		<?php     
	}else{
		header('Location: subscriberlist.php'); 
	}

?>
</div>