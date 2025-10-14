-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2025 at 05:23 AM
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
(1, 'adminpetshop', '123', 'admin', 'admin', '', NULL, 'default_admin.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cus_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cus_id`, `total_price`) VALUES
(3, 9, 670.00),
(4, 10, 745.00),
(5, 11, 660.00);

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE `cart_item` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` varchar(5) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price_snapshot` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) GENERATED ALWAYS AS (`quantity` * `unit_price_snapshot`) STORED
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `cus_phone` varchar(20) DEFAULT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_address` varchar(255) DEFAULT NULL,
  `cus_picture` varchar(255) DEFAULT 'default_pic.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_id`, `cus_username`, `cus_password`, `cus_fname`, `cus_lname`, `cus_phone`, `cus_email`, `cus_address`, `cus_picture`) VALUES
(9, '', '$2y$10$X3leIbRw0OnlxzsIwuE9wevpWjoj2UkRPA2ZzYd91PLhJjFWA5ZEe', 'Polawat', 'Krates', '', 'fuefolkjj1230@gmail.com', '', 'default_pic.png'),
(10, '', '$2y$10$OAJTK3.SuxuvsZw1zIJ0h.aWpoTZTXGFJJH8f37XHSLQYQlCtrqfe', 'mao', 'jertung', '', 'mao@gmail.com', '', 'maoza.jpg'),
(11, '', '$2y$10$q3cqgXzJAP9NpBsMRgaM/OhgtAzGv3P9.ocR25Xtinpc2TxzJ0PUa', 'pun', 'za', '', 'pun@gmail.com', 'Ayutthaya', 'punza.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cus_id`, `order_date`, `total_price`) VALUES
(1, 9, '2025-10-13', 190.00),
(2, 9, '2025-10-13', 670.00),
(3, 10, '2025-10-13', 745.00),
(4, 11, '2025-10-13', 660.00);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `product_id` varchar(5) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `product_id`, `order_id`, `quantity`, `unit_price`, `subtotal`) VALUES
(1, 'p006 ', 1, 1, 190.00, 190.00),
(2, 'p028 ', 2, 1, 350.00, 350.00),
(3, 'p003 ', 2, 1, 320.00, 320.00),
(4, 'p010 ', 3, 1, 95.00, 95.00),
(5, 'p011 ', 3, 1, 650.00, 650.00),
(6, 'p004 ', 4, 1, 180.00, 180.00),
(7, 'p009 ', 4, 1, 160.00, 160.00),
(8, 'p016 ', 4, 1, 200.00, 200.00),
(9, 'p020 ', 4, 1, 120.00, 120.00);

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
('p001', 'อาหารเม็ดสุนัขโต 10 กก.', '1', 'Pedigree', 850.00, 20, 'ถุง', 'อาหารเม็ดสูตรโปรตีนสูงสำหรับสุนัขโต', '1.png'),
('p002', 'อาหารเม็ดลูกสุนัข 5 กก.', '2', 'SmartHeart', 420.00, 15, 'ถุง', 'อาหารเม็ดสูตรพิเศษสำหรับลูกสุนัข', '2.png'),
('p003', 'อาหารเม็ดแมวโต 3 กก.', '2', 'Whiskas', 320.00, 25, 'ถุง', 'อาหารเม็ดแมวโตสูตรปลาทะเล', '3.png'),
('p004', 'ทรายแมว 10 ลิตร', '3', 'CattyMan', 180.00, 40, 'ถุง', 'ทรายแมวดูดซับกลิ่นดี', '4.png'),
('p005', 'ปลอกคอสุนัข ขนาดกลาง', '4', 'PetLover', 150.00, 30, 'ชิ้น', 'ปลอกคอไนล่อน ปรับขนาดได้', '5.png'),
('p006', 'สายจูงสุนัข 1.5 ม.', '4', 'PetLover', 190.00, 25, 'ชิ้น', 'สายจูงไนล่อน ทนทาน', '6.png'),
('p007', 'กระเป๋าใส่สัตว์เลี้ยงสะพายหลัง', '5', 'PetGo', 690.00, 12, 'ใบ', 'กระเป๋าแบบโปร่ง ระบายอากาศดี เหมาะกับสุนัขและแมว', '7.png'),
('p008', 'วิตามินรวมสุนัข', '3', 'NutriPet', 220.00, 18, 'ขวด', 'วิตามินเสริมภูมิคุ้มกันสำหรับสุนัข', '8.png'),
('p009', 'แชมพูอาบน้ำแมว', '3', 'PetCare', 160.00, 22, 'ขวด', 'แชมพูสูตรอ่อนโยนสำหรับแมว', '9.png'),
('p010', 'ของเล่นสุนัขยางกัด', '6', 'FunPet', 95.00, 35, 'ชิ้น', 'ของเล่นยางกัดสำหรับสุนัขทุกวัย', '10.png'),
('p011', 'อาหารเม็ดสุนัขโต สูตรบำรุงขน', '1', 'DogPlus', 650.00, 18, 'ถุง', 'สูตรบำรุงขนเงางามและผิวสุขภาพดี', '11.png'),
('p012', 'อาหารเปียกสุนัข รสตับ', '1', 'PetYum', 280.00, 30, 'กระป๋อง', 'อาหารเปียกสำหรับสุนัขโตและลูกสุนัข', '12.png'),
('p013', 'อาหารเปียกแมว รสปลาโอ', '2', 'MeowMix', 250.00, 25, 'กระป๋อง', 'อาหารเปียกแมวโปรตีนสูง', '13.png'),
('p014', 'อาหารเม็ดแมว สูตรบำรุงขน', '2', 'CatKing', 350.00, 20, 'ถุง', 'ช่วยให้ขนเงางามและผิวแข็งแรง', '14.png'),
('p015', 'วิตามินสุนัข สูตรเพิ่มภูมิคุ้มกัน', '3', 'PetHealth', 180.00, 15, 'ขวด', 'วิตามินรวมบำรุงร่างกายและภูมิคุ้มกัน', '15.png'),
('p016', 'ยาสระแชมพูแมว สูตรสมุนไพร', '3', 'CatCare', 200.00, 18, 'ขวด', 'ลดกลิ่นและป้องกันเชื้อรา', '16.png'),
('p017', 'สายจูงสุนัขแบบสะท้อนแสง', '4', 'DogWalk', 280.00, 12, 'ชิ้น', 'ช่วยให้เดินกลางคืนปลอดภัย', '17.png'),
('p018', 'ปลอกคอแมว ลายการ์ตูน', '4', 'CutePet', 150.00, 20, 'ชิ้น', 'ปลอกคอแมวปรับขนาดได้', '18.png'),
('p019', 'กระเป๋าใส่สัตว์เลี้ยง ล้อลาก', '5', 'TravelPet', 1290.00, 8, 'ใบ', 'กระเป๋าเดินทางสำหรับสัตว์เลี้ยง พร้อมล้อลากและช่องระบายอากาศ', '19.png'),
('p020', 'ของเล่นแมวแบบบอลกลิ้ง', '6', 'PlayFun', 120.00, 30, 'ชิ้น', 'บอลกลิ้งพร้อมเสียงกระดิ่ง กระตุ้นการเคลื่อนไหว', '20.png'),
('p021', 'อาหารเม็ดสุนัขเล็ก สูตรเนื้อไก่', '1', 'PawPaw', 480.00, 25, 'ถุง', 'สูตรพิเศษสำหรับสุนัขพันธุ์เล็ก ย่อยง่าย', '21.png'),
('p022', 'อาหารเม็ดสูตรลดน้ำหนัก', '1', 'DogFit', 520.00, 20, 'ถุง', 'ควบคุมน้ำหนักและบำรุงข้อต่อ', '22.png'),
('p023', 'อาหารเม็ดแมว สูตรลดกลิ่น', '2', 'CatSmart', 310.00, 30, 'ถุง', 'ช่วยลดกลิ่นในกระบะทราย', '23.png'),
('p024', 'อาหารเม็ดแมว สูตรบำรุงไต', '2', 'PetCare', 390.00, 18, 'ถุง', 'ช่วยบำรุงระบบขับถ่ายและไต', '24.png'),
('p025', 'ผ้าเช็ดตัวสัตว์เลี้ยง แบบซับน้ำดี', '3', 'CleanPet', 95.00, 40, 'ผืน', 'ซับน้ำเร็ว เหมาะสำหรับอาบน้ำสัตว์', '25.png'),
('p026', 'ทรายแมว กลิ่นลาเวนเดอร์', '3', 'SoftCat', 150.00, 28, 'ถุง', 'ดูดกลิ่นดี ไม่ฟุ้งกระจาย', '26.png'),
('p027', 'สายจูงไนล่อนสำหรับสุนัข', '4', 'DogLine', 210.00, 15, 'ชิ้น', 'แข็งแรงและทนทาน', '27.png'),
('p028', 'ปลอกคอหนังแท้สำหรับสุนัข', '4', 'ClassicDog', 350.00, 10, 'ชิ้น', 'ดูดีหรูหรา ปลอดภัย', '28.png'),
('p029', 'กระเป๋าใส่แมว พับเก็บได้', '5', 'SoftBag', 850.00, 10, 'ใบ', 'กระเป๋าแบบผ้า พับเก็บได้ น้ำหนักเบา พกพาสะดวก', '29.png'),
('p030', 'ของเล่นสุนัขแบบเชือกกัด', '6', 'FunPet', 85.00, 32, 'ชิ้น', 'ช่วยให้สุนัขออกแรงและลดความเครียด', '30.png');

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
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

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
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`cus_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`),
  ADD KEY `order_id` (`order_id`),
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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`);

--
-- Constraints for table `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`),
  ADD CONSTRAINT `cart_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`cus_id`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
