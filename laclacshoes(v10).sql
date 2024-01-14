-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 13, 2024 lúc 07:04 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laclacshoes`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `anhsp`
--

CREATE TABLE `anhsp` (
  `MaSP` int(11) NOT NULL,
  `Anh1` varchar(500) NOT NULL,
  `Anh2` varchar(500) DEFAULT NULL,
  `Anh3` varchar(500) DEFAULT NULL,
  `Anh4` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `anhsp`
--

INSERT INTO `anhsp` (`MaSP`, `Anh1`, `Anh2`, `Anh3`, `Anh4`) VALUES
(4, 'NIKE FREE METCON 2 UT 2.png', 'NIKE FREE METCON 2 UT 3.jpg', 'NIKE FREE METCON 2 UT 4.jpg', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `MaBL` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `NoiDung` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ThoiGian` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`MaBL`, `MaSP`, `MaKH`, `NoiDung`, `ThoiGian`) VALUES
(1, 4, 1, 'Sản phẩm đẹp , chất lượng . ', '2019-10-27 00:00:00'),
(2, 4, 6, ' sản phẩm rất ok', '2019-10-27 20:58:25'),
(3, 4, 6, '  sản phẩm dùng tốt', '2019-10-27 23:29:35'),
(4, 4, 1, 'ok', '2019-10-29 14:38:48'),
(5, 4, 1, ' cho 5 sao', '2019-10-29 14:39:24'),
(6, 12, 1, 'a', '2019-10-31 14:41:10'),
(7, 4, 1, 'sản phẩm chất lượng', '2019-11-06 09:19:36'),
(8, 4, 1, 'toot', '2019-11-12 15:29:30'),
(9, 4, 1, 'ok', '2019-11-12 15:31:12'),
(10, 4, 1, 'ok', '2019-11-12 15:31:51'),
(11, 4, 1, 'ok', '2019-11-12 15:32:20'),
(12, 5, 1, 'ok', '2019-11-13 09:15:31'),
(14, 5, 1, 'sản phẩm tốt', '2019-12-18 17:12:34'),
(15, 10, 1, 'Rất đẹp', '2020-01-10 14:19:19'),
(16, 4, 6, 'a', '2023-06-12 13:54:02'),
(17, 4, 6, 'a', '2023-06-12 13:54:31'),
(18, 4, 6, 'test', '2023-06-12 13:54:56'),
(19, 4, 6, 'okii nò', '2023-06-12 13:55:12'),
(20, 4, 1, 'oki', '2023-06-21 08:24:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
  `MaHD` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `ThanhTien` decimal(10,0) NOT NULL,
  `Size` int(11) NOT NULL,
  `MaMau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`MaHD`, `MaSP`, `SoLuong`, `DonGia`, `ThanhTien`, `Size`, `MaMau`) VALUES
(70, 7, 3, '2449000', '7347000', 41, 'Trắng'),
(70, 11, 1, '4649000', '4649000', 39, 'none'),
(86, 4, 2, '3779000', '7558000', 37, 'none'),
(86, 53, 1, '1700000', '1700000', 42, 'none'),
(86, 70, 2, '1700000', '3400000', 41, 'Trắng'),
(87, 54, 2, '730000', '1460000', 42, 'Đen '),
(88, 4, 2, '3779000', '7558000', 36, 'none'),
(88, 12, 1, '2019000', '2019000', 39, 'Vàng'),
(89, 4, 1, '3779000', '3779000', 37, 'Hồng'),
(90, 4, 3, '3779000', '11337000', 36, 'Đỏ'),
(90, 4, 3, '3779000', '11337000', 36, 'Hồng'),
(91, 4, 1, '3779000', '3779000', 36, 'Đỏ'),
(92, 4, 1, '3779000', '3779000', 36, 'Hồng'),
(93, 4, 1, '3779000', '3779000', 36, 'Đỏ'),
(94, 4, 3, '3779000', '11337000', 36, 'Đỏ'),
(95, 5, 1, '3469000', '3469000', 39, 'Xanh'),
(96, 4, 2, '3779000', '7558000', 36, 'Hồng'),
(97, 4, 1, '3779000', '3779000', 36, 'Đỏ'),
(97, 7, 6, '2449000', '14694000', 39, 'Trắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietsanpham`
--

CREATE TABLE `chitietsanpham` (
  `MaSP` int(11) NOT NULL,
  `MaSize` int(11) NOT NULL,
  `MaMau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chitietsanpham`
--

INSERT INTO `chitietsanpham` (`MaSP`, `MaSize`, `MaMau`, `SoLuong`) VALUES
(4, 36, 'Đỏ', 91),
(4, 36, 'Hồng', 185),
(4, 36, 'none', 100),
(4, 37, 'Đỏ', 101),
(4, 37, 'Hồng', 190),
(4, 37, 'none', 100),
(4, 38, 'Đỏ', 110),
(4, 38, 'Hồng', 191),
(4, 38, 'none', 100),
(4, 39, 'Đỏ', 110),
(4, 39, 'Hồng', 100),
(4, 39, 'none', 100),
(4, 40, 'Đỏ', 100),
(4, 40, 'Hồng', 100),
(4, 40, 'none', 100),
(4, 41, 'Đỏ', 100),
(4, 41, 'Hồng', 100),
(4, 41, 'none', 100),
(4, 42, 'Đỏ', 100),
(4, 42, 'Hồng', 100),
(4, 42, 'none', 100),
(4, 43, 'Đỏ', 100),
(4, 43, 'Hồng', 100),
(4, 43, 'none', 100),
(5, 39, 'Xanh', 97),
(5, 40, 'Xanh', 98),
(5, 41, 'Xanh', 100),
(5, 42, 'Xanh', 100),
(6, 38, 'Đen ', 36),
(6, 39, 'Đen ', 40),
(6, 40, 'Đen ', 40),
(6, 41, 'Đen ', 40),
(6, 42, 'Đen ', 40),
(7, 39, 'Đen - Trắng', 16),
(7, 39, 'Trắng', 44),
(7, 40, 'Đen - Trắng', 15),
(7, 40, 'Trắng', 50),
(7, 41, 'Đen - Trắng', 20),
(7, 41, 'Trắng', 44),
(9, 38, 'Đen - Trắng', 39),
(9, 39, 'Đen - Trắng', 40),
(9, 40, 'Đen - Trắng', 40),
(9, 41, 'Đen - Trắng', 40),
(9, 42, 'Đen - Trắng', 40),
(10, 39, 'Trắng', 87),
(10, 40, 'Trắng', 100),
(10, 41, 'Trắng', 100),
(10, 42, 'Trắng', 95),
(11, 39, 'none', 90),
(11, 40, 'none', 95),
(11, 41, 'none', 95),
(11, 42, 'none', 100),
(12, 39, 'Vàng', 99),
(12, 40, 'Vàng', 99),
(12, 41, 'Vàng', 100),
(53, 42, 'none', 493),
(54, 36, 'Đen ', 500),
(54, 37, 'Đen ', 500),
(54, 38, 'Đen ', 500),
(54, 39, 'Đen ', 500),
(54, 40, 'Đen ', 500),
(54, 41, 'Đen ', 500),
(54, 42, 'Đen ', 496),
(54, 43, 'Đen ', 500),
(55, 39, 'Đen ', 194),
(55, 40, 'Đen ', 200),
(55, 41, 'Đen ', 200),
(56, 38, 'Đen - Trắng', 99),
(56, 39, 'Đen - Trắng', 99),
(56, 40, 'Đen - Trắng', 100),
(56, 41, 'Đen - Trắng', 100),
(68, 39, 'Đen ', 499),
(68, 39, 'Đen - Trắng', 29),
(68, 40, 'Đen ', 500),
(68, 40, 'Đen - Trắng', 30),
(68, 41, 'Đen ', 500),
(68, 41, 'Đen - Trắng', 30),
(69, 39, 'none', 100),
(69, 40, 'none', 100),
(69, 41, 'none', 100),
(70, 39, 'Đen - Trắng', 100),
(70, 39, 'Trắng', 98),
(70, 40, 'Đen - Trắng', 100),
(70, 40, 'Trắng', 100),
(70, 41, 'Đen - Trắng', 100),
(70, 41, 'Trắng', 100),
(71, 40, 'Đen ', 100),
(71, 41, 'Đen ', 95),
(71, 42, 'Đen ', 100),
(72, 39, 'Đen - Trắng', 100),
(72, 39, 'Trắng', 200),
(72, 40, 'Đen - Trắng', 99),
(72, 40, 'Trắng', 200),
(72, 41, 'Đen - Trắng', 100),
(72, 41, 'Trắng', 200),
(73, 36, 'Đen ', 100),
(73, 37, 'Đen ', 100),
(73, 38, 'Đen ', 100),
(73, 39, 'Đen ', 100),
(73, 40, 'Đen ', 100),
(73, 41, 'Đen ', 100),
(73, 42, 'Đen ', 100),
(73, 43, 'Đen ', 100),
(74, 38, 'Đen - Trắng', 100),
(74, 39, 'Đen - Trắng', 100),
(74, 40, 'Đen - Trắng', 100),
(74, 41, 'Đen - Trắng', 100),
(75, 38, 'Đen ', 95),
(75, 38, 'Đen - Trắng', 40),
(75, 38, 'Trắng', 50),
(75, 39, 'Đen ', 100),
(75, 39, 'Đen - Trắng', 40),
(75, 39, 'Trắng', 50),
(75, 40, 'Đen ', 100),
(75, 40, 'Đen - Trắng', 40),
(75, 40, 'Trắng', 50),
(75, 41, 'Đen ', 100),
(75, 41, 'Đen - Trắng', 40),
(75, 41, 'Trắng', 50),
(75, 42, 'Đen ', 100),
(75, 42, 'Đen - Trắng', 40),
(75, 42, 'Trắng', 50),
(76, 38, 'Đen ', 95),
(76, 38, 'Trắng', 40),
(76, 39, 'Đen ', 99),
(76, 39, 'Trắng', 40),
(76, 40, 'Đen ', 100),
(76, 40, 'Trắng', 40),
(76, 41, 'Đen ', 100),
(76, 41, 'Trắng', 40),
(76, 42, 'Đen ', 100),
(76, 42, 'Trắng', 40),
(77, 39, 'Đen - Trắng', 500),
(77, 40, 'Đen - Trắng', 500),
(77, 41, 'Đen - Trắng', 500);

--
-- Bẫy `chitietsanpham`
--
DELIMITER $$
CREATE TRIGGER `tongsl` AFTER UPDATE ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = NEW.MaSP) WHERE MaSP = NEW.MaSP
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tongsl_del` AFTER DELETE ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = OLD.MaSP) WHERE MaSP = OLD.MaSP
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tongsl_insert` AFTER INSERT ON `chitietsanpham` FOR EACH ROW UPDATE sanpham SET SoLuong= (SELECT SUM(SoLuong) from chitietsanpham WHERE MaSP = NEW.MaSP) WHERE MaSP = NEW.MaSP
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDM` int(11) NOT NULL,
  `TenDM` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDM`, `TenDM`) VALUES
