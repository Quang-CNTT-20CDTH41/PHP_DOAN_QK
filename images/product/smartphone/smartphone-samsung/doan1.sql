-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2021 lúc 11:19 AM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accessory`
--

CREATE TABLE `accessory` (
  `accessory_id` int(5) NOT NULL,
  `accessory_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `accessory_img` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `accessory_url` char(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accessory`
--

INSERT INTO `accessory` (`accessory_id`, `accessory_name`, `accessory_img`, `accessory_url`) VALUES
(1, 'Thẻ nhớ - USB', './images/accessory/the-nho-usb.png', 'the-nho-usb'),
(2, 'Tai nghe', './images/accessory/tai-nghe.png', 'tai-nghe'),
(3, 'Sạc dự phòng', './images/accessory/sac-du-phong.png', 'sac-du-phong'),
(4, 'Quạt Mini', './images/accessory/quat.png', 'quat-mini'),
(5, 'Loa', './images/accessory/loa.png', 'loa'),
(6, 'Máy lọc không khí', './images/accessory/icon-web-cs6ok.png', 'may-loc'),
(7, 'Sạc - Dây cáp', './images/accessory/cu-cap-sac.png', 'day-cap'),
(8, 'Camera', './images/accessory/camera.png', 'camera'),
(9, 'Bộ phát wifi', './images/accessory/bo-phat-wjfi.png', 'router'),
(10, 'Apple', './images/accessory/apple.png', 'phu-kien-apple'),
(11, 'Bao da - Ốp lưng', './images/accessory/bao-da-op-lung.png', 'baoda-oplung'),
(12, 'Roobot hút bụi', './images/accessory/icon-web-cs6j.png', 'roobot');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `category_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Apple'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `menu_id` int(5) NOT NULL,
  `menu_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(4) NOT NULL,
  `url` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `icon_menu` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`, `parent`, `url`, `icon_menu`) VALUES
