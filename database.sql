/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.4.32-MariaDB : Database - swf
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`swf` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `swf`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `Admin_ID` int(1) NOT NULL AUTO_INCREMENT,
  `Admin_Name` varchar(250) NOT NULL,
  `Admin_Gmail` varchar(250) NOT NULL,
  `Admin_Password` varchar(250) NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `admin` */

LOCK TABLES `admin` WRITE;

insert  into `admin`(`Admin_ID`,`Admin_Name`,`Admin_Gmail`,`Admin_Password`) values (1,'walfare','admin@gmail.com','1122');

UNLOCK TABLES;

/*Table structure for table `donation_history` */

DROP TABLE IF EXISTS `donation_history`;

CREATE TABLE `donation_history` (
  `Donor` int(11) DEFAULT NULL,
  `Donate_Amount` int(200) DEFAULT NULL,
  `Donate_Slip` varchar(250) DEFAULT NULL,
  `account_number` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `donation_history` */

LOCK TABLES `donation_history` WRITE;

insert  into `donation_history`(`Donor`,`Donate_Amount`,`Donate_Slip`,`account_number`) values (7,1000,'images.png','1252299591542'),(7,5000,'images (2).png','03423005942'),(8,1000,'1pass1234.png','03423005942'),(9,3000,'original.jpg','03423005942'),(10,4000,'img8.jpg','1252299591542'),(11,500,'img12.webp','1252299591542'),(23,500,'images.png','03423005942');

UNLOCK TABLES;

/*Table structure for table `donation_transfers` */

DROP TABLE IF EXISTS `donation_transfers`;

CREATE TABLE `donation_transfers` (
  `Receiver_ID` int(9) NOT NULL AUTO_INCREMENT,
  `Receiver_Name` varchar(250) DEFAULT NULL,
  `Amount` varchar(250) DEFAULT NULL,
  `Reason` varchar(250) DEFAULT NULL,
  `Receipt_Image` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Receiver_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `donation_transfers` */

LOCK TABLES `donation_transfers` WRITE;

UNLOCK TABLES;

/*Table structure for table `donor_registration` */

DROP TABLE IF EXISTS `donor_registration`;

CREATE TABLE `donor_registration` (
  `Donor_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Donor_Name` varchar(100) NOT NULL,
  `Organization` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Account_No` varchar(50) NOT NULL,
  `Donor_Password` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Donor_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `donor_registration` */

LOCK TABLES `donor_registration` WRITE;

insert  into `donor_registration`(`Donor_ID`,`Donor_Name`,`Organization`,`Phone`,`Email`,`Address`,`Account_No`,`Donor_Password`) values (7,'Aisha Khan','Helping Hands Foundation','03001234567','aisha.khan@example.com','123 Maple Street, Lahore','PK1234567890123','pass1234'),(8,'Omar Farooq','Green Earth Org','03111234567','omar.farooq@example.org','45 Elm Road, Karachi','PK9876543210987','green2023'),(9,'Sara Ahmed','','03221234567','sara.ahmed@example.net','789 Oak Lane, Islamabad','PK5647382910567','sara2025'),(10,'Bilal Saeed','Charity Works','03331234567','bilal.saeed@example.com','56 Pine Street, Peshawar','PK6789123456789','charity4all'),(11,'Zainab Ali','Education First','03441234567','zainab.ali@example.com','101 Birch Avenue, Quetta','PK1122334455667','edufirst'),(12,'Imran Malik','','03099887766','imran.malik@example.org','22 Cedar Street, Multan','PK7788990011223','imranpwd'),(13,'Fatima Noor','Health Aid','03112223344','fatima.noor@example.net','11 Spruce Drive, Faisalabad','PK3344556677889','health123'),(14,'Ahmed Raza','','03213334455','ahmed.raza@example.com','500 Walnut Road, Sialkot','PK9988776655443','ahmed2024'),(15,'Maryam Hussain','Helping Hands Foundation','03314445566','maryam.hussain@example.org','77 Cherry Street, Rawalpindi','PK4455667788990','hhf2023'),(16,'Naveed Shah','Water for All','03415556677','naveed.shah@example.com','9 Aspen Road, Hyderabad','PK5566778899001','water4life'),(17,'Hassan Javed','Bright Future Trust','03017654321','hassan.javed@example.com','12 Olive Street, Lahore','PK2233445566778','bright2025'),(18,'Sana Mir','','03129876543','sana.mir@example.org','88 Jasmine Road, Karachi','PK3344556677880','sana987'),(19,'Usman Tariq','Food for All','03238765412','usman.tariq@example.net','204 Maple Avenue, Islamabad','PK4455667788991','food4all2024'),(20,'Amina Riaz','','03345678901','amina.riaz@example.com','67 Cedar Lane, Peshawar','PK5566778899002','amina123'),(21,'Fawad Ali','Hope Foundation','03456789012','fawad.ali@example.org','90 Pine Street, Quetta','PK6677889900113','hope2023'),(22,'Lubna Sheikh','','03064537890','lubna.sheikh@example.net','31 Birch Avenue, Multan','PK7788990011224','lubna2022'),(23,'Khalid Mahmood','Water for Life','03173458902','khalid.mahmood@example.com','45 Spruce Drive, Faisalabad','PK8899001122335','waterlife');

UNLOCK TABLES;

/*Table structure for table `our_teams` */

DROP TABLE IF EXISTS `our_teams`;

CREATE TABLE `our_teams` (
  `Member_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Member_Name` varchar(250) DEFAULT NULL,
  `Member_Positions` varchar(250) DEFAULT NULL,
  `Member_Facebook_Link` varchar(500) DEFAULT NULL,
  `Member_Picture` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Member_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `our_teams` */

LOCK TABLES `our_teams` WRITE;

insert  into `our_teams`(`Member_ID`,`Member_Name`,`Member_Positions`,`Member_Facebook_Link`,`Member_Picture`) values (16,'Irfan khan','Cheif Advisor','https://www.facebook.com/shahidkhan.prog','Member1.jpg'),(17,'M kashif khan','Advisor','https://www.facebook.com/shahidkhan.prog','Member2.jpg'),(18,'Shahid Khan','Lead Community Advisor','https://www.facebook.com/shahidkhan.prog','po.jpg');

UNLOCK TABLES;

/*Table structure for table `students_registration` */

DROP TABLE IF EXISTS `students_registration`;

CREATE TABLE `students_registration` (
  `Student_ID` int(5) NOT NULL,
  `Student_Name` varchar(250) DEFAULT NULL,
  `Dept` varchar(250) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `Address` varchar(250) DEFAULT NULL,
  `Account_No` varchar(250) DEFAULT NULL,
  `Gmail` varchar(250) DEFAULT NULL,
  `Monthly_Income_State` varchar(1000) DEFAULT NULL,
  `Gaurdian_cnic` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`Student_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `students_registration` */

LOCK TABLES `students_registration` WRITE;

insert  into `students_registration`(`Student_ID`,`Student_Name`,`Dept`,`Password`,`Address`,`Account_No`,`Gmail`,`Monthly_Income_State`,`Gaurdian_cnic`) values (1001,'Tariq Gill','Software Engineering','3007','Multan, Pakistan','851186868432','tariq.gill@mail.com','Father runs a rickshaw and earns around PKR 38,000 monthly. Total monthly income: PKR 45186.','3806410723301'),(1002,'Laiba Yousaf','Business Administration','1207','Lahore, Pakistan','523875385290','laiba.yousaf@mail.com','Mother sells homemade food and snacks earning PKR 12,000, father earns PKR 30,000 as clerk. Total monthly income: PKR 59984.','3346829798686'),(1003,'Hamza Gill','Electronics','9282','Karachi, Pakistan','782278297241','hamza.gill@example.com','Father drives a taxi earning PKR 45,000, brother adds PKR 10,000 with part-time job. Total monthly income: PKR 43450.','3234018635347'),(1004,'Hassan Baig','Electronics','5501','Lahore, Pakistan','226412305872','hassan.baig@mail.com','Parents work as daily wage laborers earning a combined PKR 35,000. Total monthly income: PKR 57711.','3214289478251'),(1005,'Hamza Hussain','IT','2958','Lahore, Pakistan','994098263166','hamza.hussain@student.edu.pk','Father runs a rickshaw and earns around PKR 38,000 monthly. Total monthly income: PKR 51066.','3760728554247'),(1006,'Areeba Khan','Computer Science','1234','Swat, Pakistan','874982347823','areeba.khan@gmail.com','Father is a school teacher earning PKR 40,000, and mother gives home tuition earning PKR 5,000. Total monthly income: PKR 45000.','6110192837461'),(1007,'Daniyal Farooq','Information Technology','4321','Peshawar, Pakistan','724187325661','daniyal.farooq@mail.com','Father works in a small shop earning PKR 25,000, and elder sister works in a call center earning PKR 15,000. Total monthly income: PKR 39600.','4210134789562'),(1008,'Zoya Sheikh','BBA','9988','Rawalpindi, Pakistan','693847125871','zoya.sheikh@gmail.com','Father has a part-time government job and earns PKR 32,000. Mother contributes PKR 8,000 from home-based sewing work. Total monthly income: PKR 45300.','3450182963741'),(1009,'Ali Raza','Electrical Engineering','5566','Gujranwala, Pakistan','589471258476','ali.raza@edu.pk','Father owns a small electronics repair shop earning around PKR 35,000. Total monthly income: PKR 35600.','3510213648712'),(1010,'Maria Saleem','Software Engineering','2211','Faisalabad, Pakistan','238174589236','maria.saleem@hotmail.com','Father is a driver in a private company earning PKR 33,000. No other income source. Total monthly income: PKR 33000.','3820126384910'),(1011,'Usman Shah','Mechanical Engineering','7744','Abbottabad, Pakistan','473829105489','usman.shah@gmail.com','Father is retired and receives PKR 18,000 pension. Elder brother works at a mobile shop earning PKR 20,000. Total monthly income: PKR 40500.','1730158294761'),(1012,'Mehwish Javed','Economics','6677','Quetta, Pakistan','198374105472','mehwish.javed@edu.pk','Father owns a fruit stall earning approximately PKR 28,000 and mother earns PKR 5,000 from stitching clothes. Total monthly income: PKR 35000.','5440126384019'),(1013,'Noman Tariq','Accounting','8899','Bahawalpur, Pakistan','384105829170','noman.tariq@uni.edu.pk','Father does farming on rented land generating seasonal income, averaging PKR 40,000 monthly. Total monthly income: PKR 40300.','3510126348579'),(1014,'Hira Zafar','Computer Science','5567','Sargodha, Pakistan','578102384765','hira.zafar@edu.com','Father is a tailor and earns around PKR 30,000. Elder sister teaches in a school with PKR 12,000 monthly income. Total monthly income: PKR 43300.','3310246851792'),(1015,'Waleed Iqbal','Civil Engineering','3311','Islamabad, Pakistan','912384756183','waleed.iqbal@mail.com','Father is a plumber earning PKR 32,000 and mother earns around PKR 7,000 from part-time cleaning work. Total monthly income: PKR 42000.','6110174827361'),(1016,'Sana Malik','Information Technology','4455','Karachi, Pakistan','847362918273','sana.malik@gmail.com','Father runs a small grocery store earning PKR 38,000 monthly, and mother does embroidery work from home earning PKR 6,000. Total monthly income: PKR 44000.','4210158392012'),(1017,'Farhan Abbas','Electrical Engineering','6678','Lahore, Pakistan','918273645982','farhan.abbas@edu.pk','Father is a government employee earning PKR 50,000 monthly. No other income source. Total monthly income: PKR 50000.','3520192837465'),(1018,'Amina Qureshi','Business Administration','2233','Multan, Pakistan','374829105746','amina.qureshi@mail.com','Father owns a small transport business generating around PKR 45,000 monthly, and mother sells homemade snacks earning PKR 5,000 monthly. Total monthly income: PKR 50000.','6150138294756'),(1019,'Omar Khalid','Computer Science','7788','Hyderabad, Pakistan','562839104857','omar.khalid@gmail.com','Father works as a mechanic earning PKR 28,000 monthly, and mother earns PKR 7,000 from tailoring. Total monthly income: PKR 35000.','4230192837467'),(1020,'Sadia Iqbal','Software Engineering','3344','Sialkot, Pakistan','928374651029','sadia.iqbal@edu.com','Father is a teacher earning PKR 42,000 monthly, and mother works part-time in a clinic earning PKR 8,000 monthly. Total monthly income: PKR 50000.','3820174658293'),(1021,'Bilal Ahmed','Mechanical Engineering','5566','Rawalpindi, Pakistan','473829105489','bilal.ahmed@gmail.com','Father owns a bakery shop earning PKR 35,000, and mother sells homemade pickles earning PKR 5,000 monthly. Total monthly income: PKR 40000.','1740158294765'),(1022,'Nida Hassan','Economics','6677','Faisalabad, Pakistan','198374105472','nida.hassan@edu.pk','Father works as a driver earning PKR 30,000 monthly, and mother sells vegetables in the local market earning PKR 5,000 monthly. Total monthly income: PKR 35000.','5430126384017'),(1023,'Hamza Raza','Accounting','8899','Peshawar, Pakistan','384105829170','hamza.raza@uni.edu.pk','Father is a security guard earning PKR 22,000 monthly, elder brother is a student without income. Total monthly income: PKR 22000.','3510126348576'),(1024,'Zainab Malik','Computer Science','5567','Quetta, Pakistan','578102384765','zainab.malik@edu.com','Father is a shopkeeper earning PKR 40,000 monthly, mother does home-based stitching work earning PKR 5,000. Total monthly income: PKR 45000.','3310246851795'),(1025,'Ahmed Tariq','Civil Engineering','3311','Islamabad, Pakistan','912384756183','ahmed.tariq@mail.com','Father is a government clerk earning PKR 38,000, and mother is a housewife with no income. Total monthly income: PKR 38000.','6110174827367');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
