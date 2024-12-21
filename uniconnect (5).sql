-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 11:29 AM
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
  `UserId` int(11) NOT NULL,
  `Reports` text NOT NULL,
  `Activity` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_name` varchar(100) NOT NULL,
  `attribute_type` enum('string','int','float','date','time','enum') NOT NULL,
  `enum_values` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_name`, `attribute_type`, `enum_values`) VALUES
(1, 'Username', 'string', NULL),
(2, 'Email', 'string', NULL),
(3, 'Password', 'string', NULL),
(4, 'UserTypeId', 'int', NULL),
(5, 'EventName', 'string', NULL),
(6, 'EventDescription', 'string', NULL),
(7, 'EventImage', 'string', NULL),
(8, 'EventTimeSlot', 'time', NULL),
(9, 'EventDate', 'date', NULL),
(10, 'EventLocation', 'string', NULL),
(11, 'is_approved', 'enum', NULL),
(12, 'ClubName', 'string', NULL),
(13, 'EventId', 'int', NULL),
(14, 'UserId', 'int', NULL),
(15, 'Name', 'string', NULL),
(16, 'Email', 'string', NULL),
(17, 'Slot', 'enum', NULL),
(18, 'Role', 'enum', NULL);

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
(6, 'ACPC', 'ACPC is miu\'s club ...', NULL),
(7, 'Tedx', 'Tedx is miu\'s club ...', 1);

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `entity_id` int(11) NOT NULL,
  `entity_type` varchar(50) NOT NULL,
  `entity_name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`entity_id`, `entity_type`, `entity_name`, `created_at`) VALUES
(1, 'user', 'ali12', '2024-12-19 22:25:23'),
(2, 'user', 'mayar2205491', '2024-12-19 22:25:23'),
(3, 'user', 'admin12', '2024-12-19 22:25:23'),
(4, 'user', 'ACPC12', '2024-12-19 22:25:23'),
(5, 'user', 'Tedx', '2024-12-19 22:25:23'),
(8, 'event', 'NewYear Event', '2024-12-19 22:25:54'),
(9, 'registration', NULL, '2024-12-19 22:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `entity_values`
--

CREATE TABLE `entity_values` (
  `value_id` int(11) NOT NULL,
  `entity_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `entity_values`
--

INSERT INTO `entity_values` (`value_id`, `entity_id`, `attribute_id`, `value`) VALUES
(1, 1, 1, 'ali12'),
(2, 1, 2, 'ali12@gmail.com'),
(3, 1, 3, '$2y$10$BC7sQNfijr4IASTPs87pMuR.mnVSyPRLH79LfEOHsf9p6fqpIpVty'),
(4, 1, 4, '1'),
(5, 2, 1, 'mayar2205491'),
(6, 2, 2, 'mayar2205491@miuegypt.edu.eg'),
(7, 2, 3, '$2y$10$9lLliDTaOVhvlc7y7QKLM.ZasmG5GxCpbJ2CS/5JL6qXcG2GMBunu'),
(8, 2, 4, '1'),
(9, 3, 1, 'admin12'),
(10, 3, 2, 'admin@miuegypt.edu.eg'),
(11, 3, 3, '$2y$10$aq78MtqvrPkNAusEZgZ1a.ImqlSR3Ml/.Ug7r6au2brJu8.8oCFfe'),
(12, 3, 4, '3'),
(13, 4, 1, 'ACPC12'),
(14, 4, 2, 'ACPC@miuegypt.edu.eg'),
(15, 4, 3, '$2y$10$nG6KvP9UpYJOpiZC3oZaR.8Xd4W4NueKl.wwgxoaT92JWInOcv1Ua'),
(16, 4, 4, '2'),
(17, 5, 1, 'Tedx'),
(18, 5, 2, 'Tedx@miuegypt.edu.eg'),
(19, 5, 3, '$2y$10$Davv1DjWfHUCVFQEDFCiDOp5VHfL/.bHQL9QYyjd0ZeBcvaD0vZp6'),
(20, 5, 4, '2'),
(32, 8, 5, 'NewYear Event'),
(33, 8, 6, 'join us for unforgetable night in the newyear'),
(34, 8, 7, 'uploads/event_images/6763e49b0f3bc_MIUUU.jpg'),
(35, 8, 8, '19:00:00'),
(36, 8, 9, '2024-12-31'),
(37, 8, 10, 'miu '),
(38, 8, 11, 'approved'),
(39, 8, 12, 'Tedx'),
(47, 9, 2, 'mayar2205491@miuegypt.edu.eg'),
(48, 9, 13, '1'),
(49, 9, 14, '2'),
(50, 9, 15, 'Mayar Mohamed Farouk'),
(51, 9, 16, 'mayar2205491@miuegypt.edu.eg'),
(52, 9, 17, 'morning'),
(53, 9, 18, 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `EventId` int(11) NOT NULL,
  `EventName` varchar(100) NOT NULL,
  `EventDescription` text NOT NULL,
  `EventImage` varchar(255) NOT NULL,
  `EventTimeSlot` time NOT NULL,
  `EventDate` date NOT NULL,
  `EventLocation` varchar(200) NOT NULL,
  `is_approved` enum('pending','approved','rejected') DEFAULT 'pending',
  `ClubName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventId`, `EventName`, `EventDescription`, `EventImage`, `EventTimeSlot`, `EventDate`, `EventLocation`, `is_approved`, `ClubName`) VALUES
