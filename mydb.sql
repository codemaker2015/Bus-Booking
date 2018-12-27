-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2013 at 06:23 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mydb`;

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newagent`(in a varchar(45),in b varchar(45),
in c varchar(45),in d varchar(45),in e int(11),in f varchar(45),in g varchar(45),
in h int(11),in i varchar(45),in j int(11),in k int(11),in l int(11),in m varchar(45),
in n int(11),in o int(11),in p varchar(45))
BEGIN
insert into tb_agent(agent_name,agent_emailid,agent_password,agent_gender,agent_age,
agent_shopname,agent_address,agent_pincode,agent_shopregno,agent_mobile1,agent_landline,
agent_accountno,agent_bankname,state_id,district_id,agent_regdate)
values(a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newallocation`(in allotname varchar(45),in busid int(11),
in layoutid int(11),in bustypeid int(11),in conductorid int(11))
BEGIN
insert into tb_allocation(allocation_name,bus_id,seatlayout_id,bustype_id,conductor_id)
values(allotname,busid,layoutid,bustypeid,conductorid);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newallocationdates`(in allotid int(11),in allotdate varchar(45))
BEGIN
insert into tb_allocationdates values(allotid,allotdate);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newbkdseats`(IN aid INT(11),in dt varchar(45),in seat varchar(45),IN rid INT(11))
BEGIN
insert into tb_bkdseats(allocation_id,date,seatno,route_id) values(aid,dt,seat,rid);
select Max(bkdseats_id) as bkdseats_id from tb_bkdseats;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newbus`(in regno VARCHAR(45),in mdlna VARCHAR(45),
in regdate VARCHAR(45),in seats INT(11) )
BEGIN
insert into tb_bus(bus_regno,bus_modelname,bus_regdate,bus_totalseats)
values(regno,mdlna,regdate,seats);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newbustype`(in bname varchar(45),in m varchar(1),IN w VARCHAR(1),IN c VARCHAR(1),IN b VARCHAR(1))
BEGIN
 insert into tb_bustype(bustype_name,movie,water,charger,blanket) values(bname,m,w,c,b);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newconductor`(in a varchar(45),in b varchar(45),in c varchar(45))
BEGIN
insert into tb_conductor(conductor_name,conductor_un,conductor_pwd) values
(a,b,c);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newcontactus`(in na varchar(45),in mail varchar(45),in msg varchar(200))
BEGIN
insert into tb_contact(name,email,msg) values(na,mail,msg);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newdistrict`(in stateid int(11),in distname VARCHAR(45))
BEGIN
insert into tb_district(state_id,district_name) values(stateid,distname);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newfaretime`(in a int(11),in b int(11),in c int(11),in d varchar(45))
BEGIN
insert into tb_faretime(bus_id,stop_id,fare,reachingtime) values(a,b,c,d);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newpassenger`(IN bkid INT(11),in resid int(11),in na varchar(45),in seatno varchar(45),in gender varchar(45),in age int(11))
BEGIN
    DECLARE intcheckId INTEGER(1);
      insert into tb_passenger(bkdseats_id,reservation_id,name,seatno,gender,age) values(bkid,resid,na,seatno,gender,age);
      select max(passenger_id) as passenger_id from tb_passenger;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newperson`(in un VARCHAR(45),in email VARCHAR(45),in pwd VARCHAR(45),in gender VARCHAR(45))
BEGIN

insert into tb_person(person_name,person_emailid,person_password,person_gender) values(un,email,pwd,gender);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newreservation`(IN `agentid` INT(11), IN `flag` VARCHAR(45), IN `prooftype` VARCHAR(45), IN `totalseats` INT(11), IN `proofno` VARCHAR(45), IN `mobile` INT(11), IN `email` VARCHAR(45), IN `address` VARCHAR(45), IN `nameonid` VARCHAR(45))
BEGIN
DECLARE cdate varchar(45); 
SELECT DATE_FORMAT(CURDATE(),'%m/%d/%Y') into cdate;
INSERT INTO tb_reservation(res_date,agent_id,flag,prooftype,noofseats,idproofno,mobile,emailid,address,nameonid) VALUES(
     cdate,agentid,flag,prooftype,totalseats,proofno,mobile,email,address,nameonid);
     
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newroute`(IN allotid INT(11),in startlocation int(11),
in stoplocation int(11),in fare int(11),in starttime varchar(11),in endtime varchar(11),in totaltime 
varchar(11))
BEGIN
insert into tb_route(allocation_id,route_startstop_id,route_endstop_id,route_fare,route_starttime,
route_endtime,route_runningtime)
values(allotid,startlocation,stoplocation,fare,starttime,endtime,totaltime);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newseatlayout`(in a varchar(45),in b varchar(45),
in c varchar(45),in d varchar(45))
BEGIN
insert into tb_seatlayout(seatlayout_name,seatlayout_image,seatlayout_file,
seatlayout_location) values(a,b,c,d);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newstate`(in  state VARCHAR(45))
BEGIN
insert into tb_state(state_name) values(state);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newstop`(in stopname varchar(45),in state int(11),
in district int(11),in rto varchar(45))
BEGIN

insert into tb_stop(stop_name,state_id,district_id,stop_rtostopid) values
(stopname,state,district,rto);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_newtestimonials`(in words varchar(200),in pid int(11))
BEGIN
insert into tb_testimonials(testimonial_text,person_id) values(words,pid);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `print_ticket`(in resid int(11))
BEGIN
 SELECT * FROM view_test WHERE reservation_id=resid;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `searchresult`(in startlocation varchar(45),in endlocation varchar(45),in dt varchar(45))
BEGIN
         select * from view_all where startingstop=startlocation and  endingstop=endlocation  and allocation_date=dt;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_agent`()
BEGIN
select * from tb_agent;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_allcndctrdetails`(IN una VARCHAR(45),IN pwd VARCHAR(45))
BEGIN
SELECT bus_id,conductor_id,conductor_un,bus_regno,conductor_name,conductor_pwd FROM `mydb`.`view_reserve` WHERE conductor_un=una AND conductor_pwd=pwd;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_allocation`()
BEGIN
      select allocation_id,allocation_name from tb_allocation; 
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_allocationid`(in busid int(11))
BEGIN
select allocation_id from tb_allocation where bus_id=busid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bkdseats`(IN allotid INT(11),IN allotdate VARCHAR(45),IN layoutname VARCHAR(45),in rid int(11))
BEGIN
SELECT seatno FROM view_seats WHERE allocation_id=allotid and date=allotdate and seatlayout_name=layoutname and route_id=rid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bus`()
BEGIN
select bus_id,bus_regno from tb_bus;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_bustype`()
BEGIN
select bustype_id,bustype_name from tb_bustype; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_cndctr_name`(IN una VARCHAR(45),IN pwd VARCHAR(45))
BEGIN
SELECT * FROM tb_conductor WHERE conductor_un=una AND conductor_pwd=pwd;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_conductor`()
BEGIN
select conductor_id,conductor_name from tb_conductor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_district`()
BEGIN
select district_id,district_name from tb_district;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_layout`()
BEGIN
select seatlayout_id,seatlayout_name from tb_seatlayout;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_pics`()
BEGIN
select imgname,text from tb_gal_pics;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_res_id`(IN regno varchar(45),in dt varchar(45))
BEGIN
select  distinct reservation_id from view_reserve where bus_regno=regno and allocation_date=dt;
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_route`()
BEGIN
select route_id,route_startstop_id,route_endstop_id from tb_route;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_state`()
BEGIN
select  * from tb_state;
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_stop`()
BEGIN
select stop_id,stop_name from tb_stop;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `select_stopname`(in a int(11))
BEGIN
select stop_name from tb_stop where stop_id=a;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_agent`
--

CREATE TABLE IF NOT EXISTS `tb_agent` (
  `agent_id` int(11) NOT NULL AUTO_INCREMENT,
  `agent_name` varchar(45) NOT NULL,
  `agent_emailid` varchar(45) NOT NULL,
  `agent_password` varchar(45) NOT NULL,
  `agent_gender` varchar(45) NOT NULL,
  `agent_age` int(11) NOT NULL,
  `agent_shopname` varchar(45) NOT NULL,
  `agent_address` varchar(45) NOT NULL,
  `agent_pincode` int(11) NOT NULL,
  `agent_shopregno` varchar(45) NOT NULL,
  `agent_mobile1` int(11) NOT NULL,
  `agent_landline` int(11) DEFAULT NULL,
  `agent_accountno` int(11) NOT NULL,
  `agent_bankname` varchar(45) NOT NULL,
  `state_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `agent_regdate` varchar(45) DEFAULT NULL,
  `flag` bit(1) DEFAULT b'0',
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_allocation`
--

CREATE TABLE IF NOT EXISTS `tb_allocation` (
  `allocation_id` int(11) NOT NULL AUTO_INCREMENT,
  `allocation_name` varchar(45) DEFAULT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `seatlayout_id` int(11) DEFAULT NULL,
  `bustype_id` int(11) DEFAULT NULL,
  `conductor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`allocation_id`),
  KEY `bus_id` (`bus_id`),
  KEY `seatlayout_id` (`seatlayout_id`),
  KEY `bustype_id` (`bustype_id`),
  KEY `conductor_id` (`conductor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tb_allocation`
--

INSERT INTO `tb_allocation` (`allocation_id`, `allocation_name`, `bus_id`, `seatlayout_id`, `bustype_id`, `conductor_id`) VALUES
(29, 'morning', 14, 8, 14, 7),
(30, 'noon', 14, 9, 15, 9),
(31, 'morning', 14, 9, 15, 9),
(32, 'morning', 14, 8, 18, 12),
(33, 'noon', 14, 8, 18, 12),
(34, 'noon', 14, 8, 18, 12),
(35, 'morning', 14, 9, 14, 11),
(36, 'morning', 14, 9, 14, 11),
(37, 'evening', 14, 8, 17, 13),
(38, 'morning', 14, 8, 14, 12),
(39, 'noon', 14, 8, 16, 11),
(40, 'evening', 14, 8, 18, 12),
(41, 'morning', 14, 9, 18, 11),
(42, 'sdds', 14, 8, 15, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_allocationdates`
--

CREATE TABLE IF NOT EXISTS `tb_allocationdates` (
  `allocation_id` int(11) NOT NULL,
  `allocation_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_allocationdates`
--

INSERT INTO `tb_allocationdates` (`allocation_id`, `allocation_date`) VALUES
(29, '10/23/2013'),
(30, '10/24/2013'),
(31, '11/23/2013'),
(32, '11/11/2013'),
(33, '11/11/2013'),
(34, '11/11/2013'),
(35, '1/11/2013'),
(36, '1/11/2013'),
(37, '11/10/2013'),
(38, '10/23/2013'),
(39, '10/23/2013'),
(40, '10/23/2013'),
(41, '10/11/2013'),
(42, '11/10/2013');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bkdseats`
--

CREATE TABLE IF NOT EXISTS `tb_bkdseats` (
  `bkdseats_id` int(11) NOT NULL AUTO_INCREMENT,
  `allocation_id` int(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `seatno` varchar(45) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`bkdseats_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=484 ;

--
-- Dumping data for table `tb_bkdseats`
--

INSERT INTO `tb_bkdseats` (`bkdseats_id`, `allocation_id`, `date`, `seatno`, `route_id`) VALUES
(464, 29, '10/23/2013', 'A1', 15),
(465, 29, '10/23/2013', 'A1', 15),
(466, 29, '10/23/2013', 'A1', 15),
(467, 29, '10/23/2013', 'B1', 15),
(468, 29, '10/23/2013', 'C1', 15),
(469, 29, '10/23/2013', 'A2', 15),
(470, 29, '10/23/2013', 'B2', 15),
(471, 29, '10/23/2013', 'C2', 15),
(472, 29, '10/23/2013', 'D2', 15),
(473, 29, '10/23/2013', 'D1', 15),
(474, 29, '10/23/2013', 'E1', 15),
(475, 29, '10/23/2013', 'H3', 15),
(476, 37, '11/10/2013', 'A3', 20),
(477, 37, '11/10/2013', 'B3', 20),
(478, 37, '11/10/2013', 'A4', 20),
(479, 37, '11/10/2013', 'B4', 20),
(480, 37, '11/10/2013', 'K1', 20),
(481, 37, '11/10/2013', 'K2', 20),
(482, 37, '11/10/2013', 'K1', 20),
(483, 37, '11/10/2013', 'K2', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bus`
--

CREATE TABLE IF NOT EXISTS `tb_bus` (
  `bus_id` int(11) NOT NULL AUTO_INCREMENT,
  `bus_regno` varchar(45) DEFAULT NULL,
  `bus_modelname` varchar(45) DEFAULT NULL,
  `bus_regdate` varchar(45) DEFAULT NULL,
  `bus_totalseats` int(11) DEFAULT NULL,
  PRIMARY KEY (`bus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tb_bus`
--

INSERT INTO `tb_bus` (`bus_id`, `bus_regno`, `bus_modelname`, `bus_regdate`, `bus_totalseats`) VALUES
(14, 'kl-36-D-1964', 'Mini  bus', '12/2/2011', 45),
(15, 'kl-36-D-1919', 'volvo', '12/2/1989', 49),
(16, 'kl-07-A-444', 'Mini Bus', '12/2/2011', 45),
(17, 'kl-48-D-7888', 'AC', '22//10/2013', 45),
(18, 'kl-58-G-4567', 'Regular bus', '23/10/2013', 49),
(19, 'kl-60-D-9800', 'minibus', '24/10/2013', 40),
(20, 'kl-34-d-4567', 'minibus', '31/10/2013', 49),
(21, 'kl-45-d-3456', 'Regular bus', '21/10/2013', 45);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bustype`
--

CREATE TABLE IF NOT EXISTS `tb_bustype` (
  `bustype_id` int(11) NOT NULL AUTO_INCREMENT,
  `bustype_name` varchar(45) NOT NULL,
  `movie` varchar(1) DEFAULT '0',
  `water` varchar(1) DEFAULT '0',
  `charger` varchar(1) DEFAULT '0',
  `blanket` varchar(1) DEFAULT '0',
  PRIMARY KEY (`bustype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `tb_bustype`
--

INSERT INTO `tb_bustype` (`bustype_id`, `bustype_name`, `movie`, `water`, `charger`, `blanket`) VALUES
(14, 'mini bus', '1', '0', '', '1'),
(15, 'volvo', '1', '0', '1', '1'),
(16, 'Volvo', '1', '1', '1', '1'),
(17, 'Regular bus', '0', '1', '', '0'),
(18, 'AC', '0', '1', '1', '0'),
(19, 'minibus', '0', '0', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_conductor`
--

CREATE TABLE IF NOT EXISTS `tb_conductor` (
  `conductor_id` int(11) NOT NULL AUTO_INCREMENT,
  `conductor_name` varchar(45) DEFAULT NULL,
  `conductor_un` varchar(45) DEFAULT NULL,
  `conductor_pwd` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`conductor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `tb_conductor`
--

INSERT INTO `tb_conductor` (`conductor_id`, `conductor_name`, `conductor_un`, `conductor_pwd`) VALUES
(7, 'hari', 'hari', 'hari'),
(9, 'vipin', 'vipin', 'vipin'),
(10, 'Sunil', 'Sunil', 'sunil'),
(11, 'Sreeju', 'Sreeju', 'sreeju'),
(12, 'Manu', 'Manu', 'manu'),
(13, 'Arun', 'Arun', 'arun');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contact`
--

CREATE TABLE IF NOT EXISTS `tb_contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `msg` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tb_contact`
--

INSERT INTO `tb_contact` (`contact_id`, `name`, `email`, `msg`) VALUES
(1, 'dinu', 'gnair23@gmail.com', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `tb_district`
--

CREATE TABLE IF NOT EXISTS `tb_district` (
  `district_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL,
  `district_name` varchar(45) NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tb_district`
--

INSERT INTO `tb_district` (`district_id`, `state_id`, `district_name`) VALUES
(14, 10, 'kottayam'),
(15, 10, 'Eranakulam'),
(16, 10, 'Kollam'),
(17, 10, 'Kollam'),
(18, 14, 'Chennai'),
(19, 14, 'Sellam'),
(20, 15, 'Bombay'),
(21, 15, 'Goa'),
(22, 15, 'Nagpur'),
(23, 10, 'Thrissur');

-- --------------------------------------------------------

--
-- Table structure for table `tb_faretime`
--

CREATE TABLE IF NOT EXISTS `tb_faretime` (
  `bus_id` int(11) DEFAULT NULL,
  `stop_id` int(11) DEFAULT NULL,
  `fare` int(11) DEFAULT NULL,
  `reachingtime` varchar(45) DEFAULT NULL,
  `faretime_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`faretime_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_faretime`
--

INSERT INTO `tb_faretime` (`bus_id`, `stop_id`, `fare`, `reachingtime`, `faretime_id`) VALUES
(14, 14, 6, '1', 6),
(14, 16, 10, '10', 7),
(14, 17, 20, '45 ', 8),
(14, 18, 45, '1.00', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gal_pics`
--

CREATE TABLE IF NOT EXISTS `tb_gal_pics` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `imgname` varchar(45) DEFAULT NULL,
  `src` varchar(45) DEFAULT NULL,
  `text` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_passenger`
--

CREATE TABLE IF NOT EXISTS `tb_passenger` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `bkdseats_id` int(11) DEFAULT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `seatno` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`passenger_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=71 ;

--
-- Dumping data for table `tb_passenger`
--

INSERT INTO `tb_passenger` (`passenger_id`, `bkdseats_id`, `reservation_id`, `name`, `seatno`, `gender`, `age`) VALUES
(54, 466, 49, 'sumith s nair', 'A1', 'male', '24'),
(55, 467, 50, 'dd', 'B1', 'male', '21'),
(56, 468, 50, 'rt', 'C1', 'male', '21'),
(57, 469, 50, 'dgh', 'A2', 'male', '32'),
(58, 471, 51, 'grsfs', 'C2', 'male', '21'),
(59, 472, 51, 'fh', 'D2', 'male', '23'),
(60, 473, 52, 'hjfh', 'D1', 'male', '23'),
(61, 474, 52, 'hdh', 'E1', 'female', '23'),
(62, 475, 52, 'dytd', 'H3', 'male', '23'),
(63, 476, 53, 'gggg', 'A3', 'female', '23'),
(64, 477, 53, 'ddd', 'B3', 'female', '34'),
(65, 478, 53, 'hhhh', 'A4', 'female', '23'),
(66, 479, 53, 'kkkk', 'B4', 'female', '45'),
(67, 480, 54, 'popy', 'K1', 'female', '34'),
(68, 481, 54, 'pop', 'K2', 'female', '65'),
(69, 482, 55, 'popy', 'K1', 'female', '34'),
(70, 483, 55, 'pop', 'K2', 'female', '65');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE IF NOT EXISTS `tb_payment` (
  `payment_id` int(11) NOT NULL,
  `reservation_id` int(11) DEFAULT NULL,
  `perseatfare` int(11) DEFAULT NULL,
  `totalamount` int(11) DEFAULT NULL,
  `accounno` int(11) DEFAULT NULL,
  `bankname` varchar(45) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `cardtype` varchar(45) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `nameoncard` varchar(45) DEFAULT NULL,
  `expirydate` varchar(45) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `payment_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_person`
--

CREATE TABLE IF NOT EXISTS `tb_person` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `person_name` varchar(45) NOT NULL,
  `person_emailid` varchar(45) NOT NULL,
  `person_password` varchar(45) NOT NULL,
  `person_gender` varchar(45) NOT NULL,
  `person_age` int(11) DEFAULT NULL,
  `person_address` varchar(45) DEFAULT NULL,
  `person_mobile1` int(11) DEFAULT NULL,
  `person_mobile2` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `person_regdate` varchar(45) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_person`
--

INSERT INTO `tb_person` (`person_id`, `person_name`, `person_emailid`, `person_password`, `person_gender`, `person_age`, `person_address`, `person_mobile1`, `person_mobile2`, `status`, `state_id`, `person_regdate`, `district_id`) VALUES
(1, 'sumith', 'snairsumith@gmail.com', 'sss', 'fj', 24, 'fghjk,', 2147483647, 2147483647, 'df', 16, '12', 12),
(2, 'ss', 'ds', '123', 'Male', 23, 'jgj', 2147483647, 2147483647, NULL, NULL, NULL, NULL),
(3, 'ss', 'ds', '123', 'Male', 23, 'jgj', 2147483647, 2147483647, NULL, NULL, NULL, NULL),
(4, 'AJITH ABRAHAM K', 'ds', '1', 'Male', 21, '222', 2147483647, 2147483647, NULL, NULL, NULL, NULL),
(5, 'dinu', 'dinu', 'dinu', 'Female', 24, 'hjhak\r\nkjjkk', 2147483647, 2147483647, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservation`
--

CREATE TABLE IF NOT EXISTS `tb_reservation` (
  `reservation_id` int(11) NOT NULL AUTO_INCREMENT,
  `res_date` varchar(45) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `flag` varchar(45) DEFAULT NULL,
  `prooftype` varchar(45) DEFAULT NULL,
  `noofseats` int(11) DEFAULT NULL,
  `idproofno` varchar(45) DEFAULT NULL,
  `mobile` int(11) DEFAULT NULL,
  `emailid` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `nameonid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`reservation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `tb_reservation`
--

INSERT INTO `tb_reservation` (`reservation_id`, `res_date`, `agent_id`, `flag`, `prooftype`, `noofseats`, `idproofno`, `mobile`, `emailid`, `address`, `nameonid`) VALUES
(47, '10/22/2013', 0, 'ok', 'voters', 1, 'dgd', 2147483647, 'snairsumith@gmail.com', 'gchd', 'sumith'),
(48, '10/22/2013', 0, 'ok', 'voters', 1, 'dgd', 2147483647, 'snairsumith@gmail.com', 'gchd', 'sumith'),
(49, '10/22/2013', 0, 'ok', 'voters', 1, 'dgd', 2147483647, 'snairsumith@gmail.com', 'gchd', 'sumith'),
(50, '10/22/2013', 0, 'ok', 'rdtyu', 3, 'dfgh', 987654321, 'snairsumith@gmail.com', 'hjf', 'rtyu'),
(51, '10/23/2013', 0, 'ok', 'jhvjvf', 2, 'jhfjf', 987654321, 'jff', 'ghcvjb', 'hfj'),
(52, '10/23/2013', 0, 'ok', 'fjkffj', 2, 'kf', 987654321, 'snairsumith@gmail.com', '', 'kf'),
(54, '10/24/2013', 0, 'ok', 'voters', 2, '567894', 2147483647, 'popy@gmail.com', 'hkmnjll kkghgg', 'popy'),
(55, '10/24/2013', 0, 'ok', 'voters', 2, '567894', 2147483647, 'popy@gmail.com', 'hkmnjll kkghgg', 'popy'),
(56, '10/24/2013', 7, 'success', 'Voters ID', 1234567, 'sumith', 2147483647, 'knl2517@gmail.com', 'Karipuzha House, Arayankavu', '4'),
(57, '10/24/2013', 7, 'success', 'Voters ID', 12345667, 'qwert', 2147483647, 'knl2517@gmail.com', 'Karipuzha House, Arayankavu', '4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_route`
--

CREATE TABLE IF NOT EXISTS `tb_route` (
  `route_id` int(11) NOT NULL AUTO_INCREMENT,
  `allocation_id` int(11) DEFAULT NULL,
  `route_startstop_id` int(11) NOT NULL,
  `route_endstop_id` int(11) DEFAULT NULL,
  `route_fare` int(11) NOT NULL,
  `route_starttime` varchar(45) NOT NULL,
  `route_endtime` varchar(45) NOT NULL,
  `route_runningtime` varchar(45) NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `tb_route`
--

INSERT INTO `tb_route` (`route_id`, `allocation_id`, `route_startstop_id`, `route_endstop_id`, `route_fare`, `route_starttime`, `route_endtime`, `route_runningtime`) VALUES
(15, 29, 14, 18, 45, '10.00', '12.00', '2.00'),
(16, 30, 18, 14, 45, '2.00', '4.00', '2.00'),
(17, 31, 21, 22, 45, '11.00', '3.00', '4'),
(18, 30, 22, 21, 60, '5', '9', '4'),
(20, 37, 18, 23, 30, '5', '7', '2'),
(21, 30, 17, 23, 50, '11.00', '2.00', '3'),
(22, 37, 14, 18, 56, '12.00', '2.00', '2'),
(23, 29, 18, 23, 45, '10', '11.30', '1.30'),
(24, 42, 18, 23, 45, '12', '12', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_seatlayout`
--

CREATE TABLE IF NOT EXISTS `tb_seatlayout` (
  `seatlayout_id` int(11) NOT NULL AUTO_INCREMENT,
  `seatlayout_name` varchar(45) DEFAULT NULL,
  `seatlayout_image` varchar(45) DEFAULT NULL,
  `seatlayout_file` varchar(45) DEFAULT NULL,
  `seatlayout_location` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`seatlayout_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_seatlayout`
--

INSERT INTO `tb_seatlayout` (`seatlayout_id`, `seatlayout_name`, `seatlayout_image`, `seatlayout_file`, `seatlayout_location`) VALUES
(8, '45 seater', '45 seater.png', '', 'layouts/'),
(9, '49 seater', '49 seater.png', '', 'layouts/');

-- --------------------------------------------------------

--
-- Table structure for table `tb_state`
--

CREATE TABLE IF NOT EXISTS `tb_state` (
  `state_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_state`
--

INSERT INTO `tb_state` (`state_id`, `state_name`) VALUES
(10, 'kerala'),
(12, 'Delhi'),
(14, 'Tamil nadu'),
(15, 'Maharashtra');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stop`
--

CREATE TABLE IF NOT EXISTS `tb_stop` (
  `stop_id` int(11) NOT NULL AUTO_INCREMENT,
  `stop_name` varchar(45) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `stop_rtostopid` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`stop_id`),
  KEY `state_id` (`state_id`),
  KEY `district_id` (`district_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tb_stop`
--

INSERT INTO `tb_stop` (`stop_id`, `stop_name`, `state_id`, `district_id`, `stop_rtostopid`) VALUES
(14, 'vaikom', 10, 14, '123'),
(15, 'thalayolaparabu', 10, 14, '124'),
(16, 'Phoothotta', 10, 15, '125'),
(17, 'Tripunithura', 10, 15, '126'),
(18, 'Vytilla', 10, 15, '125'),
(19, 'edapally', 10, 15, '12'),
(20, 'che', 14, 18, '5'),
(21, 'Thane', 15, 20, '1255'),
(22, 'Kalyan', 15, 20, '1254'),
(23, 'kodungallur', 10, 23, '1258');

-- --------------------------------------------------------

--
-- Table structure for table `tb_testimonials`
--

CREATE TABLE IF NOT EXISTS `tb_testimonials` (
  `testimonial_id` int(11) NOT NULL AUTO_INCREMENT,
  `testimonial_text` varchar(200) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL,
  `flag` int(1) unsigned DEFAULT '0',
  PRIMARY KEY (`testimonial_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_all`
--
CREATE TABLE IF NOT EXISTS `view_all` (
`allocation_id` int(11)
,`bus_id` int(11)
,`bus_modelname` varchar(45)
,`bus_regno` varchar(45)
,`bustype_name` varchar(45)
,`movie` varchar(1)
,`water` varchar(1)
,`charger` varchar(1)
,`blanket` varchar(1)
,`seatlayout_name` varchar(45)
,`bus_totalseats` int(11)
,`route_startstop_id` int(11)
,`route_endstop_id` int(11)
,`route_starttime` varchar(45)
,`route_endtime` varchar(45)
,`route_runningtime` varchar(45)
,`route_fare` int(11)
,`startingstop` varchar(45)
,`startingdistrict` varchar(45)
,`startingstate` varchar(45)
,`endingstop` varchar(45)
,`endingdistrict` varchar(45)
,`endingstate` varchar(45)
,`allocation_date` varchar(45)
,`route_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_finalticket`
--
CREATE TABLE IF NOT EXISTS `view_finalticket` (
`startingstop` varchar(45)
,`endingstop` varchar(45)
,`reservation_id` int(11)
,`res_date` varchar(45)
,`prooftype` varchar(45)
,`noofseats` int(11)
,`mobile` int(11)
,`name` varchar(45)
,`seatno` varchar(45)
,`gender` varchar(45)
,`age` varchar(45)
,`date` varchar(45)
,`allocation_name` varchar(45)
,`bus_regno` varchar(45)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_list`
--
CREATE TABLE IF NOT EXISTS `view_list` (
`allocation_id` int(11)
,`allocation_name` varchar(45)
,`conductor_name` varchar(45)
,`conductor_un` varchar(45)
,`conductor_pwd` varchar(45)
,`seatno` varchar(45)
,`route_id` int(11)
,`route_startstop_id` int(11)
,`route_endstop_id` int(11)
,`bkdseats_id` int(11)
,`passenger_id` int(11)
,`name` varchar(45)
,`gender` varchar(45)
,`age` varchar(45)
,`date` varchar(45)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_reserve`
--
CREATE TABLE IF NOT EXISTS `view_reserve` (
`allocation_date` varchar(45)
,`bus_id` int(11)
,`conductor_id` int(11)
,`name` varchar(45)
,`noofseats` int(11)
,`emailid` varchar(45)
,`reservation_id` int(11)
,`mobile` int(11)
,`idproofno` varchar(45)
,`seatno` varchar(45)
,`conductor_name` varchar(45)
,`conductor_un` varchar(45)
,`conductor_pwd` varchar(45)
,`bus_regno` varchar(45)
,`res_date` varchar(45)
,`prooftype` varchar(45)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_search`
--
CREATE TABLE IF NOT EXISTS `view_search` (
`allocation_id` int(11)
,`allocation_name` varchar(45)
,`conductor_un` varchar(45)
,`conductor_pwd` varchar(45)
,`date` varchar(45)
,`seatno` varchar(45)
,`route_id` int(11)
,`route_startstop_id` int(11)
,`route_endstop_id` int(11)
,`bkdseats_id` int(11)
,`passenger_id` int(11)
,`name` varchar(45)
,`gender` varchar(45)
,`age` varchar(45)
,`conductor_name` varchar(45)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_seats`
--
CREATE TABLE IF NOT EXISTS `view_seats` (
`allocation_id` int(11)
,`allocation_name` varchar(45)
,`bus_id` int(11)
,`seatlayout_id` int(11)
,`seatlayout_name` varchar(45)
,`seatlayout_image` varchar(45)
,`seatlayout_file` varchar(45)
,`date` varchar(45)
,`seatno` varchar(45)
,`route_id` int(11)
,`bkdseats_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_test`
--
CREATE TABLE IF NOT EXISTS `view_test` (
`route_starttime` varchar(45)
,`route_endtime` varchar(45)
,`route_fare` int(11)
,`startingstop` varchar(45)
,`endingstop` varchar(45)
,`reservation_id` int(11)
,`res_date` varchar(45)
,`prooftype` varchar(45)
,`noofseats` int(11)
,`mobile` int(11)
,`name` varchar(45)
,`seatno` varchar(45)
,`gender` varchar(45)
,`age` varchar(45)
,`date` varchar(45)
,`allocation_name` varchar(45)
,`bus_regno` varchar(45)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ticket1`
--
CREATE TABLE IF NOT EXISTS `view_ticket1` (
`reservation_id` int(11)
,`res_date` varchar(45)
,`prooftype` varchar(45)
,`noofseats` int(11)
,`mobile` int(11)
,`name` varchar(45)
,`seatno` varchar(45)
,`gender` varchar(45)
,`age` varchar(45)
,`date` varchar(45)
,`allocation_id` int(45)
,`allocation_name` varchar(45)
,`bus_regno` varchar(45)
,`route_id` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `view_all`
--
DROP TABLE IF EXISTS `view_all`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all` AS (select `tb_allocation`.`allocation_id` AS `allocation_id`,`tb_allocation`.`bus_id` AS `bus_id`,`tb_bus`.`bus_modelname` AS `bus_modelname`,`tb_bus`.`bus_regno` AS `bus_regno`,`tb_bustype`.`bustype_name` AS `bustype_name`,`tb_bustype`.`movie` AS `movie`,`tb_bustype`.`water` AS `water`,`tb_bustype`.`charger` AS `charger`,`tb_bustype`.`blanket` AS `blanket`,`tb_seatlayout`.`seatlayout_name` AS `seatlayout_name`,`tb_bus`.`bus_totalseats` AS `bus_totalseats`,`tb_route`.`route_startstop_id` AS `route_startstop_id`,`tb_route`.`route_endstop_id` AS `route_endstop_id`,`tb_route`.`route_starttime` AS `route_starttime`,`tb_route`.`route_endtime` AS `route_endtime`,`tb_route`.`route_runningtime` AS `route_runningtime`,`tb_route`.`route_fare` AS `route_fare`,`tb_stop`.`stop_name` AS `startingstop`,`tb_district`.`district_name` AS `startingdistrict`,`tb_state`.`state_name` AS `startingstate`,`tb_stop_1`.`stop_name` AS `endingstop`,`tb_district_1`.`district_name` AS `endingdistrict`,`tb_state_1`.`state_name` AS `endingstate`,`tb_allocationdates`.`allocation_date` AS `allocation_date`,`tb_route`.`route_id` AS `route_id` from (((((((((((`tb_allocationdates` join `tb_allocation` on((`tb_allocationdates`.`allocation_id` = `tb_allocation`.`allocation_id`))) join `tb_bustype` on((`tb_allocation`.`bustype_id` = `tb_bustype`.`bustype_id`))) join `tb_seatlayout` on((`tb_allocation`.`seatlayout_id` = `tb_seatlayout`.`seatlayout_id`))) join `tb_bus` on((`tb_allocation`.`bus_id` = `tb_bus`.`bus_id`))) join `tb_route` on((`tb_route`.`allocation_id` = `tb_allocation`.`allocation_id`))) join `tb_stop` on((`tb_route`.`route_startstop_id` = `tb_stop`.`stop_id`))) join `tb_stop` `tb_stop_1` on((`tb_route`.`route_endstop_id` = `tb_stop_1`.`stop_id`))) join `tb_state` on((`tb_stop`.`state_id` = `tb_state`.`state_id`))) join `tb_district` on((`tb_stop`.`district_id` = `tb_district`.`district_id`))) join `tb_state` `tb_state_1` on((`tb_stop_1`.`state_id` = `tb_state_1`.`state_id`))) join `tb_district` `tb_district_1` on((`tb_stop_1`.`district_id` = `tb_district_1`.`district_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_finalticket`
--
DROP TABLE IF EXISTS `view_finalticket`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_finalticket` AS (select distinct `view_all`.`startingstop` AS `startingstop`,`view_all`.`endingstop` AS `endingstop`,`view_ticket1`.`reservation_id` AS `reservation_id`,`view_ticket1`.`res_date` AS `res_date`,`view_ticket1`.`prooftype` AS `prooftype`,`view_ticket1`.`noofseats` AS `noofseats`,`view_ticket1`.`mobile` AS `mobile`,`view_ticket1`.`name` AS `name`,`view_ticket1`.`seatno` AS `seatno`,`view_ticket1`.`gender` AS `gender`,`view_ticket1`.`age` AS `age`,`view_ticket1`.`date` AS `date`,`view_ticket1`.`allocation_name` AS `allocation_name`,`view_ticket1`.`bus_regno` AS `bus_regno` from (`view_ticket1` join `view_all` on((`view_ticket1`.`route_id` = `view_all`.`route_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_list`
--
DROP TABLE IF EXISTS `view_list`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_list` AS (select `tb_allocation`.`allocation_id` AS `allocation_id`,`tb_allocation`.`allocation_name` AS `allocation_name`,`tb_conductor`.`conductor_name` AS `conductor_name`,`tb_conductor`.`conductor_un` AS `conductor_un`,`tb_conductor`.`conductor_pwd` AS `conductor_pwd`,`tb_bkdseats`.`seatno` AS `seatno`,`tb_bkdseats`.`route_id` AS `route_id`,`tb_route`.`route_startstop_id` AS `route_startstop_id`,`tb_route`.`route_endstop_id` AS `route_endstop_id`,`tb_passenger`.`bkdseats_id` AS `bkdseats_id`,`tb_passenger`.`passenger_id` AS `passenger_id`,`tb_passenger`.`name` AS `name`,`tb_passenger`.`gender` AS `gender`,`tb_passenger`.`age` AS `age`,`tb_bkdseats`.`date` AS `date` from ((((`tb_allocation` join `tb_conductor` on((`tb_allocation`.`conductor_id` = `tb_conductor`.`conductor_id`))) join `tb_bkdseats` on((`tb_bkdseats`.`allocation_id` = `tb_allocation`.`allocation_id`))) join `tb_route` on((`tb_route`.`route_id` = `tb_bkdseats`.`route_id`))) join `tb_passenger` on((`tb_passenger`.`bkdseats_id` = `tb_bkdseats`.`bkdseats_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_reserve`
--
DROP TABLE IF EXISTS `view_reserve`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reserve` AS select `tb_allocationdates`.`allocation_date` AS `allocation_date`,`tb_allocation`.`bus_id` AS `bus_id`,`tb_allocation`.`conductor_id` AS `conductor_id`,`tb_passenger`.`name` AS `name`,`tb_reservation`.`noofseats` AS `noofseats`,`tb_reservation`.`emailid` AS `emailid`,`tb_reservation`.`reservation_id` AS `reservation_id`,`tb_reservation`.`mobile` AS `mobile`,`tb_reservation`.`idproofno` AS `idproofno`,`tb_passenger`.`seatno` AS `seatno`,`tb_conductor`.`conductor_name` AS `conductor_name`,`tb_conductor`.`conductor_un` AS `conductor_un`,`tb_conductor`.`conductor_pwd` AS `conductor_pwd`,`tb_bus`.`bus_regno` AS `bus_regno`,`tb_reservation`.`res_date` AS `res_date`,`tb_reservation`.`prooftype` AS `prooftype` from ((((`tb_allocation` join `tb_allocationdates` on((`tb_allocation`.`allocation_id` = `tb_allocationdates`.`allocation_id`))) join `tb_bus` on((`tb_allocation`.`bus_id` = `tb_bus`.`bus_id`))) join `tb_conductor` on((`tb_allocation`.`conductor_id` = `tb_conductor`.`conductor_id`))) join (`tb_reservation` join `tb_passenger` on((`tb_reservation`.`reservation_id` = `tb_passenger`.`reservation_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_search`
--
DROP TABLE IF EXISTS `view_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_search` AS (select `tb_allocation`.`allocation_id` AS `allocation_id`,`tb_allocation`.`allocation_name` AS `allocation_name`,`tb_conductor`.`conductor_un` AS `conductor_un`,`tb_conductor`.`conductor_pwd` AS `conductor_pwd`,`tb_bkdseats`.`date` AS `date`,`tb_bkdseats`.`seatno` AS `seatno`,`tb_bkdseats`.`route_id` AS `route_id`,`tb_route`.`route_startstop_id` AS `route_startstop_id`,`tb_route`.`route_endstop_id` AS `route_endstop_id`,`tb_passenger`.`bkdseats_id` AS `bkdseats_id`,`tb_passenger`.`passenger_id` AS `passenger_id`,`tb_passenger`.`name` AS `name`,`tb_passenger`.`gender` AS `gender`,`tb_passenger`.`age` AS `age`,`tb_conductor`.`conductor_name` AS `conductor_name` from ((((`tb_allocation` join `tb_conductor` on((`tb_allocation`.`conductor_id` = `tb_conductor`.`conductor_id`))) join `tb_bkdseats` on((`tb_bkdseats`.`allocation_id` = `tb_allocation`.`allocation_id`))) join `tb_route` on((`tb_route`.`route_id` = `tb_bkdseats`.`route_id`))) join `tb_passenger` on((`tb_passenger`.`bkdseats_id` = `tb_bkdseats`.`bkdseats_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_seats`
--
DROP TABLE IF EXISTS `view_seats`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_seats` AS (select `tb_allocation`.`allocation_id` AS `allocation_id`,`tb_allocation`.`allocation_name` AS `allocation_name`,`tb_allocation`.`bus_id` AS `bus_id`,`tb_seatlayout`.`seatlayout_id` AS `seatlayout_id`,`tb_seatlayout`.`seatlayout_name` AS `seatlayout_name`,`tb_seatlayout`.`seatlayout_image` AS `seatlayout_image`,`tb_seatlayout`.`seatlayout_file` AS `seatlayout_file`,`tb_bkdseats`.`date` AS `date`,`tb_bkdseats`.`seatno` AS `seatno`,`tb_bkdseats`.`route_id` AS `route_id`,`tb_bkdseats`.`bkdseats_id` AS `bkdseats_id` from ((`tb_allocation` join `tb_seatlayout` on((`tb_allocation`.`seatlayout_id` = `tb_seatlayout`.`seatlayout_id`))) join `tb_bkdseats` on((`tb_bkdseats`.`allocation_id` = `tb_allocation`.`allocation_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_test`
--
DROP TABLE IF EXISTS `view_test`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_test` AS (select distinct `view_all`.`route_starttime` AS `route_starttime`,`view_all`.`route_endtime` AS `route_endtime`,`view_all`.`route_fare` AS `route_fare`,`view_all`.`startingstop` AS `startingstop`,`view_all`.`endingstop` AS `endingstop`,`view_ticket1`.`reservation_id` AS `reservation_id`,`view_ticket1`.`res_date` AS `res_date`,`view_ticket1`.`prooftype` AS `prooftype`,`view_ticket1`.`noofseats` AS `noofseats`,`view_ticket1`.`mobile` AS `mobile`,`view_ticket1`.`name` AS `name`,`view_ticket1`.`seatno` AS `seatno`,`view_ticket1`.`gender` AS `gender`,`view_ticket1`.`age` AS `age`,`view_ticket1`.`date` AS `date`,`view_ticket1`.`allocation_name` AS `allocation_name`,`view_ticket1`.`bus_regno` AS `bus_regno` from (`view_all` join `view_ticket1` on((`view_all`.`route_id` = `view_ticket1`.`route_id`))));

-- --------------------------------------------------------

--
-- Structure for view `view_ticket1`
--
DROP TABLE IF EXISTS `view_ticket1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ticket1` AS (select `tb_reservation`.`reservation_id` AS `reservation_id`,`tb_reservation`.`res_date` AS `res_date`,`tb_reservation`.`prooftype` AS `prooftype`,`tb_reservation`.`noofseats` AS `noofseats`,`tb_reservation`.`mobile` AS `mobile`,`tb_passenger`.`name` AS `name`,`tb_passenger`.`seatno` AS `seatno`,`tb_passenger`.`gender` AS `gender`,`tb_passenger`.`age` AS `age`,`tb_bkdseats`.`date` AS `date`,`tb_bkdseats`.`allocation_id` AS `allocation_id`,`tb_allocation`.`allocation_name` AS `allocation_name`,`tb_bus`.`bus_regno` AS `bus_regno`,`tb_bkdseats`.`route_id` AS `route_id` from ((((`tb_passenger` join `tb_reservation` on((`tb_passenger`.`reservation_id` = `tb_reservation`.`reservation_id`))) join `tb_bkdseats` on((`tb_passenger`.`bkdseats_id` = `tb_bkdseats`.`bkdseats_id`))) join `tb_allocation` on((`tb_bkdseats`.`allocation_id` = `tb_allocation`.`allocation_id`))) join `tb_bus` on((`tb_allocation`.`bus_id` = `tb_bus`.`bus_id`))));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_district`
--
ALTER TABLE `tb_district`
  ADD CONSTRAINT `tb_district_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tb_state` (`state_id`);

--
-- Constraints for table `tb_stop`
--
ALTER TABLE `tb_stop`
  ADD CONSTRAINT `tb_stop_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `tb_state` (`state_id`),
  ADD CONSTRAINT `tb_stop_ibfk_2` FOREIGN KEY (`district_id`) REFERENCES `tb_district` (`district_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
