-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 04:19 PM
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `type` enum('super','normal') NOT NULL DEFAULT 'normal',
  `admin_username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `location` text NOT NULL,
  `contact` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`type`, `admin_username`, `password`, `admin_name`, `email`, `age`, `gender`, `location`, `contact`, `file`, `ban`) VALUES
('super', '3', '141', 'Loki', 'loki@@', 21, 'male', 'jasdgsajd', 5466, '', 'no'),
('super', 'jj', 'jj', 'jj', 'brusleepatimaraja@gmail.com', 21, 'male', 'Chicago', 777777777, '674c2a812e99c.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `admin_reminders`
--

CREATE TABLE `admin_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connects_gym`
--

CREATE TABLE `connects_gym` (
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `gym_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connects_gym`
--

INSERT INTO `connects_gym` (`username`, `gym_username`, `user_Name`, `gym_Name`) VALUES
('123', '0', 'loki', 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `connects_instructors`
--

CREATE TABLE `connects_instructors` (
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) NOT NULL,
  `user_name` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trainer_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connects_instructors`
--

INSERT INTO `connects_instructors` (`gym_username`, `trainer_username`, `user_name`, `name`, `trainer_name`) VALUES
('0', '1', 123, 'loki', 0);

-- --------------------------------------------------------

--
-- Table structure for table `gym`
--

CREATE TABLE `gym` (
  `gym_username` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `location` text NOT NULL,
  `gym_contact` int(11) NOT NULL,
  `owner_contact` int(11) NOT NULL,
  `start_year` date NOT NULL,
  `joined` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `experience` int(11) NOT NULL,
  `web` text NOT NULL,
  `social` text NOT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym`
--

INSERT INTO `gym` (`gym_username`, `gym_name`, `password`, `owner_name`, `email`, `age`, `gender`, `location`, `gym_contact`, `owner_contact`, `start_year`, `joined`, `experience`, `web`, `social`, `ban`, `file`) VALUES
('0', 'meme', '141', 'assa', 'aa@', 21, 'male', 'dasdasd', 14440, 44454, '2024-11-01', '2024-12-01 09:20:05', 45, 'asdsa', 'sad', 'no', '0'),
('ssssss', 'Gym009', 'ssssss', 'aj', 'company@gmail.com', 22, 'male', 'Chicago3', 740040749, 2147483647, '2024-11-28', '2024-11-28 16:03:34', 12, 'https://dribbble.com/tags/gym-website', 'https://dribbble.com/tags/gym-website', NULL, '67489456774b2.png'),
('ssssss', 'Gym007', 'ssssss', 'aj', 'sasasa@gmail.com', 21, 'male', 'New York', 777777777, 2147483647, '2024-11-27', '2024-11-30 09:15:18', 12, 'https://dribbble.com/tags/gym-website', 'https://dribbble.com/tags/gym-website', 'no', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `gym_username` varchar(50) NOT NULL,
  `trainer_username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trainer_name` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female','prefer not to say') NOT NULL,
  `contact` int(11) DEFAULT NULL,
  `social` text NOT NULL,
  `experience` int(11) NOT NULL,
  `location` text NOT NULL,
  `availiblity` text DEFAULT NULL,
  `qualify` text DEFAULT NULL,
  `special` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ban` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`gym_username`, `trainer_username`, `email`, `password`, `trainer_name`, `age`, `gender`, `contact`, `social`, `experience`, `location`, `availiblity`, `qualify`, `special`, `file`, `ban`) VALUES
('0', '1', 'dasdasd@gmail.com', '141', 'asdads', 21, 'male', 5466, 'https://fitgirl-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_0', 45, 'sadasd', 'asdasd', 'asdasd', 'asdads', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `instructors_client_history`
--

CREATE TABLE `instructors_client_history` (
  `trainer_username` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rating` enum('1','2','3','4','5') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructors_reminders`
--

CREATE TABLE `instructors_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructor_request`
--

CREATE TABLE `instructor_request` (
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) NOT NULL,
  `trainer_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `gym_username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`gym_username`, `name`, `file`) VALUES
('0', 'HomeLander4', '67409af2aae2c.jpg'),
('0', 'loki', 'b.png');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `gym_username` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`gym_username`, `id`, `gym_name`, `type`, `title`, `file`, `details`) VALUES
('0', '674221209fbcb', 'meme', 'Premium', 'lets gooo!', '674221209fbd1.png', 'use this benefits'),
('0', '6742216a04fb3', 'meme', 'Premium', 'Tools', '6742216a04fb8.png', 'Tools');

