-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 11:18 AM
-- Server version: 10.1.38-MariaDB
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
-- Database: `puskeswan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_admin` int(10) NOT NULL,
  `Nama` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_admin`, `Nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `ID_artikel` int(10) NOT NULL,
  `Artikel` text,
  `Jenis_Artikel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`ID_artikel`, `Artikel`, `Jenis_Artikel`) VALUES
(1, 'pada suatu hari', 'perawatan');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_peternak` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jual_beli`
--

CREATE TABLE `jual_beli` (
  `id_peternak` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `harga` int(10) NOT NULL,
  `stok` int(10) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan_ternak`
--

CREATE TABLE `kunjungan_ternak` (
  `nama_penanggung_jawab` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `ID_hewan` int(10) NOT NULL,
  `jenis_hewan` varchar(35) DEFAULT NULL,
  `nama_penyakit` varchar(35) DEFAULT NULL,
  `ID_penyakit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`ID_hewan`, `jenis_hewan`, `nama_penyakit`, `ID_penyakit`) VALUES
(1, 'kambing', 'anstrak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peternak`
--

CREATE TABLE `peternak` (
  `ID_peternak` int(10) NOT NULL,
  `Nama_peternak` varchar(50) DEFAULT NULL,
  `Alamat_peternak` varchar(50) DEFAULT NULL,
  `Jenis_ternak` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peternak`
--

INSERT INTO `peternak` (`ID_peternak`, `Nama_peternak`, `Alamat_peternak`, `Jenis_ternak`) VALUES
(1, 'yoga', 'jln bondowoso', 'kambing');

-- --------------------------------------------------------

--
-- Table structure for table `ternak`
--

CREATE TABLE `ternak` (
  `ID_hewan` int(10) NOT NULL,
  `Jenis_hewan` varchar(35) DEFAULT NULL,
  `Nama` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ternak`
--

INSERT INTO `ternak` (`ID_hewan`, `Jenis_hewan`, `Nama`) VALUES
(1, 'kambing', 'dela');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD UNIQUE KEY `ID_penyakit` (`ID_penyakit`);

--
-- Indexes for table `ternak`
--
ALTER TABLE `ternak`
  ADD PRIMARY KEY (`ID_hewan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD CONSTRAINT `penyakit_ibfk_1` FOREIGN KEY (`ID_penyakit`) REFERENCES `ternak` (`ID_hewan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
