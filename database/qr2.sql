-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2024 at 05:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qr2`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE `city_master` (
  `city_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `state_id`, `city`) VALUES
(1, 1, 'Ahmedabad');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_address_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_address_id`, `state_id`, `city_id`, `address`) VALUES
(1, 1, 1, 'Pragati Computers');

-- --------------------------------------------------------

--
-- Table structure for table `main_user`
--

CREATE TABLE `main_user` (
  `mu_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user`
--

INSERT INTO `main_user` (`mu_id`, `email`, `passw`) VALUES
(0, 'null', '0'),
(1, 'devladhani28@gmail.com', '990941dev'),
(2, 'malhotrapraham@gmail.com', '54f067d49e26fae7dbaa01640d3c4b95'),
(3, 'praham@gmail.com', '54f067d49e26fae7dbaa01640d3c4b95'),
(4, 'malhotra@gmail.com', '54f067d49e26fae7dbaa01640d3c4b95'),
(5, 'fakedevendra28@gmail.com', 'dev@1234');

-- --------------------------------------------------------

--
-- Table structure for table `main_user_address`
--

CREATE TABLE `main_user_address` (
  `main_user_address_id` int(11) NOT NULL,
  `mu_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `add_line1` varchar(1000) NOT NULL,
  `add_line2` varchar(1000) DEFAULT NULL,
  `pincode` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user_address`
--

INSERT INTO `main_user_address` (`main_user_address_id`, `mu_id`, `city_id`, `add_line1`, `add_line2`, `pincode`) VALUES
(1, 1, 1, 'Pragati Computers', '', '382340'),
(8, 1, 1, '58,Neelkanth Vihar Socuiety', '', '382340'),
(9, 1, 0, 'Pragati Computers, Sardarnagar', '', '382340'),
(10, 4, 1, '58,neelkanth vihar, maya cinema rd, kubernagar', '', '382428'),
(11, 4, 1, '58,neelkanth vihar, maya cinema rd, kubernagar', '', '382428'),
(12, 4, 1, '58,Neelkanth Vihar Socuiety', '', '382340'),
(14, 5, 1, '58,Neelkanth Vihar Socuiety', '', '382340');

-- --------------------------------------------------------

--
-- Table structure for table `main_user_dob`
--

CREATE TABLE `main_user_dob` (
  `main_user_dob_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL,
  `dob` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user_dob`
--

INSERT INTO `main_user_dob` (`main_user_dob_id`, `mu_id`, `dob`) VALUES
(1, 1, '2003-04-28 00:00:00'),
(2, 5, '2023-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `main_user_gender`
--

CREATE TABLE `main_user_gender` (
  `main_user_gender_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user_gender`
--

INSERT INTO `main_user_gender` (`main_user_gender_id`, `mu_id`, `gender`) VALUES
(1, 0, 'f');

-- --------------------------------------------------------

--
-- Table structure for table `main_user_mob`
--

CREATE TABLE `main_user_mob` (
  `main_user_mob_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL,
  `mob` varchar(11) DEFAULT NULL,
  `emob` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user_mob`
--

INSERT INTO `main_user_mob` (`main_user_mob_id`, `mu_id`, `mob`, `emob`) VALUES
(1, 1, '9898617603', NULL),
(2, 0, '9909410498', '9909410498'),
(3, 5, '9909410498', '9898617603');

-- --------------------------------------------------------

--
-- Table structure for table `main_user_name`
--

CREATE TABLE `main_user_name` (
  `main_user_name_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL,
  `main_first` varchar(100) DEFAULT NULL,
  `main_last` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `main_user_name`
--

