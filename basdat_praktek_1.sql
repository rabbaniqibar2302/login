-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2023 at 12:40 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `basdat_praktek_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'Admin', 'Admin'),
(2, 'Admin2', 'Admin2');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(5) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `no_telp`, `alamat`, `email`, `password`) VALUES
(1, 'Irfan Maulana', '02144445555', 'BSD', 'irfan@gmail.com', '123'),
(2, 'Nur Kurmalasari', '02133336666', 'Ciledug', 'nur@gmail.com', '123'),
(3, 'Sanjaya Wijaya', '02111115555', 'Cimone', 'sanjaya@;gmail.com', '123'),
(4, 'Eva Irfanala', '02166665555', 'Tanggerang', 'eva@gmail.com', '123'),
(5, 'Ifqoh Pambudi', '02177775555', 'Cengkareng', 'ifqoh@gmail.com', '123'),
(6, 'Indah Riana', '02188885555', 'Fatmawati', 'indah@gmail.com', '123'),
(7, 'Tiwie Andrawati', '02199995555', 'Warung Jati', 'tiwie@gmail.com', '123'),
(8, 'Mus Dalifa', '02100005555', 'Jatiwaringin', 'mus@gmail.com', '123'),
(9, 'Hisbu Utomo', '02133336666', 'Salemba', 'hisbu@gmail.com', '123'),
(10, 'Zainal Abidin', '02133337777', 'Bekasi', 'zainal@gmail.com', '123'),
(20, 'asdasd', '12341212', 'asdada', 'yeee@gmail.com', '123'),
(21, 'Silvi', '12345', 'apaya', 'apaya@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(5) NOT NULL,
  `id_katalog` int(5) DEFAULT NULL,
  `judul_buku` varchar(50) DEFAULT NULL,
  `pengarang` varchar(35) DEFAULT NULL,
  `thn_terbit` date DEFAULT NULL,
  `penerbit` varchar(50) DEFAULT NULL,
  `harga` int(255) NOT NULL,
  `qty` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_katalog`, `judul_buku`, `pengarang`, `thn_terbit`, `penerbit`, `harga`, `qty`) VALUES
(14, 27, 'Buku3', 'Pengarang3', '2022-12-28', 'Penerbit3', 19000, 10),
(15, 28, 'Buku4', 'Pengarang4', '2022-12-28', 'Penerbit4', 20000, 9),
(16, 29, 'Buku5', 'Pengarang5', '2022-12-28', 'Penerbit5', 21000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_pinjam` int(5) DEFAULT NULL,
  `id_buku` int(5) DEFAULT NULL,
  `tgl_pengembalian` date DEFAULT NULL,
  `denda` double DEFAULT NULL,
  `status_buku` enum('Kembali','Belum Kembali') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `katalog_buku`
--

CREATE TABLE `katalog_buku` (
  `id_katalog` int(5) NOT NULL,
  `nama_katalog` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katalog_buku`
--

INSERT INTO `katalog_buku` (`id_katalog`, `nama_katalog`) VALUES
(1, 'Sains'),
(2, 'Hobby'),
(3, 'Komputer'),
(4, 'Komunikasi'),
(5, 'Hukum'),
(6, 'Agama'),
(7, 'Populer'),
(8, 'Bahasa');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date_create` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `date_create`, `status`, `username`) VALUES
(1, 'New Order 1', '2023-01-23', 1, 'acc2'),
(2, 'New Order 2', '2023-01-24', 2, 'acc2'),
(3, 'New Order 3', '2023-01-25', 1, 'acc2'),
(4, 'New Order 4', '2023-01-26', 0, 'acc2'),
(5, 'New Order', '2023-01-26', 0, 'acc 2'),
(6, 'New Order', '2023-01-26', 0, 'acc 2'),
(7, 'New Order', '2023-01-26', 1, 'acc 2');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_product` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id_product`, `id_order`, `price`, `qty`) VALUES
(1, 37, 100000, 3),
(2, 36, 200000, 1),
(3, 39, 300000, 4),
(4, 40, 400000, 4),
(14, 5, 19000, 1),
(15, 7, 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(5) NOT NULL,
  `id_anggota` int(5) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `status` enum('Selesai','Belum Selesai') DEFAULT NULL,
  `jml_buku` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `katalog_buku`
--
ALTER TABLE `katalog_buku`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `katalog_buku`
--
ALTER TABLE `katalog_buku`
  MODIFY `id_katalog` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
