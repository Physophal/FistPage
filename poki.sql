-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 12:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poki`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(11, 'root', 'root@localhost.com', 'a841110c84ececfc83e0b26f2184186f');

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `category_id` int(11) NOT NULL,
  `category_name_en` varchar(100) NOT NULL,
  `category_name_kh` varchar(200) CHARACTER SET utf8 NOT NULL,
  `category_order` double NOT NULL,
  `category_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`category_id`, `category_name_en`, `category_name_kh`, `category_order`, `category_price`) VALUES
(31, 'HOT DRINK', 'ភេសជ្ជះក្តៅ', 1, 4000),
(34, 'ICED DRINK', 'ភេសជ្ជះត្រជាក់', 2, 5000),
(35, 'FRAPPE DRINK', 'ភេសជ្ជះក្រឡុក', 3, 6000),
(36, 'SODA DRINK', 'ភេសជ្ជះសូដា', 4, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `table_homepage`
--

CREATE TABLE `table_homepage` (
  `title_en` varchar(100) CHARACTER SET utf8 NOT NULL,
  `title_kh` varchar(200) NOT NULL,
  `language` varchar(10) NOT NULL,
  `home_menu_en` varchar(200) NOT NULL,
  `home_menu_kh` varchar(50) CHARACTER SET utf8 NOT NULL,
  `footer_en` varchar(200) NOT NULL,
  `footer_kh` varchar(200) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_homepage`
--

INSERT INTO `table_homepage` (`title_en`, `title_kh`, `language`, `home_menu_en`, `home_menu_kh`, `footer_en`, `footer_kh`) VALUES
('Poki Cafe', 'Poki Cafe', 'kh', '', '', 'All rights', 'រក្សាសិទ្ធ'),
('', '', 'kh', 'Home Page', 'ទំព័រដើម', '', ''),
('', '', 'kh', 'Home Page', 'ទំព័រដើម', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `table_product`
--

CREATE TABLE `table_product` (
  `product_id` int(11) NOT NULL,
  `product_name_en` varchar(500) NOT NULL,
  `product_name_kh` varchar(500) CHARACTER SET utf8 NOT NULL,
  `product_description_en` varchar(500) NOT NULL,
  `product_description_kh` varchar(500) CHARACTER SET utf8 NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_order` varchar(500) CHARACTER SET utf8 NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price_kh` float NOT NULL,
  `product_price_en` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_product`
--

INSERT INTO `table_product` (`product_id`, `product_name_en`, `product_name_kh`, `product_description_en`, `product_description_kh`, `product_category`, `product_order`, `product_image`, `product_price_kh`, `product_price_en`) VALUES
(47, 'Cappuccino ', 'កាពូឈីណូ', 'Hot Drink.<br />\r\nCappuccino.', 'ភេសជ្ជះក្តៅ<br />\r\nកាពូឈីណូ', 31, '1', '2021-03-10_08-57-05.jpg', 4000, 0),
(48, 'Chocolate', 'សូកូឡា', 'Hot Drink.<br />\r\nChocolate.', 'ភេសជ្ជះក្តៅ<br />\r\nសូកូឡា', 31, '2', '2021-03-10_09-11-59.jpg', 4000, 0),
(49, 'Espresso ', 'អេសប្រេស្សូ', 'Hot Drink.<br />\r\nEspresso. ', 'ភេសជ្ជះក្តៅ<br />\r\nអេសប្រេស្សូ', 31, '3', '2021-03-10_09-15-19.jpg', 4000, 0),
(50, 'Latte', 'ឡាតេ', 'Hot Drink.<br />\r\nLatte.', 'ភេសជ្ជះក្តៅ<br />\r\nឡាតេ', 31, '4', '2021-03-10_09-16-52.jpg', 4000, 0),
(51, 'Coffee', 'កាហ្វេ', 'ICED DRINK.<br />\r\nCoffee.', 'ភេសជ្ជះត្រជក់<br />\r\nកាហ្វេ', 34, '1', '2021-03-10_10-20-07.jpg', 5000, 0),
(53, 'Coconut Coffee', 'កាហ្វេដូង', 'ICED DRINK.<br />\r\nCoconut Coffee.', 'ភេសជ្ជះត្រជក់<br />\r\nកាហ្វេដូង', 31, '2', '2021-03-10_10-26-29.jpg', 5000, 0),
(55, 'Milk Tea', 'កាហ្វេទឺកដោះគោ', 'ICED DRINK.<br />\r\nMilk Tea.', 'ភេសជ្ជះត្រជក់<br />\r\nកាហ្វេទឺកដោះគោ', 34, '4', '2021-03-11_02-19-01.jpg', 5000, 0),
(56, 'Green Tea', 'តែប៉ៃតង', 'ICED DRINK.<br />\r\nGreen Tea.', 'ភេសជ្ជះត្រជក់<br />\r\nតែប៉ៃតង', 31, '3', '2021-03-11_02-20-24.jpg', 5000, 0),
(57, 'Strawberry ', 'ស្រ្តបឺរី', 'FRAPPE DRINK.<br />\r\nStrawberry.', 'ភេសជ្ជះក្រឡុក<br />\r\nស្រ្តបឺរី', 35, '1', '2021-03-11_02-34-29.jpg', 6000, 0),
(58, 'blueberry ', 'ប្លូប៊ឺរី', 'FRAPPE DRINK.<br />\r\nblueberry.', 'ភេសជ្ជះក្រឡុក<br />\r\nប្លូប៊ឺរី', 35, '2', '2021-03-11_02-42-11.jpg', 6000, 0),
(59, 'Mocha', 'ម៉ូកា', 'FRAPPE DRINK.<br />\r\nMocha.', 'ភេសជ្ជះក្រឡុក<br />\r\nម៉ូកា', 35, '3', '2021-03-11_02-48-00.jpg', 6000, 0),
(60, 'Passion', 'ផាស្សិនក្រឡុក', 'FRAPPE DRINK.<br />\r\nPassion.', 'ភេសជ្ជះក្រឡុក<br />\r\nផាស្សិនក្រឡុក', 35, '4', '2021-03-11_02-56-54.jpg', 6000, 0),
(61, 'Coffee', 'កាហ្វេ', 'FRAPPE DRINK.<br />\r\nCoffee.', 'ភេសជ្ជះក្រឡុក<br />\r\nកាហ្វេ', 35, '5', '2021-03-11_03-03-07.jpg', 6000, 0),
(62, 'Green Tea', 'តែប៉ៃតង', 'FRAPPE DRINK.<br />\r\nGreen Tea.', 'ភេសជ្ជះក្រឡុក<br />\r\nតែប៉ៃតង', 35, '6', '2021-03-11_03-11-38.jpg', 6000, 0),
(63, 'Chocolate', 'សូកូឡា', 'FRAPPE DRINK.<br />\r\nChocolate.', 'ភេសជ្ជះក្រឡុក<br />\r\nសូកូឡា', 35, '7', '2021-03-11_03-20-41.jpg', 6000, 0),
(64, 'Passion', 'ផាស្សិនសូដា', 'SODA DRINK.<br />\r\nPassion.', 'ភេសជ្ជះសូដា<br />\r\nផាស្សិនក្រឡុក', 36, '1', '2021-03-11_03-29-11.jpg', 4000, 0),
(71, 'Ou Kong Tea', 'តែអូខុង', 'ICED DRINK.<br />\r\nOu Kong Tea.', 'ភេសជ្ជះត្រជក់<br />\r\nតែអូខុង', 31, '5', '2021-06-29_03-33-43.jpg', 5000, 1.5),
(72, 'Strawberry ', 'សូដាស្រ្តប៊ឺរី', 'SODA DRINK.<br />\r\nStrawberry.', 'ភេសជ្ជះសូដា<br />\r\nសូដាស្រ្តប៊ឺរី', 31, '4', '2021-06-29_03-47-36.jpg', 4000, 1.5),
(73, 'Blueberry ', 'សូដាប្លូប៊ឺរី', 'SODA DRINK.<br />\r\nBlueberry.', 'ភេសជ្ជះសូដា<br />\r\nBlueberry ', 31, '3', '2021-06-29_03-49-14.jpg', 4000, 1.5),
(74, 'Blue curacao ', 'សូដាប្លូហាវ៉ាយ', 'SODA DRINK.<br />\r\nBlue curacao .', 'ភេសជ្ជះសូដា<br />\r\nសូដាប្លូហាវ៉ាយ', 31, '2', '2021-06-29_03-49-42.jpg', 4000, 1.5);

-- --------------------------------------------------------

--
-- Table structure for table `table_slideshows`
--

CREATE TABLE `table_slideshows` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_slideshows`
--

INSERT INTO `table_slideshows` (`slide_id`, `slide_name`) VALUES
(1, '2021-02-20_04-55-35.jpg'),
(2, '2021-02-20_04-56-13.jpg'),
(4, '2021-02-20_05-31-07.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `table_slideshows`
--
ALTER TABLE `table_slideshows`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `table_product`
--
ALTER TABLE `table_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `table_slideshows`
--
ALTER TABLE `table_slideshows`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
