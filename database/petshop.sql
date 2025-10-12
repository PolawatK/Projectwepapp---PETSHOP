-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2025 at 07:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_fname` varchar(50) DEFAULT NULL,
  `admin_lname` varchar(50) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `admin_phone` varchar(20) DEFAULT NULL,
  `admin_picture` varchar(255) DEFAULT 'default_admin.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_fname`, `admin_lname`, `admin_email`, `admin_phone`, `admin_picture`) VALUES
(1, 'adminpetshop', 'petshopbyfolkmaopunza', 'admin', 'admin', '', NULL, 'default_admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` varchar(5) NOT NULL,
  `category_name` varchar(80) NOT NULL,
  `description` text NOT NULL COMMENT 'รายละเอียดหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `description`) VALUES
('1', 'อาหารสุนัข', ''),
('2', 'อาหารแมว', ''),
('3', 'ทราย/สุขอนามัย', ''),
('4', 'ปลอกคอ/สายจูง', ''),
('5', 'กรงสัตว์', ''),
('6', 'ของเล่นสัตว์เลี้ยง', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` int(11) NOT NULL,
  `cus_username` varchar(50) NOT NULL,
  `cus_password` varchar(255) NOT NULL,
  `cus_fname` varchar(50) NOT NULL,
  `cus_lname` varchar(50) NOT NULL,
  `cus_phone` varchar(20) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_address` varchar(255) NOT NULL,
  `cus_picture` varchar(255) DEFAULT 'default_pic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_username`, `cus_password`, `cus_fname`, `cus_lname`, `cus_phone`, `cus_email`, `cus_address`, `cus_picture`) VALUES
(3, '', '$2y$10$XdqUnv5u01m09yaioSLKK.8FWWfaKEv5LPzGQQknGAHNwmoXJkUFW', 'Polawa', 'Krates', '', 'fuefolkjj1230@gmail.com', '', 'profile_pic10.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(5) NOT NULL,
  `order_date` date NOT NULL,
  `total_price` int(10) NOT NULL,
  `status` varchar(20) NOT NULL COMMENT 'สถานะ(รอยืนยัน, จ่ายแล้ว)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_detial`
--

CREATE TABLE `order_detial` (
  `order_detial_id` varchar(5) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL COMMENT 'ราคาต่อหน่วย'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` varchar(5) NOT NULL,
  `product_name` varchar(80) NOT NULL,
  `category_id` varchar(5) NOT NULL,
  `brand` varchar(80) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock_qty` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL COMMENT 'หน่วย (kg ถุง ชิ้น)',
  `description` text NOT NULL COMMENT 'รายละเอียดสินค้า\r\n',
  `image_url` varchar(255) NOT NULL COMMENT 'เก็บ Path รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `category_id`, `brand`, `price`, `stock_qty`, `unit`, `description`, `image_url`) VALUES
('p001', 'อาหารเม็ดสุนัขโต 10 กก.', '1', 'Pedigree', 850.00, 20, 'ถุง', 'อาหารเม็ดสูตรโปรตีนสูงสำหรับสุนัขโต', 'img/Productimg/1.png'),
('p002', 'อาหารเม็ดลูกสุนัข 5 กก.', '1', 'SmartHeart', 420.00, 15, 'ถุง', 'อาหารเม็ดสูตรพิเศษสำหรับลูกสุนัข', 'img/Productimg/2.png'),
('p003', 'อาหารเม็ดแมวโต 3 กก.', '2', 'Whiskas', 320.00, 25, 'ถุง', 'อาหารเม็ดแมวโตสูตรปลาทะเล', 'img/Productimg/3.png'),
('p004', 'ทรายแมว 10 ลิตร', '3', 'CattyMan', 180.00, 40, 'ถุง', 'ทรายแมวดูดซับกลิ่นดี', 'img/Productimg/4.png'),
('p005', 'ปลอกคอสุนัข ขนาดกลาง', '4', 'PetLover', 150.00, 30, 'ชิ้น', 'ปลอกคอไนล่อน ปรับขนาดได้', 'img/Productimg/5.png'),
('p006', 'สายจูงสุนัข 1.5 ม.', '4', 'PetLover', 190.00, 25, 'ชิ้น', 'สายจูงไนล่อน ทนทาน', 'img/Productimg/6.png'),
('p007', 'กรงนก ขนาดเล็ก', '5', 'HappyBird', 450.00, 10, 'ชิ้น', 'กรงนกเหล็กเคลือบกันสนิม', 'img/Productimg/7.png'),
('p008', 'วิตามินรวมสุนัข', '3', 'NutriPet', 220.00, 18, 'ขวด', 'วิตามินเสริมภูมิคุ้มกันสำหรับสุนัข', 'img/Productimg/8.png'),
('p009', 'แชมพูอาบน้ำแมว', '3', 'PetCare', 160.00, 22, 'ขวด', 'แชมพูสูตรอ่อนโยนสำหรับแมว', 'img/Productimg/9.png'),
('p010', 'ของเล่นสุนัขยางกัด', '6', 'FunPet', 95.00, 35, 'ชิ้น', 'ของเล่นยางกัดสำหรับสุนัขทุกวัย', 'img/Productimg/10.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_username` (`admin_username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`),
  ADD UNIQUE KEY `cus_email` (`cus_email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detial`
--
ALTER TABLE `order_detial`
  ADD PRIMARY KEY (`order_detial_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detial`
--
ALTER TABLE `order_detial`
  ADD CONSTRAINT `order_detial_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
