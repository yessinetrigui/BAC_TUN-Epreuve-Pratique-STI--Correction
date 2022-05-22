-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 07:32 PM
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
-- Database: `bac-2016`
--

-- --------------------------------------------------------

--
-- Table structure for table `piece`
--

CREATE TABLE `piece` (
  `idpiece` int(11) NOT NULL,
  `titre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piece`
--

INSERT INTO `piece` (`idpiece`, `titre`) VALUES
(1, 'Le trésor'),
(2, 'Le peche de succes'),
(3, 'Le gardien'),
(4, 'les soldats de la lune'),
(5, 'Leternel retour');

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

CREATE TABLE `salle` (
  `idsalle` varchar(2) NOT NULL,
  `libelle` varchar(30) NOT NULL,
  `adress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salle`
--

INSERT INTO `salle` (`idsalle`, `libelle`, `adress`) VALUES
('EA', 'espace artisto', 'ADR'),
('EN', 'letoile du nord', 'ADR'),
('QA', 'Quatrieme art', 'ADR'),
('TM', 'Théatre municipal', 'ADR');

-- --------------------------------------------------------

--
-- Table structure for table `spectacle`
--

CREATE TABLE `spectacle` (
  `idpiece` int(11) NOT NULL,
  `datespectacle` date NOT NULL,
  `idsalle` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spectacle`
--

INSERT INTO `spectacle` (`idpiece`, `datespectacle`, `idsalle`) VALUES
(3, '2022-02-28', 'EN'),
(3, '2022-03-29', 'EN'),
(1, '2022-02-28', 'TM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`idpiece`);

--
-- Indexes for table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`idsalle`);

--
-- Indexes for table `spectacle`
--
ALTER TABLE `spectacle`
  ADD PRIMARY KEY (`idpiece`,`datespectacle`),
  ADD KEY `fk2` (`idsalle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `piece`
--
ALTER TABLE `piece`
  MODIFY `idpiece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `spectacle`
--
ALTER TABLE `spectacle`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`idpiece`) REFERENCES `piece` (`idpiece`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idsalle`) REFERENCES `salle` (`idsalle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
