-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2023 at 05:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'emilabbasov775@gmail.com', '$2y$10$eFDH4.Nmg3IIskh.2FUTreB9x8ojJ/.FyNO48ZUmz1erRXDJRL.sC');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `image`, `phone`, `description`, `email`, `text`, `address`, `facebook`, `twitter`, `linkedin`, `pinterest`) VALUES
(1, 'admin-settings/a692e92d-9c0e-42ad-b4a9-d90f61f0faf9.png', '+994516296674', 'support 24/7 time', 'hello@colorlib.com', 'Free Shipping for all Order of $99', '60-49 Road 11378 New York', 'https://facebook.com', 'https://twitter.com', 'https://linkedin.com', 'https://pinterest.com');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Color', '2023-06-08 04:34:19', '2023-06-08 04:34:19'),
(2, 'Size', '2023-06-08 04:34:26', '2023-06-08 04:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`id`, `attribute_id`, `category_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `attribute_id`, `title`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Red', 'RED', '2023-06-08 04:34:43', '2023-06-08 04:34:43'),
(2, 2, 'L', 'L', '2023-06-08 04:34:57', '2023-06-08 04:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_value_product`
--

CREATE TABLE `attribute_value_product` (
  `id` bigint UNSIGNED NOT NULL,
  `attribute_value_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `image`, `active`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'categories/b2bc35fe-3892-46ac-917c-51e1489beeac.jpg', 1, NULL, '2023-06-06 14:39:50', '2023-06-06 14:39:50'),
(2, 'categories/26f450c1-b1db-4693-a4b4-586b1f0a9bee.jpg', 1, NULL, '2023-06-06 14:40:19', '2023-06-06 14:40:19'),
(3, 'categories/fe96edf0-1684-4da3-bd74-f0931c62e138.jpg', 1, NULL, '2023-06-06 14:40:41', '2023-06-06 14:40:41'),
(4, 'categories/faef9222-292e-4cf4-84af-a3df692ee849.jpg', 1, NULL, '2023-06-06 14:41:09', '2023-06-06 14:41:09'),
(5, 'categories/eeedb266-d343-4f21-a132-fe55d33a1f91.jpg', 1, NULL, '2023-06-06 14:41:35', '2023-06-06 14:41:35'),
(6, 'categories/1a61feba-d323-464c-a653-882c31857190.jpg', 1, NULL, '2023-06-06 14:41:55', '2023-06-06 14:41:55'),
(7, 'categories/102b6fd4-7c6a-48f1-9336-e84759ae0b5e.jpg', 1, NULL, '2023-06-06 14:42:12', '2023-06-06 14:42:12'),
(8, 'categories/bb747173-a8aa-40a2-8726-de277fb8abb0.jpg', 1, NULL, '2023-06-06 14:42:33', '2023-06-06 14:42:33'),
(9, 'categories/b8646d83-000a-4a6c-b8f8-ea112a7ffc14.jpg', 1, NULL, '2023-06-06 14:43:00', '2023-06-06 14:43:00'),
(10, 'categories/51816de1-5932-4383-90b3-d51c53e75782.jpg', 1, NULL, '2023-06-06 14:43:19', '2023-06-06 14:43:19'),
(11, 'categories/65929bf6-4b91-48f2-bb4d-3a10259ed654.jpg', 1, NULL, '2023-06-06 14:43:41', '2023-06-06 14:43:41');

-- --------------------------------------------------------

--
-- Table structure for table `category_translations`
--

CREATE TABLE `category_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_translations`
--

INSERT INTO `category_translations` (`id`, `category_id`, `title`, `slug`, `locale`) VALUES
(1, 1, 'Fresh Meat', 'fresh-meat', 'az'),
(2, 1, 'Fresh Meat', 'fresh-meat', 'en'),
(3, 1, 'Fresh Meat', 'fresh-meat', 'ru'),
(4, 2, 'Vegetables', 'vegetables', 'az'),
(5, 2, 'Vegetables', 'vegetables', 'en'),
(6, 2, 'Vegetables', 'vegetables', 'ru'),
(7, 3, 'Fruit & Nut Gifts', 'fruit-nut-gifts', 'az'),
(8, 3, 'Fruit & Nut Gifts', 'fruit-nut-gifts', 'en'),
(9, 3, 'Fruit & Nut Gifts', 'fruit-nut-gifts', 'ru'),
(10, 4, 'Fresh Berries', 'fresh-berries', 'az'),
(11, 4, 'Fresh Berries', 'fresh-berries', 'en'),
(12, 4, 'Fresh Berries', 'fresh-berries', 'ru'),
(13, 5, 'Ocean Foods', 'ocean-foods', 'az'),
(14, 5, 'Ocean Foods', 'ocean-foods', 'en'),
(15, 5, 'Ocean Foods', 'ocean-foods', 'ru'),
(16, 6, 'Butter & Eggs', 'butter-eggs', 'az'),
(17, 6, 'Butter & Eggs', 'butter-eggs', 'en'),
(18, 6, 'Butter & Eggs', 'butter-eggs', 'ru'),
(19, 7, 'Fastfood', 'fastfood', 'az'),
(20, 7, 'Fastfood', 'fastfood', 'en'),
(21, 7, 'Fastfood', 'fastfood', 'ru'),
(22, 8, 'Fresh Onion', 'fresh-onion', 'az'),
(23, 8, 'Fresh Onion', 'fresh-onion', 'en'),
(24, 8, 'Fresh Onion', 'fresh-onion', 'ru'),
(25, 9, 'Papayaya & Crisps', 'papayaya-crisps', 'az'),
(26, 9, 'Papayaya & Crisps', 'papayaya-crisps', 'en'),
(27, 9, 'Papayaya & Crisps', 'papayaya-crisps', 'ru'),
(28, 10, 'Oatmeal', 'oatmeal', 'az'),
(29, 10, 'Oatmeal', 'oatmeal', 'en'),
(30, 10, 'Oatmeal', 'oatmeal', 'ru'),
(31, 11, 'Fresh Bananas', 'fresh-bananas', 'az'),
(32, 11, 'Fresh Bananas', 'fresh-bananas', 'en'),
(33, 11, 'Fresh Bananas', 'fresh-bananas', 'ru');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint UNSIGNED NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `icon`, `created_at`, `updated_at`) VALUES
(2, '<i class=\"fa-solid fa-phone\"></i>', '2023-06-28 10:37:56', '2023-06-28 10:49:16'),
(3, '<i class=\"fa-solid fa-location-dot\"></i>', '2023-06-28 10:41:21', '2023-06-28 10:41:21'),
(4, '<i class=\"fa-regular fa-clock\"></i>', '2023-06-28 10:42:38', '2023-06-28 10:42:38'),
(5, '<i class=\"fa-regular fa-envelope\"></i>', '2023-06-28 10:44:02', '2023-06-28 10:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_translations`
--

CREATE TABLE `contacts_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts_translations`
--

INSERT INTO `contacts_translations` (`id`, `contact_id`, `title`, `text`, `locale`, `created_at`, `updated_at`) VALUES
(4, 2, 'Telefon', '+01-3-8888-6868', 'az', '2023-06-28 10:37:56', '2023-06-28 10:37:56'),
(5, 2, 'Phone', '+01-3-8888-6868', 'en', '2023-06-28 10:37:56', '2023-06-28 10:39:50'),
(6, 2, 'Телефон', '+01-3-8888-6868', 'ru', '2023-06-28 10:37:56', '2023-06-28 10:37:56'),
(7, 3, 'Adres', '60-49 Road 11378 New York', 'az', '2023-06-28 10:41:21', '2023-06-28 10:41:21'),
(8, 3, 'Address', '60-49 Road 11378 New York', 'en', '2023-06-28 10:41:21', '2023-06-28 10:41:21'),
(9, 3, 'Адрес', '60-49 Road 11378 New York', 'ru', '2023-06-28 10:41:21', '2023-06-28 10:41:21'),
(10, 4, 'Açıq vaxt', '10:00 am to 23:00 pm', 'az', '2023-06-28 10:42:38', '2023-06-28 10:42:38'),
(11, 4, 'Open time', '10:00 am to 23:00 pm', 'en', '2023-06-28 10:42:38', '2023-06-28 10:42:38'),
(12, 4, 'Время открытия', '10:00 am to 23:00 pm', 'ru', '2023-06-28 10:42:38', '2023-06-28 10:42:38'),
(13, 5, 'E-poçt', 'hello@colorlib.com', 'az', '2023-06-28 10:44:02', '2023-06-28 10:44:02'),
(14, 5, 'Email', 'hello@colorlib.com', 'en', '2023-06-28 10:44:02', '2023-06-28 10:44:02'),
(15, 5, 'Электронная почта', 'hello@colorlib.com', 'ru', '2023-06-28 10:44:02', '2023-06-28 10:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `contact_map`
--

CREATE TABLE `contact_map` (
  `id` bigint UNSIGNED NOT NULL,
  `iframe` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_map`
--

INSERT INTO `contact_map` (`id`, `iframe`) VALUES
(2, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12156.871149959885!2d49.8814034!3d40.3818655!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x403087f522f7a277%3A0x2eea3b7e4ce0f6fb!2sAvesta%20Hotel%20Genclik!5e0!3m2!1saz!2saz!4v1687966287591!5m2!1saz!2saz\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `contact_map_translations`
--

CREATE TABLE `contact_map_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `contact_map_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_map_translations`
--

INSERT INTO `contact_map_translations` (`id`, `contact_map_id`, `title`, `phone`, `text`, `locale`) VALUES
(4, 2, 'Bakı', 'Telefon: +994516296674', 'Əlavə et: 4 Xəqani Rüstəmov, Bakı', 'az'),
(5, 2, 'Baku', 'Phone: +994516296674', 'Add: 4 Khagani Rustamov, Baku', 'en'),
(6, 2, 'Баку', 'Телефон: +994516296674', 'Добавлять:Хагани Рустамов 4, Баку', 'ru');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Emil Abbasov', 'emilabbasov775@gmail.com', 'Salaaaam', '2023-06-28 12:10:23', '2023-06-28 12:10:23'),
(3, 'Sexavet', 'sexavet123@gmail.com', 'Sexavet beyendi bunu', '2023-06-28 15:18:30', '2023-06-28 15:18:30'),
(4, 'Emil Abbasov', 'emilabbasov775@gmail.com', 'sacdscdscadsacadsc', '2023-07-02 08:14:10', '2023-07-02 08:14:10'),
(5, 'Salammmm', 'salam@gmail.com', 'salaaaaaam', '2023-07-02 16:11:38', '2023-07-02 16:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `url`, `parent_id`) VALUES
(1, 'http://localhost:8000/', NULL),
(2, 'http://localhost:8000/shop', NULL),
(3, 'http://localhost:8000/#', NULL),
(6, 'http://localhost:8000/basket', NULL),
(7, 'http://localhost:8000/contact', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus_translations`
--

CREATE TABLE `menus_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `menu_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus_translations`
--

INSERT INTO `menus_translations` (`id`, `menu_id`, `title`, `locale`) VALUES
(1, 1, 'EV', 'az'),
(2, 1, 'HOME', 'en'),
(3, 1, 'ДОМ', 'ru'),
(4, 2, 'MAĞAZA', 'az'),
(5, 2, 'SHOP', 'en'),
(6, 2, 'МАГАЗИН', 'ru'),
(7, 3, 'MAĞAZA ƏTRAFLI', 'az'),
(8, 3, 'SHOP DETAILIS', 'en'),
(9, 3, 'ДЕТАЛИ МАГАЗИНА', 'ru'),
(16, 6, 'ALIŞ-VERİŞ KARTI', 'az'),
(17, 6, 'SHOPPING CART', 'en'),
(18, 6, 'КОРЗИНА', 'ru'),
(19, 7, 'KONTAKT', 'az'),
(20, 7, 'CONTACT', 'en'),
(21, 7, 'KONTAKT', 'ru');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2023_05_16_180906_create_admin_table', 1),
(3, '2023_05_18_190142_create_categories_table', 1),
(4, '2023_05_18_192506_create_category_translations_table', 1),
(5, '2023_05_23_120538_create_products_table', 1),
(6, '2023_05_24_113943_create_product_images_table', 1),
(7, '2023_05_25_195618_create_attributes_table', 1),
(8, '2023_05_28_193729_create_attribute_category_table', 1),
(9, '2023_05_31_081524_create_attribute_values_table', 1),
(10, '2023_06_01_222608_create_attribute_value_product_table', 1),
(13, '2023_06_07_125642_create_product_types_table', 2),
(14, '2023_06_08_115129_create_translations_table', 3),
(15, '2023_06_16_092716_create_reviews_table', 4),
(19, '2023_06_27_135437_create_orders_table', 6),
(20, '2023_06_27_140021_create_order_items_table', 6),
(21, '2023_06_28_135615_create_contacts_table', 7),
(22, '2023_06_28_135634_create_contacts_translations_table', 7),
(23, '2023_06_28_145816_create_contact_map_table', 8),
(24, '2023_06_28_145828_create_contact_map_translations_table', 8),
(25, '2023_06_28_154848_create_contact_messages_table', 9),
(31, '2023_06_28_193305_create_organic_table', 10),
(32, '2023_06_28_193333_create_organic_translations_table', 10),
(39, '2023_06_28_210650_create_menus_table', 11),
(40, '2023_06_28_210704_create_menus_translations_table', 11),
(42, '2023_07_01_113010_create_admin_settings_table', 12),
(43, '2023_07_01_150913_create_subscribers_table', 13),
(45, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(46, '2023_07_01_210303_create_users_table', 15),
(47, '2023_07_02_173922_create_password_resets_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(4, 12, 87.33, 'Sexavet 12', '+994555822166', 1, '2023-06-28 09:21:30', '2023-06-28 09:21:30'),
(14, 7, 6.25, 'Unvan 1', '+994516296674', 1, '2023-07-03 13:08:06', '2023-07-03 13:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `sub_total` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `sub_total`, `created_at`, `updated_at`) VALUES
(9, 4, 7, 1, 25.26, 25.26, NULL, NULL),
(10, 4, 10, 1, 2.45, 2.45, NULL, NULL),
(11, 4, 17, 1, 21.51, 21.51, NULL, NULL),
(12, 4, 18, 1, 38.11, 38.11, NULL, NULL),
(28, 14, 26, 5, 1.25, 6.25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `organic`
--

CREATE TABLE `organic` (
  `id` bigint UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organic`
--

INSERT INTO `organic` (`id`, `image`, `url`) VALUES
(1, 'organics/d792412f-5c71-443e-925b-7234b254c8e0.jpg', 'http://localhost:8000/shop');

-- --------------------------------------------------------

--
-- Table structure for table `organic_translations`
--

CREATE TABLE `organic_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `organic_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organic_translations`
--

INSERT INTO `organic_translations` (`id`, `organic_id`, `title`, `text`, `description`, `locale`) VALUES
(1, 1, 'TƏZƏ MEYVƏ', 'Tərəvəz 100% Organik', 'Pulsuz Götürmə və Çatdırılma Mövcuddu', 'az'),
(2, 1, 'FRUIT FRESH', 'Vegetable 100% Organic', 'Free Pickup and Delivery Available', 'en'),
(3, 1, 'ФРУКТЫ СВЕЖИЕ', 'овощ 100% органический', 'Free Pickup and Delivery Available', 'ru');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'emilabbasov775@gmail.com', 'Lc4vORSCHxeAWLeclNrzgXOyJQXdvWwDHG4F15ww5niqvMvZn68tra2TSeg0IH2f', '2023-07-02 13:53:58', NULL),
(2, 'emilabbasov775@gmail.com', 'SdpXjyiEm9NEu9sZv1AIBNq3UmeD8pZazEUKkll2DQAO9ihz5pHCbxF5xqOqmyz8', '2023-07-02 14:11:00', NULL),
(3, 'emilabbasov775@gmail.com', '1pMYmckWvWWRlOG3QwbyGwoMzzSP4QkES1bejXBRVBAX9PN4hwnAEY6WFreyhgJl', '2023-07-02 14:13:26', NULL),
(4, 'emilabbasov775@gmail.com', 'WzrOvggCajEoGj6KtVyuVcFH7kaCTnJVEPlxH5hDYjriLian29e29pAnsrdMOXTA', '2023-07-02 14:18:58', NULL),
(5, 'emilabbasov775@gmail.com', 'vSwmlWmPK10DpZoXcjkxRiVd8bpwa1T7r4x5c6sXfSNJZKTrHa7Hb5vbGdU4RG3c', '2023-07-02 14:26:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `qty` int NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `qty`, `image`, `price`, `created_at`, `updated_at`) VALUES
(7, 1, 1, 'products/953d9e86-16ad-40c9-aa56-dc8323a2ad69.jpg', 25.26, '2023-06-08 07:55:00', '2023-06-08 09:29:33'),
(8, 1, 1, 'products/2d96f2e0-674a-4f92-8e96-c2039b40e7f0.jpg', 21.51, '2023-06-08 08:52:09', '2023-06-08 09:34:00'),
(9, 1, 2, 'products/2082a436-19b5-4d52-95d7-9d56acc8c6ff.jpg', 32.11, '2023-06-12 02:55:20', '2023-06-12 02:55:20'),
(10, 2, 1, 'products/cb5fb871-cee0-43cc-a793-8e0ccdccbea3.jpg', 2.45, '2023-06-12 02:59:28', '2023-06-12 02:59:28'),
(11, 2, 1, 'products/e2fa5c33-049e-4101-a584-af636c35ac34.jpg', 3.20, '2023-06-12 03:04:09', '2023-06-15 14:57:26'),
(12, 2, 1, 'products/e06fcb8b-0b10-4a6c-8772-bb2338cd7a91.jpg', 2.60, '2023-06-12 03:13:18', '2023-06-12 03:13:18'),
(13, 3, 1, 'products/b1c06f5d-61c0-4068-801b-086fd4613c30.jpg', 5.70, '2023-06-12 03:16:48', '2023-06-12 03:16:48'),
(14, 3, 2, 'products/f02fb613-c6fb-4f4d-9ad6-5b9c50493483.jpg', 35.65, '2023-06-12 03:19:19', '2023-06-12 03:19:19'),
(15, 7, 1, 'products/264c77b2-36d4-4487-866d-fef2dab90387.jpg', 15.25, '2023-06-12 03:21:17', '2023-06-12 03:21:17'),
(16, 7, 1, 'products/165fb0be-0642-4635-b56b-8bf44553462f.jpg', 45.30, '2023-06-12 03:23:21', '2023-06-12 03:23:21'),
(17, 3, 1, 'products/4fecd911-fa13-4d36-a7c3-49e8352b0503.jpg', 21.51, '2023-06-12 03:25:20', '2023-06-12 03:25:20'),
(18, 3, 2, 'products/46168647-e650-4169-8d57-0f1bb6f7b0c1.jpg', 38.11, '2023-06-12 03:26:56', '2023-06-12 03:26:56'),
(19, 4, 1, 'products/24051a8e-9a4b-42e8-b0cb-5e8fdf5d0ab6.jpg', 25.65, '2023-06-12 09:09:27', '2023-06-12 09:09:27'),
(20, 4, 1, 'products/ae0478d6-3f7c-4425-8c4f-fb1a715b605a.jpg', 15.75, '2023-06-12 09:11:40', '2023-06-12 09:11:40'),
(21, 4, 1, 'products/2cfb50e7-a3f6-453a-8a4d-ded316cfe5af.jpg', 22.14, '2023-06-12 09:12:54', '2023-06-12 09:12:54'),
(22, 5, 1, 'products/01a003fd-5fc2-4d4b-a6bd-07f3be539aea.jpg', 65.45, '2023-06-12 09:15:06', '2023-06-12 09:15:06'),
(23, 5, 1, 'products/718e0b13-18f3-4352-9adb-8f07751c4070.jpg', 65.25, '2023-06-12 09:16:21', '2023-06-12 09:16:21'),
(24, 5, 1, 'products/8c049d84-0bc1-4f54-83bd-b2ec7a55d592.jpg', 85.25, '2023-06-12 09:18:51', '2023-06-12 09:18:51'),
(25, 7, 3, 'products/7157d186-91d3-47fb-bf69-90bea456bddb.jpg', 12.95, '2023-06-13 04:11:09', '2023-06-13 04:11:09'),
(26, 3, 2, 'products/5c3b01bc-ff78-466a-b80a-7f5c6acaed74.jpg', 1.25, '2023-06-13 04:13:07', '2023-06-13 04:13:07'),
(27, 2, 1, 'products/4e65dce1-9700-4b41-9a6a-4090b1996a3a.jpg', 1.25, '2023-06-13 04:15:18', '2023-06-13 04:15:18'),
(28, 3, 1, 'products/d2f1a46b-39e2-4c58-9e89-c2a5b69509c5.jpg', 35.25, '2023-06-13 04:23:21', '2023-06-13 04:23:21'),
(29, 3, 1, 'products/26f6688c-ce1e-4072-a3da-79f3a4390440.jpg', 2.35, '2023-06-13 04:25:36', '2023-06-13 04:25:36'),
(30, 3, 1, 'products/26478fba-c60f-4510-8f8a-c2e1fca1462b.jpg', 2.45, '2023-06-13 04:27:09', '2023-06-13 04:27:09'),
(31, 3, 5, 'products/d413f1ab-ed49-4dd6-b2e9-f49ea134b8b8.jpg', 5.70, '2023-06-13 08:16:07', '2023-06-13 08:16:07'),
(32, 3, 5, 'products/bdbcd8db-dcd1-45a6-83ae-08b402536092.jpg', 35.65, '2023-06-13 08:18:19', '2023-06-13 08:18:19'),
(33, 3, 5, 'products/4d349a2e-2640-4244-b6c3-4400e8dfd636.jpg', 38.11, '2023-06-13 08:19:50', '2023-06-13 08:19:50'),
(34, 3, 5, 'products/3fec3629-c14b-4a40-a707-461645bad262.jpg', 2.65, '2023-06-13 08:21:21', '2023-06-13 08:21:21'),
(35, 5, 5, 'products/95824ea6-9a65-4aa9-9666-0e13e9651472.jpg', 33.75, '2023-06-13 08:23:29', '2023-06-13 08:23:29'),
(36, 5, 5, 'products/34af0d11-66dc-4d6f-90e1-422172f79a14.jpg', 85.60, '2023-06-13 08:25:32', '2023-06-13 08:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `sort_order`, `created_at`, `updated_at`) VALUES
(2, 8, 'product_images/c3d78dd1-b5f0-4f1e-8857-4b8025de1a8f.jpg', 0, '2023-06-08 08:58:40', '2023-06-15 14:50:46'),
(4, 7, 'product_images/e36c2294-d1b0-4268-9cb7-25494d43080b.jpg', 3, '2023-06-15 14:29:43', '2023-06-15 14:41:11'),
(8, 7, 'product_images/1170beb0-e2da-4b85-a9b6-2e5add7c42f4.jpg', 0, '2023-06-15 14:47:04', '2023-06-15 14:47:04'),
(9, 7, 'product_images/8ab9a277-30f6-4f12-a8a4-2c093819f4ef.jpg', 0, '2023-06-15 14:47:11', '2023-06-15 14:47:11'),
(10, 7, 'product_images/0a9c326b-dec1-4165-8fc1-3cb6e1e09745.jpg', 0, '2023-06-15 14:47:21', '2023-06-15 14:47:21'),
(11, 7, 'product_images/3bf49aa7-f9f4-4932-8b69-c8c901909d49.jpg', 0, '2023-06-15 14:47:29', '2023-06-15 14:47:29'),
(12, 8, 'product_images/78cc8007-7480-4a83-ae2f-e28c7a069fef.jpg', 0, '2023-06-15 14:51:02', '2023-06-15 14:51:02'),
(13, 8, 'product_images/9f962f5d-a31a-45f2-959f-be236c40a1fa.jpg', 0, '2023-06-15 14:51:10', '2023-06-15 14:51:10'),
(14, 9, 'product_images/021de81a-e50f-43a7-90bc-852a098d1614.jpg', 0, '2023-06-15 14:51:31', '2023-06-15 14:51:31'),
(15, 9, 'product_images/5b34187e-0d94-4aa1-8399-2b07fd12a8cd.jpg', 0, '2023-06-15 14:51:37', '2023-06-15 14:51:37'),
(16, 9, 'product_images/7cad483c-d5ac-4fb7-9f22-fa2edbc03ffc.jpg', 0, '2023-06-15 14:51:46', '2023-06-15 14:51:46'),
(17, 9, 'product_images/f9e1e4f4-4bad-4c00-83e0-18ec41b9f2c7.jpg', 0, '2023-06-15 14:51:56', '2023-06-15 14:51:56'),
(18, 10, 'product_images/c3a24e00-b360-4acd-9729-29fd65813602.jpg', 0, '2023-06-15 14:53:02', '2023-06-15 14:53:02'),
(19, 10, 'product_images/c19ad8a9-6d57-4872-a76b-224ab27f92ae.jpg', 0, '2023-06-15 14:53:09', '2023-06-15 14:53:09'),
(20, 10, 'product_images/fa67023e-773f-4aac-99f5-adf41b5fca93.jpg', 0, '2023-06-15 14:53:18', '2023-06-15 14:53:18'),
(21, 10, 'product_images/fc5308aa-1fe0-4380-9909-2be8ca9a1cfd.jpg', 0, '2023-06-15 14:54:35', '2023-06-15 14:54:35'),
(22, 11, 'product_images/fb35e270-f5af-4ae3-89f2-d33cd980fcec.jpg', 0, '2023-06-15 14:55:16', '2023-06-15 14:57:04'),
(23, 11, 'product_images/d7ecfe70-3858-4081-89eb-d3ef91495378.jpg', 1, '2023-06-15 14:55:22', '2023-06-15 14:57:04'),
(24, 11, 'product_images/db7b892f-7deb-4fa8-b9ba-bd93bac75532.jpg', 2, '2023-06-15 14:55:31', '2023-06-15 14:57:04'),
(25, 11, 'product_images/237c8508-2faa-433c-82ca-b27fb5759904.jpg', 3, '2023-06-15 14:55:38', '2023-06-15 14:57:04'),
(26, 12, 'product_images/f6678052-7ae9-4430-a00b-26db415eddbc.jpg', 0, '2023-06-15 14:58:47', '2023-06-15 14:58:47'),
(27, 12, 'product_images/608758a3-43e2-43ff-b687-456165ce3519.jpg', 0, '2023-06-15 14:58:54', '2023-06-15 14:58:54'),
(28, 12, 'product_images/e5e809ed-b95b-473c-81db-8eae0445bc09.jpg', 0, '2023-06-15 14:59:02', '2023-06-15 14:59:02'),
(29, 12, 'product_images/5fa1d391-2414-499c-b14a-07f17d6312e6.jpg', 0, '2023-06-15 14:59:10', '2023-06-15 14:59:10'),
(30, 13, 'product_images/4ab41bbf-a87c-4778-aa17-05b7ed988500.jpg', 0, '2023-06-15 14:59:58', '2023-06-15 14:59:58'),
(31, 13, 'product_images/1f5485cc-9ec1-4e90-94f2-2cd59b6cc403.jpg', 0, '2023-06-15 15:00:05', '2023-06-15 15:00:05'),
(32, 13, 'product_images/344ad8b3-e8ea-49cf-9de2-78ef015c7d2d.jpg', 0, '2023-06-15 15:00:19', '2023-06-15 15:00:19'),
(33, 13, 'product_images/aad37f9a-9830-43bc-9e4d-e9a8a1d4f7a3.jpg', 0, '2023-06-15 15:00:27', '2023-06-15 15:00:27'),
(34, 14, 'product_images/48c98512-2ad2-4f1b-a210-fe3d33762a43.jpg', 0, '2023-06-15 15:01:21', '2023-06-15 15:01:21'),
(35, 14, 'product_images/9c906a79-1c10-49b0-bd06-7da118bbfbb5.jpg', 0, '2023-06-15 15:01:31', '2023-06-15 15:01:31'),
(36, 14, 'product_images/7c19a012-1a48-4ded-bc13-0b74bb91ea15.jpg', 0, '2023-06-15 15:01:41', '2023-06-15 15:01:41'),
(37, 14, 'product_images/cbcc9eeb-ff2b-44ac-ba55-0d87f3aee620.jpg', 0, '2023-06-15 15:01:48', '2023-06-15 15:01:48'),
(38, 15, 'product_images/571323ba-58df-4824-865b-768c5fabd4fc.jpg', 0, '2023-06-15 15:02:29', '2023-06-15 15:02:29'),
(39, 15, 'product_images/fcf7d67f-ff25-4773-b614-493adcd82a2d.jpg', 0, '2023-06-15 15:02:36', '2023-06-15 15:02:36'),
(40, 15, 'product_images/f1a3f56d-6a6b-49b7-8e92-a51f90798d38.jpg', 0, '2023-06-15 15:02:42', '2023-06-15 15:02:42'),
(41, 16, 'product_images/12e593d3-bdbf-4d5e-9e0a-27c6a9ae9336.jpg', 0, '2023-06-15 15:03:28', '2023-06-15 15:03:28'),
(42, 16, 'product_images/93d69bcb-b1c8-40a6-9aac-7dd5520251bd.jpg', 0, '2023-06-15 15:03:35', '2023-06-15 15:03:35'),
(43, 16, 'product_images/d6a4ffa3-2b11-42d4-a2c2-9b8675165948.jpg', 0, '2023-06-15 15:03:44', '2023-06-15 15:03:44'),
(44, 17, 'product_images/4dc3ce64-fcfe-4a0e-bbe3-64e8edc2df5f.jpg', 0, '2023-06-15 15:04:28', '2023-06-15 15:04:28'),
(45, 17, 'product_images/ea6ef671-7060-47c9-ab37-ceecefc9de80.jpg', 0, '2023-06-15 15:04:36', '2023-06-15 15:04:36'),
(46, 17, 'product_images/c31f78dd-020b-4be1-bc9e-46ba1d39ef7f.jpg', 0, '2023-06-15 15:04:44', '2023-06-15 15:04:44'),
(47, 18, 'product_images/7e00ab17-31b1-4ac1-a25a-1d850f0ea6f6.jpg', 0, '2023-06-15 15:05:31', '2023-06-15 15:05:31'),
(48, 18, 'product_images/9b0828c6-530b-4e17-9598-d62320b2122b.jpg', 0, '2023-06-15 15:05:38', '2023-06-15 15:05:38'),
(49, 18, 'product_images/9543cfeb-e79c-4b02-8915-cb938440160c.jpg', 0, '2023-06-15 15:05:44', '2023-06-15 15:05:44'),
(50, 19, 'product_images/604b14bf-d97c-42cc-bbf3-efca07538cd5.jpg', 0, '2023-06-15 15:06:26', '2023-06-15 15:06:26'),
(51, 19, 'product_images/d446c7ca-fc35-4083-a47b-75eaab10be32.jpg', 0, '2023-06-15 15:06:40', '2023-06-15 15:06:40'),
(52, 19, 'product_images/b51e8ed8-9d61-484e-9b1b-5aebe36fba9c.jpg', 0, '2023-06-15 15:06:47', '2023-06-15 15:06:47'),
(53, 20, 'product_images/c6483f8a-4646-4938-8369-71de145b7a4e.jpg', 0, '2023-06-15 15:07:24', '2023-06-15 15:07:24'),
(54, 20, 'product_images/5758bde3-ce8f-4e0d-8c8e-bb263901eb7e.jpg', 0, '2023-06-15 15:07:33', '2023-06-15 15:07:33'),
(55, 20, 'product_images/f5e47cfe-5bc5-4472-80a0-17c45e2ee9c8.jpg', 0, '2023-06-15 15:07:39', '2023-06-15 15:07:39'),
(56, 21, 'product_images/189ec7fe-f467-418a-8105-135268df9d4a.jpg', 0, '2023-06-15 15:08:37', '2023-06-15 15:08:37'),
(57, 21, 'product_images/d8ed4937-c2a3-4d1f-8b63-155c9b487fc0.jpg', 0, '2023-06-15 15:08:44', '2023-06-15 15:08:44'),
(58, 21, 'product_images/6b9e2502-a8e3-4230-aadc-190420722776.jpg', 0, '2023-06-15 15:08:52', '2023-06-15 15:08:52'),
(59, 22, 'product_images/aa0b1852-fa93-4584-adba-68c2a6ee1b80.jpg', 0, '2023-06-15 15:09:27', '2023-06-15 15:09:27'),
(60, 22, 'product_images/0ff4fccf-ff2d-47f2-9ff2-e0fa23d6509a.jpg', 0, '2023-06-15 15:09:33', '2023-06-15 15:09:33'),
(61, 22, 'product_images/b44e99cb-f234-4198-9e71-fe90d6999d43.jpg', 0, '2023-06-15 15:09:39', '2023-06-15 15:09:39'),
(62, 23, 'product_images/8acdf71e-522e-4587-99c3-0412e2746d47.jpg', 0, '2023-06-15 15:10:27', '2023-06-15 15:10:27'),
(63, 23, 'product_images/78a1c709-3974-466c-a9c7-48126c72efe0.jpg', 0, '2023-06-15 15:10:38', '2023-06-15 15:10:38'),
(64, 23, 'product_images/70eeed90-87c7-4452-a67f-ecd1bccf323d.jpg', 0, '2023-06-15 15:10:44', '2023-06-15 15:10:44'),
(65, 24, 'product_images/de773e7c-d115-4876-915b-b041d63c9df0.jpg', 0, '2023-06-15 15:12:10', '2023-06-15 15:12:10'),
(66, 24, 'product_images/ab3a039f-5f8d-4a78-9121-68941c96e2ca.jpg', 0, '2023-06-15 15:12:19', '2023-06-15 15:12:19'),
(67, 24, 'product_images/f819cdf2-0747-4a1a-95aa-7c90f81a8fd1.jpg', 0, '2023-06-15 15:12:28', '2023-06-15 15:12:28'),
(68, 25, 'product_images/e0642f8d-0f15-4dab-b59e-28e06e3b49f5.jpg', 0, '2023-06-15 15:13:18', '2023-06-15 15:13:18'),
(69, 25, 'product_images/ec3f2335-3d49-4fb0-b41b-2ede2d056317.jpg', 0, '2023-06-15 15:13:32', '2023-06-15 15:13:32'),
(70, 25, 'product_images/cc222299-6872-4e45-bef3-20fd80dab87f.jpg', 0, '2023-06-15 15:13:41', '2023-06-15 15:13:41'),
(71, 26, 'product_images/5e50e566-3292-4cdf-9e5f-4d33f576c24d.jpg', 0, '2023-06-15 15:14:27', '2023-06-15 15:14:27'),
(72, 26, 'product_images/a295a1d1-dc21-4cae-9f3b-3e5e8d7ab985.jpg', 0, '2023-06-15 15:14:41', '2023-06-15 15:14:41'),
(73, 26, 'product_images/c1529ef1-e649-476d-890b-049950db6a53.jpg', 0, '2023-06-15 15:14:48', '2023-06-15 15:14:48'),
(74, 27, 'product_images/b54c7a4a-fa65-4fa4-8d5e-ab63204a66a5.jpg', 0, '2023-06-15 15:15:25', '2023-06-15 15:15:25'),
(75, 27, 'product_images/177248f1-098e-422d-80a3-b67d445a1d5a.jpg', 0, '2023-06-15 15:15:32', '2023-06-15 15:15:32'),
(76, 27, 'product_images/682cbb63-63e7-48a8-9951-d6416b676179.jpg', 0, '2023-06-15 15:15:39', '2023-06-15 15:15:39'),
(77, 28, 'product_images/ed56c9be-ffb9-4152-94a4-323983fcf191.jpg', 0, '2023-06-15 15:16:22', '2023-06-15 15:16:22'),
(78, 28, 'product_images/5bc74c04-2155-41a5-9b1c-6823e7aca80d.jpg', 0, '2023-06-15 15:16:30', '2023-06-15 15:16:30'),
(79, 28, 'product_images/f05ffe3e-133a-4426-adc0-119c8820b0ef.jpg', 0, '2023-06-15 15:16:38', '2023-06-15 15:16:38'),
(80, 29, 'product_images/c57d1283-693f-4853-9343-386bf2298089.jpg', 0, '2023-06-15 15:17:17', '2023-06-15 15:17:17'),
(81, 29, 'product_images/6f978a1b-e057-42f2-a869-f8a595b7391c.jpg', 0, '2023-06-15 15:17:43', '2023-06-15 15:17:43'),
(82, 29, 'product_images/6bd14338-b7d8-4aa2-a62b-098a98bdb0db.jpg', 0, '2023-06-15 15:21:12', '2023-06-15 15:21:12'),
(83, 30, 'product_images/8a461832-0ddb-43c9-962c-26e6d2a8218e.jpg', 0, '2023-06-15 15:21:53', '2023-06-15 15:21:53'),
(84, 30, 'product_images/2f322f9d-f274-44c7-8bde-ffbc20b2fda9.jpg', 0, '2023-06-15 15:22:01', '2023-06-15 15:22:01'),
(85, 30, 'product_images/5bdb42a5-3846-49e0-a24d-fa97a7a61a56.jpg', 0, '2023-06-15 15:22:09', '2023-06-15 15:22:09'),
(86, 31, 'product_images/43fc238d-08ee-4cae-bd42-71b079d667eb.jpg', 0, '2023-06-15 15:22:23', '2023-06-15 15:22:23'),
(87, 31, 'product_images/6a4be156-4f97-43d3-92fb-86076862098f.jpg', 0, '2023-06-15 15:22:29', '2023-06-15 15:22:29'),
(88, 31, 'product_images/3395a178-46c8-40aa-83de-d34e6f73fd2e.jpg', 0, '2023-06-15 15:22:36', '2023-06-15 15:22:36'),
(89, 32, 'product_images/ff7b7d24-9e23-433a-a812-940eed3f87a0.jpg', 0, '2023-06-15 15:23:03', '2023-06-15 15:23:03'),
(90, 32, 'product_images/667e48e5-2c22-4fa5-becf-4064f01072e6.jpg', 0, '2023-06-15 15:23:10', '2023-06-15 15:23:10'),
(91, 32, 'product_images/e6b68498-c647-4f51-a306-73767afb0c6f.jpg', 0, '2023-06-15 15:23:17', '2023-06-15 15:23:17'),
(92, 33, 'product_images/e0c4c926-8cb7-4a43-9a28-91093af5cca3.jpg', 0, '2023-06-15 15:23:31', '2023-06-15 15:23:31'),
(93, 33, 'product_images/490b7b07-19ac-4086-827d-f1b4b9166e85.jpg', 0, '2023-06-15 15:23:40', '2023-06-15 15:23:40'),
(94, 33, 'product_images/25f5fdc0-9746-48b4-adb0-2f79ba275960.jpg', 0, '2023-06-15 15:23:46', '2023-06-15 15:23:46'),
(95, 33, 'product_images/a25ec27c-4439-46b7-8988-676c90ddf062.jpg', 0, '2023-06-15 15:23:53', '2023-06-15 15:23:53'),
(96, 34, 'product_images/8357dd02-fc81-4764-8f8f-8e2ff3664b9e.jpg', 0, '2023-06-15 15:24:08', '2023-06-15 15:24:08'),
(97, 34, 'product_images/1614288a-5c70-4a36-8edd-06a7a0592ffb.jpg', 0, '2023-06-15 15:24:17', '2023-06-15 15:24:17'),
(98, 34, 'product_images/9bc8a534-17b2-484a-9374-7d81243bb1a1.jpg', 0, '2023-06-15 15:24:24', '2023-06-15 15:24:24'),
(99, 35, 'product_images/6cba21b0-702f-442e-a232-d50503a2b451.jpg', 0, '2023-06-15 15:25:11', '2023-06-15 15:25:11'),
(100, 35, 'product_images/7b059abf-1c8e-4ed4-bac4-078c08b9fecc.jpg', 0, '2023-06-15 15:25:19', '2023-06-15 15:25:19'),
(101, 35, 'product_images/7cee72f5-0035-4ee4-9b8b-8d0326effb5d.jpg', 0, '2023-06-15 15:25:27', '2023-06-15 15:25:27'),
(102, 36, 'product_images/34d101bd-0c92-494d-83de-05ee9a63d830.jpg', 0, '2023-06-15 15:25:58', '2023-06-15 15:25:58'),
(103, 36, 'product_images/171a8e40-f8ae-4afd-91ee-9a52073462f0.jpg', 0, '2023-06-15 15:26:06', '2023-06-15 15:26:06'),
(104, 36, 'product_images/38c0f227-0cb1-4cdc-b436-ed3e3834e766.jpg', 0, '2023-06-15 15:26:15', '2023-06-15 15:26:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_translations`
--

CREATE TABLE `product_translations` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_translations`
--

INSERT INTO `product_translations` (`id`, `product_id`, `title`, `slug`, `description`, `specs`, `locale`) VALUES
(19, 7, 'Təzə Ət', 'teze-et', 'Təzə Ət', 'Təzə Ət', 'az'),
(20, 7, 'Fresh Meat', 'fresh-meat', 'Fresh Meat', 'Fresh Meat', 'en'),
(21, 7, 'Свежее мясо', 'svezee-miaso', 'Свежее мясо', 'Свежее мясо', 'ru'),
(22, 8, 'Təzə Ət', 'teze-et-1', 'Təzə Ət', 'Təzə Ət', 'az'),
(23, 8, 'Fresh Meat', 'fresh-meat-1', 'Fresh Meat', 'Fresh Meat', 'en'),
(24, 8, 'Свежее мясо', 'svezee-miaso-1', 'Свежее мясо', 'Свежее мясо', 'ru'),
(25, 9, 'Təzə Ət', 'teze-et-3', 'Təzə Ət', 'Təzə Ət', 'az'),
(26, 9, 'Fresh Meat', 'fresh-meat-3', 'Fresh Meat', 'Fresh Meat', 'en'),
(27, 9, 'Свежее мясо', 'svezee-miaso-3', 'Свежее мясо', 'Свежее мясо', 'ru'),
(28, 10, 'Xiyar', 'xiyar', 'Xiyar', 'Xiyar', 'az'),
(29, 10, 'Cucumber', 'cucumber', 'Cucumber', 'Cucumber', 'en'),
(30, 10, 'Oгурец', 'ogurec', 'Oгурец', 'Oгурец', 'ru'),
(31, 11, 'Pomidor', 'pomidor', 'Pomidor', 'Pomidor', 'az'),
(32, 11, 'Tomato', 'tomato', 'Tomato', 'Tomato', 'en'),
(33, 11, 'помидор', 'pomidor', 'помидор', 'помидор', 'ru'),
(34, 12, 'Soğan', 'sogan', 'Soğan', 'Soğan', 'az'),
(35, 12, 'Onion', 'onion', 'Onion', 'Onion', 'en'),
(36, 12, 'лук', 'luk', 'лук', 'лук', 'ru'),
(37, 13, 'Banan', 'banan', 'Banan', 'Banan', 'az'),
(38, 13, 'Banana', 'banana', 'Banana', 'Banana', 'en'),
(39, 13, 'Банан', 'banan', 'Банан', 'Банан', 'ru'),
(40, 14, 'Qoz-Fındıq Hədiyyələri', 'qoz-findiq-hediyyeleri', 'Qoz-Fındıq Hədiyyələri', 'Qoz-Fındıq Hədiyyələri', 'az'),
(41, 14, 'Nut Gifts', 'nut-gifts', 'Nut Gifts', 'Nut Gifts', 'en'),
(42, 14, 'Ореховые подарки', 'orexovye-podarki', 'Ореховые подарки', 'Ореховые подарки', 'ru'),
(43, 15, 'Hamburger', 'hamburger', 'Hamburger', 'Hamburger', 'az'),
(44, 15, 'Hamburger', 'hamburger', 'Hamburger', 'Hamburger', 'en'),
(45, 15, 'Гамбургер', 'gamburger', 'Гамбургер', 'Гамбургер', 'ru'),
(46, 16, 'Hamburger && Kartof', 'hamburger-kartof', 'Hamburger && Kartof', 'Hamburger && Kartof', 'az'),
(47, 16, 'Hamburger && Free', 'hamburger-free', 'Hamburger && Free', 'Hamburger && Free', 'en'),
(48, 16, 'Гамбургер && Картофель', 'gamburger-kartofel', 'Гамбургер  && Картофель', 'Гамбургер && Картофель', 'ru'),
(49, 17, 'Portağal', 'portagal', 'Portağal', 'Portağal', 'az'),
(50, 17, 'Orange', 'orange', 'Orange', 'Orange', 'en'),
(51, 17, 'Апельсин', 'apelsin', 'Апельсин', 'Апельсин', 'ru'),
(52, 18, 'Kivi', 'kivi', 'Kivi', 'Kivi', 'az'),
(53, 18, 'Kiwi', 'kiwi', 'Kiwi', 'Kiwi', 'en'),
(54, 18, 'Kиви', 'kivi', 'Kиви', 'Kиви', 'ru'),
(55, 19, 'Giləmeyvə', 'gilemeyve', 'Giləmeyvə', 'Giləmeyvə', 'az'),
(56, 19, 'Berries', 'berries', 'Berries', 'Berries', 'en'),
(57, 19, 'Ягоды', 'iagody', 'Ягоды', 'Ягоды', 'ru'),
(58, 20, 'Qarağat', 'qaragat', 'Qarağat', 'Qarağat', 'az'),
(59, 20, 'Currant', 'currant', 'Currant', 'Currant', 'en'),
(60, 20, 'Смородина', 'smorodina', 'Смородина', 'Смородина', 'ru'),
(61, 21, 'Maılina', 'mailina', 'Maılina', 'Maılina', 'az'),
(62, 21, 'Raspberries', 'raspberries', 'Raspberries', 'Raspberries', 'en'),
(63, 21, 'Малина', 'malina', 'Малина', 'Малина', 'ru'),
(64, 22, 'Dəniz Məhsulları', 'deniz-mehsullari', 'Dəniz Məhsulları', 'Dəniz Məhsulları', 'az'),
(65, 22, 'Ocean Foods', 'ocean-foods', 'Ocean Foods', 'Ocean Foods', 'en'),
(66, 22, 'Морепродукты', 'moreprodukty', 'Морепродукты', 'Морепродукты', 'ru'),
(67, 23, 'Balıq', 'baliq', 'Balıq', 'Balıq', 'az'),
(68, 23, 'Fish', 'fish', 'Fish', 'Fish', 'en'),
(69, 23, 'Рыба', 'ryba', 'Рыба', 'Рыба', 'ru'),
(70, 24, 'Xərçəng', 'xerceng', 'Xərçəng', 'Xərçəng', 'az'),
(71, 24, 'Cancer', 'cancer', 'Cancer', 'Cancer', 'en'),
(72, 24, 'Рак', 'rak', 'Рак', 'Рак', 'ru'),
(73, 25, 'Hamburger', 'hamburger-free', 'Hamburger', 'Hamburger', 'az'),
(74, 25, 'Hamburger', 'hamburger-free-2', 'Hamburger', 'Hamburger', 'en'),
(75, 25, 'Гамбургер', 'gamburger-free-2', 'Гамбургер', 'Гамбургер', 'ru'),
(76, 26, 'Qarpız', 'qarpiz', 'Qarpız', 'Qarpız', 'az'),
(77, 26, 'Watermelon', 'watermelon', 'Watermelon', 'Watermelon', 'en'),
(78, 26, 'Арбуз', 'arbuz', 'Арбуз', 'Арбуз', 'ru'),
(79, 27, 'Bibər', 'biber', 'Bibər', 'Bibər', 'az'),
(80, 27, 'Pepper', 'pepper', 'Pepper', 'Pepper', 'en'),
(81, 27, 'Перец', 'perec', 'Перец', 'Перец', 'ru'),
(82, 28, 'Avakado', 'avakado', 'Avakado', 'Avakado', 'az'),
(83, 28, 'Avocado', 'avocado', 'Avocado', 'Avocado', 'en'),
(84, 28, 'Авокадо', 'avokado', 'Авокадо', 'Авокадо', 'ru'),
(85, 29, 'Naringi', 'naringi', 'Naringi', 'Naringi', 'az'),
(86, 29, 'Tangerine', 'tangerine', 'Tangerine', 'Tangerine', 'en'),
(87, 29, 'мандарин', 'mandarin', 'мандарин', 'мандарин', 'ru'),
(88, 30, 'Alma', 'alma', 'Alma', 'Alma', 'az'),
(89, 30, 'Apple', 'apple', 'Apple', 'Apple', 'en'),
(90, 30, 'Яблоко', 'iabloko', 'Яблоко', 'Яблоко', 'ru'),
(91, 31, 'Banan', 'banann', 'Banan', 'Banan', 'az'),
(92, 31, 'Banana', 'bananaa', 'Banana', 'Banana', 'en'),
(93, 31, 'Банан', 'banann', 'Банан', 'Банан', 'ru'),
(94, 32, 'Qoz-Fındıq Hədiyyələri', 'qoz-findiq-hediyyelerii', 'Qoz-Fındıq Hədiyyələri', 'Qoz-Fındıq Hədiyyələri', 'az'),
(95, 32, 'Nut Gifts', 'nut-giftss', 'Nut Gifts', 'Nut Gifts', 'en'),
(96, 32, 'Ореховые подарки', 'oorexovye-podarki', 'Ореховые подарки', 'Ореховые подарки', 'ru'),
(97, 33, 'Kivi', 'kivii', 'Kivi', 'Kivi', 'az'),
(98, 33, 'Kiwi', 'kiwii', 'Kiwi', 'Kiwi', 'en'),
(99, 33, 'Kиви', 'kivii', 'Kиви', 'Kиви', 'ru'),
(100, 34, 'Alma', 'almaa', 'Alma', 'Alma', 'az'),
(101, 34, 'Apple', 'applee', 'Apple', 'Apple', 'en'),
(102, 34, 'Яблоко', 'iablokoo', 'Яблоко', 'Яблоко', 'ru'),
(103, 35, 'Krevetka', 'krevetka', 'Krevetka', 'Krevetka', 'az'),
(104, 35, 'Shrimp', 'shrimp', 'Shrimp', 'Shrimp', 'en'),
(105, 35, 'Креветка', 'krevetka', 'Креветка', 'Креветка', 'ru'),
(106, 36, 'Qızıl Balıq', 'qizil-baliq', 'Qızıl Balıq', 'Qızıl Balıq', 'az'),
(107, 36, 'Salmon', 'salmon', 'Salmon', 'Salmon', 'en'),
(108, 36, 'Лосось', 'losos', 'Лосось', 'Лосось', 'ru');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `type` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `product_id`, `type`) VALUES
(29, 8, 0),
(31, 10, 0),
(33, 12, 0),
(35, 14, 0),
(36, 15, 0),
(38, 17, 0),
(39, 18, 0),
(40, 19, 0),
(42, 21, 0),
(43, 22, 0),
(44, 23, 0),
(45, 24, 0),
(54, 33, 2),
(60, 16, 3),
(61, 20, 3),
(67, 13, 0),
(68, 13, 1),
(69, 34, 3),
(70, 9, 0),
(71, 9, 3),
(75, 25, 0),
(76, 25, 1),
(77, 26, 0),
(78, 26, 1),
(79, 26, 3),
(80, 27, 0),
(81, 27, 1),
(82, 28, 0),
(83, 28, 1),
(84, 29, 0),
(85, 29, 3),
(86, 30, 0),
(87, 30, 1),
(88, 31, 0),
(89, 31, 2),
(90, 32, 0),
(91, 32, 2),
(92, 36, 0),
(93, 36, 2),
(94, 35, 0),
(95, 35, 2),
(96, 7, 0),
(97, 11, 0),
(98, 11, 2),
(99, 11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` smallint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `comment`, `full_name`, `email`, `rating`, `created_at`, `updated_at`) VALUES
(37, 22, 'bad', 'sexavet', 'saasxasxas@sxs.com', 1, '2023-06-16 14:01:37', '2023-06-16 14:01:37'),
(38, 22, 'nice', 'sexavet', 'emilabbasov775@gmail.com', 2, '2023-06-16 14:01:54', '2023-06-16 14:01:54'),
(39, 22, 'Very Good', 'Emil Abbasov', 'emilabbasov775@gmail.com', 5, '2023-06-16 14:02:11', '2023-06-16 14:02:11'),
(40, 22, 'Good', 'Omer', 'omer@sj.com', 4, '2023-06-16 14:02:45', '2023-06-16 14:02:45'),
(41, 8, 'zor', 'Emil Abbasov', 'emilabbasov775@gmail.com', 4, '2023-06-19 09:07:41', '2023-06-19 09:07:41'),
(42, 11, 'eladi qaqa', 'Emil Abbasov', 'emilabbasov775@gmail.com', 5, '2023-06-23 02:51:18', '2023-06-23 02:51:18'),
(43, 11, 'beledana', 'sexavet', 'saasxasxas@sxs.com', 2, '2023-06-23 02:51:40', '2023-06-23 02:51:40'),
(44, 13, 'Ela idi', 'sxaxa', 'senan123@gmial.com', 5, '2023-07-02 15:56:59', '2023-07-02 15:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscribed`, `created_at`, `updated_at`) VALUES
(3, 'emilabbasov775@gmail.com', 0, '2023-07-01 17:14:33', '2023-07-02 08:14:22'),
(4, 'sexavet123@gmail.com', 0, '2023-07-01 17:14:40', '2023-07-01 17:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` bigint UNSIGNED NOT NULL,
  `value` json NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`id`, `value`, `key`, `created_at`, `updated_at`) VALUES
(2, '{\"az\": \"Ev\", \"en\": \"Home\", \"ru\": \"DOM\"}', 'home', '2023-06-08 07:53:27', '2023-06-08 07:53:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`, `updated_at`) VALUES
(7, 'emilabbasov775@gmail.com', '$2y$10$zcI/s8oSRufctyJqPNHhtuAkdvCBZOabMyC8uMPUCRwBrUFLOW..C', '2023-07-03 11:43:36', '2023-07-03 11:43:36'),
(8, 'vusal123@gmail.com', '$2y$10$/tSqix5IUovwsDFfdg3.LuYS46QRtB1JtK8RWyavCSy76JU2wjdS2', '2023-07-03 11:51:05', '2023-07-03 11:51:05'),
(9, 'sexavet123@gmail.com', '$2y$10$mNzJKkAn4GK6k/fhYlr0nuEX5xGbxZDf7b2YNFNgKNkfOSxME8Ll2', '2023-07-03 12:58:10', '2023-07-03 12:58:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_category_category_id_foreign` (`category_id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `attribute_value_product`
--
ALTER TABLE `attribute_value_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_value_product_attribute_value_id_foreign` (`attribute_value_id`),
  ADD KEY `attribute_value_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_translations_category_id_locale_unique` (`category_id`,`locale`),
  ADD KEY `category_translations_locale_index` (`locale`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts_translations`
--
ALTER TABLE `contacts_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_translations_contact_id_locale_unique` (`contact_id`,`locale`),
  ADD KEY `contacts_translations_locale_index` (`locale`);

--
-- Indexes for table `contact_map`
--
ALTER TABLE `contact_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_map_translations`
--
ALTER TABLE `contact_map_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contact_map_translations_contact_map_id_locale_unique` (`contact_map_id`,`locale`),
  ADD KEY `contact_map_translations_locale_index` (`locale`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `menus_translations`
--
ALTER TABLE `menus_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_translations_menu_id_locale_unique` (`menu_id`,`locale`),
  ADD KEY `menus_translations_locale_index` (`locale`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `organic`
--
ALTER TABLE `organic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organic_translations`
--
ALTER TABLE `organic_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organic_translations_organic_id_locale_unique` (`organic_id`,`locale`),
  ADD KEY `organic_translations_locale_index` (`locale`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_translations_product_id_locale_unique` (`product_id`,`locale`),
  ADD KEY `product_translations_locale_index` (`locale`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_types_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscribers_email_unique` (`email`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_category`
--
ALTER TABLE `attribute_category`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attribute_value_product`
--
ALTER TABLE `attribute_value_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_translations`
--
ALTER TABLE `category_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts_translations`
--
ALTER TABLE `contacts_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contact_map`
--
ALTER TABLE `contact_map`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_map_translations`
--
ALTER TABLE `contact_map_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menus_translations`
--
ALTER TABLE `menus_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `organic`
--
ALTER TABLE `organic`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organic_translations`
--
ALTER TABLE `organic_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `product_translations`
--
ALTER TABLE `product_translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_value_product`
--
ALTER TABLE `attribute_value_product`
  ADD CONSTRAINT `attribute_value_product_attribute_value_id_foreign` FOREIGN KEY (`attribute_value_id`) REFERENCES `attribute_values` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attribute_value_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_translations`
--
ALTER TABLE `category_translations`
  ADD CONSTRAINT `category_translations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts_translations`
--
ALTER TABLE `contacts_translations`
  ADD CONSTRAINT `contacts_translations_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contact_map_translations`
--
ALTER TABLE `contact_map_translations`
  ADD CONSTRAINT `contact_map_translations_contact_map_id_foreign` FOREIGN KEY (`contact_map_id`) REFERENCES `contact_map` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menus_translations`
--
ALTER TABLE `menus_translations`
  ADD CONSTRAINT `menus_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `organic_translations`
--
ALTER TABLE `organic_translations`
  ADD CONSTRAINT `organic_translations_organic_id_foreign` FOREIGN KEY (`organic_id`) REFERENCES `organic` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_translations`
--
ALTER TABLE `product_translations`
  ADD CONSTRAINT `product_translations_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_types`
--
ALTER TABLE `product_types`
  ADD CONSTRAINT `product_types_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
