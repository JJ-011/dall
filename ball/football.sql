-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2024 at 03:25 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `football`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `No` int NOT NULL,
  `stadium_id` int NOT NULL,
  `day` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `user_id` varchar(40) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`No`, `stadium_id`, `day`, `time`, `user_id`, `cost`) VALUES
(65, 1, '2024-03-14', '10:00 - 11:00', 'jjkeroro', 180),
(66, 1, '2024-03-14', '11:00 - 12:00', 'mm', 180);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `stadium_id` int NOT NULL,
  `day` date NOT NULL,
  `time1` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time2` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time3` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time4` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time5` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `time6` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`stadium_id`, `day`, `time1`, `time2`, `time3`, `time4`, `time5`, `time6`) VALUES
(1, '2024-03-13', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-14', 'จองแล้ว', 'จองแล้ว', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-15', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-16', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-17', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-18', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-19', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(1, '2024-03-20', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-13', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-14', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-15', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-16', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-17', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-18', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-19', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(2, '2024-03-20', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-13', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-14', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-15', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-16', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-17', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-18', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-19', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง'),
(3, '2024-03-20', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง', 'ว่าง');

-- --------------------------------------------------------

--
-- Table structure for table `stadium`
--

CREATE TABLE `stadium` (
  `stadium_id` int NOT NULL,
  `stadium_name` varchar(40) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `stadium_detail` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `stadium_pic` varchar(40) CHARACTER SET utf16 COLLATE utf16_general_ci DEFAULT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stadium`
--

INSERT INTO `stadium` (`stadium_id`, `stadium_name`, `stadium_detail`, `stadium_pic`, `cost`) VALUES
(1, 'สนามใหญ่ 0', 'เวลา เปิด - ปิด\r\n16.00 น - 22.00 น.\r\nเล่นได้ 11 คน', 'big field.png', 180),
(2, 'สนามเล็ก 1', 'เวลา เปิด - ปิด\r\n16.00 น. - 22.00 น.\r\nเล่นได้ 5-7 คน', 'small field.png', 150),
(3, 'สนามเล็ก 2', 'เวลา เปิด - ปิด\r\n16.00 น. - 22.00 น.\r\nเล่นได้ 5-7 คน', 'small field.png', 150);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` varchar(40) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
('jjkeroro', 'ธัญญ่า', 'b0baee9d279d34fa1dfd71aadb908c3f'),
('mm', 'mm', 'b0baee9d279d34fa1dfd71aadb908c3f'),
('Pin', 'เทพ', '8af95a9ca4f3f7b8589c3f2fc390d258'),
('poon', 'ปูน', '5f4dcc3b5aa765d61d8327deb882cf99'),
('pp', 'pp', '202cb962ac59075b964b07152d234b70'),
('Pto', 'พี่โต้', 'c4ca4238a0b923820dcc509a6f75849b'),
('yy', 'yy', 'b0baee9d279d34fa1dfd71aadb908c3f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`stadium_id`,`day`);

--
-- Indexes for table `stadium`
--
ALTER TABLE `stadium`
  ADD PRIMARY KEY (`stadium_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `No` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
