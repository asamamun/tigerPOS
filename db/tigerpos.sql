-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 10:05 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tigerpos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `balance` decimal(20,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `account_number`, `balance`, `created`, `deleted`) VALUES
(1, 'Bkash', '01629999666', '0.00', '2022-06-26 09:11:10', NULL),
(2, 'Rocket', '01629999666', '0.00', '2022-06-26 09:11:28', NULL),
(3, 'DBBL', '2161030284757', '0.00', '2022-06-26 09:12:15', NULL),
(4, 'Cash', '', '0.00', '2022-06-29 10:31:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created`, `deleted`) VALUES
(1, 'Fruits', '2022-06-20 20:19:39', NULL),
(2, 'Kids', '2022-06-20 20:19:39', NULL),
(3, 'Grocery', '2022-06-27 11:10:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `expense` decimal(20,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `expense`, `created`, `deleted`) VALUES
(1, 'Default Customer', 'default@gmail.com', '01812345678', 'Mirpur', '0.00', '2022-06-19 21:08:52', NULL),
(2, 'Tamimul Islam', 'tamimislam732@gmail.com', '01911151732', 'Savar, Dhaka', '0.00', '2022-06-19 21:08:52', NULL),
(3, 'Syed Zayed Hosssain', 'php.zayed@gmail.com', '01629999666', 'Manikdi, Dhaka Cantonment, Dhaka-1206', '0.00', '2022-06-19 21:10:34', NULL),
(4, 'Tasnim Al Rahman', 'tasnim333@gmail.com', '01712345678', 'Mirpur, Dhaka-1216', '0.00', '2022-06-19 21:10:34', NULL),
(5, 'Al-Amin', 'alamin@gmail.com', '01912345678', 'Mirpur', '1200000.00', '2022-06-20 16:38:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `name`, `amount`, `payment_type`, `created`, `deleted`) VALUES
(1, 'Breakfast', '185.00', 1, '2022-06-20 21:52:01', NULL),
(2, 'Lunch', '430.00', 1, '2022-06-20 21:52:15', NULL),
(3, 'Labour Cost', '1500.00', 3, '2022-06-20 21:52:25', NULL),
(4, 'Transport Cost', '3200.00', 2, '2022-06-20 21:52:52', NULL),
(5, 'Dinner', '340.00', 3, '2022-07-04 19:35:30', NULL),
(6, 'Breakfast', '220.00', 0, '2022-07-04 19:39:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `nettotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `trxid` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `customer_id`, `nettotal`, `discount`, `grandtotal`, `comment`, `payment_type`, `trxid`, `created`, `updated`) VALUES
(8, 2, '774.00', '4.00', '770.00', 'sdafsdaf', 4, '', '2022-06-29 12:45:39', NULL),
(9, 2, '240.00', '40.00', '200.00', 'sdafdsf', 4, '', '2022-06-29 12:48:24', NULL),
(10, 4, '384.00', '4.00', '380.00', 'dafasdf', 4, '', '2022-06-29 12:48:52', NULL),
(11, 5, '630.00', '0.00', '630.00', 'dfgdfsgfdg', 3, '', '2022-06-29 12:49:13', NULL),
(12, 3, '462.00', '2.00', '460.00', 'dummy order', 4, '', '2022-06-29 17:15:20', NULL),
(13, 3, '462.00', '2.00', '460.00', 'dummy order', 1, '', '2022-06-29 17:16:24', NULL),
(14, 2, '276.00', '6.00', '270.00', 'Paid', 4, '', '2022-07-04 17:12:06', NULL),
(15, 5, '578.00', '8.00', '570.00', 'al amin oil', 4, '', '2022-07-04 18:48:46', NULL),
(16, 4, '1660.00', '10.00', '1650.00', 'some note', 4, '', '2022-07-04 18:49:26', NULL),
(17, 1, '180.00', '10.00', '170.00', 'sdsfsd', 1, 'asdasdfsdf', '2022-07-05 17:17:55', NULL),
(18, 1, '480.00', '30.00', '450.00', 'dfsdf', 4, '', '2022-07-05 17:20:12', NULL),
(19, 1, '960.00', '60.00', '900.00', 'efewwghths', 2, 'sfefefrfe', '2022-07-05 19:16:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoicedetails`
--

INSERT INTO `invoicedetails` (`id`, `invoice_id`, `product_id`, `quantity`, `price`, `total`, `created`) VALUES
(6, 8, 1, '2.00', '60.00', '120.00', '2022-06-29 12:45:39'),
(7, 8, 2, '3.00', '90.00', '270.00', '2022-06-29 12:45:39'),
(8, 8, 3, '4.00', '96.00', '384.00', '2022-06-29 12:45:39'),
(9, 9, 1, '4.00', '60.00', '240.00', '2022-06-29 12:48:24'),
(10, 10, 3, '4.00', '96.00', '384.00', '2022-06-29 12:48:52'),
(11, 11, 2, '7.00', '90.00', '630.00', '2022-06-29 12:49:13'),
(12, 12, 2, '3.00', '90.00', '270.00', '2022-06-29 17:15:20'),
(13, 12, 3, '2.00', '96.00', '192.00', '2022-06-29 17:15:20'),
(14, 13, 2, '3.00', '90.00', '270.00', '2022-06-29 17:16:25'),
(15, 13, 3, '2.00', '96.00', '192.00', '2022-06-29 17:16:25'),
(16, 14, 1, '3.00', '60.00', '180.00', '2022-07-04 17:12:06'),
(17, 14, 3, '1.00', '96.00', '96.00', '2022-07-04 17:12:06'),
(18, 15, 6, '2.00', '145.00', '290.00', '2022-07-04 18:48:46'),
(19, 15, 3, '3.00', '96.00', '288.00', '2022-07-04 18:48:46'),
(20, 16, 6, '2.00', '145.00', '290.00', '2022-07-04 18:49:26'),
(21, 16, 2, '1.00', '90.00', '90.00', '2022-07-04 18:49:26'),
(22, 16, 4, '4.00', '320.00', '1280.00', '2022-07-04 18:49:27'),
(23, 17, 1, '3.00', '60.00', '180.00', '2022-07-05 17:17:55'),
(24, 18, 3, '5.00', '96.00', '480.00', '2022-07-05 17:20:12'),
(26, 19, 3, '10.00', '96.00', '960.00', '2022-07-05 19:16:29');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `created`) VALUES
(1, 2, 4, '100.00', '320.00', '32000.00', '2022-07-05 19:12:46'),
(2, 2, 5, '50.00', '197.00', '9850.00', '2022-07-05 19:12:46'),
(3, 3, 6, '50.00', '145.00', '7250.00', '2022-07-05 19:14:43'),
(4, 3, 3, '55.00', '96.00', '5280.00', '2022-07-05 19:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `nettotal` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `grandtotal` decimal(10,2) NOT NULL,
  `comment` varchar(512) NOT NULL,
  `payment_type` int(2) NOT NULL,
  `trxid` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `supplier_id`, `nettotal`, `discount`, `grandtotal`, `comment`, `payment_type`, `trxid`, `created`, `updated`) VALUES
(2, 4, '41850.00', '0.00', '41850.00', 'asdwerewd', 2, 'sadasfdfgsd', '2022-07-05 19:12:46', NULL),
(3, 5, '12530.00', '0.00', '12530.00', 'asdweefef', 3, 'sadasdsdger', '2022-07-05 19:14:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `barcode` varchar(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `wholesale_price` decimal(20,2) NOT NULL,
  `retail_price` decimal(20,2) NOT NULL,
  `purchase_price` decimal(20,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `tax` decimal(5,2) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `barcode`, `name`, `company_name`, `category_id`, `supplier_id`, `wholesale_price`, `retail_price`, `purchase_price`, `quantity`, `description`, `tax`, `created`, `deleted`) VALUES
(1, '12343234', 'Lengra Mango (kg)', 'AZ Agro Ltd.', 1, 1, '50.00', '60.00', '35.00', 197, 'Fresh fruits', '0.00', '2022-06-20 20:48:55', NULL),
(2, '12343222', 'Himsagar Mango (kg)', 'Confident Mart Ltd.', 1, 4, '75.00', '90.00', '50.00', 300, 'Fresh Fruits', '5.00', '2022-06-20 20:48:55', NULL),
(3, '999999', 'Teer 1 Litre pack soyabin oil', 'Teer', 3, 5, '90.00', '96.00', '85.00', 190, 'lorem ipsum', '0.00', '2022-06-27 11:12:02', NULL),
(4, '859323', 'Aarong Ghee (200gm)', 'Aarong', 3, 4, '280.00', '320.00', '260.00', 200, 'Aarong ghee', '0.00', '2022-07-04 18:45:26', NULL),
(5, '9833224', 'Fresh Soyabin Oil Poly Pack 1ltr', 'Fresh', 3, 5, '185.00', '197.00', '170.00', 250, 'Fresh Soyabin Oil Poly', '0.00', '2022-07-04 18:46:43', NULL),
(6, '8593133', 'Kishwan Mustard Oil (500ml)', 'Kishwan', 3, 1, '136.00', '145.00', '120.00', 250, 'Kishwan Mustard Oil', '0.00', '2022-07-04 18:48:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `mobile`, `address`, `created`, `deleted`) VALUES
(1, 'Arif Khan', 'arif@gmail.com', '01911223344', 'Manikdi, Dhaka Cantonment', '2022-06-20 19:33:48', NULL),
(2, 'Md Jony', 'jony@gmail.com', '01911151733', 'Matikata, Dhaka Cantonment', '2022-06-20 19:33:48', NULL),
(3, 'Akib Khan', 'akib@gmail.com', '01711223311', 'Chittagong', '2022-06-20 19:56:16', NULL),
(4, 'Rony Hossain', 'rony@gmail.com', '01987654312', 'Mohakhali', '2022-06-20 19:58:52', NULL),
(5, 'Tamim Hossain', 'tamim@gmail.com', '01988383332', 'Dhaka', '2022-06-20 21:22:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `deleted_at`) VALUES
(11, 'admin12', 'admin@gmail.com', '$2y$10$5jcDr4EkuLmgVzXQsdOBFOo87I2Ot9s1Q9yfiZohuPl.2I/.ntlZS', 1, '2022-06-22 11:08:33', NULL),
(12, 'test', 'test@gmail.com', '$2y$10$kQGyjxVdf6cVfgulgIi2JOld/dJZ/XhWsL8nbO52rZ/fUdMO9o9nu', 1, '2022-06-22 12:17:36', NULL),
(13, 'test33', 'test33@gmail.com', '$2y$10$dco2K49IK9W4gZjE2509Lej49AULjke8cJ5S/Wj.xpjE8O6i9dlwO', 1, '2022-06-22 12:34:44', NULL),
(14, 'mamun', 'mamun@gmail.com', '$2y$10$JHrRZNWf3YwRiJZLezCsI.b34YvQ7ZSTH6bsOxt.5zqyLpHA2AZpC', 1, '2022-06-26 13:27:04', NULL),
(15, 'Syed Zayed Hossain', 'zayed@gmail.com', '$2y$10$myQFfocQLGTNigbxVudwcO4plj2VliLFs0hzFUc6dleweuv62qVq.', 1, '2022-07-04 17:08:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
