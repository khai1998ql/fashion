-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 15, 2020 lúc 05:57 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sub` varchar(100) DEFAULT NULL,
  `images` varchar(100) DEFAULT NULL,
  `banner` varchar(100) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `key` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `sub`, `images`, `banner`, `id_store`, `group`, `key`, `status`, `created_at`, `update_at`) VALUES
(1, 'Áo', 'ao', NULL, NULL, 1, 1, 1, 1, '2020-06-17 17:17:58', '2020-06-27 18:31:09'),
(2, 'Áo sơ mi', 'ao-so-mi', NULL, NULL, 1, 1, 0, 0, '2020-06-17 17:18:28', '2020-06-27 18:31:14'),
(14, 'Áo khoác', 'ao-khoac', NULL, NULL, 1, 1, 0, 1, '2020-06-19 09:35:19', '2020-06-19 09:35:19'),
(15, 'Áo len', 'ao-len', NULL, NULL, 1, 1, 0, 1, '2020-06-19 09:35:28', '2020-06-19 09:35:28'),
(16, 'Quần', 'quan', NULL, NULL, 1, 2, 1, 1, '2020-06-19 09:35:55', '2020-06-19 09:57:04'),
(17, 'Quần kaki', 'quan-kaki', NULL, NULL, 1, 2, 0, 1, '2020-06-19 09:57:16', '2020-06-19 09:57:16'),
(18, 'Quần Short', 'quan-short', NULL, NULL, 1, 2, 0, 1, '2020-06-19 09:58:22', '2020-06-19 09:58:22'),
(19, 'Quần thể thao', 'quan-the-thao', NULL, NULL, 1, 2, 0, 1, '2020-06-19 09:59:16', '2020-06-19 09:59:16'),
(23, 'Phụ kiện', 'phu-kien', NULL, NULL, 1, 4, 1, 1, '2020-06-19 10:00:45', '2020-06-19 10:00:47'),
(24, 'Thắt lưng', 'that-lung', NULL, NULL, 1, 4, 0, 1, '2020-06-19 10:01:02', '2020-06-19 10:01:02'),
(25, 'Ví nam', 'vi-nam', NULL, NULL, 1, 4, 0, 1, '2020-06-19 10:01:13', '2020-06-19 10:01:13'),
(27, 'Cặp da', 'cap-da', NULL, NULL, 1, 4, 0, 1, '2020-06-19 10:01:39', '2020-06-19 10:01:39'),
(28, 'Giày da', 'giay-da', NULL, NULL, 1, 4, 0, 1, '2020-06-19 10:01:53', '2020-06-19 10:01:53'),
(29, 'Quần âu', 'quan-au', NULL, NULL, 1, 2, 0, 1, '2020-06-20 18:06:47', '2020-06-20 18:07:39'),
(30, 'Cà vạt', 'ca-vat', NULL, NULL, 1, 4, 0, 1, '2020-06-27 08:15:53', '2020-06-27 08:15:53'),
(32, 'Đồ lót', 'do-lot', NULL, NULL, 1, 3, 1, 1, '2020-06-28 07:06:34', '2020-06-28 07:07:03'),
(33, 'Boxer', 'boxer', NULL, NULL, 1, 3, 0, 1, '2020-06-28 07:06:48', '2020-06-28 07:06:48'),
(34, 'Brief', 'brief', NULL, NULL, 1, 3, 0, 1, '2020-06-28 07:07:00', '2020-06-28 07:07:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1,
  `token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `address`, `password`, `avatar`, `status`, `token`, `created_at`, `update_at`) VALUES
