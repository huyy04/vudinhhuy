-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 10:14 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(500) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Sản phẩm đẹp v', '2022-12-16 19:55:24', '2023-11-14 22:51:23'),
(2, 4, 4, 'đắt bỏ mịa ra', '2022-12-16 19:58:27', '2022-12-16 19:58:27'),
(3, 2, 7, 'fsd', '2023-11-08 16:22:46', '2023-11-08 16:22:46'),
(5, 6, 4, 'yess\r\n', '2023-11-27 10:24:53', '2023-11-27 16:25:01'),
(6, 7, 7, 'sản phẩm nhìn được đấy =))', '2023-11-27 10:29:03', '2023-11-27 16:29:19'),
(7, 7, 7, 'yolo', '2023-11-27 10:30:35', '2023-11-27 16:30:41'),
(8, 6, 5, 'sss', '2023-11-27 10:52:40', '2023-11-27 16:52:46'),
(15, 6, 24, 'sss', '2023-12-04 03:55:56', '2023-12-04 09:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `groupproduct`
--

CREATE TABLE `groupproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groupproduct`
--

INSERT INTO `groupproduct` (`id`, `name`, `image`) VALUES
(1, 'Áo Outer', 'https://product.hstatic.net/200000312481/product/abo80011_2_11cd07c626c64b3a8c1551888a5fe41c_grande.jpg'),
(2, 'Quần Short Outer', 'https://product.hstatic.net/200000312481/product/ortb507_1_59a0a376033f4498b707ab19188312e2_master.jpg'),
(3, 'Áo Hoodie', 'https://cf.shopee.vn/file/1a65e82df5b6b53ca0dc917d8bea7582'),
(4, 'Áo Polo', 'https://product.hstatic.net/200000312481/product/apo7001_1_55e5ba0026554da6853aa2cbe568a89e_master.jpg'),
(5, 'Quần Jean ', 'https://salt.tikicdn.com/cache/750x750/ts/product/28/48/31/9763dc3c16db2e52d9403fbc59a3df2b.jpg.webp'),
(6, 'Áo Sơ Mi', 'https://cf.shopee.vn/file/d47c81282243e0c8c6d687c6be62cffc');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `totalMoney` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(150) NOT NULL DEFAULT 'chờ xác nhận',
  `payment` varchar(255) NOT NULL DEFAULT 'cod',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `totalMoney`, `created_at`, `status`, `payment`, `updated_at`) VALUES
