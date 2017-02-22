-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 22, 2017 at 04:14 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saladmood`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_fullname` varchar(100) NOT NULL,
  `order_address` varchar(300) NOT NULL,
  `order_phone` int(10) NOT NULL,
  `order_more` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `order_fullname`, `order_address`, `order_phone`, `order_more`) VALUES
(1, '2017-02-21 23:54:30', '', '', 0, ''),
(2, '2017-02-22 00:05:04', 'วราศักดิ์ อาจแสน', 'ม.ศิลปากร', 838987141, 'ขอน้ำสลัดเยอะๆ ครับ'),
(3, '2017-02-22 21:30:40', 'สุกพิชญ์ ศิลปประยูร', 'ม.ศิลปากร', 944824226, '-');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(4) NOT NULL,
  `order_detail_quantity` int(4) NOT NULL,
  `order_detail_price` int(4) NOT NULL,
  `product_id` int(4) NOT NULL,
  `order_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`) VALUES
(1, 1, 0, 2, 1),
(2, 3, 0, 12, 1),
(3, 1, 0, 6, 2),
(4, 3, 0, 12, 2),
(5, 2, 0, 2, 3),
(6, 3, 0, 48, 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(4) NOT NULL,
  `image` varchar(100) NOT NULL,
  `detail` varchar(200) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `detail`, `type`) VALUES
(1, 'สลัดผัก', 55, '01.jpg', 'สลัดผัก', 0),
(2, 'สลัดผลไม้', 55, '02.jpg', 'สลัดผลไม้', 0),
(3, 'เซตปิ้งย่างญี่ปุ่น', 120, '03.jpg', 'เซตปิ้งย่างญี่ปุ่น', 0),
(4, 'สลัดถั่ว', 55, '04.jpg', 'สลัดถั่ว', 0),
(5, 'สลัดธัญพืช', 55, '05.jpg', 'สลัดธัญพืช', 0),
(6, 'แซลมอนย่าง', 105, '06.jpg', 'แซลมอนย่าง', 0),
(7, 'เบคอน', 35, '07.jpg', 'เบคอน', 0),
(8, 'ซีซ่าสลัด', 90, '08.jpg', 'ซีซ่าสลัด', 0),
(9, 'น้ำส้มคั้น', 75, '09.jpg', 'น้ำส้มคั้น', 1),
(10, 'น้ำแอปเปิ้ล', 65, '10.jpg', 'น้ำแอปเปิ้ล', 1),
(11, 'โยเกิร์ตน้ำผึ้งปั่น', 80, '11.jpg', 'โยเกิร์ตน้ำผึ้งปั่น', 1),
(12, 'ฟักทองญี่ปุ่นย่าง', 35, '12.jpg', 'ฟักทองญี่ปุ่นย่าง', 0),
(13, 'ขนมปังกรอบ', 10, '13.jpg', 'ขนมปังกรอบ', 0),
(14, 'เมล็ดฟักทอง', 10, '14.jpg', 'เมล็ดฟักทอง', 0),
(15, 'เมล็ดทานตะวัน', 10, '15.jpg', 'เมล็ดทานตะวัน', 0),
(16, 'อัลมอนด์', 10, '16.jpg', 'อัลมอนด์', 0),
(17, 'เมล็ดมะม่วงหิมพานต์', 10, '17.jpg', 'เมล็ดมะม่วงหิมพานต์', 0),
(18, 'ลูกเกด', 10, '18.jpg', 'ลูกเกด', 0),
(19, 'ข้าวเปล่า', 15, '19.jpg', 'ข้าวเปล่า', 0),
(20, 'ไข่ต้ม', 15, '20.jpg', 'ไข่ต้ม', 0),
(21, 'ไข่ขาว', 15, '21.jpg', 'ไข่ขาว', 0),
(22, 'ทูน่า', 25, '22.jpg', 'ทูน่า', 0),
(23, 'ปูอัด', 25, '23.jpg', 'ปูอัด', 0),
(24, 'ไข่กุ้ง', 25, '24.jpg', 'ไข่กุ้ง', 0),
(25, 'อกไก่อบ', 25, '25.jpg', 'อกไก่อบ', 0),
(26, 'ไก่คาราเกะ', 25, '26.jpg', 'ไก่คาราเกะ', 0),
(27, 'เห็ดย่าง', 25, '27.jpg', 'เห็ดย่าง', 0),
(28, 'ไส้กรอก', 25, '28.jpg', 'ไส้กรอก', 0),
(29, 'น้ำสลัด', 20, '29.jpg', 'น้ำสลัด', 0),
(30, 'ข้าวหน้าไก่คาราเกะ', 65, '30.jpg', 'ข้าวหน้าไก่คาราเกะ', 0),
(31, 'ข้าวหน้าอกไก่อบ', 65, '31.jpg', 'ข้าวหน้าอกไก่อบ', 0),
(32, 'ข้าวหน้าไก่มิกซ์', 65, '32.jpg', 'ข้าวหน้าไก่มิกซ์', 0),
(33, 'น้ำผลไม้สูตรดีท็อก', 65, '33.jpg', 'น้ำผลไม้สูตรดีท็อก', 1),
(34, 'น้ำผลไม้สูตรผิวสวย', 65, '34.jpg', 'น้ำผลไม้สูตรผิวสวย', 1),
(35, 'ข้าวแซลมอนเทอริยากิ', 135, '35.jpg', 'ข้าวแซลมอนเทอริยากิ', 0),
(36, 'น้ำผลไม้สูตรวิตามินเอ', 65, '36.jpg', 'น้ำผลไม้สูตรวิตามินเอ', 1),
(37, 'น้ำผลไม้สูตรวิตามินบี', 65, '37.jpg', 'น้ำผลไม้สูตรวิตามินบี', 1),
(38, 'น้ำผลไม้สูตรวิตามินซี', 65, '38.jpg', 'น้ำผลไม้สูตรวิตามินซี', 1),
(39, 'น้ำส้มและเสาวรส', 75, '39.jpg', 'น้ำส้มและเสาวรส', 1),
(40, 'น้ำส้มและมะนาว', 75, '40.jpg', 'น้ำส้มและมะนาว', 1),
(41, 'น้ำฝรั่ง', 65, '41.jpg', 'น้ำฝรั่ง', 1),
(42, 'น้ำมะเขือเทศ', 65, '42.jpg', 'น้ำมะเขือเทศ', 1),
(43, 'ชาเขียวมัทฉะ', 65, '43.jpg', 'ชาเขียวมัทฉะ', 1),
(44, 'โกโก้ปั่น', 65, '44.jpg', 'โกโก้ปั่น', 1),
(45, 'นมกล้วยปั่น', 65, '45.jpg', 'นมกล้วยปั่น', 1),
(46, 'นมอัลมอนด์ปั่น', 65, '46.jpg', 'นมอัลมอนด์ปั่น', 1),
(47, 'มิกซ์เบอร์รี่โยเกิร์ต', 65, '47.jpg', 'มิกซ์เบอร์รี่โยเกิร์ต', 1),
(48, 'สตอเบอร์รี่สมูทตี้', 65, '48.jpg', 'สตอเบอร์รี่สมูทตี้', 1),
(49, 'กีวี่โยเกิร์ตสมูทตี้', 65, '49.jpg', 'กีวี่โยเกิร์ตสมูทตี้', 1),
(50, 'น้ำผึ้งมะนาวสมูทตี้', 75, '50.jpg', 'น้ำผึ้งมะนาวสมูทตี้', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
