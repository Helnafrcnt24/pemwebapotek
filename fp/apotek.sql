-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 04:08 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
  `BENTUK` varchar(30) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL,
  `JUMLAH` varchar(30) NOT NULL,
  `ID_JENIS` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_JENIS`, `NAMA_BARANG`, `BENTUK`, `KETERANGAN`, `JUMLAH`, `ID_JENIS`) VALUES
(1, 'Obat Batuk', 'Konidin', 'Tablet', '-', '5', 1),
(2, 'Obat Panas', 'Paracetamol', 'Tablet', '-', '10', 2),
(3, 'Vitamin', 'Imboost', 'Tablet', '-', '20', 3);

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

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`ID_DETAIL_TRANSAKSI`, `ID_TRANSAKSI`, `ID_BARANG`, `JUMLAH_DETAIL`) VALUES
(2, 2, 2, '10'),
(3, 1, 3, '10');

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
(1, 'Obat Batuk', '-'),
(2, 'Obat Panas', '-'),
(3, 'Vitamin', '-');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_PETUGAS` int(5) NOT NULL,
  `USERNAME` varchar(30) NOT NULL,
  `PASSWORD` varchar(30) NOT NULL,
  `NAMA_PETUGAS` varchar(30) NOT NULL,
  `ID_LEVEL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID_PETUGAS`, `USERNAME`, `PASSWORD`, `NAMA_PETUGAS`, `ID_LEVEL`) VALUES
(1, 'admin', 'admin', 'admin', 1);

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
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_TRANSAKSI`, `TANGGAL_TRANSAKSI`, `STATUS_TRANSAKSI`, `NAMA`, `JUMLAH`, `NAMA_PETUGAS`) VALUES
(1, '2021-01-05', 'Keluar', 'Vitamin Imboost', '10', 'Helna'),
(2, '2021-01-01', 'Keluar', 'Obat Panas Paracetamol', '3', 'Taufiq');

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
  ADD PRIMARY KEY (`ID_PETUGAS`),
  ADD KEY `ID_LEVEL` (`ID_LEVEL`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
