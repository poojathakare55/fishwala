-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Nov 18, 2016 at 05:28 PM
-- Server version: 5.5.39-36.0-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fishwqrb_fish`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`fishwqrb`@`localhost` FUNCTION `alphanum`( str CHAR(32) ) RETURNS char(16) CHARSET latin1
BEGIN 
  DECLARE i, len SMALLINT DEFAULT 1; 
  DECLARE ret CHAR(32) DEFAULT ''; 
  DECLARE c CHAR(1); 
  SET len = CHAR_LENGTH( str ); 
  REPEAT 
    BEGIN 
      SET c = MID( str, i, 1 ); 
      IF c REGEXP '[[:alnum:]]' THEN 
        SET ret=CONCAT(ret,c); 
      END IF; 
      SET i = i + 1; 
    END; 
  UNTIL i > len END REPEAT; 
  RETURN ret; 
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` longblob,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `photo`, `category_name`) VALUES
(29, 0x6f6365616e372e706e67, 'Shellfish'),
(30, 0x73656131372e706e67, 'Freshwater'),
(31, 0x616e696d616c3136352e706e67, 'Seawater Fish');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `emailid` varchar(45) DEFAULT NULL,
  `password` text,
  `forget_password` varchar(100) DEFAULT NULL,
  `address` text,
  `pincode` bigint(20) DEFAULT NULL,
  `contactno` bigint(20) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  `facebookid` text,
  `googleid` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `emailid`, `password`, `forget_password`, `address`, `pincode`, `contactno`, `dob`, `open`, `facebookid`, `googleid`) VALUES
