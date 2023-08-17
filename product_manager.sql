-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2022 at 07:55 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccount`
--

CREATE TABLE `adminaccount` (
  `admin_username` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_fullname` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminaccount`
--

INSERT INTO `adminaccount` (`admin_username`, `admin_password`, `admin_fullname`) VALUES
('admin1', '14e1b600b1fd579f47433b88e8d85291', 'Administrator 1'),
('admin2', '14e1b600b1fd579f47433b88e8d85291', 'Administrator 2');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `contact_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_message` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_time` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_title`, `contact_message`, `contact_time`) VALUES
(8, 'User 1', 'user1@gmail.com', 'Help me', 'I don not know how to purchase, please guide me. Thank you.', '2022-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `create_date` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `total_price`, `create_date`, `address`) VALUES
(13, 12, 56000, '2022-12-03', '41 CMT8, Ninh Kiều, Cần Thơ'),
(14, 13, 57000, '2022-12-03', '132 đường 30/4, P.Tân An, Q.Ninh Kiều, TP.Cần Thơ');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`id`, `product_id`, `quantity`, `invoice_id`) VALUES
(9, 46, 2, 13),
(10, 48, 2, 13),
(11, 62, 1, 14),
(12, 48, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(9) NOT NULL,
  `product_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` enum('Water','Cake') COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int(12) NOT NULL,
  `product_description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_type`, `product_price`, `product_description`, `product_image`) VALUES
(46, 'Bánh bò', 'Cake', 7000, 'Bánh bò thốt nốt', 'Images\\1668996849-BanhBo.jfif'),
(47, 'Bánh chuối', 'Cake', 10000, 'Bánh chuối xiêm', 'Images\\1668996875-BanhChuoi.jpg'),
(48, 'Bánh cống', 'Cake', 21000, 'Bánh cống Cần Thơ', 'Images\\1668996898-BanhCong.jfif'),
(49, 'Bánh da lợn', 'Cake', 12000, 'Bánh da lợn đậu xanh', 'Images\\1668996931-BanhDaLon.jpg'),
(50, 'Bánh đúc', 'Cake', 14000, 'Bánh da lợn nước cốt dừa', 'Images\\1668996952-BanhDuc.webp'),
(51, 'Bánh khọt', 'Cake', 15000, 'Bánh khọt tôm', 'Images\\1668996989-BanhKhot.jfif'),
(52, 'Bánh tét', 'Cake', 50000, 'Bánh tét lá cẩm', 'Images\\1668997014-BanhTet.jfif'),
(53, 'Bánh mì', 'Cake', 22000, 'Bánh mì Sài Gòn', 'Images\\1668997137-BanhMi.jfif'),
(55, 'Bánh xèo', 'Cake', 30000, 'Bánh xèo Cần Thơ', 'Images\\1668997678-BanhXeo.jfif'),
(56, 'Bánh tằm', 'Cake', 15000, 'Bánh tằm ngọt', 'Images\\1668997856-BanhTam.jpg'),
(57, 'Bánh lá dừa', 'Cake', 16000, 'Bánh lá dừa Bến Tre', 'Images\\1668997920-BanhLaDua.jpg'),
(58, 'Bánh lá mơ', 'Cake', 20000, 'Bánh lá mơ nước cốt dừa', 'Images\\1668998230-BanhLaMo.jpg'),
(59, 'Bánh bèo', 'Cake', 6000, 'Bánh bèo đậu xanh', 'Images\\1668998334-BanhBeo.jpg'),
(60, 'Bánh pía', 'Cake', 60000, 'Bánh pía Sóc Trăng', 'Images\\1668998520-BanhPia.jpg'),
(61, 'Sương sa', 'Water', 24000, 'Sương sa hạt lựu', 'Images\\1669044183-SuongSa.webp'),
(62, 'Chè bà ba', 'Water', 15000, 'Tên gọi khác là Chè thưng', 'Images\\1669044235-CheBaBa.jpg'),
(63, 'Chè đậu xanh', 'Water', 17000, 'Chè đậu xanh nước cốt dừa', 'Images\\1669044296-CheDauXanh.jfif'),
(64, 'Chè đậu đỏ', 'Water', 18000, 'Chè đậu đỏ đường phèn', 'Images\\1669044343-CheDauDo.jfif'),
(65, 'Chè đậu đen', 'Water', 17000, 'Chè đậu đen nước cốt dừa', 'Images\\1669044383-CheDauDen.jpg'),
(67, 'Chè trứng gà', 'Water', 30000, 'Chè trứng gà táo Tàu', 'Images/1669045338-CheTrungGa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` int(9) NOT NULL,
  `user_fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_ID`, `user_fullname`, `user_email`, `user_password`, `user_address`, `user_status`) VALUES
(12, 'User 1', 'user1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '41 CMT8, Q.Ninh Kiều, TP.Cần Thơ', 1),
(13, 'User 2', 'user2@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', '66 Võ Văn Tần, quận Thanh Khê, Đà Nẵng', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminaccount`
--
ALTER TABLE `adminaccount`
  ADD PRIMARY KEY (`admin_username`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `invoice_detail_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  ADD CONSTRAINT `invoice_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
