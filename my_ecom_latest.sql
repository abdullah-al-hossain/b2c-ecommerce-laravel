-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 01:49 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `email`, `password`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(2, 'abd@gmail.com', '96e79218965eb72c92a549dd5a330112', 'Abdullah Al Hossain', '01533609794', '2018-10-01 10:12:18', NULL),
(3, 'abd@gmail.com', '5d41402abc4b2a76b9719d911017c592', 'Abdullah', '01533609794', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_stat` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`, `pub_stat`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'New ecletronics<br>', 1, NULL, '2018-10-03 10:10:29'),
(2, 'Clothes', 'THis is clothes category<br>', 1, NULL, NULL),
(3, 'Sports', 'This is sports Category<br>', 0, NULL, '2018-10-06 11:37:05'),
(4, 'Ammunation', 'THis is a new category<br>', 1, NULL, NULL),
(5, 'Books', 'This is the books category.<br>', 1, NULL, '2018-10-01 14:52:20'),
(6, 'Kids', 'This is the kids section.<br>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_stat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `event` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `uid`, `p_id`, `event`) VALUES
(1, 1, 1, 'view'),
(2, 9, 7, 'view'),
(3, 9, 1, 'added to cart'),
(4, 9, 1, 'view'),
(5, 9, 1, 'added to cart'),
(6, 9, 7, 'added to cart'),
(7, 10, 5, 'view'),
(8, 10, 5, 'added to cart'),
(9, 1, 1, 'added to cart'),
(10, 13, 0, 'purchased'),
(11, 14, 0, 'purchased'),
(12, 14, 0, 'purchased');

-- --------------------------------------------------------

--
-- Table structure for table `manufactures`
--

CREATE TABLE `manufactures` (
  `man_id` int(10) UNSIGNED NOT NULL,
  `man_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `man_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_stat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufactures`
--

INSERT INTO `manufactures` (`man_id`, `man_name`, `man_desc`, `pub_stat`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'This is new .<br>', 1, NULL, NULL),
(2, 'Maktabatul Ashraf', 'This is a book publication company<br>', 1, NULL, NULL),
(3, 'Maktabatul Aslaf', 'This is another renowned book publication company created by us.<br>', 1, NULL, NULL),
(4, 'Sirah Publications', 'This a renowned publication in Dhaka<br>', 1, NULL, NULL),
(5, 'Nokia', 'Mobile company.<br>', 1, NULL, NULL),
(6, 'Asus', 'Laptop company .<br>', 1, NULL, NULL),
(7, 'hp', 'Laptop company.<br>', 1, NULL, NULL),
(8, 'Honda', 'Bike Company<br>', 1, NULL, NULL),
(9, 'Phoenix', 'This is a manufacture name.<br>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_09_20_093311_create_admins_table', 1),
(2, '2018_09_20_125306_create_categories_table', 1),
(3, '2018_09_23_093003_create_manufactures_table', 1),
(4, '2018_09_23_140033_create_products_table', 1),
(5, '2018_09_26_142227_create_sliders_table', 1),
(6, '2018_09_28_085652_create_users_table', 1),
(7, '2018_09_28_093711_create_shippings_table', 1),
(8, '2018_09_29_091556_create_payments_table', 1),
(9, '2018_09_29_091805_create_orders_table', 1),
(10, '2018_09_29_091853_create_order_details_table', 1),
(11, '2018_09_30_105930_create_socials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Black Shoe', '200', '3', NULL, NULL),
(2, 2, 1, 'Black Shoe', '200', '1', NULL, NULL),
(3, 3, 2, 'T-shirt Gigo', '40', '1', NULL, NULL),
(4, 3, 1, 'Black Shoe', '200', '1', NULL, NULL),
(5, 4, 6, 'Maisto Ktm RC-3', '30000', '1', NULL, NULL),
(6, 4, 1, 'Black Shoe', '200', '1', NULL, NULL),
(7, 4, 4, 'Sunnah', '15', '5', NULL, NULL),
(8, 5, 5, 'HP G4 460', '10000', '1', NULL, NULL),
(9, 6, 4, 'Sunnah', '15', '1', NULL, NULL),
(10, 7, 2, 'T-shirt Gigo', '40', '3', NULL, NULL),
(11, 7, 1, 'Black Shoe', '200', '1', NULL, NULL),
(12, 8, 5, 'HP G4 460', '10000', '3', NULL, NULL),
(13, 8, 3, 'T-shirt Nano', '120', '3', NULL, NULL),
(14, 8, 4, 'Sunnah', '15', '1', NULL, NULL),
(15, 8, 1, 'Black Shoe', '200', '1', NULL, NULL),
(16, 9, 6, 'Maisto Ktm RC-3', '30000', '1', NULL, NULL),
(17, 10, 4, 'Sunnah', '15', '1', NULL, NULL),
(18, 11, 7, 'Kids new Cycle', '4500', '1', NULL, NULL),
(19, 11, 4, 'Sunnah', '15', '1', NULL, NULL),
(20, 12, 6, 'Maisto Ktm RC-3', '130000', '2', NULL, NULL),
(21, 13, 2, 'T-shirt Gigo', '40', '1', NULL, NULL),
(22, 13, 5, 'HP G4 460', '35000', '1', NULL, NULL),
(23, 14, 1, 'Black Shoe', '200', '1', NULL, NULL),
(24, 14, 2, 'T-shirt Gigo', '40', '1', NULL, NULL),
(25, 15, 5, 'HP G4 460', '35000', '3', NULL, NULL),
(26, 16, 2, 'T-shirt Gigo', '40', '3', NULL, NULL),
(27, 17, 1, 'Black Shoe', '200', '2', NULL, NULL),
(28, 18, 2, 'T-shirt Gigo', '40', '1', NULL, NULL),
(29, 18, 5, 'HP G4 460', '35000', '1', NULL, NULL),
(30, 19, 2, 'T-shirt Gigo', '40', '4', NULL, NULL),
(31, 19, 6, 'Maisto Ktm RC-3', '130000', '1', NULL, NULL),
(32, 20, 6, 'Maisto Ktm RC-3', '130000', '2', NULL, NULL),
(33, 20, 1, 'কালো জুতা', '200', '1', NULL, NULL),
(34, 21, 4, 'Sunnah', '15', '1', NULL, NULL),
(35, 22, 6, 'Maisto Ktm RC-3', '130000', '4', NULL, NULL),
(36, 22, 5, 'HP G4 460', '35000', '1', NULL, NULL),
(37, 23, 2, 'T-shirt Gigo', '40', '1', NULL, NULL),
(38, 24, 2, 'T-shirt Gigo', '40', '2', NULL, NULL),
(39, 24, 7, 'Kids new Cycle', '4500', '1', NULL, NULL),
(40, 25, 4, 'Sunnah', '15', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `uid` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `uid`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '726.00', 'canceled', NULL, '2018-10-03 09:17:40'),
(2, 1, 2, 3, '242.00', 'canceled', NULL, '2018-10-03 09:17:43'),
(3, 1, 3, 4, '290.40', 'canceled', NULL, '2018-10-03 09:17:46'),
(4, 2, 4, 5, '36,632.75', 'canceled', NULL, '2018-10-03 09:17:35'),
(5, 2, 5, 6, '12,100.00', 'confirmed', NULL, '2018-10-03 09:07:57'),
(6, 1, 6, 7, '18.15', 'pending', NULL, '2018-10-03 09:17:49'),
(7, 3, 7, 8, '387.20', 'canceled', NULL, '2018-10-03 09:17:52'),
(8, 1, 8, 9, '30,575.00', 'canceled', NULL, '2018-10-03 09:08:51'),
(9, 4, 9, 10, '30,000.00', 'confirmed', NULL, '2018-10-03 09:17:59'),
(10, 1, 10, 11, '15.00', 'confirmed', NULL, NULL),
(11, 1, 11, 12, '4,515.00', 'confirmed', NULL, NULL),
(12, 1, 12, 13, '260,000.00', 'confirmed', NULL, NULL),
(13, 4, 13, 14, '35,040.00', 'canceled', NULL, NULL),
(14, 4, 14, 15, '240.00', 'confirmed', NULL, NULL),
(15, 4, 15, 16, '105,000.00', 'confirmed', NULL, NULL),
(16, 8, 16, 17, '120.00', 'confirmed', NULL, NULL),
(17, 1, 17, 18, '400.00', 'confirmed', NULL, NULL),
(18, 4, 18, 19, '35,040.00', 'pending', NULL, NULL),
(19, 9, 19, 20, '130,160.00', 'confirmed', NULL, NULL),
(20, 10, 20, 21, '260,200.00', 'confirmed', NULL, NULL),
(21, 1, 21, 22, '15.00', 'pending', NULL, NULL),
(22, 1, 22, 23, '555,000.00', 'confirmed', NULL, NULL),
(23, 13, 23, 24, '40.00', 'pending', NULL, NULL),
(24, 14, 24, 25, '5,541.80', 'pending', NULL, NULL),
(25, 14, 25, 26, '18.15', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'bkash', 'pending', NULL, NULL),
(2, 'hcash', 'pending', NULL, NULL),
(3, 'hcash', 'pending', NULL, NULL),
(4, 'bkash', 'pending', NULL, NULL),
(5, 'hcash', 'pending', NULL, NULL),
(6, 'bkash', 'pending', NULL, NULL),
(7, 'bkash', 'pending', NULL, NULL),
(8, 'bkash', 'pending', NULL, NULL),
(9, 'hcash', 'pending', NULL, NULL),
(10, 'hcash', 'pending', NULL, NULL),
(11, 'ppal', 'pending', NULL, NULL),
(12, 'bkash', 'pending', NULL, NULL),
(13, 'bkash', 'pending', NULL, NULL),
(14, 'hcash', 'pending', NULL, NULL),
(15, 'hcash', 'pending', NULL, NULL),
(16, 'bkash', 'pending', NULL, NULL),
(17, 'hcash', 'pending', NULL, NULL),
(18, 'hcash', 'pending', NULL, NULL),
(19, 'hcash', 'pending', NULL, NULL),
(20, 'hcash', 'pending', NULL, NULL),
(21, 'hcash', 'pending', NULL, NULL),
(22, 'hcash', 'pending', NULL, NULL),
(23, 'bkash', 'pending', NULL, NULL),
(24, 'hcash', 'pending', NULL, NULL),
(25, 'hcash', 'pending', NULL, NULL),
(26, 'hcash', 'pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pcount`
--

CREATE TABLE `pcount` (
  `id` int(11) NOT NULL,
  `visits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pcount`
--

INSERT INTO `pcount` (`id`, `visits`) VALUES
(1, 62);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `p_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `man_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image1` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image3` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_stat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`p_id`, `category_id`, `man_id`, `product_name`, `short_desc`, `long_desc`, `product_price`, `product_image`, `product_image1`, `product_image2`, `product_image3`, `product_size`, `product_color`, `pub_stat`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'কালো জুতা', 'New category shoe this is new and special styled', 'New category shoe this is new and special styled.New category shoe this is new and special styledNew category shoe this is new and special styled', 200.00, '/image/products/1538389059.jpg', NULL, '', '', '48', 'Black', 1, NULL, '2018-10-08 10:37:00'),
(2, 2, 1, 'T-shirt Gigo', '<div>This is a new t-shirt that was published by me recently.', 'This is a new t-shirt that was published by me recently.', 40.00, '/image/products/1538403284.jpg', NULL, '', '', 'SM, M, L', 'Grey', 1, NULL, '2018-10-11 08:02:32'),
(3, 2, 1, 'T-shirt Nano', 'This was another brand t-shirt that was published by me recently.', 'This was another brand t-shirt that was published by me recently.', 120.00, '/image/products/1538403334.png', NULL, '', '', 'L, XL', 'Brown', 1, NULL, '2018-10-01 13:16:31'),
(4, 5, 2, 'Sunnah', 'The main contents of the book is the sunnah of the prophet.', 'The main contents of the book is the sunnah of the prophet.The main contents of the book is the sunnah of the prophet.The main contents of the book is the sunnah of the prophet.', 15.00, '/image/products/1538410543.jpg', NULL, '', '', '92 Pages', 'NN', 1, NULL, NULL),
(5, 1, 7, 'HP G4 460', 'New laptop of hp has just been deployed in the market.', 'New laptop of hp has just been announced and deployed in the market.', 35000.00, '/image/products/1538412167.jpg', NULL, '', '', '1360 X 768', 'Black', 1, NULL, '2018-10-03 08:26:11'),
(6, 3, 8, 'Maisto Ktm RC-3', 'This is a new bike that has been released by Honda.<br>', 'This is a new bike that has been released by Honda.', 130000.00, '/image/products/1538412808.jpeg', NULL, '', '', 'UK', 'Black and Blue', 1, NULL, '2018-10-03 08:39:54'),
(7, 6, 9, 'Kids new Cycle', 'This is new cycle of the kids in the market. Buy this.<br>', 'This is new cycle of the kids in the market. Buy this.This is new cycle of the kids in the market. Buy this.This is new cycle of the kids in the market. Buy this.', 4500.00, '/image/products/1538570455.jpg', NULL, '', '', '4\'3\"', 'Black', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `review` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`shipping_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `mobile_number`, `shipping_city`, `created_at`, `updated_at`) VALUES
(1, 'a@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01533609794', 'Dhaka', NULL, NULL),
(2, 'abdullah14@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01533609794', 'Dhaka', NULL, NULL),
(3, 'onkotavul@gmail.com', 'Mehedi', 'Hassan', 'Kumilla', '01789767676', 'Kumilla', NULL, NULL),
(4, 'amn@gmail.com', 'Aminul', 'Palash', 'Dhaka', '01723121212', 'Narshingdi', NULL, NULL),
(5, 'amn@gmail.com', 'Aminul', 'Palash', 'Dhaka', '01723121212', 'Narshingdi', NULL, NULL),
(6, 'amn@gmail.com', 'Aminul', 'Hossain', '83/C, Naomohol, Mymensingh', '01789767676', 'Kumilla', NULL, NULL),
(7, 'sk@gmail.com', 'Shakil', 'Hasan', 'Madaripur', '01789767676', 'Dhaka', NULL, NULL),
(8, 'jaggar@gmail.com', 'Ahsan', 'Habib', 'Dhaka, Farmgate', '01992131214', 'Dhaka', NULL, NULL),
(9, 'shuvro@gmail.com', 'Shuvo', 'Dutta', 'GEC, Chittagong', '364523764523', 'Ctg', NULL, NULL),
(10, 'jaggar@gmail.com', 'Shakil', 'Hassan', 'Madaripur', '01789767676', 'Dhaka', NULL, NULL),
(11, 'amn@gmail.com', 'Aminul', 'Palash', 'Dhaka, Farmgate', '364523764523', 'Dhaka', NULL, NULL),
(12, 'onkotavul@gmail.com', 'Tutul', 'Hossain', 'Kumilla', '01533609794', 'Ctg', NULL, NULL),
(13, 'shuvro@gmail.com', 'Shuvo', 'Dutta', 'GEC, Chittagong', '01789767676', 'Ctg', NULL, NULL),
(14, 'abdullah14@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01533609794', 'Dhaka', NULL, NULL),
(15, 'abdullah14@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01723121212', 'Kumilla', NULL, NULL),
(16, 'abd@gmail.com', 'Abdul', 'Baari', 'Dhanmondi 43/B', '01922866643', 'Dhaka', NULL, NULL),
(17, 'abdullah14@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01533609794', 'Dhaka', NULL, NULL),
(18, 'amn@gmail.com', 'Shakil', 'Habib', 'Madaripur', '01723121212', 'Dhaka', NULL, NULL),
(19, 'shsh@gmail.com', 'Sujon', 'Hasan', '88/B, GEC, ROad 2', '01789767676', 'Ctg', NULL, NULL),
(20, 'jony@gmail.com', 'Jony', 'Joynal', 'pahartoli', '01789767676', 'Ctg', NULL, NULL),
(21, 'abdullah14@gmail.com', 'Abdullah', 'Hossain', '83/C, Naomohol, Mymensingh', '01533609794', 'Dhaka', NULL, NULL),
(22, 'onkotavul@gmail.com', 'Mehedi', 'Hassan', 'Kumilla', '01789767676', 'Kumilla', NULL, NULL),
(23, 'hello@gmail.com', 'Abdullah', 'Shuvo', 'Daft', '01922333222', 'Dhaka', NULL, NULL),
(24, 'kabequ@mailinator.com', 'Nolan', 'Macias', 'Praesentium quae ali', '01400332371', 'Est et vel et recusa', NULL, NULL),
(25, 'jerezosuqu@mailinator.com', 'Leslie', 'Talley', 'Obcaecati ipsa dolo', '01400332371', 'Officiis voluptate N', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pub_stat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_image`, `pub_stat`, `created_at`, `updated_at`) VALUES
(1, '/image/sliders/1538402388.jpg', 1, NULL, '2018-10-03 07:15:11'),
(2, '/image/sliders/1538441272.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `social_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `social_name`, `social_link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://www.facebook.com/pages/ecommerce', 1, NULL, '2018-10-02 09:34:38'),
(2, 'Twitter', 'https://www.twitter.com/user/tutul', 1, NULL, '2018-10-03 12:04:39'),
(3, 'GooglePlus', 'https://www.googleplus.com', 1, NULL, NULL),
(4, 'LinkedIn', 'https://www.linkedin.com/user/library', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_image` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `mobile`, `created_at`, `updated_at`, `user_image`) VALUES
(1, 'Abdullah Al Hossain', 'a@gmail.com', '96e79218965eb72c92a549dd5a330112', '01533609794', NULL, NULL, 'user.jpg'),
(2, 'Aminul Haque', 'amn@gmail.com', '96e79218965eb72c92a549dd5a330112', '01981998640', NULL, NULL, 'user.jpg'),
(3, 'Shakil Hasan', 'sk@gmail.com', '96e79218965eb72c92a549dd5a330112', '01533263646', NULL, NULL, 'user.jpg'),
(4, 'Shuvro', 's@gmail.com', '96e79218965eb72c92a549dd5a330112', '16376374', NULL, NULL, 'user.jpg'),
(5, 'tutul', 't@gmail.com', '96e79218965eb72c92a549dd5a330112', '01533609794', NULL, NULL, 'user.jpg'),
(8, 'Abdul Baari', 'abd@gmail.com', '96e79218965eb72c92a549dd5a330112', '+8801922866643', NULL, NULL, 'user.jpg'),
(9, 'Tanvir Shahriar', 'ts@gmail.com', '96e79218965eb72c92a549dd5a330112', '01533263646', NULL, NULL, 'user.jpg'),
(10, 'Vasakar Paul', 'vsk@gmail.com', '96e79218965eb72c92a549dd5a330112', '01533609794', NULL, NULL, 'user.jpg'),
(11, 'Abdullaah', 'abd@gmail.com', '2687cd09e33164767c23a9cae0d2479b', '01533609794', NULL, NULL, 'user.jpg'),
(12, 'hello man', 'hhh@gmail.com', 'd384ece233ea14a88e887d2e0b363753', '01533454545', NULL, NULL, 'user.jpg'),
(13, 'Yusha', 'abd@gmail.com', 'dc4b56ff4967374b261a29cd4a90580d', '01533454545', NULL, '2020-05-30 14:45:45', '1590846336.jpg'),
(14, 'fimina', 'tabepynys@mailinator.com', '40f87cdd28e39587cd8a22dfd0586269', '01400332526', NULL, NULL, 'user.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufactures`
--
ALTER TABLE `manufactures`
  ADD PRIMARY KEY (`man_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pcount`
--
ALTER TABLE `pcount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `manufactures`
--
ALTER TABLE `manufactures`
  MODIFY `man_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pcount`
--
ALTER TABLE `pcount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
