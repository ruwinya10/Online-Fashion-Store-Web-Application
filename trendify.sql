-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2024 at 08:14 AM
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
-- Database: `trendify`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Admin_ID`, `First_name`, `Last_name`, `Username`, `Email`, `Password`) VALUES
(1, 'Manesha', 'Dahanayake', 'admin1', 'maneshadahanayake03@gmail.com', 'admin1'),
(3, 'Uththara', 'Jayasundara', 'admin3', 'uththarajayasundara85@gmail.com', 'admin3'),
(5, 'Kavya', 'Kahandawala', 'admin5', 'kavyakahandawala0611@gmail.com', 'admin5');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `size` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` float NOT NULL,
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `User_ID`, `product_id`, `product_name`, `product_image`, `size`, `quantity`, `unit_price`, `total_price`) VALUES
(4, 3, 2, 'Women Casual Mini Crop Top', 'src/images/women_5.jpg', 'S', 1, 10, 10),
(12, 10, 18, 'Women Casual Mini Sleeve Frock', 'women_13.jpeg', 'XL', 1, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `methodId` int(11) NOT NULL,
  `cardHolder` varchar(50) NOT NULL,
  `cardNo` varchar(12) NOT NULL,
  `expMonth` varchar(20) NOT NULL,
  `cvv` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` float NOT NULL,
  `product_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_image`, `product_price`, `product_type`) VALUES
(17, 'Women Casual Mini Crop Top', 'women_5.jpg', 10, 'Women'),
(18, 'Women Casual Mini Sleeve Frock', 'women_13.jpeg', 12, 'Women'),
(19, 'Women Casual Blouse', 'women_3.jpeg', 11, 'Women'),
(20, 'Women High-Neck T-Shirt', 'women_11.jpg', 7.99, 'Women'),
(21, 'Women Casual Sleeve Crop Top', 'women_12.jpeg', 10.99, 'Women'),
(23, 'Women Printed Sleeve Crop Top', 'women_1.jpeg', 8, 'Women'),
(24, 'Men Long Sleeve Casual Shirt', 'men_1.jpeg', 15, 'Men'),
(25, 'Men Short Sleeve Casual Shirt', 'men_2.jpeg', 13, 'New Arrivals'),
(26, 'Boy casual Jacket', 'Bkid_2.jpeg', 6.99, 'Kids'),
(27, 'Boy Casual T-shirt', 'Bkid_3.jpeg', 12, 'Kids'),
(29, 'Men Short Sleeve Casual Shirt', 'men_10.jpeg', 15, 'Men'),
(30, 'Women Frill Sleeve Wrap Mini Frock', 'women_93.jpeg', 14.9, 'Women'),
(31, 'Women Long Sleeve Short Frock', 'women_7.jpg', 17, 'Women'),
(34, 'Men Short Sleeve print Shirt', 'men_15.jpeg', 12, 'Men'),
(35, 'Men Short Sleeve Black Shirt', 'men_7.jpeg', 10, 'Men'),
(36, 'Boy Short sleeve Casual T-shirt', 'Bkid_1.jpeg', 19, 'Kids'),
(37, 'Boy Short sleeve Casual new T-shirt', 'Bkid_6.jpeg', 24, 'New Arrivals'),
(39, 'Boy Long sleeve white jacket', 'Bkid_5.jpeg', 25, 'Kids'),
(40, 'Girl mini frock', 'Gkid_4.jpeg', 19, 'Kids'),
(41, 'Girl print frock', 'Gkid_5.jpeg', 16, 'Kids'),
(42, 'Girl short sleeve T-shirt', 'Gkid_2.jpeg', 9, 'Kids'),
(43, 'Women New Mini Crop Top', 'women_6.jpg', 18, 'New Arrivals'),
(44, 'Women New long sleeve frock', 'women_4.jpeg', 21, 'New Arrivals'),
(45, 'Men Short Sleeve Blue Shirt', 'men_3.jpeg', 36, 'Men'),
(46, 'Men Short Sleeve Flower Print Shirt', 'men_13.jpeg', 42, 'New Arrivals'),
(47, 'Girl casual top', 'Gkid_6.jpeg', 14, 'Kids'),
(48, 'Men Long Sleeve Black Shirt', 'men_11.jpeg', 46, 'New Arrivals'),
(49, 'Women Sleeveless crop top', 'women_15.jpeg', 18, 'New Arrivals'),
(50, 'Men Long Sleeve Check print Shirt', 'men_4.jpeg', 39, 'Men'),
(51, 'Girl plain mini frock', 'Gkid_3.jpeg', 27, 'New Arrivals'),
(53, 'Men Long Sleeve White Shirt', 'men_12.jpeg', 26, 'Men'),
(54, 'Men Long Sleeve Dark Colour Shirt', 'men_6.jpeg', 39, 'Men');

-- --------------------------------------------------------

--
-- Table structure for table `registered_user`
--

CREATE TABLE `registered_user` (
  `User_ID` int(11) NOT NULL,
  `First_name` varchar(20) NOT NULL,
  `Last_name` varchar(20) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_user`
--

INSERT INTO `registered_user` (`User_ID`, `First_name`, `Last_name`, `Username`, `Email`, `Password`) VALUES
(10, 'shamila', 'kumari', 'shammi12', 'shamilakumari@gmail.com', 'shammi21'),
(13, 'Natasha', 'Thathsarani', 'natasha03', 'natashadesilva@gmail.com', 'natash'),
(22, 'Amila', 'Perera', 'amila99', 'amilaperera@gmail.com', 'amila00'),
(23, 'Saduni', 'Perera', 'sadu90', 'saduniperera@gmail.com', 'sadu12'),
(24, 'Sarah', 'William', 'sarah89', 'sarahwilliams@gmail.com', 'sarah1234');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shippingId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_id` int(10) NOT NULL,
  `Contact_person` varchar(100) NOT NULL,
  `Company_name` varchar(100) NOT NULL,
  `Contact` varchar(15) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Product_id` varchar(20) NOT NULL,
  `Product_name` varchar(255) NOT NULL,
  `Contract_start_date` varchar(20) NOT NULL,
  `Contract_end_date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_id`, `Contact_person`, `Company_name`, `Contact`, `Email`, `Product_id`, `Product_name`, `Contract_start_date`, `Contract_end_date`) VALUES
