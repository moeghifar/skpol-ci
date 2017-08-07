-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 08, 2017 at 01:12 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skp_online_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_airbersih`
--

CREATE TABLE `tbl_airbersih` (
  `id_airbersih` int(11) NOT NULL,
  `sumber_air` varchar(255) NOT NULL,
  `pengolahan_air` varchar(255) NOT NULL,
  `volume_air` varchar(255) NOT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alurproses`
--

CREATE TABLE `tbl_alurproses` (
  `idtbl_alurproses` int(11) NOT NULL,
  `nama_alurproses` text NOT NULL,
  `name_alurproses` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_alurproses`
--

INSERT INTO `tbl_alurproses` (`idtbl_alurproses`, `nama_alurproses`, `name_alurproses`) VALUES
(1, 'Penerimaan, Pengolahan, Pembekuan, Pengemasan/Pelabelan, Penyimpanan Beku, Pemuatan', 'Receiving, Processing, Freezing, Packing/Labeling, Cold Storing, Stuffing'),
(2, 'Penerimaan, Penyimpanan Beku, Distribusi', 'Receiving, Cold Storing, Distributing'),
(3, 'Penerimaan, Pengolahan, Pendinginan, Pengemasan/Pelabelan, Penyimpanan Dingin, Pemuatan', 'Receiving, Processing, Chilling, Packing/Labeling, Chill Storing, Stuffing'),
(4, 'Penerimaan, Penanganan, Pendistribusian', 'Receiving, Handling, Distributing'),
(5, 'Penerimaan, Pengolahan, Pengalengan, Sterilisasi, Pengemasan/Pelabelan, Penyimpanan, Pemuatan', 'Receiving, Processing, Canning, Sterilizing, Packing/Labeling, Storing,  Stuffing'),
(6, 'Penerimaan, Pengolahan, Pengalengan, Pasteurisasi, Pendinginan, Pengemasan/Pelabelan, Penyimpanan Dingin, Pemuatan', 'Receiving, Processing, Canning, Pasteurizing, Chilling, Packing/Labeling, Chill Storing, Stuffing'),
(7, 'Penerimaan, Pengolahan, Pengeringan, Pengemasan/Pelabelan, Penyimpanan', 'Receiving, Processing, Drying, Packing/Labelling, Storing'),
(8, 'Penerimaan, Pengolahan, Pengasapan, Pengemasan/Pelabelan, Penyimpanan, Pemuatan', 'Receiving, Processing, Smoking, Packing/Labeling, Storing, Stuffing'),
(9, 'Penerimaan, Penanganan, Pengemasan, Pemuatan', 'Receiving, Handling, Packing, Stuffing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_asales`
--

CREATE TABLE `tbl_asales` (
  `idtbl_asales` int(11) NOT NULL,
  `sendiri_asales` varchar(45) DEFAULT NULL,
  `pembelian_asales` varchar(45) DEFAULT NULL,
  `pembelianjumlah_asales` varchar(45) DEFAULT NULL,
  `bentuk_asales` varchar(50) DEFAULT NULL,
  `penggunaan_asales` varchar(100) DEFAULT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahanbaku`
--

CREATE TABLE `tbl_bahanbaku` (
  `idtbl_bahanbaku` int(11) NOT NULL,
  `asal_bahanbaku` varchar(45) DEFAULT NULL,
  `jenis_bahanbaku` varchar(45) DEFAULT NULL,
  `bentuk_bahanbaku` varchar(45) DEFAULT NULL,
  `kategori_bahanbaku` varchar(45) DEFAULT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dinas`
--

CREATE TABLE `tbl_dinas` (
  `idtbl_dinas` int(11) NOT NULL,
  `nama_dinas` varchar(255) NOT NULL,
  `jabatan_dinas` varchar(255) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_dinas`
--

INSERT INTO `tbl_dinas` (`idtbl_dinas`, `nama_dinas`, `jabatan_dinas`, `provinsi_id`, `user_id`) VALUES
(1, 'Ir. Nilanto Perbowo, M.Sc', 'Direktorat Jendral', 0, 2),
(2, 'Artati Widiarti', 'Direktur', 0, 3),
(3, 'KKP', 'KKP', 0, 4),
(5, '-', '-', 1, 5),
(6, '-', '-', 2, 6),
(7, '-', '-', 3, 7),
(8, '-', '-', 4, 8),
(9, '-', '-', 7, 9),
(10, '-', '-', 9, 10),
(11, '-', '-', 8, 11),
(12, '-', '-', 10, 12),
(13, '-', '-', 6, 13),
(14, '-', '-', 5, 14),
(15, '-', '-', 13, 15),
(16, '-', '-', 12, 16),
(17, '-', '-', 14, 17),
(18, '-', '-', 15, 18),
(19, '-', '-', 16, 19),
(20, '-', '-', 11, 20),
(21, '-', '-', 17, 21),
(22, '-', '-', 18, 22),
(23, '-', '-', 19, 23),
(24, '-', '-', 20, 24),
(25, '-', '-', 21, 25),
(26, '-', '-', 22, 26),
(27, '-', '-', 23, 27),
(28, '-', '-', 24, 28),
(29, '-', '-', 29, 29),
(30, '-', '-', 28, 30),
(31, '-', '-', 26, 31),
(32, '-', '-', 27, 32),
(33, '-', '-', 25, 33),
(34, '-', '-', 30, 34),
(35, '-', '-', 31, 35),
(36, '-', '-', 32, 36),
(37, '-', '-', 33, 37),
(38, '-', '-', 34, 38);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_file_example`
--

CREATE TABLE `tbl_file_example` (
  `id_file_example` int(11) NOT NULL,
  `file_url` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_target` varchar(50) NOT NULL,
  `kategori_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infolain`
--

CREATE TABLE `tbl_infolain` (
  `idtbl_infolain` int(11) NOT NULL,
  `bahanpenolong_infolain` varchar(45) DEFAULT 'Tidak ada',
  `bahankimia_infolain` varchar(255) DEFAULT 'Tidak ada',
  `bahanlain_infolain` varchar(255) DEFAULT 'Tidak ada',
  `kemasaninner_infolain` varchar(45) DEFAULT 'Tidak ada',
  `kemasanmaster_infolain` varchar(45) DEFAULT 'Tidak ada',
  `lainnya_infolain` varchar(255) DEFAULT 'Tidak ada' COMMENT '	',
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `idtbl_karyawan` int(11) NOT NULL,
  `admasinglk_karyawan` int(11) DEFAULT NULL,
  `admasingpr_karyawan` int(11) DEFAULT NULL,
  `admtetaplk_karyawan` int(11) DEFAULT NULL,
  `admtetappr_karyawan` int(11) DEFAULT NULL,
  `admharilk_karyawan` int(11) DEFAULT NULL,
  `admharipr_karyawan` int(11) DEFAULT NULL,
  `olahasinglk_karyawan` int(11) DEFAULT NULL,
  `olahasingpr_karyawan` int(11) DEFAULT NULL,
  `olahtetaplk_karyawan` int(11) DEFAULT NULL,
  `olahtetappr_karyawan` int(11) DEFAULT NULL,
  `olahharilk_karyawan` int(11) DEFAULT NULL,
  `olahharipr_karyawan` int(11) DEFAULT NULL,
  `harikerja_karyawan` int(11) DEFAULT NULL,
  `shift_karyawan` int(10) DEFAULT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kunjungan`
--

CREATE TABLE `tbl_kunjungan` (
  `idtbl_kunjungan` int(11) NOT NULL,
  `tgl_kunjungan` date DEFAULT NULL,
  `pic_kunjungan` varchar(255) DEFAULT NULL,
  `uker_kunjungan` varchar(50) DEFAULT NULL,
  `temuan_kunjungan` text NOT NULL,
  `perbaikan_kunjungan` text NOT NULL,
  `survey_kunjungan` text NOT NULL,
  `rekomendasi_kunjungan` varchar(255) NOT NULL,
  `status_kunjungan` varchar(50) NOT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemasaran`
--

CREATE TABLE `tbl_pemasaran` (
  `idtbl_pemasaran` int(11) NOT NULL,
  `tujuan_pemasaran` varchar(45) DEFAULT NULL,
  `jenis_pemasaran` varchar(20) DEFAULT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penanggungjawab`
--

CREATE TABLE `tbl_penanggungjawab` (
  `idtbl_penanggungjawab` int(11) NOT NULL,
  `upinama_penanggungjawab` varchar(255) DEFAULT 'Tidak ada',
  `upipendidikan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `upipelatihan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `produksinama_penanggungjawab` varchar(255) DEFAULT 'Tidak ada',
  `produksipendidikan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `produksipelatihan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `mutunama_penanggungjawab` varchar(255) DEFAULT 'Tidak ada',
  `mutupendidikan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `mutupelatihan_penanggungjawab` varchar(45) DEFAULT 'Tidak ada',
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengiriman`
--

CREATE TABLE `tbl_pengiriman` (
  `idtbl_pengiriman` int(11) NOT NULL,
  `kurir_pengiriman` varchar(100) DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `resi_pengiriman` varchar(100) DEFAULT NULL,
  `alamat_pengiriman` text,
  `skpterbit_id` int(11) NOT NULL,
  `status_pengiriman` int(11) NOT NULL,
  `keterangan_pengiriman` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `idtbl_produk` int(11) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `namaind_produk` varchar(45) DEFAULT NULL,
  `namaen_produk` varchar(45) DEFAULT NULL,
  `status_produk` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`idtbl_produk`, `kategori_produk`, `namaind_produk`, `namaen_produk`, `status_produk`) VALUES
(1, 'Beku', 'Abalone Beku', 'Frozen Aballone', 1),
(2, 'Kering', 'Abalone Kering', 'Dried Abalone', 1),
(3, 'Lainnya', 'Abon Ikan', 'Shredded Fish', 1),
(4, 'Lainnya', 'Abon Tuna', 'Shredded Tuna', 1),
(5, 'Reduksi', 'Alkali Treated Cottonii Chips', '-', 1),
(6, 'Lainnya', 'Amplang Ikan', 'Amplang Fish Crackers', 1),
(7, 'Lainnya', 'Aquamin (Marine Multi Mineral)', '-', 1),
(8, 'Lainnya', 'Avruga (Transformed Herring Product)', '-', 1),
(9, 'Beku', 'Baitopshell Beku', 'Frozen Baitopshell', 1),
(10, 'Beku', 'Baitopshell Rebus Beku', 'Frozen Cooked Baitopshell', 1),
(11, 'Lumatan Daging', 'Bakso Ikan', 'Fish Meatball', 1),
(12, 'Beku', 'Bakso ikan Beku', 'Frozen Fish Ball', 1),
(13, 'Asap', 'Bandeng Asap', 'Smoked Milkfish', 1),
(14, 'Beku', 'Bandeng Beku', 'Frozen Milkfish', 1),
(15, 'Lainnya', 'Bandeng Duri Lunak', 'Soft Bone Milkfish', 1),
(16, 'Lainnya', 'Bandeng Presto', '-', 1),
(17, 'Beku', 'Bandeng Tanpa Duri', 'Boneless Milkfish', 1),
(18, 'Beku', 'Bekicot Beku', 'Frozen Snail', 1),
(19, 'Kaleng', 'Bekicot Kaleng', 'Canned Snail', 1),
(20, 'Beku', 'Bekicot Laut Beku', 'Frozen Sea Snail', 1),
(21, 'Beku', 'Belut Beku', 'Frozen Eel', 1),
(22, 'Lainnya', 'Belut Hidup', 'Live Eel', 1),
(23, 'Beku', 'Bulu Babi Beku', 'Frozen Sea Urchin', 1),
(24, 'Segar', 'Bulu Babi Segar', 'Fresh Sea Urchin', 1),
(25, 'Reduksi', 'Capelin Fish Oil, Cod Liver Oil, Cod Oil', '-', 1),
(26, 'Reduksi', 'Carrageenan Chips', '-', 1),
(27, 'Reduksi', 'Carrageenan Powder', '-', 1),
(28, 'Beku', 'Cephalopoda Beku', 'Frozen Cephalopods', 1),
(29, 'Kaleng', 'Cephalopoda Kaleng', 'Canned Chepalopods', 1),
(30, 'Kering', 'Cephalopoda Kering', 'Dried Cephalopods', 1),
(31, 'Beku', 'Cephalopoda Mentah Beku', 'Frozen Raw Cephalopods', 1),
(32, 'Beku', 'Cephalopoda Rebus Beku', 'Frozen Cooked Cephalopods', 1),
(33, 'Segar', 'Cephalopoda Segar', 'Fresh Cephalopods', 1),
(34, 'Lainnya', 'Cherry Peppers Stuffed with Anchovy Paste and', '-', 1),
(35, 'Lainnya', 'Cherry Peppers Stuffed with Capers and Anchov', '-', 1),
(36, 'Lainnya', 'Cherry Peppers Stuffed with Olive, Capers and', '-', 1),
(37, 'Lainnya', 'Cherry Peppers Stuffed with Shrimp Paste ', '-', 1),
(38, 'Reduksi', 'Chitin Chitosan', '-', 1),
(39, 'Reduksi', 'Cod Liver Oil', '-', 1),
(40, 'Lumatan Daging', 'Crabstick', '-', 1),
(41, 'Beku', 'Crustacea Beku', 'Frozen Crustacea', 1),
(42, 'Lainnya', 'Crustacea Hidup', 'Live Crustacea', 1),
(43, 'Segar', 'Crustacea Segar', 'Fresh Crustacea', 1),
(44, 'Beku', 'Cumi-Cumi Beku', 'Frozen Squid ', 1),
(45, 'Kering', 'Cumi-cumi Kering', 'Dried Squid', 1),
(46, 'Beku', 'Cunang Beku', '-', 1),
(47, 'Beku', 'Daging Bekicot Beku', 'Frozen Snail Meat', 1),
(48, 'Kaleng', 'Daging Bekicot Kaleng', 'Canned Snail Meat', 1),
(49, 'Beku', 'Daging Kepiting Beku', 'Frozen Crab Meat', 1),
(50, 'Kaleng', 'Daging Kerang Asap Kaleng', 'Canned Smoked Molluscan Shellfish', 1),
(51, 'Beku', 'Daging Kerang Beku', 'Frozen Shellfish', 1),
(52, 'Kering', 'Daging Kerang Kering', 'Dried Molluscan Shellfish', 1),
(53, 'Beku', 'Daging Rajungan Beku', 'Frozen Crabmeat', 1),
(54, 'Kaleng', 'Daging Rajungan Kaleng Pasteurisasi', 'Pasteurized Canned Crab Meat', 1),
(55, 'Lainnya', 'Daging Rajungan Rebus Dingin', 'Chilled Cooked Crabmeat', 1),
(56, 'Lainnya', 'Dendeng Ikan', '-', 1),
(57, 'Lainnya', 'Dendeng Ikan Tuna', '-', 1),
(58, 'Lainnya', 'Dodol dan Manisan Rumput Laut', 'Seaweed Jelly Product', 1),
(59, 'Lainnya', 'Dodol dan Manisan Rumput Laut Kering', 'Seaweed Jelly Product', 1),
(60, 'Lainnya', 'Dodol Rumput Laut', 'Seaweed Jelly', 1),
(61, 'Beku', 'Dori Beku', 'Frozen Dori', 1),
(62, 'Kering', 'Dried Seaweed / Seaweed Powder', '-', 1),
(63, 'Beku', 'Echinodermata Beku', 'Frozen Echinodermata', 1),
(64, 'Segar', 'Echinodermata Segar', 'Fresh Echinodermata', 1),
(65, 'Lainnya', 'Es Kopyor Rumput Laut', '-', 1),
(66, 'Beku', 'Filet Ikan Beku', 'Frozen Fish Fillet', 1),
(67, 'Beku', 'Filet Nila Beku', 'Frozen Tilapia Fillet', 1),
(68, 'Beku', 'Fillet Bandeng Beku', 'Frozen Milkfish Fillet', 1),
(69, 'Beku', 'Fillet Ikan Beku', 'Frozen Fish Fillet', 1),
(70, 'Segar', 'Fillet Ikan Demersal Segar', 'Fresh Demersal Fish Fillet', 1),
(71, 'Segar', 'Fillet Ikan Segar', 'Fresh Fish Fillet', 1),
(72, 'Beku', 'Fillet Nila Beku', 'Frozen Tilapia Fillet', 1),
(73, 'Beku', 'Fillet O Fish', '-', 1),
(74, 'Beku', 'Fillet Patin Beku', 'Frozen Fillet Patin', 1),
(75, 'Segar', 'Fillet Tuna Segar', 'Fresh Tuna Fillet', 1),
(76, 'Lainnya', 'Fish Juice', '-', 1),
(77, 'Beku', 'Frozen Nobashi Ebi', '-', 1),
(78, 'Beku', 'Frozen Pelagic Fish', '-', 1),
(79, 'Beku', 'Frozen Sea Squirt', '-', 1),
(80, 'Beku', 'Frozen Seafood Mix', '-', 1),
(81, 'Beku', 'Frozen Small Pelagic Fish', '-', 1),
(82, 'Beku', 'Frozen Squillamantis', '-', 1),
(83, 'Beku', 'Frozen Tempura', '-', 1),
(84, 'Lainnya', 'Galantin Bandeng', 'Milkfish Galantine', 1),
(85, 'Lainnya', 'Gelembung Ikan', '-', 1),
(86, 'Beku', 'Gurita Beku', 'Frozen Octopus', 1),
(87, 'Beku', 'Gurita Potong Rebus Beku', 'Frozen Blanch Octopus Cut', 1),
(88, 'Segar', 'Gurita Segar', 'Fresh Octopus', 1),
(89, 'Asap', 'Hana Katsuo', '-', 1),
(90, 'Asap', 'Hana Katsuobushi/ Powder Katsuobushi', '-', 1),
(91, 'Beku', 'Hati Ikan Beku', 'Frozen Anko Liver', 1),
(92, 'Segar', 'Hati Ikan Segar', 'Fresh Anko Liver', 1),
(93, 'Kering', 'Himego Kering', 'Dried Himego', 1),
(94, 'Lainnya', 'Ikan & Rumput Laut Renyah', 'Crispy Fish & Seaweed', 1),
(95, 'Beku', 'Ikan Air Tawar Beku', 'Frozen Freshwater Fish', 1),
(96, 'Segar', 'Ikan Air Tawar Segar', 'Fresh Freshwater Fish (Sand Goby)', 1),
(97, 'Asap', 'Ikan Asap', 'Smoked Fish', 1),
(98, 'Asap', 'Ikan Asap', 'Smoked Fish', 1),
(99, 'Kering', 'Ikan Asap Kering', 'Dried Smoked Fish', 1),
(100, 'Kering', 'Ikan Asin Beku', 'Frozen Salted Fish', 1),
(101, 'Kering', 'Ikan Asin Kering', 'Dried Salted Fish', 1),
(102, 'Beku', 'Ikan Bandeng Beku', 'Frozen Milkfish', 1),
(103, 'Segar', 'Ikan Bandeng Segar', 'Fresh Milkfish', 1),
(104, 'Beku', 'Ikan Beku Hasil Budidaya', 'Frozen Farm Raised Fish', 1),
(105, 'Beku', 'Ikan Berlapis Tepung Beku', 'Frozen Breaded Fish', 1),
(106, 'Lainnya', 'Ikan Betutu Hidup', 'Live Sand Gobby', 1),
(107, 'Beku', 'Ikan Bichique Beku', 'Frozen Small Fish', 1),
(108, 'Beku', 'Ikan Capelin Kering Beku', 'Frozen Dry Capelin', 1),
(109, 'Beku', 'Ikan Demersal Beku', 'Frozen Demersal Fish', 1),
(110, 'Lainnya', 'Ikan Demersal Hidup', 'Live Demersal Fish', 1),
(111, 'Beku', 'Ikan Demersal Loin Beku', 'Frozen Loin Demersal Fish', 1),
(112, 'Segar', 'Ikan Demersal Segar', 'Fresh Demersal Fish', 1),
(113, 'Beku', 'Ikan Demesal Beku', 'Frozen Demersal Fish', 1),
(114, 'Asap', 'Ikan Fillet Asap', 'Smoked Fish Fillet', 1),
(115, 'Kaleng', 'Ikan Kaleng (Sarden & Makarel)', 'Canned Fish (Sardines & Mackerel)', 1),
(116, 'Asap', 'Ikan Kayu', 'Smoked Wood Fish', 1),
(117, 'Beku', 'Ikan Kerapu Beku', 'Frozen Grouper', 1),
(118, 'Lainnya', 'Ikan Kerapu Hidup', 'Live Grouper', 1),
(119, 'Segar', 'Ikan Kerapu Segar', 'Fresh Grouper', 1),
(120, 'Kering', 'Ikan Kering', 'Dried Fish', 1),
(121, 'Beku', 'Ikan Kering Beku', 'Frozen Dried Fish', 1),
(122, 'Beku', 'Ikan Layur Beku', 'Frozen Hairtail Fish', 1),
(123, 'Beku', 'Ikan Nila Utuh Beku', 'Frozen Whole Tilapia', 1),
(124, 'Beku', 'Ikan Pelagis Beku', 'Frozen Pelagis Fish', 1),
(125, 'Beku', 'Ikan Pelagis Fillet Beku', 'Frozen Fillet Pelagic Fish', 1),
(126, 'Kaleng', 'Ikan Pelagis Kaleng', 'Canned Pelagic Fish', 1),
(127, 'Beku', 'Ikan Pelagis Loin Beku', 'Frozen Loin Pelagic Fish', 1),
(128, 'Segar', 'Ikan Pelagis Segar', 'Fresh Pelagic Fish', 1),
(129, 'Beku', 'Ikan Pelagis Utuh Beku', 'Frozen Whole Pelagic Fish', 1),
(130, 'Lainnya', 'Ikan Pindang', 'Boiled Fish', 1),
(131, 'Kering', 'Ikan Pindang Kering', 'Dried Boiled Fish', 1),
(132, 'Beku', 'Ikan Rebus Beku Hasil Budidaya', 'Frozen Farm Raised Fish', 1),
(133, 'Lainnya', 'Ikan Renyah', 'Crispy Fish', 1),
(134, 'Beku', 'Ikan Scombroid Beku', 'Frozen Scombroidae Fish', 1),
(135, 'Segar', 'Ikan Scombroid Segar', 'Fresh Scombroidae Fish', 1),
(136, 'Segar', 'Ikan Segar Hasil Budidaya', 'Fresh Farm Raised Fish', 1),
(137, 'Beku', 'Ikan Tanpa Kepala dan Buang Isi', 'Frozen Headless and Gutted Fish', 1),
(138, 'Beku', 'Ikan Terbang Beku', 'Frozen Flying Fish', 1),
(139, 'Kering', 'Ikan Teri asin Kering', 'Dried Salty Anchovy', 1),
(140, 'Beku', 'Ikan Teri Beku', 'Frozen Anchovy', 1),
(141, 'Kering', 'Ikan Teri Kering', 'Dried Anchovy', 1),
(142, 'Kering', 'Ikan Teri Nasi', 'Dry Chirimen', 1),
(143, 'Reduksi', 'Jelly Powder, Puding Powder', '-', 1),
(144, 'Beku', 'Kakap Beku', 'Frozen Snapper', 1),
(145, 'Segar', 'Kakap Segar', 'Fresh Snapper', 1),
(146, 'Lainnya', 'Kamaboko', '-', 1),
(147, 'Asap', 'Katsuo Powder', '-', 1),
(148, 'Asap', 'Katsuobushi', '-', 1),
(149, 'Fermentasi', 'Kecap Ikan', 'Fish Sauce', 1),
(150, 'Beku', 'Kekerangan Beku', 'Frozen Shellfish', 1),
(151, 'Beku', 'Keong Beku', 'Frozen Snail', 1),
(152, 'Lainnya', 'Keong Hidup', 'Live Snail', 1),
(153, 'Lainnya', 'Keong Laut Hidup', 'Live Sea Snail', 1),
(154, 'Beku', 'Kepiting Beku', 'Frozen Crab', 1),
(155, 'Lainnya', 'Kepiting Hidup', 'Live Crab', 1),
(156, 'Beku', 'Kepiting Lunak Beku', 'Frozen Soft Shell Crab', 1),
(157, 'Beku', 'Kepiting Masak Beku', 'Frozen Cooked Crab ', 1),
(158, 'Segar', 'Kepiting Segar', 'Fresh Crab', 1),
(159, 'Beku', 'Kerang - kerangan Beku', 'Frozen mollusca', 1),
(160, 'Beku', 'Kerang Beku', 'Frozen Clam', 1),
(161, 'Lainnya', 'Kerang Hidup', 'Live Shell', 1),
(162, 'Kaleng', 'Kerang Kaleng', 'Canned Baby Clam', 1),
(163, 'Beku', 'Kerang Utuh Beku', 'Frozen Shellfish', 1),
(164, 'Beku', 'Kerang-kerangan Beku', 'Frozen mollusca', 1),
(165, 'Beku', 'Kerang-kerangan Rebus Beku', 'Frozen Cooked Mollusca', 1),
(166, 'Segar', 'Kerang-kerangan Segar', 'Fresh Mollusca', 1),
(167, 'Lainnya', 'Kerapu Hidup', 'Live Grouper ', 1),
(168, 'Lainnya', 'Keripik Belut', 'Eel Chips', 1),
(169, 'Lainnya', 'Keripik Ikan & Keripik Rumput Laut', 'Fish Chips & Seaweed Chips', 1),
(170, 'Lainnya', 'Keripik Ikan (Belut & Wader)', 'Fish Chips', 1),
(171, 'Lainnya', 'Keripik Ikan Bawis', 'Fish Chips', 1),
(172, 'Lainnya', 'Kerupuk & Rengginang Ikan', 'Fish Crackers', 1),
(173, 'Lainnya', 'Kerupuk Ikan', 'Fish Crackers', 1),
(174, 'Lainnya', 'Kerupuk Ikan & Udang', 'Fish & Shrimp Crackers', 1),
(175, 'Lainnya', 'Kerupuk Rumput Laut', 'Seaweed Crackers', 1),
(176, 'Lainnya', 'Kerupuk Udang', 'Shrimp Crackers', 1),
(177, 'Lainnya', 'Kolagen Ikan', 'Fish Collagen', 1),
(178, 'Lainnya', 'Kolagen Ikan ', 'Fish Collagen', 1),
(179, 'Lainnya', 'Krill Oil', '-', 1),
(180, 'Beku', 'Krustasea Beku', 'Frozen Crustacea', 1),
(181, 'Beku', 'Krustasea Mentah Beku', 'Frozen Raw Crustacea', 1),
(182, 'Segar', 'Krustasea Segar', 'Fresh Crustacea', 1),
(183, 'Kering', 'Kulit Ikan Hiu Kering', 'Dried Shark Skin', 1),
(184, 'Lainnya', 'Kulit Ikan Hiu, Kulit Ikan Pari', 'Shark Skin, Stingray Skin', 1),
(185, 'Kering', 'Kulit Ikan Kering', 'Dried Fish Skin', 1),
(186, 'Kering', 'Kulit Ikan Kering Olahan', 'Processed Dried Fish Skin', 1),
(187, 'Kering', 'Kulit Ikan Kering Utuh', 'Dried Fish Skin', 1),
(188, 'Beku', 'Kulit Nila Beku', 'Frozen Tilapia Skin', 1),
(189, 'Lainnya', 'Kulit Rajungan', 'Crab Skin', 1),
(190, 'Lainnya', 'Kura-kura Hidup', 'Live Turtle', 1),
(191, 'Lainnya', 'Labi-labi Hidup', 'Live Soft Shell Turtle', 1),
(192, 'Kering', 'Labi-Labi Kering', 'Dried Turtle', 1),
(193, 'Beku', 'Layur Beku', 'Frozen Hairtails Fish', 1),
(194, 'Asap', 'Lele Asap', 'Smoked Catfish', 1),
(195, 'Beku', 'Lele Beku', 'Frozen Catfish', 1),
(196, 'Beku', 'Lobster Beku', 'Frozen Lobster', 1),
(197, 'Lainnya', 'Lobster Hidup', 'Live Lobster', 1),
(198, 'Kaleng', 'Lobster Pasteurisasi', 'Pasteurized Lobster', 1),
(199, 'Beku', 'Lobster Rebus Beku', 'Frozen Cooked Lobster', 1),
(200, 'Segar', 'Lobster Segar', 'Fresh Lobster', 1),
(201, 'Beku', 'Loin Ikan Rebus Beku', 'Frozen Cooked Fish Loin', 1),
(202, 'Beku', 'Loin Rebus Beku', 'Frozen Cooked Loin', 1),
(203, 'Segar', 'Loin Tuna Segar', 'Fresh Tuna Loin', 1),
(204, 'Kaleng', 'Mackarel Kaleng ', 'Canned Fish (Mackerel)', 1),
(205, 'Beku', 'Makarel Beku', 'Frozen Meckerel', 1),
(206, 'Lainnya', 'Makerel Berbumbu', 'Seasoned Mackerel', 1),
(207, 'Kaleng', 'Makerel dalam Kaleng', 'Canned Mackerel', 1),
(208, 'Lainnya', 'Mineralised Seaweed Powder (Aquamin)', '-', 1),
(209, 'Lainnya', 'Minuman Rumput Laut', 'Seaweed Drink', 1),
(210, 'Reduksi', 'Minyak Ikan', 'Fish Oil', 1),
(211, 'Reduksi', 'Minyak Ikan Hiu', 'Shark Liver Oil', 1),
(212, 'Kaleng', 'Mollusca Asap Kaleng', 'Canned Smoked Mollusca', 1),
(213, 'Beku', 'Mollusca Beku', 'Frozen mollusca', 1),
(214, 'Segar', 'Mollusca Segar', 'Fresh mollusca', 1),
(215, 'Beku', 'Mollusca Shelfish Beku', 'Frozen Mollusca Shellfish', 1),
(216, 'Beku', 'Moluska Beku', 'Frozen mollusca', 1),
(217, 'Beku', 'Mussel Beku', 'Frozen Mussels', 1),
(218, 'Beku', 'Mussels Beku', 'Frozen Mussels', 1),
(219, 'Beku', 'Nila Loin Beku', 'Frozen Tilapia Loin', 1),
(220, 'Lainnya', 'Nori', '-', 1),
(221, 'Lainnya', 'Norifurikage', '-', 1),
(222, 'Lainnya', 'Omega-3 Acid Ethyl Ester 90 Oil', '-', 1),
(223, 'Lainnya', 'Otak-otak', '-', 1),
(224, 'Lainnya', 'Otak-Otak Bandeng', 'Milkfish Cake', 1),
(225, 'Lainnya', 'Otak-Otak Ikan', 'Fish Cake', 1),
(226, 'Beku', 'Oyster Beku', 'Frozen Oyster', 1),
(227, 'Segar', 'Oyster Segar', 'Fresh Oyster', 1),
(228, 'Beku', 'Paha Kodok Beku', 'Frozen Froglegs', 1),
(229, 'Lumatan Daging', 'Pasta Ikan Beku', 'Frozen Fish Paste', 1),
(230, 'Lainnya', 'Pempek Ikan', '-', 1),
(231, 'Lainnya', 'Pepes Bandeng', '-', 1),
(232, 'Lainnya', 'Pepes Ikan', 'Steamed Fish', 1),
(233, 'Lainnya', 'Perisa ikan', 'Fish flavor', 1),
(234, 'Lainnya', 'Perkedel Ikan', '-', 1),
(235, 'Kering', 'Perut Ikan Kering', 'Dried Fish Maw', 1),
(236, 'Pindang', 'Pindang Ikan', 'Boiled Fish', 1),
(237, 'Lumatan Daging', 'Produk Bernilai Tambah Beku', 'Frozen Value Added Product', 1),
(238, 'Beku', 'Rajungan Beku', 'Frozen Raw Crab', 1),
(239, 'Beku', 'Rajungan Mentah Beku', 'Frozen Raw Crab', 1),
(240, 'Segar', 'Rajungan Segar', 'Fresh Swimming Crab', 1),
(241, 'Reduksi', 'Refined Carrageenan', '-', 1),
(242, 'Beku', 'Remis Beku', 'Frozen Mussle', 1),
(243, 'Lainnya', 'Rendang Ikan & Rendang Lokan', '-', 1),
(244, 'Lainnya', 'Rengginang Ikan', 'Fish Crackers', 1),
(245, 'Lainnya', 'Rumput Laut Kering', 'Dried Seaweed', 1),
(246, 'Beku', 'Salmon Beku', 'Frozen Salmon', 1),
(247, 'Lainnya', 'Salmon Berbumbu', 'Drilled Salmon', 1),
(248, 'Segar', 'Salmon Segar', 'Fresh Salmon', 1),
(249, 'Kering', 'Ubur-ubur asin', 'Salted Jelly Fish', 1),
(250, 'Kaleng', 'Sarden Kaleng', 'Canned Fish (Sardines)', 1),
(251, 'Reduksi', 'Sari Ikan Gabus Beku', 'Frozen Fish Essence', 1),
(252, 'Lainnya', 'Sate Bandeng', '-', 1),
(253, 'Lainnya', 'Seaweed Flakes / Powder', 'Seaweed Flakes / Powder', 1),
(254, 'Lainnya', 'Selai Rumput Laut', 'Seaweed Jam', 1),
(255, 'Reduksi', 'Semi Refined Carrageenan', '-', 1),
(256, 'Beku', 'Sidat Beku', 'Frozen Eel', 1),
(257, 'Lainnya', 'Sidat Hidup', 'Live Eel', 1),
(258, 'Beku', 'Sidat Kukus Beku', 'Frozen Cooked Eel', 1),
(259, 'Beku', 'Sidat Panggang Beku', 'Frozen Grilled Eel', 1),
(260, 'Lumatan Daging', 'Siomay Ikan', 'Fish Siomay', 1),
(261, 'Lumatan Daging', 'Siomay Ikan Tuna', '-', 1),
(262, 'Beku', 'Siput Beku', 'Frozen Top Shell', 1),
(263, 'Beku', 'Sirip Hiu Beku', 'Frozen Shark Fin', 1),
(264, 'Kering', 'Sirip Hiu Kering', 'Dried Shark Fin', 1),
(265, 'Beku', 'Sirip Ikan Hiu Beku', 'Frozen Shark Fin', 1),
(266, 'Kering', 'Sirip Ikan Hiu Kering Olahan', 'Processed Dried Shark Fin', 1),
(267, 'Beku', 'Sirip, Tulang, Kulit Hiu Beku', 'Frozen Shark Skin, Bone, Fin', 1),
(268, 'Kering', 'Sirip, Tulang, Kulit Hiu Kering', 'Dried Shark Skin, Bone, Fin', 1),
(269, 'Lainnya', 'Snack Ikan', 'Fish Snack', 1),
(270, 'Lainnya', 'Snack Rumput Laut', 'Seaweed Snack', 1),
(271, 'Beku', 'Sotong Beku', 'Frozen Cuttlefish', 1),
(272, 'Segar', 'Sotong Segar', 'Fresh Cuttlefish', 1),
(273, 'Lumatan Daging', 'Surimi', 'Minced Fish', 1),
(274, 'Beku', 'Surimi Beku', 'Frozen Surimi', 1),
(275, 'Lumatan Daging', 'Tahu Bakso Ikan', '-', 1),
(276, 'Beku', 'Takoyaki Beku', 'Frozen Takoyaki', 1),
(277, 'Lumatan Daging', 'Tekwan', '-', 1),
(278, 'Beku', 'Telur Bulu Babi Beku', 'Frozen Salted Sea Urchin Egg', 1),
(279, 'Beku', 'Telur Ikan Beku', 'Frozen Fish Roe', 1),
(280, 'Segar', 'Telur Ikan Segar', 'Fresh Fish Roe', 1),
(281, 'Beku', 'Telur Ikan Terbang Beku', 'Frozen Flying Fish Roe', 1),
(282, 'Kering', 'Telur Ikan Terbang Kering', 'Dried Flying Fish Roe', 1),
(283, 'Reduksi', 'Tepung Agar-agar', 'Seaweed Powder', 1),
(284, 'Reduksi', 'Tepung Alginat', 'Refined Alginat', 1),
(285, 'Reduksi', 'Tepung Cangkang Kepiting', 'Crab Shell Meal', 1),
(286, 'Reduksi', 'Tepung Ekstrak Rumput Laut', 'Seaweed Extract Powder', 1),
(287, 'Reduksi', 'Tepung Ikan', 'Fish Meal', 1),
(288, 'Reduksi', 'Tepung Ikan & Tepung Udang', 'Fish & Shrimp Powder', 1),
(289, 'Reduksi', 'Tepung Ikan Merah', 'Steamed Dry Whole Red Fishmeal', 1),
(290, 'Reduksi', 'Tepung Ikan Untuk Bahan Baku Industri', 'Fish Powder SKP', 1),
(291, 'Reduksi', 'Tepung Karagenan', 'Refined Carrageenan', 1),
(292, 'Reduksi', 'Tepung Kepala Udang', 'Shrimp Head Meal', 1),
(293, 'Reduksi', 'Tepung Labi-Labi', 'Turtle Meal', 1),
(294, 'Reduksi', 'Tepung Rumput Laut', 'Seaweed Powder', 1),
(295, 'Reduksi', 'Tepung Seaweed', 'Seaweed Powder', 1),
(296, 'Reduksi', 'Tepung Teripang', 'Sea Cucumber Meal', 1),
(297, 'Reduksi', 'Tepung Udang', 'Shrimp Powder', 1),
(298, 'Fermentasi', 'Terasi Udang', 'Fermented Shrimp', 1),
(299, 'Kering', 'Teri Asin Kering', 'Dried Salted Anchovy', 1),
(300, 'Kering', 'Teri Kering', 'Dried Anchovy', 1),
(301, 'Kering', 'Teri Nasi Kering', 'Dried Anchovy', 1),
(302, 'Beku', 'Teripang Beku', 'Frozen Sea Cucumbers', 1),
(303, 'Kering', 'Teripang Kering', 'Dried Sea Cucumber', 1),
(304, 'Kering', 'Teripang Kering, Rumput Laut Kering', 'Dried Sea Cucumber, Dried Seaweed', 1),
(305, 'Beku', 'Tiram Beku', 'Frozen Oyster', 1),
(306, 'Kering', 'Tongkat Ikan Hiu', 'Shark Bone', 1),
(307, 'Kering', 'Tongkat Ikan Hiu Kering', 'Dried Shark Bone', 1),
(308, 'Beku', 'Tulang Hiu Beku', 'Frozen Shark Bone Cut', 1),
(309, 'Kering', 'Tulang Hiu Kering', 'Dried Shark Bone', 1),
(310, 'Kering', 'Tulang Ikan Kering', 'Dried Fish Bone', 1),
(311, 'Kering', 'Tulang Ikan Kering, Perut Ikan Kering, Kulit ', 'Dried Fish Bone,  Dried Fish Maw, Dried Fish ', 1),
(312, 'Kering', 'Tulang Ikan, Kepala Udang, Kulit Rajungan, Ku', 'Fish Bone, Shrimp Head, Swimming Crab Shells,', 1),
(313, 'Beku', 'Tuna Beku', 'Frozen Tuna', 1),
(314, 'Kaleng', 'Tuna Dalam Kaleng', 'Canned Tuna', 1),
(315, 'Kaleng', 'Tuna Kaleng', 'Canned Tuna', 1),
(316, 'Kaleng', 'Tuna Kaleng Tersterilisasi', 'Sterilited Canned Tuna', 1),
(317, 'Beku', 'Tuna Loin Beku', 'Frozen Tuna Loin', 1),
(318, 'Beku', 'Tuna Loin Masak Beku', 'Frozen Cooked Tuna Loin', 1),
(319, 'Segar', 'Tuna Loin Segar', 'Fresh Tuna Loin', 1),
(320, 'Beku', 'Tuna Masak Beku', 'Frozen Cooked Tuna', 1),
(321, 'Kaleng', 'Tuna Pouch', 'Pouched Tuna', 1),
(322, 'Beku', 'Tuna Rebus Beku', 'Frozen Cooked Tuna', 1),
(323, 'Beku', 'Tuna Saku Beku', 'Frozen Tuna Saku', 1),
(324, 'Segar', 'Tuna Sashimi Utuh Segar', 'Fresh Whole Tuna Sashimi', 1),
(325, 'Segar', 'Tuna Segar', 'Fresh Tuna', 1),
(326, 'Beku', 'Tuna Steak Beku', 'Frozen Steak Tuna', 1),
(327, 'Segar', 'Tuna Steak Segar', 'Fresh Steak Tuna', 1),
(328, 'Beku', 'Tuna Tepung Beku', 'Frozen Breaded Tuna', 1),
(329, 'Segar', 'Tuna Utuh Segar', 'Fresh Whole Tuna', 1),
(330, 'Kering', 'Ubur-ubur Asin', 'Salted Jellyfish', 1),
(331, 'Kering', 'Ubur-ubur Kering', 'Dried Jellyfish', 1),
(332, 'Beku', 'Udang Beku', 'Frozen Shrimp', 1),
(333, 'Lainnya', 'Udang Hidup', 'Live Shrimp', 1),
(334, 'Kaleng', 'Udang Kaleng', 'Canned Shrimp ', 1),
(335, 'Kering', 'Udang Kering', 'Dried Shrimp', 1),
(336, 'Beku', 'Udang Kipas Beku', 'Frozen Slipper Lobster', 1),
(337, 'Segar', 'Udang Kipas Segar', 'Fresh Slipper Lobster', 1),
(338, 'Beku', 'Udang Kupas Beku', 'Frozen Peeled Shrimp', 1),
(339, 'Beku', 'Udang Kupas Rebus Beku', 'Frozen Cooked Peeled Shrimp', 1),
(340, 'Beku', 'Udang Mentah Beku', 'Frozen Raw Shrimp', 1),
(341, 'Beku', 'Udang Rebus Beku', 'Frozen Cooked Shrimp', 1),
(342, 'Segar', 'Udang Segar', 'Fresh Shrimp', 1),
(343, 'Beku', 'Udang Tepung Beku', 'Frozen Breaded Shrimp', 1),
(344, 'Kaleng', 'Daging Rajungan Kaleng Sterilisasi', 'Sterilited Canned Meat Crab', 1),
(345, 'Beku', 'Scallop Beku', 'Frozen Scallop', 1),
(346, 'Segar', 'Cumi-Cumi Segar', 'Fresh Squid ', 1),
(347, 'Beku', 'Kerang Beku', 'Frozen Clam', 1),
(348, 'Lainnya', 'Moa Hidup', 'Live Moa', 1),
(349, 'Beku', 'Moa Beku', 'Frozen Moa', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi`
--

CREATE TABLE `tbl_provinsi` (
  `id_provinsi` int(2) NOT NULL,
  `nama_provinsi` varchar(26) DEFAULT NULL,
  `kode_provinsi` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_provinsi`
--

INSERT INTO `tbl_provinsi` (`id_provinsi`, `nama_provinsi`, `kode_provinsi`) VALUES
(1, 'Aceh', '11'),
(2, 'Sumatera Utara', '12'),
(3, 'Sumatera Barat', '13'),
(4, 'Riau', '14'),
(5, 'Kepulauan Riau', '21'),
(6, 'Kepulauan Bangka Belitung', '19'),
(7, 'Jambi', '15'),
(8, 'Bengkulu', '17'),
(9, 'Sumatera Selatan', '16'),
(10, 'Lampung', '18'),
(11, 'Banten', '36'),
(12, 'DKI Jakarta', '31'),
(13, 'Jawa Barat', '32'),
(14, 'Jawa Tengah', '33'),
(15, 'Daerah Istimewa Yogyakarta', '34'),
(16, 'Jawa Timur', '35'),
(17, 'Bali', '51'),
(18, 'Nusa Tenggara Barat', '52'),
(19, 'Nusa Tenggara Timur', '53'),
(20, 'Kalimantan Barat', '61'),
(21, 'Kalimantan Tengah', '62'),
(22, 'Kalimantan Selatan', '63'),
(23, 'Kalimantan Timur', '64'),
(24, 'Kalimantan Utara', '65'),
(25, 'Gorontalo', '75'),
(26, 'Sulawesi Selatan', '73'),
(27, 'Sulawesi Tenggara', '74'),
(28, 'Sulawesi Tengah', '72'),
(29, 'Sulawesi Utara', '71'),
(30, 'Sulawesi Barat', '76'),
(31, 'Maluku', '81'),
(32, 'Maluku Utara', '82'),
(33, 'Papua Barat', '91'),
(34, 'Papua', '92');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register_upi`
--

CREATE TABLE `tbl_register_upi` (
  `idtbl_upi` int(11) NOT NULL,
  `nama_upi` varchar(50) DEFAULT NULL,
  `pemilik_upi` varchar(50) DEFAULT NULL,
  `alamat_upi` varchar(100) DEFAULT NULL,
  `kodepos_upi` int(11) DEFAULT NULL,
  `entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya') DEFAULT NULL,
  `provinsi_upi` int(11) NOT NULL,
  `kabupaten_upi` varchar(45) DEFAULT NULL,
  `kecamatan_upi` varchar(45) DEFAULT NULL,
  `desa_upi` varchar(45) DEFAULT NULL,
  `email_upi` varchar(60) DEFAULT NULL,
  `kontak_upi` varchar(20) NOT NULL,
  `kontakperson_upi` varchar(20) NOT NULL,
  `penanggungjawab_upi` varchar(255) NOT NULL,
  `omzet_upi` varchar(10) DEFAULT NULL,
  `tahunmulai_upi` int(11) DEFAULT NULL,
  `nosiup_upi` varchar(45) DEFAULT NULL,
  `noiup_upi` varchar(45) DEFAULT NULL,
  `noakta_upi` varchar(45) DEFAULT NULL,
  `nonpwp_upi` varchar(45) DEFAULT NULL,
  `filesiup_upi` text NOT NULL,
  `fileiup_upi` text NOT NULL,
  `fileakta_upi` text NOT NULL,
  `alamat_pabrik` text NOT NULL,
  `registration_status` varchar(45) DEFAULT NULL,
  `registration_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rejected`
--

CREATE TABLE `tbl_rejected` (
  `id_rejected` int(11) NOT NULL,
  `alasan` text,
  `revisi` text,
  `upi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sarpras`
--

CREATE TABLE `tbl_sarpras` (
  `idtbl_sarpras` int(11) NOT NULL,
  `nama_sarpras` varchar(45) DEFAULT NULL,
  `value_sarpras` varchar(45) DEFAULT '0',
  `kuantitas_sarpras` varchar(45) DEFAULT '0',
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skp`
--

CREATE TABLE `tbl_skp` (
  `idtbl_skp` int(11) NOT NULL,
  `filegmpssop_skp` varchar(255) DEFAULT NULL,
  `filesp_skp` varchar(255) DEFAULT NULL,
  `permohonan_skp` enum('Baru','Perpanjang') DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `realisasiproduksi_skp` varchar(45) DEFAULT NULL,
  `upi_id` int(11) NOT NULL,
  `status_skp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skp_log`
--

CREATE TABLE `tbl_skp_log` (
  `id_skp_log` int(11) NOT NULL,
  `skp_id` int(11) NOT NULL,
  `status_log` varchar(50) NOT NULL,
  `date_log` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skp_terbit`
--

CREATE TABLE `tbl_skp_terbit` (
  `idtbl_skp_terbit` int(11) NOT NULL,
  `tglmulai_skp_terbit` date DEFAULT NULL,
  `tglkadaluarsa_skp_terbit` date DEFAULT NULL,
  `noseri_skp_terbit` varchar(255) DEFAULT NULL,
  `no_skp_terbit` varchar(255) DEFAULT NULL,
  `file_skp_terbit` text NOT NULL,
  `skp_id` int(11) DEFAULT NULL,
  `alurproses_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sni`
--

CREATE TABLE `tbl_sni` (
  `idtbl_sni` int(11) NOT NULL,
  `nama_sni` varchar(45) DEFAULT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tandatangan`
--

CREATE TABLE `tbl_tandatangan` (
  `idtbl_tandatangan` int(11) NOT NULL,
  `status_tandatangan` varchar(255) NOT NULL,
  `tgl_tandatangan` date NOT NULL,
  `skp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upi`
--

CREATE TABLE `tbl_upi` (
  `idtbl_upi` int(11) NOT NULL,
  `nama_upi` varchar(50) DEFAULT NULL,
  `pemilik_upi` varchar(50) DEFAULT NULL,
  `alamat_upi` varchar(100) DEFAULT NULL,
  `kodepos_upi` int(11) DEFAULT NULL,
  `entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya') DEFAULT NULL,
  `provinsi_upi` int(2) NOT NULL,
  `kabupaten_upi` varchar(45) DEFAULT NULL,
  `kecamatan_upi` varchar(45) DEFAULT NULL,
  `desa_upi` varchar(45) DEFAULT NULL,
  `email_upi` varchar(60) DEFAULT NULL,
  `omzet_upi` varchar(10) DEFAULT NULL,
  `tahunmulai_upi` int(11) DEFAULT NULL,
  `nosiup_upi` varchar(45) DEFAULT NULL,
  `noiup_upi` varchar(45) DEFAULT NULL,
  `noakta_upi` varchar(45) DEFAULT NULL,
  `nonpwp_upi` varchar(45) DEFAULT NULL,
  `filesiup_upi` text,
  `fileiup_upi` text,
  `fileakta_upi` text,
  `kontak_upi` varchar(255) NOT NULL,
  `kontakperson_upi` varchar(20) NOT NULL,
  `penanggungjawab_upi` varchar(255) NOT NULL,
  `jenis_upi` varchar(100) NOT NULL,
  `skala_upi` varchar(100) NOT NULL,
  `alamat_pabrik` text NOT NULL,
  `registration_date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upi`
--

INSERT INTO `tbl_upi` (`idtbl_upi`, `nama_upi`, `pemilik_upi`, `alamat_upi`, `kodepos_upi`, `entitas_upi`, `provinsi_upi`, `kabupaten_upi`, `kecamatan_upi`, `desa_upi`, `email_upi`, `omzet_upi`, `tahunmulai_upi`, `nosiup_upi`, `noiup_upi`, `noakta_upi`, `nonpwp_upi`, `filesiup_upi`, `fileiup_upi`, `fileakta_upi`, `kontak_upi`, `kontakperson_upi`, `penanggungjawab_upi`, `jenis_upi`, `skala_upi`, `alamat_pabrik`, `registration_date`, `user_id`) VALUES
(1, 'MOEGHIFAR', 'Ghiyast Farisi', 'Jl. Lantana 1 Blok D1 no.32 Kemang Pratama 3 ', 17114, 'PT', 13, 'Bekasi', 'Rawalumbu', 'Sepanjang Jaya', 'moeghifar@gmail.com', '> 50', 2009, '982371239910000000123', '982371239910000000124', '982371239910000000125', '89.012.388.1–200.112', '/file/upi/file_siup/moeghifar_982371239910000000123.pdf', '/file/upi/file_iup/moeghifar_982371239910000000124.pdf', '/file/upi/file_akta/moeghifar_982371239910000000125.pdf', '087772492572', 'Ghiyast & 0877724925', 'Ghiyast Farisi', 'UPRLK', 'besar', '-', '2017-08-01', 39),
(2, 'DEMO 1', 'Jang Nara', 'Jl. Hibiskus no.450 Kemang Pratama 3', 17114, 'PT', 13, 'Kota Bekasi', 'Rawalumbu', 'Sepanjang Jaya', 'demo1@gmail.com', '> 50', 2007, '982371239910000000123', '982371239910000000124', '982371239910000000125', '80–123–000–1–230–012', '/file/upi/file_siup/demo_1_982371239910000000123.pdf', '/file/upi/file_iup/demo_1_982371239910000000124.pdf', '/file/upi/file_akta/demo_1_982371239910000000125.pdf', '087771230123', 'Jang Nara / 08777123', 'Jang Nara', 'UPIH', 'menengah', 'Jl. Pantura raya no.90 ', '2017-08-07', 43);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` text,
  `email` varchar(255) DEFAULT NULL,
  `login_status` enum('0','1') DEFAULT NULL,
  `login_token` text,
  `validation_code` text,
  `level` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `email`, `login_status`, `login_token`, `validation_code`, `level`) VALUES
(1, 'SuperAdmin', '$2y$10$cH.d3c4qNg.kG//Bfix4zuYy7g/M9/GJcAa29RqzrRwMklT1tw14K', 'admin@markodevs.com', '1', NULL, NULL, 'admin'),
(2, 'userdirjen', '$2y$10$WxwyBC7nzg5WkwLheyvs0uB3ePNyyP6f56IeqPaDiOF1hLxkJN7yy', 'userdirjen@kkp.go.id', '1', NULL, NULL, 'pejabat-dirjen'),
(3, 'userdirektur', '$2y$10$q//kXqraHN/W8Mg.w3bjpOGsbp9F1nIR.VCj/l8wjao74ZIqXoPCO', 'userdirektur@kkp.go.id', '1', NULL, NULL, 'pejabat-direktur'),
(4, 'userkp', '$2y$10$LrhzfD0EH5bZDz.ejvWmD.FczZTDPyo8aJ8D19UQRVOvyRq7PJ4h2', 'dodim@kkp.go.id', '1', NULL, NULL, 'kp'),
(5, 'adaceh', '$2y$10$d3ci4dEiTe8pw78nEaaf1u3mv54Ar6fp4J/Tqxt1aqL7UNTHZOvb6', '-', '1', NULL, NULL, 'dinas'),
(6, 'adsumut', '$2y$10$v5HsJGlLQ/1Y3uoIfRCTEef9bupn1ZZVTIICy4Z33.NwwbrpGRE4O', '-', '1', NULL, NULL, 'dinas'),
(7, 'adsumbar', '$2y$10$7x7EhRgN30VQgaMnGYFBKuJkQLT8FYSO9nysncQpXZDnelTM5GI7y', '-', '1', NULL, NULL, 'dinas'),
(8, 'adriau', '$2y$10$bNAyNkziC3VgYbgy0oF/UuzCBslxQrdd6w9G8o7sFFtak69Z8B2L.', '-', '1', NULL, NULL, 'dinas'),
(9, 'adjambi', '$2y$10$4MjbvvT9wOr5S.d6l.C33uOA60JikOy40iPASa2pz4kL/VlwSxUNe', '-', '1', NULL, NULL, 'dinas'),
(10, 'adsumsel', '$2y$10$Vm70hX2azBF9cLZB2UUY8.GNnq1Npwc3x0mGh4lr1SeyRACRK.3U2', '-', '1', NULL, NULL, 'dinas'),
(11, 'adbengkulu', '$2y$10$q7NmHyQPYbensip/LLxATeclkIABh7tAXBVEltlTiqpFdmzPOZ0Zy', '-', '1', NULL, NULL, 'dinas'),
(12, 'adlampung', '$2y$10$Fm3Lae4wBL7PLd1.kSSJYesDsQs2osgORskSTgBnzR6/.z2.nPjDu', '-', '1', NULL, NULL, 'dinas'),
(13, 'adbabel', '$2y$10$bG2LF0XfAa7MTjycWzxXn.G68WTkxwOx9MxF.wcLop0hDp.2HTq3K', '-', '1', NULL, NULL, 'dinas'),
(14, 'adkepri', '$2y$10$6Iw3f/57JwoStXi2sw7qwOJlO.9AaaWBHb9S9ZNnEM5Mud2DindFq', '-', '1', NULL, NULL, 'dinas'),
(15, 'adjabar', '$2y$10$8N2DmxxdhWEzOKzTl8wBDOz4jghNj34uW8RnAM9A34C0sFuUzXBfS', '-', '1', NULL, NULL, 'dinas'),
(16, 'addki', '$2y$10$f/6q./aX/a4mC5jYobCT4OMk5COmdDXf3a6Cs3n1yajyYO7JZzS52', '-', '1', NULL, NULL, 'dinas'),
(17, 'adjateng', '$2y$10$iYa.pV0RBv6gJyHJbAL78.Cvi8iFdluzM6NoPvGNVLAOT5t7PoQiC', '-', '1', NULL, NULL, 'dinas'),
(18, 'addiy', '$2y$10$UeUoEUV3S3uBCT2E4KSWReVFYb5Yj4gIwqaJQWwve1uU3pjOHS4AO', '-', '1', NULL, NULL, 'dinas'),
(19, 'adjatim', '$2y$10$RxYB7AY.yqFsiNUbg8cp2OoC.IB2VHhzoJS5rTf6UgzVqinFEIhQe', '-', '1', NULL, NULL, 'dinas'),
(20, 'adbanten', '$2y$10$yey0LE8N2Jd4nezrshGuoOoXayTF8OwswIdlFkp4q3PDN9FS5R1PW', '-', '1', NULL, NULL, 'dinas'),
(21, 'adbali', '$2y$10$SVQKT7nMEb5z/TJBbYwSM.RbA3rpY47WPyqUJJHUEk7mNbDXkstZG', '-', '1', NULL, NULL, 'dinas'),
(22, 'adntb', '$2y$10$usFpdLYSMl6XfWZk0zsO3eLV/rT2WW5DbhSi..58TCcK/l120iFjS', '-', '1', NULL, NULL, 'dinas'),
(23, 'adntt', '$2y$10$F7Asm38tuF9c5nr3VJqxoeZWznwKvjKeGKET9DNP3cjBR/J7qOOx2', '-', '1', NULL, NULL, 'dinas'),
(24, 'adkalbar', '$2y$10$HEkP.kipgi0SbIZrkwn75uQwxJ8SYcG76kNf5vkFiM07uarW99t7y', '-', '1', NULL, NULL, 'dinas'),
(25, 'adkalteng', '$2y$10$yRLdwp/3mSliiR0RedxBte1ffPNwfC..Skpsbojc.YehWsnZl.IBK', '-', '1', NULL, NULL, 'dinas'),
(26, 'adkalsel', '$2y$10$Fi2jk5x2gjrS3AbEnnIF7urjpagvHMYLSOQnv8zV5CZhq7UUZtlre', '-', '1', NULL, NULL, 'dinas'),
(27, 'adkaltim', '$2y$10$n1VJUfvlLe302zxOe0EIWOnqUY.IoC.53JYrYmqghHHs.OUUSXulu', '-', '1', NULL, NULL, 'dinas'),
(28, 'adkaltara', '$2y$10$HzBpUpURNhTJCULD//b64.htxEIE/bcgxg/hCAAm5i23cld8mTD5G', '-', '1', NULL, NULL, 'dinas'),
(29, 'adsulut', '$2y$10$Z4gDPjTKDHCPhAq2K4Ymcuz2ijkh2no18jflKN48WZJdgASHGFpjm', '-', '1', NULL, NULL, 'dinas'),
(30, 'adsulteng', '$2y$10$8MrStx/eMhvP9E4pFOd.iOMDD3bTzfLqqdGoRdmMIzzXOkKMQEiZW', '-', '1', NULL, NULL, 'dinas'),
(31, 'adsulsel', '$2y$10$ROO5LpbgKmeSuIQPk1cFE.FhFbB7JEZsUhocX.FoHjeSwhflSZ266', '-', '1', NULL, NULL, 'dinas'),
(32, 'adsultra', '$2y$10$2v/EcbwEoGQB79YDS83dp.5NbH1.5ZWD6DRWjbhgI/jPfgCDmic42', '-', '1', NULL, NULL, 'dinas'),
(33, 'adgorontalo', '$2y$10$oxFDFgavcw.7/wCZQ0mtB.avtP5fwfmy8mONqJRNIG7Zp/WIdSfPm', '-', '1', NULL, NULL, 'dinas'),
(34, 'adsulbar', '$2y$10$bVUFCLguTu2j8R8g7Cx2ZuqEDebabLSeIsfzygyQo0kABN.JGosOm', '-', '1', NULL, NULL, 'dinas'),
(35, 'admaluku', '$2y$10$I39xP1lqKaUoKTCsDVKiNemOx7NRE9KN5Rbask9kk7/6jEeIQidhe', '-', '1', NULL, NULL, 'dinas'),
(36, 'admalut', '$2y$10$n6VKefzBoBfOnMseq0/PM.3BP6GMxBEwLAoPJSjL/B1FdVN5Q2kkW', '-', '1', NULL, NULL, 'dinas'),
(37, 'adpapbar', '$2y$10$N11sAjlbCK.heh7hYoXzYu1jXCoup8.Ngy1jeYKmcGVutpSRHloTi', '-', '1', NULL, NULL, 'dinas'),
(38, 'adpapua', '$2y$10$DJRSEOerlfFGT6xjdVoatux8q5uz4jRWjGRoTncTdC80WdE/bYPbS', '-', '1', NULL, NULL, 'dinas'),
(39, 'moeghifar', '$2y$10$8N2DmxxdhWEzOKzTl8wBDOz4jghNj34uW8RnAM9A34C0sFuUzXBfS', 'moeghifar@gmail.com', '1', NULL, NULL, 'upi'),
(43, 'demo1', '$2y$10$B8sitZW/dJbTwhLEQOHFcOQIGGG6hXZxkVv8admSRJT3quOGTALca', 'demo1@gmail.com', '1', NULL, NULL, 'upi');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pengiriman_skp_terbit`
-- (See below for the actual view)
--
CREATE TABLE `view_pengiriman_skp_terbit` (
`idtbl_skp_terbit` int(11)
,`tglmulai_skp_terbit` date
,`tglkadaluarsa_skp_terbit` date
,`noseri_skp_terbit` varchar(255)
,`no_skp_terbit` varchar(255)
,`file_skp_terbit` text
,`skp_id` int(11)
,`alurproses_id` int(11)
,`idtbl_alurproses` int(11)
,`nama_alurproses` text
,`name_alurproses` text
,`idtbl_skp` int(11)
,`filegmpssop_skp` varchar(255)
,`filesp_skp` varchar(255)
,`permohonan_skp` enum('Baru','Perpanjang')
,`produk_id` int(11)
,`realisasiproduksi_skp` varchar(45)
,`upi_id` int(11)
,`status_skp` varchar(45)
,`idtbl_produk` int(11)
,`kategori_produk` varchar(100)
,`namaind_produk` varchar(45)
,`namaen_produk` varchar(45)
,`status_produk` int(11)
,`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(2)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`kontak_upi` varchar(255)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`jenis_upi` varchar(100)
,`skala_upi` varchar(100)
,`alamat_pabrik` text
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
,`idtbl_pengiriman` int(11)
,`kurir_pengiriman` varchar(100)
,`tgl_pengiriman` date
,`resi_pengiriman` varchar(100)
,`alamat_pengiriman` text
,`skpterbit_id` int(11)
,`status_pengiriman` int(11)
,`keterangan_pengiriman` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_skp_kunjungan`
-- (See below for the actual view)
--
CREATE TABLE `view_skp_kunjungan` (
`idtbl_skp` int(11)
,`filegmpssop_skp` varchar(255)
,`filesp_skp` varchar(255)
,`permohonan_skp` enum('Baru','Perpanjang')
,`produk_id` int(11)
,`realisasiproduksi_skp` varchar(45)
,`upi_id` int(11)
,`status_skp` varchar(45)
,`idtbl_produk` int(11)
,`kategori_produk` varchar(100)
,`namaind_produk` varchar(45)
,`namaen_produk` varchar(45)
,`status_produk` int(11)
,`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(2)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`kontak_upi` varchar(255)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`jenis_upi` varchar(100)
,`skala_upi` varchar(100)
,`alamat_pabrik` text
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
,`idtbl_kunjungan` int(11)
,`tgl_kunjungan` date
,`pic_kunjungan` varchar(255)
,`uker_kunjungan` varchar(50)
,`temuan_kunjungan` text
,`perbaikan_kunjungan` text
,`survey_kunjungan` text
,`rekomendasi_kunjungan` varchar(255)
,`status_kunjungan` varchar(50)
,`skp_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_skp_terbit`
-- (See below for the actual view)
--
CREATE TABLE `view_skp_terbit` (
`idtbl_skp_terbit` int(11)
,`tglmulai_skp_terbit` date
,`tglkadaluarsa_skp_terbit` date
,`noseri_skp_terbit` varchar(255)
,`no_skp_terbit` varchar(255)
,`file_skp_terbit` text
,`skp_id` int(11)
,`alurproses_id` int(11)
,`idtbl_alurproses` int(11)
,`nama_alurproses` text
,`name_alurproses` text
,`idtbl_skp` int(11)
,`filegmpssop_skp` varchar(255)
,`filesp_skp` varchar(255)
,`permohonan_skp` enum('Baru','Perpanjang')
,`produk_id` int(11)
,`realisasiproduksi_skp` varchar(45)
,`upi_id` int(11)
,`status_skp` varchar(45)
,`idtbl_produk` int(11)
,`kategori_produk` varchar(100)
,`namaind_produk` varchar(45)
,`namaen_produk` varchar(45)
,`status_produk` int(11)
,`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(2)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`kontak_upi` varchar(255)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`jenis_upi` varchar(100)
,`skala_upi` varchar(100)
,`alamat_pabrik` text
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_upi_produk_skp`
-- (See below for the actual view)
--
CREATE TABLE `view_upi_produk_skp` (
`idtbl_skp` int(11)
,`filegmpssop_skp` varchar(255)
,`filesp_skp` varchar(255)
,`permohonan_skp` enum('Baru','Perpanjang')
,`produk_id` int(11)
,`realisasiproduksi_skp` varchar(45)
,`upi_id` int(11)
,`status_skp` varchar(45)
,`idtbl_produk` int(11)
,`kategori_produk` varchar(100)
,`namaind_produk` varchar(45)
,`namaen_produk` varchar(45)
,`status_produk` int(11)
,`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(2)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`kontak_upi` varchar(255)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`jenis_upi` varchar(100)
,`skala_upi` varchar(100)
,`alamat_pabrik` text
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_dinas_provinsi`
-- (See below for the actual view)
--
CREATE TABLE `view_user_dinas_provinsi` (
`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_dinas` int(11)
,`nama_dinas` varchar(255)
,`jabatan_dinas` varchar(255)
,`provinsi_id` int(11)
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_kp`
-- (See below for the actual view)
--
CREATE TABLE `view_user_kp` (
`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_dinas` int(11)
,`nama_dinas` varchar(255)
,`jabatan_dinas` varchar(255)
,`provinsi_id` int(11)
,`user_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_register_upi`
-- (See below for the actual view)
--
CREATE TABLE `view_user_register_upi` (
`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(11)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`kontak_upi` varchar(20)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`alamat_pabrik` text
,`registration_status` varchar(45)
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user_upi_provinsi`
-- (See below for the actual view)
--
CREATE TABLE `view_user_upi_provinsi` (
`id_user` int(11)
,`username` varchar(255)
,`password` text
,`email` varchar(255)
,`login_status` enum('0','1')
,`login_token` text
,`validation_code` text
,`level` varchar(255)
,`idtbl_upi` int(11)
,`nama_upi` varchar(50)
,`pemilik_upi` varchar(50)
,`alamat_upi` varchar(100)
,`kodepos_upi` int(11)
,`entitas_upi` enum('PT','CV','UD','Koperasi','Lainnya')
,`provinsi_upi` int(2)
,`kabupaten_upi` varchar(45)
,`kecamatan_upi` varchar(45)
,`desa_upi` varchar(45)
,`email_upi` varchar(60)
,`omzet_upi` varchar(10)
,`tahunmulai_upi` int(11)
,`nosiup_upi` varchar(45)
,`noiup_upi` varchar(45)
,`noakta_upi` varchar(45)
,`nonpwp_upi` varchar(45)
,`filesiup_upi` text
,`fileiup_upi` text
,`fileakta_upi` text
,`kontak_upi` varchar(255)
,`kontakperson_upi` varchar(20)
,`penanggungjawab_upi` varchar(255)
,`jenis_upi` varchar(100)
,`skala_upi` varchar(100)
,`alamat_pabrik` text
,`registration_date` date
,`user_id` int(11)
,`id_provinsi` int(2)
,`nama_provinsi` varchar(26)
,`kode_provinsi` varchar(2)
);

-- --------------------------------------------------------

--
-- Structure for view `view_pengiriman_skp_terbit`
--
DROP TABLE IF EXISTS `view_pengiriman_skp_terbit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pengiriman_skp_terbit`  AS  select `view_skp_terbit`.`idtbl_skp_terbit` AS `idtbl_skp_terbit`,`view_skp_terbit`.`tglmulai_skp_terbit` AS `tglmulai_skp_terbit`,`view_skp_terbit`.`tglkadaluarsa_skp_terbit` AS `tglkadaluarsa_skp_terbit`,`view_skp_terbit`.`noseri_skp_terbit` AS `noseri_skp_terbit`,`view_skp_terbit`.`no_skp_terbit` AS `no_skp_terbit`,`view_skp_terbit`.`file_skp_terbit` AS `file_skp_terbit`,`view_skp_terbit`.`skp_id` AS `skp_id`,`view_skp_terbit`.`alurproses_id` AS `alurproses_id`,`view_skp_terbit`.`idtbl_alurproses` AS `idtbl_alurproses`,`view_skp_terbit`.`nama_alurproses` AS `nama_alurproses`,`view_skp_terbit`.`name_alurproses` AS `name_alurproses`,`view_skp_terbit`.`idtbl_skp` AS `idtbl_skp`,`view_skp_terbit`.`filegmpssop_skp` AS `filegmpssop_skp`,`view_skp_terbit`.`filesp_skp` AS `filesp_skp`,`view_skp_terbit`.`permohonan_skp` AS `permohonan_skp`,`view_skp_terbit`.`produk_id` AS `produk_id`,`view_skp_terbit`.`realisasiproduksi_skp` AS `realisasiproduksi_skp`,`view_skp_terbit`.`upi_id` AS `upi_id`,`view_skp_terbit`.`status_skp` AS `status_skp`,`view_skp_terbit`.`idtbl_produk` AS `idtbl_produk`,`view_skp_terbit`.`kategori_produk` AS `kategori_produk`,`view_skp_terbit`.`namaind_produk` AS `namaind_produk`,`view_skp_terbit`.`namaen_produk` AS `namaen_produk`,`view_skp_terbit`.`status_produk` AS `status_produk`,`view_skp_terbit`.`id_user` AS `id_user`,`view_skp_terbit`.`username` AS `username`,`view_skp_terbit`.`password` AS `password`,`view_skp_terbit`.`email` AS `email`,`view_skp_terbit`.`login_status` AS `login_status`,`view_skp_terbit`.`login_token` AS `login_token`,`view_skp_terbit`.`validation_code` AS `validation_code`,`view_skp_terbit`.`level` AS `level`,`view_skp_terbit`.`idtbl_upi` AS `idtbl_upi`,`view_skp_terbit`.`nama_upi` AS `nama_upi`,`view_skp_terbit`.`pemilik_upi` AS `pemilik_upi`,`view_skp_terbit`.`alamat_upi` AS `alamat_upi`,`view_skp_terbit`.`kodepos_upi` AS `kodepos_upi`,`view_skp_terbit`.`entitas_upi` AS `entitas_upi`,`view_skp_terbit`.`provinsi_upi` AS `provinsi_upi`,`view_skp_terbit`.`kabupaten_upi` AS `kabupaten_upi`,`view_skp_terbit`.`kecamatan_upi` AS `kecamatan_upi`,`view_skp_terbit`.`desa_upi` AS `desa_upi`,`view_skp_terbit`.`email_upi` AS `email_upi`,`view_skp_terbit`.`omzet_upi` AS `omzet_upi`,`view_skp_terbit`.`tahunmulai_upi` AS `tahunmulai_upi`,`view_skp_terbit`.`nosiup_upi` AS `nosiup_upi`,`view_skp_terbit`.`noiup_upi` AS `noiup_upi`,`view_skp_terbit`.`noakta_upi` AS `noakta_upi`,`view_skp_terbit`.`nonpwp_upi` AS `nonpwp_upi`,`view_skp_terbit`.`filesiup_upi` AS `filesiup_upi`,`view_skp_terbit`.`fileiup_upi` AS `fileiup_upi`,`view_skp_terbit`.`fileakta_upi` AS `fileakta_upi`,`view_skp_terbit`.`kontak_upi` AS `kontak_upi`,`view_skp_terbit`.`kontakperson_upi` AS `kontakperson_upi`,`view_skp_terbit`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`view_skp_terbit`.`jenis_upi` AS `jenis_upi`,`view_skp_terbit`.`skala_upi` AS `skala_upi`,`view_skp_terbit`.`alamat_pabrik` AS `alamat_pabrik`,`view_skp_terbit`.`registration_date` AS `registration_date`,`view_skp_terbit`.`user_id` AS `user_id`,`view_skp_terbit`.`id_provinsi` AS `id_provinsi`,`view_skp_terbit`.`nama_provinsi` AS `nama_provinsi`,`view_skp_terbit`.`kode_provinsi` AS `kode_provinsi`,`tbl_pengiriman`.`idtbl_pengiriman` AS `idtbl_pengiriman`,`tbl_pengiriman`.`kurir_pengiriman` AS `kurir_pengiriman`,`tbl_pengiriman`.`tgl_pengiriman` AS `tgl_pengiriman`,`tbl_pengiriman`.`resi_pengiriman` AS `resi_pengiriman`,`tbl_pengiriman`.`alamat_pengiriman` AS `alamat_pengiriman`,`tbl_pengiriman`.`skpterbit_id` AS `skpterbit_id`,`tbl_pengiriman`.`status_pengiriman` AS `status_pengiriman`,`tbl_pengiriman`.`keterangan_pengiriman` AS `keterangan_pengiriman` from (`view_skp_terbit` join `tbl_pengiriman`) where (`tbl_pengiriman`.`skpterbit_id` = `view_skp_terbit`.`idtbl_skp_terbit`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_skp_kunjungan`
--
DROP TABLE IF EXISTS `view_skp_kunjungan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_skp_kunjungan`  AS  select `ups`.`idtbl_skp` AS `idtbl_skp`,`ups`.`filegmpssop_skp` AS `filegmpssop_skp`,`ups`.`filesp_skp` AS `filesp_skp`,`ups`.`permohonan_skp` AS `permohonan_skp`,`ups`.`produk_id` AS `produk_id`,`ups`.`realisasiproduksi_skp` AS `realisasiproduksi_skp`,`ups`.`upi_id` AS `upi_id`,`ups`.`status_skp` AS `status_skp`,`ups`.`idtbl_produk` AS `idtbl_produk`,`ups`.`kategori_produk` AS `kategori_produk`,`ups`.`namaind_produk` AS `namaind_produk`,`ups`.`namaen_produk` AS `namaen_produk`,`ups`.`status_produk` AS `status_produk`,`ups`.`id_user` AS `id_user`,`ups`.`username` AS `username`,`ups`.`password` AS `password`,`ups`.`email` AS `email`,`ups`.`login_status` AS `login_status`,`ups`.`login_token` AS `login_token`,`ups`.`validation_code` AS `validation_code`,`ups`.`level` AS `level`,`ups`.`idtbl_upi` AS `idtbl_upi`,`ups`.`nama_upi` AS `nama_upi`,`ups`.`pemilik_upi` AS `pemilik_upi`,`ups`.`alamat_upi` AS `alamat_upi`,`ups`.`kodepos_upi` AS `kodepos_upi`,`ups`.`entitas_upi` AS `entitas_upi`,`ups`.`provinsi_upi` AS `provinsi_upi`,`ups`.`kabupaten_upi` AS `kabupaten_upi`,`ups`.`kecamatan_upi` AS `kecamatan_upi`,`ups`.`desa_upi` AS `desa_upi`,`ups`.`email_upi` AS `email_upi`,`ups`.`omzet_upi` AS `omzet_upi`,`ups`.`tahunmulai_upi` AS `tahunmulai_upi`,`ups`.`nosiup_upi` AS `nosiup_upi`,`ups`.`noiup_upi` AS `noiup_upi`,`ups`.`noakta_upi` AS `noakta_upi`,`ups`.`nonpwp_upi` AS `nonpwp_upi`,`ups`.`filesiup_upi` AS `filesiup_upi`,`ups`.`fileiup_upi` AS `fileiup_upi`,`ups`.`fileakta_upi` AS `fileakta_upi`,`ups`.`kontak_upi` AS `kontak_upi`,`ups`.`kontakperson_upi` AS `kontakperson_upi`,`ups`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`ups`.`jenis_upi` AS `jenis_upi`,`ups`.`skala_upi` AS `skala_upi`,`ups`.`alamat_pabrik` AS `alamat_pabrik`,`ups`.`registration_date` AS `registration_date`,`ups`.`user_id` AS `user_id`,`ups`.`id_provinsi` AS `id_provinsi`,`ups`.`nama_provinsi` AS `nama_provinsi`,`ups`.`kode_provinsi` AS `kode_provinsi`,`k`.`idtbl_kunjungan` AS `idtbl_kunjungan`,`k`.`tgl_kunjungan` AS `tgl_kunjungan`,`k`.`pic_kunjungan` AS `pic_kunjungan`,`k`.`uker_kunjungan` AS `uker_kunjungan`,`k`.`temuan_kunjungan` AS `temuan_kunjungan`,`k`.`perbaikan_kunjungan` AS `perbaikan_kunjungan`,`k`.`survey_kunjungan` AS `survey_kunjungan`,`k`.`rekomendasi_kunjungan` AS `rekomendasi_kunjungan`,`k`.`status_kunjungan` AS `status_kunjungan`,`k`.`skp_id` AS `skp_id` from (`view_upi_produk_skp` `ups` join `tbl_kunjungan` `k`) where (`ups`.`idtbl_skp` = `k`.`skp_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `view_skp_terbit`
--
DROP TABLE IF EXISTS `view_skp_terbit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_skp_terbit`  AS  select `skpt`.`idtbl_skp_terbit` AS `idtbl_skp_terbit`,`skpt`.`tglmulai_skp_terbit` AS `tglmulai_skp_terbit`,`skpt`.`tglkadaluarsa_skp_terbit` AS `tglkadaluarsa_skp_terbit`,`skpt`.`noseri_skp_terbit` AS `noseri_skp_terbit`,`skpt`.`no_skp_terbit` AS `no_skp_terbit`,`skpt`.`file_skp_terbit` AS `file_skp_terbit`,`skpt`.`skp_id` AS `skp_id`,`skpt`.`alurproses_id` AS `alurproses_id`,`ap`.`idtbl_alurproses` AS `idtbl_alurproses`,`ap`.`nama_alurproses` AS `nama_alurproses`,`ap`.`name_alurproses` AS `name_alurproses`,`ups`.`idtbl_skp` AS `idtbl_skp`,`ups`.`filegmpssop_skp` AS `filegmpssop_skp`,`ups`.`filesp_skp` AS `filesp_skp`,`ups`.`permohonan_skp` AS `permohonan_skp`,`ups`.`produk_id` AS `produk_id`,`ups`.`realisasiproduksi_skp` AS `realisasiproduksi_skp`,`ups`.`upi_id` AS `upi_id`,`ups`.`status_skp` AS `status_skp`,`ups`.`idtbl_produk` AS `idtbl_produk`,`ups`.`kategori_produk` AS `kategori_produk`,`ups`.`namaind_produk` AS `namaind_produk`,`ups`.`namaen_produk` AS `namaen_produk`,`ups`.`status_produk` AS `status_produk`,`ups`.`id_user` AS `id_user`,`ups`.`username` AS `username`,`ups`.`password` AS `password`,`ups`.`email` AS `email`,`ups`.`login_status` AS `login_status`,`ups`.`login_token` AS `login_token`,`ups`.`validation_code` AS `validation_code`,`ups`.`level` AS `level`,`ups`.`idtbl_upi` AS `idtbl_upi`,`ups`.`nama_upi` AS `nama_upi`,`ups`.`pemilik_upi` AS `pemilik_upi`,`ups`.`alamat_upi` AS `alamat_upi`,`ups`.`kodepos_upi` AS `kodepos_upi`,`ups`.`entitas_upi` AS `entitas_upi`,`ups`.`provinsi_upi` AS `provinsi_upi`,`ups`.`kabupaten_upi` AS `kabupaten_upi`,`ups`.`kecamatan_upi` AS `kecamatan_upi`,`ups`.`desa_upi` AS `desa_upi`,`ups`.`email_upi` AS `email_upi`,`ups`.`omzet_upi` AS `omzet_upi`,`ups`.`tahunmulai_upi` AS `tahunmulai_upi`,`ups`.`nosiup_upi` AS `nosiup_upi`,`ups`.`noiup_upi` AS `noiup_upi`,`ups`.`noakta_upi` AS `noakta_upi`,`ups`.`nonpwp_upi` AS `nonpwp_upi`,`ups`.`filesiup_upi` AS `filesiup_upi`,`ups`.`fileiup_upi` AS `fileiup_upi`,`ups`.`fileakta_upi` AS `fileakta_upi`,`ups`.`kontak_upi` AS `kontak_upi`,`ups`.`kontakperson_upi` AS `kontakperson_upi`,`ups`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`ups`.`jenis_upi` AS `jenis_upi`,`ups`.`skala_upi` AS `skala_upi`,`ups`.`alamat_pabrik` AS `alamat_pabrik`,`ups`.`registration_date` AS `registration_date`,`ups`.`user_id` AS `user_id`,`ups`.`id_provinsi` AS `id_provinsi`,`ups`.`nama_provinsi` AS `nama_provinsi`,`ups`.`kode_provinsi` AS `kode_provinsi` from ((`tbl_skp_terbit` `skpt` join `tbl_alurproses` `ap`) join `view_upi_produk_skp` `ups`) where ((`skpt`.`skp_id` = `ups`.`idtbl_skp`) and (`ap`.`idtbl_alurproses` = `skpt`.`alurproses_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_upi_produk_skp`
--
DROP TABLE IF EXISTS `view_upi_produk_skp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_upi_produk_skp`  AS  select `skp`.`idtbl_skp` AS `idtbl_skp`,`skp`.`filegmpssop_skp` AS `filegmpssop_skp`,`skp`.`filesp_skp` AS `filesp_skp`,`skp`.`permohonan_skp` AS `permohonan_skp`,`skp`.`produk_id` AS `produk_id`,`skp`.`realisasiproduksi_skp` AS `realisasiproduksi_skp`,`skp`.`upi_id` AS `upi_id`,`skp`.`status_skp` AS `status_skp`,`pr`.`idtbl_produk` AS `idtbl_produk`,`pr`.`kategori_produk` AS `kategori_produk`,`pr`.`namaind_produk` AS `namaind_produk`,`pr`.`namaen_produk` AS `namaen_produk`,`pr`.`status_produk` AS `status_produk`,`uup`.`id_user` AS `id_user`,`uup`.`username` AS `username`,`uup`.`password` AS `password`,`uup`.`email` AS `email`,`uup`.`login_status` AS `login_status`,`uup`.`login_token` AS `login_token`,`uup`.`validation_code` AS `validation_code`,`uup`.`level` AS `level`,`uup`.`idtbl_upi` AS `idtbl_upi`,`uup`.`nama_upi` AS `nama_upi`,`uup`.`pemilik_upi` AS `pemilik_upi`,`uup`.`alamat_upi` AS `alamat_upi`,`uup`.`kodepos_upi` AS `kodepos_upi`,`uup`.`entitas_upi` AS `entitas_upi`,`uup`.`provinsi_upi` AS `provinsi_upi`,`uup`.`kabupaten_upi` AS `kabupaten_upi`,`uup`.`kecamatan_upi` AS `kecamatan_upi`,`uup`.`desa_upi` AS `desa_upi`,`uup`.`email_upi` AS `email_upi`,`uup`.`omzet_upi` AS `omzet_upi`,`uup`.`tahunmulai_upi` AS `tahunmulai_upi`,`uup`.`nosiup_upi` AS `nosiup_upi`,`uup`.`noiup_upi` AS `noiup_upi`,`uup`.`noakta_upi` AS `noakta_upi`,`uup`.`nonpwp_upi` AS `nonpwp_upi`,`uup`.`filesiup_upi` AS `filesiup_upi`,`uup`.`fileiup_upi` AS `fileiup_upi`,`uup`.`fileakta_upi` AS `fileakta_upi`,`uup`.`kontak_upi` AS `kontak_upi`,`uup`.`kontakperson_upi` AS `kontakperson_upi`,`uup`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`uup`.`jenis_upi` AS `jenis_upi`,`uup`.`skala_upi` AS `skala_upi`,`uup`.`alamat_pabrik` AS `alamat_pabrik`,`uup`.`registration_date` AS `registration_date`,`uup`.`user_id` AS `user_id`,`uup`.`id_provinsi` AS `id_provinsi`,`uup`.`nama_provinsi` AS `nama_provinsi`,`uup`.`kode_provinsi` AS `kode_provinsi` from ((`tbl_skp` `skp` join `tbl_produk` `pr`) join `view_user_upi_provinsi` `uup`) where ((`pr`.`idtbl_produk` = `skp`.`produk_id`) and (`skp`.`upi_id` = `uup`.`idtbl_upi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_dinas_provinsi`
--
DROP TABLE IF EXISTS `view_user_dinas_provinsi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_dinas_provinsi`  AS  select `us`.`id_user` AS `id_user`,`us`.`username` AS `username`,`us`.`password` AS `password`,`us`.`email` AS `email`,`us`.`login_status` AS `login_status`,`us`.`login_token` AS `login_token`,`us`.`validation_code` AS `validation_code`,`us`.`level` AS `level`,`d`.`idtbl_dinas` AS `idtbl_dinas`,`d`.`nama_dinas` AS `nama_dinas`,`d`.`jabatan_dinas` AS `jabatan_dinas`,`d`.`provinsi_id` AS `provinsi_id`,`d`.`user_id` AS `user_id`,`p`.`id_provinsi` AS `id_provinsi`,`p`.`nama_provinsi` AS `nama_provinsi`,`p`.`kode_provinsi` AS `kode_provinsi` from ((`tbl_user` `us` join `tbl_dinas` `d`) join `tbl_provinsi` `p`) where ((`us`.`id_user` = `d`.`user_id`) and (`d`.`provinsi_id` = `p`.`id_provinsi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_kp`
--
DROP TABLE IF EXISTS `view_user_kp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_kp`  AS  select `us`.`id_user` AS `id_user`,`us`.`username` AS `username`,`us`.`password` AS `password`,`us`.`email` AS `email`,`us`.`login_status` AS `login_status`,`us`.`login_token` AS `login_token`,`us`.`validation_code` AS `validation_code`,`us`.`level` AS `level`,`d`.`idtbl_dinas` AS `idtbl_dinas`,`d`.`nama_dinas` AS `nama_dinas`,`d`.`jabatan_dinas` AS `jabatan_dinas`,`d`.`provinsi_id` AS `provinsi_id`,`d`.`user_id` AS `user_id` from (`tbl_user` `us` join `tbl_dinas` `d`) where ((`us`.`id_user` = `d`.`user_id`) and (`us`.`level` <> 'upi') and (`us`.`level` <> 'dinas')) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_register_upi`
--
DROP TABLE IF EXISTS `view_user_register_upi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_register_upi`  AS  select `us`.`id_user` AS `id_user`,`us`.`username` AS `username`,`us`.`password` AS `password`,`us`.`email` AS `email`,`us`.`login_status` AS `login_status`,`us`.`login_token` AS `login_token`,`us`.`validation_code` AS `validation_code`,`us`.`level` AS `level`,`up`.`idtbl_upi` AS `idtbl_upi`,`up`.`nama_upi` AS `nama_upi`,`up`.`pemilik_upi` AS `pemilik_upi`,`up`.`alamat_upi` AS `alamat_upi`,`up`.`kodepos_upi` AS `kodepos_upi`,`up`.`entitas_upi` AS `entitas_upi`,`up`.`provinsi_upi` AS `provinsi_upi`,`up`.`kabupaten_upi` AS `kabupaten_upi`,`up`.`kecamatan_upi` AS `kecamatan_upi`,`up`.`desa_upi` AS `desa_upi`,`up`.`email_upi` AS `email_upi`,`up`.`kontak_upi` AS `kontak_upi`,`up`.`kontakperson_upi` AS `kontakperson_upi`,`up`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`up`.`omzet_upi` AS `omzet_upi`,`up`.`tahunmulai_upi` AS `tahunmulai_upi`,`up`.`nosiup_upi` AS `nosiup_upi`,`up`.`noiup_upi` AS `noiup_upi`,`up`.`noakta_upi` AS `noakta_upi`,`up`.`nonpwp_upi` AS `nonpwp_upi`,`up`.`filesiup_upi` AS `filesiup_upi`,`up`.`fileiup_upi` AS `fileiup_upi`,`up`.`fileakta_upi` AS `fileakta_upi`,`up`.`alamat_pabrik` AS `alamat_pabrik`,`up`.`registration_status` AS `registration_status`,`up`.`registration_date` AS `registration_date`,`up`.`user_id` AS `user_id`,`p`.`id_provinsi` AS `id_provinsi`,`p`.`nama_provinsi` AS `nama_provinsi`,`p`.`kode_provinsi` AS `kode_provinsi` from ((`tbl_user` `us` join `tbl_register_upi` `up`) join `tbl_provinsi` `p`) where ((`us`.`id_user` = `up`.`user_id`) and (`up`.`provinsi_upi` = `p`.`id_provinsi`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user_upi_provinsi`
--
DROP TABLE IF EXISTS `view_user_upi_provinsi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user_upi_provinsi`  AS  select `us`.`id_user` AS `id_user`,`us`.`username` AS `username`,`us`.`password` AS `password`,`us`.`email` AS `email`,`us`.`login_status` AS `login_status`,`us`.`login_token` AS `login_token`,`us`.`validation_code` AS `validation_code`,`us`.`level` AS `level`,`up`.`idtbl_upi` AS `idtbl_upi`,`up`.`nama_upi` AS `nama_upi`,`up`.`pemilik_upi` AS `pemilik_upi`,`up`.`alamat_upi` AS `alamat_upi`,`up`.`kodepos_upi` AS `kodepos_upi`,`up`.`entitas_upi` AS `entitas_upi`,`up`.`provinsi_upi` AS `provinsi_upi`,`up`.`kabupaten_upi` AS `kabupaten_upi`,`up`.`kecamatan_upi` AS `kecamatan_upi`,`up`.`desa_upi` AS `desa_upi`,`up`.`email_upi` AS `email_upi`,`up`.`omzet_upi` AS `omzet_upi`,`up`.`tahunmulai_upi` AS `tahunmulai_upi`,`up`.`nosiup_upi` AS `nosiup_upi`,`up`.`noiup_upi` AS `noiup_upi`,`up`.`noakta_upi` AS `noakta_upi`,`up`.`nonpwp_upi` AS `nonpwp_upi`,`up`.`filesiup_upi` AS `filesiup_upi`,`up`.`fileiup_upi` AS `fileiup_upi`,`up`.`fileakta_upi` AS `fileakta_upi`,`up`.`kontak_upi` AS `kontak_upi`,`up`.`kontakperson_upi` AS `kontakperson_upi`,`up`.`penanggungjawab_upi` AS `penanggungjawab_upi`,`up`.`jenis_upi` AS `jenis_upi`,`up`.`skala_upi` AS `skala_upi`,`up`.`alamat_pabrik` AS `alamat_pabrik`,`up`.`registration_date` AS `registration_date`,`up`.`user_id` AS `user_id`,`p`.`id_provinsi` AS `id_provinsi`,`p`.`nama_provinsi` AS `nama_provinsi`,`p`.`kode_provinsi` AS `kode_provinsi` from ((`tbl_user` `us` join `tbl_upi` `up`) join `tbl_provinsi` `p`) where ((`us`.`id_user` = `up`.`user_id`) and (`up`.`provinsi_upi` = `p`.`id_provinsi`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_airbersih`
--
ALTER TABLE `tbl_airbersih`
  ADD PRIMARY KEY (`id_airbersih`);

--
-- Indexes for table `tbl_alurproses`
--
ALTER TABLE `tbl_alurproses`
  ADD PRIMARY KEY (`idtbl_alurproses`);

--
-- Indexes for table `tbl_asales`
--
ALTER TABLE `tbl_asales`
  ADD PRIMARY KEY (`idtbl_asales`),
  ADD KEY `fk_tbl_asales_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  ADD PRIMARY KEY (`idtbl_bahanbaku`),
  ADD KEY `fk_tbl_bahanbaku_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  ADD PRIMARY KEY (`idtbl_dinas`);

--
-- Indexes for table `tbl_file_example`
--
ALTER TABLE `tbl_file_example`
  ADD PRIMARY KEY (`id_file_example`);

--
-- Indexes for table `tbl_infolain`
--
ALTER TABLE `tbl_infolain`
  ADD PRIMARY KEY (`idtbl_infolain`),
  ADD KEY `fk_tbl_infolain_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`idtbl_karyawan`),
  ADD KEY `fk_tbl_karyawan_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  ADD PRIMARY KEY (`idtbl_kunjungan`),
  ADD KEY `fk_tbl_kunjungan_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_pemasaran`
--
ALTER TABLE `tbl_pemasaran`
  ADD PRIMARY KEY (`idtbl_pemasaran`),
  ADD KEY `fk_tbl_pemasaran_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_penanggungjawab`
--
ALTER TABLE `tbl_penanggungjawab`
  ADD PRIMARY KEY (`idtbl_penanggungjawab`),
  ADD KEY `fk_tbl_penanggungjawab_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  ADD PRIMARY KEY (`idtbl_pengiriman`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`idtbl_produk`);

--
-- Indexes for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tbl_register_upi`
--
ALTER TABLE `tbl_register_upi`
  ADD PRIMARY KEY (`idtbl_upi`);

--
-- Indexes for table `tbl_rejected`
--
ALTER TABLE `tbl_rejected`
  ADD PRIMARY KEY (`id_rejected`),
  ADD KEY `fk_tbl_rejected_tbl_register_upi1_idx` (`upi_id`);

--
-- Indexes for table `tbl_sarpras`
--
ALTER TABLE `tbl_sarpras`
  ADD PRIMARY KEY (`idtbl_sarpras`),
  ADD KEY `fk_tbl_sarpras_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_skp`
--
ALTER TABLE `tbl_skp`
  ADD PRIMARY KEY (`idtbl_skp`),
  ADD KEY `fk_tbl_skp_tbl_produk_idx` (`produk_id`),
  ADD KEY `fk_tbl_skp_tbl_upi1_idx` (`upi_id`);

--
-- Indexes for table `tbl_skp_log`
--
ALTER TABLE `tbl_skp_log`
  ADD PRIMARY KEY (`id_skp_log`);

--
-- Indexes for table `tbl_skp_terbit`
--
ALTER TABLE `tbl_skp_terbit`
  ADD PRIMARY KEY (`idtbl_skp_terbit`);

--
-- Indexes for table `tbl_sni`
--
ALTER TABLE `tbl_sni`
  ADD PRIMARY KEY (`idtbl_sni`),
  ADD KEY `fk_tbl_sni_tbl_skp1_idx` (`skp_id`);

--
-- Indexes for table `tbl_tandatangan`
--
ALTER TABLE `tbl_tandatangan`
  ADD PRIMARY KEY (`idtbl_tandatangan`);

--
-- Indexes for table `tbl_upi`
--
ALTER TABLE `tbl_upi`
  ADD PRIMARY KEY (`idtbl_upi`),
  ADD KEY `fk_tbl_upi_tbl_user1_idx` (`user_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_airbersih`
--
ALTER TABLE `tbl_airbersih`
  MODIFY `id_airbersih` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_alurproses`
--
ALTER TABLE `tbl_alurproses`
  MODIFY `idtbl_alurproses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_asales`
--
ALTER TABLE `tbl_asales`
  MODIFY `idtbl_asales` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  MODIFY `idtbl_bahanbaku` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_dinas`
--
ALTER TABLE `tbl_dinas`
  MODIFY `idtbl_dinas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_file_example`
--
ALTER TABLE `tbl_file_example`
  MODIFY `id_file_example` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_infolain`
--
ALTER TABLE `tbl_infolain`
  MODIFY `idtbl_infolain` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `idtbl_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kunjungan`
--
ALTER TABLE `tbl_kunjungan`
  MODIFY `idtbl_kunjungan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pemasaran`
--
ALTER TABLE `tbl_pemasaran`
  MODIFY `idtbl_pemasaran` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_penanggungjawab`
--
ALTER TABLE `tbl_penanggungjawab`
  MODIFY `idtbl_penanggungjawab` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pengiriman`
--
ALTER TABLE `tbl_pengiriman`
  MODIFY `idtbl_pengiriman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `idtbl_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;
--
-- AUTO_INCREMENT for table `tbl_provinsi`
--
ALTER TABLE `tbl_provinsi`
  MODIFY `id_provinsi` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_register_upi`
--
ALTER TABLE `tbl_register_upi`
  MODIFY `idtbl_upi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_rejected`
--
ALTER TABLE `tbl_rejected`
  MODIFY `id_rejected` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_sarpras`
--
ALTER TABLE `tbl_sarpras`
  MODIFY `idtbl_sarpras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skp`
--
ALTER TABLE `tbl_skp`
  MODIFY `idtbl_skp` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skp_log`
--
ALTER TABLE `tbl_skp_log`
  MODIFY `id_skp_log` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_skp_terbit`
--
ALTER TABLE `tbl_skp_terbit`
  MODIFY `idtbl_skp_terbit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_sni`
--
ALTER TABLE `tbl_sni`
  MODIFY `idtbl_sni` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tandatangan`
--
ALTER TABLE `tbl_tandatangan`
  MODIFY `idtbl_tandatangan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_upi`
--
ALTER TABLE `tbl_upi`
  MODIFY `idtbl_upi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
