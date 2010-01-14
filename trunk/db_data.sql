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

/*Data for the table `fractions` */

/*Data for the table `ingredient_types` */

insert  into `ingredient_types`(`id`,`ingredient_type`,`description`,`created`,`modified`) values (0000000033,'Produce','Fruits and vegetables','2010-01-14 11:05:59','2010-01-14 11:07:31'),(0000000034,'Dairy','Milk, cheese, butter and so on','2010-01-14 11:07:46','2010-01-14 11:07:46');

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`ingredient`,`ingredient_type_id`,`description`,`created`,`modified`) values (0000000051,'Broccoli',0000000033,'','2010-01-14 11:08:28','2010-01-14 11:08:28'),(0000000052,'Whole Milk',0000000034,'','2010-01-14 11:08:40','2010-01-14 11:08:40');

/*Data for the table `ingredients_recipes` */

/*Data for the table `measurements` */

/*Data for the table `menu_recipes` */

/*Data for the table `menus` */

/*Data for the table `recipe_types` */

insert  into `recipe_types`(`id`,`recipe_type`,`created`,`modified`) values (0000000006,'Breakfast','2010-01-14 11:08:52','2010-01-14 11:08:52'),(0000000007,'Entree','2010-01-14 11:08:58','2010-01-14 11:08:58'),(0000000008,'Appetizer','2010-01-14 11:09:06','2010-01-14 11:09:06');

/*Data for the table `recipes` */

/*Data for the table `users` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
