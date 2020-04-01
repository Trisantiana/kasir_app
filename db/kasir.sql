-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 01 Apr 2020 pada 19.24
-- Versi Server: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.3.3-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStok` (IN `id_brg` INT(1), IN `jum` INT(1))  UPDATE barang SET stok = stok - jum WHERE id_barang = id_brg$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(1) NOT NULL,
  `id_kategori` int(1) NOT NULL,
  `barcode` varchar(150) NOT NULL,
  `nama_barang` varchar(150) NOT NULL,
  `nama_pd` varchar(150) NOT NULL,
  `stok` int(1) NOT NULL,
  `harga_pokok` int(1) NOT NULL,
  `harga_jual` int(1) NOT NULL,
  `harga_member` int(1) NOT NULL,
  `harga_diskon` int(1) NOT NULL,
  `id_user` int(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `barcode`, `nama_barang`, `nama_pd`, `stok`, `harga_pokok`, `harga_jual`, `harga_member`, `harga_diskon`, `id_user`, `last_update`) VALUES
(2, 26, '01', 'Marina UV White 200ml', 'mrnuvw 200ml', 89, 6000, 9000, 8000, 7000, 4, '2018-11-16 01:28:02'),
(3, 27, '02', 'Cusson Baby Cream 200 Ml', 'cs bb crm 200', 90, 13000, 14600, 14200, 14000, 4, '2018-11-16 01:21:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_trans` int(1) NOT NULL,
  `id_transaksi` int(1) NOT NULL,
  `id_barang` int(1) NOT NULL,
  `jumlah` int(1) NOT NULL,
  `harga` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_trans`, `id_transaksi`, `id_barang`, `jumlah`, `harga`) VALUES
(1, 31, 2, 2, 9000),
(2, 32, 2, 1, 9000),
(3, 33, 2, 2, 9000),
(4, 35, 2, 1, 9000),
(5, 35, 3, 2, 14600),
(6, 38, 2, 1, 9000),
(7, 39, 3, 1, 14600),
(8, 40, 2, 1, 9000),
(9, 41, 3, 1, 14600),
(10, 42, 2, 1, 9000),
(11, 42, 3, 1, 14600),
(12, 43, 2, 1, 9000),
(13, 44, 2, 1, 9000),
(14, 45, 2, 1, 9000),
(15, 46, 2, 1, 9000),
(16, 47, 2, 2, 9000),
(17, 51, 2, 1, 9000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(1) NOT NULL,
  `kategori` varchar(150) NOT NULL,
  `isparent` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `isparent`) VALUES
(26, 'Pelembab', '27'),
(27, 'Kecantikan', ''),
(29, 'fashion wanita', ''),
(31, 'Fashion pria', ''),
(33, 'Sepatu', '29'),
(34, 'Makanan', ''),
(36, 'lain', ''),
(37, 'kat1', '26'),
(38, 'kat2', '31'),
(39, 'kat3', '33'),
(40, 'kat4', '33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id_member` int(1) NOT NULL,
  `nama_member` varchar(150) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id_member`, `nama_member`, `alamat`, `no_telp`) VALUES
(2, 'bismillah', 'ora error', '123456789'),
(3, 'ora', 'error', '0987654321123'),
(4, 'Tri', 'slahung', '087745675678');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(1) NOT NULL,
  `date_time` datetime NOT NULL,
  `id_user` int(1) NOT NULL,
  `id_member` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `date_time`, `id_user`, `id_member`) VALUES
(13, '2018-10-19 08:38:48', 3, 2),
(14, '2018-10-26 09:43:56', 3, 2),
(15, '2018-10-26 09:52:16', 3, 2),
(16, '2018-10-26 10:18:53', 3, 2),
(17, '2018-10-26 10:20:39', 3, 2),
(18, '2018-11-01 13:37:10', 3, 2),
(19, '2018-11-01 13:45:37', 3, 2),
(20, '2018-11-01 14:02:00', 3, 2),
(21, '2018-11-01 14:03:08', 3, 2),
(22, '2018-11-01 14:07:34', 3, 2),
(23, '2018-11-01 14:12:18', 3, 2),
(24, '2018-11-02 07:43:26', 3, 2),
(25, '2018-11-02 07:48:17', 3, 4),
(26, '2018-11-02 07:54:14', 3, 2),
(27, '2018-11-02 19:26:01', 3, 2),
(28, '2018-11-02 19:26:24', 3, 2),
(29, '2018-11-02 19:29:23', 3, 2),
(30, '2018-11-02 19:29:25', 3, 2),
(31, '2018-11-15 13:17:39', 7, 2),
(32, '2018-11-15 13:19:52', 7, 2),
(33, '2018-11-15 13:22:33', 7, 2),
(34, '2018-11-15 13:23:48', 7, 2),
(35, '2018-11-15 13:26:54', 7, 2),
(36, '2018-11-15 13:29:28', 7, 2),
(37, '2018-11-15 13:29:46', 7, 2),
(38, '2018-11-15 13:31:35', 7, 2),
(39, '2018-11-15 13:34:47', 7, 2),
(40, '2018-11-15 14:00:26', 9, 2),
(41, '2018-11-15 14:11:45', 9, 2),
(42, '2018-11-15 14:12:34', 9, 2),
(43, '2018-11-15 14:13:28', 9, 2),
(44, '2018-11-15 14:13:58', 9, 2),
(45, '2018-11-15 15:10:30', 9, 2),
(46, '2018-11-15 15:12:38', 9, 2),
(47, '2018-11-15 15:34:17', 9, 2),
(48, '2018-11-15 15:34:21', 9, 2),
(49, '2018-11-15 15:35:12', 9, 2),
(50, '2018-11-15 15:35:23', 9, 2),
(51, '2018-11-16 08:28:02', 9, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(1) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_lengkap`, `user_level`) VALUES
(3, 'a', '0cc175b9c0f1b6a831c399e269772661', '', 2),
(4, '1', 'c4ca4238a0b923820dcc509a6f75849b', '', 1),
(5, '2', 'c81e728d9d4c2f636f067f89cc14862c', '', 2),
(6, '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '', 3),
(7, '4', 'a87ff679a2f3e71d9181a67b7542122c', '', 4),
(8, '5', 'e4da3b7fbbce2345d7772b0674a318d5', '', 5),
(9, 'kasir', 'c7911af3adbd12a035b289556d96470a', '', 4),
(10, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_barang`
--
CREATE TABLE `v_barang` (
`id_barang` int(1)
,`id_kategori` int(1)
,`barcode` varchar(150)
,`nama_barang` varchar(150)
,`nama_pd` varchar(150)
,`stok` int(1)
,`harga_pokok` int(1)
,`harga_jual` int(1)
,`harga_member` int(1)
,`harga_diskon` int(1)
,`id_user` int(1)
,`last_update` timestamp
,`kategori` varchar(150)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_barang`
--
DROP TABLE IF EXISTS `v_barang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_barang`  AS  select `b`.`id_barang` AS `id_barang`,`b`.`id_kategori` AS `id_kategori`,`b`.`barcode` AS `barcode`,`b`.`nama_barang` AS `nama_barang`,`b`.`nama_pd` AS `nama_pd`,`b`.`stok` AS `stok`,`b`.`harga_pokok` AS `harga_pokok`,`b`.`harga_jual` AS `harga_jual`,`b`.`harga_member` AS `harga_member`,`b`.`harga_diskon` AS `harga_diskon`,`b`.`id_user` AS `id_user`,`b`.`last_update` AS `last_update`,`k`.`kategori` AS `kategori` from (`barang` `b` join `kategori` `k`) where (`b`.`id_kategori` = `k`.`id_kategori`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_trans`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_barang`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`,`id_member`),
  ADD KEY `id_member_trans` (`id_member`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_trans` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id_member` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_transaksi` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `id_member_trans` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_user_trans` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
