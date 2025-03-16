-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:5000
-- Generation Time: Mar 16, 2025 at 03:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bikerentalp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `bike_id` int(11) NOT NULL,
  `bike_name` varchar(50) NOT NULL,
  `bike_nameplate` varchar(50) NOT NULL,
  `bike_img` varchar(500) DEFAULT 'NA',
  `price` float NOT NULL,
  `price_per_day` float NOT NULL,
  `bike_availability` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`bike_id`, `bike_name`, `bike_nameplate`, `bike_img`, `price`, `price_per_day`, `bike_availability`) VALUES
(11, 'Kawasaki Ninja ZX-10R', 'MH02 AC 1010', 'https://imgd.aeplcdn.com/1056x594/n/cw/ec/130355/ninja-zx-10r-right-side-view-2.png?isig=0&q=80&wm=3', 45, 4500, 'no'),
(12, 'BMW S 1000 RR', 'DL01 BM 1000', 'https://imgd.aeplcdn.com/1056x594/n/cw/ec/195355/s1000rr-left-side-view.jpeg?isig=0&q=80&wm=3', 55, 5500, 'yes'),
(13, 'Ducati Panigale V4', 'KA05 DC 1199', 'https://imgd.aeplcdn.com/664x374/n/cw/ec/1/versions/ducati-panigale-v4-2025-standard1741200111106.jpg?v=1741200111391&q=80', 60, 6000, 'yes'),
(14, 'Triumph Street Triple RS', 'TN04 TR 7650', 'https://imgd.aeplcdn.com/664x374/n/bw/models/colors/triumph-select-model-phantom-black-1717410163158.jpg?q=80', 40, 4000, 'yes'),
(15, 'Suzuki Hayabusa', 'GJ01 SZ 1300', 'https://imgd.aeplcdn.com/664x374/n/bw/models/colors/suzuki-select-model-pearl-vigor-blue--pearl-brilliant-white-1681107281181.png?q=80', 50, 5000, 'yes'),
(16, 'Aprilia RSV4', 'UP16 AP 1000', 'https://imgd.aeplcdn.com/664x374/n/bw/models/colors/aprilia-select-model-ultra-gold-1713330908540.png?q=80', 58, 5800, 'yes'),
(17, 'Honda CBR 1000RR-R', 'HR07 HN 1000', 'https://imgd.aeplcdn.com/1056x594/n/bw/models/colors/honda-select-model-grand-prix-red-1649152806836.jpg?q=80', 52, 5200, 'yes'),
(18, 'Yamaha YZF R1', 'MH14 YM 1000', 'https://imgd.aeplcdn.com/1056x594/n/bw/models/colors/yamaha-yzf-r1-2018-tech-black-1512471351531.jpg?20190103151915&q=80', 48, 4800, 'yes'),
(19, 'MV Agusta F4', 'DL02 MV 1000', 'https://imgd.aeplcdn.com/664x374/bw/models/mv-agusta-f4-rr.jpg?20190103151915&q=80', 65, 6500, 'yes'),
(20, 'Kawasaki Z H2', 'KA01 KZ 1000', 'https://imgd.aeplcdn.com/664x374/n/bw/models/colors/kawasaki-select-model-metallic-carbon-grey-ebony-1691479581158.png?q=80', 47, 4700, 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `clientbikes`
--

CREATE TABLE `clientbikes` (
  `bike_id` int(20) NOT NULL,
  `client_username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `clients` (
  `client_username` varchar(50) NOT NULL,
  `client_name` varchar(50) NOT NULL,
  `client_phone` varchar(15) NOT NULL,
  `client_email` varchar(25) NOT NULL,
  `client_address` varchar(50) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `client_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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

CREATE TABLE `customers` (
  `customer_username` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_email` varchar(25) NOT NULL,
  `customer_address` varchar(50) NOT NULL,
  `customer_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES
('antonio', 'Antonio M', '0785556580', 'antony@gmail.com', '2677  Burton Avenue', 'password'),
('christine', 'Christine', '8544444444', 'chr@gmail.com', '3701  Fairway Drive', 'password'),
('customer', 'customer', '1234567890', 'customer@gmail.com', 'udupi', 'password'),
('ethan', 'Ethan Hawk', '69741111110', 'thisisethan@gmail.com', '4554  Rowes Lane', 'password'),
('james', 'James Washington', '0258786969', 'james@gmail.com', '2316  Mayo Street', 'password'),
('lucas', 'Lucas Rhoades', '7003658500', 'lucas@gmail.com', '2737  Fowler Avenue', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(20) NOT NULL,
  `e_mail` varchar(30) NOT NULL,
  `message` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`name`, `e_mail`, `message`) VALUES
('Nikhil', 'nikhil@gmail.com', 'Hope this works.');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bike_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `razorpay_payment_id` varchar(255) NOT NULL,
  `payment_status` enum('pending','success','failed') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `customer_id`, `bike_id`, `amount`, `payment_date`, `razorpay_payment_id`, `payment_status`) VALUES
(1, 0, 4, 900.00, '2025-03-16 15:12:14', '', 'success'),
(2, 0, 11, 225.00, '2025-03-16 15:48:32', '', 'success');

-- --------------------------------------------------------

--
-- Table structure for table `rentedbikes`
--

CREATE TABLE `rentedbikes` (
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
  `return_status` varchar(10) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `rentedbikes`
--

INSERT INTO `rentedbikes` (`id`, `customer_username`, `bike_id`, `booking_date`, `rent_start_date`, `rent_end_date`, `bike_return_date`, `fare`, `charge_type`, `distance`, `no_of_days`, `total_amount`, `return_status`, `payment_id`, `customer_id`) VALUES
(574681245, 'ethan', 4, '2018-07-18', '2018-07-01', '2018-07-02', '2018-07-18', 11, 'km', 244, 1, 5884, 'R', NULL, NULL),
(574681246, 'james', 6, '2018-07-18', '2018-06-01', '2018-06-28', '2018-07-18', 15, 'km', 69, 27, 5035, 'R', NULL, NULL),
(574681247, 'antonio', 3, '2018-07-18', '2018-07-19', '2018-07-22', '2018-07-20', 13, 'km', 421, 3, 5473, 'R', NULL, NULL),
(574681248, 'ethan', 1, '2018-07-20', '2018-07-28', '2018-07-29', '2018-07-20', 10, 'km', 69, 1, 690, 'R', NULL, NULL),
(574681249, 'james', 1, '2018-07-23', '2018-07-24', '2018-07-25', '2018-07-23', 10, 'km', 500, 1, 5000, 'R', NULL, NULL),
(574681250, 'lucas', 3, '2018-07-23', '2018-07-23', '2018-07-24', '2018-07-23', 2600, 'days', NULL, 1, 2600, 'R', NULL, NULL),
(574681251, 'james', 10, '2018-07-23', '2018-07-25', '2018-07-30', '2018-07-23', 10, 'km', 60, 2, 600, 'R', NULL, NULL),
(574681252, 'christine', 11, '2018-07-23', '2018-07-23', '2018-07-23', '2018-07-23', 13, 'km', 200, 0, 2600, 'R', NULL, NULL),
(574681253, 'christine', 6, '2018-07-23', '2018-07-23', '2018-08-03', '2018-07-23', 2600, 'days', NULL, 11, 28600, 'R', NULL, NULL),
(574681254, 'ethan', 12, '2018-07-23', '2018-07-23', '2018-07-26', '2018-07-23', 3200, 'days', NULL, 3, 9600, 'R', NULL, NULL),
(574681255, 'christine', 8, '2018-07-23', '2018-07-23', '2018-08-08', '2018-07-23', 2400, 'days', NULL, 16, 38400, 'R', NULL, NULL),
(574681257, 'james', 7, '2018-08-11', '2018-08-13', '2018-08-17', NULL, 14, 'km', NULL, NULL, NULL, 'R', NULL, NULL),
(574681258, 'lucas', 3, '2021-03-24', '2021-03-24', '2021-03-25', '2021-03-24', 2600, 'days', NULL, 1, 2600, 'R', NULL, NULL),
(574681259, 'lucas', 14, '2021-03-24', '2021-03-24', '2021-03-26', '2021-03-24', 6100, 'days', NULL, 2, 12200, 'R', NULL, NULL),
(0, 'customer', 1, '2025-03-16', '2025-03-17', '2025-03-18', NULL, 800, 'days', 0, 1, 800, 'R', NULL, NULL),
(0, 'customer', 1, '2025-03-16', '2025-03-17', '2025-03-18', NULL, 800, 'days', 0, 1, 800, 'NR', NULL, NULL),
(0, 'customer', 3, '2025-03-16', '2025-03-27', '2025-03-27', NULL, 1000, 'days', 0, 0, 0, 'NR', NULL, NULL),
(0, 'customer', 3, '2025-03-16', '2025-03-27', '2025-03-27', NULL, 1000, 'days', 0, 0, 0, 'NR', NULL, NULL),
(0, 'customer', 2, '2025-03-16', '2025-03-16', '2025-03-27', NULL, 1200, 'days', 0, 11, 13200, 'NR', NULL, NULL),
(0, '', 4, '2025-03-16', '2025-03-16', '2025-03-17', NULL, 900, 'days', NULL, NULL, NULL, 'NR', 'pay_Q7UH3Ue2gILXC8', ''),
(0, 'customer', 4, '2025-03-16', '2025-03-16', '2025-03-17', NULL, 900, 'days', 0, 1, 900, 'NR', NULL, NULL),
(0, '', 11, '2025-03-16', '0000-00-00', '0000-00-00', NULL, 225, 'km', 5, NULL, NULL, '', 'pay_Q7V5JsVMiGoIhD', ''),
(0, 'customer', 11, '2025-03-16', '2025-03-16', '2025-03-17', NULL, 45, 'km', 5, 0, 225, 'NR', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`bike_id`);

--
-- Indexes for table `clientbikes`
--
ALTER TABLE `clientbikes`
  ADD PRIMARY KEY (`bike_id`),
  ADD KEY `client_username` (`client_username`);

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

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `bike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
