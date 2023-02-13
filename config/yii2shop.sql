-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 07:06 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `auser`
--

CREATE TABLE `auser` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `admin` tinyint(1) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_admin_user`
--

CREATE TABLE `nxt_admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_auth`
--

CREATE TABLE `nxt_auth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `source_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_block`
--

CREATE TABLE `nxt_block` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `controller` varchar(255) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_block_lang`
--

CREATE TABLE `nxt_block_lang` (
  `block_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `html` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_brand`
--

CREATE TABLE `nxt_brand` (
  `id` int(11) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_brand_lang`
--

CREATE TABLE `nxt_brand_lang` (
  `brand_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_buyer`
--

CREATE TABLE `nxt_buyer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `entity` tinyint(1) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_category`
--

CREATE TABLE `nxt_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `main` tinyint(1) NOT NULL DEFAULT 0,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_category_image`
--

CREATE TABLE `nxt_category_image` (
  `category_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_category_lang`
--

CREATE TABLE `nxt_category_lang` (
  `category_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `seo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_complect`
--

CREATE TABLE `nxt_complect` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_complect_lang`
--

CREATE TABLE `nxt_complect_lang` (
  `complect_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_currency`
--

CREATE TABLE `nxt_currency` (
  `id` int(11) NOT NULL,
  `code` varchar(3) NOT NULL,
  `rate` decimal(8,4) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `before` varchar(20) NOT NULL,
  `after` varchar(20) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_currency_lang`
--

CREATE TABLE `nxt_currency_lang` (
  `currency_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `before` varchar(255) DEFAULT NULL,
  `after` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_delivery`
--

CREATE TABLE `nxt_delivery` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_delivery_lang`
--

CREATE TABLE `nxt_delivery_lang` (
  `delivery_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_feature`
--

CREATE TABLE `nxt_feature` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_feature_category`
--

CREATE TABLE `nxt_feature_category` (
  `feature_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_feature_filter`
--

CREATE TABLE `nxt_feature_filter` (
  `feature_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_feature_lang`
--

CREATE TABLE `nxt_feature_lang` (
  `feature_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `after` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_file`
--

CREATE TABLE `nxt_file` (
  `id` int(11) NOT NULL,
  `path` varchar(10) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `extension` varchar(10) NOT NULL,
  `type` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `group` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_image`
--

CREATE TABLE `nxt_image` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `method` varchar(10) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `rotate` smallint(6) DEFAULT NULL,
  `mirror` tinyint(1) DEFAULT 0,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `zoom` smallint(3) DEFAULT NULL,
  `watermark` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_language`
--

CREATE TABLE `nxt_language` (
  `id` varchar(3) NOT NULL,
  `name` varchar(31) NOT NULL,
  `position` smallint(6) DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_liqpay_log`
--

CREATE TABLE `nxt_liqpay_log` (
  `id` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_menu`
--

CREATE TABLE `nxt_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_menu_item`
--

CREATE TABLE `nxt_menu_item` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `icon` varchar(32) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_menu_item_lang`
--

CREATE TABLE `nxt_menu_item_lang` (
  `menu_item_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `label` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_migration`
--

CREATE TABLE `nxt_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_order`
--

CREATE TABLE `nxt_order` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `phone` varchar(12) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `delivery` varchar(255) DEFAULT NULL,
  `delivery_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_order_product`
--

CREATE TABLE `nxt_order_product` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page`
--

CREATE TABLE `nxt_page` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `text` text NOT NULL,
  `short` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `image_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `tags` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `click` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_category`
--

CREATE TABLE `nxt_page_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `is_nav` int(11) NOT NULL DEFAULT 1,
  `sort_order` int(11) NOT NULL DEFAULT 50,
  `page_size` int(11) NOT NULL DEFAULT 10,
  `template` varchar(255) NOT NULL DEFAULT 'post',
  `redirect_url` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_comment`
--

CREATE TABLE `nxt_page_comment` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `author` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `url` varchar(128) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_file`
--

CREATE TABLE `nxt_page_file` (
  `page_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_image`
--

CREATE TABLE `nxt_page_image` (
  `page_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_lang`
--

CREATE TABLE `nxt_page_lang` (
  `page_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `short` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_parent`
--

CREATE TABLE `nxt_page_parent` (
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_page_tag`
--

CREATE TABLE `nxt_page_tag` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `frequency` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_payment`
--

CREATE TABLE `nxt_payment` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_payment_lang`
--

CREATE TABLE `nxt_payment_lang` (
  `payment_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_podbor`
--

CREATE TABLE `nxt_podbor` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_podbor_lang`
--

CREATE TABLE `nxt_podbor_lang` (
  `podbor_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_podbor_product`
--

CREATE TABLE `nxt_podbor_product` (
  `podbor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product`
--

CREATE TABLE `nxt_product` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `price_from` int(11) NOT NULL DEFAULT 0,
  `view` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_category`
--

CREATE TABLE `nxt_product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_complect`
--

CREATE TABLE `nxt_product_complect` (
  `product_id` int(11) NOT NULL,
  `complect_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_file`
--

CREATE TABLE `nxt_product_file` (
  `product_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_lang`
--

CREATE TABLE `nxt_product_lang` (
  `product_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `h1` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `text` text DEFAULT NULL,
  `text_tips` text DEFAULT NULL,
  `text_features` text DEFAULT NULL,
  `text_process` text DEFAULT NULL,
  `text_use` text DEFAULT NULL,
  `text_storage` text DEFAULT NULL,
  `text_short` text DEFAULT NULL,
  `text_top` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_option`
--

CREATE TABLE `nxt_product_option` (
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_product_status`
--

CREATE TABLE `nxt_product_status` (
  `product_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_question`
--

CREATE TABLE `nxt_question` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_review`
--

CREATE TABLE `nxt_review` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `text` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `status` smallint(6) NOT NULL DEFAULT 1,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_setting`
--

CREATE TABLE `nxt_setting` (
  `id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_setting_lang`
--

CREATE TABLE `nxt_setting_lang` (
  `setting_id` varchar(255) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slide`
--

CREATE TABLE `nxt_slide` (
  `id` int(11) NOT NULL,
  `position` tinyint(4) NOT NULL,
  `title` varchar(225) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider`
--

CREATE TABLE `nxt_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `image_count` int(11) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider_image`
--

CREATE TABLE `nxt_slider_image` (
  `id` int(11) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `extension` varchar(255) NOT NULL,
  `mimeType` varchar(255) NOT NULL,
  `byteSize` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `slider_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_slider_image_lang`
--

CREATE TABLE `nxt_slider_image_lang` (
  `slider_image_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `title` varchar(255) NOT NULL,
  `html` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_status`
--

CREATE TABLE `nxt_status` (
  `id` int(11) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_status_lang`
--

CREATE TABLE `nxt_status_lang` (
  `status_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_unit`
--

CREATE TABLE `nxt_unit` (
  `id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_unit_lang`
--

CREATE TABLE `nxt_unit_lang` (
  `unit_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_user`
--

CREATE TABLE `nxt_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `github` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `notify_about_comment_on_email` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_user_addresses`
--

CREATE TABLE `nxt_user_addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `zipcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_value`
--

CREATE TABLE `nxt_value` (
  `id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_value_lang`
--

CREATE TABLE `nxt_value_lang` (
  `value_id` int(11) NOT NULL,
  `lang_id` varchar(3) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `nxt_variant`
--

CREATE TABLE `nxt_variant` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `price` decimal(9,2) DEFAULT NULL,
  `price_old` decimal(9,2) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT 1,
  `image_id` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `enabled` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auser`
--
ALTER TABLE `auser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `nxt_admin_user`
--
ALTER TABLE `nxt_admin_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `nxt_auth`
--
ALTER TABLE `nxt_auth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-auth-user_id-user-id` (`user_id`);

--
-- Indexes for table `nxt_block`
--
ALTER TABLE `nxt_block`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `nxt_block_lang`
--
ALTER TABLE `nxt_block_lang`
  ADD PRIMARY KEY (`block_id`,`lang_id`),
  ADD KEY `fk-block_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_brand`
--
ALTER TABLE `nxt_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_brand-image_id` (`image_id`);

--
-- Indexes for table `nxt_brand_lang`
--
ALTER TABLE `nxt_brand_lang`
  ADD PRIMARY KEY (`brand_id`,`lang_id`),
  ADD KEY `fk-nxt_brand_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_buyer`
--
ALTER TABLE `nxt_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_category`
--
ALTER TABLE `nxt_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_category-image_id` (`image_id`),
  ADD KEY `fk-nxt_category-parent_id` (`parent_id`);

--
-- Indexes for table `nxt_category_image`
--
ALTER TABLE `nxt_category_image`
  ADD PRIMARY KEY (`category_id`,`image_id`),
  ADD KEY `fk-nxt_category_image-image_id` (`image_id`);

--
-- Indexes for table `nxt_category_lang`
--
ALTER TABLE `nxt_category_lang`
  ADD PRIMARY KEY (`category_id`,`lang_id`),
  ADD KEY `fk-nxt_category_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_complect`
--
ALTER TABLE `nxt_complect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_complect_lang`
--
ALTER TABLE `nxt_complect_lang`
  ADD PRIMARY KEY (`complect_id`,`lang_id`),
  ADD KEY `fk-nxt_complect_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_currency`
--
ALTER TABLE `nxt_currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_currency_lang`
--
ALTER TABLE `nxt_currency_lang`
  ADD PRIMARY KEY (`currency_id`,`lang_id`),
  ADD KEY `fk-nxt_currency_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_delivery`
--
ALTER TABLE `nxt_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_delivery_lang`
--
ALTER TABLE `nxt_delivery_lang`
  ADD PRIMARY KEY (`delivery_id`,`lang_id`),
  ADD KEY `fk-delivery_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_feature`
--
ALTER TABLE `nxt_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_feature_category`
--
ALTER TABLE `nxt_feature_category`
  ADD PRIMARY KEY (`feature_id`,`category_id`),
  ADD KEY `fk-nxt_feature_category-category_id` (`category_id`);

--
-- Indexes for table `nxt_feature_filter`
--
ALTER TABLE `nxt_feature_filter`
  ADD PRIMARY KEY (`feature_id`,`category_id`),
  ADD KEY `fk-nxt_feature_filter-category_id` (`category_id`);

--
-- Indexes for table `nxt_feature_lang`
--
ALTER TABLE `nxt_feature_lang`
  ADD PRIMARY KEY (`feature_id`,`lang_id`),
  ADD KEY `fk-nxt_feature_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_file`
--
ALTER TABLE `nxt_file`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-hash` (`hash`),
  ADD KEY `fk-user_id-file` (`user_id`);

--
-- Indexes for table `nxt_image`
--
ALTER TABLE `nxt_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_image-file_id` (`file_id`);

--
-- Indexes for table `nxt_language`
--
ALTER TABLE `nxt_language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_liqpay_log`
--
ALTER TABLE `nxt_liqpay_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-liqpay_log-order_id` (`order_id`);

--
-- Indexes for table `nxt_menu`
--
ALTER TABLE `nxt_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_menu_item`
--
ALTER TABLE `nxt_menu_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-menu_item-menu_id` (`menu_id`),
  ADD KEY `fk-menu_item-parent_id` (`parent_id`);

--
-- Indexes for table `nxt_menu_item_lang`
--
ALTER TABLE `nxt_menu_item_lang`
  ADD PRIMARY KEY (`menu_item_id`,`lang_id`),
  ADD KEY `fk-menu_item_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_migration`
--
ALTER TABLE `nxt_migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `nxt_order`
--
ALTER TABLE `nxt_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-order-buyer_id` (`buyer_id`),
  ADD KEY `fk-order-delivery_id` (`delivery_id`),
  ADD KEY `fk-order-payment_id` (`payment_id`);

--
-- Indexes for table `nxt_order_product`
--
ALTER TABLE `nxt_order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-order_product-order_id` (`order_id`),
  ADD KEY `fk-order_product-variant_id` (`variant_id`);

--
-- Indexes for table `nxt_page`
--
ALTER TABLE `nxt_page`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-page-image_id` (`image_id`),
  ADD KEY `FK_page_category` (`category_id`),
  ADD KEY `Fk_user_posted` (`user_id`);

--
-- Indexes for table `nxt_page_category`
--
ALTER TABLE `nxt_page_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `is_nav` (`is_nav`),
  ADD KEY `sort_order` (`sort_order`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `nxt_page_comment`
--
ALTER TABLE `nxt_page_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `status` (`status`),
  ADD KEY `created_at` (`created_at`);

--
-- Indexes for table `nxt_page_file`
--
ALTER TABLE `nxt_page_file`
  ADD PRIMARY KEY (`page_id`,`file_id`),
  ADD KEY `fk-page_file-file_id` (`file_id`);

--
-- Indexes for table `nxt_page_image`
--
ALTER TABLE `nxt_page_image`
  ADD PRIMARY KEY (`page_id`,`image_id`),
  ADD KEY `fk-page_image-image_id` (`image_id`);

--
-- Indexes for table `nxt_page_lang`
--
ALTER TABLE `nxt_page_lang`
  ADD PRIMARY KEY (`page_id`,`lang_id`),
  ADD KEY `fk-page_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_page_parent`
--
ALTER TABLE `nxt_page_parent`
  ADD PRIMARY KEY (`page_id`,`parent_id`),
  ADD KEY `fk-parent_id` (`parent_id`);

--
-- Indexes for table `nxt_page_tag`
--
ALTER TABLE `nxt_page_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `frequency` (`frequency`);

--
-- Indexes for table `nxt_payment`
--
ALTER TABLE `nxt_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_payment_lang`
--
ALTER TABLE `nxt_payment_lang`
  ADD PRIMARY KEY (`payment_id`,`lang_id`),
  ADD KEY `fk-payment_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_podbor`
--
ALTER TABLE `nxt_podbor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_podbor-parent_id` (`parent_id`);

--
-- Indexes for table `nxt_podbor_lang`
--
ALTER TABLE `nxt_podbor_lang`
  ADD PRIMARY KEY (`podbor_id`,`lang_id`),
  ADD KEY `fk-nxt_podbor_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_podbor_product`
--
ALTER TABLE `nxt_podbor_product`
  ADD PRIMARY KEY (`podbor_id`,`product_id`),
  ADD KEY `fk-nxt_podbor_product-product_id` (`product_id`);

--
-- Indexes for table `nxt_product`
--
ALTER TABLE `nxt_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_product-brand_id` (`brand_id`);

--
-- Indexes for table `nxt_product_category`
--
ALTER TABLE `nxt_product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `fk-nxt_product_category-category_id` (`category_id`);

--
-- Indexes for table `nxt_product_complect`
--
ALTER TABLE `nxt_product_complect`
  ADD PRIMARY KEY (`product_id`,`complect_id`),
  ADD KEY `fk-nxt_product_complect-complect_id` (`complect_id`);

--
-- Indexes for table `nxt_product_file`
--
ALTER TABLE `nxt_product_file`
  ADD PRIMARY KEY (`product_id`,`file_id`),
  ADD KEY `fk-nxt_product_file-file_id` (`file_id`);

--
-- Indexes for table `nxt_product_lang`
--
ALTER TABLE `nxt_product_lang`
  ADD PRIMARY KEY (`product_id`,`lang_id`),
  ADD KEY `fk-nxt_product_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_product_option`
--
ALTER TABLE `nxt_product_option`
  ADD PRIMARY KEY (`product_id`,`option_id`),
  ADD KEY `fk-nxt_product_option-option_id` (`option_id`);

--
-- Indexes for table `nxt_product_status`
--
ALTER TABLE `nxt_product_status`
  ADD PRIMARY KEY (`product_id`,`status_id`),
  ADD KEY `fk-product_status-status_id` (`status_id`);

--
-- Indexes for table `nxt_question`
--
ALTER TABLE `nxt_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_review`
--
ALTER TABLE `nxt_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-review-product_id` (`product_id`);

--
-- Indexes for table `nxt_setting`
--
ALTER TABLE `nxt_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_setting_lang`
--
ALTER TABLE `nxt_setting_lang`
  ADD PRIMARY KEY (`setting_id`,`lang_id`),
  ADD KEY `fk-setting_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_slide`
--
ALTER TABLE `nxt_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_slider`
--
ALTER TABLE `nxt_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_slider_image`
--
ALTER TABLE `nxt_slider_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_slider_image_lang`
--
ALTER TABLE `nxt_slider_image_lang`
  ADD PRIMARY KEY (`slider_image_id`,`lang_id`),
  ADD KEY `fk-nxt_slider_image_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_status`
--
ALTER TABLE `nxt_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_status_lang`
--
ALTER TABLE `nxt_status_lang`
  ADD PRIMARY KEY (`status_id`,`lang_id`),
  ADD KEY `fk-product_status_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_unit`
--
ALTER TABLE `nxt_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nxt_unit_lang`
--
ALTER TABLE `nxt_unit_lang`
  ADD PRIMARY KEY (`unit_id`,`lang_id`),
  ADD KEY `fk-nxt_unit_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_user`
--
ALTER TABLE `nxt_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `nxt_user_addresses`
--
ALTER TABLE `nxt_user_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-user_addresses-user_id` (`user_id`);

--
-- Indexes for table `nxt_value`
--
ALTER TABLE `nxt_value`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-nxt_value_lang-feature_id` (`feature_id`);

--
-- Indexes for table `nxt_value_lang`
--
ALTER TABLE `nxt_value_lang`
  ADD PRIMARY KEY (`value_id`,`lang_id`),
  ADD KEY `fk-nxt_value_lang-lang_id` (`lang_id`);

--
-- Indexes for table `nxt_variant`
--
ALTER TABLE `nxt_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx-nxt_variant-image_id` (`image_id`),
  ADD KEY `fk-nxt_variant-product_id` (`product_id`),
  ADD KEY `fk-nxt_variant-currency_id` (`currency_id`),
  ADD KEY `fk-nxt_variant-unit_id` (`unit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auser`
--
ALTER TABLE `auser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `nxt_admin_user`
--
ALTER TABLE `nxt_admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_auth`
--
ALTER TABLE `nxt_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nxt_block`
--
ALTER TABLE `nxt_block`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_brand`
--
ALTER TABLE `nxt_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nxt_buyer`
--
ALTER TABLE `nxt_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nxt_category`
--
ALTER TABLE `nxt_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nxt_complect`
--
ALTER TABLE `nxt_complect`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nxt_currency`
--
ALTER TABLE `nxt_currency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nxt_delivery`
--
ALTER TABLE `nxt_delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nxt_feature`
--
ALTER TABLE `nxt_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nxt_file`
--
ALTER TABLE `nxt_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=535;

--
-- AUTO_INCREMENT for table `nxt_image`
--
ALTER TABLE `nxt_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=433;

--
-- AUTO_INCREMENT for table `nxt_liqpay_log`
--
ALTER TABLE `nxt_liqpay_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nxt_menu`
--
ALTER TABLE `nxt_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nxt_menu_item`
--
ALTER TABLE `nxt_menu_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_order`
--
ALTER TABLE `nxt_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `nxt_order_product`
--
ALTER TABLE `nxt_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `nxt_page`
--
ALTER TABLE `nxt_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nxt_page_category`
--
ALTER TABLE `nxt_page_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nxt_page_comment`
--
ALTER TABLE `nxt_page_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nxt_page_tag`
--
ALTER TABLE `nxt_page_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nxt_payment`
--
ALTER TABLE `nxt_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nxt_podbor`
--
ALTER TABLE `nxt_podbor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nxt_product`
--
ALTER TABLE `nxt_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `nxt_question`
--
ALTER TABLE `nxt_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nxt_review`
--
ALTER TABLE `nxt_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nxt_slide`
--
ALTER TABLE `nxt_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nxt_slider`
--
ALTER TABLE `nxt_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_slider_image`
--
ALTER TABLE `nxt_slider_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `nxt_status`
--
ALTER TABLE `nxt_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nxt_unit`
--
ALTER TABLE `nxt_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nxt_user`
--
ALTER TABLE `nxt_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_user_addresses`
--
ALTER TABLE `nxt_user_addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nxt_value`
--
ALTER TABLE `nxt_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nxt_variant`
--
ALTER TABLE `nxt_variant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
