-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 01, 2019 at 02:56 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siast`
--

-- --------------------------------------------------------

--
-- Table structure for table `form_nilai`
--

CREATE TABLE `form_nilai` (
  `id` int(10) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `tanggal` date NOT NULL,
  `id_mapel_lokal` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_nilai`
--

INSERT INTO `form_nilai` (`id`, `judul`, `tanggal`, `id_mapel_lokal`) VALUES
(1, 'UH1', '2017-09-27', 1),
(2, 'UH1', '2017-09-27', 2),
(3, 'UH1', '2017-09-27', 3),
(4, 'Momentum', '2017-09-27', 1),
(5, 'Momentum', '2017-09-27', 2),
(6, 'Momentum', '2017-09-27', 3),
(7, 'UTS', '2017-09-27', 1),
(8, 'UTS', '2017-09-27', 2),
(9, 'UTS', '2017-09-27', 3),
(10, 'Stokiometri', '2017-09-27', 4),
(11, 'Stokiometri', '2017-09-27', 5),
(12, 'Stokiometri', '2017-09-27', 6),
(13, 'Reaksi Berlebihan', '2017-09-27', 4),
(14, 'Reaksi Berlebihan', '2017-09-27', 5),
(15, 'Reaksi Berlebihan', '2017-09-27', 6),
(16, 'Taksonomi', '2017-09-27', 7),
(17, 'Taksonomi', '2017-09-27', 8),
(18, 'Taksonomi', '2017-09-27', 9),
(20, 'Ekonomi Mikro', '2017-10-05', 19),
(21, 'Sejarah Kelam', '2017-10-05', 22),
(22, 'Sejarah Kita', '2017-10-05', 22);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `jenis_kelamin` int(10) NOT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` int(1) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `no_telepon`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `id_user`, `status`) VALUES
(1, '94659374', 'Eriyanti', NULL, 2, NULL, '2008-11-04', NULL, 2, 1),
(2, '18384468', 'Tiara Namaga', NULL, 2, NULL, '2001-01-25', NULL, 3, 1),
(3, '48135186', 'Vicky Simbolon', NULL, 2, NULL, '2015-02-28', NULL, 4, 1),
(4, '98415208', 'Natalia Andriani', NULL, 2, NULL, '1980-02-28', NULL, 5, 1),
(5, '92746593', 'Jaga Prasasta', NULL, 2, NULL, '1987-01-08', NULL, 6, 1),
(6, '34691112', 'Warsa Hastuti', NULL, 2, NULL, '2000-10-23', NULL, 7, 1),
(7, '39189049', 'Bakiono Dongoran', NULL, 2, NULL, '2015-08-20', NULL, 8, 1),
(8, '42008655', 'Tari Utami', NULL, 1, NULL, '2011-12-07', NULL, 9, 1),
(9, '87785484', 'Tira Padmasari', NULL, 1, NULL, '1974-07-25', NULL, 10, 1),
(10, '47408218', 'Rahayu Narpati', NULL, 2, NULL, '1987-03-06', NULL, 11, 1),
(11, '66038011', 'Ozy Prastuti', NULL, 1, NULL, '1984-08-31', NULL, 12, 1),
(12, '60792146', 'Maya Fujiati', NULL, 1, NULL, '1986-01-18', NULL, 13, 1),
(13, '10208748', 'Endah Riyanti', NULL, 1, NULL, '2004-01-21', NULL, 14, 1),
(14, '25358071', 'Latif Nasyidah', NULL, 2, NULL, '2000-10-16', NULL, 15, 1),
(15, '21362058', 'Koko Winarsih', NULL, 1, NULL, '1976-02-01', NULL, 16, 1),
(16, '57115916', 'Gasti Puspasari', NULL, 1, NULL, '1984-04-18', NULL, 17, 1),
(17, '29303660', 'Paiman Latupono', NULL, 2, NULL, '2012-05-16', NULL, 18, 1),
(18, '17832865', 'Cawisadi Farida', NULL, 1, NULL, '2004-04-03', NULL, 19, 1),
(19, '2720922', 'Ciaobella Kusmawati', NULL, 1, NULL, '2007-02-05', NULL, 20, 1),
(20, '22984434', 'Mitra Mulyani', NULL, 1, NULL, '1975-08-15', NULL, 21, 1),
(21, '004', 'Aryanto', '+6282286214600', 1, 'teluk kuantan', '1994-04-04', 2, 87, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `komentar_materi`
--

CREATE TABLE `komentar_materi` (
  `id` int(11) NOT NULL,
  `users_id` int(10) NOT NULL,
  `komentar` text NOT NULL,
  `materi_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar_materi`
--

INSERT INTO `komentar_materi` (`id`, `users_id`, `komentar`, `materi_id`) VALUES
(1, 32, 'oke buu', 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokal`
--

CREATE TABLE `lokal` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `semester` int(10) NOT NULL,
  `guru_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokal`
--