INSERT INTO `main_user_name` (`main_user_name_id`, `mu_id`, `main_first`, `main_last`) VALUES
(1, 1, 'Pratham', 'Malhotra');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `order_address_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `shipping_address_id` int(11) DEFAULT NULL,
  `customer_address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`order_address_id`, `order_id`, `shipping_address_id`, `customer_address_id`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE `order_master` (
  `order_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `mu_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_payment`
--

CREATE TABLE `order_payment` (
  `order_payment_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `payment_type_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_payment`
--

INSERT INTO `order_payment` (`order_payment_id`, `order_id`, `payment_type_id`, `amount`, `payment_date`) VALUES
(1, 1, 1, 30, '2023-09-13 17:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`order_product_id`, `order_id`, `product_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_quantity`
--

CREATE TABLE `order_quantity` (
  `order_quantity_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_quantity`
--

INSERT INTO `order_quantity` (`order_quantity_id`, `order_id`, `quantity`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `order_status_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`order_status_id`, `order_id`, `status`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pause_play_qr`
--

CREATE TABLE `pause_play_qr` (
  `pause_play_qr_id` int(11) NOT NULL,
  `qr_reg_id` int(11) DEFAULT NULL,
  `pause` int(11) DEFAULT NULL,
  `play` int(11) DEFAULT NULL,
  `change_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pause_play_qr`
--

INSERT INTO `pause_play_qr` (`pause_play_qr_id`, `qr_reg_id`, `pause`, `play`, `change_at`) VALUES
(1, 3, 1, 0, '2023-09-13 08:48:28'),
(2, 3, 0, 1, '2023-09-13 08:49:14'),
(4, 3, 0, 1, '2023-09-13 09:55:21'),
(5, 3, 0, 1, '2023-09-13 09:55:24'),
(6, 3, 0, 1, '2023-09-13 09:55:43'),
(7, 3, 1, 0, '2023-09-13 09:59:33'),
(8, 3, 1, 0, '2023-09-13 09:59:55'),
(9, 3, 1, 0, '2023-09-13 10:01:49'),
(10, 3, 1, 0, '2023-09-13 10:01:59'),
(11, 3, 0, 1, '2023-09-13 10:02:07'),
(12, 3, 1, 0, '2023-09-13 10:02:14'),
(13, 3, 0, 1, '2023-09-13 10:02:27'),
(14, 3, 1, 0, '2023-09-13 10:04:19'),
(15, 3, 0, 1, '2023-09-13 10:04:23'),
(16, 3, 1, 0, '2023-09-13 10:13:38'),
(17, 3, 0, 1, '2023-09-13 10:13:57'),
(18, 5, 1, 0, '2023-09-14 13:22:51'),
(19, 5, 0, 1, '2023-09-16 10:22:19'),
(20, 5, 1, 0, '2023-09-16 10:22:31'),
(21, 5, 0, 1, '2023-09-16 10:23:24'),
(22, 6, 1, 0, '2023-09-17 14:15:14'),
(23, 5, 1, 0, '2023-09-27 12:10:46'),
(24, 3, 1, 0, '2023-09-27 12:10:52'),
(25, 5, 0, 1, '2023-09-27 12:10:56'),
(26, 5, 1, 0, '2023-11-20 13:54:46'),
(27, 5, 1, 0, '2023-11-20 13:54:53'),
(28, 3, 0, 1, '2023-11-20 13:54:59'),
(29, 5, 0, 1, '2023-11-20 13:55:03'),
(30, 6, 0, 1, '2023-11-20 13:55:07'),
(31, 6, 1, 0, '2023-11-20 13:55:13'),
(32, 6, 0, 1, '2023-11-20 13:55:18'),
(33, 5, 1, 0, '2023-11-20 13:55:25'),
(34, 5, 0, 1, '2023-11-20 13:55:29'),
(35, 7, 1, 0, '2023-11-20 13:55:35'),
(36, 7, 0, 1, '2023-11-20 13:55:40'),
(37, 6, 1, 0, '2023-11-20 13:56:12'),
(38, 6, 0, 1, '2023-11-20 13:56:20'),
(39, 17, 1, 0, '2023-12-31 06:24:02'),
(40, 17, 0, 1, '2023-12-31 06:24:40'),
(41, 17, 1, 0, '2023-12-31 06:25:08'),
(42, 17, 0, 1, '2023-12-31 06:25:56'),
(43, 17, 1, 0, '2023-12-31 06:27:08'),
(44, 17, 0, 1, '2023-12-31 16:40:57'),
(45, 17, 1, 0, '2023-12-31 16:42:21'),
(46, 17, 0, 1, '2023-12-31 16:43:39');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_type_id` int(11) NOT NULL,
  `payment_type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_type_id`, `payment_type`) VALUES
(1, 'cash');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_img`) VALUES
(1, 'images/products/qr.png');

-- --------------------------------------------------------

--
-- Table structure for table `product_description`
--

CREATE TABLE `product_description` (
  `product_desc_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_description`
--

INSERT INTO `product_description` (`product_desc_id`, `product_id`, `description`) VALUES
(1, 1, 'QR Code use in Emergency Purposes');

-- --------------------------------------------------------

--
-- Table structure for table `product_name`
--

CREATE TABLE `product_name` (
  `product_name_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_name`
--

INSERT INTO `product_name` (`product_name_id`, `product_id`, `name`) VALUES
(1, 1, 'QR Code');

-- --------------------------------------------------------

--
-- Table structure for table `product_rate`
--

CREATE TABLE `product_rate` (
  `product_rate_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_rate`
--

INSERT INTO `product_rate` (`product_rate_id`, `product_id`, `rate`) VALUES
(1, 1, 30.00);

-- --------------------------------------------------------

--
-- Table structure for table `qr_master`
--

CREATE TABLE `qr_master` (
  `qr_id` int(11) NOT NULL,
  `qr_img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_master`
--

INSERT INTO `qr_master` (`qr_id`, `qr_img`) VALUES
(1, 0x696d616765732f71722f312e706e67),
(2, 0x696d616765732f71722f322e706e67),
(3, 0x696d616765732f71722f332e706e67),
(4, 0x696d616765732f342e706e67),
(5, 0x89504e470d0a1a0a0000000d4948445200000172000001720100000000c05f6ca40000027f49444154789ced9b418ae3301045df1f1bb2b4a10f90a3c8376bfa487d03fb2839c080b50cd8d42c2439c9343d330d6e130d550b13cb6f51509454f55591f1159b7e7c0907e79d77de79e79d77fe335ed95a98ca434394d24392341ce88ff37bf1989919c1cccce6c6d22b808d34f76bc1cc6c7c36ff9dff373e960c9d7a20a4802e680052621feb8ff3fbf0ed8795d82e4cfd0cc497c588c7fae3fc77f3dd02c416a67ed513f8e3fc1e7c676623a00120d855d0e5fdd9cc96a3fd717e1f3eefcf53cad406c27bbb407c3185cbc9048f49fc6cfe3bff674bf1bd8994369daf62ea9bfc8bee51c07c36ff9dff8b95e667490d1161db8bc30c36764b4292797f54256f6f6ad3a97b1fe42e475a43941ef8eff6c7f9bdf89c9c63a9af80c64a681b031acb4a87e76f857cd99f8b4c956be56e21edd936e7fad9e35b3f1f8bfe4c3ca5b24a03a0a1bc3eb9ffce7fb42238e753f796bf3676b7c20b5c7fae92cffd6f1857d9a4c60460c493896e4d5f150c748c3fceefcb6ff90bb9aa4a47af99d90c45d8f2faaa52fea1be9a9b740d983ea4fd7986db25a1c7b74ededece5749e70588ca4d3000d3d94cea57bfdfaf99d7eba585706981ce52ffabd779555a0bf3c1fe38bf175fc4c7396b916c82468a74d8d40fdf9febe53500a9ebcd57835711e6554c92f47a690bf29cfe3bffa9d9a3e5d5d2fae672ab73fdaa6afe363f99f48dbb0337b610e6c6f5abaaf9ade1d540633646298b94e94cf6fab952beccd7c51ec23b18f165299781abb6c10ecfdfff8397fa55f9ba70d337de7cbebd56fef7f95823f608da45743f5be896d6f5e7faf9ed7e7fea0158958bac783226f9fc46a5fcc3fd02457f4ea357dc46635d7fae9497ffbfdb79e79d77de79e70fe77f0142dbcac6e92548210000000049454e44ae426082),
(6, 0x89504e470d0a1a0a0000000d4948445200000172000001720100000000c05f6ca40000027c49444154789ced9b416ae34010455f8d045eb62007c8515a373339d2dca075941c20202d0d127f16dd2ddb21934c88adb1a07a612ceb2d3e14d55df5ab6de23b6bf8f52d1c9c77de79e79d77def9bff156560bb0e46fd64f66f9c3ccccfa0df5387f633e4a924660e81a29b1985ef2b74692a46bfede7a9cbf313fad193a9911251135633d50137b4b3dcedf898f6323b30e606a51fadf7a9cbf073fb530748b3d8a1ee77fc8074909307b3e1951278350f66749f3d67a9cbf0d5f0ed621676a03f1f741c6f4248baf07195c27f1a3e977fef395e37b362935740d0c5d8386e79341b836301f4dbff35facdcfc44cd28d128774a09208ea014e68ce4951e4dbff3ffce479d8ca1033b6a06423975ad9fcc3ee0efadc7f99ff317f90b54432385f278f19be7ef1ef9b2f9a6a035aa6557ce7bb6c6523f7b7cf7ccc771b16c68e45e683ae4b2ca7ac0fafaf8b0fa9dff9c1fba46b5e16d04e194fd6708337ae9169f2fec93cffd9181a1e25abdb5e4d6372ce56d14d8367a9cbf2d5f9b9fb1e66a82cb715231b6bcbeda295febe711decd0295427da1d1e3bb53fe227f7369758e740a12843afa8d1edfddf2d6b3d8b94cb63eccd8715c8cf8dae6986faac7f95bf1d7e7af2e0c8dfc18d7eed8f7e73df2ebf95ba31a576b32ae53c138aec6f4a3e977fe8ba5eb55260da17a96512a85b5e7ef1ef9b5ff05a09935185707eef4341313ee5fed9a5f1b5e3b8e8df225bb6c52664fdafdab9df3f5fea4128b595fa3ca6066949a6b4b3dcedf87b79e46e5eaf3ea6fbcf8fdf6bdf2edbb67c18c413b1be1ad8530b7ee3fef9faff727f38ae362a5c89a0eaa9bf4967a9cbf0dcfd970061a95a8d649431907fb7c61afbcf9ffbb9d77de79e79d777e73fe0f110ccf2cccd488600000000049454e44ae426082);

-- --------------------------------------------------------

--
-- Table structure for table `qr_register`
--

CREATE TABLE `qr_register` (
  `qr_reg_id` int(11) NOT NULL,
  `qr_id` int(11) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `mu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `qr_register`
--

INSERT INTO `qr_register` (`qr_reg_id`, `qr_id`, `reg_date`, `mu_id`) VALUES
(3, 1, '2023-09-12 16:54:31', 1),
(5, 2, '2023-09-14 12:58:12', 1),
(6, 3, '2023-09-17 14:13:38', 1),
(7, 4, '2023-11-20 13:02:25', 1),
(16, 5, '2023-12-23 13:40:15', 1),
(17, 6, '2023-12-31 05:33:47', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sec_mob`
--

CREATE TABLE `sec_mob` (
  `sc_mob_id` int(11) NOT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `sc_mob` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sec_mob`
--

INSERT INTO `sec_mob` (`sc_mob_id`, `sc_id`, `sc_mob`) VALUES
(24, 28, '9510743136'),
(26, 30, '7990665770');

-- --------------------------------------------------------

--
-- Table structure for table `sec_name`
--

CREATE TABLE `sec_name` (
  `sc_name_id` int(11) NOT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `sc_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sec_name`
--

INSERT INTO `sec_name` (`sc_name_id`, `sc_id`, `sc_name`) VALUES
(25, 28, 'Pm'),
(27, 30, 'Devendra Ladhani');

-- --------------------------------------------------------

--
-- Table structure for table `sec_user`
--

CREATE TABLE `sec_user` (
  `sc_id` int(11) NOT NULL,
  `mu_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sec_user`
--

INSERT INTO `sec_user` (`sc_id`, `mu_id`) VALUES
(25, 0),
(26, 0),
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 5),
(31, 5);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_address`
--

CREATE TABLE `shipping_address` (
  `shipping_address_id` int(11) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `address` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping_address`
--

INSERT INTO `shipping_address` (`shipping_address_id`, `state_id`, `city_id`, `address`) VALUES
(1, 1, 1, 'Radhe Heights');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `state_id` int(11) NOT NULL,
  `state` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `state`) VALUES
(1, 'GUJARAT');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_master`
--

CREATE TABLE `vehicle_master` (
  `vehicle_master_id` int(11) NOT NULL,
  `qr_reg_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_master`
--

INSERT INTO `vehicle_master` (`vehicle_master_id`, `qr_reg_id`) VALUES
(2, 3),
(3, 5),
(4, 6),
(5, 7),
(6, 16),
(7, 17);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_name`
--

CREATE TABLE `vehicle_name` (
  `vehicle_name_id` int(11) NOT NULL,
  `vehicle_master_id` int(11) DEFAULT NULL,
  `vehicle_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_name`
--

INSERT INTO `vehicle_name` (`vehicle_name_id`, `vehicle_master_id`, `vehicle_name`) VALUES
(2, 2, 'TVS IQube Electric'),
(3, 2, 'Activa 125'),
(4, 3, 'TVS IQube Electric'),
(5, 4, 'TVS IQube Electric'),
(6, 5, 'TVS IQube Electric'),
(7, 6, 'TVS IQube Electric'),
(8, 7, 'Activa 125');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_number`
--

CREATE TABLE `vehicle_number` (
  `vehicle_number_id` int(11) NOT NULL,
  `vehicle_master_id` int(11) DEFAULT NULL,
  `vehicle_number` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_number`
--

INSERT INTO `vehicle_number` (`vehicle_number_id`, `vehicle_master_id`, `vehicle_number`) VALUES
(2, 2, 'GJ01VU8452'),
(3, 3, 'GJ01VU8531'),
(4, 4, 'GJ01VU8456'),
(5, 5, 'GJ01VU8458'),
(6, 6, 'GJ01VU8490'),
(7, 7, 'GJ18DH3005');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_type`
--

CREATE TABLE `vehicle_type` (
  `vehicle_type_id` int(11) NOT NULL,
  `vehicle_master_id` int(11) DEFAULT NULL,
  `vehicle_type` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_type`
--

INSERT INTO `vehicle_type` (`vehicle_type_id`, `vehicle_master_id`, `vehicle_type`) VALUES
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 3),
(7, 7, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_user`
--

CREATE TABLE `vehicle_user` (
  `vehicle_user_id` int(11) NOT NULL,
  `vehicle_master_id` int(11) DEFAULT NULL,
  `mu_id` int(11) DEFAULT NULL,
  `sc_id` int(11) DEFAULT NULL,
  `change_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicle_user`
--

INSERT INTO `vehicle_user` (`vehicle_user_id`, `vehicle_master_id`, `mu_id`, `sc_id`, `change_at`) VALUES
(2, 2, 1, 25, '2023-09-13 02:19:04'),
(3, 2, 0, 22, '2023-09-13 02:20:48'),
(4, 2, 0, 22, '2023-09-13 07:54:55'),
(5, 2, 0, 22, '2023-09-13 07:55:30'),
(6, 2, 0, 22, '2023-09-13 07:57:19'),
(7, 2, 0, 22, '2023-09-13 07:57:34'),
(8, 2, 1, 25, '2023-09-13 08:15:23'),
(9, 2, 0, 22, '2023-09-13 08:15:33'),
(10, 2, 0, 22, '2023-09-13 08:18:21'),
(11, 2, 1, 25, '2023-09-13 08:18:44'),
(12, 2, 1, 25, '2023-09-13 08:21:57'),
(13, 2, 0, 22, '2023-09-13 08:22:04'),
(14, 2, 0, 22, '2023-09-13 08:23:11'),
(15, 2, 1, 25, '2023-09-13 08:23:27'),
(16, 2, 0, 22, '2023-09-13 08:23:54'),
(17, 2, 0, 22, '2023-09-13 09:56:20'),
(18, 2, 1, 25, '2023-09-13 10:19:46'),
(19, 2, 0, 22, '2023-09-13 10:23:26'),
(20, 2, 1, 25, '2023-09-13 10:26:29'),
(21, 2, 0, 22, '2023-09-14 12:58:29'),
(22, 2, 0, 28, '2023-09-16 10:22:46'),
(23, 3, 1, 25, '2023-09-16 10:24:18'),
(24, 3, 1, 25, '2023-09-16 10:24:19'),
(25, 3, 1, 25, '2023-09-16 10:24:22'),
(26, 3, 1, 25, '2023-09-16 10:24:26'),
(27, 3, 0, 28, '2023-09-16 10:24:35'),
(28, 3, 0, 28, '2023-09-16 10:24:45'),
(29, 2, 1, 25, '2023-09-16 10:25:22'),
(30, 2, 0, 28, '2023-09-17 14:13:55'),
(31, 2, 1, 25, '2023-10-13 13:50:53'),
(32, 2, 1, 25, '2023-10-13 13:50:56'),
(33, 2, 1, 25, '2023-10-13 13:51:09'),
(34, 2, 0, 28, '2023-10-13 13:51:19'),
(35, 2, 1, 25, '2023-10-13 13:56:34'),
(36, 2, 1, 25, '2023-10-13 13:56:37'),
(37, 2, 1, 25, '2023-10-13 13:56:44'),
(38, 2, 1, 25, '2023-10-13 13:56:45'),
(39, 2, 1, 25, '2023-10-13 13:56:46'),
(40, 2, 0, 28, '2023-10-13 13:59:17'),
(41, 2, 1, 25, '2023-10-13 14:00:10'),
(42, 2, 0, 28, '2023-10-13 14:04:44'),
(43, 2, 0, 28, '2023-10-13 14:04:46'),
(44, 2, 0, 28, '2023-10-13 14:04:54'),
(45, 2, 1, 25, '2023-10-13 14:05:36'),
(46, 2, 0, 28, '2023-10-13 14:07:35'),
(47, 2, 1, 25, '2023-10-13 14:08:01'),
(48, 2, 0, 28, '2023-10-13 14:11:12'),
(49, 2, 0, 28, '2023-10-13 14:13:40'),
(50, 2, 0, 28, '2023-10-13 14:14:26'),
(51, 2, 1, 25, '2023-10-13 14:15:57'),
(52, 2, 1, 25, '2023-10-13 14:16:18'),
(53, 2, 0, 28, '2023-10-13 14:17:17'),
(54, 2, 1, 25, '2023-10-13 14:18:33'),
(55, 2, 1, 25, '2023-10-13 14:18:56'),
(56, 2, 0, 28, '2023-11-20 13:16:37'),
(57, 2, 1, 25, '2023-11-20 13:17:12'),
(58, 7, 5, 25, '2023-12-31 05:43:04'),
(59, 7, 0, 30, '2023-12-31 05:47:28'),
(60, 7, 5, 25, '2023-12-31 05:50:40'),
(61, 7, 0, 31, '2023-12-31 16:43:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_address_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `main_user`
--
ALTER TABLE `main_user`
  ADD PRIMARY KEY (`mu_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `main_user_address`
--
ALTER TABLE `main_user_address`
  ADD PRIMARY KEY (`main_user_address_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `main_user_dob`
--
ALTER TABLE `main_user_dob`
  ADD PRIMARY KEY (`main_user_dob_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `main_user_gender`
--
ALTER TABLE `main_user_gender`
  ADD PRIMARY KEY (`main_user_gender_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `main_user_mob`
--
ALTER TABLE `main_user_mob`
  ADD PRIMARY KEY (`main_user_mob_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `main_user_name`
--
ALTER TABLE `main_user_name`
  ADD PRIMARY KEY (`main_user_name_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`order_address_id`),
  ADD KEY `shipping_address_id` (`shipping_address_id`),
  ADD KEY `customer_address_id` (`customer_address_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD PRIMARY KEY (`order_payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `payment_type_id` (`payment_type_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `order_quantity`
--
ALTER TABLE `order_quantity`
  ADD PRIMARY KEY (`order_quantity_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`order_status_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `pause_play_qr`
--
ALTER TABLE `pause_play_qr`
  ADD PRIMARY KEY (`pause_play_qr_id`),
  ADD KEY `qr_reg_id` (`qr_reg_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_type_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_description`
--
ALTER TABLE `product_description`
  ADD PRIMARY KEY (`product_desc_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_name`
--
ALTER TABLE `product_name`
  ADD PRIMARY KEY (`product_name_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_rate`
--
ALTER TABLE `product_rate`
  ADD PRIMARY KEY (`product_rate_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `qr_master`
--
ALTER TABLE `qr_master`
  ADD PRIMARY KEY (`qr_id`),
  ADD UNIQUE KEY `qr_img` (`qr_img`) USING HASH;

--
-- Indexes for table `qr_register`
--
ALTER TABLE `qr_register`
  ADD PRIMARY KEY (`qr_reg_id`),
  ADD KEY `qr_id` (`qr_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `sec_mob`
--
ALTER TABLE `sec_mob`
  ADD PRIMARY KEY (`sc_mob_id`),
  ADD KEY `sc_id` (`sc_id`);

--
-- Indexes for table `sec_name`
--
ALTER TABLE `sec_name`
  ADD PRIMARY KEY (`sc_name_id`),
  ADD KEY `sc_id` (`sc_id`);

--
-- Indexes for table `sec_user`
--
ALTER TABLE `sec_user`
  ADD PRIMARY KEY (`sc_id`),
  ADD KEY `mu_id` (`mu_id`);

--
-- Indexes for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD PRIMARY KEY (`shipping_address_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `vehicle_master`
--
ALTER TABLE `vehicle_master`
  ADD PRIMARY KEY (`vehicle_master_id`),
  ADD KEY `qr_reg_id` (`qr_reg_id`);

--
-- Indexes for table `vehicle_name`
--
ALTER TABLE `vehicle_name`
  ADD PRIMARY KEY (`vehicle_name_id`),
  ADD KEY `vehicle_master_id` (`vehicle_master_id`);

--
-- Indexes for table `vehicle_number`
--
ALTER TABLE `vehicle_number`
  ADD PRIMARY KEY (`vehicle_number_id`),
  ADD KEY `vehicle_master_id` (`vehicle_master_id`);

--
-- Indexes for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD PRIMARY KEY (`vehicle_type_id`),
  ADD KEY `vehicle_master_id` (`vehicle_master_id`);

--
-- Indexes for table `vehicle_user`
--
ALTER TABLE `vehicle_user`
  ADD PRIMARY KEY (`vehicle_user_id`),
  ADD KEY `vehicle_master_id` (`vehicle_master_id`),
  ADD KEY `mu_id` (`mu_id`),
  ADD KEY `sc_id` (`sc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `customer_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_user_address`
--
ALTER TABLE `main_user_address`
  MODIFY `main_user_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `main_user_dob`
--
ALTER TABLE `main_user_dob`
  MODIFY `main_user_dob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `main_user_gender`
--
ALTER TABLE `main_user_gender`
  MODIFY `main_user_gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_user_mob`
--
ALTER TABLE `main_user_mob`
  MODIFY `main_user_mob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `main_user_name`
--
ALTER TABLE `main_user_name`
  MODIFY `main_user_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `order_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_payment`
--
ALTER TABLE `order_payment`
  MODIFY `order_payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_quantity`
--
ALTER TABLE `order_quantity`
  MODIFY `order_quantity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `order_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pause_play_qr`
--
ALTER TABLE `pause_play_qr`
  MODIFY `pause_play_qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_description`
--
ALTER TABLE `product_description`
  MODIFY `product_desc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_name`
--
ALTER TABLE `product_name`
  MODIFY `product_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_rate`
--
ALTER TABLE `product_rate`
  MODIFY `product_rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qr_master`
--
ALTER TABLE `qr_master`
  MODIFY `qr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `qr_register`
--
ALTER TABLE `qr_register`
  MODIFY `qr_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `sec_mob`
--
ALTER TABLE `sec_mob`
  MODIFY `sc_mob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sec_name`
--
ALTER TABLE `sec_name`
  MODIFY `sc_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `sec_user`
--
ALTER TABLE `sec_user`
  MODIFY `sc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shipping_address`
--
ALTER TABLE `shipping_address`
  MODIFY `shipping_address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicle_master`
--
ALTER TABLE `vehicle_master`
  MODIFY `vehicle_master_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_name`
--
ALTER TABLE `vehicle_name`
  MODIFY `vehicle_name_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `vehicle_number`
--
ALTER TABLE `vehicle_number`
  MODIFY `vehicle_number_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  MODIFY `vehicle_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicle_user`
--
ALTER TABLE `vehicle_user`
  MODIFY `vehicle_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `city_master`
--
ALTER TABLE `city_master`
  ADD CONSTRAINT `city_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`);

--
-- Constraints for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD CONSTRAINT `customer_address_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`),
  ADD CONSTRAINT `customer_address_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`);

--
-- Constraints for table `main_user_address`
--
ALTER TABLE `main_user_address`
  ADD CONSTRAINT `main_user_address_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `main_user_dob`
--
ALTER TABLE `main_user_dob`
  ADD CONSTRAINT `main_user_dob_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `main_user_gender`
--
ALTER TABLE `main_user_gender`
  ADD CONSTRAINT `main_user_gender_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `main_user_mob`
--
ALTER TABLE `main_user_mob`
  ADD CONSTRAINT `main_user_mob_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `main_user_name`
--
ALTER TABLE `main_user_name`
  ADD CONSTRAINT `main_user_name_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `order_address`
--
ALTER TABLE `order_address`
  ADD CONSTRAINT `order_address_ibfk_1` FOREIGN KEY (`shipping_address_id`) REFERENCES `shipping_address` (`shipping_address_id`),
  ADD CONSTRAINT `order_address_ibfk_2` FOREIGN KEY (`customer_address_id`) REFERENCES `customer_address` (`customer_address_id`),
  ADD CONSTRAINT `order_address_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`);

--
-- Constraints for table `order_master`
--
ALTER TABLE `order_master`
  ADD CONSTRAINT `order_master_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `order_payment`
--
ALTER TABLE `order_payment`
  ADD CONSTRAINT `order_payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`),
  ADD CONSTRAINT `order_payment_ibfk_2` FOREIGN KEY (`payment_type_id`) REFERENCES `payment_type` (`payment_type_id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`),
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `order_quantity`
--
ALTER TABLE `order_quantity`
  ADD CONSTRAINT `order_quantity_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`);

--
-- Constraints for table `order_status`
--
ALTER TABLE `order_status`
  ADD CONSTRAINT `order_status_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_master` (`order_id`);

--
-- Constraints for table `pause_play_qr`
--
ALTER TABLE `pause_play_qr`
  ADD CONSTRAINT `pause_play_qr_ibfk_1` FOREIGN KEY (`qr_reg_id`) REFERENCES `qr_register` (`qr_reg_id`);

--
-- Constraints for table `product_description`
--
ALTER TABLE `product_description`
  ADD CONSTRAINT `product_description_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_name`
--
ALTER TABLE `product_name`
  ADD CONSTRAINT `product_name_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `product_rate`
--
ALTER TABLE `product_rate`
  ADD CONSTRAINT `product_rate_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `qr_register`
--
ALTER TABLE `qr_register`
  ADD CONSTRAINT `qr_register_ibfk_1` FOREIGN KEY (`qr_id`) REFERENCES `qr_master` (`qr_id`),
  ADD CONSTRAINT `qr_register_ibfk_2` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `sec_mob`
--
ALTER TABLE `sec_mob`
  ADD CONSTRAINT `sec_mob_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `sec_user` (`sc_id`);

--
-- Constraints for table `sec_name`
--
ALTER TABLE `sec_name`
  ADD CONSTRAINT `sec_name_ibfk_1` FOREIGN KEY (`sc_id`) REFERENCES `sec_user` (`sc_id`);

--
-- Constraints for table `sec_user`
--
ALTER TABLE `sec_user`
  ADD CONSTRAINT `sec_user_ibfk_1` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`);

--
-- Constraints for table `shipping_address`
--
ALTER TABLE `shipping_address`
  ADD CONSTRAINT `shipping_address_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`),
  ADD CONSTRAINT `shipping_address_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`);

--
-- Constraints for table `vehicle_master`
--
ALTER TABLE `vehicle_master`
  ADD CONSTRAINT `vehicle_master_ibfk_1` FOREIGN KEY (`qr_reg_id`) REFERENCES `qr_register` (`qr_reg_id`);

--
-- Constraints for table `vehicle_name`
--
ALTER TABLE `vehicle_name`
  ADD CONSTRAINT `vehicle_name_ibfk_1` FOREIGN KEY (`vehicle_master_id`) REFERENCES `vehicle_master` (`vehicle_master_id`);

--
-- Constraints for table `vehicle_number`
--
ALTER TABLE `vehicle_number`
  ADD CONSTRAINT `vehicle_number_ibfk_1` FOREIGN KEY (`vehicle_master_id`) REFERENCES `vehicle_master` (`vehicle_master_id`);

--
-- Constraints for table `vehicle_type`
--
ALTER TABLE `vehicle_type`
  ADD CONSTRAINT `vehicle_type_ibfk_1` FOREIGN KEY (`vehicle_master_id`) REFERENCES `vehicle_master` (`vehicle_master_id`);

--
-- Constraints for table `vehicle_user`
--
ALTER TABLE `vehicle_user`
  ADD CONSTRAINT `vehicle_user_ibfk_1` FOREIGN KEY (`vehicle_master_id`) REFERENCES `vehicle_master` (`vehicle_master_id`),
  ADD CONSTRAINT `vehicle_user_ibfk_2` FOREIGN KEY (`mu_id`) REFERENCES `main_user` (`mu_id`),
  ADD CONSTRAINT `vehicle_user_ibfk_3` FOREIGN KEY (`sc_id`) REFERENCES `sec_user` (`sc_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
