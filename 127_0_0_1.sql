-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-05-29 14:51:27
-- 伺服器版本: 5.7.14
-- PHP 版本： 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `管理员姓名` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `number` bigint(20) NOT NULL,
  `password` bigint(20) NOT NULL,
  `管理员工作编号` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`管理员姓名`, `number`, `password`, `管理员工作编号`) VALUES
('张三', 10000, 123456, 3000000),
('李四', 10001, 123456, 3000001);

-- --------------------------------------------------------

--
-- 資料表結構 `deal`
--

CREATE TABLE `deal` (
  `交易编号` int(11) NOT NULL,
  `商品编号` int(11) NOT NULL,
  `用户编号` int(11) NOT NULL,
  `交易时间` text NOT NULL,
  `交易数量` smallint(6) DEFAULT NULL,
  `交易金额` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `deal`
--

INSERT INTO `deal` (`交易编号`, `商品编号`, `用户编号`, `交易时间`, `交易数量`, `交易金额`) VALUES
(100001, 30001, 111, '20180525080940', 10, 33),
(100002, 30002, 111, '20180526120825', 10, 35),
(100003, 30003, 111, '20180527140526', 10, 15),
(100004, 30004, 111, '20180528110745', 10, 10),
(100005, 30005, 111, '20180528152658', 10, 40),
(100006, 30006, 111, '20180528200124', 20, 30),
(100007, 30002, 112, '20180529203057', 1, 3.5),
(100008, 30001, 114, '20180529221028', 1, 3.3);

-- --------------------------------------------------------

--
-- 資料表結構 `jinhuo`
--

CREATE TABLE `jinhuo` (
  `商品编号` int(11) NOT NULL,
  `进货数量` int(11) DEFAULT NULL,
  `备注` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `jinhuo`
--

INSERT INTO `jinhuo` (`商品编号`, `进货数量`, `备注`) VALUES
(30001, 100, NULL),
(30002, 100, NULL),
(30003, 100, NULL),
(30004, 100, NULL),
(30005, 100, NULL),
(30006, 100, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `商品编号` int(11) NOT NULL,
  `商品名称` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `进价` float DEFAULT NULL,
  `售价` float DEFAULT NULL,
  `计量单位` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `备注` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product`
--

INSERT INTO `product` (`商品编号`, `商品名称`, `进价`, `售价`, `计量单位`, `备注`) VALUES
(30001, '雪碧', 2.3, 3.3, '瓶', NULL),
(30002, '苹果', 2.4, 3.5, '只', NULL),
(30003, '矿泉水', 1.2, 1.5, '瓶', NULL),
(30004, '餐巾纸', 0.4, 1, '包', NULL),
(30005, '火腿肠', 3.2, 4, '根', NULL),
(30006, '棒棒糖', 0.7, 1.5, '根', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `sale`
--

CREATE TABLE `sale` (
  `商品编号` int(11) NOT NULL,
  `销售数量` smallint(6) NOT NULL,
  `利润` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `sale`
--

INSERT INTO `sale` (`商品编号`, `销售数量`, `利润`) VALUES
(30001, 11, 11),
(30002, 11, 12.1),
(30003, 10, 3),
(30004, 10, 6),
(30005, 10, 8),
(30006, 20, 16);

-- --------------------------------------------------------

--
-- 資料表結構 `shop_infor`
--

CREATE TABLE `shop_infor` (
  `商店名` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `商店地址` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `店主` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `营业时间` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `shop_infor`
--

INSERT INTO `shop_infor` (`商店名`, `商店地址`, `店主`, `营业时间`) VALUES
('便利之家', '童卫路15号', '小明', '7：00-23.30');

-- --------------------------------------------------------

--
-- 資料表結構 `storehouse`
--

CREATE TABLE `storehouse` (
  `商品编号` int(11) NOT NULL,
  `库存数量` int(11) DEFAULT NULL,
  `备注` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `storehouse`
--

INSERT INTO `storehouse` (`商品编号`, `库存数量`, `备注`) VALUES
(30001, 89, NULL),
(30002, 89, NULL),
(30003, 90, NULL),
(30004, 90, NULL),
(30005, 90, NULL),
(30006, 80, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `supplier`
--

CREATE TABLE `supplier` (
  `供应商名字` varchar(20) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `供应商地址` varchar(40) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `供应商电话` int(11) NOT NULL,
  `邮箱` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `供应商号` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `supplier`
--

INSERT INTO `supplier` (`供应商名字`, `供应商地址`, `供应商电话`, `邮箱`, `供应商号`) VALUES
('天润', '童卫路100号', 82432532, '163161316@qq.com', 1001),
('沃尔玛', '童卫路101号', 82453215, '769682256@163.com', 1002);

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `name` int(11) NOT NULL,
  `用户名` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` int(11) NOT NULL,
  `用户电话` bigint(20) NOT NULL,
  `注册日期` text,
  `余额` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `users`
--

INSERT INTO `users` (`name`, `用户名`, `password`, `用户电话`, `注册日期`, `余额`) VALUES
(111, '张伟', 123456, 13778787878, '20180520', 837),
(112, '李伟', 123456, 13769696969, '20180512', 996.5),
(113, '陈明', 123456, 18856565587, '20180522', 1000),
(114, '小刚', 123456, 18859956123, '20180529', 996.7);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`number`);

--
-- 資料表索引 `deal`
--
ALTER TABLE `deal`
  ADD PRIMARY KEY (`交易编号`),
  ADD UNIQUE KEY `交易编号` (`交易编号`);

--
-- 資料表索引 `jinhuo`
--
ALTER TABLE `jinhuo`
  ADD PRIMARY KEY (`商品编号`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`商品编号`);

--
-- 資料表索引 `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`商品编号`),
  ADD UNIQUE KEY `money` (`利润`);

--
-- 資料表索引 `shop_infor`
--
ALTER TABLE `shop_infor`
  ADD PRIMARY KEY (`商店名`);

--
-- 資料表索引 `storehouse`
--
ALTER TABLE `storehouse`
  ADD PRIMARY KEY (`商品编号`);

--
-- 資料表索引 `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`供应商名字`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`name`);

--
-- 已匯出資料表的限制(Constraint)
--

--
-- 資料表的 Constraints `jinhuo`
--
ALTER TABLE `jinhuo`
  ADD CONSTRAINT `jinhuo_ibfk_1` FOREIGN KEY (`商品编号`) REFERENCES `product` (`商品编号`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`商品编号`) REFERENCES `product` (`商品编号`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的 Constraints `storehouse`
--
ALTER TABLE `storehouse`
  ADD CONSTRAINT `storehouse_ibfk_1` FOREIGN KEY (`商品编号`) REFERENCES `product` (`商品编号`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
