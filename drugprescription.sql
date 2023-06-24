-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2023 at 11:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drugprescription`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `to_whom` varchar(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `username`, `email`, `to_whom`, `msg`) VALUES
(7, 'Shaft', 'bab@gmail.com', 'Doctor', ''),
(8, 'Shaft', 'bab@gmail.com', 'Doctor', 'Hello Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(10) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `to_whom` varchar(50) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `email`, `to_whom`, `msg`) VALUES
(7, 'Shaft', 'bab@gmail.com', 'Doctor', ''),
(8, 'Shaft', 'bab@gmail.com', 'Doctor', 'Hello Doctor'),
(9, 'Samito', 'sa@gmail.com', 'Doctor', ''),
(10, 'Samito', 'sam@gmail.com', 'Doctor', ''),
(11, 'Doctor', 'doc@gmail.com', 'Shaft', 'hello'),
(12, 'Doctor', 'doc@gmail.com', '', 'hello'),
(13, 'Doctor', 'doc@gmail.com', '', 'yes'),
(14, 'Doctor', 'doc@gmail.com', 'Shaft@gmail', 'yes'),
(15, 'Doctor', 'doc@gmail.com', 'Shaft@gmail', 'yes'),
(16, 'Doctor', 'doc@gmail.com', 'Shaft@gmail', 'shey'),
(17, 'Doctor', 'doc@gmail.com', 'Shaft@gmail.com', 'shey'),
(18, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'Yes dear'),
(19, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'How can i help you'),
(20, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'okay'),
(21, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'yes'),
(22, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'okay testing'),
(23, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'yes'),
(24, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito'),
(25, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito'),
(26, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito'),
(27, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito'),
(28, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito'),
(29, 'Doctor', 'doc@gmail.com', 'sam@gmail.com', 'hwfa samito oialsnlkcblakblsk'),
(30, 'Shaft', 'bab@gmail.com', 'Doctor', ''),
(31, 'Shaft', 'bab@gmail.com', 'Doctor', 'i need help'),
(32, 'Doctor', 'doc@gmail.com', 'bab@gmail.com', 'which type');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `Name`, `Email`) VALUES
(1, 'Shaft', 'Shaft@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `PatientName` varchar(50) NOT NULL,
  `PatientEmail` varchar(50) NOT NULL,
  `DrugName` varchar(255) NOT NULL,
  `Dosage` varchar(50) NOT NULL,
  `TakeWhen` varchar(50) NOT NULL,
  `Days` varchar(20) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `PatientName`, `PatientEmail`, `DrugName`, `Dosage`, `TakeWhen`, `Days`, `Date`) VALUES
(1, 'Samuel', 'usikpedosamuel@yahoo.com', 'Septaline', '1 - 1 - 1', 'Before Meal', '10', '2023-06-24 19:32:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Role`, `Password`) VALUES
(1, 'Mr Johnson', 'doc@gmail.com', 'Doctor', 'test'),
(2, 'Ma Susan', 'phar@gmail.com', 'Pharmacy', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
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
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
