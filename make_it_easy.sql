-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2018 at 08:53 AM
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
(1, 'FW', '2018-06-07', 1000, 4000),
(2, 'KR1', '2018-06-07', 1000, 5000),
(3, 'KR2', '2018-06-07', 1000, 6000),
(4, 'RW1', '2018-06-07', 1500, 10000),
(5, 'RW2', '2018-06-07', 1500, 11000),
(11, 'RW1', '2018-05-26', 200, 8000),
(12, 'KR1', '2018-05-26', 100, 8000),
(13, 'RW2', '2018-04-24', 100, 6000),
(14, 'FW', '2018-04-24', 100, 6000),
(15, 'KR1', '2018-04-24', 100, 6000),
(16, 'KR2', '2018-05-26', 100, 6000),
(17, 'RW1', '2018-04-24', 100, 6000),
(18, 'RW2', '2018-04-24', 100, 6000),
(19, 'FW', '2018-05-17', 100, 6000),
(20, 'KR1', '2018-05-17', 100, 6000),
(21, 'KR2', '2018-05-17', 100, 6000),
(22, 'RW1', '2018-05-17', 100, 6000),
(23, 'RW2', '2018-05-17', 100, 6000),
(24, 'FW', '2018-06-08', 1000, 6000),
(25, 'FW1', '2018-06-08', 100, 6000),
(26, 'KR1', '2018-06-08', 100, 6000),
(27, 'KR2', '2018-06-08', 100, 6000),
(28, 'RW1', '2018-06-08', 100, 6000),
(29, 'RW2', '2018-06-08', 100, 6000),
(114, 'FW', '2018-06-10', 100, 6000),
(115, 'FW1', '2018-06-10', 100, 6000),
(116, 'H', '2018-06-10', 100, 6000),
(117, 'KR1', '2018-06-10', 100, 6000),
(118, 'KR2', '2018-06-10', 100, 6000),
(119, 'RW1', '2018-06-10', 100, 6000),
(120, 'RW2', '2018-06-10', 100, 6000),
(125, 'M', '2018-06-17', 1000, 7500),
(126, 'KR1', '2018-06-17', 1000, 14000),
(127, 'M', '2018-06-25', 1000, 13000),
(128, 'KR1', '2018-06-25', 800, 10000),
(129, 'KR2', '2018-06-25', 900, 11000),
(130, 'H', '2018-09-03', 1000, 13000),
(131, 'KR2', '2018-09-03', 2000, 17000),
(132, 'M', '2018-09-03', 1000, 13000),
(133, 'RW1', '2018-09-03', 1000, 10000),
(134, 'FW', '2018-09-03', 1000, 10000),
(135, 'RW2', '2018-09-03', 1000, 14000),
(136, 'KR1', '2018-09-03', 2000, 17000),
(137, 'KR2', '2018-09-21', 100, 14000),
(138, 'KR2', '2018-09-21', 2000, 6000),
(139, 'H', '2018-09-27', 1000, 14000),
(140, 'H', '2018-09-27', 1000, 14000),
(141, 'KR2', '2018-09-27', 1000, 13000),
(142, 'H', '2018-09-27', 100, 13000),
(143, 'KR2', '2018-10-01', 1000, 14000),
(144, 'H', '2018-10-01', 2000, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id`, `tanggal`, `jenis`, `harga_satuan`, `jumlah`) VALUES
(1, '2018-06-18', 'Pinjam Bank', 2000000, 1),
(2, '2018-06-27', 'Pinjam Bank', 3500000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `harga_satuan` int(15) NOT NULL,
  `jumlah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `tanggal`, `jenis`, `harga_satuan`, `jumlah`) VALUES
