-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2021 lúc 02:38 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dn2ndhome`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `ct_subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ct_message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`contact_id`, `ct_subject`, `ct_message`, `user_id`, `created_at`) VALUES
(1, 'Góp ý', 'Tôi nghĩ website nên mở rộng phạm vi dịch vụ', 14, '29-11-2021'),
(2, 'Kiến nghị', 'Tôi thấy website rất ok, sẽ tốt hơn nếu website bổ sung dịch vụ bán nhà', 6, '30-11-2021]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `district`
--

CREATE TABLE `district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `district`
--

INSERT INTO `district` (`district_id`, `district_name`) VALUES
(1, 'Hải Châu'),
(2, 'Cẩm lệ'),
(3, 'Thanh Khê'),
(4, 'Liên Chiểu'),
(5, 'Ngũ Hành Sơn'),
(6, 'Sơn Trà'),
(7, 'Hòa Vang'),
(8, 'Hoàng Gần');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `prd_info`
--

CREATE TABLE `prd_info` (
  `prd_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `district_id` int(10) NOT NULL,
  `ward_id` int(10) NOT NULL,
  `prd_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `prd_detail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prd_status` int(10) NOT NULL,
  `create_day` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `prd_info`
--

INSERT INTO `prd_info` (`prd_id`, `user_id`, `district_id`, `ward_id`, `prd_title`, `area`, `price`, `prd_detail`, `img`, `prd_status`, `create_day`) VALUES
(12, 5, 5, 36, 'Phòng trọ gần Việt Hàn IT', 20, 1000000, 'Phòng mới xây, đẹp, có nỗi sẵn dây điều hòa\r\n+An ninh tốt\r\n+Có gác lửng', 'phongtro-1.jpg', 2, '28-11-2021'),
(13, 9, 1, 1, 'Phòng trọ Gần trường Đông Á', 25, 1500000, 'Phòng rộng, có thể ở 3 người\r\n+Có đồng hộ điện nước riêng', 'gia-xay-phong-tro-cho-thue-1.jpg', 2, '28-11-2021'),
(14, 10, 2, 15, 'Phòng trọ số 15 Huỳnh Minh Khai phường Hòa Phát', 18, 1200000, 'Phòng đẹp giá rẻ, gần khu trung tâm', 'phong1.jpg', 2, '28-11-2021'),
(16, 5, 2, 15, '1', 20, 2500000, 'hong co gi het', 'thiet-ke-phong-tro-khep-kin-22m2.jpg', 2, '02-12-2021'),
(17, 9, 2, 18, 'test', 20, 3000000, 'igvsbdvjsbdvjsdbdbf', 'unnamed.jpg', 2, '03-12-2021'),
(18, 18, 3, 24, 'Cho thuê phòng trọ giá rẻ quận Thanh Khê', 25, 1800000, 'Cho thuê phòng trọ trung tâm tp Đà Nẵng giá rẻ', '861d6d72-trang-tr-phong-tro-dep-khong-gac-3.jpg', 2, '04-12-2021'),
(19, 19, 2, 18, '\r\nCho thuê Phòng trọ gần Chợ Hòa Cầm, Cẩm Lệ', 22, 1000000, 'Cho thuê Phòng trọ mới, gần chợ Hòa Cầm, gần bệnh viện Cẩm Lệ. Diện tích 24m2, có gác lửng', 'hi-xay-1-phong-tro.jpg', 2, '04-12-2021'),
(20, 19, 7, 47, 'Cho thuê phòng trọ, Ngô Mây, Hòa Vang, Đà Nẵng', 18, 1900000, 'Địa chỉ : 195 Ngô Mây, Hòa Vang, Đà Nẵng\r\n Phòng mới, sạch sẽ, thoáng mát', 'images (1).jfif', 2, '04-12-2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_level` int(10) NOT NULL,
  `created_at` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `pass`, `email`, `phone`, `avatar`, `user_level`, `created_at`) VALUES
