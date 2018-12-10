-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 01:45 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ictya`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_order` (IN `order_product_id` INT(20), IN `order_qty` INT(20))  BEGIN

DECLARE order_id INT DEFAULT 0;
DECLARE email_id VARCHAR(255);
DECLARE amount_total INT DEFAULT 0;
DECLARE CurrentQty INT DEFAULT 0;
SELECT product_qty INTO CurrentQty FROM ictya.products WHERE product_id = order_product_id;

SELECT orderid,email,total_amount INTO order_id,email_id,amount_total FROM ictya.order ORDER BY orderid DESC LIMIT 1;
INSERT INTO `ictya`.`orders`
(`orderid`,
`productid`,
`quantity`,
`order_status`)
VALUES
(order_id,
order_product_id,
order_qty,
"completed"
);
UPDATE ictya.products
SET
product_qty = CurrentQty - order_qty
WHERE `product_id` = order_product_id;
INSERT INTO `ictya`.`payment`
(`orderid`,
`total_price`,
`email`)
VALUES
(order_id,
amount_total,
email_id);


END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_name` varchar(255) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `gender` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(12) NOT NULL,
  `email` varchar(45) NOT NULL,
  `total_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `order_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `orderid` int(11) NOT NULL,
  `total_price` int(50) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `productimage` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `category_id` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `userprofile`
--

CREATE TABLE `userprofile` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `UserId` varchar(255) NOT NULL,
  `phno` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `groupId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userprofile`
--

INSERT INTO `userprofile` (`Id`, `email`, `password`, `firstname`, `lastname`, `UserId`, `phno`, `address`, `groupId`) VALUES
(2, 'ravireddy667@gmail.com', 'ce1c1cdc2fac8e1167f22cd4bd88d324', 'Raghavendra', 'Bokka', 'qqqq', '7047476586', '10115 woodberry trail ln\r\nApt 733', 3),
(3, 'test@test.com', 'ce1c1cdc2fac8e1167f22cd4bd88d324', 'test', 'test', 'test', '12345', '123', 1),
(4, 'test1@test.com', 'ce1c1cdc2fac8e1167f22cd4bd88d324', 'test', 'test', '', '12345', '345', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `name` (`orderid`),
  ADD UNIQUE KEY `date` (`total_price`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `userprofile`
--
ALTER TABLE `userprofile`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userprofile`
--
ALTER TABLE `userprofile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
