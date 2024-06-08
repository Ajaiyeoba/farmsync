-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2036 at 01:03 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

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
-- Table structure for table `feedstock`
--

CREATE TABLE `feedstock` (
  `id` int(11) NOT NULL,
  `feed` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `store_db`
--

CREATE TABLE `store_db` (
  `id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `category` varchar(10) NOT NULL,
  `storage` varchar(10) NOT NULL,
  `image` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `store_db`
--

INSERT INTO `store_db` (`id`, `product`, `quantity`, `unit`, `category`, `storage`, `image`, `date`, `comment`) VALUES
(1, '', 0, '', 'Crops', 'Warehouse', '', '0000-00-00', ''),
(2, '', 0, '', 'Crops', 'Warehouse', '', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `password`) VALUES
(1, 'Dayo Ajaiyeoba', 'ajaiyeobadayo@gmail.com', 2147483647, '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedstock`
--
ALTER TABLE `feedstock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_db`
--
ALTER TABLE `store_db`
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
-- AUTO_INCREMENT for table `feedstock`
--
ALTER TABLE `feedstock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store_db`
--
ALTER TABLE `store_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
