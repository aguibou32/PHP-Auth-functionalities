-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2018 at 03:00 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(250) NOT NULL,
  `brand_status` enum('active','inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(250) NOT NULL,
  `category_status` enum('active','inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order`
--

CREATE TABLE `inventory_order` (
  `inventory_order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `inventory_order_total` double(10,2) NOT NULL,
  `inventory_order_date` date NOT NULL,
  `inventory_order_name` varchar(255) NOT NULL,
  `inventory_order_address` text NOT NULL,
  `payment_status` enum('cash','credit','','') NOT NULL,
  `inventory_order_status` varchar(100) NOT NULL,
  `inventory_order_created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_order_product`
--

CREATE TABLE `inventory_order_product` (
  `inventory_order_product_id` int(11) NOT NULL,
  `inventory_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `tax` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_description` text NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_unit` varchar(150) NOT NULL,
  `product_base_price` double(10,2) NOT NULL,
  `product_tax` decimal(4,2) NOT NULL,
  `product_minimum_order` double(10,2) NOT NULL,
  `product_enter_by` int(11) NOT NULL,
  `product_status` enum('active','inactive','','') NOT NULL,
  `product_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_type` enum('master','user','','') NOT NULL,
  `user_status` enum('Active','Inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `user_email`, `user_password`, `user_name`, `user_type`, `user_status`) VALUES
(5, 'admin@gmail.com', '$2y$10$wRsajvzpGUstygnWjhUGeeIVUuAegP4qELXmMIDmbld.JXlX1p5HK', 'admin', 'master', 'Active'),
(6, 'customer01@gmail.com', '$2y$10$.wgL5fG0/P4weYVaC/9Nlu7uwnCd3Y5kGmufPw3W4Cr6VEb9/8GXi', 'user1', 'user', 'Active'),
(7, 'customer02@gmail.com', '$2y$10$Gi0ESa4bb7C4VWHNaiSoeue/RbdlRbwal.OdFZK2hWZgHGKzf0UdG', 'user2', 'user', 'Active'),
(8, 'customer04@gmail.com', '$2y$10$yvRVsVGt3lM.M8LEAdACcu5K8LnhJKeNNvPgNWEA7C/MK8H9I0QBe', 'user4', 'user', 'Active'),
(9, 'admin@gmail.com', '$2y$10$T.IcEi4WNCMl7kkcJEXw6ODPnBDA/GqK1kJ.sRM3MU/Zlw8yTVHaW', 'xyz', 'user', 'Active'),
(10, 'admin@gmail.com', '$2y$10$9czlC0XO2PeWTD5ZIfTM/.xZvX4sdacstxfuuShuntOpRGeMlfjIC', 'customer03', 'user', 'Active'),
(11, 'admin@gmail.com', '$2y$10$1jGMJNaKCtqSfO3/DtTJbOz0p4giBHt2vOyloeH0G2Lsgsvt4TwZ2', 'user3', 'user', 'Active'),
(12, 'diogo@gmail', '$2y$10$4UhOEJwqNpsjoQ2oZcD41OY0nP6865VNkp9/8YW6RJZtAqtDdsiem', 'thierno', 'user', 'Active'),
(13, 'thierno@gmail.com', '$2y$10$f/Z/u7M0xyQlio58DjnOaO9BYo8AczypBSEEjNoZH32s/Cs7/3jzi', 'thierno12', 'user', 'Active'),
(14, 'simu@gmail.com', '$2y$10$ukhnHPoPnr8QxpwCDiT65OzOMQMCjaHaPme9o7W6xUsEukYpC3bFa', 'simu', 'user', 'Active'),
(15, 'abiguimemaster@info.com', '$2y$10$Qp58Di5oseHWbtg1S9SGDuSRy3xt4ZasKucJM.3EGdkc4TFmeSOrm', 'abiguimeMasta', 'user', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `inventory_order`
--
ALTER TABLE `inventory_order`
  ADD PRIMARY KEY (`inventory_order_id`);

--
-- Indexes for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  ADD PRIMARY KEY (`inventory_order_product_id`),
  ADD UNIQUE KEY `inventory_order_product_id` (`inventory_order_product_id`,`inventory_order_id`,`product_id`,`quantity`,`price`,`tax`),
  ADD UNIQUE KEY `inventory_order_product_id_3` (`inventory_order_product_id`),
  ADD KEY `inventory_order_product_id_2` (`inventory_order_product_id`,`inventory_order_id`,`product_id`,`quantity`,`price`,`tax`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_order`
--
ALTER TABLE `inventory_order`
  MODIFY `inventory_order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_order_product`
--
ALTER TABLE `inventory_order_product`
  MODIFY `inventory_order_product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
