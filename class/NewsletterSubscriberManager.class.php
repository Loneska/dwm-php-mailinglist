<?php 
require_once './../config/constants.php'; 
require_once('./../includes/SPDO.inc.php');
require_once('./../class/NewsletterSubscriber.class.php');

class NewsletterSubscriberManager{
	
	private $instance;
	
	public function __construct(){
		$this->instance = SPDO::getInstance();
	}
	
	public function Create(NewsletterSubscriber &$subscriber){
		$email = $subscriber->getEmail();
		$unregisterToken = $subscriber->getUnregisterToken();
		$token = $subscriber->getToken();
		
		if($this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber WHERE Email = '".$email."'")->fetchColumn() > 0){
			return Constants::EMAIL_ALREADY_EXIST;
		}else{
			$statement = $this->instance->prepare("INSERT INTO NewsletterSubscriber (Email, UnregisterToken, Token) VALUES (:email, :unregisterToken, :token)");
			$statement->bindParam(':email', $email);
			$statement->bindParam(':unregisterToken', $unregisterToken);
			$statement->bindParam(':token', $token);
			return $statement->execute();
		}
	}
	
	public function Read($id = null){
		if($id == null){
			return $this->instance->query('SELECT * FROM NewsletterSubscriber')->fetchAll(PDO::FETCH_OBJ);
		}else{
			return $this->instance->query('SELECT * FROM NewsletterSubscriber WHERE NewsletterSubscriberID = '.$id)->fetchAll(PDO::FETCH_OBJ);
		}
	}
	
	public function Update($id){
		
	}
	
	public function Delete($email, $unregisterToken){
		
	}
}
?>