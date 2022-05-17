-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: May 17, 2022 at 09:54 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18642510_serviciosocialapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`Id`, `Nombre`, `Descripcion`, `Lugar`, `Fecha`, `Foto`) VALUES
(18, 'prueba', ',dlsdlkfldkf', 'san salvaor', '2022-05-07', '1652816795_LOGO-SOYA.png');

-- --------------------------------------------------------

--
-- Table structure for table `emprendimientos`
--

CREATE TABLE `emprendimientos` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Descripcion` varchar(3000) NOT NULL,
  `Lugar` varchar(100) NOT NULL,
  `Fecha` varchar(200) NOT NULL,
  `Foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `emprendimientos`
--

INSERT INTO `emprendimientos` (`id`, `Nombre`, `Descripcion`, `Lugar`, `Fecha`, `Foto`) VALUES
(5, 'prueba', ',sx,msdf', 'san salvaor', '2022-05-04', '1652816127_farmacia.png'),
(6, 'testing', '123', 'Soyapango', '2022-05-07', '1652816735_Captura1.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Carlos', 'carlosjosebonilla57@gmail.com', '$2y$10$XA3K.PpfsN6/bzisSvGDcu956Ryfm7R6/Wz5sCb6uCD/sViQjH7iS', 0, 'verified'),
(2, 'Ernest', 'ernesto21rosales@gmail.com', '$2y$10$UyMjnWvwTGxcOutsOVYJy.Chp2T8cvvUCl1Jqg66z5Wo8ugtnF2hG', 0, 'verified'),
(3, 'Kevin', 'km572071@gmail.com', '$2y$10$AR2osz/PETjMGpCsPq8o8OGWiEdoc06Cb8UiAVxIszsCrnX.698FS', 0, 'verified'),
(4, 'Ado', 'ceronk003@gmail.com', '$2y$10$7zJhHUfyj.y0/mbEj6THfueKdTS7tag7ms/XniLgikALDCYMuartq', 0, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `emprendimientos`
--
ALTER TABLE `emprendimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `emprendimientos`
--
ALTER TABLE `emprendimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
