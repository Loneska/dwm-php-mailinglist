<?php 
class Constants
{
	const BASEDIR = __DIR__;
	const BASEFOLDER = "/dwm-php-mailinglist/www/";
	
	const DB_USERNAME = "root";
	const DB_PASSWORD = "";
	const DB_HOST = "localhost";
	const DB_NAME = "examenphp";
	const DB_PORT = 3306;
	
	
	const NEWSLETTER_TITLE = "Loneska Newsletter";
	const SMTP_HOST = "localhost";
	
	
	/* DB State */
	const EMAIL_ALREADY_EXIST = 0;
	const EMAIL_ERROR = 1;
	const EMAIL_NOT_FOUND = 2;
	const BAD_FORMAT = 3;
	CONST IS_VALIDATE = 4;
}
?>