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
    
        $NSManager->Activate($email, $token);
    }

?>
	</body>			
<?php 

include_once './partials/footer.php';

?>