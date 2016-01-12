
<?php 

require_once('./../class/NewsletterSubscriberManager.class.php');


if( isset($_POST['newsletterSubscriberEmail']) )
{
    
    extract($_POST);
    
    
    if (!filter_var($newsletterSubscriberEmail, FILTER_VALIDATE_EMAIL)) {
        
        $emailError = Constants::BAD_FORMAT;
        
        include './partials/registerform.php';
    
    }else{
        $NSManager = new NewsletterSubscriberManager();
    
        $NewsletterSubscriber = new NewsletterSubscriber(com_create_guid(), com_create_guid(), $newsletterSubscriberEmail);
        
        $insertState = $NSManager->Create($NewsletterSubscriber);
        
        if($insertState){
            echo "Votre email a bien été ajoutée.";
        }else{
            $emailError = Constants::EMAIL_ALREADY_EXIST;
            include './partials/registerform.php';
        } 
    }

}else{
      header('Location: index.php');      
}

?>