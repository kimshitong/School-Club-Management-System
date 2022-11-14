-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 11:55 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbase_kelab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `katalaluan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nama`, `email`, `katalaluan`) VALUES
('1', '1', 'admin@mail.com', '1'),
('1234', 'jacky', 'jacky@gmail.com', '1234'),
('165', 'adminkim', 'adminkim@gmail.com', '165');

-- --------------------------------------------------------

--
-- Table structure for table `ahli`
--

CREATE TABLE `ahli` (
  `kodahli` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kelas` varchar(2) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelefon` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ajk`
--

CREATE TABLE `ajk` (
  `kodahli` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `pangkat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bayaran`
--

CREATE TABLE `bayaran` (
  `kodbayaran` int(10) NOT NULL,
  `kodahli` int(10) NOT NULL,
  `tarikhbayar` varchar(30) NOT NULL,
  `catatan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `ahli`
--
ALTER TABLE `ahli`
  ADD PRIMARY KEY (`kodahli`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `notelefon` (`notelefon`);

--
-- Indexes for table `ajk`
--
ALTER TABLE `ajk`
  ADD PRIMARY KEY (`kodahli`);

--
-- Indexes for table `bayaran`
--
ALTER TABLE `bayaran`
  ADD PRIMARY KEY (`kodbayaran`),
  ADD KEY `kodahli` (`kodahli`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahli`
--
ALTER TABLE `ahli`
  MODIFY `kodahli` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bayaran`
--
ALTER TABLE `bayaran`
  MODIFY `kodbayaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ajk`
--
ALTER TABLE `ajk`
  ADD CONSTRAINT `ajk_ibfk_1` FOREIGN KEY (`kodahli`) REFERENCES `ahli` (`kodahli`);

--
-- Constraints for table `bayaran`
--
ALTER TABLE `bayaran`
  ADD CONSTRAINT `bayaran_ibfk_1` FOREIGN KEY (`kodahli`) REFERENCES `ahli` (`kodahli`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
