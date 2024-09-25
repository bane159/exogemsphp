-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2024 at 12:36 AM
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
-- Database: `exogems`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `answer`, `question_id`) VALUES
(1, 'I like it!', 1),
(3, 'Hm I\'m not sure.', 1),
(4, 'I don\'t like it.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `created_at`, `status`) VALUES
(3, 11, '2024-03-10 16:22:44', b'0'),
(4, 12, '2024-03-10 16:37:35', b'0'),
(8, 11, '2024-03-12 11:09:58', b'0'),
(10, 12, '2024-03-12 15:10:29', b'0'),
(11, 12, '2024-03-12 15:17:00', b'1'),
(12, 37, '2024-03-13 14:42:01', b'1'),
(13, 39, '2024-03-13 14:43:25', b'1'),
(14, 36, '2024-03-14 12:34:16', b'0'),
(15, 36, '2024-03-14 12:34:43', b'1'),
(16, 11, '2024-03-14 16:14:34', b'0'),
(17, 11, '2024-03-14 16:15:11', b'1'),
(18, 51, '2024-09-09 16:38:06', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `cart_id`, `product_id`, `quantity`) VALUES
(85, 4, 6, 2),
(86, 4, 2, 3),
(105, 3, 5, 1),
(106, 3, 9, 1),
(137, 10, 2, 2),
(138, 10, 6, 1),
(139, 11, 2, 1),
(140, 11, 6, 1),
(141, 14, 2, 1),
(142, 14, 6, 1),
(144, 8, 2, 1),
(145, 8, 7, 1),
(146, 8, 1, 1),
(147, 16, 2, 1),
(148, 16, 7, 1),
(149, 16, 9, 1),
(150, 15, 2, 1),
(151, 15, 5, 2),
(152, 15, 7, 5),
(153, 15, 10, 2),
(154, 15, 15, 1),
(155, 15, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'beauty'),
(2, 'elegant'),
(3, 'luxurious'),
(4, 'fashion'),
(14, 'da');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `total` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `lastname` varchar(1000) NOT NULL,
  `street` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal` int(11) NOT NULL,
  `note` varchar(10000) DEFAULT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `cart_id`, `created_at`, `total`, `username`, `lastname`, `street`, `city`, `state`, `postal`, `note`, `order_id`) VALUES
(43, 4, '2024-03-12 15:10:29', 3192, 'Branislav', 'Radovanovic', 'Tihomira Visnjevca 9', 'Beograd ', 'Zvezdara', 11050, '', 508090063),
(44, 10, '2024-03-12 15:17:00', 1895, 'Branislav', 'Radovanovic', 'Tihomira Visnjevca 9', 'Beograd ', 'Zvezdara', 11050, 'Da', 670823225),
(45, 14, '2024-03-14 12:34:43', 998, 'Branislav', 'Radovanovic', 'Tihomira Visnjevca 9', 'Beograd ', 'Zvezdara', 11050, 'fda', 971351808),
(46, 8, '2024-03-14 16:14:32', 1667, 'Branislav', 'Radovanovic', 'Tihomira Visnjevca 9', 'Beograd ', 'Zvezdara', 11050, 'Jeste', 351360959),
(47, 16, '2024-03-14 16:15:09', 1467, 'Branislav', 'Radovanovic', 'Tihomira Visnjevca 9', 'Beograd', 'Zvezdara', 11050, 'Da jeste', 690846143);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject` varchar(10000) NOT NULL,
  `message` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `subject`, `message`) VALUES
(1, 12, 'Bane', ''),
(2, 12, 'Bane', ''),
(3, 12, 'Bane', 'dASDAS');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `path`, `name`) VALUES
(1, 'index.php', 'Home'),
(2, 'category.php?p=1&page=1', 'Shop'),
(3, 'contact.php', 'Contact'),
(4, 'about.php', 'About'),
(5, 'register.php', 'Register'),
(6, 'login.php', 'Log In'),
(7, 'admin.php', 'Admin'),
(8, 'logout.php', 'Log Out');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`) VALUES
(1, 'Gold'),
(2, 'silver'),
(3, 'leather');

-- --------------------------------------------------------

--
-- Table structure for table `materials_products`
--

CREATE TABLE `materials_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `materials_products`
--

