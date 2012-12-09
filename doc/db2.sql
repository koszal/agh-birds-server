SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `birds2` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci ;
USE `birds2` ;

-- -----------------------------------------------------
-- Table `birds2`.`bird`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`bird` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `latin_name` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `order` VARCHAR(127) NOT NULL ,
  `family` VARCHAR(127) NOT NULL ,
  `genus` VARCHAR(127) NOT NULL ,
  `species` VARCHAR(127) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `modified_at` DATETIME NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`country`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`country` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(63) NOT NULL ,
  `short_name` VARCHAR(7) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`api_user`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`api_user` (
  `key` VARCHAR(31) NOT NULL ,
  `created_at` DATETIME NOT NULL COMMENT '	' ,
  `modified_at` DATETIME NULL ,
  PRIMARY KEY (`key`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`api_requests`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`api_requests` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `created_at` DATETIME NOT NULL ,
  `url` VARCHAR(1024) NOT NULL ,
  `api_user_key` VARCHAR(31) NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_api_requests_api_user_idx` (`api_user_key` ASC) ,
  CONSTRAINT `fk_api_requests_api_user`
    FOREIGN KEY (`api_user_key` )
    REFERENCES `birds2`.`api_user` (`key` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`bird_has_country`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`bird_has_country` (
  `bird_id` INT NOT NULL ,
  `country_id` INT NOT NULL ,
  PRIMARY KEY (`bird_id`, `country_id`) ,
  INDEX `fk_bird_has_country_country1_idx` (`country_id` ASC) ,
  INDEX `fk_bird_has_country_bird1_idx` (`bird_id` ASC) ,
  CONSTRAINT `fk_bird_has_country_bird1`
    FOREIGN KEY (`bird_id` )
    REFERENCES `birds2`.`bird` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_bird_has_country_country1`
    FOREIGN KEY (`country_id` )
    REFERENCES `birds2`.`country` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`media`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`media` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `description` TEXT NOT NULL ,
  `filename` VARCHAR(255) NOT NULL ,
  `mime_type` VARCHAR(63) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `modified_at` DATETIME NULL ,
  `resource_type` ENUM('image','sound') NOT NULL ,
  `bird_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_media_bird1_idx` (`bird_id` ASC) ,
  CONSTRAINT `fk_media_bird1`
    FOREIGN KEY (`bird_id` )
    REFERENCES `birds2`.`bird` (`id` )
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`quiz`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`quiz` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `api_user_key` VARCHAR(31) NOT NULL ,
  `time_limit` INT NOT NULL DEFAULT 300 ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_quiz_api_user1_idx` (`api_user_key` ASC) ,
  CONSTRAINT `fk_quiz_api_user1`
    FOREIGN KEY (`api_user_key` )
    REFERENCES `birds2`.`api_user` (`key` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `birds2`.`question`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `birds2`.`question` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `question` VARCHAR(255) NOT NULL ,
  `answer1` VARCHAR(255) NOT NULL ,
  `answer2` VARCHAR(255) NOT NULL ,
  `answer3` VARCHAR(255) NOT NULL ,
  `answer4` VARCHAR(255) NOT NULL ,
  `users_answer` INT NOT NULL ,
  `quiz_id` INT NOT NULL ,
  `media_id` INT NOT NULL ,
  `correct_answer` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_question_quiz1_idx` (`quiz_id` ASC) ,
  INDEX `fk_question_media1_idx` (`media_id` ASC) ,
  CONSTRAINT `fk_question_quiz1`
    FOREIGN KEY (`quiz_id` )
    REFERENCES `birds2`.`quiz` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_question_media1`
    FOREIGN KEY (`media_id` )
    REFERENCES `birds2`.`media` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
