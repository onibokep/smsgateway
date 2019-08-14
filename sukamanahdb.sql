-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Okt 2017 pada 05.15
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sukamanahdb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`UpdatedInDB`, `ReceivingDateTime`, `Text`, `SenderNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `RecipientID`, `Processed`) VALUES
('2017-05-30 08:07:58', '2017-01-29 21:04:04', '003C004B00520045004400490054002000520070002E0034002E003500350037002E003800330035002C003000300070006100640061002000720065006B002E002000310020005400420020007800780078003600300038002000740067006C002E002000330030002F00300031002F0032003000310037002C006A0061006D002000300034003A00300032003A00310036002000500065006E0075006800690020006B006200740068006E0020006400670020006D0061006E00640069007200690020004B0054004100200066007200650065002000620069006100790061002000700072006F007600690073006900200026002000610064006D0069006E002E004800750062003A00310034003000300030', '3355', 'Default_No_Compression', '', '+6281100000', -1, '<KREDIT Rp.4.557.835,00pada rek. 1 TB xxx608 tgl. 30/01/2017,jam 04:02:16 Penuhi kbthn dg mandiri KTA free biaya provisi & admin.Hub:14000', 16, 'Sukamanah', 'true'),
('2017-01-29 22:55:27', '2017-01-29 01:08:24', '00420075006E00640061002C00200073007500640061006800200073006100610074006E007900610020006D0065006C0061006B0075006B0061006E002000700065006D006500720069006B007300610061006E00200062006100790069002000640061006E00200069006200750020006400690020006D0061007300610020006E0069006600610073002E002000440061007000610074006B0061006E00200069006D0075006E0069007300610073006900200020004200430047002000640061006E00200050006F006C0069006F003100200075006E00740075006B00200062006100790069002000620075006E00640061', 'SMSBunda', 'Default_No_Compression', '', '+6281100000', 1, 'Bunda, sudah saatnya melakukan pemeriksaan bayi dan ibu di masa nifas. Dapatkan imunisasi  BCG dan Polio1 untuk bayi bunda', 14, 'Sukamanah', 'false'),
('2017-01-28 15:39:17', '2017-01-25 00:10:37', '00420075006E00640061002C002000620065007200730061006D00610020007300750061006D0069002000640061006E0020006B0065006C0075006100720067006100200062006100630061002000640061006E00200070006100680061006D0069002000620075006B00750020004B0049004100200075006E00740075006B002000620061006700690061006E002000740065006E00740061006E006700200061006E0061006B002E0020004A0069006B00610020006100640061002000790061006E00670020006B007500720061006E00670020006400690070006100680061006D0069002000740061006E00790061006B0061006E0020007000610064006100200062006900640061006E002F0070006500720061007700610074002F0064006F006B007400650072', 'SMSBunda', 'Default_No_Compression', '', '+6281100000', 1, 'Bunda, bersama suami dan keluarga baca dan pahami buku KIA untuk bagian tentang anak. Jika ada yang kurang dipahami tanyakan pada bidan/perawat/dokter', 6, 'Sukamanah', 'false'),
('2017-01-28 15:39:17', '2017-01-26 00:09:47', '00420075006E00640061002C00200073006100610074002000620061007900690020006200650072007500730069006100200031002000620075006C0061006E002C002000640061007000610074006B0061006E00200069006D0075006E006900730061007300690020004200430047002000640061006E00200050006F006C0069006F002D0031002000200064006900200050006F007300790061006E00640075002F005000750073006B00650073006D00610073002C002000200042006900640061006E002F0044006F006B0074006500720020007000720061006B00740065006B', 'SMSBunda', 'Default_No_Compression', '', '+6281100000', 1, 'Bunda, saat bayi berusia 1 bulan, dapatkan imunisasi BCG dan Polio-1  di Posyandu/Puskesmas,  Bidan/Dokter praktek', 7, 'Sukamanah', 'false'),
('2017-01-28 15:39:17', '2017-01-27 01:09:55', '00420075006E00640061002C002000620069006C0061002000700065006E00670065006C0075006100720061006E00200064006100720061006800200074006900640061006B0020006200650072006B007500720061006E0067002000640061006E002000630061006900720061006E002000790061006E00670020006B0065006C0075006100720020006D0065006C0061006C0075006900200076006100670069006E00610020006200650072006200610075002C002000730065006700650072006100200070006500720069006B00730061006B0061006E0020006B006500200064006F006B007400650072002F00200062006900640061006E00200061006E00640061', 'SMSBunda', 'Default_No_Compression', '', '+6281100000', 1, 'Bunda, bila pengeluaran darah tidak berkurang dan cairan yang keluar melalui vagina berbau, segera periksakan ke dokter/ bidan anda', 8, 'Sukamanah', 'false'),
('2017-01-28 15:39:18', '2017-01-28 04:01:00', '00540061006D00620061006800200048006F006B006900200064006900200074006100680075006E00200069006E0069002E002000420065006C0069002000700075006C007300610020006400690020004D007900540065006C006B006F006D00730065006C002000700061006B0061006900200074002D00630061007300680020006100740061007500200056006900730061002C00200064006100700061007400200065006B0073007400720061002000700075006C007300610020003500300025002100200049006E0066006F0020006C00650062006900680020006C0061006E006A007500740020006B006C0069006B00200064006900200068007400740070003A002F002F007400730065006C002E006D0065002F0065006B007300740072006100700075006C00730061', 'MyTelkomsel', 'Default_No_Compression', '', '+6281100000', 1, 'Tambah Hoki di tahun ini. Beli pulsa di MyTelkomsel pakai t-cash atau Visa, dapat ekstra pulsa 50%! Info lebih lanjut klik di http://tsel.me/ekstrapulsa', 11, 'Sukamanah', 'false'),
('2017-05-30 08:11:56', '2017-05-20 08:54:13', '00570061006C00200070006500740069006E006700200073006900620075006B002000740065002E002E000A00410069006E00670020006B0072006B0020007300690075006D0061006E', '+6283807015067', 'Default_No_Compression', '', '+628315000032', -1, 'KS Jalan di kampung jawaringan rusak dan berlubang tolong di perbaiki', 12, 'Sukamanah', 'true'),
('2017-05-22 13:35:58', '2017-05-20 09:42:05', '0049007900650065002000610069006E0067002000730061006900740061006D0020006B007500790061', '+6283807015067', 'Default_No_Compression', '', '+628315000032', -1, 'KS Pelayanan pembuatan AJB tanah lambat tolong bisa di maksimalkan', 13, 'Sukamanah', 'false'),
('2017-04-01 16:00:00', '2017-01-29 23:48:49', '003C00440045004200490054002000520070002E0031002E003200350030002E003000300030002C003000300070006100640061002000720065006B002E002000310020005400420020007800780078003600300038002000740067006C002E002000330030002F00300031002F0032003000310037002C006A0061006D002000300036003A00340032003A00300034002D00200020004A0069006B00610020007400720061006E00730061006B0073006900200074006900640061006B00200041006E006400610020006B0065006E0061006C002C0068007500620020006D0061006E0064006900720069002000630061006C006C002000310034003000300030002E', '3355', 'Default_No_Compression', '', '+6281100000', -1, '<DEBIT Rp.1.250.000,00pada rek. 1 TB xxx608 tgl. 30/01/2017,jam 06:42:04-  Jika transaksi tidak Anda kenal,hub mandiri call 14000.', 17, 'Sukamanah', 'false'),
('2017-04-01 16:00:00', '2017-03-31 17:36:08', '0041006D00620069006C00200062006F006E00750073002000680061007200690061006E006D00750020006400690020002A00360030003000230020002800420065006200610073002000500075006C007300610029002E0020004400700074006B0061006E00200067007200610074006900730020006E0065006C0070006F006E0020006100740061007500200069006E007400650072006E006500740061006E002000640061006E002000700072006F006D006F0020006C00610069006E006E00790061002000730065007300750061006900200068006F00620069006D00750021', 'OPTIN TSEL', 'Default_No_Compression', '', '+6281100000', 1, 'Ambil bonus harianmu di *600# (Bebas Pulsa). Dptkan gratis nelpon atau internetan dan promo lainnya sesuai hobimu!', 18, 'Sukamanah', 'false');

--
-- Trigger `inbox`
--
DELIMITER $$
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox` FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `keterangans`
--

