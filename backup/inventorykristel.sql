-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2019 at 04:36 PM
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
-- Database: `inventorykristel`
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
(5, 'Sols Agrivet Supply', 'Bongabong Oriental Mindoro', '00000000000', 'red');

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
(5, 'Beatuy Products'),
(6, 'Furniture'),
(7, 'Mobile Items');

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
(10, '', 'Walk in', '', '', '0.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0),
(11, 'tae', 'sdf', '290A Greenfield Subd. Brgy. Sampalocan Pagsanjan Laguna', '09268498059', '0.00', 'default.gif', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '0.00', '', '', 1, '', '', '', '0000-00-00', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `damage`
--

CREATE TABLE `damage` (
  `damage_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `damage_qty` int(11) NOT NULL,
  `date` date NOT NULL,
  `remarks` varchar(225) NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `damage`
--

INSERT INTO `damage` (`damage_id`, `prod_id`, `damage_qty`, `date`, `remarks`, `branch_id`) VALUES
(34, 9, 5, '2019-01-17', '', 1),
(35, 9, 5, '2019-01-17', '', 1),
(36, 9, 5, '2019-01-17', '', 1),
(37, 9, 5, '2019-01-17', '', 1),
(38, 9, 5, '2019-01-17', '', 1),
(39, 9, 5, '2019-01-17', '', 1),
(40, 9, 5, '2019-01-17', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `exp_id` int(10) NOT NULL,
  `exp_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`exp_id`, `exp_name`) VALUES
(0, 'gas'),
(0, 'Water bill');

-- --------------------------------------------------------

--
-- Table structure for table `expensesinput`
--

CREATE TABLE `expensesinput` (
  `expensesinput_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `date` datetime NOT NULL,
  `branch_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 9, 'has logged in the system at ', '2019-01-06 14:29:33'),
(2, 9, 'has logged in the system at ', '2019-01-06 14:29:57'),
(3, 9, 'has logged in the system at ', '2019-01-06 17:30:10'),
(4, 9, 'added 50 of ', '2019-01-06 17:30:41'),
(5, 9, 'has logged in the system at ', '2019-01-06 22:18:44'),
(6, 9, 'added 40 of ', '2019-01-06 22:36:01'),
(7, 9, 'added 40 of ', '2019-01-06 22:37:51'),
(8, 9, 'added 40 of ', '2019-01-06 22:38:47'),
(9, 9, 'added 40 of ', '2019-01-06 22:39:46'),
(10, 9, 'added 40 of ', '2019-01-06 22:27:26'),
(11, 9, 'has logged in the system at ', '2019-01-06 22:27:46'),
(12, 9, 'added 11 of ', '2019-01-06 22:28:41'),
(13, 9, 'added 11 of ', '2019-01-06 22:30:24'),
(14, 9, 'added 11 of ', '2019-01-06 22:30:44'),
(15, 9, 'added 11 of ', '2019-01-06 22:31:03'),
(16, 9, 'added 11 of ', '2019-01-06 22:51:07'),
(17, 9, 'has logged in the system at ', '2019-01-06 22:51:53'),
(18, 9, 'added 11 of ', '2019-01-06 22:52:38'),
(19, 9, 'added 11 of ', '2019-01-06 22:53:24'),
(20, 9, 'added 11 of ', '2019-01-06 22:53:49'),
(21, 9, 'added 11 of tae', '2019-01-06 22:54:36'),
(22, 9, 'has logged in the system at ', '2019-01-06 22:54:55'),
(23, 9, 'added 50 of tae', '2019-01-06 21:57:57'),
(24, 9, 'added 50 of tae2', '2019-01-06 22:09:45'),
(25, 9, 'has logged in the system at ', '2019-01-10 05:57:21'),
(26, 9, 'has logged in the system at ', '2019-01-10 05:39:48'),
(27, 9, 'added 50 of tae', '2019-01-10 06:08:29'),
(28, 9, 'added 50 of tae2', '2019-01-10 06:10:59'),
(29, 9, 'added 50 of tae3', '2019-01-10 06:11:49'),
(30, 9, 'added 50 of tae', '2019-01-10 06:14:43'),
(31, 9, 'added 50 of tae', '2019-01-10 06:18:23'),
(32, 9, 'added 5 of tae2', '2019-01-10 06:18:38'),
(33, 9, 'added 50 of tae3', '2019-01-10 06:19:55'),
(34, 9, 'has logged in the system at ', '2019-01-10 05:35:30'),
(35, 9, 'has logged in the system at ', '2019-01-10 05:35:51'),
(36, 9, 'has logged in the system at ', '2019-01-10 13:31:16'),
(37, 9, 'has logged in the system at ', '2019-01-10 13:06:45'),
(38, 9, 'has logged in the system at ', '2019-01-10 13:53:12'),
(39, 9, 'has logged in the system at ', '2019-01-10 13:03:15'),
(40, 9, 'has logged in the system at ', '2019-01-10 13:04:11'),
(41, 9, 'has logged in the system at ', '2019-01-10 13:15:14'),
(42, 9, '', '2019-01-10 13:17:19'),
(43, 9, 'added 50 of tae', '2019-01-10 13:35:38'),
(44, 9, '', '2019-01-10 13:35:55'),
(45, 9, '', '2019-01-10 13:36:10'),
(46, 9, '', '2019-01-10 13:37:54'),
(47, 9, '', '2019-01-10 13:38:13'),
(48, 9, '', '2019-01-10 13:39:16'),
(49, 9, '', '2019-01-10 13:40:51'),
(50, 9, '', '2019-01-10 13:53:29'),
(51, 9, 'has logged in the system at ', '2019-01-17 23:43:50'),
(52, 9, '', '2019-01-18 00:02:28'),
(53, 9, '', '2019-01-18 00:02:56'),
(54, 9, '', '2019-01-18 00:05:05'),
(55, 9, '', '2019-01-18 00:05:11'),
(56, 9, '', '2019-01-18 00:06:14'),
(57, 9, '', '2019-01-18 00:06:18'),
(58, 9, '', '2019-01-18 00:07:14'),
(59, 9, '', '2019-01-18 00:07:19'),
(60, 9, '', '2019-01-18 00:10:14'),
(61, 9, '', '2019-01-18 00:10:21'),
(62, 9, '', '2019-01-18 00:12:42'),
(63, 9, '', '2019-01-18 00:12:48'),
(64, 9, '', '2019-01-18 00:13:26'),
(65, 9, '', '2019-01-18 00:13:39'),
(66, 9, '', '2019-01-18 00:14:04'),
(67, 9, '', '2019-01-18 00:14:34'),
(68, 9, '', '2019-01-18 00:15:09'),
(69, 9, '', '2019-01-18 00:15:46'),
(70, 9, '', '2019-01-18 00:16:36'),
(71, 9, '', '2019-01-18 00:18:08'),
(72, 9, '', '2019-01-18 00:18:50'),
(73, 9, '', '2019-01-18 00:22:36'),
(74, 9, '', '2019-01-18 00:23:18'),
(75, 9, '', '2019-01-18 00:23:22'),
(76, 9, '', '2019-01-18 00:24:33'),
(77, 9, 'added 50 of tae', '2019-01-18 00:25:35'),
(78, 9, '', '2019-01-17 23:28:37'),
(79, 9, '', '2019-01-17 23:28:50'),
(80, 9, '', '2019-01-17 23:29:32'),
(81, 9, '', '2019-01-17 23:29:41'),
(82, 9, '', '2019-01-17 23:30:06'),
(83, 9, '', '2019-01-17 23:32:01'),
(84, 9, '', '2019-01-17 23:34:44'),
(85, 9, 'has logged in the system at ', '2019-01-17 23:34:54');

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
(7, 'iStore PH', 'Manila City,Philippines', '09134567890'),
(10, 'sdfsdf', 'sdfsdf', 'sdfdsf');

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
(6, 'administrator', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Giu Matthew', 'active', 0),
(8, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Mark', 'active', 5),
(9, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 'Michael', 'active', 1);

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
  ADD PRIMARY KEY (`cat_id`) USING BTREE;

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `damage`
--
ALTER TABLE `damage`
  ADD PRIMARY KEY (`damage_id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`exp_id`,`exp_name`) USING BTREE;

--
-- Indexes for table `expensesinput`
--
ALTER TABLE `expensesinput`
  ADD PRIMARY KEY (`expensesinput_id`);

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
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `damage`
--
ALTER TABLE `damage`
  MODIFY `damage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `purchase_request`
--
ALTER TABLE `purchase_request`
  MODIFY `pr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `sales_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `temp_trans`
--
ALTER TABLE `temp_trans`
  MODIFY `temp_trans_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `term_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
