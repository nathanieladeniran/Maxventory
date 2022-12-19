-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Nov 20, 2022 at 12:20 PM
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
(2, '5637252701667613269', 4, '2222.00', 100, 10, 'Alimi', '2022-11-20 13:19:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `returns_table`
--
ALTER TABLE `returns_table`
  ADD PRIMARY KEY (`return_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `returns_table`
--
ALTER TABLE `returns_table`
  MODIFY `return_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
