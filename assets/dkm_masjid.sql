-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 07:28 AM
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
-- Database: `dkm_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_background`
--

CREATE TABLE `tbl_background` (
  `id_background` int(11) NOT NULL,
  `background` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_daily`
--

CREATE TABLE `tbl_daily` (
  `id_daily` int(11) NOT NULL,
  `id_hari` int(11) NOT NULL,
  `id_penceramah` int(11) NOT NULL,
  `id_kajian` int(11) NOT NULL,
  `id_background` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto_kegiatan`
--

CREATE TABLE `tbl_foto_kegiatan` (
  `id_fotokegiatan` int(11) NOT NULL,
  `foto_kegiatan` varchar(123) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_foto_kegiatan`
--

INSERT INTO `tbl_foto_kegiatan` (`id_fotokegiatan`, `foto_kegiatan`) VALUES
(2, '6427fcbe1d855.jpg'),
(3, '6427fcc746bd3.jpg'),
(4, '64283811e27c4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hari`
--

CREATE TABLE `tbl_hari` (
  `id_hari` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_hari`
--

INSERT INTO `tbl_hari` (`id_hari`, `hari`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kajian`
--

CREATE TABLE `tbl_kajian` (
  `id_kajian` int(11) NOT NULL,
  `nama_kajian` varchar(255) NOT NULL,
  `mulai` varchar(10) NOT NULL,
  `selesai` varchar(10) NOT NULL,
  `keterangan_waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_rekening` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`id_kegiatan`, `judul`, `deskripsi`, `id_rekening`) VALUES
(6, 'Pengajian', 'Pengajian bersama', 3),
(7, 'Kajian', 'Kajian Bersama', 4),
(8, 'Belajar', 'Belajar bersama', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penceramah`
--

CREATE TABLE `tbl_penceramah` (
  `id_penceramah` int(11) NOT NULL,
  `nama_penceramah` varchar(128) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `foto` varchar(120) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qris`
--

CREATE TABLE `tbl_qris` (
  `id_qris` int(11) NOT NULL,
  `foto_qris` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `no_rek` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `keterangan`) VALUES
(3, 'Mandiri', '12345', 'Rekening Masjid atas nama DKM'),
(4, 'BSI', '2178', 'atas nama bsi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_set_kegiatan`
--

CREATE TABLE `tbl_set_kegiatan` (
  `id_setkegiatan` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `id_fotokegiatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_set_kegiatan`
--

INSERT INTO `tbl_set_kegiatan` (`id_setkegiatan`, `id_kegiatan`, `id_fotokegiatan`) VALUES
(22, 7, 3),
(23, 6, 2),
(25, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `password`) VALUES
(1, 'admin_dkm', 'admin_dkm@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_background`
--
ALTER TABLE `tbl_background`
  ADD PRIMARY KEY (`id_background`);

--
-- Indexes for table `tbl_daily`
--
ALTER TABLE `tbl_daily`
  ADD PRIMARY KEY (`id_daily`);

--
-- Indexes for table `tbl_foto_kegiatan`
--
ALTER TABLE `tbl_foto_kegiatan`
  ADD PRIMARY KEY (`id_fotokegiatan`);

--
-- Indexes for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `tbl_kajian`
--
ALTER TABLE `tbl_kajian`
  ADD PRIMARY KEY (`id_kajian`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tbl_penceramah`
--
ALTER TABLE `tbl_penceramah`
  ADD PRIMARY KEY (`id_penceramah`);

--
-- Indexes for table `tbl_qris`
--
ALTER TABLE `tbl_qris`
  ADD PRIMARY KEY (`id_qris`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_set_kegiatan`
--
ALTER TABLE `tbl_set_kegiatan`
  ADD PRIMARY KEY (`id_setkegiatan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_background`
--
ALTER TABLE `tbl_background`
  MODIFY `id_background` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_daily`
--
ALTER TABLE `tbl_daily`
  MODIFY `id_daily` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_foto_kegiatan`
--
ALTER TABLE `tbl_foto_kegiatan`
  MODIFY `id_fotokegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_hari`
--
ALTER TABLE `tbl_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kajian`
--
ALTER TABLE `tbl_kajian`
  MODIFY `id_kajian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_penceramah`
--
ALTER TABLE `tbl_penceramah`
  MODIFY `id_penceramah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_qris`
--
ALTER TABLE `tbl_qris`
  MODIFY `id_qris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_set_kegiatan`
--
ALTER TABLE `tbl_set_kegiatan`
  MODIFY `id_setkegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
