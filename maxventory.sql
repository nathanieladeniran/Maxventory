-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 23, 2022 at 10:01 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories_table`
--

CREATE TABLE `categories_table` (
  `category_id` bigint(20) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `description` varchar(20000) NOT NULL,
  `created_by` varchar(500) NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_table`
--

INSERT INTO `categories_table` (`category_id`, `category_name`, `description`, `created_by`, `reg_date`) VALUES
(1, 'Story Book', 'A category for all story books', 'Maxapp', '2022-10-19 22:19:50'),
(2, 'Mathematics', 'All book under Arithmentics', 'Maxapp', '2022-10-19 22:38:44'),
(3, 'QDot', 'kjnjknkjnjknkjn', 'Adeyinka', '2022-10-25 19:50:49'),
(4, 'VB', 'pojpoojpojopjpjpojpo', 'Adeyinka', '2022-10-25 19:52:06'),
(5, 'prose', 'jgigiu', 'Adeyinka', '2022-10-25 22:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `customers_table`
--

CREATE TABLE `customers_table` (
  `customer_id` bigint(20) NOT NULL,
  `customer_category` varchar(100) NOT NULL,
  `customer_name` varchar(1000) NOT NULL,
  `customer_mobile` varchar(50) NOT NULL,
  `customer_address` varchar(1000) NOT NULL,
  `customer_email` varchar(1000) DEFAULT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customer_id`, `customer_category`, `customer_name`, `customer_mobile`, `customer_address`, `customer_email`, `reg_date`) VALUES
(1, 'Bookshop', 'Quiva Technologies', '08168905925', '2B, Aare, New Bodija Ibadan', 'nathanieladeniran@gmail.com', '2022-10-20 10:54:51'),
(2, 'Individual', 'Ademokunla Morounke', '98488438944', 'HauptstraÃŸe 2, 76571 Gaggenau, Baden WÃ¼rttemberg', 'morounkea@gmail.com', '2022-10-20 11:04:41'),
(3, 'Bookshop', 'Adewale Sayo', '98363788366', 'HauptstraÃŸe 2, 76571 Gaggenau, Baden WÃ¼rttemberg', 'morounkea@gmail.com', '2022-10-20 19:30:25'),
(5, 'Individual', 'Minin Me', '98363788366', 'Iwo-road\r\nIwo-road', 'kjdcbks@fmail.com', '2022-10-22 09:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `returns_table`
--

CREATE TABLE `returns_table` (
  `return_id` bigint(20) NOT NULL,
  `transaction_ref` varchar(100) NOT NULL,
  `item_no` bigint(20) NOT NULL,
  `item_price` decimal(15,2) NOT NULL,
  `initial_qty` int(11) NOT NULL,
  `return_qty` int(11) NOT NULL,
  `return_staff` varchar(200) NOT NULL,
  `return_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_table`
--

INSERT INTO `returns_table` (`return_id`, `transaction_ref`, `item_no`, `item_price`, `initial_qty`, `return_qty`, `return_staff`, `return_date`) VALUES
(1, '5637252701667613269', 3, '888.00', 1000, 10, 'Alimi', '2022-11-20 13:19:17'),
(2, '5637252701667613269', 4, '2222.00', 100, 10, 'Alimi', '2022-11-20 13:19:18'),
(6, '4464005311668599255', 76, '3000.00', 10, 2, 'Alimi', '2022-11-20 13:32:11'),
(7, '4464005311668599255', 76, '3000.00', 8, 2, 'Alimi', '2022-11-20 13:35:52'),
(8, '4464005311668599255', 76, '3000.00', 6, 1, 'Alimi', '2022-11-20 20:46:43'),
(9, '4464005311668599255', 76, '3000.00', 5, 1, 'Alimi', '2022-11-20 20:47:10'),
(10, '4464005311668599255', 76, '3000.00', 4, 1, 'Alimi', '2022-11-20 20:47:40'),
(11, '5637252701667613269', 9, '888.00', 990, 3, 'Alimi', '2022-11-23 12:19:52'),
(12, '5637252701667613269', 4, '2222.00', 90, 2, 'Alimi', '2022-11-23 12:19:52');

-- --------------------------------------------------------

--
-- Table structure for table `sales_table`
--

CREATE TABLE `sales_table` (
  `sales_id` bigint(20) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `item_id` bigint(20) NOT NULL,
  `item_price` decimal(16,2) NOT NULL,
  `quantity_purchased` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `purchased_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`sales_id`, `transaction_id`, `invoice_number`, `item_id`, `item_price`, `quantity_purchased`, `customer_id`, `purchased_date`) VALUES
(1, '496929181667613122', 'MAX1667613122', 20, '200.00', 10, 5, '2022-11-05 02:52:02'),
(2, '496929181667613122', 'MAX1667613122', 18, '6000.00', 100, 5, '2022-11-05 02:52:02'),
(3, '5637252701667613269', 'MAX1667613269', 9, '888.00', 987, 3, '2022-11-05 02:54:29'),
(4, '5637252701667613269', 'MAX1667613269', 4, '2222.00', 88, 3, '2022-11-05 02:54:29'),
(5, '8472323041667613374', 'MAX1667613374', 18, '6000.00', 1000, 2, '2022-11-05 02:56:14'),
(6, '8472323041667613374', 'MAX1667613374', 4, '2222.00', 100, 2, '2022-11-05 02:56:14'),
(7, '12674627911667614134', 'MAX1667614134', 20, '200.00', 2, 1, '2022-11-05 03:08:54'),
(8, '5774921011667615907', 'MAX1667615907', 21, '3000.00', 2, 5, '2022-11-05 03:38:27'),
(9, '2659977181667617702', 'MAX1667617702', 21, '3000.00', 5, 5, '2022-11-05 04:08:22'),
(10, '2659977181667617702', 'MAX1667617702', 20, '200.00', 10, 5, '2022-11-05 04:08:22'),
(11, '21265406571667657485', 'MAX1667657485', 20, '200.00', 6, 5, '2022-11-05 15:11:25'),
(12, '21265406571667657485', 'MAX1667657485', 18, '6000.00', 10, 5, '2022-11-05 15:11:25'),
(13, '3300352191667740749', 'MAX1667740749', 21, '3000.00', 10, 5, '2022-11-06 14:19:09'),
(14, '17323771901667741019', 'MAX1667741019', 21, '3000.00', 10, 5, '2022-11-06 14:23:39'),
(15, '4682116431667741060', 'MAX1667741060', 21, '3000.00', 10, 5, '2022-11-06 14:24:20'),
(16, '9780796161667741121', 'MAX1667741121', 21, '3000.00', 10, 5, '2022-11-06 14:25:21'),
(17, '9780796161667741121', 'MAX1667741121', 19, '3000.00', 10, 5, '2022-11-06 14:25:21'),
(18, '18515781261667741291', 'MAX1667741291', 18, '6000.00', 5, 1, '2022-11-06 14:28:11'),
(19, '18515781261667741291', 'MAX1667741291', 21, '3000.00', 10, 1, '2022-11-06 14:28:12'),
(20, '19910392661667806558', 'MAX1667806558', 20, '200.00', 1000, 3, '2022-11-07 08:35:58'),
(21, '17666503291667855145', 'MAX1667855145', 21, '3000.00', 5, 5, '2022-11-07 22:05:45'),
(26, '10377964681667906959', 'MAX1667906959', 5, '5858.00', 8, 3, '2022-11-08 12:29:19'),
(27, '10237353581667916708', 'MAX1667916708', 21, '3000.00', 2, 5, '2022-11-08 15:11:48'),
(28, '10237353581667916708', 'MAX1667916708', 20, '200.00', 10, 5, '2022-11-08 15:11:48'),
(29, '20295485501667916964', 'MAX1667916964', 21, '3000.00', 10, 5, '2022-11-08 15:16:04'),
(30, '20295485501667916964', 'MAX1667916964', 19, '3000.00', 100, 5, '2022-11-08 15:16:04'),
(31, '4154853311668019346', 'MAX1668019346', 20, '200.00', 2, 5, '2022-11-09 19:42:26'),
(32, '4154853311668019346', 'MAX1668019346', 19, '3000.00', 2, 5, '2022-11-09 19:42:26'),
(33, '407919281668019447', 'MAX1668019447', 19, '3000.00', 1, 3, '2022-11-09 19:44:07'),
(34, '407919281668019447', 'MAX1668019447', 16, '733.00', 1, 3, '2022-11-09 19:44:07'),
(35, '14916590301668019783', 'MAX1668019783', 20, '200.00', 1, 3, '2022-11-09 19:49:43'),
(36, '14916590301668019783', 'MAX1668019783', 20, '200.00', 3, 3, '2022-11-09 19:49:44'),
(37, '4565096071668020134', 'MAX1668020134', 21, '3000.00', 2, 5, '2022-11-09 19:55:34'),
(38, '4565096071668020134', 'MAX1668020134', 20, '200.00', 3, 5, '2022-11-09 19:55:34'),
(39, '9856820131668020204', 'MAX1668020204', 20, '200.00', 1, 5, '2022-11-09 19:56:44'),
(40, '9856820131668020204', 'MAX1668020204', 18, '6000.00', 1, 5, '2022-11-09 19:56:44'),
(41, '11277623131668020275', 'MAX1668020275', 21, '3000.00', 1, 3, '2022-11-09 19:57:55'),
(42, '8537976231668020308', 'MAX1668020308', 20, '200.00', 3, 2, '2022-11-09 19:58:28'),
(43, '8537976231668020308', 'MAX1668020308', 13, '777.00', 5, 2, '2022-11-09 19:58:28'),
(44, '19642095271668020364', 'MAX1668020364', 13, '777.00', 5, 2, '2022-11-09 19:59:24'),
(45, '19642095271668020364', 'MAX1668020364', 16, '733.00', 3, 2, '2022-11-09 19:59:25'),
(46, '19642095271668020364', 'MAX1668020364', 14, '8334.00', 3, 2, '2022-11-09 19:59:25'),
(47, '7665389081668020412', 'MAX1668020412', 16, '733.00', 3, 2, '2022-11-09 20:00:12'),
(48, '7665389081668020412', 'MAX1668020412', 15, '239.00', 3, 2, '2022-11-09 20:00:12'),
(49, '7665389081668020412', 'MAX1668020412', 7, '47.00', 10, 2, '2022-11-09 20:00:13'),
(50, '17311390511668020454', 'MAX1668020454', 21, '3000.00', 1, 2, '2022-11-09 20:00:54'),
(51, '17311390511668020454', 'MAX1668020454', 17, '377.00', 1, 2, '2022-11-09 20:00:54'),
(52, '17311390511668020454', 'MAX1668020454', 7, '47.00', 1, 2, '2022-11-09 20:00:55'),
(53, '13643718261668020505', 'MAX1668020505', 20, '200.00', 2, 5, '2022-11-09 20:01:45'),
(54, '13643718261668020505', 'MAX1668020505', 16, '733.00', 2, 5, '2022-11-09 20:01:46'),
(55, '13283371911668020572', 'MAX1668020572', 20, '200.00', 2, 3, '2022-11-09 20:02:52'),
(56, '13283371911668020572', 'MAX1668020572', 18, '6000.00', 2, 3, '2022-11-09 20:02:52'),
(57, '18335071961668020840', 'MAX1668020840', 21, '3000.00', 2, 5, '2022-11-09 20:07:20'),
(58, '18335071961668020840', 'MAX1668020840', 19, '3000.00', 2, 5, '2022-11-09 20:07:21'),
(59, '10690660021668020933', 'MAX1668020933', 21, '3000.00', 3, 5, '2022-11-09 20:08:53'),
(60, '10690660021668020933', 'MAX1668020933', 18, '6000.00', 2, 5, '2022-11-09 20:08:53'),
(61, '6623331481668021459', 'MAX1668021459', 17, '377.00', 2, 5, '2022-11-09 20:17:39'),
(62, '6623331481668021459', 'MAX1668021459', 14, '8334.00', 2, 5, '2022-11-09 20:17:39'),
(63, '2060367971668021814', 'MAX1668021814', 20, '200.00', 2, 3, '2022-11-09 20:23:34'),
(64, '2060367971668021814', 'MAX1668021814', 17, '377.00', 3, 3, '2022-11-09 20:23:34'),
(65, '2060367971668021814', 'MAX1668021814', 14, '8334.00', 4, 3, '2022-11-09 20:23:34'),
(66, '2060367971668021814', 'MAX1668021814', 11, '777.00', 2, 3, '2022-11-09 20:23:35'),
(67, '8018715111668021986', 'MAX1668021986', 18, '6000.00', 3, 5, '2022-11-09 20:26:26'),
(68, '8018715111668021986', 'MAX1668021986', 12, '777.00', 2, 5, '2022-11-09 20:26:26'),
(69, '8018715111668021986', 'MAX1668021986', 17, '377.00', 3, 5, '2022-11-09 20:26:26'),
(70, '30732581668434284', 'MAX1668434284', 20, '200.00', 3, 3, '2022-11-14 14:58:04'),
(71, '30732581668434284', 'MAX1668434284', 19, '3000.00', 10, 3, '2022-11-14 14:58:05'),
(72, '17192601021668434765', 'MAX1668434765', 18, '6000.00', 1, 5, '2022-11-14 15:06:05'),
(73, '17192601021668434765', 'MAX1668434765', 14, '8334.00', 10, 5, '2022-11-14 15:06:06'),
(74, '811036271668598907', 'MAX1668598907', 21, '3000.00', 10, 5, '2022-11-16 12:41:47'),
(75, '9795297141668599206', 'MAX1668599206', 21, '3000.00', 10, 3, '2022-11-16 12:46:46'),
(76, '4464005311668599255', 'MAX1668599255', 21, '3000.00', 3, 5, '2022-11-16 12:47:35'),
(77, '5629973501668974154', 'MAX1668974179', 21, '3000.00', 20, 3, '2022-11-20 20:56:19'),
(78, '15258493871668974511', 'MAX1668974534', 21, '3000.00', 20, 5, '2022-11-20 21:02:14'),
(79, '14555047261668974662', 'MAX1668974718', 16, '733.00', 10, 2, '2022-11-20 21:05:18'),
(80, '6844230141668974798', 'MAX1668974819', 18, '6000.00', 12, 5, '2022-11-20 21:06:59'),
(81, '7750107961668975113', 'MAX1668975131', 18, '6000.00', 10, 1, '2022-11-20 21:12:11'),
(82, '5075387771668975684', 'MAX1668975703', 17, '377.00', 2, 5, '2022-11-20 21:21:43'),
(83, '20596961311669113150', 'MAX1669113171', 21, '3000.00', 20, 5, '2022-11-22 11:32:51'),
(84, '1764920041669113202', 'MAX1669113222', 16, '733.00', 100, 2, '2022-11-22 11:33:42'),
(85, '583268471669147552', 'MAX1669147576', 21, '3000.00', 10, 5, '2022-11-22 21:06:16'),
(86, '5628088061669147609', 'MAX1669147634', 19, '3000.00', 15, 5, '2022-11-22 21:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `stocks_table`
--

CREATE TABLE `stocks_table` (
  `stock_id` bigint(20) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `stock_no` varchar(20) NOT NULL,
  `stock_name` varchar(500) NOT NULL,
  `stock_description` varchar(2000) NOT NULL,
  `stock_retail_price` decimal(16,2) NOT NULL,
  `stock_sale_price` decimal(16,2) NOT NULL,
  `stock_quantity` bigint(20) NOT NULL,
  `stock_author` varchar(1000) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_table`
--

INSERT INTO `stocks_table` (`stock_id`, `category_name`, `stock_no`, `stock_name`, `stock_description`, `stock_retail_price`, `stock_sale_price`, `stock_quantity`, `stock_author`, `add_date`) VALUES
(1, 'prose', '6272778', 'Quantitative', 'kjsdidsoihid', '200.00', '3000.00', 1000, 'Max African Publisher', '2022-10-19 18:52:53'),
(2, 'prose', '844848', 'Bopma', 'kjndsncoicdf', '200.00', '200.00', 2000, 'Max African Publisher', '2022-10-19 19:01:57'),
(4, 'prose', '6272778', 'Bopma', 'sjbkasjbcas', '2222.00', '2222.00', 234, 'Max African Publisher', '2022-10-19 19:09:12'),
(5, 'prose', '6272778', 'Quantitative', 'kjdfidf', '884.00', '5858.00', 56, 'Max African Publisher', '2022-10-19 19:10:03'),
(6, 'prose', '6272778', 'Bopma', 'kjbdvuigdsuds', '7457.00', '848.00', 765, 'Max African Publisher', '2022-10-19 19:10:47'),
(7, 'prose', '88484', 'Quantitative', 'mbcjdbsuids', '7448.00', '47.00', 53, 'Max African Publisher', '2022-10-19 19:35:04'),
(8, 'prose', '8754754', 'Quantitative', 'kdbsvklnovlds', '48488.00', '4848.00', 64, 'Max African Publisher', '2022-10-19 19:36:05'),
(9, 'prose', 'yy44=9r', 'Quantitative', 'jvkjsdbviubdf', '99.00', '888.00', 20, 'Max African Publisher', '2022-10-19 22:23:10'),
(10, 'prose', '7373', 'Bopma', 'kjbciucbds', '83.00', '883.00', 33, 'Max African Publisher', '2022-10-19 22:24:04'),
(11, 'prose', '6272778', 'Bopma', 'dkjgsdd', '777.00', '777.00', 75, 'Max African Publisher', '2022-10-19 22:25:17'),
(12, 'prose', '6272778', 'Bopma', 'dkjgsdd', '777.00', '777.00', 75, 'Max African Publisher', '2022-10-19 22:25:24'),
(13, 'prose', '6272', 'Bopma', 'dkjgsdd', '777.00', '777.00', 72, 'Max African Publisher', '2022-10-19 22:25:37'),
(14, 'prose', '8754754', 'Bopma', 'jdbvsdiugdd', '838.00', '8334.00', 14, 'Max African Publisher', '2022-10-19 22:26:10'),
(15, 'prose', '887338', 'kfhioew', ',dcnlidhd', '384381.00', '239.00', 35, 'Max African Publisher', '2022-10-19 22:29:41'),
(16, 'prose', 'yy44=9r', 'Bopma', 'hvcjdvcd', '7373.00', '733.00', -82, 'Max African Publisher', '2022-10-19 22:32:41'),
(17, 'prose', '7373', 'Bopma', '', '737.00', '377.00', 726, 'Max African Publisher', '2022-10-19 22:33:25'),
(18, 'prose', 'Aq444', 'Ade goes to school', 'a story telling bookknklnlnolnionp', '500.00', '6000.00', 2464, 'Max African Publisher', '2022-10-19 23:13:04'),
(19, 'Mathematics', '8754754', 'kfhioew', 'kdhcoidshoid', '2222.00', '3000.00', 348, '3', '2022-10-24 11:57:48'),
(21, 'Story Book', 'w77979237', 'BTY', 'klncklacnasinos', '2000.00', '3000.00', 1873, 'Nathaniel ADENIRAN', '2022-11-05 03:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions_table`
--

CREATE TABLE `transactions_table` (
  `tr_id` bigint(20) NOT NULL,
  `transaction_no` varchar(100) NOT NULL,
  `invoice_no` varchar(100) NOT NULL,
  `customer` bigint(20) NOT NULL,
  `sold_by` varchar(200) NOT NULL,
  `discount` float NOT NULL,
  `amount_due` decimal(15,2) NOT NULL,
  `amount_paid` decimal(15,2) NOT NULL,
  `paytype` varchar(50) NOT NULL,
  `paymtd` varchar(50) NOT NULL,
  `transaction_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_table`
--

INSERT INTO `transactions_table` (`tr_id`, `transaction_no`, `invoice_no`, `customer`, `sold_by`, `discount`, `amount_due`, `amount_paid`, `paytype`, `paymtd`, `transaction_date`) VALUES
(1, '496929181667613122', 'MAX1667613122', 5, 'Alimi', 20, '481600.00', '481600.00', 'Full Payment', 'Bank Transfer', '2022-11-05 02:52:02'),
(2, '5637252701667613269', 'MAX1667613269', 3, 'Alimi', 20, '857593.60', '500000.00', 'Part Payment', 'Cash', '2022-11-05 02:54:29'),
(3, '8472323041667613374', 'MAX1667613374', 2, 'Alimi', 20, '4977760.00', '0.00', 'No Payment', 'None', '2022-11-05 02:56:14'),
(4, '12674627911667614134', 'MAX1667614134', 1, 'Alimi', 20, '640.00', '320.00', 'Full Payment', 'Debit Card', '2022-11-05 03:08:54'),
(5, '5774921011667615907', 'MAX1667615907', 5, 'Alimi', 20, '4800.00', '2000.00', 'Part Payment', 'Debit Card', '2022-11-05 03:38:28'),
(6, '2659977181667617702', 'MAX1667617702', 5, 'Alimi', 20, '13600.00', '13000.00', 'Part Payment', 'Cash', '2022-11-05 04:08:23'),
(7, '21265406571667657485', 'MAX1667657485', 5, 'Alimi', 20, '48960.00', '48960.00', 'Full Payment', 'Cash', '2022-11-05 15:11:26'),
(8, '9780796161667741121', 'MAX1667741121', 5, 'Alimi', 20, '48000.00', '48000.00', 'Full Payment', 'Bank Transfer', '2022-11-06 14:25:21'),
(9, '18515781261667741291', 'MAX1667741291', 1, 'Alimi', 30, '48000.00', '28000.00', 'Part Payment', 'Bank Transfer', '2022-11-06 14:28:12'),
(10, '19910392661667806558', 'MAX1667806558', 3, 'Alimi', 20, '160000.00', '160000.00', 'Full Payment', 'Debit Card', '2022-11-07 08:35:58'),
(11, '17666503291667855145', 'MAX1667855145', 5, 'Alimi', 20, '172000.00', '0.00', 'No Payment', 'None', '2022-11-07 22:05:45'),
(12, '13718040751667855245', 'MAX1667855245', 5, 'Alimi', 20, '160000.00', '60000.00', 'Part Payment', 'Bank Transfer', '2022-11-07 22:07:25'),
(13, '17809194721667855282', 'MAX1667855282', 5, 'Alimi', 20, '160000.00', '160000.00', 'Full Payment', 'Cash', '2022-11-07 22:08:02'),
(14, '20295485501667916964', 'MAX1667916964', 5, 'Alimi', 20, '264000.00', '264000.00', 'Full Payment', 'Bank Transfer', '2022-11-08 15:16:04'),
(15, '4154853311668019346', 'MAX1668019346', 5, 'Alimi', 20, '5120.00', '0.00', 'No Payment', 'None', '2022-11-09 19:42:26'),
(16, '407919281668019447', 'MAX1668019447', 3, 'Alimi', 20, '2986.40', '2000.00', 'Part Payment', 'Bank Transfer', '2022-11-09 19:44:08'),
(17, '14916590301668019783', 'MAX1668019783', 3, 'Alimi', 20, '640.00', '640.00', 'Full Payment', 'Bank Transfer', '2022-11-09 19:49:44'),
(18, '4565096071668020134', 'MAX1668020134', 5, 'Alimi', 20, '5280.00', '5280.00', 'Full Payment', 'Bank Transfer', '2022-11-09 19:55:34'),
(19, '9856820131668020204', 'MAX1668020204', 5, 'Alimi', 20, '4960.00', '4960.00', 'Full Payment', 'Cash', '2022-11-09 19:56:44'),
(20, '11277623131668020275', 'MAX1668020275', 3, 'Alimi', 20, '2400.00', '2400.00', 'Full Payment', 'Cash', '2022-11-09 19:57:56'),
(21, '8537976231668020308', 'MAX1668020308', 2, 'Alimi', 20, '3588.00', '3588.00', 'Full Payment', 'Cash', '2022-11-09 19:58:28'),
(22, '19642095271668020364', 'MAX1668020364', 2, 'Alimi', 20, '24868.80', '24868.80', 'Full Payment', 'Cash', '2022-11-09 19:59:25'),
(23, '7665389081668020412', 'MAX1668020412', 2, 'Alimi', 20, '2708.80', '2708.80', 'Full Payment', 'Cash', '2022-11-09 20:00:13'),
(24, '17311390511668020454', 'MAX1668020454', 2, 'Alimi', 20, '2739.20', '2739.20', 'Full Payment', 'Cash', '2022-11-09 20:00:55'),
(25, '13643718261668020505', 'MAX1668020505', 5, 'Alimi', 10, '27000.00', '7000.00', 'Full Payment', 'Bank Transfer', '2022-11-09 20:01:46'),
(26, '13283371911668020572', 'MAX1668020572', 3, 'Alimi', 20, '9920.00', '9920.00', 'Full Payment', 'Bank Transfer', '2022-11-09 20:02:52'),
(27, '18335071961668020840', 'MAX1668020840', 5, 'Alimi', 20, '9600.00', '0.00', 'No Payment', 'Debit Card', '2022-11-09 20:07:21'),
(28, '10690660021668020933', 'MAX1668020933', 5, 'Alimi', 20, '16800.00', '0.00', 'No Payment', 'Cash', '2022-11-09 20:08:53'),
(29, '6623331481668021459', 'MAX1668021459', 5, 'Alimi', 20, '13937.60', '0.00', 'No Payment', 'Bank Transfer', '2022-11-09 20:17:40'),
(30, '2060367971668021814', 'MAX1668021814', 3, 'Alimi', 20, '29136.80', '29136.80', 'Full Payment', 'Bank Transfer', '2022-11-09 20:23:35'),
(31, '8018715111668021986', 'MAX1668021986', 5, 'Alimi', 20, '16548.00', '12000.00', 'Part Payment', 'Bank Transfer', '2022-11-09 20:26:26'),
(32, '30732581668434284', 'MAX1668434284', 3, 'Alimi', 20, '30600.00', '24480.00', 'Full Payment', 'Bank Transfer', '2022-11-14 14:58:06'),
(33, '17192601021668434765', 'MAX1668434765', 5, 'Alimi', 10, '80406.00', '80406.00', 'Full Payment', 'Bank Transfer', '2022-11-14 15:06:06'),
(34, '811036271668598907', 'MAX1668598907', 5, 'Alimi', 10, '30000.00', '7000.00', 'Part Payment', 'Bank Transfer', '2022-11-16 12:41:48'),
(35, '9795297141668599206', 'MAX1668599206', 3, 'Alimi', 20, '24000.00', '4000.00', 'Part Payment', 'Bank Transfer', '2022-11-16 12:46:46'),
(36, '4464005311668599255', 'MAX1668599255', 5, 'Alimi', 10, '8100.00', '7000.00', 'Part Payment', 'Bank Transfer', '2022-11-16 12:47:35'),
(37, '5629973501668974154', 'MAX1668974179', 3, 'Alimi', 20, '48000.00', '48000.00', 'Full Payment', 'Bank Transfer', '2022-11-20 20:56:19'),
(38, '15258493871668974511', 'MAX1668974534', 5, 'Alimi', 0, '60000.00', '60000.00', 'Full Payment', 'Debit Card', '2022-11-20 21:02:14'),
(39, '14555047261668974662', 'MAX1668974718', 2, 'Alimi', 0, '7330.00', '7330.00', 'Full Payment', 'Cash', '2022-11-20 21:05:18'),
(40, '6844230141668974798', 'MAX1668974819', 5, 'Alimi', 0, '72000.00', '72000.00', 'Full Payment', 'Cash', '2022-11-20 21:06:59'),
(41, '7750107961668975113', 'MAX1668975131', 1, 'Alimi', 0, '60000.00', '60000.00', 'Full Payment', 'Bank Transfer', '2022-11-20 21:12:11'),
(42, '5075387771668975684', 'MAX1668975703', 5, 'Alimi', 0, '754.00', '754.00', 'Full Payment', 'Bank Transfer', '2022-11-20 21:21:43'),
(43, '20596961311669113150', 'MAX1669113171', 5, 'Alimi', 10, '54000.00', '54000.00', 'Full Payment', 'Bank Transfer', '2022-11-22 11:32:51'),
(44, '1764920041669113202', 'MAX1669113222', 2, 'Alimi', 10, '65970.00', '65970.00', 'Full Payment', 'Bank Transfer', '2022-11-22 11:33:42'),
(45, '583268471669147552', 'MAX1669147576', 5, 'Alimi', 10, '27000.00', '27000.00', 'Full Payment', 'Bank Transfer', '2022-11-22 21:06:16'),
(46, '5628088061669147609', 'MAX1669147634', 5, 'Alimi', 10, '40500.00', '20000.00', 'Part Payment', 'Bank Transfer', '2022-11-22 21:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `user_id` bigint(20) NOT NULL,
  `user_rollno` varchar(10) NOT NULL,
  `user_lname` varchar(500) NOT NULL,
  `user_fname` varchar(500) NOT NULL,
  `user_role` varchar(30) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_mobile` varchar(20) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(1000) DEFAULT NULL,
  `user_address` varchar(2000) NOT NULL,
  `acct_name` varchar(300) DEFAULT NULL,
  `acct_no` varchar(15) DEFAULT NULL,
  `bank` varchar(500) DEFAULT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_dob` varchar(10) NOT NULL,
  `user_image` varchar(1000) NOT NULL,
  `g1_name` varchar(400) DEFAULT NULL,
  `g1_phone` varchar(50) DEFAULT NULL,
  `g1_email` varchar(2000) DEFAULT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_rollno`, `user_lname`, `user_fname`, `user_role`, `user_email`, `user_mobile`, `username`, `password`, `user_address`, `acct_name`, `acct_no`, `bank`, `user_status`, `user_dob`, `user_image`, `g1_name`, `g1_phone`, `g1_email`, `reg_date`) VALUES
(1, 'Max00001', 'Alimi', 'Oyeniyi', 'Chief Executive Officer', 'niyi@gmail.com', '08169258728', 'Oyeniyi', '$2y$10$4riF.Nn6orCN5.s49oIAmOi8B5zh4h7tsbpYUH55KCfmkrH8gXgHa', 'Oke-Ado', '', '', '', 'ACTIVE', '', '', '', '', '', '2022-10-19 00:00:00'),
(2, 'Max00002', 'Adeniran', 'Adeyinka', 'General Manager', 'nathanieladeniran@gmail.com', '08168905925', 'Adeyinka', '$2y$10$2NalKB66aS857QOOqJdiyuc8xPJ4WX/SGXAvIKDoOl61j.vSu6lhW', '2B, Aare, New Bodija Ibadan', NULL, NULL, NULL, 'ACTIVE', '1990-02-20', '../staffimage/1666998168-001.jpg', 'Adeyinka Adeniran', NULL, 'nathanieladeniran@gmail.com', '2022-10-21 13:02:32'),
(3, 'Max00003', 'ADENIRAN', 'Olumide', 'General Manager', 'olumideadeniran@gmail.com', '98488438944', 'Olumide', '$2y$10$GR3F1GSfxmFiYFd4VPxvfuhoVKYnWd4SvPtX0UeJBbij9BMvKKr2S', '98488438944', NULL, NULL, NULL, 'SUSPENDED', '2022-11-03', '', 'Me n U', NULL, 'n@m.com', '2022-10-21 13:17:05'),
(4, 'Max00004', 'OlaBunmi', 'Ojo', 'HR Manager', 'ola@yahoo.com', '98363788366', 'Ojo', NULL, 'No 39, Mydrecht Street, Bothasig milnerton', NULL, NULL, NULL, 'ACTIVE', '2022-04-01', 'img/product/1666434011-562563_426803460672505_554200673_n.jpg', NULL, NULL, NULL, '2022-10-22 11:20:11'),
(5, 'Max00005', 'ADENIRAN', 'Olumide', 'HR Manager', 'olumideadeniran@gmail.com', '08168905925', 'Olumide', '$2y$10$ADUMUk00mCwt8aZuOlt0b.MnLcMCibdSo31QiPhUnf0t7f2Itjn5G', 'No 39, Mydrecht Street, Bothasig milnerton', NULL, NULL, NULL, 'ACTIVE', '2021-11-12', 'img/product/1666434108-a00458be2f325153c4dc104f8a17aa12faf30544.jpg', NULL, NULL, NULL, '2022-10-22 11:21:48'),
(6, 'Max00006', 'OlaBunmi', 'Ojo', 'HR Manager', 'ola@yahoo.com', '98363788366', 'Ojo', NULL, '98363788366', NULL, NULL, NULL, 'SUSPENDED', '2022-05-12', '../staffimage/1666724563-0a1803e2d40e588307e2da7e73aa1faab679b7de.jpg', 'ldsvildsih', NULL, 'nathanieladeniran@gmail.com', '2022-10-25 20:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `vendors_table`
--

CREATE TABLE `vendors_table` (
  `vendor_id` bigint(20) NOT NULL,
  `vendor_name` varchar(1000) NOT NULL,
  `vendor_phone` varchar(50) NOT NULL,
  `vendor_email` varchar(1000) NOT NULL,
  `vendor_address` varchar(2000) NOT NULL,
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors_table`
--

INSERT INTO `vendors_table` (`vendor_id`, `vendor_name`, `vendor_phone`, `vendor_email`, `vendor_address`, `add_date`) VALUES
(1, 'Nathaniel ADENIRAN', '98363788366', 'olumideadeniran@gmail.com', 'No 39, Mydrecht Street, Bothasig milnerton', '2022-10-24 11:45:02'),
(2, 'Olumide Ezekiel ADENIRAN', '98488438944', 'olumideadeniran@gmail.com', 'No 39, Mydrecht Street, Bothasig milnerton', '2022-10-24 11:49:15'),
(3, 'Ademokunla Morounke', '98488438944', 'mokea@gmail.com', 'HauptstraÃŸe 2, 76571 Gaggenau, Baden WÃ¼rttemberg', '2022-10-24 11:49:56'),
(6, 'Ojo OlaBunmi', '98363788366', 'ola@yahoo.com', 'Iwo-road\r\nIwo-road', '2022-10-24 11:52:00'),
(7, 'Nathaniel ADENIRAN', '98488438944', 'olumideadeniran@gmail.com', 'No 39, Mydrecht Street, Bothasig milnerton', '2022-10-25 17:41:46'),
(8, 'Adeyinka Adeniran', '98488438944', 'nathanieladeniran@gmail.com', 'Iwo-road\r\nIwo-road', '2022-10-25 19:50:01'),
(10, 'Max African Publisher', '08168905925', 'nathanieladeniran@gmail.com', '2B, Aare, New Bodija Ibadan', '2022-10-25 22:22:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories_table`
--
ALTER TABLE `categories_table`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers_table`
--
ALTER TABLE `customers_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `returns_table`
--
ALTER TABLE `returns_table`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `sales_table`
--
ALTER TABLE `sales_table`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `stocks_table`
--
ALTER TABLE `stocks_table`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `transactions_table`
--
ALTER TABLE `transactions_table`
  ADD PRIMARY KEY (`tr_id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vendors_table`
--
ALTER TABLE `vendors_table`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories_table`
--
ALTER TABLE `categories_table`
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers_table`
--
ALTER TABLE `customers_table`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `returns_table`
--
ALTER TABLE `returns_table`
  MODIFY `return_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sales_table`
--
ALTER TABLE `sales_table`
  MODIFY `sales_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `stocks_table`
--
ALTER TABLE `stocks_table`
  MODIFY `stock_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions_table`
--
ALTER TABLE `transactions_table`
  MODIFY `tr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors_table`
--
ALTER TABLE `vendors_table`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
