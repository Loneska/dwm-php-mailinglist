CREATE DATABASE examenphp;

USE examenphp;
-- ---
-- Globals
-- ---

-- SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
-- SET FOREIGN_KEY_CHECKS=0;

-- ---
-- Table 'User'
-- 
-- ---


DROP TABLE IF EXISTS `User`;
		
CREATE TABLE `User` (
  `UserID` INT(12) NOT NULL AUTO_INCREMENT,
  `Username` VARCHAR(120) NOT NULL,
  `Email` VARCHAR(80) NOT NULL,
  `Password` VARCHAR(160) NOT NULL,
  `RoleID` INT(12) NULL DEFAULT NULL,
  PRIMARY KEY (`UserID`)
);

-- ---
-- Table 'Newsletters'
-- 
-- ---

DROP TABLE IF EXISTS `Newsletters`;
		
CREATE TABLE `Newsletters` (
  `NewsletterID` INT(12) NOT NULL AUTO_INCREMENT,
  `Subject` VARCHAR(60) NOT NULL,
  `Content` MEDIUMTEXT NOT NULL,
  `SendAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsletterID`)
);

-- ---
-- Table 'NewsletterSubscriber'
-- 
-- ---

DROP TABLE IF EXISTS `NewsletterSubscriber`;
		
CREATE TABLE `NewsletterSubscriber` (
  `NewsletterSubscriberID` INT(12) NOT NULL AUTO_INCREMENT,
  `Email` VARCHAR(160) NOT NULL,
  `UnregisterToken` VARCHAR(60) NULL DEFAULT NULL,
  `Token` VARCHAR(160) NULL DEFAULT NULL,
  `CreatAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`NewsletterSubscriberID`)
);

-- ---
-- Table 'Role'
-- 
-- ---

DROP TABLE IF EXISTS `Role`;
		
CREATE TABLE `Role` (
  `RoleID` INT(4) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(64) NOT NULL,
  PRIMARY KEY (`RoleID`)
);

-- ---
-- Foreign Keys 
-- ---

ALTER TABLE `User` ADD FOREIGN KEY (RoleID) REFERENCES `Role` (`RoleID`);

-- ---
-- Table Properties
-- ---

-- ALTER TABLE `User` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Newsletters` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `NewsletterSubscriber` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- ALTER TABLE `Role` ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ---
-- Test Data
-- ---

-- INSERT INTO `User` (`UserID`,`Username`,`Email`,`Password`,`RoleID`) VALUES
-- ('','','','','');
-- INSERT INTO `Newsletters` (`NewsletterID`,`Subject`,`Content`,`SendAt`) VALUES
-- ('','','','');
-- INSERT INTO `NewsletterSubscriber` (`NewsletterSubscriberID`,`Email`,`UnregisterToken`,`Token`,`CreatAt`) VALUES
-- ('','','','','');
-- INSERT INTO `Role` (`RoleID`,`Name`) VALUES
-- ('','');

 