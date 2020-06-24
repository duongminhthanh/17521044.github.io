-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2020 at 03:24 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bandienthoai`
--

-- --------------------------------------------------------

--
-- Table structure for table `cthd`
--

CREATE TABLE `cthd` (
  `MASP` int(11) NOT NULL,
  `MAHD` int(11) NOT NULL,
  `SL` decimal(8,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cthd`
--

INSERT INTO `cthd` (`MASP`, `MAHD`, `SL`) VALUES
(1, 1, '1'),
(1, 4, '0'),
(1, 9, '1'),
(1, 21, '1'),
(2, 1, '1'),
(3, 5, '1'),
(3, 6, '1'),
(3, 26, '4'),
(4, 24, '1'),
(5, 19, '1'),
(5, 23, '1'),
(6, 14, '1'),
(6, 25, '1'),
(10, 4, '1'),
(10, 6, '1'),
(10, 26, '10'),
(12, 8, '1'),
(12, 20, '1'),
(13, 6, '1'),
(13, 10, '5'),
(13, 25, '1'),
(13, 26, '1'),
(14, 8, '1'),
(15, 7, '1'),
(15, 10, '4'),
(17, 25, '1'),
(18, 10, '3'),
(19, 10, '2'),
(19, 23, '2'),
(19, 24, '1'),
(20, 10, '7');

--
-- Triggers `cthd`
--
DELIMITER $$
CREATE TRIGGER `CTHD_HD` AFTER INSERT ON `cthd` FOR EACH ROW begin
set @v_dongia = (select giasp from sanpham where masp=new.masp limit 1);
update hoadon set tongtien=tongtien+(@v_dongia*new.sl) where mahd=new.mahd;
end
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `CTHD_HD2` AFTER DELETE ON `cthd` FOR EACH ROW begin
set @v_dongia = (select giasp from sanpham where masp=old.masp limit 1);
update hoadon set tongtien=tongtien-(@v_dongia*old.sl) where mahd=old.mahd;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MAHD` int(11) NOT NULL,
  `MAKH` int(11) NOT NULL,
  `NGAYXUAT` date DEFAULT NULL,
  `TONGTIEN` float DEFAULT NULL,
  `TRANGTHAI` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MAHD`, `MAKH`, `NGAYXUAT`, `TONGTIEN`, `TRANGTHAI`) VALUES
