-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Apr 2020 pada 09.50
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `padinet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alur`
--

CREATE TABLE `alur` (
  `alur_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `pegawai` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `asign`
--

CREATE TABLE `asign` (
  `id_asign` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `rekomendasi` varchar(100) NOT NULL,
  `id_cuti` int(11) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `part_num` int(11) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `merk`, `tipe`, `part_num`, `deskripsi`, `qty`, `insert_user`, `insert_date`, `update_user`, `update_date`) VALUES
(2, 'Jasjus', 'Minuman', 1234, 'qw', 21, 'zidan', '2020-04-24 10:54:16', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `budget`
--

CREATE TABLE `budget` (
  `id_budget` int(11) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `nama_proyek` varchar(100) NOT NULL,
  `target_waktu` date NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `alur_id` int(11) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_dari` date NOT NULL,
  `tanggal_sampai` date NOT NULL,
  `total_hari` int(11) NOT NULL,
  `alur_id` int(11) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(100) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `level`, `insert_user`, `insert_date`, `update_user`, `update_date`) VALUES
(2, 'Manager', '', '0000-00-00 00:00:00', 'zidan', '2020-04-24 14:39:34'),
(8, 'Staff', 'zidan', '2020-04-24 14:38:34', '', '0000-00-00 00:00:00'),
(9, 'Supervisor', 'zidan', '2020-04-24 14:38:46', '', '0000-00-00 00:00:00'),
(10, 'Kepala Cabang', 'zidan', '2020-04-24 14:39:00', '', '0000-00-00 00:00:00'),
(11, 'HRD', 'zidan', '2020-04-24 14:39:12', '', '0000-00-00 00:00:00'),
(12, 'General Affair', 'zidan', '2020-04-24 14:40:45', '', '0000-00-00 00:00:00'),
(13, 'Staff Admin', 'zidan', '2020-04-24 14:41:16', '', '0000-00-00 00:00:00'),
(14, 'Staff Finance', 'zidan', '2020-04-24 14:41:33', '', '0000-00-00 00:00:00'),
(15, 'SPV Finance', 'zidan', '2020-04-24 14:41:52', '', '0000-00-00 00:00:00'),
(16, 'Manager Finance', 'zidan', '2020-04-24 14:42:06', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `nik` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `jk` char(1) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_level`, `nik`, `nama_pegawai`, `password`, `jk`, `insert_user`, `insert_date`, `update_user`, `update_date`) VALUES
(1, 1, 10802108, 'Rhino Ardiansah', 'c4ca4238a0b923820dcc509a6f75849b', 'L', '', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00'),
(2, 2, 10802109, 'zidan', '912ec803b2ce49e4a541068d495ab570', 'L', '', '0000-00-00 00:00:00', 'zidan', '2020-04-24 10:26:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `permintaan_barang`
--

CREATE TABLE `permintaan_barang` (
  `id_permintaan` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `alokasi` int(11) NOT NULL,
  `target_waktu` date NOT NULL,
  `keperluan` varchar(100) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `alur_id` int(11) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `jumlah_unit` int(11) NOT NULL,
  `perkiraan_harga` int(11) NOT NULL,
  `total_perkiraan` int(11) NOT NULL,
  `realisasi_harga` int(11) NOT NULL,
  `total_realisasi` int(11) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `insert_user` varchar(100) NOT NULL,
  `insert_date` datetime NOT NULL,
  `update_user` varchar(100) NOT NULL,
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alur`
--
ALTER TABLE `alur`
  ADD PRIMARY KEY (`alur_id`);

--
-- Indeks untuk tabel `asign`
--
ALTER TABLE `asign`
  ADD PRIMARY KEY (`id_asign`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id_budget`);

--
-- Indeks untuk tabel `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alur`
--
ALTER TABLE `alur`
  MODIFY `alur_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `asign`
--
ALTER TABLE `asign`
  MODIFY `id_asign` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `budget`
--
ALTER TABLE `budget`
  MODIFY `id_budget` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `permintaan_barang`
--
ALTER TABLE `permintaan_barang`
  MODIFY `id_permintaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
