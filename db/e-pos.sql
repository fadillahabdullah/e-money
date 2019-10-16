-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2018 at 08:51 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `e-pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` char(6) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelahiran` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `kelahiran`, `tgl_lahir`, `telp`, `alamat`, `password`, `status`) VALUES
('010101', 'budi', 'lamongan', '1990-01-01', '', 'lamongan', 'WHlyZDY0QW4=', '1'),
('153201', 'Dani', 'Lamongan', '2018-07-04', '0987665456', 'jombang', 'WGk3ZTZJQW5rM1RjYXc9PQ==', '1');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id` char(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` double NOT NULL,
  `isi` int(3) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `harga`, `isi`, `satuan`, `keterangan`) VALUES
('1531035485', 'Botol 330ml', 30000, 15, 'Karton', ''),
('1531379668', 'Galon Refill 19 lt', 15000, 1, 'Pcs', ''),
('1531379962', 'Gelas 240 ml', 15000, 48, 'Karton', ''),
('1531390924', 'Botol 500 ml', 70000, 5, 'Karton', ''),
('1531537122', 'Botol 600 ml', 32000, 24, 'Karton', ''),
('1533872744', 'gelas 120ml', 20000, 24, 'Karton', '');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE IF NOT EXISTS `barang_masuk` (
  `id` char(25) NOT NULL,
  `id_admin_gudang` char(25) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `id_barang` char(25) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `jumlah` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id`, `id_admin_gudang`, `tgl`, `jam`, `id_barang`, `satuan`, `jumlah`) VALUES
('1533685743', '12345678', '2018-08-08', '06:49:03', '1531537122', 'Karton', 50),
('1532568740', '12345678', '2018-07-26', '08:32:20', '1531390924', 'Karton', 35),
('1533873147', '12345678', '2018-08-10', '10:52:27', '1531379668', 'Pcs', 25),
('1533872419', '12345678', '2018-08-10', '10:40:19', '1531379668', 'Pcs', 1000),
('1533689360', '12345678', '2018-08-08', '07:49:20', '1531379962', 'Karton', 35),
('1533651145', '12345678', '2018-08-07', '21:12:26', '1531379668', 'Pcs', 50),
('1533685771', '12345678', '2018-08-08', '06:49:31', '1531379668', 'Pcs', 50),
('1533685839', '12345678', '2018-08-08', '06:50:39', '1531390924', 'Karton', 30);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `id` char(25) NOT NULL,
  `id_transaksi` char(25) NOT NULL,
  `id_barang` char(25) NOT NULL,
  `harga` double NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`id`, `id_transaksi`, `id_barang`, `harga`, `satuan`, `jumlah`) VALUES
