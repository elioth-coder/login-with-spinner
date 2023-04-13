-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 03:12 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `gender` enum('MALE','FEMALE') NOT NULL,
  `birthday` date NOT NULL,
  `type` enum('ADMIN','TELLER','CUSTOMER') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `last_name`, `first_name`, `gender`, `birthday`, `type`) VALUES
(1, 'admin', '1234', 'admin', 'elioth', 'MALE', '2023-01-16', 'ADMIN'),
(2, 'maldita', 'encrypted', 'Maldita', 'Shane', 'FEMALE', '2023-02-01', 'TELLER'),
(4, 'maldito', 'secret1234', 'Maldito', 'Boy', 'MALE', '2012-02-01', 'TELLER'),
(5, 'joselito', 'dimoalam', 'Maloko', 'Joselito', 'MALE', '1993-02-11', 'TELLER'),
(6, 'adikto', 'shabu8888', 'Adikto', 'Shabby', 'MALE', '1983-02-01', 'TELLER'),
(7, 'lupita', 'masochist', 'Lupita', 'Shane', 'FEMALE', '2023-02-01', 'TELLER'),
(8, 'maria1234', 'unknown', 'Clara', 'Maria', 'FEMALE', '1953-02-01', 'TELLER'),
(9, 'cordova', 'password', 'Cordova', 'Lina', 'FEMALE', '2006-11-15', 'CUSTOMER'),
(10, 'jin1234', 'password', 'Tao', 'Jin', 'MALE', '2023-01-10', 'CUSTOMER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
