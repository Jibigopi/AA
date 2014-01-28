-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2013 at 09:33 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ancientagro`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `customer_type` varchar(255) NOT NULL,
  `address` varchar(200) NOT NULL,
  `shipping_address` varchar(100) NOT NULL,
  `finance_manager` varchar(100) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date_of_record` varchar(20) NOT NULL,
  `web` varchar(255) NOT NULL,
  `handed_off_day` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  `organic_certi` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `account_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `guid`, `first_name`, `last_name`, `customer_type`, `address`, `shipping_address`, `finance_manager`, `phone`, `email`, `date_of_record`, `web`, `handed_off_day`, `images`, `organic_certi`, `status`, `account_status`) VALUES
(4, 'uyiu897897n9x85734c84935nv8934867 5', 'nijan k', '', 'xavier', 'bangalore', 'Alabama', 'us', '78789789', 'nijan@yahoo.com', '', '', '0', '', '0', 0, 0),
(5, 'oiaxenow 8r09583450a840v580948n6709vb80', 'Monish', 'Km', 'Retail shops', 'bangalore', 'Alabama', 'us', '78789789', 'nijan@yahoo.com', '05.05.2013', 'www.pluskb.com', '34', '', '34', 0, 0),
(6, '', 'jibi', 'gopi', 'Roadshow', 'bngalore', 'keral', 'Ck Jhone', '7795398584', 'jibi@yahoo.com', '06.05.2013', 'www.pluskb.com', '67678', '', '789798', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_type`
--

CREATE TABLE IF NOT EXISTS `customer_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `type` varchar(109) NOT NULL,
  `active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `customer_type`
--

INSERT INTO `customer_type` (`id`, `guid`, `type`, `active`) VALUES
(5, '71f2c3d9d4ca796c7109c2e2da76dc58', 'Websales', 0),
(6, 'ab4da8a16ef7b47dd50d42cc4d4f44b5', 'Roadshow', 0),
(8, 'a226013d002fed2e2b75fc3fd15bb61e', 'Community Markets', 0),
(10, 'c971b657626d83249c6fbe6548d569ff', 'Retail shops', 0);

-- --------------------------------------------------------

--
-- Table structure for table `grains`
--

