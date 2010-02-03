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
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fraction` varchar(8) NOT NULL,
  `decimal` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Table structure for table `ingredient_lists` */

DROP TABLE IF EXISTS `ingredient_lists`;

CREATE TABLE `ingredient_lists` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe_id` int(10) unsigned zerofill NOT NULL,
  `ingredient_id` int(10) unsigned zerofill NOT NULL,
  `measurement_id` int(10) unsigned zerofill NOT NULL,
  `fraction_id` int(10) DEFAULT NULL,
  `whole_amount` int(2) unsigned zerofill DEFAULT NULL,
  `instruction` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `measurement_id` (`measurement_id`),
  KEY `ingredient_id` (`ingredient_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `ingredient_id` FOREIGN KEY (`ingredient_id`) REFERENCES `ingredients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `measurement_id` FOREIGN KEY (`measurement_id`) REFERENCES `measurements` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `recipe_id` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

/*Table structure for table `ingredient_types` */

DROP TABLE IF EXISTS `ingredient_types`;

CREATE TABLE `ingredient_types` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `ingredient_type` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `menu` varchar(24) NOT NULL,
  `description` varchar(128) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Table structure for table `menus_recipes` */

DROP TABLE IF EXISTS `menus_recipes`;

CREATE TABLE `menus_recipes` (
  `menu_id` int(10) unsigned zerofill NOT NULL,
  `recipe_id` int(10) unsigned zerofill NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `recipe_types` */

DROP TABLE IF EXISTS `recipe_types`;

CREATE TABLE `recipe_types` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe_type` varchar(64) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Table structure for table `recipes` */

DROP TABLE IF EXISTS `recipes`;

CREATE TABLE `recipes` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `recipe` varchar(64) NOT NULL DEFAULT '',
  `description` varchar(64) DEFAULT NULL,
  `instructions` text,
  `servings` int(2) DEFAULT NULL,
  `recipe_type_id` int(10) unsigned zerofill NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_type_id` (`recipe_type_id`),
  CONSTRAINT `recipe_type_id` FOREIGN KEY (`recipe_type_id`) REFERENCES `recipe_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Table structure for table `recipes_users` */

DROP TABLE IF EXISTS `recipes_users`;

CREATE TABLE `recipes_users` (
  `user_id` int(10) unsigned zerofill NOT NULL,
  `recipe_id` int(10) unsigned zerofill NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `username` varchar(24) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
