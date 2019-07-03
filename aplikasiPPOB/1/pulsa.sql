-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2019 pada 02.09
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pulsa`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `history`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `history` (
`id_detail` varchar(200)
,`id_trans` varchar(200)
,`tanggal` varchar(200)
,`nomor` varchar(100)
,`id_operator` varchar(200)
,`operator` varchar(200)
,`id_nominal` varchar(200)
,`nominal` varchar(200)
,`status` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nominal`
--

CREATE TABLE `nominal` (
  `id_nominal` varchar(200) NOT NULL,
  `nominal` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nominal`
--

INSERT INTO `nominal` (`id_nominal`, `nominal`) VALUES
('1', '5.000'),
('2', '10.000'),
('3', '25.000'),
('4', '50.000'),
('5', '100.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(200) NOT NULL,
  `operator` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_operator`, `operator`) VALUES
('1', 'Telkomsel'),
('2', 'XL Axiata'),
('3', 'Tri'),
('4', 'Indosat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans`
--

CREATE TABLE `trans` (
  `id_trans` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `trans`
--

INSERT INTO `trans` (`id_trans`, `tanggal`) VALUES
('105d1548e0a4c22', '2019-06-28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `trans_detail`
--

CREATE TABLE `trans_detail` (
  `id_detail` varchar(200) NOT NULL,
  `id_trans` varchar(200) DEFAULT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `id_operator` varchar(200) DEFAULT NULL,
  `id_nominal` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur untuk view `history`
--
DROP TABLE IF EXISTS `history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history`  AS  select `trans_detail`.`id_detail` AS `id_detail`,`trans_detail`.`id_trans` AS `id_trans`,`trans`.`tanggal` AS `tanggal`,`trans_detail`.`nomor` AS `nomor`,`trans_detail`.`id_operator` AS `id_operator`,`operator`.`operator` AS `operator`,`trans_detail`.`id_nominal` AS `id_nominal`,`nominal`.`nominal` AS `nominal`,`trans_detail`.`status` AS `status` from (((`trans_detail` join `trans`) join `operator`) join `nominal`) where ((`trans_detail`.`id_trans` = `trans`.`id_trans`) and (`trans_detail`.`id_operator` = `operator`.`id_operator`) and (`trans_detail`.`id_nominal` = `nominal`.`id_nominal`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`id_nominal`);

--
-- Indeks untuk tabel `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indeks untuk tabel `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indeks untuk tabel `trans_detail`
--
ALTER TABLE `trans_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `id_nominal` (`id_nominal`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `trans_detail`
--
ALTER TABLE `trans_detail`
  ADD CONSTRAINT `trans_detail_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `trans` (`id_trans`),
  ADD CONSTRAINT `trans_detail_ibfk_2` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`),
  ADD CONSTRAINT `trans_detail_ibfk_3` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
