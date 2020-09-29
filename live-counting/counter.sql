-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 03:05 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `counter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_hasil`
--

CREATE TABLE `tabel_hasil` (
  `id` int(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Nama` varchar(20) NOT NULL,
  `hitung` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_hasil`
--

INSERT INTO `tabel_hasil` (`id`, `waktu`, `Nama`, `hitung`) VALUES
(49, '2020-09-26 12:59:19', 'Banget', 16),
(56, '2020-09-26 09:49:48', 'Ayam', 10),
(57, '2020-09-26 10:10:55', 'Rasanya', 25),
(58, '2020-09-26 09:50:37', 'Mang Oleh', 17),
(59, '2020-09-26 10:15:15', 'Odading', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tabel_set`
--

CREATE TABLE `tabel_set` (
  `id` int(20) NOT NULL,
  `hitung` int(20) NOT NULL,
  `batas` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_set`
--

INSERT INTO `tabel_set` (`id`, `hitung`, `batas`) VALUES
(1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_hasil`
--
ALTER TABLE `tabel_hasil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabel_set`
--
ALTER TABLE `tabel_set`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_hasil`
--
ALTER TABLE `tabel_hasil`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tabel_set`
--
ALTER TABLE `tabel_set`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
