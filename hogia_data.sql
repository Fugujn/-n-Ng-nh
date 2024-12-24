-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 07, 2024 lúc 12:44 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hogia_data`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_comment`
--

CREATE TABLE `table_comment` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(255) NOT NULL,
  `noidung_vi` text NOT NULL,
  `mota_vi` text NOT NULL,
  `rate` float NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` varchar(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comment` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hienthi` int(11) NOT NULL,
  `tienich` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_comment`
--

INSERT INTO `table_comment` (`id`, `ten_vi`, `noidung_vi`, `mota_vi`, `rate`, `ngaytao`, `ngaysua`, `id_user`, `id_comment`, `product_id`, `active`, `type`, `hienthi`, `tienich`, `email`, `dienthoai`, `hoten`) VALUES
(6, 'danny92', 'Mặt thoáng khí. Mát mẻ.\r\nRất thích hợp dạo phố vời thời tiết tại Việt Nam.', 'Cảm ơn bạn đ&atilde; tin tưởng. Trong thời gian tới. Rất mong bạn sẽ ủng hộ LionCart.Net để shop c&oacute; th&ecirc;m động lực cung cấp th&ecirc;m những sản phẩn chất lượng kh&aacute;c', 5, 1558330885, '1558369784', 3, 0, 122, 0, 'rate-comment', 1, '', '', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_counter`
--

CREATE TABLE `table_counter` (
  `id` int(11) NOT NULL,
  `tm` int(11) NOT NULL,
  `ip` varchar(16) NOT NULL DEFAULT '0.0.0.0',
  `ngay` int(10) NOT NULL,
  `thang` int(10) NOT NULL,
  `nam` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_dknhantin`
--

CREATE TABLE `table_dknhantin` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `ten_en` varchar(255) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `noidung` text NOT NULL,
  `sex` text NOT NULL,
  `tenkhongdau` varchar(255) NOT NULL,
  `stt` int(11) NOT NULL,
  `hienthi` int(11) NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` int(11) NOT NULL,
  `ngay` int(10) NOT NULL,
  `thang` int(10) NOT NULL,
  `nam` int(10) NOT NULL,
  `check` int(11) NOT NULL,
  `type` int(25) NOT NULL,
  `tieude` text NOT NULL,
  `id_product` int(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_donhang`
--

CREATE TABLE `table_donhang` (
  `id` int(11) NOT NULL,
  `madonhang` varchar(20) NOT NULL,
  `hoten` varchar(255) NOT NULL,
  `dienthoai` varchar(255) NOT NULL,
  `diachi` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `district` int(11) NOT NULL,
  `ward` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `httt` int(11) NOT NULL,
  `tonggia` varchar(20) NOT NULL,
  `noidung` text NOT NULL,
  `ghichu` text NOT NULL,
  `donhang` text NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL,
  `noinhan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `loaithanhtoan` int(11) NOT NULL,
  `dienthoainhan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tennhan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phuongthuc` text NOT NULL,
  `hienthi` int(11) NOT NULL,
  `giagoc` int(11) NOT NULL,
  `idchinhanh` text NOT NULL,
  `magiamgia` varchar(100) NOT NULL,
  `ship` float NOT NULL,
  `ngay` int(11) NOT NULL,
  `thang` int(25) NOT NULL,
  `nam` int(25) NOT NULL,
  `iduser` int(11) NOT NULL,
  `tenctv` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_donhang`
--

INSERT INTO `table_donhang` (`id`, `madonhang`, `hoten`, `dienthoai`, `diachi`, `city`, `district`, `ward`, `email`, `httt`, `tonggia`, `noidung`, `ghichu`, `donhang`, `ngaytao`, `trangthai`, `noinhan`, `loaithanhtoan`, `dienthoainhan`, `tennhan`, `phuongthuc`, `hienthi`, `giagoc`, `idchinhanh`, `magiamgia`, `ship`, `ngay`, `thang`, `nam`, `iduser`, `tenctv`, `type`) VALUES
(1, 'DPLEZT', 'Duc', '0988023420', '358 Võ Văn Ngân, Bình Thọ, Thủ Đức', 0, 0, '', 'trananhduc1409@gmail.com', 2, '10000000', '', '12312', '', 1728963613, 1, '', 0, '', '', '', 0, 0, '', '', 0, 0, 10, 2024, 0, '', ''),
(2, '8HLMMH', 'Duc', '0988023420', '358 Võ Văn Ngân, Bình Thọ, Thủ Đức', 0, 0, '', 'trananhduc1409@gmail.com', 2, '20000000', '', '4', '', 1730271269, 1, '', 0, '', '', '', 1, 0, '', '', 0, 0, 10, 2024, 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_donhang_detail`
--

CREATE TABLE `table_donhang_detail` (
  `id` int(11) NOT NULL,
  `id_order` text NOT NULL,
  `id_product` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `gia` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_nguoimua` int(11) NOT NULL,
  `ms_nhanvien` text NOT NULL,
  `id_nhanvien` int(11) NOT NULL,
  `color` text NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_donhang_detail`
--

INSERT INTO `table_donhang_detail` (`id`, `id_order`, `id_product`, `soluong`, `gia`, `total`, `id_nguoimua`, `ms_nhanvien`, `id_nhanvien`, `color`, `size`) VALUES
(1, 'DPLEZT', 16, 1, 10000000, 10000000, 0, '', 0, '', ''),
(2, '8HLMMH', 12, 1, 10000000, 10000000, 0, '', 0, '', ''),
(3, '8HLMMH', 16, 1, 10000000, 10000000, 0, '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_footer`
--

CREATE TABLE `table_footer` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(225) NOT NULL,
  `mota_vi` text NOT NULL,
  `mota_en` text NOT NULL,
  `mota_sp` int(11) NOT NULL,
  `noidung_sp` int(11) NOT NULL,
  `noidung_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(100) NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `ngaytao` int(11) NOT NULL DEFAULT 0,
  `ngaysua` int(11) NOT NULL DEFAULT 0,
  `noidung_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_footer`
--

INSERT INTO `table_footer` (`id`, `ten`, `mota_vi`, `mota_en`, `mota_sp`, `noidung_sp`, `noidung_vi`, `noidung_en`, `photo`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `noidung_jp`) VALUES
(4, 'Welcome Spa Cam Ranh', '', '', 0, 0, '<p><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>C&ocirc;ng Ty Nội Thất Hồ Gia</strong></span></span></p><p><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">Quỳnh 2, x&atilde; Ch&acirc;u B&igrave;nh, huyện Quỳ Ch&acirc;u, Tỉnh Nghệ an</span></span></p><p><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">Hotline :&nbsp;0979657678</span></span></p><p><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">Email : haihofurniture529@gmail.com</span></span></p><p><span style=\"font-size:16px\"><span style=\"font-family:Times New Roman,Times,serif\">Website : https://noithathogia.com/</span></span></p>', '', '57083.jpg', 1, 1, 1225497589, 1225508616, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_icon`
--

CREATE TABLE `table_icon` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_vi` varchar(225) NOT NULL,
  `ten_en` varchar(225) NOT NULL,
  `text1_vi` text NOT NULL,
  `text2_vi` text NOT NULL,
  `text3_vi` text NOT NULL,
  `text1_en` text NOT NULL,
  `text2_en` text NOT NULL,
  `text3_en` text NOT NULL,
  `mota_vi` text NOT NULL,
  `mota_en` text NOT NULL,
  `mota1_vi` text NOT NULL,
  `mota1_en` text NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `noibat` tinyint(1) NOT NULL,
  `url` varchar(250) NOT NULL,
  `urlvideo` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `thumb` varchar(100) NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_icon`
--

INSERT INTO `table_icon` (`id`, `ten_vi`, `ten_en`, `text1_vi`, `text2_vi`, `text3_vi`, `text1_en`, `text2_en`, `text3_en`, `mota_vi`, `mota_en`, `mota1_vi`, `mota1_en`, `stt`, `hienthi`, `noibat`, `url`, `urlvideo`, `photo`, `thumb`, `type`, `id_product`) VALUES
(31, 'Twitter', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '50971497.png', '50971497_40x40.png', 'header', 0),
(73, 'Thanh toán đơn giản', '', '', '', '', '', '', '', 'Có nhiều phương thức để quý khách lựa chọn', '', '', '', 1, 1, 0, '', '', '80307307.png', '80307307_100x100.png', 'hotro', 0),
(30, 'Youtube', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '', '', '54621756.png', '54621756_40x40.png', 'header', 0),
(29, 'Facebook', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 'https://www.facebook.com/profile.php?id=100079365692652', '', '14401468.png', '14401468_40x40.png', 'header', 0),
(43, 'Pinterest', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '19008590.png', '19008590_40x40.png', 'header', 0),
(45, 'Facebook', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 'https://www.facebook.com/profile.php?id=100079365692652', '', '75420267.png', '75420267_40x40.png', 'footer', 0),
(47, 'Youtube', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '', '', '02004778.png', '02004778_40x40.png', 'footer', 0),
(48, 'Twitter', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '03553059.png', '03553059_40x40.png', 'footer', 0),
(55, 'Instagram', '', '', '', '', '', '', '', '', '', '', '', 1, 0, 0, '', '', '34545679.png', '34545679_40x40.png', 'footer', 0),
(58, 'KOVA', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '', '', '17378856.PNG', '17378856_95.348837209302x100.png', 'doitac', 0),
(60, 'TOTO', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '', '', '94397957.PNG', '94397957_80.939226519337x100.png', 'doitac', 0),
(72, 'Chiết khấu hấp dẫn', '', '', '', '', '', '', '', 'Luôn có mức chiết khấu tốt nhất cho khách hàng', '', '', '', 1, 1, 0, '', '', '54264921.png', '54264921_100x100.png', 'hotro', 0),
(71, 'Cam kết chính hãng', '', '', '', '', '', '', '', 'Sản phẩm chính hãng và được bảo hành của hãng', '', '', '', 1, 1, 0, '', '', '32110325.png', '32110325_100x100.png', 'hotro', 0),
(70, 'Giao hàng miễn phí ', '', '', '', '', '', '', '', 'Áp dụng với đơn hàng trị giá từ 3tr ( tùy đơn hàng và khoảng cách địa lý)', '', '', '', 1, 1, 0, '', '', '01527829.png', '01527829_100x100.png', 'hotro', 0),
(196, '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, '', '', '22636157.jpg', '22636157_1098x360.jpg', 'slider', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_lienhe`
--

CREATE TABLE `table_lienhe` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten` varchar(225) NOT NULL,
  `mota_vi` text NOT NULL,
  `mota_en` text NOT NULL,
  `mota_sp` text NOT NULL,
  `noidung_sp` text NOT NULL,
  `noidung_vi` text NOT NULL,
  `noidung_en` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `ngaytao` int(11) NOT NULL DEFAULT 0,
  `ngaysua` int(11) NOT NULL DEFAULT 0,
  `noidung_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_lienhe`
--

INSERT INTO `table_lienhe` (`id`, `ten`, `mota_vi`, `mota_en`, `mota_sp`, `noidung_sp`, `noidung_vi`, `noidung_en`, `photo`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `noidung_jp`) VALUES
(4, '', '', '', '', '', '<p><strong>C&ocirc;ng Ty Nội Thất Hồ Gia</strong></p><p>Quỳnh 2, x&atilde; Ch&acirc;u B&igrave;nh, huyện Quỳ Ch&acirc;u, Tỉnh Nghệ an</p><p>Hotline :&nbsp;0979657678</p><p>Email : haihofurniture529@gmail.com</p><p>Website : https://noithathogia.com/</p>', '', '57083.jpg', 1, 1, 1225497589, 1225508616, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_member`
--

CREATE TABLE `table_member` (
  `id` int(10) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dienthoai` varchar(25) NOT NULL,
  `diachi` text NOT NULL,
  `id_quan` int(11) NOT NULL,
  `id_chuyenmon` int(10) NOT NULL,
  `stt` int(3) NOT NULL,
  `hienthi` int(3) NOT NULL,
  `com` varchar(255) NOT NULL,
  `ngaytao` int(10) NOT NULL,
  `ngaysua` int(10) NOT NULL,
  `vipham` int(2) NOT NULL,
  `noidungvp` text NOT NULL,
  `ngaykhoa` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `masoctv` text NOT NULL,
  `avata` text NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_member`
--

INSERT INTO `table_member` (`id`, `user`, `pass`, `name`, `dienthoai`, `diachi`, `id_quan`, `id_chuyenmon`, `stt`, `hienthi`, `com`, `ngaytao`, `ngaysua`, `vipham`, `noidungvp`, `ngaykhoa`, `type`, `masoctv`, `avata`, `point`) VALUES
(16, 'danghai.ptit1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Hải 1', '0968663368', '', 0, 0, 0, 1, 'user', 1581564983, 0, 0, '', '', 0, '', '', 0),
(4, 'danghai.ptit@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759', 'Đặng Hải', '968663368', '217 Hồng Bàng, Đại học Y Dược Tp.HCM,phường 11', 0, 1, 0, 1, 'user', 1558143943, 1558148720, 0, '', '', 0, '', '', 0),
(17, 'thanhvo.private@gmail.com', '3cb46c25e330c39e8507d8a40b3afc36', 'Ivan Vo', '0964794699', '', 0, 0, 0, 1, 'user', 1581618151, 0, 0, '', '', 0, '', '', 0),
(18, 'marketing@yomie.vn', '4936a31a902e9a36542eda04821572a5', 'Nguyễn Mạnh Long', '0902945720', '', 0, 0, 0, 1, 'user', 1581652591, 0, 0, '', '', 0, '', '', 0),
(19, 'tonkiend@gmail.com', '883d55c3153b8f1ca6c03655daea0123', 'Dương Tôn Kiện', '0939407607', '', 0, 0, 0, 1, 'user', 1581668699, 0, 0, '', '', 0, '', '', 0),
(24, 'danghai.ptit2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Hải', '0937655736', '', 0, 0, 0, 1, 'user', 1582104903, 0, 0, '', '', 0, '', '', 0),
(25, 'danghai.ptit3@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Đặng Hải', '096866336821231', '', 0, 0, 0, 1, 'user', 1582104989, 0, 0, '', '', 0, '', '', 0),
(26, 'danghai.ga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Bill gates', '0933245285', '', 0, 0, 0, 1, 'user', 1582107784, 0, 0, '', '', 0, '', '', 0),
(27, 'danghai.brandsketer@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Amazon', '0935465613', '', 0, 0, 0, 1, 'user', 1582108052, 0, 0, '', '', 0, '', '', 175);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_online`
--

CREATE TABLE `table_online` (
  `id` int(10) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `time` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_online`
--

INSERT INTO `table_online` (`id`, `session_id`, `time`) VALUES
(53483, '5cda1960b9406c857f84891223331698', 1348240342);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_photo`
--

CREATE TABLE `table_photo` (
  `id` int(10) UNSIGNED NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `text1_vi` text NOT NULL,
  `text1_en` text NOT NULL,
  `text2_vi` text NOT NULL,
  `text2_en` text NOT NULL,
  `text3_vi` text NOT NULL,
  `text3_en` text NOT NULL,
  `text4_vi` text NOT NULL,
  `text4_en` text NOT NULL,
  `text5_vi` text NOT NULL,
  `text5_en` text NOT NULL,
  `link2` text NOT NULL,
  `link1` text NOT NULL,
  `link3` text NOT NULL,
  `link4` text NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `photo3` varchar(255) NOT NULL,
  `photo4` varchar(255) NOT NULL,
  `photo5` varchar(255) NOT NULL,
  `photo6` varchar(255) NOT NULL,
  `photo7` varchar(255) NOT NULL,
  `link5` varchar(255) NOT NULL,
  `link6` text NOT NULL,
  `link7` text NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_photo`
--

INSERT INTO `table_photo` (`id`, `thumb`, `stt`, `hienthi`, `logo`, `text1_vi`, `text1_en`, `text2_vi`, `text2_en`, `text3_vi`, `text3_en`, `text4_vi`, `text4_en`, `text5_vi`, `text5_en`, `link2`, `link1`, `link3`, `link4`, `photo1`, `photo2`, `photo3`, `photo4`, `photo5`, `photo6`, `photo7`, `link5`, `link6`, `link7`, `type`) VALUES
(4, '', 1, 0, '900326992633.png', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '913577328201.png', '385806982571.png', '818925114279.png', '847321536804.png', '721398260237.png', '629999744106.png', '208394426351.png', '', '', '', 'photo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product`
--

CREATE TABLE `table_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_list` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_item` int(10) NOT NULL,
  `list_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_agency` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_city` int(11) NOT NULL,
  `id_topping` text NOT NULL,
  `id_size` text NOT NULL,
  `noibat` int(11) NOT NULL,
  `spbc` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `photo_phu` text NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `thumb1` varchar(255) NOT NULL,
  `ten_vi` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_en` varchar(255) NOT NULL,
  `ten_sp` text NOT NULL,
  `mota_sp` text NOT NULL,
  `noidung_sp` text NOT NULL,
  `title_sp` text NOT NULL,
  `description_sp` text NOT NULL,
  `keywords_sp` text NOT NULL,
  `xuatxu_vi` text NOT NULL,
  `xuatxu_en` text NOT NULL,
  `baohanh_vi` text NOT NULL,
  `baohanh_en` text NOT NULL,
  `sudung_vi` text NOT NULL,
  `sudung_en` text NOT NULL,
  `masp` varchar(255) NOT NULL,
  `tenkhongdau` varchar(255) NOT NULL,
  `gia` int(11) NOT NULL,
  `phantramgiam` int(11) NOT NULL,
  `giakm` int(11) NOT NULL,
  `sdt` varchar(255) NOT NULL,
  `noidung_vi` text NOT NULL,
  `noidung_en` text NOT NULL,
  `title_vi` varchar(255) NOT NULL,
  `keywords_vi` varchar(1024) NOT NULL,
  `description_vi` varchar(1024) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `keywords_en` varchar(1024) NOT NULL,
  `description_en` varchar(1024) NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` int(11) NOT NULL,
  `luotxem` int(11) NOT NULL,
  `ten_jp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `com` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `spkm` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `luot_rate` int(11) NOT NULL,
  `video` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_video` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `photo1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_jp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3` varchar(255) CHARACTER SET utf8 COLLATE utf8_icelandic_ci NOT NULL,
  `dai` text NOT NULL,
  `rong` text NOT NULL,
  `cao` text NOT NULL,
  `chanmay` text NOT NULL,
  `trongluong` varchar(100) NOT NULL,
  `tongquan` text NOT NULL,
  `vitri` text NOT NULL,
  `tienich` text NOT NULL,
  `tiendo` text NOT NULL,
  `matbangtang` text NOT NULL,
  `thanhtoan` text NOT NULL,
  `canhomau` text NOT NULL,
  `chietkhau` float NOT NULL,
  `loai` int(25) NOT NULL,
  `giamgia` int(25) NOT NULL,
  `trangthai` int(25) NOT NULL,
  `thuonghieu` int(11) NOT NULL,
  `list_thuonghieu` text NOT NULL,
  `point` int(11) NOT NULL,
  `ngay` int(10) NOT NULL,
  `thang` int(10) NOT NULL,
  `nam` int(10) NOT NULL,
  `spmuakem` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_product`
--

INSERT INTO `table_product` (`id`, `id_list`, `id_cat`, `id_item`, `list_id`, `id_brand`, `id_agency`, `id_user`, `id_city`, `id_topping`, `id_size`, `noibat`, `spbc`, `photo`, `photo_phu`, `thumb`, `thumb1`, `ten_vi`, `ten_en`, `ten_sp`, `mota_sp`, `noidung_sp`, `title_sp`, `description_sp`, `keywords_sp`, `xuatxu_vi`, `xuatxu_en`, `baohanh_vi`, `baohanh_en`, `sudung_vi`, `sudung_en`, `masp`, `tenkhongdau`, `gia`, `phantramgiam`, `giakm`, `sdt`, `noidung_vi`, `noidung_en`, `title_vi`, `keywords_vi`, `description_vi`, `title_en`, `keywords_en`, `description_en`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `luotxem`, `ten_jp`, `noidung_jp`, `com`, `spkm`, `rate`, `luot_rate`, `video`, `ten_video`, `photo1`, `file`, `title_jp`, `keywords_jp`, `description_jp`, `mota_vi`, `mota_en`, `mota_jp`, `type`, `h1`, `h2`, `h3`, `dai`, `rong`, `cao`, `chanmay`, `trongluong`, `tongquan`, `vitri`, `tienich`, `tiendo`, `matbangtang`, `thanhtoan`, `canhomau`, `chietkhau`, `loai`, `giamgia`, `trangthai`, `thuonghieu`, `list_thuonghieu`, `point`, `ngay`, `thang`, `nam`, `spmuakem`) VALUES
(1, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51808-67.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51808', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51808', 10600000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808, Nội thất gia đình, ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51808 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728357920, 1728362000, 1, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(2, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51808-66.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51809', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51808-81e728', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51808 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728359293, 1728361994, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(3, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51809-17.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51809', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51808', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51809', 10600000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808, Nội thất gia đình, ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51808 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728357920, 1728362005, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51808', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(9, 270, 270, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9288-42.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9288', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9288', 10000000, 0, 11000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363235, 1728363516, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9288', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(4, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51810-69.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51811', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51810', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51810 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728360002, 1728361989, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51810', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(5, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51812-95.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51812', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51812', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51812 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728361099, 1728361983, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51812', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(6, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51814-87.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51812', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51814', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51814 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728361357, 1728361978, 1, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51814', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(7, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51815-96.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51815', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51815', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51815 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728361378, 1728361972, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51815', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(8, 329, 329, 495, '329,495', 0, 0, 0, 0, '', '', 1, 0, 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs51816-16.jpg', '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-51816', 'tu-de-quan-ao-gia-dinh-thiet-ke-hien-dai-ghs-51816', 10000000, 0, 11000000, '', '', '', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816, Nội thất gia đình, Tủ quần áo', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Tủ để quần áo gia đình thiết kế hiện đại GHS-51816 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728361396, 1728361966, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816', 'Tủ để quần áo gia đình thiết kế hiện đại GHS-51816', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(10, 270, 270, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9289-95.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9289', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9289', 10000000, 0, 11000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363258, 1728363512, 1, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9289', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(11, 270, 0, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9290-16.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9092', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9290', 10000000, 0, 12000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363651, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(12, 270, 0, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9290-23.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9290', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9290-20ad4d', 10000000, 0, 12000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363680, 0, 1, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9290', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(13, 270, 0, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9211-45.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9211', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9211', 10000000, 0, 11000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363719, 0, 2, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9211', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(14, 270, 0, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9214-89.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9214', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9214', 10000000, 0, 11000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363741, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9214', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(15, 270, 0, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9215-54.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9215', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9215', 10000000, 0, 11000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363762, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9215', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(16, 270, 270, 501, '270,501', 0, 0, 0, 0, '', '', 1, 0, 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs9216-72.jpg', '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216', '', '', '', '', '', '', '', '', '', '', '', '', '', 'GHS-9216', 'giuong-hoc-keo-1m2-thiet-ke-hien-dai-ghs-9216', 10000000, 0, 12000000, '', '', '', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216, Nội thất gia đình, Giường', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363803, 1730271927, 22, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '<p>Click v&agrave;o đoạn text <a href=\"https://noithathogia.com/lien-he.html\">n&agrave;y</a> sẽ link sang phần li&ecirc;n hệ của website</p><table border=\"0\" cellspacing=\"10\" cellpadding=\"10\" style=\"width:1000px\"><tbody><tr><td style=\"width:50%\">adsfasdf</td><td style=\"width:50%\">&aacute;dfasdfasdf</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr><tr><td>&nbsp;</td><td>&nbsp;</td></tr></tbody></table><div style=\"height:0; overflow:hidden; padding-bottom:56.25%; padding-top:30px; position:relative\" class=\"youtube-embed-wrapper\">&nbsp;</div><p>&nbsp;</p>', '', '', 'san-pham', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216', 'Giường hộc kéo 1m2 thiết kế hiện đại GHS-9216', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 1, 0, '', 0, 8, 10, 2024, ''),
(17, 0, 0, 0, 'Danh mục cấp 1', 0, 0, 0, 0, '', '', 1, 0, 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-00.jpg', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-00_384x244.jpg', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon', 0, 0, 0, '', '', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728363969, 1728364165, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', 'Kệ treo quần áo là một giải pháp thông minh cho không gian sống hiện đại. Không chỉ giúp bạn giữ quần áo gọn gàng, kệ treo còn là một món đồ trang trí mang lại vẻ đẹp thẩm mỹ cho căn phòng. Bài viết này sẽ giúp bạn hiểu rõ hơn về chiếc kệ treo, từ các ưu điểm đến cách lựa chọn và mua sắm sản phẩm này.', '', '', 'news', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(18, 0, 0, 0, 'Danh mục cấp 1', 0, 0, 0, 0, '', '', 1, 0, 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-1-30.png', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-1-30_384x244.png', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-1', 0, 0, 0, '', '', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364226, 1728364239, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', 'Kệ treo quần áo là một giải pháp thông minh cho không gian sống hiện đại. Không chỉ giúp bạn giữ quần áo gọn gàng, kệ treo còn là một món đồ trang trí mang lại vẻ đẹp thẩm mỹ cho căn phòng. Bài viết này sẽ giúp bạn hiểu rõ hơn về chiếc kệ treo, từ các ưu điểm đến cách lựa chọn và mua sắm sản phẩm này.', '', '', 'news', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 1', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(19, 0, 0, 0, 'Danh mục cấp 1', 0, 0, 0, 0, '', '', 1, 0, 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-2-51.png', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-2-51_384x244.png', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'ke-treo-quan-ao-san-pham-tien-loi-giup-trang-tri-can-phong-dep-hon-2', 0, 0, 0, '', '', '', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2 chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364233, 1728364241, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', 'Kệ treo quần áo là một giải pháp thông minh cho không gian sống hiện đại. Không chỉ giúp bạn giữ quần áo gọn gàng, kệ treo còn là một món đồ trang trí mang lại vẻ đẹp thẩm mỹ cho căn phòng. Bài viết này sẽ giúp bạn hiểu rõ hơn về chiếc kệ treo, từ các ưu điểm đến cách lựa chọn và mua sắm sản phẩm này.', '', '', 'news', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2', 'Kệ treo quần áo, sản phẩm tiện lợi giúp trang trí căn phòng đẹp hơn 2', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(20, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Chính sách mua hàng', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'chinh-sach-mua-hang', 0, 0, 0, '', '', '', 'Chính sách mua hàng', 'Chính sách mua hàng, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Chính sách mua hàng chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364445, 0, 5, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'chinhsach', 'Chính sách mua hàng', 'Chính sách mua hàng', 'Chính sách mua hàng', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(21, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Chính sách đổi trả', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'chinh-sach-doi-tra', 0, 0, 0, '', '', '', 'Chính sách đổi trả', 'Chính sách đổi trả, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Chính sách đổi trả chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364450, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'chinhsach', 'Chính sách đổi trả', 'Chính sách đổi trả', 'Chính sách đổi trả', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(22, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Chính sách và điều khoản', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'chinh-sach-va-dieu-khoan', 0, 0, 0, '', '', '', 'Chính sách và điều khoản', 'Chính sách và điều khoản, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Chính sách và điều khoản chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364457, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'chinhsach', 'Chính sách và điều khoản', 'Chính sách và điều khoản', 'Chính sách và điều khoản', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(23, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Chính sách quyền riêng tư', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'chinh-sach-quyen-rieng-tu', 0, 0, 0, '', '', '', 'Chính sách quyền riêng tư', 'Chính sách quyền riêng tư, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Chính sách quyền riêng tư chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364464, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'chinhsach', 'Chính sách quyền riêng tư', 'Chính sách quyền riêng tư', 'Chính sách quyền riêng tư', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(24, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Mua hàng và thanh toán', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mua-hang-va-thanh-toan', 0, 0, 0, '', '', '', 'Mua hàng và thanh toán', 'Mua hàng và thanh toán, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Mua hàng và thanh toán chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364484, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'duongdan', 'Mua hàng và thanh toán', 'Mua hàng và thanh toán', 'Mua hàng và thanh toán', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(25, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Mua hàng và đặt hàng', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mua-hang-va-dat-hang', 0, 0, 0, '', '', '', 'Mua hàng và đặt hàng', 'Mua hàng và đặt hàng, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Mua hàng và đặt hàng chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364491, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'duongdan', 'Mua hàng và đặt hàng', 'Mua hàng và đặt hàng', 'Mua hàng và đặt hàng', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(26, 0, 0, 0, '', 0, 0, 0, 0, '', '', 0, 0, '', '', '', '', 'Mua hàng tại showroom', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'mua-hang-tai-showroom', 0, 0, 0, '', '', '', 'Mua hàng tại showroom', 'Mua hàng tại showroom, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Mua hàng tại showroom chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728364505, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'duongdan', 'Mua hàng tại showroom', 'Mua hàng tại showroom', 'Mua hàng tại showroom', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(27, 0, 0, 0, '', 0, 0, 0, 0, '', '', 1, 0, 'du-an-a-49.png', '', 'du-an-a-49_384x244.png', '', 'Dự án văn phòng làm việc công ty A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'du-an-van-phong-lam-viec-cong-ty-a', 0, 0, 0, '', '', '', 'Dự án văn phòng làm việc công ty A', 'Dự án A, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Dự án A chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728372360, 1728373264, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'thicong', 'Dự án văn phòng làm việc công ty A', 'Dự án văn phòng làm việc công ty A', 'Dự án văn phòng làm việc công ty A', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(28, 0, 0, 0, '', 0, 0, 0, 0, '', '', 1, 0, 'du-an-van-phong-lam-viec-cong-ty-b-57.jpg', '', 'du-an-van-phong-lam-viec-cong-ty-b-57_384x244.jpg', '', 'Dự án văn phòng làm việc công ty B', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'du-an-van-phong-lam-viec-cong-ty-b', 0, 0, 0, '', '', '', 'Dự án văn phòng làm việc công ty B', 'Dự án văn phòng làm việc công ty B, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Dự án văn phòng làm việc công ty B chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728373278, 0, 0, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'thicong', 'Dự án văn phòng làm việc công ty B', 'Dự án văn phòng làm việc công ty B', 'Dự án văn phòng làm việc công ty B', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(29, 0, 0, 0, '', 0, 0, 0, 0, '', '', 1, 0, 'du-an-phong-bep-cua-nha-anh-duc-03.jpg', '', 'du-an-phong-bep-cua-nha-anh-duc-03_384x244.jpg', '', 'Dự án phòng bếp của nhà Anh Đức', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'du-an-phong-bep-cua-nha-anh-duc', 0, 0, 0, '', '', '', 'Dự án phòng bếp của nhà Anh Đức', 'Dự án phòng bếp của nhà Anh Đức, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Dự án phòng bếp của nhà Anh Đức chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728373296, 0, 1, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'thicong', 'Dự án phòng bếp của nhà Anh Đức', 'Dự án phòng bếp của nhà Anh Đức', 'Dự án phòng bếp của nhà Anh Đức', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, ''),
(30, 0, 0, 0, '', 0, 0, 0, 0, '', '', 1, 0, 'du-an-tieu-chuan-phong-ngu-2-be-gai-45.jpg', '', 'du-an-tieu-chuan-phong-ngu-2-be-gai-45_384x244.jpg', '', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'du-an-tieu-chuan-phong-ngu-2-be-gai', 0, 0, 0, '', '', '', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái, , ', 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm Dự án tiêu chuẩn phòng ngủ 2 bé gái chính hãng với chất lượng và giá cả tốt nhất', '', '', '', 1, 1, 1728373572, 0, 2, '', '', '', 0, 0, 0, '', '', '', '', '', '', '', '', '', '', 'thicong', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái', 'Dự án tiêu chuẩn phòng ngủ 2 bé gái', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, 0, 0, '', 0, 8, 10, 2024, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product_hinhanh`
--

CREATE TABLE `table_product_hinhanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_photo` int(11) NOT NULL,
  `id_item` int(10) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `thumb1` varchar(255) NOT NULL,
  `ten_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_vi` text NOT NULL,
  `ten_en` text NOT NULL,
  `ten_sp` text NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `com` varchar(255) NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` int(11) NOT NULL,
  `vitri` int(11) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product_list`
--

CREATE TABLE `table_product_list` (
  `id` int(11) NOT NULL,
  `noibat` int(11) NOT NULL,
  `duoimenu` int(11) NOT NULL,
  `khungdo` int(11) NOT NULL,
  `nb_footer` int(11) NOT NULL,
  `moi_footer` int(11) NOT NULL,
  `ten_vi` varchar(255) NOT NULL,
  `ten_en` varchar(255) NOT NULL,
  `ten_sp` text NOT NULL,
  `title_sp` text NOT NULL,
  `gia` int(22) NOT NULL,
  `mota_sp` text NOT NULL,
  `noidung_sp` text NOT NULL,
  `description_sp` text NOT NULL,
  `keywords_sp` text NOT NULL,
  `tenkhongdau` varchar(255) NOT NULL,
  `title_vi` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `keywords_en` varchar(1024) NOT NULL,
  `keywords_vi` varchar(1024) NOT NULL,
  `description_vi` varchar(1024) NOT NULL,
  `description_en` varchar(1024) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `photo1` varchar(255) NOT NULL,
  `thumb1` varchar(255) NOT NULL,
  `photo2` varchar(255) NOT NULL,
  `thumb2` varchar(255) NOT NULL,
  `stt` int(11) NOT NULL,
  `hienthi` int(11) NOT NULL DEFAULT 1,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` int(11) NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `com` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_parent` int(11) NOT NULL,
  `set_level` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `avata` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link` text NOT NULL,
  `loai` int(25) NOT NULL,
  `mota_vi` text NOT NULL,
  `noidung_vi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_product_list`
--

INSERT INTO `table_product_list` (`id`, `noibat`, `duoimenu`, `khungdo`, `nb_footer`, `moi_footer`, `ten_vi`, `ten_en`, `ten_sp`, `title_sp`, `gia`, `mota_sp`, `noidung_sp`, `description_sp`, `keywords_sp`, `tenkhongdau`, `title_vi`, `title_en`, `keywords_en`, `keywords_vi`, `description_vi`, `description_en`, `photo`, `thumb`, `photo1`, `thumb1`, `photo2`, `thumb2`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `file`, `ten_jp`, `title_jp`, `keywords_jp`, `description_jp`, `com`, `id_parent`, `set_level`, `parent_id`, `avata`, `type`, `h1`, `h2`, `h3`, `link`, `loai`, `mota_vi`, `noidung_vi`) VALUES
(302, 1, 0, 0, 0, 0, 'Sen âm tường', '', '', '', 0, '', '', '', '', 'sen-am-tuong', '', '', '', '', 'BP-Home chuyên cung cấp các loại  chính hãng với chất lượng và giá cả tốt nhất', '', 'sen-am-tuong-103.PNG', 'sen-am-tuong-480_thumb1693818111_468x364.png', '', '', '', '', 4, 1, 1692420912, 1693818111, '', '', '', '', '', '2', 270, '270', 0, '', 'san-pham', '', '', '', '', 0, '', ''),
(329, 1, 0, 0, 0, 0, 'Nội thất ấn tượng', '', '', '', 0, '', '', '', '', 'noi-that-an-tuong', 'Nội thất ấn tượng', '', '', 'Nội thất điểm nhấn', 'BP-Home chuyên cung cấp các loại Nội thất điểm nhấn chính hãng với chất lượng và giá cả tốt nhất', '', 'noi-that-diem-nhan-048.jpg', 'noi-that-diem-nhan-861_thumb1728361739_282x758.jpg', '', '', '', '', 2, 1, 1692420938, 1728362080, '', '', '', '', '', '1', 0, '', 0, '', 'san-pham', 'Nội thất ấn tượng', 'Nội thất ấn tượng', 'Nội thất ấn tượng', '', 0, '', ''),
(270, 1, 0, 0, 0, 0, 'Nội thất gia đình', '', '', '', 0, '', '', '', '', 'noi-that-gia-dinh', 'Nội thất gia đình', '', '', 'Nội thất gia đình', 'BP-Home chuyên cung cấp các loại Nội thất gia đình chính hãng với chất lượng và giá cả tốt nhất', '', 'noi-that-gia-dinh-169.jpg', 'noi-that-gia-dinh-878_thumb1728361733_282x758.jpg', '', '', '', '', 1, 1, 1692420911, 1728361733, '', '', '', '', '', '1', 0, '', 0, '', 'san-pham', 'Nội thất gia đình', 'Nội thất gia đình', 'Nội thất gia đình', '', 0, '', ''),
(274, 1, 0, 0, 0, 0, 'Phụ kiện phòng tắm', '', '', '', 0, '', '', '', '', 'phu-kien-phong-tam', '', '', '', '', 'BP-Home chuyên cung cấp các loại  chính hãng với chất lượng và giá cả tốt nhất', '', 'phu-kien-phong-tam-083.JPG', 'phu-kien-phong-tam-345_thumb1693818376_468x364.jpg', '', '', '', '', 10, 1, 1692420911, 1693818376, '', '', '', '', '', '2', 270, '270', 0, '', 'san-pham', '', '', '', '', 0, '', ''),
(412, 0, 0, 0, 0, 0, 'Nội thất trẻ em', '', '', '', 0, '', '', '', '', 'noi-that-tre-em', 'Nội thất trẻ em', '', '', 'Nội thất trẻ em', 'BP-Home chuyên cung cấp các loại Nội thất trẻ em chính hãng với chất lượng và giá cả tốt nhất', '', 'noi-that-tre-em-342.jpg', 'noi-that-tre-em-346_thumb1728361747_282x758.jpg', '', '', '', '', 3, 1, 1693918577, 1728361747, '', '', '', '', '', '1', 0, '', 0, '', 'san-pham', 'Nội thất trẻ em', 'Nội thất trẻ em', 'Nội thất trẻ em', '', 0, '', ''),
(485, 0, 0, 0, 0, 0, 'Nội thất văn phòng', '', '', '', 0, '', '', '', '', 'noi-that-van-phong-8a0aef', 'Nội thất văn phòng', '', '', 'Nội thất văn phòng', 'BP-Home chuyên cung cấp các loại Nội thất văn phòng chính hãng với chất lượng và giá cả tốt nhất', '', 'noi-that-van-phong-215.jpg', 'noi-that-van-phong-553_thumb1728361743_282x758.jpg', '', '', '', '', 3, 1, 1695970880, 1728362072, '', '', '', '', '', '1', 0, '', 0, '', 'san-pham', 'Nội thất văn phòng', 'Nội thất văn phòng', 'Nội thất văn phòng', '', 0, '', ''),
(486, 1, 0, 0, 0, 0, 'Bồn nước Inox ', '', '', '', 0, '', '', '', '', 'bon-nuoc-inox', '', '', '', '', 'BP-Home chuyên cung cấp các loại  chính hãng với chất lượng và giá cả tốt nhất', '', 'bon-nuoc-inox-828.PNG', 'bon-nuoc-inox-184_thumb1695997234_468x364.png', '', '', '', '', 0, 1, 1695970880, 1695997234, '', '', '', '', '', '2', 485, '485', 0, '', 'san-pham', '', '', '', '', 0, '', ''),
(490, 1, 0, 0, 0, 0, 'Bồn nước nhựa', '', '', '', 0, '', '', '', '', 'bon-nuoc-nhua', '', '', '', '', 'BP-Home chuyên cung cấp các loại  chính hãng với chất lượng và giá cả tốt nhất', '', 'bon-nuoc-nhua-151.PNG', 'bon-nuoc-nhua-045_thumb1695996941_468x364.png', '', '', '', '', 0, 1, 1695970880, 1695996942, '', '', '', '', '', '2', 485, '485', 0, '', 'san-pham', '', '', '', '', 0, '', ''),
(495, 1, 0, 0, 0, 0, 'Tủ quần áo', '', '', '', 0, '', '', '', '', 'tu-quan-ao-051070', 'Tủ quần áo', '', '', 'Giường', 'BP-Home chuyên cung cấp các loại  chính hãng với chất lượng và giá cả tốt nhất', '', 'giuong-743.jpg', 'giuong-588_thumb1728355987_468x364.jpg', '', '', '', '', 0, 1, 1695970881, 1728363200, '', '', '', '', '', '2', 329, '329', 0, '', 'san-pham', 'Tủ quần áo', 'Tủ quần áo', 'Tủ quần áo', '', 0, '', ''),
(501, 1, 0, 0, 0, 0, 'Giường', '', '', '', 0, '', '', '', '', 'giuong', 'Giường', '', '', 'Tủ quần áo', 'BP-Home chuyên cung cấp các loại Tủ quần áo chính hãng với chất lượng và giá cả tốt nhất', '', 'tu-quan-ao-908.jpg', 'tu-quan-ao-333_thumb1728355525_468x364.jpg', '', '', '', '', 0, 1, 1695970882, 1728363212, '', '', '', '', '', '2', 270, '270', 0, '', 'san-pham', 'Giường', 'Giường', 'Giường', '', 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_product_tab`
--

CREATE TABLE `table_product_tab` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_photo` int(11) NOT NULL,
  `id_item` int(10) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `photo` varchar(225) NOT NULL,
  `thumb` varchar(225) NOT NULL,
  `thumb1` varchar(255) NOT NULL,
  `ten_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `ten_en` text NOT NULL,
  `ten_sp` text NOT NULL,
  `mota_en` text NOT NULL,
  `mota_sp` text NOT NULL,
  `mota_vi` text NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `com` varchar(255) NOT NULL,
  `ngaytao` int(11) NOT NULL,
  `ngaysua` int(11) NOT NULL,
  `vitri` int(11) NOT NULL,
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_product_tab`
--

INSERT INTO `table_product_tab` (`id`, `id_photo`, `id_item`, `id_cat`, `photo`, `thumb`, `thumb1`, `ten_vi`, `gia`, `ten_en`, `ten_sp`, `mota_en`, `mota_sp`, `mota_vi`, `stt`, `hienthi`, `com`, `ngaytao`, `ngaysua`, `vitri`, `link`, `noidung`) VALUES
(122, 231, 0, 0, '', '', '', 'Chậu âm bàn LW1536V TL516GV', 4635000, '', '', '', '', '', 1, 1, 'listgia', 0, 0, 0, '', ''),
(121, 232, 0, 0, '', '', '', 'Chậu đặt trên bàn', 6254000, '', '', '', '', '', 1, 1, 'listgia', 0, 0, 0, '', ''),
(124, 230, 0, 0, '', '', '', 'Chậu đặt trên bàn LT1705', 5155000, '', '', '', '', '', 1, 1, 'listgia', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_province`
--

CREATE TABLE `table_province` (
  `id` int(11) NOT NULL,
  `ten_vi` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_province`
--

INSERT INTO `table_province` (`id`, `ten_vi`, `type`) VALUES
(1, 'Hà Nội', 'Thành Phố'),
(2, 'Hà Giang', 'Tỉnh'),
(4, 'Cao Bằng', 'Tỉnh'),
(6, 'Bắc Kạn', 'Tỉnh'),
(8, 'Tuyên Quang', 'Tỉnh'),
(10, 'Lào Cai', 'Tỉnh'),
(11, 'Điện Biên', 'Tỉnh'),
(12, 'Lai Châu', 'Tỉnh'),
(14, 'Sơn La', 'Tỉnh'),
(15, 'Yên Bái', 'Tỉnh'),
(17, 'Hòa Bình', 'Tỉnh'),
(19, 'Thái Nguyên', 'Tỉnh'),
(20, 'Lạng Sơn', 'Tỉnh'),
(22, 'Quảng Ninh', 'Tỉnh'),
(24, 'Bắc Giang', 'Tỉnh'),
(25, 'Phú Thọ', 'Tỉnh'),
(26, 'Vĩnh Phúc', 'Tỉnh'),
(27, 'Bắc Ninh', 'Tỉnh'),
(30, 'Hải Dương', 'Tỉnh'),
(31, 'Hải Phòng', 'Thành Phố'),
(33, 'Hưng Yên', 'Tỉnh'),
(34, 'Thái Bình', 'Tỉnh'),
(35, 'Hà Nam', 'Tỉnh'),
(36, 'Nam Định', 'Tỉnh'),
(37, 'Ninh Bình', 'Tỉnh'),
(38, 'Thanh Hóa', 'Tỉnh'),
(40, 'Nghệ An', 'Tỉnh'),
(42, 'Hà Tĩnh', 'Tỉnh'),
(44, 'Quảng Bình', 'Tỉnh'),
(45, 'Quảng Trị', 'Tỉnh'),
(46, 'Thừa Thiên Huế', 'Tỉnh'),
(48, 'Đà Nẵng', 'Thành Phố'),
(49, 'Quảng Nam', 'Tỉnh'),
(51, 'Quảng Ngãi', 'Tỉnh'),
(52, 'Bình Định', 'Tỉnh'),
(54, 'Phú Yên', 'Tỉnh'),
(56, 'Khánh Hòa', 'Tỉnh'),
(58, 'Ninh Thuận', 'Tỉnh'),
(60, 'Bình Thuận', 'Tỉnh'),
(62, 'Kon Tum', 'Tỉnh'),
(64, 'Gia Lai', 'Tỉnh'),
(66, 'Đắk Lắk', 'Tỉnh'),
(67, 'Đắk Nông', 'Tỉnh'),
(68, 'Lâm Đồng', 'Tỉnh'),
(70, 'Bình Phước', 'Tỉnh'),
(72, 'Tây Ninh', 'Tỉnh'),
(74, 'Bình Dương', 'Tỉnh'),
(75, 'Đồng Nai', 'Tỉnh'),
(77, 'Bà Rịa - Vũng Tàu', 'Tỉnh'),
(79, 'Hồ Chí Minh', 'Thành Phố'),
(80, 'Long An', 'Tỉnh'),
(82, 'Tiền Giang', 'Tỉnh'),
(83, 'Bến Tre', 'Tỉnh'),
(84, 'Trà Vinh', 'Tỉnh'),
(86, 'Vĩnh Long', 'Tỉnh'),
(87, 'Đồng Tháp', 'Tỉnh'),
(89, 'An Giang', 'Tỉnh'),
(91, 'Kiên Giang', 'Tỉnh'),
(92, 'Cần Thơ', 'Thành Phố'),
(93, 'Hậu Giang', 'Tỉnh'),
(94, 'Sóc Trăng', 'Tỉnh'),
(95, 'Bạc Liêu', 'Tỉnh'),
(96, 'Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_setting`
--

CREATE TABLE `table_setting` (
  `id` int(10) NOT NULL,
  `title_vi` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `keywords_vi` varchar(1024) NOT NULL,
  `keywords_en` varchar(1024) NOT NULL,
  `description_vi` varchar(1024) NOT NULL,
  `description_en` varchar(1024) NOT NULL,
  `giupdochiase` int(11) NOT NULL,
  `ten_vi` varchar(255) NOT NULL,
  `ten_en` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `dienthoai_vi` varchar(255) NOT NULL,
  `dienthoai_en` varchar(255) NOT NULL,
  `fax_vi` varchar(255) NOT NULL,
  `fax_en` varchar(255) NOT NULL,
  `diachi_vi` varchar(255) NOT NULL,
  `diachi1_vi` text NOT NULL,
  `diachi_en` varchar(255) NOT NULL,
  `slogan_vi` varchar(1024) NOT NULL,
  `slogan_en` varchar(1024) NOT NULL,
  `hotline` varchar(255) NOT NULL,
  `toado` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `ints` varchar(255) NOT NULL,
  `slogan_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fax_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diachi_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slogan_sp` text NOT NULL,
  `h1_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h1_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h1_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h4_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h4_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h4_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h5_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h5_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h5_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h6_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h6_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h6_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_sp` text NOT NULL,
  `title_sp` text NOT NULL,
  `dienthoai_sp` text NOT NULL,
  `diachi_sp` text NOT NULL,
  `description_sp` text NOT NULL,
  `keywords_sp` text NOT NULL,
  `fax_sp` text NOT NULL,
  `h1_sp` text NOT NULL,
  `h2_sp` text NOT NULL,
  `h3_sp` text NOT NULL,
  `h4_sp` text NOT NULL,
  `h5_sp` text NOT NULL,
  `h6_sp` text NOT NULL,
  `gg` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `livechat` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `map` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fav` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `bk` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `merchant_bk` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `merchant_nl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass_bk` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass_nl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pass123` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `key123` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url123` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slider_title` text NOT NULL,
  `slider_url` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_setting`
--

INSERT INTO `table_setting` (`id`, `title_vi`, `title_en`, `keywords_vi`, `keywords_en`, `description_vi`, `description_en`, `giupdochiase`, `ten_vi`, `ten_en`, `email`, `video`, `dienthoai_vi`, `dienthoai_en`, `fax_vi`, `fax_en`, `diachi_vi`, `diachi1_vi`, `diachi_en`, `slogan_vi`, `slogan_en`, `hotline`, `toado`, `website`, `facebook`, `skype`, `twitter`, `google`, `youtube`, `ints`, `slogan_jp`, `ten_jp`, `dienthoai_jp`, `fax_jp`, `title_jp`, `diachi_jp`, `keywords_jp`, `description_jp`, `slogan_sp`, `h1_vi`, `h1_en`, `h1_jp`, `h2_vi`, `h2_en`, `h2_jp`, `h3_vi`, `h3_en`, `h3_jp`, `h4_vi`, `h4_en`, `h4_jp`, `h5_vi`, `h5_en`, `h5_jp`, `h6_vi`, `h6_en`, `h6_jp`, `ten_sp`, `title_sp`, `dienthoai_sp`, `diachi_sp`, `description_sp`, `keywords_sp`, `fax_sp`, `h1_sp`, `h2_sp`, `h3_sp`, `h4_sp`, `h5_sp`, `h6_sp`, `gg`, `livechat`, `map`, `fav`, `bk`, `nl`, `merchant_bk`, `merchant_nl`, `pass_bk`, `pass_nl`, `pass123`, `key123`, `url123`, `slider_title`, `slider_url`) VALUES
(1, 'Nội Thất Hồ Gia', '', 'Nội Thất Nhà ở, Nội Thất Chung Cư, Nội Thất Biệt Thự, Nội Thất Văn Phòng, Nội Thất Khách Sạn, Nội Thất Trường Học', '', 'Nội thất Hồ Gia chuyên cung cấp thiết kế - thi công nội thất cao cấp cho nhà ở, chung cư, biệt thự, văn phòng, khách sạn, trường học.', '', 3, 'Nội Thất Hồ Gia', '', 'trananhduc1409@gmail.com', 'https://www.facebook.com/profile.php?id=100015956618624', '0979 657 678', '', '', '', 'Bản 2, xã Châu Bình, huyện Quỳ Châu, tỉnh Nghệ An', '', '', '', '', '0979 657 678', '', 'https://noithathogia.com/', '178538586193570', '', '', 'haihofurniture529@gmail.com', '', '', '', '', '', '', '', '', '', '', '', 'Nội Thất Nhà ở', '', '', 'Nội Thất Chung Cư', '', '', 'Nội Thất Biệt Thự', '', '', 'Nội Thất Văn Phòng', '', '', 'Nội Thất Khách Sạn', '', '', 'Nội Thất Trường Học', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1880.258510399143!2d105.19507085672757!3d19.51940452348522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTnCsDMxJzA5LjkiTiAxMDXCsDExJzQ2LjkiRQ!5e0!3m2!1svi!2s!4v1730272144521!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '17847344.png', '67426203_bct.png', '77302102_bct.png', '', '', '', '', '', '', '', 'Cho thuê xe du lịch', 'https://www.google.com.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_time`
--

CREATE TABLE `table_time` (
  `id` int(10) UNSIGNED NOT NULL,
  `title_vi` varchar(255) NOT NULL,
  `title_en` varchar(255) NOT NULL,
  `keywords_vi` varchar(1024) NOT NULL,
  `keywords_en` varchar(1024) NOT NULL,
  `description_vi` varchar(1024) NOT NULL,
  `description_en` varchar(1024) NOT NULL,
  `ten_vi` varchar(225) NOT NULL,
  `tenkhongdau` varchar(255) NOT NULL,
  `mota_vi` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung_vi` text NOT NULL,
  `noidung_en` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `thumb` varchar(255) NOT NULL,
  `stt` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `ngaytao` int(11) NOT NULL DEFAULT 0,
  `ngaysua` int(11) NOT NULL DEFAULT 0,
  `title_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_en` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mota_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `noidung_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords_jp` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `h3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_en` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ten_jp` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_time`
--

INSERT INTO `table_time` (`id`, `title_vi`, `title_en`, `keywords_vi`, `keywords_en`, `description_vi`, `description_en`, `ten_vi`, `tenkhongdau`, `mota_vi`, `noidung_vi`, `noidung_en`, `photo`, `thumb`, `stt`, `hienthi`, `ngaytao`, `ngaysua`, `title_jp`, `description_jp`, `mota_en`, `mota_jp`, `noidung_jp`, `keywords_jp`, `h1`, `h2`, `h3`, `type`, `ten_en`, `ten_jp`) VALUES
(1, '', '', '', '', '', '', '', '', '', '<h1><span style=\"color:#8e44ad\"><span style=\"font-size:17px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Nội Thất Hồ Gia&nbsp;</strong>cảm ơn Qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; sử dụng dịch vụ của c&ocirc;ng ty,&nbsp;Bộ phận tư vấn sẽ li&ecirc;n hệ với Qu&yacute; kh&aacute;ch h&agrave;ng trong thời gian sớm nhất.</span></span></span></h1>', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'nhan-hang', '', ''),
(6, 'Giới thiệu', '', '', '', '', '', 'Giới thiệu', '', '<p style=\"text-align:justify\">Ch&uacute;ng t&ocirc;i khơi nguồn cảm hứng s&aacute;ng tạo từ những bộ sưu tập&nbsp;với hơn 7000+ sản phẩm đầy đủ m&agrave;u sắc, sống động. Hiểu rằng mỗi kh&ocirc;ng gian sống cần giải ph&aacute;p ri&ecirc;ng, v&igrave; vậy ch&uacute;ng t&ocirc;i mang đến dịch vụ&nbsp;<strong>t&ugrave;y chỉnh k&iacute;ch thước, m&agrave;u sắc theo y&ecirc;u cầu</strong>&nbsp;để ph&ugrave; hợp với mỗi gia đ&igrave;nh. Bằng sự linh hoạt trong thiết kế, Gỗ Trang Tr&iacute; trao đến bạn chiếc &ldquo;ch&igrave;a kh&oacute;a vạn năng&rdquo; để mở ra kh&ocirc;ng gian sống, l&agrave;m việc theo đam m&ecirc; v&agrave; s&aacute;ng tạo của ri&ecirc;ng m&igrave;nh.</p><p style=\"text-align:justify\">&nbsp;</p><p><strong>C&ocirc;ng Ty Nội Thất Hồ Gia</strong></p><p>Quỳnh 2, x&atilde; Ch&acirc;u B&igrave;nh, huyện Quỳ Ch&acirc;u, Tỉnh Nghệ an</p><p>Hotline :&nbsp;0979657678</p><p>Email : haihofurniture529@gmail.com</p><p>Website : https://noithathogia.com/</p>', '<p style=\"text-align:justify\">Ch&uacute;ng t&ocirc;i khơi nguồn cảm hứng s&aacute;ng tạo từ những bộ sưu tập&nbsp;<a title=\"NỘI THẤT\" target=\"_blank\" href=\"https://gotrangtri.vn/\">nội thất</a>&nbsp;với hơn 7000+ sản phẩm đầy đủ m&agrave;u sắc, sống động. Hiểu rằng mỗi kh&ocirc;ng gian sống cần giải ph&aacute;p ri&ecirc;ng, v&igrave; vậy ch&uacute;ng t&ocirc;i mang đến dịch vụ&nbsp;<strong>t&ugrave;y chỉnh k&iacute;ch thước, m&agrave;u sắc theo y&ecirc;u cầu</strong>&nbsp;để ph&ugrave; hợp với mỗi gia đ&igrave;nh. Bằng sự linh hoạt trong thiết kế, Gỗ Trang Tr&iacute; trao đến bạn chiếc &ldquo;ch&igrave;a kh&oacute;a vạn năng&rdquo; để mở ra kh&ocirc;ng gian sống, l&agrave;m việc theo đam m&ecirc; v&agrave; s&aacute;ng tạo của ri&ecirc;ng m&igrave;nh.</p><p style=\"text-align:justify\">&nbsp;</p><p><strong>C&ocirc;ng Ty Nội Thất Hồ Gia</strong></p><p>Quỳnh 2, x&atilde; Ch&acirc;u B&igrave;nh, huyện Quỳ Ch&acirc;u, Tỉnh Nghệ an</p><p>Hotline :&nbsp;0979657678</p><p>Email : haihofurniture529@gmail.com</p><p>Website : https://noithathogia.com/</p>', '', '84644.jpg', '_290x230.jpg', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'gioi-thieu', '', ''),
(12, '', '', '', '', '', '', '', '', '', '<div style=\"height:0; overflow:hidden; padding-bottom:56.25%; padding-top:30px; position:relative\" class=\"youtube-embed-wrapper\"><iframe width=\"640\" height=\"360\" src=\"https://www.youtube.com/embed/9KWo0RbKSTc\" frameborder=\"0\" style=\"position:absolute;top:0;left:0;width:100%;height:100%\"></iframe></div><p>&nbsp;</p>', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'trang-chu', '', ''),
(9, '', '', '', '', '', '', '', '', '', '<p>Để nhận được đầy đủ ch&iacute;nh s&aacute;ch tốt nhất,<br />\r\nQu&yacute; kh&aacute;ch vui l&ograve;ng đăng k&yacute;&nbsp;để lại th&ocirc;ng tin b&ecirc;n cạnh, ch&uacute;ng t&ocirc;i sẽ li&ecirc;n hệ lại trong thời gian sớm nhất c&oacute; thể.</p>\r\n', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'dang-ki-dai-ly', '', ''),
(4, '', '', '', '', '', '', '', '', '', '<p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Th&ocirc;ng tin t&agrave;i khoản ng&acirc;n h&agrave;ng :&nbsp;</strong></span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">*T&agrave;i khoản doanh nghiệp : C&ocirc;ng ty Nội Thất Hồ Gia</span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Số t&agrave;i khoản : 1040037979</span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Ng&acirc;n h&agrave;ng : Techcombank</span></span></p><p>&nbsp;</p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">*T&agrave;i khoản c&aacute; nh&acirc;n&nbsp;: Trần Anh Đức</span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Số t&agrave;i khoản : 9938828538</span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\">Ng&acirc;n h&agrave;ng : Techcombank</span></span></p><p><span style=\"font-size:14px\"><span style=\"font-family:Times New Roman,Times,serif\"><strong>Nội thất Hồ Gia&nbsp;chỉ chấp nhận thanh to&aacute;n qua 2 t&agrave;i khoản tr&ecirc;n,&nbsp;Nội thất Hồ Gia sẽ kh&ocirc;ng giải quyết c&aacute;c vấn đề ph&aacute;t sinh nếu kh&aacute;ch h&agrave;ng chuyển khoản qua số t&agrave;i khoản kh&aacute;c.</strong></span></span></p>', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'noi-dia', '', ''),
(8, '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'bang-gia', '', ''),
(10, '', '', '', '', '', '', 'Hướng dẫn mua hàng', '', '', '<p>Th&ocirc;ng tin đang cập nhật ...</p>\r\n', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'huong-dan-mua-hang', '', ''),
(11, '', '', '', '', '', '', '', '', '', '<p>Th&ocirc;ng tin giao h&agrave;ng đang cập nhật ...</p>', '', '', '', 1, 1, 0, 0, '', '', '', '', '', '', '', '', '', 'giao-hang', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_tinhtrang`
--

CREATE TABLE `table_tinhtrang` (
  `id` int(11) NOT NULL,
  `trangthai` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_tinhtrang`
--

INSERT INTO `table_tinhtrang` (`id`, `trangthai`) VALUES
(1, 'Mới đặt'),
(2, 'Đã xác nhận'),
(3, 'Đang giao hàng'),
(4, 'Hoàn thành'),
(5, 'Đã hủy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_user`
--

CREATE TABLE `table_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `ten` varchar(225) NOT NULL,
  `dienthoai` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `diachi` varchar(225) NOT NULL,
  `sex` tinyint(1) NOT NULL DEFAULT 0,
  `nick_yahoo` varchar(225) NOT NULL,
  `nick_skype` varchar(225) NOT NULL,
  `congty` varchar(225) NOT NULL,
  `country` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `role` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `hienthi` tinyint(1) NOT NULL DEFAULT 1,
  `com` varchar(225) NOT NULL DEFAULT 'user',
  `ngaysinh` int(11) NOT NULL,
  `ngaydangky` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `table_user`
--

INSERT INTO `table_user` (`id`, `username`, `password`, `ten`, `dienthoai`, `email`, `diachi`, `sex`, `nick_yahoo`, `nick_skype`, `congty`, `country`, `city`, `role`, `hienthi`, `com`, `ngaysinh`, `ngaydangky`) VALUES
(6, 'tuantra', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', 0, '', '', '', '', '', 4, 1, 'user', 0, 0),
(9, 'ivangroups', 'd539768cff310c41497483195cb5662a', '', '', '', '', 0, '', '', '', '', '', 4, 1, 'user', 0, 1558304928);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_online`
--

CREATE TABLE `user_online` (
  `session` char(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `ip` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_comment`
--
ALTER TABLE `table_comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_counter`
--
ALTER TABLE `table_counter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_dknhantin`
--
ALTER TABLE `table_dknhantin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_donhang`
--
ALTER TABLE `table_donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_donhang_detail`
--
ALTER TABLE `table_donhang_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_footer`
--
ALTER TABLE `table_footer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_icon`
--
ALTER TABLE `table_icon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_lienhe`
--
ALTER TABLE `table_lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_member`
--
ALTER TABLE `table_member`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_online`
--
ALTER TABLE `table_online`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product`
--
ALTER TABLE `table_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product_hinhanh`
--
ALTER TABLE `table_product_hinhanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product_list`
--
ALTER TABLE `table_product_list`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_product_tab`
--
ALTER TABLE `table_product_tab`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_province`
--
ALTER TABLE `table_province`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_time`
--
ALTER TABLE `table_time`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_tinhtrang`
--
ALTER TABLE `table_tinhtrang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `table_user`
--
ALTER TABLE `table_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_comment`
--
ALTER TABLE `table_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `table_counter`
--
ALTER TABLE `table_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `table_dknhantin`
--
ALTER TABLE `table_dknhantin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=864;

--
-- AUTO_INCREMENT cho bảng `table_donhang`
--
ALTER TABLE `table_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `table_donhang_detail`
--
ALTER TABLE `table_donhang_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `table_footer`
--
ALTER TABLE `table_footer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `table_icon`
--
ALTER TABLE `table_icon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT cho bảng `table_lienhe`
--
ALTER TABLE `table_lienhe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `table_member`
--
ALTER TABLE `table_member`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `table_online`
--
ALTER TABLE `table_online`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53484;

--
-- AUTO_INCREMENT cho bảng `table_photo`
--
ALTER TABLE `table_photo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `table_product`
--
ALTER TABLE `table_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `table_product_hinhanh`
--
ALTER TABLE `table_product_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT cho bảng `table_product_list`
--
ALTER TABLE `table_product_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=513;

--
-- AUTO_INCREMENT cho bảng `table_product_tab`
--
ALTER TABLE `table_product_tab`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT cho bảng `table_setting`
--
ALTER TABLE `table_setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `table_time`
--
ALTER TABLE `table_time`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `table_tinhtrang`
--
ALTER TABLE `table_tinhtrang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `table_user`
--
ALTER TABLE `table_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
