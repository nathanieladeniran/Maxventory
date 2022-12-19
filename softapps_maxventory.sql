-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2022 at 02:07 PM
-- Server version: 10.2.44-MariaDB-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softapps_maxventory`
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
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_table`
--

INSERT INTO `categories_table` (`category_id`, `category_name`, `description`, `created_by`, `reg_date`) VALUES
(1, 'Story Book', 'All story books', 'Max African Publisher', '2022-10-19 22:19:50'),
(2, 'Mathematics', 'All book under Arithmentics', 'Max African Publisher', '2022-10-19 22:38:44'),
(3, 'English', 'All English books', 'Max African Publisher', '2022-10-25 19:50:49'),
(4, 'Verbal & Quantitative', 'Verbal and Quantitative reasoning', 'Max African Publisher', '2022-10-25 19:52:06'),
(5, 'Handwriting', 'All handwriting books', 'Max African Publisher', '2022-10-25 22:36:01'),
(6, 'Colouring', 'All Colouring books', 'Max African Publisher', '2022-10-25 19:50:06');

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
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers_table`
--

INSERT INTO `customers_table` (`customer_id`, `customer_category`, `customer_name`, `customer_mobile`, `customer_address`, `customer_email`, `reg_date`) VALUES
(1, 'School', 'Ponmile Nur/Pry School', '08076819044', 'Sobu, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(2, 'School', 'Gateway Nur/Pry School', '08054589948', 'Barika, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(3, 'School', 'Immazubar Nur/Pry School', '08029186116', 'Barika, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(4, 'School', 'Unique Nur/Pry School', '07012556770', 'Orogun, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(5, 'School', 'Rohimat Nur/Pry School', '08057420753', 'Agbowo, Ui', 'Nill', '2022-10-20 10:54:51'),
(6, 'School', 'Jubelee Nur/Pry School', '07013506821', 'Olororo, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(7, 'School', 'Shephered Nur/Pry School', '08053782386', 'Barika, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(8, 'School', 'Kennab Nur/Pry School', '08058563124', 'Olororo, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(9, 'School', 'Gloriuos Nur/Pry School', '08060765736', 'Barika, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(10, 'School', 'Shephered Success School', '08037801298', 'Agbowo', 'Nill', '2022-10-20 10:54:51'),
(11, 'School', 'Able Group Of School', '07059108031', 'Afofura Amuloko', 'Nill', '2022-10-20 10:54:51'),
(12, 'School', 'Abu Hanifa Islamic School', '08051245339', 'Oremeji', 'Nill', '2022-10-20 10:54:51'),
(13, 'School', 'Achievement Model School', '08154517541', 'Jagun Idi-Iroko', 'Nill', '2022-10-20 10:54:51'),
(14, 'School', 'Achievers School', '09038041790', 'Olunkeji Adegbaji', 'Nill', '2022-10-20 10:54:51'),
(15, 'School', 'Achievers Pry School', '08139389972', 'Emilangbe', 'Nill', '2022-10-20 10:54:51'),
(16, 'School', 'Acme School ', '08168562860', 'Alajameta Isebo Road', 'Nill', '2022-10-20 10:54:51'),
(17, 'School', 'Adeniji School', '08052016280', 'Ifedapo Area Amuloko', 'Nill', '2022-10-20 10:54:51'),
(18, 'School', 'Adeola Group Of School', '09064167648', 'Odeyale Amuloko', 'Nill', '2022-10-20 10:54:51'),
(19, 'School', 'Airport Baptist School', '08069088457', 'Airport Ibadan', 'Nill', '2022-10-20 10:54:51'),
(20, 'School', 'Al-Azeez Memorial Islamic School', '07055012459', 'Alaanfe Olunloyo', 'Nill', '2022-10-20 10:54:51'),
(21, 'School', 'God Favour', '07032121996', 'Odi-Olowo', 'Nill', '2022-10-20 10:54:51'),
(22, 'School', 'Viceroy\'s School', '07062593837', 'Asusiaro', 'Nill', '2022-10-20 10:54:51'),
(23, 'School', 'God\'s Heritage', '08104883322', 'Ilesa Garage', 'Nill', '2022-10-20 10:54:51'),
(24, 'School', 'Miracle Academy', '07032251640', 'Garage Ilesa', 'Nill', '2022-10-20 10:54:51'),
(25, 'School', 'Joy Plus', '08067829180', 'Garage Ilesa', 'Nill', '2022-10-20 10:54:51'),
(26, 'School', 'Future Leader', '08163520077', 'Jaleyemi', 'Nill', '2022-10-20 10:54:51'),
(27, 'School', 'Chase Legacy', '07030126767', 'Station Road', 'Nill', '2022-10-20 10:54:51'),
(28, 'School', 'Saint Anthony', '09036996745', 'Jaleyemi', 'Nill', '2022-10-20 10:54:51'),
(29, 'School', 'Okanlawon', '08068381332', 'Saw-Mill', 'Nill', '2022-10-20 10:54:51'),
(30, 'School', 'Hidayah', '08035029684', 'Saw-Mill', 'Nill', '2022-10-20 10:54:51'),
(31, 'School', 'Al-Jihad', '08161862771', 'Asusiaro', 'Nill', '2022-10-20 10:54:51'),
(32, 'School', 'Al-Yusrol', '07035593318', 'Oke-Ayepe', 'Nill', '2022-10-20 10:54:51'),
(33, 'School', 'Arikewuke', '08062392487', 'Oke-Ayepe', 'Nill', '2022-10-20 10:54:51'),
(34, 'School', 'As-Sidiq', '07065020564', 'Constain Area', 'Nill', '2022-10-20 10:54:51'),
(35, 'School', 'Christ D Redeemers', '08062248977', 'Ogo-Oluwa', 'Nill', '2022-10-20 10:54:51'),
(36, 'School', 'Career Builder', '08060948300', 'Ayetooro', 'Nill', '2022-10-20 10:54:51'),
(37, 'School', 'Christ Hope', '08147115929', 'Station Road', 'Nill', '2022-10-20 10:54:51'),
(38, 'School', 'The Golf', '07062294089', 'Ogo-Oluwa', 'Nill', '2022-10-20 10:54:51'),
(39, 'School', 'Evlyn School', '07060509164', 'Station Road', 'Nill', '2022-10-20 10:54:51'),
(40, 'School', 'Great Height', '08121007719', 'Station Road', 'Nill', '2022-10-20 10:54:51'),
(41, 'School', 'Glorious World ', '07030552031', 'Secretariat Frsc', 'Nill', '2022-10-20 10:54:51'),
(42, 'School', 'Omega', '08071431850', 'Eta-Efun, Osogbo', 'Nill', '2022-10-20 10:54:51'),
(43, 'School', 'A1 Divine School ', '08060941660', 'Baruwa Street', 'Nill', '2022-10-20 10:54:51'),
(44, 'School', 'Al-Iklash', '08067914065', 'Baruwa Street', 'Nill', '2022-10-20 10:54:51'),
(45, 'School', 'Adedayo Karim School', '07030175581', 'Ogo-Oluwa', 'Nill', '2022-10-20 10:54:51'),
(46, 'School', 'Day Star School', '08166235630', 'Ogo-Oluwa', 'Nill', '2022-10-20 10:54:51'),
(47, 'School', 'Al-Idayah School', '08075404348', 'Olororo, Ojoo', 'Nill', '2022-10-20 10:54:51'),
(48, 'School', 'Temidara School', '08072626627', 'Agbowo', 'Nill', '2022-10-20 10:54:51'),
(49, 'School', 'Al-Amin School', '09073272766', 'Agbowo, Express', 'Nill', '2022-10-20 10:54:51'),
(50, 'School', 'Ibadallah School', '08035266267', 'Aroro Makinde', 'Nill', '2022-10-20 10:54:51');

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
  `return_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns_table`
--

INSERT INTO `returns_table` (`return_id`, `transaction_ref`, `item_no`, `item_price`, `initial_qty`, `return_qty`, `return_staff`, `return_date`) VALUES
(3, '3383196741668970594', 89, '300.00', 5, 2, 'Alimi', '2022-11-20 14:01:54'),
(4, '3383196741668970594', 90, '350.00', 5, 2, 'Alimi', '2022-11-20 14:01:54'),
(5, '14898327651668976900', 91, '300.00', 1, 1, 'Alimi', '2022-11-20 15:46:15');

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
  `purchased_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_table`
--

INSERT INTO `sales_table` (`sales_id`, `transaction_id`, `invoice_number`, `item_id`, `item_price`, `quantity_purchased`, `customer_id`, `purchased_date`) VALUES
(1, '496929181667613122', 'MAX1667613122', 20, '200.00', 10, 5, '2022-11-05 02:52:02'),
(2, '496929181667613122', 'MAX1667613122', 18, '6000.00', 100, 5, '2022-11-05 02:52:02'),
(3, '5637252701667613269', 'MAX1667613269', 9, '888.00', 1000, 3, '2022-11-05 02:54:29'),
(4, '5637252701667613269', 'MAX1667613269', 4, '2222.00', 100, 3, '2022-11-05 02:54:29'),
(5, '8472323041667613374', 'MAX1667613374', 18, '6000.00', 1000, 2, '2022-11-05 02:56:14'),
(6, '8472323041667613374', 'MAX1667613374', 4, '2222.00', 100, 2, '2022-11-05 02:56:14'),
(7, '12674627911667614134', 'MAX1667614134', 20, '200.00', 2, 1, '2022-11-05 03:08:54'),
(8, '5774921011667615907', 'MAX1667615907', 21, '3000.00', 2, 5, '2022-11-05 03:38:27'),
(9, '2659977181667617702', 'MAX1667617702', 21, '3000.00', 5, 5, '2022-11-05 04:08:22'),
(10, '2659977181667617702', 'MAX1667617702', 20, '200.00', 10, 5, '2022-11-05 04:08:22'),
(11, '3292929781667816427', 'MAX1667816427', 61, '300.00', 2, 6, '2022-11-07 05:20:27'),
(12, '3292929781667816427', 'MAX1667816427', 49, '1100.00', 5, 6, '2022-11-07 05:20:27'),
(13, '9838125581667816533', 'MAX1667816533', 96, '320.00', 5, 5, '2022-11-07 05:22:13'),
(14, '18803302191667816719', 'MAX1667816719', 87, '300.00', 5, 2, '2022-11-07 05:25:19'),
(15, '14955542331667816886', 'MAX1667816886', 97, '300.00', 1, 1, '2022-11-07 05:28:06'),
(16, '13382287981667817534', 'MAX1667817534', 96, '320.00', 2, 6, '2022-11-07 05:38:54'),
(17, '8946631981667818258', 'MAX1667818258', 81, '350.00', 2, 2, '2022-11-07 05:50:58'),
(18, '11787551751667872117', 'MAX1667872117', 30, '1550.00', 5, 6, '2022-11-07 20:48:37'),
(19, '15905308881668035324', 'MAX1668035324', 12, '1100.00', 2, 6, '2022-11-09 18:08:44'),
(20, '11583341671668231821', 'MAX1668231821', 94, '300.00', 1, 6, '2022-11-12 00:43:41'),
(21, '600572361668232008', 'MAX1668232008', 96, '320.00', 2, 5, '2022-11-12 00:46:48'),
(22, '18467152741668232268', 'MAX1668232268', 97, '300.00', 2, 3, '2022-11-12 00:51:08'),
(23, '12856493681668239318', 'MAX1668239318', 15, '1100.00', 15, 6, '2022-11-12 02:48:38'),
(24, '12856493681668239318', 'MAX1668239318', 97, '300.00', 10, 6, '2022-11-12 02:48:38'),
(25, '21335457781668503132', 'MAX1668503132', 94, '300.00', 30, 6, '2022-11-15 04:05:32'),
(26, '2996534921668503227', 'MAX1668503227', 88, '300.00', 2, 3, '2022-11-15 04:07:07'),
(27, '20734648821668503297', 'MAX1668503297', 96, '320.00', 2, 5, '2022-11-15 04:08:17'),
(28, '6075824021668503331', 'MAX1668503331', 96, '320.00', 2, 5, '2022-11-15 04:08:51'),
(29, '17690139291668514669', 'MAX1668514669', 88, '300.00', 3, 50, '2022-11-15 07:17:49'),
(30, '17690139291668514669', 'MAX1668514669', 83, '400.00', 2, 50, '2022-11-15 07:17:49'),
(31, '17690139291668514669', 'MAX1668514669', 90, '300.00', 4, 50, '2022-11-15 07:17:49'),
(32, '17690139291668514669', 'MAX1668514669', 59, '400.00', 3, 50, '2022-11-15 07:17:49'),
(33, '17690139291668514669', 'MAX1668514669', 61, '300.00', 1, 50, '2022-11-15 07:17:49'),
(34, '7820015311668537320', 'MAX1668537320', 86, '300.00', 10, 50, '2022-11-15 13:35:20'),
(35, '7820015311668537320', 'MAX1668537320', 85, '300.00', 15, 50, '2022-11-15 13:35:20'),
(36, '3418121481668606687', 'MAX1668606687', 96, '320.00', 5, 50, '2022-11-16 08:51:27'),
(37, '16796526041668606766', 'MAX1668606766', 94, '300.00', 4, 49, '2022-11-16 08:52:46'),
(83, '8600390891668783304', 'MAX1668783304', 81, '350.00', 5, 50, '2022-11-18 09:55:04'),
(84, '8600390891668783304', 'MAX1668783304', 55, '300.00', 5, 50, '2022-11-18 09:55:04'),
(85, '16243459671668783515', 'MAX1668783515', 81, '350.00', 5, 48, '2022-11-18 09:58:36'),
(86, '16243459671668783515', 'MAX1668783515', 55, '300.00', 2, 48, '2022-11-18 09:58:36'),
(87, '9111928541668784172', 'MAX1668784172', 75, '300.00', 5, 4, '2022-11-18 10:09:32'),
(88, '9111928541668784172', 'MAX1668784172', 50, '300.00', 5, 4, '2022-11-18 10:09:32'),
(89, '3383196741668970594', 'MAX1668970594', 97, '300.00', 3, 50, '2022-11-20 13:56:34'),
(90, '3383196741668970594', 'MAX1668970594', 82, '350.00', 3, 50, '2022-11-20 13:56:34'),
(91, '14898327651668976900', 'MAX1668976960', 93, '300.00', 0, 49, '2022-11-20 15:42:40'),
(92, '9096021131669141036', 'MAX1669141075', 81, '314.00', 4, 50, '2022-11-22 13:17:55');

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
  `add_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks_table`
--

INSERT INTO `stocks_table` (`stock_id`, `category_name`, `stock_no`, `stock_name`, `stock_description`, `stock_retail_price`, `stock_sale_price`, `stock_quantity`, `stock_author`, `add_date`) VALUES
(1, 'Verbal & Quantitative', '978-978-57743-0-6 ', 'Master Quantitative & Verbal Nur 1', '', '1800.00', '1500.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(2, 'Verbal & Quantitative', '978-978-57743-1-3', 'Master Quantitative & Verbal Nur 2', '', '1800.00', '1500.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(3, 'Verbal & Quantitative', '978-978-53493-1-3', 'Master Quantitative & Verbal Pry 1', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(4, 'Verbal & Quantitative', '978-978-53493-3-7', 'Master Quantitative & Verbal Pry 2', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(5, 'Verbal & Quantitative', '978-978-53493-5-1', 'Master Quantitative & Verbal Pry 3', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(6, 'Verbal & Quantitative', '978-978-53493-6-8', 'Master Quantitative & Verbal Pry 4', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(7, 'Verbal & Quantitative', '978-978-53493-8-2', 'Master Quantitative & Verbal Pry 5', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(8, 'Verbal & Quantitative', '978-978-53493-0-4', 'Master Quantitative & Verbal Pry 6', '', '2220.00', '1850.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(9, 'Handwriting', '978-978-58788-4-4', 'Master Handwriting Pre-Nursery', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(10, 'Handwriting', '978-978-52474-0-4', 'Master Handwriting Nur 1', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(11, 'Handwriting', '987-978-57743-6-8', 'Master Handwriting Nur 2', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(12, 'Handwriting', '987-978-57743-7-5', 'Master Handwriting Nur 3', '', '1320.00', '1100.00', 98, 'Max African Publisher', '2022-10-19 19:01:57'),
(13, 'Handwriting', '978-978-58788-5-1', 'Master Handwriting pry 1', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(14, 'Handwriting', '978-978-58788-6-8', 'Master Handwriting pry 2', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(15, 'Handwriting', '978-978-58788-7-6', 'Master Handwriting pry 3', '', '1320.00', '1100.00', 85, 'Max African Publisher', '2022-10-19 19:01:57'),
(16, 'Handwriting', '978-978-58788-7-7', 'Master Handwriting pry 4', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(17, 'Handwriting', '978-978-58788-7-5', 'Master Handwriting pry 5', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(18, 'English', '978-978-54191-1-5', 'Master abc (Lower Case) for beginners', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(19, 'English', '978-978-54191-1-3', 'Master ABC (Upper Case) for beginners', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(20, 'English', '978-978-54191-1-5', 'Master ABC (Combined) for beginners', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(21, 'Mathematics', '978-978-54191-0-8', 'Master 123 for beginners', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(22, 'Colouring', '978-978-57692-0-3', 'Master Colouring Book 1', '', '1260.00', '1050.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(23, 'Colouring', '978-978-57692-1-0', 'Master Colouring Book 2', '', '1260.00', '1050.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(24, 'Colouring', '978-978-57692-2-7', 'Master Colouring Book 3', '', '1260.00', '1050.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(25, 'Mathematics', '978-978-57692-2-8', 'Master Nur. Maths Book 1', '', '1860.00', '1550.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(26, 'Mathematics', '978-978-54969-6-3', 'Master Nur. Maths Book 2', '', '1860.00', '1550.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(27, 'Mathematics', '978-978-54969-4-9', 'Master Nur. Maths Book 3', '', '1980.00', '1650.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(28, 'English', '978-978-54969-8-7', 'Master Nur. Eng Book 1', '', '1860.00', '1550.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(29, 'English', '978-978-54969-2-5', 'Master Nur. Eng Book 2', '', '1860.00', '1550.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(30, 'English', '978-978-54969-3-2', 'Master Nur. Eng Book 3', '', '1860.00', '1550.00', 95, 'Max African Publisher', '2022-10-19 19:01:57'),
(31, 'English', '978-978-54191-2-2', 'Queen Primer 1', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(32, 'English', '978-978-54191-3-9', 'Queen Primer 2', '', '384.00', '320.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(33, 'English', '978-978-54969-7-0', 'Queen Primer 3', '', '420.00', '350.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(34, 'Mathematics', '978-978-54969-0-1', 'Master Daily Mental Maths Book 1', '', '1560.00', '1300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(35, 'Mathematics', '978-978-54969-1-8', 'Master Daily Mental Maths Book 2', '', '1560.00', '1300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(36, 'Mathematics', '978-978-54969-2-5', 'Master Daily Mental Maths Book 3', '', '1560.00', '1300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(37, 'Mathematics', '978-978-54969-3-2', 'Master Daily Mental Maths Book 4', '', '1620.00', '1350.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(38, 'Mathematics', '978-978-54969-4-9', 'Master Daily Mental Maths Book 5', '', '1620.00', '1350.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(39, 'English', '978-978-58788-3-7', 'Master Daily English Skills Book 1', '', '1500.00', '1250.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(40, 'English', '978-978-58788-4-4', 'Master Daily English Skills Book 2', '', '1500.00', '1250.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(41, 'English', '978-978-58788-5-1', 'Master Daily English Skills Book 3', '', '1500.00', '1250.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(42, 'English', '978-978-58788-6-8', 'Master Daily English Skills Book 4', '', '1500.00', '1250.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(43, 'English', '978-978-58788-7-5', 'Master Daily English Skills Book 5', '', '1500.00', '1250.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(44, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 1', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(45, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 2', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(46, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 3', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(47, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 4', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(48, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 5', '', '1320.00', '1100.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(49, 'English', 'NOT YET PUBLISHED', 'Master Creative Composition Bk 6', '', '1320.00', '1100.00', 95, 'Max African Publisher', '2022-10-19 19:01:57'),
(50, 'Story Book', '978-978-5189490', 'Binta & Bintu', '', '360.00', '300.00', 95, 'Max African Publisher', '2022-10-19 19:01:57'),
(51, 'Story Book', '978-978-5189445', 'The Pussy Cat', '', '420.00', '350.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(52, 'Story Book', '978-978-57692-9-6', 'Sam & Bam', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(53, 'Story Book', '978-978-57692-8-9', 'Without a Golden Spoon', '', '396.00', '330.00', 100, 'Lekan Ajayi', '2022-10-19 19:01:57'),
(54, 'Story Book', '978-978-57692-6-5', 'Tortoise & Torture', '', '396.00', '330.00', 100, 'Olawale Ogunbusola', '2022-10-19 19:01:57'),
(55, 'Story Book', '978-978-5189421', 'Abu the Donkey Master', '', '360.00', '300.00', 93, 'Max African Publisher', '2022-10-19 19:01:57'),
(56, 'Story Book', '978-978-5189483', 'I want to be the best', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(57, 'Story Book', '978-978-518947-6', 'God bless my school', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(58, 'Story Book', '978-978-5189414', 'My early teacher', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(59, 'Story Book', '978-978-57692-7-2', 'Lincoln\'s village life', '', '480.00', '400.00', 97, 'Lekan Ajayi', '2022-10-19 19:01:57'),
(60, 'Story Book', '978-978-5769258', 'Jane the hunter', '', '360.00', '300.00', 100, 'Olawale Ogunbusola', '2022-10-19 19:01:57'),
(61, 'Story Book', '978-978-5247466', 'The grateful parrot', '', '360.00', '300.00', 97, 'Max African Publisher', '2022-10-19 19:01:57'),
(62, 'Story Book', '978-978-5189469', 'The selfish king', '', '396.00', '330.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(63, 'Story Book', '978-978-518946-9', 'The son of the soil', '', '660.00', '550.00', 100, 'Muhammed Olaide', '2022-10-19 19:01:57'),
(64, 'Story Book', '978-978-5349375', 'One wrong step', '', '396.00', '330.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(65, 'Story Book', '978-978-5349382', 'The lost queen', '', '420.00', '350.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(66, 'Story Book', '978-978-5349368', 'Mr. Joseph\'s dog', '', '360.00', '300.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(67, 'Story Book', '978-978-53493-4-4', 'Quest for peace', '', '480.00', '400.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(68, 'Story Book', '978-978-5349306', 'The talking doll', '', '480.00', '400.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(69, 'Story Book', '978-978-5349399', 'The magic mirror', '', '480.00', '400.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(70, 'Story Book', '978-978-534933-7', 'Face off in the animal kingdom', '', '360.00', '300.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(71, 'Story Book', '978-978-5349320', 'Not guilty', '', '420.00', '350.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(72, 'Story Book', '978-978-5349313', 'An idle hand', '', '540.00', '450.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(73, 'Story Book', '978-978-53493-5-1', 'The scandalous principal', '', '540.00', '450.00', 100, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(74, 'Story Book', '978-978-5419184', 'Bola\'s first day at school', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(75, 'Story Book', '978-978-54191-7-7', 'Bello\'s request', '', '360.00', '300.00', 95, 'Max African Publisher', '2022-10-19 19:01:57'),
(76, 'Story Book', '978-978-54191-6-0', 'The joy of parents', '', '396.00', '330.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(77, 'Story Book', '978-978-54191-5-3', 'The missing coin', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(78, 'Story Book', '978-978-54969-6-3', 'The brave boy', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(79, 'Story Book', '978-978-518940-7', 'Cruel step mother', '', '396.00', '330.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(80, 'Story Book', '978-978-54969-5-6', 'Our new baby', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(81, 'Colouring', '978-978-54969-9-1', 'ABC is fun', '', '420.00', '314.00', 184, 'Yisa C. Moruff', '2022-10-19 19:01:57'),
(82, 'Story Book', '978-978-54969-9-2', 'The sky men', '', '420.00', '350.00', 97, 'Max African Publisher', '2022-10-19 19:01:57'),
(83, 'Story Book', '978-978-518945-2', 'The clever rabbit', '', '480.00', '400.00', 98, 'Max African Publisher', '2022-10-19 19:01:57'),
(84, 'Story Book', '978-978-549695-6', 'The fashion designer', '', '480.00', '400.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(85, 'Story Book', '978-978-5247459', 'Alo iya agba (Apa kinni)', '', '360.00', '300.00', 85, 'Max African Publisher', '2022-10-19 19:01:57'),
(86, 'Story Book', '978-978-5247459', 'Alo iya agba (Apa keji)', '', '360.00', '300.00', 90, 'Max African Publisher', '2022-10-19 19:01:57'),
(87, 'Story Book', '978-978-5774351', 'Iya ni wura', '', '360.00', '300.00', 95, 'Max African Publisher', '2022-10-19 19:01:57'),
(88, 'Story Book', '978-978-57743-2-0', 'Onidiri Ara', '', '360.00', '300.00', 95, 'Hussein B. Akeem', '2022-10-19 19:01:57'),
(89, 'Story Book', '978-978-57743-4-4', 'Ojulari', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(90, 'Story Book', '978-978-5774337', 'Omo Arugbo', '', '360.00', '300.00', 96, 'Max African Publisher', '2022-10-19 19:01:57'),
(91, 'Story Book', '978-978-58788-0-6', 'Igba Owuro', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(92, 'Story Book', '978-978-5774382', 'Ida ', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(93, 'Story Book', '978-978-58788-1-3', 'Oore ni won', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(94, 'Story Book', '978-978-58788-2-0', 'Ti ekun ba dale', '', '360.00', '300.00', 65, 'Hussein B. Akeem', '2022-10-19 19:01:57'),
(95, 'Story Book', '978-978-58788-2-1', 'Iwa eda', '', '360.00', '300.00', 100, 'Max African Publisher', '2022-10-19 19:01:57'),
(96, 'Story Book', '978-978-58788-8-2', 'Ewi ikilo', '', '384.00', '320.00', 82, 'Max African Publisher', '2022-10-19 19:01:57'),
(97, 'Story Book', '978-978-58788-9-9', 'Ewuro', '', '360.00', '300.00', 84, 'Hussein B. Akeem', '2022-10-19 19:01:57');

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
  `transaction_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions_table`
--

INSERT INTO `transactions_table` (`tr_id`, `transaction_no`, `invoice_no`, `customer`, `sold_by`, `discount`, `amount_due`, `amount_paid`, `paytype`, `paymtd`, `transaction_date`) VALUES
(1, '496929181667613122', 'MAX1667613122', 5, 'Alimi', 20, '481600.00', '481600.00', 'Full Payment', 'Bank Transfer', '2022-11-05 02:52:02'),
(2, '5637252701667613269', 'MAX1667613269', 3, 'Alimi', 20, '888160.00', '500000.00', 'Part Payment', 'Cash', '2022-11-05 02:54:29'),
(3, '8472323041667613374', 'MAX1667613374', 2, 'Alimi', 20, '4977760.00', '0.00', 'No Payment', 'None', '2022-11-05 02:56:14'),
(4, '12674627911667614134', 'MAX1667614134', 1, 'Alimi', 20, '640.00', '320.00', 'Full Payment', 'Debit Card', '2022-11-05 03:08:54'),
(5, '5774921011667615907', 'MAX1667615907', 5, 'Alimi', 20, '4800.00', '2000.00', 'Part Payment', 'Debit Card', '2022-11-05 03:38:28'),
(6, '2659977181667617702', 'MAX1667617702', 5, 'Alimi', 20, '13600.00', '10000.00', 'Part Payment', 'Bank Transfer', '2022-11-05 04:08:23'),
(7, '3292929781667816427', 'MAX1667816427', 6, 'Alimi', 20, '4880.00', '4880.00', 'Full Payment', 'Cash', '2022-11-07 05:20:27'),
(8, '9838125581667816533', 'MAX1667816533', 5, 'Alimi', 20, '1280.00', '1280.00', 'Full Payment', 'Cash', '2022-11-07 05:22:13'),
(9, '18803302191667816719', 'MAX1667816719', 2, 'Alimi', 20, '1200.00', '1200.00', 'Full Payment', 'Cash', '2022-11-07 05:25:19'),
(10, '14955542331667816886', 'MAX1667816886', 1, 'Alimi', 20, '240.00', '340.00', 'Full Payment', 'Cash', '2022-11-07 05:28:06'),
(11, '13382287981667817534', 'MAX1667817534', 6, 'Alimi', 20, '512.00', '512.00', 'Full Payment', 'Debit Card', '2022-11-07 05:38:54'),
(12, '8946631981667818258', 'MAX1667818258', 2, 'Alimi', 20, '560.00', '560.00', 'Full Payment', 'Cash', '2022-11-07 05:50:58'),
(13, '11787551751667872117', 'MAX1667872117', 6, 'Alimi', 20, '6200.00', '6200.00', 'Full Payment', 'Cash', '2022-11-07 20:48:37'),
(14, '15905308881668035324', 'MAX1668035324', 6, 'Alimi', 20, '1760.00', '1760.00', 'Full Payment', 'Cash', '2022-11-09 18:08:44'),
(15, '11583341671668231821', 'MAX1668231821', 6, 'Alimi', 30, '240.00', '200.00', 'Part Payment', 'Cash', '2022-11-12 00:43:41'),
(16, '600572361668232008', 'MAX1668232008', 5, 'Alimi', 30, '512.00', '500.00', 'Part Payment', 'Cash', '2022-11-12 00:46:48'),
(17, '18467152741668232268', 'MAX1668232268', 3, 'Alimi', 20, '480.00', '440.00', 'Part Payment', 'Cash', '2022-11-12 00:51:08'),
(18, '12856493681668239318', 'MAX1668239318', 6, 'Alimi', 20, '15600.00', '10000.00', 'Part Payment', 'Cash', '2022-11-12 02:48:38'),
(19, '21335457781668503132', 'MAX1668503132', 6, 'Alimi', 25, '9000.00', '750.00', 'Part Payment', 'Cash', '2022-11-15 04:05:32'),
(20, '2996534921668503227', 'MAX1668503227', 3, 'Alimi', 25, '600.00', '50.00', 'Part Payment', 'Cash', '2022-11-15 04:07:07'),
(21, '20734648821668503297', 'MAX1668503297', 5, 'Alimi', 25, '640.00', '80.00', 'Part Payment', 'Cash', '2022-11-15 04:08:17'),
(22, '6075824021668503331', 'MAX1668503331', 5, 'Alimi', 20, '640.00', '500.00', 'Part Payment', 'Cash', '2022-11-15 04:08:51'),
(23, '17690139291668514669', 'MAX1668514669', 50, 'Wasiu', 20, '4400.00', '3520.00', 'Full Payment', 'Cash', '2022-11-15 07:17:49'),
(24, '7820015311668537320', 'MAX1668537320', 50, 'Wasiu', 20, '0.00', '0.00', 'Full Payment', 'Cash', '2022-11-15 13:35:20'),
(25, '3418121481668606687', 'MAX1668606687', 50, 'Wasiu', 20, '0.00', '280.00', 'Part Payment', 'Cash', '2022-11-16 08:51:27'),
(26, '16796526041668606766', 'MAX1668606766', 49, 'Wasiu', 20, '960.00', '60.00', 'Part Payment', 'Cash', '2022-11-16 08:52:46'),
(40, '8600390891668783304', 'MAX1668783304', 50, 'Alimi', 20, '0.00', '600.00', 'Part Payment', 'Cash', '2022-11-18 09:55:04'),
(41, '16243459671668783515', 'MAX1668783515', 48, 'Alimi', 20, '480.00', '600.00', 'Part Payment', 'Cash', '2022-11-18 09:58:36'),
(42, '9111928541668784172', 'MAX1668784172', 4, 'Alimi', 20, '1200.00', '600.00', 'Part Payment', 'Bank Transfer', '2022-11-18 10:09:32'),
(43, '3383196741668970594', 'MAX1668970594', 50, 'Alimi', 20, '1560.00', '600.00', 'Part Payment', 'Cash', '2022-11-20 13:56:34'),
(44, '14898327651668976900', 'MAX1668976960', 49, 'Alimi', 10, '0.00', '270.00', 'Full Payment', 'Cash', '2022-11-20 15:42:40'),
(45, '9096021131669141036', 'MAX1669141075', 50, 'Alimi', 20, '1004.80', '4.00', 'Part Payment', 'Cash', '2022-11-22 13:17:55');

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
  `reg_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`user_id`, `user_rollno`, `user_lname`, `user_fname`, `user_role`, `user_email`, `user_mobile`, `username`, `password`, `user_address`, `acct_name`, `acct_no`, `bank`, `user_status`, `user_dob`, `user_image`, `g1_name`, `g1_phone`, `g1_email`, `reg_date`) VALUES
