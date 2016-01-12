<?php 

include_once './partials/header.php';

require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
	<body>
<?php
        	if( isset($_GET['email']) && isset($_GET['unregisteredtoken']))
                {
                        var_dump($_GET);
                        
                        extract($_GET);
                        
                        $NSManager = new NewsletterSubscriberManager();
                
                        $NSManager->Unregister($email, $unregisteredtoken);
                }
?>
	</body>			
<?php 

include_once './partials/footer.php';

?>