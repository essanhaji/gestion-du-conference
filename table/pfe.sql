-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 01:21 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `lastname`, `email`, `username`, `password`) VALUES
(43, 'aaa', 'aa', 'a@udhfu', 'aaaaaaaaaaaa', '511e33b4b0fe4bf75aa3bbac63311e5a'),
(44, 'said', 'said', 'bb@bb', 'said', 'ad79e2cd5fd5ae53547d991007344847'),
(45, 'mo', 'jkhjkh', 'aa@gmail.com', 'hjhjhj', '3b2b62ec2d485813c5bb0f4defb08745'),
(46, 'moh', 'amed', 'hhh@hhh.com', 'haha', 'ad79e2cd5fd5ae53547d991007344847'),
(48, 'karim', 'kk', 'kk@kk', 'kk', 'a2d20c82b5c3805e346a494aa3d286b2'),
(49, 'AAA', 'AAA', 'aaA@gmail.com', 'AAAA', '9ca50854f57add44227363ef849e7476'),
(51, 'ml', 'ml', 'ml@mlm', 'ml', '3cfd436919bc3107d68b912ee647f341'),
(52, 'said', 'sad', 'iiisa@a', 'saiiii', '687fcf0cc68ae8c7c6c28fc139ce1448'),
(53, 'hh', 'hh', 'hhs@ss', 'hh', '40ad491c1c6403330a6d7695e6fa3723');

-- --------------------------------------------------------

--
-- Table structure for table `conference`
--

CREATE TABLE `conference` (
  `title` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `equipe`
--

CREATE TABLE `equipe` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(50) NOT NULL,
  `id_part` int(50) NOT NULL,
  `title` varchar(200) NOT NULL,
  `new_file` int(2) NOT NULL DEFAULT '1',
  `file_pdf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `id_part`, `title`, `new_file`, `file_pdf`) VALUES
(27, 91, 'tast', 0, 'test'),
(28, 92, 'tast', 0, 'test'),
(29, 94, 'tast', 0, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `registration_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `new_part` int(11) DEFAULT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`id`, `name`, `lastname`, `email`, `username`, `password`, `registration_date`, `new_part`, `phone_number`) VALUES
(91, '[value-1]', '[value-2]', '[value-3]', '[value-4]', '[value-5]', NULL, 1, ''),
(92, 'fsdfsd', 'fgsfsf', 'fgsfuuxxxsf', 'efmxxxsjef', 'sefsef', '0000-00-00 00:00:00', 1, ''),
(94, 'fsdfsd', 'fgsfsf', 'fgsfuuxxbxsf', 'efmxxnxsjef', 'efmxxnxsjef', '0000-00-00 00:00:00', 1, ''),
(95, '', '', '', 'hhhhh', '', '2018-02-24 22:16:44', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `speaker`
--

CREATE TABLE `speaker` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `speaker`
--

INSERT INTO `speaker` (`id`, `name`, `lastname`, `email`, `description`, `phone_number`, `picture`) VALUES
(3, 'fsdfsd', 'fgsfsf', 'fgsfuuxxbxsf', 'efmxxnxsjef', 'sefsef', ''),
(5, 'fsdfsd', 'fgsfsf', 'fgsfuuxqqxbxsf', 'efmxxnxsjef', 'seftggsef', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `email_3` (`email`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_foreign_key` (`id_part`);

--
-- Indexes for table `participant`
--
ALTER TABLE `participant`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `New_Participants` (`id`);

--
-- Indexes for table `speaker`
--
ALTER TABLE `speaker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `participant`
--
ALTER TABLE `participant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `speaker`
--
ALTER TABLE `speaker`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `fk_foreign_key` FOREIGN KEY (`id_part`) REFERENCES `participant` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
