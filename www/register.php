<?php 
include_once './partials/header.php';
require_once('./../class/NewsletterSubscriberManager.class.php');
require_once('./../includes/functions.inc.php');
require_once('./../includes/SSMTP.inc.php');

?>	
		<body>
		<?php
        	if( isset($_POST['newsletterSubscriberEmail']) )
{
    extract($_POST);
    if (!filter_var($newsletterSubscriberEmail, FILTER_VALIDATE_EMAIL)) {
        $emailError = Constants::BAD_FORMAT;
        include './partials/registerform.php';
    
    }else{
        $NSManager = new NewsletterSubscriberManager();
        $NewsletterSubscriber = new NewsletterSubscriber(GUID(), GUID(), $newsletterSubscriberEmail);
        if($NSManager->Create($NewsletterSubscriber)){
            $mail = SSMTP::getInstance();
            $mail->sendConfirmation($NewsletterSubscriber->getEmail(), $NewsletterSubscriber->getToken(), $NewsletterSubscriber->getUnregisterToken());
            include './partials/successRegistration.php';
        }else{
            $emailError = Constants::EMAIL_ALREADY_EXIST;
            include './partials/registerform.php';
        } 
    }
}else{
      header('Location: index.php');      
}
		?>
		</body>			
<?php 
include_once './partials/footer.php';
?>