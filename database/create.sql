SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `vivacity` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `vivacity`;

-- -----------------------------------------------------
-- Table `vivacity`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vivacity`.`users` ;

CREATE  TABLE IF NOT EXISTS `vivacity`.`users` (
  `userID` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(15) NOT NULL ,
  `name` VARCHAR(45) NOT NULL ,
  `college` VARCHAR(45) NOT NULL ,
  `course` VARCHAR(45) NOT NULL ,
  `semester` VARCHAR(45) NOT NULL ,
  `gender` VARCHAR(45) NOT NULL ,
  `city` VARCHAR(45) NULL ,
  `phone` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `dateOfBirth` DATE NOT NULL ,
  PRIMARY KEY (`userID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vivacity`.`events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vivacity`.`events` ;

CREATE  TABLE IF NOT EXISTS `vivacity`.`events` (
  `eventID` INT NOT NULL ,
  `realName` VARCHAR(45) NOT NULL ,
  `vivacityName` VARCHAR(45) NOT NULL ,
  `description` TEXT NOT NULL ,
  `rules` TEXT NOT NULL ,
  `contacts` TEXT NOT NULL ,
  `category` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`eventID`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vivacity`.`registrations`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vivacity`.`registrations` ;

CREATE  TABLE IF NOT EXISTS `vivacity`.`registrations` (
  `registrationID` INT NOT NULL AUTO_INCREMENT ,
  `userID` VARCHAR(45) NOT NULL ,
  `eventID` INT NOT NULL ,
  PRIMARY KEY (`registrationID`) ,
  INDEX `userID` (`userID` ASC) ,
  INDEX `eventID` (`eventID` ASC) ,
  CONSTRAINT `userID`
    FOREIGN KEY (`userID` )
    REFERENCES `vivacity`.`users` (`userID` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `eventID`
    FOREIGN KEY (`eventID` )
    REFERENCES `vivacity`.`events` (`eventID` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `vivacity`.`collegeData`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `vivacity`.`collegeData` ;

CREATE  TABLE IF NOT EXISTS `vivacity`.`collegeData` (
)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
