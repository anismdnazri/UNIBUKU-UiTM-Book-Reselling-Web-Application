-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2019 at 02:53 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unibuku`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `Name` varchar(250) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Mobile` varchar(250) NOT NULL,
  `Subject` varchar(250) NOT NULL,
  `Message` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Name`, `Email`, `Mobile`, `Subject`, `Message`) VALUES
('Anis', 'Anis@gmail.com', '0142426418', 'ZUL', '');


-- --------------------------------------------------------
--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('Anis', 'Anis', 'anis@gmail.com', '0142426418', 'No 20 Jalan Suasana', 'anis');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `I_ID` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `images_path` varchar(200) NOT NULL,
  `options` varchar(10) NOT NULL DEFAULT 'ENABLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`I_ID`, `name`, `price`, `description`, `images_path`, `options`) VALUES
(1, 'Kiub Pati Ikan Bilis Adabi 60gm', 2 , 'Kiub Pati Ikan Bilis Adabi 60gm', 'images/ikanbilis.png', 'ENABLE'),
(2, 'Perencah Sup Daging & Tulang Adabi 200gm', 6 , 'Adabi 200gm', 'images/Supdaging.png', 'ENABLE'),
(3, 'Serbuk Kunyit Campuran Adabi 250gm', 6 , 'Serbuk Kunyit Campuran Adabi 250gm', 'images/serbukkunyit.jpeg', 'ENABLE'),
(4, 'Garam Halus Adabi 400gm', 2, 'Adabi Garam 400gm', 'images/garamhalus.png', 'ENABLE'),
(5, 'Alnoor Cuka Epal 380ml', 10, 'ALNOOR Apple Vinegar Cuka Epal (380ML) Cuka Epal', 'images/cuka.png', 'ENABLE'),
(6, 'Tok Ma Rempah Kari Ikan (250g)', 4, 'Rempah Kari Ikan', 'images/kariikan.png', 'ENABLE'),
(7, 'Kings Baking Powder 100gm', 2, 'Baking Powder', 'images/bakingpowder.png', 'ENABLE'),
(8, 'Cheng Chan Sos Tiram 510g', 5, 'Sos Tiram', 'images/sostiram.jpeg', 'ENABLE'),
(9, 'Adabi Asam Jawa Xtra 200g', 5, 'Adabi Asam Jawa', 'images/asamjawa.png', 'ENABLE'),
(10, 'Baba’s Kurma Mix (125g)', 5, 'Serbuk Rempah Kurma from Baba’s', 'images/kurmamix.png', 'ENABLE'),
(11, 'Adela Blended Sunflower & Canola Oil 3kg', 31, 'Sunflower & Canola Oil ', 'images/oil.png', 'ENABLE'),
(12, 'Maggi 2 Minute Big Curry (5x111g)', 6, 'Instant Noodle Maggi', 'images/maggikari.jpg', 'ENABLE'),
(13, 'Maggi Pedas Giler Roasted Chicken (5 x76g)', 3, 'Maggi Pedas Flavor', 'images/maggipedas.jpg', 'ENABLE'),
(14, 'Maggi 2 Minute Big Tom Yam (5x112g)', 7, 'Maggi Flavor Tom Yam', 'images/maggitomyam.jpg', 'ENABLE'),
(15, 'Daun Kesum (1 pkt)', 2, '1 packet of Daun Kesum approximately +/-100g', 'images/daunkesum.jpeg', 'ENABLE'),
(16, 'Green Spinach (Bayam Hijau) per pack 150g', 2, 'per pack (150g)', 'images/spinach.jpg', 'ENABLE'),
(17, 'Cherry Tomato (+/-250g)', 3, 'per pack (250g)', 'images/tomato.jpg', 'ENABLE'),
(18, 'Red Chilli (Cili Merah) +/- 100g', 3, 'per pack (250g)', 'images/cilimerah.jpg', 'ENABLE'),
(19, 'Red Cabbage (Kobis Merah) per pack for +/- 350g', 3, 'per pack (350g)', 'images/bawang.jpg', 'ENABLE'),
(20, 'Pak Choy (+/- 250g)', 4, 'Pak Choy (+/- 250g)', 'images/pakchoy.jpg', 'ENABLE');


-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `owner` (
  `username` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manager`
--

INSERT INTO `owner` (`username`, `fullname`, `email`, `contact`, `address`, `password`) VALUES
('azim', 'Zulazim', 'azim@gmail.com', '0173640211', 'No 19 Jalan Suasana', 'azim');


-- --------------------------------------------------------

--
-- Table structure for table `rider`
--
CREATE TABLE `rider` (
  `rider_ID` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rider`
--

INSERT INTO `rider` (`rider_ID`, `username`,`contact`, `password`) VALUES
(1, 'azim', '0173640211', 'azim');


-- --------------------------------------------------------

--
-- Table structure for table `rider`
--
CREATE TABLE `cashier` (
  `cashier_ID` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rider`
--

INSERT INTO `cashier` (`cashier_ID`, `username`,`contact`, `password`) VALUES
(1, 'azim', '0173640211', 'azim');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_ID` int(30) NOT NULL,
  `I_ID` int(30) NOT NULL,
  `foodname` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL,
  `order_date` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'PREPARING',
  `paymentstatus` varchar(10) NOT NULL DEFAULT 'UNPAID',
  `paymentmethod` varchar(10) NOT NULL DEFAULT '-'
--  `T_ID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`I_ID`);
--
-- Indexes for table `manager`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`username`);
  --
  -- Indexes for table `rider`
  --
  ALTER TABLE `rider`
    ADD PRIMARY KEY (`rider_ID`);
    --
    -- Indexes for table `cashier`
    --
  ALTER TABLE `cashier`
    ADD PRIMARY KEY (`cashier_ID`);
--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `I_ID` (`I_ID`),
  ADD KEY `username` (`username`);
--  ADD KEY `T_ID` (`T_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `I_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_ID` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
--
--
--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`I_ID`) REFERENCES `menu` (`I_ID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`username`) REFERENCES `customer` (`username`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
