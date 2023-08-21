-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 12:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panen_tbs`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `jmlPenghasilan` (`tanggal_awal` DATETIME, `tanggal_akhir` DATETIME) RETURNS INT(11)  BEGIN 
	DECLARE jmlHasil INT;
	SELECT sum(
			(
			((paket.harga_paket * detail_transaksi.kuantitas) + transaksi.biaya_tambahan) - 
			(((paket.harga_paket * detail_transaksi.kuantitas) + transaksi.biaya_tambahan) * transaksi.diskon / 100)
			) 
			+ 
			((
			(((paket.harga_paket * detail_transaksi.kuantitas) + transaksi.biaya_tambahan) - 
			(((paket.harga_paket * detail_transaksi.kuantitas) + transaksi.biaya_tambahan) * transaksi.diskon / 100)) 
			* transaksi.pajak
			) / 100)
		) as penghasilan INTO jmlHasil
		FROM transaksi
		INNER JOIN user ON transaksi.id_user = user.id_user 
		INNER JOIN member ON transaksi.id_member = member.id_member 
		INNER JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi 
		INNER JOIN paket ON detail_transaksi.id_paket = paket.id_paket 
		INNER JOIN jenis_paket ON paket.id_jenis_paket = jenis_paket.id_jenis_paket 
		INNER JOIN outlet ON transaksi.id_outlet = outlet.id_outlet WHERE transaksi.tanggal_transaksi 
		BETWEEN tanggal_awal AND tanggal_akhir;
	RETURN jmlHasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jmlStatusTanggal` (`st` ENUM('proses','dicuci','siap diambil','sudah diambil'), `tgl` DATE) RETURNS INT(11) NO SQL BEGIN
DECLARE jmlHasil INT;
SELECT COUNT(*) AS jml INTO jmlHasil FROM transaksi WHERE status_transaksi = st AND date(tanggal_transaksi) = tgl;
RETURN jmlHasil;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `jmlTransPaket` (`idPaket` INT) RETURNS INT(11)  BEGIN
DECLARE jmlHasil INT;
	SELECT COUNT(*) as jml INTO jmlHasil FROM detail_transaksi WHERE id_paket = idPaket;
    RETURN jmlHasil;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `afdeling`
--

