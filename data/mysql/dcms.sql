-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Dec 13, 2021 at 04:29 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcms`
--

-- --------------------------------------------------------

--
-- Table structure for table `availableDoctors`
--

CREATE TABLE `availableDoctors` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `availableDoctors`
--

INSERT INTO `availableDoctors` (`id`) VALUES
(9),
(10),
(13),
(17);

-- --------------------------------------------------------

--
-- Table structure for table `availablePatients`
--

CREATE TABLE `availablePatients` (
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `availablePatients`
--

INSERT INTO `availablePatients` (`id`) VALUES
(9),
(10),
(11),
(12),
(13);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int NOT NULL,
  `testName` varchar(255) NOT NULL,
  `testPrice` double(255,2) NOT NULL,
  `numOfTests` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `testName`, `testPrice`, `numOfTests`) VALUES
(1, 'test1', 220.00, 2),
(2, 'test2', 400.00, 4),
(3, 'test3', 200.00, 3);

-- --------------------------------------------------------

--
-- Table structure for table `emergencyRequests`
--

CREATE TABLE `emergencyRequests` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `emergency` text,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other','') DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `emergencyRequests`
--

INSERT INTO `emergencyRequests` (`id`, `name`, `username`, `email`, `emergency`, `phone`, `gender`, `dateOfBirth`, `profilePicture`) VALUES
(6, 'Ashik Rahman', 'ash', 'ash@ash.com', 'accident', '+8801746553758', 'Male', '1999-01-25', 'default.png'),
(9, 'nil rahman', 'nila', 'nila@nil.com', 'head injury', 'ascascasc', 'Male', '1999-11-09', 'default.png'),
(10, 'asha', 'asha', 'asha@aa.aa', 'bleeding', '2342342344444', 'Male', '2021-11-02', 'default.png'),
(11, 'Ashik R', 'aaa', 'aaa@a.a', 'delivery', 'aaaaaaaaaaa', 'Male', '2021-11-15', 'default.png'),
(12, 'DOctor 1', 'doc1', 'doc1@d.d', 'leg injury', 'bljinbl;', 'Male', '2001-01-01', 'default.png'),
(13, 'jhdsblvjkhbd', 'doc2', 'doc2@d.d', 'accident', 'jnkladjsnlvckj', 'Male', '2001-01-01', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `count` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `count`) VALUES
(1, 'eq1', 8),
(2, 'Some New Equipment', 23),
(3, 'eq2', 22),
(4, 'MRI Machine', 14),
(5, 'ECG Machine', 18);

-- --------------------------------------------------------

--
-- Table structure for table `OTschedules`
--

CREATE TABLE `OTschedules` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `emergency` text,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other','') DEFAULT NULL,
  `OPdate` date NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `OTschedules`
--

INSERT INTO `OTschedules` (`id`, `name`, `username`, `emergency`, `phone`, `gender`, `OPdate`, `profilePicture`) VALUES
(6, 'Ashik Rahman', 'ash', 'accident', '+8801746553758', 'Male', '2021-01-25', 'default.png'),
(9, 'nil rahman', 'nila', 'head injury', 'ascascasc', 'Male', '2022-11-09', 'default.png'),
(10, 'asha', 'asha', 'bleeding', '2342342344444', 'Male', '2021-11-02', 'default.png'),
(11, 'Ashik R', 'aaa', 'delivery', 'aaaaaaaaaaa', 'Male', '2021-11-15', 'default.png'),
(12, 'DOctor 1', 'doc1', 'leg injury', 'bljinbl;', 'Male', '2022-01-01', 'default.png'),
(13, 'jhdsblvjkhbd', 'doc2', 'accident', 'jnkladjsnlvckj', 'Male', '2022-01-01', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int NOT NULL,
  `userId` int NOT NULL,
  `token` varchar(255) NOT NULL,
  `agent` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `userId`, `token`, `agent`, `time`) VALUES
(3, 6, 'c4df780fba2fbc109b7325c42018045ccbe61a140e294ad9ffd44b5f6a26eb1cfd96f65d9d', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:94.0) Gecko/20100101 Firefox/94.0', '2021-11-09 21:08:12'),
(5, 12, '246291a86a83133494a67f1b8886232a905d4912e396bb1f6dcfc0e0dd625fe0a2f23598aa', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', '2021-11-15 21:51:03'),
(8, 13, 'f366aee83c118d977bf39aeb25966dd46d297f461f0151086dcf84a763eb490f3624566a86', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:94.0) Gecko/20100101 Firefox/94.0', '2021-11-29 08:02:02'),
(10, 6, '6e6a5a9d52999894bf7d052a7d97ab6491b779af607ebb4edd26095d8c97fec277cb0d9c54', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.54 Safari/537.36', '2021-12-08 15:36:20'),
(27, 22, '12782709121dd7187ac239939bbfea892062d762e7ff4acb05c618356310da8e8a82fa11fd', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10.15; rv:95.0) Gecko/20100101 Firefox/95.0', '2021-12-13 04:27:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','Doctor','Patient','Employee') NOT NULL DEFAULT 'Patient',
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `gender` enum('Male','Female','Other','') DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `profilePicture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `role`, `address`, `phone`, `gender`, `dateOfBirth`, `profilePicture`) VALUES
(6, 'Ashik Rahman', 'ash', 'ash@ash.com', 'ash', 'Admin', 'Shahzadpur Sirajgonj', '+8801746553758', 'Male', '1999-01-25', 'user/1638995021-6-Image_5 2019-04-21_22-41-13.jpeg'),
(9, 'Nil rahman', 'nila', 'nila@nil.com', 'nil', 'Doctor', 'sasca', 'ascascasc', 'Male', '1999-11-09', 'default.png'),
(10, 'asha', 'asha', 'asha@aa.aa', 'asha', 'Doctor', 'Shahzadpur, Sirajgonj', '2342342344444', 'Male', '2021-11-02', 'default.png'),
(11, 'Ashik R', 'aaa', 'aaa@a.a', 'aaa', 'Doctor', 'asdfghjk', 'aaaaaaaaaaa', 'Male', '2021-11-15', 'default.png'),
(12, 'DOctor 1', 'doc1', 'doc1@d.d', 'doc1', 'Doctor', 'jsdhlsdjvhb', 'bljinbl;', 'Male', '2001-01-01', 'user/1639355713-12-user3.jpg'),
(13, 'hjhj jkjk', 'doc2', 'doc2@d.d', 'doc2', 'Doctor', 'janslkjnas', 'jnkladjsnlvckj', 'Male', '2001-01-01', 'default.png'),
(14, 'A1 A1', 'a1', 'a1@a.a', 'a1', 'Admin', 'Somewhere in BD', '3528359283', 'Female', '2021-05-02', 'default.png'),
(15, 'A2 A2', 'a2', 'a2@a.a', 'a2', 'Patient', 'Jakarta', '87239482', 'Male', '2021-12-16', 'default.png'),
(16, 'A3 A3', 'a3', 'a3@a.a', 'a3', 'Employee', 'Nagasaki', '7612384', 'Male', '2021-11-29', 'default.png'),
(17, 'U1 U1', 'u1', 'u1@u.u', 'u1', 'Doctor', 'Paris', '37264923', 'Other', '2021-11-30', 'default.png'),
(18, 'U2 U2', 'u2', 'u2@u.u', 'u2', 'Patient', 'Berlin', '234545435', 'Female', '2021-06-08', 'default.png'),
(19, 'U3 U3', 'u3', 'u3@u.u', 'u3', 'Employee', 'Chicago', '137498234', 'Male', '1995-04-22', 'default.png'),
(20, 'B1 B1', 'b1', 'b1@b.b', 'b1', 'Doctor', 'Dhaka', '32452345', 'Male', '2021-11-30', 'default.png'),
(22, 'Employee 1', 'emp1', 'e1@e.e', 'emp1', 'Employee', 'Dhaka', '2351235', 'Male', '2021-12-08', 'user/1639369690-22-user6.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availableDoctors`
--
ALTER TABLE `availableDoctors`
  ADD UNIQUE KEY `nvm` (`id`);

--
-- Indexes for table `availablePatients`
--
ALTER TABLE `availablePatients`
  ADD UNIQUE KEY `nvm` (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_index` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
