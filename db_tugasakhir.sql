-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2019 at 01:34 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tugasakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 2),
('tahta', 'c93ccd78b2076528346216b3b2f701e6', 1),
('tahta2', 'fb80789cfc179e851b31cdfaa28ba01a', 1),
('tahta4', '65cecaac231e739328bc66ea3ccd6962', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` char(3) NOT NULL,
  `nm_bank` varchar(20) NOT NULL,
  `no_rektoko` varchar(15) NOT NULL,
  `atas_nama` varchar(25) NOT NULL,
  `logo_bank` char(19) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nm_bank`, `no_rektoko`, `atas_nama`, `logo_bank`) VALUES
('B05', 'Permata Bank', '1234567', 'Catur', 'B05190403020451.jpg'),
('B06', 'BCA', '12346789123', 'Alamsyah Catur Tahta Hart', 'B06190403020418.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id_banner` char(2) NOT NULL,
  `gambar_banner` char(18) NOT NULL,
  `judul_banner` varchar(20) NOT NULL,
  `deskripsi_banner` text NOT NULL,
  `status_banner` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id_banner`, `gambar_banner`, `judul_banner`, `deskripsi_banner`, `status_banner`) VALUES
('N1', 'N1190518110511.jpg', 'Produk yang lengkap', 'Beli hanya di mira branded Kids', '1'),
('N2', 'N2190518110519.jpg', 'Baju anak branded', 'Mira branded kids selalu dengan product yang bagus', '1'),
('N3', 'N3190518110548.jpg', 'Fashion terlengkap', 'Beli hanya di Mira Branded Kids', '2');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id_comment` char(11) NOT NULL,
  `tanggal_comment` date NOT NULL,
  `isi_comment` text NOT NULL,
  `id_product` char(4) NOT NULL,
  `id_customer` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `tanggal_comment`, `isi_comment`, `id_product`, `id_customer`) VALUES
('K1904290001', '2019-04-29', 'Produknya keren banget', 'P001', '190408001'),
('K1904290002', '2019-04-29', 'Bagus Banget', 'P001', '190408001'),
('K1904290003', '2019-04-29', 'Asli keren banget', 'P001', '190408001'),
('K1904290004', '2019-04-29', 'Bagus banget asli', 'P001', '190408001'),
('K1904290005', '2019-04-29', 'Bagus banget', 'P002', '190408001');

-- --------------------------------------------------------

--
-- Table structure for table `confirm`
--

