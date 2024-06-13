-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 04:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `farm_users`
--

CREATE TABLE `farm_users` (
  `id` int(11) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farm_users`
--

INSERT INTO `farm_users` (`id`, `fullname`, `email`, `password`, `role`) VALUES
(1, 'Olufumi Llola', 'lola@gmail.com', 'pnKRNFb49xVZWns', ''),
(2, 'Olufumi Llola', 'lola1@gmail.com', 'pgZn7HnzVHNQWs9', 'Manager'),
(3, 'Ajaiyeoba John', 'lola11@gmail.com', '2bWDwnpDyEPU4aa', 'worker'),
(4, 'Iluyo Made', 'made@gmail.com', '123456', 'worker');

-- --------------------------------------------------------

--
-- Table structure for table `feed_schedule`
--

CREATE TABLE `feed_schedule` (
  `id` int(11) NOT NULL,
  `feed` varchar(100) NOT NULL,
  `feed_time` datetime(6) NOT NULL,
  `quantity` int(100) NOT NULL,
  `staff` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_schedule`
--

INSERT INTO `feed_schedule` (`id`, `feed`, `feed_time`, `quantity`, `staff`) VALUES
(1, 'Grower Pellet', '2024-06-14 08:30:00.000000', 4, 'iluyo made');

-- --------------------------------------------------------

--
-- Table structure for table `feed_stock`
--

CREATE TABLE `feed_stock` (
  `id` int(11) NOT NULL,
  `product` varchar(250) NOT NULL,
  `quantity` int(100) NOT NULL,
  `unit` varchar(2) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feed_stock`
--

INSERT INTO `feed_stock` (`id`, `product`, `quantity`, `unit`, `date`, `comment`) VALUES
(1, 'Chikun Aqua Feed', 20, 'kg', '2024-06-06', 'we got 20 bags of feed from chikun depot'),
(2, '', 0, '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `pond`
--

CREATE TABLE `pond` (
  `id` int(11) NOT NULL,
  `pond_name` varchar(100) NOT NULL,
  `size` varchar(250) NOT NULL,
  `fish_quantity` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pond`
--

INSERT INTO `pond` (`id`, `pond_name`, `size`, `fish_quantity`) VALUES
(1, 'Po12', '1233', 2147483647),
(2, 'Po12', '1233', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `species` varchar(100) NOT NULL,
  `pond` varchar(20) NOT NULL,
  `avg_weight` int(100) NOT NULL,
  `total_weight` int(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `population` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `date`, `species`, `pond`, `avg_weight`, `total_weight`, `quantity`, `population`) VALUES
(1, '2024-06-13', 'catfish', 'ad12', 5, 12345676, 56000, '5'),
(2, '2024-06-08', 'catfish', 'ad12', 3, 45000, 1234, 'Partial'),
(3, '2024-06-08', 'catfish', 'ad12', 3, 45000, 1234, 'Partial'),
(4, '2024-06-09', 'catfish', 'ad12', 4, 123454, 123456, 'Total');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `farm_users`
--
ALTER TABLE `farm_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_schedule`
--
ALTER TABLE `feed_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feed_stock`
--
ALTER TABLE `feed_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pond`
--
ALTER TABLE `pond`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `farm_users`
--
ALTER TABLE `farm_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feed_schedule`
--
ALTER TABLE `feed_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feed_stock`
--
ALTER TABLE `feed_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pond`
--
ALTER TABLE `pond`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
