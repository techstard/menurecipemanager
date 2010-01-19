SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `recipe_manager` DEFAULT CHARACTER SET latin1 ;
USE `recipe_manager`;

-- -----------------------------------------------------
-- Table `recipe_manager`.`measurements`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`measurements` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `measurement` VARCHAR(16) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `abbreviation` VARCHAR(5) NULL DEFAULT NULL ,
  `type` VARCHAR(16) NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `recipe_manager`.`ingredient_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`ingredient_types` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `ingredient_type` VARCHAR(64) NOT NULL DEFAULT '' ,
  `description` VARCHAR(255) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 33
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `recipe_manager`.`ingredients`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`ingredients` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `ingredient` VARCHAR(64) NOT NULL DEFAULT '' ,
  `ingredient_type_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  `description` VARCHAR(255) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `unique_ingredient` (`ingredient` ASC) ,
  INDEX `ingredient_type_id` (`ingredient_type_id` ASC) ,
  CONSTRAINT `ingredient_type_id`
    FOREIGN KEY (`ingredient_type_id` )
    REFERENCES `recipe_manager`.`ingredient_types` (`id` ))
ENGINE = InnoDB
AUTO_INCREMENT = 51
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `recipe_manager`.`recipe_types`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`recipe_types` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `recipe_type` VARCHAR(64) NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `recipe_manager`.`recipes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`recipes` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `recipe` VARCHAR(64) NOT NULL DEFAULT '' ,
  `description` TEXT NULL DEFAULT NULL ,
  `instructions` TEXT NULL DEFAULT NULL ,
  `servings` INT(2) NULL DEFAULT NULL ,
  `recipe_type_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  `user_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `recipe_type_id` (`recipe_type_id` ASC) ,
  CONSTRAINT `recipe_type_id`
    FOREIGN KEY (`recipe_type_id` )
    REFERENCES `recipe_manager`.`recipe_types` (`id` ))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `recipe_manager`.`ingredient_lists`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `recipe_manager`.`ingredient_lists` (
  `id` INT(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT ,
  `recipe_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  `ingredient_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  `measurement_id` INT(10) UNSIGNED ZEROFILL NOT NULL ,
  `ingredient` VARCHAR(64) NOT NULL ,
  `fractional_amount` FLOAT NULL DEFAULT NULL ,
  `whole_amount` INT(2) UNSIGNED NULL DEFAULT NULL ,
  `instruction` VARCHAR(64) NULL DEFAULT NULL ,
  `created` DATETIME NULL DEFAULT NULL ,
  `modified` DATETIME NULL DEFAULT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `measurement_id` (`measurement_id` ASC) ,
  INDEX `ingredient_id` (`ingredient_id` ASC) ,
  INDEX `recipe_id` (`recipe_id` ASC) ,
  CONSTRAINT `measurement_id`
    FOREIGN KEY (`measurement_id` )
    REFERENCES `recipe_manager`.`measurements` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ingredient_id`
    FOREIGN KEY (`ingredient_id` )
    REFERENCES `recipe_manager`.`ingredients` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `recipe_id`
    FOREIGN KEY (`recipe_id` )
    REFERENCES `recipe_manager`.`recipes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
