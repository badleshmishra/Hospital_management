-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 07:38 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` enum('scheduled','completed','cancelled') DEFAULT 'scheduled',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_image` varchar(200) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(25) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `user_id`, `profile_image`, `first_name`, `last_name`, `phone`, `email`, `gender`, `date_of_birth`, `created_at`, `updated_at`, `specialty_id`) VALUES
(1, 10, '', '', '', NULL, '', NULL, NULL, '2024-10-05 07:27:41', '2024-10-05 07:27:41', NULL),
(2, 11, '', 'manu', '', NULL, '', NULL, NULL, '2024-10-05 07:32:26', '2024-10-05 07:32:26', NULL),
(3, 13, '', 'kalu', '', NULL, '', NULL, NULL, '2024-10-05 07:58:33', '2024-10-05 07:58:33', 2),
(5, 1, 'doctor.jpg', 'badlesh', 'mishra', '8802420073', 'badleshmishra@gmail.com', 'male', '0000-00-00', '2024-10-05 15:44:10', '2024-10-05 16:24:06', 7);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `inventory_managers`
--

CREATE TABLE `inventory_managers` (
  `inventory_manager_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receptionist_permissions`
--

CREATE TABLE `receptionist_permissions` (
  `action_id` int(11) NOT NULL,
  `receptionist_id` int(11) NOT NULL,
  `action_type` enum('add','delete') NOT NULL,
  `target_user_id` int(11) NOT NULL,
  `action_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `specialties`
--

CREATE TABLE `specialties` (
  `specialty_id` int(11) NOT NULL,
  `specialty_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialties`
--

INSERT INTO `specialties` (`specialty_id`, `specialty_name`) VALUES
(1, 'Cardiology'),
(2, 'Dermatology'),
(3, 'Emergency Medicine'),
(4, 'Endocrinology'),
(5, 'Gastroenterology'),
(6, 'Internal Medicine'),
(7, 'Neurology'),
(8, 'Obstetrics and Gynecology'),
(9, 'Oncology'),
(10, 'Orthopedics'),
(11, 'Pediatrics'),
(12, 'Psychiatry'),
(13, 'Radiology'),
(14, 'Surgery'),
(15, 'Urology');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('doctor','receptionist','inventory_manager') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `specialty_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`, `created_at`, `updated_at`, `specialty_id`) VALUES
(1, 'badlesh', '987', 'badlesh@gmail.com', 'doctor', '2024-10-05 07:04:25', '2024-10-05 07:50:24', 1),
(2, 'rohit', '123', 'rohit@gmail.com', 'inventory_manager', '2024-10-05 07:04:25', '2024-10-05 07:50:31', 12),
(3, 'divanshu', '1234', 'divanshu@gmail.com', 'receptionist', '2024-10-05 07:05:03', '2024-10-05 07:50:36', 1),
(4, 'puneet', '963', 'puneet@gmail.com', 'doctor', '2024-10-05 07:18:18', '2024-10-05 07:50:51', 12),
(6, 'mayank', '852', 'wdasfgfhjk@gmail.com', 'doctor', '2024-10-05 07:20:35', '2024-10-05 07:51:40', 7),
(8, 'puneet', '8745', 'hkuydgh@gmaail.com', 'doctor', '2024-10-05 07:24:10', '2024-10-05 07:51:45', 10),
(10, 'hlo', '855', 'uhfihd@gmail.com', 'doctor', '2024-10-05 07:27:41', '2024-10-05 07:51:51', 1),
(11, 'manu', '9875', 'uyg@gmail.com', 'doctor', '2024-10-05 07:32:26', '2024-10-05 07:52:04', 15),
(13, 'kalu', '855', 'kalu@gmail.com', 'doctor', '2024-10-05 07:58:33', '2024-10-05 07:58:33', 2);

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `after_user_insert` AFTER INSERT ON `users` FOR EACH ROW BEGIN
  IF NEW.role = 'doctor' THEN
    INSERT INTO doctors (user_id, first_name, specialty_id) VALUES (NEW.user_id, NEW.username, NEW.specialty_id);
  END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `added_by` (`added_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `inventory_managers`
--
ALTER TABLE `inventory_managers`
  ADD PRIMARY KEY (`inventory_manager_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `receptionist_permissions`
--
ALTER TABLE `receptionist_permissions`
  ADD PRIMARY KEY (`action_id`),
  ADD KEY `receptionist_id` (`receptionist_id`),
  ADD KEY `target_user_id` (`target_user_id`);

--
-- Indexes for table `specialties`
--
ALTER TABLE `specialties`
  ADD PRIMARY KEY (`specialty_id`),
  ADD UNIQUE KEY `specialty_name` (`specialty_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `specialty_id` (`specialty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventory_managers`
--
ALTER TABLE `inventory_managers`
  MODIFY `inventory_manager_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `receptionist_permissions`
--
ALTER TABLE `receptionist_permissions`
  MODIFY `action_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialties`
--
ALTER TABLE `specialties`
  MODIFY `specialty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`doctor_id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `inventory_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `inventory_managers`
--
ALTER TABLE `inventory_managers`
  ADD CONSTRAINT `inventory_managers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `receptionist_permissions`
--
ALTER TABLE `receptionist_permissions`
  ADD CONSTRAINT `receptionist_permissions_ibfk_1` FOREIGN KEY (`receptionist_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `receptionist_permissions_ibfk_2` FOREIGN KEY (`target_user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`specialty_id`) REFERENCES `specialties` (`specialty_id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
