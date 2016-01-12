<?php 
include_once('./partials/header.php');
require_once('./../class/NewsletterManager.class.php');

if(!isset($_SESSION["Admin"]) || $_SESSION["Admin"] == null){
        
        header('Location: login.php');      
}

?>	
<body>
        <?php
               	include './partials/main_admin.php';
                $NManager = new NewsletterManager();
                $newsletters = $NManager->Read();
        ?>
        <div class="container">
                <a href="create.php" class="btn btn-success">Nouvelle newsletter</a>
                <table class="table table-bordered">
                <thead>
                        <tr><th>Subject</th><th>Content</th><th>SendAt</th></tr>                
                </thead>
                <?php
                        for($i = 0; $i < count($newsletters); $i++){
                ?>
                        <tr>
                                
                                <td><?php echo $newsletters[$i]->Subject;?></td>
                                <td><?php echo $newsletters[$i]->Content;?></td>
                                <td><?php echo $newsletters[$i]->SendAt;?></td>
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