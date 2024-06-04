-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 12:19 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumakal`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `campus` varchar(20) NOT NULL,
  `course` varchar(50) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_contact` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_cost`, `order_status`, `user_id`, `user_phone`, `campus`, `course`, `user_city`, `user_address`, `order_date`, `user_contact`) VALUES
(1, 15.00, 'delivered', 1, 2147483647, 'BUP', 'BSIT', 'Polangui', 'Barangay Sugcad, Polangui, Albay', '2024-06-01 00:00:00', NULL),
(2, 135.00, 'not paid\r\n', 1, 2147483647, 'BUP', 'BSIT', 'Polangui', 'Barangay Sugcad, Polangui, Albay', '2024-06-02 00:40:33', NULL),
(3, 135.00, 'not paid\r\n', 1, 2147483647, 'BUP', 'BSIT', 'Polangui', 'Barangay Sugcad, Polangui, Albay', '2024-06-02 01:20:05', NULL),
(4, 270.00, 'delivered', 3, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-02 00:00:00', NULL),
(5, 285.00, 'delivered', 3, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-02 00:00:00', NULL),
(6, 270.00, 'not paid', 6, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-02 23:33:31', NULL),
(7, 270.00, 'not paid', 6, 2147483647, 'erwf', 'fgeeq', 'egerg', 'egergeg4tg', '2024-06-03 07:18:04', NULL),
(8, 270.00, 'not paid', 6, 4, '34tq34gt4rg4', '4tgw45gq45g4q5', 'g5gq45gtw45', '5tq45tgq45wtg', '2024-06-03 07:29:42', NULL),
(9, 270.00, 'not paid', 6, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-03 15:51:10', NULL),
(10, 15.00, 'not paid', 6, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-03 17:36:18', NULL),
(11, 15.00, 'not paid', 6, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-03 18:03:50', NULL),
(12, 60.00, 'not paid', 6, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-03 18:13:41', NULL),
(13, 360.00, 'not paid', 9, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-04 14:11:10', NULL),
(14, 360.00, 'not paid', 9, 2147483647, 'BUP', 'BSIT', 'g5gq45gtw45', 'Guilid, Ligao City', '2024-06-04 14:12:56', NULL),
(15, 255.00, 'not paid', 3, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-04 22:34:21', NULL),
(16, 255.00, 'not paid', 3, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-04 22:36:56', NULL),
(17, 135.00, 'not paid', 3, 2147483647, 'BUP', 'BSIT', 'Ligao', 'Guilid, Ligao City', '2024-06-04 22:42:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 2, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 1, '2024-06-02 00:40:33'),
(2, 2, '4', 'BUP Lanyard (2024)', 'BUP_Lanyard.jpg', 120.00, 1, 1, '2024-06-02 00:40:33'),
(3, 3, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 1, '2024-06-02 01:20:05'),
(4, 3, '4', 'BUP Lanyard (2024)', 'BUP_Lanyard.jpg', 120.00, 1, 1, '2024-06-02 01:20:05'),
(5, 4, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 3, '2024-06-02 20:58:31'),
(6, 5, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 3, '2024-06-02 20:58:58'),
(7, 5, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 3, '2024-06-02 20:58:58'),
(8, 6, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 6, '2024-06-02 23:33:31'),
(9, 7, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 6, '2024-06-03 07:18:04'),
(10, 8, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 6, '2024-06-03 07:29:42'),
(11, 9, '2', 'BU Label (Black)', 'BU_Label.jpg', 270.00, 1, 6, '2024-06-03 15:51:10'),
(12, 10, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 6, '2024-06-03 17:36:18'),
(13, 11, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 6, '2024-06-03 18:03:50'),
(14, 12, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 4, 6, '2024-06-03 18:13:41'),
(15, 13, '7', 'BUP Lanyard (2023)', 'BUP_Lanyard2.png', 120.00, 3, 9, '2024-06-04 14:11:10'),
(16, 14, '7', 'BUP Lanyard (2023)', 'BUP_Lanyard2.png', 120.00, 3, 9, '2024-06-04 14:12:56'),
(17, 15, '7', 'BUP Lanyard (2023)', 'BUP_Lanyard2.png', 120.00, 1, 3, '2024-06-04 22:34:21'),
(18, 15, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 3, '2024-06-04 22:34:21'),
(19, 15, '4', 'BUP Lanyard (2024)', 'BUP_Lanyard.jpg', 120.00, 1, 3, '2024-06-04 22:34:21'),
(20, 16, '7', 'BUP Lanyard (2023)', 'BUP_Lanyard2.png', 120.00, 1, 3, '2024-06-04 22:36:56'),
(21, 16, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 3, '2024-06-04 22:36:56'),
(22, 16, '4', 'BUP Lanyard (2024)', 'BUP_Lanyard.jpg', 120.00, 1, 3, '2024-06-04 22:36:56'),
(23, 17, '7', 'BUP Lanyard (2023)', 'BUP_Lanyard2.png', 120.00, 1, 3, '2024-06-04 22:42:09'),
(24, 17, '3', 'BU Stickers', 'BU Stickers.jpg', 15.00, 1, 3, '2024-06-04 22:42:09');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` int(11) NOT NULL,
  `amount` int(50) NOT NULL,
  `reference_number` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `account_name`, `account_number`, `amount`, `reference_number`, `date`) VALUES
