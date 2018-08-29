/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.33-MariaDB : Database - ottmbs_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`ottmbs_db` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `ottmbs_db`;

/*Table structure for table `account_table` */

DROP TABLE IF EXISTS `account_table`;

CREATE TABLE `account_table` (
  `accountId` int(6) NOT NULL AUTO_INCREMENT,
  `userName` varchar(60) DEFAULT NULL,
  `passWord` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`accountId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `account_table` */

insert  into `account_table`(`accountId`,`userName`,`passWord`) values (5,'admin','21232f297a57a5a743894a0e4a801fc3'),(6,'walk-in','walk-in');

/*Table structure for table `admin_table` */

DROP TABLE IF EXISTS `admin_table`;

CREATE TABLE `admin_table` (
  `adminId` int(6) NOT NULL AUTO_INCREMENT,
  `accountId` int(6) DEFAULT NULL,
  `profileId` int(6) DEFAULT NULL,
  PRIMARY KEY (`adminId`),
  KEY `FK_admin_table` (`accountId`),
  KEY `FK_admin_table1` (`profileId`),
  CONSTRAINT `FK_admin_table` FOREIGN KEY (`accountId`) REFERENCES `account_table` (`accountId`),
  CONSTRAINT `FK_admin_table1` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminId`,`accountId`,`profileId`) values (2,5,13);

/*Table structure for table `announcement_media_table` */

DROP TABLE IF EXISTS `announcement_media_table`;

