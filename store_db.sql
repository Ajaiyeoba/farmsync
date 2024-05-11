-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 01:07 PM
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
-- Table structure for table `store_db`
--

CREATE TABLE `store_db` (
  `id` int(11) NOT NULL,
  `product` varchar(50) NOT NULL,
  `quantity` int(20) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `category` varchar(100) NOT NULL,
  `storage` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `store_db`
--

INSERT INTO `store_db` (`id`, `product`, `quantity`, `unit`, `category`, `storage`, `image`, `date`, `comment`) VALUES
(2, 'Feed', 1200, 'kg', 'a', 'c', 'Annotation 2024-03-26 051531.png', '2024-04-19', 'Brought the chicken feed'),
(3, 'Wheat Offal', 100, 'kg', 'AAnmal', 'Storage Shed', 'Annotation 2024-04-02 060510.png', '2024-04-15', 'Wheat offal from my mill'),
(4, 'Vaccines', 10000, 'kg', 'Animal', 'Used Up', 'Annotation 2024-03-26 051531.png', '2024-04-23', 'purchased and used the pfizer vaccines for the animals'),
(7, 'tractor tire', 2, 'kg', 'General', 'Used Up', 'Annotation 2024-03-26 051157.png', '2024-05-10', 'purchased and used the tires for the ploughing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `store_db`
--
ALTER TABLE `store_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `store_db`
--
ALTER TABLE `store_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
