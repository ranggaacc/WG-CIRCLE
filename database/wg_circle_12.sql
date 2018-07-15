-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2018 at 09:20 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wg_circle`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user` varchar(200) NOT NULL,
  `picture` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `title`, `description`, `kategori`, `created_at`, `updated_at`, `user`, `picture`) VALUES
(1, 'Alus euy', 'Alus apanananan', '', '2017-07-03 02:46:56', '2017-07-03 02:46:56', 'didok49@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer_aktif`
--

CREATE TABLE `customer_aktif` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_card` varchar(150) DEFAULT NULL,
  `no_member` varchar(150) NOT NULL,
  `no_pengajuan` varchar(150) NOT NULL,
  `lokasi_diminati` varchar(150) DEFAULT NULL,
  `picture` text,
  `user` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `telephone` varchar(150) NOT NULL,
  `closing_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_aktif`
--

INSERT INTO `customer_aktif` (`id`, `first_name`, `middle_name`, `created_at`, `id_card`, `no_member`, `no_pengajuan`, `lokasi_diminati`, `picture`, `user`, `status`, `updated_at`, `telephone`, `closing_date`) VALUES
(51, 'Hendrik', 'Didok', '2018-03-10 15:18:30', '3210121212121212', 'WGCC-2018-0039', 'WGCC-2018-0039-0051', '4', '/upload/images/avatar5.png', 'eyliendn@gmail.com', 1, '2018-03-10', '02382378273982', NULL),
(52, 'Mansur', 'Mama', '2018-03-14 04:58:21', '3121212121217773', 'WGCC-2018-0039', 'WGCC-2018-0039-0052', '3', NULL, 'eyliendn@gmail.com', 1, '2018-03-14', '08182727271', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_pasif`
--

CREATE TABLE `customer_pasif` (
  `id` int(10) NOT NULL,
  `first_name` varchar(200) DEFAULT NULL,
  `middle_name` varchar(150) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `id_card` varchar(150) DEFAULT NULL,
  `no_member` varchar(150) NOT NULL,
  `no_pengajuan` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `hp` varchar(150) NOT NULL,
  `jalan` varchar(150) NOT NULL,
  `kota` varchar(150) NOT NULL,
  `provinsi` varchar(150) NOT NULL,
  `negara` varchar(150) NOT NULL,
  `kodepos` varchar(150) NOT NULL,
  `lokasi_diminati` varchar(150) DEFAULT NULL,
  `tipe_diminati` varchar(150) DEFAULT NULL,
  `picture` text,
  `user` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `id_member` varchar(150) NOT NULL,
  `closing_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_pasif`
--

INSERT INTO `customer_pasif` (`id`, `first_name`, `middle_name`, `created_at`, `id_card`, `no_member`, `no_pengajuan`, `email`, `hp`, `jalan`, `kota`, `provinsi`, `negara`, `kodepos`, `lokasi_diminati`, `tipe_diminati`, `picture`, `user`, `status`, `updated_at`, `id_member`, `closing_date`) VALUES
(1, 'Hendrik', 'Permadi', '2018-03-10 15:21:02', '3211121212121212', 'WGCC-2018-0039', 'WGCC-2018-0039-0002', 'drikdoank123@gmail.com', '0686868687', 'Manggis Raya', 'Bogor', '22', 'Indonesia', '16680', '3', NULL, '/upload/images/avatar3.png', 'eyliendn@gmail.com', 0, '2018-03-10', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `picture` text,
  `user` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `penyelenggara` varchar(150) DEFAULT NULL,
  `address` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `title`, `description`, `created_at`, `picture`, `user`, `status`, `updated_at`, `penyelenggara`, `address`) VALUES
(1, 'a', 'a', '2017-09-09 16:05:29', '/upload/images/npwp.jpg', NULL, NULL, '2017-09-09', 'a', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `picture` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `info_program`
--

CREATE TABLE `info_program` (
  `id` int(11) NOT NULL,
  `user` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `title` varchar(150) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info_program`
--

INSERT INTO `info_program` (`id`, `user`, `created_at`, `title`, `jenis`, `description`, `updated_at`) VALUES
(1, '', '2017-09-09 16:41:16', 'Syarat dan Ketentuan', 'sdank', 'ldsdhs;sdk;sjdsjlkdsjdks', '2017-09-09 16:41:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_12_150440_create_blogs_table', 1),
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_09_12_150440_create_blogs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('drikdoank@gmail.com', '6ab2f44831d31b104d23697c06b771799151b3b56cfcc31c24c34972b0470abc', '2017-02-02 06:07:50'),
('drikdoank@gmail.com', '6ab2f44831d31b104d23697c06b771799151b3b56cfcc31c24c34972b0470abc', '2017-02-02 06:07:50');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_customer` varchar(150) NOT NULL,
  `id_member` varchar(150) NOT NULL,
  `id_product` int(11) NOT NULL,
  `no_pesanan` varchar(150) NOT NULL,
  `nilai_transaksi` decimal(10,0) NOT NULL,
  `date_10_percent` date DEFAULT NULL,
  `date_20_percent` date DEFAULT NULL,
  `poin` int(11) NOT NULL,
  `closing_fee` int(11) NOT NULL,
  `sales_fee` int(11) NOT NULL,
  `date_fee_1` date DEFAULT NULL,
  `date_fee_2` date DEFAULT NULL,
  `tipe_diminati_1` varchar(150) DEFAULT NULL,
  `tipe_diminati_2` varchar(150) DEFAULT NULL,
  `tipe_diminati_3` varchar(150) DEFAULT NULL,
  `tipe_diminati_4` varchar(150) DEFAULT NULL,
  `tipe_diminati_5` varchar(150) DEFAULT NULL,
  `tipe_diminati_6` varchar(150) DEFAULT NULL,
  `tipe_diminati_7` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_customer`, `id_member`, `id_product`, `no_pesanan`, `nilai_transaksi`, `date_10_percent`, `date_20_percent`, `poin`, `closing_fee`, `sales_fee`, `date_fee_1`, `date_fee_2`, `tipe_diminati_1`, `tipe_diminati_2`, `tipe_diminati_3`, `tipe_diminati_4`, `tipe_diminati_5`, `tipe_diminati_6`, `tipe_diminati_7`) VALUES
(1, 'WGCC-2018-0039-0051', 'WGCC-2018-0039', 4, '0', '100000000', NULL, NULL, 3, 2500000, 2250000, '2018-03-10', '2018-03-16', 'studio', '1br', NULL, NULL, NULL, NULL, NULL),
(2, 'WGCC-2018-0039-0002', 'WGCC-2018-0039', 3, '0', '2000000', NULL, NULL, 10, 2000, 200000, '2018-03-10', NULL, 'studio', '1br', NULL, NULL, NULL, NULL, NULL),
(3, 'WGCC-2018-0039-0052', 'WGCC-2018-0039', 3, '02323', '100000000', NULL, NULL, 6, 9000000, 2250000, '2018-03-03', '2018-03-16', NULL, NULL, '2br', NULL, NULL, 'deluxe', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `picture_3D` varchar(150) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `price_list` varchar(150) NOT NULL,
  `progress` decimal(10,0) NOT NULL,
  `website` varchar(100) NOT NULL,
  `marketing_book` varchar(100) NOT NULL,
  `lokasi_lat` double NOT NULL,
  `lokasi_long` decimal(10,0) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `logo` varchar(250) NOT NULL,
  `segmentasi` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `kode`, `name`, `description`, `created_at`, `picture_3D`, `user`, `status`, `updated_at`, `price_list`, `progress`, `website`, `marketing_book`, `lokasi_lat`, `lokasi_long`, `alamat`, `jenis`, `logo`, `segmentasi`) VALUES
(1, 'A1010', 'Taman Sari Urbano', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae mollitia cumque illo placeat laboriosam, amet vero eaque quo quidem nisi sit hic facere excepturi sed animi, quaerat sequi voluptatibus voluptatem!', '2017-09-09 16:37:57', '/upload/images/Tamansari-Urbano-logo.png;', NULL, NULL, '2018-03-14', '/upload/files/Tamansari-Urbano-logo.png', '20', 'www.tamanceria.com', '/upload/files/Tamansari-Urbano-logo.png', 6, '102', 'Jalan Agstis, Jakarta', 'apartment', '/upload/files/Tamansari-Urbano-logo.png', 'middle'),
(2, 'A1012', 'Taman Sari Mahogany', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae mollitia cumque illo placeat laboriosam, amet vero eaque quo quidem nisi sit hic facere excepturi sed animi, quaerat sequi voluptatibus voluptatem!', '2018-02-09 06:57:03', '/upload/images/user.png;/upload/images/vlcsnap-2018-01-06-18h37m39s745.png', NULL, NULL, '2018-03-14', '/upload/images/user.png', '20', 'www.persadamulia.com', '/upload/images/user.png', 6, '102', 'Jalan Baru', 'apartment', '/upload/files/Tamansari-Mahogany-logo.png', 'middle'),
(3, 'A1013', 'Tamansari Tera', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Recusandae mollitia cumque illo placeat laboriosam, amet vero eaque quo quidem nisi sit hic facere excepturi sed animi, quaerat sequi voluptatibus voluptatem!', '2018-02-09 07:35:34', '/upload/images/Tamansari-Tera-logo.png;', NULL, NULL, '2018-03-14', '/upload/images/Tamansari-Tera-logo.png', '30', 'tamansaritera.com', '/upload/images/Tamansari-Tera-logo.png', 6, '102', 'Jalan Tera No.28, Braga, Sumur Bandung, Braga, Bandung, Kota Bandung, Jawa Barat 40111', 'apartment', '/upload/files/Tamansari-Tera-logo.png', 'middle-high'),
(4, 'A1014', 'Taman Firdaus', 'ldhkjshd sjhkjshdjs lskhdkshkdshjd ', '2018-02-27 07:03:03', '/upload/images/avatar.png;/upload/images/avatar2.png;/upload/images/avatar3.png;/upload/images/avatar04.png', NULL, NULL, '2018-02-27', '/upload/images/avatar2.png', '50', 'www.mulia.com', '/upload/images/avatar5.png', 12, '109', 'Jalan Baru', 'apartment', '/upload/files/avatar04.png', 'middle');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(10,0) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`id`, `id_product`, `created_at`, `updated_at`, `name`, `user`, `category`, `value`, `type`, `status`) VALUES
(1, 1, '2018-03-26 00:15:08', '2018-03-26 00:15:08', 'edasasd', '', 'asdasda', '123123123', 'sdasdas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `category` varchar(150) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `title`, `description`, `user`, `category`, `created_at`, `updated_at`, `url`) VALUES
(2, 'a', 'a', '', 'a', '2017-09-09 15:55:53', '2018-03-26 07:16:12', 'https://www.youtube.com/watch?v=7t0LShgnEhM');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` datetime NOT NULL,
  `quantity` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `status` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `id_reward` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_member` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_member` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `id_card` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `middle_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `jalan` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(10) NOT NULL,
  `kodepos` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `group_member` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `sumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `picture` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `activate` int(1) DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hp` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `norek` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `npwp` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `atasnama` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `no_member`, `id_card`, `middle_name`, `last_name`, `jalan`, `kota`, `provinsi`, `id_product`, `kodepos`, `group_member`, `sumber`, `email`, `birthdate`, `picture`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `activate`, `gender`, `hp`, `norek`, `bank`, `npwp`, `atasnama`) VALUES
(1, 'Hendra', '2152716272', '432322346', '', '', 'Jalan Budi', 'Subang', 'Jawa Barat', 1, '18760', '', '', 'hendra@gmail.com', '2017-09-06', '/upload/images/12-Hendrik-2cd5b9399f832b095755404a20e6035d.jpeg', 'adminunit', '$2y$10$V8UGtfS3dLg4t.i9FWeR9.MbpxLfVvX8sr/LGypvHFdr5Tm2TMpme', NULL, '2017-09-09 09:25:48', '2017-09-09 09:25:48', '', 1, 'Staff', '23029389283', '', '', '', ''),
(31, 'Hendrik', 'WGCC-2018-0037', '432322345', '', '', '', '', '', 0, '', '', '', 'drikdoank@gmail.com', '0000-00-00', '/upload/images/profil/31-Hendrik-K-BioBOOStcopy.jpg', 'admin', '$2y$10$FDw/HZYzgrsN7xh2Hw6HTeHUMBp.x4YrOuaaMDntb5Ad2vihCvxG2', 'ofomRQnpe4el4TntsnICzcdzkbRPR9QXRuZgRy4oo6AJiz1mh50bbFx1WGEh', '2017-10-22 23:42:47', '2018-03-06 02:20:49', '1', 1, NULL, NULL, '', '', '', ''),
(33, 'Budi', '', '432322341', '', '', 'Manggis Raya', 'Bogor', 'Jawa Barat', 1, '16680', '', '', 'budi@gmail.com', '2018-02-09', '', 'adminunit', '$2y$10$W93zxk3ncIXjy.MwIkJszORp0ATrLK6uiH3eJ1KDUTPQ3sE7ab7oK', NULL, '2018-02-08 18:57:31', '2018-02-08 18:57:31', '', 1, 'Staff', '0686868687', '', '', '', ''),
(35, 'Hendrik Didok', 'WGCC-2018-0035', '23212121212', 'bapak', 'weee', 'Manggis Raya', 'Bogor', 'Jawa Barat', 1, '16680', 'wika-group', 'website', 'humas123@gmail.com', '2018-03-05', '/upload/images/group.png', 'adminunit', '$2y$10$S8lfC.rxaso0kDfnEjP3iudgz.pP7fABAC7JcplqHhvnx4siH7TdC', NULL, '2018-02-08 21:33:46', '2018-03-04 20:59:22', '0', 1, 'Staff', '0686868687', '', '', '', ''),
(36, 'Hendrik Did', 'WGCC-2018-0036', '23212121212', 'bapak', 'weee', 'Manggis Raya', 'Bogor', 'Jawa Barat', 0, '16680', 'wika-group', 'website', 'humas1234@gmail.com', '2018-02-09', '', 'member', '', NULL, '2018-02-08 21:40:44', '2018-02-08 21:40:44', '0', 1, NULL, '0686868687', '', '', '', ''),
(39, 'El', 'WGCC-2018-0039', '321012121212', 'ibu', 'dfd', 'Manggis Raya', 'Bogor', 'Jawa Barat', 0, '16680', 'wika-group', 'website', 'eyliendn@gmail.com', '2018-02-27', '', 'member', '$2y$10$1zsbuRHSkXm.XGDz5JgOv.6hjKZPq.wVykOsSlcHJup0LQZmL4tuq', 'ZrNnM19aH2vv97AoDlg7kqElRkPbUyPnf7ODL2O6ypAK19TXltczceRwqcmt', '2018-02-27 00:21:17', '2018-03-04 21:42:32', '0', 1, 'Staff', '0390283092839', '02632863273', '', '82618621621762', 'Hj Tatang'),
(40, 'Mei', '', '-', '', '', 'Jalan Baru', 'Bogor', 'Jawa Barat', 4, '16680', '', '', 'mei@gmail.com', '2018-02-27', '/upload/images/profil/40-Mei-avatar2.png', 'adminunit', '$2y$10$oSZduWzUIjp934LLDKySeOmCghaGEhyHshueqK2KSYRlz9Aua.yYC', 'ia4TvvUhxzicHijbnE0psD5iQB2xSiqu8leUh7GG8JHOZ6LULvmH15POYBrG', '2018-02-27 00:41:08', '2018-02-27 01:23:33', '', 1, 'Staff', '0686868687', '', '', '', ''),
(44, 'rangga', 'WGCC-18181818-0041', '3123', 'bapak', '123', '123', '123', 'Jawa Barat', 0, '123', 'wika-group', 'website', 'airlanggamurthi@gmail.com', '2018-03-04', '', 'member', '$2y$10$iPs4Lry1i/4ozCvZNnJkH.M97shgnoTHBMD34zTYTJhR.Q2KAmTwe', 'oovwLWX5m1sYEBgFM8vFnWVYd1Ep4NYRHtSxnePq7Ynk4NIFyAgjyhjC6blQ', '2018-03-04 01:21:08', '2018-03-25 22:02:14', '0', 1, NULL, '23', '123', '', '1231', '123'),
(45, '123', 'WGCC-18181818-0045', '123', 'bapak', '123', '123123', '123', 'Jawa Barat', 0, '123', 'wika-group', 'website', 'airlanggamurthi@gmail.com', '2018-03-04', '', 'member', '$2y$10$UMq4dlYPLWnCZEa5K/LCpu8bCdo6BTU1JpYgJQmWS3udPhBSKWhr.', NULL, '2018-03-04 01:23:11', '2018-03-04 01:23:11', '0', 1, NULL, '123', '123', '', '123', '123'),
(46, 'wisnu', 'WGCC-2018-0046', '123123', 'bapak', 'wijaya', 'wisnu', 'bogor', 'Jawa Barat', 0, '16680', 'wika-group', 'website', 'wisnuwijaya182@gmail.com', '2018-03-04', '', 'member', '$2y$10$xIrNef.BQL8GdXrFTIP3OeE9rtYeKdMN7Kp4zWUjJspKq78LJ5vzW', NULL, '2018-03-04 01:58:49', '2018-03-04 01:58:49', '0', 1, NULL, '1231231', '123123', '', '123123', '23123'),
(61, '1', 'WGCC-2018-0047', '1', 'bapak', '1', '1', '1', '24', 0, '1', 'wika-group', 'website', 'airlanggamurthi@gmail.com', '2018-03-26', '', 'member', '$2y$10$rTDiPjq6wzDbrX7Jc.OsCuuGKh4vqtnfXqDyk72kXD2Hls8BVQdIK', NULL, '2018-03-25 23:14:52', '2018-03-25 23:14:52', '0', 1, NULL, '1', '1', '11', '123123123123', '1'),
(62, '2', 'WGCC-2018-0062', '2', 'bapak', '2', '2', '2', '24', 0, '2', 'wika-group', 'website', 'airlanggamurthi@gmail.com', '2018-03-26', '', 'member', '$2y$10$EFrHzSg5.rmlppR.Atg0i.QnUuWiBPfaBjeuYQWx/8ADfzAJrjqLu', NULL, '2018-03-25 23:16:21', '2018-03-25 23:16:21', '0', 1, NULL, '2', '2', '2', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `user_activations`
--

CREATE TABLE `user_activations` (
  `Id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `activated` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_activations`
--

INSERT INTO `user_activations` (`Id`, `user_id`, `token`, `created_at`, `activated`) VALUES
(1, 10, 'e0d6132def4e05d100fd1a7b01b02a480c6aff26c31f9f2cabb414f64722729b', '2017-02-04 06:09:53', NULL),
(0, 13, '08fe36cd578b911a47caf69087e1727128c7575ee519cd42e0b2e20df856b088', '2017-10-22 21:29:42', NULL),
(0, 14, '6b55e44fa534c32b83fce3c2e25d7b82c86fcc4c39e14451f28c3518a68f216d', '2017-10-22 21:32:10', NULL),
(0, 31, 'e4236f2e7442171a6e2b5e82e1aefcacc75c6817fbc222f3db6ad45144417b14', '2017-11-28 20:34:04', NULL),
(1, 10, 'e0d6132def4e05d100fd1a7b01b02a480c6aff26c31f9f2cabb414f64722729b', '2017-02-04 06:09:53', NULL),
(0, 13, '08fe36cd578b911a47caf69087e1727128c7575ee519cd42e0b2e20df856b088', '2017-10-22 21:29:42', NULL),
(0, 14, '6b55e44fa534c32b83fce3c2e25d7b82c86fcc4c39e14451f28c3518a68f216d', '2017-10-22 21:32:10', NULL),
(0, 31, 'e4236f2e7442171a6e2b5e82e1aefcacc75c6817fbc222f3db6ad45144417b14', '2017-11-28 20:34:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_aktif`
--
ALTER TABLE `customer_aktif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_pasif`
--
ALTER TABLE `customer_pasif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info_program`
--
ALTER TABLE `info_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_aktif`
--
ALTER TABLE `customer_aktif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `customer_pasif`
--
ALTER TABLE `customer_pasif`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info_program`
--
ALTER TABLE `info_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reward`
--
ALTER TABLE `reward`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
