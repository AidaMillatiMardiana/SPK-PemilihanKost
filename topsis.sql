-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 11:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `topsis21`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL,
  `namalengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `level`, `namalengkap`) VALUES
(1, 'admin', 'admin', 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` varchar(5) NOT NULL,
  `nm_alternatif` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `nm_alternatif`) VALUES
('A1', 'Ahmad'),
('A10', 'Rossa'),
('A2', 'Rio'),
('A3', 'Elsa'),
('A4', 'Fahri'),
('A5', 'Adam'),
('A6', 'Sinta'),
('A7', 'Setyawan'),
('A8', 'Adrian'),
('A9', 'Iman');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(5) NOT NULL,
  `nama_kriteria` varchar(45) NOT NULL,
  `bobot` double NOT NULL,
  `poin1` double NOT NULL,
  `poin2` double NOT NULL,
  `poin3` double NOT NULL,
  `poin4` double NOT NULL,
  `poin5` double NOT NULL,
  `poin6` double NOT NULL,
  `poin7` double NOT NULL,
  `poin8` double NOT NULL,
  `poin9` double NOT NULL,
  `poin10` double NOT NULL,
  `sifat` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `poin1`, `poin2`, `poin3`, `poin4`, `poin5`, `poin6`, `poin7`, `poin8`, `poin9`, `poin10`, `sifat`) VALUES
('C1', 'Tanggung Jawab', 30, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 'benefit'),
('C2', 'Sikap', 30, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C3', 'Keterampilan', 25, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit'),
('C4', 'Absensi', 15, 1, 2, 3, 4, 5, 0, 0, 0, 0, 0, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_matrik`
--

CREATE TABLE `nilai_matrik` (
  `id_matrik` int(7) NOT NULL,
  `id_alternatif` varchar(7) NOT NULL,
  `id_kriteria` varchar(7) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_matrik`
--

INSERT INTO `nilai_matrik` (`id_matrik`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(13, 'A3', 'C1', 3),
(14, 'A3', 'C2', 4),
(15, 'A3', 'C3', 5),
(16, 'A3', 'C4', 1),
(17, 'A4', 'C1', 2),
(18, 'A4', 'C2', 1),
(19, 'A4', 'C3', 2),
(20, 'A4', 'C4', 4),
(21, 'A5', 'C1', 3),
(22, 'A5', 'C2', 5),
(23, 'A5', 'C3', 2),
(24, 'A5', 'C4', 4),
(25, 'A6', 'C1', 4),
(26, 'A6', 'C2', 2),
(27, 'A6', 'C3', 3),
(28, 'A6', 'C4', 5),
(29, 'A7', 'C1', 1),
(30, 'A7', 'C2', 3),
(31, 'A7', 'C3', 5),
(32, 'A7', 'C4', 2),
(33, 'A8', 'C1', 3),
(34, 'A8', 'C2', 4),
(35, 'A8', 'C3', 1),
(36, 'A8', 'C4', 2),
(37, 'A9', 'C1', 3),
(38, 'A9', 'C2', 3),
(39, 'A9', 'C3', 2),
(40, 'A9', 'C4', 1),
(65, 'A2', 'C1', 4),
(66, 'A2', 'C2', 4),
(67, 'A2', 'C3', 0),
(68, 'A2', 'C4', 0),
(121, 'A1', 'C1', 3),
(122, 'A1', 'C2', 2),
(123, 'A1', 'C3', 3),
(124, 'A1', 'C4', 5),
(129, 'A10', 'C1', 1),
(130, 'A10', 'C2', 0),
(131, 'A10', 'C3', 0),
(132, 'A10', 'C4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_preferensi`
--

CREATE TABLE `nilai_preferensi` (
  `nm_alternatif` varchar(35) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  ADD PRIMARY KEY (`id_matrik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_matrik`
--
ALTER TABLE `nilai_matrik`
  MODIFY `id_matrik` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;
