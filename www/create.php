<?php 
include_once './partials/header.php';
require_once('./../config/constants.php');
require_once('./../class/NewsletterManager.class.php');
require_once('./../includes/functions.inc.php');
require_once('./../includes/SSMTP.inc.php');
require_once('./../class/NewsletterSubscriberManager.class.php');

?>
		<body>
			
		<?php
		
			if( isset($_POST['subject']) &&  isset($_POST['content']) ){
				extract($_POST);
				
				$NManager = new NewsletterManager();
				$NSManager = new NewsletterSubscriberManager();

				$newsletter = new Newsletter($subject, $content);
				
				if($NManager->Create($newsletter)){
					
					$subscribers = $NSManager->Read();
					
					$mail = SSMTP::getInstance();
					
					for($i = 0; $i < count($subscribers); $i++){
						$mail->sendEmail("news@loneska.be", $subscribers[$i]->Email, $subject, $content);
					}
				}
				
				header('Location: newsletterlist.php');      
			}
		
        	include './partials/main_admin.php';
		
        	include './partials/createform.php';
		?>
		</body>			
<?php 
include_once './partials/footer.php';
?>