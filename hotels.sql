-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 04, 2024 lúc 07:25 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hotels`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_number` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `booking_number` varchar(255) NOT NULL,
  `user_gender` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `booking_price` varchar(255) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `max_persons` varchar(255) NOT NULL,
  `check_in_date` varchar(255) NOT NULL,
  `check_out_date` varchar(255) NOT NULL,
  `booking_status` varchar(255) NOT NULL DEFAULT 'Chưa giải quyết',
  `admin_remark` varchar(255) NOT NULL DEFAULT 'Chưa giải quyết'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `user_name`, `user_number`, `user_email`, `booking_number`, `user_gender`, `user_address`, `booking_date`, `booking_price`, `room_name`, `max_persons`, `check_in_date`, `check_out_date`, `booking_status`, `admin_remark`) VALUES
(19, 19, 'Quan huy', '0987654321', 'quanghuy.com@gmail.com', '37999600L', 'Nam', '18 P. Viên, Đông Ngạc,, Bắc Từ Liêm', '04/03/24', '8000000', 'P203', '4', '2024-03-13', '2024-03-29', 'Chưa giải quyết', 'Chưa giải quyết');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`) VALUES
(10, 'Phòng Bình Dân'),
(8, 'Phòng Tổng Thống'),
(9, 'Phòng 5 sao'),
(20, 'Phòng Hội Nghị');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_subject` varchar(255) NOT NULL,
  `contact_message` varchar(255) NOT NULL,
  `contact_date` varchar(255) NOT NULL,
  `contact_status` varchar(255) NOT NULL DEFAULT 'Chưa đọc'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `contact_name`, `contact_email`, `contact_subject`, `contact_message`, `contact_date`, `contact_status`) VALUES
(17, 'Hùng Hồ Văn', '2021050295@student.humg.edu.vn', '1', 'phòng khá oke', '04/03/24', 'Đã đọc'),
(18, 'Nguyễn quang huy', 'quanghuy.com@gmail.com', 'vấn đề phục vụ', 'nhân viên phục vụ chưa được tốt', '04/03/24', 'Chưa đọc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_subject` varchar(255) NOT NULL,
  `room_description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_image` varchar(255) NOT NULL,
  `room_price` decimal(10,2) NOT NULL,
  `room_size` varchar(255) NOT NULL,
  `room_view` varchar(255) NOT NULL,
  `no_of_bed` varchar(255) NOT NULL,
  `max_persons` varchar(255) NOT NULL,
  `room_status` varchar(255) NOT NULL DEFAULT 'Có sẵn'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `room_subject`, `room_description`, `category_id`, `room_image`, `room_price`, `room_size`, `room_view`, `no_of_bed`, `max_persons`, `room_status`) VALUES
(2, 'P203', 'Làm thư giãn trên giường trong phòng khách sạn  xem tivi, tận hưởng khoảnh khắc với gia đình, là phần tốt nhất của một kỳ nghỉ.', 'Phòng này có thể chứa ba người và đã được trang bị ba giường đôi; Một giường đôi và một giường đôi hoặc hai giường đôi. Gia đình thích trợ cấp bể bơi, báo hàng ngày miễn phí và bữa sáng miễn phí.', 9, '../assets/hotel_rooms/room-1.jpg', '500000.00', '65 m2', 'Bê bơi khách sạn', '3', '4', 'Có sẵn'),
(3, 'P406', 'Nếu bạn muốn ở trong phòng khách sạn, hãy giảm căng thẳng, hãy làm dự án của bạn, tận hưởng thời gian riêng tư của bạn. Bạn đang ở nhà !', 'Phòng này bao gồm một số phòng; Một phòng khách, một phòng ngủ và một nhà bếp chức năng riêng biệt. Đồ nội thất ấm cúng và các phòng là kỳ lạ. Thưởng thức Wi-Fi miễn phí, báo hàng ngày và nhà bếp riêng. Bạn có thể thuê một đầu bếp để chuẩn bị bữa ăn mong ', 10, '../assets/hotel_rooms/room-3.jpg', '360000.00', '30 m2', 'Nhìn ra khuôn viên khách sạn', '2', '3', 'Có sẵn'),
(8, 'P506', 'Ở trong phòng khách sạn như phòng vua khiến bạn ngồi và suy nghĩ về hoàng gia', 'Một phòng khách sạn với một chiếc giường cỡ king. Nội thất được trang trí bằng những bức tranh tường mô tả hoàng gia. Dịch vụ phòng được cung cấp. Wi-Fi miễn phí và báo hàng ngày được đảm bảo.', 9, '../assets/hotel_rooms/room-6.jpg', '650000.00', '70 m2', 'Nhìn ra trung tâm thành phố', '2', '4', 'Có sẵn'),
(9, 'P101', 'Trung tâm hội nghị dành cho các hội nghị lớn do khách sạn phục vụ', 'Tổ chức hội nghị', 20, '../assets/hotel_rooms/mini-aud.jpg', '10.00', '100 m2', 'Sảnh chính', '1', '300', 'Có sẵn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_of_reg` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Hoạt động',
  `role` varchar(255) NOT NULL DEFAULT 'Khách hàng'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `mobile_number`, `gender`, `email`, `password`, `date_of_reg`, `status`, `role`) VALUES
(3, 'Quang', 'Huy', '070691062594', 'Male', 'e@gmail.com', '$2y$10$jHfGnXQFXyNVhrSGsbAfMezS90iV8nQc1fLqbk4AqujTPmW54cBw2', '04/03/24', 'Hoạt động', 'Quản trị viên'),
(19, 'Nguyễn Quang', 'Huy', '0987654321', 'Nam', 'quanghuy.com@gmail.com', '$2y$10$uBxrUEOm2iIW/u.Acgocf.6OVskk3oiTC0UVo04jxLOo2UBw3xhk6', '04/03/24', 'Hoạt động', 'Khách hàng');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_email` (`contact_email`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
