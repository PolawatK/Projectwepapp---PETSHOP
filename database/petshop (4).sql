-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2025 at 04:19 PM
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
('10', 'กรรไกรตัดขน/เล็บ', ''),
('11', 'เตียงและเบาะสัตว์เลี้ยง', ''),
('12', 'เสื้อผ้าสัตว์เลี้ยง', ''),
('13', 'อุปกรณ์เดินทาง', ''),
('14', 'อุปกรณ์ให้อาหารและน้ำ', ''),
('15', 'ยาฆ่าเห็บหมัด', ''),
('16', 'วิตามินและยา', ''),
('17', 'ของตกแต่งตู้ปลา', ''),
('2', 'อาหารแมว', ''),
('3', 'ทราย/สุขอนามัย', ''),
('4', 'ปลอกคอ/สายจูง', ''),
('5', 'กรงสัตว์', ''),
('6', 'ผลิตภัณฑ์ดูแลสุขภาพ', ''),
('7', 'ของเล่นสัตว์เลี้ยง', ''),
('8', 'ขนมและอาหารเสริม', ''),
('9', 'อุปกรณ์อาบน้ำ', '');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` varchar(5) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` varchar(5) NOT NULL,
  `customer_id` varchar(5) NOT NULL,
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
  `order_id` varchar(5) NOT NULL,
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
('p008', 'วิตามินรวมสุนัข', '6', 'NutriPet', 220.00, 18, 'ขวด', 'วิตามินเสริมภูมิคุ้มกันสำหรับสุนัข', 'img/Productimg/8.png'),
('p009', 'แชมพูอาบน้ำแมว', '6', 'PetCare', 160.00, 22, 'ขวด', 'แชมพูสูตรอ่อนโยนสำหรับแมว', 'img/Productimg/9.png'),
('p010', 'ของเล่นสุนัขยางกัด', '7', 'FunPet', 95.00, 35, 'ชิ้น', 'ของเล่นยางกัดสำหรับสุนัขทุกวัย', 'img/Productimg/10.png'),
('p011', 'ขนมสุนัขรสไก่ 200 กรัม', '8', 'Jerhigh', 95.00, 50, 'ถุง', 'ขนมสำหรับสุนัขช่วยเสริมโปรตีน', ''),
('p012', 'ขนมแมวครีมเลีย', '8', 'CIAO', 120.00, 40, 'กล่อง', 'ขนมครีมสำหรับแมว ช่วยบำรุงขน', ''),
('p013', 'แชมพูอาบน้ำสุนัข สูตรอ่อนโยน', '9', 'PetCare', 180.00, 25, 'ขวด', 'แชมพูสูตรธรรมชาติ สำหรับผิวบอบบาง', ''),
('p014', 'แปรงขัดขนสุนัข', '9', 'Groomy', 140.00, 30, 'ชิ้น', 'แปรงขัดขนช่วยลดขนร่วง', ''),
('p015', 'กรรไกรตัดเล็บแมว', '10', 'CattyPro', 85.00, 20, 'ชิ้น', 'กรรไกรตัดเล็บแมว ปลอดภัยไม่บาด', ''),
('p016', 'เตียงสุนัขขนาดกลาง', '11', 'PetComfort', 650.00, 10, 'ชิ้น', 'เตียงผ้านุ่มสำหรับสุนัขพันธุ์กลาง', ''),
('p017', 'เสื้อสุนัขลายทาง', '12', 'PetWear', 290.00, 15, 'ชิ้น', 'เสื้อผ้าสำหรับสุนัข ใส่สบาย', ''),
('p018', 'กระเป๋าใส่แมวแบบพกพา', '13', 'CatBag', 450.00, 12, 'ชิ้น', 'กระเป๋าพกพาสำหรับเดินทาง', ''),
('p019', 'ถ้วยให้อาหารแมว', '14', 'HappyPet', 75.00, 40, 'ชิ้น', 'ถ้วยให้อาหารพลาสติกทนทาน', ''),
('p020', 'ยาหยดกำจัดเห็บหมัดสุนัข', '15', 'Frontline', 350.00, 18, 'กล่อง', 'ยาหยดสูตรป้องกันเห็บหมัดยาวนาน 1 เดือน', ''),
('p021', 'ของเล่นเชือกกัดสุนัข', '7', 'FunPet', 120.00, 40, 'ชิ้น', 'เชือกกัดสำหรับสุนัข เสริมสร้างสุขภาพฟัน', ''),
('p022', 'เบาะรองนอนสำหรับแมว', '11', 'PetComfort', 390.00, 25, 'ชิ้น', 'เบาะนุ่มสำหรับแมวพันธุ์เล็กและกลาง', ''),
('p023', 'ชามสแตนเลสใส่อาหาร', '14', 'HappyPet', 150.00, 35, 'ชิ้น', 'ถ้วยสแตนเลสกันลื่น สำหรับใส่อาหารและน้ำ', ''),
('p024', 'ขนมแมวอบแห้ง', '8', 'CIAO', 95.00, 45, 'ถุง', 'ขนมแมวอบแห้ง โปรตีนสูง', ''),
('p025', 'เสื้อยืดสุนัขลายการ์ตูน', '12', 'PetWear', 280.00, 20, 'ชิ้น', 'เสื้อผ้าสำหรับสุนัขผ้าฝ้าย ใส่สบาย', ''),
('p026', 'กรงนกขนาดใหญ่', '5', 'HappyBird', 1250.00, 5, 'ชิ้น', 'กรงเหล็กขนาดใหญ่สำหรับนกเลี้ยง', ''),
('p027', 'สายรัดอกแมว', '4', 'PetLover', 220.00, 18, 'ชิ้น', 'สายรัดอกพร้อมสายจูงแมว', ''),
('p028', 'วิตามินบำรุงขนสุนัข', '16', 'NutriPet', 350.00, 15, 'ขวด', 'วิตามินสูตรบำรุงขนและผิวหนัง', ''),
('p029', 'ทรายแมวพรีเมียม 10 ลิตร', '3', 'CattyMan', 250.00, 40, 'ถุง', 'ทรายแมวเก็บกลิ่นดีมาก', ''),
('p030', 'ครีมกำจัดเห็บหมัด', '15', 'Frontline', 300.00, 12, 'หลอด', 'ครีมป้องกันและกำจัดเห็บหมัดสำหรับสุนัข', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_detial`
--
ALTER TABLE `order_detial`
  ADD PRIMARY KEY (`order_detial_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `order_detial`
--
ALTER TABLE `order_detial`
  ADD CONSTRAINT `order_detial_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
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
