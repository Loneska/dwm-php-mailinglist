<?php 
include_once './partials/header.php';

require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
	<body>
<?php
    if( isset($_GET['email']) && isset($_GET['token']))
    {
        extract($_GET);
        
        $NSManager = new NewsletterSubscriberManager();
    
        $result = $NSManager->Activate($email, $token);
        
        if($result == Constants::BAD_FORMAT || $result == Constants::EMAIL_NOT_FOUND){
                echo "Oups ... Validation impossible";
                include './partials/registerform.php';
        }else{
            echo "Validation réussie !";
        }
    }
?>
	</body>			
<?php 

include_once './partials/footer.php';

?>