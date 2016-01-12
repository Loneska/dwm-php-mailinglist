<?php 

class Newsletter{
	
	private $subject = "";
	private $content = "";
	
	public function __construct($subject, $content){
		setSubject($subject);
		setContent($content);
	}
	
	public function getSubject(){
		return $this->subject;
	}
	
	public function setSubject($subject){
		$this->subject = $subject;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setContent($content){
		$this->content = $content;
	}
}

?>