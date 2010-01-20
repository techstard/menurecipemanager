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

insert  into `fractions`(`id`,`fraction`,`decimal`) values (0000000001,'1/16',0.0625),(0000000002,'1/8',0.125),(0000000003,'1/4',0.25),(0000000004,'1/2',0.5),(0000000005,'3/4',0.75),(0000000006,'1/3',0.33),(0000000007,'2/3',0.66);

/*Data for the table `ingredient_lists` */

/*Data for the table `ingredient_types` */

insert  into `ingredient_types`(`id`,`ingredient_type`,`description`,`created`,`modified`) values (0000000033,'Produce','Fresh fruits and vegetabls','2010-01-19 09:34:50','2010-01-19 09:34:50'),(0000000034,'Dairy','Milk, cream, butter and cheeses','2010-01-19 09:34:57','2010-01-19 09:34:57');

/*Data for the table `ingredients` */

insert  into `ingredients`(`id`,`ingredient`,`ingredient_type_id`,`description`,`created`,`modified`) values (0000000051,'Broccoli',0000000033,'','2010-01-19 09:35:09','2010-01-19 09:35:09'),(0000000052,'Milk',0000000034,'','2010-01-19 09:35:22','2010-01-19 09:35:22');

/*Data for the table `measurements` */

insert  into `measurements`(`id`,`measurement`,`created`,`modified`,`abbreviation`,`type`) values (0000000014,'teaspoon',NULL,NULL,'.tsp',NULL),(0000000015,'tablespoon',NULL,NULL,'.tbsp',NULL),(0000000016,'cup',NULL,NULL,'.cp',NULL),(0000000017,'ounce',NULL,NULL,'.oz',NULL);

/*Data for the table `recipe_types` */

insert  into `recipe_types`(`id`,`recipe_type`,`created`,`modified`) values (0000000006,'Entree','2010-01-19 09:35:28','2010-01-19 09:35:28'),(0000000007,'Breakfast','2010-01-19 09:35:35','2010-01-19 09:35:35');

/*Data for the table `recipes` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
