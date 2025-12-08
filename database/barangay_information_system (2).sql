-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2025 at 08:56 AM
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
(91, 'ADMINISTRATOR', 'Jenmar', 'Acantilado', 'Alano', 'admin@example.com', '$2y$10$RHcGE2mfpCcc0R0Ak1fDLOsGKji9JTaqxpovORSPLeZQBNtGuXP/C', '2025-11-30', '692bb8fb877f8.jpg', 'Male', 22, 1),
(92, 'ADMINISTRATOR', 'Neil', '', 'Alegiojo', 'yayayahj.alano@gmail.com', '$2y$10$FuGG1jn439p/J11UPJW53.GpLKIq9Ak22ZcjSznHN.LaxjwSJMpYO', '2025-12-07', '6934fce1278a7.jpg', 'Male', 26, 1);

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
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` bigint(20) NOT NULL,
  `remarks` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_blotter`
--

INSERT INTO `barangay_blotter` (`subject`, `cell_no`, `place`, `tanod`, `date`, `time`, `status`, `id`, `complainant`, `age`, `address_complainant`, `complained_name`, `add_complained_name`, `details_reason`, `last_update`, `user_id`, `remarks`) VALUES
('Flood control', '09694911586', 'Bulacan', 'Juan Dela cruz', '2025-12-08', '13:22:14', 'Pending', 72, 'Jenmar Acantilado Alano', 18, ' Mabuhay Homes Sitio Gitna', 'Discaya', 'Malabon', 'Bumili na nang kotse para sa asd', '2025-12-08 07:45:10', 108, 'Under Observation');

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
  `status` varchar(200) NOT NULL,
  `date_filed` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barangay_incident`
--

INSERT INTO `barangay_incident` (`id`, `date`, `time`, `name_involve`, `address`, `vehicle`, `license`, `plate_no`, `cause_incident`, `status`, `date_filed`) VALUES
(71, '2025-12-08', '15:53:00', 'Juan', 'mabuhay homes', '23ads2', '233243', '232322', 'Flood', 'Active', '2025-12-08 07:54:09');

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
  `middlename` varchar(250) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `suffix` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `birthday` date NOT NULL,
  `age` int(11) NOT NULL,
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

INSERT INTO `user_account` (`firstname`, `middlename`, `lastname`, `suffix`, `email`, `password`, `gender`, `birthday`, `age`, `date_registered`, `house_no`, `sitio_pook`, `contact_no`, `profile`, `verify`, `support_doc`, `user_id`) VALUES
('Jenmar', 'Acantilado', 'Alano', 'Sr.', 'jenmaralano@gmail.com', '$2y$10$aRbSqk4Kn2x2lOOWTMpIJ.ZRBaaWlvxTPW3gq/gizK0GZFPsA6wr.', 'Male', '2007-12-04', 18, '2025-12-06', 'Mabuhay Homes', 'Sitio Gitna', '09694911586', 'images.png', 'Account Verified', '', 108);

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
  MODIFY `user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `barangay_blotter`
--
ALTER TABLE `barangay_blotter`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `barangay_incident`
--
ALTER TABLE `barangay_incident`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `barangay_resident`
--
ALTER TABLE `barangay_resident`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `barangay_revenue`
--
ALTER TABLE `barangay_revenue`
  MODIFY `OR_no` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
