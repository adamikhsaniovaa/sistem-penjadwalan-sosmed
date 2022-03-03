-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Mar 2022 pada 15.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jsosmed`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_sosmed`
--

CREATE TABLE `jenis_sosmed` (
  `Id_JSosmed` int(100) NOT NULL,
  `Jenis_Sosmed` varchar(100) NOT NULL,
  `tgl` date DEFAULT NULL,
  `Judul` varchar(100) NOT NULL,
  `Deskripsi` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_sosmed`
--

INSERT INTO `jenis_sosmed` (`Id_JSosmed`, `Jenis_Sosmed`, `tgl`, `Judul`, `Deskripsi`, `Status`) VALUES
(7, 'Youtube', '2022-02-16', 'Memasak', 'Masak bareng & Mukbang', 'Belum Posting'),
(12, 'Instagram', '2022-04-07', 'Tutorial membuat web', 'buat web', 'Batal Posting');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_sosmed`
--
ALTER TABLE `jenis_sosmed`
  ADD PRIMARY KEY (`Id_JSosmed`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_sosmed`
--
ALTER TABLE `jenis_sosmed`
  MODIFY `Id_JSosmed` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
