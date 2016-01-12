<?php 
include_once './partials/header.php';

require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
	<body>
<?php
   	include './partials/main.php';

    if( isset($_GET['email']) && isset($_GET['token']))
    {
        extract($_GET);
        
        $NSManager = new NewsletterSubscriberManager();
    
        $result = $NSManager->Activate($email, $token);
        
        if($result == Constants::BAD_FORMAT || $result == Constants::EMAIL_NOT_FOUND){
                echo '<div class="container"><div class="alert alert-danger" role="alert">Désolé mais cette adresse mail semble avoir déjà été enregistrée !</div></div>';
                include './partials/registerform.php';
        }else{
            echo '<div class="container"><div class="alert alert-success" role="alert">Merci pour votre inscription, celle-ci a bien été prise en compte.</div></div>';
        }
    }else{
        header('Location: index.php');      
    }
?>
	</body>			
<?php 

include_once './partials/footer.php';

?>