(1, 'Max00001', 'Alimi', 'Oyeniyi', 'Managing Director', 'niyi@gmail.com', '08066940498', 'Oyeniyi', '$2y$10$XMv5nRv.ps9C1rGLbpxQhuka2B3XeWuzig3e3z3lcXiKvp4QN3ckW', 'Oke-Ado', '', '', '', 'ACTIVE', '1990-02-20', '../staffimage/1667814120-Avatar_2025154_133022407672999672.jpeg', '', '', '', '2022-10-19 00:00:00'),
(2, 'Max00002', 'Aluko', 'Timothy', 'Sales Representative', 'Timmy4real123@gmail.com', '08028408261', 'Timothy', '', '23, Oloya Street, Adogba', '', '', '', 'ACTIVE', '1982-10-15', '', 'Adeusi Temitayo Felicia', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(3, 'Max00003', 'Olu', 'Jonathan', 'Sales Agent', 'olujoe74@gmail.com', '08060470404', 'Jonathan', '', '7, Awotunde, Oloru Nsogo', '', '', '', 'ACTIVE', '1983-01-02', '', 'Akintayo Gabriel Olusumbo', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(4, 'Max00004', 'Musa', 'Taoheed A.', 'Sales Representative', 'musataoheed3@gmail.com', '08132336599', 'Taoheed A.', '', 'Sw8/666 Oke-Ado, Ibadan', '', '', '', 'ACTIVE', '1986-12-21', '', 'Raji Musa Ayinde', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(5, 'Max00005', 'Babatunde', 'Idowu', 'Sales Representative', 'eldestpaul3@gmail.com', '08130549646', 'Idowu', '', '43,Aba-Apata, Ijokodo, Ibadan', '', '', '', 'ACTIVE', '1981-11-03', '', 'Pastor Seun Ejisakin', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(6, 'Max00006', 'Adeniji', 'Abdul-Hakeem O.', 'Sales Agent', 'adeniyihakeem@gmail.com', '09061353641', 'Abdul-Hakeem O.', '', '8, Zone 8, Arise, Dare,. Apata Ibadan', '', '', '', 'ACTIVE', '1995-04-10', '../staffimage/1667873955-1BF5BE3C-CD7A-47A1-A6DE-E6AA2A3FC0D1.jpg', 'Adeniyi Titilayo Abike', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(7, 'Max00007', 'Aremu', 'Idowu', 'Sales Representative', 'aremuidowu16@gmail.com', '08147242740', 'Idowu', '', '10, Unity Estate Paara Airport', '', '', '', 'ACTIVE', '1990-12-01', '', 'Mr. John Atobatele', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(8, 'Max00008', 'Adeshina', 'Lawal', 'Sales Agent', 'lawaladeshina01@gmail.com', '08053825808', 'Lawal', '', '24, Adebesin Street, Abeokuta', '', '', '', 'ACTIVE', '1988-10-16', '', 'Nill', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(9, 'Max00009', 'Mikail', 'Qozeem O.', 'Human Resources', 'mukailaquazeem@gmail.com', '07082331713', 'Qozeem O.', '$2y$10$Blwu7cT6mVl1.smbltI7yOu0kEzutXzLqglSi4ypEON3TOVO0ZZzi', '07082331713', '', '', '', 'ACTIVE', '1995-12-08', '', 'Mikaila', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(10, 'Max00010', 'Wasiu', 'Fatai O.', 'Production Manager', 'wfatai40@gmail.com', '08062963081', 'Fatai O.', '$2y$10$9r/Ahcm32DioK.5gzn.bYe8790YII888ZobSsrVi66UlOYmKqhxUe', '08062963081', '', '', '', 'ACTIVE', '1996-01-02', '../staffimage/1668537829-Chrysanthemum.jpg', 'Wasiu Musa', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(11, 'Max00011', 'Titilolu', 'Olawunmi', 'Accountant', 'olawumideborah70@gmail.com', '07053741650', 'Olawunmi', '', 'Ajofebo Sanyo, Ibadan', '', '', '', 'ACTIVE', '1990-10-01', '', 'Nill', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(12, 'Max00012', 'Bukhari', 'Abdullahi', 'Sales Representative', 'awerab14@gmail.com', '07034426838', 'Abdullahi', '', '86, Poopo Street, Ogidi Ilorin', '', '', '', 'ACTIVE', '1984-10-02', '', 'Zakariyah Mikail', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(13, 'Max00013', 'Adeyanju', 'Isaac', 'Sales Agent', 'adeyanju@gmail.com', '07017835066', 'Isaac', '', '19, Oremeta Ologuneru, Ibadan', '', '', '', 'ACTIVE', '1976-08-20', '', 'Adeusi Temitayo Felicia', '', 'nill@demo.com', '2022-10-19 00:00:00'),
(14, 'Max00014', 'Oyinloye', 'Oluwatobi E.', 'Sales Agent', 'oluwatobiemma89@gmail.com', '08068502344', 'Oluwatobi E.', '', '13, Old Nepa Sango Eruwa', '', '', '', 'ACTIVE', '1989-05-05', '', 'Mrs. Fehintola Funmilayo Janet', '', 'nill@demo.com', '2022-10-19 00:00:00');

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
  `add_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors_table`
--

INSERT INTO `vendors_table` (`vendor_id`, `vendor_name`, `vendor_phone`, `vendor_email`, `vendor_address`, `add_date`) VALUES
(1, 'Max African Publisher', '08023078815', 'maxafricanpublishers@gmail.com', 'No 38, Obisesan Street, Ansar-udeen Central mosque bye-pass, Ososami road, Oke-Ado, Ibadan, Oyo State.', '2022-10-25 22:22:23'),
(2, 'Hussein B. Akeem', '', '', '', '2022-10-25 19:50:01'),
(3, 'Lekan Ajayi', '', '', '', '2022-10-25 19:50:01'),
(4, 'Muhammed Olaide', '', '', '', '2022-10-25 19:50:01'),
(5, 'Olawale Ogunbusola', '', '', '', '2022-10-25 19:50:01'),
(6, 'Yisa C. Moruff', '', '', '', '2022-10-25 19:50:01');

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
  MODIFY `category_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers_table`
--
ALTER TABLE `customers_table`
  MODIFY `customer_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `returns_table`
--
ALTER TABLE `returns_table`
  MODIFY `return_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sales_table`
--
ALTER TABLE `sales_table`
  MODIFY `sales_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `stocks_table`
--
ALTER TABLE `stocks_table`
  MODIFY `stock_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `transactions_table`
--
ALTER TABLE `transactions_table`
  MODIFY `tr_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `vendors_table`
--
ALTER TABLE `vendors_table`
  MODIFY `vendor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
