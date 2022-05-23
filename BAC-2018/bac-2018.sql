-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 02:12 AM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bac-2018`
--

-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `Dateeval` date NOT NULL,
  `idHotel` int(11) NOT NULL,
  `noteacceuil` int(11) NOT NULL,
  `noterest` int(11) NOT NULL,
  `noteExtra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`Dateeval`, `idHotel`, `noteacceuil`, `noterest`, `noteExtra`) VALUES
('2022-05-23', 10, 2, 2, 7),
('2022-05-23', 30, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `idhotel` int(11) NOT NULL,
  `nomhotel` varchar(50) NOT NULL,
  `telhotel` varchar(8) NOT NULL,
  `vilehotel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`idhotel`, `nomhotel`, `telhotel`, `vilehotel`) VALUES
(10, '5 Star', '11111111', 'ad'),
(20, 'Globe', '11111111', 'ad'),
(30, 'The Sun', '11111111', 'ad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`Dateeval`,`idHotel`),
  ADD KEY `fk1` (`idHotel`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`idhotel`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idHotel`) REFERENCES `hotel` (`idhotel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
