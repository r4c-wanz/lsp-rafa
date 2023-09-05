-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 13, 2023 at 08:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lsprafa`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `foto` text,
  `stok` varchar(100) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga`, `foto`, `stok`, `deskripsi`) VALUES
(1, 'Printer Cannon Terbaru', '7500000', 'printer1.png', '0', 'Printer Cannon terbaru memiliki 32 GB dan hemat baterai dengan kualitas terbaik '),
(2, 'Printer hp', '11000000', 'printer2.png', '60', 'Printer HP ringan dan cocok untuk pelajar dan mahasiswa '),
(3, 'Printer Cannon Vaio', '5000000', 'printer3.png', '30', 'Printer dengan harga murah terbaru 2023 di LaptopCaca'),
(4, 'Printer Dell Terbaru', '4000000', 'printer4.png', '81', 'Printer DELL asli baru HD tipis dan ringan 15.6 8GB SSD'),
(12, 'Printer', '4000000', 'printer6.png', '77', 'Printer Kekinian \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int NOT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_whatsapp` varchar(13) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah_barang` int NOT NULL,
  `subtotal` varchar(20) NOT NULL,
  `foto` text,
  `status` enum('proses','dikirim','ditolak','diterima') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `tanggal_transaksi`, `nama_lengkap`, `alamat`, `nomor_whatsapp`, `nama_produk`, `harga`, `jumlah_barang`, `subtotal`, `foto`, `status`) VALUES
(26, '2023-04-13', 'Caca Customer', 'jakarta pusat', '532352', 'Printer Cannon Vaio', '5000000', 1, '5000000', 'printer3.png', 'diterima');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roles` enum('Admin','Customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama_lengkap`, `password`, `roles`) VALUES
(1, 'cacaadmin', 'Caca Admin', 'admin', 'Admin'),
(2, 'cacauser', 'Caca Customer', 'user', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