(1, 1, '2019-12-10', 11980000, 'SUCCESS'),
(4, 6, '2019-12-17', 6990000, 'FAIL'),
(5, 7, '2019-12-17', 6290000, 'FAIL'),
(6, 8, '2019-12-17', 14070000, 'SUCCESS'),
(7, 9, '2019-12-17', 150000, 'FAIL'),
(8, 10, '2019-12-17', 6120000, 'SUCCESS'),
(9, 11, '2019-12-17', 6990000, 'SUCCESS'),
(10, 12, '2019-12-18', 6260000, 'SUCCESS'),
(14, 6, '2019-12-23', 43990000, 'WAITING'),
(19, 6, '2019-12-23', 22990000, 'SUCCESS'),
(20, 17, '2019-12-23', 6020000, 'SUCCESS'),
(21, 1, '2019-12-23', 6990000, 'SUCCESS'),
(23, 1, '2019-12-26', 23290000, 'SUCCESS'),
(24, 1, '2019-12-26', 22140000, 'SUCCESS'),
(25, 9, '2019-12-26', 57770000, 'WAITING'),
(26, 24, '2019-12-26', 95850000, 'SUCCESS');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `IMGID` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `URL` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`IMGID`, `MASP`, `URL`) VALUES
(1, 9, 'image/vivo-v17-pro-blue-noo-400x460.png'),
(2, 10, 'image/vivo-s1-pro-white-noo-phuocthinh-400x460.png'),
(3, 11, 'image/oppo-k3-black-docquyen-400x460.png'),
(4, 12, 'image/huawei-p30-lite-400x460.png'),
(6, 14, 'image/cap-micro-1m-evalu-ltm-01-do-den-1-600x600.jpg'),
(7, 15, 'image/cap-lightning-1m-xmobile-spanker-b-den-1-600x600.jpg'),
(10, 1, 'image/samsung-galaxy-j7-pro-6-400x460.png'),
(11, 2, 'image/vivo-y19-white-quanghai-400x460.png'),
(12, 3, 'image/samsung-galaxy-a50s-green-400x460.png'),
(14, 5, 'image/samsung-galaxy-s10-plus-black-400x460.png'),
(15, 6, 'image/iphone-11-pro-max-512gb-gold-400x460.png'),
(17, 8, 'image/iphone-7-plus-gold-400x460.png'),
(24, 7, 'image/oppo-reno2-black-mtp1-400x460.png'),
(27, 16, 'image/oppo-a9-white-1-400x460.png'),
(28, 17, 'image/xiaomi-mi-note-10-white-400x460-400x460-400x460.png'),
(29, 18, 'image/cap-lightning-1m-xmobile-l-bending-add-600x600-1-fixx-600x600.jpg'),
(30, 19, 'image/usb-sandisk-sdcz50-8gb-20-xanh-duong-1-5-600x600.jpg'),
(31, 20, 'image/cap-dien-thoai-1m-evalu-spanker-b-den-xanh-600x600.jpg'),
(32, 21, 'image/inosuke.PNG'),
(34, 4, 'image/iphone-11-red-2-400x460.png'),
(36, 13, 'image/cap-sac-apple-watch-magnetic-type-c-apple-mx2g2-ava-600x600.jpg'),
(39, 22, 'image/samsung-galaxy-a20s-black-400x460.png');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `MAKH` int(11) NOT NULL,
  `TENKH` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TENDANGNHAP` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MATKHAU` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `SDT` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NGAYSINH` date DEFAULT NULL,
  `DIACHI` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `LOAIKH` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MAKH`, `TENKH`, `TENDANGNHAP`, `MATKHAU`, `SDT`, `NGAYSINH`, `DIACHI`, `EMAIL`, `LOAIKH`) VALUES
