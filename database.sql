-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 02 Agu 2020 pada 11.57
-- Versi server: 5.6.47
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contohny_medsos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_user`
--

CREATE TABLE `master_user` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_user`
--

INSERT INTO `master_user` (`id_user`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Pandu WIdiyaksono', 'administrator', 'e86e9c3e171a6d0989be38a30a3b0a46', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `telegram_channel`
--

CREATE TABLE `telegram_channel` (
  `id_channel` int(9) NOT NULL,
  `channel_name` varchar(255) NOT NULL,
  `api_token` varchar(255) NOT NULL,
  `chat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `telegram_channel`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `telegram_proses`
--

CREATE TABLE `telegram_proses` (
  `id_telegram_proses` int(3) NOT NULL,
  `nama_proses` varchar(50) DEFAULT NULL,
  `startdatetime` datetime NOT NULL,
  `looping` int(1) NOT NULL,
  `loopevery` int(2) NOT NULL,
  `looptime` varchar(20) NOT NULL,
  `channel_id` int(3) NOT NULL,
  `konten` text NOT NULL,
  `type_konten` int(1) NOT NULL,
  `image_konten` varchar(255) NOT NULL,
  `send_status` int(2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `telegram_proses`
--

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `telegram_channel`
--
ALTER TABLE `telegram_channel`
  ADD PRIMARY KEY (`id_channel`);

--
-- Indeks untuk tabel `telegram_proses`
--
ALTER TABLE `telegram_proses`
  ADD PRIMARY KEY (`id_telegram_proses`),
  ADD KEY `channel_id` (`channel_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `master_user`
--
ALTER TABLE `master_user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `telegram_channel`
--
ALTER TABLE `telegram_channel`
  MODIFY `id_channel` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `telegram_proses`
--
ALTER TABLE `telegram_proses`
  MODIFY `id_telegram_proses` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `telegram_proses`
--
ALTER TABLE `telegram_proses`
  ADD CONSTRAINT `telegram_proses_ibfk_1` FOREIGN KEY (`channel_id`) REFERENCES `telegram_channel` (`id_channel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
