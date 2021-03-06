<?php 
require_once('./../config/constants.php'); 
require_once('./../includes/SPDO.inc.php');
require_once('./../class/Newsletter.class.php');

class NewsletterManager{
	
	private $instance;
	
	public function __construct(){
		$this->instance = SPDO::getInstance();
	}
	
	public function Create(Newsletter &$newsletter){
		$subject = $newsletter->getSubject();
		$content = $newsletter->getContent();
		
		$statement = $this->instance->prepare("INSERT INTO Newsletters (Subject, Content) VALUES (:subject, :content)");
		$statement->bindParam(':subject', $subject);
		$statement->bindParam(':content', $content);
		return $statement->execute();
	}
	
	public function Read($id = null){
		if($id == null){
			return $this->instance->query('SELECT * FROM Newsletters')->fetchAll(PDO::FETCH_OBJ);
		}else{
			return $this->instance->query('SELECT * FROM Newsletters WHERE NewsletterID = '.$id)->fetchAll(PDO::FETCH_OBJ);
		}
	}
	
}