(1, 'Đỗ Hoàng Anh Khoa', 'dhak', '123456789', '0123456789', '1999-12-06', 'KTXB, Thủ Đức, TP HCM', '17520639@gm.uit.edu.vn', 'TV'),
(2, 'Nguyễn Thanh Tùng', 'gokay', '123456789', '0123456788', '1999-08-30', 'Biên Hòa', 'tungnt@gmail.com', 'TV'),
(3, 'Đỗ Quang Thịnh', 'thinhlk', '123456789', '0123456787', '1999-01-01', 'Long Khánh', 'thinhlk123321@gmail.com', 'TV'),
(6, 'Nguyễn Văn Bưởi', '', '', '0987654321', '0000-00-00', 'KTXB, Thủ Đức', '', 'TV'),
(7, 'Hồ Thị Đào', '', '', '0987321654', '0000-00-00', 'KTX A, Thủ Đức, HCM', '', 'VL'),
(8, 'Bùi Văn Tèo', '', '', '0987123654', '0000-00-00', 'ĐH Công Nghệ Thông Tin, ĐHQG Thủ Đức', '', 'VL'),
(9, 'Nguyễn Văn A', 'nguyenvana', '123456789', '0123789456', '1996-06-06', 'Đâu đó nơi xa vời', 'nguyenvana@gmail.com', 'TV'),
(10, 'Hồ Thị B', 'hothib', '123456789', '0456789123', '0000-00-00', 'KTX B, Thủ Đức, HCM', '', 'VL'),
(11, 'Nguyễn Thị Dương', 'ntd', '123456789', '0741852963', '1993-03-03', 'Đại Học KHXH & Nhân Văn, Thủ Đức, HCM', 'ngthiduong@gmail.com', 'VL'),
(12, 'Nguyễn Văn Chuối', 'nguyenvanchuoi', '123456789', '0963852741', '0000-00-00', 'KTX B, Thủ Đức, HCM', '', 'VL'),
(17, 'Nguyễn Văn Cám', '', '', '0753951842', '0000-00-00', 'KTXB, Thủ Đức.', '', 'VL'),
(19, 'Ngô Văn Tét', 'testdangky', '987654321', '0852147963', '2001-01-01', 'KTXA, Thủ Đức, TPHCM', 'testdangky@gmail.com', 'VL'),
(23, 'Ngô Văn Khái', 'khaideptrai', '123456789', '0987654123', '2001-01-01', 'Ở một nơi xa', 'ngovankhai@gmail.com', 'VL'),
(24, 'Nguyễn Văn Quýt', 'quytdeptrai', '123456789', '0852369741', '1996-06-06', 'Nơi nào đó xa vời', 'quyt@gmail.com', 'TV');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `MASP` int(11) NOT NULL,
  `TENSP` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GIASP` float DEFAULT NULL,
  `LOAI` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SOLUONG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`MASP`, `TENSP`, `GIASP`, `LOAI`, `SOLUONG`) VALUES
(1, 'Samsung Galaxy J7 Pro', 6990000, 'ĐT', 44),
(2, 'Vivo Y19', 4990000, 'ĐT', 22),
(3, 'Samsung Galaxy A50s', 6290000, 'ĐT', 14),
(4, 'iPhone 11 64GB', 21990000, 'ĐT', 13),
(5, 'Samsung Galaxy S10+', 22990000, 'ĐT', 26),
(6, 'iPhone 11 Pro Max 512GB', 43990000, 'ĐT', 18),
(7, 'OPPO Reno2', 14990000, 'ĐT', 15),
(8, 'iPhone 7 Plus 32GB', 11990000, 'ĐT', 23),
(9, 'Vivo V17 Pro', 9490000, 'ĐT', 20),
(10, 'Vivo S1 Pro', 6990000, 'ĐT', 29),
(11, 'OPPO K3', 5490000, 'ĐT', 30),
(12, 'Huawei P30 Lite', 6020000, 'ĐT', 22),
(13, 'Cáp sạc Apple Watch Magnetic 0.3m Apple MX2G2 Trắng', 790000, 'PK', 30),
(14, 'Cáp Micro 1m eValu LTM -01 Đỏ đen', 100000, 'PK', 15),
(15, 'Cáp Lightning 1m Xmobile Spanker B Đen', 150000, 'PK', 27),
(16, 'OPPO A9 (2020)', 6490000, 'ĐT', 30),
(17, 'Xiaomi Mi Note 10', 12990000, 'ĐT', 19),
(18, 'Cáp Lightning 1 m Xmobile L-bending', 120000, 'PK', 24),
(19, 'USB 2.0 8 GB Sandisk SDCZ50', 150000, 'PK', 65),
(20, 'Cáp 3 đầu Lightning Type-C Micro 1 m e.VALU Spanker B Đen - Xanh Dương', 150000, 'PK', 51),
(22, 'Samsung Galaxy A20s 64GB', 4990000, 'ĐT', 50);

-- --------------------------------------------------------

--
-- Table structure for table `thongtindienthoai`
--

CREATE TABLE `thongtindienthoai` (
  `INFOID` int(11) NOT NULL,
  `MASP` int(11) NOT NULL,
  `MANHINH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HEDIEUHANH` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMSAU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CAMTRUOC` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CPU` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RAM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BONHOTRONG` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `THENHO` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `THESIM` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PIN` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thongtindienthoai`
--

