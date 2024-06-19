-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2024 at 08:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `characterdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `characterinfo`
--

CREATE TABLE `characterinfo` (
  `charID` int(11) NOT NULL,
  `charName` varchar(30) NOT NULL,
  `charDesc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characterinfo`
--

INSERT INTO `characterinfo` (`charID`, `charName`, `charDesc`) VALUES
(1, 'Xiao', 'Lets go'),
(2, 'Ganyu', 'boba'),
(4, 'Zhongli', 'big gojg'),
(5, 'Char 1', 'test bio');

--
-- Triggers `characterinfo`
--
DELIMITER $$
CREATE TRIGGER `after_insert_character` AFTER INSERT ON `characterinfo` FOR EACH ROW BEGIN
    INSERT INTO characterStats (charID) VALUES (NEW.charID);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `characterstats`
--

CREATE TABLE `characterstats` (
  `charID` int(11) NOT NULL,
  `weaponName` varchar(30) NOT NULL DEFAULT 'Dull Sword',
  `equipmentName` varchar(40) NOT NULL DEFAULT 'Empty',
  `HP` int(11) NOT NULL DEFAULT 1000,
  `ATK` int(11) NOT NULL DEFAULT 500,
  `DEF` int(11) NOT NULL DEFAULT 450,
  `SPEED` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characterstats`
--

INSERT INTO `characterstats` (`charID`, `weaponName`, `equipmentName`, `HP`, `ATK`, `DEF`, `SPEED`) VALUES
(1, 'Dull Sword', 'Empty', 1000, 500, 450, 100),
(4, 'Dull Sword', 'Empty', 1000, 500, 450, 100),
(2, 'Dull Sword', 'Empty', 1000, 500, 450, 100),
(5, 'Dull Sword', 'Empty', 1000, 500, 450, 100);

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE `equipment` (
  `equipmentID` int(11) NOT NULL,
  `equipmentName` varchar(40) NOT NULL DEFAULT 'Empty',
  `charID` int(11) NOT NULL,
  `HP` int(11) NOT NULL DEFAULT 300,
  `ATK` int(11) NOT NULL DEFAULT 200,
  `DEF` int(11) NOT NULL DEFAULT 50,
  `SPEED` int(11) NOT NULL DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`equipmentID`, `equipmentName`, `charID`, `HP`, `ATK`, `DEF`, `SPEED`) VALUES
(1, 'Empty', 1, 300, 200, 50, 6);

-- --------------------------------------------------------

--
-- Table structure for table `weapon`
--

CREATE TABLE `weapon` (
  `weaponID` int(11) NOT NULL,
  `weaponName` varchar(30) NOT NULL DEFAULT 'Dull Sword',
  `charID` int(11) NOT NULL,
  `HP` int(11) NOT NULL DEFAULT 2000,
  `ATK` int(11) NOT NULL DEFAULT 670,
  `DEF` int(11) NOT NULL DEFAULT 450,
  `SPEED` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `weapon`
--

INSERT INTO `weapon` (`weaponID`, `weaponName`, `charID`, `HP`, `ATK`, `DEF`, `SPEED`) VALUES
(1, 'Dull Sword', 1, 2000, 670, 450, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characterinfo`
--
ALTER TABLE `characterinfo`
  ADD PRIMARY KEY (`charID`);

--
-- Indexes for table `characterstats`
--
ALTER TABLE `characterstats`
  ADD KEY `charName` (`charID`),
  ADD KEY `weaponName` (`weaponName`),
  ADD KEY `equipmentName` (`equipmentName`);

--
-- Indexes for table `equipment`
--
ALTER TABLE `equipment`
  ADD PRIMARY KEY (`equipmentID`),
  ADD UNIQUE KEY `equipmentName` (`equipmentName`),
  ADD KEY `charID` (`charID`);

--
-- Indexes for table `weapon`
--
ALTER TABLE `weapon`
  ADD PRIMARY KEY (`weaponID`),
  ADD UNIQUE KEY `weaponName` (`weaponName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characterinfo`
--
ALTER TABLE `characterinfo`
  MODIFY `charID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `equipment`
--
ALTER TABLE `equipment`
  MODIFY `equipmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