CREATE TABLE IF NOT EXISTS `grains` (
  `id` int(200) NOT NULL AUTO_INCREMENT,
  `guid` varchar(100) NOT NULL,
  `gcode` varchar(200) NOT NULL,
  `dis` varchar(100) NOT NULL,
  `nutrition` varchar(255) NOT NULL,
  `sku` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `grains`
--

INSERT INTO `grains` (`id`, `guid`, `gcode`, `dis`, `nutrition`, `sku`, `name`, `cat_name`) VALUES
(1, '92904710f82d386e939cacece3b536b1', 'GRN 1-01', 'Sonora (CItr 3036) is a common wheat (Triticum aestivum ssp aestivum)', '', 'DU75AQ', 'Sonora Wheat', 'Category 7'),
(2, 'f3deef730b019ce82395e085de4ff6df', 'GRN 1-02', 'Ethiopian Blue Tinge is an Abyssinian emmer wheat (Triticum turgidum ssp. dicoccum)', '', 'EJQM789', 'Ethopian Blue Tinge', 'Category 3'),
(3, 'fae48e718ffc6d182beba2fe396e2aa7', 'GRN 1-03', 'Durum Iraq', '', 'REPNT768', 'Durum Iraq', 'Category 7'),
(4, '1c0e25b96a59deb9421282495082ca1f', 'GRN-10059', 'test product', '', '9iouoiuoiuo', 'Product Two', 'Category 7'),
(5, 'c8a5fbf66eff0cffec6dca6b162fdb67', 'GRN-1005555', 'Test description', 'test nutrition', '8768768768', 'Product Four', 'Category 7');

-- --------------------------------------------------------

--
-- Table structure for table `grains_category`
--

CREATE TABLE IF NOT EXISTS `grains_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `grains_category`
--

INSERT INTO `grains_category` (`id`, `name`, `description`) VALUES
(9, 'Category 7', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_stock`
--

CREATE TABLE IF NOT EXISTS `inventory_stock` (
  `id` int(11) NOT NULL,
  `guid` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `inventory_id` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `unit_price` varchar(30) NOT NULL,
  `case` varchar(255) NOT NULL,
  `case_price` varchar(30) NOT NULL,
  `pallet` varchar(255) NOT NULL,
  `pallet_price` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory_stock`
--

INSERT INTO `inventory_stock` (`id`, `guid`, `stock_id`, `inventory_id`, `unit`, `unit_price`, `case`, `case_price`, `pallet`, `pallet_price`) VALUES
(1, '', '', 'fae48e718ffc6d182beba2fe396e2aa7', '12445', '13', '13143', '125', '42342', '136'),
(2, '', '', 'c8a5fbf66eff0cffec6dca6b162fdb67', '12445', '16', '13143', '320', '42342', '3200'),
(0, '', '', '92904710f82d386e939cacece3b536b1', '1000', '17', '1000', '18', '1000', '21');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_transfers`
--

CREATE TABLE IF NOT EXISTS `inventory_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(30) NOT NULL,
  `guid` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `orgin_location` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `authorized_by` varchar(100) NOT NULL,
  `transport_vendor` varchar(100) NOT NULL,
  `millage` varchar(100) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `unit` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `inventory_transfers`
--

INSERT INTO `inventory_transfers` (`id`, `date`, `guid`, `stock_id`, `orgin_location`, `destination`, `authorized_by`, `transport_vendor`, `millage`, `reason`, `unit`) VALUES
(1, '05.05.2013', '', 'a3e18b882f25530e5f56c8fc009023c0', 'Test loaction 1', 'Test loaction 2', 'manager', 'vendor 1', 'nothng', 'its not god product', '1000'),
(2, '09.06.2014', '', 'a3e18b882f25530e5f56c8fc009023c0', '', '4', 'manager', 'test', 'millage', 'its not god product', '1000'),
(3, '09.06.2014', '', 'a3e18b882f25530e5f56c8fc009023c0', '', '4', 'manager', 'test', 'millage', 'its not god product', '1000'),
(4, '09.06.2014', '', 'a3e18b882f25530e5f56c8fc009023c0', '', '4', 'manager', 'test', 'millage', 'its not god product', '1000'),
(5, '09.06.2014', '', 'a3e18b882f25530e5f56c8fc009023c0', '', '5', 'manager', 'test', 'milage', 'its not god product', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_withdrawals`
--

CREATE TABLE IF NOT EXISTS `inventory_withdrawals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `label` varchar(100) NOT NULL,
  `pallet_serial_no` int(11) NOT NULL,
  `issue_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `inventory_withdrawals`
--

INSERT INTO `inventory_withdrawals` (`id`, `guid`, `stock_id`, `date`, `label`, `pallet_serial_no`, `issue_type`) VALUES
(1, '', 'a3e18b882f25530e5f56c8fc009023c0', '13.05.2013', 'test-label', 142, '1'),
(2, '', '2f209d440de9ea073ecb8118a59f473a', '13.05.2013', 'fdgreryr', 0, '1'),
(3, '', 'a71e0aafe592a92e6390d7bd0fa11125', '05.05.2013', '6876876876868', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `name`, `value`) VALUES
(1, 'sales_order', '11');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `customer` varchar(100) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `zip` varchar(200) NOT NULL,
  `sfirst_name` varchar(200) NOT NULL,
  `slast_name` varchar(200) NOT NULL,
  `saddress` varchar(200) NOT NULL,
  `sphone` varchar(200) NOT NULL,
  `semail` varchar(200) NOT NULL,
  `scountry` varchar(200) NOT NULL,
  `sstate` varchar(200) NOT NULL,
  `szip` varchar(200) NOT NULL,
  `order_id` varchar(200) NOT NULL,
  `status` varchar(2) NOT NULL,
  `total_amount` varchar(50) NOT NULL,
  `payment_status` varchar(20) NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer`, `first_name`, `last_name`, `address`, `phone`, `email`, `country`, `state`, `zip`, `sfirst_name`, `slast_name`, `saddress`, `sphone`, `semail`, `scountry`, `sstate`, `szip`, `order_id`, `status`, `total_amount`, `payment_status`, `date`) VALUES
(1, '', 'sridhar', 'bala', 'bangalore', '788980989080', 'sri@yahoo.com', 'us', 'mary land', '876765', 'sridhar', 'bala', 'bangalore', '788980989080', 'sri@yahoo.com', 'us', 'mary land', '876765', '79fe4439ef3258fe990e6de17f2f8921', '', '410.00', '0', '2013/12/05'),
(2, '', 'sridhar', 'bala', 'bangalore', '788980989080', 'sri@yahoo.com', 'us', 'mary land', '876765', 'sridhar', 'bala', 'bangalore', '788980989080', 'sri@yahoo.com', 'us', 'mary land', '876765', 'b08c64169c06e8eadb0e90afda762588', '1', '410.00', '0', '2013/12/05'),
(3, '6', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', '4f56456ff0f52600c65aec784bfe809e', '1', '410.00', '0', '2013/12/05'),
(4, '6', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', '83f2a185d7216eea66bb428f285476e7', '1', '2,080.00', '0', '2013/12/05'),
(5, '6', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', 'f35adb0c920605935755136e492c08b7', '1', '41.00', '0', '2013/12/05'),
(6, '6', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', 'jibi', 'gopi', '#133', '7795398584', 'jibi@gmail.com', 'india', 'karnataka', '787878', '6f8aa46aad2cbcaffb1d59eda3abc68b', '1', '', '0', '2013/12/05'),
(7, '7', 'monish', 'km', '133 hsr layout', '9767876', 'monish34@yahoo.com', 'us', 'Alabama', '789798', 'monish', 'km', '133 hsr layout', '9767876', 'monish34@yahoo.com', 'US', 'Alabama', '789798', '0e36dc5cd06089ae4384d02e46620aca', '1', '42.00', '0', '2013/12/05'),
(8, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', 'b9de64a28e7fd9e65bc4b19f055787ae', '1', '42.00', '0', '2013/12/05'),
(9, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', '81e0b5e732bcb0cade0e788fcf550e75', '1', '56.00', '0', '2013/12/05'),
(10, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', '3aec5cd7bed371843c74061487de0450', '1', '28.00', '0', '2013/12/05'),
(11, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', '146dfb30d67f3a7d88395afca5c85849', '1', '28.00', '0', '2013/12/05'),
(12, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', '2bdaab3b399dd80c517c48ba601aed9a', '1', '42.00', '0', '2013/12/05'),
(13, '6', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'us', 'Alabama', '787878', 'jibi', 'gopi', '#133\r\nhsr layout', '7795398584', 'jibi@gmail.com', 'US', 'Alabama', '787878', 'dc4dc627d59568eefbac68c09c9ad799', '1', '42.00', '', '2013/12/05');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `grain` varchar(200) NOT NULL,
  `grain_name` varchar(200) NOT NULL,
  `price` varchar(50) NOT NULL,
  `quty` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `grain`, `grain_name`, `price`, `quty`) VALUES
(1, '5340ac08b06be8badc7e697c2dce28a4', '1', 'Sonora Wheat', '15', 10),
(2, '5340ac08b06be8badc7e697c2dce28a4', '2', 'Ethopian Blue Tinge', '12', 10),
(3, '5340ac08b06be8badc7e697c2dce28a4', '3', 'Durum Iraq', '14', 10),
(4, 'b08c64169c06e8eadb0e90afda762588', '1', 'Sonora Wheat', '15', 10),
(5, 'b08c64169c06e8eadb0e90afda762588', '2', 'Ethopian Blue Tinge', '12', 10),
(6, 'b08c64169c06e8eadb0e90afda762588', '3', 'Durum Iraq', '14', 10),
(7, '4f56456ff0f52600c65aec784bfe809e', '1', 'Sonora Wheat', '15', 10),
(8, '4f56456ff0f52600c65aec784bfe809e', '2', 'Ethopian Blue Tinge', '12', 10),
(9, '4f56456ff0f52600c65aec784bfe809e', '3', 'Durum Iraq', '14', 10),
(10, '83f2a185d7216eea66bb428f285476e7', '1', 'Sonora Wheat', '15', 20),
(11, '83f2a185d7216eea66bb428f285476e7', '2', 'Ethopian Blue Tinge', '12', 20),
(12, '83f2a185d7216eea66bb428f285476e7', '3', 'Durum Iraq', '14', 110),
(13, 'f35adb0c920605935755136e492c08b7', '1', 'Sonora Wheat', '15', 1),
(14, 'f35adb0c920605935755136e492c08b7', '2', 'Ethopian Blue Tinge', '12', 1),
(15, 'f35adb0c920605935755136e492c08b7', '3', 'Durum Iraq', '14', 1),
(16, '0e36dc5cd06089ae4384d02e46620aca', '1', 'Sonora Wheat', '16', 1),
(17, '0e36dc5cd06089ae4384d02e46620aca', '2', 'Ethopian Blue Tinge', '12', 1),
(18, '0e36dc5cd06089ae4384d02e46620aca', '3', 'Durum Iraq', '14', 1),
(19, 'b9de64a28e7fd9e65bc4b19f055787ae', '1', 'Sonora Wheat', '16', 1),
(20, 'b9de64a28e7fd9e65bc4b19f055787ae', '2', 'Ethopian Blue Tinge', '12', 1),
(21, 'b9de64a28e7fd9e65bc4b19f055787ae', '3', 'Durum Iraq', '14', 1),
(22, '81e0b5e732bcb0cade0e788fcf550e75', '1', 'Sonora Wheat', '16', 1),
(23, '81e0b5e732bcb0cade0e788fcf550e75', '2', 'Ethopian Blue Tinge', '12', 1),
(24, '81e0b5e732bcb0cade0e788fcf550e75', '3', 'Durum Iraq', '14', 2),
(25, '3aec5cd7bed371843c74061487de0450', '1', 'Sonora Wheat', '16', 1),
(26, '3aec5cd7bed371843c74061487de0450', '2', 'Ethopian Blue Tinge', '12', 1),
(27, '146dfb30d67f3a7d88395afca5c85849', '1', 'Sonora Wheat', '16', 1),
(28, '146dfb30d67f3a7d88395afca5c85849', '2', 'Ethopian Blue Tinge', '12', 1),
(29, '2bdaab3b399dd80c517c48ba601aed9a', '1', 'Sonora Wheat', '16', 1),
(30, '2bdaab3b399dd80c517c48ba601aed9a', '2', 'Ethopian Blue Tinge', '12', 1),
(31, '2bdaab3b399dd80c517c48ba601aed9a', '3', 'Durum Iraq', '14', 1),
(32, 'dc4dc627d59568eefbac68c09c9ad799', '1', 'Sonora Wheat', '16', 1),
(33, 'dc4dc627d59568eefbac68c09c9ad799', '2', 'Ethopian Blue Tinge', '12', 1),
(34, 'dc4dc627d59568eefbac68c09c9ad799', '3', 'Durum Iraq', '14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_transaction`
--

CREATE TABLE IF NOT EXISTS `payment_transaction` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) NOT NULL,
  `key` int(11) NOT NULL,
  `value` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `receiving_notes`
--

CREATE TABLE IF NOT EXISTS `receiving_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `stock_id` varchar(255) NOT NULL,
  `delivery_date` varchar(30) NOT NULL,
  `delivery_status` int(11) NOT NULL,
  `received_by` varchar(100) NOT NULL,
  `receiving_date` varchar(25) NOT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `invoice_stauts` int(11) NOT NULL,
  `accounts` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `receiving_notes`
--

INSERT INTO `receiving_notes` (`id`, `guid`, `stock_id`, `delivery_date`, `delivery_status`, `received_by`, `receiving_date`, `invoice_no`, `invoice_stauts`, `accounts`) VALUES
(1, '', '', '', 0, '', '', '', 0, ''),
(2, '', 'a3e18b882f25530e5f56c8fc009023c0', '06.05.2013', 1, 'manager', '06.05.2013', 'SR-INV-102', 1, 'manager'),
(3, '', '5c58e6ce4d7d7c51a19a77665702ddea', '06.05.2013', 1, 'manager', '06.05.2013', 'SR-INV-103', 1, 'manager'),
(4, '', '2f209d440de9ea073ecb8118a59f473a', '13.05.2013', 1, 'iuiouo', '22.12.2013', '809809', 1, '7997'),
(5, '', 'a71e0aafe592a92e6390d7bd0fa11125', '13.05.2013', 1, '34646', '06.05.2013', 'SR-INV-102', 0, 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `customer` varchar(100) NOT NULL,
  `product` varchar(30) NOT NULL,
  `pallet` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `no_of_unit` varchar(30) NOT NULL,
  `shipping` varchar(30) NOT NULL,
  `tax` varchar(30) NOT NULL,
  `total` varchar(30) NOT NULL,
  `order_received_date` varchar(30) NOT NULL,
  `processed_date` varchar(30) NOT NULL,
  `shipping_date` varchar(30) NOT NULL,
  `delivery_date` varchar(30) NOT NULL,
  `provider` varchar(100) NOT NULL,
  `received_by` varchar(30) NOT NULL,
  `customer_received` varchar(30) NOT NULL,
  `payment` varchar(30) NOT NULL,
  `invoice_paid_date` varchar(30) NOT NULL,
  `returns` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sales_chanel`
--

CREATE TABLE IF NOT EXISTS `sales_chanel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `sales_chanel`
--

INSERT INTO `sales_chanel` (`id`, `name`) VALUES
(9, 'Websales'),
(10, 'Roadshow'),
(11, 'Community Markets'),
(12, 'Consumer direct sales'),
(13, 'Whole Sale'),
(14, 'Retail shops'),
(15, 'Event Catering'),
(16, 'Restaurants'),
(17, 'Hospitals'),
(18, 'Corporate Cafes'),
(19, 'Gifts');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `invoice` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `receipient` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `no_of_unit` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `amount_for_unit` varchar(100) NOT NULL,
  `case_unit` varchar(255) NOT NULL,
  `case_price` varchar(255) NOT NULL,
  `case_amount` varchar(255) NOT NULL,
  `pallet_unit` varchar(255) NOT NULL,
  `pallet_price` varchar(255) NOT NULL,
  `pallet_amount` varchar(255) NOT NULL,
  `tax` varchar(255) NOT NULL,
  `payment_term` varchar(255) NOT NULL,
  `date_created` varchar(30) NOT NULL,
  `sales_tax` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `sales_status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`id`, `guid`, `number`, `invoice`, `customer`, `receipient`, `address`, `product`, `no_of_unit`, `price`, `amount_for_unit`, `case_unit`, `case_price`, `case_amount`, `pallet_unit`, `pallet_price`, `pallet_amount`, `tax`, `payment_term`, `date_created`, `sales_tax`, `description`, `discount`, `total_price`, `grand_total`, `status`, `sales_status`) VALUES
