-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2025 at 06:30 PM
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
  `contact` varchar(13) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `ban` enum('yes','no') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`type`, `admin_username`, `password`, `admin_name`, `email`, `age`, `gender`, `location`, `contact`, `file`, `ban`) VALUES
('super', '3', '141', 'Loki', 'loki@@', 21, 'male', 'jasdgsajd', '+94712345678', 'default.jpg', 'no'),
('super', 'admin', 'admin', 'admin', 'sathu@gmail.com', 31, 'female', 'Wellawatte,Colombo', '2147483647', '674d5b6602aa7.jpg', NULL),
('normal', 'jj', 'jj', 'jj', 'brusleepatimaraja@gmail.com', 21, 'male', 'Chicago', '777777777', '674c2a812e99c.png', 'no');

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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `trainer_username` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `time` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`username`, `gym_username`, `trainer_username`, `date`, `time`, `created`) VALUES
('123', '01', 'ggmicha', '2025-04-17', '08:00-09:00', '2025-04-17 17:39:37'),
('123', '01', NULL, '2025-04-19', '08:00-09:00', '2025-04-17 18:14:39'),
('123', '01', 'ggmicha', '2025-04-20', '10:00-11:00', '2025-04-19 00:10:54'),
('123', '01', NULL, '2025-04-21', '11:00-12:00', '2025-04-19 10:24:20'),
('141', '01', 'ss', '2025-02-09', '07:00-10:00', '2025-02-09 14:26:05'),
('141', '01', 'ss', '2025-02-11', '07:00-10:00', '2025-02-09 14:29:07'),
('141', '01', 'No Instructor', '2025-02-17', '18:00-19:00', '2025-02-05 03:26:48'),
('141', '01', 'ss', '2025-02-24', '07:00-09:00', '2025-02-06 10:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_event_master`
--

CREATE TABLE `calendar_event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) DEFAULT NULL,
  `event_start_date` date DEFAULT NULL,
  `event_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
('123', '01', 'loki', 'meme'),
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
('01', 'sarahbbbb', 'alexmo123 ', 'loki', '0');

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
  `gym_contact` varchar(13) NOT NULL,
  `owner_contact` varchar(13) NOT NULL,
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
('01', 'meme', '141', 'assa', 'abc@', 21, 'male', 'dasdasd', '14440', '+94712345679', '2024-11-01', '2025-04-19 03:09:10', 45, 'asdsa', 'sad', 'no', '677cb115669eb.png'),
('asdasd123', 'sdasdasd', 'dasdasd', 'John Smith', 'farmer@gmail.com', 66, 'female', 'Chicago', '+94712345676', '+94712345672', '2025-04-18', '2025-04-21 02:54:18', 20, 'https://dribbble.com/tags/gym-website', 'https://dribbble.com/tags/gym-website', NULL, 'default.jpg'),
('fitlifejohn', 'FitLife Gym', 'fitlifejohn', 'John Smith', 'ohn.smith@gmail.com', 35, 'male', 'Wellawattee,Colombo -06', '2147483647', '2147483647', '2024-07-11', '2024-12-02 05:19:27', 12, 'https://www.goldsgym.com/', '', NULL, '674d435f238b3.jpg'),
('ironsarah', 'Iron Paradise Gym', 'ironsarah', 'Sarah Johnson', 'sarah.johnson@gmail.com', 56, 'male', 'Orr\'sHill,Trincomalee', '740077777', '2147483647', '2021-06-12', '2024-12-02 05:23:35', 23, 'https://www.equinox.com/', '', NULL, '674d445758234.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gym_notes`
--

CREATE TABLE `gym_notes` (
  `gym_username` varchar(255) NOT NULL,
  `note_id` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym_notes`
--

INSERT INTO `gym_notes` (`gym_username`, `note_id`, `content`, `date`, `time`) VALUES
('01', '1744215433987', 'checking 2', '4/9/2025, 9:46:20 PM', '2025-04-09 16:17:13'),
('01', '1745017453033', 'checking 1', '4/19/2025, 4:34:03 AM', '2025-04-18 23:04:13'),
('fitlifejohn', '1745053281065', 'save 123', '4/19/2025, 2:30:44 PM', '2025-04-19 09:01:21');

-- --------------------------------------------------------

--
-- Table structure for table `gym_schedule`
--

CREATE TABLE `gym_schedule` (
  `gym_username` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `color` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym_schedule`
--

INSERT INTO `gym_schedule` (`gym_username`, `date`, `color`) VALUES
('01', '2025-04-19', 'rgb(0, 128, 0)'),
('01', '2025-04-23', 'rgb(0, 0, 255)'),
('01', '2025-04-24', 'rgb(0, 128, 0)'),
('01', '2025-04-25', 'rgb(0, 128, 0)'),
('01', '2025-04-26', 'rgb(255, 0, 0)'),
('01', '2025-04-30', 'rgb(255, 255, 0)'),
('01', '2025-05-09', 'rgb(255, 255, 0)'),
('fitlifejohn', '2025-04-24', 'rgb(255, 0, 0)'),
('fitlifejohn', '2025-04-25', 'rgb(0, 128, 0)');

-- --------------------------------------------------------

--
-- Table structure for table `gym_time`
--

CREATE TABLE `gym_time` (
  `gym_username` varchar(255) NOT NULL,
  `Monday` text DEFAULT NULL,
  `Tuesday` text DEFAULT NULL,
  `Wednesday` text DEFAULT NULL,
  `Thursday` text DEFAULT NULL,
  `Friday` text DEFAULT NULL,
  `Saturday` text DEFAULT NULL,
  `Sunday` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gym_time`
--

INSERT INTO `gym_time` (`gym_username`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`) VALUES
('01', '', '', '', '08:00-09:00,10:00-11:00,11:00-12:00,13:00-14:00', '13:00-14:00,14:00-15:00', '', '10:00-11:00,11:00-12:00,13:00-14:00');

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
  `contact` varchar(13) DEFAULT NULL,
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
('01', 'ggmicha', 'mic@gmail.com', 'mic141', 'mic', 22, 'female', '+94712345673', 'https://fitgirl1-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_01', 12, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete', '67f66dfeebffd.png', NULL),
('ironsarah', 'sarahbbbb', 'sarah.bennett@gmail.com', '123', 'Sarah Bennett', 32, 'male', '2147483647', 'https://sociallinks.io/', 12, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete', '674d46d404b94.jpg', NULL),
('01', 'sarahbbbbdds', 'lokiajsd22@gmail.com', '141', 'Sarah Bennett', 22, 'male', '777777777', 'https://fitgirl1-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_01', 24, 'sadasd', 'weekends', 'ss', 'athlete1', 'default.jpg', NULL),
('01', 'ss', 'lokiajsd@gmail.com', '141', 'uuu', 24, 'male', '777777777', 'https://dribbble.com/tags/gym-website', 0, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete1', '6795cf02ceae6.jpg', NULL);

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
('01', 'sarahbbbbdds', 'Sarah Bennett', '123', 'loki', '2025-04-21 04:07:39'),
('ironsarah', 'sarahbbbb', 'Sarah Bennett', '123', 'loki', '2024-12-16 13:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_time`
--

CREATE TABLE `instructor_time` (
  `trainer_username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `Monday` text DEFAULT NULL,
  `Tuesday` text DEFAULT NULL,
  `Wednesday` text DEFAULT NULL,
  `Thursday` text DEFAULT NULL,
  `Friday` text DEFAULT NULL,
  `Saturday` text DEFAULT NULL,
  `Sunday` text DEFAULT NULL,
  `trainer_name` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_time`
--

INSERT INTO `instructor_time` (`trainer_username`, `gym_username`, `Monday`, `Tuesday`, `Wednesday`, `Thursday`, `Friday`, `Saturday`, `Sunday`, `trainer_name`, `age`, `gender`, `file`) VALUES
('ggmicha', '01', '', '', '', '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00', '', '08:00-09:00,09:00-10:00,10:00-11:00', 'mic', '22', 'male', '67f66dfeebffd.png'),
('ss', '01', '08:00-09:00,09:00-10:00', NULL, '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00', NULL, NULL, 'uuu', '22', 'male', '6795cf02ceae6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `machines`
--

CREATE TABLE `machines` (
  `gym_username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `total` varchar(12) DEFAULT NULL,
  `available` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `machines`
--

INSERT INTO `machines` (`gym_username`, `name`, `file`, `total`, `available`) VALUES
('01', 'mach1', '67409af2aae2c.jpg', '7', '3'),
('01', 'machine 2', 'b.png', '5', '1'),
('fitlifejohn', 'dumbell', '674d4c23d65bc.jpeg', '3', '3');

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
  `details` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`gym_username`, `id`, `gym_name`, `type`, `title`, `file`, `details`, `createdAt`) VALUES
('01', '6742216a04fb3', 'meme', 'Premium', 'Tool', '6742216a04fb8.png', 'Tool', '2025-04-20 01:50:14'),
('fitlifejohn', '674d4c0c9cd2b', 'FitLife Gym', 'Premium', 'free meel planner', '674d4c0c9cd38.jpg', 'free meel planner', '2025-04-20 01:50:36'),
('ironsarah', '674221209fbcb', 'meme', 'Premium', 'lets gooo!', '674221209fbd1.png', 'use this benefits', '2025-04-20 01:49:44');

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
  `details` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`gym_username`, `id`, `gym_name`, `title`, `file`, `details`, `createdAt`) VALUES
('01', '67421d255951a', 'meme', 'hi', '67421d337d9db.jpg', 'asdasd', '2025-04-21 04:06:39'),
('fitlifejohn', '674d4b6e0f65e', 'FitLife Gym', '\"Your only limit is you.\"', '674d4b6e0f665.jpeg', 'Numbered List of 20 Catchy Fitness Slogan Ideas. \"Fit is the New Cool\" \"Sweat it Out, Make it Count\" \"Get Fit, Stay Fit\" \"Strong Body, Strong Mind\"\r\n', '2025-04-20 01:38:16'),
('fitlifejohn', '6759244926f15', 'FitLife Gym', '“Pain is temporary, but pride is forever.” ', '6759244926f1f.jpeg', 'You\'re really complimenting her hard work when you do this.\r\n\"You\'re working so hard.\"\r\n\"I\'m so impressed by your dedication.\"\r\n\"I can see your progress.\"', '2025-04-20 01:31:16'),
('ironsarah', '674d4a0a6b4a9', 'Iron Paradise Gym', '\"Sweat now, shine later.\"', '674d4a0a6b4b1.avif', 'Here are some more of our favourite motivational quotes to help you on your fitness journey.', '2025-04-20 01:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_user_gym_instructor`
--

CREATE TABLE `schedule_user_gym_instructor` (
  `gym_username` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `instructor_username` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
('01', '', '', '34234', 'fggrt', '2025-01-11 14:47:48'),
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
  `contact` varchar(13) NOT NULL,
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
('123', '123', 'loki', 'wolverine@gmail.com', 21, 'male', '+94712345671', 'sadasddas', 'Strength', 'full', 'yes', 'no', 'hq720.jpg', NULL),
('davejohnson89', 'david123', 'David Johnson', 'david.johnson@gmail.com', 45, 'male', '2147483647', 'Orr\'s Hill,Trincomalee', 'Physic', 'full', 'no', NULL, '674d41311fda6.jpg', NULL),
('emmat92', 'emmat92', 'Emma Thompson', 'emma.thompson@gmail.com', 32, 'male', '1234567890', 'Wellawatte,Colombo', 'Endurance', 'part', '', 'no', '674d41cd6133e.jpg', NULL),
('te', '141', 'asd', 'check@gmail.com', 24, 'female', '777777777', 'sadasd', 'strength', 'full', 'no', 'no', '67827d7756557.webp', 'build muscle'),
('us1234', 'user1234', 'HomeLander', 'farmers@gmail.com', 22, 'male', '+94712345677', 'Chicago', 'Strength', 'full', 'no', NULL, 'default.jpg', 'Build Muscle');

-- --------------------------------------------------------

--
-- Table structure for table `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `username` varchar(70) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `package` varchar(24) NOT NULL,
  `amount` float NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `username`, `gym_username`, `package`, `amount`, `payment_date`, `start`, `end`) VALUES
(50, '123', '01', '1_MONTH', 8000, '2025-02-18 20:43:45', NULL, NULL),
(51, '123', 'fitlifejohn', '1_MONTH', 8000, '2025-02-18 21:31:20', NULL, NULL),
(52, '123', 'fitlifejohn', '1_MONTH', 8000, '2025-02-19 06:58:52', NULL, NULL),
(59, '123', '01', '1_MONTH', 8000, '2025-04-21 21:43:58', '2025-04-21 18:13:58', '2025-05-21 18:13:58');

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

-- --------------------------------------------------------

--
-- Table structure for table `workout_progress`
--

CREATE TABLE `workout_progress` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `day` varchar(10) NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `workout_schedule`
--

CREATE TABLE `workout_schedule` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `exercise` varchar(255) NOT NULL,
  `sets` int(11) DEFAULT 0,
  `reps` int(11) DEFAULT 0,
  `done` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workout_schedule`
--

INSERT INTO `workout_schedule` (`id`, `username`, `day`, `exercise`, `sets`, `reps`, `done`) VALUES
(74, 'Saneesha', 'Monday', 'squats', 12, 4, 1),
(75, 'Saneesha', 'Monday', 'push', 12, 3, 1),
(76, 'Saneesha', 'Monday', 'throw', 12, 3, 0),
(77, 'Saneesha', 'Tuesday', 'run', 30, 12, 0),
(78, 'Saneesha', 'Wednesday', 'fast', 23, 4, 0),
(79, 'Saneesha', 'Friday', 'pull', 12, 3, 0),
(80, 'Saneesha', 'Friday', 'push', 12, 4, 0);

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
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`username`,`gym_username`,`date`);

--
-- Indexes for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  ADD PRIMARY KEY (`event_id`);

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
-- Indexes for table `gym_notes`
--
ALTER TABLE `gym_notes`
  ADD PRIMARY KEY (`note_id`,`gym_username`);

--
-- Indexes for table `gym_schedule`
--
ALTER TABLE `gym_schedule`
  ADD PRIMARY KEY (`gym_username`,`date`);

--
-- Indexes for table `gym_time`
--
ALTER TABLE `gym_time`
  ADD PRIMARY KEY (`gym_username`);

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
-- Indexes for table `instructor_time`
--
ALTER TABLE `instructor_time`
  ADD PRIMARY KEY (`trainer_username`,`gym_username`);

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
-- Indexes for table `schedule_user_gym_instructor`
--
ALTER TABLE `schedule_user_gym_instructor`
  ADD PRIMARY KEY (`gym_username`,`username`,`date`);

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
-- Indexes for table `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `user_reminders`
--
ALTER TABLE `user_reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `workout_progress`
--
ALTER TABLE `workout_progress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `calendar_event_master`
--
ALTER TABLE `calendar_event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `workout_progress`
--
ALTER TABLE `workout_progress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `workout_progress`
--
ALTER TABLE `workout_progress`
  ADD CONSTRAINT `workout_progress_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
