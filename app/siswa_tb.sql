-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 05.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb_smp2bn_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_tb`
--

CREATE TABLE `siswa_tb` (
  `siswa_id` int(12) NOT NULL,
  `siswa_nisn` int(255) NOT NULL,
  `siswa_nama` varchar(100) NOT NULL,
  `siswa_tempat_lahir` varchar(100) NOT NULL,
  `siswa_tanggal_lahir` varchar(50) NOT NULL,
  `siswa_no_hp` varchar(15) NOT NULL,
  `siswa_alamat` varchar(255) NOT NULL,
  `siswa_asal_sekolah` varchar(100) NOT NULL,
  `siswa_nama_orang_tua` varchar(100) NOT NULL,
  `siswa_agama` varchar(25) NOT NULL,
  `siswa_status_form` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `siswa_tb`
--
ALTER TABLE `siswa_tb`
  ADD PRIMARY KEY (`siswa_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `siswa_tb`
--
ALTER TABLE `siswa_tb`
  MODIFY `siswa_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
