-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2024 pada 12.28
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
-- Struktur dari tabel `tbl_jenis`
--

CREATE TABLE `tbl_jenis` (
  `id_jenis` int(11) NOT NULL,
  `jenis_dagangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_jenis`
--

INSERT INTO `tbl_jenis` (`id_jenis`, `jenis_dagangan`) VALUES
(2, 'Sayuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kios`
--

CREATE TABLE `tbl_kios` (
  `id_kios` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `nama_blok` varchar(60) NOT NULL,
  `no_blok` varchar(60) NOT NULL,
  `panjang` int(2) NOT NULL,
  `lebar` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kios`
--

INSERT INTO `tbl_kios` (`id_kios`, `id_pasar`, `id_tarif`, `nama_blok`, `no_blok`, `panjang`, `lebar`) VALUES
(1, 2, 1, 'Melati', '10', 2, 1),
(5, 2, 1, 'Melati', '23', 1, 2),
(7, 2, 1, 'Mawar', '12', 1, 2),
(11, 2, 1, 'Mawar', '22', 1, 2),
(16, 4, 4, 'Kios Melati', '2', 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kpasar`
--

CREATE TABLE `tbl_kpasar` (
  `id_Kpasar` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `nama_Kpasar` varchar(50) NOT NULL,
  `nip_Kpasar` varchar(21) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_kpasar`
--

INSERT INTO `tbl_kpasar` (`id_Kpasar`, `id_pasar`, `nama_Kpasar`, `nip_Kpasar`, `status`) VALUES
(2, 2, 'Tono Sutono', '176543567', 'Aktif'),
(3, 4, 'Dika Suhendra', '2147483647', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_objek`
--

CREATE TABLE `tbl_objek` (
  `id_objek` int(11) NOT NULL,
  `id_wajib_pajak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_op`
--

CREATE TABLE `tbl_op` (
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_objek_pajak` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_objek` int(11) NOT NULL,
  `npwrd` varchar(20) NOT NULL,
  `id_kios` int(11) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `batas_berlaku` date NOT NULL,
  `status_op` enum('Sudah','Belum') NOT NULL,
  `pas_foto` varchar(255) NOT NULL,
  `nama_blok` varchar(50) NOT NULL,
  `no_blok` int(5) NOT NULL,
  `nama_pasar` varchar(50) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `qrcode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_op`
--

INSERT INTO `tbl_op` (`nama`, `alamat`, `id_objek_pajak`, `id_pengajuan`, `id_jenis`, `id_objek`, `npwrd`, `id_kios`, `tgl_daftar`, `batas_berlaku`, `status_op`, `pas_foto`, `nama_blok`, `no_blok`, `nama_pasar`, `jenis`, `no_telp`, `email`, `qrcode`) VALUES
('SASA', 'Kutoarjo', 4, 3, 2, 1, '33456789997655', 5, '2025-11-09', '2023-12-13', 'Sudah', '20231109024136_pas_foto.jpg', 'Melati', 23, 'Pasar Grabag  ', 'Kios', '0811887678', 'fatin@gmail.com', 'SASA.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasar`
--

CREATE TABLE `tbl_pasar` (
  `id_pasar` int(11) NOT NULL,
  `nama_pasar` varchar(60) NOT NULL,
  `tipe_pasar` enum('Tipe A','Tipe B','Tipe C','Tipe D') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pasar`
--

INSERT INTO `tbl_pasar` (`id_pasar`, `nama_pasar`, `tipe_pasar`) VALUES
(1, 'DINKUKMP', 'Tipe A'),
(2, 'Pasar Grabag  ', 'Tipe A'),
(4, 'Pasar Baledono ', 'Tipe B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `id_pasar` int(10) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `username` varchar(8) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `level` enum('Admin','Dinas','Pasar','Kdinas') NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `id_pasar`, `nama_pegawai`, `username`, `pass`, `level`, `is_active`) VALUES
(1, 1, 'Bella Setia', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', 1),
(7, 2, 'Firman Utomo', 'pasar', '0b4f7c4bc08d792c683d497fb2412e2d', 'Pasar', 1),
(9, 1, 'Gathot Suprapto, S.H.', 'dinas2', 'ec14f306b2166f1c09df100aba4e733d', 'Kdinas', 1),
(14, 4, 'Doni Kustono', 'pasar', 'c4e5c8896ab5991691ae0791262f1d6d', 'Pasar', 1),
(15, 1, 'Toni Utono', 'dinas', 'ec14f306b2166f1c09df100aba4e733d', 'Dinas', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_kios` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `jenis_pengajuan` enum('Baru','Perpanjang') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `pekerjaan` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `sp_kepala` varchar(60) NOT NULL,
  `sp_pemilik` varchar(60) NOT NULL,
  `surat_pernyataan` varchar(60) NOT NULL,
  `ktp_pemilik` varchar(60) NOT NULL,
  `pas_foto` varchar(60) NOT NULL,
  `status_npwrd` enum('Belum','Sudah','','') NOT NULL,
  `npwrd` varchar(15) NOT NULL,
  `status_op` enum('Belum','Sudah','','') NOT NULL,
  `status` enum('Proses','Gagal','Selesai','Menunggu TTD') NOT NULL,
  `keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pimpinan`
--

CREATE TABLE `tbl_pimpinan` (
  `id_pimpinan` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `nip` varchar(21) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `periode` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_pimpinan`
--

INSERT INTO `tbl_pimpinan` (`id_pimpinan`, `id_pegawai`, `nip`, `jabatan`, `golongan`, `periode`, `status`) VALUES
(11, 9, '19661223 199403 1 005', 'Kepala Dinas', 'Pembina Tk. I', '2023-2028', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_selasar`
--

CREATE TABLE `tbl_selasar` (
  `id_selasar` int(11) NOT NULL,
  `id_tarif` int(11) NOT NULL,
  `id_pasar` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `panjang` int(5) NOT NULL,
  `lebar` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_selasar`
--

INSERT INTO `tbl_selasar` (`id_selasar`, `id_tarif`, `id_pasar`, `id_jenis`, `nama`, `nik`, `alamat`, `panjang`, `lebar`) VALUES
(3, 5, 2, 2, 'Wawan Nugraha', '2147483647', 'Kutoarjo,Purworejo', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tarif`
--

CREATE TABLE `tbl_tarif` (
  `id_tarif` int(11) NOT NULL,
  `tipe_pasar` enum('Tipe A','Tipe B','Tipe C','Tipe D') NOT NULL,
  `jenis` enum('Kios','Los','Selasar') NOT NULL,
  `letak_kioslos` varchar(255) DEFAULT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_tarif`
--

INSERT INTO `tbl_tarif` (`id_tarif`, `tipe_pasar`, `jenis`, `letak_kioslos`, `tarif`) VALUES
(1, 'Tipe A', 'Kios', 'Lanta 1 menghadap ke luar', 1000),
(2, 'Tipe A', 'Los', 'Lantai 1 Menghadap Ke Dalam', 500),
(4, 'Tipe B', 'Kios', 'Menghadap Ke Luar', 1500),
(5, 'Tipe A', 'Selasar', '-', 2000),
(6, 'Tipe A', 'Selasar', '-', 1500);

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
-- Dumping data untuk tabel `tbl_wp`
--

INSERT INTO `tbl_wp` (`id_wajib_pajak`, `id_pasar`, `kode_wp`, `npwrd`, `nama`, `nik`, `alamat`, `no_telp`, `email`, `nama_pasar`) VALUES
(1, 2, 'WP001', '33456789997655', 'SASA', '3300055120607022', 'Kutoarjo', '0811887678', 'fatin@gmail.com', 'Pasar Grabag  ');

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
-- Indeks untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `tbl_kios`
--
ALTER TABLE `tbl_kios`
  ADD PRIMARY KEY (`id_kios`),
  ADD KEY `id_pasar` (`id_pasar`),
  ADD KEY `id_tarif` (`id_tarif`);

--
-- Indeks untuk tabel `tbl_kpasar`
--
ALTER TABLE `tbl_kpasar`
  ADD PRIMARY KEY (`id_Kpasar`),
  ADD KEY `id_pasar` (`id_pasar`) USING BTREE;

--
-- Indeks untuk tabel `tbl_objek`
--
ALTER TABLE `tbl_objek`
  ADD PRIMARY KEY (`id_objek`),
  ADD KEY `id_wajib_pajak` (`id_wajib_pajak`) USING BTREE;

--
-- Indeks untuk tabel `tbl_op`
--
ALTER TABLE `tbl_op`
  ADD PRIMARY KEY (`id_objek_pajak`),
  ADD KEY `id_pengajuan` (`id_pengajuan`) USING BTREE,
  ADD KEY `id_jenis` (`id_jenis`) USING BTREE,
  ADD KEY `id_objek` (`id_objek`);

--
-- Indeks untuk tabel `tbl_pasar`
--
ALTER TABLE `tbl_pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indeks untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `id_pasar` (`id_pasar`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `id_kios` (`id_kios`);

--
-- Indeks untuk tabel `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  ADD PRIMARY KEY (`id_pimpinan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indeks untuk tabel `tbl_selasar`
--
ALTER TABLE `tbl_selasar`
  ADD PRIMARY KEY (`id_selasar`),
  ADD KEY `id_pasar` (`id_pasar`) USING BTREE,
  ADD KEY `id_tarif` (`id_tarif`) USING BTREE;

--
-- Indeks untuk tabel `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indeks untuk tabel `tbl_wp`
--
ALTER TABLE `tbl_wp`
  ADD PRIMARY KEY (`id_wajib_pajak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis`
--
ALTER TABLE `tbl_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kios`
--
ALTER TABLE `tbl_kios`
  MODIFY `id_kios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tbl_kpasar`
--
ALTER TABLE `tbl_kpasar`
  MODIFY `id_Kpasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_objek`
--
ALTER TABLE `tbl_objek`
  MODIFY `id_objek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_op`
--
ALTER TABLE `tbl_op`
  MODIFY `id_objek_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_pasar`
--
ALTER TABLE `tbl_pasar`
  MODIFY `id_pasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pimpinan`
--
ALTER TABLE `tbl_pimpinan`
  MODIFY `id_pimpinan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_selasar`
--
ALTER TABLE `tbl_selasar`
  MODIFY `id_selasar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_tarif`
--
ALTER TABLE `tbl_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_wp`
--
ALTER TABLE `tbl_wp`
  MODIFY `id_wajib_pajak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_kios`
--
ALTER TABLE `tbl_kios`
  ADD CONSTRAINT `tbl_kios_ibfk_1` FOREIGN KEY (`id_pasar`) REFERENCES `tbl_pasar` (`id_pasar`),
  ADD CONSTRAINT `tbl_kios_ibfk_2` FOREIGN KEY (`id_tarif`) REFERENCES `tbl_tarif` (`id_tarif`);

--
-- Ketidakleluasaan untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD CONSTRAINT `tbl_pengajuan_ibfk_1` FOREIGN KEY (`id_kios`) REFERENCES `tbl_kios` (`id_kios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
