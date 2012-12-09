SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`quiz`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`quiz` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `time_limit` INT NULL ,
  `created_at` DATETIME NOT NULL ,
  `deleted_at` DATETIME NULL ,
  `closed_at` DATETIME NULL ,
  `active` TINYINT(1) NOT NULL DEFAULT true ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`question`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `mydb`.`question` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `question` VARCHAR(256) NOT NULL ,
  `answer1` VARCHAR(256) NOT NULL ,
  `answer2` VARCHAR(45) NOT NULL ,
  `answer3` VARCHAR(256) NOT NULL ,
  `answer4` VARCHAR(256) NOT NULL ,
  `correct` INT NOT NULL ,
  `user_answer` INT NULL ,
  `created_at` DATETIME NOT NULL ,
  `modified_at` DATETIME NULL ,
  `deleted_at` DATETIME NOT NULL ,
  `active` TINYINT(1) NOT NULL ,
  `quiz_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_question_quiz_idx` (`quiz_id` ASC) ,
  CONSTRAINT `fk_question_quiz`
    FOREIGN KEY (`quiz_id` )
    REFERENCES `mydb`.`quiz` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
