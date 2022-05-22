-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 10:42 PM
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
-- Database: `bd_bac2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesure`
--

CREATE TABLE `mesure` (
  `IdStation` int(5) NOT NULL,
  `Anne` int(4) NOT NULL,
  `Saison` varchar(9) NOT NULL,
  `Temperature` decimal(5,2) DEFAULT NULL,
  `Pluie` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mesure`
--

INSERT INTO `mesure` (`IdStation`, `Anne`, `Saison`, `Temperature`, `Pluie`) VALUES
(60715, 2018, 'Ete', '30.60', 24),
(60715, 2018, 'Hiver', '13.50', 150),
(60715, 2019, 'Printemps', '25.60', 80),
(60731, 2018, 'Ete', '33.60', 10),
(60731, 2018, 'Hiver', '17.60', 100),
(60731, 2019, 'Autonome', '30.00', 11),
(60780, 2019, 'Ete', '42.30', 0),
(60780, 2019, 'Hiver', '16.60', 10);

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE `station` (
  `IdStation` int(5) NOT NULL,
  `Nom` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`IdStation`, `Nom`, `ville`) VALUES
(60715, 'Carthage', 'Tunis'),
(60731, 'Enfidha-Aéroport', 'Sousse'),
(60780, 'El-Borma', 'Tataouine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mesure`
--
ALTER TABLE `mesure`
  ADD PRIMARY KEY (`IdStation`,`Anne`,`Saison`);

--
-- Indexes for table `station`
--
ALTER TABLE `station`
  ADD PRIMARY KEY (`IdStation`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mesure`
--
ALTER TABLE `mesure`
  ADD CONSTRAINT `t1` FOREIGN KEY (`IdStation`) REFERENCES `station` (`IdStation`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
