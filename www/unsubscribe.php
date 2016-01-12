<?php 

include_once './partials/header.php';

require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
	<body>
<?php
        	if( isset($_GET['email']) && isset($_GET['unregisteredtoken']))
                {
                        extract($_GET);
                        
                        $NSManager = new NewsletterSubscriberManager();
                
                        $result = $NSManager->Unregister($email, $unregisteredtoken);
                        
                        if($result == Constants::BAD_FORMAT || $result == Constants::EMAIL_NOT_FOUND){
                                echo "Oups ... Votre email n'as pas été trouvée !";
                        }else{
                                echo "Suppression réussie !";
                                include './partials/registerform.php';
                        }
                }
?>
	</body>			
<?php 

include_once './partials/footer.php';

?>