(1, '0', 123456789, 0, 2011, '2024-06-04 20:20:54'),
(2, 'CARL', 123456789, 0, 2011, '2024-06-04 20:22:55'),
(3, 'CARL', 123456789, 0, 2011, '2024-06-04 20:31:02'),
(4, 'CARL', 123456789, 0, 2011, '2024-06-04 20:33:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int(2) DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL,
  `campus` varchar(20) NOT NULL,
  `product_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`, `campus`, `product_status`) VALUES
(1, 'BU Label (White)', 'Merch', 'BU Label 2023', 'BU_Label.jpg', 'BU_Label.jpg', 'BU_Label.jpg', 'BU_Label.jpg', 270.00, 0, 'White', 'WEST', ''),
(2, 'BU Label (Black)', 'Merch\r\n', 'BU Label 2023', 'BU_Label.jpg', 'BU_Label.jpg', 'BU_Label.jpg', 'BU_Label.jpg', 270.00, 0, 'Black', 'WEST', ''),
(3, 'BU Stickers', 'Accessories', 'BU Stickers 2023', 'BU Stickers.jpg', 'BU Stickers.jpg', 'BU Stickers.jpg', 'BU Stickers.jpg', 15.00, 0, 'Assorted', 'WEST', ''),
(4, 'BUP Lanyard (2024)', '	\r\nAccessories', 'BUP Lanyard 2024', 'BUP_Lanyard.jpg', 'BUP_Lanyard.jpg', 'BUP_Lanyard.jpg', 'BUP_Lanyard.jpg', 120.00, 0, 'Orange', 'BUP', ''),
(5, 'BU Labels (2024)', 'Merch', 'BU Labels (2024)', 'BU_Label2.jpg', 'BU_Label2.jpg', 'BU_Label2.jpg', 'BU_Label2.jpg', 270.00, 0, 'Maroon', 'WEST', ''),
(6, 'BU Fall Season Shirts (2024)', 'Merch', 'BU Fall Season Shirts (2024)', 'BU_Label3.jpg', 'BU_Label3.jpg', 'BU_Label3.jpg', 'BU_Label3.jpg', 270.00, 0, 'Brown', 'WEST', ''),
(7, 'BUP Lanyard (2023)', '	\r\nAccessories', 'BUP Lanyard 2023', 'BUP_Lanyard2.png', 'BUP_Lanyard2.png', 'BUP_Lanyard2.png', 'BUP_Lanyard2.png', 120.00, 0, 'Orange', 'BUP', ''),
(8, 'BUP CWTS Shirt', 'Merch', 'BUP CWTS Shirt', 'CWTS_Shirt.jpg', 'CWTS_Shirt.jpg', 'CWTS_Shirt.jpg', 'CWTS_Shirt.jpg', 250.00, 0, 'White', 'BUP', ''),
(9, 'BUP LTS Shirt', 'Merch', 'BUP LTS Shirt', 'LTS_Shirt.jpg', 'LTS_Shirt.jpg', 'LTS_Shirt.jpg', 'LTS_Shirt.jpg', 250.00, 0, 'White', 'BUP', ''),
(10, 'BUP ROTC Shirt', 'Merch', 'BUP ROTC Shirt', 'ROTC_Shirt.jpg', 'ROTC_Shirt.jpg', 'ROTC_Shirt.jpg', 'ROTC_Shirt.jpg', 250.00, 0, 'White', 'BUP', ''),
(11, 'BU White Shirt', 'Merch', 'BU White Shirt', 'Shirt1.jpg', 'Shirt1.jpg', 'Shirt1.jpg', 'Shirt1.jpg', 280.00, 0, 'White', 'WEST', ''),
(12, 'BU Tribal Designed Shirt', 'Merch', 'BU Tribal Designed Shirt', 'Shirt2.jpg', 'Shirt2.jpg', 'Shirt2.jpg', 'Shirt2.jpg', 280.00, 0, 'Black', 'WEST', ''),
(13, 'Marketero Shirt (White)', 'Merch', 'Marketero Shirt (White)', 'Shirt3.1.jpg', 'Shirt3.1.jpg', 'Shirt3.1.jpg', 'Shirt3.1.jpg', 270.00, 0, 'White', 'DARAGA', ''),
(14, 'Marketero Shirt (Black)', 'Merch', 'Marketero Shirt (Black)', 'Shirt3.jpg', 'Shirt3.jpg', 'Shirt3.jpg', 'Shirt3.jpg', 270.00, 0, 'Black', 'DARAGA', ''),
(15, 'Animeytor Shirt (Black)', 'Merch', 'Animeytor Shirt (Black)', 'Shirt4.jpg', 'Shirt4.jpg', 'Shirt4.jpg', 'Shirt4.jpg', 280.00, 0, 'Black', 'BUP', ''),
(16, 'Animeytor Shirt (White)', 'Merch', 'Animeytor Shirt (White)', 'Shirt5.jpg', 'Shirt5.jpg', 'Shirt5.jpg', 'Shirt5.jpg', 280.00, 0, 'White', 'BUP', ''),
(17, 'BU Polangui Labels', 'Merch', 'BU Polangui Labels', 'Shirt6.jpg', 'Shirt6.jpg', 'Shirt6.jpg', 'Shirt6.jpg', 230.00, 0, 'White', 'BUP', ''),
(18, 'Season Totebag (White)', 'Accessories', 'Season Totebag (White)', 'Totebag.jpg', 'Totebag.jpg', 'Totebag.jpg', 'Totebag.jpg', 200.00, 0, 'White', 'WEST', ''),
(19, 'Season Totebag (Black)', 'Accessories', 'Season Totebag (Black)', 'Totebag1.jpg', 'Totebag1.jpg', 'Totebag1.jpg', 'Totebag1.jpg', 200.00, 0, 'Black', 'WEST', ''),
(20, 'Marketeros Totebag', 'Accessories', 'Marketeros Totebag', 'Totebag2.jpg', 'Totebag2.jpg', 'Totebag2.jpg', 'Totebag2.jpg', 220.00, 0, 'Black', 'DARAGA', ''),
(21, 'BUP Lanyard (NHSD)', 'Accessories', 'BUP Lanyard (Nursing and Health Studies Department)', 'Lanyard1.jpg', 'Lanyard1.jpg', 'Lanyard1.jpg', 'Lanyard1.jpg', 120.00, 0, 'Green', 'BUP', ''),
(22, 'BUP Lanyard (CSD)', 'Accessories', 'BUP Lanyard (Computer Studies Department)', 'Lanyard2.jpg', 'Lanyard2.jpg', 'Lanyard2.jpg', 'Lanyard2.jpg', 120.00, 0, 'Orange / Green', 'BUP', ''),
(23, 'BUP Lanyard (TEdD)', 'Accessories', 'BUP Lanyard (Teacher Education Department)', 'Lanyard3.jpg', 'Lanyard3.jpg', 'Lanyard3.jpg', 'Lanyard3.jpg', 120.00, 0, 'Blue', 'BUP', ''),
(24, 'BUP Lanyard (TED)', 'Accessories', 'BUP Lanyard (Technology & Entrepreneurship Department)', 'Lanyard4.jpg', 'Lanyard4.jpg', 'Lanyard4.jpg', 'Lanyard4.jpg', 120.00, 0, 'Green', 'BUP', ''),
(25, 'BUP Lanyard (EngD)', 'Accessories', 'BUP Lanyard (Engineering Department)', 'Lanyard5.jpg', 'Lanyard5.jpg', 'Lanyard5.jpg', 'Lanyard5.jpg', 120.00, 0, 'Red', 'BUP', ''),
(26, 'Sociology Lanyard', 'Accessories', 'BUCSSP Sociology Lanyard', 'cssp1.jpg', 'cssp1.jpg', 'cssp1.jpg', 'cssp1.jpg', 120.00, 0, 'Red/White', 'DARAGA', ''),
(27, 'BUCSSP PINS', 'Accessories', 'BUCSSP Trendy Pins', 'cssp2.jpg', 'cssp2.jpg', 'cssp2.jpg', 'cssp2.jpg', 25.00, 0, 'Assorted', 'DARAGA', ''),
(28, 'BUCSSP Phoenix Shirt', 'Merch', 'BUCSSP Phoenix Shirt', 'cssp3.jpg', 'cssp3.jpg', 'cssp3.jpg', 'cssp3.jpg', 250.00, 0, 'White', 'DARAGA', ''),
(29, 'BUCSSP Shirt', 'Merch', 'BUCSSP Shirt', 'cssp4.jpg', 'cssp4.jpg', 'cssp4.jpg', 'cssp4.jpg', 250.00, 0, 'White', 'DARAGA', ''),
(30, 'BUCSSP EST 2005 Shirt', 'Merch', 'BUCSSP EST 2005 Shirt', 'cssp5.jpg', 'cssp5. jpg', 'cssp5.jpg', 'cssp5.jpg', 250.00, 0, 'White', 'DARAGA', ''),
(31, 'Pilosopiya Tote Bag', 'Merch', 'BUCSSPTote Bag', 'cssp7.jpg', 'cssp7. jpg', 'cssp7.jpg', 'cssp7.jpg', 199.00, 0, 'White', 'DARAGA', ''),
(32, 'Junior Financial Executives Shirt', 'Merch', 'Junior Financial Executives Shirt', 'cbem2.jpg', 'cbem2.jpg', 'cbem2.jpg', 'cbem2.jpg', 220.00, 0, 'Black', 'DARAGA', ''),
(33, 'Financial Management Lanyard', 'Accessories', 'CBEM Financial Management Lanyard', 'cbem3.jpg', 'cbem3.jpg', 'cbem3.jpg', 'cbem3.jpg', 140.00, 0, 'Black/Yellow', 'DARAGA', ''),
(34, 'BUCBEM Lanyard', 'Accessories', 'BUCBEM Lanyard', 'cbem6.jpg', 'cbem6.jpg', 'cbem6.jpg', 'cbem6.jpg', 149.00, 0, 'Teal', 'DARAGA', ''),
(35, 'BUCBEM Totebag', 'Accessories', 'BUCBEM Totebag', 'cbem7.jpg', 'cbem7.jpg', 'cbem7.jpg', 'cbem7.jpg', 249.00, 0, 'Black/White', 'DARAGA', ''),
(36, 'BUCIT Lanyard', 'Accessories', 'BUCIT Lanyard', 'cit2.jpg', 'cit2.jpg', 'cit2.jpg', 'cit2.jpg', 120.00, 0, 'Black/Yellow', 'EAST', ''),
(37, 'BUCIT Lanyard 2022', 'Accessories', 'BUCIT Lanyard 2022', 'cit3.jpg', 'cit3.jpg', 'cit3.jpg', 'cit3.jpg', 120.00, 0, 'Yellow', 'EAST', ''),
(38, 'BUCIT Shirt', 'Merch', 'BUCIT Shirt', 'cit5.jpg', 'cit5.jpg', 'cit5.jpg', 'cit5.jpg', 350.00, 0, 'White', 'EAST', ''),
(39, 'BUCIT Marvel Inspired Shirt', 'Merch', 'BUCIT Marvel Inspired Shirt', 'cit6.jpg', 'cit6.jpg', 'cit6.jpg', 'cit6.jpg', 295.00, 0, 'White', 'EAST', ''),
(40, 'BUCIT Shirt', 'Merch', 'BUCIT Shirt', 'cit7.jpg', 'cit7.jpg', 'cit7.jpg', 'cit7.jpg', 270.00, 0, 'White', 'EAST', ''),
(41, 'BUCIT Shirt', 'Merch', 'BUCIT Shirt', 'cit8.jpg', 'cit8.jpg', 'cit8.jpg', 'cit8.jpg', 300.00, 0, 'White', 'EAST', ''),
(42, 'BE YOU CIT Shirt', 'Merch', 'BE YOU CIT Shirt', 'cit9.jpg', 'cit9.jpg', 'cit9.jpg', 'cit9.jpg', 290.00, 0, 'White', 'EAST', ''),
(43, 'Basta CIT Malanit Shirt', 'Merch', 'Basta CIT Malanit Shirt', 'cit10.jpg', 'cit10.jpg', 'cit10.jpg', 'cit10.jpg', 270.00, 0, 'White', 'EAST', ''),
(44, 'BUCIT Lanyard 2024', 'Accessories', 'BUCIT Lanyard 2024', 'cit12.jpg', 'cit12.jpg', 'cit12.jpg', 'cit12.jpg', 120.00, 0, 'Red', 'EAST', ''),
(45, 'BUCENG Shirt', 'Merch', 'BUCENG Shirt', 'east1.png', 'east1.png', 'east1.png', 'east1.png', 250.00, 0, 'Black', 'EAST', ''),
(46, 'BUCENG Shirt', 'Merch', 'BUCENG Shirt', 'east1.png', 'east1.png', 'east1.png', 'east1.png', 250.00, 0, 'White', 'EAST', ''),
(47, 'BUCENG Tote', 'Accessories', 'BUCENG Totebag', 'east3.png', 'east3.png', 'east3.png', 'east3.png', 120.00, 0, 'White', 'EAST', ''),
(48, 'BUCENG Hoodie', 'Merch', 'BUCENG Hoodie', 'east4.png', 'east4.png', 'east4.png', 'east4.png', 350.00, 0, 'White', 'EAST', ''),
(49, 'BUCENG Cap', 'Merch', 'BUCENG Cap', 'east5.png', 'east5.png', 'east5.png', 'east5.png', 200.00, 0, 'White', 'EAST', ''),
(50, 'BU GUBAT Lanyard', 'Accessories', 'BU GUBAT Lanyard', 'gubat1.jpg', 'gubat1.jpg', 'gubat1.jpg', 'gubat1.jpg', 120.00, 0, 'Blue/Orange', 'GUBAT', ''),
(51, 'BU GUBAT Shirt', 'Merch', 'BU GUBAT Shirt', 'gubat2.png', 'gubat2.png', 'gubat3.png', 'gubat3.png', 220.00, 0, 'Black/White', 'GUBAT', ''),
(52, 'BU GUBAT Hoodie', 'Merch', 'BU GUBAT Hoodie', 'gubat4.png', 'gubat4.png', 'gubat4.png', 'gubat4.png', 300.00, 0, 'Black/White', 'GUBAT', ''),
(53, 'BU GUBAT Totebag', 'Accessories', 'BU GUBAT Totebag', 'gubat5.png', 'gubat5.png', 'gubat5.png', 'gubat5.png', 200.00, 0, 'White', 'GUBAT', ''),
(54, 'BU GUBAT Polo Shirt', 'Merch', 'BU GUBAT Polo Shirt', 'gubat6.png', 'gubat6.png', 'gubat7.png', 'gubat7.png', 350.00, 0, 'White', 'GUBAT', ''),
(55, 'BU GUBAT Cap', 'Merch', 'BU GUBAT Cap', 'gubat8.png', 'gubat8.png', 'gubat8.png', 'gubat8.png', 200.00, 0, 'White', 'GUBAT', ''),
(56, 'BUCAF Lanyard', 'Accessories', 'BUCAF Lanyard', 'guino2.jpg', 'guino2.jpg', 'guino2.jpg', 'guino2.jpg', 120.00, 0, 'Green', 'GUINOBATAN', ''),
(57, 'BUCAF Lanyard 2024', 'Accessories', 'BUCAF Lanyard 2024', 'guino3.jpg', 'guino3.jpg', 'guino3.jpg', 'guino3.jpg', 120.00, 0, 'Green', 'GUINOBATAN', ''),
(58, 'BUCAF Lanyard 2023', 'Accessories', 'BUCAF Lanyard 2023', 'guino4.jpg', 'guino4.jpg', 'guino4.jpg', 'guino4.jpg', 120.00, 0, 'Green', 'GUINOBATAN', ''),
(59, 'BUCAF Earth Savers Shirt', 'Merch', 'BUCAF Earth Savers Shirt', 'guino5.jpg', 'guino5.jpg', 'guino5.jpg', 'guino5.jpg', 200.00, 0, 'White', 'GUINOBATAN', ''),
(60, 'BUCAF Shirt', 'Merch', 'BUCAF Minimalists Shirt', 'guino6.jpg', 'guino6.jpg', 'guino6.jpg', 'guino6.jpg', 210.00, 0, 'White', 'GUINOBATAN', ''),
(61, 'BUCAF Earth Savers Shirt 2', 'Merch', 'BUCAF Earth Savers Shirt 2', 'guino8.jpg', 'guino8.jpg', 'guino8.jpg', 'guino8.jpg', 200.00, 0, 'White', 'GUINOBATAN', ''),
(62, 'BUCAF Entry#4 Lanyard', 'Accessories', 'BUCAF Entry#4 Lanyard', 'guino9.jpg', 'guino9.jpg', 'guino9.jpg', 'guino9.jpg', 120.00, 0, 'Green', 'GUINOBATAN', ''),
(63, 'BUG Ready to Grow Shirt', 'Merch', 'BU Guinobatan Ready to Grow Shirt', 'guino11.jpg', 'guino11.jpg', 'guino11.jpg', 'guino11.jpg', 225.00, 0, 'White', 'GUINOBATAN', 'A'),
(64, 'IDEA EcoBag', 'Merch', 'IDEA EcoBag', 'idea1.jpg', 'idea1.jpg', 'idea1.jpg', 'idea1.jpg', 199.00, 0, 'White/Green', 'EAST', ''),
(65, 'Support Green Architecture Pin', 'Accessories', 'Support Green Architecture Pin', 'idea2.jpg', 'idea2.jpg', 'idea2.jpg', 'idea2.jpg', 49.00, 0, 'Green', 'EAST', ''),
(66, 'Build A Greener World Pin', 'Accessories', 'Build A Greener World Pin', 'idea3.jpg', 'idea3.jpg', 'idea3.jpg', 'idea3.jpg', 49.00, 0, 'White/Green', 'EAST', ''),
(67, 'Green Architecture Pin', 'Accessories', 'Green Architecture Pin', 'idea4.jpg', 'idea4.jpg', 'idea4.jpg', 'idea4.jpg', 49.00, 0, 'White/Green', 'EAST', ''),
(68, 'Build A Greener World Tote', 'Accessories', 'Build A Greener World Tote', 'idea5.jpg', 'idea5.jpg', 'idea5.jpg', 'idea5.jpg', 199.00, 0, 'White', 'EAST', ''),
(69, 'Build A Greener World Shirt', 'Accessories', 'Build A Greener World Shirt', 'idea6.jpg', 'idea6.jpg', 'idea6.jpg', 'idea6.jpg', 299.00, 0, 'White', 'EAST', ''),
(70, 'ECOllection Tee', 'Accessories', 'ECOllection Tee', 'idea7.jpg', 'idea7.jpg', 'idea7.jpg', 'idea7.jpg', 299.00, 0, 'Black', 'EAST', ''),
(71, 'BUTC 2024 Lanyard', 'Accessories', 'BUTC 2024 Lanyard', 'tabac1.jpg', 'tabac1.jpg', 'tabac1.jpg', 'tabac1.jpg', 130.00, 0, 'Orange/Blue', 'TABACO', ''),
(72, 'BUTC Fisheries Tees', 'Merch', 'BUTC Fisheries Tees', 'tabac2.jpg', 'tabac2.jpg', 'tabac2.jpg', 'tabac2.jpg', 230.00, 0, 'White/Purlple', 'TABACO', ''),
(76, 'BUTC White Tees', 'Merch', 'BUTC White Tees', 'tabac9.jpg', 'tabac9.jpg', 'tabac9.jpg', 'tabac9.jpg', 200.00, 0, 'White', 'TABACO', ''),
(77, 'BUTC Minimalist Shirt', 'Merch', 'BUTC Minimalist Shirt', 'tabac10.jpg', 'tabac10.jpg', 'tabac10.jpg', 'tabac10.jpg', 200.00, 0, 'White', 'TABACO', ''),
(78, 'BU Tabaco Shirt', 'Merch', 'BU Tabaco Shirt', 'tabac11.jpg', 'tabac11.jpg', 'tabac11.jpg', 'tabac11.jpg', 200.00, 0, 'White', 'TABACO', ''),
(79, 'Bicol University Tabaco Shirt', 'Merch', 'Bicol University Tabaco Shirt', 'tabac13.jpg', 'tabac13.jpg', 'tabac13.jpg', 'tabac13.jpg', 200.00, 0, 'White', 'TABACO', ''),
(80, 'BUCBEM Shirt', 'Merch', 'BUCBEM Shirt', 'cbem5.jpg', 'cbem5.jpg', 'cbem5.jpg', 'cbem5.jpg', 250.00, NULL, 'White', 'DARAGA', 'A'),
(81, 'BU Tabaco Entrep Lanyard 2025', 'Accessories', 'BU Tabaco Entrep Lanyard', 'tabac7.jpg', 'tabac7.jpg', 'tabac7.jpg', 'tabac7.jpg', 130.00, NULL, 'Blue', 'TABACO', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `campus` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_control` text NOT NULL DEFAULT 'C = Client,  A=Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `address`, `gender`, `phone`, `campus`, `username`, `user_password`, `user_control`) VALUES
(1, 'admin', 'admin@bicol-u.edu.ph', 'Polangui, Albay', 'M', 2147483647, 'BUP', 'admin', '8b353d5cc07e13577608711f4602fcb7', 'A'),
(2, 'Carl T', 'carlito@gmail.com', 'Barangay Sugcad, Polangui, Albay', 'F', 2147483647, 'BUP', 'carlito', '8b353d5cc07e13577608711f4602fcb7', 'C'),
(3, 'cjtolarba', 'bucjtolarba@gmail.com', 'guilid,ligaocity', 'M', 2147483647, 'BUP', 'sheesh', '3c07d4b6ac8bc0d4e5c12e9196016332', 'C'),
(5, 'james', 'bujamestolarba@gmail.com', 'Guilid, Ligao City', 'M', 2147483647, 'BUP', 'james', '54fe26d845f70545b686903a3729d2e0', 'C'),
(6, 'mark', 'bumark@gmail.com', 'guilid,ligaocity', 'M', 2147483647, 'BUP', 'marky', '7a65b263cbfe7f99dae18ecaef8173ab', 'C'),
(8, 'heb avi', 'heb@bicol-u.edu.ph', 'Guilid, Ligao City', 'M', 2147483647, 'BUP', 'hebavi', 'd8578edf8458ce06fbc5bb76a58c5ca4', '\'C = Client,  A=Admin\''),
(9, 'ivan', 'ivan@bicol-u.edu.ph', 'Guilid, Ligao City', 'M', 2147483647, 'BUP', 'ivan', '8b353d5cc07e13577608711f4602fcb7', 'C = Client,  A=Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
