<?php 
include_once './partials/header.php';
require_once('./../config/constants.php');
require_once('./../class/UserManager.class.php');
require_once('./../includes/functions.inc.php');
require_once('./../includes/SSMTP.inc.php');

?>
		<body>
			
		<?php
		
			if( isset($_POST['username']) &&  isset($_POST['password']) ){
				
				extract($_POST);
				
				$UManager = new UserManager();
				
				if($UManager->Login($username, md5($password)) > 0){
        			header('Location: subscriberlist.php'); 
					$_SESSION["Admin"] = $username;
				}
			}
		
        	include './partials/main_admin.php';
		
        	include './partials/loginform.php';
		?>
		</body>			
<?php 
include_once './partials/footer.php';
?>