(1, 'Sản Phẩm Nổi Bật'),
(2, 'Sản phẩm tháng 1'),
(3, 'Sản Phẩm bán chạy'),
(10, 'Sản phẩm tuyệt vời');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL,
  `MaNV` int(11) DEFAULT NULL,
  `NgayDat` datetime DEFAULT current_timestamp(),
  `NgayGiao` datetime DEFAULT NULL,
  `PhuongThucThanhToan` tinyint(4) NOT NULL,
  `TinhTrang` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `MaNVGH` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `MaKH`, `MaNV`, `NgayDat`, `NgayGiao`, `PhuongThucThanhToan`, `TinhTrang`, `TongTien`, `MaNVGH`) VALUES
(70, 6, NULL, '2023-06-16 16:55:54', NULL, 1, 'chưa duyệt', '11996000', NULL),
(86, 1, 3, '2023-06-19 16:52:51', NULL, 1, 'Hủy Bỏ', '12658000', NULL),
(87, 1, NULL, '2023-06-19 17:20:30', NULL, 2, 'chưa duyệt', '1460000', NULL),
(88, 1, 3, '2023-06-20 09:18:27', '2023-06-21 10:23:59', 3, 'hoàn thành', '9577000', '3'),
(89, 1, 3, '2023-06-21 08:31:12', '2023-06-22 08:32:24', 3, 'hoàn thành', '3679000', '3'),
(90, 1, 3, '2024-01-07 18:02:04', '2024-01-09 21:42:00', 3, 'hoàn thành', '22674000', '3'),
(91, 1, 3, '2024-01-07 18:08:39', '2024-01-09 21:21:40', 2, 'hoàn thành', '3779000', '3'),
(92, 1, 3, '2024-01-07 18:10:31', '2024-01-09 21:20:10', 3, 'hoàn thành', '3779000', '3'),
(93, 1, 3, '2024-01-07 21:23:53', '2024-01-09 16:29:23', 2, 'hoàn thành', '3779000', '3'),
(94, 1, 3, '2024-01-07 21:50:45', '2024-01-09 16:29:24', 1, 'hoàn thành', '7558000', '3'),
(95, 1, 3, '2024-01-07 21:51:45', '2024-01-09 16:29:22', 3, 'hoàn thành', '3469000', '3'),
(96, 1, 3, '2024-01-07 21:53:17', '2024-01-09 16:29:21', 2, 'hoàn thành', '7558000', '3'),
(97, 1, 3, '2024-01-07 21:54:28', '2024-01-09 16:29:13', 1, 'hoàn thành', '18473000', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `MaKH` int(11) NOT NULL,
  `TenKH` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`MaKH`, `TenKH`, `Email`, `SDT`, `DiaChi`, `MatKhau`) VALUES
