-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 06:25 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(6) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `dob`, `mobile`, `email`, `password_hash`) VALUES
(11, 'admin', 'admin', '2000-01-25', '2147483649', 'admin@gmail.com', '$2y$10$bS9bBWB/koqzinvUqQ3cheOqbDZNCB2Zos6FW2GsmLx8ZXinZdcBi'),
(12, 'Dhanesh', 'Kumar', '2007-04-05', '9876543212', 'dhanesh@gmail.com', '$2y$10$rLZmIVG.t7onF6ZE9LSaxuHTfHK3on8GicTFoj1DyHwvJqiRKQD6K'),
(13, 'kumar', 'kumar', '2002-11-25', '9876543211', 'kumar@gmail.com', '$2y$10$MBg51L/gTZ0yU/bfShRsBO9UYDL1alfy6t1vP2Nx07yh./hmV2Pm.'),
(14, 'dk', 'dk', '1001-12-29', '9876543234', 'rigevok652@miarr.com', '$2y$10$pkqygoFey/Wjx.zQtOCyrOExqRCYlLylPTfdh7yW0YB36EDqvlNM6'),
(15, 'suresh', 'suresh', '0000-00-00', '9898989898', 'suresh@gmail.com', '$2y$10$oea1Vo88ho5QOYwsplTIJeHCS6pfyC/sr04yuHgjSqCgloU4K.YgK'),
(16, 'Dhanesh', 'Kumar', '2001-02-11', '1212321234', 'xavdkfhsa@gmail.com', '$2y$10$/HYCYq4w7tSNhIM9TeQ7W.ShzfxbFqqhuIFgZaGLPu4UrZtQE5rU6'),
(17, 'bhuvi', 'bhuvi', '2001-12-12', '9587521425', 'bhuvi@gmail.com', '$2y$10$9gfX7SUtHHU1CbzGozKDeOahXdjfpuVxHaE5EjqjvWUiNRFgxR01m'),
(18, 'gokul', 'krishnan', '2001-08-06', '8787878787', 'gokul@gmail.com', '$2y$10$TDkvVU4nj0XnmPOiocYYueUOmvOrFVCiKwtYNEIS7OQ2GmcvsvOfa'),
(19, 'ajith', 'kumar', '2001-01-02', '9876543223', 'ajih@gmail.com', '$2y$10$x1GuSr27Za9DoHDfFmeMBeEdr/1hrKSaxdxBcpCzBvVvQzHcHgtPG'),
(20, 'thulasi', 'doss', '2001-01-01', '8878787871', 'thulasi@gmail.com', '$2y$10$vKxWVPY9HSfDjum9SIn6KecPxPjpA2DisAKeyB.vAMi6t/PICi1Xe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
