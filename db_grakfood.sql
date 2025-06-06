-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2025 at 01:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_grakfood`
--

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `id_makanan` varchar(11) NOT NULL,
  `nama_makanan` varchar(100) NOT NULL,
  `id_resto` varchar(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`id_makanan`, `nama_makanan`, `id_resto`, `harga`) VALUES
('MAK001', 'Nasi Goreng', 'RES001', '15000.00'),
('MAK002', 'Es Teh', 'RES002', '5000.00'),
('MAK003', 'Ayam Bakar', 'RES001', '22000.00'),
('MAK004', 'Sate Ayam', 'RES003', '18000.00'),
('MAK005', 'Mie Goreng', 'RES002', '13000.00');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama_pegawai` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `username`, `password`, `nama_pegawai`) VALUES
('PEG001', 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin Garang');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `no_hp`) VALUES
('PEL001', 'Fajar', '081234567001'),
('PEL002', 'Mumtaz', '081234567002'),
('PEL003', 'Nadia', '081234567003'),
('PEL004', 'Raka', '081234567004'),
('PEL005', 'Laras', '081234567005');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(11) NOT NULL,
  `id_pelanggan` varchar(11) NOT NULL,
  `id_makanan` varchar(11) NOT NULL,
  `OrderDate` date NOT NULL DEFAULT curdate(),
  `jumlah` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `id_makanan`, `OrderDate`, `jumlah`) VALUES
('PES001', 'PEL001', 'MAK001', '2024-06-01', 2),
('PES002', 'PEL002', 'MAK003', '2024-06-02', 1),
('PES003', 'PEL003', 'MAK004', '2024-06-03', 3),
('PES004', 'PEL004', 'MAK005', '2024-06-04', 2),
('PES005', 'PEL005', 'MAK002', '2024-06-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `restoran`
--

CREATE TABLE `restoran` (
  `id_resto` varchar(11) NOT NULL,
  `nama_resto` varchar(100) NOT NULL,
  `nama_pemilik` varchar(32) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restoran`
--

INSERT INTO `restoran` (`id_resto`, `nama_resto`, `nama_pemilik`, `alamat`) VALUES
('RES001', 'Warung Barokah', 'Bu Tatik', 'Jl. Merdeka No.10'),
('RES002', 'Kedai KM 30', 'Barudak Kedai', 'Jl. Sukabumi Utara'),
('RES003', 'Dapur Ayam', 'Pak Ridwan', 'Jl. Raya No.88');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id_makanan`),
  ADD KEY `id_resto` (`id_resto`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD UNIQUE KEY `id_makanan` (`id_makanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `restoran`
--
ALTER TABLE `restoran`
  ADD PRIMARY KEY (`id_resto`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`id_resto`) REFERENCES `restoran` (`id_resto`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_makanan`) REFERENCES `makanan` (`id_makanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
