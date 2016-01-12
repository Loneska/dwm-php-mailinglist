<?php
require_once './../libs/PHPMailer/PHPMailerAutoload.php';
require_once './../config/constants.php'; 
 
class SSMTP
{

  private $MailInstance = null;
 
  private static $instance = null;
 
  const DEFAULT_SMTP_HOST = Constants::SMTP_HOST;
 
  private function __construct()
  {
    $this->mailInstance = new PHPMailer;
    $this->mailInstance->isSMTP();                                     
    $this->mailInstance->Host = self::DEFAULT_SMTP_HOST;
  }
 
  public static function getInstance()
  {  
    if(is_null(self::$instance))
    {
      self::$instance = new SSMTP();
    }
    return self::$instance;
  }
 
  public function sendEmail($from, $to, $subject, $message)
  {
    $this->mailInstance->SetFrom($from, Constants::NEWSLETTER_TITLE); 
    $this->mailInstance->AddAddress($to); 
    $this->mailInstance->Subject = $subject;
    $this->mailInstance->MsgHTML($message);
    $this->mailInstance->IsHTML(true); 
    $this->mailInstance->CharSet="utf-8";
    
    return $this->mailInstance->Send();
  }
  
  public function sendConfirmation($to)
  {
    $message = file_get_contents('./../templates/registrationConfirmation.html'); 
    $message = str_replace('%validateLink%', ValidateLink(), $message); 
    
    $this->sendEmail('register@loneska.be', $to, 'Registration confirmation', $message);
  }
  
  public function ValidateLink(){
    
  }
}
?>