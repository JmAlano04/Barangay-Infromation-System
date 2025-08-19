-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 05:11 PM
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
-- Database: `barangay_information_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_account`
--

CREATE TABLE `admin_account` (
  `user_id` int(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date_created` date NOT NULL,
  `admin_profile` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `status` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_account`
--

INSERT INTO `admin_account` (`user_id`, `user_type`, `firstname`, `middlename`, `lastname`, `email`, `password`, `date_created`, `admin_profile`, `gender`, `age`, `status`) VALUES
(87, 'ADMINISTRATOR', 'Jenmar', 'adas', 'Alano', 'tmc.jenmar.alano@cvsu.edu.ph', '$2y$10$5Z6X.E9YO8UZ256Bc1EZzODkz5KIfErSXmEkJaEuFwzKb6.Wanzxm', '2025-07-25', '68839024e9c66.jpg', 'Male', 23, 1);

-- --------------------------------------------------------

--
-- Table structure for table `barangay_blotter`
--

CREATE TABLE `barangay_blotter` (
  `subject` varchar(200) NOT NULL,
  `cell_no` varchar(200) NOT NULL,
  `place` varchar(200) NOT NULL,
  `tanod` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` varchar(200) NOT NULL,
  `id` bigint(20) NOT NULL,
  `complainant` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `address_complainant` varchar(200) NOT NULL,
  `complained_name` varchar(200) NOT NULL,
  `add_complained_name` varchar(200) NOT NULL,
  `details_reason` text NOT NULL,
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_blotter`
--

INSERT INTO `barangay_blotter` (`subject`, `cell_no`, `place`, `tanod`, `date`, `time`, `status`, `id`, `complainant`, `age`, `address_complainant`, `complained_name`, `add_complained_name`, `details_reason`, `type`) VALUES
('Noise Pollution', '09123456789', 'Park', 'Juan Dela Cruz', '2025-04-01', '08:00:00', 'Active', 1, 'Maria Santos', 25, '123 Main St', 'Jose Lopez', 'None', 'Loud music disturbing the neighbors', 'Noise'),
('Vandalism', '09234567890', 'Mall', 'Pedro Reyes', '2025-04-02', '09:30:00', 'Settled', 2, 'John Doe', 32, '456 Oak Ave', 'Carlos Ramirez', 'None', 'Graffiti on the walls', 'Property'),
('Theft', '09345678901', 'Supermarket', 'Luis Gomez', '2025-04-02', '10:00:00', 'Active', 3, 'Alice Brown', 40, '789 Pine Blvd', 'Michael Jackson', 'None', 'Stolen groceries', 'Crime'),
('Harassment', '09456789012', 'School', 'Antonio Cruz', '2025-04-03', '11:00:00', 'Settled', 4, 'James Smith', 16, '321 Maple Rd', 'Ryan Clark', 'None', 'Verbal harassment by a classmate', 'Personal'),
('Fraud', '09567890123', 'Office', 'Rosario Diaz', '2025-04-03', '12:30:00', 'Active', 5, 'Rachel Adams', 29, '234 Birch Ln', 'Karen White', 'None', 'Falsified financial reports', 'Business'),
('Assault', '09678901234', 'Restaurant', 'Ana Martinez', '2025-04-04', '01:15:00', 'Settled', 6, 'Robert Green', 38, '567 Elm St', 'John Fisher', 'None', 'Physical altercation between two customers', 'Violence'),
('Drunken Driving', '09789012345', 'Street', 'Carlos Santos', '2025-04-04', '02:45:00', 'Active', 7, 'Susan Miller', 47, '678 Maple Blvd', 'Patrick Lee', 'None', 'Driving under the influence', 'Traffic'),
('Bullying', '09890123456', 'School', 'Miguel Torres', '2025-04-05', '03:30:00', 'Settled', 8, 'Sophia Johnson', 17, '234 Oak Rd', 'David Adams', 'None', 'Repeated bullying at school', 'Personal'),
('Speeding', '09901234567', 'Highway', 'Rebecca Gonzalez', '2025-04-05', '04:00:00', 'Active', 9, 'Liam King', 22, '345 Cedar Dr', 'Evan Scott', 'None', 'Excessive speeding in residential area', 'Traffic'),
('Child Abuse', '09123456789', 'Home', 'Maria Torres', '2025-04-06', '05:00:00', 'Settled', 10, 'Lucas Perez', 33, '123 Pine Rd', 'Nina Flores', 'None', 'Reports of physical abuse', 'Family'),
('Environmental Damage', '09234567890', 'Forest', 'Fernando Reyes', '2025-04-06', '06:30:00', 'Active', 11, 'Jackie Collins', 27, '456 Birch Ln', 'Antonio Lopez', 'None', 'Illegal dumping of waste', 'Environment'),
('Rape', '09345678901', 'Hotel', 'Luis Perez', '2025-04-07', '07:30:00', 'Settled', 12, 'Elizabeth Taylor', 36, '789 Oak Blvd', 'James Murphy', 'None', 'Sexual assault on a hotel guest', 'Crime'),
('Public Intoxication', '09456789012', 'Park', 'Sara Garcia', '2025-04-07', '08:00:00', 'Active', 13, 'Henry Lewis', 28, '321 Birch Ave', 'Oscar Walker', 'None', 'Drunk in public area', 'Personal'),
('Stalking', '09567890123', 'Home', 'Clara Sanchez', '2025-04-08', '09:00:00', 'Settled', 14, 'Isabella Fisher', 24, '567 Cedar Blvd', 'Bryan Lee', 'None', 'Repeated stalking via social media', 'Personal'),
('Traffic Violation', '09678901234', 'Street', 'Javier Ruiz', '2025-04-08', '10:15:00', 'Active', 15, 'Samuel Walker', 26, '678 Maple Rd', 'Gregory Hall', 'None', 'Running a red light', 'Traffic'),
('Battery', '09789012345', 'Club', 'Maria Garcia', '2025-04-09', '11:45:00', 'Settled', 16, 'Nina Young', 31, '234 Oak Blvd', 'Patrick Daniels', 'None', 'Physical altercation at a nightclub', 'Violence'),
('Illegal Gambling', '09890123456', 'Casino', 'Felipe Torres', '2025-04-09', '08:15:00', 'Active', 17, 'Carlos Miller', 41, '987 Pine St', 'Jose Martinez', 'None', 'Participating in illegal gambling', 'Crime'),
('Vandalism', '09901234567', 'School', 'Alicia Cruz', '2025-04-10', '09:00:00', 'Settled', 18, 'Olivia Adams', 18, '123 Elm St', 'Benjamin Scott', 'None', 'Breaking windows in school property', 'Property'),
('Public Smoking', '09123456789', 'Park', 'Antonio Gonzalez', '2025-04-10', '10:30:00', 'Active', 19, 'Sarah White', 34, '456 Oak Blvd', 'Lucas Walker', 'None', 'Smoking in a public park', 'Health'),
('Abuse of Power', '09234567890', 'Government Office', 'Jorge Rivera', '2025-04-11', '11:00:00', 'Settled', 20, 'Emily Brown', 50, '789 Birch Rd', 'James Jackson', 'None', 'Misuse of authority in office', 'Personal'),
('Unlawful Detention', '09345678901', 'Police Station', 'Pedro Cruz', '2025-04-11', '12:30:00', 'Active', 21, 'Angela Lewis', 30, '234 Maple Blvd', 'Albert White', 'None', 'Illegally detaining an individual', 'Crime'),
('Drug Use', '09456789012', 'Street', 'Carlos Martinez', '2025-04-12', '01:00:00', 'Settled', 22, 'Grace Williams', 26, '567 Pine Blvd', 'Victor Lee', 'None', 'Illegal substance usage in public', 'Crime'),
('Negligence', '09567890123', 'Hospital', 'Clara Lopez', '2025-04-12', '02:15:00', 'Active', 23, 'Mia Scott', 29, '678 Birch Ln', 'David Green', 'None', 'Medical malpractice', 'Personal'),
('Trespassing', '09678901234', 'Private Property', 'Alejandro Hernandez', '2025-04-13', '03:30:00', 'Settled', 24, 'William Clark', 39, '789 Oak Blvd', 'Ryan Johnson', 'None', 'Entering private property without permission', 'Property'),
('Defamation', '09789012345', 'Social Media', 'Isabel Perez', '2025-04-13', '04:00:00', 'Active', 25, 'Megan Adams', 45, '123 Birch Ln', 'Rebecca Miller', 'None', 'Spreading false information online', 'Personal'),
('Bribery', '09890123456', 'Government Office', 'Ethan Walker', '2025-04-14', '05:00:00', 'Settled', 26, 'Sophia Evans', 28, '234 Oak Rd', 'Chris Green', 'None', 'Offering a bribe to a public official', 'Crime'),
('Animal Cruelty', '09901234567', 'Farm', 'Marissa Cruz', '2025-04-14', '06:30:00', 'Active', 27, 'Olivia Lee', 37, '345 Cedar Dr', 'Eric White', 'None', 'Abusing animals on a farm', 'Animal'),
('Illegal Parking', '09123456789', 'Parking Lot', 'Jose Perez', '2025-04-15', '07:00:00', 'Settled', 28, 'Benjamin Scott', 26, '567 Maple Blvd', 'Liam Hall', 'None', 'Parking in a disabled spot without permission', 'Traffic'),
('Public Disturbance', '09234567890', 'Streets', 'Miguel Ortiz', '2025-04-15', '08:00:00', 'Active', 29, 'Daniel Thomas', 33, '678 Pine St', 'Olivia Clark', 'None', 'Causing noise disturbance in public area', 'Personal'),
('Public Disturbance', '09234567890', 'Streets', 'Miguel Ortiz', '2025-04-15', '08:00:00', '0', 30, 'Daniel Thomas', 33, '678 Pine St', 'Olivia Clark', 'None', 'Causing noise disturbance in public area', 'Personal'),
('Animal Cruelty', '09901234567', 'Farm', 'Marissa Cruz', '2025-04-14', '06:30:00', '0', 31, 'Olivia Lee', 37, '345 Cedar Dr', 'Eric White', 'None', 'Abusing animals on a farm', 'Animal'),
('Defamation', '09789012345', 'Social Media', 'Isabel Perez', '2025-04-13', '04:00:00', '0', 32, 'Megan Adams', 45, '123 Birch Ln', 'Rebecca Miller', 'None', 'Spreading false information online', 'Personal'),
('Negligence', '09567890123', 'Hospital', 'Clara Lopez', '2025-04-12', '02:15:00', '0', 33, 'Mia Scott', 29, '678 Birch Ln', 'David Green', 'None', 'Medical malpractice', 'Personal'),
('Unlawful Detention', '09345678901', 'Police Station', 'Pedro Cruz', '2025-04-11', '12:30:00', '0', 34, 'Angela Lewis', 30, '234 Maple Blvd', 'Albert White', 'None', 'Illegally detaining an individual', 'Crime'),
('Public Smoking', '09123456789', 'Park', 'Antonio Gonzalez', '2025-04-10', '10:30:00', '0', 35, 'Sarah White', 34, '456 Oak Blvd', 'Lucas Walker', 'None', 'Smoking in a public park', 'Health'),
('Illegal Gambling', '09890123456', 'Casino', 'Felipe Torres', '2025-04-09', '08:15:00', '0', 36, 'Carlos Miller', 41, '987 Pine St', 'Jose Martinez', 'None', 'Participating in illegal gambling', 'Crime'),
('Traffic Violation', '09678901234', 'Street', 'Javier Ruiz', '2025-04-08', '10:15:00', '0', 37, 'Samuel Walker', 26, '678 Maple Rd', 'Gregory Hall', 'None', 'Running a red light', 'Traffic'),
('Public Intoxication', '09456789012', 'Park', 'Sara Garcia', '2025-04-07', '08:00:00', '0', 38, 'Henry Lewis', 28, '321 Birch Ave', 'Oscar Walker', 'None', 'Drunk in public area', 'Personal'),
('Environmental Damage', '09234567890', 'Forest', 'Fernando Reyes', '2025-04-06', '06:30:00', '0', 39, 'Jackie Collins', 27, '456 Birch Ln', 'Antonio Lopez', 'None', 'Illegal dumping of waste', 'Environment'),
('Speeding', '09901234567', 'Highway', 'Rebecca Gonzalez', '2025-04-05', '04:00:00', '0', 40, 'Liam King', 22, '345 Cedar Dr', 'Evan Scott', 'None', 'Excessive speeding in residential area', 'Traffic'),
('Drunken Driving', '09789012345', 'Street', 'Carlos Santos', '2025-04-04', '02:45:00', '0', 41, 'Susan Miller', 47, '678 Maple Blvd', 'Patrick Lee', 'None', 'Driving under the influence', 'Traffic'),
('Fraud', '09567890123', 'Office', 'Rosario Diaz', '2025-04-03', '12:30:00', '0', 42, 'Rachel Adams', 29, '234 Birch Ln', 'Karen White', 'None', 'Falsified financial reports', 'Business'),
('Theft', '09345678901', 'Supermarket', 'Luis Gomez', '2025-04-02', '10:00:00', '0', 43, 'Alice Brown', 40, '789 Pine Blvd', 'Michael Jackson', 'None', 'Stolen groceries', 'Crime'),
('Noise Pollution', '09123456789', 'Park', 'Juan Dela Cruz', '2025-04-01', '08:00:00', '0', 44, 'Maria Santos', 25, '123 Main St', 'Jose Lopez', 'None', 'Loud music disturbing the neighbors', 'Noise'),
('Illegal Parking', '09123456789', 'Parking Lot', 'Jose Perez', '2025-04-15', '07:00:00', 'Settled', 45, 'Benjamin Scott', 26, '567 Maple Blvd', 'Liam Hall', 'None', 'Parking in a disabled spot without permission', 'Traffic'),
('Bribery', '09890123456', 'Government Office', 'Ethan Walker', '2025-04-14', '05:00:00', 'Settled', 46, 'Sophia Evans', 28, '234 Oak Rd', 'Chris Green', 'None', 'Offering a bribe to a public official', 'Crime'),
('Trespassing', '09678901234', 'Private Property', 'Alejandro Hernandez', '2025-04-13', '03:30:00', 'Settled', 47, 'William Clark', 39, '789 Oak Blvd', 'Ryan Johnson', 'None', 'Entering private property without permission', 'Property'),
('Drug Use', '09456789012', 'Street', 'Carlos Martinez', '2025-04-12', '01:00:00', 'Settled', 48, 'Grace Williams', 26, '567 Pine Blvd', 'Victor Lee', 'None', 'Illegal substance usage in public', 'Crime'),
('Abuse of Power', '09234567890', 'Government Office', 'Jorge Rivera', '2025-04-11', '11:00:00', 'Settled', 49, 'Emily Brown', 50, '789 Birch Rd', 'James Jackson', 'None', 'Misuse of authority in office', 'Personal'),
('Vandalism', '09901234567', 'School', 'Alicia Cruz', '2025-04-10', '09:00:00', 'Settled', 50, 'Olivia Adams', 18, '123 Elm St', 'Benjamin Scott', 'None', 'Breaking windows in school property', 'Property'),
('Battery', '09789012345', 'Club', 'Maria Garcia', '2025-04-09', '11:45:00', 'Settled', 51, 'Nina Young', 31, '234 Oak Blvd', 'Patrick Daniels', 'None', 'Physical altercation at a nightclub', 'Violence'),
('Stalking', '09567890123', 'Home', 'Clara Sanchez', '2025-04-08', '09:00:00', 'Settled', 52, 'Isabella Fisher', 24, '567 Cedar Blvd', 'Bryan Lee', 'None', 'Repeated stalking via social media', 'Personal'),
('Rape', '09345678901', 'Hotel', 'Luis Perez', '2025-04-07', '07:30:00', 'Settled', 53, 'Elizabeth Taylor', 36, '789 Oak Blvd', 'James Murphy', 'None', 'Sexual assault on a hotel guest', 'Crime'),
('Child Abuse', '09123456789', 'Home', 'Maria Torres', '2025-04-06', '05:00:00', 'Settled', 54, 'Lucas Perez', 33, '123 Pine Rd', 'Nina Flores', 'None', 'Reports of physical abuse', 'Family'),
('Bullying', '09890123456', 'School', 'Miguel Torres', '2025-04-05', '03:30:00', 'Settled', 55, 'Sophia Johnson', 17, '234 Oak Rd', 'David Adams', 'None', 'Repeated bullying at school', 'Personal'),
('Assault', '09678901234', 'Restaurant', 'Ana Martinez', '2025-04-04', '01:15:00', 'Settled', 56, 'Robert Green', 38, '567 Elm St', 'John Fisher', 'None', 'Physical altercation between two customers', 'Violence'),
('Harassment', '09456789012', 'School', 'Antonio Cruz', '2025-04-03', '11:00:00', 'Settled', 57, 'James Smith', 16, '321 Maple Rd', 'Ryan Clark', 'None', 'Verbal harassment by a classmate', 'Personal'),
('Vandalism', '09234567890', 'Mall', 'Pedro Reyes', '2025-04-02', '09:30:00', 'Scheduled', 58, 'John Doe', 32, '456 Oak Ave', 'Carlos Ramirez', 'None', 'Graffiti on the walls', 'Property');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_incident`
--

CREATE TABLE `barangay_incident` (
  `id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `name_involve` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `vehicle` varchar(200) NOT NULL,
  `license` varchar(200) NOT NULL,
  `plate_no` varchar(200) NOT NULL,
  `cause_incident` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_incident`
--

INSERT INTO `barangay_incident` (`id`, `date`, `time`, `name_involve`, `address`, `vehicle`, `license`, `plate_no`, `cause_incident`, `status`) VALUES
(1, '2024-02-28', '08:00:00', 'John Doe', '123 Main St', 'Toyota Corolla', 'ABC123', 'XYZ1234', 'Rear-end collision', 'Settled'),
(2, '2025-04-02', '10:15:00', 'Jim Brown', '789 Pine Rd', 'Ford F-150', 'LMN456', 'ABC9876', 'Pedestrian hit', 'Active'),
(3, '2025-04-03', '12:30:00', 'David Green', '654 Elm St', 'Tesla Model 3', 'DEF789', 'OPQ5678', 'Speeding', 'Active'),
(4, '2025-04-04', '03:45:00', 'Lucas Black', '123 Birch Ln', 'Nissan Altima', 'XYZ345', 'MNO3456', 'Tailgating', 'Active'),
(5, '2025-04-05', '05:00:00', 'Mason Scott', '654 Pine Ave', 'Subaru Outback', 'CDE123', 'STU2345', 'Weather-related accident', 'Active'),
(6, '2025-04-06', '07:00:00', 'Ava Martinez', '234 Maple Ave', 'Ford Mustang', 'LMN456', 'TUV3456', 'Disobeying stop sign', 'Active'),
(7, '2025-04-07', '09:00:00', 'Elijah Garcia', '678 Birch Blvd', 'Toyota Prius', 'GHI012', 'XYZ6789', 'Animal crossing road', 'Active'),
(8, '2025-04-08', '07:45:00', 'Daniel Harris', '123 Pine St', 'Ram 1500', 'CDE234', 'VWX1234', 'Rearview mirror hit', 'Active'),
(9, '2025-04-09', '09:30:00', 'James Robinson', '654 Oak Rd', 'Mazda CX-5', 'LMN567', 'QWE1234', 'Unlicensed driving', 'Active'),
(10, '2025-04-10', '12:00:00', 'Benjamin Walker', '321 Birch Ave', 'Chevrolet Silverado', 'GHI345', 'MNO2345', 'Pedestrian injury', 'Active'),
(11, '2025-04-11', '02:30:00', 'Lucas Perez', '654 Elm Blvd', 'Ford Explorer', 'DEF678', 'XYZ7890', 'Road rage incident', 'Active'),
(12, '2025-04-12', '04:00:00', 'Megan Taylor', '876 Cedar Ln', 'Hyundai Elantra', 'LMN890', 'STU3456', 'Aggressive driving', 'Active'),
(13, '2025-04-13', '06:45:00', 'Grace Adams', '123 Birch Rd', 'Toyota Tacoma', 'GHI678', 'XYZ8901', 'Hit-and-run collision', 'Active'),
(14, '2025-04-14', '08:00:00', 'Harper Nelson', '234 Cedar Ln', 'Chevrolet Traverse', 'DEF234', 'XYZ1234', 'Driving under the influence', 'Active'),
(15, '2025-04-15', '10:30:00', 'Charlotte Perez', '654 Maple Rd', 'Toyota Highlander', 'GHI234', 'PQR1234', 'Tailgate accident', 'Active'),
(16, '2025-04-16', '08:00:00', 'Avery Cooper', '123 Willow Dr', 'Kia Soul', 'LMN678', 'STU2345', 'Reckless driving', 'Active'),
(17, '2025-04-17', '10:15:00', 'Jack Lewis', '345 Oak Blvd', 'Ram 2500', 'GHI890', 'XYZ0123', 'Collided with bicycle', 'Active'),
(18, '2025-04-18', '12:45:00', 'Henry White', '123 Birch Blvd', 'Toyota RAV4', 'LMN123', 'PQR4567', 'Accident on icy road', 'Active'),
(19, '2025-04-19', '02:00:00', 'Logan Martinez', '234 Maple Rd', 'Hyundai Tucson', 'DEF123', 'XYZ6789', 'Underage driver', 'Active'),
(20, '2025-04-20', '04:30:00', 'Ella Taylor', '321 Oak Dr', 'Mazda 6', 'LMN234', 'QWE1234', 'Crosswalk accident', 'Active'),
(21, '2025-04-21', '06:45:00', 'Amos Wright', '234 Cedar Rd', 'Chevrolet Cruze', 'DEF678', 'ABC2345', 'Lost control', 'Active'),
(22, '2025-04-21', '07:30:00', 'Emily Lewis', '567 Oak Blvd', 'Honda HR-V', 'JKL012', 'STU4567', 'Tire blowout', 'Settled'),
(23, '2025-04-21', '06:45:00', 'Amos Wright', '234 Cedar Rd', 'Chevrolet Cruze', 'DEF678', 'ABC2345', 'Lost control', 'Active'),
(24, '2025-04-20', '05:00:00', 'Jackson Young', '987 Pine Blvd', 'Volkswagen Golf', 'CDE567', 'PQR7890', 'Running red light', 'Settled'),
(25, '2025-04-20', '04:30:00', 'Ella Taylor', '321 Oak Dr', 'Mazda 6', 'LMN234', 'QWE1234', 'Crosswalk accident', 'Active'),
(26, '2025-04-19', '03:15:00', 'Liam Garcia', '654 Birch Ave', 'Audi Q5', 'JKL456', 'WXY7890', 'Texting while driving', 'Settled'),
(27, '2025-04-19', '02:00:00', 'Logan Martinez', '234 Maple Rd', 'Hyundai Tucson', 'DEF123', 'XYZ6789', 'Underage driver', 'Active'),
(28, '2025-04-18', '01:30:00', 'Sofia Davis', '876 Oak Blvd', 'BMW M3', 'CDE890', 'RST1234', 'Improper lane change', 'Settled'),
(29, '2025-04-18', '12:45:00', 'Henry White', '123 Birch Blvd', 'Toyota RAV4', 'LMN123', 'PQR4567', 'Accident on icy road', 'Active'),
(30, '2025-04-17', '11:30:00', 'Madeline Clark', '987 Cedar Rd', 'Chevrolet Suburban', 'DEF456', 'ABC2345', 'Failure to stop at light', 'Settled'),
(31, '2025-04-17', '10:15:00', 'Jack Lewis', '345 Oak Blvd', 'Ram 2500', 'GHI890', 'XYZ0123', 'Collided with bicycle', 'Active'),
(32, '2025-04-16', '09:30:00', 'Abigail Harris', '876 Pine St', 'Honda Pilot', 'JKL890', 'VWX7890', 'No seatbelt', 'Settled'),
(33, '2025-04-16', '08:00:00', 'Avery Cooper', '123 Willow Dr', 'Kia Soul', 'LMN678', 'STU2345', 'Reckless driving', 'Active'),
(34, '2025-04-15', '11:00:00', 'Ethan Robinson', '345 Pine Rd', 'Ford Escape', 'DEF345', 'WXY5678', 'Speeding violation', 'Settled'),
(35, '2025-04-15', '10:30:00', 'Charlotte Perez', '654 Maple Rd', 'Toyota Highlander', 'GHI234', 'PQR1234', 'Tailgate accident', 'Active'),
(36, '2025-04-14', '09:15:00', 'Mason Mitchell', '987 Birch Dr', 'BMW 5 Series', 'LMN123', 'QWE6789', 'Collision with parked car', 'Settled'),
(37, '2025-04-14', '08:00:00', 'Harper Nelson', '234 Cedar Ln', 'Chevrolet Traverse', 'DEF234', 'XYZ1234', 'Driving under the influence', 'Active'),
(38, '2025-04-13', '07:30:00', 'Oliver Allen', '567 Oak Rd', 'Honda Fit', 'JKL012', 'RST2345', 'Failure to yield', 'Settled'),
(39, '2025-04-13', '06:45:00', 'Grace Adams', '123 Birch Rd', 'Toyota Tacoma', 'GHI678', 'XYZ8901', 'Hit-and-run collision', 'Active'),
(40, '2025-04-12', '05:30:00', 'Ryan King', '234 Maple Blvd', 'Jeep Wrangler', 'CDE567', 'PQR2345', 'Intersection accident', 'Settled'),
(41, '2025-04-12', '04:00:00', 'Megan Taylor', '876 Cedar Ln', 'Hyundai Elantra', 'LMN890', 'STU3456', 'Aggressive driving', 'Active'),
(42, '2025-04-11', '03:45:00', 'Ella Young', '345 Pine Blvd', 'Mazda 3', 'JKL789', 'ABC2345', 'Distracted driving', 'Settled'),
(43, '2025-04-11', '02:30:00', 'Lucas Perez', '654 Elm Blvd', 'Ford Explorer', 'DEF678', 'XYZ7890', 'Road rage incident', 'Active'),
(44, '2025-04-10', '01:00:00', 'Amelia Hill', '987 Oak Dr', 'Volkswagen Jetta', 'JKL456', 'PQR1234', 'Uninsured driver', 'Settled'),
(45, '2025-04-10', '12:00:00', 'Benjamin Walker', '321 Birch Ave', 'Chevrolet Silverado', 'GHI345', 'MNO2345', 'Pedestrian injury', 'Active'),
(46, '2025-04-09', '11:15:00', 'Chloe Lewis', '123 Cedar Blvd', 'Honda Accord', 'DEF890', 'RST4567', 'Flood-related accident', 'Settled'),
(47, '2025-04-09', '09:30:00', 'James Robinson', '654 Oak Rd', 'Mazda CX-5', 'LMN567', 'QWE1234', 'Unlicensed driving', 'Active'),
(48, '2025-04-08', '08:00:00', 'Lily Clark', '876 Maple St', 'BMW X5', 'JKL345', 'ABC5678', 'Hit-and-run', 'Settled'),
(49, '2025-04-08', '07:45:00', 'Daniel Harris', '123 Pine St', 'Ram 1500', 'CDE234', 'VWX1234', 'Rearview mirror hit', 'Active'),
(50, '2025-04-07', '10:15:00', 'Sophia Martinez', '345 Willow Dr', 'Audi A4', 'JKL123', 'STU7890', 'Mechanical failure', 'Settled'),
(51, '2025-04-07', '09:00:00', 'Elijah Garcia', '678 Birch Blvd', 'Toyota Prius', 'GHI012', 'XYZ6789', 'Animal crossing road', 'Active'),
(52, '2025-04-06', '08:30:00', 'Isabella Thompson', '567 Cedar Rd', 'Chevrolet Camaro', 'DEF789', 'WXY4567', 'Parking lot accident', 'Settled'),
(53, '2025-04-06', '07:00:00', 'Ava Martinez', '234 Maple Ave', 'Ford Mustang', 'LMN456', 'TUV3456', 'Disobeying stop sign', 'Active'),
(54, '2025-04-05', '06:15:00', 'Liam Adams', '876 Oak St', 'Kia Optima', 'JKL234', 'XYZ2345', 'Impaired driving', 'Settled'),
(55, '2025-04-05', '05:00:00', 'Mason Scott', '654 Pine Ave', 'Subaru Outback', 'CDE123', 'STU2345', 'Weather-related accident', 'Active'),
(56, '2025-04-04', '04:30:00', 'Olivia King', '321 Willow Way', 'Hyundai Sonata', 'LMN789', 'PQR5678', 'Driver distraction', 'Settled'),
(57, '2025-04-04', '03:45:00', 'Lucas Black', '123 Birch Ln', 'Nissan Altima', 'XYZ345', 'MNO3456', 'Tailgating', 'Active'),
(58, '2025-04-03', '02:00:00', 'Mary Johnson', '987 Cedar Dr', 'BMW 3 Series', 'GHI012', 'JKL6789', 'Traffic light violation', 'Settled'),
(59, '2025-04-03', '12:30:00', 'David Green', '654 Elm St', 'Tesla Model 3', 'DEF789', 'OPQ5678', 'Speeding', 'Active'),
(60, '2025-04-02', '11:00:00', 'Emily White', '321 Maple Blvd', 'Chevrolet Malibu', 'JKL123', 'QWE4567', 'Run off road', 'Settled'),
(61, '2025-04-02', '10:15:00', 'Jim Brown', '789 Pine Rd', 'Ford F-150', 'LMN456', 'ABC9876', 'Pedestrian hit', 'Active'),
(62, '2025-04-01', '09:30:00', 'Jane Smith', '456 Oak Ave', 'Honda Civic', 'XYZ789', 'XYZ5678', 'Side-swipe', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_information`
--

CREATE TABLE `barangay_information` (
  `barangay_name` varchar(200) NOT NULL,
  `municipality` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `barangay_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_information`
--

INSERT INTO `barangay_information` (`barangay_name`, `municipality`, `address`, `phone_no`, `email`, `id`, `logo`, `barangay_image`) VALUES
('PALIPARAN II', 'DASMARINAS', 'Paliparan II, Dasmariñas, Philippines', '09513856318', 'Barangay.paliparanII@gmail.com', 1, '680e09c06a45b.png', '67eba7c534370.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_official`
--

CREATE TABLE `barangay_official` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `chairmanship` varchar(200) NOT NULL,
  `position` varchar(200) NOT NULL,
  `term_start` date NOT NULL,
  `term_end` date NOT NULL,
  `status` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_official`
--

INSERT INTO `barangay_official` (`id`, `fullname`, `chairmanship`, `position`, `term_start`, `term_end`, `status`, `photo`) VALUES
(157, 'Tessa Sanchez', 'Kagawad', 'Commnittee on Appropriation', '2025-03-23', '2024-01-23', 'Active', '67df837d491bc.jpg'),
(158, 'Gilbert Magtaas', 'Kagawad', 'Commnittee on Education', '2025-03-18', '2025-03-05', 'Active', '67df831c219fa.jpg'),
(159, 'Ressa Martinez', 'Kagawad', 'Commnittee on Rules', '2025-03-23', '2025-03-17', 'Active', '67df82e58e2ee.jpg'),
(160, 'Alvin Andaya', 'Kagawad', 'Commnittee on Appropriation', '2025-03-23', '2025-03-23', 'Active', '67df82c2f0ca7.jpg'),
(161, 'PB. Rolando C. Ambal', 'Chairman', 'Chairman', '2025-03-23', '2025-03-23', 'Active', '67df822943786.jpg'),
(162, 'Mj Asilo', 'Kagawad', 'Commnittee on Peace & Order', '2025-03-23', '2025-03-23', 'Active', '67df83009722e.jpg'),
(163, 'Baby Andaya', 'Kagawad', 'Commnittee on Education', '2025-03-23', '2025-03-23', 'Active', '67df829e5ad16.jpg'),
(164, 'Oscar Alvarez', 'Kagawad', 'Commnittee on Solid Waste', '2025-03-23', '2025-03-23', 'Active', '67df826ab91ee.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_request`
--

CREATE TABLE `barangay_request` (
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `age` int(200) NOT NULL,
  `request_document` varchar(200) NOT NULL,
  `house_number` varchar(200) NOT NULL,
  `sitio_pook` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `place_of_birth` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `contact_person` varchar(200) NOT NULL,
  `contact_no_contact_person` varchar(200) NOT NULL,
  `live_since_year` varchar(200) NOT NULL,
  `purpose` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `date_request` date NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `control_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barangay_resident`
--

CREATE TABLE `barangay_resident` (
  `id` bigint(11) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `house_no` varchar(200) NOT NULL,
  `place_of_birth` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(200) NOT NULL,
  `civil_status` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `voter_status` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `occupation` varchar(200) NOT NULL,
  `citizenship` varchar(200) NOT NULL,
  `sitio_pook` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_resident`
--

INSERT INTO `barangay_resident` (`id`, `firstname`, `middlename`, `lastname`, `house_no`, `place_of_birth`, `birthday`, `age`, `civil_status`, `gender`, `voter_status`, `email`, `contact_no`, `occupation`, `citizenship`, `sitio_pook`) VALUES
(1, 'Juan', 'Dela', 'Cruz', '123', 'Manila', '1985-05-15', 38, 'Married', 'Male', 'Registered', 'juan.cruz@example.com', '09123456789', 'Teacher', 'Filipino', 'Purok 1'),
(2, 'Maria', 'Santos', 'Reyes', '456', 'Quezon City', '1990-08-22', 33, 'Single', 'Female', 'Registered', 'maria.reyes@example.com', '09123456780', 'Nurse', 'Filipino', 'Purok 2'),
(3, 'Pedro', 'Gonzales', 'Bautista', '789', 'Cebu City', '1978-11-05', 45, 'Married', 'Male', 'Registered', 'pedro.bautista@example.com', '09123456781', 'Engineer', 'Filipino', 'Purok 3'),
(4, 'Ana', 'Perez', 'Diaz', '101', 'Davao City', '1995-02-18', 28, 'Single', 'Female', 'Not Registered', 'ana.diaz@example.com', '09123456782', 'Accountant', 'Filipino', 'Purok 4'),
(5, 'Jose', 'Alvarez', 'Garcia', '202', 'Makati', '1982-07-30', 41, 'Married', 'Male', 'Registered', 'jose.garcia@example.com', '09123456783', 'Doctor', 'Filipino', 'Purok 5'),
(6, 'Carmen', 'Lopez', 'Martinez', '303', 'Pasig', '1992-04-14', 31, 'Single', 'Female', 'Registered', 'carmen.martinez@example.com', '09123456784', 'Lawyer', 'Filipino', 'Purok 1'),
(7, 'Antonio', 'Castro', 'Sanchez', '404', 'Taguig', '1975-09-19', 48, 'Widowed', 'Male', 'Registered', 'antonio.sanchez@example.com', '09123456785', 'Architect', 'Filipino', 'Purok 2'),
(8, 'Teresa', 'Fernandez', 'Romero', '505', 'Mandaluyong', '1988-12-25', 35, 'Married', 'Female', 'Registered', 'teresa.romero@example.com', '09123456786', 'Dentist', 'Filipino', 'Purok 3'),
(9, 'Carlos', 'Ramirez', 'Torres', '606', 'Parañaque', '1993-06-08', 30, 'Single', 'Male', 'Not Registered', 'carlos.torres@example.com', '09123456787', 'Programmer', 'Filipino', 'Purok 4'),
(10, 'Elena', 'Gomez', 'Flores', '707', 'Las Piñas', '1980-03-17', 43, 'Divorced', 'Female', 'Registered', 'elena.flores@example.com', '09123456788', 'Teacher', 'Filipino', 'Purok 5'),
(11, 'Ramon', 'Rivera', 'Mendoza', '808', 'Valenzuela', '1972-10-31', 51, 'Married', 'Male', 'Registered', 'ramon.mendoza@example.com', '09123456789', 'Police Officer', 'Filipino', 'Purok 1'),
(12, 'Sofia', 'Vargas', 'Aquino', '909', 'Caloocan', '1997-01-28', 26, 'Single', 'Female', 'Not Registered', 'sofia.aquino@example.com', '09123456790', 'Graphic Designer', 'Filipino', 'Purok 2'),
(13, 'Luis', 'Cruz', 'Ramos', '1010', 'Malabon', '1987-07-15', 36, 'Married', 'Male', 'Registered', 'luis.ramos@example.com', '09123456791', 'Firefighter', 'Filipino', 'Purok 3'),
(14, 'Isabel', 'Reyes', 'Ortiz', '1111', 'Navotas', '1994-09-22', 29, 'Single', 'Female', 'Registered', 'isabel.ortiz@example.com', '09123456792', 'Pharmacist', 'Filipino', 'Purok 4'),
(15, 'Fernando', 'Diaz', 'Del Rosario', '1212', 'Marikina', '1968-05-17', 55, 'Widowed', 'Male', 'Registered', 'fernando.delrosario@example.com', '09123456793', 'Retired', 'Filipino', 'Purok 5'),
(16, 'Mia', 'Santos', 'Villanueva', '1313', 'Pasay', '1999-03-08', 24, 'Single', 'Female', 'Not Registered', 'mia.villanueva@example.com', '09123456794', 'Student', 'Filipino', 'Purok 1'),
(17, 'Ethan', 'Alvarez', 'Taylor', '1414', 'San Juan', '1991-11-11', 32, 'Married', 'Male', 'Registered', 'ethan.taylor@example.com', '09123456795', 'Business Owner', 'Filipino', 'Purok 2'),
(18, 'Charlotte', 'Louise', 'Moore', '1515', 'Muntinlupa', '1989-08-04', 34, 'Single', 'Female', 'Registered', 'charlotte.moore@example.com', '09123456796', 'Marketing Manager', 'Filipino', 'Purok 3'),
(19, 'Ryan', 'Patrick', 'Jackson', '1616', 'Tarlac City', '1997-02-19', 26, 'Single', 'Male', 'Not Registered', 'ryan.jackson@example.com', '09123456797', 'Electrician', 'Filipino', 'Purok 4'),
(20, 'Amelia', 'Kate', 'Martin', '1717', 'Angeles City', '1994-12-25', 29, 'Married', 'Female', 'Registered', 'amelia.martin@example.com', '09123456798', 'Bank Teller', 'Filipino', 'Purok 5'),
(21, 'James', 'Daniel', 'Lee', '1818', 'Olongapo', '1991-06-30', 32, 'Single', 'Male', 'Registered', 'james.lee@example.com', '09123456799', 'Chef', 'Filipino', 'Purok 1'),
(22, 'Harper', 'Faith', 'Perez', '1919', 'Baguio', '1996-04-14', 27, 'Single', 'Female', 'Registered', 'harper.perez@example.com', '09123456800', 'Journalist', 'Filipino', 'Purok 2'),
(23, 'Benjamin', 'Charles', 'Thompson', '2020', 'Batangas City', '1993-10-08', 30, 'Married', 'Male', 'Registered', 'benjamin.thompson@example.com', '09123456801', 'Farmer', 'Filipino', 'Purok 3'),
(24, 'Evelyn', 'Hope', 'White', '2121', 'Lucena', '1995-09-17', 28, 'Single', 'Female', 'Not Registered', 'evelyn.white@example.com', '09123456802', 'Call Center Agent', 'Filipino', 'Purok 4'),
(25, 'Nathan', 'Scott', 'Harris', '2222', 'Legazpi', '1990-07-23', 33, 'Married', 'Male', 'Registered', 'nathan.harris@example.com', '09123456803', 'Fisherman', 'Filipino', 'Purok 5'),
(26, 'Abigail', 'Ruth', 'Sanchez', '2323', 'Naga', '1997-01-11', 26, 'Single', 'Female', 'Registered', 'abigail.sanchez@example.com', '09123456804', 'Teacher', 'Filipino', 'Purok 1'),
(27, 'Logan', 'Henry', 'Clark', '2424', 'Iloilo City', '1994-05-29', 29, 'Single', 'Male', 'Not Registered', 'logan.clark@example.com', '09123456805', 'Driver', 'Filipino', 'Purok 2'),
(28, 'Elizabeth', 'Joy', 'Ramirez', '2525', 'Bacolod', '1992-12-03', 31, 'Married', 'Female', 'Registered', 'elizabeth.ramirez@example.com', '09123456806', 'Housewife', 'Filipino', 'Purok 3'),
(29, 'Jacob', 'Andrew', 'Lewis', '2626', 'Cagayan de Oro', '1996-08-16', 27, 'Single', 'Male', 'Registered', 'jacob.lewis@example.com', '09123456807', 'Security Guard', 'Filipino', 'Purok 4'),
(30, 'Sofia', 'Claire', 'Robinson', '2727', 'Zamboanga City', '1998-06-07', 25, 'Single', 'Female', 'Not Registered', 'sofia.robinson@example.com', '09123456808', 'Student', 'Filipino', 'Purok 5'),
(31, 'William', 'George', 'Walker', '2828', 'Butuan', '1989-04-12', 34, 'Married', 'Male', 'Registered', 'william.walker@example.com', '09123456809', 'Government Employee', 'Filipino', 'Purok 1'),
(32, 'Victoria', 'Lynn', 'Young', '2929', 'Cotabato City', '1995-11-21', 28, 'Single', 'Female', 'Registered', 'victoria.young@example.com', '09123456810', 'Sales Associate', 'Filipino', 'Purok 2'),
(33, 'Samuel', 'Peter', 'Allen', '3030', 'General Santos', '1993-02-28', 30, 'Single', 'Male', 'Registered', 'samuel.allen@example.com', '09123456811', 'Mechanic', 'Filipino', 'Purok 3'),
(34, 'Avery', 'Mae', 'King', '3131', 'Marawi', '1994-10-15', 29, 'Married', 'Female', 'Not Registered', 'avery.king@example.com', '09123456812', 'Baker', 'Filipino', 'Purok 4'),
(35, 'Jackson', 'Luke', 'Wright', '3232', 'Tacloban', '1997-07-04', 26, 'Single', 'Male', 'Registered', 'jackson.wright@example.com', '09123456813', 'Construction Worker', 'Filipino', 'Purok 5'),
(36, 'Scarlett', 'June', 'Scott', '3333', 'Puerto Princesa', '1991-09-19', 32, 'Divorced', 'Female', 'Registered', 'scarlett.scott@example.com', '09123456814', 'Hotel Manager', 'Filipino', 'Purok 1'),
(37, 'Sebastian', 'Mark', 'Torres', '3434', 'Tagbilaran', '1996-12-24', 27, 'Single', 'Male', 'Not Registered', 'sebastian.torres@example.com', '09123456815', 'Tour Guide', 'Filipino', 'Purok 2'),
(38, 'Madison', 'Paige', 'Nguyen', '3535', 'Dumaguete', '1998-08-09', 25, 'Single', 'Female', 'Registered', 'madison.nguyen@example.com', '09123456816', 'Receptionist', 'Filipino', 'Purok 3'),
(39, 'Aiden', 'Ryan', 'Hill', '3636', 'Dipolog', '1992-05-13', 31, 'Married', 'Male', 'Registered', 'aiden.hill@example.com', '09123456817', 'Teacher', 'Filipino', 'Purok 4'),
(40, 'Chloe', 'Dawn', 'Flores', '3737', 'Surigao City', '1994-03-27', 29, 'Single', 'Female', 'Not Registered', 'chloe.flores@example.com', '09123456818', 'Artist', 'Filipino', 'Purok 5'),
(41, 'Gabriel', 'Christian', 'Green', '3838', 'La Union', '1995-01-08', 28, 'Single', 'Male', 'Registered', 'gabriel.green@example.com', '09123456819', 'Musician', 'Filipino', 'Purok 1'),
(42, 'Lily', 'Anne', 'Adams', '3939', 'Ilocos Norte', '1993-10-31', 30, 'Married', 'Female', 'Registered', 'lily.adams@example.com', '09123456820', 'Nurse', 'Filipino', 'Purok 2'),
(43, 'Carter', 'John', 'Nelson', '4040', 'Pangasinan', '1990-07-16', 33, 'Single', 'Male', 'Not Registered', 'carter.nelson@example.com', '09123456821', 'Engineer', 'Filipino', 'Purok 3'),
(44, 'Zoey', 'Marie', 'Baker', '4141', 'Isabela', '1997-04-05', 26, 'Single', 'Female', 'Registered', 'zoey.baker@example.com', '09123456822', 'Student', 'Filipino', 'Purok 4'),
(45, 'Julian', 'David', 'Hall', '4242', 'Nueva Ecija', '1994-11-18', 29, 'Single', 'Male', 'Registered', 'julian.hall@example.com', '09123456823', 'Barber', 'Filipino', 'Purok 5'),
(46, 'Penelope', 'Grace', 'Rivera', '4343', 'Bulacan', '1992-02-22', 31, 'Married', 'Female', 'Registered', 'penelope.rivera@example.com', '09123456824', 'Dentist', 'Filipino', 'Purok 1'),
(47, 'Wyatt', 'Thomas', 'Mitchell', '4444', 'Pampanga', '1996-09-14', 27, 'Single', 'Male', 'Not Registered', 'wyatt.mitchell@example.com', '09123456825', 'Waiter', 'Filipino', 'Purok 2'),
(48, 'Hannah', 'Joyce', 'Carter', '4545', 'Rizal', '1998-05-07', 25, 'Single', 'Female', 'Registered', 'hannah.carter@example.com', '09123456826', 'Student', 'Filipino', 'Purok 3'),
(49, 'Owen', 'Joseph', 'Roberts', '4646', 'Cavite', '1989-12-30', 34, 'Married', 'Male', 'Registered', 'owen.roberts@example.com', '09123456827', 'IT Specialist', 'Filipino', 'Purok 4'),
(50, 'Addison', 'Faith', 'Phillips', '4747', 'Laguna', '1995-08-11', 28, 'Single', 'Female', 'Not Registered', 'addison.phillips@example.com', '09123456828', 'Fashion Designer', 'Filipino', 'Purok 5'),
(51, 'Jenmar', 'Acantilado', 'Alano', 'Blk 18 Lot 2', 'Manila', '2025-05-01', 22, 'Single', 'Male', 'Registered', 'tmc.jenmar.alano@cvsu.edu.ph', '09694911585', 'Web Developer', 'Filipino', 'San Francesco');

-- --------------------------------------------------------

--
-- Table structure for table `barangay_revenue`
--

CREATE TABLE `barangay_revenue` (
  `date_issue` date NOT NULL,
  `expired_date` date NOT NULL,
  `document_amount` float NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `document_type` varchar(200) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `OR_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` bigint(200) NOT NULL,
  `photo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `photo`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(6, '6.jpg'),
(7, '7.jpg'),
(8, '8.jpg'),
(9, '9.jpg'),
(10, '10.jpg'),
(11, '11.jpg'),
(12, '12.jpg'),
(13, '13.jpg'),
(14, '14.jpg'),
(15, '15.jpg'),
(16, '16.jpg'),
(17, '17.jpg'),
(18, '18.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `date_registered` date NOT NULL,
  `house_no` varchar(200) NOT NULL,
  `sitio_pook` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `profile` varchar(200) NOT NULL,
  `verify` varchar(200) NOT NULL,
  `support_doc` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`firstname`, `middlename`, `lastname`, `email`, `password`, `gender`, `age`, `birthday`, `date_registered`, `house_no`, `sitio_pook`, `contact_no`, `profile`, `verify`, `support_doc`, `user_id`) VALUES
('Jm', 'Acantilado', 'Alano', 'Jenmaracntilado.alano@gmail.com', '$2y$10$XnNUUsLY80UVRHL8ED8wCOlMc7f9RUL6BRzoW192NAwbBkLSP2ST2', 'Male', 22, '0000-00-00', '2025-07-25', '', '', '', 'images.png', 'Verified', '', 53);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_account`
--
ALTER TABLE `admin_account`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `barangay_blotter`
--
ALTER TABLE `barangay_blotter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_incident`
--
ALTER TABLE `barangay_incident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_information`
--
ALTER TABLE `barangay_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_official`
--
ALTER TABLE `barangay_official`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_request`
--
ALTER TABLE `barangay_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_resident`
--
ALTER TABLE `barangay_resident`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangay_revenue`
--
ALTER TABLE `barangay_revenue`
  ADD PRIMARY KEY (`OR_no`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_account`
--
ALTER TABLE `admin_account`
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `barangay_blotter`
--
ALTER TABLE `barangay_blotter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `barangay_incident`
--
ALTER TABLE `barangay_incident`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `barangay_information`
--
ALTER TABLE `barangay_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barangay_official`
--
ALTER TABLE `barangay_official`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `barangay_request`
--
ALTER TABLE `barangay_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `barangay_resident`
--
ALTER TABLE `barangay_resident`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `barangay_revenue`
--
ALTER TABLE `barangay_revenue`
  MODIFY `OR_no` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
