-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2024 at 10:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanwebtqn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int(12) NOT NULL,
  `name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `pttt` tinyint(1) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `name`, `address`, `tel`, `email`, `total`, `pttt`, `user`) VALUES
(1, 'Nguyễn Văn A', 'Hà Nội', '9542370148', 'admin@gmail.com', 280000, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(12) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `dongia` int(12) NOT NULL,
  `soluong` int(3) NOT NULL,
  `thanhtien` int(12) NOT NULL,
  `idbill` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `hoten` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sdt` int(12) NOT NULL,
  `ghichu` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`hoten`, `email`, `sdt`, `ghichu`) VALUES
('Nguyễn Văn A', 'anhA@gmail.com', 12345678, '...');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role_name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `masp` int(10) NOT NULL,
  `nhom_id` varchar(11) NOT NULL,
  `tensp` varchar(30) NOT NULL,
  `mota` text NOT NULL,
  `soluong` int(200) NOT NULL,
  `dongia` int(11) NOT NULL,
  `dongiaold` int(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `enable` tinyint(11) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`masp`, `nhom_id`, `tensp`, `mota`, `soluong`, `dongia`, `dongiaold`, `img`, `enable`, `ghichu`) VALUES
(1, '1', 'Giày thể thao nam', '...', 10, 300000, 400000, 'giaythethao.jpg', 1, '...'),
(2, '1', 'Giày thể thao độn đế nữ ', '... ', 2, 390000, 420000, 'giaytheothaonu.jpg', 1, '... '),
(3, '2', 'Vợt cầu lông Tiến Minh  ', '...  ', 3, 820000, 900000, 'Vợt cầu lông.jpg', 1, '...  '),
(4, '2', 'Bóng chuyền Vnasport  ', '...  ', 3, 65000, 172000, 'quả-bóng-chuyền-vnasports.jpg', 1, '...  '),
(5, '3', 'Vali Nhựa  ', '...  ', 14, 600000, 700000, 'vali-nhua-205-20-inch-24-inch-den-6-1.jpg', 1, '...  '),
(6, '4', 'Hộp đựng bàn chải đánh răng  ', '...  ', 6, 70000, 82000, 'hopdungbanchai.jpg', 1, '...  '),
(7, '1', 'Hộp đựng bàn chải đánh răng  ', '...  ', 20, 100000, 150000, 'a.jpg', 1, '...  '),
(8, '2', 'Bóng rổ chuyên dụng Indoor', '...', 7, 170000, 200000, 'bongro.jpg', 1, '...'),
(9, '5', 'Nón Bucket thời trang', '...', 11, 210000, 260000, 'bucket.jpg', 1, '...'),
(10, '5', 'Phụ kiện đồng hồ nữ', '...', 4, 400000, 620000, 'mau-dong-ho-deo-tay-nu-mat-hinh-canh-buom.jpg', 1, '...');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham_nhom`
--

CREATE TABLE `sanpham_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham_nhom`
--

INSERT INTO `sanpham_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Giày', '...'),
(2, 'Dụng cụ thể thao giã ngoại', '...'),
(3, 'Vali', '...'),
(4, 'Phụ kiện du lịch', '...'),
(5, 'Phụ kiện thời trang', '...');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `tendangnhap` varchar(30) NOT NULL,
  `matkhau` varchar(30) DEFAULT NULL,
  `hoten` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `enable` tinyint(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `tendangnhap`, `matkhau`, `hoten`, `email`, `enable`, `role_id`) VALUES
(1, 'anhA', '123', 'anhA', 'anhA@gmail.com', 1, 1),
(2, 'admin', 'admin', 'admin', 'admin@gmail.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `nhom_id` int(11) NOT NULL DEFAULT 0,
  `tentintuc` varchar(30) NOT NULL,
  `tennguoidang` varchar(30) NOT NULL,
  `ngaydang` int(11) NOT NULL,
  `mota` text NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc`
--

INSERT INTO `tintuc` (`id`, `nhom_id`, `tentintuc`, `tennguoidang`, `ngaydang`, `mota`, `img`) VALUES
(14, 2, 'Bóng chuyền là môn thể thao ', 'Shoujo', 6, 'Khi nói đến môn thể thao phổ biến và thú vị, không thể không nhắc đến bóng chuyền. Và ẩn sau những trận đấu hấp dẫn và những pha bóng ngoạn mục là một nguyên liệu đặc biệt, không thể thiếu: quả bóng chuyền. Được làm từ những chất liệu đặc biệt và thông qua quá trình sản xuất công phu, quả bóng chuyền không chỉ là một công cụ thi đấu mà còn là biểu tượng của sự cống hiến và niềm đam mê trong môn thể thao này.', 'tintucbongchuyen.jpg'),
(16, 1, 'Thương hiệu giày nike', 'Hùng', 2, 'Nike luôn dẫn đầu trong việc áp dụng công nghệ mới và thiết kế đột phá vào sản phẩm của mình. Từ việc sử dụng các vật liệu tiên tiến như Flyknit và React Foam cho đến việc tích hợp các công nghệ đàn hồi và thoáng khí, mỗi đôi giày Nike không chỉ là một sản phẩm thể thao mà còn là một tác phẩm nghệ thuật kỹ thuật số, tạo ra cảm giác thoải mái và linh hoạt cho người mang.\r\n\r\n', 'giaynike.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tintuc_nhom`
--

CREATE TABLE `tintuc_nhom` (
  `id` int(10) NOT NULL,
  `tennhom` varchar(30) NOT NULL,
  `ghichu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tintuc_nhom`
--

INSERT INTO `tintuc_nhom` (`id`, `tennhom`, `ghichu`) VALUES
(1, 'Giày ', 'xịn xò   '),
(2, 'Dụng cụ thể thao giã ngoại', 'Mẹo đó '),
(3, 'Vali', 'Hí HÍ  '),
(4, 'Phụ kiện du lịch', 'perfect ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taikhoan_role` (`role_id`);

--
-- Indexes for table `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tintuc_nhom`
--
ALTER TABLE `tintuc_nhom`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `fk_taikhoan_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
