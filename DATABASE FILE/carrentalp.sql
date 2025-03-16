-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2021 at 04:49 PM
-- Server version: 5.6.21
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bikerentalp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE IF NOT EXISTS `bikes` (
`bike_id` int(20) NOT NULL,
  `bike_name` varchar(50) NOT NULL,
  `bike_nameplate` varchar(50) NOT NULL,
  `bike_img` varchar(50) DEFAULT 'NA',
  `price` float NOT NULL,
  `price_per_day` float NOT NULL,
  `bike_availability` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bikes`
--
INSERT INTO `bikes` (`bike_id`, `bike_name`, `bike_nameplate`, `bike_img`, `price`, `price_per_day`, `bike_availability`) VALUES
(1, 'Yamaha R15', 'KA03AB1234', 'assets/img/bikes/yamaha_r15.jpg', 1500, 800, 'yes'),
(2, 'KTM Duke 390', 'KA05CD5678', 'assets/img/bikes/ktm_duke_390.jpg', 2000, 1200, 'yes'),
(3, 'Royal Enfield Classic 350', 'KA06EF9101', 'assets/img/bikes/re_classic_350.jpg', 1800, 1000, 'yes'),
(4, 'Bajaj Dominar 400', 'KA02GH2345', 'assets/img/bikes/bajaj_dominar_400.jpg', 1600, 900, 'yes'),
(5, 'Honda CBR 650R', 'KA07IJ6789', 'assets/img/bikes/honda_cbr_650r.jpg', 3000, 1800, 'yes'),
(6, 'Suzuki Hayabusa', 'KA08KL1011', 'assets/img/bikes/suzuki_hayabusa.jpg', 5000, 3500, 'yes'),
(7, 'BMW G 310 R', 'KA09MN1213', 'assets/img/bikes/bmw_g310r.jpg', 2500, 1400, 'no'),
(8, 'Kawasaki Ninja 650', 'KA10OP1415', 'assets/img/bikes/kawasaki_ninja_650.jpg', 3200, 2000, 'yes'),
(9, 'Ducati Panigale V4', 'KA11QR1617', 'assets/img/bikes/ducati_panigale_v4.jpg', 7000, 5000, 'yes'),
(10, 'Harley Davidson Iron 883', 'KA12ST1819', 'assets/img/bikes/harley_iron_883.jpg', 4500, 3000, 'yes'),
(11, 'TVS Apache RR 310', 'KA13UV2021', 'assets/img/bikes/tvs_apache_rr_310.jpg', 2300, 1300, 'yes'),
(12, 'Kawasaki Z900', 'KA14WX2223', 'assets/img/bikes/kawasaki_z900.jpg', 4000, 2500, 'yes'),
(13, 'Triumph Street Triple RS', 'KA15YZ2425', 'assets/img/bikes/triumph_street_triple_rs.jpg', 4200, 2600, 'yes'),
(14, 'Benelli TNT 600i', 'KA16AB2627', 'assets/img/bikes/benelli_tnt_600i.jpg', 3500, 2100, 'yes');


-- --------------------------------------------------------

--
-- Table structure for table `clientbikes`
--

CREATE TABLE IF NOT EXISTS `clientbikes` (
  `bike_id` int(20) NOT NULL,
  `client_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientbikes`
--

INSERT INTO `clientbikes` (`bike_id`, `client_username`) VALUES
(1, 'harry'),
(3, 'harry'),
(7, 'harry'),
(8, 'harry'),
(9, 'harry'),
(11, 'harry'),
(12, 'harry'),
(2, 'jenny'),
(4, 'jenny'),
(6, 'jenny'),
(10, 'jenny'),
(13, 'jenny'),
(14, 'jenny');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE IF NOT EXISTS `clients` (
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `client_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_username`, `client_name`, `client_phone`, `client_email`, `client_address`, `client_password`) VALUES
('harry', 'Harry Den', '9876543210', 'harryden@gmail.com', '2477  Harley Vincent Drive', 'password'),
('jenny', 'Jeniffer Washington', '7850000069', 'washjeni@gmail.com', '4139  Mesa Drive', 'jenny'),
('tom', 'Tommy Doee', '900696969', 'tom@gmail.com', '4645  Dawson Drive', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` ( 
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
('antonio', 'Antonio M', '0785556580', 'antony@gmail.com', '2677  Burton Avenue', 'password'),
('christine', 'Christine', '8544444444', 'chr@gmail.com', '3701  Fairway Drive', 'password'),
('ethan', 'Ethan Hawk', '69741111110', 'thisisethan@gmail.com', '4554  Rowes Lane', 'password'),
('james', 'James Washington', '0258786969', 'james@gmail.com', '2316  Mayo Street', 'password'),
('lucas', 'Lucas Rhoades', '7003658500', 'lucas@gmail.com', '2737  Fowler Avenue', 'password');

-- --------------------------------------------------------


--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `e_mail`, `message`) VALUES
('Nikhil', 'nikhil@gmail.com', 'Hope this works.');

-- --------------------------------------------------------

--
-- Table structure for table `rentedbikes`
--

CREATE TABLE IF NOT EXISTS `rentedbikes` (
`id` int(100) NOT NULL,
  `customer_username` varchar(50) NOT NULL,
  `bike_id` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `rent_start_date` date NOT NULL,
  `rent_end_date` date NOT NULL,
  `bike_return_date` date DEFAULT NULL,
  `fare` double NOT NULL,
  `charge_type` varchar(25) NOT NULL DEFAULT 'days',
  `distance` double DEFAULT NULL,
  `no_of_days` int(50) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `return_status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=574681260 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rentedbikes`
--

INSERT INTO `rentedbikes` (`id`, `customer_username`, `bike_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `bike_return_date`, `fare`, `charge_type`, `distance`, `no_of_days`, `total_amount`, `return_status`) VALUES
(574681245, 'ethan', 4,  '2018-07-18', '2018-07-01', '2018-07-02', '2018-07-18', 11, 'km', 244, 1, 5884, 'R'),
(574681246, 'james', 6,  '2018-07-18', '2018-06-01', '2018-06-28', '2018-07-18', 15, 'km', 69, 27, 5035, 'R'),
(574681247, 'antonio', 3,  '2018-07-18', '2018-07-19', '2018-07-22', '2018-07-20', 13, 'km', 421, 3, 5473, 'R'),
(574681248, 'ethan', 1,  '2018-07-20', '2018-07-28', '2018-07-29', '2018-07-20', 10, 'km', 69, 1, 690, 'R'),
(574681249, 'james', 1,  '2018-07-23', '2018-07-24', '2018-07-25', '2018-07-23', 10, 'km', 500, 1, 5000, 'R'),
(574681250, 'lucas', 3,  '2018-07-23', '2018-07-23', '2018-07-24', '2018-07-23', 2600, 'days', NULL, 1, 2600, 'R'),
(574681251, 'james', 10,  '2018-07-23', '2018-07-25', '2018-07-30', '2018-07-23', 10, 'km', 60, 2, 600, 'R'),
(574681252, 'christine', 11,  '2018-07-23', '2018-07-23', '2018-07-23', '2018-07-23', 13, 'km', 200, 0, 2600, 'R'),
(574681253, 'christine', 6,  '2018-07-23', '2018-07-23', '2018-08-03', '2018-07-23', 2600, 'days', NULL, 11, 28600, 'R'),
(574681254, 'ethan', 12,  '2018-07-23', '2018-07-23', '2018-07-26', '2018-07-23', 3200, 'days', NULL, 3, 9600, 'R'),
(574681255, 'christine', 8,  '2018-07-23', '2018-07-23', '2018-08-08', '2018-07-23', 2400, 'days', NULL, 16, 38400, 'R'),
(574681257, 'james', 7,  '2018-08-11', '2018-08-13', '2018-08-17', NULL, 14, 'km', NULL, NULL, NULL, 'NR'),
(574681258, 'lucas', 3,  '2021-03-24', '2021-03-24', '2021-03-25', '2021-03-24', 2600, 'days', NULL, 1, 2600, 'R'),
(574681259, 'lucas', 14,  '2021-03-24', '2021-03-24', '2021-03-26', '2021-03-24', 6100, 'days', NULL, 2, 12200, 'R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
 ADD PRIMARY KEY (`bike_id`), ADD UNIQUE KEY `bike_nameplate` (`bike_nameplate`);

--
-- Indexes for table `clientbikes`
--
ALTER TABLE `clientbikes`
 ADD PRIMARY KEY (`bike_id`), ADD KEY `client_username` (`client_username`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
 ADD PRIMARY KEY (`client_username`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`customer_username`);


-- Create payments table
CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `payment_status` enum('pending','success','failed') NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`payment_id`),
  KEY `customer_id` (`customer_id`),
  KEY `bike_id` (`bike_id`),
  CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`bike_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Also add payment_id column to the rentedBikes table if not already present
ALTER TABLE `rentedbikes` ADD COLUMN `payment_id` varchar(255) DEFAULT NULL;
ALTER TABLE `rentedbikes` ADD COLUMN `customer_id` varchar(255) DEFAULT NULL;
--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
MODIFY `bike_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;


--
-- AUTO_INCREMENT for table `rentedbikes`
--
ALTER TABLE `rentedbikes`
MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=574681260;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientbikes`
--
ALTER TABLE `clientbikes`
ADD CONSTRAINT `clientbikes_ibfk_1` FOREIGN KEY (`client_username`) REFERENCES `clients` (`client_username`),
ADD CONSTRAINT `clientbikes_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`bike_id`);



--
-- Constraints for table `rentedbikes`
--
ALTER TABLE `rentedbikes`
ADD CONSTRAINT `rentedbikes_ibfk_1` FOREIGN KEY (`customer_username`) REFERENCES `customers` (`customer_username`),
ADD CONSTRAINT `rentedbikes_ibfk_2` FOREIGN KEY (`bike_id`) REFERENCES `bikes` (`bike_id`),

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
