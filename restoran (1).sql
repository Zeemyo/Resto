-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2022 at 06:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(11) UNSIGNED NOT NULL,
  `key` varchar(40) NOT NULL DEFAULT '',
  `all_access` tinyint(1) NOT NULL DEFAULT 0,
  `controller` varchar(50) NOT NULL DEFAULT '',
  `date_created` datetime DEFAULT NULL,
  `date_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `dessert`
--

CREATE TABLE `dessert` (
  `id_dessert` int(11) NOT NULL,
  `nama_dessert` varchar(60) NOT NULL,
  `harga_dessert` int(30) NOT NULL,
  `stok_dessert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dessert`
--

INSERT INTO `dessert` (`id_dessert`, `nama_dessert`, `harga_dessert`, `stok_dessert`) VALUES
(1, 'Sand Stone', 20000, 20),
(2, 'Jupiter Crunch', 25000, 20);

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 0, 'KEY-28642', 0, 0, 0, NULL, 0),
(2, 0, 'KEY-13889', 0, 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `id_minuman` int(11) NOT NULL,
  `id_dessert` int(11) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `id_pesan`, `id_order`, `id_makanan`, `id_minuman`, `id_dessert`, `tgl_laporan`, `jumlah`) VALUES
(1, 1, 2, 1, 1, 1, '2022-08-12', 1200000);

-- --------------------------------------------------------

--
-- Table structure for table `limits`
--

CREATE TABLE `limits` (
  `id` int(11) NOT NULL,
  `uri` varchar(255) NOT NULL,
  `count` int(10) NOT NULL,
  `hour_started` int(11) NOT NULL,
  `api_key` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `limits`
--

INSERT INTO `limits` (`id`, `uri`, `count`, `hour_started`, `api_key`) VALUES
(1, 'uri:API/makanan/makanan:get', 16, 1658576621, 'KEY-28642'),
(2, 'uri:API/makanan/makanan:post', 1, 1658143552, 'KEY-28642'),
(3, 'uri:API/makanan/makanan:put', 1, 1658143857, 'KEY-28642'),
(4, 'uri:API/makanan/makanan:delete', 1, 1658144044, 'KEY-28642'),
(5, 'uri:API/minuman/minuman:get', 10, 1658577222, 'KEY-28642'),
(6, 'uri:API/minuman/minuman:post', 3, 1658224363, 'KEY-28642'),
(7, 'uri:API/minuman/minuman:put', 1, 1658224511, 'KEY-28642'),
(8, 'uri:API/minuman/minuman:delete', 1, 1658224653, 'KEY-28642'),
(9, 'uri:API/dessert/dessert:post', 7, 1658225201, 'KEY-28642'),
(10, 'uri:API/dessert/dessert:get', 23, 1658576833, 'KEY-28642'),
(11, 'uri:API/dessert/dessert:put', 2, 1658226815, 'KEY-28642'),
(12, 'uri:API/dessert/dessert:delete', 1, 1658226901, 'KEY-28642'),
(13, 'uri:API/laporan/laporan:get', 13, 1658576815, 'KEY-28642'),
(14, 'uri:API/order/order:post', 1, 1658568547, 'KEY-28642'),
(15, 'uri:API/order/order:get', 17, 1658577998, 'KEY-28642'),
(16, 'uri:API/order/order:put', 2, 1658308758, 'KEY-28642'),
(17, 'uri:API/pesan/pesan:post', 5, 1658576211, 'KEY-28642'),
(18, 'uri:API/order/order:delete', 2, 1658390877, 'KEY-28642'),
(19, 'uri:API/pesan/pesan:get', 17, 1658575832, 'KEY-28642'),
(20, 'uri:API/pesan/pesan:put', 7, 1658391269, 'KEY-28642'),
(21, 'uri:API/pesan/pesan:delete', 1, 1658394454, 'KEY-28642'),
(22, 'uri:API/laporan/laporan:post', 3, 1658578695, 'KEY-28642'),
(23, 'uri:API/laporan/laporan:put', 1, 1658396304, 'KEY-28642'),
(24, 'uri:API/laporan/laporan:delete', 1, 1658578954, 'KEY-28642');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(60) NOT NULL,
  `harga_makanan` int(30) NOT NULL,
  `stok_makanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `harga_makanan`, `stok_makanan`) VALUES
(1, 'Sate Mars', 25000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) NOT NULL,
  `nama_minuman` varchar(60) NOT NULL,
  `harga_minuman` int(30) NOT NULL,
  `stok_minuman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `harga_minuman`, `stok_minuman`) VALUES
(1, 'Aquatic Planet', 12000, 90),
(2, 'Lava tear', 15000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `id_minuman` int(11) NOT NULL,
  `id_dessert` int(11) NOT NULL,
  `no_meja` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `uang_bayar` int(20) NOT NULL,
  `uang_kembali` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id_order`, `id_makanan`, `id_minuman`, `id_dessert`, `no_meja`, `total_harga`, `uang_bayar`, `uang_kembali`) VALUES
(2, 1, 1, 2, 12, 100000, 100000, 90);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_order`, `id_user`, `jumlah`) VALUES
(1, 2, 1, 120000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `verification_key` varchar(60) NOT NULL,
  `is_email_verified` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `name`, `verification_key`, `is_email_verified`) VALUES
(1, 'zidanalam@gmail.com', '12345', 'Zidan', '14234354', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dessert`
--
ALTER TABLE `dessert`
  ADD PRIMARY KEY (`id_dessert`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `id_pesan` (`id_pesan`,`id_order`,`id_makanan`,`id_minuman`,`id_dessert`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_minuman` (`id_minuman`),
  ADD KEY `id_makanan` (`id_makanan`),
  ADD KEY `id_dessert` (`id_dessert`);

--
-- Indexes for table `limits`
--
ALTER TABLE `limits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`);

--
-- Indexes for table `minuman`
--
ALTER TABLE `minuman`
  ADD PRIMARY KEY (`id_minuman`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_makanan` (`id_makanan`,`id_minuman`,`id_dessert`),
  ADD KEY `id_minuman` (`id_minuman`),
  ADD KEY `id_dessert` (`id_dessert`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD UNIQUE KEY `id_order` (`id_order`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `limits`
--
ALTER TABLE `limits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_4` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`),
  ADD CONSTRAINT `laporan_ibfk_5` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`),
  ADD CONSTRAINT `laporan_ibfk_6` FOREIGN KEY (`id_minuman`) REFERENCES `minuman` (`id_minuman`),
  ADD CONSTRAINT `laporan_ibfk_7` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`),
  ADD CONSTRAINT `laporan_ibfk_8` FOREIGN KEY (`id_dessert`) REFERENCES `dessert` (`id_dessert`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_minuman`) REFERENCES `minuman` (`id_minuman`),
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`),
  ADD CONSTRAINT `order_ibfk_3` FOREIGN KEY (`id_dessert`) REFERENCES `dessert` (`id_dessert`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
