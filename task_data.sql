-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20230608.70ff7dcd6b
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 11:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `task_data`
--

CREATE TABLE `task_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `todo` mediumtext NOT NULL,
  `stats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `task_data`
--

INSERT INTO `task_data` (`id`, `title`, `date`, `todo`, `stats`) VALUES
(1, 'Sample 1', '2023-06-11', 'Cleaning\r\nWashing\r\nCooking', 'Completed'),
(2, 'Date', '2023-06-13', 'Going to SM MOA', 'Not Complete'),
(3, 'Bday Sample', '2023-06-24', 'Order Cake\r\nMake videos', 'Not Complete');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `task_data`
--
ALTER TABLE `task_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `task_data`
--
ALTER TABLE `task_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