(6, 'Nguyễn Nam Cường', 'cuong@gmail.com', '0331123312', 'diachi', '123456'),
(1, 'Nguyễn Đình Trí', 'tringuyen25071998@gmail.com', '0778923743', '62/32 trần thánh tông - tân bình - hcm', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhangphieugiamgia`
--

CREATE TABLE `khachhangphieugiamgia` (
  `id` int(11) NOT NULL,
  `MaPGG` int(11) NOT NULL,
  `MaKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhangphieugiamgia`
--

INSERT INTO `khachhangphieugiamgia` (`id`, `MaPGG`, `MaKH`) VALUES
(1, 1, 1),
(2, 2, 6),
(3, 2, 1),
(4, 1, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyenmai`
--

CREATE TABLE `khuyenmai` (
  `MaKM` int(11) NOT NULL,
  `TenKM` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `MoTa` varchar(11) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `KM_PT` int(5) DEFAULT NULL,
  `TienKM` decimal(10,0) DEFAULT NULL,
  `NgayBD` date DEFAULT NULL,
  `NgayKT` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khuyenmai`
--

INSERT INTO `khuyenmai` (`MaKM`, `TenKM`, `MoTa`, `KM_PT`, `TienKM`, `NgayBD`, `NgayKT`) VALUES
(1, 'Tri Ân Khách Hàng', 'sale', 0, '50000', '2020-01-01', '2024-01-31'),
(3, 'Vui Xuân - Đón Tết ', NULL, 30, NULL, '2019-12-19', '2020-02-29'),
(4, 'Khuyến Mãi Đặc Biệt', NULL, NULL, '100000', '2019-12-19', '2020-01-31'),
(5, 'khuyễn mãi đặc biệt trị giá 500.000 đ', 'ok', 1, '500000', '2020-01-02', '2020-01-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mau`
--

CREATE TABLE `mau` (
  `MaMau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'none'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `mau`
--

INSERT INTO `mau` (`MaMau`) VALUES
('Đen '),
('Đen - Trắng'),
('Đỏ'),
('Hồng'),
('none'),
('Trắng'),
('Vàng'),
('Xanh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoinhan`
--

CREATE TABLE `nguoinhan` (
  `MaHD` int(11) NOT NULL,
  `TenNN` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChiNN` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDTNN` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoinhan`
--

INSERT INTO `nguoinhan` (`MaHD`, `TenNN`, `DiaChiNN`, `SDTNN`) VALUES
(70, 'Nguyễn Nam Cường', 'diachi', '1228923743'),
(86, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(87, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(88, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(89, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(90, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(91, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(92, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(93, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(94, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(95, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(96, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743'),
(97, 'Nguyễn Đình Trí', '62/32 trần thánh tông - tân bình - hcm', '778923743');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhacc`
--

CREATE TABLE `nhacc` (
  `MaNCC` int(11) NOT NULL,
  `TenNCC` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhacc`
--

INSERT INTO `nhacc` (`MaNCC`, `TenNCC`) VALUES
(1, 'Nike'),
(2, 'Adidas'),
(3, 'Converse'),
(4, 'Balenciaga'),
(6, 'Vans'),
(7, 'Gucci');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` int(11) NOT NULL,
  `TenNV` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(12) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MatKhau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Quyen` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `Email`, `SDT`, `DiaChi`, `MatKhau`, `Quyen`) VALUES
(3, 'Admin', 'admin@gmail.com', '905027527', 'Số 451 Hoàng Diệu - Thành phố Đà Nẵng', 'admin', 1),
(4, 'Nguyễn Nam Cường', 'cuong@gmail.com', '132465798', 'Số 451 Hoàng Diệu - Thành phố Đà Nẵng', '123456', 3),
(2, 'Nhân Viên Bán Hàng ', 'NVBH@gmail.com', '123456789', 'Đà Nẵng', '123456', 4),
(1, 'Quản Lý', 'thongkul@gmail.com', '778923743', '12 núi thàng - đà nẵng', '123456', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieugiamgia`
--

CREATE TABLE `phieugiamgia` (
  `MaPGG` int(11) NOT NULL,
  `TenPhieu` varchar(200) NOT NULL,
  `CodePhieu` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `SoTien` int(11) NOT NULL,
  `ThoiHan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phieugiamgia`
--

INSERT INTO `phieugiamgia` (`MaPGG`, `TenPhieu`, `CodePhieu`, `SoLuong`, `SoTien`, `ThoiHan`) VALUES
(1, 'Lần đầu tiên mua hàng', 'FIRSTBUY1', 10000, 120000, '2026-04-24'),
(2, 'Phiếu tháng 1/2024', 'FIRSTMONTH', 100, 160000, '2024-01-30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieunhap`
--

CREATE TABLE `phieunhap` (
  `MaPN` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) DEFAULT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `NgayNhap` datetime NOT NULL DEFAULT current_timestamp(),
  `Note` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `Size` int(11) NOT NULL,
  `Mau` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieunhap`
--

INSERT INTO `phieunhap` (`MaPN`, `MaNV`, `MaSP`, `SoLuong`, `DonGia`, `TongTien`, `NgayNhap`, `Note`, `Size`, `Mau`) VALUES
(28, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 36, 'none'),
(29, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 37, 'none'),
(30, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 38, 'none'),
(31, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 39, 'none'),
(32, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 40, 'none'),
(33, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 41, 'none'),
(34, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 42, 'none'),
(35, 3, 4, 100, '3500000', '350000000', '2020-01-10 13:35:56', '', 43, 'none'),
(36, 3, 5, 100, '3300000', '330000000', '2020-01-10 13:37:09', '', 39, 'Xanh'),
(37, 3, 5, 100, '3300000', '330000000', '2020-01-10 13:37:09', '', 40, 'Xanh'),
(38, 3, 5, 100, '3300000', '330000000', '2020-01-10 13:37:09', '', 41, 'Xanh'),
(39, 3, 5, 100, '3300000', '330000000', '2020-01-10 13:37:09', '', 42, 'Xanh'),
(40, 3, 6, 40, '3000000', '120000000', '2020-01-10 13:37:47', 'hàng hot', 38, 'Đen'),
(41, 3, 6, 40, '3000000', '120000000', '2020-01-10 13:37:47', 'hàng hot', 39, 'Đen'),
(42, 3, 6, 40, '3000000', '120000000', '2020-01-10 13:37:47', 'hàng hot', 40, 'Đen'),
(43, 3, 6, 40, '3000000', '120000000', '2020-01-10 13:37:47', 'hàng hot', 41, 'Đen'),
(44, 3, 6, 40, '3000000', '120000000', '2020-01-10 13:37:47', 'hàng hot', 42, 'Đen'),
(45, 3, 7, 50, '2000000', '100000000', '2020-01-10 13:38:29', '', 39, 'Trắng'),
(46, 3, 7, 50, '2000000', '100000000', '2020-01-10 13:38:29', '', 40, 'Trắng'),
(47, 3, 7, 50, '2000000', '100000000', '2020-01-10 13:38:29', '', 41, 'Trắng'),
(48, 3, 7, 20, '2000000', '40000000', '2020-01-10 13:39:19', 'màu giới hạn', 39, 'Đen - Trắng'),
(49, 3, 7, 20, '2000000', '40000000', '2020-01-10 13:39:19', 'màu giới hạn', 40, 'Đen - Trắng'),
(50, 3, 7, 20, '2000000', '40000000', '2020-01-10 13:39:19', 'màu giới hạn', 41, 'Đen - Trắng'),
(51, 3, 9, 40, '2000000', '80000000', '2020-01-10 13:39:40', 'custom', 38, 'Đen - Trắng'),
(52, 3, 9, 40, '2000000', '80000000', '2020-01-10 13:39:40', 'custom', 39, 'Đen - Trắng'),
(53, 3, 9, 40, '2000000', '80000000', '2020-01-10 13:39:40', 'custom', 40, 'Đen - Trắng'),
(54, 3, 9, 40, '2000000', '80000000', '2020-01-10 13:39:40', 'custom', 41, 'Đen - Trắng'),
(55, 3, 9, 40, '2000000', '80000000', '2020-01-10 13:39:40', 'custom', 42, 'Đen - Trắng'),
(56, 3, 10, 100, '5000000', '500000000', '2020-01-10 13:39:59', '', 39, 'Trắng'),
(57, 3, 10, 100, '5000000', '500000000', '2020-01-10 13:39:59', '', 40, 'Trắng'),
(58, 3, 10, 100, '5000000', '500000000', '2020-01-10 13:39:59', '', 41, 'Trắng'),
(59, 3, 10, 100, '5000000', '500000000', '2020-01-10 13:39:59', '', 42, 'Trắng'),
(60, 3, 11, 100, '3500000', '350000000', '2020-01-10 13:40:23', '', 39, 'none'),
(61, 3, 11, 100, '3500000', '350000000', '2020-01-10 13:40:23', '', 40, 'none'),
(62, 3, 11, 100, '3500000', '350000000', '2020-01-10 13:40:23', '', 41, 'none'),
(63, 3, 11, 100, '3500000', '350000000', '2020-01-10 13:40:23', '', 42, 'none'),
(64, 3, 12, 100, '1800000', '180000000', '2020-01-10 13:40:58', '', 39, 'Vàng'),
(65, 3, 12, 100, '1800000', '180000000', '2020-01-10 13:40:58', '', 40, 'Vàng'),
(66, 3, 12, 100, '1800000', '180000000', '2020-01-10 13:40:58', '', 41, 'Vàng'),
(67, 3, 53, 500, '1500000', '750000000', '2020-01-10 13:42:37', '', 42, 'none'),
(68, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 36, 'Đen'),
(69, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 37, 'Đen'),
(70, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 38, 'Đen'),
(71, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 39, 'Đen'),
(72, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 40, 'Đen'),
(73, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 41, 'Đen'),
(74, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 42, 'Đen'),
(75, 3, 54, 500, '500000', '250000000', '2020-01-10 13:43:07', 'Hàng F1', 43, 'Đen'),
(76, 3, 55, 200, '1000000', '200000000', '2020-01-10 13:43:25', '', 39, 'Đen'),
(77, 3, 55, 200, '1000000', '200000000', '2020-01-10 13:43:25', '', 40, 'Đen'),
(78, 3, 55, 200, '1000000', '200000000', '2020-01-10 13:43:25', '', 41, 'Đen'),
(80, 3, 56, 100, '1500000', '150000000', '2020-01-10 13:44:49', '', 38, 'Đen - Trắng'),
(81, 3, 56, 100, '1500000', '150000000', '2020-01-10 13:44:49', '', 39, 'Đen - Trắng'),
(82, 3, 56, 100, '1500000', '150000000', '2020-01-10 13:44:49', '', 40, 'Đen - Trắng'),
(83, 3, 56, 100, '1500000', '150000000', '2020-01-10 13:44:49', '', 41, 'Đen - Trắng'),
(84, 3, 69, 100, '1500000', '150000000', '2020-01-10 13:46:02', '', 39, 'none'),
(85, 3, 69, 100, '1500000', '150000000', '2020-01-10 13:46:02', '', 40, 'none'),
(86, 3, 69, 100, '1500000', '150000000', '2020-01-10 13:46:02', '', 41, 'none'),
(87, 3, 68, 500, '1000000', '500000000', '2020-01-10 13:46:39', '', 39, 'Đen'),
(88, 3, 68, 500, '1000000', '500000000', '2020-01-10 13:46:39', '', 40, 'Đen'),
(89, 3, 68, 500, '1000000', '500000000', '2020-01-10 13:46:39', '', 41, 'Đen'),
(90, 3, 68, 30, '1000000', '30000000', '2020-01-10 13:46:52', '', 39, 'Đen - Trắng'),
(91, 3, 68, 30, '1000000', '30000000', '2020-01-10 13:46:52', '', 40, 'Đen - Trắng'),
(92, 3, 68, 30, '1000000', '30000000', '2020-01-10 13:46:52', '', 41, 'Đen - Trắng'),
(93, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:31', '', 39, 'Đen - Trắng'),
(94, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:31', '', 40, 'Đen - Trắng'),
(95, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:31', '', 41, 'Đen - Trắng'),
(96, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:43', '', 39, 'Trắng'),
(97, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:43', '', 40, 'Trắng'),
(98, 3, 70, 100, '1500000', '150000000', '2020-01-10 13:47:43', '', 41, 'Trắng'),
(99, 3, 71, 100, '1000000', '100000000', '2020-01-10 13:47:59', '', 40, 'Đen'),
(100, 3, 71, 100, '1000000', '100000000', '2020-01-10 13:47:59', '', 41, 'Đen'),
(101, 3, 71, 100, '1000000', '100000000', '2020-01-10 13:47:59', '', 42, 'Đen'),
(102, 3, 72, 100, '1500000', '150000000', '2020-01-10 13:48:13', '', 39, 'Trắng'),
(103, 3, 72, 100, '1500000', '150000000', '2020-01-10 13:48:13', '', 40, 'Trắng'),
(104, 3, 72, 100, '1500000', '150000000', '2020-01-10 13:48:13', '', 41, 'Trắng'),
(105, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:48:22', '', 39, 'Trắng'),
(106, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:48:22', '', 40, 'Trắng'),
(107, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:48:22', '', 41, 'Trắng'),
(108, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 36, 'Đen'),
(109, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 37, 'Đen'),
(110, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 38, 'Đen'),
(111, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 39, 'Đen'),
(112, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 40, 'Đen'),
(113, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 41, 'Đen'),
(114, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 42, 'Đen'),
(115, 3, 73, 100, '1500000', '150000000', '2020-01-10 13:48:40', '', 43, 'Đen'),
(116, 3, 74, 100, '2000000', '200000000', '2020-01-10 13:49:03', '', 38, 'Đen - Trắng'),
(117, 3, 74, 100, '2000000', '200000000', '2020-01-10 13:49:03', '', 39, 'Đen - Trắng'),
(118, 3, 74, 100, '2000000', '200000000', '2020-01-10 13:49:03', '', 40, 'Đen - Trắng'),
(119, 3, 74, 100, '2000000', '200000000', '2020-01-10 13:49:03', '', 41, 'Đen - Trắng'),
(120, 3, 75, 100, '1000000', '100000000', '2020-01-10 13:49:20', '', 38, 'Đen'),
(121, 3, 75, 100, '1000000', '100000000', '2020-01-10 13:49:20', '', 39, 'Đen'),
(122, 3, 75, 100, '1000000', '100000000', '2020-01-10 13:49:20', '', 40, 'Đen'),
(123, 3, 75, 100, '1000000', '100000000', '2020-01-10 13:49:20', '', 41, 'Đen'),
(124, 3, 75, 100, '1000000', '100000000', '2020-01-10 13:49:20', '', 42, 'Đen'),
(125, 3, 75, 40, '1000000', '40000000', '2020-01-10 13:49:39', '', 38, 'Đen - Trắng'),
(126, 3, 75, 40, '1000000', '40000000', '2020-01-10 13:49:39', '', 39, 'Đen - Trắng'),
(127, 3, 75, 40, '1000000', '40000000', '2020-01-10 13:49:39', '', 40, 'Đen - Trắng'),
(128, 3, 75, 40, '1000000', '40000000', '2020-01-10 13:49:39', '', 41, 'Đen - Trắng'),
(129, 3, 75, 40, '1000000', '40000000', '2020-01-10 13:49:39', '', 42, 'Đen - Trắng'),
(130, 3, 75, 50, '1000000', '50000000', '2020-01-10 13:49:49', '', 38, 'Trắng'),
(131, 3, 75, 50, '1000000', '50000000', '2020-01-10 13:49:49', '', 39, 'Trắng'),
(132, 3, 75, 50, '1000000', '50000000', '2020-01-10 13:49:49', '', 40, 'Trắng'),
(133, 3, 75, 50, '1000000', '50000000', '2020-01-10 13:49:49', '', 41, 'Trắng'),
(134, 3, 75, 50, '1000000', '50000000', '2020-01-10 13:49:49', '', 42, 'Trắng'),
(135, 3, 76, 100, '1000000', '100000000', '2020-01-10 13:50:03', '', 38, 'Đen'),
(136, 3, 76, 100, '1000000', '100000000', '2020-01-10 13:50:03', '', 39, 'Đen'),
(137, 3, 76, 100, '1000000', '100000000', '2020-01-10 13:50:03', '', 40, 'Đen'),
(138, 3, 76, 100, '1000000', '100000000', '2020-01-10 13:50:03', '', 41, 'Đen'),
(139, 3, 76, 100, '1000000', '100000000', '2020-01-10 13:50:03', '', 42, 'Đen'),
(140, 3, 76, 40, '1000000', '40000000', '2020-01-10 13:50:10', '', 38, 'Trắng'),
(141, 3, 76, 40, '1000000', '40000000', '2020-01-10 13:50:11', '', 39, 'Trắng'),
(142, 3, 76, 40, '1000000', '40000000', '2020-01-10 13:50:11', '', 40, 'Trắng'),
(143, 3, 76, 40, '1000000', '40000000', '2020-01-10 13:50:11', '', 41, 'Trắng'),
(144, 3, 76, 40, '1000000', '40000000', '2020-01-10 13:50:11', '', 42, 'Trắng'),
(145, 3, 77, 500, '1000000', '500000000', '2020-01-10 13:50:22', '', 39, 'Đen - Trắng'),
(146, 3, 77, 500, '1000000', '500000000', '2020-01-10 13:50:22', '', 40, 'Đen - Trắng'),
(147, 3, 77, 500, '1000000', '500000000', '2020-01-10 13:50:22', '', 41, 'Đen - Trắng'),
(148, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:55:46', '', 39, 'Đen - Trắng'),
(149, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:55:46', '', 40, 'Đen - Trắng'),
(150, 3, 72, 100, '1000000', '100000000', '2020-01-10 13:55:46', '', 41, 'Đen - Trắng'),
(151, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 36, 'Đỏ'),
(152, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 37, 'Đỏ'),
(153, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 38, 'Đỏ'),
(154, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 39, 'Đỏ'),
(155, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 40, 'Đỏ'),
(156, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 41, 'Đỏ'),
(157, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 42, 'Đỏ'),
(158, 3, 4, 100, '3', '300', '2023-06-21 08:22:06', '', 43, 'Đỏ'),
(159, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 36, 'Hồng'),
(160, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 37, 'Hồng'),
(161, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 38, 'Hồng'),
(162, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 39, 'Hồng'),
(163, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 40, 'Hồng'),
(164, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 41, 'Hồng'),
(165, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 42, 'Hồng'),
(166, 3, 4, 100, '3', '300', '2023-06-21 08:22:31', '', 43, 'Hồng'),
(167, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 36, 'none'),
(168, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 37, 'none'),
(169, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 38, 'none'),
(170, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 39, 'none'),
(171, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 40, 'none'),
(172, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 41, 'none'),
(173, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 42, 'none'),
(174, 3, 4, 100, '3', '300', '2023-06-21 08:22:42', '', 43, 'none'),
(175, 3, 4, 1, '30000', '30000', '2024-01-08 22:13:29', '', 36, 'Đỏ'),
(176, 3, 4, 1, '30000', '30000', '2024-01-08 22:13:29', '', 37, 'Đỏ'),
(177, 3, 4, 10, '30000', '300000', '2024-01-08 22:41:52', '', 36, 'Đỏ'),
(178, 3, 4, 10, '30000', '300000', '2024-01-08 22:41:52', '', 37, 'Đỏ'),
(179, 3, 4, 10, '30000', '300000', '2024-01-08 22:41:52', '', 38, 'Đỏ'),
(180, 3, 4, 10, '30000', '300000', '2024-01-08 22:41:52', '', 39, 'Đỏ'),
(181, 3, 4, 1, '30000', '30000', '2024-01-09 18:57:44', '', 36, 'Đỏ'),
(182, 3, 5, 0, '30000', '0', '2024-01-09 18:58:34', '', 39, 'Xanh'),
(183, 3, 6, 0, '30000', '0', '2024-01-09 18:58:53', '', 0, 'Đen'),
(184, 3, 6, 0, '30000', '0', '2024-01-09 18:58:58', '', 38, 'Đen'),
(185, 3, 7, 0, '0', '0', '2024-01-09 18:59:05', '', 39, 'Đen - Trắng'),
(186, 3, 9, 0, '0', '0', '2024-01-09 18:59:18', '', 38, 'Đen - Trắng'),
(187, 3, 10, 0, '0', '0', '2024-01-09 18:59:37', '', 39, 'Trắng'),
(188, 3, 11, 0, '0', '0', '2024-01-09 18:59:44', '0', 0, 'none'),
(189, 3, 11, 0, '0', '0', '2024-01-09 18:59:47', '0', 39, 'none'),
(190, 3, 12, 0, '0', '0', '2024-01-09 18:59:56', '0', 39, 'Vàng'),
(191, 3, 53, 0, '0', '0', '2024-01-09 19:00:04', '0', 42, 'none'),
(192, 3, 54, 0, '0', '0', '2024-01-09 19:00:13', '0', 36, 'Đen'),
(193, 3, 55, 0, '0', '0', '2024-01-09 19:00:21', '0', 0, 'Đen'),
(194, 3, 55, 0, '0', '0', '2024-01-09 19:00:35', '0', 39, 'Đen'),
(195, 3, 56, 0, '0', '0', '2024-01-09 19:00:43', '0', 38, 'Đen - Trắng'),
(196, 3, 68, 0, '0', '0', '2024-01-09 19:00:50', '0', 0, 'Đen'),
(197, 3, 68, 0, '0', '0', '2024-01-09 19:00:53', '0', 39, 'Đen'),
(198, 3, 69, 0, '0', '0', '2024-01-09 19:01:02', '0', 39, 'none'),
(199, 3, 70, 0, '0', '0', '2024-01-09 19:01:15', '0', 39, 'Đen - Trắng'),
(200, 3, 71, 0, '0', '0', '2024-01-09 19:01:25', '0', 40, 'Đen'),
(201, 3, 72, 0, '0', '0', '2024-01-09 19:01:34', '0', 39, 'Đen - Trắng'),
(202, 3, 73, 0, '0', '0', '2024-01-09 19:01:42', '0', 36, 'Đen'),
(203, 3, 77, 0, '0', '0', '2024-01-09 19:01:54', '0', 39, 'Đen - Trắng'),
(204, 3, 76, 0, '0', '0', '2024-01-09 19:02:03', '0', 38, 'Đen'),
(205, 3, 74, 0, '0', '0', '2024-01-09 19:02:11', '0', 38, 'Đen - Trắng'),
(206, 3, 75, 0, '0', '0', '2024-01-09 19:02:18', '0', 0, 'Đen'),
(208, 3, 75, 0, '0', '0', '2024-01-09 19:02:35', '0', 38, 'Đen'),
(217, 3, 4, 101, '30000', '3030000', '2024-01-09 21:46:29', '', 36, 'Hồng'),
(218, 3, 4, 101, '30000', '3030000', '2024-01-09 21:46:29', '', 37, 'Hồng'),
(219, 3, 4, 101, '30000', '3030000', '2024-01-09 21:46:29', '', 38, 'Hồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieuxuat`
--

CREATE TABLE `phieuxuat` (
  `MaPX` int(11) NOT NULL,
  `MaNV` int(11) NOT NULL,
  `MaSP` int(11) NOT NULL,
  `Mau` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Size` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `TongTien` decimal(10,0) NOT NULL,
  `Note` varchar(500) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NgayXuat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phieuxuat`
--

INSERT INTO `phieuxuat` (`MaPX`, `MaNV`, `MaSP`, `Mau`, `Size`, `SoLuong`, `DonGia`, `TongTien`, `Note`, `NgayXuat`) VALUES
(5, 3, 4, 'none', 36, 40, '1000000', '40000000', 'test', '2020-01-10 21:18:22'),
(6, 3, 4, 'Đỏ', 36, 10, '30000', '300000', '', '2024-01-08 22:46:50'),
(7, 3, 4, 'Đỏ', 37, 10, '30000', '300000', '', '2024-01-08 22:46:50'),
(8, 3, 4, 'Đỏ', 36, 1, '30000', '30000', '', '2024-01-09 18:58:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `id` int(11) NOT NULL,
  `Ten` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MoTa` varchar(100) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`id`, `Ten`, `MoTa`) VALUES
(1, 'Manager', 'chủ cửa hàng'),
(2, 'Project Manager', 'quản trị viên'),
(3, 'Quản lý Kho', ''),
(4, 'Nhân viên Bán Hàng', ''),
(5, 'Nhân viên giao hàng', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSP` int(11) NOT NULL,
  `TenSP` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaDM` int(11) DEFAULT NULL,
  `MaNCC` int(11) NOT NULL,
  `SoLuongKho` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT 0,
  `MoTa` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `DonGia` decimal(10,0) NOT NULL,
  `AnhNen` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSP`, `TenSP`, `MaDM`, `MaNCC`, `SoLuongKho`, `SoLuong`, `MoTa`, `DonGia`, `AnhNen`) VALUES
(4, 'Nike Free Metcon 2 UT', 3, 1, 2072, 2678, 'Nike Free Metcon 2 UT mang đến một lớp hỗ trợ khác cho một loạt các bài tập huấn luyện. Dây đai bền giúp giữ bàn chân của bạn, trong khi bọt linh hoạt giúp bạn di chuyển tự nhiên từ trọng lượng đến máy khoan nhanh nhẹn.', '3829000', 'NikeFreeMetcon2UT.png'),
(5, 'Zoom Freak 1', 3, 1, 395, 395, 'Nhận được sự kỳ dị của bạn trong chiếc giày đặc trưng đầu tay của Giannis Antetokounmpo, lần đầu tiên Nike mang lại cảm giác bóng rổ quốc tế. Zoom Freak 1 có bộ đệm siêu nhạy, khóa trước và lực kéo đa hướng cần thiết để bổ sung cho trò chơi thể thao kỳ dị của anh ta.', '3519000', 'ZoomFreak1.png'),
(6, 'Nike Air VaporMax Flyknit 3', 3, 1, 196, 196, 'Nổi bật và bồng bềnh trong Nike Air VaporMax Flyknit 3. Các tính năng phía trên chảy 2 dòng của cấu trúc Flyknit thoáng khí, có thể kéo dài cho phong cách độc đáo, sẵn sàng trên đường phố. Công nghệ VaporMax Air mang tính cách mạng giúp duy trì mùa xuân trong bước chân của bạn với đệm từ gót chân đến gót chân.', '3500000', 'NikeAirVaporMaxFlyknit3.png'),
(7, 'Nike Drop-Type Premium', 1, 1, 189, 189, 'Nike Drop-Type Premium được lấy cảm hứng từ những đôi giày tennis cổ điển trong gia đình NikeCourt. Một phần của gia đình N354 gật đầu với dặm bay nhanh nhất của Steve Prefontaine, nó cung cấp các dòng thiết kế riêng biệt mượn từ All Court 2.', '2499000', 'NikeDropTypePremium.png'),
(9, 'Nike Zoom Rival Fly', 1, 1, 199, 199, 'Lấy cảm hứng từ các vận động viên tiếp sức Ekiden của Nhật Bản, Nike Zoom Rival Fly mang dáng vẻ tương lai với bộ phận Zoom Air ở bàn chân trước mang đến cho bạn lực đẩy nhạy. Rãnh uốn cong bên dưới tối ưu hóa ngón chân cái và đệm bọt mềm mại sải chân của bạn. Lưới và tổng hợp trên pha trộn sức mạnh và hơi thở.', '2649000', 'NikeZoomRivalFly.png'),
(10, 'Nike Air Max 720 Waves', 1, 1, 382, 382, 'Mang lại một quan điểm mới cho văn hóa ngoài tòa án trong Nike Air Max 720 Waves của bạn. Lập trường cấu hình thấp của nó cho thấy đơn vị Air cao nhất của Nike cho đến nay trong khi thiết kế D / MS / X của nó pha trộn văn hóa với thể thao, cho phép bạn bước vào một chiều hướng mới của phong cách hoops với sự thoải mái vô song.', '5589000', 'NikeAirMax720Waves.PNG'),
(11, 'Nike Zoom Fly Flyknit ', 1, 1, 380, 380, 'Giày chạy bộ Nike Zoom Fly Flyknit được sản xuất với tốc độ kỷ lục. Flyknit trên cung cấp hỗ trợ siêu nhẹ phù hợp như một chiếc găng tay.', '4699000', 'NikeZoomFlyFlyknit.png'),
(12, 'Nike SB Solarsoft Portmore II', 1, 1, 298, 298, 'Được thiết kế cho đế giày đặc biệt, Giày trượt ván nam Nike SB Solarsoft Portmore II kết hợp đệm mềm với đế ngoài bền, chắc chắn để bạn có thể tập trung vào buổi tập của mình.', '2069000', 'NikeSBSolarsoftPortmoreII.PNG'),
(53, 'BALENCIAGA TRIPLE S 2019', 1, 4, 493, 493, 'ok', '1700000', 'BALENCIAGA TRIPLE S.PNG'),
(54, 'BALENCIAGA SPEED TRAINER ĐEN', 3, 4, 3996, 3996, 'Một sản phẩm tuyệt vời được nhiều bạn trẻ lựa chọn.', '730000', 'BALENCIAGA SPEED TRAINER ĐEN.PNG'),
(55, 'BALENCIAGA BALEN DAD', 1, 4, 594, 594, 'Đây là mẫu giày cũng được nhiều người nghệ sĩ thế giới lựa chọn. Tại Việt Nam, giày Triple S được rất nhiều nghệ sĩ nổi tiếng yêu thích.\r\n\r\nThiết kế đột phá.\r\nMột đôi giày ra đời đã phá vỡ những tiêu chuẩn về thời trang hiện nay.\r\nPhần đế cao, uốn lượn hơn hẳn để bạn ăn gian thêm vài centimet\r\nPha trộn những gam màu vintage và nhiều chất liệu vải khác nhau.\r\nTrên thân, gót hay đế giày cũng đều được thêu và khắc tên thương hiệu, tạo sự đẳng cấp.', '1330000', 'BALEN DAD.PNG'),
(56, 'Balenciaga Track', 3, 4, 398, 398, 'oki', '1700000', 'Balenciaga Track.PNG'),
(68, 'Off-White & Orange Track', 1, 6, 1588, 1588, 'ok', '1230000', 'Black OG Old Skool LX.PNG'),
(69, 'BALENCIAGA TRIPLE S 2018', 1, 4, 300, 300, 'sản phẩm hot 2017', '1700000', 'Off-White & Orange Track.PNG'),
(70, ' ADVANTAGE', 1, 2, 598, 598, 'GIÀY TENNIS ĐƯỢC SÁNG TẠO LẠI ĐỂ MANG PHONG CÁCH ĐƯỜNG PHỐ.\r\nPhong cách thể thao thiết yếu. Với kiểu dáng đơn giản, mẫu giày lấy cảm hứng từ quần vợt này có phần thân giày bằng da mịn. 3 Sọc đục lỗ tạo điểm nhấn bên hông giày. Lót giày có đệm mang đến sự êm ái trong mỗi bước đi.', '1700000', 'GIÀY ADVANTAGE.PNG'),
(71, 'ULTRABOOST 20', 1, 2, 295, 295, 'KIỂM SOÁT LỰC KHI CHẠM ĐẤT, THOẢI MÁI TRONG TỪNG BƯỚC CHẠY.\r\nMỗi ngày mới. Mỗi buổi chạy mới. Hãy tận dụng tối đa. Đôi giày hiệu năng cao này có thân giày bằng vải dệt kim ôm chân. Các đường may trong trợ lực được bố trí chuẩn xác để tạo độ nâng đỡ ở đúng những vị trí cần thiết. Gót giày làm từ chất liệu elastane mềm mại cho độ ôm thoải mái hơn. Lớp đệm đàn hồi hoàn trả năng lượng cho từng sải bước tạo cảm giác như có thể chạy mãi mãi.', '1200000', 'ULTRABOOST 20.PNG'),
(72, 'GRAND COURT', 1, 2, 899, 899, 'oki', '1800000', 'GRAND COURT.PNG'),
(73, 'CONTINENTAL 80', 2, 2, 800, 800, 'PHONG CÁCH QUẦN VỢT TỪ NHỮNG NĂM 1980 TRỞ LẠI VỚI KIỂU DÁNG TƯƠI MỚI.\r\nMang dáng vẻ hoài cổ, Continental 80 giữ trọn kiểu dáng xưa cũ của những đôi giày thể thao trong nhà từ đầu những năm 1980. Mẫu giày da nổi bật với sọc kẻ hai màu hướng xuống dưới và đế cupsole khác biệt bằng cao su phân tách cho cảm giác thoải mái và linh hoạt.', '2500000', 'CONTINENTAL 80.PNG'),
(74, 'Chuck 70 Specialty Suede Utility', 1, 3, 400, 400, 'Chất liệu: Suede', '2200000', 'Chuck 70 Specialty Suede Utility.PNG'),
(75, 'Chuck Taylor All Star Utility', 2, 3, 945, 945, 'Chất liệu: Suede', '1400000', 'Chuck Taylor All Star Utility.PNG'),
(76, 'Chuck Taylor All Star Space Utility', 1, 3, 694, 694, NULL, '1500000', 'Chuck Taylor All Star Space Utility.PNG'),
(77, 'Chuck Taylor Classic', 2, 3, 1500, 1500, NULL, '1400000', 'Chuck Taylor Classic.PNG');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphamkhuyenmai`
--

CREATE TABLE `sanphamkhuyenmai` (
  `MaSP` int(11) NOT NULL,
  `MaKM` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphamkhuyenmai`
--

INSERT INTO `sanphamkhuyenmai` (`MaSP`, `MaKM`) VALUES
(4, 1),
(4, 3),
(5, 1),
(5, 3),
(6, 1),
(6, 3),
(7, 1),
(7, 3),
(9, 1),
(9, 3),
(10, 1),
(10, 3),
(11, 1),
(11, 3),
(12, 1),
(12, 3),
(53, 3),
(53, 4),
(54, 3),
(54, 4),
(55, 3),
(55, 4),
(56, 3),
(56, 4),
(68, 3),
(68, 5),
(69, 3),
(69, 4),
(70, 3),
(71, 3),
(72, 3),
(73, 3),
(74, 3),
(75, 3),
(76, 3),
(77, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `MaSize` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`MaSize`) VALUES
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `anhsp`
--
ALTER TABLE `anhsp`
  ADD PRIMARY KEY (`Anh1`,`MaSP`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`MaBL`,`MaSP`,`MaKH`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`MaHD`,`MaSP`,`Size`,`MaMau`),
  ADD KEY `MaSP` (`MaSP`),
  ADD KEY `Size` (`Size`),
  ADD KEY `MaMau` (`MaMau`);

--
-- Chỉ mục cho bảng `chitietsanpham`
--
ALTER TABLE `chitietsanpham`
  ADD PRIMARY KEY (`MaSP`,`MaSize`,`MaMau`),
  ADD KEY `MaSize` (`MaSize`),
  ADD KEY `MaMau` (`MaMau`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDM`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaKH` (`MaKH`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `MaKH` (`MaKH`);

--
-- Chỉ mục cho bảng `khachhangphieugiamgia`
--
ALTER TABLE `khachhangphieugiamgia`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  ADD PRIMARY KEY (`MaKM`);

--
-- Chỉ mục cho bảng `mau`
--
ALTER TABLE `mau`
  ADD PRIMARY KEY (`MaMau`);

--
-- Chỉ mục cho bảng `nguoinhan`
--
ALTER TABLE `nguoinhan`
  ADD PRIMARY KEY (`MaHD`);

--
-- Chỉ mục cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  ADD PRIMARY KEY (`MaNCC`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`Email`),
  ADD UNIQUE KEY `MaNV` (`MaNV`),
  ADD KEY `Quyen` (`Quyen`);

--
-- Chỉ mục cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  ADD PRIMARY KEY (`MaPGG`);

--
-- Chỉ mục cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  ADD PRIMARY KEY (`MaPN`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MaSP` (`MaSP`);

--
-- Chỉ mục cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  ADD PRIMARY KEY (`MaPX`),
  ADD KEY `MaNV` (`MaNV`),
  ADD KEY `MauSP` (`MaSP`),
  ADD KEY `Mau` (`Mau`),
  ADD KEY `Size` (`Size`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD KEY `MaNCC` (`MaNCC`),
  ADD KEY `MaDM` (`MaDM`);

--
-- Chỉ mục cho bảng `sanphamkhuyenmai`
--
ALTER TABLE `sanphamkhuyenmai`
  ADD PRIMARY KEY (`MaSP`,`MaKM`),
  ADD KEY `MaKH` (`MaKM`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MaSize`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `MaBL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MaKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `khachhangphieugiamgia`
--
ALTER TABLE `khachhangphieugiamgia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `khuyenmai`
--
ALTER TABLE `khuyenmai`
  MODIFY `MaKM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhacc`
--
ALTER TABLE `nhacc`
  MODIFY `MaNCC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `MaNV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `phieugiamgia`
--
ALTER TABLE `phieugiamgia`
  MODIFY `MaPGG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `phieunhap`
--
ALTER TABLE `phieunhap`
  MODIFY `MaPN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

--
-- AUTO_INCREMENT cho bảng `phieuxuat`
--
ALTER TABLE `phieuxuat`
  MODIFY `MaPX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
