/*
SQLyog Ultimate v8.53 
MySQL - 5.5.5-10.1.34-MariaDB : Database - ottmbs_db
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `account_table` */

insert  into `account_table`(`accountId`,`userName`,`passWord`) values (1,'admin','21232f297a57a5a743894a0e4a801fc3'),(2,'toto','f71dbe52628a3f83a77ab494817525c6'),(3,'tata','49d02d55ad10973b7b9d0dc9eba7fdf0'),(4,' ',' ');

/*Table structure for table `address_table` */

DROP TABLE IF EXISTS `address_table`;

CREATE TABLE `address_table` (
  `addressId` int(6) NOT NULL AUTO_INCREMENT,
  `province` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `barangay` varchar(60) DEFAULT NULL,
  `street` varchar(60) DEFAULT NULL,
  `buildingNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `address_table` */

insert  into `address_table`(`addressId`,`province`,`city`,`barangay`,`street`,`buildingNumber`) values (1,'Sultan Kudarat','Tacurong City','Poblacion','Malvar Street','22'),(2,'Sultan Kudarat','Tacurong City','San Emmanuel','Idk Street','44'),(3,'Sultan Kudarat','Tacurong City','San Emmanuel','Idk Street','65'),(4,'walk in custoemr','walk in custoemr','walk in custoemr','walk in custoemr','walk in custoemr');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `admin_table` */

insert  into `admin_table`(`adminId`,`accountId`,`profileId`) values (1,1,4);

/*Table structure for table `amount_table` */

DROP TABLE IF EXISTS `amount_table`;

CREATE TABLE `amount_table` (
  `amountId` int(6) NOT NULL AUTO_INCREMENT,
  `amount` double DEFAULT NULL,
  PRIMARY KEY (`amountId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `amount_table` */

/*Table structure for table `announcement_media_table` */

DROP TABLE IF EXISTS `announcement_media_table`;

CREATE TABLE `announcement_media_table` (
  `announcementMediaId` int(6) NOT NULL AUTO_INCREMENT,
  `mediaLocationId` int(6) DEFAULT NULL,
  `announcementId` int(6) DEFAULT NULL,
  PRIMARY KEY (`announcementMediaId`),
  KEY `FK_announcement_media_table` (`announcementId`),
  KEY `FK_media_table123123123` (`mediaLocationId`),
  CONSTRAINT `FK_announcement_media_table` FOREIGN KEY (`announcementId`) REFERENCES `announcement_table` (`announcementId`),
  CONSTRAINT `FK_media_table123123123` FOREIGN KEY (`mediaLocationId`) REFERENCES `media_location_table` (`mediaLocationId`)
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
  `amountId` int(6) DEFAULT NULL,
  `datePaidId` int(6) DEFAULT NULL,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  PRIMARY KEY (`bookPaymentTransactionId`),
  KEY `FK_payment_transaction_table12142535142563` (`statusId`),
  KEY `FK_payment_transaction_table612536412653` (`bookId`),
  KEY `FK_book_payment_transaction_tableas4d565a4sd` (`amountId`),
  KEY `FK_book_payment_transaction_table23a4sd2as46as` (`datePaidId`),
  KEY `FK_book_payment_transaction2a4s645asd_table` (`modeOfPaymentId`),
  CONSTRAINT `FK_book_payment_transaction2a4s645asd_table` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`),
  CONSTRAINT `FK_book_payment_transaction_table23a4sd2as46as` FOREIGN KEY (`datePaidId`) REFERENCES `date_paid_table` (`datePaidId`),
  CONSTRAINT `FK_book_payment_transaction_tableas4d565a4sd` FOREIGN KEY (`amountId`) REFERENCES `amount_table` (`amountId`),
  CONSTRAINT `FK_payment_transaction_table12142535142563` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`),
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
  `statusId` int(6) DEFAULT NULL,
  `numberOfPax` int(6) DEFAULT NULL,
  `departureAndArrivalId` int(6) DEFAULT NULL,
  PRIMARY KEY (`bookId`),
  KEY `FK_book_table` (`packageId`),
  KEY `FK_book_table1` (`statusId`),
  KEY `FK_book_table12` (`departureAndArrivalId`),
  CONSTRAINT `FK_book_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_book_table1` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`),
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
  `customerTypeId` int(6) DEFAULT NULL,
  PRIMARY KEY (`customerId`),
  KEY `FK_registered_customer_table1` (`accountId`),
  KEY `FK_registered_customer_table` (`profileId`),
  KEY `FK_customer_table` (`customerTypeId`),
  CONSTRAINT `FK_customer_table` FOREIGN KEY (`customerTypeId`) REFERENCES `customer_type_table` (`customerTypeId`),
  CONSTRAINT `FK_registered_customer_table` FOREIGN KEY (`profileId`) REFERENCES `profile_table` (`profileId`),
  CONSTRAINT `FK_registered_customer_table1` FOREIGN KEY (`accountId`) REFERENCES `account_table` (`accountId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `customer_table` */

insert  into `customer_table`(`customerId`,`profileId`,`accountId`,`customerTypeId`) values (1,1,2,2),(2,5,4,1);

/*Table structure for table `customer_type_table` */

DROP TABLE IF EXISTS `customer_type_table`;

CREATE TABLE `customer_type_table` (
  `customerTypeId` int(6) NOT NULL AUTO_INCREMENT,
  `customerType` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`customerTypeId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `customer_type_table` */

insert  into `customer_type_table`(`customerTypeId`,`customerType`) values (1,'Walk In Customer'),(2,'Registered Customer');

/*Table structure for table `date_paid_table` */

DROP TABLE IF EXISTS `date_paid_table`;

CREATE TABLE `date_paid_table` (
  `datePaidId` int(6) NOT NULL AUTO_INCREMENT,
  `datePaid` date DEFAULT NULL,
  PRIMARY KEY (`datePaidId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `date_paid_table` */

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `destination_table` */

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

/*Table structure for table `exclusion_table` */

DROP TABLE IF EXISTS `exclusion_table`;

CREATE TABLE `exclusion_table` (
  `exclusionId` int(6) NOT NULL AUTO_INCREMENT,
  `exclusion` varchar(200) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  PRIMARY KEY (`exclusionId`),
  KEY `FK_exclusion_table` (`packageId`),
  CONSTRAINT `FK_exclusion_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `exclusion_table` */

/*Table structure for table `gallery_table` */

DROP TABLE IF EXISTS `gallery_table`;

CREATE TABLE `gallery_table` (
  `galleryId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  `announcementId` int(6) DEFAULT NULL,
  PRIMARY KEY (`galleryId`),
  KEY `FK_gallery_table` (`vanId`),
  KEY `FK_gallery_table1` (`packageId`),
  KEY `FK_gallery_table12` (`announcementId`),
  CONSTRAINT `FK_gallery_table` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`),
  CONSTRAINT `FK_gallery_table1` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_gallery_table12` FOREIGN KEY (`announcementId`) REFERENCES `announcement_table` (`announcementId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `gallery_table` */

/*Table structure for table `inclusion_table` */

DROP TABLE IF EXISTS `inclusion_table`;

CREATE TABLE `inclusion_table` (
  `inclusionId` int(6) NOT NULL AUTO_INCREMENT,
  `inclusion` varchar(200) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  PRIMARY KEY (`inclusionId`),
  KEY `FK_inclusion_table` (`packageId`),
  CONSTRAINT `FK_inclusion_table` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `inclusion_table` */

/*Table structure for table `media_location_table` */

DROP TABLE IF EXISTS `media_location_table`;

CREATE TABLE `media_location_table` (
  `mediaLocationId` int(6) NOT NULL AUTO_INCREMENT,
  `mediaLocation` text,
  PRIMARY KEY (`mediaLocationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `media_location_table` */

/*Table structure for table `media_table` */

DROP TABLE IF EXISTS `media_table`;

CREATE TABLE `media_table` (
  `mediaId` int(6) NOT NULL AUTO_INCREMENT,
  `mediaLocation` varchar(200) DEFAULT NULL,
  `description` text,
  `galleryId` int(6) DEFAULT NULL,
  PRIMARY KEY (`mediaId`),
  KEY `FK_media_table` (`galleryId`),
  CONSTRAINT `FK_media_table` FOREIGN KEY (`galleryId`) REFERENCES `gallery_table` (`galleryId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `media_table` */

/*Table structure for table `mode_of_payment_table` */

DROP TABLE IF EXISTS `mode_of_payment_table`;

CREATE TABLE `mode_of_payment_table` (
  `modeOfPaymentId` int(6) NOT NULL AUTO_INCREMENT,
  `modeOfPayment` varchar(60) DEFAULT NULL,
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
  `mediaLocationId` int(6) DEFAULT NULL,
  `packageId` int(6) DEFAULT NULL,
  PRIMARY KEY (`packageMediaId`),
  KEY `FK_package_media_table1` (`packageId`),
  KEY `FK_package_media_table123123123` (`mediaLocationId`),
  CONSTRAINT `FK_package_media_table1` FOREIGN KEY (`packageId`) REFERENCES `package_table` (`packageId`),
  CONSTRAINT `FK_package_media_table123123123` FOREIGN KEY (`mediaLocationId`) REFERENCES `media_location_table` (`mediaLocationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `package_media_table` */

/*Table structure for table `package_table` */

DROP TABLE IF EXISTS `package_table`;

CREATE TABLE `package_table` (
  `packageId` int(6) NOT NULL AUTO_INCREMENT,
  `destinationId` int(6) DEFAULT NULL,
  `pax` int(6) DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  `packageDetails` text,
  PRIMARY KEY (`packageId`),
  KEY `FK_booking_table` (`destinationId`),
  KEY `FK_package_table3` (`priceId`),
  CONSTRAINT `FK_package_table3` FOREIGN KEY (`priceId`) REFERENCES `price_table` (`priceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `package_table` */

/*Table structure for table `payment_transaction_table` */

DROP TABLE IF EXISTS `payment_transaction_table`;

CREATE TABLE `payment_transaction_table` (
  `paymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `bookId` int(6) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `datePaid` date DEFAULT NULL,
  `vanRentalId` int(6) DEFAULT NULL,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  PRIMARY KEY (`paymentTransactionId`),
  KEY `FK_payment_transaction_table` (`bookId`),
  KEY `FK_payment_transaction_table1` (`vanRentalId`),
  KEY `FK_payment_transaction_table3` (`modeOfPaymentId`),
  KEY `FK_payment_transaction_table12` (`statusId`),
  CONSTRAINT `FK_payment_transaction_table` FOREIGN KEY (`bookId`) REFERENCES `book_table` (`bookId`),
  CONSTRAINT `FK_payment_transaction_table1` FOREIGN KEY (`vanRentalId`) REFERENCES `van_rental_table` (`vanRentalId`),
  CONSTRAINT `FK_payment_transaction_table12` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`),
  CONSTRAINT `FK_payment_transaction_table3` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `payment_transaction_table` */

/*Table structure for table `place_table` */

DROP TABLE IF EXISTS `place_table`;

CREATE TABLE `place_table` (
  `placeId` int(6) NOT NULL AUTO_INCREMENT,
  `placeName` varchar(60) DEFAULT NULL,
  `mapLocationCoordinate` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`placeId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `place_table` */

/*Table structure for table `price_table` */

DROP TABLE IF EXISTS `price_table`;

CREATE TABLE `price_table` (
  `priceId` int(6) NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`priceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `price_table` */

/*Table structure for table `profile_table` */

DROP TABLE IF EXISTS `profile_table`;

CREATE TABLE `profile_table` (
  `profileId` int(6) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(60) DEFAULT NULL,
  `middleName` varchar(60) DEFAULT NULL,
  `lastName` varchar(60) DEFAULT NULL,
  `addressId` int(6) DEFAULT NULL,
  `contactNumber` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`profileId`),
  KEY `FK_profile_table` (`addressId`),
  CONSTRAINT `FK_profile_table` FOREIGN KEY (`addressId`) REFERENCES `address_table` (`addressId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `profile_table` */

insert  into `profile_table`(`profileId`,`firstName`,`middleName`,`lastName`,`addressId`,`contactNumber`) values (1,'toto','panizal','oracoy',1,'09754142411'),(2,'tata','natividad','evanz',2,'09368585441'),(4,'admin','admin','admin',3,'09754363944'),(5,'walkin ','walkkinnn','walkkinn',4,'09754352222');

/*Table structure for table `status_table` */

DROP TABLE IF EXISTS `status_table`;

CREATE TABLE `status_table` (
  `statusId` int(6) NOT NULL AUTO_INCREMENT,
  `status` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_table` */

/*Table structure for table `van_media_table` */

DROP TABLE IF EXISTS `van_media_table`;

CREATE TABLE `van_media_table` (
  `vanMediaId` int(6) NOT NULL AUTO_INCREMENT,
  `mediaLocationId` int(6) DEFAULT NULL,
  `vanId` int(6) DEFAULT NULL,
  PRIMARY KEY (`vanMediaId`),
  KEY `FK_van_media_table` (`vanId`),
  KEY `FK_van_media_table1123123123` (`mediaLocationId`),
  CONSTRAINT `FK_van_media_table` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`),
  CONSTRAINT `FK_van_media_table1123123123` FOREIGN KEY (`mediaLocationId`) REFERENCES `media_location_table` (`mediaLocationId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_media_table` */

/*Table structure for table `van_rental_payment_transaction_table` */

DROP TABLE IF EXISTS `van_rental_payment_transaction_table`;

CREATE TABLE `van_rental_payment_transaction_table` (
  `vanRentalPaymentTransactionId` int(6) NOT NULL AUTO_INCREMENT,
  `vanRentalId` int(6) DEFAULT NULL,
  `amountId` int(6) DEFAULT NULL,
  `modeOfPaymentId` int(6) DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  `datePaidId` int(6) DEFAULT NULL,
  PRIMARY KEY (`vanRentalPaymentTransactionId`),
  KEY `FK_van_rental_payment_transaction_tabl212335126` (`vanRentalId`),
  KEY `FK_van_rental_payment_transaction12563412333` (`statusId`),
  KEY `FK_van_rental_payment_transaction_a6+5s4da4sdtable` (`amountId`),
  KEY `FK_van_rent5as4d65al_payment_transaction_table` (`modeOfPaymentId`),
  KEY `FK_van_rental_payment_trans54asd56action_table` (`datePaidId`),
  CONSTRAINT `FK_van_rent5as4d65al_payment_transaction_table` FOREIGN KEY (`modeOfPaymentId`) REFERENCES `mode_of_payment_table` (`modeOfPaymentId`),
  CONSTRAINT `FK_van_rental_payment_trans54asd56action_table` FOREIGN KEY (`datePaidId`) REFERENCES `date_paid_table` (`datePaidId`),
  CONSTRAINT `FK_van_rental_payment_transaction12563412333` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`),
  CONSTRAINT `FK_van_rental_payment_transaction_a6+5s4da4sdtable` FOREIGN KEY (`amountId`) REFERENCES `amount_table` (`amountId`),
  CONSTRAINT `FK_van_rental_payment_transaction_tabl212335126` FOREIGN KEY (`vanRentalId`) REFERENCES `van_rental_table` (`vanRentalId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_rental_payment_transaction_table` */

/*Table structure for table `van_rental_table` */

DROP TABLE IF EXISTS `van_rental_table`;

CREATE TABLE `van_rental_table` (
  `vanRentalId` int(6) NOT NULL AUTO_INCREMENT,
  `vanId` int(6) DEFAULT NULL,
  `customerId` int(6) DEFAULT NULL,
  `dateRented` date DEFAULT NULL,
  `statusId` int(6) DEFAULT NULL,
  `departureAndArrivalId` int(6) DEFAULT NULL,
  PRIMARY KEY (`vanRentalId`),
  KEY `FK_van_rental_table` (`vanId`),
  KEY `FK_van_rental_table2` (`customerId`),
  KEY `FK_van_rental_table4` (`statusId`),
  KEY `FK_van_rental_table12` (`departureAndArrivalId`),
  CONSTRAINT `FK_van_rental_table` FOREIGN KEY (`vanId`) REFERENCES `van_table` (`vanId`),
  CONSTRAINT `FK_van_rental_table12` FOREIGN KEY (`departureAndArrivalId`) REFERENCES `departure_and_arrival_table` (`departureAndArrivalId`),
  CONSTRAINT `FK_van_rental_table2` FOREIGN KEY (`customerId`) REFERENCES `customer_table` (`customerId`),
  CONSTRAINT `FK_van_rental_table4` FOREIGN KEY (`statusId`) REFERENCES `status_table` (`statusId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_rental_table` */

/*Table structure for table `van_table` */

DROP TABLE IF EXISTS `van_table`;

CREATE TABLE `van_table` (
  `vanId` int(6) NOT NULL AUTO_INCREMENT,
  `make` varchar(60) DEFAULT NULL,
  `model` varchar(60) DEFAULT NULL,
  `modelYear` varchar(60) DEFAULT NULL,
  `color` varchar(60) DEFAULT NULL,
  `priceId` int(6) DEFAULT NULL,
  PRIMARY KEY (`vanId`),
  KEY `FK_van_table12` (`priceId`),
  CONSTRAINT `FK_van_table12` FOREIGN KEY (`priceId`) REFERENCES `price_table` (`priceId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `van_table` */

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
 `addressId` int(6) ,
 `contactNumber` varchar(60) ,
 `province` varchar(60) ,
 `city` varchar(60) ,
 `barangay` varchar(60) ,
 `street` varchar(60) ,
 `buildingNumber` varchar(60) 
)*/;

/*Table structure for table `customer_view` */

DROP TABLE IF EXISTS `customer_view`;

/*!50001 DROP VIEW IF EXISTS `customer_view` */;
/*!50001 DROP TABLE IF EXISTS `customer_view` */;

/*!50001 CREATE TABLE  `customer_view`(
 `customerId` int(6) ,
 `profileId` int(6) ,
 `accountId` int(6) ,
 `customerTypeId` int(6) ,
 `userName` varchar(60) ,
 `passWord` varchar(60) ,
 `customerType` varchar(60) ,
 `firstName` varchar(60) ,
 `middleName` varchar(60) ,
 `lastName` varchar(60) ,
 `addressId` int(6) ,
 `contactNumber` varchar(60) ,
 `province` varchar(60) ,
 `city` varchar(60) ,
 `barangay` varchar(60) ,
 `street` varchar(60) ,
 `buildingNumber` varchar(60) 
)*/;

/*View structure for view admin_view */

/*!50001 DROP TABLE IF EXISTS `admin_view` */;
/*!50001 DROP VIEW IF EXISTS `admin_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `admin_view` AS select `admin_table`.`adminId` AS `adminId`,`admin_table`.`accountId` AS `accountId`,`admin_table`.`profileId` AS `profileId`,`account_table`.`userName` AS `userName`,`account_table`.`passWord` AS `passWord`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`contactNumber` AS `contactNumber`,`address_table`.`province` AS `province`,`address_table`.`city` AS `city`,`address_table`.`barangay` AS `barangay`,`address_table`.`street` AS `street`,`address_table`.`buildingNumber` AS `buildingNumber` from (((`admin_table` join `account_table` on((`admin_table`.`accountId` = `account_table`.`accountId`))) join `profile_table` on((`admin_table`.`profileId` = `profile_table`.`profileId`))) join `address_table` on((`profile_table`.`addressId` = `address_table`.`addressId`))) */;

/*View structure for view customer_view */

/*!50001 DROP TABLE IF EXISTS `customer_view` */;
/*!50001 DROP VIEW IF EXISTS `customer_view` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `customer_view` AS select `customer_table`.`customerId` AS `customerId`,`customer_table`.`profileId` AS `profileId`,`customer_table`.`accountId` AS `accountId`,`customer_table`.`customerTypeId` AS `customerTypeId`,`account_table`.`userName` AS `userName`,`account_table`.`passWord` AS `passWord`,`customer_type_table`.`customerType` AS `customerType`,`profile_table`.`firstName` AS `firstName`,`profile_table`.`middleName` AS `middleName`,`profile_table`.`lastName` AS `lastName`,`profile_table`.`addressId` AS `addressId`,`profile_table`.`contactNumber` AS `contactNumber`,`address_table`.`province` AS `province`,`address_table`.`city` AS `city`,`address_table`.`barangay` AS `barangay`,`address_table`.`street` AS `street`,`address_table`.`buildingNumber` AS `buildingNumber` from ((((`customer_table` join `profile_table` on((`customer_table`.`profileId` = `profile_table`.`profileId`))) join `account_table` on((`customer_table`.`accountId` = `account_table`.`accountId`))) join `customer_type_table` on((`customer_table`.`customerTypeId` = `customer_type_table`.`customerTypeId`))) join `address_table` on((`profile_table`.`addressId` = `address_table`.`addressId`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
