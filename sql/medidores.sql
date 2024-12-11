-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2024 at 07:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asadas`
--

-- --------------------------------------------------------

--
-- Table structure for table `medidores`
--

CREATE TABLE `medidores` (
  `Id` int(11) NOT NULL,
  `idMedidor` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `serie` varchar(100) NOT NULL,
  `cedUsuario` varchar(100) NOT NULL,
  `fechaIngreso` date NOT NULL,
  `lecturaActual` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medidores`
--

INSERT INTO `medidores` (`Id`, `idMedidor`, `ubicacion`, `serie`, `cedUsuario`, `fechaIngreso`, `lecturaActual`) VALUES
(7, '34', '4444', '33333', '12233', '2024-12-17', 0),
(8, 'xx', 'zzz', 'zzz', 'zzz', '2024-12-11', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medidores`
--
ALTER TABLE `medidores`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medidores`
--
ALTER TABLE `medidores`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
