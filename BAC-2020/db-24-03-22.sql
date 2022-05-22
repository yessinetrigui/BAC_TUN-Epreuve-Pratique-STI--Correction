-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 06:54 PM
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
-- Database: `db-24-03-22`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `Tel` varchar(8) NOT NULL,
  `Nom` varchar(25) DEFAULT NULL,
  `Prenom` varchar(25) DEFAULT NULL,
  `Adress` varchar(100) DEFAULT NULL,
  `MotPass` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Tel`, `Nom`, `Prenom`, `Adress`, `MotPass`) VALUES
('53344441', 'Trigui', 'Yessine', '81, Rue Rabat', 'doremi'),
('53344442', 'Trigui', 'Yessine', '81, Rue Rabat', 'doremi');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `IdPizza` varchar(3) NOT NULL,
  `Tel` varchar(8) NOT NULL,
  `DateCmd` datetime NOT NULL,
  `QteCmd` decimal(6,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`IdPizza`, `Tel`, `DateCmd`, `QteCmd`) VALUES
('Fmr', '53000000', '2022-03-24 18:53:50', '5.000');

-- --------------------------------------------------------

--
-- Table structure for table `pizza`
--

CREATE TABLE `pizza` (
  `IdPizza` varchar(3) NOT NULL,
  `NomPizza` varchar(30) DEFAULT NULL,
  `Details` varchar(200) DEFAULT NULL,
  `Prix` decimal(6,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pizza`
--

INSERT INTO `pizza` (`IdPizza`, `NomPizza`, `Details`, `Prix`) VALUES
('Fmr', 'Fruit de mer', 'Tomate, Mozzarella, Fruit De mer', '18.500'),
('Mgh', 'Margherita', 'Tomate, Mozzarella, Basilic', '8.500'),
('Nap', 'Napolitaine', 'Tomate, Mozzarella, Thon, Anchois', '12.000'),
('Nep', 'Neptune', 'Tomate, Mozzarella, Thon', '10.500'),
('Roy', 'Royale', 'Tomate, Mozzarella, Jambon, Champignon', '14.500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Tel`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdPizza`,`Tel`,`DateCmd`),
  ADD KEY `commande_ibfk_1` (`Tel`);

--
-- Indexes for table `pizza`
--
ALTER TABLE `pizza`
  ADD PRIMARY KEY (`IdPizza`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Tel`) REFERENCES `client` (`Tel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`IdPizza`) REFERENCES `pizza` (`IdPizza`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
