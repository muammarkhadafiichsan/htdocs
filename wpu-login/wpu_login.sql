-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2019 pada 10.44
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
-- Database: `wpu_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'freeofcocgems', 'khadafi.ichsan99@gmail.com', 'default.jpg', '$2y$10$r9uoXybp15jyUpSzuZ5fieX3oDviCmMmsd027mGs68wXFV9njeYa.', 2, 1, 1561111172),
(2, 'ega', 'ega@gmail.com', 'default.jpg', '$2y$10$9vImUKMcj7RAw9qZ14NO4.vbAMuulWzDyqH2a0noxw1SBo8biJvfG', 2, 0, 1561120687),
(3, 'rian', 'rian@gmail.com', 'default.jpg', '$2y$10$OJtLsIOkcX2U8uCpPXki0.80aTkjsh7AZRlmL5VV/kzrRqWURA3re', 2, 1, 1561120731),
(4, 'fahmi', 'fahmi@gmail.com', 'default.jpg', '$2y$10$rm0mHbiMVqBxWKBD2xhuS.e6RZJ0wusjLtBTUCIJLhLa/viF4hURy', 2, 1, 1561130045),
(5, 'febrero', 'feb@gmail.com', 'default.jpg', '$2y$10$xeD3TVdMeiLMKbzf/5KTI.5WrSz2yggMnXn3qUOqPLs5cYFYMdjwK', 2, 1, 1561177695),
(6, 'ade', 'ade@gmail.com', 'default.jpg', '$2y$10$EfTQBYKqTRLdFi.Y5felg.w0Fea2Ewilh3DH6O99S6kMqxca6zfJa', 2, 1, 1561191229);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
