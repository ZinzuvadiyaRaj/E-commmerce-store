-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 11, 2023 at 09:10 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_cart`
--

CREATE TABLE `add_cart` (
  `id` int(11) NOT NULL,
  `prod_img` varchar(255) NOT NULL,
  `prod_title` varchar(100) NOT NULL,
  `prod_qty` varchar(20) NOT NULL,
  `prod_rel_price` varchar(100) NOT NULL,
  `prod_price` varchar(25) NOT NULL,
  `user_id` varchar(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `prod_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_cart`
--

INSERT INTO `add_cart` (`id`, `prod_img`, `prod_title`, `prod_qty`, `prod_rel_price`, `prod_price`, `user_id`, `status`, `prod_id`) VALUES
(113, '1st-national-bank-1950.jpeg', 'product 1', '1', '500', '500', '14', 'order', '1'),
(114, 'abstract-tulip-1979.jpg!Large.jpg', 'product 2', '1', '1000', '1000', '14', 'order', '2'),
(115, 'arches-1979.jpg!Large.jpg', 'Product title', '1', '122', '122', '14', 'order', '3'),
(133, '1st-national-bank-1950.jpeg', 'product 1', '3', '500', '1500', '22', 'order', '1'),
(135, '1st-national-bank-1950.jpeg', 'product 1', '1', '500', '500', '14', 'order', '1'),
(137, 'abstract-tulip-1979.jpg!Large.jpg', 'product 2', '3', '1000', '3000', '14', 'order', '2'),
(138, '1st-national-bank-1950.jpeg', 'product 1', '1', '500', '500', '14', 'Buy-now', '1'),
(139, 'abstract-tulip-1979.jpg!Large.jpg', 'product 2', '4', '1000', '4000', '14', 'Buy-now', '2'),
(140, 'abstract-tulip-1979.jpg!Large.jpg', 'product 2', '1', '1000', '1000', '14', 'Buy-now', '2'),
(141, '1st-national-bank-1950.jpeg', 'product 1', '5', '500', '2500', '14', 'Buy-now', '1');

-- --------------------------------------------------------

--
-- Table structure for table `blog_master`
--

CREATE TABLE `blog_master` (
  `id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `blog_image` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_master`
--

INSERT INTO `blog_master` (`id`, `date`, `title`, `blog_image`, `status`) VALUES
(1, '18 sep 2004', 'My Name Is Raj Zinzuvadiya ', 'blog-1.jpg', 'active'),
(2, '21 February 2020', 'Eternity Bands Do Last Forever', 'blog-2.jpg', 'active'),
(3, ' 28 February 2020', 'The Health Benefits Of Sunglasses', 'blog-3.jpg', 'active'),
(4, '16 February 2020', 'Aiming For Higher The Mastopexy', 'blog-4.jpg', 'active'),
(5, ' 21 February 2020', 'Wedding Rings A Gift For A Lifetime', 'blog-5.jpg', 'active'),
(6, '28 February 2020', 'The Different Methods Of Hair Removal', 'blog-6.jpg', 'active'),
(7, '16 February 2020', 'Hoop Earrings A Style From History', 'blog-7.jpg', 'active'),
(8, ' 21 February 2020', 'Lasik Eye Surgery Are You Ready', 'blog-8.jpg', 'active'),
(9, '28 February 2020', 'Lasik Eye Surgery Are You Ready', 'blog-9.jpg', 'active'),
(17, 'demo', 'demo', 'balinese-girl.jpg!Large.jpg', 'in-active'),
(18, 'demo', 'demo', 'la-fleuriste-1967.jpeg', 'in-active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'category 1'),
(2, 'category 2'),
(3, 'category 3'),
(4, 'category 4'),
(9, 'category 5');

-- --------------------------------------------------------

--
-- Table structure for table `contact_master`
--

CREATE TABLE `contact_master` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_master`
--

