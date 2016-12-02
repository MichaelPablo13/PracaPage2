-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2016 at 07:01 PM
-- Server version: 5.6.22-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plaza_for_hortolandia`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idcontact` int(11) NOT NULL,
  `sender_name` varchar(45) NOT NULL,
  `sender_email` varchar(45) NOT NULL,
  `message` varchar(50) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `idmarkers` int(100) NOT NULL,
  `plaza_name` varchar(100) NOT NULL,
  `plaza_address` varchar(100) NOT NULL,
  `latitude` varchar(200) NOT NULL,
  `longitude` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`idmarkers`, `plaza_name`, `plaza_address`, `latitude`, `longitude`) VALUES
(5, 'Parque Ambiental Remanso das Aguas', 'Estrada Municipal Sabina Baptista de Camargo', '-22.872102519264615', '-47.196664810180664'),
(6, 'Parque Socio Ambiental Chico Mendes', 'Rua Joao Mendes', '-22.867060933531505', '-47.220836877822876'),
(7, 'Parque Socioambiental Irma Dorothy Stang', 'Rua Armelinda Espurio da Silva', '-22.897090204391855', '-47.169418931007385'),
(8, 'Parque Lagoa do Santa Clara', 'Rua Edivaldo Diogo da Costa', '-22.889420423262568', '-47.199894189834595'),
(9, 'Parque Socioambiental Renato Dobelin', 'Rua Argolino de Moraes ', '-22.861455656818823', '-47.21821367740631');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idcontact`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`idmarkers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idcontact` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `idmarkers` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
