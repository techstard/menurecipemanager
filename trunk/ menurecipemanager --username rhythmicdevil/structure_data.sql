/*
SQLyog Community Edition- MySQL GUI v8.12 
MySQL - 5.1.35-community : Database - recipe_manager
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`recipe_manager` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `recipe_manager`;

/*Table structure for table `fractions` */

DROP TABLE IF EXISTS `fractions`;

CREATE TABLE `fractions` (
  `id` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fraction` varchar(4) NOT NULL,
  `decimal` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fractions` */

/*Table structure for table `ingredient_types` */

DROP TABLE IF EXISTS `ingredient_types`;

CREATE TABLE `ingredient_types` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ingredient_type` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

/*Data for the table `ingredient_types` */

/*Table structure for table `ingredients` */

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ingredient` varchar(64) NOT NULL DEFAULT '',
  `ingredient_type_id` int(10) unsigned zerofill NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_ingredient` (`ingredient`),
  KEY `ingredient_type_id` (`ingredient_type_id`),
  CONSTRAINT `ingredient_type_id` FOREIGN KEY (`ingredient_type_id`) REFERENCES `ingredient_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `ingredients` */

/*Table structure for table `ingredients_recipes` */

DROP TABLE IF EXISTS `ingredients_recipes`;

CREATE TABLE `ingredients_recipes` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned zerofill NOT NULL,
  `ingredient` varchar(64) NOT NULL,
  `fractional_amount` varchar(3) DEFAULT NULL,
  `whole_amount` int(2) unsigned DEFAULT NULL,
  `measurement_type_id` int(10) unsigned zerofill DEFAULT NULL,
  `instruction` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `ingredient_id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`),
  KEY `measurement_type_id` (`measurement_type_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `measurement_type_id` FOREIGN KEY (`measurement_type_id`) REFERENCES `measurements` (`id`),
  CONSTRAINT `recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ingredients_recipes` */

/*Table structure for table `measurements` */

DROP TABLE IF EXISTS `measurements`;

CREATE TABLE `measurements` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `measurement` varchar(16) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `abbreviation` varchar(5) DEFAULT NULL,
  `type` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `measurements` */

/*Table structure for table `menu_recipes` */

DROP TABLE IF EXISTS `menu_recipes`;

CREATE TABLE `menu_recipes` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned zerofill NOT NULL,
  `menu_id` int(10) unsigned zerofill NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `FK_recipe_id` (`recipe_id`),
  CONSTRAINT `FK_recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  CONSTRAINT `menu_id` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu_recipes` */

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `menu` varchar(64) NOT NULL,
  `description` text,
  `user_id` int(10) unsigned zerofill NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `FK_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

/*Table structure for table `recipe_types` */

DROP TABLE IF EXISTS `recipe_types`;

CREATE TABLE `recipe_types` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe_type` varchar(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `recipe_types` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
