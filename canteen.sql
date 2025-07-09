-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 04:23 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `canteen`
--

-- --------------------------------------------------------

--
-- Table structure for table `cravemenu`
--

CREATE TABLE `cravemenu` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int NOT NULL,
  `amount` int NOT NULL,
  `stall` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hungrymenu`
--

CREATE TABLE `hungrymenu` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int NOT NULL,
  `amount` int NOT NULL,
  `stall` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hungrymenu`
--

INSERT INTO `hungrymenu` (`id`, `name`, `image`, `description`, `cost`, `amount`, `stall`, `status`, `created_at`) VALUES
(1, 'Burger', 'vegburger.jpg', 'Juicy patty, fresh lettuce, tomato, and onions, served in a soft bun.', 45, 20, 'hungrymenu', 1, '2024-05-06 14:20:17'),
(2, 'Cheese Burger', 'cheeseburger.jpg', 'Our classic burger with an extra slice of melted cheese for that perfect cheesy indulgence.', 60, 15, 'hungrymenu', 1, '2024-05-06 14:20:17'),
(3, 'Chicken Burger', 'chickenburger.jpg', 'Tender grilled chicken topped with lettuce, tomato, and mayo, sandwiched in a toasted bun.', 50, 10, 'hungrymenu', 1, '2024-05-06 14:20:17');

-- --------------------------------------------------------

--
-- Table structure for table `ordered`
--

CREATE TABLE `ordered` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `status` varchar(200) NOT NULL,
  `payment` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `quantity` int NOT NULL,
  `status` varchar(200) NOT NULL,
  `payment` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `snackmenu`
--

CREATE TABLE `snackmenu` (
  `id` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `cost` int NOT NULL,
  `amount` int NOT NULL,
  `stall` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `mypassword` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cravemenu`
--
ALTER TABLE `cravemenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hungrymenu`
--
ALTER TABLE `hungrymenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordered`
--
ALTER TABLE `ordered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `snackmenu`
--
ALTER TABLE `snackmenu`
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
-- AUTO_INCREMENT for table `cravemenu`
--
ALTER TABLE `cravemenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hungrymenu`
--
ALTER TABLE `hungrymenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ordered`
--
ALTER TABLE `ordered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `snackmenu`
--
ALTER TABLE `snackmenu`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
