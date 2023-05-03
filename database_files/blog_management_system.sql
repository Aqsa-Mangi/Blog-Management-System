/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.27-MariaDB : Database - blog_management_system
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog_management_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `blog_management_system`;

/*Table structure for table `log_management` */

DROP TABLE IF EXISTS `log_management`;

CREATE TABLE `log_management` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `log_in` varchar(100) DEFAULT NULL,
  `log_out` varchar(100) DEFAULT 'Not logged out yet',
  PRIMARY KEY (`log_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `log_management_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `log_management` */

insert  into `log_management`(`log_id`,`user_id`,`log_in`,`log_out`) values 
(1,3,'30 March 2023 3:25:40 AM','Not logged out yet'),
(4,1,'30 March 2023 3:30:06 AM','Not logged out yet'),
(5,2,'30 March 2023 4:05:02 AM','Not logged out yet'),
(6,1,'30 March 2023 4:05:09 AM','Not logged out yet'),
(7,3,'30 March 2023 5:52:09 AM','Not logged out yet'),
(8,2,'30 March 2023 5:52:16 AM','Not logged out yet'),
(9,1,'30 March 2023 5:52:24 AM','Not logged out yet'),
(10,2,'30 March 2023 5:56:27 AM','Not logged out yet'),
(11,3,'30 March 2023 6:02:50 AM','Not logged out yet'),
(12,2,'30 March 2023 6:11:03 AM','Not logged out yet'),
(13,1,'30 March 2023 6:20:12 AM','Not logged out yet'),
(14,1,'30 March 2023 6:25:42 AM','Not logged out yet'),
(15,2,'30 March 2023 6:34:42 AM','Not logged out yet'),
(16,1,'30 March 2023 6:36:48 AM','Not logged out yet'),
(17,1,'30 March 2023 6:37:18 AM','Not logged out yet'),
(18,1,'30 March 2023 7:20:44 AM','Not logged out yet'),
(19,1,'30 March 2023 7:20:50 AM','Not logged out yet'),
(20,1,'30 March 2023 7:21:26 AM','Not logged out yet'),
(21,1,'30 March 2023 7:25:07 AM','Not logged out yet'),
(22,1,'30 March 2023 7:27:33 AM','Not logged out yet'),
(23,1,'30 March 2023 7:28:02 AM','Not logged out yet'),
(24,1,'30 March 2023 7:28:22 AM','Not logged out yet'),
(25,1,'30 March 2023 7:34:12 AM','Not logged out yet'),
(26,1,'30 March 2023 7:43:06 AM','Not logged out yet'),
(27,1,'30 March 2023 7:43:16 AM','Not logged out yet'),
(28,1,'30 March 2023 8:04:53 AM','Not logged out yet'),
(29,1,'30 March 2023 8:04:59 AM','Not logged out yet'),
(30,1,'30 March 2023 8:13:39 AM','Not logged out yet'),
(31,1,'30 March 2023 8:14:02 AM','Not logged out yet'),
(32,1,'30 March 2023 8:14:07 AM','Not logged out yet'),
(33,1,'30 March 2023 8:16:02 AM','Not logged out yet'),
(34,1,'30 March 2023 8:16:56 AM','Not logged out yet'),
(35,3,'30 March 2023 8:17:21 AM','Not logged out yet'),
(36,3,'30 March 2023 8:17:29 AM','Not logged out yet'),
(37,1,'30 March 2023 8:17:34 AM','Not logged out yet');

/*Table structure for table `posts` */

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `added_by_user_role_id` int(11) DEFAULT NULL,
  `post_title` text DEFAULT NULL,
  `post_summary` text DEFAULT NULL,
  `post_description` longtext DEFAULT NULL,
  `is_active` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`post_id`),
  KEY `author_user_role_id` (`added_by_user_role_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`added_by_user_role_id`) REFERENCES `user_role` (`user_role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `posts` */

insert  into `posts`(`post_id`,`added_by_user_role_id`,`post_title`,`post_summary`,`post_description`,`is_active`) values 
(1,7,'Post 1','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.','Active'),
(2,8,'Post 2','Lorem Ipsum is simply dummy text of the printing and typesetting industry.','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Active'),
(3,8,'Post 3','Lorem Ipsum is simply dummy text of the printing and typesetting industry. ','There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. ','Active');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `roles` */

insert  into `roles`(`role_id`,`role_type`) values 
(1,'Admin'),
(2,'Author'),
(3,'User');

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` enum('Active','Inactive') DEFAULT NULL,
  PRIMARY KEY (`user_role_id`),
  KEY `user_id` (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user_role` */

insert  into `user_role`(`user_role_id`,`user_id`,`role_id`,`is_active`) values 
(7,1,1,'Active'),
(8,2,2,'Active'),
(9,3,3,'Active');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `gender` enum('Female','Male') DEFAULT 'Male',
  `user_email` varchar(100) DEFAULT NULL,
  `user_password` text DEFAULT NULL,
  `is_active` enum('Active','Inactive') DEFAULT 'Active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`user_id`,`full_name`,`gender`,`user_email`,`user_password`,`is_active`) values 
(1,'Admin','Male','admin@gmail.com','12345','Active'),
(2,'Author','Male','author@gmail.com','12345','Active'),
(3,'User','Female','user@gmail.com','12345','Active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
