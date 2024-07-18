-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2024 at 02:12 PM
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
-- Database: `new_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(4, 'bi05', 'manita.suww@gmail.com', '$2y$10$M2V81Zes1jIfHNzlviW7OO4aLWStAeEqKusGbUhT/C6pi10z5kDdW', '2024-07-15 19:56:34', 'user'),
(6, 'ืnimmy', 'tarnthipt89@gmail.com', '$2y$10$.u7ng7TSTQ.u/xnbxUCpoum9zWRTLftytIGgHk3pzV4TGmzrj9eGK', '2024-07-16 11:25:22', 'user'),
(7, 'fluffyn.n', 'tarnthiptipad@gmail.com', '$2y$10$wgwqHv1/Xty8wcqWwr376.61JnQH1Ykjpr8pC9m3u5I6wyrwp14H6', '2024-07-16 11:40:53', 'user'),
(8, 'paobao', 'ssaiwongnuan405@gmail.com', '$2y$10$stWQdYcyrGL3t2YmXb7P7.CEGQzXAygWHmxjRTMq.5UBPCxGPh3eu', '2024-07-18 07:35:15', 'user'),
(10, 'manita.s', 'manita.s@gmail.com', '$2y$10$Go7S4pr4Y3iFWyDc.yom3eIQnNXmlsoF.jgwzk7Rb2pCKB/gJfNwy', '2024-07-18 07:43:58', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
