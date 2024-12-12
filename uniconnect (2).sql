-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 02:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User-Id` int(11) NOT NULL,
  `Reports` text NOT NULL,
  `Activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clubsandorganizations`
--

CREATE TABLE `clubsandorganizations` (
  `UserId` int(11) NOT NULL,
  `ClubAndOrganizationName` varchar(100) NOT NULL,
  `ClubAndOrganizationDescription` text NOT NULL,
  `EventID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubsandorganizations`
--

INSERT INTO `clubsandorganizations` (`UserId`, `ClubAndOrganizationName`, `ClubAndOrganizationDescription`, `EventID`) VALUES
(47, 'MUN', 'MUN is one of miu\'s club ...', NULL),
(49, 'ACPC', 'ACPC is one of miu\'s club ...', NULL),
(51, 'Tedx', 'Tedx is one of miu\'s club ...', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Event-Id` int(11) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventDescription` text NOT NULL,
  `EventImage` varchar(255) NOT NULL,
  `EventTimeSlot` time NOT NULL,
  `EventDate` date NOT NULL,
  `EventLocation` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `UserId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`UserId`, `StudentName`, `Gender`) VALUES
(30, 'ali', '1'),
(31, 'mayar', '2'),
(48, 'mohmed', '1'),
(50, 'maya', '2');

-- --------------------------------------------------------

--
-- Table structure for table `student_activity`
--

CREATE TABLE `student_activity` (
  `UserId` int(11) NOT NULL,
  `PastEvents` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  `EventId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user-type`
--

CREATE TABLE `user-type` (
  `UserTypeId` int(11) NOT NULL,
  `Type-Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user-type`
--

INSERT INTO `user-type` (`UserTypeId`, `Type-Name`) VALUES
(1, 'Student'),
(2, 'ClubAndOrganization'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varbinary(255) NOT NULL,
  `UserTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Email`, `Password`, `UserTypeId`) VALUES
(30, 'ali12', 'ali12@gmail.com', 0x2432792431302442433773514e66696a72344941535450733837704d75522e6d6e56537950524c4837394c66454f4873663970366671704970567479, 1),
(31, 'mayar2205491', 'mayar2205491@miuegypt.edu.eg', 0x24327924313024396c4c6c694454614f5668766c63377937514b4c4d2e5a61736d473547784370624a3243532f354a4c367158634732474d42756e75, 1),
(47, 'mun12', 'mun12@miuegypt.edu.eg', 0x243279243130243332616a41314e504a6a586733767a75716c3361494f743161325a684e4b4d2f31546d4e474a7447532e4471755176486b43463457, 2),
(48, 'mohmed12', 'mohamed12@gmail.com', 0x24327924313024476a456d5646336a46396f786470536e345334356a65694830356379644273584238796e42486e73494d78686f35526631546f4561, 1),
(49, 'ACPC12', 'ACPC@miuegypt.edu.eg', 0x24327924313024767964645a6455335a77706f576d792e5a59562e2e4f42564d6859646e625343423248683861474d634b345a494d7a575979636a65, 2),
(50, 'maya12', 'maya12@gmail.com', 0x24327924313024515a6d50464657314841496761444e7952413359374f4b4f5831434552656a6a5852324b616b71634771526159486b68756d5a5969, 1),
(51, 'Tedx', 'Tedx@miuegypt.edu.eg', 0x243279243130246c586134545a6f526533344f635172674a413467662e414579694159316b6c5263727047326a71772e7035645134466a6367496532, 2),
(52, 'admin12', 'admin@miuegypt.edu.eg', 0x243279243130244b313534505438727467777a66417753766f486769655539763169786b714b472e54326d774b55367a6f5775496578736d35704d79, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User-Id`);

--
-- Indexes for table `clubsandorganizations`
--
ALTER TABLE `clubsandorganizations`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Event-Id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `user-type`
--
ALTER TABLE `user-type`
  ADD PRIMARY KEY (`UserTypeId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `User-Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Event-Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
