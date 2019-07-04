-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2019 at 08:25 PM
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
-- Database: `pulsa`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `history`
-- (See below for the actual view)
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
-- Table structure for table `nominal`
--

CREATE TABLE `nominal` (
  `id_nominal` varchar(200) NOT NULL,
  `nominal` varchar(200) DEFAULT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nominal`
--

INSERT INTO `nominal` (`id_nominal`, `nominal`, `harga`) VALUES
('1', '5.000', '5.500'),
('2', '10.000', ''),
('3', '25.000', ''),
('4', '50.000', ''),
('5', '100.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(200) NOT NULL,
  `operator` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `operator`) VALUES
('1', 'Telkomsel'),
('2', 'XL Axiata'),
('3', 'Tri'),
('4', 'Indosat');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` varchar(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `name`, `price`, `image`, `description`) VALUES
('5d0f76cc5fc0c', 'cara manajemen kandang yang benar', 0, '5d0f76cc5fc0c.jpg', 'untuk memperoleh hasil yang maksimal dari hasil ternak dan produksi yang melimpah dibutuhkan kandang yang bersih dan sehat');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id_trans` varchar(200) NOT NULL,
  `tanggal` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id_trans`, `tanggal`) VALUES
('105d1548e0a4c22', '2019-06-28'),
('105d1e3754b8557', '2019-07-05'),
('105d1e413bc9ebf', '2019-07-05'),
('105d1e418f9aa13', '2019-07-05'),
('105d1e41d87dd2d', '2019-07-05'),
('105d1e42076a0aa', '2019-07-05'),
('105d1e421854214', '2019-07-05'),
('105d1e4292914b9', '2019-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `trans_detail`
--

CREATE TABLE `trans_detail` (
  `id_detail` varchar(200) NOT NULL,
  `id_trans` varchar(200) DEFAULT NULL,
  `nomor` varchar(100) DEFAULT NULL,
  `id_operator` varchar(200) DEFAULT NULL,
  `id_nominal` varchar(200) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trans_detail`
--

INSERT INTO `trans_detail` (`id_detail`, `id_trans`, `nomor`, `id_operator`, `id_nominal`, `status`) VALUES
('65d1e3754b8550', '105d1e3754b8557', '087865444398', '2', '1', 'BERHASIL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(2, 'ega', 'ega@gmail.com', 'default.jpg', '$2y$10$9vImUKMcj7RAw9qZ14NO4.vbAMuulWzDyqH2a0noxw1SBo8biJvfG', 2, 0, 1561120687),
(3, 'rian', 'rian@gmail.com', 'default.jpg', '$2y$10$OJtLsIOkcX2U8uCpPXki0.80aTkjsh7AZRlmL5VV/kzrRqWURA3re', 2, 1, 1561120731),
(4, 'fahmi', 'fahmi@gmail.com', 'default.jpg', '$2y$10$rm0mHbiMVqBxWKBD2xhuS.e6RZJ0wusjLtBTUCIJLhLa/viF4hURy', 2, 1, 1561130045),
(5, 'febrero', 'feb@gmail.com', 'default.jpg', '$2y$10$xeD3TVdMeiLMKbzf/5KTI.5WrSz2yggMnXn3qUOqPLs5cYFYMdjwK', 2, 1, 1561177695),
(6, 'ade', 'ade@gmail.com', 'default.jpg', '$2y$10$EfTQBYKqTRLdFi.Y5felg.w0Fea2Ewilh3DH6O99S6kMqxca6zfJa', 2, 1, 1561191229),
(25, 'ari lasso', 'teknikinformatikatugas@gmail.com', 'default.jpg', '$2y$10$XgkwwWKxm8nQudKfOI0Tl..4GXey5q.EUktgy2dAkRiRaoFM4Y4f6', 2, 1, 1561265085),
(26, 'naomi scott', 'khadafi.ichsan99@gmail.com', 'default.jpg', '$2y$10$au4DhohQJxqwGKijR46vCOAQRg40hijBD87.9/dtQgftM5sNKELSq', 2, 1, 1561275268),
(28, 'adhe', 'tnils600@gmail.com', 'default.jpg', '$2y$10$3ZVh.tlIHgYKtZQ7o0kh5O35EPdlFAivMQiCSCIth0oFtXLzLoeeq', 2, 1, 1562259876);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(15, 'khadafi.ichsan99@gmail.com', 'ZnisiH9Cnuh/4JP6dFSgocpG4x4BkublmBeawIPUkvE=', 1561264970),
(16, 'teknikinformatikatugas@gmail.com', 'VFRujP3LJ86aKRI3me4HnYUDG6KzW/OvvZnlsSVTmJA=', 1561265085),
(17, 'khadafi.ichsan99@gmail.com', 'Lv0CLcLfQdEBaA6G0BoTKtMlhquKChU33az/IklPTy0=', 1561275268);

-- --------------------------------------------------------

--
-- Structure for view `history`
--
DROP TABLE IF EXISTS `history`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history`  AS  select `trans_detail`.`id_detail` AS `id_detail`,`trans_detail`.`id_trans` AS `id_trans`,`trans`.`tanggal` AS `tanggal`,`trans_detail`.`nomor` AS `nomor`,`trans_detail`.`id_operator` AS `id_operator`,`operator`.`operator` AS `operator`,`trans_detail`.`id_nominal` AS `id_nominal`,`nominal`.`nominal` AS `nominal`,`trans_detail`.`status` AS `status` from (((`trans_detail` join `trans`) join `operator`) join `nominal`) where ((`trans_detail`.`id_trans` = `trans`.`id_trans`) and (`trans_detail`.`id_operator` = `operator`.`id_operator`) and (`trans_detail`.`id_nominal` = `nominal`.`id_nominal`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nominal`
--
ALTER TABLE `nominal`
  ADD PRIMARY KEY (`id_nominal`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id_trans`);

--
-- Indexes for table `trans_detail`
--
ALTER TABLE `trans_detail`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_trans` (`id_trans`),
  ADD KEY `id_nominal` (`id_nominal`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `trans_detail`
--
ALTER TABLE `trans_detail`
  ADD CONSTRAINT `trans_detail_ibfk_1` FOREIGN KEY (`id_trans`) REFERENCES `trans` (`id_trans`),
  ADD CONSTRAINT `trans_detail_ibfk_2` FOREIGN KEY (`id_nominal`) REFERENCES `nominal` (`id_nominal`),
  ADD CONSTRAINT `trans_detail_ibfk_3` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
