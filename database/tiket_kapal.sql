-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2021 pada 10.54
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiket_kapal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pemesanan`
--

CREATE TABLE `detail_pemesanan` (
  `id_detail_pemesanan` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_hp` int(11) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pemesanan`
--

INSERT INTO `detail_pemesanan` (`id_detail_pemesanan`, `id_pemesanan`, `nama`, `nomor_hp`, `jenis_kelamin`) VALUES
(1, 16, 'Muhammad Akbar', 2147483647, 'Laki'),
(2, 17, 'Muhammad Akbar', 2147483647, 'Laki'),
(3, 18, 'Muhammad Akbar', 2147483647, 'Laki'),
(4, 19, 'akbar', 2147483647, 'Laki'),
(5, 20, 'Muhammad Akbar', 2147483647, 'Laki'),
(6, 21, 'asdasdasd', 2147483647, 'asdasd'),
(7, 22, 'Arya', 862123421, 'Laki laki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'Penumpang', 'Penumpang Kapal'),
(32, 'Kasir', 'Ticketing'),
(33, 'Pemilik', 'Pemilik Perusahaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 8),
(1, 89),
(1, 91),
(4, 91),
(1, 93),
(1, 94),
(1, 43),
(1, 42),
(1, 114),
(1, 44),
(1, 123),
(2, 123),
(32, 123),
(33, 123),
(1, 124),
(2, 124),
(32, 124),
(33, 124),
(2, 126),
(32, 128),
(1, 3),
(2, 3),
(32, 3),
(33, 3),
(1, 1),
(2, 1),
(32, 1),
(33, 1),
(1, 92),
(33, 92),
(32, 129),
(32, 127),
(2, 119),
(2, 120),
(2, 121),
(33, 122),
(0, 40);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL,
  `tanggal_keberangkatan` datetime NOT NULL,
  `tanggal_sampai` datetime NOT NULL,
  `harga_tiket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `asal`, `tujuan`, `tanggal_keberangkatan`, `tanggal_sampai`, `harga_tiket`) VALUES
(6, 'Ambarita', 'Ajibata', '2021-07-13 17:00:58', '2021-07-13 19:00:58', 60000),
(8, 'Ajibata', 'Ambarita', '2021-07-13 09:40:02', '2021-07-13 16:00:00', 50000),
(9, 'Ajibata', 'Tigaras', '2021-07-14 09:00:20', '2021-07-14 10:00:20', 60000),
(10, 'Tigaras', 'Ajibata', '2021-07-14 13:00:52', '2021-07-14 14:00:52', 60000);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `laporan_penjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `laporan_penjualan` (
`tanggal` varchar(10)
,`tiket_terjual` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT 99,
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(4, 19, 2, 40, 'fas fa-table', 'CRUD Generator', 'crudbuilder', '1', 1),
(8, 17, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 15, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 12, 2, 92, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 13, 3, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 14, 3, 42, 'fas fa-angle-double-right', 'Hak Akses', 'groups', '2', 1),
(89, 18, 2, 40, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(92, 10, 1, 0, 'empty', 'MASTER DATA', '#', 'masterdata', 1),
(107, 16, 2, 40, 'fas fa-cog', 'Setting', 'setting', 'setting', 1),
(114, 11, 2, 92, 'far fa-calendar-alt', 'Jadwal Keberangkatan', 'jadwal', '1', 1),
(119, 5, 2, 1, 'fas fa-ship', 'Pemesanan', '#', '1', 1),
(120, 6, 3, 119, 'fas fa-ticket-alt', 'Pesan Tiket', 'pemesanan/penumpang_pesan', '#', 1),
(121, 7, 3, 119, 'fas fa-history', 'History Pemesanan', 'pemesanan', '1', 1),
(122, 9, 2, 1, 'far fa-file', 'Laporan Penjualan', 'laporan_penjualan', '1', 1),
(123, 20, 1, 0, 'fab fa-amazon-pay', 'Auth', '#', '#', 1),
(124, 21, 2, 123, 'fab fa-dyalog', 'Logout', 'auth/logout', '#', 1),
(126, 8, 2, 1, 'fas fa-user', 'Data Saya', 'penumpang/data_saya', '#', 1),
(127, 3, 3, 129, 'fas fa-ship', 'Pesan Tiket', 'pemesanan/kasir_pesan', '1', 1),
(128, 4, 3, 129, 'fas fa-ticket-alt', 'History Pemesanan', 'pemesanan/pemesanan_kasir', '1', 1),
(129, 2, 2, 1, 'fas fa-ship', 'Pemesanan Kasir', '#', '#', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `metode` varchar(50) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pemesanan`, `metode`, `tanggal_bayar`, `status_bayar`) VALUES
(1, 9, 'CASH', '2021-07-04', 'dibayar'),
(2, 17, 'GOPAY', '2021-07-04', 'dibayar'),
(3, 18, 'BRI', '2021-07-04', 'dibayar'),
(4, 19, 'BRI', '2021-07-10', 'dibayar'),
(5, 20, 'CASH', '2021-07-10', 'dibayar'),
(6, 21, 'DANA', '2021-07-10', 'dibayar'),
(7, 22, 'BCA', '2021-07-12', 'dibayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `status_pemesanan` varchar(50) NOT NULL,
  `tanggal_pemesanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_user`, `id_jadwal`, `status_pemesanan`, `tanggal_pemesanan`) VALUES
