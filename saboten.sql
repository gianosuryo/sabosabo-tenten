-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2017 at 08:00 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saboten`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_saboten`
--

CREATE TABLE `admin_saboten` (
  `NOMOR` int(11) NOT NULL,
  `NAMA_ADMIN` varchar(20) NOT NULL,
  `KODE_ADMIN` varchar(9) NOT NULL,
  `PASS_ADMIN` varchar(20) NOT NULL,
  `KETERANGAN` varchar(30) NOT NULL,
  `KODE_POSISI` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_saboten`
--

INSERT INTO `admin_saboten` (`NOMOR`, `NAMA_ADMIN`, `KODE_ADMIN`, `PASS_ADMIN`, `KETERANGAN`, `KODE_POSISI`) VALUES
(1, 'Samalakana', 'FN1GSAM', 'samalakana', 'Finance 1', 'G'),
(2, 'Samalakatur', 'KR12SAM', 'samalakatur', 'Karyawan 1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_barang`
--

CREATE TABLE `daftar_barang` (
  `NOMOR` int(11) NOT NULL,
  `NAMA_BARANG` varchar(30) NOT NULL,
  `KODE_BARANG` varchar(6) NOT NULL,
  `LOKASI` varchar(10) NOT NULL,
  `KUANTITAS` int(11) NOT NULL,
  `KETERANGAN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_barang`
--

INSERT INTO `daftar_barang` (`NOMOR`, `NAMA_BARANG`, `KODE_BARANG`, `LOKASI`, `KUANTITAS`, `KETERANGAN`) VALUES
(1, 'Garam', 'GRM_GD', 'Gudang', 5, 'Aman & terpercaya'),
(2, 'Gula', 'GUL_GD', 'Gudang', 7, 'Aman & terpercaya'),
(3, 'Kripik', 'KRP_GD', 'Gudang', 20, 'Aman & terpercaya');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_posisi`
--

CREATE TABLE `daftar_posisi` (
  `KODE_POSISI` varchar(2) NOT NULL,
  `NAMA_POSISI` varchar(30) NOT NULL,
  `ALAMAT_POSISI` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_posisi`
--

INSERT INTO `daftar_posisi` (`KODE_POSISI`, `NAMA_POSISI`, `ALAMAT_POSISI`) VALUES
('2', 'Outlet 2', 'Dieng'),
('G', 'Gudang', 'Balekambang');

-- --------------------------------------------------------

--
-- Table structure for table `detail_request_outlet_gudang`
--

CREATE TABLE `detail_request_outlet_gudang` (
  `NOMOR` int(11) NOT NULL,
  `KODE_REQUEST` varchar(10) NOT NULL,
  `KODE_BARANG` varchar(6) NOT NULL,
  `KONDISI_BARANG` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_request_outlet_gudang`
--

INSERT INTO `detail_request_outlet_gudang` (`NOMOR`, `KODE_REQUEST`, `KODE_BARANG`, `KONDISI_BARANG`) VALUES
(1, 'FN11SAM1', 'GUL_GD', ''),
(2, 'FN11SAM1', 'KRP_GD', ''),
(3, 'FN11SAM2', 'KRP_GD', ''),
(4, 'FN11SAM2', 'GRM_GD', ''),
(5, 'KR12SAM3', 'GUL_GD', ''),
(6, 'KR12SAM3', 'GRM_GD', '');

-- --------------------------------------------------------

--
-- Table structure for table `request_outlet_gudang`
--

CREATE TABLE `request_outlet_gudang` (
  `NOMOR` int(3) NOT NULL,
  `KODE_REQUEST` varchar(10) NOT NULL,
  `TANGGAL_REQUEST` varchar(30) NOT NULL,
  `KODE_PEMINTA` varchar(9) NOT NULL,
  `KODE_PEMBERI` varchar(9) DEFAULT NULL,
  `STATUS_REQUEST` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request_outlet_gudang`
--

INSERT INTO `request_outlet_gudang` (`NOMOR`, `KODE_REQUEST`, `TANGGAL_REQUEST`, `KODE_PEMINTA`, `KODE_PEMBERI`, `STATUS_REQUEST`) VALUES
(1, 'FN11SAM1', '0000-00-00', 'FN11SAM', '', 'Belum Ditanggap'),
(2, 'FN11SAM2', '30-04-2017 10:59:12am', 'FN11SAM', '', 'Belum Ditanggap'),
(3, 'KR12SAM3', '30-04-2017 12:50:59pm', 'KR12SAM', '', 'Belum Ditanggap');

-- --------------------------------------------------------

--
-- Table structure for table `status_admin`
--

CREATE TABLE `status_admin` (
  `NOMOR` int(11) NOT NULL,
  `KODE_JABATAN` varchar(6) NOT NULL,
  `TUGAS_JABATAN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_admin`
--

INSERT INTO `status_admin` (`NOMOR`, `KODE_JABATAN`, `TUGAS_JABATAN`) VALUES
(1, 'FN', 'Finance Saboten'),
(3, 'GD', 'Karyawan Gudang'),
(2, 'KR', 'Karyawan Saboten');

-- --------------------------------------------------------

--
-- Table structure for table `temporary_request_outlet`
--

CREATE TABLE `temporary_request_outlet` (
  `NOMOR_TEMP` int(11) NOT NULL,
  `KODE_PEMESAN_TEMP` varchar(9) NOT NULL,
  `KODE_BARANG_TEMP` varchar(6) NOT NULL,
  `KUANTITAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_saboten`
--
ALTER TABLE `admin_saboten`
  ADD PRIMARY KEY (`KODE_ADMIN`),
  ADD KEY `NOMOR` (`NOMOR`);

--
-- Indexes for table `daftar_barang`
--
ALTER TABLE `daftar_barang`
  ADD PRIMARY KEY (`KODE_BARANG`);

--
-- Indexes for table `daftar_posisi`
--
ALTER TABLE `daftar_posisi`
  ADD PRIMARY KEY (`KODE_POSISI`);

--
-- Indexes for table `request_outlet_gudang`
--
ALTER TABLE `request_outlet_gudang`
  ADD PRIMARY KEY (`KODE_REQUEST`);

--
-- Indexes for table `status_admin`
--
ALTER TABLE `status_admin`
  ADD PRIMARY KEY (`KODE_JABATAN`),
  ADD KEY `NOMOR` (`NOMOR`);

--
-- Indexes for table `temporary_request_outlet`
--
ALTER TABLE `temporary_request_outlet`
  ADD PRIMARY KEY (`NOMOR_TEMP`),
  ADD KEY `NOMOR_TEMP` (`NOMOR_TEMP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_saboten`
--
ALTER TABLE `admin_saboten`
  MODIFY `NOMOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `status_admin`
--
ALTER TABLE `status_admin`
  MODIFY `NOMOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `temporary_request_outlet`
--
ALTER TABLE `temporary_request_outlet`
  MODIFY `NOMOR_TEMP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
