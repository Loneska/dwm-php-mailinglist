<?php 
require_once('./../config/constants.php'); 
require_once('./../includes/SPDO.inc.php');

class UserManager{
	
	private $instance;
	
	public function __construct(){
		$this->instance = SPDO::getInstance();
	}
	
	public function Read($id = null){
		if($id == null){
			return $this->instance->query('SELECT * FROM Newsletter')->fetchAll(PDO::FETCH_OBJ);
		}else{
			return $this->instance->query('SELECT * FROM Newsletter WHERE NewsletterID = '.$id)->fetchAll(PDO::FETCH_OBJ);
		}
	}
	
}