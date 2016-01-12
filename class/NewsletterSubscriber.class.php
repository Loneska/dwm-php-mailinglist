<?php 

class NewsletterSubscriber{
	
	private $newsletterSubscriberID;
	private $token;
	private $unregisterToken;
	private $email;
	
	public function __construct($token, $unregisterToken, $email){
		$this->setToken($token);
		$this->setUnregisterToken($unregisterToken);
		$this->setEmail($email);
	}
	
	public function getToken(){
		return $this->token;
	}
	
	public function setToken($token){
		$this->token = $token;
	}
	
	public function getUnregisterToken(){
		return $this->unregisterToken;
	}
	
	public function setUnregisterToken($unregisterToken){
		$this->unregisterToken = $unregisterToken;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function setID($id){
		$this->$newsletterSubscriberID = $id;
	}
	
	public function getID($id){
		return $this->$newsletterSubscriberID;
	}
}

?>