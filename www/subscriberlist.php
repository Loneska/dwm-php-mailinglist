<?php 
include_once('./partials/header.php');
require_once('./../class/NewsletterSubscriberManager.class.php');

?>	
<body>
        
        <?php
               	include './partials/main.php';
                $NSManager = new NewsletterSubscriberManager();
                $subscribers = $NSManager->Read();
        ?>
        <div class="container">
                <table class="table table-bordered">
                <thead>
                        <tr><th>Email</th><th>Date d'inscription</th><th>Activer</th></tr>                
                </thead>
                <?php
                        for($i = 0; $i < count($subscribers); $i++){
                ?>
                        <tr>
                                <td><?php echo $subscribers[$i]->Email;?></td>
                                <td><?php echo $subscribers[$i]->CreatAt;?></td>
                                <td><?php if($subscribers[$i]->Token == null){ echo "Oui"; }?></td>
                        </tr>
                <?php
                        }
                ?>
                </table>
        </div>
</body>       
        <?php 
include_once './partials/footer.php';
?>