-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2024 pada 14.34
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perizinan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_wp`
--

CREATE TABLE `tbl_wp` (
  `id_wajib_pajak` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `kode_wp` varchar(11) NOT NULL,
  `npwrd` varchar(14) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(60) NOT NULL,
  `nama_pasar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Trigger `tbl_wp`
--
DELIMITER $$
CREATE TRIGGER `generate_wp_code` BEFORE INSERT ON `tbl_wp` FOR EACH ROW BEGIN
	DECLARE new_id INT;
    
    SELECT AUTO_INCREMENT INTO new_id
    FROM information_schema.tables
    WHERE table_schema = DATABASE()
    AND table_name = 'tbl_wp';
    
    SET NEW.kode_wp = CONCAT('WP', LPAD (new_id, 3, '0'));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_wp`
--
ALTER TABLE `tbl_wp`
  ADD PRIMARY KEY (`id_wajib_pajak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_wp`
--
ALTER TABLE `tbl_wp`
  MODIFY `id_wajib_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
