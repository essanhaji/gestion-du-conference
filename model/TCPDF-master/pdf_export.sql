-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2017 at 07:15 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tut`
--

-- --------------------------------------------------------

--
-- Table structure for table `pdf_export`
--

CREATE TABLE `pdf_export` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdf_export`
--

INSERT INTO `pdf_export` (`id`, `name`, `age`, `email`) VALUES
(1, 'Mohan', 24, 'mohanraj8212@gmail.com'),
(2, 'Siva', 23, 'sivarmalik@gmail.com'),
(3, 'Raja', 26, 'rajapitchandi21@gmail.com'),
(4, 'Harish', 23, 'harishbilla@gmail.com'),
(5, 'Gopi', 29, 'gopinath212@gmail.com'),
(6, 'Ranjith', 23, 'ranjith862@gmail.com'),
(7, 'Sarath', 21, 'sarathkumar92@gmail.com'),
(8, 'Deepak', 25, 'deepakmich@gmail.com'),
(9, 'Salam', 26, 'salam231@gmail.com'),
(10, 'Karthik', 27, 'karthik_crk@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pdf_export`
--
ALTER TABLE `pdf_export`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pdf_export`
--
ALTER TABLE `pdf_export`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
