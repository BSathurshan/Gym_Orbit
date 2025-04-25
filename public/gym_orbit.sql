-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2025 at 05:13 PM
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
('123', '01', NULL, '2025-04-30', '13:00-14:00', '2025-04-22 08:02:51'),
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
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `instructor_username` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `connects_gym`
--

CREATE TABLE `connects_gym` (
  `username` varchar(255) NOT NULL,
  `gym_username` varchar(255) NOT NULL,
  `user_Name` varchar(255) NOT NULL,
  `gym_Name` varchar(255) NOT NULL,
  `type` enum('normal','premium') DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `connects_gym`
--

INSERT INTO `connects_gym` (`username`, `gym_username`, `user_Name`, `gym_Name`, `type`, `date`) VALUES
('123', '01', 'loki', 'meme', 'premium', '2025-04-25 06:21:16'),
('123', 'fitlifejohn', 'loki', 'FitLife Gym', 'premium', '2025-04-25 06:21:16'),
('123', 'ironsarah', 'loki', 'Iron Paradise Gym', 'normal', '2025-04-25 06:21:16'),
('123', 'luna07', 'loki', 'BodyBuilding Gym', 'normal', '2025-04-25 10:24:13'),
('123', 'steve09', 'loki', 'Fitness Sports Center', 'normal', '2025-04-25 10:24:21'),
('alexmo123', 'fitlifejohn', 'Alex Morgan', 'FitLife Gym', NULL, '2025-04-25 06:21:16'),
('alexmo123', 'ironsarah', 'Alex Morgan', 'Iron Paradise Gym', NULL, '2025-04-25 06:21:16'),
('davejohnson89', 'ironsarah', 'David Johnson', 'Iron Paradise Gym', 'normal', '2025-04-25 06:42:40'),
('Saneesha', 'ironsarah', 'asd', 'Iron Paradise Gym', 'normal', '2025-04-25 09:25:48');

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
('01', 'meme', '141', 'assa', 'abc@', 21, 'male', '163 Kirulapone Ave, Colombo 00500, Sri Lanka', '14440', '+94712345679', '2024-11-01', '2025-04-25 14:54:28', 45, 'asdsa', 'sad', 'no', '677cb115669eb.png'),
('fitlifejohn', 'FitLife Gym', 'fitlifejohn', 'John Smith', 'gym@gmail.com', 66, 'female', 'Chicago', '+94712345676', '+94712345672', '2025-04-18', '2025-04-25 10:23:53', 20, 'https://dribbble.com/tags/gym-website', 'https://dribbble.com/tags/gym-website', NULL, 'default.jpg'),
('ironsarah', 'Iron Paradise Gym', 'ironsarah', 'Sarah Johnson', 'sarah.johnson@gmail.com', 56, 'male', 'Orr\'sHill,Trincomalee', '740077777', '2147483647', '2021-06-12', '2024-12-02 05:23:35', 23, 'https://www.equinox.com/', '', NULL, '674d445758234.jpg'),
('jaxon08', 'BarbelKing Gym', 'jaxon08', 'Jaxon Storm', 'jaxonstorm@gmail.com', 32, 'male', 'Bambalabitiya,Colombo', '+94655885468', '+94468494468', '2010-09-24', '2025-04-25 07:25:00', 15, 'https://osmofitness.com/', 'https://osmofitness.com', NULL, '680b38cc1916c.jpeg'),
('luna07', 'BodyBuilding Gym', 'luna07', 'Luna Sterling', 'luna.sterling@gmail.com', 35, 'male', 'dehiwala,Colombo', '+94655885469', '+94561484815', '2010-05-23', '2025-04-25 07:21:55', 15, 'https://www.powerworldgyms.com/', 'https://lunasterlin.com', NULL, '680b3813c3050.jpeg'),
('steve09', 'Fitness Sports Center', 'steve09', 'Steve Rogers', 'steverogers@gmail.com', 43, 'male', 'kollupittiya', '+94655885464', '+94468494462', '2012-12-31', '2025-04-25 07:27:52', 13, 'https://www.fitzky.com/', 'https://fitsky.com', NULL, '680b3978cdf46.jpeg'),
('tony06', 'FitnessGym', 'tony06', 'Tony Stark', 'tonystark@gmail.com', 40, 'male', 'Wellawatta,Colombo', '+94456494791', '+94468494464', '2019-07-08', '2025-04-25 07:17:28', 6, 'https://www.lifetimefitness.lk/', 'https://tonystark.com', NULL, '680b37080b363.jpeg');

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
('fitlifejohn', '1745053281065', 'save 123', '4/19/2025, 2:30:44 PM', '2025-04-19 09:01:21'),
('01', '1745469078197', 'lol', '4/24/2025, 10:01:03 AM', '2025-04-24 04:31:18'),
('fitlifejohn', '1745475346097', 'gfghf', '4/24/2025, 11:45:03 AM', '2025-04-24 06:15:46');

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
('01', '2025-04-28', 'rgb(0, 128, 0)'),
('01', '2025-04-30', 'rgb(218, 165, 32)'),
('01', '2025-05-09', 'rgb(218, 165, 32)'),
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
('01', '08:00-09:00,10:00-11:00', '10:00-11:00,13:00-14:00', '10:00-11:00,11:00-12:00', '10:00-11:00,13:00-14:00', '08:00-09:00,09:00-10:00,10:00-11:00', '08:00-09:00,09:00-10:00', '08:00-09:00,11:00-12:00');

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
('ironsarah', 'sarahbbbb', 'sarah.bennett@gmail.com', '123', 'Sarah Bennett', 32, 'male', '2147483647', 'https://sociallinks.io/', 12, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete', '674d46d404b94.jpg', 'yes'),
('01', 'sarahbbbbdds', 'lokiajsd22@gmail.com', '141', 'Sarah Bennett', 22, 'male', '777777777', 'https://fitgirl1-repacks.site/all-my-repacks-a-z/?lcp_page0=6#lcp_instance_01', 24, 'sadasd', 'weekends', 'ss', 'athlete1', 'default.jpg', NULL),
('01', 'ss', 'srimathulan@gmail.com', '141', 'uuu', 24, 'male', '777777777', 'https://dribbble.com/tags/gym-website', 0, 'Wellawatte,Colombo', 'weekends', 'medalist', 'athlete1', '6795cf02ceae6.jpg', NULL);

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
('ggmicha', '01', '08:00-09:00,09:00-10:00', '08:00-09:00,10:00-11:00', '08:00-09:00,11:00-12:00', '08:00-09:00,09:00-10:00,10:00-11:00', '08:00-09:00,09:00-10:00,10:00-11:00,11:00-12:00', '08:00-09:00,10:00-11:00,13:00-14:00', '08:00-09:00,09:00-10:00', 'mic', '22', 'male', '67f66dfeebffd.png'),
('sarahbbbbdds', '01', '08:00-09:00', '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00', '10:00-11:00,11:00-12:00', '08:00-09:00,09:00-10:00,13:00-14:00', '08:00-09:00,09:00-10:00,10:00-11:00', NULL, NULL, NULL, NULL),
('ss', '01', '08:00-09:00,09:00-10:00', '08:00-09:00,09:00-10:00,10:00-11:00', '09:00-10:00', '09:00-10:00,10:00-11:00', '08:00-09:00,09:00-10:00', '08:00-09:00,13:00-14:00', '09:00-10:00', 'uuu', '22', 'male', '6795cf02ceae6.jpg');

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
('01', 'Cable Machine', '680b40ff02795.jpeg', '7', '3'),
('01', 'Leg Curl Machine', '680b41527410c.jpeg', '4', '2'),
('01', 'Leg Rower Machine', '680b418ce603e.jpeg', '6', '2'),
('01', 'Treadmill', '680b40c03886e.jpeg', '5', '5'),
('fitlifejohn', 'dumbell', '674d4c23d65bc.jpeg', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`username`, `role`, `location`, `lat`, `lang`) VALUES
('01', 'gym', '163 Kirulapone Ave, Colombo 00500, Sri Lanka', '6.886200233487424', '79.87630620117187'),
('123', 'user', 'H6JG+2CV, Trincomalee, Sri Lanka', '8.580060916023255', '81.22589660390479'),
('asdasd123', 'gym', '70 Hyde Park Corner, Colombo 00200, Sri Lanka', '6.916971712651847', '79.85969084216214'),
('fitlifejohn', 'gym', '77F Manning Pl, Colombo 00600, Sri Lanka', '6.87506136165818', '79.86304180029627'),
('ironsarah', 'gym', '15 Rheinland Pl, Colombo 00300, Sri Lanka', '6.90199864565137', '79.85179030887195'),
('us1234', 'user', 'WV25+JWF, Colombo 00700, Sri Lanka', '6.901207999923599', '79.85957597019993');

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
('01', '680b428e2cd90', 'meme', 'Free', 'BMI Chart', '680b428e2d813.jpeg', 'Calculate your BMI', '2025-04-25 08:06:38'),
('01', '680b42c21fdf2', 'meme', 'Free', 'Nutrion plan', '680b42d0566e8.jpeg', 'Select your foods healthy', '2025-04-25 10:25:55'),
('01', '680b4337b95b2', 'meme', 'Free', 'Healthy Food', '680b4337ba35f.jpeg', 'Nutrions of your foods.', '2025-04-25 09:15:44'),
('01', '680b43dff1155', 'meme', 'Premium', 'Meal Planner', '680b43e003ec5.jpeg', 'Get your Meals', '2025-04-25 10:25:14'),
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
('01', '680b574691b4d', 'meme', 'PUSH YOUR LIMITS', '680b574697a9a.jpeg', '\"When you feel like quitting, remember why you started.\"\r\n\r\n', '2025-04-25 09:35:02'),
('01', '680b5779930e6', 'meme', 'NO PAIN, NO GAIN', '680b577997db2.jpeg', '\"The body achieves what the mind believes.\"\r\n\r\n', '2025-04-25 09:35:53'),
('01', '680b57addf037', 'meme', '🏋️ STAY STRONG', '680b57addf8ad.jpeg', '\"Strength doesn’t come from what you can do. It comes from overcoming the things you once thought you couldn’t.\"', '2025-04-25 09:36:45'),
('01', '680b57e3d5dbe', 'meme', '⏱️ ONE MORE REP', '680b57e3d66b4.jpeg', '\"Success starts with self-discipline.\"\r\n\r\n', '2025-04-25 09:37:39'),
('fitlifejohn', '674d4b6e0f65e', 'FitLife Gym', '\"Your only limit is you.\"', '674d4b6e0f665.jpeg', 'Numbered List of 20 Catchy Fitness Slogan Ideas. \"Fit is the New Cool\" \"Sweat it Out, Make it Count\" \"Get Fit, Stay Fit\" \"Strong Body, Strong Mind\"\r\n', '2025-04-20 01:38:16'),
('fitlifejohn', '6759244926f15', 'FitLife Gym', '“Pain is temporary, but pride is forever.” ', '6759244926f1f.jpeg', 'You\'re really complimenting her hard work when you do this.\r\n\"You\'re working so hard.\"\r\n\"I\'m so impressed by your dedication.\"\r\n\"I can see your progress.\"', '2025-04-20 01:31:16'),
('ironsarah', '674d4a0a6b4a9', 'Iron Paradise Gym', '\"Sweat now, shine later.\"', '674d4a0a6b4b1.avif', 'Here are some more of our favourite motivational quotes to help you on your fitness journey.', '2025-04-20 01:37:16');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `issue` text NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  `reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`username`, `email`, `role`, `issue`, `message`, `time`, `reply`) VALUES
('', '', 'admin', '34234', 'Re: werewrewr', '2025-04-17 15:29:41', NULL),
('01', 'abc@', 'admin', 'check123', 'check123', '2025-04-23 09:27:32', 'jgjgjhgj'),
('123', 'lokiaj141@gmail.com', 'admin', 'test', 'test1234', '2025-04-23 09:36:11', 'checking the reply'),
('123', 'lokiaj141@gmail.com', 'admin', 'test', 'test1234', '2025-04-23 10:16:03', 'checking the reply'),
('123', 'lokiaj141@gmail.com', 'admin', 'test', 'test1234', '2025-04-23 10:17:39', 'checking the reply'),
('us1234', 'lokiaj141@gmail.com', 'admin', 'checking function', 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&amp;#039;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2025-04-23 11:48:07', 'hey hi iam solving'),
('us1234', 'lokiaj141@gmail.com', 'admin', 'hmbghjgkjh', 'bjkjbkjgjk', '2025-04-24 08:22:39', 'vccnncnbnv');

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
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('solved','unsolved') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`username`, `email`, `role`, `issue`, `message`, `time`, `status`) VALUES
('01', 'abc@', 'owner', 'check123', 'check123', '2025-04-22 11:52:07', NULL),
('1', 'fdgkdg@kdsgks', '', 'trrere', 'werewrewr', '2025-04-23 06:37:56', NULL),
('sarahbbbb', 'sarah.bennett@gmail.com', 'instructor', 'test', 'gfgf', '2024-12-18 11:45:22', NULL),
('ss', 'srimathulan@gmail.com', 'instructor', 'issueing', 'checking', '2025-04-24 04:55:00', NULL),
('us1234', 'lokiaj141@gmail.com', 'user', 'hmbghjgkjh', 'bjkjbkjgjk', '2025-04-24 06:22:39', 'solved');

-- --------------------------------------------------------

--
-- Table structure for table `system`
--

CREATE TABLE `system` (
  `id` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system`
--

INSERT INTO `system` (`id`, `admin_username`, `category`, `title`, `createdAt`, `start`, `end`) VALUES
('6808f222ec4a6', '3', 'system-maintenence', 'system maintenence', '2025-04-23 13:58:58', '2025-04-23 11:30:00', '2025-04-25 09:27:00');

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
('123', '123', 'loki', 'wolverine@gmail.com', 22, 'male', '94712345671', 'Trincomale', 'Strength', NULL, NULL, NULL, 'hq720.jpg', 'NULL'),
('davejohnson89', 'david123', 'David Johnson', 'david.johnson@gmail.com', 45, 'male', '2147483647', 'Orr\'s Hill,Trincomalee', 'Physic', 'full', 'no', NULL, '674d41311fda6.jpg', NULL),
('emmat92', 'emmat92', 'Emma Thompson', 'emma.thompson@gmail.com', 32, 'male', '1234567890', 'Wellawatte,Colombo', 'Endurance', 'part', '', 'no', '674d41cd6133e.jpg', NULL),
('jett03', 'jett03', 'Jett Cross', 'Jett@gmail.com', 34, 'male', '+94215658481', 'Colombo', 'Strength', 'part', '', NULL, '680b3b9b34a1e.jpeg', 'Lose Weight'),
('ryder01', 'ryder01', 'Ryder Knox', 'ryder@gmail.com', 22, 'male', '+94155448154', 'Colombo', 'Physic', 'full', '', NULL, '680b3aa6d8612.jpeg', 'Build Muscle');

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
  `end` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_payments`
--

INSERT INTO `user_payments` (`payment_id`, `username`, `gym_username`, `package`, `amount`, `payment_date`, `start`, `end`, `status`) VALUES
(50, '123', '01', '1_MONTH', 8000, '2025-02-18 20:43:45', NULL, NULL, 'Pending'),
(51, '123', 'fitlifejohn', '1_MONTH', 8000, '2025-02-18 21:31:20', NULL, NULL, 'Pending'),
(52, '123', 'fitlifejohn', '1_MONTH', 8000, '2025-02-19 06:58:52', NULL, NULL, 'Pending'),
(59, '123', '01', '1_MONTH', 8000, '2025-04-21 21:43:58', '2025-04-21 18:13:58', '2025-05-21 18:13:58', 'Pending'),
(60, '123', '01', '1_MONTH', 8000, '2025-04-25 08:05:52', '2025-04-25 04:35:52', '2025-05-25 04:35:52', 'Pending'),
(61, '123', '01', '1_MONTH', 8000, '2025-04-25 08:09:41', '2025-04-25 04:39:41', '2025-05-25 04:39:41', 'Pending'),
(62, '123', '01', '1_MONTH', 8000, '2025-04-25 08:38:50', '2025-04-25 05:08:50', '2025-05-25 05:08:50', 'Pending'),
(63, '123', '01', '1_MONTH', 8000, '2025-04-25 08:47:31', '2025-04-25 05:17:31', '2025-05-25 05:17:31', 'Pending'),
(64, '123', '01', '1_MONTH', 8000, '2025-04-25 08:51:32', '2025-04-25 05:21:32', '2025-05-25 05:21:32', 'Pending'),
(65, '123', '01', '1_MONTH', 8000, '2025-04-25 08:51:39', '2025-04-25 05:21:39', '2025-05-25 05:21:39', 'Complete'),
(66, '123', '01', '1_MONTH', 8000, '2025-04-25 08:51:54', '2025-04-25 05:21:54', '2025-05-25 05:21:54', 'Complete'),
(67, '123', '01', '1_MONTH', 8000, '2025-04-25 08:52:07', '2025-04-25 05:22:07', '2025-05-25 05:22:07', 'Complete'),
(68, '123', '01', '1_MONTH', 8000, '2025-04-25 08:52:30', '2025-04-25 05:22:30', '2025-05-25 05:22:30', 'Complete'),
(69, 'davejohnson89', 'ironsarah', '1_MONTH', 8000, '2025-04-25 12:12:51', '2025-04-25 08:42:51', '2025-05-25 08:42:51', 'Pending'),
(70, 'davejohnson89', 'ironsarah', '1_MONTH', 8000, '2025-04-25 13:06:16', '2025-04-25 09:36:16', '2025-05-25 09:36:16', 'Complete');

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
(74, 'Saneesha', 'Monday', 'squats', 12, 4, 0),
(75, 'Saneesha', 'Monday', 'push', 12, 3, 1),
(76, 'Saneesha', 'Monday', 'throw', 12, 3, 1),
(77, 'Saneesha', 'Tuesday', 'run', 30, 12, 1),
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
-- Indexes for table `community`
--
ALTER TABLE `community`
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
-- Indexes for table `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`username`);

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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`username`,`email`,`time`);

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
-- Indexes for table `system`
--
ALTER TABLE `system`
  ADD PRIMARY KEY (`id`,`admin_username`);

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
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `workout_schedule`
--
ALTER TABLE `workout_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