(1, 'NewYear Event', 'join us for unforgetable night in the newyear', 'uploads/event_images/6763e49b0f3bc_MIUUU.jpg', '19:00:00', '2024-12-31', 'miu ', 'approved', 'Tedx');

-- --------------------------------------------------------

--
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `RegistrationId` int(11) NOT NULL,
  `EventId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Slot` enum('morning','afternoon','evening') NOT NULL,
  `Role` enum('visitor','ushering') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`RegistrationId`, `EventId`, `UserId`, `Name`, `Email`, `Slot`, `Role`) VALUES
(1, 1, 2, 'Mayar Mohamed Farouk', 'mayar2205491@miuegypt.edu.eg', 'morning', 'visitor');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ReportID` int(11) NOT NULL,
  `EventId` int(11) NOT NULL,
  `Description` text NOT NULL
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
(1, 'ali12', 'ali12@gmail.com', 0x2432792431302442433773514e66696a72344941535450733837704d75522e6d6e56537950524c4837394c66454f4873663970366671704970567479, 1),
(2, 'mayar2205491', 'mayar2205491@miuegypt.edu.eg', 0x24327924313024396c4c6c694454614f5668766c63377937514b4c4d2e5a61736d473547784370624a3243532f354a4c367158634732474d42756e75, 1),
(5, 'admin12', 'admin@miuegypt.edu.eg', 0x24327924313024617137384d74717672506b4e417573455a675a31612e496d716c5352334d6c2f2e556737723661753262724a75382e386f43466665, 3),
(6, 'ACPC12', 'ACPC@miuegypt.edu.eg', 0x243279243130246e47364b7650395570594a4f70695a43336f5a61522e3858643457344e75654b6c2e777767786f615439324a57496e4f6376315561, 2),
(7, 'Tedx', 'Tedx@miuegypt.edu.eg', 0x243279243130244461767631446a57664855435646514544464369444f70355648664c2f2e6248514c395159796a64305a65426376614430765a7036, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `UserTypeId` int(11) NOT NULL,
  `TypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`UserTypeId`, `TypeName`) VALUES
(1, 'Student'),
(2, 'ClubAndOrganization'),
(3, 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `clubsandorganizations`
--
ALTER TABLE `clubsandorganizations`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `fk_clubs_event` (`EventID`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`entity_id`);

--
-- Indexes for table `entity_values`
--
ALTER TABLE `entity_values`
  ADD PRIMARY KEY (`value_id`),
  ADD KEY `entity_id` (`entity_id`),
  ADD KEY `attribute_id` (`attribute_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`EventId`);

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`RegistrationId`),
  ADD KEY `fk_registration_event` (`EventId`),
  ADD KEY `fk_registration_user` (`UserId`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `reports_ibfk_1` (`EventId`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`UserId`);

--
-- Indexes for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `fk_activity_event` (`EventId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `fk_users_user_type` (`UserTypeId`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`UserTypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `entity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `entity_values`
--
ALTER TABLE `entity_values`
  MODIFY `value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `EventId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `RegistrationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `UserTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `clubsandorganizations`
--
ALTER TABLE `clubsandorganizations`
  ADD CONSTRAINT `fk_clubs_event` FOREIGN KEY (`EventID`) REFERENCES `events` (`EventId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_clubs_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `entity_values`
--
ALTER TABLE `entity_values`
  ADD CONSTRAINT `entity_values_ibfk_1` FOREIGN KEY (`entity_id`) REFERENCES `entities` (`entity_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `entity_values_ibfk_2` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`attribute_id`) ON DELETE CASCADE;

--
-- Constraints for table `registrations`
--
ALTER TABLE `registrations`
  ADD CONSTRAINT `fk_registration_event` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_registration_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_students_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_activity`
--
ALTER TABLE `student_activity`
  ADD CONSTRAINT `fk_activity_event` FOREIGN KEY (`EventId`) REFERENCES `events` (`EventId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_activity_user` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_user_type` FOREIGN KEY (`UserTypeId`) REFERENCES `user_type` (`UserTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
