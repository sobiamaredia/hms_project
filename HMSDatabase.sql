-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2018 at 01:52 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bookingID` int(11) NOT NULL AUTO_INCREMENT,
  `reservationID` int(11) NOT NULL,
  `roomID` int(11) NOT NULL,
  PRIMARY KEY (`bookingID`),
  KEY `fk_reservation_id_idx` (`reservationID`),
  KEY `fk_room_id_idx` (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingID`, `reservationID`, `roomID`) VALUES
(4, 2, 1),
(5, 2, 5),
(6, 3, 3),
(7, 3, 4),
(8, 4, 6),
(19, 1, 4),
(20, 1, 6),
(21, 7, 1),
(22, 7, 2),
(25, 9, 3),
(26, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('081p7fl1efljojupre1l085nirv484vk', '::1', 1528071294, '__ci_last_regenerate|i:1528070446;form_id|N;'),
('09lbc5phqt3gg5f7h1gfsmme2ku22s8e', '::1', 1528059157, '__ci_last_regenerate|i:1528058950;form_id|N;'),
('1sf00tdl0uptp8bk1t01k28jk4hbk56p', '::1', 1528007883, '__ci_last_regenerate|i:1528007653;'),
('44fjh5q5nhesgi8eqj853fpvmlt43l58', '::1', 1528058918, '__ci_last_regenerate|i:1528058647;form_id|N;'),
('4bnaa2t1cu9ibtmecfoo89f57ch7quf1', '::1', 1528002988, '__ci_last_regenerate|i:1528002728;'),
('4lhbs6kc29cs3l1ot5q77507id3un30b', '::1', 1528003258, '__ci_last_regenerate|i:1528003088;'),
('4mnm5initdm17knosekf9ti6eu919329', '::1', 1528003824, '__ci_last_regenerate|i:1528003572;'),
('4pmr96lu8p3lhgs5k2jh4scq7jh7lfvi', '::1', 1528000693, '__ci_last_regenerate|i:1528000402;'),
('5n2ebapvqmrf54cmuv0r9vp6ahntfeau', '::1', 1528052635, '__ci_last_regenerate|i:1528052578;form_id|N;'),
('5ofaclh19l7nhj8msvi7pl84cadecdtu', '::1', 1528164602, '__ci_last_regenerate|i:1528164454;form_id|N;'),
('5s1nmh1q5pl53nc699mgtmjj1l9u9toa', '::1', 1528122320, '__ci_last_regenerate|i:1528122320;'),
('5usfssptkn5cqoif1focbftb7f4cmndi', '::1', 1528123952, '__ci_last_regenerate|i:1528123652;form_id|N;'),
('6n40h7mihp0573i77g4v1hg2d0u0ts3k', '::1', 1528166162, '__ci_last_regenerate|i:1528166049;form_id|N;'),
('6v2kqm8p875b8brpkhhatr7lejrrfc93', '::1', 1528126772, '__ci_last_regenerate|i:1528126732;form_id|N;'),
('7cr8ph7pfssmmb95e49sm4g1u8ffhlp5', '::1', 1528007440, '__ci_last_regenerate|i:1528007091;'),
('7k5pu4a66a156v43sp1isnpuldqo0ohe', '::1', 1528054329, '__ci_last_regenerate|i:1528054113;form_id|N;'),
('7l66b1ackitv2985g9upqsktea97ci4r', '::1', 1528124616, '__ci_last_regenerate|i:1528124516;form_id|N;'),
('7q5ppbc0b0ric2f6k27rvcc1ijn2q7k3', '::1', 1528066071, '__ci_last_regenerate|i:1528066071;form_id|N;'),
('81783au3momqu18b6ifsa88bp6grtr6g', '::1', 1528006101, '__ci_last_regenerate|i:1528005829;'),
('829fdgj1l4769vo7oioqn7m4afo46uas', '::1', 1528004538, '__ci_last_regenerate|i:1528004248;'),
('8393sq7eptibk5tud2qgfj6qepf9jaue', '::1', 1528166001, '__ci_last_regenerate|i:1528165721;form_id|N;'),
('8ch3fk6ij98idg2cu35jtkbun1g70ovb', '::1', 1528082955, '__ci_last_regenerate|i:1528082952;'),
('8mj7n461thedad439khujg2a7t541b97', '::1', 1528126039, '__ci_last_regenerate|i:1528126037;form_id|N;'),
('8pl47inuq0cg8ufuagfhn1qnnon340d2', '::1', 1528004114, '__ci_last_regenerate|i:1528003884;'),
('9ta5e9d0rlgu5rdcv3t9euhhp23ncb3r', '::1', 1528081003, '__ci_last_regenerate|i:1528080583;'),
('a1luk32ts1mjgi016du8gufag9jd7mcb', '::1', 1528072010, '__ci_last_regenerate|i:1528071716;form_id|N;'),
('ahhh21go6vck08anugdpovhu1rgcf2ro', '::1', 1528125551, '__ci_last_regenerate|i:1528125238;form_id|N;'),
('at6ldigsb2ffkbof1cjd4ni3h5h2c28q', '::1', 1528125885, '__ci_last_regenerate|i:1528125608;form_id|N;'),
('b0l0kt0vheegpauo4k2t61jj8mi2jgun', '::1', 1528000959, '__ci_last_regenerate|i:1528000712;'),
('b65eivj8hclatln5rdeo66aqf4fkbd85', '::1', 1528166387, '__ci_last_regenerate|i:1528166383;form_id|N;'),
('bauj16somsq2fh8bhho8a5q9g8qh7gju', '::1', 1528057865, '__ci_last_regenerate|i:1528057668;form_id|N;'),
('c7h036spbb71h6krb06oc9b0u13ao59g', '::1', 1528072710, '__ci_last_regenerate|i:1528072493;form_id|N;'),
('cbt921ic1ji3pv5rc1mal26e1amddis6', '::1', 1528006731, '__ci_last_regenerate|i:1528006452;'),
('cs825mma6iagk800s7l0025sa39b9oik', '::1', 1528047572, '__ci_last_regenerate|i:1528047276;form_id|N;'),
('dua994s40os43dudv21096mb5s61arrs', '::1', 1528054974, '__ci_last_regenerate|i:1528054898;form_id|N;'),
('dukre0li2muerf94mv03hme9sqgksk7c', '::1', 1528069913, '__ci_last_regenerate|i:1528069747;form_id|N;'),
('eog3f2u1p0cl58skf3qct347fmp8iuhh', '::1', 1528163727, '__ci_last_regenerate|i:1528163467;form_id|N;'),
('fbvlrk3kro72p5c5mtj791nf5gsabmt5', '::1', 1528000388, '__ci_last_regenerate|i:1528000094;'),
('gtnek12333bn1rvqjp4648uaj28alfe5', '::1', 1528052460, '__ci_last_regenerate|i:1528052161;form_id|N;'),
('heknd9o1g7op1h4pbk7iklca34ohicbm', '::1', 1528065359, '__ci_last_regenerate|i:1528065112;form_id|N;'),
('hmqui7n6e9eu2absucp7ph2n24b190u4', '::1', 1528045751, '__ci_last_regenerate|i:1528045710;'),
('i360i8mqngatkhlj3dgqfbhop5101ucp', '::1', 1528055495, '__ci_last_regenerate|i:1528055217;form_id|N;'),
('i3cbt11hpr1gl082vdufdh2igbpv34vg', '::1', 1528055837, '__ci_last_regenerate|i:1528055543;form_id|N;'),
('igaupiprfsaumim4as5uk0m5tk8b5a6m', '::1', 1528126608, '__ci_last_regenerate|i:1528126361;form_id|N;'),
('ihkquntmjc1ep3ckpk45jc1rrd966od6', '::1', 1528056631, '__ci_last_regenerate|i:1528056535;form_id|N;'),
('ipd85qf37h0alm6feq2ft4ppv1n547dc', '::1', 1528006370, '__ci_last_regenerate|i:1528006134;'),
('k88sra34ipfkf4fhgfnkmaanojn4hgpn', '::1', 1528057617, '__ci_last_regenerate|i:1528057341;form_id|N;'),
('kn94ja61g0vcbrr78cde5osatfg25c90', '::1', 1528219710, '__ci_last_regenerate|i:1528219631;form_id|N;'),
('knofjpu339ear2j75ojkjth2af16jhbg', '::1', 1528065822, '__ci_last_regenerate|i:1528065760;form_id|N;'),
('kp3hl6tlmjdq9cn5kfa0noavhg3phmm6', '::1', 1528124100, '__ci_last_regenerate|i:1528123956;form_id|N;'),
('l8pj94ugbittrskd0rl11oa11mfpkhls', '::1', 1528123420, '__ci_last_regenerate|i:1528123344;'),
('l9567vjftri7s5p2iidfar0a1hpo6skq', '::1', 1528081755, '__ci_last_regenerate|i:1528081520;'),
('lcg88np3lacu1bd69tj7joej2rej22sf', '::1', 1528056305, '__ci_last_regenerate|i:1528056069;form_id|N;'),
('m450oncgs6mepc70a91jjalga2efnm69', '::1', 1528001474, '__ci_last_regenerate|i:1528001174;'),
('m9ujpp60v46oqooseilcljg8a062khfu', '::1', 1528001515, '__ci_last_regenerate|i:1528001475;'),
('n1qqj95dnv50db28lo4rqnjsdb74oc2r', '::1', 1528082459, '__ci_last_regenerate|i:1528082162;'),
('n4t2m6t683uor8n7d6n33o1sjjcl9l8p', '::1', 1528069398, '__ci_last_regenerate|i:1528069101;form_id|N;'),
('o9c21njoukv0jpcp6rs9md1jb240isr8', '::1', 1528069687, '__ci_last_regenerate|i:1528069411;form_id|N;'),
('ou7j96gl73l6te22s2nn99dcg398n101', '::1', 1528071456, '__ci_last_regenerate|i:1528071304;form_id|N;'),
('pghc7aqn3gj70vp3j7pei62mbkn6p47v', '::1', 1528165157, '__ci_last_regenerate|i:1528164898;form_id|N;'),
('pll2t92thpc1kuc02h4p9d25sj0guf2s', '::1', 1528072445, '__ci_last_regenerate|i:1528072173;form_id|N;'),
('qjaa097g7alfctnshhjj3nrt0fb1v60f', '::1', 1528069044, '__ci_last_regenerate|i:1528068768;form_id|N;'),
('qlnu36al8kqrmk29eefblic5u12q7kqp', '::1', 1528065745, '__ci_last_regenerate|i:1528065454;form_id|N;'),
('qtandtcndl8gu7lnnfnsd1a2calhm32h', '::1', 1528131711, '__ci_last_regenerate|i:1528131703;form_id|N;'),
('r0k1s7sog862o3g6e7djkjrriu07jvgn', '::1', 1528047581, '__ci_last_regenerate|i:1528047580;form_id|N;'),
('rdl16831sv2b7c7r6mbt04eegkvsdmgc', '::1', 1528004843, '__ci_last_regenerate|i:1528004585;'),
('s8m0ig850r736ebab7r66j3nqveauv86', '::1', 1528007051, '__ci_last_regenerate|i:1528006777;'),
('slm5dbbvg8i41ckea3fi3gpf7vg5iilk', '::1', 1528058381, '__ci_last_regenerate|i:1528058171;form_id|N;'),
('snr57kh0odcu0cud610mkd7ur64a6k3k', '::1', 1528005700, '__ci_last_regenerate|i:1528005413;'),
('tg3p6otf7ufvb45uur04a0jnkbarrejm', '::1', 1528072818, '__ci_last_regenerate|i:1528072797;form_id|N;'),
('tgeou3l6k7tgjq45t9hm9bdnopredc1n', '::1', 1528005121, '__ci_last_regenerate|i:1528004899;'),
('tjuqc86ictrifukdqgev2rg9l6m5eks0', '::1', 1528081479, '__ci_last_regenerate|i:1528081206;'),
('vnmls8niucsc6et9ok3ok5u30s9hp5bv', '::1', 1528123341, '__ci_last_regenerate|i:1528123043;');

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

DROP TABLE IF EXISTS `guests`;
CREATE TABLE IF NOT EXISTS `guests` (
  `guestID` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) NOT NULL,
  `lastName` varchar(45) NOT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `address` text NOT NULL,
  `phoneNo` varchar(45) NOT NULL,
  PRIMARY KEY (`guestID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guestID`, `firstName`, `lastName`, `emailAddress`, `address`, `phoneNo`) VALUES
(1, 'Sobia', 'Maredia', 'sobia.syed.ali@gmail.com', 'North York', '895-895-6985'),
(2, 'Salman', 'Maredia', 'salmanaly1492@gmail.com', '60 Pavane, North York, Canada', '437-995-9167');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `reservationID` int(11) NOT NULL AUTO_INCREMENT,
  `guestID` int(11) NOT NULL,
  `checkinDate` date NOT NULL,
  `checkoutDate` date NOT NULL,
  `specialRequest` text,
  `noOfGuests` int(11) NOT NULL DEFAULT '1',
  `reservationIsCancelled` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reservationID`),
  KEY `fk_guest_id_idx` (`guestID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservationID`, `guestID`, `checkinDate`, `checkoutDate`, `specialRequest`, `noOfGuests`, `reservationIsCancelled`) VALUES
(1, 1, '2018-06-04', '2018-06-07', 'Birthday Cake', 4, 1),
(2, 1, '2018-06-06', '2018-06-08', '1212', 3, 1),
(3, 1, '2018-06-08', '2018-06-11', '2112131', 1212, 1),
(4, 2, '2018-06-19', '2018-06-21', 'abcd', 2, 1),
(7, 1, '2018-06-01', '2018-06-05', 'jhugytfrd', 4, 0),
(9, 2, '2018-06-06', '2018-06-10', 'dfhjjhgf', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `roomID` int(11) NOT NULL AUTO_INCREMENT,
  `roomNumber` int(11) NOT NULL,
  `roomType` varchar(45) NOT NULL,
  `bookingStatus` enum('Booked','Available') DEFAULT 'Available',
  PRIMARY KEY (`roomID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`roomID`, `roomNumber`, `roomType`, `bookingStatus`) VALUES
(1, 101, 'Duplex', 'Available'),
(2, 102, 'Single', 'Available'),
(3, 103, 'Double', 'Available'),
(4, 104, 'Duplex', 'Available'),
(5, 105, 'Queen', 'Available'),
(6, 201, 'King', 'Available');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `fk_reservation_id` FOREIGN KEY (`reservationID`) REFERENCES `reservation` (`reservationID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_room_id` FOREIGN KEY (`roomID`) REFERENCES `rooms` (`roomID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_guest_id` FOREIGN KEY (`guestID`) REFERENCES `guests` (`guestID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
