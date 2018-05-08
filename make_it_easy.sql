-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2018 at 01:56 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `make_it_easy`
--

-- --------------------------------------------------------

--
-- Table structure for table `harga_cabai`
--

CREATE TABLE `harga_cabai` (
  `id` int(10) NOT NULL,
  `id_cabai` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_bs` int(10) NOT NULL,
  `harga_bersih` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_cabai`
--

INSERT INTO `harga_cabai` (`id`, `id_cabai`, `tanggal`, `harga_bs`, `harga_bersih`) VALUES
(1, 1, '2018-04-23', 4000, 5000),
(2, 2, '2018-04-23', 5000, 6000),
(3, 3, '2018-04-23', 6000, 7000),
(4, 4, '2018-04-23', 4000, 5000),
(5, 1, '2018-04-24', 4000, 5000),
(6, 2, '2018-04-24', 5000, 6000),
(7, 3, '2018-04-24', 5000, 6000),
(8, 4, '2018-04-24', 4000, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bon`
--

CREATE TABLE `tb_bon` (
  `id` int(3) NOT NULL,
  `barang` varchar(35) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabai`
--

CREATE TABLE `tb_cabai` (
  `id` int(3) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `jenis` varchar(45) NOT NULL,
  `harga_bs` int(10) NOT NULL,
  `harga_bersih` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cabai`
--

INSERT INTO `tb_cabai` (`id`, `kode`, `jenis`, `harga_bs`, `harga_bersih`) VALUES
(1, 'RW', 'Cabai Rawit', 2000, 10000),
(2, 'KR', 'Cabai Keriting', 2000, 9000),
(3, 'MR', 'Cabai Merah', 2000, 7500),
(4, 'HJ', 'Cabai Hijau', 2000, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id` int(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `saldo` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petani`
--

CREATE TABLE `tb_petani` (
  `id` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `usia` int(3) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `saldo` int(30) NOT NULL,
  `jaminan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petani`
--

INSERT INTO `tb_petani` (`id`, `nama`, `usia`, `desa`, `alamat`, `no_telp`, `saldo`, `jaminan`) VALUES
(2, 'Isna', 18, 'banjardadap', 'p41', '0878', 5000000, 'nope'),
(3, 'Ipeh', 21, 'magelang', 'muntilan', '08999', 600000, 'buku');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petani`
--

CREATE TABLE `transaksi_petani` (
  `id` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `asal_daerah` varchar(30) NOT NULL,
  `kode_cabai` varchar(4) NOT NULL,
  `berat_kotor` int(5) NOT NULL,
  `berat_bs` int(4) NOT NULL,
  `berat_bersih` int(4) NOT NULL,
  `jumlah_uang` int(20) NOT NULL,
  `bon` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petani`
--

INSERT INTO `transaksi_petani` (`id`, `tanggal`, `nama_petani`, `asal_daerah`, `kode_cabai`, `berat_kotor`, `berat_bs`, `berat_bersih`, `jumlah_uang`, `bon`) VALUES
(1, '2018-04-11', 'Wulansari pustipa', 'muntilan', '', 50, 4, 21, 4300000, 2000),
(2, '0000-00-00', 'Annisa Azizah', 'ngentak', 'A', 55, 4, 25, 0, 400000),
(4, '0000-00-00', 'Suparman', 'Rogobangsan', 'r', 67, 4, 67, 0, 30000),
(5, '2018-04-23', 'Sukiyem', 'Bimomartani', 'A', 15, 3, 23, 0, 7000),
(7, '2018-05-24', 'Sukiman', 'Bojong Asem', 'RW', 35, 5, 0, 0, 0),
(8, '2018-05-17', 'Suparman', 'Magelang', 'KR', 45, 3, 0, 384000, 0),
(9, '2018-05-17', 'Suparman', 'APa ya', 'KR', 45, 4, 0, 377000, 0),
(10, '2018-05-08', 'Supomo', 'Jogja', 'MR', 44, 2, 0, 319000, 0),
(11, '2018-05-16', 'Lamuna', 'Magelang', 'RW', 90, 100, 0, 100000, 0),
(12, '2018-05-18', 'tuntun', 'mana/', 'RW', 56, 40, 0, 240000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_cabai`
--
ALTER TABLE `harga_cabai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_cabai` (`id_cabai`);

--
-- Indexes for table `tb_bon`
--
ALTER TABLE `tb_bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cabai`
--
ALTER TABLE `tb_cabai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_petani`
--
ALTER TABLE `tb_petani`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_cabai`
--
ALTER TABLE `harga_cabai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_bon`
--
ALTER TABLE `tb_bon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_cabai`
--
ALTER TABLE `tb_cabai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_petani`
--
ALTER TABLE `tb_petani`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_cabai`
--
ALTER TABLE `harga_cabai`
  ADD CONSTRAINT `FK_cabai` FOREIGN KEY (`id_cabai`) REFERENCES `tb_cabai` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
