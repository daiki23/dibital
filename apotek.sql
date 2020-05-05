-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 02:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` int(11) NOT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `USERNAME`, `PASSWORD`) VALUES
(1, 'dika', 'kazuki21');

-- --------------------------------------------------------

--
-- Table structure for table `detil_transaksi`
--

CREATE TABLE `detil_transaksi` (
  `ID_DETIL_TRANS` int(11) NOT NULL,
  `KD_OBAT` int(11) DEFAULT NULL,
  `NAMA_OBAT` varchar(100) DEFAULT NULL,
  `KD_TRANSAKSI` int(11) DEFAULT NULL,
  `JUMLAH` int(11) DEFAULT NULL,
  `SUB_TOTAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detil_transaksi`
--

INSERT INTO `detil_transaksi` (`ID_DETIL_TRANS`, `KD_OBAT`, `NAMA_OBAT`, `KD_TRANSAKSI`, `JUMLAH`, `SUB_TOTAL`) VALUES
(1, 2020, 'Anti Corona', NULL, 12, 10000),
(2, 2020, 'Anti Corona', 40023, 52, 10000),
(3, 2020, 'Anti Corona', 90231, 34, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `KD_OBAT` int(11) NOT NULL,
  `NAMA_OBAT` varchar(100) NOT NULL,
  `KD_SUPPLIER` int(11) DEFAULT NULL,
  `PRODUSEN` varchar(100) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `JUMLAH_STOK` int(11) DEFAULT NULL,
  `FOTO` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`KD_OBAT`, `NAMA_OBAT`, `KD_SUPPLIER`, `PRODUSEN`, `HARGA`, `JUMLAH_STOK`, `FOTO`) VALUES
(2020, 'Anti Corona', 1021, 'pt. sehat barokah', 10000, 1, '30445686-capsule-pill-medicine-vector-icon1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `KD_SUPPLIER` int(11) NOT NULL,
  `NAMA_SUPPLIER` varchar(50) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `KOTA` varchar(100) DEFAULT NULL,
  `TELP` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`KD_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT`, `KOTA`, `TELP`) VALUES
(1016, 'Rahadyan Adji', 'jl. maju mundur cantik23', 'malang', '4231'),
(1021, 'M. Rahadyan Dika Adji', 'jl. lenggong23', 'malang', '089614415514');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `KD_TRANSAKSI` int(11) NOT NULL,
  `ID_ADMIN` int(11) DEFAULT NULL,
  `NAMA_PEMBELI` varchar(30) DEFAULT NULL,
  `TOTAL` int(11) DEFAULT NULL,
  `TGL_BELI` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`KD_TRANSAKSI`, `ID_ADMIN`, `NAMA_PEMBELI`, `TOTAL`, `TGL_BELI`) VALUES
(40023, NULL, 'bpk. adjie', 520000, '2020-05-20'),
(90231, NULL, 'bpk dika', 340000, '2020-05-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD PRIMARY KEY (`ID_DETIL_TRANS`),
  ADD KEY `FK_BERISI` (`KD_OBAT`,`NAMA_OBAT`),
  ADD KEY `FK_MEMILIKI` (`KD_TRANSAKSI`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`KD_OBAT`,`NAMA_OBAT`),
  ADD KEY `FK_MENYUPLAI` (`KD_SUPPLIER`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`KD_SUPPLIER`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`KD_TRANSAKSI`),
  ADD KEY `FK_MELAKUKAN` (`ID_ADMIN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  MODIFY `ID_DETIL_TRANS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_transaksi`
--
ALTER TABLE `detil_transaksi`
  ADD CONSTRAINT `FK_BERISI` FOREIGN KEY (`KD_OBAT`,`NAMA_OBAT`) REFERENCES `obat` (`KD_OBAT`, `NAMA_OBAT`),
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`KD_TRANSAKSI`) REFERENCES `transaksi` (`KD_TRANSAKSI`);

--
-- Constraints for table `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `FK_MENYUPLAI` FOREIGN KEY (`KD_SUPPLIER`) REFERENCES `supplier` (`KD_SUPPLIER`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
