-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 07, 2019 at 07:59 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prana_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `content_categories`
--

CREATE TABLE `content_categories` (
  `id` int(11) NOT NULL,
  `title` varchar(5000) DEFAULT NULL,
  `class` varchar(500) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '0',
  `image` varchar(500) NOT NULL DEFAULT 'DEF'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_categories`
--

INSERT INTO `content_categories` (`id`, `title`, `class`, `level`, `image`) VALUES
(1, 'Housing', 'housing', 0, 'home2'),
(2, 'Food', 'food', 0, 'food'),
(3, 'Medical', 'medical', 0, 'medical'),
(4, 'Sanitary', 'sanitary', 0, 'sanitary'),
(5, 'Legal & beurocratic', 'lb', 0, 'legal'),
(6, 'Job Center', 'jobcenter', 0, 'jobcenter'),
(7, 'Counseling centers', 'counselingcenters', 0, 'counseling');

-- --------------------------------------------------------

--
-- Table structure for table `content_elements`
--

CREATE TABLE `content_elements` (
  `id` int(11) NOT NULL,
  `class` varchar(500) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `owner_class` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `paragraph` varchar(10000) NOT NULL,
  `image_path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content_elements`
--

INSERT INTO `content_elements` (`id`, `class`, `owner_id`, `owner_class`, `title`, `paragraph`, `image_path`) VALUES
(1, 'emergency_medi_healthinsure', -1, '', 'Medical attention with health insurance', 'bleh', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content_categories`
--
ALTER TABLE `content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_elements`
--
ALTER TABLE `content_elements`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content_categories`
--
ALTER TABLE `content_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `content_elements`
--
ALTER TABLE `content_elements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
