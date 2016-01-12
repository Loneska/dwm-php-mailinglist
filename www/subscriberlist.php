<?php 
include_once('./partials/header.php');
require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
		<body>

<?php

        $NSManager = new NewsletterSubscriberManager();
        
        
        $subscribers = $NSManager->Read();
        
?>
        
        <table class="table table-bordered">
<?php
        
        for($i = 0; $i < count($subscribers); $i++){
                
?>
                
        <tr>
                <td><?php echo $subscribers[$i]->Email;?></td>
                <td><?php echo $subscribers[$i]->CreatAt;?></td>
        </tr>
                
                
<?php
        }

 ?>
        </table>
        
        <?php 
include_once './partials/footer.php';
?>