(9, 'bd623d7dfdc272be7e2942608b0d10c0', 'AA-SO-11009', 'AA-INV-209', 'oiaxenow 8r09583450a840v580948n6709vb80', 'banglore', 'karanata', 'fae48e718ffc6d182beba2fe396e2aa7', '12', '13', '156', '16', '125', '2000', '55', '136', '7480', '12', 'cash', '12.05.2013', '', 'test description', '50', '9636', '9598', 1, 1),
(10, '0d77fb0b348c4e6f077f333290415864', 'AA-SO-11010', 'AA-INV-20010', 'oiaxenow 8r09583450a840v580948n6709vb80', 'HSR Layout', 'bangalore', 'c8a5fbf66eff0cffec6dca6b162fdb67', '34', '16', '544', '56', '320', '17920', '67', '3200', '214400', '34', 'cash', '05.05.2013', '', 'Test Description', '56', '232864', '232842', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales_receipts`
--

CREATE TABLE IF NOT EXISTS `sales_receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `sales_order` varchar(255) NOT NULL,
  `shipping_provider` varchar(255) NOT NULL,
  `shipping_date` varchar(30) NOT NULL,
  `delivery_date` varchar(30) NOT NULL,
  `customer_received_date` varchar(30) NOT NULL,
  `invoice_paid_date` varchar(30) NOT NULL,
  `received_by` varchar(255) NOT NULL,
  `returns` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `shipping_cost` varchar(255) NOT NULL,
  `grand_total` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sales_receipts`
--

INSERT INTO `sales_receipts` (`id`, `guid`, `invoice_number`, `sales_order`, `shipping_provider`, `shipping_date`, `delivery_date`, `customer_received_date`, `invoice_paid_date`, `received_by`, `returns`, `notes`, `shipping_cost`, `grand_total`) VALUES
(7, '', 'AA-INV-1010', '0d77fb0b348c4e6f077f333290415864', 'SMCC', '03.01.2014', '03.01.2014', '03.01.2014', '03.01.2014', 'manager', 'test', 'test', '6767', '232842'),
(8, '', 'AA-INV-109', 'bd623d7dfdc272be7e2942608b0d10c0', 'SMCC', '13.05.2013', '03.01.2014', '03.01.2014', '03.01.2014', 'Manger', 'Test', 'test', '67', '9598');

-- --------------------------------------------------------

--
-- Table structure for table `stage`
--

CREATE TABLE IF NOT EXISTS `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `stage`
--

INSERT INTO `stage` (`id`, `name`) VALUES
(1, 'Growing Harvesting'),
(2, 'Cleaning Storage'),
(3, 'Co-Packer'),
(4, 'Organic Farm');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `stock_id` varchar(255) NOT NULL,
  `stage` varchar(25) NOT NULL,
  `grain_id` varchar(255) NOT NULL,
  `date` varchar(20) NOT NULL,
  `no_of_case_each_pallet` int(100) NOT NULL,
  `no_of_unit_each_case` int(100) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `case_label` varchar(255) NOT NULL,
  `pallet_number` varchar(255) NOT NULL,
  `no_of_unit` varchar(100) NOT NULL,
  `no_case` int(11) NOT NULL,
  `no_pallet` int(11) NOT NULL,
  `best_buy_date` varchar(20) NOT NULL,
  `unit_purchase_price` varchar(200) NOT NULL,
  `unit_sales_price` varchar(200) NOT NULL,
  `case_purchase_price` varchar(200) NOT NULL,
  `case_sales_price` varchar(100) NOT NULL,
  `pallet_purchase_price` varchar(100) NOT NULL,
  `pallet_sales_price` varchar(100) NOT NULL,
  `amount_for_unit` varchar(100) NOT NULL,
  `amount_for_case` varchar(100) NOT NULL,
  `amount_for_pallet` varchar(100) NOT NULL,
  `location` varchar(50) NOT NULL,
  `grain_name` varchar(100) NOT NULL,
  `guid` varchar(255) NOT NULL,
  `used_sqr_ft` varchar(255) NOT NULL,
  `transport` varchar(255) NOT NULL,
  `temp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `stock_id`, `stage`, `grain_id`, `date`, `no_of_case_each_pallet`, `no_of_unit_each_case`, `supplier`, `case_label`, `pallet_number`, `no_of_unit`, `no_case`, `no_pallet`, `best_buy_date`, `unit_purchase_price`, `unit_sales_price`, `case_purchase_price`, `case_sales_price`, `pallet_purchase_price`, `pallet_sales_price`, `amount_for_unit`, `amount_for_case`, `amount_for_pallet`, `location`, `grain_name`, `guid`, `used_sqr_ft`, `transport`, `temp`) VALUES
(54, 'INV-147', 'Organic Farm', '1c0e25b96a59deb9421282495082ca1f', '', 13, 12, '3', '6876876876868', '687687687687687678687', '1000', 13, 23, '31.12.2013', '12', '15', '14', '15', '23', '25', '12000', '31850', '529', '4', '', 'a71e0aafe592a92e6390d7bd0fa11125', '1200', 'ewtwe', '345'),
(56, 'INV-150', 'Organic Farm', 'f3deef730b019ce82395e085de4ff6df', '2013/12/24', 78, 677, '3', 'oiuoi', 'oiuoi', '670', 670, 7870, '06.05.2013', '670', '67', '670', '76', '8780', '78', '448900', '448900', '69098600', '3', '', '14b6bf0c2d5051225a0c8e2d4a01be76', '12000', 'tryrt', 'tryr'),
(57, 'INV-1498', 'Organic Farm', '92904710f82d386e939cacece3b536b1', '2013/12/26', 34, 13, '3', '', '', '1000', 1000, 1000, '12.05.2013', '14', '17', '16', '18', '18', '21', '1400', '16000', '18000', '4', '', '25a7f5448fe2ede079195c998ea93eab', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `storage_location`
--

CREATE TABLE IF NOT EXISTS `storage_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_sqr_ft` varchar(255) NOT NULL,
  `avilable` varchar(200) NOT NULL,
  `price` varchar(30) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `temp` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `storage_location`
--

INSERT INTO `storage_location` (`id`, `guid`, `name`, `total_sqr_ft`, `avilable`, `price`, `contact`, `phone`, `email`, `temp`) VALUES
(3, '', 'Location Three', '1000', '-12500', '12', 'Bangalore', '7795398584', 'jibi@gmail.com', ''),
(4, '', 'Location four', '12000', '-1587', '12', 'Hsr layout', '78789789', 'jibi@gmail.com', ''),
(5, '', 'Location five', '1678', '1000', '13', 'Bangalore', '78789789', 'jibi@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guid` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `guid`, `name`, `company`, `address`, `email`, `phone`) VALUES
(3, '', 'Supplier', 'Sonora Pasta Spirals', 'UK', 'pasta@yahoo.com', '987676767'),
(4, '', 'Coke Farms', 'Sonora Whole Wheat Flour 5LB', 'US', 'coke_farms@yahoo.com', '78979879879`');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `guid` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `country` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `guid`, `username`, `first_name`, `last_name`, `address`, `country`, `state`, `zip`, `email`, `phone`, `password`, `user`) VALUES
(4, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin', 'bangalore', '', '', '', 'sri@yahoo.com', '78789789', '21232f297a57a5a743894a0e4a801fc3', 1),
(5, '', 'sridhar', 'sridhar', 'bala', 'bangalore', 'us', 'mary land', '876765', 'sri@yahoo.com', '788980989080', '21232f297a57a5a743894a0e4a801fc3', 0),
(6, '', 'jibi343', 'jibi', 'gopi', '#133\r\nhsr layout', 'india', 'karnataka', '787878', 'jibi@gmail.com', '7795398584', '21232f297a57a5a743894a0e4a801fc3', 0),
(7, '', 'monish', 'monish', 'km', '133 hsr layout', 'us', 'Alabama', '789798', 'monish34@yahoo.com', '9767876', '21232f297a57a5a743894a0e4a801fc3', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
