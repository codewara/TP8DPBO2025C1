-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 06:15 PM
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
-- Database: `tp_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `student_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`ID`, `title`, `description`, `deadline`, `student_ID`) VALUES
(1, 'Laporan Praktikum 1', 'Membuat laporan praktikum pemrograman dasar', '2023-09-01', 1),
(2, 'Tugas PBO', 'Implementasi konsep inheritance dan interface', '2023-09-05', 2),
(3, 'Ujian Tengah Semester', 'Persiapan UTS Semester Ganjil', '2023-10-10', 3),
(4, 'Desain Database', 'Normalisasi hingga 3NF', '2023-09-12', 4),
(5, 'Studi Kasus UML', 'Analisis sistem dan diagram use case', '2023-09-15', 5);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`ID`, `name`, `description`) VALUES
(1, 'Kelompok A', 'Kelompok tugas besar PBO'),
(2, 'Kelompok B', 'Tim proyek akhir'),
(3, 'Panitia OSPEK', 'Panitia penyelenggara orientasi mahasiswa baru');

-- --------------------------------------------------------

--
-- Table structure for table `group_memberships`
--

CREATE TABLE `group_memberships` (
  `ID` int(11) NOT NULL,
  `student_ID` int(11) DEFAULT NULL,
  `group_ID` int(11) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_memberships`
--

INSERT INTO `group_memberships` (`ID`, `student_ID`, `group_ID`, `join_date`) VALUES
(1, 1, 1, '2023-08-10'),
(2, 2, 1, '2023-08-10'),
(3, 3, 2, '2023-08-11'),
(4, 4, 2, '2023-08-11'),
(5, 1, 3, '2023-08-12'),
(6, 5, 3, '2023-08-12');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `NIM` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `join_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `name`, `NIM`, `phone`, `join_date`) VALUES
(1, 'Alya Putri', '210011001', '081234567890', '2023-08-01'),
(2, 'Budi Santoso', '210011002', '081234567891', '2023-08-02'),
(3, 'Citra Dewi', '210011003', '081234567892', '2023-08-03'),
(4, 'Deni Kurniawan', '210011004', '081234567893', '2023-08-04'),
(5, 'Eka Wulandari', '210011005', '081234567894', '2023-08-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_ID` (`student_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `group_memberships`
--
ALTER TABLE `group_memberships`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `student_ID` (`student_ID`),
  ADD KEY `group_ID` (`group_ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `group_memberships`
--
ALTER TABLE `group_memberships`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `students` (`ID`);

--
-- Constraints for table `group_memberships`
--
ALTER TABLE `group_memberships`
  ADD CONSTRAINT `group_memberships_ibfk_1` FOREIGN KEY (`student_ID`) REFERENCES `students` (`ID`),
  ADD CONSTRAINT `group_memberships_ibfk_2` FOREIGN KEY (`group_ID`) REFERENCES `groups` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