(1, 'Nguyễn Sỹ Khải', 'khainguyensi.1998@gmail.com', '0355123450', 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, '2020-06-28 17:06:49'),
(2, 'Nguyen Sy Khai', '1khainguyensi.1998@gmail.com', '0355123450', 'Nghệ An', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, NULL, NULL),
(3, 'Nguyễn Đình Khuê', 'khuend@gmail.com', '0327748333', 'Bắc Ninh', 'e10adc3949ba59abbe56e057f20f883e', NULL, 1, NULL, '2020-06-29 03:20:59', '2020-06-29 03:20:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail`
--

CREATE TABLE `detail` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` char(10) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `id_store` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `detail`
--

INSERT INTO `detail` (`id`, `id_product`, `color`, `size`, `number`, `id_store`) VALUES
(178, 68, 'Xanh Nhạt', 'M', 79, 1),
(179, 68, 'Xanh Nhạt', 'L', 83, 1),
(180, 68, 'Xanh Nhạt', 'S', 100, 1),
(181, 68, 'Xanh Nhạt', 'XL', 94, 1),
(182, 69, 'Trắng', 'M', 100, 1),
(183, 69, 'Trắng', 'L', 100, 1),
(184, 69, 'Trắng', 'S', 100, 1),
(185, 69, 'Trắng', 'XL', 100, 1),
(186, 70, 'Trắng', 'M', 100, 1),
(187, 70, 'Trắng', 'L', 100, 1),
(188, 70, 'Trắng', 'S', 100, 1),
(189, 70, 'Trắng', 'XL', 93, 1),
(190, 71, 'Tím Than', 'M', 100, 1),
(191, 71, 'Tím Than', 'L', 100, 1),
(192, 71, 'Tím Than', 'S', 100, 1),
(193, 71, 'Tím Than', 'XL', 89, 1),
(194, 72, 'Tím Than', 'M', 100, 1),
(195, 72, 'Tím Than', 'L', 100, 1),
(196, 72, 'Tím Than', 'S', 100, 1),
(197, 72, 'Tím Than', 'XL', 100, 1),
(198, 73, 'Trắng', 'M', 100, 1),
(199, 73, 'Trắng', 'L', 100, 1),
(200, 73, 'Trắng', 'S', 100, 1),
(201, 73, 'Trắng', 'XL', 100, 1),
(202, 74, 'Hồng', 'M', 100, 1),
(203, 74, 'Hồng', 'L', 100, 1),
(204, 74, 'Hồng', 'S', 100, 1),
(205, 74, 'Hồng', 'XL', 88, 1),
(206, 75, 'Xanh Biển', 'M', 100, 1),
(207, 75, 'Xanh Biển', 'L', 100, 1),
(208, 75, 'Xanh Biển', 'S', 100, 1),
(209, 75, 'Xanh Biển', 'XL', 100, 1),
(210, 76, 'Tím Than', 'M', 100, 1),
(211, 76, 'Tím Than', 'L', 100, 1),
(212, 76, 'Tím Than', 'S', 100, 1),
(213, 76, 'Tím Than', 'XL', 100, 1),
(214, 77, 'Trắng', 'M', 100, 1),
(215, 77, 'Trắng', 'L', 100, 1),
(216, 77, 'Trắng', 'S', 100, 1),
(217, 77, 'Trắng', 'XL', 100, 1),
(218, 78, 'Tím Than', 'M', 96, 1),
(219, 78, 'Tím Than', 'L', 100, 1),
(220, 78, 'Tím Than', 'S', 100, 1),
(221, 78, 'Tím Than', 'XL', 100, 1),
(222, 79, 'Tím Than', 'M', 100, 1),
(223, 79, 'Tím Than', 'L', 100, 1),
(224, 79, 'Tím Than', 'S', 100, 1),
(225, 79, 'Tím Than', 'XL', 100, 1),
(226, 80, 'Đen', 'M', 100, 1),
(227, 80, 'Đen', 'L', 100, 1),
(228, 80, 'Đen', 'S', 100, 1),
(229, 80, 'Đen', 'XL', 100, 1),
(230, 81, 'Xanh Biển', 'M', 100, 1),
(231, 81, 'Xanh Biển', 'L', 100, 1),
(232, 81, 'Xanh Biển', 'S', 100, 1),
(233, 81, 'Xanh Biển', 'XL', 100, 1),
(234, 82, 'Nâu', 'M', 93, 1),
(235, 82, 'Nâu', 'L', 82, 1),
(236, 82, 'Nâu', 'S', 100, 1),
(237, 82, 'Nâu', 'XL', 100, 1),
(238, 82, 'Xám', 'M', 100, 1),
(239, 82, 'Xám', 'L', 100, 1),
(240, 82, 'Xám', 'S', 100, 1),
(241, 82, 'Xám', 'XL', 85, 1),
(242, 83, 'Xanh Biển', 'M', 100, 1),
(243, 83, 'Xanh Biển', 'L', 100, 1),
(244, 83, 'Xanh Biển', 'S', 100, 1),
(245, 83, 'Xanh Biển', 'XL', 94, 1),
(246, 84, 'Xám', 'M', 96, 1),
(247, 84, 'Xám', 'L', 100, 1),
(248, 84, 'Xám', 'S', 100, 1),
(249, 84, 'Xám', 'XL', 100, 1),
(250, 85, 'Đen', 'M', 100, 1),
(251, 85, 'Đen', 'L', 99, 1),
(252, 85, 'Đen', 'S', 100, 1),
(253, 85, 'Đen', 'XL', 100, 1),
(254, 85, 'Nâu', 'M', 100, 1),
(255, 85, 'Nâu', 'L', 100, 1),
(256, 85, 'Nâu', 'S', 100, 1),
(257, 85, 'Nâu', 'XL', 100, 1),
(258, 86, 'Xám', 'M', 100, 1),
(259, 86, 'Xám', 'L', 95, 1),
(260, 86, 'Xám', 'S', 100, 1),
(261, 86, 'Xám', 'XL', 100, 1),
(262, 87, 'Xanh Biển', 'M', 100, 1),
(263, 87, 'Xanh Biển', 'L', 94, 1),
(264, 87, 'Xanh Biển', 'S', 100, 1),
(265, 87, 'Xanh Biển', 'XL', 100, 1),
(266, 88, 'Đen', 'M', 98, 1),
(267, 88, 'Đen', 'L', 90, 1),
(268, 88, 'Đen', 'S', 100, 1),
(269, 88, 'Đen', 'XL', 100, 1),
(270, 89, 'Nâu', 'M', 99, 1),
(271, 89, 'Nâu', 'L', 100, 1),
(272, 89, 'Nâu', 'S', 100, 1),
(273, 89, 'Nâu', 'XL', 100, 1),
(274, 90, 'Đen', 'M', 100, 1),
(275, 90, 'Đen', 'L', 100, 1),
(276, 90, 'Đen', 'S', 100, 1),
(277, 90, 'Đen', 'XL', 88, 1),
(278, 91, 'Đen', 'M', 100, 1),
(279, 91, 'Đen', 'L', 100, 1),
(280, 91, 'Đen', 'S', 100, 1),
(281, 91, 'Đen', 'XL', 100, 1),
(282, 92, 'Đen', 'M', 100, 1),
(283, 92, 'Đen', 'L', 100, 1),
(284, 92, 'Đen', 'S', 88, 1),
(285, 92, 'Đen', 'XL', 100, 1),
(286, 93, 'Nâu', 'M', 100, 1),
(287, 93, 'Nâu', 'L', 100, 1),
(288, 93, 'Nâu', 'S', 100, 1),
(289, 93, 'Nâu', 'XL', 100, 1),
(290, 94, 'Đen', 'M', 100, 1),
(291, 94, 'Đen', 'L', 100, 1),
(292, 94, 'Đen', 'S', 100, 1),
(293, 94, 'Đen', 'XL', 100, 1),
(294, 95, 'Đen', 'M', 100, 1),
(295, 95, 'Đen', 'L', 100, 1),
(296, 95, 'Đen', 'S', 100, 1),
(297, 95, 'Đen', 'XL', 100, 1),
(298, 96, 'Trắng', 'M', 100, 1),
(299, 96, 'Trắng', 'L', 100, 1),
(300, 96, 'Trắng', 'S', 100, 1),
(301, 96, 'Trắng', 'XL', 100, 1),
(302, 97, 'Trắng', 'M', 100, 1),
(303, 97, 'Trắng', 'L', 100, 1),
(304, 97, 'Trắng', 'S', 94, 1),
(305, 97, 'Trắng', 'XL', 100, 1),
(306, 98, 'Xám', 'M', 100, 1),
(307, 98, 'Xám', 'L', 100, 1),
(308, 98, 'Xám', 'S', 100, 1),
(309, 98, 'Xám', 'XL', 100, 1),
(310, 99, 'Đỏ', 'M', 95, 1),
(311, 99, 'Đỏ', 'L', 100, 1),
(312, 99, 'Đỏ', 'S', 100, 1),
(313, 99, 'Đỏ', 'XL', 100, 1),
(314, 100, 'Xanh Nhạt', 'XL', 100, 1),
(315, 101, 'Đen', 'M', 100, 1),
(316, 101, 'Đen', 'L', 100, 1),
(317, 101, 'Đen', 'S', 100, 1),
(318, 101, 'Đen', 'XL', 88, 1),
(319, 102, 'Xám', 'M', 100, 1),
(320, 102, 'Xám', 'L', 100, 1),
(321, 102, 'Xám', 'S', 100, 1),
(322, 102, 'Xám', 'XL', 100, 1),
(323, 103, 'Đen', 'M', 100, 1),
(324, 103, 'Đen', 'L', 100, 1),
(325, 103, 'Đen', 'S', 100, 1),
(326, 103, 'Đen', 'XL', 100, 1),
(327, 104, 'Xám', 'M', 100, 1),
(328, 104, 'Xám', 'L', 100, 1),
(329, 104, 'Xám', 'S', 100, 1),
(330, 104, 'Xám', 'XL', 100, 1),
(331, 105, 'Đen', 'M', 100, 1),
(332, 105, 'Đen', 'L', 200, 1),
(333, 105, 'Đen', 'S', 1300, 1),
(334, 105, 'Xám', 'M', 100, 1),
(335, 105, 'Xám', 'L', 200, 1),
(336, 105, 'Xám', 'S', 1300, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `size` char(15) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_transaction`, `id_product`, `color`, `size`, `qty`, `price`, `id_store`, `created_at`, `update_at`) VALUES
(29, 29, 66, 'Trắng', 'L', 16, 500000, 1, '2020-06-28 16:49:05', '2020-06-28 16:49:05'),
(30, 30, 68, 'Xanh Nhạt', 'M', 3, 625000, 1, '2020-06-29 03:44:03', '2020-06-29 03:44:03'),
(31, 30, 70, 'Trắng', 'XL', 7, 725000, 1, '2020-06-29 03:44:04', '2020-06-29 03:44:04'),
(32, 31, 99, 'Đỏ', 'M', 5, 450000, 1, '2020-06-29 03:45:26', '2020-06-29 03:45:26'),
(33, 32, 71, 'Tím Than', 'XL', 11, 625000, 1, '2020-06-29 03:47:36', '2020-06-29 03:47:36'),
(34, 32, 97, 'Trắng', 'S', 6, 3000000, 1, '2020-06-29 03:47:36', '2020-06-29 03:47:36'),
(35, 33, 83, 'Xanh Biển', 'XL', 6, 700000, 1, '2020-06-29 03:48:33', '2020-06-29 03:48:33'),
(36, 33, 87, 'Xanh Biển', 'L', 6, 300000, 1, '2020-06-29 03:48:33', '2020-06-29 03:48:33'),
(37, 34, 74, 'Hồng', 'XL', 12, 725000, 1, '2020-06-29 03:49:03', '2020-06-29 03:49:03'),
(38, 35, 101, 'Đen', 'XL', 12, 125000, 1, '2020-06-29 03:49:30', '2020-06-29 03:49:30'),
(39, 36, 90, 'Đen', 'XL', 12, 500000, 1, '2020-06-29 03:49:57', '2020-06-29 03:49:57'),
(40, 37, 92, 'Đen', 'S', 12, 700000, 1, '2020-06-29 03:50:32', '2020-06-29 03:50:32'),
(41, 38, 86, 'Xám', 'L', 5, 500000, 1, '2020-06-29 08:35:13', '2020-06-29 08:35:13'),
(42, 39, 68, 'Xanh Nhạt', 'M', 15, 625000, 1, '2020-07-03 16:42:11', '2020-07-03 16:42:11'),
(43, 39, 68, 'Xanh Nhạt', 'L', 15, 625000, 1, '2020-07-03 16:42:11', '2020-07-03 16:42:11'),
(44, 39, 82, 'Nâu', 'L', 15, 650000, 1, '2020-07-03 16:42:11', '2020-07-03 16:42:11'),
(45, 39, 82, 'Xám', 'XL', 15, 650000, 1, '2020-07-03 16:42:11', '2020-07-03 16:42:11'),
(46, 40, 82, 'Nâu', 'L', 1, 650000, 1, '2020-07-08 14:19:57', '2020-07-08 14:19:57'),
(47, 40, 78, 'Tím Than', 'M', 4, 1450000, 1, '2020-07-08 14:19:57', '2020-07-08 14:19:57'),
(48, 41, 68, 'Xanh Nhạt', 'L', 1, 625000, 1, '2020-07-08 14:30:58', '2020-07-08 14:30:58'),
(49, 41, 88, 'Đen', 'L', 10, 300000, 1, '2020-07-08 14:30:58', '2020-07-08 14:30:58'),
(50, 42, 68, 'Xanh Nhạt', 'XL', 2, 625000, 1, '2020-07-08 15:04:33', '2020-07-08 15:04:33'),
(51, 43, 68, 'Xanh Nhạt', 'XL', 2, 625000, 1, '2020-07-08 15:05:10', '2020-07-08 15:05:10'),
(52, 44, 68, 'Xanh Nhạt', 'XL', 2, 625000, 1, '2020-07-08 15:35:40', '2020-07-08 15:35:40'),
(53, 45, 88, 'Đen', 'M', 2, 300000, 1, '2020-07-08 15:44:34', '2020-07-08 15:44:34'),
(54, 46, 82, 'Nâu', 'M', 1, 650000, 1, '2020-07-08 16:07:17', '2020-07-08 16:07:17'),
(55, 47, 82, 'Nâu', 'M', 4, 650000, 1, '2020-07-08 16:07:41', '2020-07-08 16:07:41'),
(56, 48, 82, 'Nâu', 'L', 1, 650000, 1, '2020-07-08 17:36:51', '2020-07-08 17:36:51'),
(57, 49, 68, 'Xanh Nhạt', 'L', 1, 625000, 1, '2020-07-08 17:51:54', '2020-07-08 17:51:54'),
(58, 50, 68, 'Xanh Nhạt', 'M', 1, 625000, 1, '2020-07-09 00:02:23', '2020-07-09 00:02:23'),
(59, 51, 84, 'Xám', 'M', 1, 700000, 1, '2020-07-09 00:51:21', '2020-07-09 00:51:21'),
(60, 52, 89, 'Nâu', 'M', 1, 1000000, 1, '2020-07-14 18:10:22', '2020-07-14 18:10:22'),
(61, 52, 82, 'Nâu', 'M', 2, 650000, 1, '2020-07-14 18:10:22', '2020-07-14 18:10:22'),
(62, 53, 84, 'Xám', 'M', 1, 700000, 1, '2020-07-14 18:17:01', '2020-07-14 18:17:01'),
(63, 54, 68, 'Xanh Nhạt', 'M', 2, 625000, 1, '2020-07-14 18:18:57', '2020-07-14 18:18:57'),
(64, 55, 85, 'Đen', 'L', 1, 625000, 1, '2020-07-14 18:21:12', '2020-07-14 18:21:12'),
(65, 56, 84, 'Xám', 'M', 2, 700000, 1, '2020-07-14 18:33:22', '2020-07-14 18:33:22'),
(66, 57, 82, 'Nâu', 'L', 1, 650000, 1, '2020-07-15 10:33:14', '2020-07-15 10:33:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sub` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `detail` varchar(250) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `group_category` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT 0,
  `avatar` varchar(100) DEFAULT NULL,
  `image1` varchar(100) DEFAULT NULL,
  `image2` varchar(100) DEFAULT NULL,
  `image3` varchar(100) DEFAULT NULL,
  `image4` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `number` int(11) NOT NULL,
  `view` int(11) DEFAULT NULL,
  `hot` tinyint(4) DEFAULT 0,
  `pay` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `sub`, `price`, `detail`, `id_store`, `id_category`, `group_category`, `sale`, `avatar`, `image1`, `image2`, `image3`, `image4`, `content`, `number`, `view`, `hot`, `pay`, `created_at`, `update_at`) VALUES
