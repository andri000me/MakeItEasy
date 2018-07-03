-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2018 at 12:18 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `harga_cabai_pembeli`
--

CREATE TABLE `harga_cabai_pembeli` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `kode_cabai` varchar(5) NOT NULL,
  `harga_bersih` int(10) NOT NULL,
  `harga_bs` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `harga_cabai_pembeli`
--

INSERT INTO `harga_cabai_pembeli` (`id`, `tanggal`, `kode_cabai`, `harga_bersih`, `harga_bs`) VALUES
(1, '2018-06-07', 'FW', 6000, 1000),
(2, '2018-06-07', 'KR1', 7000, 1000),
(3, '2018-06-07', 'KR2', 8000, 1000),
(4, '2018-06-07', 'RW1', 9000, 1500),
(5, '2018-06-07', 'RW2', 8000, 800),
(6, '2018-05-28', 'FW', 6000, 100),
(7, '2018-05-28', 'KR1', 6000, 100),
(8, '2018-05-28', 'KR2', 6000, 100),
(9, '2018-05-28', 'RW1', 6000, 100),
(10, '2018-05-28', 'RW2', 6000, 100);

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
(1, 'FW', '2018-06-07', 1000, 4000),
(2, 'KR1', '2018-06-07', 1000, 5000),
(3, 'KR2', '2018-06-07', 1000, 6000),
(4, 'RW1', '2018-06-07', 1500, 10000),
(5, 'RW2', '2018-06-07', 1500, 11000),
(11, 'RW1', '2018-05-25', 200, 8000),
(12, 'KR1', '2018-05-25', 100, 8000),
(13, 'RW2', '2018-04-24', 100, 6000),
(14, 'FW', '2018-04-24', 100, 6000),
(15, 'KR1', '2018-04-24', 100, 6000),
(16, 'KR2', '2018-04-24', 100, 6000),
(17, 'RW1', '2018-04-24', 100, 6000),
(18, 'RW2', '2018-04-24', 100, 6000),
(19, 'FW', '2018-05-17', 100, 6000),
(20, 'KR1', '2018-05-17', 100, 6000),
(21, 'KR2', '2018-05-17', 100, 6000),
(22, 'RW1', '2018-05-17', 100, 6000),
(23, 'RW2', '2018-05-17', 100, 6000),
(24, 'FW', '2018-06-08', 100, 6000),
(25, 'FW1', '2018-06-08', 100, 6000),
(26, 'KR1', '2018-06-08', 100, 6000),
(27, 'KR2', '2018-06-08', 100, 6000),
(28, 'RW1', '2018-06-08', 100, 6000),
(29, 'RW2', '2018-06-08', 100, 6000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_satuan` int(16) NOT NULL,
  `jumlah` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_satuan` int(16) NOT NULL,
  `jumlah` decimal(8,1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_bon`
--

CREATE TABLE `tb_bon` (
  `id` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `barang` varchar(35) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bon`
--

INSERT INTO `tb_bon` (`id`, `tanggal`, `barang`, `harga`) VALUES
(1, '2018-06-08', 'Pupuk Organik', 20000),
(2, '2018-06-08', 'Plastik Bungkus', 5000),
(3, '2018-04-24', 'Pestisida', 200000),
(4, '2018-04-23', 'Pestisida', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_cabai`
--

CREATE TABLE `tb_cabai` (
  `kode` varchar(4) NOT NULL,
  `jenis` varchar(15) NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cabai`
--

INSERT INTO `tb_cabai` (`kode`, `jenis`, `aktif`) VALUES
('FW', 'Very Well', 1),
('FW1', 'Very Well 1', 1),
('KR1', 'Keriting Super', 1),
('KR2', 'Keriting Kecil', 1),
('RW1', 'Rawit Super', 1),
('RW2', 'Rawit Kecil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `saldo` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id`, `nama`, `alamat`, `no_telp`, `saldo`) VALUES
('1', 'Tina Toon', 'Jember', '0878987777', 13650000),
('2', 'Aliefya Fadhila', 'Muntilan', '0897865554', -2840000);

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
  `kemitraan` tinyint(1) DEFAULT '1',
  `tenggat` date DEFAULT NULL,
  `jaminan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petani`
--

INSERT INTO `tb_petani` (`id`, `nama`, `nama_panggil`, `desa`, `alamat`, `no_telp`, `saldo`, `kemitraan`, `tenggat`, `jaminan`) VALUES
('2', 'Isna', 'zen', 'banjardadap', 'p41', '0878', -1727000, 1, '2018-07-31', 'nope'),
('3', 'Ipeh', 'aliefya', 'magelang', 'muntilan', '08999', 852300, 0, NULL, 'buku');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bon`
--

CREATE TABLE `transaksi_bon` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petani` int(8) NOT NULL,
  `barang` varchar(30) NOT NULL,
  `harga` int(16) NOT NULL,
  `kuantitas` int(8) NOT NULL,
  `ambil_uang` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_bon`
--

INSERT INTO `transaksi_bon` (`id`, `tanggal`, `id_petani`, `barang`, `harga`, `kuantitas`, `ambil_uang`) VALUES
(1, '2018-07-03', 2, 'Pestisida', 20000, 3, 0),
(2, '2018-07-03', 2, '', 0, 0, 7000000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembeli`
--

CREATE TABLE `transaksi_pembeli` (
  `id` int(4) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembeli` varchar(4) NOT NULL,
  `colly` int(8) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `bersih` int(8) DEFAULT NULL,
  `harga` int(16) NOT NULL,
  `transferan` int(11) DEFAULT NULL,
  `saldo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembeli`
--

INSERT INTO `transaksi_pembeli` (`id`, `tanggal`, `id_pembeli`, `colly`, `kode`, `bersih`, `harga`, `transferan`, `saldo`) VALUES
(15, '2018-07-01', '2', 6, 'RW2', 120, 7000, 1000000, -2840000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelinonmitra`
--

CREATE TABLE `transaksi_pembelinonmitra` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pembeli` varchar(20) NOT NULL,
  `colly` int(8) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `bersih` decimal(5,3) NOT NULL,
  `harga` int(16) NOT NULL,
  `transferan` int(16) NOT NULL,
  `saldo` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petani`
--

CREATE TABLE `transaksi_petani` (
  `id` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petani` varchar(8) NOT NULL,
  `kode_cabai` varchar(4) DEFAULT NULL,
  `berat_kotor` int(6) DEFAULT NULL,
  `berat_bs` int(5) DEFAULT NULL,
  `bon` int(10) DEFAULT NULL,
  `saldo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petani`
--

INSERT INTO `transaksi_petani` (`id`, `tanggal`, `id_petani`, `kode_cabai`, `berat_kotor`, `berat_bs`, `bon`, `saldo`) VALUES
(4, '2018-05-26', '3', 'KR2', 50, 3, NULL, 40000),
(5, '2018-05-26', '2', 'RW1', 35, 2, NULL, 5333000),
(6, '2018-06-08', '3', 'KR1', 45, 3, NULL, 852300),
(7, '2018-07-03', '2', NULL, NULL, NULL, 80000, 5253000),
(8, '2018-07-03', '2', NULL, NULL, NULL, 7060000, -1727000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petaninonmitra`
--

CREATE TABLE `transaksi_petaninonmitra` (
  `id` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_petani` varchar(20) NOT NULL,
  `kode_cabai` varchar(8) NOT NULL,
  `harga_bs` int(8) NOT NULL,
  `harga_bersih` int(8) NOT NULL,
  `berat_kotor` decimal(5,3) NOT NULL,
  `berat_bs` decimal(5,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petaninonmitra`
--

INSERT INTO `transaksi_petaninonmitra` (`id`, `tanggal`, `nama_petani`, `kode_cabai`, `harga_bs`, `harga_bersih`, `berat_kotor`, `berat_bs`) VALUES
(1, '2018-07-03', 'Sukirman', 'KR1', 1000, 2500, '40.000', '3.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `harga_cabai_pembeli`
--
ALTER TABLE `harga_cabai_pembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cabaipembeli` (`kode_cabai`);

--
-- Indexes for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_hargaCabaiPetani` (`kode_cabai`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transaksi_bon`
--
ALTER TABLE `transaksi_bon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fkTransaksiPembeli` (`id_pembeli`),
  ADD KEY `fkPembelikode` (`kode`);

--
-- Indexes for table `transaksi_pembelinonmitra`
--
ALTER TABLE `transaksi_pembelinonmitra`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kodecabaiTrans` (`kode_cabai`),
  ADD KEY `FK_idpetanitransaksi` (`id_petani`);

--
-- Indexes for table `transaksi_petaninonmitra`
--
ALTER TABLE `transaksi_petaninonmitra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_cabai_pembeli`
--
ALTER TABLE `harga_cabai_pembeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_bon`
--
ALTER TABLE `tb_bon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi_bon`
--
ALTER TABLE `transaksi_bon`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transaksi_pembelinonmitra`
--
ALTER TABLE `transaksi_pembelinonmitra`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaksi_petaninonmitra`
--
ALTER TABLE `transaksi_petaninonmitra`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_cabai_pembeli`
--
ALTER TABLE `harga_cabai_pembeli`
  ADD CONSTRAINT `fk_cabaipembeli` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);

--
-- Constraints for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  ADD CONSTRAINT `FK_hargaCabaiPetani` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);

--
-- Constraints for table `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  ADD CONSTRAINT `fkPembelikode` FOREIGN KEY (`kode`) REFERENCES `tb_cabai` (`kode`),
  ADD CONSTRAINT `fkTransaksiPembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `tb_pembeli` (`id`);

--
-- Constraints for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  ADD CONSTRAINT `FK_idpetanitransaksi` FOREIGN KEY (`id_petani`) REFERENCES `tb_petani` (`id`),
  ADD CONSTRAINT `FK_kodecabaiTrans` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