(17, 'Richard Fernandes', 'rf3777@gmail.com', '468de9ed4e4acfa387e1e6d29a122759', 'fish1234', '001, Jayant Krupa CHS, Plot F-66, Sector 9, Airoli,', 400708, 9820933993, '1971-05-01', 1, NULL, NULL),
(26, 'aieou', 'aieou94@yahoo.in', '66e9567b56f873701d72725840a0d47a', '8767811771', 'builder', 400708, 400708, '0000-00-00', 1, NULL, NULL),
(27, 'aieou', 'rtated94@yahoo.in', '66e9567b56f873701d72725840a0d47a', '8767811771', 'builder', 400708, 400708, '0000-00-00', 1, NULL, NULL),
(28, 'hemant', 'hemantpatil1926@gmail.com', 'c2556e44c5976fa2b51c5efce4e8ba11', 'hemant1926', 'test ', 123456, 1234621132121321, '1988-02-19', 1, NULL, NULL),
(29, 'Mayur', 'mayur.madhavi93@gmail.com', 'c4f4b2eb6d63dd4dd8afed001c61c956', 'mayur', 'Airoli', 400708, 9769220654, '1993-12-15', 1, NULL, NULL),
(30, 'PRAMOD SAWANT', 'pradosawant@gmail.com', 'f87e41e2a10a7dbf8025f70463b6234d', 'pramodsawant', 'AL-5/21/16,shiv vaibhav apt sec-16,airoli', 400708, 9224423377, '1985-09-02', 1, NULL, NULL),
(32, 'Mahesh', 'mahesh123@gmail.com', '167784d36ab99e49738fe6a6a98798b7', 'abhi123', 'Airoli', 876654, 9521453533, '2005-02-09', 1, NULL, NULL),
(33, 'omkar kambli', 'okambli858@gmail.com', '5421af69dafe70b524dfdddfdc107d2d', 'om27600672', 'airoli sec 15 A 53/13 ameya chs navi mumbai ', 400708, 8097500727, '1991-05-21', 1, NULL, NULL),
(34, 'jatin sawant', 'jatinsawant24@gmail.com', 'e4f5b4bc8c5843c07bb7d6d3ac7d862e', 'bliss@777', 'sai dhara apt sec 9 flat no 105 diwa goan airoli navi Mumbai', 400708, 7738394028, '1998-05-16', 1, NULL, NULL),
(37, 'sudhir kumar manocha', 'manochamotorsfbd@gmail.com', '9034e97368210f20c262f9b618e6de9d', 'atoz', '1F-110 N I T FARIDABAD', 121001, 9811116753, '0000-00-00', 1, NULL, NULL),
(38, 'Abhay Jain', 'rajasthanpropertybazar@gmail.com', '202cb962ac59075b964b07152d234b70', '123', '18, Hilton Tower, Sher-e-punjab, Andheri E', 400093, 9821742751, '0000-00-00', 1, NULL, NULL),
(39, 'manu nair', 'manunair11@gmail.com', 'eb9d19157984fe3376c38d99307e3b84', 'Superman11', '1401,block C,hazel,tharwani rosewood heights,plot 270 ,sector 10 , kharghar 410210,navi mumbai', 410210, 7560871124, '1982-09-11', 1, NULL, NULL),
(40, 'Ankur Biswas', 'ankur.cosmic@gmail.com', 'a30d8b0a5e99068d60bd56ea24001943', 'NewPass#1', 'Shree Ganesh Towers, Flat - 403\nPlot - 98, Ghansoli Sector 21, Navi Mumbai ', 400706, 9874839977, '1976-12-11', 1, NULL, NULL),
(41, 'Natalie', 'bvkfuvbfm@googlemail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Hi my name is Natalie and I just wanted to drop you a quick message here instead of calling you. I discovered your Fishwala website and noticed you could have a lot more traffic. I have found that the key to running a popular website is making sure the visitors you are getting are interested in your website topic. There is a company that you can get keyword targeted traffic from and they let you try their service for free for 7 days. I managed to get over 300 targeted visitors to day to my website. Check it out here: http://yxbp.com/5kje', 0, 0, '0000-00-00', 1, NULL, NULL),
(43, 'poongundran', 'poongundran.perseverance@gmail.com', '324a0024fde346c51680355a20a20ce9', '7039015737', 'B-group,B-72,Room no:3,Sector-3', 400708, 7039015737, '1987-06-12', 1, NULL, NULL),
(44, 'Manas Das', 'manasdas2001@gmail.com', '243bd1ce0387f18005abfc43b001646a', 'krishna', 'Plot No. 324, Flat No. 1, \nVakratunda Apartment,\nSector 31A, Vashigaon, Vashi, Navi Mumbai', 400703, 9820671245, '1979-05-07', 1, NULL, NULL),
(45, 'Swapnil lohar', 'swapnillohar04@gmail.com', 'b39a5005f03f16e882a911cd34f86043', 'swapnil', 'E144 sector 3, near Gandhi garden, airoli, navi mumbai-400708.', 400708, 7208073636, '2016-12-31', 1, NULL, NULL),
(46, 'PONKOJ PAUL', 'ponkojp@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'mumbai', 400011, 8888888888, '1990-05-28', 1, NULL, NULL),
(47, 'Neha ', 'nehaharishpatel1995@gmail.com', '09740f363b204d5f0c0c6af3f63897d9', '9820365364', '301 Whispering Palm Sector 19 airoli navimumbai ', 400708, 8652648878, '1995-10-09', 1, NULL, NULL),
(49, 'H Kashyap', 'h_kashyap@hotmail.com', 'ede17af45abab10db5c9463ad92793fc', 'night3$@', 'Flat 703, 7th Floor, Kumkum Park, Plot No 11, Sector 23, Ghansoli, Near Gothivali Lake.', 400701, 9004186565, '1983-01-01', 1, NULL, NULL),
(51, 'suraj patil', 'patil.suraj514@gmail.com', '1365e86ada6d09145c4530d61def126e', '707chuka', 'Room no. 1, BMC staff quarter, Dinsha vansha Gate\nramabai nagar 1, sai hill, bhandup (w) 400078', 400078, 9545145917, '0000-00-00', 1, NULL, NULL),
(53, 'Manoj Kamat', 'ranju.kamat@gmail.com', '9e4ae8e97685b97145bbbfdbab5cf467', 'Chandrika420', 'B -1504 ,Oberoi Park view , near Thakur Miraj Cinema Thakur Village , Kandivali east , Mumbai-400101', 400101, 9869422593, '2016-09-21', 1, NULL, NULL),
(54, 'siddesh', 'siddeshmatkar000@gmail.com', '20b96ea250d9a384529b00393647001e', 'siddesh', 'Mungalmurtipark,Room No 302,sec 9,Airoli,navimumbai\n', 400708, 7021778088, '1999-12-25', 1, NULL, NULL),
(55, 'Hitesh salunkhe', 'Hiteshsalunkhe.hs@gmail.com', 'd2416b1f53fd153912278cb0815107d5', '9769259722', 'Amey society A-51,2/4 sector-15 Airoli Navi mumbai.', 400708, 9769259722, '1996-11-02', 1, NULL, NULL),
(56, 'Maheshkumar', 'mahesh_borse80@yahoo.co.in', '6c6d4a1774b71a565e0327eb435f350d', 'Yukra@1234', '701, adriatica e, cluster 7, near royal super merket, casa rio, kalyan shil road, dimbivali east.', 421204, 9892049864, '1980-01-07', 1, NULL, NULL),
(57, 'kiran boke', 'kiran.boke1@gmail.com', 'c75d81c46c44ae091cfcb9350d1d10e5', 'suruchi1', 'riddhi siddhi heights sec 19', 400708, 8976130553, '1997-12-08', 1, NULL, NULL),
(58, 'Lalit Khavnekar ', 'ttc.cakeshop@gmail.com', '1aa8b5b4fb9a09c32df1df9c821b6662', 'ttc@@pmkn', 'Bhandup', 400042, 9869001142, '1985-10-29', 1, NULL, NULL),
(59, 'Rajeshree Naidu ', 'rajidevnaidu@gmail.com', '40afc930d7a4c60417fcd0beacb673f8', 'raji26', 'FLAT no 302 matoshree chs Sec 9 near garam masala hotel airoli ', 400708, 8286866178, '1991-12-26', 1, NULL, NULL),
(60, 'Robbie', 'c8xq8q4oo5@mail.com', 'a66fc0e7f35de911ce918870ff9eccf5', 'wEfdwOQz', 'Posts like this make the inrtneet such a treasure trove', 0, 0, '0000-00-00', 1, NULL, NULL),
(61, 'Dillanger', '5g5xu73zhhw@hotmail.com', '229d9d576d9a2b59518263e3abd3a3b6', 'Y9ECqITZ', 'That''s way the betsest answer so far!', 0, 0, '0000-00-00', 1, NULL, NULL),
(62, 'Kelenna', '5336v246hw@hotmail.com', '10947d4d1568bc8b5bb248b781afcd78', 'xwDAZEgy', 'It''s always a pleasure to hear from someone with exiretpse.', 2, 0, '0000-00-00', 1, NULL, NULL),
(63, 'Cady', '19u4eulq5@mail.com', '11d98f67ad94d6b49d247720c1cdaa0d', 'OlSswCd2', 'Essays like this are so important to briaednong people''s horizons.', 0, 0, '0000-00-00', 1, NULL, NULL),
(64, 'Joan', '4ud930qb8fv@hotmail.com', '366e13eadbd75e2978aa4093ad23a050', 'A0nEvLj5', 'Your''s is the intlnligeet approach to this issue.', 0, 0, '0000-00-00', 1, NULL, NULL),
(65, 'Kert', 'ydmizxubrn@yahoo.com', 'c1d4891109198adf35f1ad9ddc0af006', 'Zlfxma9k', 'I lirleatly jumped out of my chair and danced after reading this!', 3, 0, '0000-00-00', 1, NULL, NULL),
(66, 'Infinity', '3zdz6rf5dmt@mail.com', '14812fdc45d1fcf16ab1d0892aede20f', 'yQpetxuO', 'A pllgsinaey rational answer. Good to hear from you.', 0, 0, '0000-00-00', 1, NULL, NULL),
(67, 'Dina', 'zhzpejz40ba@gmail.com', '590db8f334912fa3d9180a148c632151', 'sPK1JSdP', 'I don''t know who you wrote this for but you helped a brhoetr out.', 91, 4, '0000-00-00', 1, NULL, NULL),
(68, 'Janardan Gosavi', 'sagar@rtgtrackers.com', '890135336d7020c02acb9b168ca954d3', 'jman1760', 'b/8/302 Shivadarshan chs,sector 10,airoli', 400708, 9324666629, '1977-06-01', 1, NULL, NULL),
(69, 'akshay manjrekar', 'amanjrekar16@gmail.com', '2de1b2d6a6738df78c5f9733853bd170', 'akshay', 'sec 17 ,airoli', 400708, 8097620818, '1993-04-24', 1, NULL, NULL),
(70, 'Abhay Naghatr', 'abhaynaghate2014@gmail.com', '305a62dda617dd33ccc3c1ea907550d6', 'fish2016', 'Flat No- 202,Madhuri CO. HSG. SOC. sector-6,Airoli Navimumbai', 400708, 9323562674, '1980-01-06', 1, NULL, NULL),
(71, 'Ninad mahadik', 'ninad.mahadik@yahoo.com', 'b30a0795d5acd62d2f119d8a3422caa6', 'vihaan191213', 'C306, geet sonali chs ltd, near pmc bank, sec-7 airoli, navi mumbai-400708', 400708, 9833069033, '1983-01-10', 1, NULL, NULL),
(72, 'krishnadas', 'dasnair@hotmail.com', '14c4c8b9e40e63379054491b111f2acd', 'dasan1204', 'B-15 Lotus Soc, Sector -7, Airoli, Navi-Mumbai', 400708, 9821249235, '1975-08-14', 1, NULL, NULL),
(73, 'Raj', 'rajkotimr@gmail.com', 'b524492301461e469a909bb8d41f3a75', 'jlu123!@#', 'flat#102, Manasvi Nivas, Sector 9, Airoli, Navi Mumbai.', 400070, 9642555448, '0000-00-00', 1, NULL, NULL),
(74, 'Sourish Bose', 'sourishbose@gmail.com', '74d6bc9650c186844baac8a80243df0b', 'bose@fishwala', '701, Urvashi, Sector 29C, near Vrindavan Socity', 400708, 9324405691, '0000-00-00', 1, NULL, NULL),
(75, 'Sandesh Zolage', 'zolage.sandesh26@gmail.com', '02ca629027293dc88f0081bab309194b', 'sandy@143', 'Shivanjali CHS B/2 room no 802 raigad Gali chanda wadi Thane West', 400602, 9270609737, '1986-03-26', 1, NULL, NULL),
(76, 'Siddharth Bhanjadeo', 'siddhartha.bdeo@gmail.com', '2168ad5e463d9accb215edaafa31c8d9', 'Test123!', 'Flat No-804, B Wing, Palm Spring Apartment, Sec-7, Airoli, Navi Mumbai , Maharashtra', 400708, 9167918222, '1982-10-05', 1, NULL, NULL),
(77, 'Maitreyee Ghosh', 'maitreyee_ghosh2000@yahoo.co.in', '6edb5580ef6c415fb776270bc265e886', 'mahimanji2015', '101 Satyam Ornate\nSector 8A, Airoli', 400708, 9987981740, '1976-12-03', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `emailid` varchar(45) NOT NULL,
  `contactno` bigint(20) NOT NULL,
  `address` text NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `usertype` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `emailid`, `contactno`, `address`, `username`, `password`, `usertype`) VALUES
(2, 'Pramod Kanojia', 'pramodknj67@gmail.com', 8600409439, 'panvel', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Seafood'),
(6, 'Rohan Khartmol', 'baluramkhartmol96@gmail.com', 8898583515, 'Airoli\n', 'rohan', '40215871543852eaa87e6533c5cf7957', 'Seafood');

-- --------------------------------------------------------

--
-- Table structure for table `master_order`
--

CREATE TABLE IF NOT EXISTS `master_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(45) NOT NULL,
  `order_date` date NOT NULL,
  `customer_id` int(11) NOT NULL,
  `delivery_charges` int(11) NOT NULL DEFAULT '0',
  `express_delivery` int(11) DEFAULT NULL,
  `sub_total` varchar(45) NOT NULL,
  `charity_amount` int(11) DEFAULT '0',
  `grand_total` varchar(45) NOT NULL,
  `payment_mode` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=130 ;

--
-- Dumping data for table `master_order`
--

INSERT INTO `master_order` (`id`, `order_no`, `order_date`, `customer_id`, `delivery_charges`, `express_delivery`, `sub_total`, `charity_amount`, `grand_total`, `payment_mode`, `status`, `open`) VALUES
(82, 'ORD1', '2016-02-09', 29, 50, 50, '110', 0, '210', 'Cash On Delivery', 'cancelled', 1),
(83, 'ORD2', '2016-02-09', 29, 0, 0, '349', 1, '350', 'Cash On Delivery', 'cancelled', 1),
(84, 'ORD3', '2016-02-10', 29, 0, 50, '1647', 3, '1700', 'Cash On Delivery', 'cancelled', 1),
(85, 'ORD4', '2016-02-10', 26, 0, 50, '699', 1, '750', 'Cash On Delivery', 'cancelled', 1),
(86, 'ORD5', '2016-02-10', 29, 0, 0, '349', 1, '350', 'Cash On Delivery', 'cancelled', 1),
(87, 'ORD6', '2016-02-11', 29, 0, 50, '289', 1, '340', 'Cash On Delivery', 'cancelled', 1),
(88, 'ORD7', '2016-02-12', 29, 0, 50, '358', 2, '410', 'Cash On Delivery', 'pending', 1),
(89, 'ORD8', '2016-02-19', 29, 0, 50, '2485', 5, '2540', 'Cash On Delivery', 'pending', 1),
(90, 'ORD9', '2016-03-09', 29, 0, 0, '349', 1, '350', 'Cash On Delivery', 'pending', 1),
(91, 'ORD10', '2016-03-10', 29, 0, 0, '1396', 4, '1400', 'Cash On Delivery', 'pending', 1),
(92, 'ORD11', '2016-03-15', 29, 0, 50, '698', 2, '750', 'Cash On Delivery', 'pending', 1),
(93, 'ORD12', '2016-03-30', 29, 0, 50, '878', 2, '930', 'Cash On Delivery', 'pending', 1),
(94, 'ORD13', '2016-03-30', 29, 50, 50, '249', 1, '350', 'Cash On Delivery', 'pending', 1),
(95, 'ORD14', '2016-04-01', 29, 0, 0, '698', 2, '700', 'Cash On Delivery', 'pending', 1),
(96, 'ORD15', '2016-04-02', 29, 0, 50, '1398', 2, '1450', 'Cash On Delivery', 'pending', 1),
(97, 'ORD16', '2016-04-06', 29, 0, 50, '698', 2, '750', 'Cash On Delivery', 'pending', 1),
(98, 'ORD17', '2016-04-08', 29, 0, 0, '698', 2, '700', 'Cash On Delivery', 'pending', 1),
(99, 'ORD18', '2016-04-19', 29, 0, 50, '698', 2, '750', 'Cash On Delivery', 'pending', 1),
(100, 'ORD19', '2016-04-24', 29, 0, 0, '1047', 3, '1050', 'Cash On Delivery', 'pending', 1),
(101, 'ORD20', '2016-05-03', 29, 0, 0, '3592', 8, '3600', 'Cash On Delivery', 'pending', 1),
(102, 'ORD21', '2016-05-12', 29, 0, 0, '349', 1, '350', 'Cash On Delivery', 'pending', 1),
(103, 'ORD22', '2016-05-20', 29, 0, 0, '698', 0, '698', 'Cash On Delivery', 'pending', 1),
(104, 'ORD23', '2016-06-03', 29, 0, 0, '778', 0, '778', 'Cash On Delivery', 'pending', 1),
(105, 'ORD24', '2016-06-04', 39, 0, 0, '1396', 4, '1400', 'Cash On Delivery', 'pending', 1),
(106, 'ORD25', '2016-06-28', 29, 0, 50, '356', 4, '410', 'Cash On Delivery', 'pending', 1),
(107, 'ORD26', '2016-07-11', 45, 0, 0, '3145', 5, '3150', 'Cash On Delivery', 'pending', 1),
(108, 'ORD27', '2016-08-11', 29, 0, 50, '8980', 0, '9030', 'Cash On Delivery', 'pending', 1),
(109, 'ORD28', '2016-08-12', 29, 0, 0, '698', 0, '698', 'Cash On Delivery', 'pending', 1),
(110, 'ORD29', '2016-08-12', 29, 0, 50, '498', 2, '550', 'Cash On Delivery', 'pending', 1),
(111, 'ORD30', '2016-08-17', 49, 0, 0, '1034', 0, '1034', 'Cash On Delivery', 'pending', 1),
(112, 'ORD31', '2016-08-17', 49, 0, 0, '1034', 0, '1034', 'Cash On Delivery', 'pending', 1),
(113, 'ORD32', '2016-08-17', 49, 0, 0, '1034', 0, '1034', 'Cash On Delivery', 'pending', 1),
(114, 'ORD33', '2016-08-22', 29, 0, 0, '698', 2, '700', 'Cash On Delivery', 'pending', 1),
(115, 'ORD34', '2016-08-25', 29, 0, 50, '349', 1, '400', 'Cash On Delivery', 'pending', 1),
(116, 'ORD35', '2016-08-28', 29, 0, 0, '1258', 0, '1258', 'Cash On Delivery', 'pending', 1),
(117, 'ORD36', '2016-09-01', 29, 0, 50, '1887', 3, '1940', 'Cash On Delivery', 'pending', 1),
(118, 'ORD37', '2016-09-11', 29, 0, 50, '1047', 0, '1097', 'Cash On Delivery', 'pending', 1),
(119, 'ORD38', '2016-09-15', 29, 0, 0, '578', 0, '578', 'Cash On Delivery', 'pending', 1),
(120, 'ORD39', '2016-09-15', 29, 0, 50, '578', 2, '630', 'Cash On Delivery', 'pending', 1),
(121, 'ORD40', '2016-09-16', 29, 0, 50, '698', 2, '750', 'Cash On Delivery', 'pending', 1),
(123, 'ORD42', '2016-09-18', 29, 0, 0, '349', 0, '349', 'Cash On Delivery', 'pending', 1),
(124, 'ORD43', '2016-09-19', 29, 0, 50, '578', 2, '630', 'Cash On Delivery', 'pending', 1),
(125, 'ORD44', '2016-10-25', 29, 0, 50, '1000', 0, '1050', 'Cash On Delivery', 'pending', 1),
(126, 'ORD45', '2016-10-25', 69, 0, 50, '1950', 0, '2000', 'Cash On Delivery', 'pending', 1),
(127, 'ORD46', '2016-11-03', 29, 0, 50, '975', 5, '1030', 'Cash On Delivery', 'pending', 1),
(128, 'ORD47', '2016-11-08', 29, 0, 50, '650', 0, '700', 'Cash On Delivery', 'pending', 1),
(129, 'ORD48', '2016-11-15', 76, 50, 50, '516', 0, '566', 'PayUMoney', 'pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payumoney`
--

CREATE TABLE IF NOT EXISTS `payumoney` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode` varchar(45) NOT NULL,
  `merchant_key` text NOT NULL,
  `salt` text NOT NULL,
  `url` text NOT NULL,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payumoney`
--

INSERT INTO `payumoney` (`id`, `mode`, `merchant_key`, `salt`, `url`, `status`) VALUES
(1, 'Live', 'OBbXY2', 'XVnB61y2', 'https://secure.payu.in', '1'),
(2, 'Test', 'OygoFs', 'BV1QBwCv', 'https://test.payu.in', '0');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `photo` longblob,
  `product_name` varchar(100) NOT NULL,
  `price` varchar(45) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `availability` varchar(45) NOT NULL DEFAULT 'Available',
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `category_id`, `sub_category_id`, `photo`, `product_name`, `price`, `unit`, `description`, `availability`) VALUES
(42, 30, 56, 0x626173615f66696c6c65742044656c69676874202d20436f70792d636f6d707265737365642e6a7067, 'Frozon Basa Fillet', '179', '500g', 'Approximately 2.6 to 6.7 percent of the fat content of a serving of basa consists of omega-3 fatty acids.', 'Available'),
(43, 30, 56, 0x3137343338626173612d66697368202d20436f70792d636f6d707265737365642e6a7067, 'Basa ', '109', '500g', 'Particularly DHA, or docosahexaenoic acid, and EPA, or eicosapentaenoic acid -are linked to a decreased risk of heart disease', 'Available'),
(44, 30, 56, 0x4b61746c615f536c696365735f676873652d6a7220283129202d20436f70792d636f6d707265737365642e6a7067, 'Catla (Tembra)', '109', '500g', 'Catla , also known as the major (Indian) carp, is an economically important South Asian freshwater fish in the carp family Cyprinidae.', 'Available'),
(45, 30, 56, 0x737465616d776f726b73686f705f77656275706c6f61645f7072657669657766696c655f3432343639383539355f707265766965772d636f6d707265737365642e6a7067, 'Rohu', '129', '500g', 'Rohu or roho labeo is a species of fish of the carp family, found in rivers in South Asia. It is an omnivore.its good for heart diseas.', 'Available'),
(49, 31, 61, 0x6361726368617268696e75732d627265766970696e6e612d34373935202d20436f70792d6d696e2e6a7067, 'Shark  (mushi)', '149', '500g', 'Sharks have thrived for 400 million years. They get less cancer and are less susceptible to certain viruses than we are. They''re also called "majestic" more often than many of us. But we''ve failed to steal their proverbial flavor.', 'Available'),
(50, 31, 61, 0x436869726f63656e74727573446f726162435349524f202d20436f70792d6d696e2e6a7067, 'silver Bar fish (Karli)', '139', '500g', 'Silver bar Fish is a high-protein, low-fat food that provides a range of health benefits. White-fleshed fish, in particular, is lower in fat than any other source of animal protein, and oily fish are high in omega-3 fatty acids, or the "good" fats.', 'Available'),
(51, 31, 61, 0x436f74616c5f75302e6a7067, 'Eal (Vam)', '249', '500g', 'Eals aren''t snakes at all but a type of fish that lack pelvic and pectoral fins. As fish, they''re a fantastic source of mega-healthy omega-3 fatty acids. They also contain a good amount calcium, magnesium, potassium, selenium, manganese, zinc and iron.', 'Available'),
(52, 31, 61, 0x6d616e64656c692d353030783530302d6d696e2e6a7067, 'Anchovies (Mandeli))', '69', '500g', 'Health benefits of anchovies include healthy heart, lower levels of bad cholesterol and toxin levels. It helps in improving skin health, reducing weight and strengthening teeth. Intake of anchovies also reduces risk of osteoporosis and macular degeneration.', 'Out Of Stock'),
(53, 31, 61, 0x73617264696e6573322d636f6d707265737365642e6a7067, 'Sardine (Tarli)', '110', '500g', 'The nutrients found in sardines are responsible for these great health benefits. Sardines are small, oily fish that belong to the family called Clupeidae. ', 'Available'),
(54, 31, 61, 0x6c6164796669736831202d20436f70792d636f6d707265737365642e6a7067, 'Lady Fish ', '200', '500g', 'There are six species of ladyfish inhabiting tropical and subtropical waters all over world. They are inshore species that are commonly found in estuaries, coastal lagoons, hypersaline bays, along shorlines, and even venture far up coastal streams. ', 'Out Of Stock'),
(55, 31, 61, 0x4e696265615375616d6f614a476f202d20436f70792d636f6d707265737365642e6a7067, 'Jewfish (Ghol)', '429', '500g', ' JewFish is far and away the easiest and best way to get regular Omega – 3s in the right form to benefit body and mind. Mulloway is high in eicosapentaenoic acid (EPA) and docosahexaenoic acid (DHA) and therefore a great source of beneficial Omega – 3s.', 'Available'),
(56, 31, 61, 0x72616e6966697368206669736877616c612e6d652e6a7067, 'Rani fish', '80', '500g', 'Rani Fish May Lower Your Risk of Heart Attacks and Strokes. Rani Fish May Increase Grey Matter in the Brain and Protect it From Age-Related Deterioration', 'Available'),
(57, 31, 61, 0x66726573682d73717569642d6d696e2e6a7067, 'Squids ', '179', '500g', 'Squids are simply irresistible and lip-smacking! When you add them to different recipes or serve them with assorted dips, squids never fail to diplease your taste buds. They are typically marine cephalopods belonging to the Loliginidae family. Squids are eaten in most parts of America and South Asia.', 'Out Of Stock'),
(58, 31, 61, 0x62325f4c5f322d6d696e2e6a7067, 'Asian sea bass (jitada)', '389', '500g', 'Sea Bass is a name shared by many different species of fish. The term encompasses both freshwater and marine species, all belonging to the large order Perciformes, or perch-like fishes, and the word bass comes from Middle English bars,', 'Out Of Stock'),
(59, 31, 61, 0x696e6469616e2d6d61636b6572656c2d616e642d62616e6764612d323530783235302d6d696e2e6a7067, 'Mackrel (Bagda) 6-7 count (kg)', '89', '500g', 'Mackerel, known as bangada in hindi, is one of the most widely consumed fish variety in India. Although bangada fry and curry are most preferred options, health conscious people can consume this fish in baked, steamed or grilled form. ', 'Available'),
(60, 31, 61, 0x627331202d20436f70792d6d696e2d636f6d707265737365642e6a7067, 'Bombay Duck (Bombil) 8-10 count (kg)', '70', '500g', 'Build and repair body tissues: Bombay ducks are high on protein. And, when they are dried, the protein content increases. Proteins play an important role in building and repairing the tissues in our body.\n', 'Available'),
(61, 31, 61, 0x74756e61666973682e6a7067, 'Tuna', '149', '500g', ' Perhaps the most common health benefit that is attributed to tuna fish is its significant impact on heart health. In terms of reducing coronary heart disease, tuna fish has very high levels of omega-3 fatty acids, which help to reduce omega-6 fatty acids and cholesterol in the arteries and blood vessels.', 'Available'),
(62, 31, 61, 0x626c61636b5f706f6d66726574202d20436f70792d6d696e2e6a7067, 'Black Pomfret (Halwa) 5 count (kg)', '225', '500g', 'Black Pomfret fish can improve your circulation and reduce the risk of thrombosis. The EPA and DHA - omega-3 oils - in seafood can save your body from having to produce eicosanoids, a hormone-like substance which can make you more likely to suffer from blood clots and inflammation.', 'Out Of Stock'),
(63, 31, 61, 0x426c61636b5f506f6d66726574325f3130323478313032342e6a7067, 'Black Pomfret (Halwa)  2 count(kg)', '275', '500g', 'Black pompfret  fish as a regular part of a balanced diet has been shown to ease the symptoms of rheumatoid arthritis, a condition which causes the joins to swell up. Recent research has also found a link between omega-3 fats and osteoarthritis, suggesting that eating more seafood could help to prevent the disease.', 'Available'),
(64, 31, 61, 0x77686974652d706f6d667265742d7768697465706f6d667265676669736877686f6c655f345f312d6d696e202831292e6a7067, 'Pomfret   (Pomplet)  6-8 count (kg)', '300', '500g', 'The human brain is almost 60% fat, with much of this being omega-3 fat. Probably for this reason, research has indicated that people who eat Pomfret are less likely to suffer dementia and memory problems in later life. ', 'Available'),
(65, 31, 61, 0x373433303034382d57686974652d506f6d667265742d466973682d4f6e2d57686974652d6261636b67726f756e642d53746f636b2d50686f746f2d706f6d667265742e6a7067, 'Pomfret    (Pomplet)  4 count (kg)', '450', '500g', 'Pomfret has a light texture and sweet, rich flavour. It has high fat content, hence its alternate name, butterfish. Like most others, this one provides calcium, vitamins A and D, and B­vitamins, including Vitamin B12, vital for the nervous system. It also offers iodine, critical for the thyroid gland.', 'Available'),
(66, 31, 61, 0x77686974652d706f6d667265742d6d696e202831292e6a7067, 'Pomfret   (Pomplet) 2 count (kg)', '629', '500g', 'A useful brain food, the pomfret is good for eyesight and healthy hair and skin. Fishes are high in protein, low in saturated fat and a unique source of omega­3 essential fatty acids.', 'Out Of Stock'),
(67, 31, 61, 0x323831202d20436f70792d636f6d707265737365642e6a7067, 'Baby Salmon (Rawas) 2 count (kg)', '275', '500g', 'Salmon is an excellent source of vitamin B12, vitamin D, and selenium. It is a good source of niacin, omega-3 fatty acids, protein, phosphorus, and vitamin B6. It is also a good source of choline, pantothenic acid, biotin, and potassium.', 'Available'),
(68, 31, 61, 0x646f776e6c6f61642d6d696e2e6a7067, 'Salmon (Rawas) Steaks', '389', '500g', 'Eating salmon is beneficial in the treatment of osteoarthritis and other inflammatory joint conditions. Salmon contains small proteins called bioactive peptides. ', 'Available'),
(69, 31, 61, 0x73616c6d6f6e2d73757072656d65732d31302d6d696e2e6a7067, 'Salmon (Rawas) Fillet', '549', '500g', 'Salmon protects your eyes. Eating salmon twice a week has been shown to significantly decrease the risk of macular degeneration — a chronic eye condition that leads to loss of vision. ', 'Out Of Stock'),
(70, 31, 61, 0x6b696e672d666973682d7375726d61692d616e642d736565722d666973682d353030783530302d6d696e2d636f6d707265737365642e6a7067, 'Baby Kingfish (Surmai)  2 count (kg)', '250', '500g', 'The omega-3 fatty acids fill a number of essential roles, from regulating inflammation to supporting the structure and function of cells.', 'Available'),
(71, 31, 61, 0x6b696e67666973682d63727565202d20436f70792d6d696e2d636f6d707265737365642e6a7067, 'Kingfish (Surmai) steaks', '325', '500g', 'Kingfish is a rich source of healthy omega-3 fatty acids. It’s also packed with protein, vitamin B-12 and selenium. But be aware that it has high levels of mercury.', 'Available'),
(72, 29, 60, 0x626c7565207377696d6d6572206372616220355f6269672d6d696e2e6a7067, 'Sea crab', '89', '500g', 'Crab is one of the best possible dietary sources of protein available. It contains almost as much protein per 100 grams as meats without anywhere near the same levels of saturated fat, which is linked to an increased risk of heart disease.', 'Available'),
(73, 29, 60, 0x4d75642043726162204661726d696e67202d20436f70792d6d696e2e6a7067, 'Crab     5-7 count(kg)', '179', '500g', 'Crab meat contains nearly 30 times the copper found in cod and 56 times that found in salmon, chicken and beef.', 'Available'),
(74, 29, 60, 0x666e712d6d756463726162202d20436f70792d636f6d707265737365642e6a7067, 'Crab       2-4 count (kg)', '229', '500g', '100g of crab meat provides 112% of the daily recommend value for men and 140% daily recommend value for women. ', 'Available'),
(75, 29, 60, 0x66383134633931303437373738332d636f6d707265737365642e6a7067, 'Prawns            70-80 count', '189', '500g', ' Prawns are rich source of Selenium which helps to prevent the growth of cancer cells in the body thus it helps in preventing cancers in the body. ', 'Available'),
(76, 29, 60, 0x6b696e67707261776e5f7261774830385f322d636f6d707265737365642e6a7067, 'Prawns            30-45 count', '249', '500g', ' Prawns are a rich source of Omega 3 Fatty acids which is very good for heart. It helps in widening of lumen of the arties by removing bad cholesterol from the inner walls of the arteries.', 'Available'),
(77, 29, 60, 0x507261776e732d636f6d707265737365642e6a7067, 'Prawns            15-20 count', '349', '500g', 'Prawns are rich source of Vitamin B 12. B 12 is very useful not only in keeping memory sharp but also is very good for cardiac health and also is needed by arteries and veins to work properly. ', 'Available'),
(78, 29, 60, 0x5363616d70692d636f6d707265737365642e6a7067, 'Scampi   10-15 count(kg)', '299', '500g', 'scampi meat is very beneficial. It is low in fat substance and has a high content of proteins. It is the best choice for athletes and for fitness conscious people. ', 'Available'),
(79, 30, 56, 0xe4ba9a2d6d696e2e6a7067, 'Hilsa (Pala)', '449', '500g', 'Hilsa is considered as one of the most tastiest fish due to its distinctly soft oily texture, mouthwatering flavour and superb mouthfeel.The fish is locally called "macher raja" it means king of fish', 'Available'),
(80, 29, 60, 0x3230313535323731343436353035333636332d636f6d707265737365642e6a7067, 'Lobster  4-6 count(kg)', '599', '500g', 'One of tempting seafood is lobster.lobster or giant shrimp is very attractive for meal.especially lobster cooked in favourites menu.', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `product_order_details`
--

CREATE TABLE IF NOT EXISTS `product_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(45) NOT NULL,
  `price` varchar(45) NOT NULL,
  `status` text NOT NULL,
  `clean` varchar(45) DEFAULT NULL,
  `open` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=172 ;

--
-- Dumping data for table `product_order_details`
--

INSERT INTO `product_order_details` (`id`, `order_id`, `category_id`, `sub_category_id`, `product_id`, `qty`, `price`, `status`, `clean`, `open`) VALUES
(115, 82, 31, 61, 53, '0.5', '110', 'cancelled', 'Cleaned', 0),
(116, 83, 31, 61, 71, '0.5', '349', 'cancelled', 'Cleaned', 0),
(117, 84, 31, 61, 69, '1.5', '1647', 'cancelled', 'Cleaned', 0),
(118, 85, 29, 60, 78, '0.5', '699', 'cancelled', 'Cleaned', 0),
(119, 86, 31, 61, 71, '0.5', '349', 'cancelled', 'Cleaned', 0),
(120, 87, 31, 61, 70, '0.5', '289', 'cancelled', 'Cleaned', 0),
(121, 88, 31, 61, 57, '1', '358', 'pending', 'Cleaned', 0),
(122, 89, 31, 61, 70, '0.5', '289', 'pending', 'Cleaned', 0),
(123, 89, 31, 61, 69, '2', '2196', 'pending', 'Cleaned', 0),
(124, 90, 31, 61, 71, '0.5', '349', 'delivered', 'Cleaned', 0),
(125, 91, 31, 61, 71, '2', '1396', 'pending', 'Cleaned', 0),
(126, 92, 31, 61, 71, '1', '698', 'delivered', 'Cleaned', 0),
(127, 93, 31, 61, 71, '0.5', '349', 'delivered', '', 0),
(128, 93, 31, 61, 65, '0.5', '529', 'delivered', 'Cleaned', 0),
(129, 94, 29, 60, 76, '0.5', '249', 'delivered', 'Cleaned', 0),
(130, 95, 31, 61, 71, '1', '698', 'pending', 'Cleaned', 0),
(131, 96, 29, 60, 78, '1', '1398', 'delivered', 'Cleaned', 0),
(132, 97, 29, 60, 77, '1', '698', 'pending', 'Cleaned', 0),
(133, 98, 29, 60, 77, '1', '698', 'pending', 'Cleaned', 0),
(134, 99, 31, 61, 71, '1', '698', 'pending', 'Cleaned', 0),
(135, 100, 29, 60, 77, '1.5', '1047', 'pending', '', 0),
(136, 101, 30, 56, 79, '4', '3592', 'pending', 'Cleaned', 0),
(137, 102, 31, 61, 71, '0.5', '349', 'pending', 'Cleaned', 0),
(138, 103, 31, 61, 71, '1', '698', 'pending', 'Cleaned', 0),
(139, 104, 31, 61, 58, '1', '778', 'delivered', 'Cleaned', 0),
(140, 105, 31, 61, 71, '2', '1396', 'pending', 'Cleaned', 0),
(141, 106, 31, 61, 59, '2', '356', 'pending', 'Cleaned', 0),
(142, 107, 31, 61, 66, '2.5', '3145', 'pending', 'Cleaned', 0),
(143, 108, 31, 61, 64, '10', '8980', 'pending', 'Cleaned', 0),
(144, 109, 31, 61, 71, '1', '698', 'pending', 'Cleaned', 0),
(145, 110, 31, 61, 51, '1', '498', 'pending', 'Cleaned', 0),
(146, 111, 29, 60, 73, '1', '358', 'pending', 'Cleaned', 0),
(147, 111, 29, 60, 76, '1', '498', 'pending', 'Cleaned', 0),
(148, 111, 31, 61, 59, '1', '178', 'pending', 'Cleaned', 0),
(149, 112, 29, 60, 73, '1', '358', 'pending', 'Cleaned', 0),
(150, 112, 29, 60, 76, '1', '498', 'pending', 'Cleaned', 0),
(151, 112, 31, 61, 59, '1', '178', 'pending', 'Cleaned', 0),
(152, 113, 29, 60, 73, '1', '358', 'pending', 'Cleaned', 0),
(153, 113, 29, 60, 76, '1', '498', 'pending', 'Cleaned', 0),
(154, 113, 31, 61, 59, '1', '178', 'pending', 'Cleaned', 0),
(155, 114, 31, 61, 71, '1', '698', 'pending', 'Cleaned', 0),
(156, 115, 31, 61, 67, '0.5', '349', 'pending', 'Cleaned', 0),
(157, 116, 31, 61, 66, '1', '1258', 'pending', 'Cleaned', 0),
(158, 117, 31, 61, 66, '1.5', '1887', 'pending', 'Cleaned', 0),
(159, 118, 31, 61, 71, '1.5', '1047', 'pending', 'Cleaned', 0),
(160, 119, 31, 61, 70, '1', '578', 'pending', '', 0),
(161, 120, 31, 61, 70, '1', '578', 'pending', 'Cleaned', 0),
(162, 121, 29, 60, 77, '1', '698', 'pending', 'Cleaned', 0),
(164, 123, 31, 61, 71, '0.5', '349', 'pending', 'Cleaned', 0),
(165, 124, 31, 61, 70, '1', '578', 'delivered', 'Cleaned', 0),
(166, 125, 31, 61, 70, '2', '1000', 'delivered', 'Cleaned', 0),
(167, 126, 31, 61, 71, '3', '1950', 'pending', 'Cleaned', 0),
(168, 127, 31, 61, 71, '1.5', '975', 'pending', 'Cleaned', 0),
(169, 128, 31, 61, 71, '1', '650', 'delivered', 'Cleaned', 0),
(170, 129, 30, 56, 44, '1.5', '327', 'delivered', 'Cleaned', 0),
(171, 129, 29, 60, 75, '0.5', '189', 'delivered', 'Cleaned', 0);

-- --------------------------------------------------------

--
-- Table structure for table `service_location`
--

CREATE TABLE IF NOT EXISTS `service_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(45) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `service_location`
--

INSERT INTO `service_location` (`id`, `location`, `pincode`, `status`) VALUES
(16, 'Airoli', '400708', 'Enable');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE IF NOT EXISTS `shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `shipping_name` varchar(100) NOT NULL,
  `shipping_emailid` varchar(45) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_pincode` bigint(20) NOT NULL,
  `shipping_contactno` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=147 ;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `order_id`, `shipping_name`, `shipping_emailid`, `shipping_address`, `shipping_pincode`, `shipping_contactno`) VALUES
(99, 82, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(100, 83, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(101, 84, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(102, 85, 'aieou', 'aieou94@yahoo.in', 'builder', 400708, 400708),
(103, 86, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(104, 87, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(105, 88, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(106, 89, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(107, 90, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(108, 91, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(109, 92, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(110, 93, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(111, 94, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(112, 95, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(113, 96, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(114, 97, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(115, 98, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(116, 99, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(117, 100, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(118, 101, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(119, 102, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(120, 103, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(121, 104, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(122, 105, 'manu nair', 'manunair11@gmail.com', '1401,block C,hazel,tharwani rosewood heights,plot 270 ,sector 10 , kharghar 410210,navi mumbai', 410210, 7560871124),
(123, 106, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(124, 107, 'Swapnil lohar', 'swapnillohar04@gmail.com', 'E144 sector 3, near Gandhi garden, airoli, navi mumbai-400708.', 400708, 7208073636),
(125, 108, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(126, 109, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(127, 110, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(128, 111, 'H Kashyap', 'h_kashyap@hotmail.com', 'Flat 703, 7th Floor, Kumkum Park, Plot No 11, Sector 23, Ghansoli, Near Gothivali Lake.', 400701, 9004186565),
(129, 112, 'H Kashyap', 'h_kashyap@hotmail.com', 'Flat 703, 7th Floor, Kumkum Park, Plot No 11, Sector 23, Ghansoli, Near Gothivali Lake.', 400701, 9004186565),
(130, 113, 'H Kashyap', 'h_kashyap@hotmail.com', 'Flat 703, 7th Floor, Kumkum Park, Plot No 11, Sector 23, Ghansoli, Near Gothivali Lake.', 400701, 9004186565),
(131, 114, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(132, 115, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(133, 116, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(134, 117, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(135, 118, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(136, 119, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(137, 120, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(138, 121, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(140, 123, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(141, 124, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(142, 125, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(143, 126, 'akshay manjrekar', 'amanjrekar16@gmail.com', 'sec 17 ,airoli', 400708, 8097620818),
(144, 127, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(145, 128, 'Mayur', 'mayur.madhavi93@gmail.com', 'Airoli', 400708, 9769220654),
(146, 129, 'Siddharth Bhanjadeo', 'siddhartha.bdeo@gmail.com', 'Flat No-804, B Wing, Palm Spring Apartment, Sec-7, Airoli, Navi Mumbai , Maharashtra', 400708, 9167918222);

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `sub_category_name`) VALUES
(56, 30, ' '),
(60, 29, ' '),
(61, 31, '.');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE IF NOT EXISTS `testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `location`, `description`) VALUES
(3, 'Sidhharth Phalke', 'Thane', 'The convenience of fresh, cleaned, ready to cook seafood is a real boon. The hygienically stored and the wide variety makes shopping for my favorite seafood a pleasure.Fishwala is fresh, clean and very convenient. '),
(4, 'Suresh Dhiwar', 'Airoli', 'My experience with Fishwala has always been great and the quality has been excellent even during the monsoons. It is an extremely convenient way of ordering seafood'),
(5, 'Pradhan salian', 'Airoli', 'Very impressive service provided by Fishwala ! by delivering timely and fresh fish , keep up the good work fishwala ! '),
(6, 'Jyotsna ', 'Airoli', 'Awsome ! Ordered for some pomfrets last week, it was very fresh and very well delivered. Keep up the good work!'),
(7, 'Manish Shetty', 'Powai', 'We have been buying regularly all year around from Fishwala ...   best of luck!! '),
(8, 'Shekhar ', 'Vashi', ' I always get fresh seafood form Fishwala. They keep me informed on a regular basis about the fresh catch. ');

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE IF NOT EXISTS `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `amount` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=126 ;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `order_id`, `amount`) VALUES
(78, 82, '0'),
(79, 83, '0'),
(80, 84, '0'),
(81, 85, '0'),
(82, 86, '0'),
(83, 87, '0'),
(84, 88, '410'),
(85, 89, '2540'),
(86, 90, '350'),
(87, 91, '1400'),
(88, 92, '750'),
(89, 93, '930'),
(90, 94, '350'),
(91, 95, '700'),
(92, 96, '1450'),
(93, 97, '750'),
(94, 98, '700'),
(95, 99, '750'),
(96, 100, '1050'),
(97, 101, '3600'),
(98, 102, '350'),
(99, 103, '698'),
(100, 104, '778'),
(101, 105, '1400'),
(102, 106, '410'),
(103, 107, '3150'),
(104, 108, '9030'),
(105, 109, '698'),
(106, 110, '550'),
(107, 111, '1034'),
(108, 112, '1034'),
(109, 113, '1034'),
(110, 114, '700'),
(111, 115, '400'),
(112, 116, '1258'),
(113, 117, '1940'),
(114, 118, '1097'),
(115, 119, '578'),
(116, 120, '630'),
(117, 121, '750'),
(119, 123, '349'),
(120, 124, '630'),
(121, 125, '1050'),
(122, 126, '2000'),
(123, 127, '1030'),
(124, 128, '700'),
(125, 129, '566');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `master_order`
--
ALTER TABLE `master_order`
  ADD CONSTRAINT `master_order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_order_details`
--
ALTER TABLE `product_order_details`
  ADD CONSTRAINT `product_order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `master_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shipping`
--
ALTER TABLE `shipping`
  ADD CONSTRAINT `shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `master_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `sub_category_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `master_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