(68, 'ÁO SƠ MI NAM ARISTINO ASS091S9', 'ao-so-mi-nam-aristino-ass091s9', 625000, 'Xanh Nhạt-M-100|Xanh Nhạt-L-100|Xanh Nhạt-S-100|Xanh Nhạt-XL-100|', 1, 2, 1, 0, 'dY5R8s.jpg', 'HhSQpz.jpg', 'bem5q4.jpg', 'jtTSlY.jpg', 'u1ahL9.', '+KIỂU DÁNG: REGULAR FIT - TÀ BẰNG\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Regular Fit suông nhẹ.\r\n\r\n- Thiết kế hướng đến sự thoải mái với tà bằng và túi ngực không khuy. Họa tiết in chấm trắng trên nền vải xanh nhạt mang đến diện mạo trẻ trung cho người mặc. Áo dễ phối đồ và thích hợp để mặc trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc. Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Xanh nhạt in chấm trắng\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 40, '2020-06-28 17:56:20', '2020-07-15 04:54:33'),
(69, 'ÁO SƠ MI DÀI TAY ARISTINO ALSR09', 'ao-so-mi-dai-tay-aristino-alsr09', 600000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 2, 1, 0, 'BpbOre.jpg', NULL, '7gjSn9.', 're5yW7.', 'tO1U5l.', '+KIỂU DÁNG: SLIM FIT - Tà Lượn\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi trắng dài tay phom dáng Slim fit ôm vừa, tôn dáng và trẻ trung.\r\n\r\n- Thiết kế basic với cổ đứng chỉn chu, túi ngực không khuy và tà lượn thời trang. Áo dễ kết hợp với nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.\r\n\r\nCHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc.\r\n\r\n- Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Trắng 4\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-28 17:57:57', '2020-06-28 17:57:57'),
(70, 'ÁO SƠ MI NAM ARISTINO ASS103S9', 'ao-so-mi-nam-aristino-ass103s9', 725000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 2, 1, 0, 'MXDLYT.jpg', 'KjnVTh.jpg', 'R3erfP.', 'HvYwDf.', 'N2i5eY.', '+KIỂU DÁNG: REGULAR FIT - Tà Bằng\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Regular Fit suông nhẹ, thoải mái mà vẫn đảm bảo vừa vặn số đo hình thể.\r\n\r\n- Thiết kế nam tính với túi ngực tiện lợi, tà bằng, có thể sơ vin hoặc thả ngoài tùy vào từng hoàn cảnh cụ thể. Họa tiết kẻ caro xanh đậm nhạt trên nền trắng, mang đến nhiều lựa chọn kết hợp trang phục.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Modal từ sợi sồi thiên nhiên cho mặt vải mềm mại, nhẹ và thoáng mát vào mùa hè, ấm vào mùa đông, mang lại cảm giác thoải mái tối đa cho người mặc vào mọi mùa trong năm. Kết hợp Poly có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Trắng caro xanh nhạt\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 7, '2020-06-29 00:37:58', '2020-06-29 03:54:18'),
(71, 'ÁO SƠ MI NAM ARISTINO ASS064S9', 'ao-so-mi-nam-aristino-ass064s9', 625000, 'Tím Than-M-100|Tím Than-L-100|Tím Than-S-100|Tím Than-XL-100|', 1, 2, 1, 0, 'syQ4uL.jpg', 'bLxBE9.jpg', '3eofvY.jpg', 'uCctjs.', 'dHQc4G.', '+KIỂU DÁNG: REGULAR FIT - Tà Bằng\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Regular Fit suông nhẹ.\r\n\r\n- Thiết kế hướng đến sự thoải mái với tà bằng và túi ngực không khuy. Họa tiết in ô vuông trắng ấn tượng trên nền vải xanh tím than nam tính. Áo thích hợp phối cùng quần âu, quần khaki trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc.\r\n\r\n- Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Xanh tím than in ô vuông\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 11, '2020-06-29 00:40:58', '2020-06-29 03:54:23'),
(72, 'ÁO SƠ MI NAM NGẮN TAY ARISTINO ASS033S9', 'ao-so-mi-nam-ngan-tay-aristino-ass033s9', 525000, 'Tím Than-M-100|Tím Than-L-100|Tím Than-S-100|Tím Than-XL-100|', 1, 2, 1, 0, 'mfklXy.jpg', 'UbHjQC.', 'XlyC5s.', '7ijft5.', 'fhmrUZ.', '+KIỂU DÁNG: SLIM FIT - Tà Lượn\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Slim Fit ôm vừa vặn kết hợp tà lượn thời trang.\r\n\r\n- Thiết kế tối giản không túi ngực và cổ áo bản nhỏ lịch sự. Họa tiết dệt yarn dye kẻ caro trắng ấn tượng trên nền vải xanh tím than nam tính. Áo thích hợp để mặc trong nhiều hoàn cảnh khác nhau.\r\n\r\nCHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc. Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Xanh tím than caro-trắng\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-29 00:43:11', '2020-06-29 00:43:11'),
(73, 'ÁO SƠ MI NGẮN TAY ARISTINO ASS107S9', 'ao-so-mi-ngan-tay-aristino-ass107s9', 500000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 2, 1, 0, 'WoXpRG.jpg', 'Wh2DVA.', 'vuRHP7.', 'IBvAbV.', 'sgJcRY.', '+KIỂU DÁNG: SLIM FIT - Tà Lượn\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Slim Fit vừa vặn và tôn dáng.\r\n\r\n- Thiết kế tối giản với cổ đứng gọn gàng và tà lượn thời trang. Áo in họa tiết chim xanh trên nền trắng thanh lịch mang đến cho người mặc diện mạo ấn tượng. Áo thích hợp kết hợp nhiều trang phục trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre thiên nhiên giúp bề mặt vải mềm nhẹ, thoáng mát, thấm hút tốt tạo cảm giác dễ chịu cho người mặc. Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Trắng in chim xanh\r\n\r\n+SIZE: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-29 00:44:36', '2020-06-29 00:44:36'),
(74, 'ÁO SƠ MI NGẮN TAY ASS015S9', 'ao-so-mi-ngan-tay-ass015s9', 725000, 'Hồng-M-100|Hồng-L-100|Hồng-S-100|Hồng-XL-100|', 1, 2, 1, 0, 'sH68yk.jpg', 'Kl3rDp.jpg', 'woHO6x.jpg', 'd9QFxj.', 'MLOvFo.', '+KIỂU DÁNG: Regular fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Regular Fit suông nhẹ, thoải mái mà vẫn đảm bảo vừa vặn số đo hình thể người mặc.\r\n\r\n- Thiết kế cơ bản , tà lượn thời trang, không túi ngực, dệt họa tiết kẻ sọc phối kẻ xước tự nhiên độc đáo. Áo có thể phối hợp với nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Modal từ sợi sồi thiên nhiên kết hợp Cotton từ sợi bông mang lại sự mềm mại mướt nhẹ cho bề mặt vải, lại thoảng mát, thấm hút mồ hôi, áo ít nhăn co.\r\n\r\n- Kết hợp sợi Microfiber mềm mịn, dễ làm sạch bụi bẩn trên áo và giúp áo bền màu. 3% sợi Spandex giúp áo có độ đàn hồi nhẹ.\r\n\r\n+MÀU SẮC: Hồng kẻ sọc Jacquard\r\n\r\n+Size: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 12, '2020-06-29 00:49:05', '2020-06-29 03:54:27'),
(75, 'ÁO SƠ MI NGẮN TAY ARISTINO ASS087S9', 'ao-so-mi-ngan-tay-aristino-ass087s9', 625000, 'Xanh Biển-M-100|Xanh Biển-L-100|Xanh Biển-S-100|Xanh Biển-XL-100|', 1, 2, 1, 0, 'uwAFGr.jpg', 'cChdqo.jpg', '21iUWJ.', 'mS7nl3.', 'nQ8f6B.', '+KIỂU DÁNG: Slim fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Slim Fit ôm vừa, trẻ trung.\r\n\r\n- Thiết kế cơ bản, không túi ngực, tà lượn thời trang, màu sắc cơ bản kết hợp họa tiết dobby, mang đến vẻ ngoài lịch lãm, chỉn chu.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Modal từ sợi sồi thiên nhiên cho mặt vải mềm nhẹ, thoáng mát, có khả năng điều hòa, tăng khả năng thấm hút mồ hôi và thoát ẩm. Áo có khả năng kháng khuẩn nhẹ, ít nhăn và dễ là phẳng.\r\n\r\n- Kết hợp Polyspun có tính đàn hồi, hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n \r\n\r\n+MÀU SẮC: Xanh biển sọc dobby\r\n\r\n+Size: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-29 00:52:25', '2020-06-29 00:52:25'),
(76, 'ÁO SƠ MI NGẮN TAY ARISTINO ASS038S9', 'ao-so-mi-ngan-tay-aristino-ass038s9', 500000, 'Tím Than-M-100|Tím Than-L-100|Tím Than-S-100|Tím Than-XL-100|', 1, 2, 1, 0, 'w7ZSjW.jpg', 'rs3WFV.', 'yL2C8Z.', 'nTHajP.', '2wOW4J.', '+KIỂU DÁNG: Slim fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi ngắn tay phom dáng Slim Fit ôm vừa vặn, tôn dáng người mặc.\r\n\r\n- Thiết kế tối giản, không túi ngực, tà lượn thời trang. Áo màu trung tính, có thể kết hợp được với nhiều loại trang phục với màu sắc khác nhau.\r\n\r\n+CHẤT LIỆU\r\n\r\n- Chất liệu Bamboo từ sợi tre có khả năng kháng khuẩn, kháng tia UV giúp áo có bề mặt mềm mại, thoáng mát.\r\n\r\n- Kết hợp Polyspun hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n+MÀU SẮC: Xanh tím than Solid\r\n\r\n+Size: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-29 00:54:04', '2020-06-29 00:54:04'),
(77, 'ÁO SƠ MI NGẮN TAY ASS059S9', 'ao-so-mi-ngan-tay-ass059s9', 700000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 2, 1, 0, 'HgTKb2.jpg', NULL, 'Y5a3iK.', 'iqnF6P.', 'BdXqIK.', '+KIỂU DÁNG: Regular fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo sơ mi trắng ngắn tay phom dáng Regular Fit suông nhẹ, thoải mái.\r\n\r\n- Thiết kế cơ bản với túi ngực tiện lợi, tà lượn trẻ trung, dệt họa tiết ô trám nam tính, có thể kết hợp với nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Bamboo từ sợi tre có khả năng kháng khuẩn, kháng tia UV giúp áo có bề mặt mềm mại, thoáng mát.\r\n\r\n- Kết hợp Polyspun hạn chế nhăn co, dễ là ủi và bền màu.\r\n\r\n \r\n\r\n+MÀU SẮC: Trắng dệt ô trám\r\n\r\n+Size: 38 – 39 – 40 – 41 – 42 – 43', 0, NULL, 0, 0, '2020-06-29 00:55:36', '2020-06-29 00:55:36'),
(78, 'ÁO KHOÁC NAM ARISTINO AJK044W8', 'ao-khoac-nam-aristino-ajk044w8', 1450000, 'Tím Than-M-100|Tím Than-L-100|Tím Than-S-100|Tím Than-XL-100|', 1, 14, 1, 0, 'ZpiqCP.jpg', NULL, 'eAV1C7.', 'BeZdys.', 'BXJLnt.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo Jacket chần bông cao cấp phom dáng Regular fit có độ suông vừa, thoải mái là lựa chọn hoàn hảo của phái mạnh trong những ngày đông lạnh buốt.\r\n\r\n- Thiết kế cổ trụ basic, bo chun gấu và tay áo giúp ngăn gió, giữ ấm đồng thời hạn chế xô lệch khi vận động. Các đường may ngang - chéo bo nhẹ thân áo giúp tôn lên vóc dáng của người mặc. Màu sắc nam tính kết hợp họa tiết in tinh tế mang đến cho nam giới diện mạo thu hút.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu 100% polyester giúp vải bền chắc, mượt và có độ bóng sắc nét. Áo dễ làm sạch và dễ bảo quản, có khả năng chống thấm nước nhẹ, cản gió và hạn chế bám bụi. Đồng thời bền màu, giữ nguyên định hình sau nhiều lần giặt.\r\n\r\n+MÀU SẮC: Xanh tím than 25, Đen 1in\r\n\r\n+SIZE: S – M – L – XL ', 0, NULL, 0, 4, '2020-06-29 00:57:23', '2020-07-11 18:12:10'),
(79, 'ÁO KHOÁC NAM ARISTINO AJK037W8', 'ao-khoac-nam-aristino-ajk037w8', 1000000, 'Tím Than-M-100|Tím Than-L-100|Tím Than-S-100|Tím Than-XL-100|', 1, 14, 1, 0, 'lN12Y4.jpg', 'Xz8HOt.', 'sDJvLz.', 'mgWR9L.', 'HiwuT7.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo jacket phom dáng Regular fit suông nhẹ, thoải mái mà vẫn đảm bảo vừa vặn số đo hình thể.\r\n\r\n- Thiết kế cổ dựng 6cm dệt borib giúp giữ ấm tốt. Gấu và tay áo bo vải rib giúp hạn chế xô lệch áo khi vận động. Áo có túi chéo mặt trước và túi xẻ bên trong ngực tiện lợi. Các đường may trang trí đơn giản mang đến vẻ đẹp nam tính và không kém phần ấn tượng. Màu sắc cơ bản, phù hợp mọi lứa tuổi và dễ kết hợp trang phục.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Rayon giúp bề mặt mềm, nhẹ, dễ chịu. Kết hợp Nylon giúp bề mặt sáng bóng, nhẵn mịn, sắc nét, chống nhăn, chống nhàu, giúp ngăn gió, giữ ấm tốt đồng thời kháng ẩm tốt và ngăn chặn tình trạng ẩm mốc. Áo có độ co giãn nhất định nhờ kết hợp 5% spandex.\r\n\r\n+MÀU SẮC: Xanh lá 27, Xanh tím than 8, Đen 9\r\n\r\n+SIZE: S – M – L – XL ', 0, NULL, 0, 0, '2020-06-29 01:00:04', '2020-06-29 01:00:04'),
(80, 'ÁO KHOÁC DA ARISTINO ALJ002W8', 'ao-khoac-da-aristino-alj002w8', 7000000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 14, 1, 0, 'WFD4iM.jpg', NULL, '7Fkz5l.', 'FwvH2t.', 'XzSxeO.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo da cừu 100% form dáng Regular Fit suông nhẹ, thoải mái, dễ kết hợp trang phục.\r\n\r\n- Thiết kế cổ đức lịch lãm, đường cắt may tỉ mỉ. Khóa kéo kim loại không gỉ, túi áo có nam châm ẩn giúp cố định miệng túi ngoài. Từng chi tiết như nút bấm, khóa kéo đều được gia cố từ bên trong giúp tăng độ bền.\r\n\r\n+CHẤT LIỆU\r\n\r\n- Mặt ngoài được lựa chọn từ những phần tốt nhất trên miếng da cừu, mang lại cảm giác mềm mại êm ái, bề mặt tự nhiên, da có tính đàn hồi, thông thoáng, giữ form tốt.\r\n\r\n- Mặt trong làm từ Polyester, bề mặt vải trơn mịn, thoáng mát lại có độ bóng, độ bền kéo và bền màu sắc nét.\r\n\r\n- Treo nơi khô thoáng, dùng khăn mềm chấm cồn pha loãng lau nhẹ hoặc giặt khô khi cần. Thoa sữa dưỡng nếu da bị khô. Spa miễn phí theo chính sách 6 tháng/lần của Aristino.\r\n\r\n+MÀU SẮC: Đen\r\n\r\n+Size: M – L - XL - S', 0, NULL, 0, 0, '2020-06-29 01:02:38', '2020-06-29 01:02:38'),
(81, 'ÁO JACKET ARISTINO AJK022W8', 'ao-jacket-aristino-ajk022w8', 1150000, 'Xanh Biển-M-100|Xanh Biển-L-100|Xanh Biển-S-100|Xanh Biển-XL-100|', 1, 14, 1, 0, 'lQ5qDa.jpg', 'tijYnv.', 'yFUng1.', 'P5C2Hh.', 'xcirUq.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo jacket phom dáng Regular fit suông nhẹ, thoải mái mà vẫn đảm bảo vừa vặn số đo hình thể.\r\n\r\n- Thiết kế cổ dựng 6cm dệt borib giúp giữ ấm tốt. Gấu và tay áo bo vải rib giúp hạn chế xô lệch áo khi vận động. Áo có túi chéo mặt trước và túi xẻ bên trong ngực tiện lợi. Các đường may trang trí đơn giản mang đến vẻ đẹp nam tính và không kém phần ấn tượng. Màu sắc cơ bản, phù hợp mọi lứa tuổi và dễ kết hợp trang phục.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Rayon giúp bề mặt mềm, nhẹ, dễ chịu. Kết hợp Nylon giúp bề mặt sáng bóng, nhẵn mịn, sắc nét, chống nhăn, chống nhàu, giúp ngăn gió, giữ ấm tốt đồng thời kháng ẩm tốt và ngăn chặn tình trạng ẩm mốc. Áo có độ co giãn nhất định nhờ kết hợp 5% spandex.\r\n\r\n+MÀU SẮC: Xanh lá 27, Xanh tím than 8, Đen 9\r\n\r\n+SIZE: S – M – L – XL ', 0, NULL, 0, 0, '2020-06-29 01:03:57', '2020-06-29 01:03:57'),
(82, 'ÁO LEN NAM ARISTINO AWO012W8', 'ao-len-nam-aristino-awo012w8', 650000, 'Nâu-M-100|Nâu-L-100|Nâu-S-100|Nâu-XL-100|Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 15, 1, 0, 'HokbQT.jpg', 'fm2d5W.', 'd7bgGW.', 'ka30X5.', 'rpX1na.', '+KIỂU DÁNG: SLIM FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo len phom dáng Slim Fit ôm gọn gàng và tôn dáng.\r\n\r\n- Thiết kế cổ tim basic, gấu và tay áo bo rib gọn gàng. Họa tiết dệt nổi đơn giản và tinh tế thích hợp với những người yêu thích vẻ đẹp tối giản. Hiệu ứng màu melange kết hợp màu sắc nam tính mang đến diện mạo thu hút cho người mặc. Áo dễ dàng kết hợp với mọi trang phục và phù hợp với mọi lứa tuổi.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu len Acrylic nhẹ, ấm, hạn chế xù lông. Đặc biệt co giãn, đàn hồi và giữ định hình tốt. Áo có khả năng kiểm soát ẩm tốt, thoáng, vẫn giữ ấm cơ thể nhưng không bí.\r\n\r\n- Kết hợp cotton mềm mịn, xốp nhẹ, dễ chịu với da.\r\n\r\n+MÀU SẮC: Xám 227M, Xám 225M, Xanh cổ vịt 40, Nâu 72\r\n\r\n+SIZE: S – M – L – XL ', 0, NULL, 0, 36, '2020-06-29 01:22:31', '2020-07-15 10:33:20'),
(83, 'ÁO LEN NAM ARISTINO AWO009W8', 'ao-len-nam-aristino-awo009w8', 700000, 'Xanh Biển-M-100|Xanh Biển-L-100|Xanh Biển-S-100|Xanh Biển-XL-100|', 1, 15, 1, 0, 'Zcz5qT.jpg', 'zSAEao.', 'zC0Q5G.', '1VQFdr.', 's8lKgH.', '+KIỂU DÁNG: SLIM FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Áo len phom dáng slim fit ôm vừa vặn cơ thể, tôn dáng người mặc.\r\n\r\n- Thiết kế tối giản, bo viền tay áo, gấu áo khỏe khoắn. Dệt cấu trúc hiện đại, bền chắc tạo, màu sắc đa dạng, dễ kết hợp với nhiều loại trang phục khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu acrylic nhẹ ấm, với khả năng kiểm soát độ ẩm cực tốt cùng khả năng đàn hồi và giữ nguyên định hình trong khi sử dụng. Ngoài ra thành phần Nylon có vai trò kháng ẩm tốt, ngăn chặn tình trạng ẩm mốc.\r\n\r\n- Kết hợp với cotton tạo nên bề mặt mềm mại, dễ chịu cho da khi mặc.\r\n\r\n+MÀU SẮC: Trắng 10, Nâu 53, Xanh cổ vịt 71, Xanh biển 82\r\n\r\n+SIZE: S – M – L – XL ', 0, NULL, 0, 6, '2020-06-29 01:24:55', '2020-06-29 03:54:25'),
(84, 'QUẦN KAKI NAM ARISTINO AKKR02', 'quan-kaki-nam-aristino-akkr02', 700000, 'Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 17, 2, 0, '8D9S1d.jpg', 'jaB5RJ.', '3djQHw.', 'wPUfW3.', 'wd4cUE.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần khaki phom dáng Regular Fit suông nhẹ mà vẫn đảm bảo vừa vặn số đo hình thể.\r\n\r\n- Quần dệt Dobby chỉn chu, đường may tỉ mỉ mang đến vẻ lịch lãm cho nam giới. Quần có túi xẻ hai bên và túi cài khuy phía sau tiện lợi. Thiết kế basic, màu sắc cơ bản giúp quần dễ dàng kết hợp với trang phục khác.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu 100% cotton cao cấp thoáng mát giúp quần thấm hút mồ hôi tốt, dễ chịu khi tiếp xúc với da và không gây kích ứng.\r\n\r\n+MÀU SẮC: Be 101, Be 43, Xám 130, Xám 135\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35', 0, NULL, 0, 3, '2020-06-29 01:26:55', '2020-07-14 18:33:29'),
(85, 'QUẦN KAKI NAM ARISTINO AKK00208', 'quan-kaki-nam-aristino-akk00208', 625000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|Nâu-M-100|Nâu-L-100|Nâu-S-100|Nâu-XL-100|', 1, 17, 2, 0, 'RtIk6L.jpg', 'CJgZpc.jpg', 'nRLXmF.', 'oUqC2A.', 'bp5nYH.', '+KIỂU DÁNG: REGULAR FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần khaki phom dáng Regular fit có độ suông nhẹ vừa vặn, thoải mái trong mọi hoạt động.\r\n\r\n- Thiết kế đứng dáng, đường may tỉ mỉ và chỉn chu với điểm nhấn logo thêu nổi ở cạp quần giúp nam giới có được sự tự tin, phong độ.\r\n\r\n- Quần có túi xẻ 2 bên, túi xẻ cài khuy và túi phụ tiện lợi. \r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu 100% CVC cao cấp là sự kết hợp ưu điểm của cotton tự nhiên mềm mại, thoáng mát, xốp nhẹ và độ bền chắc, màu sắc sắc nét của sợi nhân tạo giúp quần đứng dáng tự nhiên, không nhăn và bền màu.\r\n\r\n+MÀU SẮC: Nâu 24, Xám 206, Xanh rêu 29, Xanh tím than 45\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35', 0, NULL, 0, 1, '2020-06-29 01:29:43', '2020-07-14 18:21:17'),
(86, 'QUẦN SHORT NAM ARISTINO ASO017S9', 'quan-short-nam-aristino-aso017s9', 500000, 'Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 18, 2, 0, 'hFkujd.jpg', 'fir8YM.', 'nfsHB0.', 'bMIqs2.', 'PBMf5A.', '+KIỂU DÁNG: SLIMFIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần shorts âu phom dáng Slim Fit ôm vừa vặn, tôn dáng người mặc nhưng vẫn đảm bảo sự thoải mái, nam tính.\r\n\r\n- Thiết kế cơ bản với túi xẻ 2 bên, túi sau cài khuy tiện lợi, màu sắc trung tính, có thể kết hợp được nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Modal kết hợp Cotton giúp mặt vải mềm nhẹ, thoáng mát, thấm hút mồ hôi và thoát ẩm tốt.\r\n\r\n- Kết hợp Polyester giúp quần bền chắc, mượt và có độ bóng sắc nét và Spandex tạo độ co giãn nhẹ.\r\n\r\n+MÀU SẮC: Be 67, xám 93, Xanh tím than 26\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35', 0, NULL, 0, 5, '2020-06-29 01:31:41', '2020-07-03 16:21:42'),
(87, 'QUẦN SHORT ARISTINO ASO056S9', 'quan-short-aristino-aso056s9', 300000, 'Xanh Biển-M-100|Xanh Biển-L-100|Xanh Biển-S-100|Xanh Biển-XL-100|', 1, 18, 2, 10, 'Vib8Pq.jpg', 'cs8h0H.', '0VdyvT.', 'LpPl3M.', 'XeMuoz.', '+KIỂU DÁNG: Regular fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần shorts dệt kim phom dáng Regular Fit rộng rãi, thoải mái mà vẫn đảm bảo vừa vặn số đo hình thể.\r\n\r\n- Thiết kế nam tính với cạp chun dây rút co giãn thoải mái và túi xẻ 2 bên kéo khóa tiện lợi. Công nghệ ép cao tần (Emboss) tạo nên họa tiết sắc nét và mang đến diện mạo khỏe khoắn cho người mặc. Màu sắc cơ bản, dễ kết hợp với nhiều trang phục với màu sắc khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Polyester tạo cho sản phẩm sự bền đẹp đồng thời tăng khả năng chống nhăn, chống nước và bụi bẩn. Quần co giãn nhẹ nhờ sợi Spandex\r\n\r\n+MÀU SẮC: Xanh biển 70 emboss, Xanh tím than 36 emboss, Đen 9 emboss\r\n\r\n+Size: S – M – L – XL – XXL', 0, NULL, 0, 6, '2020-06-29 01:33:00', '2020-06-29 03:54:25'),
(88, 'Quần Short Nam Thể Thao PPP QN199', 'quan-short-nam-the-thao-ppp-qn199', 300000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 19, 2, 0, 'Rexh4P.jpg', 'k7gpBY.', 'Z9uX42.', 'nvgL8S.', 'y3WT6K.', '+KIỂU DÁNG: SLIMFIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần shorts âu phom dáng Slim Fit ôm vừa vặn, tôn dáng người mặc nhưng vẫn đảm bảo sự thoải mái, nam tính.\r\n\r\n- Thiết kế cơ bản với túi xẻ 2 bên, túi sau cài khuy tiện lợi, màu sắc trung tính, có thể kết hợp được nhiều trang phục khác nhau trong nhiều hoàn cảnh khác nhau.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Modal kết hợp Cotton giúp mặt vải mềm nhẹ, thoáng mát, thấm hút mồ hôi và thoát ẩm tốt.\r\n\r\n- Kết hợp Polyester giúp quần bền chắc, mượt và có độ bóng sắc nét và Spandex tạo độ co giãn nhẹ.\r\n\r\n+MÀU SẮC: Be 67, xám 93, Xanh tím than 26\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35', 0, NULL, 0, 12, '2020-06-29 01:37:23', '2020-07-11 18:12:01'),
(89, 'THẮT LƯNG DA NAM ARISTINO ABL05008', 'that-lung-da-nam-aristino-abl05008', 1000000, 'Nâu-M-100|Nâu-L-100|Nâu-S-100|Nâu-XL-100|', 1, 24, 4, 20, 'gtZRAf.jpg', 'Q90ETD.', 'sVKSyr.', 'AKXLm5.', 'k25FPf.', '+CHI TIẾT:\r\n\r\n- Thắt lưng da cao cấp với thiết kế đẳng cấp, sang trọng.\r\n\r\n- Bản dây rộng vừa phải, bề mặt dây lưng và mặt lưng đều tạo hình da cá sấu đầy nổi bật và ấn tượng. Mặt dây kim loại với mạ vàng sang trọng và chống gỉ, kết hợp mặt trượt tiện lợi.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, hạn chế hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, thoáng khí, bền chắc và mềm mại hơn sau thời gian dài sử dụng.\r\n\r\n+MÀU SẮC: Nâu\r\n\r\n+SIZE: 90/105 - 95/110 - 100/115 - 105/120 - 110/125', 0, NULL, 0, 1, '2020-06-29 01:41:45', '2020-07-14 18:18:21'),
(90, 'THẮT LƯNG DA NAM ARISTINO ABL01508', 'that-lung-da-nam-aristino-abl01508', 500000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 24, 4, 0, 'xswRWk.jpg', 'CJ7kOK.', '31y804.', 'gQa0LP.', 'nLSeQs.', '+CHI TIẾT:\r\n\r\n- Thắt lưng da cao cấp với thiết kế tối giản tạo nên sự sang trọng, lịch lãm.\r\n\r\n- Bản dây rộng vừa phải, bề mặt da trơn không họa tiết, đồng thời không kém phần đẳng cấp nhờ kết hợp mặt kim loại bạc khắc logo tinh tế, mặt trượt tự động tiện lợi.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu da bò cao cấp được nhập khẩu và xử lý tỉ mỉ, hạn chế hiện tượng nổ da. Bề mặt da có độ bóng tự nhiên, thoáng khí, bền chắc và mềm mại hơn sau thời gian dài sử dụng.\r\n\r\n+MÀU SẮC: Đen\r\n\r\n+SIZE: 90/105 - 95/110 - 100/115 - 105/120 - 110/125', 0, NULL, 0, 12, '2020-06-29 01:43:38', '2020-06-29 03:54:42'),
(91, 'VÍ DA NAM ARISTINO AWE02708', 'vi-da-nam-aristino-awe02708', 500000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 25, 4, 0, 'zAGrOk.jpg', 'k3MC5X.', '9djJHb.', 'arS5jK.', 'Y7MGrP.', '+CHI TIẾT:\r\n\r\n- Ví da dài dạng gập thiết kế lịch lãm và sang trọng với các chi tiết may tỉ mỉ và tinh tế.\r\n\r\n- Ví có nhiều ngăn chứa tiền, card và giấy tờ cá nhân được sắp xếp hợp lý, tiện tích tối đa. Ba lựa chọn màu sắc gồm Đen, Nâu và Xanh Navy không kén người dùng, phù hợp với nhiều lứa tuổi và mọi phong cách.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Da sauvage dập vân hạt mềm nam tính.\r\n\r\n- Chất liệu cao cấp thuộc dòng da sauvage từ phần da tốt nhất của động vật. Chất da tự nhiên không nhuộm, có độ xốp, thoáng khí, mềm mại và đàn hồi tốt, hạn chế tối đa hiện tượng đứt gãy hoặc nổ da.\r\n\r\n+MÀU SẮC: Nâu, Đen, Xanh tím than\r\n\r\n+SIZE: 80 x 185mm', 0, NULL, 0, 0, '2020-06-29 01:44:57', '2020-06-29 01:44:57'),
(92, 'BÓP TAY DA NAM ARISTINO ACL00108', 'bop-tay-da-nam-aristino-acl00108', 700000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 25, 4, 0, 'Ix7oWy.jpg', 'U1yV4t.', 'of7avA.', 'gHcWk0.', 'ODY4Zb.', '+CHI TIẾT:\r\n\r\n- Clutch da dành cho nam có thiết kế hiện đại và thời trang, đồng thời vẫn thanh lịch và nam tính.\r\n\r\n- Ví có nhiều ngăn được sắp xếp hợp lý giúp tăng sức chứa mà vẫn giữ được vẻ gọn gàng và tinh tế. Sản phẩm thích hợp với nam giới hiện đại, thường xuyên phải mang theo nhiều đồ đạc cá nhân hoặc ưa thích sự tiện dụng và gọn nhẹ.\r\n\r\n- Màu Đen và Nâu không kén người dùng, dễ kết hợp với trang phục.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu cao cấp thuộc dòng da sauvage từ phần da tốt nhất của động vật. Chất da tự nhiên không nhuộm, có độ xốp, thoáng khí, mềm mại và đàn hồi tốt, hạn chế tối đa hiện tượng đứt gãy hoặc nổ da.\r\n\r\n+MÀU SẮC: Đen, Nâu\r\n\r\n+SIZE: 270 x 170 x 30 mm', 0, NULL, 0, 12, '2020-06-29 01:45:58', '2020-06-29 03:54:46'),
(93, 'CẶP DA NAM ARISTINO ABC00308', 'cap-da-nam-aristino-abc00308', 7000000, 'Nâu-M-100|Nâu-L-100|Nâu-S-100|Nâu-XL-100|', 1, 27, 4, 0, 'YdIpLt.jpg', NULL, 'Ucs8Y3.', '0YUph1.', '6SFZ0n.', '+CHI TIẾT: \r\n\r\n- Cặp da cao cấp được sản xuất tỉ mỉ đến từng chi tiết.\r\n\r\n- Thiết kế đề cao tính thanh lịch và sang trọng với khóa kim loại, đường bo viền vuông có vát nhẹ vừa mềm mại, vừa nam tính.\r\n\r\n- Phân bố các ngăn chứa hợp lý giúp tăng sức chứa nhưng vẫn đảm bảo tổng thể gọn nhẹ và lịch lãm.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu da bò 2 lớp cao cấp được nhập khẩu và xử lý tỉ mỉ, hạn chế hiện tượng nổ da. Bề mặt da dập vân họa tiết, có độ bóng tự nhiên, thoáng khí, bền chắc và mềm mại hơn sau thời gian dài sử dụng.\r\n\r\n+MÀU SẮC: Đen, Nâu\r\n\r\n+KÍCH THƯỚC: 38 x 28 x 6 cm ', 0, NULL, 0, 0, '2020-06-29 01:47:16', '2020-06-29 01:47:16'),
(94, 'TÚI ĐEO CHÉO NAM ARISTINO ADB00108', 'tui-deo-cheo-nam-aristino-adb00108', 3000000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 27, 4, 0, 'FbpUT8.jpg', 'DExRKp.', '1nqRub.', 'h6jXnt.', 'mY3ECS.', '+CHI TIẾT:\r\n\r\n- Túi đeo da thiết kế nam tính và hiện đại với hai màu cơ bản Đen, Nâu dễ phối hợp với trang phục.\r\n\r\n- Thiết kế đa tiện ích, nhiều ngăn giúp tăng sức chứa mà vẫn nhỏ gọn và thanh lịch. Chứa vừa ví, điện thoại, Ipad và tài liệu nhỏ. Quai đeo chắc chắn, dệt logo chìm tinh tế, dễ dàng nới chỉnh độ dài. \r\n\r\n+CHẤT LIỆU:\r\n\r\n- Da sauvage dập vân hạt mềm nam tính và sang trọng.\r\n\r\n- Chất liệu cao cấp thuộc dòng da sauvage từ phần da tốt nhất của động vật. Chất da tự nhiên không nhuộm, có độ xốp, thoáng khí, mềm mại và đàn hồi tốt, hạn chế tối đa hiện tượng đứt gãy hoặc nổ da.\r\n\r\n+MÀU SẮC: Đen, Nâu\r\n\r\n+SIZE: 250 x 275 x 60 mm', 0, NULL, 0, 0, '2020-06-29 01:48:31', '2020-06-29 01:48:31'),
(95, 'GIÀY DA ARISTINO – RADLEY MOCASSIN ASH00808', 'giay-da-aristino-radley-mocassin-ash00808', 3600000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 28, 4, 0, 'PYNSXz.jpg', 'IYfsdm.', 'egyp78.', '3OF1j7.', 'bD90BJ.', '+KIỂU DÁNG: Casual\r\n\r\n- Giày Radley Mocassin (Driver) thiết kế đơn giản, dễ dàng phối đồ. Thích hợp trong các chuyến du lịch hoặc đi hàng ngày.\r\n\r\n+CHI TIẾT:\r\n\r\n- Đường may tỉ mỉ, tinh tế. Phom dáng ôm sát, vừa vặn với chân người đi mang đến sự êm ái, thoải mái tuyệt đối. Đế giày phẳng có đinh giúp tăng độ ma sát, đặc biệt phần đế cao su kéo dài tới gót giúp an toàn hơn khi lái xe. Hiệu ứng da bò dập vân đà điểu tự nhiên mang đến vẻ ngoài sang trọng và đẳng cấp.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Mặt ngoài làm từ 100% da bò Full grain lấy từ vùng lưng (là phần da tốt nhất). Da mềm đã xử lý để hạn chế thấm nước, tăng độ bền và dễ dàng vệ sinh.\r\n\r\n- Mặt trong làm từ da thật, có thể “thở”, tạo cảm giác mềm mại, êm chân, thông thoáng suốt cả ngày dài.\r\n\r\n+MÀU SẮC: Đen\r\n\r\n+Size: 39 – 40 – 41 – 42', 0, NULL, 0, 0, '2020-06-29 01:49:45', '2020-06-29 01:49:45'),
(96, 'GIÀY DA ARISTINO – GALVIN LOAFER ASH00508', 'giay-da-aristino-galvin-loafer-ash00508', 5000000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 28, 4, 0, 'j6KndC.jpg', 'Iha80r.', 'Lw9AW8.', 'tXv3Pj.', '7lZSXg.', '+KIỂU DÁNG: Smart casual \r\n\r\n- Giày Galvin Loafer thiết kế đơn giản tinh tế, có 2 màu đen - trắng, dễ phối hợp nhiều loại trang phục khác nhau như quần âu, khaki, short, áo Polo, áo T-shirt… đi hàng ngày hoặc du lịch, phù hợp cả đồ dự tiệc.\r\n\r\n+CHI TIẾT:\r\n\r\n- Thân giày được tạo nên từ 1 miếng da đồng nhất nhất tạo cảm giác liền lạc, mềm mại, thoáng khí, kết hợp chi tiết trang trí kim loại và đường may vòng quanh tạo điểm nhấn. Từng chi tiết được hoàn thiện tỉ mỉ. Phom dáng mang lại sự vừa vặn tuyệt đối với chân người mang. Phần đế tổng hợp êm ái, chống trơn trượt, gót cao nhẹ giúp tôn dáng.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Mặt ngoài làm từ 100% da bò Full grain lấy từ vùng lưng (là phần da tốt nhất). Da mềm đã xử lý để hạn chế thấm nước, tăng độ bền và dễ dàng vệ sinh.\r\n\r\n- Mặt trong làm từ da thật, có thể “thở”, tạo cảm giác mềm mại, êm chân, thông thoáng suốt cả ngày dài.\r\n\r\n+MÀU SẮC: Trắng, Đen\r\n\r\n+Size: 39 – 40 – 41 – 42', 0, NULL, 0, 0, '2020-06-29 01:51:08', '2020-06-29 01:51:08'),
(97, 'QUẦN ÂU NAM ARISTINO ATRG0109', 'quan-au-nam-aristino-atrg0109', 3000000, 'Trắng-M-100|Trắng-L-100|Trắng-S-100|Trắng-XL-100|', 1, 29, 2, 0, 'R3WCZ1.jpg', 'KCaB9d.', 'PVL4sB.', 'qT5MLh.', '2HKjX5.', '+KIỂU DÁNG: SLIM FIT\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần Âu golf thiết kế phom dáng thoải mái, phù hợp cho những vận động trên sân golf.\r\n\r\n- Quần đứng dáng, công nghệ nếp ly vĩnh viễn giúp người mặc giữ được dáng vẻ chỉn chu kể cả sau khi vận động. Quần có túi chéo phía trước, túi cài khuya phía sau và thêm ngăn khóa tiện lợi giúp người mặc có thể để những vật dụng nhỏ mà không lo bị rơi.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu 100% Polyester Stretch Natural cao cấp được xử lý với công nghệ tiên tiến Moisture Wicking anti UV tạo nên mặt cắt đặc biệt có các khoang rỗng trong sợi. Nhờ đó gia tăng khả năng thấm hút mồ hôi, thoáng khí, nhẹ hơn và khô nhanh hơn gấp 2 lần so với cotton, mang lại cảm giác dễ chịu cho cả ngày hoạt động.\r\n\r\n- Quần có khả năng chống nắng, kháng tia UV, giúp bảo vệ làn da khi hoạt động ngoài trời. Đồng thời có độ sắc nét, bền màu và giữ nguyên định hình sau nhiều lần giặt.\r\n\r\n+MÀU SẮC: Trắng 04 kẻ, Xám 48 kẻ, Be 96 kẻ\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35 ', 0, NULL, 0, 6, '2020-06-29 01:52:33', '2020-06-29 03:54:23'),
(98, 'QUẦN ÂU NAM ARISTINO ATR01009', 'quan-au-nam-aristino-atr01009', 700000, 'Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 29, 2, 0, 'YybKko.jpg', 'rLs2q3.', 'WBltdN.', 'cs1rY4.', '0HDz5i.', '+KIỂU DÁNG: Tapered fit\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần âu phom dáng Tapered Fit với phần trên được thiết kế thoải mái rộng rãi, ôm dần từ đầu gối xuống gấu, mang đến vẻ ngoài thời thượng cho người mặc.\r\n\r\n- Thiết kế tỉ mỉ từng đường nét, họa tiết kẻ caro nhỏ kết hợp túi xẻ 2 bên và túi cài sau tiện lợi. Quần thích hợp để kết hợp với các loại áo polo, áo sơ mi casual,... theo phong cách thoải mái ngoài văn phòng.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Polyester cho bề mặt quần trượt dễ chịu, không nhăn co, có độ bóng sáng, sắc nét.\r\n\r\n- Kết hợp cùng Viscose mịn mượt giúp sản phẩm nhẹ và thoáng mát tối đabền màu, không nhăn nhàu, đứng dáng. Ngoài ra, 3,5% Nylon có vai trò kháng ẩm tốt, ngăn chặn tình trạng ẩm mốc cho quần, 1,5% Spandex giúp quần co giãn nhẹ.\r\n\r\n+MÀU SẮC: Xám 36, Xanh tím than 34, Xám 48\r\n\r\n+SIZE: 29 – 30 – 31 – 32 – 33 – 34 – 35 ', 0, NULL, 0, 0, '2020-06-29 01:53:29', '2020-06-29 01:53:29'),
(99, 'CÀ VẠT NAM ARISTINO ATI04008', 'ca-vat-nam-aristino-ati04008', 450000, 'Đỏ-M-100|Đỏ-L-100|Đỏ-S-100|Đỏ-XL-100|', 1, 30, 4, 0, 'mOaHQZ.jpg', 'DkOnVr.', 'exjDKk.', 'FASuDO.', '9ERmUW.', '+KIỂU DÁNG: Bản trung\r\n\r\n+CHI TIẾT:\r\n\r\n- Cà vạt nam bản trung thiết kế basic dễ dàng kết hợp với áo sơ mi, vest và các trang phục khác.\r\n\r\n- Họa tiết Roman mang đậm phong cách châu Âu nổi bật trên nền lụa bóng mượt. Màu sắc nam tính mang đến cho nam giới vẻ đẹp sang trọng lịch lãm cho trang phục.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu lụa cao cấp 100% có độ bóng mượt và mềm mịn tuyệt vời. Mặt vải luôn phẳng mịn, không nếp gấp, không nhăn nhàu. Màu sắc nét, độ bóng mang đến sự sang trọng cho phái mạnh.\r\n\r\n+MÀU SẮC: Xanh navy họa tiết, Đỏ họa tiết', 0, NULL, 0, 5, '2020-06-29 01:54:49', '2020-06-29 03:54:20'),
(100, 'CÀ VẠT NAM ARISTINO ATI03808', 'ca-vat-nam-aristino-ati03808', 450000, 'Xanh Nhạt-XL-100', 1, 30, 4, 0, 'h5Vf7B.jpg', 'yt46CK.', 'GdRHy6.', 'Hv4106.', 'XryB2Q.', '+KIỂU DÁNG: Bản trung\r\n\r\n+CHI TIẾT:\r\n\r\n- Cà vạt lụa cao cấp thiết kế bản trung vừa phải, phù hợp với nhiều kiểu cổ áo sơ mi, nhiều dáng người và thích hợp trong nhiều hoàn cảnh sử dụng khác nhau.\r\n\r\n- Màu xanh da trời tươi sáng, thời thượng, họa tiết Greek cổ điển nhưng đầy mới mẻ, mang đến vẻ ngoài nổi bật, ấn tượng.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu lụa cao cấp 100% có độ bóng mượt và mềm mịn tuyệt vời. Mặt vải luôn phẳng mịn, không nếp gấp, không nhăn nhàu. Màu sắc nét, độ bóng mang đến sự sang trọng cho phái mạnh.\r\n\r\n+MÀU SẮC: Xanh trời họa tiết', 0, NULL, 0, 0, '2020-06-29 01:56:10', '2020-06-29 01:56:10'),
(101, 'QUẦN LÓT NAM ARISTINO ABX01807', 'quan-lot-nam-aristino-abx01807', 125000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 33, 3, 0, 'LPOIjD.jpg', 'bqIMkQ.', 'pZtGx4.', 'xq8S4A.', '2FVBWp.', '+KIỂU DÁNG: Boxer\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần lót nam kiểu dáng Boxer dễ mặc với nhiều dáng người.\r\n\r\n- Thiết kế basic với các chi tiết quần vừa vặn và dễ chịu. Điểm nhấn là các đường chỉ chần nổi nam tính, mạnh mẽ. Cạp chun co giãn thoải mái, không lằn bụng có dệt họa tiết và logo tinh tế.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Cotton Chitosan với sợi bông thiên nhiên thuần khiết mềm mại, thoáng mát và lành tính. Kết hợp Crabyon và công nghệ xử lý vải cao cấp giúp bổ sung tính kháng khuẩn, ngăn mùi và thoát ẩm vượt trội.\r\n\r\n- Quần co giãn thoải mái nhờ kết hợp sợi Spandex.\r\n\r\n+SIZE: S - M - L - XL - XXL', 0, NULL, 0, 12, '2020-06-29 01:57:13', '2020-06-29 03:54:29'),
(102, 'QUẦN LÓT NAM ARISTINO ABX03607', 'quan-lot-nam-aristino-abx03607', 100000, 'Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 33, 3, 0, 'pHEhFe.jpg', 'AafJM7.', 'U0PJR6.', 'ijX6YN.', 'nL3hsH.', '+KIỂU DÁNG: Boxer\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần boxer nam kiểu dáng đơn giản và ôm sát mang tới sự thoải mái, tự tin cho phái mạnh.\r\n\r\n- Thiết kế nổi bật với logo Aristino trên cạp chun viền 3cm dày dặn tạo cảm giác chắc chắn và mạnh mẽ.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Quần lót nam sử dụng cotton cao cấp với công nghệ FIT FORM 360 độ, giúp sản phẩm có độ ôm khít cơ thể mà vẫn thoải mái cho khách hàng.\r\n\r\n- Quần co giãn thoải mái nhờ sợi spandex\r\n\r\n+SIZE: S - M - L - XL - XXL', 0, NULL, 0, 0, '2020-06-29 01:58:07', '2020-06-29 01:58:07'),
(103, 'QUẦN SỊP NAM ARISTINO ABF02207', 'quan-sip-nam-aristino-abf02207', 99000, 'Đen-M-100|Đen-L-100|Đen-S-100|Đen-XL-100|', 1, 34, 3, 0, 'QCtSH6.jpg', 'g5EjY1.', 'M6XFsA.', 'kX5M9j.', '3OYRiI.', '+KIỂU DÁNG: Brief\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần lót nam kiểu dáng Brief ôm gọn gàng, dễ chịu\r\n\r\n- Thiết kế basic với điểm nhấn là các đường chỉ chần nổi nam tính, mạnh mẽ. Cạp chun co giãn thoải mái, không lằn bụng, không lộ khi kết hợp trang phục khác.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu Cotton Chitosan với sợi bông thiên nhiên thuần khiết mềm mại, thoáng mát và lành tính. Kết hợp Crabyon và công nghệ xử lý vải cao cấp giúp bổ sung tính kháng khuẩn, ngăn mùi và thoát ẩm vượt trội.\r\n\r\n- Quần co giãn thoải mái nhờ kết hợp sợi Spandex\r\n\r\n+SIZE: S - M - L - XL - XXL', 0, NULL, 0, 0, '2020-06-29 01:59:05', '2020-06-29 01:59:05'),
(104, 'QUẦN LÓT NAM ARISTINO ABF03807', 'quan-lot-nam-aristino-abf03807', 110000, 'Xám-M-100|Xám-L-100|Xám-S-100|Xám-XL-100|', 1, 34, 3, 0, 'X7Jlg2.jpg', NULL, 'cgC26s.', 'pRn5DJ.', 'Z17WO2.', '+KIỂU DÁNG: Briefs\r\n\r\n+CHI TIẾT:\r\n\r\n- Quần lót briefs kiểu dáng đơn giản, phù hợp với mọi vóc dáng của phái mạnh.\r\n\r\n- Sản phẩm thiết kế với cạp chun cao cấp, không bai dão trong quá trình sử dụng.\r\n\r\n- Logo thương hiệu Aristino được in trên cạp quần cùng các đường kẻ ngang dứt khoát và đầy mạnh mẽ.\r\n\r\n+CHẤT LIỆU:\r\n\r\n- Chất liệu sợi Bamboo siêu việt giúp cho sản phẩm có độ mỏng nhẹ chỉ bằng 75% so với sợi cotton. Bề mặt vải cho cảm giác mềm mượt, bóng mịn cùng với khả năng kháng khuẩn tự nhiên và thấm mồ hôi vượt trội giúp thoáng khí và cân bằng độ ẩm cho da.\r\n\r\n+SIZE: S - M - L - XL - XXL', 0, NULL, 0, 0, '2020-06-29 01:59:55', '2020-06-29 01:59:55'),
(105, 'ÁO SƠ MI NAM ARISTINO ASS050S99', 'ao-so-mi-nam-aristino-ass050s99', 750000, 'Đen-M-100|Đen-L-200|Đen-S-1300|Xám-M-100|Xám-L-200|Xám-S-1300|', 1, 2, 1, 30, 'sxk9hH.jpg', 'AmtOyz.', 'Tp84yv.', 'h1mHZb.', 'Cn7HGg.', 'Áo sơ mi', 0, NULL, 0, 0, '2020-07-11 18:11:48', '2020-07-11 18:11:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `birth` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `phone` char(15) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `position` tinyint(4) NOT NULL DEFAULT 0,
  `identity_card` int(9) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `name`, `email`, `password`, `birth`, `address`, `avatar`, `phone`, `salary`, `id_store`, `position`, `identity_card`, `created_at`, `update_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1998, 'Nghệ An', 'gDlM9.jpg', '0123456789', 5000000, 1, 1, 187749036, '2020-06-27 08:31:52', '2020-06-30 02:00:10'),
(5, 'Nguyễn Thị Linh', 'nguyenthilinh@gmail.com', '892da3d819056410c05bca7747d22735', 1999, 'Nghệ An', 'AT42Q.jpg', '09876543221', 5000000, 1, 0, 123456789, '2020-06-27 16:14:12', '2020-06-28 17:46:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` char(15) NOT NULL,
  `opnening` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `phone`, `opnening`) VALUES
(1, 'Hà Nội', 'Số 50, Thanh Xuân, Hà Nội', '0123456789', '2019-05-02'),
(2, 'Đà Nẵng', 'Số 50, Thanh Khê, Đà Nẵng', '0123498765', '2019-10-19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `id_store` int(11) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `customer_phone` int(11) DEFAULT NULL,
  `customer_address` varchar(255) DEFAULT NULL,
  `form` tinyint(4) DEFAULT 1 COMMENT '1:Online|0:Offline',
  `status` tinyint(4) DEFAULT 0 COMMENT '1:Hoàn Thành|0:Đang Xử lý',
  `payment` tinyint(4) DEFAULT 0,
  `id_staff` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id`, `amount`, `id_customer`, `id_store`, `customer_name`, `customer_phone`, `customer_address`, `form`, `status`, `payment`, `id_staff`, `note`, `created_at`, `update_at`) VALUES
(30, 6950000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, 'Giao hàng tận nới', '2020-06-29 03:44:03', '2020-07-14 18:25:48'),
(31, 2250000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, 'Giao hàng tận nới', '2020-01-29 03:45:26', '2020-07-14 18:25:51'),
(32, 24875000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao hàng tận nới', '2020-02-29 03:47:36', '2020-02-29 03:54:23'),
(34, 8700000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao hàng tận nới', '2020-03-29 03:49:03', '2020-03-29 03:54:27'),
(35, 1500000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao hàng tận nới', '2020-04-29 03:49:30', '2020-04-29 03:54:29'),
(36, 6000000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao hàng tận nới', '2020-05-29 03:49:57', '2020-05-29 03:54:42'),
(37, 8400000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao hàng tận nới', '2020-06-29 03:50:32', '2020-06-29 03:54:46'),
(39, 38250000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, 'Giao tận nơi', '2020-07-03 16:42:11', '2020-07-03 16:42:26'),
(40, 6450000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, '', '2020-07-08 14:19:57', '2020-07-11 18:12:10'),
(41, 3625000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, '', '2020-07-08 14:30:58', '2020-07-11 18:12:01'),
(42, 1250000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, '', '2020-07-08 15:04:33', '2020-07-11 18:11:59'),
(44, 1250000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, '', '2020-07-08 15:35:40', '2020-07-09 00:54:14'),
(52, 2100000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 0, NULL, '', '2020-07-14 18:10:14', '2020-07-14 18:18:21'),
(54, 1250000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, 'Giao tận nơi', '2020-07-14 18:18:50', '2020-07-15 04:54:33'),
(55, 625000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, 'Giao tận nơi', '2020-07-14 18:21:12', '2020-07-14 18:21:17'),
(56, 1400000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, '', '2020-07-14 18:33:22', '2020-07-14 18:33:29'),
(57, 650000, 1, 1, 'Nguyễn Sỹ Khải', 355123450, 'Số 40, Ngõ 122, Khương Đình, Thanh Xuân', 1, 1, 1, NULL, '', '2020-07-15 10:33:14', '2020-07-15 10:33:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `detail`
--
ALTER TABLE `detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
