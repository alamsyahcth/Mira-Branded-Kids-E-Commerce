# Host: localhost  (Version 5.5.5-10.1.16-MariaDB)
# Date: 2019-04-13 03:58:20
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "admin"
#

CREATE TABLE `admin` (
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` int(1) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "admin"
#

INSERT INTO `admin` VALUES ('admin','21232f297a57a5a743894a0e4a801fc3',2),('tahta','c93ccd78b2076528346216b3b2f701e6',1),('tahta2','fb80789cfc179e851b31cdfaa28ba01a',1),('tahta4','65cecaac231e739328bc66ea3ccd6962',1),('tahta5','65cecaac231e739328bc66ea3ccd6962',1);

#
# Structure for table "bank"
#

CREATE TABLE `bank` (
  `id_bank` char(3) NOT NULL,
  `nm_bank` varchar(20) NOT NULL,
  `no_rektoko` varchar(15) NOT NULL,
  `atas_nama` varchar(25) NOT NULL,
  `logo_bank` char(19) NOT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "bank"
#

INSERT INTO `bank` VALUES ('B05','Permata Bank','1234567','Catur','B05190403020451.jpg'),('B06','BCA','12346789123','Alamsyah Catur Tahta Hart','B06190403020418.jpg'),('B07','BRI','1233456788','Hendry Nugroho','B07190403030458.jpg');

#
# Structure for table "banner"
#

CREATE TABLE `banner` (
  `id_banner` char(2) NOT NULL,
  `gambar_banner` char(18) NOT NULL,
  `judul_banner` varchar(20) NOT NULL,
  `deskripsi_banner` text NOT NULL,
  `status_banner` char(1) NOT NULL,
  PRIMARY KEY (`id_banner`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "banner"
#

INSERT INTO `banner` VALUES ('N1','N1190403050436.jpg','Beli Disini Aja Ya','Barangnya keren-keren Banget Asli','1');

#
# Structure for table "customer"
#

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
  `status_customer` char(1) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES ('190408001','Catur Tahta','chodhot07@gmail.com','25d55ad283aa400af464c76d713c07ad','Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan','12260','1','123','089670465244','1'),('190409002','Alamsyah Catur','alamsyahcth@gmail.com','25d55ad283aa400af464c76d713c07ad','Jalan Mede No.23 RT.005 RW.04 Kelurahan Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan','12260','1','123','089670465244','1');

#
# Structure for table "kategori"
#

CREATE TABLE `kategori` (
  `id_kategori` char(3) NOT NULL,
  `alt_kategori` varchar(30) NOT NULL,
  `nm_kategori` varchar(12) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "kategori"
#

INSERT INTO `kategori` VALUES ('K01','kaos-murah, kaos-dewasa','Kaos'),('K02','Celana Murah, Celana-Anak-Mura','Celana');

#
# Structure for table "orders"
#

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
  `id_customer` char(9) NOT NULL,
  PRIMARY KEY (`id_order`),
  KEY `id_customer` (`id_customer`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "orders"
#

INSERT INTO `orders` VALUES ('O1904080001','2019-04-08',9000,'jne','153','Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan','12260',369000,'4','Packing yang rapi',1120,'190408001'),('O1904080002','2019-04-08',46000,'jne','164','Jalan Mede No.23 RT.005 RW.04 Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan','12260',421000,'2','Packing yang rapi',1520,'190408001'),('O1904090003','2019-04-09',36000,'jne','153','Jalan Mede No.23 RT.005 RW.04 Kelurahan Petukangan Utara Kecamatan Pesanggrahan Jakarta Selatan','12260',1016000,'2','Packing Harus Rapi',4000,'190409002');

#
# Structure for table "confirm"
#

CREATE TABLE `confirm` (
  `id_confirm` char(11) NOT NULL,
  `tanggal_confirm` date NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `jumlah_transfer` bigint(11) NOT NULL,
  `no_rekening` varchar(15) NOT NULL,
  `bukti_transfer` char(21) NOT NULL,
  `nm_pengirim` varchar(50) NOT NULL,
  `id_bank` char(3) NOT NULL,
  `id_order` char(11) NOT NULL,
  PRIMARY KEY (`id_confirm`),
  KEY `id_bank` (`id_bank`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `confirm_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`),
  CONSTRAINT `confirm_ibfk_2` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "confirm"
#

INSERT INTO `confirm` VALUES ('C1904120001','2019-04-12','2019-04-10',1200000,'12345678','C1904120001190412.jpg','Tahta','B06','O1904080001');

#
# Structure for table "product"
#

CREATE TABLE `product` (
  `id_product` char(4) NOT NULL,
  `alt_product` varchar(30) NOT NULL,
  `nm_product` varchar(25) NOT NULL,
  `harga` int(7) NOT NULL,
  `berat` int(4) NOT NULL,
  `gambar` char(20) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kategori` char(3) NOT NULL,
  PRIMARY KEY (`id_product`),
  KEY `id_kategori` (`id_kategori`),
  KEY `id_kategori_2` (`id_kategori`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "product"
#

INSERT INTO `product` VALUES ('P001','baju-anak-murah','Kaos Zara 1',120000,500,'P001190405110436.jpg','<p>Barangnya Keren</p>','K01'),('P002','baju-anak-murah','Kaos Zara 2',125000,500,'P002190405110413.jpg','<p>Barangnya <strong>Keren</strong></p>','K01'),('P003','celana-anak-murah-banget','Kaos Vetemens 4',125000,520,'P003190405010416.jpg','<p>Luar Biasa <em><strong>Banget</strong></em></p>','K01'),('P004','baju-anak-murah','Celana Zara 3',120000,120,'P004190404110438.jpg','<p>Luar Biasa</p>','K02');

#
# Structure for table "resi"
#

CREATE TABLE `resi` (
  `id_resi` char(11) NOT NULL,
  `no_resi` varchar(12) NOT NULL,
  `id_order` char(11) NOT NULL,
  PRIMARY KEY (`id_resi`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `resi_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "resi"
#

INSERT INTO `resi` VALUES ('S1904120001','123456789','O1904080001');

#
# Structure for table "retur"
#

CREATE TABLE `retur` (
  `id_retur` char(11) NOT NULL,
  `tgl_retur` date NOT NULL,
  `status_retur` varchar(10) NOT NULL,
  `resi_retur` int(12) NOT NULL,
  PRIMARY KEY (`id_retur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "retur"
#


#
# Structure for table "size"
#

CREATE TABLE `size` (
  `id_size` char(2) NOT NULL,
  `nm_size` varchar(4) NOT NULL,
  PRIMARY KEY (`id_size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "size"
#

INSERT INTO `size` VALUES ('S1','L'),('S2','XL'),('S3','M'),('S4','S');

#
# Structure for table "detil_orders"
#

CREATE TABLE `detil_orders` (
  `id_order` char(11) NOT NULL,
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `qty` int(3) NOT NULL,
  `sub_total` int(8) NOT NULL,
  PRIMARY KEY (`id_order`,`id_product`,`id_size`),
  KEY `id_product` (`id_product`),
  KEY `id_size` (`id_size`),
  KEY `id_order` (`id_order`),
  CONSTRAINT `detil_orders_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  CONSTRAINT `detil_orders_ibfk_3` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  CONSTRAINT `detil_orders_ibfk_4` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detil_orders"
#

INSERT INTO `detil_orders` VALUES ('O1904080001','P001','S2',2,240000),('O1904080001','P004','S1',1,120000),('O1904080002','P002','S2',2,250000),('O1904080002','P003','S1',1,125000),('O1904090003','P001','S3',4,480000),('O1904090003','P002','S1',4,500000);

#
# Structure for table "detil_retur"
#

CREATE TABLE `detil_retur` (
  `id_retur` char(11) NOT NULL,
  `id_order` char(11) NOT NULL,
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `alasan` text NOT NULL,
  PRIMARY KEY (`id_retur`,`id_order`,`id_product`,`id_size`),
  KEY `id_order` (`id_order`),
  KEY `id_product` (`id_product`),
  KEY `id_size` (`id_size`),
  CONSTRAINT `detil_retur_ibfk_1` FOREIGN KEY (`id_retur`) REFERENCES `retur` (`id_retur`),
  CONSTRAINT `detil_retur_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `detil_orders` (`id_order`),
  CONSTRAINT `detil_retur_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `detil_orders` (`id_product`),
  CONSTRAINT `detil_retur_ibfk_4` FOREIGN KEY (`id_size`) REFERENCES `detil_orders` (`id_size`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detil_retur"
#


#
# Structure for table "detil_size"
#

CREATE TABLE `detil_size` (
  `id_product` char(4) NOT NULL,
  `id_size` char(2) NOT NULL,
  `stok` int(3) NOT NULL,
  PRIMARY KEY (`id_product`,`id_size`),
  KEY `id_size` (`id_size`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `detil_size_ibfk_2` FOREIGN KEY (`id_size`) REFERENCES `size` (`id_size`),
  CONSTRAINT `detil_size_ibfk_3` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Data for table "detil_size"
#

INSERT INTO `detil_size` VALUES ('P001','S1',32),('P001','S2',40),('P001','S3',12),('P001','S4',10),('P002','S1',50),('P002','S2',70),('P003','S1',34),('P003','S2',82),('P003','S3',12),('P003','S4',24),('P004','S1',70),('P004','S2',0);
