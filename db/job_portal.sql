/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.25 : Database - job_portal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`job_portal` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `job_portal`;

/*Table structure for table `apply_inforation` */

DROP TABLE IF EXISTS `apply_inforation`;

CREATE TABLE `apply_inforation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `insert_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `apply_inforation` */

insert  into `apply_inforation`(`id`,`job_id`,`applicant_id`,`insert_datetime`) values (1,1,1,'2018-01-16 18:41:31'),(2,1,1,'2018-01-16 18:43:58'),(3,1,1,'2018-01-16 18:44:43'),(4,2,1,'2018-01-16 19:00:45'),(5,2,1,'2018-01-16 19:00:59');

/*Table structure for table `districts` */

DROP TABLE IF EXISTS `districts`;

CREATE TABLE `districts` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

/*Data for the table `districts` */

insert  into `districts`(`district_id`,`name`) values (1,'Dhaka'),(2,'Faridpur'),(3,'Gazipur'),(4,'Gopalganj'),(5,'Jamalpur'),(6,'Kishorgonj'),(7,'Madaripur'),(8,'Manikganj'),(9,'Munshiganj'),(10,'Mymensingh'),(11,'Narayanganj'),(12,'Narsingdi'),(13,'Netrakona'),(14,'Rajbari'),(15,'Shariatpur'),(16,'Sherpur'),(17,'Tangail'),(18,'Bandarban'),(19,'Brahmanbaria'),(20,'Chandpur'),(21,'Chittagong'),(22,'Comilla'),(23,'Cox\'s Bazar'),(24,'Feni'),(25,'Khagrachhari'),(26,'Lakshmipur'),(27,'Noakhali'),(28,'Rangamati'),(29,'Bogra'),(30,'Chapai Nawabganj'),(31,'Dinajpur'),(32,'Gaibandha'),(33,'Joypurhat'),(34,'Kurigram'),(35,'Lalmonirhat'),(36,'Naogaon'),(37,'Natore'),(38,'Nilphamari'),(39,'Pabna'),(40,'Panchagarh'),(41,'Rajshahi'),(42,'Rangpur'),(43,'Sirajganj'),(44,'Thakurgaon'),(45,'Bagerhat'),(46,'Chuadanga'),(47,'Jessore'),(48,'Jhenaidah'),(49,'Khulna'),(50,'Kushtia'),(51,'Magura'),(52,'Meherpur'),(53,'Narail'),(54,'Satkhira'),(55,'Barguna'),(56,'Barisal'),(57,'Bhola'),(58,'Jhalokati'),(59,'Patuakhali'),(60,'Pirojpur'),(61,'Habiganj'),(62,'Maulvibazar'),(63,'Sunamganj'),(64,'Sylhet');

/*Table structure for table `employeer` */

DROP TABLE IF EXISTS `employeer`;

