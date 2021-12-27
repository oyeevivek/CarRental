-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 07:26 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `customer_id` text NOT NULL,
  `car_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `customer_id`, `car_id`, `start_date`, `end_date`) VALUES
(12, 'mvivek4801@gmail.com', 16, '2021-11-17', '2021-11-23'),
(13, 'mvivek4801@gmail.com', 16, '2021-11-28', '2021-12-04'),
(14, 'mvivek4801@gmail.com', 18, '2021-11-23', '2021-12-03'),
(15, 'mvivek4801@gmail.com', 19, '2021-11-30', '2021-12-04'),
(16, 'mvivek4801@gmail.com', 20, '2021-11-17', '2021-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `model` text NOT NULL,
  `number` text NOT NULL,
  `capacity` text NOT NULL,
  `rent` bigint(20) NOT NULL,
  `agencyid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `model`, `number`, `capacity`, `rent`, `agencyid`) VALUES
(16, 'TATA123', 'RJ02-7654', '5', 2000, 'ola@gmail.com'),
(17, 'MARUTI', 'RJ14-7897', '5', 3000, 'ola@gmail.com'),
(18, 'KIA23', 'RJ02-2222', '6', 4000, 'ola@gmail.com'),
(19, 'TESLA', 'MH01-6543', '6', 8000, 'rapido@gmail.com'),
(20, 'HONDA45', 'JP6754', '5', 5000, 'rapido@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `pass` text NOT NULL,
  `type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `pass`, `type`) VALUES
(1, 'VivekMittal', 'mvivek4801@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'customer'),
(4, 'Ola', 'ola@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'agency'),
(5, 'rapido', 'rapido@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'agency');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
