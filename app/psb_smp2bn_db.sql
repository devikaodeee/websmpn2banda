-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 05.39
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
-- Struktur dari tabel `admin_tb`
--

CREATE TABLE `admin_tb` (
  `admin_id` int(12) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `admin_tb`
--

INSERT INTO `admin_tb` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Admin SMP2', 'admin@gmail.com', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-12-10-145045', 'App\\Database\\Migrations\\Users', 'default', 'App', 1703305868, 1),
(2, '2023-12-10-145435', 'App\\Database\\Migrations\\FormSiswa', 'default', 'App', 1703305868, 1),
(3, '2023-12-23-042746', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1703305868, 1);

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

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_tb`
--

CREATE TABLE `users_tb` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_tb`
--
ALTER TABLE `admin_tb`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa_tb`
--
ALTER TABLE `siswa_tb`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indeks untuk tabel `users_tb`
--
ALTER TABLE `users_tb`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_tb`
--
ALTER TABLE `admin_tb`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `siswa_tb`
--
ALTER TABLE `siswa_tb`
  MODIFY `siswa_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users_tb`
--
ALTER TABLE `users_tb`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
