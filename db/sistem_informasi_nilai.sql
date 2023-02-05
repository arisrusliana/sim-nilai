-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 04:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi_nilai`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbljadwal`
--

CREATE TABLE `tbljadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kode_jadwal` varchar(10) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `kode_pelajaran` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbljadwal`
--

INSERT INTO `tbljadwal` (`id_jadwal`, `kode_jadwal`, `kode_kelas`, `kode_pelajaran`, `nip`) VALUES
(1, 'Jd-001', 'XIIA1', 'X-ALGO-1', '20200101 01 001');

-- --------------------------------------------------------

--
-- Table structure for table `tblkelas`
--

CREATE TABLE `tblkelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblkelas`
--

INSERT INTO `tblkelas` (`id_kelas`, `kode_kelas`, `nama_kelas`) VALUES
(3, 'XIIA1', 'XII IPA1'),
(4, 'XIIA2', 'XII IPA 2'),
(5, 'XIA1', 'XI IPA 1'),
(6, 'XIA2', 'XI IPA 2'),
(7, 'XA1', 'X IPA 1'),
(8, 'XA2', 'X IPA 2');

-- --------------------------------------------------------

--
-- Table structure for table `tblpegawai`
--

CREATE TABLE `tblpegawai` (
  `id_nip` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `kota` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpegawai`
--

INSERT INTO `tblpegawai` (`id_nip`, `nip`, `password`, `nama_pegawai`, `jabatan`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `alamat`, `kota`) VALUES
(2, '20200101 01 001', '123456', 'Aris Rusliana', 'Guru', 'Laki-laki', 'Majalengka', '05-09-1987', 'Blok Manis RT 002 RW 001 Desa Cipinang Kec. Rajagaluh', 'Majalengka');

-- --------------------------------------------------------

--
-- Table structure for table `tblpelajaran`
--

CREATE TABLE `tblpelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `kd_pelajaran` varchar(20) NOT NULL,
  `nama_pelajaran` varchar(50) NOT NULL,
  `semester` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpelajaran`
--

INSERT INTO `tblpelajaran` (`id_pelajaran`, `kd_pelajaran`, `nama_pelajaran`, `semester`) VALUES
(2, 'X-ALGO-1', 'Algoritma Kelas X Semester 1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tblpengkelasan`
--

CREATE TABLE `tblpengkelasan` (
  `id_pengkelasan` int(11) NOT NULL,
  `kode_kelas` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpengkelasan`
--

INSERT INTO `tblpengkelasan` (`id_pengkelasan`, `kode_kelas`, `nis`) VALUES
(1, 'XIIA2', '202201001');

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE `tblsiswa` (
  `id_nis` int(11) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `alamat_siswa` varchar(100) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `nama_ayah` varchar(30) NOT NULL,
  `pekerjaan_ayah` varchar(30) NOT NULL,
  `nama_ibu` varchar(30) NOT NULL,
  `pekerjaan_ibu` varchar(30) NOT NULL,
  `alamat_ortu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`id_nis`, `nis`, `password`, `nama_siswa`, `jk`, `tempat_lahir`, `tgl_lahir`, `alamat_siswa`, `kota`, `nama_ayah`, `pekerjaan_ayah`, `nama_ibu`, `pekerjaan_ibu`, `alamat_ortu`) VALUES
(1, '202201001', 'e10adc3949ba59abbe56e057f20f883e', 'Azka Khairy Arfa', 'Laki-laki', 'Majalengka', '14-05-2015', 'Blok Manis RT 002 RW 001 Desa Cipinang Kec. Rajaga', 'Majalengka', 'Aris Rusliana', 'Programmer', 'Fani Rizki Novita', 'Mengurus Rumah Tangga', 'Blok Manis RT 002 RW 001 Desa Cipinang Kec. Rajaga');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbljadwal`
--
ALTER TABLE `tbljadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tblkelas`
--
ALTER TABLE `tblkelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tblpegawai`
--
ALTER TABLE `tblpegawai`
  ADD PRIMARY KEY (`id_nip`);

--
-- Indexes for table `tblpelajaran`
--
ALTER TABLE `tblpelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `tblpengkelasan`
--
ALTER TABLE `tblpengkelasan`
  ADD PRIMARY KEY (`id_pengkelasan`);

--
-- Indexes for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  ADD PRIMARY KEY (`id_nis`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbljadwal`
--
ALTER TABLE `tbljadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblkelas`
--
ALTER TABLE `tblkelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblpegawai`
--
ALTER TABLE `tblpegawai`
  MODIFY `id_nip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpelajaran`
--
ALTER TABLE `tblpelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpengkelasan`
--
ALTER TABLE `tblpengkelasan`
  MODIFY `id_pengkelasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  MODIFY `id_nis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
