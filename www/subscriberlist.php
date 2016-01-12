<?php 
include_once('./partials/header.php');
require_once('./../class/NewsletterSubscriberManager.class.php');

if(!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == null){
        
        header('Location: login.php');      
}

?>	
<body>
        <?php
               	include './partials/main_admin.php';
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
                                <td><a href="edit.php?id=<?php echo $subscribers[$i]->NewsletterSubscriberID;?>">Edit</a></td>
                                <td><a href="delete.php?id=<?php echo $subscribers[$i]->NewsletterSubscriberID;?>">Delete</a></td>
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