(1, 'Điện thoại', 0, 'smartphone', '<i class=\"bi bi-phone-fill\"></i>'),
(2, 'Máy tính bảng', 0, 'tablet', '<i class=\"bi bi-tablet\"></i>'),
(3, 'Laptop', 0, 'laptop', '<i class=\"bi bi-laptop\"></i>'),
(4, 'Watch', 0, 'watch', '<i class=\"bi bi-smartwatch\"></i>'),
(5, 'Phụ kiện', 0, 'accessory', '<i class=\"bi bi-battery-charging\"></i>'),
(16, 'Samsung', 1, 'smartphone-samsung', ''),
(17, 'Apple', 1, 'smartphone-apple', ''),
(18, 'Samsung', 2, 'tablet-samsung', ''),
(19, 'Apple', 2, 'tablet-apple', ''),
(20, 'Samsung', 4, 'watch-samsung', ''),
(21, 'Apple', 4, 'watch-apple', ''),
(23, 'Samsung', 3, 'laptop-samsung', ''),
(24, 'Apple', 3, 'laptop-apple', ''),
(25, 'Dell', 3, 'laptop-dell', ''),
(26, 'Hp', 3, 'laptop-hp', ''),
(27, 'Asus', 3, 'laptop-asus', ''),
(31, 'Xiaomi', 4, 'watch-xiaomi', ''),
(34, 'Oppo', 1, 'smartphone-oppo', ''),
(53, 'Tin tức', 0, 'news', '<i class=\"bi bi-newspaper\"></i>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(5) NOT NULL,
  `product_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `price_sale` int(11) DEFAULT NULL,
  `descript` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `product_img` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `menu_id` int(5) NOT NULL,
  `menu_parent` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `price_sale`, `descript`, `product_img`, `menu_id`, `menu_parent`) VALUES
(3, 'Iphone 11', 15700000, 0, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-apple/iphone-11.jpg', 1, 17),
(4, 'Apple Iphone 11 Pro Max', 18500000, 18300000, 'Hàng mới về', './images/product/smartphone/smartphone-apple/iphone-11-pro-max.jpg', 1, 17),
(5, 'Apple Iphone 12', 19100000, 0, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-apple/iphone-12.jpg', 1, 17),
(6, 'Apple Iphone 12 Pro Max', 21000000, 0, 'Hàng mới về', './images/product/smartphone/smartphone-apple/iphone-12-pro-max.jpg', 1, 17),
(7, 'Apple Iphone 13', 29000000, 28400000, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-apple/iphone-13.jpg', 1, 17),
(8, 'Apple Iphone 13 Pro Max', 35000000, 32500000, 'Hàng mới về', './images/product/smartphone/smartphone-apple/iphone-13-pro-max.jpg', 1, 17),
(9, 'Samsung Galaxy A11', 2990000, 0, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-samsung/samsung-a11.jpg', 1, 16),
(10, 'Samsung Galaxy A21', 2040000, 0, 'Hàng mới về', './images/product/smartphone/smartphone-samsung/samsung-a21s.jpg', 1, 16),
(11, 'Samsung Note 10', 5340000, 5320000, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-samsung/samsung-note-10.jpg', 1, 16),
(12, 'Samsung Galaxy s21', 12800000, 0, 'Sản phẩm mới nhất', './images/product/smartphone/smartphone-samsung/samsung-s21.jpg', 1, 16),
(16, 'Apple Ipad Mini 6', 540000, 459000, '', './images/product/tablet/tablet-apple/preview-25.png', 2, 19),
(17, 'Apple Ipad Mini 5', 3900000, 3500000, '', './images/product/tablet/tablet-apple/preview-22.png', 2, 19),
(18, 'Apple Ipad Mini 7', 13000000, 12500000, '', './images/product/tablet/tablet-apple/preview-23.png', 2, 19),
(19, 'Apple Ipad Gen 6', 7300000, 5900000, '', './images/product/tablet/tablet-apple/ipad-gen-6.png', 2, 19),
(20, 'Apple Ipad Gen 9', 8900000, 8000000, '', './images/product/tablet/tablet-apple/ipad-gen-9.png', 2, 19),
(21, 'Apple Ipad Gen 7', 7800000, 7500000, '', './images/product/tablet/tablet-apple/ipad_gen_7.png', 2, 19),
(22, 'Apple Ipad Gen 6', 7300000, 5900000, '', './images/product/tablet/tablet-apple/ipad-gen-6.png', 2, 19),
(23, 'Apple Ipad Gen 9', 8900000, 8000000, '', './images/product/tablet/tablet-apple/ipad-gen-9.png', 2, 19),
(24, 'Apple Ipad Gen 7', 7800000, 7500000, '', './images/product/tablet/tablet-apple/ipad_gen_7.png', 2, 19),
(25, 'Apple iPad Air 10', 13000000, 11000000, '', './images/product/tablet/tablet-apple/preview-1.png', 2, 13),
(26, 'Apple iPad Air 9', 14000000, 13500000, '', './images/product/tablet/tablet-apple/ipad.png', 2, 19),
(27, 'Apple iPad Air 8', 6600000, 62500000, '', './images/product/tablet/tablet-apple/ipad-air-10.png', 2, 13),
(30, 'Apple Watch Series 6', 9750000, 9344000, '', './images/product/watch/watch-apple/40-gps.png', 4, 14),
(31, 'Apple Watch Series 7', 8870000, 8810000, '', './images/product/watch/watch-apple/gps-nhom-red.png', 4, 14),
(33, 'Dell Inspiron 15000', 15000000, 14500000, '', './images/product/laptop/laptop-dell/hp-245.png', 3, 25),
(34, 'Asus Vivobook A515EA', 12300000, 11300000, '', './images/product/laptop/laptop-asus/asus-1.png', 3, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(5) NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(5) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `hoten`, `gender`, `user_name`, `password`, `birthday`, `address`, `email`, `phone`, `level`) VALUES
(31, 'Quang Lê Văn', 'Nam', 'quangcntt', 'c375b78916a860e2fb436a213b15aae5', '2021-11-12', 'TDP La Chữ Thượng, Hương Chữ, Hương Trà, Thừa Thiên Huế', 'quangiphonex@gmail.com', '0708050907', 0),
(33, 'Adminstrator', 'Nam', 'admin', 'c375b78916a860e2fb436a213b15aae5', '1998-07-19', 'TDP La Chữ Thượng, Hương Chữ, Hương Trà, Thừa Thiên Huế	', 'quangiphonex@gmail.com', '0708050907', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`accessory_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accessory`
--
ALTER TABLE `accessory`
  MODIFY `accessory_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `menu_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