CREATE TABLE `announcement_media_table` (
  `announcementMediaId` int(6) NOT NULL AUTO_INCREMENT,
  `announcementId` int(6) DEFAULT NULL,
  `mediaLocation` text,
  PRIMARY KEY (`announcementMediaId`),
  KEY `FK_announcement_media_table` (`announcementId`),
  CONSTRAINT `FK_announcement_media_table` FOREIGN KEY (`announcementId`) REFERENCES `announcement_table` (`announcementId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `announcement_media_table` */

/*Table structure for table `announcement_table` */

DROP TABLE IF EXISTS `announcement_table`;

CREATE TABLE `announcement_table` (
  `announcementId` int(6) NOT NULL AUTO_INCREMENT,
  `announcementDescription` text,
  `datePosted` date DEFAULT NULL,
  `accountId` int(6) DEFAULT NULL,
  PRIMARY KEY (`announcementId`),
  KEY `FK_announcement_table1` (`accountId`),
  CONSTRAINT `FK_announcement_table1` FOREIGN KEY (`accountId`) REFERENCES `account_table` (`accountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `announcement_table` */

/*Table structure for table `book_payment_transaction_table` */

DROP TABLE IF EXISTS `book_payment_transaction_table`;

CREATE TABLE `book_payment_transaction_table` (
  `bookPaymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `bookId` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datePaid` varchar(60) DEFAULT NULL,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`bookPaymentTransactionId`),
  KEY `FK_payment_transaction_table12142535142563` (`status`),
  KEY `FK_payment_transaction_table612536412653` (`bookId`),
  KEY `FK_book_payment_transaction_tableas4d565a4sd` (`amount`),
  KEY `FK_book_payment_transaction_table23a4sd2as46as` (`datePaid`),
  KEY `FK_book_payment_transaction2a4s645asd_table` (`modeOfPaymentId`),
  CONSTRAINT `FK_book_payment_transaction_table` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`),
  CONSTRAINT `FK_payment_transaction_table612536412653` FOREIGN KEY (`bookId`) REFERENCES `book_table` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `book_payment_transaction_table` */

/*Table structure for table `book_table` */

DROP TABLE IF EXISTS `book_table`;

CREATE TABLE `book_table` (
  `bookId` int(6) NOT NULL,
  `customerId` int(6) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  `dateBooked` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `numberOfPax` int(6) DEFAULT NULL,
  `departureAndArrivalId` int(6) DEFAULT NULL,
  PRIMARY KEY (`bookId`),
  KEY `FK_book_table` (`packageId`),
  KEY `FK_book_table1` (`status`),
  KEY `FK_book_table12` (`departureAndArrivalId`),
  CONSTRAINT `FK_book_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_book_table12` FOREIGN KEY (`departureAndArrivalId`) REFERENCES `departure_and_arrival_table` (`departureAndArrivalId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `book_table` */

/*Table structure for table `comment_table` */

DROP TABLE IF EXISTS `comment_table`;

CREATE TABLE `comment_table` (
  `commentId` int(6) NOT NULL AUTO_INCREMENT,
  `comment` text,
  `customerId` int(6) DEFAULT NULL,
  `datePosted` date DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `FK_comment_table` (`customerId`),
  CONSTRAINT `FK_comment_table` FOREIGN KEY (`customerId`) REFERENCES `customer_table` (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `comment_table` */

/*Table structure for table `customer_table` */

DROP TABLE IF EXISTS `customer_table`;

CREATE TABLE `customer_table` (
  `customerId` int(6) NOT NULL AUTO_INCREMENT,
  `profileId` int(6) DEFAULT NULL,
  `accountId` int(6) DEFAULT NULL,
  `customerType` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`customerId`),
  KEY `FK_registered_customer_table1` (`accountId`),
  KEY `FK_registered_customer_table` (`profileId`),
  KEY `FK_customer_table` (`customerType`),
  CONSTRAINT `FK_registered_customer_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`),
  CONSTRAINT `FK_registered_customer_table1` FOREIGN KEY (`accountId`) REFERENCES `account_table` (`accountId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `customer_table` */

insert  into `customer_table`(`customerId`,`profileId`,`accountId`,`customerType`) values (11,16,6,'Walk-in'),(12,17,6,'Walk-in');

/*Table structure for table `departure_and_arrival_table` */

DROP TABLE IF EXISTS `departure_and_arrival_table`;

CREATE TABLE `departure_and_arrival_table` (
  `departureAndArrivalId` int(11) NOT NULL AUTO_INCREMENT,
  `departureDate` date DEFAULT NULL,
  `arrivalDate` date DEFAULT NULL,
  PRIMARY KEY (`departureAndArrivalId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `departure_and_arrival_table` */

/*Table structure for table `destination_table` */

DROP TABLE IF EXISTS `destination_table`;

CREATE TABLE `destination_table` (
  `destinationId` int(6) NOT NULL AUTO_INCREMENT,
  `packageId` int(6) DEFAULT NULL,
  `placeId` int(6) DEFAULT NULL,
  PRIMARY KEY (`destinationId`),
  KEY `FK_destination_table1` (`packageId`),
  KEY `FK_destination_table` (`placeId`),
  CONSTRAINT `FK_destination_table` FOREIGN KEY (`placeId`) REFERENCES `place_table` (`placeId`),
  CONSTRAINT `FK_destination_table1` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `destination_table` */

insert  into `destination_table`(`destinationId`,`packageId`,`placeId`) values (18,1,4),(19,1,3),(20,3,1);

/*Table structure for table `employee_table` */

DROP TABLE IF EXISTS `employee_table`;

CREATE TABLE `employee_table` (
  `employeeId` int(6) NOT NULL AUTO_INCREMENT,
  `profileId` int(6) DEFAULT NULL,
  `accountId` int(6) DEFAULT NULL,
  PRIMARY KEY (`employeeId`),
  KEY `FK_employee_table` (`profileId`),
  KEY `FK_employee_table1` (`accountId`),
  CONSTRAINT `FK_employee_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`),
  CONSTRAINT `FK_employee_table1` FOREIGN KEY (`accountId`) REFERENCES `account_table` (`accountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `employee_table` */

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `modeOfPayment` varchar(60) DEFAULT NULL,
  `nameOfRemittance` varchar(60) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datePaid` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `transactionCode` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`modeOfPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `mode_of_payment_table` */

/*Table structure for table `notification_table` */

DROP TABLE IF EXISTS `notification_table`;

CREATE TABLE `notification_table` (
  `notificationId` int(6) NOT NULL AUTO_INCREMENT,
  `notificationMessage` varchar(200) DEFAULT NULL,
  `vanRentalId` int(6) DEFAULT NULL,
  `bookId` int(6) DEFAULT NULL,
  `isRead` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`notificationId`),
  KEY `FK_notification_table` (`vanRentalId`),
  KEY `FK_notification_table1` (`bookId`),
  CONSTRAINT `FK_notification_table` FOREIGN KEY (`vanRentalId`) REFERENCES `van_rental_table` (`vanRentalId`),
  CONSTRAINT `FK_notification_table1` FOREIGN KEY (`bookId`) REFERENCES `book_table` (`bookId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `notification_table` */

/*Table structure for table `package_media_table` */

DROP TABLE IF EXISTS `package_media_table`;

CREATE TABLE `package_media_table` (
  `packageMediaId` int(6) NOT NULL AUTO_INCREMENT,
  `packageId` int(6) DEFAULT NULL,
  `mediaLocation` text,
  PRIMARY KEY (`packageMediaId`),
  KEY `FK_package_media_table1` (`packageId`),
  CONSTRAINT `FK_package_media_table1` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `package_media_table` */

/*Table structure for table `package_table` */

DROP TABLE IF EXISTS `package_table`;

CREATE TABLE `package_table` (
  `packageId` int(6) NOT NULL AUTO_INCREMENT,
  `packageName` varchar(60) DEFAULT NULL,
  `pax` int(6) DEFAULT NULL,
  `packageDetails` text,
  `inclusion` text,
  `exclusion` text,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`packageId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `package_table` */

insert  into `package_table`(`packageId`,`packageName`,`pax`,`packageDetails`,`inclusion`,`exclusion`,`price`) values (1,'BRITANIA TOUR + ALAMEDA',30,'THIS IS A TEST','TRANSPORTATION','MEALS',999),(3,'SURIGAO PACKAGE',20,'SAMEPLE DETAILS','TRANSPORTATION','MEALS',999);

/*Table structure for table `place_table` */

DROP TABLE IF EXISTS `place_table`;

CREATE TABLE `place_table` (
  `placeId` int(6) NOT NULL AUTO_INCREMENT,
  `placeName` varchar(60) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longtitude` double DEFAULT NULL,
  PRIMARY KEY (`placeId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `place_table` */

insert  into `place_table`(`placeId`,`placeName`,`latitude`,`longtitude`) values (1,'Surigao City',9.7571,125.5138),(2,'Lake Sebu',6.2447,124.5528),(3,'Britania',8.70073,126.207406),(4,'Alameda',8.733654,126.202285);

/*Table structure for table `profile_table` */

DROP TABLE IF EXISTS `profile_table`;

CREATE TABLE `profile_table` (
  `profileId` int(6) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(60) DEFAULT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `contactNumber` varchar(60) DEFAULT NULL,
  `buildingNumber` varchar(60) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `barangay` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `province` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`profileId`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

insert  into `profile_table`(`profileId`,`firstName`,`middleName`,`lastName`,`contactNumber`,`buildingNumber`,`street`,`barangay`,`city`,`province`) values (13,'Abner','Natividad','Lacson','09365636999','20','National Highway','Poblacion','Tacurong City','Sultan Kudarat'),(16,'Daryl','Montenegro','Caldero','09759085665','23','Lapu-lapu','Poblacion','Tacurong City','Sultan Kudarat'),(17,'Clarie Jane','Sagolili','Jadraque','09486363633','55','Barangay Road','New Isabela','Tacurong City','Sultan Kudarat');

/*Table structure for table `van_media_table` */

DROP TABLE IF EXISTS `van_media_table`;

CREATE TABLE `van_media_table` (
  `vanMediaId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `mediaLocation` text,
  PRIMARY KEY (`vanMediaId`),
  KEY `FK_van_media_table` (`vanId`),
  CONSTRAINT `FK_van_media_table` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_media_table` */

/*Table structure for table `van_rental_payment_transaction_table` */

DROP TABLE IF EXISTS `van_rental_payment_transaction_table`;

CREATE TABLE `van_rental_payment_transaction_table` (
  `vanRentalPaymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `vanRentalId` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `datePaid` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`vanRentalPaymentTransactionId`),
  KEY `FK_van_rental_payment_transaction_tabl212335126` (`vanRentalId`),
  KEY `FK_van_rental_payment_transaction12563412333` (`status`),
  KEY `FK_van_rental_payment_transaction_a6+5s4da4sdtable` (`amount`),
  KEY `FK_van_rent5as4d65al_payment_transaction_table` (`modeOfPaymentId`),
  KEY `FK_van_rental_payment_trans54asd56action_table` (`datePaid`),
  CONSTRAINT `FK_van_rental_payment_transaction_tabl212335126` FOREIGN KEY (`vanRentalId`) REFERENCES `van_rental_table` (`vanRentalId`),
  CONSTRAINT `FK_van_rental_payment_transaction_table1` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_rental_payment_transaction_table` */

/*Table structure for table `van_rental_table` */

DROP TABLE IF EXISTS `van_rental_table`;

CREATE TABLE `van_rental_table` (
  `vanRentalId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `customerId` int(6) DEFAULT NULL,
  `dateRented` date DEFAULT NULL,
  `status` varchar(60) DEFAULT NULL,
  `departureAndArrivalId` int(6) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`vanRentalId`),
  KEY `FK_van_rental_table` (`vanId`),
  KEY `FK_van_rental_table2` (`customerId`),
  KEY `FK_van_rental_table4` (`status`),
  KEY `FK_van_rental_table12` (`departureAndArrivalId`),
  KEY `FK_van_rental_table123123` (`price`),
  CONSTRAINT `FK_van_rental_table` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`),
  CONSTRAINT `FK_van_rental_table12` FOREIGN KEY (`departureAndArrivalId`) REFERENCES `departure_and_arrival_table` (`departureAndArrivalId`),
  CONSTRAINT `FK_van_rental_table2` FOREIGN KEY (`customerId`) REFERENCES `customer_table` (`customerId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_rental_table` */

/*Table structure for table `van_table` */

DROP TABLE IF EXISTS `van_table`;

CREATE TABLE `van_table` (
  `vanId` int(6) NOT NULL AUTO_INCREMENT,
  `make` varchar(60) DEFAULT NULL,
  `model` varchar(60) DEFAULT NULL,
  `modelYear` varchar(60) DEFAULT NULL,
  `plateNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`vanId`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `van_table` */

insert  into `van_table`(`vanId`,`make`,`model`,`modelYear`,`plateNumber`) values (1,'Toyota','Hi-Ace','2018','ABC-123'),(3,'Toyota','Hi-Ace','2015','MCD-524'),(4,'Nissan','NV350','2015','JDH-652'),(5,'Nissan','NV350','2016','LOK-897');

/*Table structure for table `admin_view` */

DROP TABLE IF EXISTS `admin_view`;

/*!50001 DROP VIEW IF EXISTS `admin_view` */;
/*!50001 DROP TABLE IF EXISTS `admin_view` */;

/*!50001 CREATE TABLE  `admin_view`(
 `adminId` int(6) ,
 `accountId` int(6) ,
 `profileId` int(6) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `buildingNumber` varchar(60) ,
 `street` varchar(60) ,
 `barangay` varchar(60) ,
 `city` varchar(60) ,
 `province` varchar(60) 
)*/;

/*Table structure for table `customer_view` */

DROP TABLE IF EXISTS `customer_view`;

/*!50001 DROP VIEW IF EXISTS `customer_view` */;
/*!50001 DROP TABLE IF EXISTS `customer_view` */;

/*!50001 CREATE TABLE  `customer_view`(
 `customerId` int(6) ,
 `profileId` int(6) ,
 `accountId` int(6) ,
 `customerType` varchar(60) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `contactNumber` varchar(60) ,
 `buildingNumber` varchar(60) ,
 `street` varchar(60) ,
 `barangay` varchar(60) ,
 `city` varchar(60) ,
 `province` varchar(60) 
)*/;

/*Table structure for table `destination_view` */

DROP TABLE IF EXISTS `destination_view`;

/*!50001 DROP VIEW IF EXISTS `destination_view` */;
/*!50001 DROP TABLE IF EXISTS `destination_view` */;

/*!50001 CREATE TABLE  `destination_view`(
 `destinationId` int(6) ,
 `packageId` int(6) ,
 `placeId` int(6) ,
 `placeName` varchar(60) ,
 `latitude` double ,
 `longtitude` double 
)*/;

/*Table structure for table `package_media_view` */

DROP TABLE IF EXISTS `package_media_view`;

/*!50001 DROP VIEW IF EXISTS `package_media_view` */;
/*!50001 DROP TABLE IF EXISTS `package_media_view` */;

/*!50001 CREATE TABLE  `package_media_view`(
 `packageMediaId` int(6) ,
 `packageId` int(6) ,
 `mediaLocation` text 
)*/;

/*Table structure for table `package_view` */

DROP TABLE IF EXISTS `package_view`;

/*!50001 DROP VIEW IF EXISTS `package_view` */;
/*!50001 DROP TABLE IF EXISTS `package_view` */;

/*!50001 CREATE TABLE  `package_view`(
 `packageId` int(6) ,
 `packageName` varchar(60) ,
 `pax` int(6) ,
 `packageDetails` text ,
 `inclusion` text ,
 `exclusion` text ,
 `price` double 
)*/;

/*Table structure for table `place_view` */

DROP TABLE IF EXISTS `place_view`;

/*!50001 DROP VIEW IF EXISTS `place_view` */;
/*!50001 DROP TABLE IF EXISTS `place_view` */;

/*!50001 CREATE TABLE  `place_view`(
 `placeId` int(6) ,
 `placeName` varchar(60) ,
 `latitude` double ,
 `longtitude` double 
)*/;

/*Table structure for table `van_view` */

DROP TABLE IF EXISTS `van_view`;

/*!50001 DROP VIEW IF EXISTS `van_view` */;
/*!50001 DROP TABLE IF EXISTS `van_view` */;

/*!50001 CREATE TABLE  `van_view`(
 `vanId` int(6) ,
 `make` varchar(60) ,
 `model` varchar(60) ,
 `modelYear` varchar(60) ,
 `plateNumber` varchar(60) 
)*/;

/*View structure for view admin_view */

/*!50001 DROP TABLE IF EXISTS `admin_view` */;
/*!50001 DROP VIEW IF EXISTS `admin_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view` AS select `admin_table`.`adminId` AS `adminId`,`admin_table`.`accountId` AS `accountId`,`admin_table`.`profileId` AS `profileId`,`account_table`.`userName` AS `userName`,`account_table`.`passWord` AS `passWord`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`buildingNumber` AS `buildingNumber`,`profile_table`.`street` AS `street`,`profile_table`.`barangay` AS `barangay`,`profile_table`.`city` AS `city`,`profile_table`.`province` AS `province` from ((`admin_table` join `account_table` on((`admin_table`.`accountId` = `account_table`.`accountId`))) join `profile_table` on((`admin_table`.`profileId` = `profile_table`.`profileId`))) */;

/*View structure for view customer_view */

/*!50001 DROP TABLE IF EXISTS `customer_view` */;
/*!50001 DROP VIEW IF EXISTS `customer_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_view` AS select `customer_table`.`customerId` AS `customerId`,`customer_table`.`profileId` AS `profileId`,`customer_table`.`accountId` AS `accountId`,`customer_table`.`customerType` AS `customerType`,`account_table`.`userName` AS `userName`,`account_table`.`passWord` AS `passWord`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`contactNumber` AS `contactNumber`,`profile_table`.`buildingNumber` AS `buildingNumber`,`profile_table`.`street` AS `street`,`profile_table`.`barangay` AS `barangay`,`profile_table`.`city` AS `city`,`profile_table`.`province` AS `province` from ((`customer_table` join `account_table` on((`customer_table`.`accountId` = `account_table`.`accountId`))) join `profile_table` on((`customer_table`.`profileId` = `profile_table`.`profileId`))) */;

/*View structure for view destination_view */

/*!50001 DROP TABLE IF EXISTS `destination_view` */;
/*!50001 DROP VIEW IF EXISTS `destination_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `destination_view` AS select `destination_table`.`destinationId` AS `destinationId`,`destination_table`.`packageId` AS `packageId`,`destination_table`.`placeId` AS `placeId`,`place_table`.`placeName` AS `placeName`,`place_table`.`latitude` AS `latitude`,`place_table`.`longtitude` AS `longtitude` from (`destination_table` join `place_table` on((`destination_table`.`placeId` = `place_table`.`placeId`))) */;

/*View structure for view package_media_view */

/*!50001 DROP TABLE IF EXISTS `package_media_view` */;
/*!50001 DROP VIEW IF EXISTS `package_media_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package_media_view` AS select `package_media_table`.`packageMediaId` AS `packageMediaId`,`package_media_table`.`packageId` AS `packageId`,`package_media_table`.`mediaLocation` AS `mediaLocation` from `package_media_table` */;

/*View structure for view package_view */

/*!50001 DROP TABLE IF EXISTS `package_view` */;
/*!50001 DROP VIEW IF EXISTS `package_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `package_view` AS select `package_table`.`packageId` AS `packageId`,`package_table`.`packageName` AS `packageName`,`package_table`.`pax` AS `pax`,`package_table`.`packageDetails` AS `packageDetails`,`package_table`.`inclusion` AS `inclusion`,`package_table`.`exclusion` AS `exclusion`,`package_table`.`price` AS `price` from `package_table` */;

/*View structure for view place_view */

/*!50001 DROP TABLE IF EXISTS `place_view` */;
/*!50001 DROP VIEW IF EXISTS `place_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `place_view` AS select `place_table`.`placeId` AS `placeId`,`place_table`.`placeName` AS `placeName`,`place_table`.`latitude` AS `latitude`,`place_table`.`longtitude` AS `longtitude` from `place_table` */;

/*View structure for view van_view */

/*!50001 DROP TABLE IF EXISTS `van_view` */;
/*!50001 DROP VIEW IF EXISTS `van_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `van_view` AS select `van_table`.`vanId` AS `vanId`,`van_table`.`make` AS `make`,`van_table`.`model` AS `model`,`van_table`.`modelYear` AS `modelYear`,`van_table`.`plateNumber` AS `plateNumber` from `van_table` */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
