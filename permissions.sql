-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 23, 2020 at 11:23 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alateeqg_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'admin', '2020-06-15 07:31:30', '2020-06-15 07:31:30'),
(2, 'role-create', 'admin', '2020-06-15 07:31:30', '2020-06-15 07:31:30'),
(3, 'role-edit', 'admin', '2020-06-15 07:31:30', '2020-06-15 07:31:30'),
(4, 'role-delete', 'admin', '2020-06-15 07:31:30', '2020-06-15 07:31:30'),
(5, 'admin-list', 'admin', '2020-06-15 07:31:30', '2020-06-15 07:31:30'),
(6, 'admin-create', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(7, 'admin-edit', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(8, 'admin-delete', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(9, 'attribute-list', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(10, 'attribute-create', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(11, 'attribute-edit', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(12, 'attribute-delete', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(13, 'attribute_family-list', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(14, 'attribute_family-create', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(15, 'attribute_family-edit', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(16, 'attribute_family-delete', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(17, 'blog-list', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(18, 'blog-create', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(19, 'blog-edit', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(20, 'blog-delete', 'admin', '2020-06-15 07:31:31', '2020-06-15 07:31:31'),
(21, 'category-list', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(22, 'category-create', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(23, 'category-edit', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(24, 'category-delete', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(25, 'city-list', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(26, 'city-create', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(27, 'city-edit', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(28, 'city-delete', 'admin', '2020-06-15 07:31:32', '2020-06-15 07:31:32'),
(29, 'contact-list', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(30, 'contact-create', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(31, 'contact-edit', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(32, 'contact-delete', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(33, 'district-list', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(34, 'district-create', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(35, 'district-edit', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(36, 'district-delete', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(37, 'feature-list', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(38, 'feature-create', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(39, 'feature-edit', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(40, 'feature-delete', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(41, 'item-list', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(42, 'item-create', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(43, 'item-edit', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(44, 'item-delete', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(45, 'option-list', 'admin', '2020-06-15 07:31:33', '2020-06-15 07:31:33'),
(46, 'option-create', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(47, 'option-edit', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(48, 'option-delete', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(49, 'owner-list', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(50, 'owner-create', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(51, 'owner-edit', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(52, 'owner-delete', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(53, 'report-list', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(54, 'service-list', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(55, 'service-create', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(56, 'service-edit', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(57, 'service-delete', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(58, 'service_request-list', 'admin', '2020-06-15 07:31:34', '2020-06-15 07:31:34'),
(59, 'service_request-delete', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(60, 'setting-list', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(61, 'setting-create', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(62, 'setting-edit', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(63, 'user-list', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(64, 'user-create', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(65, 'user-edit', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(66, 'user-delete', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(67, 'notify-monthly', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35'),
(68, 'notify-all', 'admin', '2020-06-15 07:31:35', '2020-06-15 07:31:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
