-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2017 at 01:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prndtbse`
--

-- --------------------------------------------------------

--
-- Table structure for table `contnt_categories`
--

CREATE TABLE `contnt_categories` (
  `id` int(16) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `text` varchar(350) DEFAULT NULL,
  `paid_type` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contnt_categories`
--

INSERT INTO `contnt_categories` (`id`, `name`, `category_id`, `text`, `paid_type`) VALUES
(1, 'food', 1, 'Food', NULL),
(2, 'housing', 2, 'Housing', NULL),
(3, 'medical', 3, 'Medical', NULL),
(4, 'legal', 4, 'Legal', NULL),
(5, 'study', 5, 'Study', NULL),
(6, 'jobs', 6, 'Jobs', NULL),
(7, 'organizations', 7, 'Organizations', NULL),
(8, 'volunteers', 8, 'Volunteers', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contnt_food`
--

CREATE TABLE `contnt_food` (
  `id` int(16) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `sub_category` varchar(500) DEFAULT NULL COMMENT 'divided by commas',
  `paid_type` int(11) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `fee` varchar(25) NOT NULL DEFAULT 'N.A.',
  `text1` varchar(76) DEFAULT NULL,
  `text2` text,
  `overide_image` varchar(150) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `organization_venue_address` varchar(500) DEFAULT NULL,
  `womenonly` tinyint(4) DEFAULT '0',
  `menonly` tinyint(4) DEFAULT '0',
  `children` tinyint(4) DEFAULT '0',
  `pets` tinyint(4) DEFAULT '0',
  `soupkitchen` tinyint(4) NOT NULL DEFAULT '0',
  `tafel` tinyint(4) NOT NULL DEFAULT '0',
  `free_givaway` tinyint(4) NOT NULL DEFAULT '0',
  `churchgive` tinyint(4) NOT NULL DEFAULT '0',
  `foodtour` tinyint(4) NOT NULL DEFAULT '0',
  `smoking` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contnt_food`
--

INSERT INTO `contnt_food` (`id`, `name`, `category`, `sub_category`, `paid_type`, `area`, `availability`, `fee`, `text1`, `text2`, `overide_image`, `rating`, `link`, `organization`, `organization_venue_address`, `womenonly`, `menonly`, `children`, `pets`, `soupkitchen`, `tafel`, `free_givaway`, `churchgive`, `foodtour`, `smoking`) VALUES
(1, 'Food test 1', 'food', NULL, 0, '0', 100, 'N.A.', 'This is a food test.This is a food test.This is a food test.This is a food t', 'This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.', NULL, 3, NULL, '1', '1', 1, 0, 0, 0, 0, 0, 1, 1, 0, 0),
(2, 'Food Test 2', 'food', NULL, 0, '0', 100, 'N.A.', 'This is a food test.This is a food test.This is a food test.This is a food t', 'This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.This is a food test.', NULL, 3, NULL, '1', '1', 1, 0, 0, 0, 0, 0, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contnt_housing`
--

CREATE TABLE `contnt_housing` (
  `id` int(16) NOT NULL,
  `name` varchar(25) CHARACTER SET latin1 COLLATE latin1_german1_ci DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `sub_category` varchar(500) DEFAULT NULL COMMENT 'divided by commas',
  `paid_type` int(11) DEFAULT NULL,
  `to_` int(11) DEFAULT NULL,
  `tc` int(11) DEFAULT NULL,
  `days_open` varchar(16) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `fee` varchar(25) NOT NULL DEFAULT 'N.A.',
  `text1` varchar(76) DEFAULT 'N.A.',
  `text1_Deutsch` varchar(76) DEFAULT NULL,
  `text2` varchar(400) DEFAULT 'N.A.',
  `overide_image` varchar(150) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `organization_venue_address` varchar(500) DEFAULT NULL,
  `is_` varchar(150) DEFAULT NULL COMMENT 'MUST BE CARBON COPY OF "is_" IN organization_venues, divided by commas',
  `allows` varchar(150) DEFAULT NULL COMMENT 'MUST BE CARBON COPY OF "allows" IN organization_venues, divided by commas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contnt_housing`
--

INSERT INTO `contnt_housing` (`id`, `name`, `category`, `sub_category`, `paid_type`, `to_`, `tc`, `days_open`, `area`, `availability`, `fee`, `text1`, `text1_Deutsch`, `text2`, `overide_image`, `rating`, `link`, `organization`, `organization_venue_address`, `is_`, `allows`) VALUES
(1, 'Test Venue', 'housing', NULL, 0, 7, 22, '5,6', '0', 25, 'N.A.', 'This is a text of 76 characters only, description does not allow any more ch', NULL, 'This is a description. Descriptions are nice though this one only allows 600 characters, oh bummer. Bet you what. you like this description. anyways I''m testing the 600 characters. Its not to easy but i have to count this. One min. ok I don''t think it is as many as I think so I will keep writing, I think I will use this text to test all of the db entries. Anyways, life''s cool, ugly weather today.T', NULL, 3, 'www.google.com', '1', '1', 'Shelters,Hostels', '[Women] only'),
(2, 'NOTÜBERNACHTUNG ARCOSTR.', 'housing', NULL, 0, 4, 5, NULL, '0', 0, 'N.A.', 'Enter Description', 'Enter Description', 'This is a description. Descriptions are nice though this one only allows 600 characters, oh bummer. Bet you what. you like this description. anyways I''m testing the 600 characters. Its not to easy but i have to count this. One min. ok I don''t think it is as many as I think so I will keep writing, I think I will use this text to test all of the db entries. Anyways, life''s cool, ugly weather today.T', NULL, 5, '', '1', '2', 'Shelters', ''),
(3, 'Test Venue 3', 'housing', NULL, 0, NULL, NULL, NULL, '0', 99, 'N.A.', 'N.A.', NULL, 'N.A.', NULL, NULL, NULL, '1', '1', NULL, NULL),
(4, 'huguz', 'housing', NULL, 2, NULL, NULL, NULL, '0', 5, 'N.A.', 'N.A.', NULL, 'N.A.', NULL, NULL, NULL, '1', '3', NULL, NULL),
(5, 'tfzt', 'food', NULL, 0, NULL, NULL, NULL, '0', 0, 'N.A.', ',mlökmlö', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL),
(6, 'WHAT??', 'housing', NULL, 0, NULL, NULL, NULL, '3', 32, 'N.A.', 'EHHH?', NULL, NULL, NULL, NULL, NULL, '1', '1', NULL, NULL),
(7, 'SJFKSDJF', 'housing', NULL, 0, 4, 5, NULL, '5', 54, 'N.A.', 'fsfs', NULL, NULL, NULL, NULL, NULL, '2', '1', NULL, NULL),
(8, 'Fo9odland', 'food', NULL, 0, NULL, NULL, NULL, '0', 100, 'N.A.', 'dayum bro, dat some food.', NULL, 'text 2?', NULL, 3, NULL, '1', '1', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contnt_medical`
--

CREATE TABLE `contnt_medical` (
  `id` int(16) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `category` varchar(25) DEFAULT NULL,
  `sub_category` varchar(500) DEFAULT NULL COMMENT 'divided by commas',
  `paid_type` int(11) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `availability` int(11) DEFAULT NULL,
  `fee` varchar(25) NOT NULL DEFAULT 'N.A.',
  `text1` varchar(76) DEFAULT NULL,
  `text2` text,
  `overide_image` varchar(150) DEFAULT NULL,
  `rating` int(16) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `organization` varchar(500) DEFAULT NULL,
  `organization_venue_address` varchar(500) DEFAULT NULL,
  `womenonly` tinyint(4) DEFAULT '0',
  `menonly` tinyint(4) DEFAULT '0',
  `children` tinyint(4) DEFAULT '0',
  `pets` tinyint(4) DEFAULT '0',
  `soupkitchen` tinyint(4) NOT NULL DEFAULT '0',
  `tafel` tinyint(4) NOT NULL DEFAULT '0',
  `free_givaway` tinyint(4) NOT NULL DEFAULT '0',
  `churchgive` tinyint(4) NOT NULL DEFAULT '0',
  `foodtour` tinyint(4) NOT NULL DEFAULT '0',
  `smoking` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contnt_medical`
--

INSERT INTO `contnt_medical` (`id`, `name`, `category`, `sub_category`, `paid_type`, `area`, `availability`, `fee`, `text1`, `text2`, `overide_image`, `rating`, `link`, `organization`, `organization_venue_address`, `womenonly`, `menonly`, `children`, `pets`, `soupkitchen`, `tafel`, `free_givaway`, `churchgive`, `foodtour`, `smoking`) VALUES
(1, 'Medical Test', 'medical', NULL, 0, '0', 100, 'N.A.', 'This is a test medical postingThis is a test medical postingThis is a test m', 'This is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical postingThis is a test medical posting', NULL, 100, 'www.google.com', '1', '1', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `langs`
--

CREATE TABLE `langs` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `text` varchar(30) DEFAULT NULL,
  `table` varchar(30) DEFAULT NULL,
  `gmaps_lang` varchar(2) DEFAULT NULL,
  `gmaps_reg` varchar(2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `langs`
--

INSERT INTO `langs` (`id`, `name`, `text`, `table`, `gmaps_lang`, `gmaps_reg`) VALUES
(1, 'English', 'English', 'Lang_English', 'en', 'gb'),
(2, 'Deutsch', 'Deutsch', 'Lang_Deutsch', 'de', 'de'),
(3, 'Polish', 'Polish', 'Lang_Polish', 'pl', 'pl');

-- --------------------------------------------------------

--
-- Table structure for table `lang_deutsch`
--

CREATE TABLE `lang_deutsch` (
  `id` int(11) NOT NULL,
  `word` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `notes` varchar(500) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `lang_deutsch`
--

INSERT INTO `lang_deutsch` (`id`, `word`, `notes`) VALUES
(0, 'Anmelden', NULL),
(1, 'Abmelden', NULL),
(2, 'Mein konto', NULL),
(3, 'Prana-deutschland - copyright 2016', NULL),
(4, 'Startseite', NULL),
(5, NULL, NULL),
(6, 'Einloggen', NULL),
(7, 'Benutzername (Max. 15 Zeichen)', NULL),
(8, 'Vorname', NULL),
(9, 'Nachname', NULL),
(10, 'Bereich/Gegend (Berlin)', NULL),
(11, 'Passwort*', NULL),
(12, '* = Felder mit dem Stern müssen ausgefüllt werden.', NULL),
(13, 'Umsonst', NULL),
(14, 'Geb(uml)hrenpflichtig', NULL),
(15, 'Art', NULL),
(16, 'Mein Profil', NULL),
(17, 'Suche', NULL),
(18, 'Suche Prana', NULL),
(19, 'Essen', NULL),
(20, 'Unterkunft', NULL),
(21, 'Ärztliche Versorgung', NULL),
(22, 'Rechtliche Hinweise', NULL),
(23, 'Bildung', NULL),
(24, 'Arbeit', NULL),
(25, NULL, NULL),
(26, 'Liste', NULL),
(27, 'Karte', NULL),
(28, 'Anmelder oder einloggen', NULL),
(29, 'Anzeigesuche', NULL),
(30, 'Benutzername', NULL),
(31, 'Passwort', NULL),
(32, 'Zugangsdaten vergessen? ', NULL),
(33, 'Klicken Sie hier.', NULL),
(34, 'Prana', NULL),
(35, '--', NULL),
(36, '--', NULL),
(37, 'Filter', NULL),
(38, 'A-Z', NULL),
(39, 'Z-A', NULL),
(40, '< Zurück', NULL),
(41, '--', NULL),
(42, 'Bereich/Gegend', NULL),
(43, 'Geöffnet (Uhr)', NULL),
(44, '--', NULL),
(45, 'Geöffnet (Tag)', NULL),
(46, 'Nach organisation', NULL),
(47, 'Ansehen', NULL),
(48, 'Infos:', NULL),
(49, 'Öffnungszeiten', NULL),
(50, 'Telefon', NULL),
(51, 'Emailadresse', NULL),
(52, 'Adresse', NULL),
(53, '--', NULL),
(54, 'Route planen/berechnen', NULL),
(55, 'Gebühr', NULL),
(56, 'Organisation', NULL),
(57, '--', NULL),
(58, 'Telefon', NULL),
(59, '--', NULL),
(60, '--', NULL),
(61, '--', NULL),
(62, '--', NULL),
(63, '--', NULL),
(64, '--', NULL),
(65, '--', NULL),
(66, '--', NULL),
(67, 'Zu', NULL),
(68, '(per) Auto', NULL),
(69, 'Zu fuß', NULL),
(70, 'Fahrrad', NULL),
(71, 'Öffentliche Verkehrsmittel', NULL),
(72, 'Bus', NULL),
(73, 'U-bahn', NULL),
(74, 'Zug', NULL),
(75, 'Tram', NULL),
(76, 'Neue route', NULL),
(77, 'Drucken', NULL),
(78, 'Wegbeschreibung', NULL),
(79, 'Größere karte', NULL),
(80, 'Kleinere karte', NULL),
(81, '--', NULL),
(82, 'Andere von dieser organisation', NULL),
(83, 'Montag', NULL),
(84, 'Dienstag', NULL),
(85, 'Mittwoch', NULL),
(86, 'Donnerstag', NULL),
(87, 'Freitag', NULL),
(88, 'Samstag', NULL),
(89, 'Sonntag', NULL),
(90, '--', NULL),
(91, 'Nicht verfügbar', NULL),
(92, '--', NULL),
(93, '--', NULL),
(94, '--', NULL),
(95, '--', NULL),
(96, '--', NULL),
(97, '--', NULL),
(98, '--', NULL),
(99, '--', NULL),
(100, '--', NULL),
(101, '--', NULL),
(102, '--', NULL),
(103, '--', NULL),
(104, 'Geöffnet (Monat)', NULL),
(107, '--', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lang_english`
--

CREATE TABLE `lang_english` (
  `id` int(11) NOT NULL,
  `word` varchar(500) DEFAULT NULL,
  `owner` varchar(150) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lang_english`
--

INSERT INTO `lang_english` (`id`, `word`, `owner`, `notes`) VALUES
(0, 'Login', 'all', NULL),
(1, 'Logout', 'all', NULL),
(2, 'My Account', 'all', NULL),
(3, 'Prana-deutschland - copyright 2016 ', 'all', NULL),
(4, 'Home', 'all', NULL),
(5, 'Go to Login', 'all', NULL),
(6, 'Sign Up', 'all', NULL),
(7, 'User name* (Max. 15 characters)', 'signup', NULL),
(8, 'First name*', 'all', NULL),
(9, 'Last name*', 'all', NULL),
(10, 'Area (Berlin)', 'all', NULL),
(11, 'Password*', 'all', NULL),
(12, '* = Fields with the star must be filled out.', 'all', NULL),
(13, 'Free', 'all', NULL),
(14, 'Paid', 'all', NULL),
(15, 'Type', 'all', NULL),
(16, 'My Profile', 'all', NULL),
(17, 'Search for resources', 'all', NULL),
(18, 'Search Prana', 'all', NULL),
(19, 'Food', 'all', NULL),
(20, 'Housing', 'all', NULL),
(21, 'Medical', 'all', NULL),
(22, 'Legal', 'all', NULL),
(23, 'Study', 'all', NULL),
(24, 'Jobs', 'all', NULL),
(25, 'Grid', 'all', NULL),
(26, 'List', 'all', NULL),
(27, 'Map', 'all', NULL),
(28, 'Login or Sign Up', 'all', NULL),
(29, 'Search Postings', 'all', NULL),
(30, 'Username', 'login', NULL),
(31, 'Password', 'all', NULL),
(32, 'If you forgot either both or one of your login credentials, ', 'all', NULL),
(33, 'Click Here', 'all', NULL),
(34, 'Prana', 'all', NULL),
(35, 'My prana', 'all', NULL),
(36, 'Search Bookmarks', 'all', NULL),
(44, 'to', 'all', NULL),
(43, 'Time open', 'all', NULL),
(42, 'Area', 'all', NULL),
(37, 'Filters:', 'all', NULL),
(38, 'A-Z', 'all', NULL),
(39, 'Z-A', 'all', NULL),
(40, '< back', 'all', NULL),
(41, 'forward >', 'all', NULL),
(45, 'Day open', 'all', NULL),
(46, 'By organization', 'all', NULL),
(47, 'View', 'all', NULL),
(48, 'Info:', 'all', NULL),
(49, 'Hours open', 'all', NULL),
(50, 'Tel', 'all', NULL),
(51, 'Email', 'all', NULL),
(52, 'Address', 'all', NULL),
(53, '0 results found', 'all', NULL),
(54, 'Plan route', 'all', NULL),
(55, 'Fee', 'all', NULL),
(56, 'Organization', 'all', NULL),
(57, 'Contact person', 'all', NULL),
(58, 'Telephone', 'all', NULL),
(59, 'Fax', 'all', NULL),
(60, 'Website', 'all', NULL),
(62, 'Days open', 'all', NULL),
(63, 'Months open', 'all', NULL),
(64, 'Filters (allows/is a)', 'all', NULL),
(65, 'Days', 'all', NULL),
(66, 'Time', 'all', NULL),
(61, 'Times open', 'all', NULL),
(67, 'To', 'all', NULL),
(68, 'Car', 'all', NULL),
(69, 'Walking', 'all', NULL),
(70, 'Bike', 'all', NULL),
(71, 'Public Transport', 'all', NULL),
(72, 'Bus', 'all', NULL),
(73, 'U-bahn', 'all', NULL),
(74, 'Train', 'all', NULL),
(76, 'New route', 'all', NULL),
(75, 'Tram', 'all', NULL),
(77, 'Print', 'all', NULL),
(78, 'Directions', 'all', NULL),
(79, 'Larger map', 'all', NULL),
(80, 'Smaller map', 'all', NULL),
(81, 'Postings', 'all', NULL),
(82, 'Other by this organization', 'all', NULL),
(83, 'Monday', 'all', NULL),
(84, 'Tuesday', 'all', NULL),
(85, 'Wednesday', 'all', NULL),
(86, 'Thursday', 'all', NULL),
(87, 'Friday', 'all', NULL),
(88, 'Saturday', 'all', NULL),
(89, 'Sunday', 'all', NULL),
(90, 'closed', 'all', NULL),
(91, 'N.A.', 'all', NULL),
(92, 'January', 'all', NULL),
(93, 'February', 'all', NULL),
(94, 'March', 'all', NULL),
(95, 'April', 'all', NULL),
(96, 'May', 'all', NULL),
(97, 'June', 'all', NULL),
(98, 'July', 'all', NULL),
(99, 'August', 'all', NULL),
(100, 'September', 'all', NULL),
(101, 'October', 'all', NULL),
(102, 'November', 'all', NULL),
(103, 'December', 'all', NULL),
(104, 'Month open', 'all', NULL),
(105, 'Venue type', 'all', NULL),
(106, 'Venue allows', 'all', NULL),
(107, 'Open in Google Maps', 'all', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lang_polish`
--

CREATE TABLE `lang_polish` (
  `id` int(11) NOT NULL DEFAULT '0',
  `word` varchar(500) DEFAULT NULL,
  `owner` varchar(150) DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` int(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `sub_of` int(120) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `eml` varchar(150) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `transport_routes` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `sub_of`, `address`, `tel`, `eml`, `fax`, `transport_routes`) VALUES
(1, 'GEBEWO gGMBH', NULL, 'Geibelstr. 77/78, 12305 Berlin', '03070784490', 'Geschaeftsstelle@gebewo.de', '56456', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_venues`
--

CREATE TABLE `organizations_venues` (
  `id` int(11) NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `venue` varchar(3000) DEFAULT NULL,
  `Space` int(11) DEFAULT NULL,
  `Space_type` int(11) DEFAULT NULL,
  `pay_to_stay` varchar(25) DEFAULT 'N.A.',
  `Contact_person` varchar(35) DEFAULT NULL,
  `busroutes` varchar(15) DEFAULT NULL COMMENT 'Separated by commas',
  `stops` varchar(200) DEFAULT NULL,
  `days_open` varchar(16) DEFAULT NULL,
  `Open_month_from` varchar(20) DEFAULT NULL,
  `Open_month_to` varchar(20) DEFAULT NULL,
  `houropening` int(2) DEFAULT NULL,
  `hourclosing` int(2) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `image_path` varchar(3000) DEFAULT NULL,
  `is_` varchar(150) DEFAULT NULL COMMENT 'divided by commas',
  `allows` varchar(150) DEFAULT NULL COMMENT 'divided by commas'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations_venues`
--

INSERT INTO `organizations_venues` (`id`, `organization`, `venue`, `Space`, `Space_type`, `pay_to_stay`, `Contact_person`, `busroutes`, `stops`, `days_open`, `Open_month_from`, `Open_month_to`, `houropening`, `hourclosing`, `tel`, `fax`, `website`, `email`, `image_path`, `is_`, `allows`) VALUES
(1, 1, 'Geibelstr. 77/78, 12305 Berlin', 25, 1, 'There is no fee here', 'Mr. John Peck', 'M44,M9,101,X3', NULL, '1234567', 'January', 'December', 11, 23, '016065684584', NULL, 'www.google.com', 'test@test.com', '../Assets/Images/Web/orgs/klkl.jpg', 'Shelters,Hostels', '[Women] only'),
(2, 1, 'Arcostrasse 11, 10587 Berlin', NULL, NULL, 'N.A.', 'Christin Fritzsche', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '01758397428', '03027576937', NULL, 'notuebernachtung@gebewo.de', '', 'Shelters', ''),
(3, 1, '3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '../Assets/Images/Web/orgs/lkjlk.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_venues_categories`
--

CREATE TABLE `organizations_venues_categories` (
  `id` int(11) NOT NULL,
  `variable` varchar(150) DEFAULT NULL,
  `name` varchar(150) NOT NULL DEFAULT '',
  `db_name` text,
  `owner` varchar(150) DEFAULT NULL,
  `allowis` varchar(10) DEFAULT NULL,
  `text` varchar(150) DEFAULT NULL,
  `singular_text` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations_venues_categories`
--

INSERT INTO `organizations_venues_categories` (`id`, `variable`, `name`, `db_name`, `owner`, `allowis`, `text`, `singular_text`) VALUES
(1, 'filters_housing_shelters', 'shelter', 'shelter', 'housing', 'is', 'Shelters', 'Shelter'),
(2, 'filters_housing_hostels', 'hostels', 'hostel', 'housing', 'is', 'Hostels', 'Hostel'),
(3, 'filters_housing_govt', 'Gov_house', 'governmenthousing', 'housing', 'is', 'WBS', 'WBS'),
(4, 'filters_housing_coldshelters', 'cold_shelters', 'coldshelter', 'housing', 'is', 'Winter [shelters]', 'Winter [shelter]'),
(6, 'filters_wo', 'Women_only', 'womenonly', 'universal', 'allows', '[Women] only', '[Women] only'),
(7, 'filters_mo', 'men_only', 'menonly', 'universal', 'allows', '[Men] only', '[Men] only'),
(5, 'filters_childrenok', 'child_ok', 'children', 'universal', 'allows', 'Minors (Under 18)', 'Minors (Under 18)'),
(8, 'filters_petsok', 'pets', 'pets', 'universal', 'allows', 'Allows animals', 'Animals'),
(9, 'filters_food_soupkitchens', 'soupkitchen', 'soupkitchen', 'food', 'is', 'Soup kitchens', 'Soup kitchen'),
(10, 'filters_food_tafels', 'tafel', 'tafel', 'food', 'is', 'Grocery distributions', 'Grocery distribution'),
(11, 'filters_smoking', 'smoke', 'smoking', 'universal', 'allows', 'Allows smoking', 'Smoking'),
(12, 'filters_food_giveaway', 'free_giveaway', 'free_giveaway', 'food', 'is', 'Free giveaways', 'Free giveaway'),
(13, 'filters_food_churchgive', 'churchgive', 'churchgive', 'food', 'is', 'Church distributions', 'Church distribution'),
(14, 'filters_food_foodtour', 'foodtour', 'foodtour', 'food', 'is', 'Food tours', 'Food tour'),
(17, 'filters_medical_check', 'checkup', 'checkup', 'medical', 'is', 'General checkup', 'General checkup'),
(18, 'filters_medical_emerg', 'emergency_rooms', 'emergency_rooms', 'medical', 'is', 'Emergency rooms', 'Emergency room');

-- --------------------------------------------------------

--
-- Table structure for table `organizations_venues_months`
--

CREATE TABLE `organizations_venues_months` (
  `id` int(11) NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `organization_venue` int(11) DEFAULT NULL,
  `january` int(11) DEFAULT NULL,
  `febuary` int(11) DEFAULT NULL,
  `march` int(11) DEFAULT NULL,
  `april` int(11) DEFAULT NULL,
  `may` int(11) DEFAULT NULL,
  `june` int(11) DEFAULT NULL,
  `july` int(11) DEFAULT NULL,
  `august` int(11) DEFAULT NULL,
  `september` int(11) DEFAULT NULL,
  `october` int(11) DEFAULT NULL,
  `november` int(11) DEFAULT NULL,
  `december` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations_venues_months`
--

INSERT INTO `organizations_venues_months` (`id`, `organization`, `organization_venue`, `january`, `febuary`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`) VALUES
(1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `organizations_venues_times`
--

CREATE TABLE `organizations_venues_times` (
  `id` int(11) NOT NULL,
  `organization` int(11) DEFAULT NULL,
  `organization_venue` int(11) DEFAULT NULL,
  `monday` int(11) DEFAULT NULL,
  `monday_time_start` int(11) DEFAULT NULL,
  `monday_time_stop` int(11) DEFAULT NULL,
  `tuesday` int(11) DEFAULT NULL,
  `tuesday_time_start` int(11) DEFAULT NULL,
  `tuesday_time_stop` int(11) DEFAULT NULL,
  `wednesday` int(11) DEFAULT NULL,
  `wednesday_time_start` int(11) DEFAULT NULL,
  `wednesday_time_stop` int(11) DEFAULT NULL,
  `thursday` int(11) DEFAULT NULL,
  `thursday_time_start` int(11) DEFAULT NULL,
  `thursday_time_stop` int(11) DEFAULT NULL,
  `friday` int(11) DEFAULT NULL,
  `friday_time_start` int(11) DEFAULT NULL,
  `friday_time_stop` int(11) DEFAULT NULL,
  `saturday` int(11) DEFAULT NULL,
  `saturday_time_start` int(11) DEFAULT NULL,
  `saturday_time_stop` int(11) DEFAULT NULL,
  `sunday` int(11) DEFAULT NULL,
  `sunday_time_start` int(11) DEFAULT NULL,
  `sunday_time_stop` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organizations_venues_times`
--

INSERT INTO `organizations_venues_times` (`id`, `organization`, `organization_venue`, `monday`, `monday_time_start`, `monday_time_stop`, `tuesday`, `tuesday_time_start`, `tuesday_time_stop`, `wednesday`, `wednesday_time_start`, `wednesday_time_stop`, `thursday`, `thursday_time_start`, `thursday_time_stop`, `friday`, `friday_time_start`, `friday_time_stop`, `saturday`, `saturday_time_start`, `saturday_time_stop`, `sunday`, `sunday_time_start`, `sunday_time_stop`) VALUES
(1, 1, 1, 1, 8, 17, 1, 10, 16, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` varchar(15) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `homelessorvolunteer` varchar(20) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `pic` blob,
  `about` varchar(400) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `POC` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `name`, `homelessorvolunteer`, `area`, `pic`, `about`, `gender`, `POC`) VALUES
('hhh', 'Homero Habanero', 'Street fighter', 1, NULL, 'Who am I? What am I? What are you? why are you here? What is it? it is what it is. This is not fiction or fan fiction, this is fact its so facty it turns into a fiction of its own. 400 characters allowed only This is a description. Descriptions are nice though this one only allows 600 characters, oh bummer. Bet you what. you like this description. anyways I''m testing the 600 characters. Its not to', 1, 'ggg');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '-1',
  `user` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `post_id`, `rating`, `user`) VALUES
(1, 1, 4, 'hhh'),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` blob,
  `area` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_bookmarks`
--

CREATE TABLE `user_bookmarks` (
  `id` int(11) NOT NULL,
  `user` varchar(15) NOT NULL,
  `post_id` int(11) NOT NULL,
  `home_type` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bookmarks`
--

INSERT INTO `user_bookmarks` (`id`, `user`, `post_id`, `home_type`) VALUES
(197, 'hhh', 2, 'housing'),
(174, 'hhh', 1, 'food'),
(194, 'hhh', 1, 'housing'),
(193, 'hhh', 6, 'housing'),
(176, 'hhh', 2, 'food'),
(195, 'hhh', 7, 'housing'),
(179, 'hhh', 1, 'medical');

-- --------------------------------------------------------

--
-- Table structure for table `vehichle_routes_busses`
--

CREATE TABLE `vehichle_routes_busses` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contnt_categories`
--
ALTER TABLE `contnt_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contnt_food`
--
ALTER TABLE `contnt_food`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`link`);

--
-- Indexes for table `contnt_housing`
--
ALTER TABLE `contnt_housing`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`link`);

--
-- Indexes for table `contnt_medical`
--
ALTER TABLE `contnt_medical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`,`link`);

--
-- Indexes for table `langs`
--
ALTER TABLE `langs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_deutsch`
--
ALTER TABLE `lang_deutsch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_english`
--
ALTER TABLE `lang_english`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lang_polish`
--
ALTER TABLE `lang_polish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations_venues`
--
ALTER TABLE `organizations_venues`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tel` (`tel`);

--
-- Indexes for table `organizations_venues_categories`
--
ALTER TABLE `organizations_venues_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations_venues_months`
--
ALTER TABLE `organizations_venues_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations_venues_times`
--
ALTER TABLE `organizations_venues_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contnt_categories`
--
ALTER TABLE `contnt_categories`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contnt_food`
--
ALTER TABLE `contnt_food`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contnt_housing`
--
ALTER TABLE `contnt_housing`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `contnt_medical`
--
ALTER TABLE `contnt_medical`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `langs`
--
ALTER TABLE `langs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organizations_venues`
--
ALTER TABLE `organizations_venues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_bookmarks`
--
ALTER TABLE `user_bookmarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
