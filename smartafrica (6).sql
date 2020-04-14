-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2020 at 07:43 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartafrica`
--
CREATE DATABASE IF NOT EXISTS `smartafrica` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smartafrica`;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE IF NOT EXISTS `appointments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Date` varchar(45) NOT NULL,
  `Time` varchar(45) NOT NULL,
  `site_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doctors_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `user_id` (`user_id`),
  KEY `doctors_id` (`doctors_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `Date`, `Time`, `site_id`, `user_id`, `doctors_id`, `created_at`, `updated_at`) VALUES
(1, '15/04/2020', '8:00', 1, 3, 4, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(2, '16/04/2020', '9:00', 1, 2, 4, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(3, '15/04/2020', '11:00', 1, 5, 4, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(4, '16/04/2020', '10:00', 2, 5, 4, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(5, '16/04/2020', '13:00', 4, 5, 7, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(6, '16/04/2020', '14:00', 5, 4, 7, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(7, '16/04/2020', '13:30', 6, 3, 7, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(8, '16/04/2020', '14:30', 5, 2, 10, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(9, '17/04/2020', '13:00', 5, 1, 10, '2020-04-13 11:18:27', '2020-04-13 11:18:27'),
(10, '17/04/2020', '14:00', 5, 2, 10, '2020-04-13 11:18:27', '2020-04-13 11:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `center_doctors`
--

CREATE TABLE IF NOT EXISTS `center_doctors` (
  `cd_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE IF NOT EXISTS `contact_messages` (
  `contact_message_id` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `email` varchar(30) NOT NULL,
  `subject` varchar(45) NOT NULL,
  `message` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `measures`
--

CREATE TABLE IF NOT EXISTS `measures` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(45) NOT NULL,
  `Content` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `measures`
--

INSERT INTO `measures` (`Id`, `Name`, `Content`, `created_at`, `updated_at`) VALUES
(1, 'Social distance', 'Keep at least 6 feet from one another and avo', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(2, 'Personal hygiene', 'Wash hands regularly with water and soap', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(3, 'Masking', 'When it is inevitable to stay at home, wear f', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(4, 'Home', 'It is prudent and safer to stay at home', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(5, 'Case', 'Use toll free nummber and contact health perr', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(6, 'Diet', 'Eat nutritively to boost your immune system', '2020-04-13 11:21:17', '2020-04-13 11:21:17'),
(7, 'Exercise', 'Do not sit at a position for too long. Exerci', '2020-04-13 11:21:17', '2020-04-13 11:21:17');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `notificationType` varchar(45) NOT NULL,
  `content` varchar(255) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `UserId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_records`
--

CREATE TABLE IF NOT EXISTS `patient_records` (
  `patient_record_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_userId` int(11) NOT NULL COMMENT 'references users table',
  `doctor_id` int(11) NOT NULL COMMENT 'references Users',
  `site_id` int(11) NOT NULL COMMENT 'references site',
  `appointment_id` int(11) NOT NULL COMMENT 'references appointments',
  `quarantine_id` int(11) NOT NULL COMMENT 'references site',
  `consulted_on` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discharged_on` date DEFAULT NULL,
  `state` varchar(45) NOT NULL DEFAULT 'stable' COMMENT 'died, healed, critical, referred',
  `observation` varchar(150) DEFAULT NULL COMMENT 'general state of patient',
  PRIMARY KEY (`patient_record_id`),
  KEY `patient_userId` (`patient_userId`),
  KEY `doctor_id` (`doctor_id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `patient_records`
--

INSERT INTO `patient_records` (`patient_record_id`, `patient_userId`, `doctor_id`, `site_id`, `appointment_id`, `quarantine_id`, `consulted_on`, `created_at`, `updated_at`, `discharged_on`, `state`, `observation`) VALUES
(1, 8, 7, 6, 6, 5, '2020-04-05', '2020-04-13 11:30:51', '2020-04-13 08:00:00', '2020-04-13', 'healed', 'Healed'),
(2, 3, 10, 3, 1, 3, '2020-03-06', '2020-04-03 02:00:00', '2020-04-13 06:00:00', '2020-04-10', 'critical', NULL),
(3, 2, 10, 3, 1, 3, '2020-03-06', '2020-04-03 02:00:00', '2020-04-13 06:00:00', NULL, 'stable', 'Treatment'),
(4, 1, 10, 3, 3, 3, '2020-02-11', '2020-04-01 08:17:14', '2020-04-03 03:11:00', NULL, 'critical', 'Critical'),
(5, 5, 7, 2, 5, 2, '2020-04-01', '2020-04-01 04:00:00', NULL, NULL, 'stable', 'Stable condition'),
(6, 4, 7, 7, 6, 7, '2020-04-05', '2020-04-12 02:00:00', NULL, NULL, 'died', 'Died'),
(7, 3, 4, 4, 8, 4, '2020-04-07', '2020-04-06 22:00:00', NULL, NULL, 'stable', 'died'),
(8, 11, 4, 10, 10, 10, '2020-02-11', '2020-04-02 16:23:53', '2020-04-13 08:00:00', '2020-04-13', 'stable', 'Healed');

-- --------------------------------------------------------

--
-- Table structure for table `privileges`
--

CREATE TABLE IF NOT EXISTS `privileges` (
  `privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `privileges`
--

INSERT INTO `privileges` (`privilege_id`, `name`, `state`, `created_at`, `updated_at`) VALUES
(1, 'Manage users', 1, '2020-04-12 04:24:47', '2020-04-12 04:24:47'),
(2, 'Manage centers', 1, '2020-04-12 04:24:47', '2020-04-12 04:24:47'),
(3, 'Manage patients', 1, '2020-04-12 04:25:17', '2020-04-12 04:25:17'),
(4, 'Generate reports', 1, '2020-04-12 04:50:40', '2020-04-12 04:50:40'),
(5, 'Manage measures', 1, '2020-04-12 04:50:40', '2020-04-12 04:50:40');

-- --------------------------------------------------------

--
-- Table structure for table `revoke_privileges`
--

CREATE TABLE IF NOT EXISTS `revoke_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_id` int(11) NOT NULL,
  `reason` varchar(125) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `revoke_sub`
--

CREATE TABLE IF NOT EXISTS `revoke_sub` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL,
  `reason` varchar(125) NOT NULL,
  `sub_privilege_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created__at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2020-04-12 04:13:49', NULL),
(2, 'Doctor', '2020-04-12 22:44:52', NULL),
(3, 'Patient', '2020-04-12 22:44:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_has_privileges`
--

CREATE TABLE IF NOT EXISTS `roles_has_privileges` (
  `privilege_id` int(11) NOT NULL,
  `role_has_privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_has_privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles_has_privileges`
--

INSERT INTO `roles_has_privileges` (`privilege_id`, `role_has_privilege_id`, `role_id`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2020-04-12 04:26:53', NULL),
(2, 2, 1, 1, '2020-04-12 04:26:53', NULL),
(3, 3, 1, 1, '2020-04-12 04:27:29', NULL),
(4, 4, 1, 1, '2020-04-12 04:27:29', NULL),
(5, 5, 1, 1, '2020-04-12 04:52:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SiteName` varchar(45) NOT NULL,
  `Longitude` varchar(45) NOT NULL,
  `Latitude` varchar(45) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `District` varchar(45) NOT NULL,
  `Sector` varchar(45) NOT NULL,
  `emmergencyEmail` varchar(45) DEFAULT NULL,
  `EmmergencyPhone` varchar(45) DEFAULT NULL,
  `SiteType` varchar(45) DEFAULT NULL,
  `country` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`Id`, `SiteName`, `Longitude`, `Latitude`, `Province`, `District`, `Sector`, `emmergencyEmail`, `EmmergencyPhone`, `SiteType`, `country`, `created_at`, `updated_at`) VALUES
(1, 'Amahoru Stadium', '1234', '832', 'Kigali', 'Remera', 'Kacyiru', 'amahuro@infoline.com', '3987398493', '1', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(2, 'Kimirongo Hall', '4893', '849', 'Kigali', 'district1', 'sector1', 'kiminronko@info.uk', '987928431', '1', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(3, 'Musanze', '9283', '789', 'Northern Province', 'Kibagabaga', 'Manzi', NULL, '19894039023', '3', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(4, 'Huye center', '29.758777', '-2.622070', 'Southern province', 'huy1', 'sector1', '112@yahoo.com', '+25077777772', '1', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(5, 'Kigali', '30.077450', '-1.968912', 'Kigali', 'Remira', 'sector1', '1124@yahoo.com', '+25077777872', '3', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(6, 'Bamenda1', '10.185287', '5.856475', 'North West', 'Mezam', 'Tabah', 'tabah@gmail.com', '+237674335329', '2', 'Cameroon', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(7, 'Bertoua', '13.943418', '3.732708', 'EAST', 'Dist1', 'Bertuoa', 'cmr@yahoo.com', '+237653738391', '2', 'Cameroon', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(8, 'Rushashi', '29.883667', '-1.7451183', 'Northern', 'Dist1', 'sect1', 'rushashi@yahoo.com', '+250786373736', '2', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(9, 'Yaounde', '11.657382', '3.908099', 'Center', 'Mfoundi', 'Ekounou', '17712@yahoo.com', '+250786373735', '1', 'Cameroon', '2020-04-13 11:20:24', '2020-04-13 11:20:24'),
(10, 'Gatsibo', '30.359051', '-1.657331', 'Western', 'district2', 'sector4', '19912@yahoo.com', '+250786373734', '3', 'Rwanda', '2020-04-13 11:20:24', '2020-04-13 11:20:24');

-- --------------------------------------------------------

--
-- Table structure for table `sub_privileges`
--

CREATE TABLE IF NOT EXISTS `sub_privileges` (
  `sub_privilege_id` int(11) NOT NULL AUTO_INCREMENT,
  `privilege_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `action` varchar(150) NOT NULL,
  `state` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sub_privilege_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sub_privileges`
--

INSERT INTO `sub_privileges` (`sub_privilege_id`, `privilege_id`, `name`, `action`, `state`, `created_at`, `updated_at`) VALUES
(1, 3, 'Add Patient', 'new/user/register', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 3, 'View Patients', 'show/registered/patients', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 'Delete patient', '', 1, '2020-04-12 07:15:59', NULL),
(4, 2, 'Add center', 'create/new/center', 1, '2020-04-12 07:21:42', NULL),
(5, 2, 'View centers', '', 1, '2020-04-12 07:24:12', NULL),
(6, 2, 'Assign user to center', '', 1, '2020-04-12 07:25:06', NULL),
(7, 2, 'Register Appointment', '', 1, '2020-04-12 07:27:01', NULL),
(8, 2, 'Delete center', '', 1, '2020-04-12 07:27:44', NULL),
(9, 4, 'Generate patients'' report', '', 1, '2020-04-12 07:28:57', NULL),
(10, 4, 'Generate personnel''s report', '', 1, '2020-04-12 07:29:47', NULL),
(11, 4, 'Generate government''s report', '', 1, '2020-04-12 07:30:48', NULL),
(12, 5, 'Add measures', '', 1, '2020-04-12 07:31:18', NULL),
(13, 5, 'View measures', '', 1, '2020-04-12 07:31:39', NULL),
(14, 5, 'Delete measure', '', 1, '2020-04-12 07:32:02', NULL),
(15, 1, 'Add user', 'new/user/register', 1, '2020-04-12 07:33:28', NULL),
(16, 1, 'View users', '', 1, '2020-04-12 07:33:58', NULL),
(17, 1, 'Delete user', '', 1, '2020-04-12 07:35:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `Location` varchar(45) DEFAULT NULL,
  `Phone` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `UserName` varchar(45) DEFAULT NULL,
  `NationalId` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `UserType` varchar(45) DEFAULT NULL,
  `remember_token` varchar(120) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `picture` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `FirstName`, `LastName`, `Location`, `Phone`, `Address`, `password`, `UserName`, `NationalId`, `Email`, `UserType`, `remember_token`, `created_at`, `updated_at`, `role_id`, `picture`) VALUES
(1, 'Pius', 'NGWA', 'Gikondo', '+250782346578', 'KN31 ,ST 4859, Cher ALbert', '$2y$10$jpSOqHZLFgh9AFOjG891o.H5.Bf6iv3hdRmlddhWVwY40di8XmzZ2', 'munde2015', 'Cameroonian', 'papabili@gmail.co.uk', '1', 'hJa5BNrSHyLmougj0RAJPX341Xy0FfEp5I1C4vGBlTeM8SV5KqCS1RlCQ67C', '2020-04-12 04:06:25', '2020-04-14 03:46:36', 1, NULL),
(2, 'Mikwa', 'Tamanjong', 'Kicyukiro', '+25078364957294', 'CBE, KN73, St49', '', NULL, NULL, 'borismik@gmail.co', NULL, '', '2020-04-12 23:19:47', NULL, 3, ''),
(3, 'Fauci', 'Malachie', 'pouopou', '2465544213', 'lraa', '$2y$10$s.z1s6lvr6uh8UcKMb0n9OhZFOGmb/j.f88bDKlG3pDxcy2lGoW9e', 'Mfauci', NULL, 'gdwr@wgjh.uk', NULL, '', '2020-04-13 01:46:16', NULL, 2, ''),
(4, 'John', 'Papap', 'Yaounde', '+23764747465', 'Ekounou', '', 'johnpappap', 'Cameroonian', 'johnpappap@gmail.com', '1', '', '2020-04-13 09:31:59', NULL, 1, NULL),
(5, 'Sue', 'Mak', 'Gikondo', '+25074736432', 'FSB', '', 'suemark', 'mw18728282992', 'suemark@gmail.com', '3', '', '2020-04-13 09:34:07', NULL, 1, NULL),
(6, 'Mary', 'Nnan', 'Gishushi', '+250384747482', 'k55', '', 'marynnan', 'rw2563534738', 'marynnan@yahoo.com', '2', '', '2020-04-13 09:36:15', NULL, 1, NULL),
(7, 'Mili', 'Cheng', 'Mironko', '+25078393993', 'kk645', '', 'milicheng', 'ke6467483496', 'marynnan@yahoo.fr', '3', '', '2020-04-13 09:38:40', NULL, 1, NULL),
(8, 'lorraine', 'Mu', 'Kisimenti', '+25078845364', 'kk456R, kigali', '', 'lorrainemu', 'rw2563534739', 'lorrainemu@gmail.com', '1', '', '2020-04-13 09:41:20', NULL, 1, NULL),
(9, 'Constant', 'Fri', 'Nyamirabo', '+25078637361', 'KK67, Nyamiranbo', '', 'constantfri', 'RW6r547438929', 'constantfri@yahoo.fr', '3', '', '2020-04-13 09:43:29', NULL, 1, NULL),
(10, 'Kabano', 'Ignatious', 'Huye', '+25070837365', 'PK7456, Huye ', '', 'kabanoignatious', 'RW272562528099', 'kabanoignatious@gmail.com', '1', '', '2020-04-13 09:46:00', NULL, 2, NULL),
(11, 'Ki', 'Ma', 'Ngororero', '+25070837636', 'kk3,Ngororero', '', NULL, NULL, 'kima@gmail.com', '1', '', '2020-04-12 22:00:00', NULL, 1, NULL),
(12, 'Mahire', 'Paull', 'Rilima', '+25070183736', 'H45,Rilima', '', NULL, 'pau239440', 'paul@yahoo.co.uk', '3', '', '2020-04-13 12:07:08', NULL, 1, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`Id`),
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`doctors_id`) REFERENCES `users` (`userId`);

--
-- Constraints for table `patient_records`
--
ALTER TABLE `patient_records`
  ADD CONSTRAINT `patient_records_ibfk_1` FOREIGN KEY (`patient_userId`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `patient_records_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `patient_records_ibfk_3` FOREIGN KEY (`site_id`) REFERENCES `sites` (`Id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
