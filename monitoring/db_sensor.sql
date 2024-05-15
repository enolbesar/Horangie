-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 03:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sensor`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_device`
--

CREATE TABLE `tb_device` (
  `id` int(11) NOT NULL,
  `mode` int(11) NOT NULL,
  `pumpIrrigation` int(11) NOT NULL,
  `pumpMist` int(11) NOT NULL,
  `heater` int(11) NOT NULL,
  `lamp` int(11) NOT NULL,
  `wifi` int(11) NOT NULL,
  `board` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_device`
--

INSERT INTO `tb_device` (`id`, `mode`, `pumpIrrigation`, `pumpMist`, `heater`, `lamp`, `wifi`, `board`) VALUES
(1, 0, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_logsensor`
--

CREATE TABLE `tb_logsensor` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rain` float DEFAULT NULL,
  `temp` float DEFAULT NULL,
  `soil` float DEFAULT NULL,
  `hum` float DEFAULT NULL,
  `hindex` float DEFAULT NULL,
  `sun` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_logsensor`
--

INSERT INTO `tb_logsensor` (`id`, `timestamp`, `rain`, `temp`, `soil`, `hum`, `hindex`, `sun`) VALUES
(1, '2024-05-12 03:33:00', 0, 27.4, -1, 70, 23.1, 0),
(2, '2024-05-12 03:34:00', 0, 27.4, -1, 70, 23.1, 35.2),
(3, '2024-05-12 03:35:00', 60, 27.4, 40.5, 70, 23.1, 16.8),
(4, '2024-05-12 03:36:00', 31, 27.4, 7.8, 70, 23.1, 5.7),
(5, '2024-05-12 03:37:00', 7, 27.4, -1, 70, 23.1, 0),
(6, '2024-05-12 03:38:00', 34, 27.6, 9.6, 70, 23.4, 0),
(7, '2024-05-12 03:39:00', 20, 27.7, 4.5, 70, 23.5, 27.6),
(8, '2024-05-12 03:40:00', 0, 27.4, -1, 70, 23.1, 0),
(9, '2024-05-12 03:41:00', 72, 27.4, 63.9, 70, 23.1, 37.4),
(10, '2024-05-12 03:42:00', 0, 27.4, -1, 70, 23.1, 0),
(11, '2024-05-12 03:43:00', 26, 27.4, 6.4, 70, 23.1, 0),
(12, '2024-05-12 03:44:00', 49, 27.4, 26, 70, 23.1, 0),
(13, '2024-05-12 03:45:00', 0, 27.4, -1, 70, 23.1, 0),
(14, '2024-05-12 03:46:00', 69, 27.1, 49.8, 71, 22.9, 0),
(15, '2024-05-12 03:47:00', 3, 27, -0.3, 71, 22.7, 36.4),
(16, '2024-05-12 03:48:00', 23, 27, 5.9, 71, 22.7, 17.5),
(17, '2024-05-12 03:49:00', 67, 27, 49.3, 71, 22.7, 25.3),
(18, '2024-05-12 03:50:00', 0, 27, -1, 71, 22.7, 0),
(19, '2024-05-12 03:51:00', 49, 27, 17.8, 71, 22.7, 18.1),
(20, '2024-05-12 03:52:00', 20, 27.1, 5, 72, 22.9, 19.1),
(21, '2024-05-12 03:53:00', 0, 27.4, -1, 71, 23.2, 0),
(22, '2024-05-12 03:54:00', 0, 27.4, -1, 71, 23.2, 0),
(23, '2024-05-12 03:55:00', 19, 27.4, 4.3, 71, 23.2, 0),
(24, '2024-05-12 03:56:00', 0, 27.4, -1, 71, 23.2, 0),
(25, '2024-05-12 03:57:00', 27, 27.4, 7.1, 71, 23.2, 0),
(26, '2024-05-12 03:58:00', 73, 27.4, 43.6, 71, 23.2, 19.7),
(27, '2024-05-12 03:59:00', 7, 27.4, -1, 71, 23.2, 0),
(28, '2024-05-12 04:00:00', 20, 27.4, 5, 71, 23.2, 0),
(29, '2024-05-12 04:01:00', 0, 27.4, -1, 71, 23.2, 0),
(30, '2024-05-12 04:02:00', 0, 27.4, -1, 71, 23.2, 0),
(31, '2024-05-12 04:03:00', 19, 27.4, 4.8, 71, 23.2, 0),
(32, '2024-05-12 04:04:00', 65, 27.4, 47.5, 71, 23.2, 0),
(33, '2024-05-12 04:05:00', 63, 27.4, 45.6, 71, 23.2, 24.7),
(34, '2024-05-12 04:06:00', 4, 27.4, 2, 71, 23.2, 33.6),
(35, '2024-05-13 05:47:00', 0, 26.4, -1, 74, 22.2, 0),
(36, '2024-05-13 05:54:00', 12, 27.1, 3.1, 72, 22.9, 0),
(37, '2024-05-13 05:55:00', 75, 27, 58.1, 72, 22.8, 72.7),
(38, '2024-05-13 05:58:00', 69, 27, 77.7, 72, 22.8, 0),
(39, '2024-05-13 06:18:00', 0, 28.4, -1, 69, 24.2, 0),
(40, '2024-05-13 06:19:00', 70, 28.5, 41, 70, 24.3, 0),
(41, '2024-05-13 06:20:00', 16, 28.5, 2.5, 69, 24.3, 0),
(42, '2024-05-13 06:21:00', 46, 28.8, 13.9, 69, 24.6, 19.4),
(43, '2024-05-13 06:22:00', 31, 29.2, 8.6, 68, 25, 0),
(44, '2024-05-13 06:23:00', 1, 28.8, -0.9, 68, 24.6, 0),
(45, '2024-05-13 06:24:00', 65, 28.8, 47.2, 68, 24.6, 0),
(46, '2024-05-13 06:25:00', 9, 28.8, 1.1, 68, 24.6, 0),
(47, '2024-05-13 06:26:00', 70, 29.2, 59.7, 68, 25, 38),
(48, '2024-05-13 06:27:00', 0, 29.2, -1, 68, 25, 0),
(49, '2024-05-13 06:28:00', 0, 29.2, -1, 68, 25, 0),
(50, '2024-05-13 06:29:00', 10, 29.5, 1.3, 67, 25.3, 0),
(51, '2024-05-13 06:30:00', 1, 30.3, -0.8, 65, 26.1, 0),
(52, '2024-05-13 06:35:00', 62, 33, 45.6, 62, 28.9, 21.3),
(53, '2024-05-13 06:36:00', 0, 33.4, -1, 63, 29.4, 0),
(54, '2024-05-13 06:46:00', 0, 30.4, -1, 64, 26.2, 0),
(55, '2024-05-13 06:47:00', 74, 30.7, 57.1, 63, 26.4, 64.5),
(56, '2024-05-13 06:48:00', 64, 30.3, 45.5, 64, 26, 25),
(57, '2024-05-13 06:49:00', 18, 30.3, 4.1, 64, 26, 0),
(58, '2024-05-13 06:51:00', 19, 29.9, 4.7, 67, 25.7, 0),
(59, '2024-05-13 06:52:00', 22, 29.9, 6.3, 67, 25.7, 0),
(60, '2024-05-13 06:53:00', 46, 29.9, 21.9, 67, 25.7, 0),
(61, '2024-05-13 06:54:00', 25, 29.9, 6.4, 66, 25.7, 0),
(62, '2024-05-13 06:55:00', 74, 29.9, 49.2, 67, 25.7, 53.4),
(63, '2024-05-13 06:56:00', 0, 29.9, -0.9, 67, 25.7, 0),
(64, '2024-05-13 06:57:00', 0, 30.3, -1, 66, 26.1, 0),
(65, '2024-05-13 06:58:00', 0, 30.8, -1, 64, 26.6, 0),
(66, '2024-05-13 06:59:00', 0, 30.8, -1, 65, 26.6, 0),
(67, '2024-05-13 09:44:00', 2, 27.5, -1, 71, 23.3, 0),
(68, '2024-05-13 09:45:00', 0, 27.6, -1, 71, 23.4, 0),
(69, '2024-05-13 09:46:00', 0, 27.7, -1, 71, 23.5, 0),
(70, '2024-05-13 09:47:00', 1, 27.8, -0.8, 70, 23.6, 0),
(71, '2024-05-13 09:48:00', 0, 27.8, -1, 70, 23.6, 0),
(72, '2024-05-13 09:49:00', 0, 27.9, -1, 70, 23.7, 0),
(73, '2024-05-13 09:50:00', 75, 27.8, 58.6, 70, 23.6, 9.6),
(74, '2024-05-13 09:51:00', 60, 27.8, 42.3, 69, 23.5, 0),
(75, '2024-05-13 09:52:00', 5, 27.8, 0.3, 69, 23.5, 0),
(76, '2024-05-13 09:54:00', 0, 27.8, -1, 70, 23.6, 0),
(77, '2024-05-13 09:55:00', 71, 27.8, 54.1, 70, 23.6, 38.3),
(78, '2024-05-13 09:56:00', 15, 27.9, 3.6, 70, 23.7, 27),
(79, '2024-05-13 09:57:00', 33, 28.1, 9.3, 70, 23.9, 0),
(80, '2024-05-13 09:58:00', 49, 28.1, 28.4, 70, 23.9, 0),
(81, '2024-05-13 09:59:00', 25, 28.1, 6.6, 69, 23.9, 0),
(82, '2024-05-13 10:00:00', 0, 28.1, -1, 69, 23.9, 0),
(83, '2024-05-13 10:01:00', 0, 28.1, -1, 69, 23.9, 0),
(84, '2024-05-13 10:02:00', 68, 28, 47.7, 69, 23.7, 27.9),
(85, '2024-05-13 10:07:00', 0, 27.7, -1, 70, 23.5, 16),
(86, '2024-05-13 10:08:00', 0, 27.8, -1, 70, 23.6, 0),
(87, '2024-05-13 10:09:00', 0, 27.8, -1, 70, 23.6, 0),
(88, '2024-05-13 10:10:00', 71, 27.8, 64.3, 69, 23.5, 35.5),
(89, '2024-05-13 10:11:00', 21, 27.8, 4.8, 69, 23.5, 0),
(90, '2024-05-13 10:18:00', 57, 27.5, 45.5, 71, 23.3, 21.3),
(91, '2024-05-13 10:19:00', 0, 27.5, -1, 71, 23.3, 0),
(92, '2024-05-13 10:21:00', 52, 27.5, 33.1, 71, 23.3, 0),
(93, '2024-05-13 10:22:00', 58, 27.4, 37.8, 71, 23.2, 0),
(94, '2024-05-13 10:24:00', 0, 27.5, -1, 71, 23.3, 0),
(95, '2024-05-13 10:25:00', 69, 27.8, 50.9, 70, 23.6, 32.7),
(96, '2024-05-13 10:26:00', 14, 27.8, 1.7, 70, 23.6, 0),
(97, '2024-05-13 10:27:00', 26, 27.8, 6.7, 69, 23.5, 33.9),
(98, '2024-05-13 10:28:00', 16, 27.8, 3.8, 70, 23.6, 0),
(99, '2024-05-13 10:29:00', 16, 27.8, -1, 69, 23.5, 0),
(100, '2024-05-13 10:30:00', 64, 27.8, 44.1, 69, 23.5, 25),
(101, '2024-05-13 10:31:00', 15, 27.8, 3.1, 69, 23.5, 0),
(102, '2024-05-13 11:33:00', 26, 26.4, 6.4, 78, 22.4, 0),
(103, '2024-05-13 11:34:00', 39, 26.5, 14, 73, 22.3, 0),
(104, '2024-05-13 11:35:00', 70, 26.4, 54.5, 73, 22.2, 34.5),
(105, '2024-05-13 11:36:00', 0, 26.7, -1, 72, 22.5, 0),
(106, '2024-05-13 11:37:00', 0, 26.4, -1, 73, 22.2, 0),
(107, '2024-05-13 11:38:00', 12, 26.8, 1.8, 72, 22.6, 29.7),
(108, '2024-05-13 11:39:00', 0, 26.8, -1, 74, 22.7, 0),
(109, '2024-05-13 11:40:00', 0, 27, -1, 72, 22.8, 0),
(110, '2024-05-13 11:41:00', 0, 27.1, -1, 72, 22.9, 0),
(111, '2024-05-13 11:42:00', 0, 27.2, -1, 72, 23, 0),
(112, '2024-05-13 11:43:00', 0, 27.2, -1, 74, 23.1, 0),
(113, '2024-05-13 11:44:00', 0, 27.1, -1, 73, 22.9, 0),
(114, '2024-05-13 11:45:00', 0, 27.4, -1, 73, 23.3, 0),
(115, '2024-05-13 11:46:00', 0, 27.5, -1, 73, 23.4, 0),
(116, '2024-05-13 11:47:00', 0, 27.4, -1, 72, 23.2, 0),
(117, '2024-05-13 11:48:00', 0, 27.5, -1, 72, 23.3, 0),
(118, '2024-05-13 11:49:00', 0, 27.5, -1, 72, 23.3, 0),
(119, '2024-05-13 11:50:00', 0, 27.4, -1, 72, 23.2, 0),
(120, '2024-05-13 11:51:00', 0, 27.5, -1, 72, 23.3, 0),
(121, '2024-05-13 11:52:00', 0, 27.4, -1, 71, 23.2, 0),
(122, '2024-05-13 11:53:00', 0, 27.2, -1, 71, 23, 0),
(123, '2024-05-13 12:03:00', 0, 27.1, -1, 72, 22.9, 0),
(124, '2024-05-13 12:04:00', 0, 27.1, -1, 72, 22.9, 0),
(125, '2024-05-13 12:05:00', 0, 27.1, -1, 72, 22.9, 0),
(126, '2024-05-13 12:06:00', 0, 27.1, -1, 72, 22.9, 0),
(127, '2024-05-13 12:07:00', 0, 27.1, -1, 71, 22.9, 0),
(128, '2024-05-13 12:08:00', 0, 27.1, -1, 70, 22.8, 0),
(129, '2024-05-13 12:09:00', 0, 27.1, -1, 71, 22.9, 0),
(130, '2024-05-13 12:10:00', 0, 27.1, -1, 71, 22.9, 0),
(131, '2024-05-13 12:11:00', 0, 27, -1, 70, 22.7, 0),
(132, '2024-05-13 12:12:00', 0, 27.1, -1, 70, 22.8, 0),
(133, '2024-05-13 12:13:00', 0, 26.8, -1, 69, 22.4, 0),
(134, '2024-05-13 12:14:00', 0, 26.7, -1, 70, 22.4, 0),
(135, '2024-05-13 12:15:00', 0, 26.8, -1, 69, 22.4, 0),
(136, '2024-05-13 12:16:00', 0, 26.8, -1, 70, 22.5, 0),
(137, '2024-05-13 12:17:00', 0, 27, -1, 70, 22.7, 0),
(138, '2024-05-13 12:18:00', 0, 27, -1, 70, 22.7, 0),
(139, '2024-05-13 12:19:00', 0, 26.9, -1, 71, 22.6, 0),
(140, '2024-05-13 12:20:00', 0, 27, -1, 70, 22.7, 0),
(141, '2024-05-13 13:29:00', 0, 25.7, -1, 71, 21.3, 0),
(142, '2024-05-13 13:30:00', 0, 25.9, -1, 71, 21.5, 0),
(143, '2024-05-13 13:31:00', 0, 25.9, -1, 71, 21.5, 0),
(144, '2024-05-13 13:32:00', 0, 26, -1, 70, 21.6, 0),
(145, '2024-05-13 13:33:00', 12, 26, 2.7, 70, 21.6, 0),
(146, '2024-05-13 13:34:00', 67, 26.2, 38.9, 70, 21.8, 16.5),
(147, '2024-05-13 13:35:00', 11, 26.2, 2.3, 69, 21.8, 0),
(148, '2024-05-13 13:36:00', 0, 26.4, -1, 70, 22, 311.2),
(149, '2024-05-13 13:37:00', 3, 26.3, 0, 70, 21.9, 0),
(150, '2024-05-13 13:38:00', 25, 26.3, 6.3, 70, 21.9, 0),
(151, '2024-05-13 13:39:00', 22, 26.2, 5.3, 70, 21.8, 29.7),
(152, '2024-05-13 13:40:00', 12, 26.3, 4.7, 69, 21.9, 522.3),
(153, '2024-05-13 13:41:00', 45, 26, 21.7, 69, 21.5, 0),
(154, '2024-05-13 13:42:00', 54, 26, 33.4, 69, 21.5, 0),
(155, '2024-05-13 13:43:00', 0, 26.2, -1, 69, 21.8, 0),
(156, '2024-05-13 13:44:00', 55, 26.2, 25.3, 69, 21.8, 24.4),
(157, '2024-05-13 13:45:00', 67, 26, 48.2, 69, 21.5, 0),
(158, '2024-05-13 13:46:00', 0, 26.1, -1, 69, 21.7, 0),
(159, '2024-05-13 13:47:00', 0, 26, -1, 69, 21.5, 0),
(160, '2024-05-13 13:48:00', 0, 26, -1, 69, 21.5, 0),
(161, '2024-05-13 13:49:00', 67, 26, 46.1, 70, 21.6, 28.2),
(162, '2024-05-13 13:50:00', 0, 26, -1, 70, 21.6, 0),
(163, '2024-05-13 13:51:00', 0, 25.9, -1, 69, 21.4, 0),
(164, '2024-05-13 13:52:00', 0, 25.9, -1, 69, 21.4, 0),
(165, '2024-05-13 13:53:00', 0, 26, -1, 70, 21.6, 0),
(166, '2024-05-13 13:54:00', 68, 26.1, 49, 70, 21.7, 29.7),
(167, '2024-05-13 13:55:00', 0, 26, -1, 70, 21.6, 0),
(168, '2024-05-13 13:56:00', 13, 26.1, 4.6, 70, 21.7, 0),
(169, '2024-05-13 13:57:00', 47, 26, 14.8, 70, 21.6, 13),
(170, '2024-05-13 13:58:00', 72, 26.1, 46.8, 70, 21.7, 31.8),
(171, '2024-05-13 13:59:00', 0, 26, -1, 70, 21.6, 0),
(172, '2024-05-13 14:00:00', 100, 26.1, 53.7, 69, 21.7, 13183.4),
(173, '2024-05-13 14:01:00', 67, 26, 46.8, 70, 21.6, 0),
(174, '2024-05-13 14:02:00', 0, 26, -1, 70, 21.6, 11),
(175, '2024-05-13 14:03:00', 0, 26.3, -1, 69, 21.9, 0),
(176, '2024-05-13 14:04:00', 68, 26.1, 50, 69, 21.7, 0),
(177, '2024-05-13 14:05:00', 0, 26.3, -1, 69, 21.9, 0),
(178, '2024-05-13 14:06:00', 16, 26.3, 3.6, 69, 21.9, 32.1),
(179, '2024-05-13 14:08:00', 13, 26, 4, 69, 21.5, 0),
(180, '2024-05-13 14:09:00', 5, 26, 0.4, 69, 21.5, 0),
(181, '2024-05-13 14:10:00', 58, 26.2, 40, 69, 21.8, 11),
(182, '2024-05-13 14:11:00', 0, 26.1, -1, 69, 21.7, 0),
(183, '2024-05-13 14:12:00', 21, 25.7, 5.1, 68, 21.2, 27),
(184, '2024-05-13 14:13:00', 67, 25.7, 41.9, 69, 21.2, 39),
(185, '2024-05-13 14:14:00', 13, 25.7, 2.5, 69, 21.2, 0),
(186, '2024-05-13 14:15:00', 0, 25.8, -1, 70, 21.4, 0),
(187, '2024-05-13 14:16:00', 0, 25.5, -1, 69, 21, 0),
(188, '2024-05-13 14:17:00', 0, 25.5, -1, 69, 21, 0),
(189, '2024-05-13 14:18:00', 69, 25.7, 48.7, 70, 21.3, 31.8),
(190, '2024-05-13 14:19:00', 28, 25.6, 5.9, 70, 21.2, 0),
(191, '2024-05-13 14:20:00', 0, 25.9, -1, 70, 21.5, 0),
(192, '2024-05-13 14:21:00', 0, 26.1, -1, 70, 21.7, 0),
(193, '2024-05-13 14:22:00', 0, 26.1, -1, 70, 21.7, 0),
(194, '2024-05-13 14:47:00', 0, 25, -1, 70, 20.5, 0),
(195, '2024-05-13 14:48:00', 67, 25, 58, 70, 20.5, 26.4),
(196, '2024-05-13 14:53:00', 14, 25.3, 3.6, 71, 20.9, 0),
(197, '2024-05-13 14:59:00', 18, 25.7, 3.8, 71, 21.3, 0),
(198, '2024-05-13 15:00:00', 6, 25.9, 0.8, 70, 21.5, 0),
(199, '2024-05-13 15:01:00', 66, 26, 49.6, 70, 21.6, 31.5),
(200, '2024-05-13 15:02:00', 0, 26, -1, 69, 21.5, 0),
(201, '2024-05-13 15:03:00', 66, 26, 50.6, 70, 21.6, 28.8),
(202, '2024-05-13 15:08:00', 0, 24.6, -1, 69, 20, 0),
(203, '2024-05-13 15:09:00', 10, 24.3, 2.2, 71, 19.8, 0),
(204, '2024-05-13 15:10:00', 35, 24.8, 9.9, 70, 20.3, 0.1),
(205, '2024-05-13 15:11:00', 0, 25, -0.5, 70, 20.5, 0),
(206, '2024-05-13 15:12:00', 69, 25, 53.5, 69, 20.4, 33),
(207, '2024-05-13 15:13:00', 23, 24.8, 2.4, 70, 20.3, 0),
(208, '2024-05-13 15:14:00', 28, 24.9, 7.3, 70, 20.4, 23.3),
(209, '2024-05-13 15:15:00', 15, 25, 3.6, 70, 20.5, 0),
(210, '2024-05-13 15:16:00', 66, 25, 65.3, 70, 20.5, 26.7),
(211, '2024-05-13 15:17:00', 61, 25.3, 38.2, 70, 20.8, 56.5),
(212, '2024-05-13 15:21:00', 69, 25, 54.4, 71, 20.5, 32.1),
(213, '2024-05-13 15:22:00', 68, 25.2, 56.1, 69, 20.7, 36.1),
(214, '2024-05-13 15:23:00', 11, 25.3, 2.3, 70, 20.8, 0),
(215, '2024-05-13 15:24:00', 69, 25.4, 52.1, 70, 20.9, 35.2),
(216, '2024-05-13 15:25:00', 68, 25.7, 57.5, 70, 21.3, 32.4),
(217, '2024-05-13 15:26:00', 0, 25.6, -1, 69, 21.1, 0),
(218, '2024-05-13 15:27:00', 11, 25.5, 2.1, 69, 21, 275.3),
(219, '2024-05-13 15:28:00', 11, 25.4, 1.3, 69, 20.9, 0),
(220, '2024-05-13 15:29:00', 64, 25, 41, 70, 20.5, 66),
(221, '2024-05-13 15:30:00', 19, 25.1, 4.3, 70, 20.6, 0),
(222, '2024-05-13 15:31:00', 46, 25.1, 20.3, 70, 20.6, 42.5),
(223, '2024-05-13 15:32:00', 22, 25.1, 5.4, 70, 20.6, 0),
(224, '2024-05-13 15:33:00', 69, 25.1, 60.7, 70, 20.6, 35.8),
(225, '2024-05-13 15:34:00', 0, 25.1, -1, 70, 20.6, 0),
(226, '2024-05-13 15:35:00', 0, 25.1, -1, 70, 20.6, 0),
(227, '2024-05-13 15:36:00', 0, 25, -1, 70, 20.5, 0),
(228, '2024-05-13 15:37:00', 0, 25, -1, 70, 20.5, 0),
(229, '2024-05-13 15:38:00', 0, 25.1, -1, 70, 20.6, 0),
(230, '2024-05-13 15:39:00', 0, 25.1, -1, 70, 20.6, 0),
(231, '2024-05-13 15:40:00', 19, 25.1, 4.7, 70, 20.6, 0),
(232, '2024-05-13 15:41:00', 41, 25, 6.4, 70, 20.5, 0),
(233, '2024-05-13 15:42:00', 68, 25, 50, 70, 20.5, 34.5),
(234, '2024-05-13 15:43:00', 28, 25.1, 7.3, 70, 20.6, 0),
(235, '2024-05-13 15:44:00', 37, 25.1, 8.8, 69, 20.6, 0),
(236, '2024-05-13 15:45:00', 18, 25, 4.2, 69, 20.4, 0),
(237, '2024-05-13 15:46:00', 13, 25, 3, 69, 20.4, 0),
(238, '2024-05-13 15:47:00', 69, 25, 54.2, 70, 20.5, 33.6),
(239, '2024-05-13 15:48:00', 68, 25, 59.7, 70, 20.5, 36.1),
(240, '2024-05-13 15:49:00', 13, 25, 2.9, 70, 20.5, 0),
(241, '2024-05-13 15:50:00', 33, 25, 9, 70, 20.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sensor`
--

CREATE TABLE `tb_sensor` (
  `id` int(11) NOT NULL,
  `rain` float DEFAULT NULL,
  `temp` float DEFAULT NULL,
  `soil` float DEFAULT NULL,
  `hum` float DEFAULT NULL,
  `hindex` float DEFAULT NULL,
  `sun` float DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sensor`
--

INSERT INTO `tb_sensor` (`id`, `rain`, `temp`, `soil`, `hum`, `hindex`, `sun`, `timestamp`) VALUES
(1, 0, 25.1, -1, 70, 20.6, 0, '2024-05-07 05:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `tb_status`
--

CREATE TABLE `tb_status` (
  `id` int(11) NOT NULL,
  `statIrr` int(11) NOT NULL,
  `statMist` int(11) NOT NULL,
  `statHeater` int(11) NOT NULL,
  `statLamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_status`
--

INSERT INTO `tb_status` (`id`, `statIrr`, `statMist`, `statHeater`, `statLamp`) VALUES
(1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_threshold`
--

CREATE TABLE `tb_threshold` (
  `id` int(11) NOT NULL,
  `pumpIrrigation` int(11) NOT NULL,
  `pumpMist` int(11) NOT NULL,
  `heater` int(11) NOT NULL,
  `lamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_threshold`
--

INSERT INTO `tb_threshold` (`id`, `pumpIrrigation`, `pumpMist`, `heater`, `lamp`) VALUES
(1, 64, 37, 61, 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_device`
--
ALTER TABLE `tb_device`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_logsensor`
--
ALTER TABLE `tb_logsensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_status`
--
ALTER TABLE `tb_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_threshold`
--
ALTER TABLE `tb_threshold`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_device`
--
ALTER TABLE `tb_device`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_logsensor`
--
ALTER TABLE `tb_logsensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;

--
-- AUTO_INCREMENT for table `tb_sensor`
--
ALTER TABLE `tb_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18289;

--
-- AUTO_INCREMENT for table `tb_status`
--
ALTER TABLE `tb_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_threshold`
--
ALTER TABLE `tb_threshold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
