-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 11, 2026 at 02:31 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian`
--

CREATE TABLE `pemakaian` (
  `no` int NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `meter_awal` smallint NOT NULL,
  `meter_akhir` smallint NOT NULL,
  `pemakaian` smallint NOT NULL,
  `tgl` date NOT NULL,
  `waktu` time NOT NULL,
  `kd_tarif` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tagihan` mediumint NOT NULL,
  `status` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemakaian`
--

INSERT INTO `pemakaian` (`no`, `username`, `meter_awal`, `meter_akhir`, `pemakaian`, `tgl`, `waktu`, `kd_tarif`, `tagihan`, `status`) VALUES
(57, 'warga', 5, 10, 5, '2026-05-11', '21:17:27', 'T1', 25000, 'BLM LUNAS'),
(58, 'warga', 15, 100, 85, '2026-05-11', '21:18:29', 'T1', 425000, 'BLM LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `kd_tarif` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tarif` int NOT NULL,
  `tipe` varchar(15) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`kd_tarif`, `tarif`, `tipe`, `status`) VALUES
('T1', 5000, 'rumah', 'AKTIF'),
('T2', 5000, 'kost', 'AKTIF');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `nama` varchar(200) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `alamat` text CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `kota` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tlp` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `level` varchar(50) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `tipe` char(5) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `alamat`, `kota`, `tlp`, `level`, `tipe`, `status`) VALUES
('admin', '$2y$10$E2xv6aV90O9KQYjph.EcVOOtCYBF/jN4gbF8kQ9k5EjunFWZBjEDe', 'Admin WEB', 'tandang', 'semarang', '08123456789', 'admin', '', 'AKTIF'),
('bendahara', '$2y$10$EGaUmBiF4pJQXP5R04t2XuTm2kEZmn6URaLSQJ3tozbxuAMVVScja', 'Bendahara Website', 'jomblang', 'semarang', '081131456789', 'bendahara', '', 'AKTIF'),
('petugas', '$2y$10$Etbn2UfmmBo0bFrxV3RicuCOZTBhoRKdXqt0IhM6Ey0PxN12EBMxS', 'pak amir', 'jl jangli', 'semarang', '081351315', 'petugas', '', 'AKTIF'),
('warga', '$2y$10$IRBbQbEtBG.5DEndYOvDoO7j84pJQjbhLO3ceIAL3JvirvFJyu4DG', 'warga', 'Polines', 'semarangg', '08137115132', 'warga', 'rumah', 'AKTIF'),
('warga1', '$2y$10$fll3X2iUg4MTA5wxMV8BKektH90U.Y88DXmyV7mGlVZslijsX6Yb2', 'Agus Joko', 'Cinde', 'semarang', '08123456789', 'warga', 'rumah', 'AKTIF'),
('warga2', '$2y$10$j8s0kRl76cATwpOS8hy3V.MjuJo31gXvunBnpQmp.G3YKo7bEKuCS', 'Ibuk Kos', 'Gondanggg', 'semarang', '085173795', 'warga', 'kost', 'AKTIF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemakaian`
--
ALTER TABLE `pemakaian`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`kd_tarif`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemakaian`
--
ALTER TABLE `pemakaian`
  MODIFY `no` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