CREATE TABLE `confirm` (
  `id_confirm` char(11) NOT NULL,
  `tanggal_confirm` date NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `jumlah_transfer` bigint(11) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `bukti_transfer` char(21) NOT NULL,
  `nm_pengirim` varchar(50) NOT NULL,
  `status_confirm` char(1) DEFAULT NULL,
  `id_bank` char(3) NOT NULL,
  `id_order` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirm`
--

INSERT INTO `confirm` (`id_confirm`, `tanggal_confirm`, `tanggal_transfer`, `jumlah_transfer`, `no_rekening`, `bukti_transfer`, `nm_pengirim`, `status_confirm`, `id_bank`, `id_order`) VALUES
('C1904120001', '2019-04-12', '2019-04-10', 1200000, '12345678', 'C1904120001190412.jpg', 'Tahta', '1', 'B06', 'O1904080001'),
('C1904230002', '2019-04-23', '2019-04-23', 920000, '123456789', 'C1904230002190423.jpg', 'Alamsyah', '1', 'B06', 'O1904230005'),
('C1905010003', '2019-05-01', '2019-05-02', 120000, '12345678', 'C1905010003190501.jpg', 'Tahta', '2', 'B05', 'O1904230004'),
('C1905010004', '2019-05-01', '2019-05-02', 120000, '12345678', 'C1905010004190501.jpg', 'Tahta', '1', 'B05', 'O1904230004'),
('C1905050005', '2019-05-05', '2019-05-06', 120000, '12345678', 'C1905050005190505.jpg', 'Alamsyah Catur', '1', 'B06', 'O1905050007'),
('C1905130006', '2019-05-13', '2019-05-14', 120000, '12345678', 'C1905130006190513.jpg', 'Alamsyah Catur', '1', 'B06', 'O1905130008');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` char(9) NOT NULL,
  `nm_customer` varchar(50) NOT NULL,
  `email_customer` varchar(40) NOT NULL,
  `password_customer` varchar(100) NOT NULL,
  `alamat_customer` text NOT NULL,
  `kodepos_customer` varchar(6) NOT NULL,
  `provinsi_customer` char(3) NOT NULL,
  `kota_customer` char(3) NOT NULL,
  `telp_customer` varchar(12) NOT NULL,
  `status_customer` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nm_customer`, `email_customer`, `password_customer`, `alamat_customer`, `kodepos_customer`, `provinsi_customer`, `kota_customer`, `telp_customer`, `status_customer`) VALUES
('190408001', 'Catur Tahta', 'chodhot07@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', '1', '123', '089670465244', '1'),
('190409002', 'Alamsyah Catur', 'alamsyahcth@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Jalan Mede No.23 RT.005 RW.04 Kelurahan Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', '1', '123', '089670465244', '1');

-- --------------------------------------------------------

--
-- Table structure for table `detil_orders`
--

CREATE TABLE `detil_orders` (
  `id_order` char(11) NOT NULL,
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `qty` int(3) NOT NULL,
  `sub_total` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_orders`
--

INSERT INTO `detil_orders` (`id_order`, `id_product`, `id_size`, `qty`, `sub_total`) VALUES
('O1904080001', 'P001', 'S2', 2, 240000),
('O1904080001', 'P004', 'S1', 1, 120000),
('O1904080002', 'P002', 'S2', 2, 250000),
('O1904080002', 'P003', 'S1', 1, 125000),
('O1904090003', 'P001', 'S3', 4, 480000),
('O1904090003', 'P002', 'S1', 4, 500000),
('O1904230004', 'P001', 'S2', 2, 240000),
('O1904230004', 'P001', 'S3', 5, 600000),
('O1904230005', 'P001', 'S2', 2, 240000),
('O1904230005', 'P001', 'S3', 5, 600000),
('O1905050006', 'P004', 'S2', 1, 120000),
('O1905050007', 'P003', 'S1', 1, 125000),
('O1905130008', 'P003', 'S1', 2, 250000),
('O1905130008', 'P004', 'S1', 1, 120000),
('O1905130008', 'P004', 'S3', 1, 120000),
('O1905130009', 'P002', 'S1', 1, 125000);

-- --------------------------------------------------------

--
-- Table structure for table `detil_retur`
--

CREATE TABLE `detil_retur` (
  `id_retur` char(11) NOT NULL,
  `id_order` char(11) NOT NULL,
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `qty_retur` int(3) DEFAULT NULL,
  `subtotal_retur` int(8) DEFAULT NULL,
  `alasan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_retur`
--

INSERT INTO `detil_retur` (`id_retur`, `id_order`, `id_product`, `id_size`, `qty_retur`, `subtotal_retur`, `alasan`) VALUES
('R1905130001', 'O1905130008', 'P003', 'S1', 2, 250000, 'rusak'),
('R1905130001', 'O1905130008', 'P004', 'S1', 1, 120000, 'rusak'),
('R1905130001', 'O1905130008', 'P004', 'S3', 1, 120000, 'rusak');

-- --------------------------------------------------------

--
-- Table structure for table `detil_size`
--

CREATE TABLE `detil_size` (
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_size`
--

INSERT INTO `detil_size` (`id_product`, `id_size`, `stok`) VALUES
('P001', 'S1', 32),
('P001', 'S2', 40),
('P001', 'S3', 12),
('P001', 'S4', 14),
('P002', 'S1', 50),
('P002', 'S2', 70),
('P003', 'S1', 34),
('P003', 'S2', 82),
('P003', 'S3', 12),
('P003', 'S4', 24),
('P004', 'S1', 70),
('P004', 'S2', 1),
('P004', 'S3', 8),
('P004', 'S4', 4),
('P005', 'S1', 8),
('P005', 'S2', 10),
('P005', 'S3', 12),
('P005', 'S4', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` char(3) NOT NULL,
  `alt_kategori` varchar(30) NOT NULL,
  `nm_kategori` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `alt_kategori`, `nm_kategori`) VALUES
('K01', 'kaos-murah, kaos-dewasa', 'Kaos'),
('K02', 'Celana Murah, Celana-Anak-Mura', 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` char(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `ongkir` int(8) NOT NULL,
  `kurir` varchar(3) NOT NULL,
  `kota` varchar(20) NOT NULL,
  `alamat_kirim` text NOT NULL,
  `kode_pos` char(6) NOT NULL,
  `grand_total` bigint(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `catatan` text NOT NULL,
  `total_berat` int(3) NOT NULL,
  `id_customer` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id_order`, `tanggal_order`, `ongkir`, `kurir`, `kota`, `alamat_kirim`, `kode_pos`, `grand_total`, `status`, `catatan`, `total_berat`, `id_customer`) VALUES
('O1904080001', '2019-04-08', 9000, 'jne', '153', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 369000, '5', 'Packing yang rapi', 1120, '190408001'),
('O1904080002', '2019-04-08', 46000, 'jne', '164', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 421000, '2', 'Packing yang rapi', 1520, '190408001'),
('O1904090003', '2019-04-09', 36000, 'jne', '153', 'Jalan Mede No.23 RT.005 RW.04 Kelurahan Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 1016000, '2', 'Packing Harus Rapi', 4000, '190409002'),
('O1904230004', '2019-04-23', 76000, 'jne', '497', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 916000, '5', 'Pengemasan yang rapi', 3500, '190408001'),
('O1904230005', '2019-04-23', 76000, 'jne', '497', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 916000, '5', 'Pengemasan Harus Rapi', 3500, '190408001'),
('O1905050006', '2019-05-05', 36000, 'jne', '28', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 156000, '1', 'Harus Rapi', 120, '190408001'),
('O1905050007', '2019-05-05', 31500, 'pos', '29', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 156500, '5', 'Harus Rapi', 520, '190408001'),
('O1905130008', '2019-05-13', 44000, 'pos', '497', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 534000, '5', 'Packingan Harus Rapi', 1280, '190408001'),
('O1905130009', '2019-05-13', 8000, 'jne', '153', 'Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan', '12260', 133000, '1', 'Harus Rapi', 500, '190408001');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` char(4) NOT NULL,
  `alt_product` varchar(30) NOT NULL,
  `nm_product` varchar(25) NOT NULL,
  `harga` int(7) NOT NULL,
  `berat` int(4) NOT NULL,
  `gambar` char(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id_product`, `alt_product`, `nm_product`, `harga`, `berat`, `gambar`, `deskripsi`, `id_kategori`) VALUES
('P001', 'baju-anak-murah', 'Kaos Zara 1', 120000, 500, 'P001190405110436.jpg', '<p>Barangnya Keren</p>', 'K01'),
('P002', 'baju-anak-murah', 'Kaos Zara 2', 125000, 500, 'P002190405110413.jpg', '<p>Barangnya <strong>Keren</strong></p>', 'K01'),
('P003', 'celana-anak-murah-banget', 'Kaos Vetemens 4', 125000, 520, 'P003190405010416.jpg', '<p>Luar Biasa <em><strong>Banget</strong></em></p>', 'K01'),
('P004', 'baju-anak-murah', 'Celana Zara 3', 120000, 120, 'P004190404110438.jpg', '<p>Luar Biasa</p>', 'K02'),
('P005', 'celana-anak-murah-banget', 'Celana Zara 7', 120000, 1, 'P005190518060521.jpg', '<p>Barangnya keren</p>', 'K02');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id_reply` char(11) NOT NULL,
  `tanggal_reply` date NOT NULL,
  `isi_reply` text NOT NULL,
  `id_comment` char(11) NOT NULL,
  `username` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id_reply`, `tanggal_reply`, `isi_reply`, `id_comment`, `username`) VALUES
('B1904290001', '2019-04-29', 'Terima Kasih', 'K1904290001', 'admin'),
('B1904290002', '2019-04-29', 'terima kasih gan', 'K1904290003', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `resi`
--

CREATE TABLE `resi` (
  `id_resi` char(11) NOT NULL,
  `no_resi` varchar(12) NOT NULL,
  `tanggal_resi` date DEFAULT NULL,
  `id_order` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resi`
--

INSERT INTO `resi` (`id_resi`, `no_resi`, `tanggal_resi`, `id_order`) VALUES
('S1904240001', '12345678', '2019-04-24', 'O1904230005'),
('S1904300002', '12345789', '2019-04-30', 'O1904080001'),
('S1905010003', '135246788', '2019-05-01', 'O1904230004'),
('S1905050004', '12345678', '2019-05-05', 'O1905050007'),
('S1905130005', '12345678', '2019-05-13', 'O1905130008');

-- --------------------------------------------------------

--
-- Table structure for table `retur`
--

CREATE TABLE `retur` (
  `id_retur` char(11) NOT NULL,
  `tgl_retur` date NOT NULL,
  `grandtotal_retur` int(8) DEFAULT NULL,
  `status_retur` varchar(10) NOT NULL,
  `bukti_refund` char(21) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retur`
--

INSERT INTO `retur` (`id_retur`, `tgl_retur`, `grandtotal_retur`, `status_retur`, `bukti_refund`) VALUES
('R1905130001', '2019-05-13', 490000, '2', 'R1905130001190517.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` char(11) NOT NULL,
  `tanggal_saran` date NOT NULL,
  `isi_saran` text NOT NULL,
  `id_customer` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saran`
--

INSERT INTO `saran` (`id_saran`, `tanggal_saran`, `isi_saran`, `id_customer`) VALUES
('01904290001', '2019-04-29', 'Perbaiki respon pembeli', '190408001'),
('01904290002', '2019-04-29', 'Perbanyak jenis pakaian', '190408001'),
('01905020003', '2019-05-02', 'Harus lebih baik lagi', '190408001');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` char(2) NOT NULL,
  `nm_size` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `nm_size`) VALUES
('S1', 'L'),
('S2', 'XL'),
('S3', 'M'),
('S4', 'S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `confirm`
--
ALTER TABLE `confirm`
  ADD PRIMARY KEY (`id_confirm`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detil_orders`
--
ALTER TABLE `detil_orders`
  ADD PRIMARY KEY (`id_order`,`id_product`,`id_size`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `detil_retur`
--
ALTER TABLE `detil_retur`
  ADD PRIMARY KEY (`id_retur`,`id_order`,`id_product`,`id_size`),
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_retur` (`id_retur`);

--
-- Indexes for table `detil_size`
--
ALTER TABLE `detil_size`
  ADD PRIMARY KEY (`id_product`,`id_size`),
  ADD KEY `id_size` (`id_size`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_kategori_2` (`id_kategori`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id_reply`);

--
-- Indexes for table `resi`
--
ALTER TABLE `resi`
  ADD PRIMARY KEY (`id_resi`),
  ADD KEY `id_order` (`id_order`);

--
-- Indexes for table `retur`
--
ALTER TABLE `retur`
  ADD PRIMARY KEY (`id_retur`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `confirm`
--
ALTER TABLE `confirm`
  ADD CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  ADD CONSTRAINT `confirm_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`);

--
-- Constraints for table `detil_orders`
--
ALTER TABLE `detil_orders`
  ADD CONSTRAINT `detil_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `detil_orders_ibfk_3` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  ADD CONSTRAINT `detil_orders_ibfk_4` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Constraints for table `detil_retur`
--
ALTER TABLE `detil_retur`
  ADD CONSTRAINT `detil_retur_ibfk_1` FOREIGN KEY (`id_retur`) REFERENCES `retur` (`id_retur`),
  ADD CONSTRAINT `detil_retur_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `detil_orders` (`id_order`),
  ADD CONSTRAINT `detil_retur_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `detil_orders` (`id_product`),
  ADD CONSTRAINT `detil_retur_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `detil_orders` (`id_size`);

--
-- Constraints for table `detil_size`
--
ALTER TABLE `detil_size`
  ADD CONSTRAINT `detil_size_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  ADD CONSTRAINT `detil_size_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `resi`
--
ALTER TABLE `resi`
  ADD CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`);

--
-- Constraints for table `saran`
--
ALTER TABLE `saran`
  ADD CONSTRAINT `saran_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
