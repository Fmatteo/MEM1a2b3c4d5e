-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2018 at 01:30 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

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
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(50) NOT NULL,
  `branch_address` varchar(100) NOT NULL,
  `branch_contact` varchar(50) NOT NULL,
  `skin` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`, `branch_address`, `branch_contact`, `skin`) VALUES
(1, 'AHIRA APPLIANCE CENTER', 'Silay CIty', '090998278', 'red'),
(2, 'ASHER ALLIED MARKETING', 'Lopez Jaena, Bacolod City', '98786786', 'purple'),
(3, 'SINGER', 'Silay city', '', 'black'),
(4, 'GOLDEN ARROW', 'Bacolod City', '', 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(5, 'Television'),
(6, 'Sofa'),
(7, 'Video Player'),
(8, 'Home Appliance'),
(9, 'Kitchen Appliance'),
(10, 'Gadget'),
(11, 'Rice Cooker'),
(12, 'Cosmetics');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(11) NOT NULL,
  `cust_first` varchar(50) NOT NULL,
  `cust_last` varchar(30) NOT NULL,
  `cust_address` varchar(100) NOT NULL,
  `cust_contact` varchar(30) NOT NULL,
  `balance` decimal(10,2) NOT NULL,
  `cust_pic` varchar(300) NOT NULL,
  `bday` date NOT NULL,
  `nickname` varchar(30) NOT NULL,
  `house_status` varchar(30) NOT NULL,
  `years` varchar(20) NOT NULL,
  `rent` varchar(10) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_no` varchar(30) NOT NULL,
  `emp_address` varchar(100) NOT NULL,
  `emp_year` varchar(10) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `salary` varchar(30) NOT NULL,
  `spouse` varchar(30) NOT NULL,
  `spouse_no` varchar(30) NOT NULL,
  `spouse_emp` varchar(50) NOT NULL,
  `spouse_details` varchar(100) NOT NULL,
  `spouse_income` decimal(10,2) NOT NULL,
  `comaker` varchar(30) NOT NULL,
  `comaker_details` varchar(100) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `credit_status` varchar(10) NOT NULL,
  `ci_remarks` varchar(1000) NOT NULL,
  `ci_name` varchar(50) NOT NULL,
  `ci_date` date NOT NULL,
  `payslip` int(11) NOT NULL,
  `valid_id` int(11) NOT NULL,
  `cert` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `income` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_first`, `cust_last`, `cust_address`, `cust_contact`, `balance`, `cust_pic`, `bday`, `nickname`, `house_status`, `years`, `rent`, `emp_name`, `emp_no`, `emp_address`, `emp_year`, `occupation`, `salary`, `spouse`, `spouse_no`, `spouse_emp`, `spouse_details`, `spouse_income`, `comaker`, `comaker_details`, `branch_id`, `credit_status`, `ci_remarks`, `ci_name`, `ci_date`, `payslip`, `valid_id`, `cert`, `cedula`, `income`) VALUES
(1, 'Kenneth', 'Aboy', 'Silay City\r\n', '09098', '0.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(2, 'Honeylee', 'Magbanua', 'Brgy. Busay, bago CIty', '09051914070', '37200.00', 'default.gif', '1989-10-14', 'lee', 'owned', '27', 'NA', 'Stratium Software', '034-707-1630', 'Ayala Northpoint', '1', 'Systems Administrator', '12000', 'NA', 'NA', 'NA', 'NA', '0.00', 'Kaye Angela Cueva', 'Cadiz City', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(3, 'dfsdfsd', 'sdfs', 'sdfsdf', 'fsdf', '0.00', 'default.gif', '2018-09-13', 'sdfsd', 'owned', 'dsf', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(4, 'sdf', 'sdf', 'dfdf', 'dsf', '0.00', 'default.gif', '2018-09-12', 'sdfsdf', 'owned', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(5, 'x', 'x', 'x', 'x', '-459.00', 'default.gif', '2018-09-12', 'x', 'owned', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(6, 'sdfsdf', 'sdf', '1', '1', '299.00', 'default.gif', '2018-09-12', 'sdfdf', 'owned', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, 'Approved', '', '', '0000-00-00', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(1, 1, 'added 5 of LG 43\" UHD TV UH6100', '2017-02-04 01:10:41'),
(2, 1, 'added 100 of Lotion', '2017-02-04 01:10:49'),
(3, 1, 'added 10 of Rice Cooker', '2017-02-04 01:10:55'),
(4, 1, 'added 5 of Samsung', '2017-02-04 01:11:07'),
(5, 1, 'has logged in the system at ', '2017-02-04 08:22:52'),
(6, 1, 'has logged in the system at ', '2017-02-04 08:51:11'),
(7, 1, 'has logged in the system at ', '2017-02-04 13:13:53'),
(8, 1, 'has logged in the system at ', '2017-02-21 18:56:56'),
(9, 1, 'added a payment of -76.6 for , ', '2017-02-21 00:00:00'),
(10, 1, 'has logged in the system at ', '2018-09-10 00:12:00'),
(11, 1, 'has logged in the system at ', '2018-09-10 21:54:49'),
(12, 1, 'has logged in the system at ', '2018-09-10 21:55:31'),
(13, 1, 'has logged out the system at ', '2018-09-10 22:03:28'),
(14, 1, 'has logged in the system at ', '2018-09-10 22:18:26'),
(15, 1, 'has logged out the system at ', '2018-09-10 22:53:14'),
(16, 1, 'has logged in the system at ', '2018-09-10 22:54:08'),
(17, 1, 'has logged in the system at ', '2018-09-10 22:58:24'),
(18, 6, 'has logged out the system at ', '2018-09-11 01:01:42'),
(19, 1, 'has logged in the system at ', '2018-09-11 01:01:47'),
(20, 1, 'has logged in the system at ', '2018-09-11 01:50:10'),
(21, 1, 'deleted 4 LG 43\" UHD TV UH6100 from purchase request', '2018-09-11 01:55:47'),
(22, 1, 'has logged in the system at ', '2018-09-11 19:57:30'),
(23, 1, 'has logged in the system at ', '2018-09-11 21:00:41'),
(24, 1, 'has logged in the system at ', '2018-09-12 06:33:58'),
(25, 1, 'has logged in the system at ', '2018-09-13 00:35:42'),
(26, 1, 'has logged in the system at ', '2018-09-13 09:00:33'),
(27, 1, 'has logged out the system at ', '2018-09-13 09:06:16'),
(28, 1, 'has logged in the system at ', '2018-09-13 09:06:20'),
(29, 1, 'has logged out the system at ', '2018-09-13 09:06:52'),
(30, 1, 'has logged in the system at ', '2018-09-13 09:06:56'),
(31, 1, 'added 100 of LG 43\" UHD TV UH6100', '2018-09-13 09:08:57'),
(32, 1, 'has logged in the system at ', '2018-09-13 15:40:49'),
(33, 1, 'has logged in the system at ', '2018-09-13 17:17:07'),
(34, 1, 'has logged in the system at ', '2018-09-13 17:43:57'),
(35, 1, 'has logged in the system at ', '2018-09-13 20:29:19'),
(36, 6, 'added a payment of 459 for , ', '2018-09-13 00:00:00'),
(37, 6, 'added a payment of -1400 for , ', '2018-09-13 00:00:00'),
(38, 6, 'added a payment of -900 for , ', '2018-09-13 00:00:00'),
(39, 6, 'added a payment of -1899 for , ', '2018-09-13 00:00:00'),
(40, 1, 'has logged in the system at ', '2018-09-14 12:28:33'),
(41, 1, 'added 100 of 1', '2018-09-14 15:26:27'),
(42, 1, 'added 100 of Rice Cooker', '2018-09-14 15:26:43'),
(43, 1, 'added 100 of Samsung', '2018-09-14 15:26:55'),
(44, 1, 'added 100 of Sample', '2018-09-14 15:27:28'),
(45, 1, 'has logged in the system at ', '2018-09-14 19:45:34'),
(46, 1, 'added a payment of -1800 for , ', '2018-09-14 00:00:00'),
(47, 1, 'has logged in the system at ', '2018-09-14 21:46:14'),
(48, 1, 'has logged in the system at ', '2018-09-15 14:00:23'),
(49, 1, 'added 54 of Samsung', '2018-09-15 17:40:55'),
(50, 1, 'added 50 of Samsung', '2018-09-15 18:08:08'),
(51, 1, 'added 50 of Egg', '2018-09-15 18:20:00'),
(52, 1, 'added 50 of Ipad', '2018-09-15 18:20:37'),
(53, 1, 'added 20 of Rexona', '2018-09-15 18:27:33'),
(54, 1, 'added 20 of Rexona', '2018-09-15 18:29:53'),
(55, 1, 'added 20 of Rexona', '2018-09-15 18:30:28'),
(56, 1, 'added 40 of Rexona', '2018-09-15 18:31:12'),
(57, 1, 'added 20 of Rexona', '2018-09-15 18:37:38'),
(58, 1, 'added 50 of Egg', '2018-09-15 18:59:02'),
(59, 1, 'added 50 of Egg', '2018-09-15 18:59:24'),
(60, 1, 'added 20 of Rexona', '2018-09-15 19:00:46'),
(61, 1, 'added 40 of Rexona', '2018-09-15 19:03:37'),
(62, 1, 'has logged in the system at ', '2018-09-16 14:37:49'),
(63, 1, 'has logged in the system at ', '2018-09-16 20:30:26'),
(64, 1, 'added 1 of Egg', '2018-09-16 21:13:32'),
(65, 0, '', '0000-00-00 00:00:00'),
(66, 1, 'added 10 of tae', '2018-09-16 22:39:38'),
(67, 1, 'added 10 of Egg', '2018-09-16 22:42:25'),
(68, 1, 'added 10 of tae', '2018-09-16 22:42:37'),
(69, 1, 'has logged out the system at ', '2018-09-17 00:38:01'),
(70, 6, 'has logged out the system at ', '2018-09-17 00:39:10'),
(71, 7, 'has logged in the system at ', '2018-09-17 00:39:28'),
(72, 7, 'has logged out the system at ', '2018-09-17 00:40:12'),
(73, 1, 'has logged in the system at ', '2018-09-17 00:40:18'),
(74, 1, 'has logged out the system at ', '2018-09-17 00:53:37'),
(75, 7, 'has logged in the system at ', '2018-09-17 00:53:43'),
(76, 7, 'has logged out the system at ', '2018-09-17 00:56:58'),
(77, 1, 'has logged in the system at ', '2018-09-17 00:57:02'),
(78, 1, 'has logged out the system at ', '2018-09-17 00:58:06'),
(79, 7, 'has logged in the system at ', '2018-09-17 00:58:12'),
(80, 7, 'has logged out the system at ', '2018-09-17 01:06:07'),
(81, 7, 'has logged in the system at ', '2018-09-17 01:06:13'),
(82, 7, 'added 10 of tae2', '2018-09-17 01:06:47'),
(83, 1, 'has logged in the system at ', '2018-09-17 20:01:29'),
(84, 1, 'has logged in the system at ', '2018-09-21 12:22:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `payment_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `payment_for` date NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `remaining` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `rebate` decimal(10,2) NOT NULL,
  `or_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `cust_id`, `sales_id`, `payment`, `payment_date`, `user_id`, `branch_id`, `payment_for`, `due`, `interest`, `remaining`, `status`, `rebate`, `or_no`) VALUES
(3214, 1, 72, '20.00', '2018-09-15 19:05:39', 1, 1, '2018-09-15', '20.00', '0.00', '0.00', 'paid', '0.00', 1),
(3215, 1, 73, '120.00', '2018-09-16 14:38:38', 1, 1, '2018-09-16', '120.00', '0.00', '0.00', 'paid', '0.00', 2),
(3216, 1, 74, '320.00', '2018-09-16 14:54:16', 1, 1, '2018-09-16', '320.00', '0.00', '0.00', 'paid', '0.00', 1),
(3217, 1, 75, '50.00', '2018-09-16 14:55:25', 1, 1, '2018-09-16', '50.00', '0.00', '0.00', 'paid', '0.00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_desc` varchar(500) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_pic` varchar(300) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `reorder` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `serial` varchar(50) NOT NULL,
  `base_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_price`, `prod_pic`, `cat_id`, `prod_qty`, `branch_id`, `reorder`, `supplier_id`, `serial`, `base_price`) VALUES
(30, 'Rexona', '11', '0.00', 'RobloxScreenShot20180711_190034903.png', 12, 65, 1, 5, 2, '1', '7.50'),
(31, 'Egg', 'Masarap kamutin', '0.00', 'RobloxScreenShot20180629_180036972.png', 12, 105, 1, 1, 2, '2', '8.13'),
(32, 'tae', '123123', '0.00', 'default.gif', 10, 20, 1, 1, 3, '1', '10.00'),
(33, 'tae2', '', '0.00', 'default.gif', 12, 10, 3, 1, 2, '1', '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_request`
--