(1, 'Manager', 'ClothCo', '0718565141', 'ClothCo78@gmail.com', 'men_4', 'Men Long Sleeve Printed Casual Shirt', '2024-02-11', '2025-02-11'),
(2, 'Manager', 'FabSub', '0776396451', 'FabSub89@gmail.com', 'men_1', 'Men Long Sleeve Casual Shirt', '2024-01-01', '2025-01-01'),
(3, 'Assistant manager', 'TextLink', '0712563985', 'TextLink09@gmail.com', 'Gkid_4', 'Girl Printed Short Frock', '2024-03-10', '2025-03-10'),
(4, 'Manager', 'ThreadX', '0713245666', 'ThreadX01@gmail.com', 'women_7', 'Women Long Sleeve Short Frock', '2024-04-15', '2025-04-15'),
(5, 'Manager', 'FitFab', '0761124563', 'FitFab12@gmail.com', 'women_13', 'Women Casual Mini Sleeve Frock', '2024-05-01', '2025-05-01'),
(6, 'Manager', 'Loomix', '0758969878', 'Loomix65@gmail.com', 'men_6', 'Men Long Sleeve Printed Casual Shirt', '2024-06-30', '2025-06-30'),
(7, 'Manager', 'StyleFab', '0743696555', 'StyleFabl00@gmail.com', 'Bkid_3', 'Boy Casual T-shirt', '2024-07-05', '2025-07-05'),
(8, 'Manager', 'ClothEase', '0714488575', 'ClothEase98@gmail.com', 'Gkid_6', 'Girl Blouse', '2024-08-18', '2025-08-18'),
(9, 'Assistant manager', 'FabFlex', '0789545023', 'FabFlex16@gmail.com', 'Bkid_1', 'Boy Casual T-shirt', '2024-09-26', '2025-09-26'),
(10, 'Assistant manager', 'DressGo', '0741245789', 'DressGo00@gmail.com', 'men_8', 'Men Long Sleeve Casual Shirt', '2024-07-15', '2025-07-15'),
(11, 'Manager', 'StitchCo', '0777654345', 'StitchCo95@gmail.com', 'women_6', 'Women Casual Flower Crop Top', '2024-08-30', '2025-08-30'),
(12, 'Manager', 'ThreadUp', '0740987651', 'ThreadUp60@gmail.com', 'Gkid_2', 'Girl Short Sleeve Blouse', '2024-07-25', '2025-07-25'),
(13, 'Manager', 'Apparelix', '0710912666', 'Apparelix91@gmail.com', 'Gkid_1', 'Girl Short Printed Frock', '2024-02-12', '2025-02-12'),
(14, 'Manager', 'FabTrend', '0788765292', 'FabTrend56@gmail.com', 'Bkid_6', 'Boy Casual T-shirt', '2024-04-22', '2025-04-22'),
(15, 'Assistant manager', 'ClothTap', '0771234978', 'ClothTap04@gmail.com', 'women_1', 'Women Flower Crop Top', '2024-05-03', '2025-05-03'),
(16, 'Manager', 'Wearix', '0717887767', 'Wearix98@gmail.com', 'Gkid_1', 'Girl Short Printed Frock', '2024-08-18', '2025-08-18'),
(17, 'Manager', 'GarbX', '0785452569', 'GarbX16@gmail.com', 'women_93', 'Women Frill Sleeve Wrap Mini Frock', '2024-09-27', '2025-09-27'),
(18, 'Assistant manager', 'TexMart', '0771010323', 'TexMart34@gmail.com', 'men_2', 'Men Short Sleeve Casual Shirt', '2024-10-13', '2025-10-13'),
(19, 'Manager', 'FabFlow', '0715489767', 'FabFlow01@gmail.com', 'men_10', 'Men Short Sleeve Casual Shirt', '2024-04-24', '2025-04-24'),
(20, 'Manager', 'ClothZone', '0766632142', 'ClothZone12@gmail.com', 'women_12', 'Women Casual Sleeve Crop Top', '2024-05-11', '2025-05-11'),
(21, 'Manager', 'StyleNet', '0773214985', 'StyleNet65@gmail.com', 'women_3', 'Women Casual Blouse', '2024-06-30', '2025-06-30'),
(22, 'Assistant Manager', 'WearSup', '0769987474', 'FabFlex20@gmail.com', 'men_7', 'Men Short Sleeve Black Shirt', '2024-11-10', '2025-11-10'),
(23, 'Manager', 'Wovex', '0783210505', 'Wovex11@gmail.com', 'Bkid_2', 'Boy casual Jacket', '2024-12-17', '2025-12-17'),
(24, 'Manager', 'Yarnex', '0714390515', 'Yarnex19@gmail.com', 'women_11', 'Women High-Neck T-Shirt', '2024-01-15', '2027-01-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`methodId`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registered_user`
--
ALTER TABLE `registered_user`
  ADD PRIMARY KEY (`User_ID`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingId`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `methodId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `registered_user`
--
ALTER TABLE `registered_user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