(162, 6, 322010, '2023-12-05 15:05:12', 'chờ xác nhận', 'tienmat', '2023-12-06 08:18:22'),
(163, 6, 322010, '2023-12-06 10:54:36', 'đang xử lý', 'tienmat', '2023-12-06 08:18:37'),
(167, 6, 250010, '2023-12-06 11:15:18', 'đã hủy', '', '2023-12-06 04:22:07'),
(168, 7, 2351010, '2023-12-06 15:19:51', 'giao thành công', 'tienmat', '2023-12-06 08:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(10) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `amount`) VALUES
(184, 161, 1, 1),
(185, 162, 4, 1),
(186, 162, 1, 1),
(187, 163, 4, 1),
(188, 163, 1, 1),
(192, 167, 21, 1),
(193, 168, 8, 1),
(194, 168, 19, 1),
(195, 168, 6, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `priceNew` int(11) DEFAULT NULL,
  `amount` int(100) NOT NULL DEFAULT 0,
  `quantity_sold` int(100) NOT NULL DEFAULT 0,
  `description` varchar(255) DEFAULT NULL,
  `groupProduct_Id` int(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `price`, `priceNew`, `amount`, `quantity_sold`, `description`, `groupProduct_Id`, `created_at`, `updated_at`) VALUES
(1, 'CROSS CUT POLO / Black-Grey', 'polo1.webp', 123000, NULL, 66, 34, 'Đây là áo rất đẹp', 4, '2022-12-16 19:27:23', '2023-11-27 16:57:43'),
(4, 'Áo Hoodie Black', 'hoodie1.jpg', 199000, NULL, 975, 25, '', 3, '2022-12-16 19:31:34', '2023-11-27 16:57:53'),
(5, 'Quần Short Outer Black', 'quan1-1.webp', 245000, NULL, 100, 0, '', 2, '2022-12-16 19:34:25', '2023-11-27 16:57:59'),
(6, 'Áo Outer White Viền Đen', 'anh4.webp', 567000, NULL, 1000, 0, '', 1, '2022-12-16 19:35:03', '2023-11-29 10:39:04'),
(7, 'Quần Short Tee Gray', 'quan1-2.jpeg', 500000, NULL, 966, 34, '', 2, '2022-12-16 19:35:47', '2023-11-27 16:58:25'),
(8, 'BABE TEE COLLECTION Ver 3.0', 'ao2.webp', 350000, NULL, 978, 0, '', 1, '2022-12-16 19:36:10', '2023-11-27 16:58:33'),
(19, 'Áo cọc Outerity Blanki', 'anh1.webp', 300000, NULL, 50, 0, NULL, 1, '2023-11-22 23:26:59', '2023-11-27 16:58:42'),
(21, 'Áo Sơ Mi Vải Cotton Trắng', 'aosomi1.jfif', 250000, NULL, 63, 12, NULL, 6, '2023-11-25 13:08:41', '2023-11-29 11:02:57'),
(23, 'Quần Jean Tím Than', 'quanjean1.jfif', 750000, NULL, 150, 0, NULL, 5, '2023-11-25 13:13:57', '2023-11-27 16:59:04'),
(24, 'Quần Jean Đen Ống rộng  ', 'quanjean2.jfif', 650000, NULL, 94, 0, NULL, 5, '2023-11-25 13:14:50', '2023-11-27 16:59:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `is_Admin` tinyint(1) DEFAULT 0,
  `image` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `userName`, `password`, `status`, `is_Admin`, `image`, `address`, `phone`, `gender`) VALUES
(2, 'hahuu', 'huu@gmail.com', '$2y$10$j.vKZ9164xPoSpp3MiAnZuL0Z0svbwb1OBtzyylx1e0g3CHdDgHVC', NULL, 1, '403279a5d4284c61e632199ba4f48061.jpg', '', '', ''),
(4, 'Anh Hải', 'haianh@gmail.com', '$2y$10$r6FPcVHNEiGbHuBZ/NO8o.BM1eO5N4oYXVhOxDgFASshIryyH/H9C', NULL, 0, 'OSEDE9306.JPG', 'Bắc Ninh', '0976599990', 'nam'),
(6, 'hải anh', 'yolo@gmail.com', '123456', NULL, 1, '', 'BN', '0375820426', 'Nam'),
(7, 'ph31341', 'nice@gmail.com', '123123', NULL, 0, '', 'Bắc Ninh', '1234566', ''),
(12, 'Nguyễn Văn Cao', 'yes@gmail.com', '$2y$10$Vuj8g6oEKCNzzDDpr7Jk7uFkFq8Pahka.492jG1bRTTyMsfnKj/c2', NULL, 0, '', 'Vĩnh Phúc yolo', '11112444', ''),
(13, 'Tấn', 'tannguvcl@gmail.com', '$2y$10$rDICbAqDBnY0S5AI6GDvyesGuEFw/PchfQ.Uhp5iGewybG4YxrzYa', NULL, 0, '', 'Nam Định', '12345665473', ''),
(14, 'admin', 'abc@gmail.com', '$2y$10$Kw1SC55yd9a7L6EF5aPZc.YlA5cGga0UbtGoR46CPslcIlY0kBwNm', NULL, 0, '', 'Miền Nam', '1234566', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groupproduct`
--
ALTER TABLE `groupproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groupproduct`
--
ALTER TABLE `groupproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