INSERT INTO `contact_master` (`id`, `name`, `email`, `massage`, `status`) VALUES
(2, 'raj', 'raj@gmail.com', 'my name is raj zinzuvadiya ', 'active'),
(3, 'demo', 'demo@gmail.com', 'demo', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `coupon_master`
--

CREATE TABLE `coupon_master` (
  `id` int(11) NOT NULL,
  `coupon_code` varchar(100) NOT NULL,
  `coupon_value` varchar(100) NOT NULL,
  `coupon_type` varchar(20) NOT NULL,
  `cart_min_value` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coupon_master`
--

INSERT INTO `coupon_master` (`id`, `coupon_code`, `coupon_value`, `coupon_type`, `cart_min_value`) VALUES
(3, 'asd123', '10', 'Percentage', '200'),
(6, 'abcd', '100', 'Ruppee', '200'),
(7, 'asdfg', '500', 'Ruppee', '5000');

-- --------------------------------------------------------

--
-- Table structure for table `manage_deals`
--

CREATE TABLE `manage_deals` (
  `id` int(11) NOT NULL,
  `prod_id` varchar(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `month` varchar(100) NOT NULL,
  `day` varchar(25) NOT NULL,
  `year` varchar(100) NOT NULL,
  `hour` varchar(25) NOT NULL,
  `minutes` varchar(25) NOT NULL,
  `second` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manage_deals`
--

INSERT INTO `manage_deals` (`id`, `prod_id`, `title`, `image`, `sale_price`, `month`, `day`, `year`, `hour`, `minutes`, `second`) VALUES
(1, '2', 'product 2', 'abstract-tulip-1979.jpg!Large.jpg', '1000', 'May', '12', '2023', '10', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `order_management`
--

CREATE TABLE `order_management` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `notes` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_management`
--

INSERT INTO `order_management` (`id`, `firstname`, `lastname`, `country`, `address`, `city`, `state`, `zip`, `phone`, `email`, `notes`, `status`, `user_id`) VALUES
(12, 'admin', 'admin', 'india', 'ramnagar1', 'rajkot', 'gujarat', '360003', '1212121212', 'admin', 'no notes', 'progress', '14'),
(17, 'user', 'user', 'India', 'ramnagar 1, gondal road, the floreza apartment 101 ushabhuvan.', 'rajkot', 'gujarat', '360002', '1231231231', 'user', 'bgbyb', 'progress', '22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `subcategory` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `reguler_price` varchar(25) NOT NULL,
  `sale_price` varchar(25) NOT NULL,
  `qty` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_disc` varchar(255) NOT NULL,
  `disc` varchar(255) NOT NULL,
  `add_info` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_disc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `title`, `reguler_price`, `sale_price`, `qty`, `image`, `short_disc`, `disc`, `add_info`, `meta_title`, `meta_disc`, `meta_key`) VALUES
(1, '1', '37', 'product 1', '100000', '500', '100000', '1st-national-bank-1950.jpeg', 'short Description', 'Description', 'Additional information', 'meta title ', 'meta description', 'meta keyword \r\n'),
(2, '3', '38', 'product 2', '200000', '1000', 'afsd', 'abstract-tulip-1979.jpg!Large.jpg', 'q', 'q', 'q', 'q', 'q', 'q'),
(3, '3', '39', 'Product title', '123', '122', '12', 'arches-1979.jpg!Large.jpg', 'Short Description', 'Description Description Description Description Description Description Description Description Description Description Description', 'Additional Information Additional Information Additional Information Additional Information Additional Information Additional Information', 'Meta titleMeta title Meta title  Meta title Meta title Meta title Meta title Meta title Meta title Meta title Meta title Meta title', 'Meta description Meta description Meta description Meta description Meta description Meta description Meta description Meta description ', 'Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword Meta Keyword '),
(4, '4', '40', 'Product title 2', '1000', '500', '10', 'composition-1.jpeg', 'Short Description 2', 'Description 2', 'Additional information 2', 'Meta Title 2', 'Meta Description 2', 'Meta Keyword 2'),
(5, '9', '41', 'product 3', '100', '20', '10', 'zulu-girl.jpeg', 'Short Description 3', 'Description 3', 'Additional information 3', 'Meta Title 3', 'Meta Description 3 ', 'Meta Keyword 3');

-- --------------------------------------------------------

--
-- Table structure for table `register_master`
--

CREATE TABLE `register_master` (
  `id` int(11) NOT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `otp` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register_master`
--

INSERT INTO `register_master` (`id`, `firstname`, `lastname`, `mobile`, `email`, `password`, `role`, `otp`) VALUES
(14, 'admin', 'admin', '1212121212', 'admin', 'admin', 2, 937787),
(18, 'demo', 'demo', '1231231231', 'demo@gmail.com', '123', 1, 303852),
(20, 'raj', 'raj', '1234567890', 'raj@gmail.com', '123', 1, 328021),
(21, 'raj', 'zinzuvadiya', '1234567890', 'raj132@gmail.com', '123', 1, 239150),
(22, 'user', 'user', '1231231231', 'user', 'user', 1, 257504),
(23, 'vendor', 'vendor', '1234123412', 'vendor', 'vendor', 3, 799000),
(33, 'test', 'test', '1231231231', 'test@gmail.com', '123', 1, 663074),
(34, 'vendor', 'vendor', '0000000000', 'vendor@gmail.com', 'vendor', 3, 951648),
(35, 'newcendor', 'newvendor', '9999999999', 'newvendor@gmail.com', 'newvendor', 3, 321422),
(36, 'hello', 'hello', '1212121212', 'hello@gmail.com', 'hello', 1, 500387),
(37, 'hello', 'hello', '1092019201', 'vhello@gmail.com', 'vhello', 3, 201133),
(38, 'delivery', 'delivery boy', '1234512345', 'delivery@gmail.com', 'delivery', 4, 710075),
(39, 'new de', 'new de ', '1919191919', 'newde@gmail.com', 'newde@123', 4, 345609);

-- --------------------------------------------------------

--
-- Table structure for table `slider_master`
--

CREATE TABLE `slider_master` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider_master`
--

INSERT INTO `slider_master` (`id`, `title`, `description`, `image`, `status`) VALUES
(4, 'Fall - Winter Collections 2030', 'A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality.', 'hero-1.jpg', 'active'),
(5, 'Fall - Winter Collections 2030', 'A specialist label creating luxury essentials. Ethically crafted with an unwavering commitment to exceptional quality.', 'hero-2.jpg', 'active'),
(7, 'slider title 123', 'discription123', 'balancing-act-1976.jpeg', 'In-active');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `sub_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `category`, `sub_category`) VALUES
(37, '1', 'sub category 1'),
(38, '2', 'sub category 2'),
(39, '3', 'sub category 3'),
(40, '4', 'sub category 4'),
(41, '9', 'sub category 5'),
(43, '1', 'subcategory 11'),
(44, '1', 'sub 1'),
(45, '1', 'sub2'),
(46, '1', 'sub3'),
(47, '1', 'sub4'),
(48, '1', 'sub 5');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist_master`
--

CREATE TABLE `wishlist_master` (
  `id` int(11) NOT NULL,
  `wishlist_img` varchar(255) NOT NULL,
  `wishlist_title` varchar(100) NOT NULL,
  `reguler_price` varchar(100) NOT NULL,
  `sale_price` varchar(25) NOT NULL,
  `product_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist_master`
--

INSERT INTO `wishlist_master` (`id`, `wishlist_img`, `wishlist_title`, `reguler_price`, `sale_price`, `product_id`) VALUES
(7, 'composition-1.jpeg', 'Product title 2', '1000', '500', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_cart`
--
ALTER TABLE `add_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_master`
--
ALTER TABLE `blog_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `contact_master`
--
ALTER TABLE `contact_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_master`
--
ALTER TABLE `coupon_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupon_code` (`coupon_code`);

--
-- Indexes for table `manage_deals`
--
ALTER TABLE `manage_deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_management`
--
ALTER TABLE `order_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `image` (`image`);

--
-- Indexes for table `register_master`
--
ALTER TABLE `register_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `slider_master`
--
ALTER TABLE `slider_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_cart`
--
ALTER TABLE `add_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `blog_master`
--
ALTER TABLE `blog_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `contact_master`
--
ALTER TABLE `contact_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupon_master`
--
ALTER TABLE `coupon_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manage_deals`
--
ALTER TABLE `manage_deals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_management`
--
ALTER TABLE `order_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `register_master`
--
ALTER TABLE `register_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `slider_master`
--
ALTER TABLE `slider_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `wishlist_master`
--
ALTER TABLE `wishlist_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
