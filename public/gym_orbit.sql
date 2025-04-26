-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2025 at 05:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gym_orbit`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(70) NOT NULL,
  `password` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') DEFAULT NULL,
  `contact` varchar(13) NOT NULL,
  `location` text DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `active` enum('full','part','temporary','not sure') DEFAULT NULL,
  `health` enum('yes','no') DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `achieve` varchar(255) DEFAULT NULL,
  `verification_code` text DEFAULT NULL,
  `verify` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `email`, `age`, `gender`, `contact`, `location`, `goals`, `active`, `health`, `ban`, `file`, `achieve`, `verification_code`, `verify`) VALUES
('123', '123', 'loki', 'lokiaj11141@gmail.com', 222, 'male', '94712345671', 'Trincomale', 'Strength', NULL, NULL, NULL, 'hq720.jpg', 'NULL', '271041fce8a3d6046077df18bf54660a', 'no'),
('davejohnson89', 'david123', 'David Johnson', 'david.johnson@gmail.com', 45, 'male', '2147483647', 'Orr\'s Hill,Trincomalee', 'Physic', 'full', 'no', NULL, '674d41311fda6.jpg', NULL, NULL, NULL),
('emmat92', 'emmat92', 'Emma Thompson', 'emma.thompson@gmail.com', 32, 'male', '1234567890', 'Wellawatte,Colombo', 'Endurance', 'part', '', 'no', '674d41cd6133e.jpg', NULL, NULL, NULL),
('jett03', 'jett03', 'Jett Cross', 'Jett@gmail.com', 34, 'male', '+94215658481', 'Colombo', 'Strength', 'part', '', 'no', '680b3b9b34a1e.jpeg', 'Lose Weight', NULL, 'no'),
('ryder01', 'ryder01', 'Ryder Knox', 'ryder@gmail.com', 22, 'male', '+94155448154', 'Colombo', 'Physic', 'full', '', NULL, '680b3aa6d8612.jpeg', 'Build Muscle', NULL, NULL),
('user123', 'user123', 'cgfgchc', 'lokiaj11141@gmail.com', 21, 'male', '+94712345677', 'hjhhkhhhiuhik', 'Strength', 'full', '', NULL, 'default.jpg', 'Build Muscle', 'bb0b61e11d0f5e07ef92f27918ecb566', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
