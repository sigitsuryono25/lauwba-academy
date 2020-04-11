-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2020 at 04:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lauwbaco_presensi_kar`
--
CREATE DATABASE IF NOT EXISTS `lauwbaco_presensi_kar` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lauwbaco_presensi_kar`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_presensi`
--

DROP TABLE IF EXISTS `tb_presensi`;
CREATE TABLE `tb_presensi` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `presensi` datetime NOT NULL,
  `status` enum('masuk','pulang') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_presensi`
--

INSERT INTO `tb_presensi` (`id`, `username`, `presensi`, `status`, `keterangan`) VALUES
(26, 'linahandayani06', '2020-03-31 16:47:24', 'pulang', 'kelas bu teti medan (09.00 - 15.00) sampai maps, note: masih error. jam selanjutnya nyari errornya, sampai absen pulang masih error :)'),
(25, 'sitizulaiha15', '2020-03-31 15:42:58', 'pulang', 'kelasnya private  reguler online hari ini sudah sampai Tabel dan Form, kelas mas seto frondend sudah menampilkan Berita'),
(22, 'zelviaolga78', '2020-03-31 08:27:21', 'masuk', NULL),
(21, 'zelviaolga78', '2020-03-31 08:27:03', 'masuk', NULL),
(20, 'linahandayani06', '2020-03-31 08:22:18', 'masuk', NULL),
(19, 'adijaya23', '2020-03-31 07:59:47', 'masuk', NULL),
(18, 'sitizulaiha15', '2020-03-31 07:49:55', 'masuk', NULL),
(17, 'sigitsuryono25', '2020-03-31 07:38:31', 'masuk', NULL),
(28, 'sigitsuryono25', '2020-03-31 17:11:52', 'pulang', 'Pembuatan Aplikasi LTI Monitoring'),
(29, 'zelviaolga78', '2020-03-31 17:34:38', 'pulang', 'kelas Java Yohanes fullday, android e-commerce login'),
(30, 'adijaya23', '2020-03-31 18:07:45', 'pulang', 'edit link, Post Medium, Edit Foto, post facebook, ig dan kelas Digital Marketing pertemuan pertama (Rendy)'),
(31, 'sitizulaiha15', '2020-04-01 07:00:32', 'masuk', NULL),
(32, 'zelviaolga78', '2020-04-01 07:41:42', 'masuk', NULL),
(33, 'sigitsuryono25', '2020-04-01 07:52:35', 'masuk', NULL),
(34, 'adijaya23', '2020-04-01 07:52:58', 'masuk', NULL),
(35, 'linahandayani06', '2020-04-01 08:06:32', 'masuk', NULL),
(36, 'aguskhaer90', '2020-04-01 13:14:33', 'masuk', NULL),
(37, 'aguskhaer90', '2020-04-01 13:14:45', 'masuk', NULL),
(38, 'aguskhaer90', '2020-04-01 13:15:06', 'masuk', NULL),
(39, 'sigitsuryono25', '2020-04-01 16:26:41', 'pulang', 'Kelas mbak Aprilia Atma Jaya. Fixing LTI Smart Attendance'),
(40, 'adijaya23', '2020-04-01 16:31:48', 'pulang', 'becklink, edit foto, post fb, ig (kelas d Digital marketing batalkan, karena ibunya ada keperluan )'),
(41, 'zelviaolga78', '2020-04-01 16:41:37', 'pulang', 'kelas android, e-commerce layout ulang'),
(42, 'aguskhaer90', '2020-04-01 16:43:53', 'pulang', 'Memperbaiki error pada network interface yg saat ini webservice masih menolak adanya request data dari android,belum terpecahkan masalahnya dan akan dilanjut besok'),
(43, 'sitizulaiha15', '2020-04-01 17:51:19', 'pulang', 'kelas reguler weh sampai PHP dasar variabel'),
(44, 'linahandayani06', '2020-04-01 17:58:23', 'pulang', 'lanjut buat materi kelas project surabaya'),
(45, 'sitizulaiha15', '2020-04-02 07:01:31', 'masuk', NULL),
(46, 'sigitsuryono25', '2020-04-02 07:25:11', 'masuk', NULL),
(47, 'adijaya23', '2020-04-02 07:46:38', 'masuk', NULL),
(48, 'zelviaolga78', '2020-04-02 07:46:55', 'masuk', NULL),
(49, 'linahandayani06', '2020-04-02 07:47:57', 'masuk', NULL),
(50, 'aguskhaer90', '2020-04-02 11:46:18', 'masuk', NULL),
(51, 'linahandayani06', '2020-04-02 16:28:58', 'pulang', 'lanjut materi kelas project penggajian, login webservices '),
(52, 'linahandayani06', '2020-04-02 16:29:37', 'masuk', NULL),
(53, 'sigitsuryono25', '2020-04-02 16:46:38', 'pulang', 'fixing halaman pendaftaran Lauwba. Fixing input dan tampilan jadwal Lauwba. Rancang database dan design halaman front end untuk Lauwba Academy'),
(54, 'aguskhaer90', '2020-04-02 17:46:50', 'pulang', ''),
(55, 'adijaya23', '2020-04-02 17:59:35', 'pulang', 'back link, kelas digital marketing'),
(56, 'zelviaolga78', '2020-04-02 18:04:35', 'pulang', 'kelas android kotlin pak Maskur, kelas android Java mas yohanes'),
(57, 'sitizulaiha15', '2020-04-02 21:12:50', 'pulang', 'hari ini selesai php dasar sampai percabangan'),
(58, 'sitizulaiha15', '2020-04-03 07:04:15', 'masuk', NULL),
(59, 'sigitsuryono25', '2020-04-03 07:08:40', 'masuk', NULL),
(60, 'adijaya23', '2020-04-03 07:09:52', 'masuk', NULL),
(61, 'linahandayani06', '2020-04-03 07:50:00', 'masuk', NULL),
(62, 'zelviaolga78', '2020-04-03 07:52:48', 'masuk', NULL),
(63, 'sitizulaiha15', '2020-04-03 16:14:09', 'pulang', 'lanjut CRUD'),
(64, 'sigitsuryono25', '2020-04-03 16:50:48', 'pulang', 'penambahan halaman admin http://academy.lauwba.com/hacked-usa/index.php/'),
(65, 'adijaya23', '2020-04-03 16:56:12', 'pulang', 'kelas digital merketing (beli domain, sama cara iklan facebook ads canvas), Post Medium dan edit di medium'),
(66, 'zelviaolga78', '2020-04-03 17:17:28', 'pulang', 'Project E-commerce : sampai category (back and front),product backend'),
(67, 'linahandayani06', '2020-04-03 18:18:53', 'pulang', 'lanjut materi webservices registrasi gaji '),
(68, 'sitizulaiha15', '2020-04-04 07:26:58', 'masuk', NULL),
(69, 'linahandayani06', '2020-04-04 07:54:53', 'masuk', NULL),
(70, 'zelviaolga78', '2020-04-04 08:17:48', 'masuk', NULL),
(71, 'sigitsuryono25', '2020-04-04 08:34:13', 'masuk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `username` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `passwords` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_tutor` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `nama`, `passwords`, `foto`, `id_tutor`) VALUES
('sigitsuryono25', 'Sigit Suryono', '827ccb0eea8a706c4c34a16891f84e7b', 'https://www.lauwba.com/foto_banner/sigit%20suryono%20s%20kom%20m%20kom%20trainer%20lauwba.jpg', 18),
('linahandayani06', 'Lina Handayani', '494a8204b800c41b2da763f9bbbcc462', 'https://www.lauwba.com/foto_banner/Lina%20Handayani%20SKom%20LAUWBA.jpg', 1),
('sitizulaiha15', 'Siti Zulaiha', '1804bb361e446f85509c76e9cd1c32ba', 'https://www.lauwba.com/foto_banner/siti%20zulaiha%20s%20kom%20trainer%20lauwba1.jpg', 12),
('adijaya23', 'Kuntadi', 'c84177b0092829fc2371fed2ab661c52', 'https://www.lauwba.com/foto_banner/Febriani_riwis_sari_s_kom_trainer_lauwba_copy.jpg', 16),
('zelviaolga78', 'Zelvia Olga Maharani', '503329a3bcee6e520e0fc663ed0a8d0d', 'https://pngimage.net/wp-content/uploads/2018/05/default-user-profile-image-png-6.png', 8),
('aguskhaer90', 'Agus Khaer', 'd90f589c12540210b6bee57c127ec9e4', 'https://pngimage.net/wp-content/uploads/2018/05/default-user-profile-image-png-6.png', 9),
('admin', 'Demo Account', '21232f297a57a5a743894a0e4a801fc3', 'https://www.lauwba.com/foto_banner/trainer%20Hardiansah%20abu%20faruq%20Lauwba%20Techno%20Indonesia.jpg', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_presensi`
--
ALTER TABLE `tb_presensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
