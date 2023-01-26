-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jan 2023 pada 18.38
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_algoriteam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `nama_buku` varchar(100) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `nama_buku`, `gambar`, `created`, `hapus`) VALUES
(1, 'coba', 'Gambar_Buku2.png', '2023-01-25', 0),
(7, 'oke siap', 'Gambar_Buku3.png', '2023-01-26', 1),
(8, 'asd oce', 'Gambar_Buku4.png', '2023-01-26', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nip` varchar(100) NOT NULL,
  `nama_pengguna` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`id`, `nip`, `nama_pengguna`, `username`, `password`, `created`, `hapus`) VALUES
(1, '123', 'asd', 'asd', 'ads', '2023-01-26', 0),
(2, '1234', 'Admin', 'admin', 'admin', '2023-01-26', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id`, `id_buku`, `id_pengguna`, `id_siswa`, `created`, `status`) VALUES
(1, 7, 2, 3, '2023-01-26', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` text NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `created` date NOT NULL DEFAULT current_timestamp(),
  `hapus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `created`, `hapus`) VALUES
(3, '1234', 'siswa1', '2023-01-26', 0),
(4, '12345', 'siswa2', '2023-01-26', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
