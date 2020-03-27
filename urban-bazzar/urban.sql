-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2019 at 07:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urban`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` bigint(20) NOT NULL,
  `f_name` varchar(50) DEFAULT NULL,
  `l_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `photo` varchar(255) NOT NULL,
  `address` varchar(190) DEFAULT NULL,
  `contact` varchar(10) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL,
  `status` enum('active','in_active') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `f_name`, `l_name`, `email`, `password`, `photo`, `address`, `contact`, `role`, `status`) VALUES
(9, 'anisha', 'rauniyar', 'anisha@gmail.com', '759adfcf909ea2f9bd083e8b60cbb6d4', 'afdf121a042933e7f27003f045c4c069.jpg', 'kuleshwor', '9818544722', 'admin', 'active'),
(13, 'smarika', 'rijal', 'smarika@gmail.com', 'f993009d405a28bc2d26ad0c83a68f28', 'bf1aaf9853cd0fe490c922b5d7383aa7.jpg', 'Badhrawas', '9823674387', 'admin', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` bigint(20) NOT NULL,
  `brand_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(9, 'Bajaj'),
(7, 'Channel'),
(5, 'Dior'),
(11, 'Goldstar'),
(10, 'Usha'),
(6, 'Zara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `product_id` bigint(20) NOT NULL,
  `cust_id` bigint(20) NOT NULL,
  `product_amount` bigint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`product_id`, `cust_id`, `product_amount`) VALUES
(9, 1, 3),
(9, 11, 3),
(10, 1, 9),
(11, 1, 3),
(11, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(6, 'Clothes'),
(4, 'Furniture'),
(5, 'Home Appliances'),
(7, 'Perfume'),
(8, 'Shoes'),
(9, 'Utensil');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `message_id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `message_status` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`message_id`, `name`, `phone`, `email`, `message`, `message_status`) VALUES
(1, 'anisha rauniyar', 9864444475, 'anisha@gmail.com', 'it was a lovely experience', '1'),
(3, 'Anisha Rauniyar', 9818544722, 'anisha@gmail.com', 'it works really well', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_custlogin`
--

CREATE TABLE `tbl_custlogin` (
  `cust_id` bigint(20) NOT NULL,
  `cust_fname` varchar(50) DEFAULT NULL,
  `cust_lname` varchar(50) DEFAULT NULL,
  `cust_email` varchar(100) DEFAULT NULL,
  `cust_password` varchar(255) DEFAULT NULL,
  `cust_address` varchar(100) DEFAULT NULL,
  `cust_phone` bigint(10) DEFAULT NULL,
  `cust_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_custlogin`
--

INSERT INTO `tbl_custlogin` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_password`, `cust_address`, `cust_phone`, `cust_photo`) VALUES
(8, 'anisha', 'rauniyar', 'anisha@gmail.com', '759adfcf909ea2f9bd083e8b60cbb6d4', 'kuleshwor', 9818544722, '00000IMG_00000_BURST20190427113036757_COVER.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_item`
--

CREATE TABLE `tbl_item` (
  `product_id` bigint(20) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_price` bigint(10) DEFAULT NULL,
  `product_quantity` bigint(10) DEFAULT NULL,
  `product_photo` varchar(255) DEFAULT NULL,
  `product_description` text,
  `category_id` bigint(20) DEFAULT NULL,
  `brand_id` bigint(20) DEFAULT NULL,
  `product_status` enum('available','unavailable') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_item`
--

INSERT INTO `tbl_item` (`product_id`, `product_name`, `product_price`, `product_quantity`, `product_photo`, `product_description`, `category_id`, `brand_id`, `product_status`) VALUES
(9, 'KURTA', 100, 13, 'db13b912805b85f8dcdc064d92c34a97.jpg', 'made up of cotton', 6, 5, 'available'),
(10, 'Miss rose', 1000, 9, '0d3d61d3ef49ccb1f32aea277480eb37.jpg', 'it has a good fragnance', 7, 5, 'available'),
(11, 'Rice Cooker', 5000, 0, 'c0abfc50a733dcf219d8114685c8ff71.jpg', 'made of great quality material', 5, 10, 'unavailable'),
(12, 'Fan', 1000, 30, 'd9e5fdf0f94931810eba4bdd5fcd126c.jpg', 'high speed fan', 5, 10, 'available'),
(13, 'Sofa', 50000, 3, '857eba474e0316b4df5d122901fa7e3b.jpg', 'made up of great fabric', 4, 9, 'available'),
(14, 'Lights', 150, 397, '63847619645e941dd058c62c1860dcba.jpg', 'long life', 5, 10, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) DEFAULT NULL,
  `cust_id` bigint(20) DEFAULT NULL,
  `product_amount` bigint(100) DEFAULT NULL,
  `order_status` enum('Confirmed','Cancel','Pending') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `product_id`, `cust_id`, `product_amount`, `order_status`) VALUES
(10, 9, 11, 10, 'Cancel'),
(11, 10, 11, 11, 'Confirmed'),
(12, 9, 11, 1, 'Cancel'),
(13, 10, 1, 30, 'Confirmed'),
(14, 11, 1, 6, 'Confirmed'),
(15, 9, 1, 8, 'Pending'),
(16, 10, 1, 1, 'Confirmed'),
(17, 11, 1, 1, 'Pending'),
(18, 10, 1, 3, 'Confirmed'),
(19, 14, 1, 3, 'Pending'),
(20, 10, 1, 3, 'Confirmed'),
(21, 11, 1, 4, 'Pending'),
(23, 9, 1, 2, 'Pending'),
(24, 11, 1, 4, 'Pending'),
(26, 11, 1, 2, 'Pending'),
(27, 13, 1, 1, 'Pending'),
(28, 10, 6, 3, 'Confirmed'),
(29, 10, 8, 4, 'Pending'),
(30, 9, 8, 3, 'Pending'),
(31, 11, 8, 1, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`),
  ADD UNIQUE KEY `brand_name_2` (`brand_name`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`product_id`,`cust_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_name` (`category_name`),
  ADD UNIQUE KEY `category_name_2` (`category_name`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_custlogin`
--
ALTER TABLE `tbl_custlogin`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `cust_email` (`cust_email`);

--
-- Indexes for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_custlogin`
--
ALTER TABLE `tbl_custlogin`
  MODIFY `cust_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_item`
--
ALTER TABLE `tbl_item`
  MODIFY `product_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_item`
--
ALTER TABLE `tbl_item`
  ADD CONSTRAINT `brand_id` FOREIGN KEY (`brand_id`) REFERENCES `tbl_brand` (`brand_id`),
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
