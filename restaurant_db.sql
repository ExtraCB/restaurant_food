-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2023 at 04:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_cart`
--

CREATE TABLE `restaurant_cart` (
  `id_c` int(11) NOT NULL,
  `id_own` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  `c_count` int(11) NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_detail`
--

CREATE TABLE `restaurant_detail` (
  `id_o` int(11) NOT NULL,
  `id_f` int(11) NOT NULL,
  `count_d` int(11) NOT NULL,
  `price_d` double NOT NULL,
  `timestamp_d` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_menu`
--

CREATE TABLE `restaurant_menu` (
  `id_m` int(11) NOT NULL,
  `name_m` varchar(200) NOT NULL,
  `img_m` varchar(100) NOT NULL,
  `price_m` double NOT NULL,
  `status_u` int(1) NOT NULL DEFAULT 1,
  `timestamp_u` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_order`
--

CREATE TABLE `restaurant_order` (
  `id_o` int(11) NOT NULL,
  `id_own` int(11) NOT NULL,
  `status_own` int(1) NOT NULL DEFAULT 1,
  `timestamp_o` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_u` int(11) NOT NULL,
  `username_u` varchar(200) NOT NULL,
  `email_u` varchar(250) NOT NULL,
  `password_u` varchar(20) NOT NULL,
  `status_u` varchar(10) NOT NULL DEFAULT 'member',
  `timestamp_u` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant_cart`
--
ALTER TABLE `restaurant_cart`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `id_own` (`id_own`,`id_f`);

--
-- Indexes for table `restaurant_detail`
--
ALTER TABLE `restaurant_detail`
  ADD PRIMARY KEY (`id_o`,`id_f`),
  ADD KEY `id_f` (`id_f`);

--
-- Indexes for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `restaurant_order`
--
ALTER TABLE `restaurant_order`
  ADD PRIMARY KEY (`id_o`),
  ADD KEY `id_own` (`id_own`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `restaurant_cart`
--
ALTER TABLE `restaurant_cart`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_menu`
--
ALTER TABLE `restaurant_menu`
  MODIFY `id_m` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurant_order`
--
ALTER TABLE `restaurant_order`
  MODIFY `id_o` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `restaurant_cart`
--
ALTER TABLE `restaurant_cart`
  ADD CONSTRAINT `restaurant_cart_ibfk_1` FOREIGN KEY (`id_own`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_detail`
--
ALTER TABLE `restaurant_detail`
  ADD CONSTRAINT `restaurant_detail_ibfk_1` FOREIGN KEY (`id_o`) REFERENCES `restaurant_order` (`id_o`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restaurant_detail_ibfk_2` FOREIGN KEY (`id_f`) REFERENCES `restaurant_menu` (`id_m`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_order`
--
ALTER TABLE `restaurant_order`
  ADD CONSTRAINT `restaurant_order_ibfk_1` FOREIGN KEY (`id_own`) REFERENCES `users` (`id_u`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
