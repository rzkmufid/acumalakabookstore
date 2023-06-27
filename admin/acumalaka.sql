-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 07:15 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acumalaka`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `halaman` int(11) NOT NULL,
  `tanggalTerbit` date NOT NULL,
  `berat` double NOT NULL,
  `panjang` double NOT NULL,
  `lebar` double NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `judul`, `kategori`, `penerbit`, `pengarang`, `halaman`, `tanggalTerbit`, `berat`, `panjang`, `lebar`, `deskripsi`) VALUES
(6, 'Mangir', 'Sastra', 'Kepustakaan populer Gramedia	', 'Pramoedya Ananta Toer	', 142, '2015-08-30', 0.15, 21, 13.5, 'Setelah Majapahit runtuh pada 1527. Jawa kacau balau dan bermandi darah. Kekuasaan tak berpusat, tersebar praktis di seluruh kadipaten, kabupaten, bahkan desa. Perang terus-menerus menjadi untuk memperebutkan penguasa tunggal. Permata-permata kesenian, baik dibidang sastra, musik, dan arsitektur tidak lagi ditemukan. Selama hampir satu abad jawa di kungkung oleh pemerintah teror, yang berpolakan tujuan menghalalkan cara.	'),
(7, 'anu2', 'kategorikan', 'anoe', 'anu', 11, '1111-11-21', 1, 1, 1, 'okekan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` varchar(25) NOT NULL,
  `namaDepan` varchar(25) NOT NULL,
  `namaBelakang` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `username`, `password`, `level`, `namaDepan`, `namaBelakang`) VALUES
(4, 'user', 'pass', 'user', 'depan', 'belakang'),
(5, 'admin', 'admin', 'admin', 'admin', 'admin'),
(6, 'beniadam', '123', 'user', 'beni', 'adam');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `nomorTransaksi` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`nomorTransaksi`,`idPelanggan`,`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `nomorTransaksi` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
