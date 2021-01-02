-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 03:46 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_JENIS` varchar(30) NOT NULL,
  `NAMA_BARANG` varchar(30) NOT NULL,
  `KONDISI` varchar(30) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL,
  `JUMLAH` varchar(30) NOT NULL,
  `ID_JENIS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_JENIS`, `NAMA_BARANG`, `KONDISI`, `KETERANGAN`, `JUMLAH`, `ID_JENIS`) VALUES
(1, 'OBAT BATUK', 'KONIDIN', 'BAIK', '-', '30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `ID_DETAIL_TRANSAKSI` int(5) NOT NULL,
  `ID_TRANSAKSI` int(5) NOT NULL,
  `ID_BARANG` int(5) NOT NULL,
  `JUMLAH_DETAIL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `ID_JENIS` int(5) NOT NULL,
  `NAMA_JENIS` varchar(30) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`ID_JENIS`, `NAMA_JENIS`, `KETERANGAN`) VALUES
(1, 'OBAT BATUK', '-');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` int(5) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAMA_PETUGAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA_PETUGAS`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_TRANSAKSI` int(11) NOT NULL,
  `TANGGAL_TRANSAKSI` date NOT NULL,
  `STATUS_TRANSAKSI` varchar(30) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `JUMLAH` varchar(30) NOT NULL,
  `NAMA_PETUGAS` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD KEY `FK_MENENTUKAN` (`ID_JENIS`) USING BTREE;

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`ID_DETAIL_TRANSAKSI`),
  ADD KEY `FK_MEMERIKSA` (`ID_TRANSAKSI`),
  ADD KEY `FK_MENDETAIL` (`ID_BARANG`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`ID_JENIS`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_PETUGAS`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