INSERT INTO `materials_products` (`id`, `product_id`, `material_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 3),
(8, 8, 2),
(9, 9, 1),
(10, 10, 1),
(11, 15, 1),
(12, 16, 2);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` bit(1) NOT NULL DEFAULT b'1',
  `did_admin_change` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `user_id`, `created_at`, `updated_at`, `status`, `did_admin_change`) VALUES
(1, 11, '2024-03-07 20:36:49', '2024-03-13 14:44:53', b'0', b'1'),
(15, 39, '2024-03-13 14:44:27', '2024-03-13 14:44:49', b'0', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `path`) VALUES
(1, 'img/non-template/product-images/ring1.jpg'),
(2, 'img/non-template/product-images/ring2.jpg'),
(3, 'img/non-template/product-images/ring3.jpg'),
(4, 'img/non-template/product-images/ring4.jpg'),
(5, 'img/non-template/product-images/ring5.jpg'),
(6, 'img/non-template/product-images/ring6.jpg'),
(7, 'img/non-template/product-images/w1.jpg'),
(8, 'img/non-template/product-images/w2.jpg'),
(9, 'img/non-template/product-images/n1.jpg'),
(10, 'img/non-template/product-images/n3.jpg'),
(19, 'img/non-template/product-images/65f1fbbb34026_1710357435.png'),
(20, 'img/non-template/product-images/65f1fd1fbe5ba_1710357791.png'),
(21, 'img/non-template/product-images/65f1fd65c5f36_1710357861.png'),
(22, 'img/non-template/product-images/65f3338d01b75_1710437261.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `product_id`, `price`, `created_at`, `status`) VALUES
(2, 1, 899, '2024-03-04 20:58:36', b'1'),
(3, 2, 299, '2024-03-04 21:06:07', b'1'),
(4, 3, 799, '2024-03-04 21:09:54', b'1'),
(5, 4, 499, '2024-03-04 21:11:07', b'1'),
(6, 5, 399, '2024-03-04 21:12:58', b'1'),
(7, 6, 699, '2024-03-04 21:14:07', b'1'),
(8, 7, 469, '2024-03-04 21:15:14', b'1'),
(9, 8, 899, '2024-03-04 21:16:39', b'1'),
(10, 9, 699, '2024-03-04 21:18:58', b'1'),
(11, 10, 1199, '2024-03-04 21:20:14', b'1'),
(17, 15, 899, '2024-03-13 20:24:21', b'1'),
(18, 16, 899, '2024-03-14 18:27:41', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `weight` float NOT NULL,
  `quantityAvailable` int(11) NOT NULL,
  `unitsSold` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `picture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `text`, `weight`, `quantityAvailable`, `unitsSold`, `created_at`, `updated_at`, `category_id`, `picture_id`) VALUES
(1, 'Ring', 'Beauty ring for ladies', 4.8, 15, 46, '2024-03-04 20:50:18', NULL, 1, 1),
(2, 'Ring', 'Beauty Ring For Ladies', 5.6, 18, 98, '2024-03-04 21:05:57', NULL, 2, 2),
(3, 'Ring', 'Beauty Ring For Ladies', 4.7, 21, 34, '2024-03-04 21:09:41', NULL, 1, 3),
(4, 'Ring', 'Beauty Ring For Ladies', 5.7, 37, 38, '2024-03-04 21:10:56', NULL, 1, 4),
(5, 'Ring', 'Beauty Ring For Ladies', 3.4, 48, 84, '2024-03-04 21:12:49', NULL, 1, 5),
(6, 'Ring', 'Beauty Ring For Ladies', 5.2, 84, 56, '2024-03-04 21:13:58', NULL, 4, 6),
(7, 'Watch', 'Elegant Watch', 10.4, 34, 55, '2024-03-04 21:15:04', NULL, 2, 7),
(8, 'Watch', 'Luxurious Watch', 30.8, 24, 35, '2024-03-04 21:16:30', NULL, 3, 8),
(9, 'Neckless', 'Luxurious neckless', 14.4, 15, 47, '2024-03-04 21:18:33', NULL, 3, 9),
(10, 'Neckless', 'Luxurious neckless', 13.6, 56, 45, '2024-03-04 21:20:01', NULL, 3, 10),
(15, 'Neckless', 'Amazing Neckless', 24, 58, 0, '2024-03-13 20:24:21', NULL, 2, 21),
(16, 'Neckless', 'Amazing Neckless', 21, 56, 0, '2024-03-14 18:27:41', NULL, 2, 22);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(1, 'How do you like the website?');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `adress` varchar(10000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 0,
  `activation_key` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `adress`, `created_at`, `updated_at`, `role_id`, `isActive`, `activation_key`) VALUES
(11, 'Branislav', 'Radovanovic', 'bane@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Tamo Adresa', '2024-03-03 15:36:49', NULL, 1, 1, 0),
(12, 'Admin', 'Admin', 'admin@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka tamo adresa', '2024-03-03 18:49:53', NULL, 2, 1, 0),
(36, 'Branislav', 'Radovanovic', 'branislavr03@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Test', '2024-03-12 12:46:58', NULL, 1, 1, 0),
(37, 'Bane', 'Radovanovic', 'tasev@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Dax', '2024-03-12 12:52:37', NULL, 1, 1, 0),
(39, 'Name', 'Tasevbbbbbbbbbb', 'test@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Test', '2024-03-12 12:57:39', NULL, 1, 1, 0),
(41, 'Branislav', 'Radovanovic', 'neki@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Test', '2024-03-12 18:17:07', NULL, 1, 0, 4238272),
(45, 'Branislav', 'Radovanovic', 'branislavr023@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Test', '2024-03-12 19:44:45', NULL, 1, 0, 514604024),
(46, 'Branislav', 'Radovanovic', 'branislavr012323@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Test', '2024-03-12 19:44:47', NULL, 1, 0, 653494414),
(47, 'Branislav', 'Radovanovic', 'branislavr003@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Adresa', '2024-09-09 14:36:57', NULL, 1, 0, 7999616),
(48, 'Branislav', 'Radovanovic', 'branislavrr003@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Adresa', '2024-09-09 14:37:07', NULL, 1, 0, 464449768),
(49, 'Branislav', 'Radovanovic', 'branislavrrrrrrrrrr003@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Adresa', '2024-09-09 14:37:17', NULL, 1, 0, 280021628),
(50, 'Branislav', 'Radovanovic', 'neka@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Adresa', '2024-09-09 14:37:32', NULL, 1, 0, 781875457),
(51, 'Branislav', 'Radovanovic', 'neka12312412412@gmail.com', '20c54c4c3882f40c80ecfef3cbe4ad7a', 'Neka Adresa', '2024-09-09 14:37:35', NULL, 1, 0, 594631920);

-- --------------------------------------------------------

--
-- Table structure for table `users_survey`
--

CREATE TABLE `users_survey` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users_survey`
--

INSERT INTO `users_survey` (`id`, `user_id`, `question_id`, `answer_id`, `created_at`) VALUES
(1, 37, 1, 3, '2024-03-13 14:43:07'),
(2, 39, 1, 4, '2024-03-13 14:43:57'),
(3, 12, 1, 3, '2024-03-14 12:24:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `created_at` (`created_at`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials_products`
--
ALTER TABLE `materials_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `material_id` (`material_id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id_2` (`user_id`),
  ADD UNIQUE KEY `user_id_3` (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Email` (`email`),
  ADD KEY `status_id` (`role_id`),
  ADD KEY `activation_key` (`activation_key`);

--
-- Indexes for table `users_survey`
--
ALTER TABLE `users_survey`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`question_id`,`answer_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart_product`
--
ALTER TABLE `cart_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `materials_products`
--
ALTER TABLE `materials_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users_survey`
--
ALTER TABLE `users_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD CONSTRAINT `cart_product_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `materials_products`
--
ALTER TABLE `materials_products`
  ADD CONSTRAINT `materials_products_ibfk_2` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `materials_products_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD CONSTRAINT `newsletter_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_survey`
--
ALTER TABLE `users_survey`
  ADD CONSTRAINT `users_survey_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_survey_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_survey_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