('12', '12345678', '1531035485', 18000, 'Karton', 5),
('13', '12345678', '1531537122', 34000, 'Karton', 7),
('1532931021724', '1532775399530', '1531035485', 30000, 'Karton', 12),
('1532931294847', '1532775399530', '1531379668', 15000, 'Pcs', 100),
('1532931776152', '1532775399530', '1531390924', 70000, 'Karton', 20),
('1532996567737', '1532757595856', '1531537122', 32000, 'Karton', 50),
('1532996707938', '1532996684903', '1531390924', 70000, 'Karton', 10),
('1532998584726', '1532757350597', '1531035485', 30000, 'Karton', 2),
('1533018236427', '1533018208637', '1531035485', 30000, 'Karton', 4),
('1533018249837', '1533018208637', '1531537122', 32000, 'Karton', 3),
('1533347109840', '1533347064250', '1531035485', 30000, 'Karton', 1),
('1533347128560', '1533347064250', '1531390924', 70000, 'Karton', 2),
('1533773020813', '1532996684903', '1531035485', 30000, 'Karton', 2),
('1533874021874', '1533873968964', '1533872744', 20000, 'Karton', 15),
('1533874055714', '1533873968964', '1531379668', 15000, 'Pcs', 20),
('1534052058229', '1534052043596', '1533872744', 20000, 'Karton', 12),
('1534052067999', '1534052043596', '1531390924', 70000, 'Karton', 42),
('1534060116413', '1533873968964', '1531035485', 30000, 'Karton', 5),
('1534060344267', '1534060322427', '1531035485', 30000, 'Karton', 10),
('1534061814340', '1534060322427', '1531035485', 30000, 'Karton', 2),
('1534061829408', '1534061691097', '1531035485', 30000, 'Karton', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_bayar`
--

CREATE TABLE IF NOT EXISTS `detail_bayar` (
  `id` char(25) NOT NULL,
  `id_transaksi` char(25) NOT NULL,
  `nominal` double NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_bayar`
--

INSERT INTO `detail_bayar` (`id`, `id_transaksi`, `nominal`, `keterangan`) VALUES
('25436465758', '1533873968964', 800000, 'hjshdjhjdshdjshhvjthfhvjhfuygjhgjhbhguyghjbhguyfydtyfhvjhfuygjhgbkj'),
('09876543486', '1534051999', 45000, '');

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE IF NOT EXISTS `gudang` (
  `id` char(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelahiran` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`id`, `nama`, `kelahiran`, `tgl_lahir`, `telp`, `alamat`, `password`, `status`) VALUES
('12345678', 'andi', 'jombang', '2018-07-02', '098765432123', 'jombang', 'WGluZTdvVWdrSFE9', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `id_oto`
--
CREATE TABLE IF NOT EXISTS `id_oto` (
`id` varchar(17)
,`tgl` varchar(10)
,`jam` varchar(13)
,`id_detail` bigint(10)
);
-- --------------------------------------------------------

--
-- Table structure for table `log_history`
--

CREATE TABLE IF NOT EXISTS `log_history` (
  `id` char(30) NOT NULL,
  `data` varchar(50) NOT NULL,
  `operasi` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `id_user` char(30) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `log_history`
--

INSERT INTO `log_history` (`id`, `data`, `operasi`, `keterangan`, `id_user`, `tgl`, `jam`) VALUES
('1531945246', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531945246,\n ID Gudang = andi,\n Tanggal = 2018-07-19,\n Jam = 03:20:46,\n ID Barang = 1531035485,\n Satuan = ,\n Jumlah = 90', '1531417091', '2018-07-19', '03:20:46'),
('1531930875', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-18', '23:21:15'),
('1531936084', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-19', '00:48:04'),
('1531930379', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-18', '23:12:59'),
('1531930423', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-18', '23:13:43'),
('1531929763', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531929763,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 23:02:43,\n ID Barang = 1531537122,\n Satuan = ,\n Jumlah = 13', '1531417091', '2018-07-18', '23:02:43'),
('1531929564', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531929564,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 22:59:24,\n ID Barang = 1531035485,\n Satuan = ,\n Jumlah = 12', '1531417091', '2018-07-18', '22:59:24'),
('1531927279', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531927279,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 22:21:19,\n ID Barang = 1531390924,\n Satuan = ,\n Jumlah = 12', '1531417091', '2018-07-18', '22:21:19'),
('1531922111', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531922111,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 20:55:11,\n ID Barang = 1531379962,\n Satuan = ,\n Jumlah = 23', '1531417091', '2018-07-18', '20:55:11'),
('1531919556', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531919556,\n ID Gudang = ,\n Tanggal = 2018-07-18,\n Jam = 20:12:36,\n ID Barang = 1531379668,\n Satuan = ,\n Jumlah = 12', '1531417091', '2018-07-18', '20:12:36'),
('1531908665', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531908665,\n ID Gudang = ,\n Tanggal = 2018-07-18,\n Jam = 17:11:05,\n ID Barang = 1531035485,\n Satuan = ,\n Jumlah = 20', '1531417091', '2018-07-18', '17:11:05'),
('1531894404', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-18', '13:13:24'),
('1531906001', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-18', '16:26:41'),
('1531906120', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-18', '16:28:40'),
('1531893050', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531893050,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 12:50:50,\n ID Barang = 1531035485,\n Satuan = ,\n Jumlah = 1', '1531417091', '2018-07-18', '12:50:50'),
('1531892953', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531892953,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 12:49:13,\n ID Barang = ,\n Satuan = ,\n Jumlah = 123', '1531417091', '2018-07-18', '12:49:13'),
('1531892367', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531892367,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 12:39:27,\n ID Barang = botol 330ml,\n Satuan = ,\n Jumlah = 12', '1531417091', '2018-07-18', '12:39:27'),
('1531888241', 'Sales', 'Update', 'Reset Password Sales ID = 1531622286', '010101', '2018-07-18', '11:30:41'),
('1531892343', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-18', '12:39:03'),
('1531888232', 'Sales', 'Update', 'Reset Password Sales ID = 1531368910', '010101', '2018-07-18', '11:30:32'),
('1531888217', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-18', '11:30:17'),
('1531884111', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-18', '10:21:51'),
('1531884247', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531884247,\n ID Gudang = andi,\n Tanggal = 2018-07-18,\n Jam = 10:24:07,\n ID Barang = botol 330ml,\n Satuan = ,\n Jumlah = 90', '1531417091', '2018-07-18', '10:24:07'),
('1531733746', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-16', '16:35:46'),
('1531792395', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-17', '08:53:15'),
('1531884066', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-18', '10:21:06'),
('1531725851', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-16', '14:24:11'),
('1531733700', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-16', '16:35:00'),
('1531715364', 'Sales', 'Update', 'Reset Password Sales ID = 1531622286', '010101', '2018-07-16', '11:29:24'),
('1531712292', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Non Aktifkan', '010101', '2018-07-16', '10:38:12'),
('1531707916', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-16', '09:25:16'),
('1531232620', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531232620,\n ID Sales  = 12345678,\n Nama Toko = Barokah,\n Nama Pemilik = Sugito,\n Alamat = Tambakberas,\n Telepon = 098765432123,\n Lintang = 7,1111111,\n Bujur = 7,223321', '010101', '2018-07-10', '21:23:40'),
('1531232714', 'Pelanggan', 'Update', 'ID Pelanggan = ,\n ID Sales = 123455,\n Nama Toko = suryo,\n Nama Pemilik = baroto,\n Alamat = tambak,\n Telepon = 123456789098,\n Lintang = 7,122345,\n Bujur = 7,123456', '010101', '2018-07-10', '21:25:14'),
('1531232905', 'Pelanggan', 'Hapus', 'ID Pelanggan = 153123,\n ID Sales = 123456,\n Nama Toko = Barokah,\n Nama Pemilik = ,\n Alamat = Tambakberas,\n Telepon = 098765432123,\n Lintang = 7,\n Bujur = 7', '010101', '2018-07-10', '21:28:25'),
('1531232993', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531232993,\n ID Sales  = 123456,\n Nama Toko = Suryo,\n Nama Pemilik = Ali,\n Alamat = Mojokrapak,\n Telepon = 098765432112,\n Lintang = 0987654,\n Bujur = 1234567', '010101', '2018-07-10', '21:29:53'),
('1531233978', 'Pelanggan', 'Update', 'ID Pelanggan = ,\n ID Sales = 123456,\n Nama Toko = Barokah,\n Nama Pemilik = Kandas,\n Alamat = Mojokrapak,\n Telepon = 098765432112,\n Lintang = 987654,\n Bujur = 1234570', '010101', '2018-07-10', '21:46:18'),
('1531234732', 'Gudang', 'Update', 'ID Gudang = 153105,\n Nama = jalil,\n Kelahiran = kalongan,\n Tanggal Lahir = 1997-11-12,\n Telepon = 0987654321,\n Alamat = lamongrejo,\n Password = ,\n Status = ', '010101', '2018-07-10', '21:58:52'),
('1531236456', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-10', '22:27:36'),
('1531236489', 'Pelanggan', 'Update', 'ID Pelanggan = ,\n ID Sales = 123456,\n Nama Toko = Suryo,\n Nama Pemilik = barali,\n Alamat = tembelang,\n Telepon = 098765432112,\n Lintang = 987654,\n Bujur = 1234570', '010101', '2018-07-10', '22:28:09'),
('1531236598', 'Pelanggan', 'Update', 'ID Pelanggan = ,\n ID Sales = 123456,\n Nama Toko = Suryo,\n Nama Pemilik = hashirama,\n Alamat = tembelang,\n Telepon = 098765432112,\n Lintang = 987654,\n Bujur = 1234570', '010101', '2018-07-10', '22:29:58'),
('1531365234', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-12', '10:13:54'),
('1531365381', 'Sales', 'Tambah', 'ID Sales = 1531365381,\n Nama Sales = angga,\n Kelahiran = lamongan,\n Tanggal Lahir = 2018-07-02,\n Telepon = 0987890098,\n Alamat = kambangab,\n Password = 212121,\n Status = Belum Nikah', '010101', '2018-07-12', '10:16:21'),
('1531367690', 'Sales', 'Tambah', 'ID Sales = 1531367690,\n Nama Sales = barali,\n Kelahiran = jombang,\n Tanggal Lahir = 2018-07-03,\n Telepon = 098987876765,\n Alamat = lawak, ngimbang, lamongan,\n Status = Tidak Aktif', '010101', '2018-07-12', '10:54:50'),
('1531368160', 'Sales', 'Update', 'ID Sales = 1531367690,\n Nama Sales = Ahmad Muzakki,\n Kelahiran = Lamongan,\n Tanggal Lahir = 2018-07-03,\n Telepon = 098987876765,\n Alamat = Lamongan,\n Status = Tidak Aktif', '010101', '2018-07-12', '11:02:40'),
('1531368327', 'Sales', 'Hapus', 'ID Sales = 1531367690,\n Nama Sales = Ahmad Muzakki,\n Kelahiran = Lamongan,\n Tanggal Lahir = 2018-07-03,\n Telepon = ,\n Alamat = Lamongan', '010101', '2018-07-12', '11:05:27'),
('1531368910', 'Sales', 'Tambah', 'ID Sales = 1531368910,\n Nama Sales = aan,\n Kelahiran = jombanh,\n Tanggal Lahir = 2018-07-01,\n Telepon = 098987876765,\n Alamat = jombamh,\n Status = Tidak Aktif', '010101', '2018-07-12', '11:15:10'),
('1531369913', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Aktifkan', '010101', '2018-07-12', '11:31:53'),
('1531370212', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Non Aktifkan', '010101', '2018-07-12', '11:36:52'),
('1531370224', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Aktifkan', '010101', '2018-07-12', '11:37:04'),
('1531370233', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Non Aktifkan', '010101', '2018-07-12', '11:37:13'),
('1531371066', 'Sales', 'Update', 'Reset Password Sales ID = 1531368910', '010101', '2018-07-12', '11:51:06'),
('1531372599', 'Admin', 'Update', 'Admin dengan ID = 010101 Telah di Non Aktifkan', '010101', '2018-07-12', '12:16:39'),
('1531372759', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-12', '12:19:19'),
('1531372836', 'Admin', 'Update', 'Reset Password Admin ID = 010101', '010101', '2018-07-12', '12:20:36'),
('1531372856', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-12', '12:20:56'),
('1531379668', 'Barang', 'Tambah', 'ID Barang = 1531379668,\n Nama Barang = Galon Refill 19 lt,\n Harga = 15000,\n Isi = 1,\n Satuan = Pcs,\n Keterangan = ', '010101', '2018-07-12', '14:14:28'),
('1531379962', 'Barang', 'Tambah', 'ID Barang = 1531379962,\n Nama Barang = Gelas 240 ml,\n Harga = 15000,\n Isi = 48,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-12', '14:19:22'),
('1531380498', 'Gudang', 'Hapus', 'ID Gudang = 153105,\n Nama Gudang = jalil,\n Kelahiran = kalongan,\n Tanggal Lahir = 1997-11-12,\n Telepon = ,\n Alamat = lamongrejo', '010101', '2018-07-12', '14:28:18'),
('1531380537', 'Gudang', 'Tambah', 'ID Gudang = 1531380537,\n Nama Gudang = Haris,\n Kelahiran = Jombang,\n Tanggal Lahir = 2018-07-03,\n Telepon = 09898876654,\n Alamat = jombang,\n Status = Tidak Aktif', '010101', '2018-07-12', '14:28:57'),
('1531380548', 'Gudang', 'Update', 'Gudang dengan ID = 153138 Telah di Aktifkan', '010101', '2018-07-12', '14:29:08'),
('1531380583', 'Gudang', 'Hapus', 'ID Gudang = 153138,\n Nama Gudang = Haris,\n Kelahiran = Jombang,\n Tanggal Lahir = 2018-07-03,\n Telepon = ,\n Alamat = jombang', '010101', '2018-07-12', '14:29:43'),
('1531380619', 'Gudang', 'Tambah', 'ID Gudang = 1531380619,\n Nama Gudang = Haris,\n Kelahiran = jombang,\n Tanggal Lahir = 2018-07-02,\n Telepon = 098764,\n Alamat = jombang,\n Status = Tidak Aktif', '010101', '2018-07-12', '14:30:19'),
('1531380635', 'Gudang', 'Update', 'Gudang dengan ID = 1531380619 Telah di Aktifkan', '010101', '2018-07-12', '14:30:35'),
('1531380652', 'Hak Akses', 'Login', 'Login Berhasil', '1531380619', '2018-07-12', '14:30:52'),
('1531390849', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-12', '17:20:49'),
('1531390924', 'Barang', 'Tambah', 'ID Barang = 1531390924,\n Nama Barang = Botol 500 ml,\n Harga = 70000,\n Isi = 5,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-12', '17:22:04'),
('1531391104', 'Hak Akses', 'Login', 'Login Berhasil', '1531380619', '2018-07-12', '17:25:04'),
('1531414489', 'Hak Akses', 'Login', 'Login Berhasil', '1531380619', '2018-07-12', '23:54:49'),
('1531415571', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-13', '00:12:51'),
('1531415608', 'Hak Akses', 'Login', 'Login Berhasil', '1531380619', '2018-07-13', '00:13:28'),
('1531416036', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-13', '00:20:36'),
('1531416158', 'Hak Akses', 'Login', 'Login Berhasil', '1531380619', '2018-07-13', '00:22:38'),
('1531416894', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-13', '00:34:54'),
('1531416913', 'Gudang', 'Update', 'Gudang dengan ID = 1531380619 Telah di Non Aktifkan', '010101', '2018-07-13', '00:35:13'),
('1531416992', 'Gudang', 'Update', 'Gudang dengan ID = 1531380619 Telah di Aktifkan', '010101', '2018-07-13', '00:36:32'),
('1531417033', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-13', '00:37:13'),
('1531417054', 'Gudang', 'Hapus', 'ID Gudang = 1531380619,\n Nama Gudang = Haris,\n Kelahiran = jombang,\n Tanggal Lahir = 2018-07-02,\n Telepon = ,\n Alamat = jombang', '010101', '2018-07-13', '00:37:34'),
('1531417091', 'Gudang', 'Tambah', 'ID Gudang = 1531417091,\n Nama Gudang = andi,\n Kelahiran = jombang,\n Tanggal Lahir = 2018-07-02,\n Telepon = 098765432123,\n Alamat = jombang,\n Status = Tidak Aktif', '010101', '2018-07-13', '00:38:11'),
('1531417098', 'Gudang', 'Update', 'Gudang dengan ID = 1531417091 Telah di Aktifkan', '010101', '2018-07-13', '00:38:18'),
('1531417120', 'Gudang', 'Update', 'Gudang dengan ID = 1531417091 Telah di Non Aktifkan', '010101', '2018-07-13', '00:38:40'),
('1531417142', 'Gudang', 'Update', 'Gudang dengan ID = 1531417091 Telah di Aktifkan', '010101', '2018-07-13', '00:39:02'),
('1531417186', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-13', '00:39:46'),
('1531420268', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531420268,\n ID Gudang = 15087766,\n Tanggal = 2018-07-03,\n Jam = ,\n ID Barang = 14765437,\n Satuan = Karton,\n Jumlah = 100', '1531417091', '2018-07-13', '01:31:08'),
('1531473743', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-13', '16:22:23'),
('1531536975', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-14', '09:56:15'),
('1531537122', 'Barang', 'Tambah', 'ID Barang = 1531537122,\n Nama Barang = Botol 600 ml,\n Harga = 32000,\n Isi = 24,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-14', '09:58:42'),
('1531537553', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531537553,\n ID Sales  = 4132563,\n Nama Toko = Cerah,\n Nama Pemilik = hani,\n Alamat = tembelang,\n Telepon = 0987654321233,\n Lintang = 1.654567,\n Bujur = 1.425254', '010101', '2018-07-14', '10:05:53'),
('1531543721', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-14', '11:48:41'),
('1531543766', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-14', '11:49:26'),
('1531548390', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-14', '13:06:30'),
('1531549991', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531549991,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-14,\n Jam = ,\n ID Barang = 1531035485,\n Satuan = Karton,\n Jumlah = 50', '1531417091', '2018-07-14', '13:33:11'),
('1531550261', 'Barang Masuk', 'Update', 'ID Barang Masuk = ,\n ID Gudang = ,\n Tanggal = ,\n Jam = ,\n ID Barang = ,\n Satuan = Karton,\n Jumlah = ', '1531417091', '2018-07-14', '13:37:41'),
('1531550426', 'Barang Masuk', 'Update', 'ID Barang Masuk = ,\n ID Gudang = ,\n Tanggal = ,\n Jam = ,\n ID Barang = ,\n Satuan = Karton,\n Jumlah = ', '1531417091', '2018-07-14', '13:40:26'),
('1531550683', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1531420268,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-14,\n Jam = 00:00:00,\n ID Barang = 1531035485,\n Satuan = Pcs,\n Jumlah = 200', '1531417091', '2018-07-14', '13:44:43'),
('1531550944', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-14', '13:49:04'),
('1531551082', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Aktifkan', '010101', '2018-07-14', '13:51:22'),
('1531556932', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-14', '15:28:52'),
('1531618521', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-15', '08:35:21'),
('1531621916', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531621916,\n ID Sales  = 1531368910,\n Nama Toko = Barokah jaya,\n Nama Pemilik = Rudi,\n Alamat = Tambakberas,\n Telepon = 085678543321,\n Sales = ,\n 0 = 0,\n 0 = 0,\n 1 = 1', '010101', '2018-07-15', '09:31:56'),
('1531622191', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531622191,\n ID Sales  = 1531368910,\n Nama Toko = Maju ,\n Nama Pemilik = Rudianto,\n Alamat = Tambakberas gg.4,\n Telepon = 085678765543,\n Sales = ,\n 0 = 0,\n 0 = 0,\n 1 = 1', '010101', '2018-07-15', '09:36:31'),
('1531622286', 'Sales', 'Tambah', 'ID Sales = 1531622286,\n Nama Sales = Aji,\n Kelahiran = Jombang,\n Tanggal Lahir = 2018-07-03,\n Telepon = 082123321435,\n Alamat = Perak,\n Status = Tidak Aktif', '010101', '2018-07-15', '09:38:06'),
('1531622298', 'Sales', 'Update', 'Sales dengan ID = 1531622286 Telah di Aktifkan', '010101', '2018-07-15', '09:38:18'),
('1531623712', 'Pelanggan', 'Update', 'ID Pelanggan = 153162,\n ID Sales  = 1531368910,\n Nama Toko = Maju ,\n Nama Pemilik = Rudianto,\n Alamat = Tambakberas gg 5,\n Telepon = 085678765543', '010101', '2018-07-15', '10:01:52'),
('1531623731', 'Pelanggan', 'Update', 'ID Pelanggan = 153162,\n ID Sales  = 1531368910,\n Nama Toko = UD Maju Lancar,\n Nama Pemilik = Rudianto,\n Alamat = Tambakberas gg 5,\n Telepon = 085678765543', '010101', '2018-07-15', '10:02:11'),
('1531623741', 'Pelanggan', 'Update', 'ID Pelanggan = 153162,\n ID Sales  = 1531622286,\n Nama Toko = UD Maju Lancar,\n Nama Pemilik = Rudianto,\n Alamat = Tambakberas gg 5,\n Telepon = 085678765543', '010101', '2018-07-15', '10:02:21'),
('1531624306', 'Pelanggan', 'Hapus', 'ID Pelanggan = 153162,\n Nama Sales  = Aji,\n Nama Toko = UD Maju Lancar,\n Nama Pemilik = Rudianto,\n Alamat = Tambakberas gg 5,\n Telepon = 085678765543', '010101', '2018-07-15', '10:11:46'),
('1531624487', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531624487,\n ID Sales  = 1531368910,\n Nama Toko = UD. Bangun Jaya,\n Nama Pemilik = Sugihartono,\n Alamat = Tambakberas gg.4,\n Telepon = 085678654432,\n Sales = ,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-07-15', '10:14:47'),
('1531624907', 'Barang', 'Update', 'ID Barang = 1531035485,\n Nama Barang = botol 330ml,\n Harga = 30000,\n Isi = 15,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-15', '10:21:47'),
('1531627193', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-15', '10:59:53'),
('1531630893', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531630893,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-15 12:01:33,\n Jam = ,\n ID Barang = 1531035485,\n Satuan = Karton,\n Jumlah = 100', '1531417091', '2018-07-15', '12:01:33'),
('1531631124', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531631124,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-15 12:05:24,\n Jam = ,\n ID Barang = 1531537122,\n Satuan = Pcs,\n Jumlah = 30', '1531417091', '2018-07-15', '12:05:24'),
('1531631276', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531631276,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-15 12:07:56,\n Jam = 12:07:56,\n ID Barang = 1531379668,\n Satuan = Karton,\n Jumlah = 123', '1531417091', '2018-07-15', '12:07:56'),
('1531631511', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1531420268,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-14,\n Jam = 00:00:00,\n ID Barang = 1531035485,\n Satuan = Pcs,\n Jumlah = Pcs', '1531417091', '2018-07-15', '12:11:51'),
('1531631517', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1531549991,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-14,\n Jam = 00:00:00,\n ID Barang = 1531035485,\n Satuan = Karton,\n Jumlah = Karton', '1531417091', '2018-07-15', '12:11:57'),
('1531631625', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531631625,\n ID Gudang = 1531417091,\n Tanggal = 2018-07-15,\n Jam = 12:13:45,\n ID Barang = botol 330ml,\n Satuan = Karton,\n Jumlah = 321', '1531417091', '2018-07-15', '12:13:45'),
('1531632422', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-15', '12:27:02'),
('1531632558', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-15', '12:29:18'),
('1531632678', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531632678,\n ID Gudang = ,\n Tanggal = 2018-07-15,\n Jam = 12:31:18,\n ID Barang = Gelas 240 ml,\n Satuan = Karton,\n Jumlah = 123', '1531417091', '2018-07-15', '12:31:18'),
('1531632721', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531632721,\n ID Gudang = ,\n Tanggal = 2018-07-15,\n Jam = 12:32:01,\n ID Barang = Galon Refill 19 lt,\n Satuan = Karton,\n Jumlah = 7', '1531417091', '2018-07-15', '12:32:01'),
('1531632845', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531632845,\n ID Gudang = ,\n Tanggal = 2018-07-15,\n Jam = 12:34:05,\n ID Barang = Galon Refill 19 lt,\n Satuan = Karton,\n Jumlah = 1', '1531417091', '2018-07-15', '12:34:05'),
('1531635935', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-15', '13:25:35'),
('1531636193', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1531636193,\n ID Sales  = 1531622286,\n Nama Toko = Lancar,\n Nama Pemilik = Syahrul,\n Alamat = Jombang,\n Telepon = 098987876765,\n Sales = ,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-07-15', '13:29:53'),
('1531650502', 'Sales', 'Update', 'Sales dengan ID = 1531368910 Telah di Non Aktifkan', '010101', '2018-07-15', '17:28:22'),
('1531655592', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Non Aktifkan', '010101', '2018-07-15', '18:53:12'),
('1531655629', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Non Aktifkan', '010101', '2018-07-15', '18:53:49'),
('1531655664', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Aktifkan', '010101', '2018-07-15', '18:54:24'),
('1531960546', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-19', '07:35:46'),
('1531963855', 'Barang', 'Update', 'ID Barang = 1531035485,\n Nama Barang = botol 330ml,\n Harga = 30000,\n Isi = 15,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-19', '08:30:55'),
('1531967082', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-19', '09:24:42'),
('1531970064', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1531970064,\n ID Admin Gudang = 1531417091,\n Tanggal = 2018-07-19,\n Jam = 10:14:24,\n ID Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 50', '1531417091', '2018-07-19', '10:14:24'),
('1531974939', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-19', '11:35:39'),
('1531974953', 'Sales', 'Update', 'Reset Password Sales ID = 1531622286', '010101', '2018-07-19', '11:35:53'),
('1531974963', 'Sales', 'Hapus', 'ID Sales = 1531368910,\n Nama Sales = aan,\n Kelahiran = jombanh,\n Tanggal Lahir = 2018-07-01,\n Telepon = ,\n Alamat = jombamh', '010101', '2018-07-19', '11:36:03'),
('1532012850', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-19', '22:07:30'),
('1532014801', 'Admin', 'Tambah', 'ID Admin = 1532014801,\n Nama Admin = Dani,\n Kelahiran = Lamongan,\n Tanggal Lahir = 2018-07-04,\n Telepon = 0987665456,\n Alamat = jombang,\n Status = Tidak Aktif', '010101', '2018-07-19', '22:40:01'),
('1532014907', 'Admin', 'Update', 'Admin dengan ID = 153201 Telah di Aktifkan', '010101', '2018-07-19', '22:41:47'),
('1532014995', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-19', '22:43:15'),
('1532018371', 'Hak Akses', 'Login', 'Login Berhasil', '1531417091', '2018-07-19', '23:39:31'),
('1532018421', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1532018421,\n ID Admin Gudang = 1531417091,\n Tanggal = 2018-07-19,\n Jam = 23:40:21,\n ID Barang = 1531035485,\n Satuan = Karton,\n Jumlah = 50', '1531417091', '2018-07-19', '23:40:21'),
('1532018450', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1532018450,\n ID Admin Gudang = 1531417091,\n Tanggal = 2018-07-19,\n Jam = 23:40:50,\n ID Barang = 1531537122,\n Satuan = Karton,\n Jumlah = 50', '1531417091', '2018-07-19', '23:40:50'),
('1532020055', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-20', '00:07:35'),
('1532319096', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-23', '11:11:36'),
('1532439977', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-24', '20:46:17'),
('1532565333', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-26', '07:35:33'),
('1532566890', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-26', '08:01:30'),
('1532568283', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-26', '08:24:43'),
('1532568299', 'Gudang', 'Update', 'Reset Password Sales ID = 12345678', '010101', '2018-07-26', '08:24:59'),
('1532568318', 'Gudang', 'Update', 'ID Gudang = 12345678,\n Nama Gudang = andi,\n Kelahiran = jombang,\n Tanggal Lahir = 2018-07-02,\n Telepon = 098765432123,\n Alamat = jombang', '010101', '2018-07-26', '08:25:18'),
('1532568338', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-07-26', '08:25:38'),
('1532568725', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1532568725,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-07-26,\n Jam = 08:32:05,\n ID Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 50', '12345678', '2018-07-26', '08:32:05'),
('1532568740', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1532568740,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-07-26,\n Jam = 08:32:20,\n ID Barang = 1531390924,\n Satuan = Karton,\n Jumlah = 35', '12345678', '2018-07-26', '08:32:20'),
('1532606540', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-26', '19:02:20'),
('1532610057', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-07-26', '20:00:57'),
('1532749984', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-28', '10:53:04'),
('1532750055', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1532750055,\n ID Sales  = 1531622286,\n Nama Toko = Lancar Jaya,\n Nama Pemilik = Yugio,\n Alamat = Jombang,\n Telepon = 09878987654,\n Sales = ,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-07-28', '10:54:15'),
('1532790657', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-28', '22:10:57'),
('1532790718', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1532790718,\n ID Sales  = 1531622286,\n Nama Toko = UD. Selamet,\n Nama Pemilik = Hardi,\n Alamat = Sumobito,\n Telepon = 087654675342,\n Sales = ,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-07-28', '22:11:58'),
('1532791023', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1532790718,\n Nama Sales  = kurnia,\n Nama Toko = UD. Selamet,\n Nama Pemilik = Hardi,\n Alamat = Sumobito,\n Telepon = 087654675342', '010101', '2018-07-28', '22:17:03'),
('1532791403', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1532791403,\n Nama Toko = UD. Mandiri,\n Nama Pemilik = suripti,\n Alamat = alun alun,\n Telepon = 098789675123,\n ID Sales  = 1531622286,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-07-28', '22:23:23'),
('1532791432', 'Pelanggan', 'Update', 'ID Pelanggan = 1532791403,\n ID Sales  = 1531622286,\n Nama Toko = suripti,\n Nama Pemilik = alun alun,\n Alamat = 098789675123,\n Telepon = 1531622286', '010101', '2018-07-28', '22:23:52'),
('1532791442', 'Pelanggan', 'Update', 'ID Pelanggan = 153162,\n ID Sales  = 1531622286,\n Nama Toko = UD. Bangun Jaya,\n Nama Pemilik = Sugihartono,\n Alamat = Tambakberas gg.4,\n Telepon = 085678654432', '010101', '2018-07-28', '22:24:02'),
('1532843332', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-29', '12:48:52'),
('1532845772', 'Barang', 'Update', 'ID Barang = 1531035485,\n Nama Barang = Botol 330ml,\n Harga = 30000,\n Isi = 15,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-07-29', '13:29:32'),
('1532874049', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-29', '21:20:49'),
('1532874090', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-07-29', '21:21:30'),
('1532882346', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-29', '23:39:06'),
('1532906971', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-30', '06:29:31'),
('1532990931', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-31', '05:48:51'),
('1532991166', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-07-31', '05:52:46'),
('1533017632', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-07-31', '13:13:52'),
('1533128139', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-01', '19:55:39'),
('1533204722', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-02', '17:12:02'),
('1533205411', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-02', '17:23:31'),
('1533347216', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-04', '08:46:56'),
('1533347313', 'Barang', 'Tambah', 'ID Barang = 1533347313,\n Nama Barang = gelas 100ml,\n Harga = 13000,\n Isi = 12,\n Satuan = Karton,\n Keterangan = gelasan', '010101', '2018-08-04', '08:48:33'),
('1533347351', 'Barang', 'Update', 'ID Barang = 1533347313,\n Nama Barang = gelas 3300ml,\n Harga = 13000,\n Isi = 12,\n Satuan = Karton,\n Keterangan = gelasan', '010101', '2018-08-04', '08:49:11'),
('1533347459', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-04', '08:50:59'),
('1533347505', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533347505,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-04,\n Jam = 08:51:45,\n ID Barang = 1533347313,\n Satuan = Karton,\n Jumlah = 50', '12345678', '2018-08-04', '08:51:45'),
('1533398315', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-04', '22:58:35'),
('1533399621', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-04', '23:20:21'),
('1533489122', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-06', '00:12:02'),
('1533489629', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-06', '00:20:29'),
('1533495918', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1533347505,\n Nama Barang = 1531379962,\n Satuan = ,\n Jumlah = 20', '010101', '2018-08-06', '02:05:18'),
('1533496066', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1533347505,\n Nama Barang = 1531035485,\n Satuan = ,\n Jumlah = 43', '010101', '2018-08-06', '02:07:46'),
('1533646506', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-07', '19:55:06'),
('1533651103', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-07', '21:11:43'),
('1533651146', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533651145,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-07,\n Jam = 21:12:26,\n ID Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 50', '12345678', '2018-08-07', '21:12:26'),
('1533685504', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-08', '06:45:04'),
('1533685743', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533685743,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-08,\n Jam = 06:49:03,\n ID Barang = 1531537122,\n Satuan = Karton,\n Jumlah = 50', '12345678', '2018-08-08', '06:49:03'),
('1533685771', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533685771,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-08,\n Jam = 06:49:31,\n ID Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 50', '12345678', '2018-08-08', '06:49:31'),
('1533685839', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533685839,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-08,\n Jam = 06:50:39,\n ID Barang = 1531390924,\n Satuan = Karton,\n Jumlah = 30', '12345678', '2018-08-08', '06:50:39'),
('1533689062', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1531970064,\n Nama Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 55', '010101', '2018-08-08', '07:44:22'),
('1533689119', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1531970064,\n ID Gudang = ,\n Tanggal = 2018-08-08,\n Jam = 07:45:19,\n ID Barang = ,\n Satuan = ,\n Jumlah = ', '010101', '2018-08-08', '07:45:19'),
('1533689232', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533689232,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-08,\n Jam = 07:47:12,\n ID Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 15', '12345678', '2018-08-08', '07:47:12'),
('1533689300', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1533689232,\n Nama Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 20', '010101', '2018-08-08', '07:48:20'),
('1533689324', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1533689232,\n ID Gudang = ,\n Tanggal = 2018-08-08,\n Jam = 07:48:44,\n ID Barang = ,\n Satuan = ,\n Jumlah = ', '010101', '2018-08-08', '07:48:44'),
('1533689360', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533689360,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-08,\n Jam = 07:49:20,\n ID Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 35', '12345678', '2018-08-08', '07:49:20'),
('1533698946', 'Transaksi', 'Update', 'ID Sales = 12345678,\n Nama Sales = ,\n Kelahiran = ,\n Tanggal Lahir = ,\n Telepon = ,\n Alamat = ', '010101', '2018-08-08', '10:29:06'),
('1533700255', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1532018421,\n Nama Barang = 1531035485,\n Satuan = Karton,\n Jumlah = 55', '010101', '2018-08-08', '10:50:55'),
('1533700633', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1532018421,\n ID Gudang = ,\n Tanggal = 2018-08-08,\n Jam = 10:57:13,\n ID Barang = ,\n Satuan = ,\n Jumlah = ', '010101', '2018-08-08', '10:57:13'),
('1533700640', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1532018450,\n ID Gudang = ,\n Tanggal = 2018-08-08,\n Jam = 10:57:20,\n ID Barang = ,\n Satuan = ,\n Jumlah = ', '010101', '2018-08-08', '10:57:20'),
('1533700685', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1532568725,\n Nama Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 56', '010101', '2018-08-08', '10:58:05'),
('1533701675', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1532568725,\n Nama Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 25', '010101', '2018-08-08', '11:14:35'),
('1533702072', 'Transaksi', 'Update', 'ID Transaksi = 12345678,\n ID Pelanggan = 1532750055,\n Status Diterima = 1', '010101', '2018-08-08', '11:21:12'),
('1533702096', 'Transaksi', 'Hapus', 'ID Transaksi = 12345678,\n ID Pelanggan = ,\n Tanggal = 2018-08-08,\n Jam = 11:21:36,\n Status Diterima = ', '010101', '2018-08-08', '11:21:36'),
('1533702106', 'Transaksi', 'Update', 'ID Transaksi = 1532757350597,\n ID Pelanggan = 1532750055,\n Status Diterima = 1', '010101', '2018-08-08', '11:21:46'),
('1533741060', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-08', '22:11:00'),
('1533788376', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-09', '11:19:36'),
('1533792967', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-09', '12:36:07'),
('1533816362', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-09', '19:06:02'),
('1533872074', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-10', '10:34:34'),
('1533872285', 'Hak Akses', 'Login', 'Login Berhasil', '12345678', '2018-08-10', '10:38:05'),
('1533872419', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533872419,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-10,\n Jam = 10:40:19,\n ID Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 1000', '12345678', '2018-08-10', '10:40:19'),
('1533872744', 'Barang', 'Tambah', 'ID Barang = 1533872744,\n Nama Barang = gelas 120ml,\n Harga = 20000,\n Isi = 24,\n Satuan = Karton,\n Keterangan = ', '010101', '2018-08-10', '10:45:44'),
('1533872828', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1533872828,\n Nama Toko = MAJU,\n Nama Pemilik = BUDI,\n Alamat = Tambakberas,\n Telepon = 085698786654,\n ID Sales  = 1531622286,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-08-10', '10:47:08'),
('1533872887', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Non Aktifkan', '010101', '2018-08-10', '10:48:07'),
('1533872911', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Aktifkan', '010101', '2018-08-10', '10:48:31'),
('1533873032', 'Barang Masuk', 'Update', 'ID Barang Masuk = 1532568725,\n Nama Barang = 1531379962,\n Satuan = Karton,\n Jumlah = 55', '010101', '2018-08-10', '10:50:32'),
('1533873097', 'Barang Masuk', 'Hapus', 'ID Barang Masuk = 1532568725,\n ID Gudang = ,\n Tanggal = 2018-08-10,\n Jam = 10:51:37,\n ID Barang = ,\n Satuan = ,\n Jumlah = ', '010101', '2018-08-10', '10:51:37'),
('1533873147', 'Barang Masuk', 'Tambah', 'ID Barang Masuk = 1533873147,\n ID Admin Gudang = 12345678,\n Tanggal = 2018-08-10,\n Jam = 10:52:27,\n ID Barang = 1531379668,\n Satuan = Pcs,\n Jumlah = 25', '12345678', '2018-08-10', '10:52:27'),
('1533874889', 'Sales', 'Tambah', 'ID Sales = 1533874889,\n Nama Sales = Angga,\n Kelahiran = Jombang,\n Tanggal Lahir = 2018-08-07,\n Telepon = 09887665433,\n Alamat = jombang,\n Status = Tidak Aktif', '010101', '2018-08-10', '11:21:29'),
('1533874928', 'Sales', 'Update', 'Sales dengan ID = 1533874889 Telah di Aktifkan', '010101', '2018-08-10', '11:22:08'),
('1533875075', 'Sales', 'Update', 'Reset Password Sales ID = 1533874889', '010101', '2018-08-10', '11:24:35'),
('1533883760', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1533883760,\n Nama Toko = Suka aya,\n Nama Pemilik = Arya,\n Alamat = Kabuh,\n Telepon = 09878876557,\n ID Sales  = 1533874889,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif,\n Pin = 0', '010101', '2018-08-10', '13:49:20'),
('1533884093', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1533884092,\n Nama Toko = xxxxx,\n Nama Pemilik = fuji,\n Alamat = kayangan,\n Telepon = 12345667889,\n ID Sales  = 1533874889,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif,\n Pin = 935510', '010101', '2018-08-10', '13:54:53'),
('1533884929', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1533884929,\n Nama Toko = Naruto,\n Nama Pemilik = Kaguya,\n Alamat = akatsuki,\n Telepon = 89786764343,\n ID Sales  = 1533874889,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-08-10', '14:08:49'),
('1533983220', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-11', '17:27:00'),
('1534018691', 'Hak Akses', 'Login', 'Login Berhasil', '010101', '2018-08-12', '03:18:11'),
('1534051210', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Aktifkan', '010101', '2018-08-12', '12:20:10'),
('1534051216', 'Pelanggan', 'Update', 'Pelanggan dengan ID =  Telah di Aktifkan', '010101', '2018-08-12', '12:20:16'),
('1534051313', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1534051313,\n Nama Toko = Indoasri,\n Nama Pemilik = Asriwelas,\n Alamat = Kepuh,\n Telepon = 0978765436787,\n ID Sales  = 1533874889,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-08-12', '12:21:53'),
('1534051930', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1533872828,\n Nama Sales  = ,\n Nama Toko = BUDI,\n Nama Pemilik = Tambakberas,\n Alamat = 085698786654,\n Telepon = 1531622286', '010101', '2018-08-12', '12:32:10'),
('1534051938', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1533883760,\n Nama Sales  = ,\n Nama Toko = Arya,\n Nama Pemilik = Kabuh,\n Alamat = 09878876557,\n Telepon = 1533874889', '010101', '2018-08-12', '12:32:18'),
('1534051945', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1533884092,\n Nama Sales  = ,\n Nama Toko = fuji,\n Nama Pemilik = kayangan,\n Alamat = 12345667889,\n Telepon = 1533874889', '010101', '2018-08-12', '12:32:25'),
('1534051999', 'Pelanggan', 'Tambah', 'ID Pelanggan = 1534051999,\n ID Sales  = 1533874889,\n Nama Toko = Konoha,\n Nama Pemilik = Hashirama,\n Alamat = UD. Ninpou,\n Telepon = 09876543,\n Latitude = 0,\n Longitude = 0,\n Status = Aktif', '010101', '2018-08-12', '12:33:19'),
('1534052007', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1533884929,\n Nama Sales  = ,\n Nama Toko = Kaguya,\n Nama Pemilik = akatsuki,\n Alamat = 89786764343,\n Telepon = 1533874889', '010101', '2018-08-12', '12:33:27'),
('1534052013', 'Pelanggan', 'Hapus', 'ID Pelanggan = 1534051313,\n Nama Sales  = ,\n Nama Toko = Asriwelas,\n Nama Pemilik = Kepuh,\n Alamat = 0978765436787,\n Telepon = 1533874889', '010101', '2018-08-12', '12:33:33');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` char(25) NOT NULL,
  `id_sales` char(25) NOT NULL,
  `nama_toko` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `lat` double NOT NULL,
  `lang` double NOT NULL,
  `status` char(3) NOT NULL,
  `pin` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_sales`, `nama_toko`, `nama_pemilik`, `alamat`, `telp`, `lat`, `lang`, `status`, `pin`) VALUES
('153163', '1531622286', 'Lancar', 'Syahrul', 'Jombang', '098987876765', 0, 0, '1', '555'),
('153162', '1531622286', 'UD. Bangun Jaya', 'Sugihartono', 'Tambakberas gg.4', '085678654432', 0, 0, '1', '0'),
('1532750055', '1531622286', 'Lancar Jaya', 'Yugio', 'Jombang', '09878987654', 0, 0, '1', '0'),
('1532791403', '1531622286', 'suripti', 'alun alun', '098789675123', '1531622286', 0, 0, '1', '123456'),
('1534051999', '1533874889', 'Konoha', 'Hashirama', 'UD. Ninpou', '09876543', 0, 0, '1', '582821');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id` char(25) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelahiran` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `nama`, `kelahiran`, `tgl_lahir`, `telp`, `alamat`, `password`, `status`) VALUES
('1533874889', 'Angga', 'Jombang', '2018-08-07', '09887665433', 'jombang', 'WGk3ZTZZZ2hrM1RVWXc9PQ==', '1'),
('1531622286', 'ahmad', 'Jombang', '2018-07-03', '082123321435', 'Perak', 'WGk3ZTY0WWtsWDdVYkE9PQ==', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` char(25) NOT NULL,
  `id_pelanggan` char(25) NOT NULL,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `status_diterima` char(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_pelanggan`, `tgl`, `jam`, `status_diterima`) VALUES
('1533873968964', '1532791403', '2018-08-10', '11:06:08', '1'),
('1534052043596', '1534051999', '2018-08-12', '12:34:03', '1'),
('1532757350597', '1532750055', '2018-08-08', '11:21:46', '1'),
('1532757595856', '153163', '2018-07-28', '12:59:55', '0'),
('1532775399530', '153163', '2018-07-28', '17:56:39', '0'),
('1532996684903', '1532791403', '2018-07-31', '07:24:44', '0'),
('1533018208637', '1532750055', '2018-07-31', '13:23:28', '0'),
('1533347064250', '153163', '2018-08-04', '08:44:24', '1'),
('1534060322427', '1532750055', '2018-08-12', '14:52:02', '0'),
('1534061691097', '1532750055', '2018-08-12', '15:14:51', '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v1`
--
CREATE TABLE IF NOT EXISTS `v1` (
`id` char(25)
,`nama` varchar(50)
,`harga` double
,`isi` int(3)
,`satuan` varchar(10)
,`keterangan` text
,`jumlah_masuk` decimal(32,0)
,`jumlah_keluar` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_login`
--
CREATE TABLE IF NOT EXISTS `v_login` (
`id` char(25)
,`nama` varchar(50)
,`kelahiran` varchar(50)
,`tgl_lahir` date
,`telp` varchar(25)
,`alamat` varchar(100)
,`password` varchar(100)
,`status` char(3)
,`level` varchar(13)
,`folder` varchar(3)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
--
CREATE TABLE IF NOT EXISTS `v_transaksi` (
`id` char(25)
,`id_pelanggan` char(25)
,`tgl` date
,`jam` time
,`status_diterima` char(3)
,`nama_toko` varchar(50)
,`nama_pemilik` varchar(50)
,`pin` text
,`id_sales` char(25)
,`jumlah_jenis` bigint(21)
,`jumlah_harga` double
,`jumlah_bayar` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi2`
--
CREATE TABLE IF NOT EXISTS `v_transaksi2` (
`id` char(25)
,`id_pelanggan` char(25)
,`tgl` date
,`jam` time
,`status_diterima` char(3)
,`nama_toko` varchar(50)
,`nama_pemilik` varchar(50)
,`pin` text
,`id_sales` char(25)
,`jumlah_jenis` bigint(21)
,`jumlah_harga` double
,`jumlah_bayar` double
,`jumlah_kurang` double
,`status_bayar` varchar(15)
);
-- --------------------------------------------------------

--
-- Structure for view `id_oto`
--
DROP TABLE IF EXISTS `id_oto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `id_oto` AS select date_format(now(),'%y%m%d%H%i%s') AS `id`,date_format(now(),'%Y-%m-%d') AS `tgl`,date_format(now(),'%H:%i:%s') AS `jam`,unix_timestamp(date_format(now(),'%Y-%m-%d %H:%i:%s')) AS `id_detail`;

-- --------------------------------------------------------

--
-- Structure for view `v1`
--
DROP TABLE IF EXISTS `v1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v1` AS select `a`.`id` AS `id`,`a`.`nama` AS `nama`,`a`.`harga` AS `harga`,`a`.`isi` AS `isi`,`a`.`satuan` AS `satuan`,`a`.`keterangan` AS `keterangan`,if(isnull((select sum(`barang_masuk`.`jumlah`) from `barang_masuk` where (`barang_masuk`.`id_barang` = `a`.`id`))),0,(select sum(`barang_masuk`.`jumlah`) from `barang_masuk` where (`barang_masuk`.`id_barang` = `a`.`id`))) AS `jumlah_masuk`,if(isnull((select sum(`detail`.`jumlah`) from `detail` where (`detail`.`id_barang` = `a`.`id`))),0,(select sum(`detail`.`jumlah`) from `detail` where (`detail`.`id_barang` = `a`.`id`))) AS `jumlah_keluar` from `barang` `a`;

-- --------------------------------------------------------

--
-- Structure for view `v_login`
--
DROP TABLE IF EXISTS `v_login`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_login` AS select `admin`.`id` AS `id`,`admin`.`nama` AS `nama`,`admin`.`kelahiran` AS `kelahiran`,`admin`.`tgl_lahir` AS `tgl_lahir`,`admin`.`telp` AS `telp`,`admin`.`alamat` AS `alamat`,`admin`.`password` AS `password`,`admin`.`status` AS `status`,'administrator' AS `level`,'4dr' AS `folder` from `admin` union select `gudang`.`id` AS `id`,`gudang`.`nama` AS `nama`,`gudang`.`kelahiran` AS `kelahiran`,`gudang`.`tgl_lahir` AS `tgl_lahir`,`gudang`.`telp` AS `telp`,`gudang`.`alamat` AS `alamat`,`gudang`.`password` AS `password`,`gudang`.`status` AS `status`,'admin_gudang' AS `level`,'9we' AS `folder` from `gudang` union select `sales`.`id` AS `id`,`sales`.`nama` AS `nama`,`sales`.`kelahiran` AS `kelahiran`,`sales`.`tgl_lahir` AS `tgl_lahir`,`sales`.`telp` AS `telp`,`sales`.`alamat` AS `alamat`,`sales`.`password` AS `password`,`sales`.`status` AS `status`,'salesman' AS `level`,'5ko' AS `folder` from `sales`;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi` AS select `a`.`id` AS `id`,`a`.`id_pelanggan` AS `id_pelanggan`,`a`.`tgl` AS `tgl`,`a`.`jam` AS `jam`,`a`.`status_diterima` AS `status_diterima`,`b`.`nama_toko` AS `nama_toko`,`b`.`nama_pemilik` AS `nama_pemilik`,`b`.`pin` AS `pin`,`b`.`id_sales` AS `id_sales`,(select count(0) from `detail` where (`detail`.`id_transaksi` = `a`.`id`)) AS `jumlah_jenis`,if(isnull((select sum((`detail`.`harga` * `detail`.`jumlah`)) from `detail` where (`detail`.`id_transaksi` = `a`.`id`))),0,(select sum((`detail`.`harga` * `detail`.`jumlah`)) from `detail` where (`detail`.`id_transaksi` = `a`.`id`))) AS `jumlah_harga`,if(isnull((select sum(`detail_bayar`.`nominal`) from `detail_bayar` where (`detail_bayar`.`id_transaksi` = `a`.`id`))),0,(select sum(`detail_bayar`.`nominal`) from `detail_bayar` where (`detail_bayar`.`id_transaksi` = `a`.`id`))) AS `jumlah_bayar` from (`transaksi` `a` left join `pelanggan` `b` on((`a`.`id_pelanggan` = `b`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi2`
--
DROP TABLE IF EXISTS `v_transaksi2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi2` AS select `v_transaksi`.`id` AS `id`,`v_transaksi`.`id_pelanggan` AS `id_pelanggan`,`v_transaksi`.`tgl` AS `tgl`,`v_transaksi`.`jam` AS `jam`,`v_transaksi`.`status_diterima` AS `status_diterima`,`v_transaksi`.`nama_toko` AS `nama_toko`,`v_transaksi`.`nama_pemilik` AS `nama_pemilik`,`v_transaksi`.`pin` AS `pin`,`v_transaksi`.`id_sales` AS `id_sales`,`v_transaksi`.`jumlah_jenis` AS `jumlah_jenis`,`v_transaksi`.`jumlah_harga` AS `jumlah_harga`,`v_transaksi`.`jumlah_bayar` AS `jumlah_bayar`,(`v_transaksi`.`jumlah_harga` - `v_transaksi`.`jumlah_bayar`) AS `jumlah_kurang`,if(((`v_transaksi`.`jumlah_harga` - `v_transaksi`.`jumlah_bayar`) > 0),'Belum Lunas',if(((`v_transaksi`.`jumlah_harga` - `v_transaksi`.`jumlah_bayar`) < 0),'Kelebihan Bayar','Lunas')) AS `status_bayar` from `v_transaksi`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
