-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2020 at 04:59 PM
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
-- Database: `db_lauwba_academy`
--
CREATE DATABASE IF NOT EXISTS `db_lauwba_academy` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_lauwba_academy`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

DROP TABLE IF EXISTS `tb_comment`;
CREATE TABLE `tb_comment` (
  `id_comment` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `comment_by` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_materi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_course`
--

DROP TABLE IF EXISTS `tb_course`;
CREATE TABLE `tb_course` (
  `id_course` varchar(100) NOT NULL,
  `nama_course` varchar(100) NOT NULL,
  `course_cover` varchar(225) NOT NULL,
  `trainer` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `yang_dipelajari` longtext NOT NULL,
  `id_training` int(11) NOT NULL,
  `location_folder` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_course`
--

INSERT INTO `tb_course` (`id_course`, `nama_course`, `course_cover`, `trainer`, `deskripsi`, `yang_dipelajari`, `id_training`, `location_folder`, `created_on`, `added_by`) VALUES
('b9aa9b82-01e9-47c9-a7bc-7e47121019fd', 'Android Tourism Apps', 'android-tourism-apps-cover.jpg', 18, '<p>Android Tourism Apps<br></p>', '<ol><li>Pengenalan konsep RESTful API</li><li>Penggunaan Retrofit sebagai Tools Pengambilan data</li><li>Penataan layout untuk menampilan data</li><li>Penataan layout untuk menampilkan halaman detail</li></ol>', 22, 'android-tourism-apps', '2020-04-07 15:00:49', 'sigitsuryono25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_materi`
--

DROP TABLE IF EXISTS `tb_materi`;
CREATE TABLE `tb_materi` (
  `id_materi` varchar(225) NOT NULL,
  `nama_materi` varchar(100) NOT NULL,
  `deskripsi_materi` text NOT NULL,
  `pdf_materi` varchar(100) DEFAULT NULL,
  `id_course` varchar(100) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_materi`
--

INSERT INTO `tb_materi` (`id_materi`, `nama_materi`, `deskripsi_materi`, `pdf_materi`, `id_course`, `created_on`, `added_by`) VALUES
('5d1e6960-8e7c-41ce-a039-3ff121dc5037', 'Android Studio Instalations', '<p>Android Studio Instalations<br></p>', NULL, 'b9aa9b82-01e9-47c9-a7bc-7e47121019fd', '2020-04-08 03:40:18', 'sigitsuryono25'),
('de89b6a5-ffca-4aea-90f5-ff0c8eaffaf1', 'Introduction', '<p>Introduction<br></p>', NULL, 'b9aa9b82-01e9-47c9-a7bc-7e47121019fd', '2020-04-08 02:04:53', 'sigitsuryono25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

DROP TABLE IF EXISTS `tb_rating`;
CREATE TABLE `tb_rating` (
  `id` int(11) NOT NULL,
  `id_course` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rating` double NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_video`
--

DROP TABLE IF EXISTS `tb_video`;
CREATE TABLE `tb_video` (
  `id_video` varchar(100) NOT NULL,
  `video_title` varchar(200) NOT NULL,
  `upload_path` varchar(225) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `id_materi` varchar(225) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_video`
--

INSERT INTO `tb_video` (`id_video`, `video_title`, `upload_path`, `file_name`, `id_materi`, `created_on`, `added_by`) VALUES
('1e9d98d1-b516-4369-a8d8-5e98fb476b96', 'Intriduction', './assets/course/android-news-portal-apps-based-using-androidx/introduction/', 'introduction.mp4', 'de89b6a5-ffca-4aea-90f5-ff0c8eaffaf1', '2020-04-08 02:04:53', 'sigitsuryono25'),
('bd83cb25-13a7-4a0e-bfa4-b0a87872c8bf', 'Android Studio Instalation 1', './assets/course/android-news-portal-apps-based-using-androidx/android-studio-instalations/', 'android-studio-instalations-1.mp4', '5d1e6960-8e7c-41ce-a039-3ff121dc5037', '2020-04-08 03:40:18', 'sigitsuryono25'),
('cbb760a8-f539-4ce5-bc9b-c2d96f03c357', 'Android Studio Instalation 2', './assets/course/android-news-portal-apps-based-using-androidx/android-studio-instalations/', 'android-studio-instalations-2.mp4', '5d1e6960-8e7c-41ce-a039-3ff121dc5037', '2020-04-08 03:40:19', 'sigitsuryono25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD KEY `id_materi` (`id_materi`);

--
-- Indexes for table `tb_course`
--
ALTER TABLE `tb_course`
  ADD PRIMARY KEY (`id_course`);

--
-- Indexes for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD PRIMARY KEY (`id_materi`),
  ADD KEY `tb_materi_ibfk_1` (`id_course`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`id_course`);

--
-- Indexes for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD PRIMARY KEY (`id_video`),
  ADD KEY `id_materi` (`id_materi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rating`
--
ALTER TABLE `tb_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_materi`
--
ALTER TABLE `tb_materi`
  ADD CONSTRAINT `tb_materi_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_course`) REFERENCES `tb_course` (`id_course`);

--
-- Constraints for table `tb_video`
--
ALTER TABLE `tb_video`
  ADD CONSTRAINT `tb_video_ibfk_1` FOREIGN KEY (`id_materi`) REFERENCES `tb_materi` (`id_materi`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