-- --------------------------------------------------------

--
-- Table structure for table `owner_reminders`
--

CREATE TABLE `owner_reminders` (
  `id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `gym_username` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `gym_name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text DEFAULT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`gym_username`, `id`, `gym_name`, `title`, `file`, `details`) VALUES
('0', '67421ced5f746', 'meme', 'hihi', '67421ced5f74d.jpg', 'Iam the home lander'),
('0', '67421d255951a', 'meme', 'eee', '67421d337d9db.jpg', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `username` varchar(255) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `contact` int(11) NOT NULL,
  `location` text DEFAULT NULL,
  `goals` text DEFAULT NULL,
  `active` enum('full','part','temporary','not sure') DEFAULT NULL,
  `health` enum('yes','no') DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `achieve` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `email`, `age`, `gender`, `contact`, `location`, `goals`, `active`, `health`, `ban`, `file`, `achieve`) VALUES
('123', '123', 'loki', 'a@@', 21, 'male', 5466, 'sadasddas', 'safaf', 'full', 'yes', 'no', NULL, NULL),
('sathusathu', 'sathusathu', 'HomeLander', 'sathurashanb@gmail.com', 21, 'male', 777777777, 'Chicago', 'Strength', '', '', NULL, '674883608ae94.png', NULL),
('user1', 'pass123', 'Alice JohnsonEE', 'alice.johnson@example.com', 30, 'female', 1234567890, 'New York', 'Fitness', 'full', '', 'no', NULL, NULL),
('user2', 'securepass', 'Bob Smith', 'bob.smith@example.com', 34, 'male', 987654321, 'Los Angeles', 'Career Growth', 'full', '', 'no', NULL, NULL),
('user3', 'randompw', 'Charlie Brown', 'charlie.brown@example.com', 24, 'male', 2147483633, 'Chicago', 'Traveling', '', '', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_reminders`
--

CREATE TABLE `user_reminders` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_reminders`
--

INSERT INTO `user_reminders` (`id`, `username`, `message`, `time`) VALUES
('674c1b9442fc9', '123', 'Your instructor [ asdads (1) ] request has been rejected by the gym.', '2024-12-01 13:47:24'),
('674c232052011', '123', 'Your instructor [ asdads (1) ] request has been accepted by the gym.', '2024-12-01 14:19:36'),
('674c244fe87c1', '123', 'Your instructor [ asdads (1) ] request has been accepted by the gym.', '2024-12-01 14:24:39'),
('674c6638bf6ab', '123', 'Your instructor [ asdads (1) ] request has been rejected by the gym.', '2024-12-01 19:05:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_username`,`email`);

--
-- Indexes for table `admin_reminders`
--
ALTER TABLE `admin_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `connects_gym`
--
ALTER TABLE `connects_gym`
  ADD PRIMARY KEY (`username`,`gym_username`);

--
-- Indexes for table `connects_instructors`
--
ALTER TABLE `connects_instructors`
  ADD PRIMARY KEY (`gym_username`,`trainer_username`,`user_name`);

--
-- Indexes for table `gym`
--
ALTER TABLE `gym`
  ADD PRIMARY KEY (`gym_username`,`email`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
  ADD PRIMARY KEY (`trainer_username`,`email`);

--
-- Indexes for table `instructors_client_history`
--
ALTER TABLE `instructors_client_history`
  ADD PRIMARY KEY (`trainer_username`,`username`);

--
-- Indexes for table `instructor_request`
--
ALTER TABLE `instructor_request`
  ADD PRIMARY KEY (`gym_username`,`trainer_username`,`username`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`gym_username`,`name`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`gym_username`,`id`);

--
-- Indexes for table `owner_reminders`
--
ALTER TABLE `owner_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`gym_username`,`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`email`);

--
-- Indexes for table `user_reminders`
--
ALTER TABLE `user_reminders`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
