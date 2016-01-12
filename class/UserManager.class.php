<?php 
require_once('./../config/constants.php'); 
require_once('./../includes/SPDO.inc.php');
require_once('./../class/User.class.php');

class UserManager{
	
	private $instance;
	
	public function __construct(){
		$this->instance = SPDO::getInstance();
	}
	
	public function Login($username, $password){
		return $this->instance->query("SELECT COUNT(*) FROM User WHERE Username = '".$username."' && Password = '".$password."'")->fetchColumn();
	}
	
}