INSERT INTO `lokal` (`id`, `nama`, `id_kelas`, `ta`, `semester`, `guru_id`) VALUES
(1, 'MIPA 1', 1, '2017/2018', 1, 1),
(2, 'MIPA 1', 1, '2017/2018', 2, 1),
(3, 'MIPA 2', 1, '2017/2018', 1, 2),
(4, 'MIPA 2', 1, '2017/2018', 2, 2),
(5, 'MIPA 3', 1, '2017/2018', 1, 4),
(6, 'MIPA 3', 1, '2017/2018', 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `mapel_lokal_guru`
--

CREATE TABLE `mapel_lokal_guru` (
  `id` int(10) NOT NULL,
  `id_lokal` int(10) NOT NULL,
  `guru_id` int(10) NOT NULL,
  `mapel_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel_lokal_guru`
--

INSERT INTO `mapel_lokal_guru` (`id`, `id_lokal`, `guru_id`, `mapel_id`) VALUES
(1, 1, 1, 1),
(2, 3, 1, 1),
(3, 5, 1, 1),
(4, 1, 2, 2),
(5, 3, 2, 2),
(6, 5, 2, 2),
(7, 1, 19, 3),
(8, 3, 19, 3),
(9, 5, 19, 3),
(10, 1, 7, 4),
(11, 3, 7, 4),
(12, 5, 7, 4),
(13, 1, 4, 5),
(14, 3, 4, 5),
(15, 5, 4, 5),
(16, 1, 13, 6),
(17, 3, 13, 6),
(18, 5, 13, 6),
(19, 1, 15, 7),
(20, 3, 15, 7),
(21, 5, 15, 7),
(22, 1, 15, 8),
(23, 3, 15, 8),
(24, 5, 15, 8),
(25, 1, 5, 9),
(26, 3, 5, 9),
(27, 5, 5, 9),
(28, 1, 6, 11),
(29, 3, 6, 11),
(30, 5, 6, 11),
(31, 2, 1, 1),
(32, 2, 11, 2),
(33, 2, 18, 3);

-- --------------------------------------------------------

--
-- Table structure for table `matapelajaran`
--

CREATE TABLE `matapelajaran` (
  `id` int(10) NOT NULL,
  `nama` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matapelajaran`
--

INSERT INTO `matapelajaran` (`id`, `nama`) VALUES
(1, 'Fisika'),
(2, 'Kimia'),
(3, 'Biologi'),
(4, 'Matematika'),
(5, 'Bahasa Indonesia'),
(6, 'Bahasa Inggris'),
(7, 'Ekonomi'),
(8, 'Sejarah'),
(9, 'Geografi'),
(10, 'Bahasa Arab'),
(11, 'Bahsa Jerman');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(10) NOT NULL,
  `nilai` float DEFAULT NULL,
  `siswa_id` int(10) NOT NULL,
  `id_form_nilai` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `nilai`, `siswa_id`, `id_form_nilai`) VALUES
(1, 98, 1, 1),
(2, 88, 2, 1),
(3, 91.75, 3, 1),
(4, 69, 4, 1),
(5, 98, 5, 1),
(6, 87, 6, 1),
(7, 81, 7, 1),
(8, 81, 8, 1),
(9, 79, 9, 1),
(10, 80, 10, 1),
(11, 89, 11, 1),
(12, 87, 12, 1),
(13, 90, 13, 1),
(14, 88, 14, 1),
(15, 96, 15, 1),
(16, 77, 16, 1),
(17, 88, 17, 1),
(18, 89.57, 18, 1),
(19, 90, 19, 1),
(20, 75, 20, 1),
(21, 67, 21, 2),
(22, 79, 22, 2),
(23, 50, 23, 2),
(24, 67, 24, 2),
(25, 69, 25, 2),
(26, 79, 26, 2),
(27, 89, 27, 2),
(28, 90, 28, 2),
(29, 91, 29, 2),
(30, 97, 30, 2),
(31, 75, 31, 2),
(32, 68, 32, 2),
(33, 78, 33, 2),
(34, 78, 34, 2),
(35, 76, 35, 2),
(36, 77, 36, 2),
(37, 78, 37, 2),
(38, 69, 38, 2),
(39, 69, 39, 2),
(40, 50, 40, 2),
(41, 92, 41, 3),
(42, 96, 42, 3),
(43, 80, 43, 3),
(44, 84, 44, 3),
(45, 87, 45, 3),
(46, 85, 46, 3),
(47, 86, 47, 3),
(48, 89, 48, 3),
(49, 89, 49, 3),
(50, 89, 50, 3),
(51, 90, 51, 3),
(52, 92, 52, 3),
(53, 90, 53, 3),
(54, 90, 54, 3),
(55, 90, 55, 3),
(56, 90, 56, 3),
(57, 95, 57, 3),
(58, 92, 58, 3),
(59, 92, 59, 3),
(60, 80, 60, 3),
(61, 89, 1, 4),
(62, 79, 2, 4),
(63, 85, 3, 4),
(64, 86, 4, 4),
(65, 88, 5, 4),
(66, 70, 6, 4),
(67, 69, 7, 4),
(68, 65, 8, 4),
(69, 69, 9, 4),
(70, 71, 10, 4),
(71, 98, 11, 4),
(72, 89, 12, 4),
(73, 89, 13, 4),
(74, 80, 14, 4),
(75, 80, 15, 4),
(76, 80, 16, 4),
(77, 82, 17, 4),
(78, 82, 18, 4),
(79, 89, 19, 4),
(80, 87, 20, 4),
(81, 89, 21, 5),
(82, 65, 22, 5),
(83, 78, 23, 5),
(84, 87, 24, 5),
(85, 78, 25, 5),
(86, 89, 26, 5),
(87, 65, 27, 5),
(88, 68, 28, 5),
(89, 76, 29, 5),
(90, 89, 30, 5),
(91, 67, 31, 5),
(92, 87, 32, 5),
(93, 97, 33, 5),
(94, 79, 34, 5),
(95, 65, 35, 5),
(96, 89, 36, 5),
(97, 65, 37, 5),
(98, 89, 38, 5),
(99, 96, 39, 5),
(100, 64, 40, 5),
(101, 69, 41, 6),
(102, 65, 42, 6),
(103, 86, 43, 6),
(104, 88, 44, 6),
(105, 86, 45, 6),
(106, 66, 46, 6),
(107, 87, 47, 6),
(108, 46, 48, 6),
(109, 76, 49, 6),
(110, 79, 50, 6),
(111, 87, 51, 6),
(112, 69, 52, 6),
(113, 68, 53, 6),
(114, 65, 54, 6),
(115, 78, 55, 6),
(116, 65, 56, 6),
(117, 97, 57, 6),
(118, 97, 58, 6),
(119, 67, 59, 6),
(120, 55, 60, 6),
(121, 78, 1, 7),
(122, 78, 2, 7),
(123, 67, 3, 7),
(124, 65, 4, 7),
(125, 78, 5, 7),
(126, 55, 6, 7),
(127, 96, 7, 7),
(128, 79, 8, 7),
(129, 89, 9, 7),
(130, 68, 10, 7),
(131, 98.75, 11, 7),
(132, 78, 12, 7),
(133, 98, 13, 7),
(134, 78, 14, 7),
(135, 65, 15, 7),
(136, 87, 16, 7),
(137, 88, 17, 7),
(138, 59, 18, 7),
(139, 76, 19, 7),
(140, 87, 20, 7),
(141, 76, 21, 8),
(142, 78, 22, 8),
(143, 87, 23, 8),
(144, 87, 24, 8),
(145, 88, 25, 8),
(146, 88, 26, 8),
(147, 79, 27, 8),
(148, 75, 28, 8),
(149, 75, 29, 8),
(150, 75, 30, 8),
(151, 78, 31, 8),
(152, 76, 32, 8),
(153, 78, 33, 8),
(154, 76, 34, 8),
(155, 76, 35, 8),
(156, 76, 36, 8),
(157, 76, 37, 8),
(158, 76, 38, 8),
(159, 76, 39, 8),
(160, 86, 40, 8),
(161, 89, 41, 9),
(162, 88, 42, 9),
(163, 85, 43, 9),
(164, 80, 44, 9),
(165, 79, 45, 9),
(166, 76, 46, 9),
(167, 75, 47, 9),
(168, 76, 48, 9),
(169, 88, 49, 9),
(170, 88, 50, 9),
(171, 89, 51, 9),
(172, 87, 52, 9),
(173, 89, 53, 9),
(174, 97, 54, 9),
(175, 96, 55, 9),
(176, 95, 56, 9),
(177, 92, 57, 9),
(178, 86, 58, 9),
(179, 86, 59, 9),
(180, 85, 60, 9),
(181, 98, 1, 10),
(182, 95, 2, 10),
(183, 85, 3, 10),
(184, 85, 4, 10),
(185, 88, 5, 10),
(186, 88, 6, 10),
(187, 86, 7, 10),
(188, 86, 8, 10),
(189, 94, 9, 10),
(190, 94, 10, 10),
(191, 95, 11, 10),
(192, 98, 12, 10),
(193, 95, 13, 10),
(194, 96, 14, 10),
(195, 96, 15, 10),
(196, 97, 16, 10),
(197, 97, 17, 10),
(198, 97, 18, 10),
(199, 98, 19, 10),
(200, 85, 20, 10),
(201, 76, 21, 11),
(202, 89, 22, 11),
(203, 84, 23, 11),
(204, 79, 24, 11),
(205, 91, 25, 11),
(206, 92, 26, 11),
(207, 90, 27, 11),
(208, 95, 28, 11),
(209, 98, 29, 11),
(210, 99, 30, 11),
(211, 88, 31, 11),
(212, 67, 32, 11),
(213, 87, 33, 11),
(214, 87, 34, 11),
(215, 78, 35, 11),
(216, 76, 36, 11),
(217, 78, 37, 11),
(218, 74, 38, 11),
(219, 75, 39, 11),
(220, 100, 40, 11),
(221, 88, 41, 12),
(222, 76, 42, 12),
(223, 78, 43, 12),
(224, 78, 44, 12),
(225, 73, 45, 12),
(226, 73, 46, 12),
(227, 74, 47, 12),
(228, 74, 48, 12),
(229, 75, 49, 12),
(230, 75, 50, 12),
(231, 76, 51, 12),
(232, 88, 52, 12),
(233, 90, 53, 12),
(234, 90, 54, 12),
(235, 86, 55, 12),
(236, 86, 56, 12),
(237, 89, 57, 12),
(238, 87, 58, 12),
(239, 87, 59, 12),
(240, 78, 60, 12),
(241, 100, 1, 13),
(242, 90, 2, 13),
(243, 80, 3, 13),
(244, 81, 4, 13),
(245, 84, 5, 13),
(246, 86, 6, 13),
(247, 86, 7, 13),
(248, 85, 8, 13),
(249, 85, 9, 13),
(250, 87, 10, 13),
(251, 100, 11, 13),
(252, 98, 12, 13),
(253, 94, 13, 13),
(254, 94, 14, 13),
(255, 95, 15, 13),
(256, 96, 16, 13),
(257, 96, 17, 13),
(258, 98, 18, 13),
(259, 98, 19, 13),
(260, 79, 20, 13),
(261, 87, 21, 14),
(262, 81, 22, 14),
(263, 96, 23, 14),
(264, 97, 24, 14),
(265, 69, 25, 14),
(266, 70, 26, 14),
(267, 76, 27, 14),
(268, 75, 28, 14),
(269, 79, 29, 14),
(270, 79, 30, 14),
(271, 82, 31, 14),
(272, 87, 32, 14),
(273, 83, 33, 14),
(274, 84, 34, 14),
(275, 82, 35, 14),
(276, 89, 36, 14),
(277, 88, 37, 14),
(278, 88, 38, 14),
(279, 87, 39, 14),
(280, 94, 40, 14),
(281, 100, 41, 15),
(282, 98, 42, 15),
(283, 94, 43, 15),
(284, 94, 44, 15),
(285, 94, 45, 15),
(286, 94, 46, 15),
(287, 91, 47, 15),
(288, 91, 48, 15),
(289, 91, 49, 15),
(290, 92, 50, 15),
(291, 98, 51, 15),
(292, 100, 52, 15),
(293, 95, 53, 15),
(294, 95, 54, 15),
(295, 95, 55, 15),
(296, 95, 56, 15),
(297, 95, 57, 15),
(298, 100, 58, 15),
(299, 100, 59, 15),
(300, 98, 60, 15),
(301, 85, 1, 16),
(302, 88, 2, 16),
(303, 76, 3, 16),
(304, 75, 4, 16),
(305, 78, 5, 16),
(306, 91, 6, 16),
(307, 89, 7, 16),
(308, 84, 8, 16),
(309, 85, 9, 16),
(310, 87, 10, 16),
(311, 89, 11, 16),
(312, 86, 12, 16),
(313, 92, 13, 16),
(314, 91, 14, 16),
(315, 95, 15, 16),
(316, 90, 16, 16),
(317, 89, 17, 16),
(318, 88, 18, 16),
(319, 87, 19, 16),
(320, 77, 20, 16),
(321, 0, 21, 17),
(322, 0, 22, 17),
(323, 0, 23, 17),
(324, 0, 24, 17),
(325, 0, 25, 17),
(326, 0, 26, 17),
(327, 0, 27, 17),
(328, 0, 28, 17),
(329, 0, 29, 17),
(330, 0, 30, 17),
(331, 0, 31, 17),
(332, 0, 32, 17),
(333, 0, 33, 17),
(334, 0, 34, 17),
(335, 0, 35, 17),
(336, 0, 36, 17),
(337, 0, 37, 17),
(338, 0, 38, 17),
(339, 0, 39, 17),
(340, 0, 40, 17),
(341, 0, 41, 18),
(342, 0, 42, 18),
(343, 0, 43, 18),
(344, 0, 44, 18),
(345, 0, 45, 18),
(346, 0, 46, 18),
(347, 0, 47, 18),
(348, 0, 48, 18),
(349, 0, 49, 18),
(350, 0, 50, 18),
(351, 0, 51, 18),
(352, 0, 52, 18),
(353, 0, 53, 18),
(354, 0, 54, 18),
(355, 0, 55, 18),
(356, 0, 56, 18),
(357, 0, 57, 18),
(358, 0, 58, 18),
(359, 0, 59, 18),
(360, 0, 60, 18),
(361, 85, 1, 20),
(362, 85, 2, 20),
(363, 85, 3, 20),
(364, 92, 4, 20),
(365, 85, 5, 20),
(366, 85, 6, 20),
(367, 85, 7, 20),
(368, 85, 8, 20),
(369, 85, 9, 20),
(370, 90, 10, 20),
(371, 89, 11, 20),
(372, 78, 12, 20),
(373, 78, 13, 20),
(374, 76, 14, 20),
(375, 77, 15, 20),
(376, 79, 16, 20),
(377, 87, 17, 20),
(378, 94, 18, 20),
(379, 88, 19, 20),
(380, 86, 20, 20),
(381, 90, 1, 21),
(382, 90, 2, 21),
(383, 90, 3, 21),
(384, 94, 4, 21),
(385, 90, 5, 21),
(386, 90, 6, 21),
(387, 90, 7, 21),
(388, 90, 8, 21),
(389, 90, 9, 21),
(390, 94, 10, 21),
(391, 100, 11, 21),
(392, 100, 12, 21),
(393, 100, 13, 21),
(394, 100, 14, 21),
(395, 100, 15, 21),
(396, 94, 16, 21),
(397, 94, 17, 21),
(398, 94, 18, 21),
(399, 94, 19, 21),
(400, 94, 20, 21),
(401, 94, 1, 22),
(402, 84, 2, 22),
(403, 82, 3, 22),
(404, 80, 4, 22),
(405, 85, 5, 22),
(406, 68, 6, 22),
(407, 90, 7, 22),
(408, 79, 8, 22),
(409, 69, 9, 22),
(410, 88, 10, 22),
(411, 86, 11, 22),
(412, 87, 12, 22),
(413, 86, 13, 22),
(414, 85, 14, 22),
(415, 80, 15, 22),
(416, 88, 16, 22),
(417, 89, 17, 22),
(418, 79, 18, 22),
(419, 79, 19, 22),
(420, 78, 20, 22);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_id`, `notifiable_type`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('aed6d500-98ca-4bb2-8599-42621e679ab0', 'SIAStar\\Notifications\\Notifikasi', 1, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('fc0220f2-c0a4-409d-9c14-c77aa0859f9b', 'SIAStar\\Notifications\\Notifikasi', 2, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('a5e3278c-d129-403d-bf9b-5d5979056c73', 'SIAStar\\Notifications\\Notifikasi', 3, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('da6ecfa2-60e7-4633-b0c4-7d8f800f01e6', 'SIAStar\\Notifications\\Notifikasi', 4, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('41f0a80c-cca8-4a3c-be24-b39c5c750d04', 'SIAStar\\Notifications\\Notifikasi', 5, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', '2017-11-01 08:23:16', '2017-10-02 02:35:43', '2017-11-01 08:23:16'),
('4142bc57-3181-4b99-ae11-1d7a2fb082ac', 'SIAStar\\Notifications\\Notifikasi', 6, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('59dcb95e-f5e0-4a4a-8f98-9cc3590ef68a', 'SIAStar\\Notifications\\Notifikasi', 7, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('97ceee28-0bbe-4816-bf02-e63d7a583358', 'SIAStar\\Notifications\\Notifikasi', 8, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('92e2efa1-17d6-4f5e-af4b-5d19c047be02', 'SIAStar\\Notifications\\Notifikasi', 9, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('52aedc84-7c87-4973-8dcf-dbe38854f670', 'SIAStar\\Notifications\\Notifikasi', 10, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('4146f4c0-d20c-4ac6-8a82-dea2eb94105b', 'SIAStar\\Notifications\\Notifikasi', 11, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', '2017-10-02 02:36:01', '2017-10-02 02:35:43', '2017-10-02 02:36:01'),
('723d09f7-b713-4b7f-9796-44c956c2e0dc', 'SIAStar\\Notifications\\Notifikasi', 12, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('e5e0bbbe-da5b-4d6b-a665-fceb462c42c1', 'SIAStar\\Notifications\\Notifikasi', 13, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('8ba8552e-a72c-4df0-8e01-1d2c7900a369', 'SIAStar\\Notifications\\Notifikasi', 14, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('519178c4-82bf-48d9-9d7f-fafd15fbc2d6', 'SIAStar\\Notifications\\Notifikasi', 15, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('ca82bf72-9691-4514-ac85-1e9aea0981c9', 'SIAStar\\Notifications\\Notifikasi', 16, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('5e2e97a2-a928-47f6-8999-11976b8d8069', 'SIAStar\\Notifications\\Notifikasi', 17, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('de716a8c-4d73-4ab5-bf50-55de48a55436', 'SIAStar\\Notifications\\Notifikasi', 18, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('f0d7b824-4209-4689-9b52-c07cdae4569e', 'SIAStar\\Notifications\\Notifikasi', 19, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('fe0b4a49-418c-4386-a517-8ec802b53b81', 'SIAStar\\Notifications\\Notifikasi', 20, 'SIAStar\\Siswa', '{\"pesan\":\"Ciaobella Kusmawati mempublikasikan materi baru \\\"Tumbuhan\\\"\",\"link\":\"elearning\\/1\"}', NULL, '2017-10-02 02:35:43', '2017-10-02 02:35:43'),
('a1bb0b6f-ddf1-4dd9-8732-302cb962abc1', 'SIAStar\\Notifications\\Notifikasi', 19, 'SIAStar\\Guru', '{\"pesan\":\"Agnes Yolanda mengomentari postingan anda\",\"link\":\"elearning\\/1#komentar1\"}', '2017-10-02 02:38:38', '2017-10-02 02:38:17', '2017-10-02 02:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('03288a85cd24672ed7c0df768cbdd072a41aceb4eb475f29cea07d13c6dc200c616c61e86ad1abe9', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 22:06:37', '2017-09-29 22:06:37', '2018-09-30 05:06:37'),
('0713004e3c0a3b8ea4053d8106027a82a1b26674eae1d12a8ea1181661362dbb1e889013d3d0d142', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-30 00:17:39', '2017-09-30 00:17:39', '2018-09-30 07:17:39'),
('2437094258c47786b111b60882d8af5ff5675d73655b9c6c99690e406e7bad353e530f1ab76fd245', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 00:06:52', '2017-09-29 00:06:52', '2018-09-29 07:06:52'),
('32f67e36f4cc58f4aebc37d83f99cfa92af4187b888e5a5391f7c98c69fe16bd0fa755c384cf7135', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 22:28:49', '2017-09-28 22:28:49', '2018-09-29 05:28:49'),
('38a40b4d5e3708ab611b2289634595979dc17147db83deb338b097fbb850aecfec76c132c79ec630', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 22:19:07', '2017-09-29 22:19:07', '2018-09-30 05:19:07'),
('3b53bce805f0b3574886358f561bc65d2c343d153744aafcca4fc9b2aca60cf5baf79e956f1230ef', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 21:03:19', '2017-09-28 21:03:19', '2018-09-29 04:03:19'),
('424897a2770cad519ab1f0d74c2593918bccff633e9486988d11c00a24b19718813ec30830dbb2bd', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 11:42:28', '2017-09-28 11:42:28', '2018-09-28 18:42:28'),
('43388189d8b176a47135283d3848b64259fae0710f4989a549963dba249cb82450d76406efec355e', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-09-27 19:50:35', '2017-09-27 19:50:35', '2018-09-28 02:50:35'),
('438a12a020d466433ec1cbf8a2d735a15c78cd559ef669bbe07f275759f5de8ceed50ed2081af4ce', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 22:14:16', '2017-09-29 22:14:16', '2018-09-30 05:14:16'),
('50063526408ea3c3f720030ac2f71f09a4b4078b48fca804869938a91b4116d1f66ca7cd067cf958', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 21:39:06', '2017-09-28 21:39:06', '2018-09-29 04:39:06'),
('5b4325d5d0d2a8424c6138c5df1ae4175232120a4ef296881b5babd4a235af9722e786d1fb580003', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 00:42:07', '2017-09-29 00:42:07', '2018-09-29 07:42:07'),
('648178a897e0f414792911be4e47967b64124c5a2fe454dc2073be247cd37efcda86377dd359d4c0', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 21:44:17', '2017-09-29 21:44:17', '2018-09-30 04:44:17'),
('75686a3369e2a60c25bbbcf7e688222010ff09262e82e52055ee14cab1d8201f11e221fb7b72ba68', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 05:55:20', '2017-09-29 05:55:20', '2018-09-29 12:55:20'),
('8e227c12cd75473a7cde4ba68f29850a22babe267fceaf7f53e8ff70de7d269135adb90709dbaa84', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 21:50:54', '2017-09-29 21:50:54', '2018-09-30 04:50:54'),
('915500802d33ea8eb3e7cd5b6149c270edfe0409f468bb354ae9c8e989545f77852ff93e44065089', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 21:59:17', '2017-09-29 21:59:17', '2018-09-30 04:59:17'),
('917348d7e1624af224cf00ae3dbb5c1dc28b3da0164086aba00efbefbd7bba3e11ab8a875b03af02', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 21:45:27', '2017-09-29 21:45:27', '2018-09-30 04:45:27'),
('939941d327103033bc0650ac20d3eb879b878c70fca0d004fb1815cd421010f778c4a14382b6ee01', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 21:03:19', '2017-09-28 21:03:19', '2018-09-29 04:03:19'),
('9cca32472ee15be53792f3e6334b0c93f75c6dd5be3d0cb79e8a013316aa891b4a50be4120cd078c', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-09-27 21:26:07', '2017-09-27 21:26:07', '2018-09-28 04:26:07'),
('a1f04bd85e58666542e6d2ff1cd8dd6c1c20faf79b1a834a0cd5f21faa0bdd0a48ce524882b2830d', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 01:31:24', '2017-09-29 01:31:24', '2018-09-29 08:31:24'),
('a8cc42609e02caf0201bcc7b971ec34e9849fe8ee016f4e7f1078a1718eed3547bbced5cc095b7fc', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 23:23:58', '2017-09-29 23:23:58', '2018-09-30 06:23:58'),
('abda36dd06ff3cccecad95cfa4d63d7b9b30588fc5067e5c6e3013814ad2e269a79302bdba23b133', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 11:39:18', '2017-09-28 11:39:18', '2018-09-28 18:39:18'),
('b23a61f09cec2f7f9c04f7905ea63120ae78d1c39112b4c07cf2948ed881be50014a7c72671d995f', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 21:44:17', '2017-09-29 21:44:17', '2018-09-30 04:44:17'),
('baebc4f43d7e8c9ec574d9e12615a2062b040d6de04609195bfd5a0b8961ecb11b53cd8627fe1ab2', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 21:35:43', '2017-09-28 21:35:43', '2018-09-29 04:35:43'),
('bb586d69930cd0d81b2c7b89d8a7bb31cef12e34e47aaa9b6dae1fa68cbb9e48e0f7fce3ea37b6e0', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-27 19:47:28', '2017-09-27 19:47:28', '2018-09-28 02:47:28'),
('bb5a1391a89c9b76cc852ea8a5ad4a544f97ee80b50850e5141ea3818f9aac51b4d6d198658356a8', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-27 19:48:01', '2017-09-27 19:48:01', '2018-09-28 02:48:01'),
('bc29a3214833a0160d03ca4d9c1604a2ae67c7d1b5802041f23efffaa9e8071dea2530c3a93fc1ef', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 01:03:13', '2017-09-29 01:03:13', '2018-09-29 08:03:13'),
('bedc8a8204379fc1f1111d0c8db01e097220ef2624c2d0ef6340027251383d3959ab14583acc121f', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 23:35:06', '2017-09-29 23:35:06', '2018-09-30 06:35:06'),
('c2e2b12e145a2d503b5ff89f48b8d0753112147d618796f8826e099ef7c5185c08f16764b8e2b47d', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 21:13:23', '2017-09-28 21:13:23', '2018-09-29 04:13:23'),
('d9bfe8084154a44f0809feec93f4603988ac2656d09e477fe3acc3babedbe767f5407a3733f9d675', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 22:37:19', '2017-09-28 22:37:19', '2018-09-29 05:37:19'),
('dff4e02d8bc4f73b92384df60e960607c338ec07387e0776c85c3c2fae8ec4f5b46e07a22547b17d', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-28 22:54:44', '2017-09-28 22:54:44', '2018-09-29 05:54:44'),
('f5d7971c39561f112693afba2f086d6fbc8e2abac234e7fff1d9d8bccc1b120a776fe1a7f55b893b', 1, 1, 'SIAStar Mobile', '[]', 0, '2017-09-29 00:13:14', '2017-09-29 00:13:14', '2018-09-29 07:13:14'),
('99881d1427bdfaf330bc87fc4aca5d053be7cf5a026a092f47569ad56501428657d73432d922b5b6', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-02 02:45:07', '2017-10-02 02:45:07', '2018-10-02 02:45:07'),
('63b603645200e38db9699f18f77b191cfab7e3541751825aa631e76c95f2adc06d5b3a060db3fcb9', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-10 07:09:36', '2017-10-10 07:09:36', '2018-10-10 07:09:36'),
('59109461bcf175309d2cf48f7787648528478b512bc35632284604febda6f4b0cd73a5f1edf791f2', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 05:00:19', '2017-10-11 05:00:19', '2018-10-11 05:00:19'),
('49673fc46a52aee0c2008203ad93c3a462d40ac7104d235c80d46de4827c7e18de01a02f10496b67', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 05:48:33', '2017-10-11 05:48:33', '2018-10-11 05:48:33'),
('e0a88a4f8be855db8963e1f21b4706eb54d10c82bb22956f4b495ebdd60203d032e8c18fa3043904', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 06:46:02', '2017-10-11 06:46:02', '2018-10-11 06:46:02'),
('689b7b2f3f4fd3b8722fa2e265f642801cd874e67dec942abaff3f42c7dae6b49bfc73d34370d12c', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 06:52:59', '2017-10-11 06:52:59', '2018-10-11 06:52:59'),
('be25cd5a7eaa8751f21bb02d9f07527b19bc6c01bc76167fef05d355481a64e35c2ab409e84d584d', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 07:19:33', '2017-10-11 07:19:33', '2018-10-11 07:19:33'),
('a8137fc3e878f40ebd679c869a15f0491ae2c2d13c58baf28454c085d4407dbb3fa6d258f8c1c48b', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 07:22:03', '2017-10-11 07:22:03', '2018-10-11 07:22:03'),
('d7c8cc9b72ffa94b967b81a0d10b69b25f0b1733b608669bda9765b50e8b0152b243acd0ebae63b2', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 07:33:41', '2017-10-11 07:33:41', '2018-10-11 07:33:41'),
('cd57991913b69e30a91b00baeff85788dca31405cc82781cde6fc861bfed477cbf7a328e566b7cad', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-10-11 07:46:15', '2017-10-11 07:46:15', '2018-10-11 07:46:15'),
('6911b00f0b63bb2148af885fff632eb5df73fe590ead8149dd170f6b475b14941e64c4497c53a67a', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-11-29 15:42:44', '2017-11-29 15:42:44', '2018-11-29 15:42:44'),
('16cc736daff6c7b103d9556d836a58d9c1f767b50fd20c8aec0d8217cdc8e2e794de375a5db95bbc', 82, 1, 'SIAStar Mobile', '[]', 0, '2017-11-29 15:42:56', '2017-11-29 15:42:56', '2018-11-29 15:42:56'),
('b5fbbb476fdd9977199e17844c527327c752a1efd32d903dd123bd6637d385ad53fbcf56b69881e2', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:18:42', '2018-01-17 04:18:42', '2019-01-17 04:18:42'),
('b4ec6c4706f2d9f1a76c5b50717b78a222fcbd418ccf69d5eedcbc1a5fa4516b3cc9d2f3f06e272f', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:20:49', '2018-01-17 04:20:49', '2019-01-17 04:20:49'),
('2ee0d6aee5124da179014f6954c3115727e1a9fe9de33c325321d597b791b9cd85316d605b1d92cf', 1, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:21:49', '2018-01-17 04:21:49', '2019-01-17 04:21:49'),
('89fb9ae9383478bdf6cdc04a77f7cb1b96ab9a0fd56c5657327ad96932b249b28437988e1a533859', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:31:14', '2018-01-17 04:31:14', '2019-01-17 04:31:14'),
('d9f4cc8a94f1fdc425c8fdd479b6e1a1ee8072930df5250060bfbd29fcf90975ea4262c4939c839e', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:39:20', '2018-01-17 04:39:20', '2019-01-17 04:39:20'),
('74f3b48ee6b28a98b2d0f8c73f746c1b800d4f2851d435b7f3326906c68b2f396222ef66b4678aa2', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-01-17 04:41:28', '2018-01-17 04:41:28', '2019-01-17 04:41:28'),
('419d4d4c9c784144fb5881a34fde773b9ad53c452d40db9647c38ed58d5ec3c618a67b2a4c2b2902', 82, 1, 'SIAStar Mobile', '[]', 0, '2018-04-20 12:00:16', '2018-04-20 12:00:16', '2019-04-20 19:00:16');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '8vVFKZsgyzGqpddD5oT0qzHGiw0nPyDBZbO2YzXi', 'http://localhost', 1, 0, 0, '2017-09-27 19:47:19', '2017-09-27 19:47:19'),
(2, NULL, 'Laravel Password Grant Client', '2GxBOvYVWYmVrDVmbU7VKhJcwfgNY0j0kSJm8Avw', 'http://localhost', 0, 1, 0, '2017-09-27 19:47:19', '2017-09-27 19:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-09-27 19:47:19', '2017-09-27 19:47:19');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orang_tua`
--

INSERT INTO `orang_tua` (`id`, `nama`, `alamat`, `no_telepon`, `id_user`) VALUES
(1, 'Sukirman', 'Muara Langsat', '08136567887', 82),
(2, 'Matius Aryanto', 'Muara Langsat', '+6282286214600', 84);

-- --------------------------------------------------------

--
-- Table structure for table `post_kelas_online`
--

CREATE TABLE `post_kelas_online` (
  `id` int(10) NOT NULL,
  `id_mapel_lokal` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post_kelas_online`
--

INSERT INTO `post_kelas_online` (`id`, `id_mapel_lokal`, `tanggal`, `judul`, `isi`) VALUES
(1, 7, '2017-10-02', 'Tumbuhan', '<p>sana belajar yang rajin</p>');

-- --------------------------------------------------------

--
-- Table structure for table `reply_komen_materi`
--

CREATE TABLE `reply_komen_materi` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `komentar` text DEFAULT NULL,
  `komen_materi_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(32) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` int(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `agama` int(2) DEFAULT NULL,
  `status_dalam_keluarga` varchar(100) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `alamat` varchar(322) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `asal_sekolah` varchar(322) DEFAULT NULL,
  `kelas_awal` varchar(10) DEFAULT NULL,
  `tanggal_diterima` date DEFAULT NULL,
  `nama_ayah` varchar(32) DEFAULT NULL,
  `nama_ibu` varchar(32) DEFAULT NULL,
  `alamat_ortu` varchar(100) DEFAULT NULL,
  `telp_ortu` varchar(15) DEFAULT NULL,
  `pekerjaan_ayah` varchar(60) DEFAULT NULL,
  `pekerjaan_ibu` varchar(60) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `alamat_wali` varchar(100) NOT NULL,
  `pekerjaan_wali` varchar(100) NOT NULL,
  `telepon_wali` varchar(25) DEFAULT NULL,
  `id_user` int(10) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `id_ortu` int(11) DEFAULT NULL,
  `id_pa` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nisn`, `nama`, `jenis_kelamin`, `tempat_lahir`, `agama`, `status_dalam_keluarga`, `tgl_lahir`, `anak_ke`, `alamat`, `no_telp`, `asal_sekolah`, `kelas_awal`, `tanggal_diterima`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telp_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `nama_wali`, `alamat_wali`, `pekerjaan_wali`, `telepon_wali`, `id_user`, `status`, `id_ortu`, `id_pa`) VALUES
(1, '71429', NULL, 'Atma Mulyani', 2, NULL, NULL, NULL, '1989-07-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 22, 1, NULL, NULL),
(2, '22808', NULL, 'Almira Nasyidah', 1, NULL, NULL, NULL, '2007-01-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 23, 1, NULL, 1),
(3, '74199', NULL, 'Dina Kusumo', 2, NULL, NULL, NULL, '2008-02-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 24, 1, NULL, 1),
(4, '26322', NULL, 'Ulya Ramadan', 1, NULL, NULL, NULL, '1984-01-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 25, 1, 2, NULL),
(5, '44080', NULL, 'Jamil Hutapea', 2, NULL, NULL, NULL, '2017-05-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 26, 1, NULL, 1),
(6, '32943', NULL, 'Farhunnisa Novitasari', 2, NULL, NULL, NULL, '1983-07-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 27, 1, NULL, NULL),
(7, '18862', NULL, 'Titi Sitorus', 1, NULL, NULL, NULL, '2013-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 28, 1, NULL, 1),
(8, '77068', NULL, 'Queen Gunawan', 1, NULL, NULL, NULL, '2012-10-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 29, 1, NULL, NULL),
(9, '35555', NULL, 'Kemba Wijayanti', 2, NULL, NULL, NULL, '1986-03-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 30, 1, NULL, NULL),
(10, '41709', NULL, 'Safina Yolanda', 2, NULL, NULL, NULL, '2011-06-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 31, 1, NULL, NULL),
(11, '72592', NULL, 'Agnes Yolanda', 2, NULL, 2, NULL, '2017-06-30', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 32, 1, 1, 4),
(12, '90536', NULL, 'Taufik Saragih', 2, NULL, NULL, NULL, '1998-10-29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 33, 1, NULL, NULL),
(13, '19250', NULL, 'Asmuni Mandala', 1, NULL, NULL, NULL, '1981-09-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 34, 1, NULL, NULL),
(14, '33512', NULL, 'Kambali Hutapea', 1, NULL, NULL, NULL, '1986-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 35, 1, NULL, NULL),
(15, '40536', NULL, 'Purwa Rajasa', 2, NULL, NULL, NULL, '1978-12-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 36, 1, NULL, NULL),
(16, '26318', NULL, 'Shania Oktaviani', 1, NULL, NULL, NULL, '1992-12-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 37, 1, NULL, NULL),
(17, '94020', NULL, 'Elma Nugroho', 1, NULL, NULL, NULL, '2006-09-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 38, 1, NULL, NULL),
(18, '63258', NULL, 'Dadi Narpati', 1, NULL, NULL, NULL, '1982-08-04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 39, 1, NULL, 1),
(19, '89048', NULL, 'Cahya Sihotang', 2, NULL, NULL, NULL, '1977-09-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 40, 1, NULL, NULL),
(20, '64951', NULL, 'Daru Hariyah', 2, NULL, NULL, NULL, '2012-12-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 41, 1, NULL, NULL),
(21, '23385', NULL, 'Wirda Andriani', 1, NULL, NULL, NULL, '2011-01-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 42, 1, NULL, NULL),
(22, '83377', NULL, 'Elvina Zulaika', 1, NULL, NULL, NULL, '1989-08-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 43, 1, NULL, NULL),
(23, '89587', NULL, 'Limar Pradipta', 1, NULL, NULL, NULL, '1976-11-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 44, 1, NULL, NULL),
(24, '90426', NULL, 'Yusuf Sihombing', 2, NULL, NULL, NULL, '2000-11-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 45, 1, NULL, NULL),
(25, '20925', NULL, 'Kamila Wastuti', 2, NULL, NULL, NULL, '1996-06-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 46, 1, NULL, NULL),
(26, '88368', NULL, 'Fathonah Hutasoit', 2, NULL, NULL, NULL, '1997-03-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 47, 1, NULL, NULL),
(27, '98609', NULL, 'Irma Yuniar', 2, NULL, NULL, NULL, '1995-07-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 48, 1, NULL, NULL),
(28, '61693', NULL, 'Ana Gunawan', 1, NULL, NULL, NULL, '2005-05-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 49, 1, NULL, NULL),
(29, '68725', NULL, 'Setya Tampubolon', 2, NULL, NULL, NULL, '2015-01-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 50, 1, NULL, NULL),
(30, '59250', NULL, 'Opan Wacana', 2, NULL, NULL, NULL, '2001-10-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 51, 1, NULL, NULL),
(31, '15622', NULL, 'Ella Mulyani', 1, NULL, NULL, NULL, '1985-01-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 52, 1, NULL, NULL),
(32, '7068', NULL, 'Paris Kusumo', 1, NULL, NULL, NULL, '1993-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 53, 1, NULL, NULL),
(33, '68376', NULL, 'Diah Riyanti', 2, NULL, NULL, NULL, '1985-01-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 54, 1, NULL, NULL),
(34, '44928', NULL, 'Titi Haryanto', 1, NULL, NULL, NULL, '1982-08-27', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 55, 1, NULL, NULL),
(35, '33511', NULL, 'Intan Rajasa', 2, NULL, NULL, NULL, '1972-11-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 56, 1, NULL, NULL),
(36, '22616', NULL, 'Opung Anggriawan', 2, NULL, NULL, NULL, '2016-01-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 57, 1, NULL, NULL),
(37, '54557', NULL, 'Novi Sudiati', 1, NULL, NULL, NULL, '1977-11-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 58, 1, NULL, NULL),
(38, '32672', NULL, 'Diana Rahimah', 1, NULL, NULL, NULL, '1993-08-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 59, 1, NULL, NULL),
(39, '73811', NULL, 'Vicky Anggraini', 2, NULL, NULL, NULL, '1974-04-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 60, 1, NULL, NULL),
(40, '12475', NULL, 'Prayitna Utami', 1, NULL, NULL, NULL, '1987-11-11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 61, 1, NULL, NULL),
(41, '61247', NULL, 'Galuh Kusumo', 2, NULL, NULL, NULL, '1973-01-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 62, 1, NULL, NULL),
(42, '27313', NULL, 'Tami Ramadan', 1, NULL, NULL, NULL, '2001-12-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 63, 1, NULL, NULL),
(43, '43425', NULL, 'Erik Fujiati', 2, NULL, NULL, NULL, '1976-02-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 64, 1, NULL, NULL),
(44, '79728', NULL, 'Naradi Mahendra', 1, NULL, NULL, NULL, '1983-09-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 65, 1, NULL, NULL),
(45, '27514', NULL, 'Ajiman Prabowo', 2, NULL, NULL, NULL, '1978-12-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 66, 1, NULL, NULL),
(46, '9444', NULL, 'Farhunnisa Gunarto', 1, NULL, NULL, NULL, '2012-10-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 67, 1, NULL, NULL),
(47, '5909', NULL, 'Ganep Wibowo', 1, NULL, NULL, NULL, '1977-03-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 68, 1, NULL, NULL),
(48, '38865', NULL, 'Gada Napitupulu', 2, NULL, NULL, NULL, '2012-10-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 69, 1, NULL, NULL),
(49, '69741', NULL, 'Rafid Hutagalung', 1, NULL, NULL, NULL, '1988-06-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 70, 1, NULL, NULL),
(50, '43162', NULL, 'Puspa Susanti', 2, NULL, NULL, NULL, '1991-01-08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 71, 1, NULL, NULL),
(51, '66651', NULL, 'Jail Nababan', 1, NULL, NULL, NULL, '2005-08-13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 72, 1, NULL, NULL),
(52, '54542', NULL, 'Manah Pertiwi', 1, NULL, NULL, NULL, '1993-12-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 73, 1, NULL, NULL),
(53, '45845', NULL, 'Anastasia Saragih', 2, NULL, NULL, NULL, '2006-10-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 74, 1, NULL, NULL),
(54, '72167', NULL, 'Luwar Susanti', 1, NULL, NULL, NULL, '2000-08-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 75, 1, NULL, NULL),
(55, '70050', NULL, 'Padmi Mayasari', 1, NULL, NULL, NULL, '1993-06-16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 76, 1, NULL, NULL),
(56, '15665', NULL, 'Mustofa Simanjuntak', 1, NULL, NULL, NULL, '1996-01-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 77, 1, NULL, NULL),
(57, '69008', NULL, 'Calista Mangunsong', 2, NULL, NULL, NULL, '2013-05-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 78, 1, NULL, NULL),
(58, '45386', NULL, 'Nabila Nurdiyanti', 1, NULL, NULL, NULL, '2009-01-02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 79, 1, NULL, NULL),
(59, '60391', NULL, 'Faizah Usamah', 1, NULL, NULL, NULL, '1977-07-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 80, 1, NULL, NULL),
(60, '21548', NULL, 'Shakila Dabukke', 1, NULL, NULL, NULL, '1970-08-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, 81, 1, 1, NULL),
(61, '78999876', NULL, 'Vini Meilani', 2, 'teluk kuantan', 1, 'Anak Pungut', '2001-03-05', 2, 'Muara Langsat', '+6282286214600', 'SMP Antah', 'X', '2019-02-07', 'Sarjiman', 'Mullyani', 'Muara langsat', '123456789', 'tuksfnksd', 'ngerumpi', 'gholi', 'hoihkjn', 'bnknkl', '5876785r', 86, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa_lokal`
--

CREATE TABLE `siswa_lokal` (
  `siswa_id` int(10) NOT NULL,
  `id_lokal` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_lokal`
--

INSERT INTO `siswa_lokal` (`siswa_id`, `id_lokal`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 3),
(21, 4),
(22, 3),
(22, 4),
(23, 3),
(23, 4),
(24, 3),
(24, 4),
(25, 3),
(25, 4),
(26, 3),
(26, 4),
(27, 3),
(27, 4),
(28, 3),
(28, 4),
(29, 3),
(29, 4),
(30, 3),
(30, 4),
(31, 3),
(31, 4),
(32, 3),
(32, 4),
(33, 3),
(33, 4),
(34, 3),
(34, 4),
(35, 3),
(35, 4),
(36, 3),
(36, 4),
(37, 3),
(37, 4),
(38, 3),
(38, 4),
(39, 3),
(39, 4),
(40, 3),
(40, 4),
(41, 5),
(41, 6),
(42, 5),
(42, 6),
(43, 5),
(43, 6),
(44, 5),
(44, 6),
(45, 5),
(45, 6),
(46, 5),
(46, 6),
(47, 5),
(47, 6),
(48, 5),
(48, 6),
(49, 5),
(49, 6),
(50, 5),
(50, 6),
(51, 5),
(51, 6),
(52, 5),
(52, 6),
(53, 5),
(53, 6),
(54, 5),
(54, 6),
(55, 5),
(55, 6),
(56, 5),
(56, 6),
(57, 5),
(57, 6),
(58, 5),
(58, 6),
(59, 5),
(59, 6),
(60, 5),
(60, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `ta` varchar(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `ta`, `status`) VALUES
(1, '2018/2019', 1),
(2, '2018/2019', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `email` varchar(64) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `pp` text DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `remember_token` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `role`, `pp`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'admin@siastar.smanpintar.sch.id', 'admin', '$2y$10$ixEShbczE58Pffs71ugd4.ReIZTCy3L/YoeZ6ySNf5DQ4Wtbh0ZMq', 'admin', NULL, '2017-09-27', '2017-09-27', 'f8xjeRULBgbuhyqV3GI6dxLtsne9f1kRb9DrvwzIBnp9lQYqbAZmuDHFTHTm'),
(2, 'wani58@example.com', 'eriyanti', '$2y$10$1ApcrgovPY118U2ji4F/..RJWm7Rcfh9GTO24n.2CZ2kGFMw8NGQa', 'guru', NULL, '2017-09-27', '2019-02-27', 'XAc8IvjRCCpYlQ3geBcSKqsYm2XdiDEuM7q9H9hgcJT0TUp6eMEf91hUccT4'),
(3, 'gzulkarnain@example.org', 'gilda32', '$2y$10$QU9AKSVuZuEuZWrki9miUO9y8gJ7v/hLbpoQ18RR55.4CCnBxvfTm', 'guru', NULL, '2017-09-27', '2017-09-27', 'PUHvBoABVnIVA2aTfwbxJDsEmd3MHSxawDsHtKF5Ibt1n8DThRQRStcY1XAt'),
(4, 'ira.puspasari@example.org', 'hsuartini', '$2y$10$1i7chugLPfRv09nYAN9gh.byKvN9x6b1fA1Si2W4B2kS7Z1QrosKW', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(5, 'zamira.riyanti@example.org', 'mursinin15', '$2y$10$97kPBS6IioCOHp5CKKXSvuk9Bj0x29DCxdAlKHs.L0NwffJyMyahK', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(6, 'rpermata@example.com', 'qori.safitri', '$2y$10$oBz8SarZXznN6LX7Z88lGe.ffqKSPMakmTFtosvv37YG6iTh5l0au', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(7, 'zjailani@example.net', 'yessi67', '$2y$10$qnooOo96ohjQbyOZZcptB.83IvZrV/RALlAplDh6AX3L9dPY2Udw2', 'guru', NULL, '2017-09-27', '2017-09-27', 'Xh2QGrrmPdsUDd47DMoCTkAARdTLVkE4mUyQ0iXb0B24G4Q0YWnkt3CBrhBd'),
(8, 'hassanah.diah@example.org', 'ina.lestari', '$2y$10$cn7Ng9IriM9Ch8SdfhXogeTZ8mvGlPUeJdG/ct1V6uXNCIG1Y7vwi', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(9, 'betania32@example.net', 'paramita.utami', '$2y$10$G6B1WSTpv63oKbSp3sw.5O90UJk/nUfNZCpakP/CjnLIs/hQ/46lC', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(10, 'talia03@example.net', 'bwulandari', '$2y$10$YeJP2nt3juIkzjsmFBcwX.BLac6ewtlQCsDVtj0sHb9YM78uYi/1y', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(11, 'yulia.tamba@example.net', 'irma.namaga', '$2y$10$E3Z4Zsjh.uaSbqzGlR1p9ObsittrNFMIZ5IRu/Drf39nBMyp/xu3K', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(12, 'lwinarno@example.com', 'unjani89', '$2y$10$mnrWQjeTBSxxIPbl5NZ35.UE2.MldYIJbVwzOwPqiIEdyL2kQenKa', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(13, 'cinta.natsir@example.org', 'ganda90', '$2y$10$T6bwudXYa2S7cyaXE4cdluYMxipx7jNqWgJW7frsTW64BH.yZTqXK', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(14, 'bpermadi@example.com', 'gading05', '$2y$10$AYyEbTvZUjB2slqfvD7Moefiv5w1ci8jJ8FxS9BwB5xSbGkeOL21a', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(15, 'novitasari.murti@example.org', 'rjailani', '$2y$10$hGQlJ2V.SXLfF7BfejZWquhr9OTAmcQrhTIy1kMvchITal5bdCxbu', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(16, 'shania.natsir@example.org', 'pradipta.hari', '$2y$10$WMvEcdwzozjkGrswltePZORbf86igp4qn8hz7dxT76jf7FKEmwUJO', 'guru', NULL, '2017-09-27', '2017-10-04', '17DntxS2iONUkGAu7g57R5NDREgvL7THAJ0FbhMUSRvEBTSUNAWIObIldSqi'),
(17, 'astuti.gilang@example.org', 'luhung.rajata', '$2y$10$XT..WbXuYL0XU0xJywo9beq./ONjp0F7oVdcznyoCvBu.qMBKpW3a', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(18, 'garyani@example.net', 'jane.usamah', '$2y$10$8pPCxuuWYXI59huxYh2ZjuJAm0vcpcQxiuSxqi63xp65GoxElWigC', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(19, 'mila.yuliarti@example.com', 'luhung.adriansyah', '$2y$10$fZE.u.EvKcQ2MGFMJW.Hh.0Zt9dIUhxRpWIo4VJ/CUOLSKIJ73vey', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(20, 'ratih.winarno@example.net', 'vgunawan', '$2y$10$1be./UKaiLjzyKGAu3Ft5OQTJmNteycZdm2cW1zkDAc/u75nm8sZa', 'guru', NULL, '2017-09-27', '2017-09-27', 'arEfEnlPHAnhmY7GMq4JhzseWut3y8ndXY5G1m65373NQyOojHlFyF4SyGpX'),
(21, 'lhariyah@example.org', 'vera.sirait', '$2y$10$u20Tt2737HaHTOSVWxwgFOuCeyQY/w9ATNkLBke6YJksUyUK5eXwm', 'guru', NULL, '2017-09-27', '2017-09-27', NULL),
(22, 'thabibi@example.org', 'martaka.najmudin', '$2y$10$3jOHI8X2TUlSp27BpybKieEXMoiS2Gpr4HCtT.sacHZSyVUTfPlIa', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(23, 'ifa50@example.net', 'kamila.gunarto', '$2y$10$.iqND91ZDKN84UbieWuq4evGVR1dzqa45znjWXwowxlmS9XHqGxFi', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(24, 'suwarno.amalia@example.net', 'wacana.oman', '$2y$10$3piTEMfiUgDAkSK9bnXqGO7.h4WbLW77d8WtMbka5wLr7RcC9lErO', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(25, 'wirda.prasetyo@example.com', 'prastuti.cahyono', '$2y$10$rnSZuZJK4hFpUKFs6SUhjuF48jsS.Z4PixcEWaLfJojVeAu9vQ546', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(26, 'queen.latupono@example.com', 'sprasetya', '$2y$10$neDl8XfX/lhZMJU.xDrwIeAMdEHuS14/T.9O.bkPpsseJ0L2fbLzu', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(27, 'erik.halimah@example.com', 'zulaika.elvina', '$2y$10$RWxRXXr9o6CHZLaEHeGHieZTR/GCas3vnP1KzwQVLCvWl3J8hkQ2.', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(28, 'vanesa.nainggolan@example.net', 'mulyono73', '$2y$10$sOnzAAGAhDF9iP7weVnl0.dhA.ymEhr4ByaYe1i0KaR0J6IGPDtL6', 'siswa', NULL, '2017-09-27', '2017-09-27', 'QZjWVzf9B9RUGfgWrbnuQyr4rAx7bG8iKl8cSMDrG3cUnnlf9xrE7FIZxlAi'),
(29, 'jsiregar@example.net', 'umay.wacana', '$2y$10$NgZUfRbwZOhDIhMHKUWjPuQxw9wVxOiiKUVj/0Jh4WfNDookmZYbe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(30, 'pranowo.kamaria@example.org', 'ani73', '$2y$10$NaULlLbRKT.y.ugKol97t.s4.y4lX32LPqM77orYZF8bKhu04534i', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(31, 'unggul13@example.org', 'rpurwanti', '$2y$10$gfw.cc3LZDcu7iSeA1/Ix.6V0o2yLT2it.7EqsPmzzDKq.jp1jmDm', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(32, 'ayu29@example.net', 'dmegantara', '$2y$10$e./Pz/bq29yUUWPj2vu.9uEuKFRNZpiE56rOihW1qZqP4TebUUBUW', 'siswa', NULL, '2017-09-27', '2019-02-27', 'srKPFZvCrfyoZMpjM67RQ4DjS01DfCakabLQ1eGtgyoqq8w7bjomYXtkpzHU'),
(33, 'mandala.kenari@example.org', 'limar52', '$2y$10$AFmXB1dvuIaehUJQWCnuEeWcB7dCs.8JEC3sLxrAkkxT7DDsQYEgu', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(34, 'ihastuti@example.org', 'bakijan.waluyo', '$2y$10$Bc9DNA0NfWo5pl6kl3ovIuYHEBl/CrdaF.1.vXeSQXPXg9x3978qK', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(35, 'gunarto.calista@example.org', 'bambang.widiastuti', '$2y$10$T1DYgRAbINuyiivxaX0.Jeq.VoOg3BybmTlNqAiqAzo/RGNcE6hSe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(36, 'anuraini@example.org', 'garan.dabukke', '$2y$10$J3arMu7wAWaztGdQltSoIeZqw4jBPmTB26BmjIv056OyPjHq37vtC', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(37, 'ykusumo@example.org', 'ghaliyati48', '$2y$10$tzFZhxFuCYWX.jwY05C2oum1PgKCBsVD6zYvbozbUZTqvt59OcYB.', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(38, 'kuswandari.usyi@example.org', 'kusumo.jaeman', '$2y$10$lyox6D.BhCZKRA77VyDdyeiD/MxfJeJVcjmAXCQBq8sKm40ZVcJxS', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(39, 'yahya64@example.com', 'puji.anggraini', '$2y$10$OIu.FAY1szOjvCm8m8Tk5eyV8FSZxiYFedDyK3m8f8TCngO15ErU6', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(40, 'mandala.balapati@example.org', 'trajasa', '$2y$10$KgYg4nFnXjpryJeHtf9MveWjwGQxVuQM/ggyblfATHkoTqiej1Dl6', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(41, 'coktaviani@example.com', 'cemani20', '$2y$10$lF0j5bzNFzmnWJNwIO11oezDLTF0H2Dh1llNUKkNyN1yoZ2umQjZq', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(42, 'zulaika.asmadi@example.org', 'novitasari.gangsa', '$2y$10$kk/daWm0iuCEnpP3Bk1qIOdU33LLBMu9BFijwbONTR.nV45P.XZXy', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(43, 'dewi81@example.com', 'paramita65', '$2y$10$kBrmn9mOXReOQeWJpPG2lOvw9D5ze/RvNlDze7KiPD.0RCaDUD4US', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(44, 'tpratiwi@example.net', 'halima44', '$2y$10$ce4z2YFgXcNeL4i0F6n9Qe1Xc2JexuxVwUEdZwcLjtgPvHdhKAWiC', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(45, 'ohastuti@example.org', 'bambang26', '$2y$10$5Y6bXvoBS4WHXufXRq1c6eJfVR/Ku968es9AP9bG0ZcR3G6BefJ.K', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(46, 'dwinarsih@example.org', 'salahudin.vanya', '$2y$10$6O1GRFqPOIeIJl6gowr9MOQQLokU4eJojDokQAHfdmmrDjOOLWBLa', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(47, 'rusman03@example.org', 'uli31', '$2y$10$kqAsGnAgzaZjnMhxw5//u.oSlwObaAdLMwQi3sLa4t0wrELjL7gRS', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(48, 'putra.chandra@example.net', 'hafshah37', '$2y$10$rgN0VpjyJ0Nyr91Q9EhFHOBufZzMOyucB4cDL1KRj1CZMbfbJI3GO', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(49, 'yuni.utami@example.net', 'prabowo.abyasa', '$2y$10$8G.oLaZlIQ3eebzJFRnRPeKgFLCCW91X8BfAiczz9x34DulFpFCRu', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(50, 'amalia.uwais@example.org', 'pranata.hidayat', '$2y$10$3akYcCkz83IrCcpEjJfh/.0IS2/4dbVkUAf9nk1NuL5mtpY4RWCWS', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(51, 'ami.mardhiyah@example.net', 'pwinarno', '$2y$10$AM1AwptQKyekq7k7HG8IhOdi1vo.P2ZwzyI9Ax63hF/OiQr4YHhTa', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(52, 'suryono.daliman@example.org', 'salwa35', '$2y$10$b5rSXFDNlXk0kjmKZVrGyO1b6Fex1xL5TMPmQ63x4kIP.IMClXA02', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(53, 'lmulyani@example.com', 'jaswadi01', '$2y$10$rUXuUOkrE1/SxhZOK9Bbwe4fxbiPteUbRDB1kGvFs2JF2BRmO5gou', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(54, 'ardianto.prasetyo@example.com', 'zlaksmiwati', '$2y$10$FH/p9uDNJBtCDeNA.DXNxuYQn5JZMlUgD8QY2S8RPey6Bn0Crjxfe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(55, 'prastuti.chandra@example.net', 'salwa83', '$2y$10$KkUp1xz8GOb/kHYelS/OXuqfcif28cM.I8PbqqIEaktc5xdN6NkCy', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(56, 'ira.zulaika@example.com', 'puji.saragih', '$2y$10$UtCkv1YoastQWl.LkTMJF.IegDZbeJ69FvkRYXVEMzt76Q1xhQT4y', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(57, 'vera.riyanti@example.net', 'jasmani23', '$2y$10$TNPQYhEwvjng559LkuvomOTGjOZZvlqmzESekgonNswiXicD9dk0W', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(58, 'shakila.wastuti@example.com', 'bsitorus', '$2y$10$xdDvf50bt/TdeEzc3ChXm.h3c4YytMXzuJDzem1A43ZjTUI4eE2eW', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(59, 'prayoga.firmansyah@example.org', 'melani.pranata', '$2y$10$GjjHrh9ieUMD7282sMztT.X1yMeDJl.b8elkdY8wGw9zcaXDccYMG', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(60, 'tira.anggraini@example.net', 'gandi.suryatmi', '$2y$10$Im514yo5n4QgM.T3ypiOvejTPYAIU.3wffJJ711SwCmc3tWIButbC', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(61, 'najmudin.ajimin@example.net', 'saragih.ratih', '$2y$10$4i75VXlOOTsu6CsCkJmHuukt.7PLx0AnG6toSlW.RAFVXOindG4QW', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(62, 'maman07@example.net', 'kartika.hartati', '$2y$10$vkXQwI.MSh02oiXqgG7uzeJV/dE3XN.8yu15kl3rVuJs/sjTWVLAO', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(63, 'riyanti.safina@example.net', 'gatot.rahmawati', '$2y$10$oNZ92Ou1WiLjSV/SLQctA.mSemCSRRQPwds21JpQj3skDGqEqMgBG', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(64, 'ade.kurniawan@example.org', 'kenari.kusmawati', '$2y$10$2KNmHDtmgyKe50OvM5KWhu137jBhNv9vc9BTjd7jTaUyZUarYVgAa', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(65, 'umaryadi@example.com', 'siska87', '$2y$10$xiYs6uczRm7mnP5A7AUbBeup/VYwrh1CK4Otg2r8ckuefypGXNF2O', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(66, 'jgunawan@example.com', 'elisa27', '$2y$10$Z7ewaxMRptyhZInjyngEWuAv3gTnvqiDz9Ymp8d2B1734Ga7AFouu', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(67, 'paris78@example.net', 'victoria.uwais', '$2y$10$UZIiTGFUvc6OnZBlceS5/eKW5kcvWlhOr32ubKMGflD.rVuPi5MpW', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(68, 'taswir31@example.net', 'wage07', '$2y$10$PfPHEZ1Sdk3y.3Uep8DrXuLeCc1SfhK8rAAY1oDlpTJgbHq8FGe1G', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(69, 'salsabila.hasanah@example.org', 'dirja20', '$2y$10$trLQQYEnh56oIAm8.3x27.TTDUBZjqg3XJ2JUVdYFo/muSWWE83qe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(70, 'akuswandari@example.org', 'jabal.wulandari', '$2y$10$owKuhcQRXcWf26SdpJVi9.rYAVL4GHo3tioOOUS5W6bnmJCP/hPHG', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(71, 'yuliarti.laila@example.net', 'kardi.kurniawan', '$2y$10$BzjpZAaezRSMT5xglrvFzeRk8RMcO1NKk.mmNN30QuIYLMmt5dr/i', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(72, 'amegantara@example.org', 'zamira.yuliarti', '$2y$10$Rj2ZhGCgadmU9gMiLc5JYeKl8LCw.rRI/XOIB/EbBM5cZm.KBTOeS', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(73, 'rahmat26@example.org', 'fmaheswara', '$2y$10$8e0EozJhOFvcCpfCXUHJcu9KNEYxlcGnC2HkkTl2asJemN6IcUVsm', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(74, 'kemba.purnawati@example.net', 'sitompul.sari', '$2y$10$BGmRBOREF4HHvqpej.TJz.e0e2W1Ej5Nj/7BrfJC7UOxFNfNZLj8K', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(75, 'hastuti.jaya@example.net', 'wastuti.eli', '$2y$10$6SwGeWeqJJCrQzCzWTkOLejj10PHF13znAYngrJ8Ug/8NnajvuWta', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(76, 'firmansyah.zulaikha@example.org', 'hafshah29', '$2y$10$EPnJAkk4jDniC.cx1Te2Me8.wpPAcgeC38njVm5N3/a3vDJDDv/aa', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(77, 'wmahendra@example.org', 'narji73', '$2y$10$Jh/u1qGjAaWY0S9nLHeyKe2qBHffaUubGGhbWO0Gvb5QiFh72aWMe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(78, 'ika.widiastuti@example.org', 'tania86', '$2y$10$47unks2JScsRdfFD/k9zP.usenMfyVTHTyfGX2WbasdGj8XN/gjQ6', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(79, 'atma62@example.net', 'warta.marpaung', '$2y$10$6aBx3G59cSdeWdnQcIcaY.nuseSP2kW.R2sA0cgxOrGAEYvSGTOLi', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(80, 'darsirah.susanti@example.org', 'salwa.sihombing', '$2y$10$NxS7FkZCzB0mOsFGw.leWOV3CBrzJZXIopOacfjOBn3oaI2QfnjVe', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(81, 'yiswahyudi@example.org', 'rahmawati.endah', '$2y$10$Jped9S1eGZwOmIP9.uvbPO/HBwwxnSpRpbQBuD9.PBYEthf0e29CK', 'siswa', NULL, '2017-09-27', '2017-09-27', NULL),
(82, 'tami27@tamimail.com', 'ot72592', '$2y$10$.P/vlP.QwVeLXz5cNVIbdewLb/AU7sq4gFEwB/w2oTrDFJ8CKkxxm', 'ortu', NULL, '2017-09-27', '2018-01-17', 'j7VQW5vdEhOTdOYpM8TVwcRfywPc4fmSaqrh7GQ5CquYlL7vomtUyw88g47n'),
(83, NULL, 'ot26322', '$2y$10$lb1/Ail.d1Q1z1YUpNflWuy6iAlO2g4ZtDfG.Of3yQoDhFQG/lajC', 'ortu', NULL, '2019-02-28', '2019-02-28', NULL),
(84, NULL, 'ot26322', '$2y$10$3kqjGNrj50zOURONTzNdv.tY1wbvXZ07rsTPNvtMB0ffUXbj6roGK', 'ortu', NULL, '2019-02-28', '2019-02-28', NULL),
(85, NULL, '78999876', '$2y$10$xeoYhXQYwqGaIrF5xLvXdeb886YFS8zKysW0R5VFPHmNr4VRzfHU6', 'siswa', NULL, '2019-02-28', '2019-02-28', NULL),
(86, NULL, '78999876', '$2y$10$hhZVBpXWVsLOqdHmISa0OuY8wG/9X0pCFOYpDigC/lp3xV3zt8Qp2', 'siswa', NULL, '2019-02-28', '2019-02-28', NULL),
(87, NULL, '00', '$2y$10$/nmCKAkwPVVi5VSPyogLZ.lPRQjjJm7u90rOmbef.rdwEFCY.I77i', 'guru', NULL, '2019-02-28', '2019-02-28', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_nilai`
--
ALTER TABLE `form_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKform_nilai541144` (`id_mapel_lokal`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKguru623210` (`id_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentar_materi`
--
ALTER TABLE `komentar_materi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKkomentar_m633113` (`materi_id`),
  ADD KEY `FKkomentar_m42683` (`users_id`);

--
-- Indexes for table `lokal`
--
ALTER TABLE `lokal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKlokal782834` (`guru_id`),
  ADD KEY `FKlokal662967` (`id_kelas`);

--
-- Indexes for table `mapel_lokal_guru`
--
ALTER TABLE `mapel_lokal_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKmapel_loka99241` (`mapel_id`),
  ADD KEY `FKmapel_loka984250` (`id_lokal`),
  ADD KEY `FKmapel_loka618594` (`guru_id`);

--
-- Indexes for table `matapelajaran`
--
ALTER TABLE `matapelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_id_2` (`siswa_id`,`id_form_nilai`),
  ADD KEY `id_form_nilai` (`id_form_nilai`) USING BTREE;

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_kelas_online`
--
ALTER TABLE `post_kelas_online`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKpost_kelas972640` (`id_mapel_lokal`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
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
-- AUTO_INCREMENT for table `form_nilai`
--
ALTER TABLE `form_nilai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `komentar_materi`
--
ALTER TABLE `komentar_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mapel_lokal_guru`
--
ALTER TABLE `mapel_lokal_guru`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=421;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post_kelas_online`
--
ALTER TABLE `post_kelas_online`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
