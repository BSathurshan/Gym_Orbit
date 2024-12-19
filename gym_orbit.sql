-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 03:49 PM
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
('super', 'admin', 'admin', 'admin', 'sathu@gmail.com', 31, 'male', 'Wellawatte,Colombo', 2147483647, '674d5b6602aa7.jpg', NULL),
('normal', 'jj', 'jj', 'jj', 'brusleepatimaraja@gmail.com', 21, 'male', 'Chicago', 777777777, '674c2a812e99c.png', 'no');

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
('123', 'fitlifejohn', 'loki', 'FitLife Gym'),
('123', 'ironsarah', 'loki', 'Iron Paradise Gym'),
('alexmo123', 'fitlifejohn', 'Alex Morgan', 'FitLife Gym'),
('alexmo123', 'ironsarah', 'Alex Morgan', 'Iron Paradise Gym');

-- --------------------------------------------------------

--
-- Table structure for table `connects_instructors`
--

CREATE TABLE `connects_instructors` (
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `trainer_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connects_instructors`
--

INSERT INTO `connects_instructors` (`gym_username`, `trainer_username`, `user_name`, `name`, `trainer_name`) VALUES
('0', 'sarahbbbb', 'alexmo123 ', 'loki', '0');

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
('0', 'meme', '141', 'assa', 'abc@', 21, 'male', 'dasdasd', 14440, 44454, '2024-11-01', '2024-12-02 00:33:38', 45, 'asdsa', 'sad', 'no', '0'),
('fitlifejohn', 'FitLife Gym', 'fitlifejohn', 'John Smith', 'ohn.smith@gmail.com', 35, 'male', 'Wellawattee,Colombo -06', 2147483647, 2147483647, '2024-07-11', '2024-12-02 05:19:27', 12, 'https://www.goldsgym.com/', '', NULL, '674d435f238b3.jpg'),
('ironsarah', 'Iron Paradise Gym', 'ironsarah', 'Sarah Johnson', 'sarah.johnson@gmail.com', 56, 'male', 'Orr\'sHill,Trincomalee', 740077777, 2147483647, '2021-06-12', '2024-12-02 05:23:35', 23, 'https://www.equinox.com/', '', NULL, '674d445758234.jpg');

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
('ironsarah', 'sarahbbbb', 'sarah.bennett@gmail.com', '123', 'Sarah Bennett', 32, 'male', 2147483647, 'https://sociallinks.io/', 12, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete', '674d46d404b94.jpg', NULL);

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

--
-- Dumping data for table `instructors_reminders`
--

INSERT INTO `instructors_reminders` (`id`, `email`, `message`, `time`) VALUES
('sarahbbbb', 'sarahbbbb@gmail.com', 'reminder checking :}', '2024-12-17 18:45:50');

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

--
-- Dumping data for table `instructor_request`
--

INSERT INTO `instructor_request` (`gym_username`, `trainer_username`, `trainer_name`, `username`, `name`, `time`) VALUES
('ironsarah', 'sarahbbbb', 'Sarah Bennett', '123', 'loki', '2024-12-16 13:21:51');

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
('0', 'loki', 'b.png'),
('fitlifejohn', 'dumbell', '674d4c23d65bc.jpeg');

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
('0', '6742216a04fb3', 'meme', 'Premium', 'Tools', '6742216a04fb8.png', 'Tools'),
('fitlifejohn', '674d4c0c9cd2b', 'FitLife Gym', 'Free', 'free meel planner', '674d4c0c9cd38.jpg', 'free meel planner'),
('ironsarah', '674221209fbcb', 'meme', 'Premium', 'lets gooo!', '674221209fbd1.png', 'use this benefits');

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
('0', '67421d255951a', 'meme', 'eee', '67421d337d9db.jpg', 'asdasd'),
('fitlifejohn', '674d4b6e0f65e', 'FitLife Gym', '\"Your only limit is you.\"', '674d4b6e0f665.jpeg', 'Numbered List of 20 Catchy Fitness Slogan Ideas. \"Fit is the New Cool\" \"Sweat it Out, Make it Count\" \"Get Fit, Stay Fit\" \"Strong Body, Strong Mind\"\r\n'),
('fitlifejohn', '6759244926f15', 'FitLife Gym', '“Pain is temporary, but pride is forever.” ', '6759244926f1f.jpeg', 'You\'re really complimenting her hard work when you do this.\r\n\"You\'re working so hard.\"\r\n\"I\'m so impressed by your dedication.\"\r\n\"I can see your progress.\"'),
('ironsarah', '674d4a0a6b4a9', 'Iron Paradise Gym', '\"Sweat now, shine later.\"', '674d4a0a6b4b1.avif', 'Here are some more of our favourite motivational quotes to help you on your fitness journey.');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `issue` text NOT NULL,
  `message` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`username`, `email`, `role`, `issue`, `message`, `time`) VALUES
('0', '', '', '34234', 'fggrt', '2024-12-02 00:06:42'),
('1', '', '', 'trrere', 'werewrewr', '2024-12-02 00:03:29'),
('123', '', '', 'test', 'testtesttest', '2024-12-01 23:51:49'),
('sarahbbbb', 'sarah.bennett@gmail.com', 'instructor', 'test', 'gfgf', '2024-12-18 11:45:22');

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
('123', '123', 'loki', 'a@@', 21, 'male', 5466, 'sadasddas', 'safaf', 'full', 'yes', 'no', 'hq720.jpg', NULL),
('alexmo123 ', 'alex123', 'Alex Morgan', 'alex.morgan@gmail.com', 35, 'male', 777777777, 'Wellawatte,Colombo', 'Strength', 'full', 'no', NULL, '674d406b2d0f8.jpg', NULL),
('davejohnson89', 'david123', 'David Johnson', 'david.johnson@gmail.com', 45, 'male', 2147483647, 'Orr\'s Hill,Trincomalee', 'Physic', 'full', 'no', NULL, '674d41311fda6.jpg', NULL),
('emmat92', 'emmat92', 'Emma Thompson', 'emma.thompson@gmail.com', 32, 'male', 1234567890, 'Wellawatte,Colombo', 'Endurance', 'part', '', NULL, '674d41cd6133e.jpg', NULL);

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
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`username`);

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
