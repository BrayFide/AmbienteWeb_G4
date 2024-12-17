-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2024 at 09:17 AM
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
-- Database: `asada`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturas`
--

CREATE TABLE `lecturas` (
  `id` int(11) NOT NULL,
  `numMedidor` varchar(50) NOT NULL,
  `ultimaLectura` decimal(10,2) NOT NULL,
  `nuevaLectura` decimal(10,2) NOT NULL,
  `consumo` decimal(10,2) GENERATED ALWAYS AS (`nuevaLectura` - `ultimaLectura`) STORED,
  `monto` decimal(10,2) GENERATED ALWAYS AS (case when `consumo` >= 0 and `consumo` <= 15 then `consumo` * 409 when `consumo` > 15 and `consumo` <= 25 then `consumo` * 822 when `consumo` > 25 then `consumo` * 902 else 0 end) STORED,
  `estado` enum('Pendiente','Pagado') NOT NULL DEFAULT 'Pendiente',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturas`
--

INSERT INTO `lecturas` (`id`, `numMedidor`, `ultimaLectura`, `nuevaLectura`, `estado`, `fechaRegistro`) VALUES
(1, 'M45855', 0.00, 7.00, 'Pendiente', '2024-12-15 05:23:30'),
(2, 'M45855', 0.00, 5.00, 'Pendiente', '2024-12-15 05:25:43'),
(3, 'M0001', 0.00, 85.00, 'Pendiente', '2024-12-15 05:37:30'),
(4, 'M0001', 85.00, 89.00, 'Pagado', '2024-12-15 05:39:26'),
(5, 'M45855', 5.00, 10.00, 'Pendiente', '2024-12-15 05:48:53'),
(6, 'M0001', 89.00, 97.00, 'Pagado', '2024-12-15 07:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `medidores`
--

CREATE TABLE `medidores` (
  `id` int(11) NOT NULL,
  `numMedidor` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `ultimaLectura` decimal(10,2) NOT NULL,
  `fechaUltimaLectura` date NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `fechaRegistro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medidores`
--

INSERT INTO `medidores` (`id`, `numMedidor`, `direccion`, `ultimaLectura`, `fechaUltimaLectura`, `estado`, `fechaRegistro`) VALUES
(1, 'M12777', 'Calle Principal #123', 150.25, '2024-12-10', 'activo', '2024-12-12 05:13:33'),
(2, 'M67890', 'Avenida Central #456', 200.50, '2024-12-09', 'activo', '2024-12-12 05:13:33'),
(3, 'M54321', 'Barrio El Llano #789', 75.75, '2024-12-08', 'inactivo', '2024-12-12 05:13:33'),
(4, 'M6852', '1232 Maria st', 0.00, '0000-00-00', 'activo', '2024-12-13 04:22:17'),
(6, 'M45855', '1232 Maria st', 10.00, '0000-00-00', 'activo', '2024-12-13 04:23:32'),
(7, 'M0001', 'Avenida 23', 97.00, '0000-00-00', 'activo', '2024-12-15 05:27:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `rol`, `created_at`) VALUES
(5, 'bray', '$2y$10$veynPWChv/BlPRlqjhoR/uELiD2Jlj/o5.8CLhXW86s5wmd1LXNKS', 'admin', '2024-12-11 04:02:08'),
(6, 'Maria', '$2y$10$9Tzz5RM7ZB0KoBtyh4k4W.vS.kyhuWjZNz7Q5TN41fXF/zAHIAmfa', 'user', '2024-12-15 06:21:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturas`
--
ALTER TABLE `lecturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numMedidor` (`numMedidor`);

--
-- Indexes for table `medidores`
--
ALTER TABLE `medidores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numMedidor` (`numMedidor`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturas`
--
ALTER TABLE `lecturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medidores`
--
ALTER TABLE `medidores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lecturas`
--
ALTER TABLE `lecturas`
  ADD CONSTRAINT `lecturas_ibfk_1` FOREIGN KEY (`numMedidor`) REFERENCES `medidores` (`numMedidor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