CREATE TABLE `afdeling` (
  `id_afdeling` int(11) NOT NULL,
  `nama_afdeling` varchar(100) NOT NULL,
  `id_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `afdeling`
--

INSERT INTO `afdeling` (`id_afdeling`, `nama_afdeling`, `id_unit`) VALUES
(1, '-', 1),
(15, 'Afdeling 1', 2),
(16, 'Afdeling 2', 2),
(17, 'Afdeling 3', 2),
(18, 'Afdeling 1', 3),
(19, 'Afdeling 2', 3),
(20, 'Afdeling 3', 3),
(21, 'Afdeling 1', 4),
(22, 'Afdeling 2', 4),
(23, 'Afdeling 3', 4),
(24, '-', 2),
(25, '-', 3),
(26, '-', 4),
(27, 'Afdeling 4', 2),
(28, 'Afdeling 5', 2),
(31, 'Afdeling 4', 3),
(32, 'Afdeling 5', 3);

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama_lengkap` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') COLLATE utf8_unicode_ci NOT NULL,
  `telepon` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `foto` text COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id_biodata`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `telepon`, `email`, `alamat`, `foto`, `id_user`) VALUES
(1, 'Pajar Padillah', 'Lahat', '2000-10-29', '', '082372157095', 'pajarpadillah14@gmail.com', 'Jl. Ki Atmaja Sematang Borang Palembang', 'Pas_Foto_Pajar_Padillah.png', 1),
(15, 'Daniel Solikhin, S.P.', 'Lampung', '2001-11-01', 'Laki-laki', '08976384928', 'kabagops@gmail.com', 'Rajabasa, Bandar Lampung', 'kabag.jpg', 29),
(18, 'Agus Faroni, S.P., M.M.', 'Bandar Lampung', '1992-01-01', '', '089527116776', 'agusfaroni@gmail.com', 'Rajabasa, Bandar Lampung', 'manajerresa.jpg', 36),
(19, 'Fajri subuh', 'Jakarta', '2002-11-01', 'Laki-laki', '08978765453', '', 'Jl. Sultan Agung', 'IMG_20220115_114447.jpg', 37),
(20, 'Fadlirich', 'Jakarta', '2022-10-05', 'Laki-laki', '08978676767', '', 'Jl. Imam bonjol', 'IMG_20210822_140338.jpg', 38),
(22, 'Rega ajaaa', 'Jakarta', '1998-07-09', 'Laki-laki', '0898786767', '', 'Jl. Diponegoro', 'default.png', 41);

-- --------------------------------------------------------

--
-- Table structure for table `panen`
--

CREATE TABLE `panen` (
  `id_panen` int(11) NOT NULL,
  `kode_panen` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_panen` datetime NOT NULL,
  `tanggal_diangkut` datetime NOT NULL,
  `jumlah_tandan` int(11) NOT NULL,
  `tandan_kg` int(11) NOT NULL,
  `rata_tandan` float NOT NULL,
  `brondolan` int(11) NOT NULL,
  `tandan_mentah` int(11) NOT NULL,
  `status_panen` enum('accafdeling','accunit','selesai','ditolak') COLLATE utf8_unicode_ci NOT NULL,
  `penolak` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8_unicode_ci NOT NULL,
  `nama_supir` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `plat` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_afdeling` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panen`
--

INSERT INTO `panen` (`id_panen`, `kode_panen`, `tanggal_panen`, `tanggal_diangkut`, `jumlah_tandan`, `tandan_kg`, `rata_tandan`, `brondolan`, `tandan_mentah`, `status_panen`, `penolak`, `keterangan`, `nama_supir`, `plat`, `id_unit`, `id_afdeling`, `id_user`) VALUES
(77, '29092022111T0003', '2023-07-21 08:00:42', '2022-09-29 14:00:42', 80, 9400, 117.5, 200, 2, 'selesai', '', '', '', '', 1, 1, 1),
(79, '290920221132T0005', '2023-07-21 08:00:42', '2022-09-29 20:50:02', 160, 24000, 150, 208, 2, 'accunit', '', '', '', '', 1, 1, 32),
(85, '0310202221538T0001', '2023-07-21 08:00:42', '2022-10-03 13:32:05', 1200, 102900, 85.75, 290, 0, 'selesai', '', '', '', '', 2, 15, 38),
(86, '0710202221538T0001', '2023-07-21 08:00:42', '2022-10-07 14:32:05', 100, 10900, 109, 280, 2, 'selesai', '', '', '', '', 2, 15, 38),
(87, '1810202221538T0001', '2023-07-21 08:00:42', '2022-10-18 13:32:05', 100, 10100, 101, 100, 2, 'selesai', '', '', '', '', 2, 15, 38),
(91, '2110202221538T0002', '2022-10-21 08:10:04', '2022-09-29 13:32:05', 80, 80098, 1001.22, 109, 2, 'selesai', '', '', 'Parman', 'BE 3245 FH', 2, 15, 38),
(93, '2210202221538T0002', '2022-10-22 08:03:22', '2022-10-22 14:32:05', 78, 8767, 112.397, 989, 0, 'selesai', '', '', 'Supri', 'BE 4565 DF', 2, 15, 38),
(94, '2310202221538T0001', '2022-10-23 16:32:28', '2022-09-29 23:32:05', 89, 980, 11.0112, 109, 3, 'accafdeling', 'Asisten Afdeling', 'wwkwkwkwkk', '', '', 2, 15, 38),
(95, '2410202221538T0001', '2022-10-24 09:36:49', '2022-09-29 23:32:05', 80, 9800, 122.5, 290, 3, 'accafdeling', 'Asisten Afdeling', 'wkkkkkkk', '', '', 0, 0, 38),
(98, '2410202221538T0002', '2022-10-24 14:55:56', '0000-00-00 00:00:00', 27, 279, 10.3333, 219, 1, 'accunit', '', '', '', '', 2, 15, 38),
(99, '2410202221538T0003', '2022-10-24 07:39:44', '2022-10-24 14:25:00', 78, 9809, 125.756, 200, 2, 'selesai', '', '', 'Alex', 'BE 3478 CD', 2, 15, 38),
(100, '2410202221538T0004', '2022-10-24 12:39:44', '2022-10-24 14:45:00', 78, 9809, 125.756, 200, 2, 'accunit', '', '', 'Alex', 'BE 3478 CD', 2, 15, 38),
(101, '2510202221538T0001', '2022-10-25 09:57:45', '2022-10-25 10:49:00', 30, 2900, 96.6667, 29, 2, 'accunit', '', '', 'Gattuso', 'BE 2787 DJ', 2, 15, 38),
(102, '0311202221538T0001', '2022-11-03 08:13:47', '2022-11-03 14:15:00', 69, 6800, 98.5507, 200, 1, 'selesai', '', '', 'Udil', 'BE 3896 OI', 2, 15, 38),
(103, '0411202221538T0001', '2022-11-06 08:12:08', '2022-11-06 14:38:00', 20, 2020, 101, 180, 0, 'accafdeling', '', '', 'Subur', 'BE 8688 BC', 2, 15, 38),
(104, '2107202321538T0001', '2023-07-21 15:04:14', '2023-07-21 15:21:59', 300, 245, 0.816667, 255, 23, 'accafdeling', '', '', '', '', 2, 15, 38),
(105, '2107202321538T0002', '2023-07-21 15:07:33', '2023-07-21 15:22:06', 222, 233, 1.04955, 222, 21, 'accafdeling', '', '', '', '', 2, 15, 38),
(106, '2107202321538T0003', '2023-07-21 15:07:56', '2023-07-21 15:22:10', 300, 12, 0.04, 500, 23, 'accafdeling', '', '', '', '', 2, 15, 38),
(107, '2107202321538T0004', '2023-07-21 15:21:21', '2023-07-21 15:22:13', 2, 2, 1, 2, 2, 'accafdeling', '', '', '', '', 2, 15, 38);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id_unit` int(11) NOT NULL,
  `nama_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `luas_unit` int(11) NOT NULL,
  `jumlah_pohon` int(11) NOT NULL,
  `telepon_unit` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `alamat_unit` text COLLATE utf8_unicode_ci NOT NULL,
  `manajer_unit` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `foto_unit` text COLLATE utf8_unicode_ci NOT NULL,
  `map` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id_unit`, `nama_unit`, `luas_unit`, `jumlah_pohon`, `telepon_unit`, `alamat_unit`, `manajer_unit`, `foto_unit`, `map`) VALUES
(1, '-', 0, 0, '', '', '', '', ''),
(2, 'Rejosari', 2452, 270710, '08125498978', 'Rejosari, Kec. Natar, Kabupaten Lampung Selatan, Lampung 35353', 'Agus Faroni, S.P., M.M', 'resa.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63565.2997592051!2d105.11077417823414!3d-5.289013962842149!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40ceb4d113e525:0x8cb9784a630fc966!2sRejosari, Kec. Natar, Kabupaten Lampung Selatan, Lampung!5e0!3m2!1sid!2sid!4v1665211259115!5m2!1sid!2sid'),
(3, 'Bekri', 2920, 371072, '08216545767', 'Sinar Banten/Bekri, Bekri, Central Lampung Regency, Lampung 34162', 'Aris Afandi, S.T.', 'bekri.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.1877537017704!2d105.13256556985938!3d-5.073297338935197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40b18e5d2a09f3:0x297193a8cba191ab!2sPTP Nusantara VII Bekri!5e0!3m2!1sid!2sid!4v1665215950388!5m2!1sid!2sid'),
(4, 'Padang Ratu', 2229, 291289, '082177886545', 'Unit Kebun Kelapa Sawit (UKKS, Padang Ratu, Kec. Padang Ratu, Kabupaten Lampung Tengah, Lampung 34176', 'Jumbang S. Siregar, S.P.', 'patu.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31795.901568837453!2d104.91445871869138!3d-5.0243530665828935!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e475220238f7d6d:0x34a6fa76ffeec534!2sPT Perkebunan Nusantara VII!5e0!3m2!1sid!2sid!4v1665219452112!5m2!1sid!2sid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_afdeling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jabatan`, `id_unit`, `id_afdeling`) VALUES
(1, 'admin', '$2y$10$Z.dxuxHLutXnEX81feThKeAKRGMt4LMkXr16SPqjNuC2NU.7wvR0y', 'Administrator', 1, 1),
(29, 'kabag', '$2y$10$H3WS21tnfZMDEBb1gaJAm.OxQVTuTgQu588iDfMr5vzuzNEP6tJsi', 'Kepala Bagian Operasional', 1, 1),
(36, 'manajerresa', '$2y$10$7vb2FHacPt11aUandNDLcen8pxJdypcTDEX7aDvGWs2zmQb0zel1a', 'Manajer Unit', 2, 1),
(37, 'asistresa1', '$2y$10$O.2hBw1EijQ9krHA8hGb6OOFGDmc8QpX0NOlYEBV283slvdfTgkTy', 'Asisten Afdeling', 2, 15),
(38, 'keraniresa1', '$2y$10$C3rg5xMV7JKz2tL4mCKW.eTwvGG1MjuCwEl/enDdDKbmYINuqW9yy', 'Kerani Panen', 2, 15),
(41, 'asistresa2', '$2y$10$p11uU.klGfIYDRvasBfnN.8GpsVMZwubhBSMkBv/f.cPYxN2UnYTm', 'Asisten Afdeling', 2, 16),
(44, 'keraniresa2', '$2y$10$OW4vlFrvSfu3S3jla2csretOIoYCVH72WdlHjLCSgVykOULgts4zW', 'Kerani Panen', 2, 16),
(45, 'asistresa3', '$2y$10$.CgCN3Q9.CxNdANSWGWIvu.IlKrkfM7OuTkGL/9VcIfReuB3dq1ka', 'Asisten Afdeling', 2, 17),
(46, 'keraniresa3', '$2y$10$qKPPnu5QEbRC0/TGKmNSi.EYqD41JpY.4qSgN7f4o5FO7ySBlGTmy', 'Kerani Panen', 2, 17),
(47, 'asistresa4', '$2y$10$rtgjthPi44Je28jgz3O1LOFxp9gFhKpzpYunwtjQ6jGol3vCYFeHG', 'Asisten Afdeling', 2, 27),
(48, 'keraniresa4', '$2y$10$1lv.NZvewJ7pxAAUtdoD6O.FETCu0pNs2iA4UXVjsywKq26cOPsem', 'Kerani Panen', 2, 27),
(49, 'asistresa5', '$2y$10$rUcFQob8G4PAykAneVfR7.XHlsJ29UPcvUbmOgKFra7qCunsfV/2a', 'Asisten Afdeling', 2, 28),
(50, 'keraniresa5', '$2y$10$QG4My72exLL3I/y2vti20eyc3UeEvchh6dnKfPIrFuVZ8yjlOEcya', 'Kerani Panen', 2, 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`id_afdeling`),
  ADD KEY `id_unit` (`id_unit`);

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `panen`
--
ALTER TABLE `panen`
  ADD PRIMARY KEY (`id_panen`),
  ADD KEY `id_member` (`id_unit`),
  ADD KEY `id_outlet` (`id_afdeling`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id_unit`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_outlet` (`id_unit`),
  ADD KEY `id_afdeling` (`id_afdeling`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `id_afdeling` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `panen`
--
ALTER TABLE `panen`
  MODIFY `id_panen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `afdeling`
--
ALTER TABLE `afdeling`
  ADD CONSTRAINT `afdeling_ibfk_1` FOREIGN KEY (`id_unit`) REFERENCES `unit` (`id_unit`);

--
-- Constraints for table `biodata`
--
ALTER TABLE `biodata`
  ADD CONSTRAINT `biodata_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
