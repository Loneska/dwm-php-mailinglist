<?php 
require_once('./../config/constants.php'); 
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
	
	public function Activate($email, $token){
		if($this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber WHERE Email = '".$email."' && Token = '".$token."'")->fetchColumn() == 0){
			return Constants::BAD_FORMAT;
		}else{
			if($this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber WHERE Email = '".$email."'")->fetchColumn() == 0){
				return Constants::EMAIL_NOT_FOUND;
			}else{
				$subscriber = $this->instance->query("SELECT * FROM NewsletterSubscriber WHERE Email = '".$email."' && Token = '".$token."'")->fetchAll(PDO::FETCH_OBJ)[0];
				$date = new DateTime();
				$dateCreate = new DateTime($subscriber->CreatAt);
				$dateCreate->add(new DateInterval('PT30M'));
				
				if($dateCreate > $date){
					
					$this->Update($subscriber->NewsletterSubscriberID, $subscriber->Email, null);
					
					return Constants::SUCCESS;
					
				}else{
					
					$this->Delete($subscriber->NewsletterSubscriberID);
					
					return Constants::BAD_FORMAT;
					
				}
				
			}

		}
	}
	
	public function Unregister($email, $unregistrationtoken){
		if($this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber WHERE Email = '".$email."'")->fetchColumn() == 0){
			return Constants::EMAIL_NOT_FOUND;
		}else{
			if($this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber WHERE Email = '".$email."' && UnregisterToken = '".$unregistrationtoken."'")->fetchColumn() == 0){
				return Constants::BAD_FORMAT;
			}else{
				$subscriber = $this->instance->query("SELECT * FROM NewsletterSubscriber WHERE Email = '".$email."' && UnregisterToken = '".$unregistrationtoken."'")->fetchAll(PDO::FETCH_OBJ)[0];
				
				$this->Delete($subscriber->NewsletterSubscriberID);
				
				return Constants::SUCCESS;
			}
		}
	}
	
	public function Count(){
		return $this->instance->query("SELECT COUNT(*) FROM NewsletterSubscriber")->fetchColumn();
	}
	
	public function Update($id, $email, $token){
			$statement = $this->instance->prepare("UPDATE NewsletterSubscriber SET Email = :email, Token = :token WHERE NewsletterSubscriberID = :id");
			$statement->bindParam(':id', $id);
			$statement->bindParam(':email', $email);
			$statement->bindParam(':token', $token);
			return $statement->execute();
	}
	
	public function Delete($id){
			$statement = $this->instance->prepare("DELETE FROM NewsletterSubscriber WHERE NewsletterSubscriberID = :id");
			$statement->bindParam(':id', $id);
			return $statement->execute();
	}
}
?>