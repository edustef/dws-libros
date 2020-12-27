-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 27, 2020 at 01:32 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1-log
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `libros`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cliente`
--

CREATE TABLE `Cliente` (
  `dni` char(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `poblacion` varchar(60) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Cliente`
--

INSERT INTO `Cliente` (`dni`, `nombre`, `apellidos`, `edad`, `direccion`, `poblacion`, `telefono`, `email`) VALUES
('Y12345671R', 'Eduardddd', 'Stefanooo', 30, 'qwe', 'asd', '123456789', 'ted@gmail.com'),
('Y12345678M', 'Eduard', 'Stefan', 23, 'calle somewhere', 'Palomares', '123456789', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Libro`
--

CREATE TABLE `Libro` (
  `isbn` char(13) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `descripcion` text,
  `autor` varchar(50) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `imagenPortada` varchar(255) NOT NULL,
  `numEjemplaresTotales` int(11) NOT NULL,
  `numEjemplaresDisponibles` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Libro`
--

INSERT INTO `Libro` (`isbn`, `titulo`, `subtitulo`, `descripcion`, `autor`, `editorial`, `categoria`, `imagenPortada`, `numEjemplaresTotales`, `numEjemplaresDisponibles`) VALUES
('1234567890123', 'Javascript Guide', 'A guide about javascript.', 'A very long guide about javascript.', 'Eduard', 'Unknown', 'Programming', 'https://images.unsplash.com/photo-1593642633279-1796119d5482?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80', 20, 16),
('1234567890125', 'Car tunning', 'A tutorial on how to tune your car', 'A very long tutorial on how to tune your car.', 'Stefan', 'Believe', 'Cars', 'https://images.unsplash.com/photo-1608686026384-087d06a1c70b?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80', 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `Prestamo`
--

CREATE TABLE `Prestamo` (
  `id` int(11) NOT NULL,
  `isbn` char(13) NOT NULL,
  `dni` char(10) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Prestamo`
--

INSERT INTO `Prestamo` (`id`, `isbn`, `dni`, `fechaInicio`, `fechaFin`, `estado`) VALUES
(3, '1234567890123', 'Y12345678M', '2018-03-01', '2020-12-20', '0'),
(4, '1234567890125', 'Y12345671R', '2017-03-02', '2017-05-03', '3'),
(5, '1234567890123', 'Y12345671R', '2020-12-08', '2020-12-23', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cliente`
--
ALTER TABLE `Cliente`
  ADD PRIMARY KEY (`dni`);
ALTER TABLE `Cliente` ADD FULLTEXT KEY `query` (`nombre`,`apellidos`,`poblacion`,`telefono`,`email`);

--
-- Indexes for table `Libro`
--
ALTER TABLE `Libro`
  ADD PRIMARY KEY (`isbn`);
ALTER TABLE `Libro` ADD FULLTEXT KEY `query` (`titulo`,`subtitulo`,`autor`,`editorial`,`categoria`);

--
-- Indexes for table `Prestamo`
--
ALTER TABLE `Prestamo`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `Prestamo` ADD FULLTEXT KEY `estado` (`estado`,`dni`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Prestamo`
--
ALTER TABLE `Prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
