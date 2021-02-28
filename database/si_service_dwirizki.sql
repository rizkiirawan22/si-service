-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 03:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_service_dwirizki`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan_service_dwirizki`
--

CREATE TABLE `tbl_permintaan_service_dwirizki` (
  `id` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `tipe_hp` varchar(25) NOT NULL,
  `imei` varchar(15) NOT NULL,
  `status` enum('Selesai','Diproses','Dibatalkan') NOT NULL,
  `keterangan` text NOT NULL,
  `biaya` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_permintaan_service_dwirizki`
--

INSERT INTO `tbl_permintaan_service_dwirizki` (`id`, `tgl_masuk`, `nama`, `no_hp`, `tipe_hp`, `imei`, `status`, `keterangan`, `biaya`) VALUES
(1, '2021-02-28', 'Dwi', '0812361234124', 'Iphone 13 Pro Max', '32090248345345', 'Diproses', 'LCD Pecah, Touchscreen Pecah', 0),
(2, '2021-02-28', 'Dwi', '0812361234124', 'Iphone 13 Pro Max', '32090248345345', 'Diproses', 'Lcd dan TS pecah', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_dwirizki`
--

CREATE TABLE `tbl_user_dwirizki` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `passwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user_dwirizki`
--

INSERT INTO `tbl_user_dwirizki` (`id`, `nama`, `username`, `passwd`) VALUES
(1, 'Admin', 'admin', 'f3c263e85864988daea78fb5eea0ac9b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_permintaan_service_dwirizki`
--
ALTER TABLE `tbl_permintaan_service_dwirizki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_dwirizki`
--
ALTER TABLE `tbl_user_dwirizki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_permintaan_service_dwirizki`
--
ALTER TABLE `tbl_permintaan_service_dwirizki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_dwirizki`
--
ALTER TABLE `tbl_user_dwirizki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