CREATE TABLE `keterangans` (
  `nomorSurat` varchar(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `keterangans`
--

INSERT INTO `keterangans` (`nomorSurat`, `nik`, `userId`, `id`, `updated_at`, `created_at`) VALUES
('I/05/2017/DOM', '3603111108930003', 1, 7, '2017-05-11 23:57:30', '2017-05-11 23:57:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` int(10) NOT NULL,
  `Retries` int(3) DEFAULT '0',
  `Priority` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Trigger `outbox`
--
DELIMITER $$
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `nik` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmlahir` varchar(20) NOT NULL,
  `tglahir` date NOT NULL,
  `kelamin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) DEFAULT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(11) NOT NULL,
  `rw` varchar(11) NOT NULL,
  `desa` varchar(20) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `kabupaten` varchar(20) NOT NULL,
  `provinsi` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(20) NOT NULL,
  `keterangan` varchar(20) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `penduduk`
--

INSERT INTO `penduduk` (`nik`, `nama`, `tmlahir`, `tglahir`, `kelamin`, `status`, `agama`, `telp`, `pekerjaan`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kabupaten`, `provinsi`, `kewarganegaraan`, `keterangan`, `updated_at`, `created_at`) VALUES
('1234567489555555', 'Sarmin', 'Tangerang', '2017-07-21', 'Laki-laki', 'Kawin', 'Islam', '1234', NULL, 'Galih', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-07-21 08:06:12', '2017-06-08 01:13:16'),
('1234568888887777', 'nurman', 'Serang', '2017-07-21', 'Laki-laki', 'Kawin', 'Islam', '123', NULL, 'Sumur daon', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-07-21 08:05:35', '2017-06-08 01:04:29'),
('3600000000000000', 'Awal', 'Tangerang', '2017-05-27', 'Laki-laki', 'Kawin', 'Islam', '081214162222', 'buruh', 'Gembong', '2', '2', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-05-26 23:47:58', '2017-04-04 12:24:33'),
('3603001205870001', 'sumarlan', 'kelaten', '1987-05-12', 'Laki-laki', 'Kawin', 'islam', '081211104647', 'karyawan', 'jawaringan', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', 'pendatang', '2017-04-11 01:52:15', '2017-04-11 01:52:15'),
('3603031114509100', 'Ahmad awaludin', 'Tangerang', '2017-05-27', 'Laki-laki', 'Kawin', 'Islam', '081214162222', 'dosen', 'Kukun', '4', '2', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-05-26 23:50:19', '2017-04-04 12:24:33'),
('3603101511940005', 'sarman', 'tangerang', '1995-07-13', 'Laki-laki', 'Kawin', 'islam', '123', 'pelajar', 'gembong', '4', '3', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-04-09 23:39:47', '2017-04-09 23:39:47'),
('3603111108930003', 'yeyet', 'tangerang', '2017-04-11', 'Perempuan', 'Kawin', 'islam', '082297170550', 'buruh', 'gembong', '2', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-04-04 12:24:33', '2017-04-04 12:24:33'),
('360311111111111111', 'ahmad awaludin', 'tangerang', '2017-04-11', 'Laki-laki', 'Kawin', 'islam', '081214162222', 'buruh', 'gembong', '2', '2', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-04-04 12:24:33', '2017-04-04 12:24:33'),
('3603111405910002', 'Ahmad awaludin', 'Tangerang', '2017-05-27', 'Laki-laki', 'Kawin', 'Islam', '082297170550', 'buruh', 'Gembong', '2', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-05-26 23:47:45', '2017-04-04 12:24:33'),
('3603111405910003', 'ahmad awaludin', 'tangerang', '1991-05-14', 'Laki-laki', 'Kawin', 'islam', '081930123270', NULL, 'kp.gembong', '2', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-09-21 19:57:26', '2017-09-21 19:57:26'),
('3603111805210002', 'rifqi', 'tangerang', '1990-05-18', 'Laki-laki', 'Belum Kawin', 'islam', '083897086196', NULL, 'gembong', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-09-21 21:04:52', '2017-09-21 21:04:52'),
('3603121108930004', 'Yeyet', 'Tangerang', '1993-08-11', 'Laki-laki', 'Kawin', 'islam', '1', 'Ibu rumah tangga', 'Gembong', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'WNI', NULL, '2017-07-21 08:13:35', '2017-07-21 08:13:35'),
('3603121291222222', 'al-muabarak', 'tangerang', '2009-12-01', 'Laki-laki', 'Belum Kawin', 'islam', '123456', NULL, 'sumur daon', '2', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-09-21 21:07:58', '2017-09-21 21:07:58'),
('3603123456789123', 'ahmad awaludin', 'tangerang', '2017-04-18', 'Laki-laki', 'Kawin', 'islam', '081214162222', '', 'sumur daon', '3', '2', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', '', NULL, '2017-04-04 12:24:33', '2017-04-04 12:24:33'),
('3603191405910002', 'asman', 'tangerang', '2017-06-14', 'Laki-laki', 'Belum Kawin', 'islam', '88888', NULL, 'gembong', '1', '1', 'Sukamanah', 'Rajeg', 'Tangerang', 'Banten', 'wni', NULL, '2017-06-08 00:57:58', '2017-06-08 00:57:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengantars`
--

CREATE TABLE `pengantars` (
  `nomorSurat` varchar(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `userId` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengantars`
--

INSERT INTO `pengantars` (`nomorSurat`, `nik`, `userId`, `id`, `updated_at`, `created_at`) VALUES
('I/04/2017/SKCK', '3600000000000000', 1, 6, '2017-04-11 01:37:08', '2017-04-11 01:37:08'),
('III/05/2017/SKCK', '3603001205870001', 1, 7, '2017-05-11 21:21:56', '2017-05-11 21:21:56'),
('I/09/2017/SKCK', '3603111405910003', 1, 8, '2017-09-21 19:57:54', '2017-09-21 19:57:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE `phones` (
  `ID` varchar(255) NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `IMSI` varchar(35) NOT NULL,
  `NetCode` varchar(10) DEFAULT 'ERROR',
  `NetName` varchar(35) DEFAULT 'ERROR',
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `IMSI`, `NetCode`, `NetName`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('Sukamanah', '2017-09-22 03:36:21', '2017-09-22 03:32:11', '2017-09-22 03:36:31', 'yes', 'yes', '861313010400203', '510109772170550', '510 10', 'TELKOMSEL', 'Gammu 1.38.0, Windows Server 2007, MS VC 1900', 100, 69, 1, 0);

--
-- Trigger `phones`
--
DELIMITER $$
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2017-05-10 07:35:38', '2017-01-12 13:44:36', '2017-01-12 13:44:53', NULL, '0074006500730074', '082297170550', 'Default_No_Compression', '', '+62816124', -1, 'Pengumuman gotong royong perbaikan saluran pembuangan di RT 02/02 pada hari minggu jam 07:00 WIB', 2, 'Sukamanah', 1, 'SendingOKNoReport', -1, 23, 255, 1),
('2017-09-22 02:52:21', '2017-09-22 02:51:48', '2017-09-22 02:52:21', NULL, '00730065007000740065006D006200650072003200320032003000310037', '081930123270', 'Default_No_Compression', '', '+6281100000', -1, 'september222017', 77, 'Sukamanah', 1, 'SendingOKNoReport', -1, 101, 255, 1),
('2017-05-10 07:37:26', '2017-03-31 15:41:44', '2017-04-01 14:42:37', NULL, '0074006500730020006B0065007300720069006200750020006B0061006C0069', '082297170550', 'Default_No_Compression', '', '', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 37, 'Sukamanah', 1, 'SendingError', -1, 0, 255, 2),
('2017-05-10 07:37:32', '2017-03-31 16:49:07', '2017-04-01 15:33:15', NULL, '0069006E006A006500630074', '082297170550', 'Default_No_Compression', '', '', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 40, 'Sukamanah', 1, 'SendingError', -1, 0, 255, 3),
('2017-05-10 07:37:36', '2017-04-01 15:59:08', '2017-04-01 16:00:04', NULL, '0074006500730074', '083897086196', 'Default_No_Compression', '', '+6281100000', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 41, 'Sukamanah', 1, 'SendingOKNoReport', -1, 98, 255, 1),
('2017-05-10 07:37:41', '2017-04-01 16:02:08', '2017-04-01 16:05:06', NULL, '0077007700770077007700770077007700770077007700770077007700770077007700770077007700770077007700770077007700770077007700770077007700610077', '083897086196', 'Default_No_Compression', '', '+6281100000', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 42, 'Sukamanah', 1, 'SendingOKNoReport', -1, 99, 255, 1),
('2017-05-10 07:37:49', '2017-04-01 16:03:52', '2017-04-01 16:05:10', NULL, '0074006500730020006C006100670069', '083897086196', 'Default_No_Compression', '', '+6281100000', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 43, 'Sukamanah', 1, 'SendingOKNoReport', -1, 100, 255, 1),
('2017-05-10 07:37:55', '2017-04-01 16:05:39', '2017-04-01 16:05:44', NULL, '00740065007300200032', '083897086196', 'Default_No_Compression', '', '+6281100000', -1, 'Pengumuman bagi warga desa sukamanah yang memiliki balita, posyandu akan di adakan pada hari jum''at bertempat di balai desa sukamanah', 44, 'Sukamanah', 1, 'SendingOKNoReport', -1, 101, 255, 2),
('2017-09-22 03:02:25', '2017-09-22 03:01:55', '2017-09-22 03:02:25', NULL, '00730065007000740065006D006200650072002000320032002000320030003100370020007300650063006F006E00640020007400650073', '081930123270', 'Default_No_Compression', '', '+6281100000', -1, 'september 22 2017 second tes', 78, 'Sukamanah', 1, 'SendingOKNoReport', -1, 102, 255, 1),
('2017-09-22 03:32:15', '2017-09-22 03:30:23', '2017-09-22 03:32:15', NULL, '007400680069007200640020007400650073', '081930123270', 'Default_No_Compression', '', '+6281100000', -1, 'third tes', 79, 'Sukamanah', 1, 'SendingOKNoReport', -1, 103, 255, 1);

--
-- Trigger `sentitems`
--
DELIMITER $$
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems` FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Awaludin', 'awal@admin.com', '$2y$10$4AV4XJEGfLectfUVLWs7seqFsfS/W0mk3sronnhUR4TzRoVC6H6IC', 'admin', 'aktif', '5ul3X7FdBX1omRYXZhDYufNvDoXVQyQfttcLrPHY2fNFwl7fuuuhP1x7bH4L', '2017-03-29 22:58:27', '2017-03-29 22:58:27'),
(2, 'Samiders', 'samid@domain.com', '$2y$10$ugyG6EyQxNA5jzurM2MFUOlMEqM4WfYb45naEj23Gl470bYC4AXDK', 'admin', 'nonaktif', 'ePNDK9SUrG2WwtEXpz9mFKa9aSpbL7CdEOOYKeTcMmPhRZ6GBJGNPZ9jyal1', '2017-03-29 23:04:04', '2017-03-29 23:04:04'),
(4, 'salman', 'salman@gober.com', '$2y$10$5Vz8KnRYrlkJyv7y7dJthe/TOLfYF5yLPDXuD6PfRNVyHeszwUiHu', 'user', 'nonaktif', NULL, '2017-03-30 06:34:27', '2017-03-30 06:34:27'),
(6, 'Ahmad', 'ahmad@awal.com', '$2y$10$WwRsrSCwlCMG6SssYxI7YOLjkQcCq3wOmL.tlBYTIUAgfZUlmxige', 'user', 'aktif', NULL, '2017-03-31 01:57:20', '2017-03-31 01:57:20'),
(11, 'niman', 'niman@skm.com', '$2y$10$MQL/lmFDlAOUN7WZwZq5C.wYSLHAUD2iOu9MFxkpXykUP1LgdYku.', 'user', 'aktif', NULL, '2017-09-22 06:03:27', '2017-09-22 06:03:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gammu`
--
ALTER TABLE `gammu`
  ADD PRIMARY KEY (`Version`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `keterangans`
--
ALTER TABLE `keterangans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outbox`
--
ALTER TABLE `outbox`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  ADD KEY `outbox_sender` (`SenderID`(250));

--
-- Indexes for table `outbox_multipart`
--
ALTER TABLE `outbox_multipart`
  ADD PRIMARY KEY (`ID`,`SequencePosition`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `pengantars`
--
ALTER TABLE `pengantars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`IMEI`);

--
-- Indexes for table `sentitems`
--
ALTER TABLE `sentitems`
  ADD PRIMARY KEY (`ID`,`SequencePosition`),
  ADD KEY `sentitems_date` (`DeliveryDateTime`),
  ADD KEY `sentitems_tpmr` (`TPMR`),
  ADD KEY `sentitems_dest` (`DestinationNumber`),
  ADD KEY `sentitems_sender` (`SenderID`(250));

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `keterangans`
--
ALTER TABLE `keterangans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `outbox`
--
ALTER TABLE `outbox`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `pengantars`
--
ALTER TABLE `pengantars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
