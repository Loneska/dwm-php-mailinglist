<?php 

require_once('./../class/NewsletterSubscriberManager.class.php');

if( isset($_GET['email']) && isset($_GET['token']))
{
    extract($_GET);
    
    $NSManager = new NewsletterSubscriberManager();

    $NSManager->Activate($email, $token);
}

?>