CREATE TABLE `purchase_request` (
  `pr_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `request_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `purchase_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cash_tendered` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `amount_due` decimal(10,2) NOT NULL,
  `cash_change` decimal(10,2) DEFAULT NULL,
  `date_added` datetime NOT NULL,
  `modeofpayment` varchar(15) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `cust_id`, `user_id`, `cash_tendered`, `discount`, `amount_due`, `cash_change`, `date_added`, `modeofpayment`, `branch_id`, `total`) VALUES
(74, 1, 1, '320.00', '0.00', '320.00', '0.00', '2018-09-16 14:54:16', 'cash', 1, '320.00'),
(75, 1, 1, '50.00', '0.00', '50.00', '0.00', '2018-09-16 14:55:25', 'cash', 1, '50.00');

-- --------------------------------------------------------

--
-- Table structure for table `sales_details`
--

CREATE TABLE `sales_details` (
  `sales_details_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_details`
--

INSERT INTO `sales_details` (`sales_details_id`, `sales_id`, `prod_id`, `price`, `qty`) VALUES
(76, 74, 31, '10.00', 20),
(77, 74, 30, '8.00', 15),
(78, 75, 31, '10.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `date` datetime NOT NULL,
  `branch_id` int(11) NOT NULL,
  `base_price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `prod_id`, `qty`, `date`, `branch_id`, `base_price`) VALUES
(15, 30, 20, '2018-09-15 18:29:53', 1, '5.00'),
(16, 30, 20, '2018-09-15 18:30:28', 1, '5.00'),
(19, 31, 50, '2018-09-15 18:59:02', 1, '8.00'),
(20, 31, 50, '2018-09-15 18:59:24', 1, '8.00'),
(22, 30, 40, '2018-09-15 19:03:37', 1, '10.00'),
(23, 31, 1, '2018-09-16 21:13:32', 1, '1.00'),
(24, 31, -1, '0000-00-00 00:00:00', 1, '7.93'),
(25, 31, -1, '0000-00-00 00:00:00', 1, '7.93'),
(26, 31, -1, '2018-09-16 22:19:03', 1, '7.93'),
(27, 31, -1, '2018-09-16 22:19:41', 1, '7.93'),
(28, 31, -1, '2018-09-16 22:19:41', 1, '7.93'),
(29, 31, -1, '2018-09-16 22:21:16', 1, '7.93'),
(30, 32, 10, '2018-09-16 22:39:38', 1, '10.00'),
(31, 31, 10, '2018-09-16 22:42:25', 1, '10.00'),
(32, 32, 10, '2018-09-16 22:42:37', 1, '10.00'),
(33, 33, 10, '2018-09-17 01:06:47', 3, '5.00');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(300) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(2, 'LG Philippines', 'Makati City, Philippines', '423-4444'),
(3, 'Union Home Appliances', 'Binondo, Manila', '98878'),
(4, 'Hanabishi', 'Bacolod City', '034-666-087611'),
(5, 'Samsung Philippines', 'Philippines', '42424'),
(6, 'Avon', 'Bacolod City', '15562'),
(7, 'iStore PH', 'Manila City,Philippines', '09134567890');

-- --------------------------------------------------------

--
-- Table structure for table `temp_trans`
--

CREATE TABLE `temp_trans` (
  `temp_trans_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `term_id` int(11) NOT NULL,
  `sales_id` int(11) DEFAULT NULL,
  `payable_for` varchar(10) NOT NULL,
  `term` varchar(11) NOT NULL,
  `due` decimal(10,2) NOT NULL,
  `payment_start` date NOT NULL,
  `down` decimal(10,2) NOT NULL,
  `due_date` date NOT NULL,
  `interest` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`term_id`, `sales_id`, `payable_for`, `term`, `due`, `payment_start`, `down`, `due_date`, `interest`, `status`) VALUES
(1, 8, '4', 'monthly', '113.30', '2017-02-21', '113.30', '2017-06-21', '16.50', ''),
(2, 9, '4', 'monthly', '113.30', '2017-02-21', '113.30', '2017-06-21', '16.50', ''),
(3, 31, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(4, 32, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(5, 48, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(6, 49, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(7, 52, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(8, 53, '1', 'monthly', '395.52', '2018-09-10', '98.88', '2018-10-10', '14.40', ''),
(9, 54, '1', 'monthly', '98.88', '2018-09-10', '24.72', '2018-10-10', '3.60', ''),
(10, 55, '1', 'monthly', '395.52', '2018-09-11', '98.88', '2018-10-11', '14.40', ''),
(11, 56, '1', 'monthly', '98.88', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(12, 57, '1', 'monthly', '98.88', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(13, 59, '1', 'monthly', '98.88', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(14, 60, '1', 'weekly', '24.72', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(15, 61, '1', 'monthly', '98.88', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(16, 61, '1', 'monthly', '98.88', '2018-09-11', '24.72', '2018-10-11', '3.60', ''),
(17, 62, '1', 'monthly', '37080.00', '2018-09-11', '9270.00', '2018-10-11', '1350.00', ''),
(18, 65, '1', 'monthly', '96.00', '2018-09-13', '24.00', '2018-10-13', '0.00', 'paid'),
(19, 68, '1', 'monthly', '0.00', '2018-09-13', '0.00', '2018-10-13', '0.00', ''),
(20, 69, '1', 'monthly', '1900.00', '2018-09-13', '500.00', '2018-10-13', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(10) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `status`, `branch_id`) VALUES
(1, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'John Smith', 'active', 1),
(4, 'user', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Mona Lisa', 'active', 2),
(5, 'Mikee', 'a1Bz20ydqelm8m1wql70a5119905ec54b3edf78c6f515ac7b2', 'Mikee', 'active', 1),
(6, 'administrator', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Giu Matthew', 'active', 0),
(7, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'tae', 'active', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `purchase_request`
--
ALTER TABLE `purchase_request`
  ADD PRIMARY KEY (`pr_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`sales_details_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `temp_trans`
--
ALTER TABLE `temp_trans`
  ADD PRIMARY KEY (`temp_trans_id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`term_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3218;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
