-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 08:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mobikart`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(40) NOT NULL,
  `brandimgsrc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `brandimgsrc`) VALUES
(1, 'apple', 'apple.png'),
(8, 'infinix', 'infinix.png'),
(6, 'narzo', 'narzo.png'),
(2, 'oppo', 'oppo.png'),
(3, 'poco', 'poco.png'),
(7, 'realme', 'realme.png'),
(5, 'samsung', 'samsung.png'),
(4, 'xiaomi', 'xiaomi.png');

-- --------------------------------------------------------

--
-- Table structure for table `clockspeedtable`
--

CREATE TABLE `clockspeedtable` (
  `clockspeed` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clockspeedtable`
--

INSERT INTO `clockspeedtable` (`clockspeed`) VALUES
(1),
(1.5),
(2),
(2.5),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `corestable`
--

CREATE TABLE `corestable` (
  `core` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `corestable`
--

INSERT INTO `corestable` (`core`) VALUES
('Dual Core'),
('Hexa Core'),
('Octa Core'),
('Quad Core'),
('Single Core');

-- --------------------------------------------------------

--
-- Table structure for table `internalstoragetable`
--

CREATE TABLE `internalstoragetable` (
  `internalstorage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `internalstoragetable`
--

INSERT INTO `internalstoragetable` (`internalstorage`) VALUES
(16),
(32),
(64),
(128),
(512);

-- --------------------------------------------------------

--
-- Table structure for table `network_typetable`
--

CREATE TABLE `network_typetable` (
  `network_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `network_typetable`
--

INSERT INTO `network_typetable` (`network_type`) VALUES
('3G'),
('4G'),
('4G VOLTE'),
('5G');

-- --------------------------------------------------------

--
-- Table structure for table `ostable`
--

CREATE TABLE `ostable` (
  `os` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ostable`
--

INSERT INTO `ostable` (`os`) VALUES
('Android'),
('iOS');

-- --------------------------------------------------------

--
-- Table structure for table `processor_brandtable`
--

CREATE TABLE `processor_brandtable` (
  `processor_brand` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `processor_brandtable`
--

INSERT INTO `processor_brandtable` (`processor_brand`) VALUES
('AMD'),
('Apple'),
('Mediatek'),
('RDA'),
('Snapdragon');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_code` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `brand_name` varchar(40) NOT NULL,
  `ram` int(11) NOT NULL,
  `internal_storage` int(11) NOT NULL,
  `battery_capacity` int(11) NOT NULL,
  `clockspeed` float NOT NULL,
  `price` int(11) NOT NULL,
  `cores` varchar(20) NOT NULL,
  `primarycamera` int(11) NOT NULL,
  `secondarycamera` int(11) NOT NULL,
  `screen_size` varchar(11) NOT NULL,
  `os` varchar(30) NOT NULL,
  `processor_brand` varchar(30) NOT NULL,
  `imgsrc` varchar(25) NOT NULL,
  `nettype` varchar(20) NOT NULL,
  `spec1` varchar(150) NOT NULL,
  `spec2` varchar(150) NOT NULL,
  `spec3` varchar(150) NOT NULL,
  `spec4` varchar(150) NOT NULL,
  `spec5` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_code`, `product_name`, `brand_name`, `ram`, `internal_storage`, `battery_capacity`, `clockspeed`, `price`, `cores`, `primarycamera`, `secondarycamera`, `screen_size`, `os`, `processor_brand`, `imgsrc`, `nettype`, `spec1`, `spec2`, `spec3`, `spec4`, `spec5`) VALUES
(2000, 'POCO M3', 'poco', 6, 128, 6000, 2, 11999, 'Octa Core', 48, 8, '16.59', 'Android', 'Snapdragon', 'pocom3.png', '4G VOLTE', 'pocom31.png', 'pocom32.png', 'pocom33.png', 'pocom34.png', 'pocom35.png'),
(2001, 'POCO C3', 'poco', 3, 32, 5000, 2, 7499, 'Quad Core', 16, 8, '16.59', 'Android', 'Mediatek', 'pococ3.png', '4G', 'poco-c31.png', 'poco-c32.png', 'poco-c33.png', 'poco-c34.png', 'poco-c35.png'),
(2002, 'POCO X3 Pro', 'poco', 6, 128, 5500, 2.5, 18999, 'Octa Core', 48, 16, '16.94', 'Android', 'Snapdragon', 'pocox3pro.png', '5G', 'x3-pro1.png', 'x3-pro2.png', 'x3-pro3.png', 'x3-pro4.png', 'x3-pro5.png'),
(2003, 'POCO X3 ', 'poco', 6, 128, 6000, 2.5, 16999, 'Octa Core', 48, 12, '16.59', 'Android', 'Mediatek', 'pocox3.png', '4G VOLTE', 'poco-x31.png', 'poco-x32.png', 'poco-x33.png', 'poco-x34.png', 'poco-x35.png'),
(2004, 'POCO M2 Pro', 'poco', 6, 64, 6000, 2.5, 14999, 'Octa Core', 48, 16, '16.94', 'Android', 'RDA', 'pocom2pro.png', '4G VOLTE', 'poco-m2-pro1.png', 'poco-m2-pro2.png', 'poco-m2-pro3.png', 'poco-m2-pro4.png', 'poco-m2-pro5.png'),
(2005, 'POCO M2 RELOADED', 'poco', 4, 64, 5000, 2, 9999, 'Hexa Core', 16, 8, '16.59', 'Android', 'Mediatek', 'pocom2reloaded.png', '4G', 'm2-reloaded1.png', 'm2-reloaded2.png', 'm2-reloaded3.png', 'm2-reloaded4.png', 'm2-reloaded5.png'),
(2006, 'POCO X2', 'poco', 8, 512, 6000, 3, 18999, 'Octa Core', 48, 16, '16.94', 'Android', 'RDA', 'pocox2.png', '5G', 'poco-x21.png', 'poco-x22.png', 'poco-x23.png', 'poco-x24.png', 'poco-x25.png'),
(2007, 'POCO F1', 'poco', 8, 512, 6000, 3, 24999, 'Octa Core', 48, 16, '16.59', 'Android', 'AMD', 'pocof1.png', '5G', 'poco-f11.png', 'poco-f12.png', 'poco-f13.png', 'poco-f14.png', 'poco-f15.png'),
(2008, 'POCO M3 Pro', 'poco', 6, 128, 6000, 2.5, 24999, 'Hexa Core', 48, 16, '16.94', 'Android', 'Snapdragon', 'pocom3pro.png', '5G', 'm3-pro-5g1.png', 'm3-pro-5g2.png', 'm3-pro-5g3.png', 'm3-pro-5g4.png', 'm3-pro-5g5.png'),
(2009, 'POCO M2 ', 'poco', 6, 128, 5500, 2, 12999, 'Octa Core', 48, 16, '16.59', 'Android', 'Snapdragon', 'pocom2.png', '4G VOLTE', 'poco-m21.png', 'poco-m22.png', 'poco-m23.png', 'poco-m24.png', 'poco-m25.png'),
(2010, 'REALME C21', 'realme', 3, 32, 4000, 1.5, 7999, 'Dual Core', 16, 8, '16.59', 'Android', 'Mediatek', 'realmec21.png', '3G', 'c21-rmx3201-realme-original-imagfxfwn9aryyda.jpeg', 'c21-rmx3201-realme-original-imagfxfwprqygzta.jpeg', 'c21-rmx3201-realme-original-imagfxfwxbsvxhfq.jpeg', 'c21-rmx3201-realme-original-imagfxfwynanb2tq.jpeg', 'c21-rmx3201-realme-original-imagfxx4f3ehepzg.jpeg'),
(2011, 'REALME C25.', 'realme', 4, 64, 6000, 2, 14999, 'Octa Core', 48, 16, '16.59', 'Android', 'AMD', 'realmec25.png', '4G', 'c25-rmx3193-realme-original-imagfxftkbzfhu8y.jpeg', 'c25-rmx3193-realme-original-imagfxftqgchfrh2.jpeg', 'c25-rmx3193-realme-original-imagfxftgzukrqhz.jpeg', 'c25-rmx3193-realme-original-imagfxftzw5dxnfg.jpeg', 'c25-rmx3193-realme-original-imagfxftzmhyznbj.jpeg'),
(2012, 'REALME 8', 'realme', 6, 128, 5500, 2.5, 15999, 'Hexa Core', 48, 16, '16.67', 'Android', 'Mediatek', 'realme8.png', '4G VOLTE', '8-rmx3085-realme-original-imagfgpgmm6h8ptt.jpeg', '8-rmx3085-realme-original-imagfgpg6bwqvmdg.jpeg', '8-rmx3085-realme-original-imagfgpgcx2cp89f.jpeg', '8-rmx3085-realme-original-imagfgpgavst55n3.jpeg', '8-rmx3085-realme-original-imagfgpgeh6hhtkh.jpeg'),
(2013, 'RELAME C15', 'realme', 4, 64, 6000, 2, 11999, 'Hexa Core', 48, 12, '16.54', 'Android', 'RDA', 'realmec15.png', '4G VOLTE', 'realme-c15-rmx2180-original-imafupu9wutkbf2k.jpeg', 'realme-c15-rmx2180-original-imafupwtk6krzys8.jpeg', 'realme-c15-rmx2180-original-imafupu9mukhrwx9.jpeg', 'realme-c15-rmx2180-original-imafupu9mukhrwx9 (1).jpeg', 'realme-c15-rmx2180-original-imafupu9uxuvwmch.jpeg'),
(2014, 'RELAME C12S', 'realme', 3, 32, 6000, 1.5, 7999, 'Dual Core', 16, 8, '15.57', 'Android', 'Mediatek', 'realmec12s.png', '4G', 'c25s-rmx3197-realme-original-imag3smgq7frzezw.jpeg', 'c25s-rmx3197-realme-original-imag3smgyp8qbsqq.jpeg', 'c25s-rmx3197-realme-original-imag3smgpz7fdg9t.jpeg', 'c25s-rmx3197-realme-original-imag3smgkfccrjhp.jpeg', 'c25s-rmx3197-realme-original-imag3smgaz5nwhm5.jpeg'),
(2015, 'REALME X7', 'realme', 8, 512, 6000, 2.5, 26999, 'Octa Core', 64, 24, '16.94', 'Android', 'AMD', 'realmex7.png', '5G', 'x7-rmx3092-realme-original-imafztjzgzphyp6q.jpeg', 'x7-rmx3092-realme-original-imagy4c7njnmxmuq.jpeg', 'x7-rmx3092-realme-original-imafztjz39v2yggh.jpeg', 'x7-rmx3092-realme-original-imafztjzyayaushh.jpeg', 'x7-rmx3092-realme-original-imafztjzsqasynkd.jpeg'),
(2016, 'NARZO 30A', 'narzo', 2, 16, 4000, 1, 5999, 'Single Core', 12, 8, '15.59', 'Android', 'Mediatek', 'narzo30a.png', '3G', 'narzo-30a-rmx3171-realme-original-imagyhbgh8qfambf.jpeg', 'narzo-30a-rmx3171-realme-original-imagyhbgdfw4ymfp.jpeg', 'narzo-30a-rmx3171-realme-original-imagyhbgzqxyu6en.jpeg', 'narzo-30a-rmx3171-realme-original-imagyhbgy73yeqgg.jpeg', 'narzo-30a-rmx3171-realme-original-imagyhbgxngtuyag.jpeg'),
(2018, 'NARZO 20', 'narzo', 2, 32, 5500, 1, 7999, 'Single Core', 12, 12, '15.57', 'Android', 'AMD', 'narzo20.png', '3G', 'realme-narzo-20-rmx2193-original-imafvsw7vfqzh6wr.jpeg', 'realme-narzo-20-rmx2193-original-imafvsxupdjgwffs.jpeg', 'realme-narzo-20-rmx2193-original-imafwyj2y52brfsz.jpeg', 'realme-narzo-20-rmx2193-original-imafvhghsfy3rtgr.jpeg', 'realme-narzo-20-rmx2193-original-imafvsw7hvdbewpw.jpeg'),
(2019, 'NARZO 30 PRO', 'narzo', 6, 128, 6000, 2.5, 25999, 'Octa Core', 64, 16, '16.59', 'Android', 'Snapdragon', 'narzo30pro.png', '5G', 'narzo-30-pro-5g-rmx2117-realme-original-imagyhbkbaa5pjb2.jpeg', 'narzo-30-pro-5g-rmx2117-realme-original-imagyhbkadksuznx.jpeg\r\n', 'narzo-30-pro-5g-rmx2117-realme-original-imagyhbkhmbwakkr.jpeg', 'narzo-30-pro-5g-rmx2117-realme-original-imagyhbkzezgv9mw.jpeg', 'narzo-30-pro-5g-rmx2117-realme-original-imagyhbkkbfppk4p.jpeg'),
(2020, 'NARZO 30', 'narzo', 6, 64, 5000, 2, 14999, 'Quad Core', 16, 12, '16.54', 'Android', 'RDA', 'narzo30.png', '4G', 'narzo-30-rmx2156-realme-original-imag45yhzhugdcqh.jpeg', 'narzo-30-rmx2156-realme-original-imag4cvazpgpe7t3.jpeg', 'narzo-30-rmx2156-realme-original-imag45yhptdgu4qf.jpeg', 'narzo-30-rmx2156-realme-original-imag45yhbbyujgr5.jpeg', 'narzo-30-rmx2156-realme-original-imag45yhn7zkfvvg.jpeg'),
(2021, 'NARZO 20 PRO', 'narzo', 4, 128, 4500, 2, 13999, 'Hexa Core', 16, 12, '15.57', 'Android', 'AMD', 'narzo20pro.png', '4G VOLTE', 'realme-narzo-20-pro-rmx2161-original-imafvswzwx8gwxbj.jpeg', 'realme-narzo-20-pro-rmx2161-original-imafvsxud4r9b9qh.jpeg', 'realme-narzo-20-pro-rmx2161-original-imafvnra29ncnb9h.jpeg', 'realme-narzo-20-pro-rmx2161-original-imafvnr9wzf7kgn9.jpeg', 'realme-narzo-20-pro-rmx2161-original-imafvnr9mkq77xjz.jpeg'),
(2022, 'OPPO A12', 'oppo', 2, 32, 4000, 1.5, 8999, 'Hexa Core', 48, 16, '15.57', 'Android', 'Mediatek', 'oppoa12.png', '4G', 'oppo-a12-cph2083-original-imafze3fkyc6ghjy.jpeg', 'a12-cph2083-oppo-original-imagyx8zm5pvgp4u.jpeg', 'oppo-a12-cph2083-original-imafze3fgczv6z7u.jpeg', 'oppo-a12-cph2083-original-imafze3fgc7dz8zv.jpeg', 'a12-cph2083-oppo-original-imagyx8zea3pbatf.jpeg'),
(2023, 'OPPO A53', 'oppo', 4, 128, 6000, 2.5, 16999, 'Quad Core', 48, 12, '16.59', 'Android', 'Snapdragon', 'oppoa53.png', '4G VOLTE', 'a53-cph2127-oppo-original-imagf8hxxendurgm.jpeg', 'a53-cph2127-oppo-original-imagfgzsztb2zcgf.jpeg', 'a53-cph2127-oppo-original-imagf8hxdyzz9ggh.jpeg', 'a53-cph2127-oppo-original-imagf8hxfzsete8n.jpeg', 'a53-cph2127-oppo-original-imagfgzsu39qkgj5.jpeg'),
(2024, 'OPPO F19 PRO', 'oppo', 12, 512, 6000, 3, 29999, 'Octa Core', 64, 48, '16.69', 'Android', 'Snapdragon', 'oppof19pro.png', '5G', 'f19-pro-cph2285-oppo-original-imagfgzgjmxgceqx.jpeg', 'f19-pro-cph2285-oppo-original-imagfgzgt6npvwbg.jpeg', 'f19-pro-cph2285-oppo-original-imagyyvj8qzmzeru.jpeg', 'f19-pro-cph2285-oppo-original-imagyyvjrejw2nfx.jpeg', 'f19-pro-cph2285-oppo-original-imagyyvjkhs3p2fb.jpeg'),
(2025, 'OPPO RENO4 PRO', 'oppo', 12, 512, 6000, 3, 30999, 'Octa Core', 64, 64, '16.67', 'Android', 'AMD', 'opporeno4pro.png', '5G', 'oppo-reno4-pro-cph2109-original-imafu5tb9rtbexkn.jpeg', 'oppo-reno4-pro-cph2109-original-imafu5tbejjzfwvg.jpeg', 'oppo-reno4-pro-cph2109-original-imafu5tbnkzyfj2g.jpeg', 'oppo-reno4-pro-cph2109-original-imafu5tbkhxmv2vg.jpeg', 'oppo-reno4-pro-cph2109-original-imafu5tb5c8b7nzq.jpeg'),
(2026, 'OPPO FIND X', 'oppo', 12, 512, 65000, 3, 60999, 'Octa Core', 64, 64, '16.67', 'Android', 'RDA', 'oppofinx.png', '5G', 'oppo-find-x-cph1871-original-imaf7ywhqmckb6w9.jpeg', 'oppo-find-x-cph1871-original-imaf7ywhnkvb3qxv.jpeg', 'oppo-find-x-cph1871-original-imaf7ywhwqmdx2fy.jpeg', 'oppo-find-x-cph1871-original-imaf7ywha8tca6bz.jpeg', 'oppo-find-x-cph1871-original-imaf7ywha8tca6bz (1).jpeg'),
(2027, 'SAMSUNG GALAXY M32', 'samsung', 8, 128, 5500, 2.5, 15999, 'Hexa Core', 48, 249, '16.67', 'Android', 'AMD', 'samsunggalaxym32.png', '4G VOLTE', 'samsung-galaxy-m01-sm-m015gzkdins-original-imafscggjk6twbh6.jpeg', 'samsung-galaxy-m01-sm-m015gzkdins-original-imafscggj89nw4qx.jpeg', 'samsung-galaxy-m01-sm-m015gzkdins-original-imafscggsnncegrz.jpeg', 'samsung-galaxy-m01-sm-m015gzkdins-original-imafscggzpbrdwmh.jpeg', 'galaxy-m02-b08t2nnt4s5-samsung-original-imagy73cstr3qvzg.jpeg'),
(2028, 'SAMSUNG GALAXY M42', 'samsung', 8, 128, 6000, 2.5, 24999, 'Octa Core', 48, 16, '16.54', 'Android', 'Mediatek', 'samsunggalaxym42.png', '4G VOLTE', 'galaxy-m42-5g-sm-m426bzkgins-samsung-original-imag2vpg9gthtpgz.jpeg', 'galaxy-m42-5g-sm-m426bzkgins-samsung-original-imag2vpgzzyhwfsz.jpeg', 'galaxy-m42-5g-sm-m426bzkgins-samsung-original-imag2vpgdqjzrzpb.jpeg', 'galaxy-m42-5g-sm-m426bzkgins-samsung-original-imag2vpgzks2tsfy.jpeg', 'galaxy-m42-5g-sm-m426bzkgins-samsung-original-imag2vggv8jqgh7s.jpeg'),
(2029, 'SAMSUNG GALAXY 21PLUS', 'samsung', 12, 512, 6500, 3, 69999, 'Octa Core', 64, 64, '16.69', 'Android', 'Snapdragon', 'samsunggalaxys21plus.png', '5G', 'samsung-galaxy-s21-plus-sm-g996bzkdinu-original-imafzcmeg75kgehm.jpeg', 'samsung-galaxy-s21-plus-sm-g996bzkdinu-original-imafzckj3chsgmak.jpeg', 'samsung-galaxy-s21-plus-sm-g996bzkdinu-original-imafzcmjywvgwykj (1).jpeg', 'samsung-galaxy-s21-plus-sm-g996bzkdinu-original-imafzcmjywvgwykj (2).jpeg', 'samsung-galaxy-s21-plus-sm-g996bzkginu-original-imafzcjtbsmh9gvd.jpeg'),
(2030, 'SAMSUNG B350', 'samsung', 2, 16, 4000, 1, 3999, 'Single Core', 8, 8, '15', 'Android', 'RDA', 'samsungb350.png', '3G', 'SAMSUNGB3501.png', 'SAMSUNGB3502.png', 'SAMSUNGB3503.png', 'SAMSUNGB3504.png', 'SAMSUNGB3505.png'),
(2031, 'REDMI 8A DUAL', 'xiaomi', 3, 32, 5500, 1.5, 8999, 'Dual Core', 12, 8, '15.59', 'Android', 'RDA', 'redmi8adual.png', '4G', 'mi-redmi-8a-dual-b07x1kta-original-imafp73grqyzv9t3.jpeg', 'mi-redmi-8a-dual-mzb9028in-original-imafvgwybujhfmzy.jpeg', 'mi-redmi-8a-dual-b07x1kta-original-imafp73gu7efxdmc.jpeg', 'mi-redmi-8a-dual-b07x1kta-original-imafp73gpqtgskpg.jpeg', 'redmi-8a-dual-32-gb-c-na-mi-2-original-imafp73gzfpwjb6e.jpeg\r\n'),
(2032, 'MI 10i', 'xiaomi', 6, 128, 5500, 2.5, 25999, 'Hexa Core', 64, 24, '16.67', 'Android', 'Snapdragon', 'mi10i.png', '4G VOLTE', 'mi-10i-m10ix06-original-imafz53gjzqae2kr.jpeg', 'mi-10i-m10ix06-original-imafz53ghf8xatjy.jpeg', 'mi-10i-m10ix06-original-imafz53gkqzzycep.jpeg', '10i-m2007j17i-mi-original-imafz9bbg2gesefa.jpeg', '10i-m2007j17i-mi-original-imafz9bbzvezyhj7.jpeg'),
(2033, 'REDMI NOTE 5 PRO', 'xiaomi', 4, 128, 5000, 2, 14999, 'Quad Core', 24, 16, '16.59', 'Android', 'Snapdragon', 'redminote5pro.png', '4G VOLTE', 'redmi-note-5-pro-mzb6086in-original-imaf2g8zp8ubadzb.jpeg', 'mi-redmi-note-5-pro-mzb6082in-mzb6090in-original-imafdb6zh4wv3gvu.jpeg', 'redmi-note-5-pro-mzb6082in-original-imaf2g8n853nqhfv.jpeg', 'redmi-note-5-pro-na-original-imaf2ashuwmatzkp.jpeg', 'redmi-e7s-note-5-pro-na-original-imaf2ashru3ufz8j.jpeg'),
(2034, 'MI 10 T', 'xiaomi', 8, 512, 6000, 2.5, 30999, 'Octa Core', 64, 48, '16.69', 'Android', 'AMD', 'mi10t.png', '5G', 'mi-10t-mzb07zain-original-imafwhbyyvhd3g9v.jpeg', 'mi-10t-mzb07zain-original-imafwju5ny3gtkzs.jpeg', 'mi-10t-mzb07zain-original-imafwhbyeszftfez.jpeg', 'mi-10t-mzb07zain-original-imafwhbyetrszqtf.jpeg', 'mi-10t-mzb07zain-original-imafwhby3zkzyynw.jpeg'),
(2035, 'MI 10', 'xiaomi', 12, 512, 6500, 3, 60999, 'Octa Core', 64, 64, '16.67', 'Android', 'Snapdragon', 'mi10.png', '5G', 'mi-10-mzb9044in-original-imafuq92ausjrxaz.jpeg', 'mi-10-mzb8924in-original-imafuq98aes2tz56.jpeg', 'mi-10-mzb9044in-original-imafuq924ze9mv8s.jpeg', 'mi-10-mzb9044in-original-imafuq924zshh7dh.jpeg', 'mi-10-mzb9044in-original-imafuq92rxxqfanz.jpeg'),
(2036, 'INFINIX NOTE10', 'infinix', 3, 32, 5000, 1.5, 11999, 'Quad Core', 16, 12, '15.57', 'Android', 'Mediatek', 'infinixnote10.png', '4G', 'note-10-x693-128-6-infinix-original-imag3uy5yuwayfz2.jpeg', 'note-10-x693-128-6-infinix-original-imag3uy74fzpabhx.jpeg', 'note-10-x693-64-4-infinix-original-imag3shq7bzu8gta.jpeg', 'note-10-x693-64-4-infinix-original-imag3shqda4jechh.jpeg', 'note-10-x693-128-6-infinix-original-imag3uy5puerggbm.jpeg'),
(2037, 'INFINIX SMART HD', 'infinix', 2, 16, 4500, 1, 7999, 'Dual Core', 8, 8, '15.57', 'Android', 'Mediatek', 'infinixsmarthd.png', '3G', 'infinix-smart-hd-2021-x612b-original-imafyf9fuwr6uzxv.jpeg', 'infinix-smart-hd-2021-x612b-original-imafygftuxfc6xty.jpeg', 'infinix-smart-hd-2021-x612b-original-imafyf9fh7ugexjt.jpeg', 'infinix-smart-hd-2021-x612b-original-imafyf9fjybyaa4w.jpeg', 'infinix-smart-hd-2021-x612b-original-imafyf9fwwymnucf.jpeg'),
(2038, 'INFINIX ZERO 8i', 'infinix', 4, 64, 5500, 2, 14999, 'Hexa Core', 48, 12, '15.57', 'Android', 'Snapdragon', 'inifinixzero8i.png', '4G VOLTE', 'apple-iphone-6s-na-original-imaebym6vefusezb1.jpeg', 'infinix-zero-8i-x687b-original-imafxvbagnw7hgag.jpeg', 'infinix-zero-8i-x687b-original-imafxvbatfg9mj8p.jpeg', 'infinix-zero-8i-x687b-original-imafxvbagvfyt6cb.jpeg', 'infinix-zero-8i-x687b-original-imafxvbambuncqhx.jpeg'),
(2039, 'APPLE IPHONE SE', 'apple', 2, 64, 4000, 1, 39999, 'Single Core', 12, 6, '15', 'iOS', 'Apple', 'appleiphonese.png', '4G', 'apple-iphone-se-mxd02hn-a-original-imafrcpjfehbbqgb.jpeg', 'apple-iphone-se-mxd02hn-a-original-imafrcpjgcphy69z.jpeg', 'iphone-se-mhgp3hn-a-apple-original-imagfj4cqstgepcp.jpeg', 'apple-iphone-se-mxd02hn-a-original-imafrcpjdkt4ef7w.jpeg', 'apple-iphone-se-mxd02hn-a-original-imafrcpj393yex36.jpeg'),
(2040, 'Apple iPhone mini 12', 'apple', 4, 128, 5000, 2.5, 72999, 'Octa Core', 12, 12, '15.59', 'iOS', 'Apple', 'appleiphone12mini.png', '4G VOLTE', 'apple-iphone-12-mini-dummyapplefsn-original-imafwgbfhfevaajh.jpeg', 'apple-iphone-12-mini-dummyapplefsn-original-imafwgbfhx4cfzue.jpeg', 'apple-iphone-12-mini-dummyapplefsn-original-imafwgbfh2jvvnpw.jpeg', 'apple-iphone-12-mini-dummyapplefsn-original-imafwgbfbhdjz85u.jpeg', 'apple-iphone-12-mini-dummyapplefsn-original-imafwgbfgsqg4fpr.jpeg'),
(2041, 'APPLE iPHONE 12 PRO', 'apple', 8, 512, 5000, 3, 121999, 'Octa Core', 12, 12, '15.59', 'iOS', 'Apple', 'appleiphone12pro.png', '5G', 'apple-iphone-12-pro-dummyapplefsn-original-imafwgbrzhcushwk.jpeg', 'apple-iphone-12-pro-dummyapplefsn-original-imafwgbrzxg3nggd.jpeg', 'apple-iphone-12-pro-dummyapplefsn-original-imafwgbrhs7gzqwh.jpeg', 'apple-iphone-12-pro-dummyapplefsn-original-imafwgbr5ndzwdfw.jpeg', 'apple-iphone-12-pro-dummyapplefsn-original-imafwgbryeutry5z.jpeg'),
(2042, 'APPLE iPHONE 12', 'apple', 8, 128, 5500, 2.5, 92999, 'Octa Core', 12, 12, '15.59', 'iOS', 'Apple', 'appleiphone12.png', '5G', 'apple-iphone-12-dummyapplefsn-original-imafwg8drqaam5vu.jpeg', 'apple-iphone-6s-na-original-imaebym6vefusezb1.jpeg', 'apple-iphone-12-dummyapplefsn-original-imafwg8dukfgy3dh.jpeg', 'apple-iphone-12-dummyapplefsn-original-imafwg8dxfpdqyga.jpeg', 'apple-iphone-12-dummyapplefsn-original-imafwg8dhmfhxevy.jpeg'),
(2047, 'iPhone 11 PRO MAX', 'apple', 12, 512, 5000, 3, 150999, 'Octa Core', 12, 12, '15.59', 'iOS', 'Apple', 'iphone11pro512.png', '5G', 'iphone-11-pro-max-256-u-mwhm2hn-a-apple-0-original-imafkg2ftc5cze5n.jpeg', 'iphone-11-pro-512-a-mwcg2hn-a-apple-0-original-imafkg2fbyxqbbnh.jpeg', 'iphone-11-pro-64-a-mwc62hn-a-apple-0-original-imafkg2fdthzzn6n.jpeg', 'iphone-11-pro-256-a-mwcc2hn-a-apple-0-original-imafkg2fjt3hsqun.jpeg', 'iphone-11-pro-256-a-mwcc2hn-a-apple-0-original-imafkg2fjt3hsqun.jpeg'),
(2048, 'Apple iphone 6s', 'apple', 4, 64, 5000, 2.5, 39999, 'Hexa Core', 12, 12, '15.57', 'iOS', 'Apple', 'appleiphone6s.png', '4G VOLTE', 'apple-iphone-6s-a1688-original-imaesth8vkdfwnce.jpeg', 'apple-iphone-6s-na-original-imaeby6rmzxdpvbj.jpeg', 'apple-iphone-6s-mn0w2hn-a-original-imaexw6shyqbz5ub.jpeg', 'apple-iphone-6s-a1688-original-imaesth8vkdfwnce (1).jpeg', 'apple-iphone-6s-na-original-imaebym6vefusezb.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `ram`
--

CREATE TABLE `ram` (
  `ram` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ram`
--

INSERT INTO `ram` (`ram`) VALUES
(2),
(3),
(4),
(6),
(8),
(12);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `mail`, `password`) VALUES
(4, 'kanivan_s', 'skanivan12@gmail.com', '12345678'),
(5, 'mobile customer', 'mobile@gmail.com', 'asdfghjkl'),
(6, 'Gamer', 'gamer@gmail.com', 'gamer@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_name`),
  ADD UNIQUE KEY `brand_id` (`brand_id`);

--
-- Indexes for table `clockspeedtable`
--
ALTER TABLE `clockspeedtable`
  ADD PRIMARY KEY (`clockspeed`);

--
-- Indexes for table `corestable`
--
ALTER TABLE `corestable`
  ADD PRIMARY KEY (`core`);

--
-- Indexes for table `internalstoragetable`
--
ALTER TABLE `internalstoragetable`
  ADD PRIMARY KEY (`internalstorage`);

--
-- Indexes for table `network_typetable`
--
ALTER TABLE `network_typetable`
  ADD PRIMARY KEY (`network_type`);

--
-- Indexes for table `ostable`
--
ALTER TABLE `ostable`
  ADD PRIMARY KEY (`os`);

--
-- Indexes for table `processor_brandtable`
--
ALTER TABLE `processor_brandtable`
  ADD PRIMARY KEY (`processor_brand`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_code`),
  ADD KEY `brand_name` (`brand_name`),
  ADD KEY `ram` (`ram`),
  ADD KEY `internal_storage` (`internal_storage`),
  ADD KEY `clockspeed` (`clockspeed`),
  ADD KEY `cores` (`cores`),
  ADD KEY `os` (`os`),
  ADD KEY `processor_brand` (`processor_brand`),
  ADD KEY `nettype` (`nettype`);

--
-- Indexes for table `ram`
--
ALTER TABLE `ram`
  ADD PRIMARY KEY (`ram`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`,`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2049;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_name`) REFERENCES `brands` (`brand_name`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_name`) REFERENCES `brands` (`brand_name`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`ram`) REFERENCES `ram` (`ram`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`internal_storage`) REFERENCES `internalstoragetable` (`internalstorage`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`clockspeed`) REFERENCES `clockspeedtable` (`clockspeed`),
  ADD CONSTRAINT `products_ibfk_6` FOREIGN KEY (`cores`) REFERENCES `corestable` (`core`),
  ADD CONSTRAINT `products_ibfk_7` FOREIGN KEY (`os`) REFERENCES `ostable` (`os`),
  ADD CONSTRAINT `products_ibfk_8` FOREIGN KEY (`processor_brand`) REFERENCES `processor_brandtable` (`processor_brand`),
  ADD CONSTRAINT `products_ibfk_9` FOREIGN KEY (`nettype`) REFERENCES `network_typetable` (`network_type`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