(1, '2018-06-18', 'Ongkir', 16000, 2),
(2, '2018-06-27', 'Plastik', 2000, 100),
(3, '2018-11-12', 'Keriting Super', 30000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bon`
--

CREATE TABLE `tb_bon` (
  `id` int(3) NOT NULL,
  `barang` varchar(35) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_bon`
--

INSERT INTO `tb_bon` (`id`, `barang`, `harga`) VALUES
(1, 'Pupuk Organik', 21000),
(2, 'Plastik Bungkus', 5500),
(3, 'Pestisida', 21000),
(5, 'Bibit Cabai', 14000),
(7, 'Bagor', 2000);

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
('FW1', 'Very Well Super', 1),
('H', 'Hijau', 1),
('KR1', 'Keriting Super', 1),
('KR2', 'Keriting Kecil', 1),
('M', 'Merah', 1),
('RW1', 'Rawit Super', 1),
('RW2', 'Rawit Kecil', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembeli`
--

CREATE TABLE `tb_pembeli` (
  `id` int(20) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `no_rek` varchar(30) DEFAULT NULL,
  `saldo` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembeli`
--

INSERT INTO `tb_pembeli` (`id`, `nama`, `alamat`, `no_telp`, `no_rek`, `saldo`) VALUES
(1, 'Tina Toon', 'Banjarmasin kota no 432', '089778456789', '90003444568', -5000000),
(2, 'Sujoko Tedjo', 'Tangerang Selatan', '08999777789', '(BNI) 9008776554', 100000),
(3, 'Raden Roro', 'Muntilan no 365', '3232452', '2131311', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_petani`
--

CREATE TABLE `tb_petani` (
  `id` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nama_panggil` varchar(20) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `saldo` int(30) NOT NULL,
  `jaminan` varchar(50) DEFAULT NULL,
  `kemitraan` tinyint(1) NOT NULL DEFAULT '1',
  `status_pinjaman` int(1) NOT NULL DEFAULT '0',
  `tenggat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petani`
--

INSERT INTO `tb_petani` (`id`, `nama`, `nama_panggil`, `desa`, `alamat`, `no_telp`, `saldo`, `jaminan`, `kemitraan`, `status_pinjaman`, `tenggat`) VALUES
(1, 'Nadya Rahmatun', 'tuntun', 'payakumbuh', 'Perumahan Banjardadap p41 Potorono Banguntapan Bantul DIY', '087878787888', 40000, '', 1, 0, '0000-00-00'),
(2, 'Annisa Amalia', 'Nisa', 'Surakarta', 'jl solo baru no 234', '08009090909', 136000, '', 1, 0, '0000-00-00'),
(3, 'Aliefya Fadhila', 'ipeh', 'Muntilan', 'Muntilan no 365', '087999987777', -6000000, 'BPKB', 1, 0, NULL),
(4, 'Suparman', 'gaprek', 'Ngasem', 'jl pelita hati no 76', '08783458876', 20000, NULL, 0, 0, '0000-00-00'),
(5, 'Isna', 'Isna', 'Jogja', 'Perumahan Banjardadap', '0878387246878', 500000, '', 1, 0, '2018-10-31'),
(6, 'Salsabila', 'Bila', 'Purworejo', 'Banjarmasin kota no 432', '08999768787999', 18500, '', 1, 0, '0000-00-00'),
(7, 'Lucinta', 'Luna', 'Nglambor', 'Muntilan no 365', '09787888888', 300000, '', 1, 0, '0000-00-00'),
(8, 'Ichi', 'Chichi', 'Bajarndadap', 'Muntilan no 365', '12121212', 200000, '', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_bon`
--

CREATE TABLE `transaksi_bon` (
  `id` int(20) NOT NULL,
  `id_transaksi` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petani` int(10) NOT NULL,
  `barang` varchar(30) DEFAULT NULL,
  `harga` int(8) DEFAULT NULL,
  `kuantitas` int(5) DEFAULT NULL,
  `ambil_uang` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_bon`
--

INSERT INTO `transaksi_bon` (`id`, `id_transaksi`, `tanggal`, `id_petani`, `barang`, `harga`, `kuantitas`, `ambil_uang`) VALUES
(34, 0, '2018-06-18', 2, 'Bibit Cabai', 14000, 2, 0),
(35, 0, '2018-06-18', 2, 'Pestisida', 21000, 1, 0),
(36, 0, '2018-06-18', 2, NULL, NULL, NULL, 1000000),
(37, 0, '2018-06-25', 5, NULL, NULL, NULL, 6000000),
(38, 0, '2018-09-03', 7, 'Pestisida', 21000, 5, 0),
(39, 0, '2018-09-03', 7, NULL, NULL, NULL, 200000),
(51, 22, '2018-09-14', 4, 'Uang', 335000, 1, 335000),
(52, 23, '2018-09-17', 2, 'Pestisida', 21000, 2, 0),
(53, 23, '2018-09-17', 2, 'Uang', 100000, 1, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembeli`
--

CREATE TABLE `transaksi_pembeli` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_pembeli` int(8) NOT NULL,
  `colly` int(8) DEFAULT NULL,
  `kode` varchar(5) DEFAULT NULL,
  `bersih` decimal(8,2) DEFAULT NULL,
  `harga` int(16) DEFAULT NULL,
  `transferan` int(16) DEFAULT NULL,
  `saldo` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembeli`
--

INSERT INTO `transaksi_pembeli` (`id`, `tanggal`, `id_pembeli`, `colly`, `kode`, `bersih`, `harga`, `transferan`, `saldo`) VALUES
(2, '2018-09-21', 2, 4, 'KR2', '135.00', 20000, 2700000, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pembelinonmitra`
--

CREATE TABLE `transaksi_pembelinonmitra` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `asal_daerah` varchar(20) NOT NULL,
  `kode_cabai` varchar(5) NOT NULL,
  `colly` int(5) NOT NULL,
  `bersih` decimal(5,2) NOT NULL,
  `harga` int(8) NOT NULL,
  `transferan` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pembelinonmitra`
--

INSERT INTO `transaksi_pembelinonmitra` (`id`, `tanggal`, `nama_pembeli`, `asal_daerah`, `kode_cabai`, `colly`, `bersih`, `harga`, `transferan`) VALUES
(3, '2018-06-18', 'Tina', 'Jogja', 'M', 4, '120.00', 14000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petani`
--

CREATE TABLE `transaksi_petani` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `id_petani` int(8) NOT NULL,
  `kode_cabai` varchar(5) DEFAULT NULL,
  `berat_kotor` decimal(8,2) DEFAULT NULL,
  `berat_bs` decimal(8,2) DEFAULT NULL,
  `berat_susut` decimal(4,2) DEFAULT NULL,
  `bon` int(16) DEFAULT NULL,
  `saldo` int(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petani`
--

INSERT INTO `transaksi_petani` (`id`, `tanggal`, `id_petani`, `kode_cabai`, `berat_kotor`, `berat_bs`, `berat_susut`, `bon`, `saldo`) VALUES
(5, '2018-09-03', 4, 'KR1', '90.00', '5.00', '0.50', NULL, 2440000),
(6, '2018-09-03', 2, 'M', '110.00', '5.00', '0.00', NULL, 4150000),
(22, '2018-09-14', 4, NULL, NULL, NULL, NULL, 335000, 20000),
(23, '2018-09-17', 2, NULL, NULL, NULL, NULL, 142000, 136000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_petaninonmitra`
--

CREATE TABLE `transaksi_petaninonmitra` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `nama_petani` varchar(30) NOT NULL,
  `kode_cabai` varchar(5) NOT NULL,
  `harga_bersih` int(10) NOT NULL,
  `harga_bs` int(10) NOT NULL,
  `berat_kotor` decimal(5,3) NOT NULL,
  `berat_bs` decimal(5,3) NOT NULL,
  `berat_susut` decimal(5,3) NOT NULL DEFAULT '0.000',
  `bon` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_petaninonmitra`
--

INSERT INTO `transaksi_petaninonmitra` (`id`, `tanggal`, `nama_petani`, `kode_cabai`, `harga_bersih`, `harga_bs`, `berat_kotor`, `berat_bs`, `berat_susut`, `bon`) VALUES
(2, '2018-06-18', 'Supomon', 'M', 6000, 1500, '90.000', '3.000', '0.000', NULL),
(3, '2018-09-04', 'Lamuna', 'KR1', 17000, 2000, '99.999', '5.000', '0.000', NULL),
(4, '2018-09-04', 'Nadya Rahmatun', 'H', 13000, 1000, '90.000', '4.000', '0.000', NULL);

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
  ADD KEY `FK_transaksiPembeli` (`id_pembeli`),
  ADD KEY `FK_transpembeliCabai` (`kode`);

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
  ADD KEY `FK_transaksiPetani` (`id_petani`),
  ADD KEY `FK_transaksiCabai` (`kode_cabai`);

--
-- Indexes for table `transaksi_petaninonmitra`
--
ALTER TABLE `transaksi_petaninonmitra`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bon`
--
ALTER TABLE `tb_bon`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_pembeli`
--
ALTER TABLE `tb_pembeli`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_petani`
--
ALTER TABLE `tb_petani`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `transaksi_bon`
--
ALTER TABLE `transaksi_bon`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_pembelinonmitra`
--
ALTER TABLE `transaksi_pembelinonmitra`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `transaksi_petaninonmitra`
--
ALTER TABLE `transaksi_petaninonmitra`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_cabai_petani`
--
ALTER TABLE `harga_cabai_petani`
  ADD CONSTRAINT `FK_hargaCabaiPetani` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`);

--
-- Constraints for table `transaksi_pembeli`
--
ALTER TABLE `transaksi_pembeli`
  ADD CONSTRAINT `FK_transaksiPembeli` FOREIGN KEY (`id_pembeli`) REFERENCES `tb_pembeli` (`id`),
  ADD CONSTRAINT `FK_transpembeliCabai` FOREIGN KEY (`kode`) REFERENCES `tb_cabai` (`kode`);

--
-- Constraints for table `transaksi_petani`
--
ALTER TABLE `transaksi_petani`
  ADD CONSTRAINT `FK_transaksiCabai` FOREIGN KEY (`kode_cabai`) REFERENCES `tb_cabai` (`kode`),
  ADD CONSTRAINT `FK_transaksiPetani` FOREIGN KEY (`id_petani`) REFERENCES `tb_petani` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
