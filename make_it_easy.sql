-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2018 at 09:27 AM
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
-- Table structure for table `harga_cabai_petani`
--

CREATE TABLE `harga_cabai_petani` (
  `id` int(10) NOT NULL,
  `kode_cabai` varchar(4) NOT NULL,
  `tanggal` date NOT NULL,
  `harga_bs` int(15) NOT NULL,
  `harga_bersih` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_cabai_petani`
--

INSERT INTO `harga_cabai_petani` (`id`, `kode_cabai`, `tanggal`, `harga_bs`, `harga_bersih`) VALUES
(1, 'FW', '2018-05-18', 1000, 4000),
(2, 'KR1', '2018-05-18', 1000, 5000),
(3, 'KR2', '2018-05-18', 1000, 6000),
(4, 'RW1', '2018-05-18', 1500, 10000),
(5, 'RW2', '2018-05-18', 1500, 11000);

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
  `kode` varchar(4) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cabai`
--

INSERT INTO `tb_cabai` (`kode`, `jenis`) VALUES
('FW', 'Very Well'),
('KR1', 'Keriting Super'),
('KR2', 'Keriting Kecil'),
('RW1', 'Rawit Super'),
('RW2', 'Rawit Kecil');

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
  `id` varchar(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_panggil` varchar(20) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `saldo` int(30) NOT NULL,
  `jaminan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petani`
--

INSERT INTO `tb_petani` (`id`, `nama`, `nama_panggil`, `desa`, `alamat`, `no_telp`, `saldo`, `jaminan`) VALUES
('2', 'Isna', '18', 'banjardadap', 'p41', '0878', 5000000, 'nope'),
('3', 'Ipeh', '21', 'magelang', 'muntilan', '08999', 600000, 'buku');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petani`
--

CREATE TABLE `transaksi_petani` (
  `id` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petani` varchar(8) NOT NULL,
  `kode_cabai` varchar(4) NOT NULL,
  `berat_kotor` int(6) NOT NULL,
  `berat_bs` int(5) NOT NULL,
  `bon` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petani`
--

INSERT INTO `transaksi_petani` (`id`, `tanggal`, `id_petani`, `kode_cabai`, `berat_kotor`, `berat_bs`, `bon`) VALUES
(1, '2018-05-14', '2', 'FW', 50, 2, 0),
(2, '2018-05-14', '3', 'KR1', 44, 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hargaCabaiPetani` (`kode_cabai`);

--
-- Indexes for table `tb_bon`
--
ALTER TABLE `tb_bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_cabai`
--
ALTER TABLE `tb_cabai`
  ADD PRIMARY KEY (`kode`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kodecabaiTrans` (`kode_cabai`),
  ADD KEY `FK_idpetanitransaksi` (`id_petani`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_bon`
--
ALTER TABLE `tb_bon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  ADD CONSTRAINT `FK_hargaCabaiPetani` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);

--
-- Constraints for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  ADD CONSTRAINT `FK_idpetanitransaksi` FOREIGN KEY (`id_petani`) REFERENCES `tb_petani` (`id`),
  ADD CONSTRAINT `FK_kodecabaiTrans` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