(1, 'Admin1', '1', 'admin@gmail.com', '19001009', 'DefaultAvt.jpg', 1, '22-11-2021'),
(2, 'Quân', '1', 'quanphan2k2@gmail.com', '0364956666', 'tải xuống.jfif', 2, '02-12-2021'),
(3, 'Quân', '123456', 'email1@gmail.com', '', 'DefaultAvt.jpg', 2, '22-11-2021'),
(5, 'Minh', '1', 'mail2@gmail.com', '0732872362', 'tải xuống.jfif', 2, '22-11-2021'),
(6, 'Nam', '123456', '3@gmail.com', '', 'DefaultAvt.jpg', 2, '22-11-2021'),
(7, 'Hai', '1', '4@gmail.com', '', 'DefaultAvt.jpg', 2, '22-11-2021'),
(8, 'user5', 'q2002', '5@gmail.com', '', 'DefaultAvt.jpg', 2, '22-11-2021'),
(9, 'Hương', '1', 'huong@gmail.com', '', 'DefaultAvt.jpg', 2, '27-11-2021'),
(10, 'Hải', '1', 'hai@gmail.com', '', 'DefaultAvt.jpg', 2, '27-11-2021'),
(11, 'Khá', '1', 'kha@gmail.com', '', 'DefaultAvt.jpg', 2, '27-11-2021'),
(13, 'Hùng', '1', 'hung@gmail.com', '', 'DefaultAvt.jpg', 2, '28-11-2021'),
(14, 'Nam ', '1', 'nam@gmai.com', '', 'DefaultAvt.jpg', 2, '28-11-2021'),
(15, 'Hiếu', '1', 'hieu@gmail.com', '', 'DefaultAvt.jpg', 2, '28-11-2021'),
(18, 'Diluc', '1', 'diluc@gmail.com', '3974327321', '1109227.jpg', 2, '04-12-2021'),
(19, 'Keqing', '1', 'keqing@gmail.com', '', 'DefaultAvt.jpg', 2, '04-12-2021'),
(20, 'Bé Bo', '1', 'bo@gmail.com', '', 'DefaultAvt.jpg', 2, '04-12-2021');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ward`
--

CREATE TABLE `ward` (
  `ward_id` int(11) NOT NULL,
  `ward` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ward`
--

INSERT INTO `ward` (`ward_id`, `ward`, `district_id`) VALUES
(1, 'Bình Hiên', 1),
(2, 'Bình Thuận', 1),
(3, 'Hải Châu I', 1),
(4, 'Hải Châu II\r\n', 1),
(5, 'Hòa Cường Bắc', 1),
(6, 'Hòa Cường Nam', 1),
(7, 'Hòa Cường Đông', 1),
(8, 'Hòa Thuận Tây', 1),
(9, 'Nam Dương', 1),
(10, 'Phước Ninh', 1),
(11, 'Thạch Thang', 1),
(12, 'Thanh Bình', 1),
(13, 'Thuận Phước', 1),
(14, 'Hòa An', 2),
(15, 'Hòa Phát', 2),
(16, 'Hòa Thọ Đông', 2),
(17, 'Hòa Thọ Tây', 2),
(18, 'Hòa Xuân', 2),
(19, 'Khuê Trung', 2),
(20, 'An Khê', 3),
(21, 'Chính ', 3),
(22, 'Hòa Khê', 3),
(23, 'Tam Thuận', 3),
(24, 'Tân Chính', 3),
(25, 'Thạc Giác', 3),
(26, 'Thanh Khê Đông', 3),
(27, 'Thanh Khê Tây', 3),
(28, 'Vĩnh Trung', 3),
(29, 'Xuân Hà', 3),
(30, 'Hòa Hiệp Bắc\r\n', 4),
(31, 'Hòa Hiệp Nam\r\n', 4),
(32, 'Hòa Khánh Bắc', 4),
(33, 'Hòa Khánh Nam', 4),
(34, 'Hòa Minh ', 4),
(35, 'Hòa Hải', 5),
(36, 'Hòa Quý', 5),
(37, 'Khuê Mỹ', 5),
(38, 'Mỹ An', 5),
(39, 'An Hải Bắc', 6),
(40, 'An Hải Đông', 6),
(41, 'An Hải Tây', 6),
(42, 'Mân Thái', 6),
(43, 'Nại Hiên Đông', 6),
(44, 'Phước Mỹ', 6),
(45, 'Thọ Quang', 6),
(46, 'Hòa Bắc', 7),
(47, 'Hòa Châu', 7),
(48, 'Hòa Khương', 7),
(49, 'Hòa Liên', 7),
(50, 'Hòa Nhơn', 7),
(51, 'Hòa Ninh', 7),
(52, 'Hòa Phong', 7),
(53, 'Hòa Phú', 7),
(54, 'Hòa Phước', 7),
(55, 'Hòa Sơn', 7),
(56, 'Hòa Tiến', 7),
(57, 'Không có', 8);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `fk_user_contact` (`user_id`);

--
-- Chỉ mục cho bảng `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`district_id`);

--
-- Chỉ mục cho bảng `prd_info`
--
ALTER TABLE `prd_info`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `fk_user_prd` (`user_id`),
  ADD KEY `fk_district_prd` (`district_id`),
  ADD KEY `fk_ward_prd` (`ward_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`ward_id`),
  ADD KEY `district_id` (`district_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `district`
--
ALTER TABLE `district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `prd_info`
--
ALTER TABLE `prd_info`
  MODIFY `prd_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `ward`
--
ALTER TABLE `ward`
  MODIFY `ward_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `fk_user_contact` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Các ràng buộc cho bảng `prd_info`
--
ALTER TABLE `prd_info`
  ADD CONSTRAINT `fk_ward_prd` FOREIGN KEY (`ward_id`) REFERENCES `ward` (`ward_id`);

--
-- Các ràng buộc cho bảng `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `ward_ibfk_1` FOREIGN KEY (`district_id`) REFERENCES `district` (`district_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
