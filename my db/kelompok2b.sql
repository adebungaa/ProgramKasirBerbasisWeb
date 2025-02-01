-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2021 at 03:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `kelompok2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Pakaian'),
(2, 'Minuman'),
(4, 'Makanan'),
(5, 'Alat Kebersihan'),
(6, 'Alat Masak'),
(7, 'Teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_penjualan`
--

CREATE TABLE `laporan_penjualan` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `kasir` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `laporan_penjualan`
--

INSERT INTO `laporan_penjualan` (`id`, `kdproduk`, `nm_produk`, `kategori`, `jumlah_beli`, `total`, `tanggal`, `jam`, `kasir`) VALUES
(48, 'KD001', 'Ayam Goreng', 'Makanan', 5, 50000, '2021-12-26', '09:26 am', 'Kelompok2B'),
(49, 'KD002', 'Ayam Bakar', 'Makanan', 10, 150000, '2021-12-26', '09:27 am', 'Kelompok2B'),
(50, 'KD001', 'Ayam Goreng', 'Makanan', 3, 30000, '2021-12-26', '09:29 am', 'Kelompok2B'),
(51, 'KD005', 'Teh Manis', 'Minuman', 5, 125000, '2021-12-26', '09:30 am', 'Kelompok2B'),
(52, 'KD004', 'Jaket', 'Pakaian', 10, 700000, '2021-12-26', '09:31 am', 'Kelompok2B'),
(53, 'KD002', 'Ayam Bakar', 'Makanan', 30, 450000, '2021-12-26', '09:33 am', 'Kelompok2B'),
(54, 'KD003', 'Baju', 'Pakaian', 30, 1500000, '2021-12-26', '09:33 am', 'Kelompok2B');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `namapel` text NOT NULL,
  `jeniskel` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `namapel`, `jeniskel`, `alamat`, `kontak`) VALUES
(5, 'Kelompok2B', '-', 'Indonesia', '081'),
(6, 'Albert Nathaniel', 'Laki-laki', 'Medan', '081'),
(7, 'Ferdy Fraddly Aldy Nainggolan', 'Laki-laki', 'Medan', '081'),
(8, 'M Adiffa Pasca Desky', 'Laki-laki', 'Medan', '081'),
(9, 'Syah Putra', 'Laki-laki', 'Medan', '081'),
(10, 'Ade Bunga Dwi Setiayu', 'Perempuan', 'Medan', '081'),
(11, 'Resha Amandha Zaliantie', 'Perempuan', 'Medan', '081');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `level` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(11, 'Kelompok2B', '21232f297a57a5a743894a0e4a801fc3', 'Kelompok2B', 'admin', '482-340-Profil.png'),
(15, 'Kelompok2B', 'c7911af3adbd12a035b289556d96470a', 'Kelompok2B', 'kasir', '215-340-Profil.png'),
(20, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', '43-340-Profil.png'),
(21, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 'kasir', '716-340-Profil.png');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `satuan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id`, `satuan`) VALUES
(1, 'Bungkus'),
(3, 'Ekor'),
(4, 'Buah'),
(5, 'Gelas'),
(6, 'Botol');

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id` int(11) NOT NULL,
  `noinv` text NOT NULL,
  `tanggal` text NOT NULL,
  `jam` text NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `rak` text NOT NULL,
  `supplier` text NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `admin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id`, `noinv`, `tanggal`, `jam`, `kdproduk`, `nm_produk`, `kategori`, `rak`, `supplier`, `stok`, `jml_masuk`, `admin`) VALUES
(45, 'INV001', '2021-12-26', '09:18 am', 'KD002', 'Ayam Bakar', 'Makanan', 'RAK 1', 'Kelompok2B', 27, 13, 'Kelompok2B'),
(46, 'INV002', '2021-12-26', '09:18 am', 'KD001', 'Ayam Goreng', 'Makanan', 'RAK 1', 'Kelompok2B', 30, 5, 'Kelompok2B'),
(47, 'INV003', '2021-12-26', '09:19 am', 'KD004', 'Jaket', 'Pakaian', 'Rak 2', 'Kelompok2B', 30, 5, 'Kelompok2B'),
(48, 'INV004', '2021-12-26', '09:19 am', 'KD003', 'Baju', 'Pakaian', 'Rak 2', 'Kelompok2B', 20, 5, 'Kelompok2B'),
(49, 'INV005', '2021-12-26', '09:19 am', 'KD005', 'Teh Manis', 'Minuman', 'Rak 3', 'Kelompok2B', 20, 10, 'Kelompok2B'),
(50, 'INV006', '2021-12-26', '09:38 am', 'KD006', 'Air Putih', 'Minuman', 'Rak 3', 'Kelompok2B', 20, 20, 'Kelompok2B');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kdspl` text NOT NULL,
  `namaspl` text NOT NULL,
  `alamatspl` text NOT NULL,
  `kontakspl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `kdspl`, `namaspl`, `alamatspl`, `kontakspl`) VALUES
(7, 'SPL01', 'Kelompok2B', 'Indonesia', '081'),
(8, 'SPL02', 'Albert Nathaniel', 'Medan', '081'),
(9, 'SPL03', 'Ferdy Fraddly Aldy Nainggolan', 'Medan', '081'),
(10, 'SPL04', 'M Adiffa Pasca Desky', 'Medan', '081'),
(11, 'SPL05', 'Syah Putra', 'Medan', '081'),
(12, 'SPL06', 'Ade Bunga Dwi Setiayu', 'Medan', '081'),
(13, 'SPL07', 'Resha Amandha Zaliantie', 'Medan', '081');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` text NOT NULL,
  `rak` text NOT NULL,
  `supplier` text NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `kdproduk`, `nm_produk`, `kategori`, `stok`, `satuan`, `rak`, `supplier`, `harga`) VALUES
(21, 'KD001', 'Ayam Goreng', 'Makanan', 22, 'Ekor', 'RAK 1', 'Kelompok2B', 10000),
(22, 'KD002', 'Ayam Bakar', 'Makanan', 0, 'Ekor', 'RAK 1', 'Kelompok2B', 15000),
(23, 'KD003', 'Baju', 'Pakaian', -5, 'Buah', 'Rak 2', 'Kelompok2B', 50000),
(24, 'KD004', 'Jaket', 'Pakaian', 25, 'Buah', 'Rak 2', 'Kelompok2B', 70000),
(25, 'KD005', 'Teh Manis', 'Minuman', 25, 'Gelas', 'Rak 3', 'Kelompok2B', 5000),
(26, 'KD006', 'Air Putih', 'Minuman', 40, 'Botol', 'Rak 3', 'Kelompok2B', 5000),
(27, 'KD007', 'Sapu', 'Alat Kebersihan', 20, 'Buah', 'Rak 4', 'Kelompok2B', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id` int(11) NOT NULL,
  `kdrak` text NOT NULL,
  `namarak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id`, `kdrak`, `namarak`) VALUES
(1, 'RAK001', 'RAK 1'),
(3, 'RAK002', 'Rak 2'),
(4, 'RAK003', 'Rak 3'),
(5, 'RAK004', 'Rak 4'),
(6, 'RAK005', 'Rak 5'),
(7, 'RAK006', 'Rak 6'),
(9, 'RAK007', 'Rak 7');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_temp`
--

CREATE TABLE `transaksi_temp` (
  `id` int(11) NOT NULL,
  `kdproduk` text NOT NULL,
  `nm_produk` text NOT NULL,
  `kategori` text NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `laporan_penjualan`
--
ALTER TABLE `laporan_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi_temp`
--
ALTER TABLE `transaksi_temp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;
