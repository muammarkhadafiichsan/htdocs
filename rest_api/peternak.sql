-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2019 at 10:52 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peternak`
--

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id_forum` int(4) NOT NULL,
  `nama_peternak` varchar(30) NOT NULL,
  `ternak` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `ternak_jual` varchar(30) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(4) NOT NULL,
  `foto` varchar(70) NOT NULL,
  `detail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id_forum`, `nama_peternak`, `ternak`, `alamat`, `ternak_jual`, `harga`, `stok`, `foto`, `detail`) VALUES
(1, 'azi', 'sapi', 'banyuwangi', 'susu sapi ', '10000', 100, '', 'susu segaar alami');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id_kunjungan` int(4) NOT NULL,
  `nama_peternak` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggung_jawab` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id_kunjungan`, `nama_peternak`, `alamat`, `tanggung_jawab`) VALUES
(1, 'azi', 'banyuwangi', 'affan tohari');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(3) NOT NULL,
  `nama_peternak` varchar(30) NOT NULL,
  `no_telepon` int(13) NOT NULL,
  `jenis_peternakan` varchar(15) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_peternak`, `no_telepon`, `jenis_peternakan`, `alamat`, `username`, `password`) VALUES
('1', 'mareta', 8212, 'perternak lele', 'bangil pasuruan jawa timur', 'mareta', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id_forum`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id_kunjungan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