(1, 21, 6, 'Dipesan', '0000-00-00'),
(2, 21, 6, 'Dipesan', '2021-07-03'),
(3, 21, 7, 'Dipesan', '2021-07-03'),
(4, 21, 6, 'Dipesan', '2021-07-03'),
(5, 21, 7, 'Dipesan', '2021-07-03'),
(6, 22, 6, 'Dipesan', '2021-07-04'),
(7, 22, 6, 'Dipesan', '2021-07-04'),
(8, 22, 7, 'Dipesan', '2021-07-04'),
(9, 22, 7, 'Dipesan', '2021-07-04'),
(10, 22, 6, 'Dipesan', '2021-07-04'),
(11, 22, 6, 'Dipesan', '2021-07-04'),
(12, 22, 6, 'Dipesan', '2021-07-04'),
(13, 22, 6, 'Dipesan', '2021-07-04'),
(14, 22, 6, 'Dipesan', '2021-07-04'),
(15, 22, 6, 'Dipesan', '2021-07-04'),
(16, 22, 6, 'Dipesan', '2021-07-04'),
(17, 22, 6, 'Dipesan', '2021-07-04'),
(18, 22, 6, 'Dipesan', '2021-07-04'),
(19, 22, 6, 'Dipesan', '2021-07-10'),
(20, 46, 6, 'Dipesan', '2021-07-10'),
(21, 22, 6, 'Dipesan', '2021-07-10'),
(22, 13, 6, 'Dipesan', '2021-07-12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penumpang`
--

CREATE TABLE `penumpang` (
  `id_penumpang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jens_kelamin` varchar(50) NOT NULL,
  `nomor_hp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penumpang`
--

INSERT INTO `penumpang` (`id_penumpang`, `id_user`, `alamat`, `jens_kelamin`, `nomor_hp`) VALUES
(1, 13, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 'Laki Laki', 2147483647),
(2, 19, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 'Laki Laki', 2147483647),
(3, 20, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 'Laki Laki', 2147483647),
(4, 21, 'kjaisbdnjkasd', 'laki', 908908908),
(5, 22, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 'Laki Laki', 2147483647),
(6, 29, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 'Laki Laki', 2147483647),
(7, 31, 'Jalan Sarijadi Blok 02 No 118 Rt 06/02', 's', 2147483647),
(8, 47, 'Medan', 'perempuan', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `kode`, `nama`, `nilai`) VALUES
(1, 'logo_tiket_kapal.jpg', 'Tiket Kapal', 'Danau Toba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `image` varchar(128) NOT NULL DEFAULT 'default.jpg',
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `image`, `active`, `phone`) VALUES
(13, '', 'penumpang01@gmail.com', '$2y$08$GFbtgOEJDsBjS3BXQq2cg.npg9mumOeqKEMWVAfKfdjH5L9lXmWiS', 'Penumpang', '01', 'default.jpg', 1, 0),
(16, '', 'pemilik01@gmail.com', '$2y$08$hoTaK2Gtln6lQk8MDpjfOOFBotvB3bMc2prWhxchP/2dduEnlLyfS', 'Pemilik', '01', 'default.jpg', 1, 0),
(17, '', 'prayogamt6@gmail.com', '$2y$08$WBgrlksYrsR80WjJOfabQO6onykL1uJU0OLR.fl5yGtE0W4NkTifG', 'Koestiyandi', 'Prayoga', 'lovee.jpg', 1, 0),
(22, '', 'penumpang03@gmail.com', '$2y$08$MCV7uZEVRGizY5kQBooaM.By3I8/2g.72/EGj5.iiJZxv5adWOOzW', 'Penumpang', '03', 'default.jpg', 1, 0),
(46, 'kasir@gmail.com', 'kasir@gmail.com', '$2y$08$3YhcfgSnrEIXXiYFEB.o0OWhVImF2wMOsnuZw1iL72lMGMs4SyLaa', 'Ticketing', '01', 'default.jpg', 1, 0),
(47, 'salsabilamt6@gmail.com', 'salsabilamt6@gmail.com', '$2y$08$p1Cfs6TzQHYx4x4Y3QYEnei2vnlUYgeFKPTYc3qPKSNZmjM7zLsN.', 'salsabila', 'Prayoga', 'default.jpg', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(91, 13, 2),
(64, 13, 18),
(97, 16, 33),
(98, 17, 1),
(142, 22, 2),
(149, 46, 32),
(150, 47, 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `laporan_penjualan`
--
DROP TABLE IF EXISTS `laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_penjualan`  AS  (select substr(`pemesanan`.`tanggal_pemesanan`,1,10) AS `tanggal`,count(`pemesanan`.`id_pemesanan`) AS `tiket_terjual` from `pemesanan` group by substr(`pemesanan`.`tanggal_pemesanan`,1,10) order by substr(`pemesanan`.`tanggal_pemesanan`,1,10) desc) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  ADD PRIMARY KEY (`id_detail_pemesanan`);

--
-- Indeks untuk tabel `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  ADD PRIMARY KEY (`id_penumpang`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pemesanan`
--
ALTER TABLE `detail_pemesanan`
  MODIFY `id_detail_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `penumpang`
--
ALTER TABLE `penumpang`
  MODIFY `id_penumpang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
