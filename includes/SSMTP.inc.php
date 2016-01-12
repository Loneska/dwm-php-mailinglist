<?php
require_once './../libs/PHPMailer/PHPMailerAutoload.php';
require_once './../config/constants.php'; 
 
class SSMTP
{

  private $MailInstance = null;
 
  private static $instance = null;
 
  const DEFAULT_SMTP_HOST = Constants::DB_HOST;
 
  private function __construct()
  {
    $this->mailInstance = new PHPMailer;
    $this->mailInstance->isSMTP();                                     
    $this->mailInstance->Host = DEFAULT_SMTP_HOST;
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
  }
}
?>