-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 16, 2024 at 05:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniland`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accounts`
--

CREATE TABLE `tbl_accounts` (
  `id` int NOT NULL,
  `registration_date` date NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `district` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ward` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0-customer\r\n1-admin',
  `status` tinyint NOT NULL DEFAULT '2' COMMENT '0-blocked\r\n1-verified\r\n2-unverified',
  `token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_accounts`
--

INSERT INTO `tbl_accounts` (`id`, `registration_date`, `avatar`, `name`, `email`, `password`, `city`, `district`, `ward`, `address`, `phone`, `role`, `status`, `token`) VALUES
(4, '2024-04-01', 'uploads/avatar/1712324995-user.jpg', 'Tran Van Teo', 'admin@gmail.com', '1', NULL, NULL, NULL, NULL, '0777888999', 1, 1, ''),
(20, '2024-01-10', NULL, 'John Doe', 'johndoe@example.com', '123', 'Tỉnh Hoà Bình', 'Huyện Lương Sơn', 'Xã Hòa Sơn', '11', '0912345678', 0, 1, ''),
(21, '2024-01-22', NULL, 'Jane Smith', 'janesmith@example.com', '123', 'Tỉnh Thái Nguyên', 'Huyện Đồng Hỷ', 'Xã Hóa Trung', '22', '0912345679', 0, 1, ''),
(22, '2024-03-12', NULL, 'Michael Johnson', 'michaeljohnson@example.com', '123', 'Tỉnh Vĩnh Phúc', 'Huyện Lập Thạch', 'Xã Đình Chu', '50', '0912345680', 0, 1, ''),
(23, '2024-03-15', NULL, 'Emily Brown', 'emilybrown@example.com', '123', 'Tỉnh Đồng Tháp', 'Huyện Tam Nông', 'Xã Phú Đức', '20', '0912345681', 0, 1, ''),
(24, '2024-03-17', NULL, 'Christopher Lee', 'christopherlee@example.com', '123', 'Thành phố Hà Nội', 'Huyện Mê Linh', 'Xã Tiến Thịnh', '60', '0912345682', 0, 1, ''),
(25, '2024-02-14', NULL, 'Jessica Davis', 'jessicadavis@example.com', '123', 'Thành phố Hải Phòng', 'Huyện Vĩnh Bảo', 'Xã Vinh Quang', '33', '0912345683', 0, 1, ''),
(26, '2024-03-08', NULL, 'David Wilson', 'davidwilson@example.com', '123', NULL, NULL, '', NULL, '0912345684', 0, 1, ''),
(27, '2024-03-27', NULL, 'Sarah Martinez', 'sarahmartinez@example.com', '123', NULL, NULL, '', NULL, '0912345685', 0, 1, ''),
(28, '2024-04-01', NULL, 'James Anderson', 'jamesanderson@example.com', '123', NULL, NULL, '', NULL, '0912345686', 0, 1, ''),
(29, '2024-04-05', NULL, 'Laura Taylor', 'laurataylor@example.com', '123', NULL, NULL, '', NULL, '0912345687', 0, 1, ''),
(30, '2024-04-02', NULL, 'Ho Van Do', 'hovando@gmail.com', '123', 'Thành phố Hà Nội', 'Quận Hoàn Kiếm', 'Phường Trần Hưng Đạo', '90', '1234567890', 0, 0, ''),
(31, '2024-04-09', NULL, 'Nguyen Thi Ty', 'imsorry78952@gmail.com', '123', 'Tỉnh Lạng Sơn', 'Huyện Văn Lãng', 'Xã Tân Thanh', '30', '1234567890', 0, 1, '34f70aa987965dc8364cb708be5afbdc4f77e5585f274fd2821c4b2194d1'),
(34, '2024-12-12', NULL, 'huyenntt', 'huyenntt1106@gmail.com', '123', NULL, NULL, NULL, NULL, NULL, 0, 1, '397148bee6e55e4f21b9781a8b4c863a6e34aca8847a7e852abde96a6c9d');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int NOT NULL,
  `grid` int NOT NULL,
  `title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `grid`, `title`, `description`, `image`, `status`, `id_category`) VALUES
