-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 10.123.0.165:3306
-- Generation Time: Feb 14, 2018 at 12:11 AM
-- Server version: 5.7.20
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `joekan_wdv341`
--

-- --------------------------------------------------------

--
-- Table structure for table `local_dpd_bio`
--

CREATE TABLE `local_dpd_bio` (
  `bio_login_email` varchar(100) NOT NULL,
  `bio_first_name` varchar(100) NOT NULL,
  `bio_last_name` varchar(100) NOT NULL,
  `bio_program` varchar(100) NOT NULL,
  `bio_second_program` varchar(100) NOT NULL,
  `bio_website_address` varchar(100) NOT NULL,
  `bio_second_web` varchar(100) NOT NULL,
  `bio_linkedIn` varchar(200) NOT NULL,
  `bio_email` varchar(100) NOT NULL,
  `bio_hometown` varchar(100) NOT NULL,
  `bio_career_goals` varchar(250) NOT NULL,
  `bio_three_words` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `local_dpd_bio`
--
ALTER TABLE `local_dpd_bio`
  ADD PRIMARY KEY (`bio_login_email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