INSERT INTO `thongtindienthoai` (`INFOID`, `MASP`, `MANHINH`, `HEDIEUHANH`, `CAMSAU`, `CAMTRUOC`, `CPU`, `RAM`, `BONHOTRONG`, `THENHO`, `THESIM`, `PIN`) VALUES
(1, 1, 'Super AMOLED, 5.5\", Full HD', 'Android 7.0 (Nougat)', '13 MP', '13 MP', 'Exynos 7870 8 nhân 64-bit', '3 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '3600 mAh'),
(2, 2, 'IPS LCD, 6.53\", Full HD+', 'Android 9.0 (Pie)', 'Chính 16 MP & Phụ 8 MP, 2 MP', '16 MP', 'MediaTek MT6768 8 nhân (Helio P65)', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, có sạc nhanh'),
(3, 3, 'Super AMOLED, 6.4\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 5 MP', '32 MP', 'Exynos 9610 8 nhân', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh, có sạc nhanh'),
(4, 4, 'IPS LCD, 6.1\", Liquid Retina', 'iOS 13', 'Chính 12 MP & Phụ 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '64 GB', '', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G', '3110 mAh, có sạc nhanh'),
(5, 5, 'Dynamic AMOLED, 6.4\", Quad HD+ (2K+)', 'Android 9.0 (Pie)', 'Chính 12 MP & Phụ 12 MP, 16 MP', 'Chính 10 MP & Phụ 8 MP', 'Exynos 9820 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4100 mAh, có sạc nhanh'),
(6, 6, 'OLED, 6.5\", Super Retina XDR', 'iOS 13', '3 camera 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '512 GB', '', 'Nano SIM & eSIM, Hỗ trợ 4G', '3969 mAh, có sạc nhanh'),
(7, 7, 'Sunlight AMOLED, 6.55\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 13 MP, 8 MP, 2 MP', '16 MP', 'Snapdragon 730G 8 nhân', '8 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4000 mAh, có sạc nhanh'),
(8, 8, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 12', 'Chính 12 MP & Phụ 12 MP', '7 MP', 'Apple A10 Fusion 4 nhân', '3 GB', '32 GB', '', '1 Nano SIM, Hỗ trợ 4G', '2900 mAh'),
(9, 9, 'Super AMOLED, 6.44\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', 'Chính 32 MP & Phụ 8 MP', 'Snapdragon 675 8 nhân 64-bit', '8 GB', '128 GB', 'NULL', ' 2 Nano SIM, Hỗ trợ 4G', '4100 mAh, có sạc nhanh'),
(10, 10, 'Super AMOLED, 6.38\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '32 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '4500 mAh, có sạc nhanh'),
(11, 11, 'AMOLED, 6.5\", Full HD+', 'Android 9.0 (Pie)', 'Chính 16 MP & Phụ 2 MP', '16 MP', 'Snapdragon 710 8 nhân', '6 GB', '64 GB', 'NULL', '2 Nano SIM, Hỗ trợ 4G', '3765 mAh, có sạc nhanh'),
(12, 12, 'IPS LCD, 6.15\", Full HD+', 'Android 9.0 (Pie)', 'Chính 24 MP & Phụ 8 MP, 2 MP', '32 MP', 'Kirin 710', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3340 mAh, có sạc nhanh'),
(13, 16, 'TFT, 6.5\", HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh'),
(14, 17, 'AMOLED, 6.47\", Full HD+', 'Android 9.0 (Pie)', 'Chính 108 MP & Phụ 20 MP, 12 MP, 5 MP, 2 MP', '32 MP', 'Snapdragon 730G 8 nhân', '6 GB', '128 GB', '', '2 Nano SIM, Hỗ trợ 4G', '5260 mAh, có sạc nhanh'),
(15, 22, 'IPS LCD, 6.5\", HD+', 'Android 9.0 (Pie)', 'Chính 13 MP & Phụ 8 MP, 5 MP', '8 MP', 'Snapdragon 450 8 nhân', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G', '4000 mAh, có sạc nhanh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cthd`
--
ALTER TABLE `cthd`
  ADD PRIMARY KEY (`MASP`,`MAHD`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MAHD`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`IMGID`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MAKH`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MASP`);

--
-- Indexes for table `thongtindienthoai`
--
ALTER TABLE `thongtindienthoai`
  ADD PRIMARY KEY (`INFOID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MAHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `IMGID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `MAKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MASP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `thongtindienthoai`
--
ALTER TABLE `thongtindienthoai`
  MODIFY `INFOID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
