-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2021 at 08:46 AM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `share_market_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `contact_number` text NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `first_name`, `last_name`, `contact_number`, `message`) VALUES
(1, '', 'Karbhari', '9137976398', 'hello'),
(2, '', 'Karbhari', '9137976398', 'Hello there... Message sent from Insiders Flutter App.'),
(3, '', 'Karbhari', '9137976398', 'Hello there... Message sent from Insiders Flutter App.'),
(4, '', 'Karbhari', '9137976398', 'Hello Ratnesh');

-- --------------------------------------------------------

--
-- Table structure for table `notiications`
--

CREATE TABLE `notiications` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `buy_price` decimal(10,2) NOT NULL,
  `stop_loss` decimal(10,2) NOT NULL,
  `market_price` decimal(10,2) NOT NULL,
  `date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notiications`
--

INSERT INTO `notiications` (`id`, `name`, `buy_price`, `stop_loss`, `market_price`, `date`) VALUES
(2, 'Adani Power', '9.50', '8.00', '10.00', '18-03-2021 04:42:45pm'),
(3, 'ICICI Bank', '9.00', '8.00', '10.00', '20-03-2021 09:04:12pm'),
(4, 'South Indian Bank Ltd.', '15.00', '12.00', '18.00', '22-03-2021 10:15:30am'),
(5, 'Sanwaria Consumer Ltd', '13.00', '10.00', '16.00', '22-03-2021 10:18:15am'),
(7, 'Reliance ltd -> buy at market prices', '470.50', '0.00', '456.50', '22-03-2021 06:40:26pm'),
(8, 'Jio -> sell at', '52.50', '57.60', '45.50', '22-03-2021 06:43:18pm'),
(9, 'Kotak bank (....)', '1100.00', '1080.00', '1099.00', '23-03-2021 10:49:06am');

-- --------------------------------------------------------

--
-- Table structure for table `page_data`
--

CREATE TABLE `page_data` (
  `id` int NOT NULL,
  `home_carousel_images` longtext NOT NULL,
  `tnc` longtext NOT NULL,
  `address` text NOT NULL,
  `contact_number` text NOT NULL,
  `email` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` text NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `status`) VALUES
(1, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', '$2y$10$Rw.BIbApcJUOmVFvFIyRVeae4l2sLiW5NhNeNvsOzQ1LwO/Q.JBfS', 'admin', 'active'),
(6, 'Ratnesh', 'Karbhari', 'ratneshkarbhari74@gmail.com', '$2y$10$e2FVEgx7vaOT4AVpl/QHmu3fGOEWys8PP58DpZL2k3z592R0la.V2', 'subscriber', 'active'),
(7, 'Ratnvh', 'bhkb', 'rkarbhari23@gmail.com', '$2y$10$FTW4DsRjLzfxdktJiHEfauQONjhdmnnldvLIYa6PVbbCJni5ijt2G', 'subscriber', 'active'),
(8, 'Satish', 'kandregula', 'satish.m.kandregula@gmail.com', '$2y$10$CwN9wL55OCoc0KjTieTFUOPS5H96U28JMFr7Cx6GkWc4IkGerxUTS', 'subscriber', 'active'),
(9, 'Satish', 'kandregula', 'merlinragnarok1987@gmail.com@gmail.com', '$2y$10$5qfqx/jr/wYSn5gRZSosVucd.2Fiq16HxAjl7KXQCBKO4HB.DhExi', 'subscriber', 'active'),
(10, 'test', 'user', 'abc@gmail.com', '$2y$10$zPcpbc454pf3cfIwZD6dn.sI7NjZaMgvuoCeegjRtk38hKJS/r.wm', 'subscriber', 'active'),
(11, 'bhupendra', 'singh', '', '$2y$10$E3ZCq/Lg9jSdrGn7j1B5zubY9Ct1de6.gcjLGm9khIhvVh0RVKv2e', 'subscriber', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notiications`
--
ALTER TABLE `notiications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_data`
--
ALTER TABLE `page_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notiications`
--
ALTER TABLE `notiications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `page_data`
--
ALTER TABLE `page_data`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
