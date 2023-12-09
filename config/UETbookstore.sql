
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

DROP DATABASE IF EXISTS UETBookstore;
CREATE DATABASE UETBookstore;
USE UETBookstore;

CREATE TABLE `danhmuc` (
  `ID_DanhMuc` int(6) NOT NULL,
  `TenDanhMuc` varchar(50) NOT NULL,
  `MoTa` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `danhmuc` (`ID_DanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(1, 'Sách Đại Cương', 'Gồm tất cả các môn trong giáo dục đại cương'),
(2, 'Sách ngôn ngữ', 'Gồm tất cả các sách trong khoa ngôn ngữ'),
(3, 'Sách Kinh tế - Quản lý', ''),
(4, 'Sách Khoa học xã hội & Nhân văn', ''),
(5, 'Sách Toán tin', '');


CREATE TABLE `gio_hang` (
  `ID` int(6) NOT NULL,
  `Ma_KH` int(6) NOT NULL,
  `Ma_SP` varchar(60) CHARACTER SET utf8 NOT NULL,
  `SoLuong` varchar(60) CHARACTER SET utf8 NOT NULL,
  `GiaTien` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `gio_hang` (`ID`, `Ma_KH`, `Ma_SP`, `SoLuong`, `GiaTien`, `NgayTao`) VALUES
(3, 4, '1\n3', '1\n5', '15.000đ\n25.000đ', '2021-06-28 13:45:20');

CREATE TABLE `hoadon_dathang` (
  `Ma_HoaDon` int(6) NOT NULL,
  `MaKhachHang` int(6) NOT NULL,
  `TenNguoiNhan` varchar(30) NOT NULL,
  `TenSanPham` varchar(500) NOT NULL,
  `DiaChiGiaoHang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

INSERT INTO `hoadon_dathang` (`Ma_HoaDon`, `MaKhachHang`, `TenNguoiNhan`, `TenSanPham`, `DiaChiGiaoHang`) VALUES
(26, 6, 'Tuấn Anh', 'Triết học Mác-Lenin\nLập trình C', 'Thái Bình'),
(33, 6, 'Duy Thái', 'Tư tưởng Hồ Chí Minh', 'Hà Đông');

CREATE TABLE `khachhang` (
  `Ma_KH` int(6) NOT NULL,
  `TenTaiKhoan` varchar(50) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `SoDienThoai` varchar(10) CHARACTER SET utf32 DEFAULT NULL,
  `DiaChi` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `khachhang` (`Ma_KH`, `TenTaiKhoan`, `HoTen`, `Email`, `SoDienThoai`, `DiaChi`) VALUES
(4, 'a32961', 'Bùi Duy Thái', 'duythaibui@topcv.com.vn', '0156495348', 'Thái Bình'),
(6, 'a32963', 'Fredrick Von Borg', 'FredrickTheGreat@gmail.com', '0866454994', 'Berlin'),
(7, 'a32949', 'Bùi Anh Vũ', 'biine123@gmail.com', '0856424994', 'Phú Thọ');

CREATE TABLE `sanpham` (
  `Ma_SanPham` int(6) NOT NULL,
  `TenSanPham` varchar(50) NOT NULL,
  `Ma_DanhMuc` int(6) NOT NULL,
  `TenDanhMuc` varchar(30) NOT NULL,
  `SoLuong` int(6) NOT NULL,
  `DonGia` decimal(10,3) NOT NULL,
  `HinhAnh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sanpham` (`Ma_SanPham`, `TenSanPham`, `Ma_DanhMuc`, `TenDanhMuc`, `SoLuong`, `DonGia`, `HinhAnh`) VALUES
(1, 'Triết học Mác-Lenin', 1, 'Sách đại cương', 3, '20.000', 'Triết_học-Mác-Lênin.jpg'),
(3, 'Lập trình C', 5, 'Sách Toán tin', 4, '55.000', 'Cprogramlanguage.png'),
(4, 'Clean Code', 5, 'Sách Toán tin', 6, '35.000', 'cleancode.jpg');

CREATE TABLE `taikhoan` (
  `TenTaiKhoan` varchar(50) CHARACTER SET utf8 NOT NULL,
  `MatKhau` varchar(50) NOT NULL,
  `NgayTao` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `taikhoan` (`TenTaiKhoan`, `MatKhau`, `NgayTao`) VALUES
('ab32949', '123', '2021-06-17 22:51:41'),
('ab32961', 'thai1', '2021-06-13 09:27:54'),
('ab32963', '123abc', '2021-06-14 14:18:43');

ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`ID_DanhMuc`);

ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Ma_KH` (`Ma_KH`);

ALTER TABLE `hoadon_dathang`
  ADD PRIMARY KEY (`Ma_HoaDon`),
  ADD KEY `hoadon_dathang_ibfk_1` (`MaKhachHang`);

ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`Ma_KH`),
  ADD KEY `TenTaiKhoan` (`TenTaiKhoan`);

ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`Ma_SanPham`),
  ADD KEY `Ma_DanhMuc` (`Ma_DanhMuc`);

ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`TenTaiKhoan`);

ALTER TABLE `danhmuc`
  MODIFY `ID_DanhMuc` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `gio_hang`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `hoadon_dathang`
  MODIFY `Ma_HoaDon` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

ALTER TABLE `khachhang`
  MODIFY `Ma_KH` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `sanpham`
  MODIFY `Ma_SanPham` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE `gio_hang`
  ADD CONSTRAINT `gio_hang_ibfk_1` FOREIGN KEY (`Ma_KH`) REFERENCES `khachhang` (`Ma_KH`);

ALTER TABLE `hoadon_dathang`
  ADD CONSTRAINT `hoadon_dathang_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`Ma_KH`);

ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`TenTaiKhoan`) REFERENCES `taikhoan` (`TenTaiKhoan`);

ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`Ma_DanhMuc`) REFERENCES `danhmuc` (`ID_DanhMuc`);
COMMIT;