(7, 1, 'Tốt Cho Sức Khỏe', NULL, 'uploads/banner/1733869433-be738fd820ea4930226dd1c70086e000.jpg', 1, 86),
(8, 2, 'Đậm Vị Trà', NULL, 'uploads/banner/1733868609-trà hoa.jpg', 1, 85),
(9, 3, 'Thuần Thiên Nhiên', NULL, 'uploads/banner/1733868920-bột sấy.jpg', 1, 87),
(10, 4, 'Thư Thái', NULL, 'uploads/banner/1733869093-trà sen.jpg', 1, 88),
(12, 5, 'Cuộc sống lành mạnh hơn?', 'Chúng tôi cung cấp các sản phẩm trà thảo mộc đến từ thiên nhiên. Hãy thử một tách trà mỗi ngày để nâng cao sức khỏe nhé!', 'uploads/banner/1733868285-9b73e26f3b5731dee164eb9904fe8789.jpg', 1, 86);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int NOT NULL,
  `id_customer` int NOT NULL,
  `id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `id_color` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_carts`
--

INSERT INTO `tbl_carts` (`id`, `id_customer`, `id_product`, `quantity`, `id_color`) VALUES
(338, 31, 60, 3, 322),
(339, 31, 58, 1, 325),
(340, 26, 58, 1, 325),
(341, 26, 62, 1, 318);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `status`) VALUES
(85, 'Trà Hoa', 1),
(86, 'Trà Thảo Mộc', 1),
(87, 'Bột Sấy Lạnh', 1),
(88, 'Trà Sen', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `hex` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color_thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`id`, `name`, `hex`, `color_thumbnail`, `id_product`) VALUES
(315, '10 gói', '000', 'uploads/product/1733887951-gao-lut-thao-moc copy.png', 62),
(317, '15 gói', '000', 'uploads/product/1733903965-gao-lut-thao-moc copy.png', 62),
(318, '20 gói', '000', 'uploads/product/1733903974-gao-lut-thao-moc copy.png', 62),
(319, '10 gói', '000', 'uploads/product/1733904002-gao-lut-thao-moc-Recovered (10).png', 61),
(320, '15 gói', '000', 'uploads/product/1733904011-gao-lut-thao-moc-Recovered (10).png', 61),
(321, '10 gói', '000', 'uploads/product/1733904032-gao-lut-thao-moc-Recovered (9).png', 60),
(322, '15 gói', '000', 'uploads/product/1733904039-gao-lut-thao-moc-Recovered (9).png', 60),
(323, '10 gói', '000', 'uploads/product/1733904125-gao-lut-thao-moc-Recovered (8).png', 59),
(324, '15 gói', '000', 'uploads/product/1733904150-gao-lut-thao-moc-Recovered (8).png', 59),
(325, '10 gói', '000', 'uploads/product/1733904192-gao-lut-thao-moc-Recovered (7).png', 58),
(326, '15 gói', '000', 'uploads/product/1733904206-gao-lut-thao-moc-Recovered (7).png', 58),
(327, '10 gói', '000', 'uploads/product/1733904230-gao-lut-thao-moc-Recovered (6).png', 57),
(328, '15 gói', '000', 'uploads/product/1733904241-gao-lut-thao-moc-Recovered (6).png', 57),
(329, '1 hộp', '000', 'uploads/product/1733904359-gao-lut-thao-moc-Recovered (5).png', 56),
(330, '2 hộp', '000', 'uploads/product/1733904658-gao-lut-thao-moc-Recovered (5).png', 56),
(331, '1 hộp', '000', 'uploads/product/1733904678-gao-lut-thao-moc-Recovered (4).png', 55),
(332, '2 hộp', '000', 'uploads/product/1733904689-gao-lut-thao-moc-Recovered (4).png', 55),
(333, '1 hộp', '000', 'uploads/product/1733904732-gao-lut-thao-moc-Recovered (3).png', 54),
(334, '2 hộp', '000', 'uploads/product/1733904754-gao-lut-thao-moc-Recovered (3).png', 54),
(335, '10 gói', '000', 'uploads/product/1733904782-gao-lut-thao-moc-Recovered (2).png', 53),
(336, '15 gói', '000', 'uploads/product/1733904795-gao-lut-thao-moc-Recovered (2).png', 53),
(337, '10 gói', '000', 'uploads/product/1733904892-gao-lut-thao-moc-Recovered (1).png', 52),
(338, '15 gói', '000', 'uploads/product/1733904903-gao-lut-thao-moc-Recovered (1).png', 52),
(339, '20 gói', '000', 'uploads/product/1733904921-gao-lut-thao-moc-Recovered (1).png', 52),
(340, '10 gói', '000', 'uploads/product/1733904941-gao-lut-thao-moc-Recovered.png', 51),
(343, '15 gói', '000', 'uploads/product/1733904994-gao-lut-thao-moc-Recovered.png', 51),
(344, '20 gói', '000', 'uploads/product/1733905023-gao-lut-thao-moc-Recovered.png', 51);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`id`, `url`, `id_product`) VALUES
(69, 'uploads/product/1733874332-375547012_622312346683644_6180092139578464000_n-Recovered.png', 51),
(71, 'uploads/product/1733874416-Untitled-1-Recovered (1).png', 51),
(73, 'uploads/product/1733874443-375219703_622312326683646_2074615284677809249_n-Recovered (5).png', 51),
(75, 'uploads/product/1733874509-1 (8).png', 52),
(76, 'uploads/product/1733874514-2 (5).png', 52),
(77, 'uploads/product/1733874519-3 (2).png', 52),
(78, 'uploads/product/1733874552-1 (9).png', 53),
(79, 'uploads/product/1733874557-375219703_622312326683646_2074615284677809249_n-Recovered (6).png', 53),
(80, 'uploads/product/1733874710-1 (10).png', 54),
(81, 'uploads/product/1733874713-375219703_622312326683646_2074615284677809249_n-Recovered (7).png', 54),
(82, 'uploads/product/1733874866-a0e76a7c7f16e9725179645b3aed7b81.jpg', 54),
(83, 'uploads/product/1733874933-2 (6).png', 55),
(84, 'uploads/product/1733874942-1 (11).png', 55),
(90, 'uploads/product/1733875287-36e50ecb474435eab2ebc3904114a5d9.jpg', 57),
(91, 'uploads/product/1733875371-8c24b06b99343e16f383366eeb34cf3d (1).jpg', 57),
(92, 'uploads/product/1733875379-14385d7776b8815214cb0b6b006575c3.jpg', 57),
(93, 'uploads/product/1733875421-375547012_622312346683644_6180092139578464000_n-Recovered (4).png', 58),
(94, 'uploads/product/1733875426-2 (7).png', 58),
(95, 'uploads/product/1733875430-1 (12).png', 58),
(96, 'uploads/product/1733875472-375547012_622312346683644_6180092139578464000_n-Recovered (5).png', 59),
(97, 'uploads/product/1733875477-1 (13).png', 59),
(98, 'uploads/product/1733887242-2 (8).png', 56),
(99, 'uploads/product/1733887248-1 (14).png', 56),
(100, 'uploads/product/1733887282-0261065c21ade2768946e74995f65c10.jpg', 56),
(101, 'uploads/product/1733887412-Untitled-1-Recovered (2).png', 60),
(102, 'uploads/product/1733887415-375547012_622312346683644_6180092139578464000_n-Recovered (6).png', 60),
(103, 'uploads/product/1733887419-375219703_622312326683646_2074615284677809249_n-Recovered (8).png', 60),
(104, 'uploads/product/1733887490-1 (15).png', 61),
(105, 'uploads/product/1733887494-5.png', 61),
(106, 'uploads/product/1733887497-2 (9).png', 61),
(107, 'uploads/product/1733887650-sg-11134201-23010-3vhlxbpeg3lv73 copy.png', 62),
(108, 'uploads/product/1733887653-sg-11134201-23010-mzlq0zgeg3lve0 copy.png', 62),
(109, 'uploads/product/1733887655-sg-11134201-23010-uonhldpeg3lvb0 copy.png', 62);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int NOT NULL,
  `date` datetime NOT NULL,
  `payment_status` int NOT NULL DEFAULT '0' COMMENT '0-unpaid;\r\n1-paid;\r\n2-refunded;',
  `delivery_status` int NOT NULL DEFAULT '0' COMMENT '0-pending;\r\n1-in transit;\r\n2-delivered;\r\n3-failed;',
  `method` int NOT NULL COMMENT '0-cod;\r\n1-online;',
  `total` decimal(10,0) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_customer` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `date`, `payment_status`, `delivery_status`, `method`, `total`, `note`, `id_customer`, `status`) VALUES
(97, '2024-12-11 10:32:57', 1, 2, 0, '200020', 'none', 20, 1),
(98, '2024-12-11 15:18:38', 2, 1, 0, '750020', 'none', 20, 1),
(99, '2024-12-11 15:18:58', 0, 3, 1, '199500', 'done 1', 20, 1),
(100, '2024-12-11 15:19:52', 1, 2, 1, '315020', 'done', 20, 1),
(101, '2024-12-16 13:26:01', 1, 2, 0, '320020', 'y', 25, 1),
(102, '2024-12-16 13:27:58', 1, 0, 0, '320020', '', 25, 1),
(103, '2024-12-17 00:11:12', 0, 3, 0, '160000', 'không', 25, 1),
(104, '2024-12-17 00:11:39', 1, 1, 1, '160000', 'không', 25, 1),
(105, '2024-12-17 00:18:39', 0, 0, 0, '114000', 'không', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `id` int NOT NULL,
  `id_order` int NOT NULL,
  `id_product` int NOT NULL,
  `id_color` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`id`, `id_order`, `id_product`, `id_color`, `quantity`, `price`) VALUES
(111, 97, 62, 315, 1, '200000'),
(112, 98, 59, 323, 3, '160000'),
(113, 98, 61, 320, 2, '135000'),
(114, 99, 60, 321, 1, '189525'),
(115, 100, 52, 337, 2, '157500'),
(116, 101, 59, 323, 1, '128000'),
(117, 102, 59, 323, 1, '160000'),
(118, 102, 59, 324, 1, '160000'),
(119, 103, 59, 323, 1, '128000'),
(120, 104, 59, 323, 1, '128000'),
(121, 105, 55, 331, 1, '108300');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int NOT NULL,
  `view` int NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `discount` int NOT NULL DEFAULT '0',
  `instock` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `id_category` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `view`, `thumbnail`, `name`, `description`, `price`, `discount`, `instock`, `status`, `id_category`) VALUES
(50, 2, 'uploads/product/1733869567-375547012_622312346683644_6180092139578464000_n-Recovered.png', 'Trà mận nhiệt đới', '', '125000', 5, 50, 0, 86),
(51, 2, 'uploads/product/1733869770-gao-lut-thao-moc-Recovered.png', 'Trà Mận Nhiệt Đới', 'Mang hương vị nồng nàn của mùa hè, Trà Mận Nhiệt Đới là sự hòa quyện hoàn hảo giữa vị chua thanh mát của mận đỏ, chút ngọt dịu từ trái cây nhiệt đới và lớp trà thơm nhẹ nhàng. Mỗi ngụm trà không chỉ đánh thức vị giác mà còn mang đến cảm giác tươi mới, như một làn gió mát lành giữa ngày nắng.\r\n', '125000', 5, 50, 1, 86),
(52, 4, 'uploads/product/1733869888-gao-lut-thao-moc-Recovered (1).png', 'Trà Hoa Hồng', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '175000', 10, 18, 1, 85),
(53, 1, 'uploads/product/1733869936-gao-lut-thao-moc-Recovered (2).png', 'Trà Hoa Mẫu Đơn', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '180000', 3, 15, 1, 85),
(54, 1, 'uploads/product/1733869994-gao-lut-thao-moc-Recovered (3).png', 'Bột Cỏ Lúa Mì', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '100000', 0, 15, 1, 87),
(55, 2, 'uploads/product/1733870031-gao-lut-thao-moc-Recovered (4).png', 'Bột Diếp Cá', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '120000', 5, 9, 1, 87),
(56, 1, 'uploads/product/1733870062-gao-lut-thao-moc-Recovered (5).png', 'Bột Tía Tô', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '110000', 3, 20, 1, 87),
(57, 5, 'uploads/product/1733870104-gao-lut-thao-moc-Recovered (6).png', 'Trà Hoa Đậu Biếc', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '180000', 7, 50, 1, 85),
(58, 8, 'uploads/product/1733870141-gao-lut-thao-moc-Recovered (7).png', 'Trà Mộc Liên', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '200000', 15, 40, 1, 88),
(59, 37, 'uploads/product/1733870177-gao-lut-thao-moc-Recovered (8).png', 'Trà Tâm Sen', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '200000', 20, 48, 1, 88),
(60, 3, 'uploads/product/1733887394-gao-lut-thao-moc-Recovered (9).png', 'Trà Đường Nâu Cam Quế', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '210000', 5, 19, 1, 86),
(61, 3, 'uploads/product/1733887480-gao-lut-thao-moc-Recovered (10).png', 'Trà Kim Quất Hồng Đào', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '150000', 10, 48, 1, 86),
(62, 17, 'uploads/product/1733887642-gao-lut-thao-moc copy.png', 'Trà Cúc Tâm', 'Khám phá hương vị tinh túy từ thiên nhiên qua từng tách trà tại Tiệm Trà Mộc Hương. Chúng tôi mang đến sự kết hợp hoàn hảo giữa trà truyền thống và nguyên liệu tự nhiên, tạo nên những trải nghiệm thư giãn, tinh tế và đầy cảm hứng.', '200000', 0, 24, 1, 85);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int NOT NULL,
  `id_product` int NOT NULL,
  `id_customer` int NOT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `review_date` date NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `id_product`, `id_customer`, `rating`, `review_text`, `review_date`, `status`) VALUES
(33, 62, 20, 5, 'xuất sắc', '2024-12-11', 1),
(34, 62, 20, 5, 'xuất sắc', '2024-12-11', 1),
(35, 62, 20, 2, 'tốt', '2024-12-11', 1),
(36, 62, 20, 5, 'tốt lắm', '2024-12-11', 1),
(37, 59, 25, 5, 'xuất sắc', '2024-12-17', 1),
(38, 59, 25, 4, 'khá ổn', '2024-12-17', 1),
(39, 59, 25, 2, 'tệ', '2024-12-17', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_category` (`id_category`) USING BTREE;

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_customer_cart` (`id_customer`),
  ADD KEY `Lk_id_product_cart` (`id_product`),
  ADD KEY `Lk_color_cart` (`id_color`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_name` (`name`) USING BTREE;

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_customer` (`id_customer`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_order` (`id_order`),
  ADD KEY `Lk_id_product` (`id_product`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_category` (`id_category`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Lk_id_product_review` (`id_product`),
  ADD KEY `Lk_id_customer_review` (`id_customer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_accounts`
--
ALTER TABLE `tbl_accounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=345;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD CONSTRAINT `Lk_category` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD CONSTRAINT `Lk_color_cart` FOREIGN KEY (`id_color`) REFERENCES `tbl_colors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_customer_cart` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_product_cart` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD CONSTRAINT `Lk_id_product_variants` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD CONSTRAINT `Lk_id_product_thumbnail` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `Lk_id_customer` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `Lk_id_order` FOREIGN KEY (`id_order`) REFERENCES `tbl_orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Lk_id_product` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `Lk_id_category` FOREIGN KEY (`id_category`) REFERENCES `tbl_categories` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD CONSTRAINT `Lk_id_customer_review` FOREIGN KEY (`id_customer`) REFERENCES `tbl_accounts` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `Lk_id_product_review` FOREIGN KEY (`id_product`) REFERENCES `tbl_products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
