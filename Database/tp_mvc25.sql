-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2025 at 11:23 PM
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
-- Database: `tp_mvc25`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sks` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `name`, `sks`) VALUES
(1, 'CS101', 'Pemrograman Dasar', 3),
(2, 'CS102', 'Struktur Data', 3),
(3, 'CS201', 'Basis Data', 3),
(4, 'CS202', 'Jaringan Komputer', 2),
(5, 'CS301', 'Kecerdasan Buatan', 3),
(6, 'CS302', 'Pemrograman Web', 3),
(7, 'CS303', 'Sistem Operasi', 2),
(8, 'CS304', 'Analisis Algoritma', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`) VALUES
(1, 'Dr. Andi Setiawan', '1234567890', '081234567890', '2015-08-12'),
(2, 'Prof. Siti Rahmawati', '0987654321', '082345678901', '2010-02-25'),
(3, 'Drs. Bambang Prasetyo', '1122334455', '083456789012', '2018-11-10'),
(4, 'Dr. Lestari Dewi', '5566778899', '081223344556', '2017-03-05'),
(5, 'M. Rizki Hidayat, M.Kom', '6677889900', '085678901234', '2020-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_courses`
--

CREATE TABLE `lecturer_courses` (
  `lecturer_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturer_courses`
--

INSERT INTO `lecturer_courses` (`lecturer_id`, `course_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(2, 5),
(3, 4),
(3, 7),
(4, 6),
(5, 1),
(5, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`);

--
-- Indexes for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD PRIMARY KEY (`lecturer_id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturer_courses`
--
ALTER TABLE `lecturer_courses`
  ADD CONSTRAINT `lecturer_courses_ibfk_1` FOREIGN KEY (`lecturer_id`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lecturer_courses_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
