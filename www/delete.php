<?php

require_once('./../class/NewsletterSubscriberManager.class.php');
if(!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == null){
        
        header('Location: login.php');      
}

$NSManager = new NewsletterSubscriberManager();

if(isset($_GET['id'])){
	$NSManager->Delete($_GET['id']);
	
	header('Location: subscriberlist.php');      
}

?>