CREATE TABLE `employeer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `gender` tinytext,
  `address` varchar(500) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `employeer` */

insert  into `employeer`(`id`,`name`,`email_id`,`password`,`mobile_number`,`gender`,`address`,`update_datetime`) values (1,'Jui Yasmin','jui@gmail.com','jui123','01722332233','Male','Panthapath, Dhaka','2018-01-12 17:21:16');

/*Table structure for table `job_category` */

DROP TABLE IF EXISTS `job_category`;

CREATE TABLE `job_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) DEFAULT NULL,
  `category_logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `job_category` */

insert  into `job_category`(`id`,`category_name`,`category_logo`) values (1,'Accounting/Finance','1.png'),(2,'Education/Training','2.png'),(3,'Engineer/Architects','3.png'),(4,'Garments/Textile','4.png'),(5,'HR/Org. Development','5.png'),(6,'Design/Creative','6.png'),(7,'Research/Consultancy','7.png'),(8,'Medical/Pharma','8.png'),(9,'Music/Arts','9.png'),(10,'Marketing/Sales','10.png'),(11,'Production/Operation','11.png'),(12,'Miscellaneous','12.png');

/*Table structure for table `job_details` */

DROP TABLE IF EXISTS `job_details`;

CREATE TABLE `job_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(200) DEFAULT NULL,
  `company_logo` varchar(250) DEFAULT NULL,
  `job_category` int(11) DEFAULT NULL,
  `job_type` tinytext,
  `title_for_your_job` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `description` varchar(3000) DEFAULT NULL,
  `key_responsibilities` varchar(3000) DEFAULT NULL,
  `requirements` varchar(3000) DEFAULT NULL,
  `district` int(3) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `salary_min` int(8) DEFAULT NULL,
  `salary_max` int(11) DEFAULT NULL,
  `negotiable` tinytext,
  `experience` tinytext,
  `job_function` varchar(200) DEFAULT NULL,
  `job_post_by` int(11) DEFAULT NULL,
  `job_post_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`district`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `job_details` */

insert  into `job_details`(`id`,`company_name`,`company_logo`,`job_category`,`job_type`,`title_for_your_job`,`deadline`,`description`,`key_responsibilities`,`requirements`,`district`,`address`,`salary_min`,`salary_max`,`negotiable`,`experience`,`job_function`,`job_post_by`,`job_post_datetime`) values (1,'Dropbox','uploads/1515779074_4.png',3,'Full time','Human Resource Manager','2018-01-25','<p>sdfsdsdfsdfdsf</p>\r\n','<p>sdfsdfdfsdsdf</p>\r\n','<p>sdfsdfsdfs</p>\r\n',1,'sdfsdfsdfsd',1000,8000,'No','Entry Level','sdfsfsdfsdfsdf',1,'2018-01-12 18:44:34'),(2,'Google','uploads/1515779262_2.png',5,'Full time','Human Resource Manager','2018-01-19','<p>sdfsdfsff</p>\r\n','<p>sdfsdfsdfsdfsdf</p>\r\n','<p>sdfsdfsdfsdsdfds</p>\r\n',4,'West Rajabazar, Dhaka',100,23432234,'No','Entry Level','',1,'2018-01-12 18:47:42');

/*Table structure for table `job_seeker` */

DROP TABLE IF EXISTS `job_seeker`;

CREATE TABLE `job_seeker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `email_id` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `gender` tinytext,
  `career_objective` varchar(1000) DEFAULT NULL,
  `company_name_1` varchar(100) DEFAULT NULL,
  `designation_1` varchar(100) DEFAULT NULL,
  `time_period_from_1` date DEFAULT NULL,
  `time_period_to_1` date DEFAULT NULL,
  `job_description_1` varchar(500) DEFAULT NULL,
  `company_name_2` varchar(100) DEFAULT NULL,
  `designation_2` varchar(100) DEFAULT NULL,
  `time_period_from_2` date DEFAULT NULL,
  `time_period_to_2` date DEFAULT NULL,
  `job_description_2` varchar(500) DEFAULT NULL,
  `institute_name_1` varchar(100) DEFAULT NULL,
  `degree_1` varchar(100) DEFAULT NULL,
  `education_time_period_from_1` date DEFAULT NULL,
  `education_time_period_to_1` date DEFAULT NULL,
  `education_description_1` varchar(200) DEFAULT NULL,
  `institute_name_2` varchar(100) DEFAULT NULL,
  `degree_2` varchar(100) DEFAULT NULL,
  `education_time_period_from_2` date DEFAULT NULL,
  `education_time_period_to_2` date DEFAULT NULL,
  `education_description_2` varchar(200) DEFAULT NULL,
  `special_qualification` varchar(500) DEFAULT NULL,
  `language_name_1` varchar(50) DEFAULT NULL,
  `language_efficiency_1` varchar(10) DEFAULT NULL,
  `language_name_2` varchar(50) DEFAULT NULL,
  `language_efficiency_2` varchar(10) DEFAULT NULL,
  `language_name_3` varchar(50) DEFAULT NULL,
  `language_efficiency_3` varchar(10) DEFAULT NULL,
  `father_name` varchar(50) DEFAULT NULL,
  `mother_name` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `permanent_address` varchar(150) DEFAULT NULL,
  `nationality` varchar(50) DEFAULT NULL,
  `declaration` varchar(500) DEFAULT NULL,
  `update_datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `job_seeker` */

insert  into `job_seeker`(`id`,`name`,`photo`,`email_id`,`password`,`mobile_number`,`address`,`gender`,`career_objective`,`company_name_1`,`designation_1`,`time_period_from_1`,`time_period_to_1`,`job_description_1`,`company_name_2`,`designation_2`,`time_period_from_2`,`time_period_to_2`,`job_description_2`,`institute_name_1`,`degree_1`,`education_time_period_from_1`,`education_time_period_to_1`,`education_description_1`,`institute_name_2`,`degree_2`,`education_time_period_from_2`,`education_time_period_to_2`,`education_description_2`,`special_qualification`,`language_name_1`,`language_efficiency_1`,`language_name_2`,`language_efficiency_2`,`language_name_3`,`language_efficiency_3`,`father_name`,`mother_name`,`date_of_birth`,`permanent_address`,`nationality`,`declaration`,`update_datetime`) values (1,'Jui Yasmin',NULL,'jui@gmail.com','jui','01724113312','West Rajabazar, Dhaka','Male',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2018-01-16 18:00:42');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
