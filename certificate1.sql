-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 06:20 PM
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
-- Database: `certificates`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `certificate_name` varchar(255) NOT NULL,
  `certificate_path` varchar(255) NOT NULL,
  `course_start_date` date DEFAULT NULL,
  `course_end_date` date DEFAULT NULL,
  `certificate_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `user_id`, `certificate_name`, `certificate_path`, `course_start_date`, `course_end_date`, `certificate_description`) VALUES
(1, 1, 'hi', 'uploads/ChatGPT.html', NULL, NULL, NULL),
(2, 2, 'wqeqw', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(3, 3, 'hello', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(4, 3, 'iuqsyu', 'uploads/ChatGPT.html', NULL, NULL, NULL),
(5, 4, 'kjgyus', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(6, 7, 'certificate', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(7, 8, 'bvxdrvgyu', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(8, 8, 'uyttrdyr', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(9, 9, 'ewfwawgew', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(10, 9, 'utyr68', 'uploads/fav-rec ppt.pptx', NULL, NULL, NULL),
(11, 11, 'ki', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(12, 12, 'kugtyd', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(13, 12, 'kugtyd', 'uploads/bicycle.jpg', NULL, NULL, NULL),
(14, 12, 'fgtr', 'uploads/bicycle.jpg', '2024-07-02', '2024-07-11', 'ff'),
(15, 12, 'fgtr', 'uploads/bicycle.jpg', '2024-07-01', '2024-07-10', 'ff'),
(16, 13, 'jtyu6t6ti', 'uploads/bicycle.jpg', '2024-07-04', '2024-07-11', 'ligytydrt'),
(17, 13, 'jtyu6t6tihgfd', 'uploads/bicycle.jpg', '2024-07-03', '2024-07-13', 'ligytydrtjhf'),
(18, 14, 'jksx', 'uploads/bicycle.jpg', '2024-04-10', '2024-07-04', 'jhdryesrser'),
(19, 13, 'ytrtyiu', 'uploads/Full Stack Development-Lab Component-Day 2 (1).pdf', '2024-06-01', '2024-07-10', 'hjhgfgfdsr'),
(20, 13, 'ytrtyiu', 'uploads/CG_SYNOPSIS_2024.doc', '2024-06-01', '2024-07-09', 'hjhgfgfdsr'),
(21, 2, 'ytrtyiu', 'uploads/bicycle.jpg', '2024-06-04', '2024-07-04', 'hjhgfgfdsr'),
(22, 15, 'e', 'uploads/fav-rec ppt.pptx', '2024-06-06', '2024-07-12', 'yastfsaas'),
(23, 16, 'dsfa', 'https://ik.imagekit.io/vghdkomas/Certificate/Screenshot__55__8Pe8kNoHT.png', '2024-07-24', '2024-07-25', 'sdf'),
(24, 16, 'dsfa', 'https://ik.imagekit.io/vghdkomas/Profile/Screenshot__55__nD4DdXnoa.png', '2024-07-24', '2024-07-25', 'sdf'),
(25, 16, 'sdf', 'https://ik.imagekit.io/vghdkomas/Profile/Screenshot__1__cxqetE5ah.png', '2024-07-25', '2024-07-30', 'sdf'),
(26, 16, 'sdf', 'https://ik.imagekit.io/vghdkomas/Profile/Screenshot__3__nPYbkdsxO.png', '2024-07-25', '2024-07-30', 'sdf'),
(27, 16, 'oiujyhg', 'https://ik.imagekit.io/vghdkomas/Profile/Screenshot__31__SpW-uUrwP.png', '2024-07-10', '2024-07-26', 'oiuhygtf');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` enum('student','faculty','admin') NOT NULL DEFAULT 'student',
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `user_type`, `phone_number`) VALUES
(1, 'nayana', '$2y$10$nTqR0hMmUqPdU.pEUQSEWe1QzVgbl7eyfAGdPDlhhUuYsggFBCDBS', 'student', NULL),
(2, 'hi', '$2y$10$7wNI1oe94Ta9Uomc955IOugDNUTXr15TYqUaD29lco7qT9Z4Rl6Oe', 'faculty', NULL),
(3, 'kavita', '$2y$10$QrZoZhwo5ReEQ/9.uz3x5eP6/K3vFeS0H3PX/lK2G98ADco9CO4a.', 'student', NULL),
(4, 'vis', '$2y$10$ymDmb61WZON2Q/RetOp.eeC8ncWPp58VqrlJRrDX40MiDHu7uFSMa', 'faculty', NULL),
(5, 'kavi', '$2y$10$F125C99aEjGjpB70czkJWemL5mSIoDN67.njls3Ms1sKUeIhMXCj2', 'student', NULL),
(7, 'pavvi', '$2y$10$dkkcEKJA8moEayu/2mgwZOJDRU3RDa/SwKHTljNBt/iBBrb7TJcCS', 'faculty', NULL),
(8, 'shradha', '$2y$10$3HX50EgbsPIEBvYt.ojRa.32dhuPX.YyTBGDT5jiBnFvPFFyp5lNO', 'student', NULL),
(9, 'sneha', '$2y$10$griWgnoFjsjSvcOx3yHHIOwb18H/SBHUgBJ.izCsIiTnY/PRR22MK', 'student', NULL),
(10, 'hii', '$2y$10$0cO/sYjddqwml5O/nQJdgOw4YLTV3oV7CSajQmc1SQty2YIJ0ZGbK', 'student', NULL),
(11, 'hello', '$2y$10$kVspRir4ad.Xvefa6Z09xO40jbzaaJFMsmxwT06pdpAzW97QUVYgK', 'student', NULL),
(12, 'anu', '$2y$10$fZcOaU3WVeAxFeYam3PH0OsmAgiPOfSYTaidaAy3cQWHZ326/spwe', 'student', NULL),
(13, 'vishal', '$2y$10$UI64DTHvJJnMwAqB1Ft0nO944kxFkSdd6hBBHWavF4eUtH5LS7jPy', 'student', NULL),
(14, 'arun', '$2y$10$CBfP7sVY1eqMrhjlB/9luOYu3k1McLdBHVTBxHywkR6bQTjsn.hkS', 'faculty', NULL),
(15, 'sunita', '$2y$10$owQjlzZWl7Dgq4CKtnBZUuBo4p8s0LQo1yZ67A7.8J6FQzJAjYhPW', 'faculty', NULL),
(16, 'Gururaj', '$2y$10$6ISaUVuU37ghVsbVvHl9p.ElivpARgdA0o.oNJnTO4/2mx.WHbeZS', 'student', NULL),
(17, 'test', '$2y$10$d36C.etuI6.4y4xbQGPgNu/qmmidxfzqchjASS1oBCiCg55gBRV62', 'student', '9148276513'),
(19, 'test5', '$2y$10$zfA1pdHOgFIn/Bm4rcVqk.e74FKIyz4M8Md6DI45BvmeamirjdWla', 'student', '9148276513');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
