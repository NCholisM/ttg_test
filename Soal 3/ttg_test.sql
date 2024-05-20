-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 18, 2024 at 05:38 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ttg_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'L QUEENLY'),
(2, 'L MTH AKSESORIS (IM)'),
(3, 'L MTH TABUNG (LK)'),
(4, 'SP MTH SPAREPART (LK)'),
(5, 'CI MTH TINTA LAIN (IM)'),
(6, 'L MTH AKSESORIS (LK)'),
(7, 'S MTH STEMPEL (IM)');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  `kategori_id` int DEFAULT NULL,
  `status_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `kategori_id`, `status_id`) VALUES
(1, 'ALCOHOL GEL POLISH CLEANSER GP-CLN01', 12500, 1, 1),
(2, 'ALUMUNIUM FOIL ALL IN ONE BULAT 23mm IM', 1000, 2, 1),
(3, 'ALUMUNIUM FOIL ALL IN ONE BULAT 30mm IM', 1000, 2, 1),
(4, 'ALUMUNIUM FOIL ALL IN ONE SHEET 250mm IM', 12500, 2, 2),
(5, 'ALUMUNIUM FOIL HDPE/PE BULAT 23mm IM', 12500, 2, 1),
(6, 'ALUMUNIUM FOIL HDPE/PE BULAT 30mm IM', 1000, 2, 1),
(7, 'ALUMUNIUM FOIL HDPE/PE SHEET 250mm IM', 13000, 2, 1),
(8, 'ALUMUNIUM FOIL PET SHEET 250mm IM', 1000, 2, 2),
(9, 'ARM PENDEK MODEL U', 13000, 2, 1),
(10, 'ARM SUPPORT KECIL', 13000, 3, 2),
(11, 'ARM SUPPORT KOTAK PUTIH', 13000, 2, 2),
(12, 'ARM SUPPORT PENDEK POLOS', 13000, 3, 1),
(13, 'ARM SUPPORT S IM', 1000, 2, 2),
(14, 'ARM SUPPORT T (IMPORT)', 13000, 2, 1),
(15, 'ARM SUPPORT T - MODEL 1 ( LOKAL )', 10000, 3, 1),
(16, 'BLACK LASER TONER FP-T3 (100gr)', 13000, 2, 2),
(17, 'BODY PRINTER CANON IP2770', 500, 4, 1),
(18, 'BODY PRINTER T13X', 15000, 4, 1),
(19, 'BOTOL 1000ML BLUE KHUSUS UNTUK EPSON R1800/R800 - 4180 IM (T054920)', 10000, 5, 1),
(20, 'BOTOL 1000ML CYAN KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4120 IM (T054220)', 10000, 5, 2),
(21, 'BOTOL 1000ML GLOSS OPTIMIZER KHUSUS UNTUK EPSON R1800/R800/R1900/R2000/IX7000/MG6170 - 4100 IM (T054020)', 1500, 5, 1),
(22, 'BOTOL 1000ML L.LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0599 IM', 1500, 5, 2),
(23, 'BOTOL 1000ML LIGHT BLACK KHUSUS UNTUK EPSON 2400 - 0597 IM', 1500, 5, 2),
(24, 'BOTOL 1000ML MAGENTA KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4140 IM (T054320)', 1000, 5, 1),
(25, 'BOTOL 1000ML MATTE BLACK KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 3503 IM (T054820)', 1500, 5, 2),
(26, 'BOTOL 1000ML ORANGE KHUSUS UNTUK EPSON R1900/R2000 IM - 4190 (T087920)', 1500, 5, 1),
(27, 'BOTOL 1000ML RED KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4170 IM (T054720)', 1000, 5, 2),
(28, 'BOTOL 1000ML YELLOW KHUSUS UNTUK EPSON R1800/R800/R1900/R2000 - 4160 IM (T054420)', 1500, 5, 2),
(29, 'BOTOL KOTAK 100ML LK', 1000, 6, 1),
(30, 'BOTOL 10ML IM', 1000, 7, 2),
(45, 'TES', 123, 7, 1),
(46, 'TES', 123, 7, 1),
(47, 'TES', 123, 7, 1),
(48, 'TES', 123, 7, 1),
(49, 'TES', 123, 7, 1),
(50, 'TES', 123, 7, 1),
(51, 'TES', 123, 6, 1),
(52, 'CHOLIS', 123, 6, 1),
(53, 'QWERTY', 222, 5, 1),
(54, 'QWERTY', 222, 5, 1),
(55, 'QWERTY', 222, 5, 1),
(56, 'QWERTY', 222, 5, 1),
(57, 'QWERTY', 222, 5, 1),
(58, 'QWERTY', 222, 5, 1),
(59, 'QWERTY', 222, 5, 1),
(60, 'QWERTY', 222, 5, 1),
(61, 'QWERTYU', 222, 5, 1),
(62, 'asd', 123, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `nama_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `nama_status`) VALUES
(1, 'Bisa Dijual'),
(2, 'Tidak Bisa Dijual');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `kategori_id` (`kategori_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `kategori_id` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
