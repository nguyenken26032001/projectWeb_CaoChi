-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 30, 2021 lúc 11:30 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `caochinhan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `email`, `name`, `pass`) VALUES
(3, 'admin@admin.com', 'Cao Chí Nhân', '$2y$10$6tp52KxanhF4a2pJBuGTH.sadAYkl7aDwWv29Waq3i.d2T88kDz5u');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `carousel`
--

INSERT INTO `carousel` (`id`, `img`) VALUES
(1, '4305488.jpg'),
(2, 'slide1.jpg'),
(3, 'slide4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `ten_danhmuc` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diachi_donhang`
--

CREATE TABLE `diachi_donhang` (
  `id` int(11) NOT NULL,
  `ma_donhang` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ghichu` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `thanhtoan` int(11) NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `ma_donhang` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL,
  `ngay_dat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `trang_thai` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `ten_sanpham` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh_sanpham` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `id_product`, `id_user`, `ten_sanpham`, `anh_sanpham`, `soluong`, `gia_sanpham`) VALUES
(82, 26, 18, 'Áo sơ mi flannel', 'ao-so-mi-flannel1.jpg', 1, 320000),
(83, 21, 18, 'Quần jeans baggy', 'quan-jeans-baggy1.jpg', 1, 280000),
(90, 24, 23, 'Quần ripjeans', 'quan-ripjeans-den1.jpg', 4, 400000),
(91, 26, 23, 'Áo sơ mi flannel', 'ao-so-mi-flannel1.jpg', 2, 320000),
(92, 18, 23, 'Áo thun unisex ', 'ao-thun-unisex1.jpg', 1, 300000),
(93, 24, 30, 'Quần ripjeans', 'quan-ripjeans-den1.jpg', 1, 400000),
(94, 23, 30, 'Quần thun', 'quan-thun1.jpg', 5, 300000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_product`
--

CREATE TABLE `img_product` (
  `id_img_product` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `anh_mota` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `img_product`
--

INSERT INTO `img_product` (`id_img_product`, `id_product`, `anh_mota`) VALUES
(49, 17, 'quan_joker1.jpg'),
(50, 17, 'quan_joker2.jpg'),
(51, 17, 'quan_joker3.jpg'),
(52, 18, 'ao-thun-unisex2.jpg'),
(53, 18, 'ao-thun-unisex3.jpg'),
(54, 18, 'ao-thun-unisex4.jpg'),
(55, 19, 'quan-thun2.jpg'),
(56, 19, 'quan-thun3.jpg'),
(57, 19, 'quan-thun4.jpg'),
(58, 20, '162646550_507478250245550_7016940340386480577_n.jpg'),
(59, 21, 'quan-jeans-baggy2.jpg'),
(60, 21, 'quan-jeans-baggy3.jpg'),
(61, 21, 'quan-jeans-baggy4.jpg'),
(65, 23, 'quan-thun2.jpg'),
(66, 23, 'quan-thun3.jpg'),
(67, 23, 'quan-thun4.jpg'),
(68, 24, 'quan-ripjeans-den2.jpg'),
(69, 24, 'quan-ripjeans-den3.jpg'),
(70, 24, 'quan-ripjeans-den4.jpg'),
(79, 22, 'ao-phong-graphictees2.jpg'),
(80, 22, 'ao-phong-graphictees3.jpg'),
(81, 22, 'ao-phong-graphictees4.jpg'),
(82, 26, 'ao-so-mi-flannel2.jpg'),
(83, 26, 'ao-so-mi-flannel4.jpg'),
(84, 25, 'bikini_den2.jpg'),
(85, 25, 'bikini_den3.jpg'),
(86, 27, 'bikini_goi_cam2.jpg'),
(87, 27, 'bikini_goi_cam3.jpg'),
(90, 28, 'ao-so-mi-flannel1.jpg'),
(91, 28, 'ao-so-mi-flannel2.jpg'),
(92, 28, 'ao-so-mi-flannel4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_danh_muc` int(11) NOT NULL,
  `ten_sanpham` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `anh_sanpham` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia_sanpham` float NOT NULL,
  `gia_khuyenmai` float DEFAULT NULL,
  `chitiet` text COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sdt` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `sdt`, `password`) VALUES
(16, 'ledangquang', 'quang@gmail.com', 123123123, '$2y$10$SPo9Sf5h4ftVJnF8.14ffu6Ht6fg4tkfmmr1qcR1YUOPk8xNS5a6C');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `diachi_donhang`
--
ALTER TABLE `diachi_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `img_product`
--
ALTER TABLE `img_product`
  ADD PRIMARY KEY (`id_img_product`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_id_danhmuc` (`id_danh_muc`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `diachi_donhang`
--
ALTER TABLE `diachi_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `img_product`
--
ALTER TABLE `img_product`
  MODIFY `id_img_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_id_danhmuc` FOREIGN KEY (`id_danh_muc`) REFERENCES `danhmuc` (`id_danhmuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
