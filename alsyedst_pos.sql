-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 16, 2021 at 10:51 AM
-- Server version: 5.7.34
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alsyedst_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `account_ref_no` int(11) NOT NULL,
  `account_customer_id` int(11) NOT NULL,
  `account_supplier_id` int(11) NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_note` text COLLATE utf8mb4_unicode_ci,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_initial_balance` decimal(10,2) NOT NULL,
  `account_total_amount` decimal(10,2) NOT NULL,
  `account_amount_paid` decimal(10,2) NOT NULL,
  `account_amount_dues` decimal(10,2) NOT NULL,
  `account_document` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_payments`
--

CREATE TABLE `account_payments` (
  `account_payments_id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `payment_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_ref_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_ref_no`, `parent_company`, `brand_name`, `brand_description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Samsung', 'Samsung Mobile', 'Mobile phone brand', 1, NULL, NULL),
(2, NULL, 'Nestle', 'Nestlé Pure Life', 'Water brand', 1, NULL, NULL),
(3, NULL, 'Nestle', 'Nido', 'Milk powder', 1, NULL, NULL),
(4, NULL, 'Nestle', 'Nescafé', 'Coffee brand', 1, NULL, NULL),
(5, NULL, 'Nestle', 'Maggi', 'Noodles brand', 1, NULL, NULL),
(6, NULL, 'Phoenix', 'Software', NULL, 1, NULL, NULL),
(7, NULL, 'Unilever', 'Head $ Shouler', NULL, 1, NULL, NULL),
(9, NULL, 'Unilever', 'knorr', NULL, 1, NULL, NULL),
(10, NULL, 'P&g', 'areal', NULL, 1, NULL, NULL),
(11, NULL, 'Medicam', 'medicam toothpaste', NULL, 1, NULL, NULL),
(12, NULL, 'Medicam', 'Medicam Shaving Cream', NULL, 1, NULL, NULL),
(13, NULL, 'Medicam', 'Telcum Powder', NULL, 1, NULL, NULL),
(14, NULL, 'Nestle', 'Lactogen', NULL, 1, NULL, NULL),
(15, NULL, 'Nestle', 'Cerelac', NULL, 1, NULL, NULL),
(16, NULL, 'Shan', 'Shan Masalah', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `company_ref_no` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_description` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_ref_no`, `company_parent`, `company_name`, `company_description`, `status_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Samsung', 'Samsung Good company', 1, NULL, NULL),
(2, NULL, NULL, 'Nestle', 'Multinational Company', 1, NULL, NULL),
(3, NULL, NULL, 'Phoenix', NULL, 1, NULL, NULL),
(5, NULL, NULL, 'Unilever', NULL, 1, NULL, NULL),
(6, NULL, NULL, 'P&g', NULL, 1, NULL, NULL),
(7, NULL, NULL, 'bona papa', NULL, 1, NULL, NULL),
(8, NULL, NULL, 'Medicam', NULL, 1, NULL, NULL),
(9, NULL, NULL, 'Shan', NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_shop_info` text COLLATE utf8mb4_unicode_ci,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_alternate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_cnic_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_shop_address` text COLLATE utf8mb4_unicode_ci,
  `customer_resident_address` text COLLATE utf8mb4_unicode_ci,
  `customer_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_office_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_alternate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_total_balance` decimal(10,2) DEFAULT NULL,
  `customer_balance_paid` decimal(10,2) DEFAULT NULL,
  `customer_balance_dues` decimal(10,2) DEFAULT NULL,
  `customer_credit_duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_credit_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_credit_limit` int(11) DEFAULT NULL,
  `customer_sale_rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `customer_created_by` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ref_no`, `customer_type`, `customer_name`, `customer_shop_name`, `customer_shop_info`, `customer_email`, `customer_alternate_email`, `customer_cnic_number`, `customer_town`, `customer_area`, `customer_shop_address`, `customer_resident_address`, `customer_zipcode`, `customer_phone_number`, `customer_office_number`, `customer_alternate_number`, `customer_total_balance`, `customer_balance_paid`, `customer_balance_dues`, `customer_credit_duration`, `customer_credit_type`, `customer_credit_limit`, `customer_sale_rate`, `status_id`, `customer_created_by`, `created_at`, `updated_at`) VALUES
(1, '00', 'general', 'Walk-in Customer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3299.00, 925.00, '0', 'days', 0, 'nonbulk', 1, 2, NULL, NULL),
(2, 'L738G1', 'general', 'Safdar Ali', 'Super Mart', 'A Super Store', NULL, NULL, NULL, 'Al-Abbas Town', 'Gulshan Iqbal, Karachi', 'abc', 'abc', NULL, NULL, NULL, NULL, NULL, 19197.00, 4076.00, '0', 'days', 0, 'cash', 1, 2, NULL, NULL),
(3, 'VQ8W7', 'general', 'Haris Ghaznavi', 'The Haris', 'Grocery Items', NULL, NULL, NULL, 'Al-Asif', 'Karachi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1230.00, 3797.00, '30', 'days', 35000, 'credit', 1, 2, NULL, NULL),
(4, 'CY3Q9', 'general', 'Saad', 'any shop', 'abcdefg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11080.00, 22016.00, '0', 'days', 0, 'cash', 1, 2, NULL, NULL),
(5, '1204', 'reseller', 'JAWEED', 'SUPER G.STORE', NULL, NULL, NULL, NULL, 'KARACHI', 'N.KARACHI', 'R.22 HROON HIEGHT', NULL, NULL, '03125002555', NULL, NULL, NULL, 0.00, 50933.00, '7', 'days', 25000, 'cash', 1, 2, NULL, NULL),
(6, '122', 'reseller', 'muneeb', 'tooba store', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2020.00, 0.00, NULL, NULL, NULL, 'cash', 1, 2, NULL, NULL),
(7, '2520', 'distributer', 'arif', '786 store', NULL, NULL, NULL, '2556666', NULL, NULL, NULL, NULL, NULL, '258744', NULL, NULL, NULL, 2850.00, 0.00, '7', 'days', 10000, 'nonbulk', 1, 2, NULL, NULL),
(8, '1000', 'general', 'faisal khan', 'faisal store', NULL, NULL, NULL, NULL, NULL, 'surjani town', 'sec 5d', 'sec 11b', NULL, '0312684689', NULL, NULL, NULL, 28890.00, 7886.00, '5', 'days', 1000, 'cash', 1, 2, NULL, NULL),
(9, '200', 'general', 'Soomro', 'Soomro Store', NULL, NULL, NULL, NULL, NULL, 'Surjani', 'ksopjko0jkd', 'pklpdklpas', NULL, '01518301568', NULL, NULL, NULL, 30679.00, -13095.00, '10', 'days', 5000, 'credit', 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE `folder` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(10) UNSIGNED DEFAULT NULL,
  `resource` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `created_at`, `updated_at`, `name`, `folder_id`, `resource`) VALUES
(1, NULL, NULL, 'root', NULL, NULL),
(2, NULL, NULL, 'resource', 1, 1),
(3, NULL, NULL, 'documents', 1, NULL),
(4, NULL, NULL, 'graphics', 1, NULL),
(5, NULL, NULL, 'other', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `delete` tinyint(1) NOT NULL,
  `pagination` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `created_at`, `updated_at`, `name`, `table_name`, `read`, `edit`, `add`, `delete`, `pagination`) VALUES
(1, NULL, NULL, 'Example', 'example', 1, 1, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `form_field`
--

CREATE TABLE `form_field` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `browse` tinyint(1) NOT NULL,
  `read` tinyint(1) NOT NULL,
  `edit` tinyint(1) NOT NULL,
  `add` tinyint(1) NOT NULL,
  `relation_table` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation_column` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_field`
--

INSERT INTO `form_field` (`id`, `created_at`, `updated_at`, `name`, `type`, `browse`, `read`, `edit`, `add`, `relation_table`, `relation_column`, `form_id`, `column_name`) VALUES
(1, NULL, NULL, 'Title', 'text', 1, 1, 1, 1, NULL, NULL, 1, 'name'),
(2, NULL, NULL, 'Description', 'text_area', 1, 1, 1, 1, NULL, NULL, 1, 'description'),
(3, NULL, NULL, 'Status', 'relation_select', 1, 1, 1, 1, 'status', 'name', 1, 'status_id');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `invoice_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `sale_return_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `purchase_return_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `invoice_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `uuid` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE `menulist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menulist`
--

INSERT INTO `menulist` (`id`, `name`) VALUES
(1, 'sidebar menu'),
(2, 'top menu');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `href`, `icon`, `slug`, `parent_id`, `menu_id`, `sequence`) VALUES
(1, 'Dashboard', '/', 'cil-speedometer', 'link', NULL, 1, 1),
(2, 'Settings', NULL, 'cil-settings', 'dropdown', NULL, 1, 2),
(3, 'Users', '/users', NULL, 'link', 2, 1, 3),
(4, 'Edit menu', '/menu/menu', NULL, 'link', 2, 1, 4),
(5, 'Edit menu elements', '/menu/element', NULL, 'link', 2, 1, 5),
(6, 'Edit roles', '/roles', NULL, 'link', 2, 1, 6),
(7, 'Login', '/login', 'cil-account-logout', 'link', NULL, 1, 7),
(8, 'Buisness Contacts', NULL, 'cil-address-book', 'dropdown', NULL, 1, 8),
(9, 'Customers List', '/customer', NULL, 'link', 8, 1, 9),
(10, 'Add Customer', '/customer/create', NULL, 'link', 8, 1, 10),
(11, 'Suppliers List', '/supplier', NULL, 'link', 8, 1, 11),
(12, 'Add Supplier', '/supplier/create', NULL, 'link', 8, 1, 12),
(13, 'Product Management', NULL, 'cil-storage', 'dropdown', NULL, 1, 13),
(14, 'Products List', '/product', NULL, 'link', 13, 1, 14),
(15, 'Add Product', '/product/create', NULL, 'link', 13, 1, 15),
(16, 'Companies List', '/company', NULL, 'link', 13, 1, 16),
(17, 'Add Company', '/company/create', NULL, 'link', 13, 1, 17),
(18, 'Brands List', '/brand', NULL, 'link', 13, 1, 18),
(19, 'Add Brand', '/brand/create', NULL, 'link', 13, 1, 19),
(20, 'Sale/Party Section', NULL, 'cil-cart', 'dropdown', NULL, 1, 20),
(21, 'Sale Counter', '/sale/pos', NULL, 'link', 20, 1, 21),
(22, 'Sales List', '/sale', NULL, 'link', 20, 1, 22),
(23, 'Add Sale', '/sale/pos', NULL, 'link', 20, 1, 23),
(24, 'Payment List', '/sale/payment', NULL, 'link', 20, 1, 24),
(25, 'Add Payment', '/sale/payment/create', NULL, 'link', 20, 1, 25),
(26, 'Financial', '/sale/financial', NULL, 'link', 20, 1, 26),
(27, 'Sale Return List', '/sale/return', NULL, 'link', 20, 1, 27),
(28, 'Purchase Section', NULL, 'cil-money', 'dropdown', NULL, 1, 28),
(29, 'Purchases List', '/purchase', NULL, 'link', 28, 1, 29),
(30, 'Add Purchase', '/purchase/create', NULL, 'link', 28, 1, 30),
(31, 'Payment List', '/purchase/payment', NULL, 'link', 28, 1, 31),
(32, 'Add Payment', '/purchase/payment/create', NULL, 'link', 28, 1, 32),
(33, 'Ledger', '/purchase/ledger', NULL, 'link', 28, 1, 33),
(34, 'Purchase Return List', '/purchase/return', NULL, 'link', 28, 1, 34),
(36, 'Available Stock', '/purchase/available', NULL, 'link', 28, 1, 36),
(37, 'Damage Stock', '/purchase/damage', NULL, 'link', 28, 1, 37),
(38, 'Minimum Stock', '/purchase/minimum', NULL, 'link', 28, 1, 38),
(39, 'Sale Report', NULL, 'cil-library', 'dropdown', NULL, 1, 39),
(40, 'Date Wise', '/report/date', NULL, 'link', 39, 1, 40),
(41, 'Cash/Credit Wise', '/report/cashcredit', NULL, 'link', 39, 1, 41),
(42, 'Customer Wise', '/report/customer', NULL, 'link', 39, 1, 42),
(43, 'Brand Wise', '/report/brand', NULL, 'link', 39, 1, 43),
(44, 'Company Wise', '/report/company', NULL, 'link', 39, 1, 44),
(45, 'Balance Sheet', NULL, 'cil-spreadsheet', 'dropdown', NULL, 1, 45),
(46, 'Customer Wise', '/balance/customers', NULL, 'link', 45, 1, 46),
(47, 'Sale Wise', '/balance/sales', NULL, 'link', 45, 1, 47),
(48, 'Purchase Wise', '/balance/purchases', NULL, 'link', 45, 1, 48),
(49, 'CreditDuration Wise', '/balance/creditduration', NULL, 'link', 45, 1, 49);

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menus_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `role_name`, `menus_id`) VALUES
(1, 'guest', 1),
(2, 'user', 1),
(3, 'admin', 1),
(4, 'superadmin', 1),
(5, 'admin', 2),
(6, 'superadmin', 2),
(7, 'admin', 3),
(8, 'superadmin', 3),
(9, 'admin', 400),
(10, 'superadmin', 4),
(11, 'admin', 500),
(12, 'superadmin', 5),
(13, 'admin', 600),
(14, 'superadmin', 6),
(15, 'guest', 7),
(16, 'user', 8),
(17, 'admin', 8),
(18, 'superadmin', 8),
(19, 'user', 9),
(20, 'admin', 9),
(21, 'superadmin', 9),
(22, 'user', 10),
(23, 'admin', 10),
(24, 'superadmin', 10),
(25, 'admin', 11),
(26, 'superadmin', 11),
(27, 'admin', 12),
(28, 'superadmin', 12),
(29, 'user', 13),
(30, 'admin', 13),
(31, 'superadmin', 13),
(32, 'user', 14),
(33, 'admin', 14),
(34, 'superadmin', 14),
(35, 'user', 15),
(36, 'admin', 15),
(37, 'superadmin', 15),
(38, 'admin', 16),
(39, 'superadmin', 16),
(40, 'admin', 17),
(41, 'superadmin', 17),
(42, 'admin', 18),
(43, 'superadmin', 18),
(44, 'admin', 19),
(45, 'superadmin', 19),
(46, 'user', 20),
(47, 'admin', 20),
(48, 'superadmin', 20),
(49, 'user', 21),
(50, 'admin', 21),
(51, 'superadmin', 21),
(52, 'user', 22),
(53, 'admin', 22),
(54, 'superadmin', 22),
(55, 'user', 23),
(56, 'admin', 23),
(57, 'superadmin', 23),
(58, 'admin', 24),
(59, 'superadmin', 24),
(60, 'admin', 25),
(61, 'superadmin', 25),
(62, 'admin', 26),
(63, 'superadmin', 26),
(64, 'user', 27),
(65, 'admin', 27),
(66, 'superadmin', 27),
(67, 'user', 28),
(68, 'admin', 28),
(69, 'superadmin', 28),
(70, 'admin', 29),
(71, 'superadmin', 29),
(72, 'admin', 30),
(73, 'superadmin', 30),
(74, 'admin', 31),
(75, 'superadmin', 31),
(76, 'admin', 32),
(77, 'superadmin', 32),
(78, 'admin', 33),
(79, 'superadmin', 33),
(80, 'admin', 34),
(81, 'superadmin', 34),
(82, 'admin', 350),
(83, 'superadmin', 350),
(84, 'user', 36),
(85, 'admin', 36),
(86, 'superadmin', 36),
(87, 'admin', 37),
(88, 'superadmin', 37),
(89, 'user', 38),
(90, 'admin', 38),
(91, 'superadmin', 38),
(92, 'admin', 39),
(93, 'superadmin', 39),
(94, 'admin', 40),
(95, 'superadmin', 40),
(96, 'admin', 41),
(97, 'superadmin', 41),
(98, 'admin', 42),
(99, 'superadmin', 42),
(100, 'admin', 43),
(101, 'superadmin', 43),
(102, 'admin', 44),
(103, 'superadmin', 44),
(104, 'admin', 45),
(105, 'superadmin', 45),
(106, 'admin', 46),
(107, 'superadmin', 46),
(108, 'admin', 47),
(109, 'superadmin', 47),
(110, 'admin', 48),
(111, 'superadmin', 48),
(112, 'admin', 49),
(113, 'superadmin', 49);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_10_11_085455_create_notes_table', 1),
(5, '2019_10_12_115248_create_status_table', 1),
(8, '2019_12_10_092113_create_permission_tables', 1),
(10, '2019_12_18_092518_create_role_hierarchy_table', 1),
(11, '2020_01_07_093259_create_folder_table', 1),
(12, '2020_01_08_184500_create_media_table', 1),
(13, '2020_01_21_161241_create_form_field_table', 1),
(14, '2020_01_21_161242_create_form_table', 1),
(15, '2020_01_21_161243_create_example_table', 1),
(16, '2020_03_12_111400_create_email_template_table', 1),
(17, '2021_01_15_061702_create_customers_table', 1),
(18, '2021_01_15_072842_create_suppliers_table', 1),
(19, '2021_01_15_075357_create_brands_table', 1),
(20, '2021_01_15_080021_create_companies_table', 1),
(21, '2021_01_15_080109_create_products_table', 1),
(22, '2021_01_15_103219_create_purchases_table', 1),
(28, '2021_01_28_063715_create_accounts_table', 1),
(30, '2021_01_28_105605_create_account_payments_table', 1),
(31, '2021_02_01_111042_create_product_barcodes_table', 1),
(32, '2021_02_05_175519_create_warehouses_table', 1),
(33, '2021_01_22_131100_create_purchase_products_table', 2),
(34, '2021_01_22_122428_create_sale_products_table', 3),
(35, '2021_01_16_123607_create_sales_table', 4),
(36, '2021_01_28_101356_create_payments_table', 5),
(40, '2021_02_26_122317_create_salereturn_products_table', 7),
(41, '2021_02_26_122332_create_purchasereturn_products_table', 7),
(42, '2021_01_15_120811_create_purchase_returns_table', 8),
(43, '2021_01_16_123633_create_sale_returns_table', 8),
(44, '2021_02_23_162630_create_invoices_table', 9),
(46, '2019_11_08_102827_create_menus_table', 10),
(47, '2019_11_13_092213_create_menurole_table', 10),
(48, '2019_12_11_091036_create_menulist_table', 10),
(49, '2021_03_11_175550_create_user_warehouses_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 5),
(3, 'App\\Models\\User', 6),
(3, 'App\\Models\\User', 7),
(3, 'App\\Models\\User', 8),
(3, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `applies_to_date` date NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `note_type`, `applies_to_date`, `users_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Distinctio quam veniam.', 'Nobis et beatae est. Consequatur ipsam quas hic excepturi velit et. Reiciendis non voluptas quia.', 'doloribus assumenda', '1979-07-05', 10, 2, NULL, NULL),
(2, 'Ut nobis delectus eum.', 'Velit a veritatis eos fugiat. Velit quidem esse doloremque sit voluptatem et. Vitae ut aperiam qui cupiditate quo placeat. Tenetur sit rem est eos.', 'consequatur quasi', '2016-03-28', 7, 3, NULL, NULL),
(3, 'Laudantium amet consequatur unde libero minus.', 'Aut ratione eum accusamus nobis expedita. Est labore debitis doloribus at. Optio beatae qui cumque sequi ut tempore illum atque.', 'aut', '2010-11-08', 12, 3, NULL, NULL),
(4, 'Voluptate eaque vel ut.', 'Minima aut rerum sed reprehenderit earum ipsa. Rem cumque ut laboriosam omnis veniam soluta. Amet molestiae unde harum ut sed dolorum consequatur. Exercitationem earum eos esse sint saepe rem sint.', 'quia', '1995-11-23', 3, 4, NULL, NULL),
(5, 'Velit optio iste sequi neque.', 'Dolorem delectus et enim qui ullam eos iste. Porro unde fugiat excepturi quod aut placeat. Suscipit illum vitae ab officia consectetur.', 'asperiores', '1986-11-30', 3, 4, NULL, NULL),
(6, 'Qui qui et assumenda.', 'Voluptatibus porro soluta qui ad. Excepturi sed inventore voluptatem eos sunt.', 'ea', '1985-11-10', 11, 3, NULL, NULL),
(7, 'Tenetur est architecto ut.', 'Aut sint dolorem ut cum. Exercitationem in ratione veniam qui. Tenetur porro est occaecati in dolores.', 'voluptates', '1970-07-31', 10, 1, NULL, NULL),
(8, 'Repudiandae consequuntur a tempore delectus sit.', 'Commodi est laboriosam veritatis et. Iusto voluptas aperiam totam rerum ex nobis ut. Voluptates id sed in assumenda nesciunt.', 'repellat', '2017-02-04', 5, 1, NULL, NULL),
(9, 'Aliquid asperiores sit voluptas facilis nemo.', 'Rerum optio explicabo expedita adipisci aut enim. Cum doloribus rerum aut occaecati. Nihil consequatur et explicabo expedita nobis optio officia.', 'dolores', '2007-12-13', 4, 2, NULL, NULL),
(10, 'Nihil quaerat veritatis.', 'Omnis voluptas adipisci ea pariatur. Dolorem est aut dolorum in vel. Vero omnis aut voluptatem explicabo.', 'magni', '1992-05-28', 5, 4, NULL, NULL),
(11, 'Ipsa tempora aut repellendus.', 'Nostrum aliquid quo id autem repudiandae autem natus dolorem. Fuga sequi dicta aut sed. Doloribus iusto ut quisquam possimus consequatur facilis repudiandae reprehenderit.', 'molestias', '1984-03-11', 11, 2, NULL, NULL),
(12, 'Et ex molestiae impedit voluptatem sit.', 'Blanditiis et voluptatem id repellendus. Voluptatem facere tenetur quam earum quia omnis non non.', 'vitae', '2002-02-28', 9, 3, NULL, NULL),
(13, 'Fugit architecto doloribus.', 'Cumque qui porro fuga repellendus inventore est dolores. Non eos ex occaecati ea sed. Quidem alias aspernatur ut. Ducimus doloremque consequuntur a nostrum optio.', 'dolore cupiditate', '2009-01-24', 6, 2, NULL, NULL),
(14, 'At dolores sit est qui laudantium.', 'Vel ut ut est voluptatem nesciunt nesciunt. Numquam accusantium voluptas eveniet non est vero. Eos voluptatem necessitatibus dolor nihil dignissimos molestiae ut. Repudiandae necessitatibus inventore voluptas sint perspiciatis et blanditiis.', 'at iste', '2008-05-16', 4, 2, NULL, NULL),
(15, 'Officia saepe autem autem magni.', 'Aut deleniti dolores quia autem. Suscipit praesentium ut occaecati.', 'dolore', '2001-03-08', 10, 1, NULL, NULL),
(16, 'Rerum qui sequi alias.', 'Labore est et doloremque cumque a sint autem velit. Ut alias tempora quisquam qui enim fuga ducimus. Mollitia aspernatur tenetur quam. Est dignissimos qui ipsum dignissimos ad quam voluptas.', 'voluptates', '2007-02-27', 4, 1, NULL, NULL),
(17, 'Expedita voluptas officia consequatur.', 'Sit autem eos nulla dolorum. Harum et dolorem consequatur est. A explicabo officia voluptatem mollitia reprehenderit omnis. Commodi voluptas adipisci dignissimos dignissimos voluptas fuga.', 'hic', '2010-05-03', 11, 3, NULL, NULL),
(18, 'Quasi non dolore consequatur veritatis.', 'Est omnis officiis ad voluptate et ipsa veniam. Et ullam culpa quaerat exercitationem ratione modi. Sed sint sint est est. Dolorum est saepe aut cupiditate. Sint aliquid aut recusandae.', 'cum fuga', '1973-01-03', 7, 2, NULL, NULL),
(19, 'Animi praesentium qui nostrum.', 'Dolor nisi vel illum molestiae sit. Voluptas non dolor sit doloribus. Perspiciatis enim voluptas excepturi numquam quaerat. Mollitia sint voluptatem est modi qui ut.', 'voluptatum reprehenderit', '1977-01-22', 4, 2, NULL, NULL),
(20, 'Iure magni sint inventore alias.', 'Mollitia doloribus ab repellat optio fuga voluptas soluta. Exercitationem soluta pariatur odit ut quae. Atque sit voluptatum ut eligendi ratione sit.', 'ut quisquam', '1988-10-09', 11, 4, NULL, NULL),
(21, 'Aut culpa eaque excepturi recusandae.', 'Tempora quaerat ipsa pariatur rerum omnis mollitia fuga nostrum. Quia qui quia cum. Mollitia suscipit commodi quae similique laborum. Enim velit accusantium soluta id quis.', 'tenetur dolores', '1986-04-12', 7, 2, NULL, NULL),
(22, 'Dolores molestiae rerum sequi.', 'Nemo sit accusantium vitae est asperiores. Porro non non alias animi consequuntur quia. Expedita cupiditate labore rerum dicta culpa quod id distinctio.', 'voluptatem', '1998-12-26', 11, 1, NULL, NULL),
(23, 'Pariatur illum adipisci officiis.', 'Sapiente ut provident aut quidem et. Et accusantium repellat animi alias. Molestiae numquam quia architecto exercitationem enim amet laborum.', 'eum', '1978-10-06', 12, 4, NULL, NULL),
(24, 'Nostrum qui sit ut.', 'Sapiente earum et rerum consequatur. Adipisci sed corrupti magnam architecto veniam aut. Dicta sed ut ullam architecto natus dicta. Quisquam laboriosam eligendi quibusdam deserunt modi aut magni. Laboriosam iste voluptates minima impedit rerum atque neque.', 'quas quisquam', '2016-02-13', 10, 4, NULL, NULL),
(25, 'Animi eos dolor dolore qui dolores.', 'Veniam cumque odit aut et enim exercitationem molestiae atque. Dolorem sapiente veniam qui cumque accusamus voluptas repellat voluptatem. Magni nam sint quisquam consequatur. Ducimus qui est illo in illum ut quia.', 'quo unde', '1987-09-16', 11, 4, NULL, NULL),
(26, 'Vitae neque dolor ea.', 'Rerum hic et laudantium minus beatae. Saepe eum natus architecto expedita. Qui placeat dolores et.', 'ea quia', '1992-02-27', 9, 2, NULL, NULL),
(27, 'Ea laborum omnis.', 'Officia ullam expedita veniam. Sequi et nemo officiis pariatur. Odio ut delectus error aliquid quis quo est.', 'aut', '1995-11-28', 5, 2, NULL, NULL),
(28, 'Quo suscipit est dolor corporis.', 'Quam dicta quis voluptatem autem nulla voluptas. Et est natus maxime facilis ratione dignissimos minus voluptatem. Explicabo in excepturi non nam. Magni quo repellendus aut animi ipsum magni.', 'asperiores quos', '1975-09-11', 4, 2, NULL, NULL),
(29, 'Aut labore quia asperiores voluptatem animi.', 'Consequatur ipsum quos perferendis similique aut magni tempore. Est quod veniam ducimus eum. Autem facilis iusto quae numquam.', 'quam', '2008-11-06', 4, 4, NULL, NULL),
(30, 'Ut tempora a ut.', 'Dignissimos velit facere est nihil ratione aut. Unde quae perspiciatis blanditiis id qui. Nobis aut ut ipsa nemo doloribus culpa earum.', 'rem ullam', '1984-04-13', 10, 1, NULL, NULL),
(31, 'A voluptatem dolores deserunt eum.', 'Praesentium doloremque explicabo aliquid optio harum expedita quaerat. Ut repellat odit voluptas sed quos qui minus. Sit minus consectetur qui ut omnis possimus qui.', 'ut cum', '1992-03-23', 9, 3, NULL, NULL),
(32, 'Adipisci magni quae.', 'Minus tempore eos praesentium porro doloribus dolorem rerum doloribus. Dolorem officia ut ullam ad optio autem natus quia. Minima repudiandae impedit eos sunt perspiciatis. Corporis quae molestias et eius labore qui at. Aut nihil magni ut maiores itaque aspernatur quia.', 'blanditiis', '2009-11-21', 4, 1, NULL, NULL),
(33, 'Ipsam ea rerum culpa id.', 'Dolor dolore nam corrupti rerum voluptates placeat voluptates. Perferendis quos aut ut earum qui. Porro maxime quasi illum consequatur sequi.', 'nisi consequatur', '2013-06-14', 6, 2, NULL, NULL),
(34, 'Cupiditate itaque doloribus ducimus.', 'Mollitia debitis vel et quia similique totam. Autem quis eos doloribus fuga reiciendis corrupti voluptatibus. Sed adipisci sed nam sapiente ut cumque vel.', 'enim', '1981-05-26', 6, 2, NULL, NULL),
(35, 'Aliquam voluptatibus et cumque quos.', 'Neque facere quidem non pariatur. Autem est similique ratione deleniti quaerat autem. Quidem dolore ad facilis cupiditate aut qui. Voluptatem incidunt perferendis non. Maxime praesentium voluptates necessitatibus quia iure consequatur delectus.', 'necessitatibus', '1986-02-21', 3, 3, NULL, NULL),
(36, 'Qui saepe et quos.', 'Vero veritatis beatae omnis tempore non. Totam rerum sed quisquam eius voluptatibus aperiam praesentium molestiae. Cumque necessitatibus dolorum ratione hic non autem consequuntur. Qui sed repellendus iste temporibus qui eligendi.', 'sit quam', '1987-04-03', 9, 2, NULL, NULL),
(37, 'Impedit voluptatibus labore.', 'Mollitia aperiam quaerat veritatis assumenda. Laudantium ratione sint sit tenetur nisi eveniet.', 'nihil dignissimos', '1985-06-16', 12, 3, NULL, NULL),
(38, 'Autem voluptatem veniam quos quo.', 'Quis itaque reiciendis consequuntur odio similique cumque. Magni quisquam impedit dicta doloremque consequatur sequi. Accusamus tenetur inventore est voluptatum nemo id. Tempora dolores saepe aliquid rerum.', 'et', '1988-03-24', 8, 3, NULL, NULL),
(39, 'Consectetur dolor et culpa qui.', 'Est eius itaque amet consequatur id optio dolores. Dicta voluptas inventore dolores dolores eum. Voluptatem qui sed dicta est. Omnis est aliquam natus non ut.', 'ut earum', '2015-07-17', 5, 3, NULL, NULL),
(40, 'Dolores laudantium nulla dolorum.', 'Ipsum dicta nobis deleniti modi. Saepe nesciunt tempore laudantium sequi. Saepe optio assumenda dolores atque. Expedita consequuntur et voluptatem.', 'rem nemo', '1980-10-03', 8, 2, NULL, NULL),
(41, 'Qui repellendus rerum architecto.', 'Voluptas cumque veniam eum ducimus. Cum et enim dignissimos commodi accusantium. Quas placeat eum rerum beatae.', 'at soluta', '1973-12-19', 12, 2, NULL, NULL),
(42, 'Eveniet blanditiis totam ipsam non et.', 'Non libero itaque dolores minus optio sequi. Deleniti quasi quo necessitatibus explicabo perspiciatis qui. Numquam a voluptas amet quos nulla. Soluta esse accusantium ea.', 'quia quo', '1990-07-25', 4, 4, NULL, NULL),
(43, 'Non sed quam a id.', 'Ipsam nam eum rerum. Tempora ipsa ullam quia commodi rerum quisquam. Animi necessitatibus dolores suscipit et. Repellat autem laudantium nihil consectetur.', 'voluptatem laborum', '2014-04-02', 4, 1, NULL, NULL),
(44, 'Ut ducimus aut inventore.', 'Quia architecto sit in eius et officiis vero repellendus. Aperiam quisquam consequatur adipisci et non. Et quis excepturi quibusdam qui qui assumenda est. Et in aut beatae rerum debitis.', 'ut', '2019-08-19', 6, 1, NULL, NULL),
(45, 'Magnam ratione delectus quod recusandae explicabo.', 'Soluta reprehenderit voluptate ipsum iusto excepturi. Alias reprehenderit voluptates assumenda voluptas molestiae voluptatem. Esse et a consequatur aperiam animi nam recusandae.', 'excepturi', '1997-05-22', 9, 4, NULL, NULL),
(46, 'Quasi autem omnis.', 'Eum et voluptatem voluptas asperiores. Iusto rerum nulla reiciendis cupiditate delectus eum. Assumenda doloribus laboriosam et velit corrupti. Laboriosam occaecati reprehenderit minima eum labore sit quos.', 'ea ipsam', '1991-08-08', 4, 4, NULL, NULL),
(47, 'Voluptatem eveniet sed tempora consequuntur.', 'Veniam perferendis enim ullam sequi maxime. Odio veritatis rerum eaque eum harum. Et nesciunt et quia qui. Est mollitia unde commodi autem possimus.', 'laudantium qui', '1970-11-08', 9, 2, NULL, NULL),
(48, 'Libero sunt inventore consequuntur.', 'Quia ullam ea quia ut quia eum et. Maxime sed architecto quidem quaerat est. Eius omnis vitae dolorem. Veniam corporis quod nostrum a.', 'sit doloribus', '2011-06-06', 9, 1, NULL, NULL),
(49, 'Iure occaecati consequatur dolores.', 'Atque aut quis aliquid sit. Perspiciatis qui veritatis dolores ut.', 'enim', '1983-03-23', 4, 1, NULL, NULL),
(50, 'Aut accusantium provident voluptas.', 'Commodi est incidunt accusantium non qui adipisci autem rerum. Itaque quaerat eligendi numquam ipsam dolore asperiores molestiae ipsa.', 'eum', '1978-12-15', 12, 2, NULL, NULL),
(51, 'Qui in illo.', 'Consectetur quis et non libero inventore ratione odit. Sunt suscipit voluptas ipsam quidem et tenetur nesciunt. Ipsa porro sit qui maiores.', 'in', '2008-08-04', 4, 3, NULL, NULL),
(52, 'In nostrum voluptas enim impedit.', 'Ad qui qui dolor id nostrum dolor. Et consequatur esse accusamus quis. Sit et qui aliquid.', 'tempora vero', '1993-07-11', 8, 3, NULL, NULL),
(53, 'Culpa exercitationem quidem ut.', 'Vel temporibus non necessitatibus id consequuntur enim. Perspiciatis aut dignissimos ut omnis unde ut dignissimos. Corrupti reprehenderit sed cumque saepe quae.', 'repellat', '1972-01-13', 3, 1, NULL, NULL),
(54, 'Dolores qui qui molestiae nisi.', 'Odit nulla esse atque dolore voluptas ullam consequuntur cumque. Nulla qui et nam placeat. Excepturi dolorem perspiciatis quia beatae numquam non.', 'eveniet', '2016-09-25', 3, 4, NULL, NULL),
(55, 'Id nisi ipsa quas eum.', 'Et inventore perferendis nobis. Quia alias nobis et et nesciunt iste. Magnam quo nihil dolores. Quaerat adipisci maxime iste.', 'non ab', '1984-10-05', 11, 2, NULL, NULL),
(56, 'Libero laborum facere.', 'Error voluptatem deserunt amet nobis omnis sit. Sapiente iure ullam exercitationem iusto rerum. Quia debitis quae architecto aperiam reprehenderit animi magni.', 'perspiciatis', '1975-07-05', 8, 4, NULL, NULL),
(57, 'Est distinctio et ut.', 'Sed voluptates nulla totam molestiae exercitationem rerum dolores. Nostrum asperiores et quia. Dignissimos ea non odio aut.', 'modi', '1997-05-06', 10, 1, NULL, NULL),
(58, 'Aliquid et voluptates laboriosam.', 'Quas nostrum et reprehenderit magnam minima doloribus. Similique cupiditate quod et voluptates minima ut aliquid.', 'fuga et', '1975-12-07', 4, 1, NULL, NULL),
(59, 'Omnis sit ut architecto.', 'Rerum non blanditiis ut et. Reiciendis nemo possimus omnis deleniti ipsa voluptatem delectus. Quia ab nihil consequatur et quia saepe non aspernatur.', 'omnis', '1986-01-11', 3, 3, NULL, NULL),
(60, 'Voluptates omnis et.', 'Et non consequuntur numquam labore ea minus molestiae. Accusantium eos inventore sed eos eos rem. Sapiente impedit consequatur laborum consequuntur odio veritatis harum. Inventore animi in qui. Repellendus ut libero quaerat.', 'nihil omnis', '1970-12-27', 4, 2, NULL, NULL),
(61, 'Pariatur sed amet et.', 'Non nesciunt amet sequi qui expedita recusandae. Quas voluptatem optio deserunt. Minima laborum aut laborum quis rerum consequatur.', 'beatae', '2011-05-08', 4, 2, NULL, NULL),
(62, 'Quasi et repellendus dolorem id at.', 'Non culpa nihil vel aperiam sit sed provident. Distinctio qui et culpa accusamus. Nihil error labore tempora totam.', 'eum expedita', '1998-11-14', 4, 3, NULL, NULL),
(63, 'Ea quasi quae ut.', 'Quaerat perspiciatis omnis neque error eos consectetur aut. Ut nostrum sit dignissimos molestiae ut. Quaerat omnis itaque nulla ea suscipit id. Rem amet enim quia quidem.', 'ea', '1992-07-15', 6, 4, NULL, NULL),
(64, 'Dolor dolores rerum exercitationem.', 'Veniam quia ad animi fuga et. Animi aut aut corrupti porro. Sequi a dolor earum rerum. Doloremque consequuntur quia fuga ut placeat et. Voluptatem voluptatibus ipsum error optio.', 'eius', '2012-03-05', 11, 3, NULL, NULL),
(65, 'Eligendi quia dolores quia.', 'Velit soluta fuga velit qui consequatur ipsam. Consequuntur alias quis et. Quia culpa eum vero consectetur exercitationem in. Accusamus ut voluptatem sit illo sed.', 'est dolorum', '2010-10-22', 9, 1, NULL, NULL),
(66, 'Id et possimus quasi.', 'Error et dolore sint nemo quo laborum et. Odio iusto est harum nulla molestiae velit. Animi corrupti autem tempora consectetur. At sit dignissimos est enim. Ducimus provident accusamus vel aut consectetur.', 'veritatis', '1990-05-04', 8, 2, NULL, NULL),
(67, 'Odio ullam dolores ad.', 'Et et ea dignissimos placeat dicta molestias rem. Corporis quia debitis consequatur similique. Doloremque quaerat laudantium dolorem est reiciendis magnam et sit.', 'delectus distinctio', '1989-05-28', 7, 3, NULL, NULL),
(68, 'Nobis omnis voluptate suscipit porro animi.', 'Quia explicabo repellendus voluptate. Dolores vero voluptatibus placeat qui accusantium et libero. Nisi reprehenderit saepe molestias facere similique qui ut non.', 'commodi dolor', '1978-09-02', 11, 1, NULL, NULL),
(69, 'Quo ipsa dignissimos.', 'Magnam et nobis non qui est. Hic assumenda rerum minus repellendus. Architecto eveniet quos doloremque quo. Corrupti necessitatibus accusamus omnis deserunt ex similique voluptate voluptatem. Commodi at amet illum soluta aperiam.', 'animi harum', '1997-08-20', 9, 4, NULL, NULL),
(70, 'Fuga suscipit et sit esse dolorem.', 'Impedit impedit dolore nobis quos corporis architecto voluptatem. Unde quia ullam reiciendis ipsum vel id. Sed ipsa atque sint voluptatem. Ut non quia tempore reiciendis aliquid. Blanditiis occaecati incidunt in ipsa laborum maxime qui quod.', 'qui', '1988-08-02', 11, 2, NULL, NULL),
(71, 'Corrupti eveniet dolores dignissimos.', 'Sunt illo consequatur aspernatur enim molestiae quo possimus fuga. Enim esse excepturi laboriosam dolorem nobis quam aliquid. Rerum cupiditate error ducimus sapiente et inventore.', 'voluptas autem', '1990-04-08', 12, 3, NULL, NULL),
(72, 'Dignissimos doloribus rerum et sit cumque.', 'Est inventore molestias maxime recusandae. Incidunt et omnis harum sunt minus sit praesentium. Est illo praesentium accusamus illum. Eligendi quisquam iusto ipsam assumenda.', 'veniam', '1977-07-21', 9, 3, NULL, NULL),
(73, 'Omnis dignissimos placeat.', 'Molestias sunt quae ut suscipit aliquam repudiandae. Totam libero et veniam minus. Mollitia qui velit error adipisci illum. Harum et dolorum aperiam nobis. Qui ad nesciunt quae odio tenetur quia.', 'ratione accusamus', '1990-01-11', 5, 3, NULL, NULL),
(74, 'Pariatur quas tempora illo praesentium.', 'Adipisci ratione voluptatum repellendus ut itaque laudantium. Commodi nemo occaecati qui voluptatum odit. Assumenda doloribus asperiores unde quos.', 'dolor', '1997-04-15', 6, 2, NULL, NULL),
(75, 'Placeat non reiciendis maxime deleniti.', 'Veniam sit aut aut pariatur et accusantium. Eius aut corrupti ab saepe voluptas delectus sint. Inventore tempora omnis necessitatibus doloremque et est praesentium.', 'quia vero', '1972-12-03', 7, 1, NULL, NULL),
(76, 'Ea repellat necessitatibus rerum.', 'Earum inventore pariatur provident dolores consequatur at ea. Iusto ducimus est ab rerum.', 'quis', '1985-07-13', 8, 2, NULL, NULL),
(77, 'Modi facere tenetur illo occaecati.', 'Est ad in quod repellendus voluptates soluta et eum. Possimus dignissimos quam voluptates labore temporibus nobis rem quisquam. Voluptas quae est maxime est eos ut voluptas magni.', 'distinctio sunt', '2010-05-11', 6, 2, NULL, NULL),
(78, 'Tempora explicabo aliquid libero.', 'Tenetur ut assumenda voluptate sed ipsam perferendis voluptatem. Est velit omnis aut est deserunt. Exercitationem soluta ut quis consequuntur ullam. Placeat ut tempore et sequi voluptate.', 'deserunt est', '1972-01-17', 3, 2, NULL, NULL),
(79, 'Repellat necessitatibus ipsam qui optio illum.', 'Vel velit voluptatibus ipsam repellat doloremque deserunt laborum. Architecto voluptates fugit ut ut ut. Nesciunt nihil animi iusto eius ipsa eos voluptas. Quia porro enim consectetur sunt itaque.', 'ipsa', '2016-05-24', 8, 1, NULL, NULL),
(80, 'Et sapiente possimus est est.', 'Voluptatem eaque aut consectetur rerum. Molestiae nihil iure aliquid voluptas modi mollitia. Et cumque rerum sed praesentium. Quis officiis velit ut possimus eligendi aliquid.', 'vero occaecati', '1997-06-19', 12, 4, NULL, NULL),
(81, 'Eligendi in consectetur sit.', 'Exercitationem totam ea ea ut dolorem velit. Quia et porro culpa dignissimos. Laboriosam sint quod dolor et ex sequi.', 'aut temporibus', '1989-04-21', 7, 4, NULL, NULL),
(82, 'Voluptatem recusandae delectus.', 'Tenetur ipsam iusto quas hic. Ipsum est error culpa ipsa dicta accusamus. Dolorem alias officiis minima. Suscipit consectetur eos officiis delectus.', 'vel reprehenderit', '1970-01-31', 10, 3, NULL, NULL),
(83, 'Aut quae debitis sed nihil.', 'Iste delectus consequatur sint. Et at eligendi sequi facilis nihil. Quis dignissimos non blanditiis. Accusamus officia possimus est nihil velit.', 'sunt dolores', '2017-12-02', 3, 1, NULL, NULL),
(84, 'Qui sed quibusdam minus non.', 'Sapiente rerum asperiores veritatis quae. Voluptatem porro cum hic doloribus suscipit exercitationem exercitationem excepturi.', 'alias laudantium', '1991-02-07', 4, 2, NULL, NULL),
(85, 'Numquam nihil minus iste.', 'Veniam ducimus delectus molestiae eos. Dolor dolores quibusdam doloribus aut enim et. Numquam quibusdam quia minima nesciunt laborum quis. Est est asperiores esse quis.', 'expedita quia', '1980-12-09', 6, 4, NULL, NULL),
(86, 'Modi necessitatibus alias.', 'Distinctio soluta sapiente molestias alias eligendi exercitationem. Numquam sed nobis amet ad quam vel. Perferendis animi harum eum nihil dolore.', 'alias harum', '1972-08-30', 8, 4, NULL, NULL),
(87, 'Sapiente blanditiis molestias doloribus.', 'Tenetur et ut consequuntur voluptates. Non a architecto dolore. Laborum dolores commodi voluptatem aut praesentium. Itaque architecto voluptatem iusto.', 'aut nobis', '1980-02-13', 7, 2, NULL, NULL),
(88, 'Et nihil quam rerum fugiat.', 'Quos quia ut in voluptatem nihil. Possimus consectetur hic exercitationem corporis consequatur. Illo quas odio earum minima sunt tempore.', 'officiis soluta', '1993-06-19', 7, 3, NULL, NULL),
(89, 'Facere perspiciatis tenetur deleniti.', 'Architecto provident eos distinctio culpa est reiciendis. Distinctio veritatis nemo qui minima quisquam et. Laborum minima sequi et voluptas ut animi quo. Voluptatem tenetur assumenda qui voluptatibus.', 'nesciunt dolorum', '1999-04-19', 11, 2, NULL, NULL),
(90, 'Explicabo libero a molestias.', 'Ducimus optio amet eligendi quibusdam porro iusto sunt. Consectetur ab sed corporis et est. Odit dolor quos delectus rerum perspiciatis velit.', 'eum', '1986-01-15', 11, 3, NULL, NULL),
(91, 'Corporis sequi sunt quis impedit.', 'Eum dolores libero inventore deserunt id. Eius dolor minus et vel non nam autem. Consectetur et aut consequatur aut est libero.', 'qui', '1975-08-17', 7, 2, NULL, NULL),
(92, 'Neque minima et.', 'Sit atque est laboriosam distinctio eum. Excepturi earum ut sunt laudantium provident. Laborum expedita voluptatem unde laudantium quod. Praesentium non odit quo iure.', 'aut ullam', '1977-02-14', 9, 1, NULL, NULL),
(93, 'Doloremque dolores atque qui pariatur.', 'Quibusdam cumque labore voluptatum iure non adipisci fugit. Voluptas error iure id rerum non dicta magni. Maiores cupiditate ut ut doloremque rerum. Et eos blanditiis cumque.', 'facilis', '2002-09-21', 4, 2, NULL, NULL),
(94, 'Voluptas aut fugit et laboriosam.', 'Distinctio quidem veritatis incidunt aut. Magni corporis est consequatur pariatur iusto possimus labore. Voluptatibus sit porro est perspiciatis sunt. Ipsum fugiat illum delectus rerum.', 'et cupiditate', '1991-06-17', 9, 3, NULL, NULL),
(95, 'Voluptatem voluptatem voluptate mollitia dolor.', 'Neque assumenda nemo sit optio distinctio commodi rerum. Molestiae accusantium porro praesentium molestiae similique autem. Est voluptas qui saepe sed. Est amet aut recusandae iste. Eveniet sed sit tempora.', 'eum officia', '1974-02-25', 9, 4, NULL, NULL),
(96, 'Ratione error nisi.', 'Ut rerum excepturi sunt blanditiis. Occaecati quo fuga eum eos rerum ullam maxime.', 'quo expedita', '1989-01-27', 10, 3, NULL, NULL),
(97, 'Veritatis beatae error vel.', 'Et iure officiis est. At aut placeat temporibus quis quam nesciunt necessitatibus. Culpa consequatur voluptas illo fugiat. Ut vel est nostrum dolorem aliquid sequi velit.', 'soluta', '1986-12-13', 3, 2, NULL, NULL),
(98, 'Tempore voluptatibus similique.', 'Animi quod eveniet nam exercitationem qui mollitia vero a. Velit distinctio et earum at. Magni qui unde suscipit repellendus.', 'voluptas culpa', '1976-09-27', 7, 1, NULL, NULL),
(99, 'Fuga non qui harum reiciendis.', 'Ullam sunt id cum ut est a. Magnam explicabo officiis ab veniam amet ea debitis. Ducimus qui omnis nihil facilis eum in. Sed iusto voluptatem perferendis non dolores quidem.', 'totam', '2013-01-21', 8, 3, NULL, NULL),
(100, 'Qui non sint voluptatem ut.', 'Et impedit voluptatibus cum placeat architecto. Ratione vero assumenda modi rem. Omnis totam dignissimos cum velit. Alias perspiciatis vero eum eveniet temporibus.', 'incidunt occaecati', '2009-02-07', 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `payment_customer_id` int(20) DEFAULT NULL,
  `payment_supplier_id` int(20) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_amount_paid` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `payment_amount_balance` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `customer_amount_paid` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `customer_amount_dues` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `supplier_amount_recieved` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `supplier_amount_dues` decimal(22,4) NOT NULL DEFAULT '0.0000',
  `payment_cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_cheque_date` date DEFAULT NULL,
  `account_id` int(20) DEFAULT NULL,
  `payment_note` text COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_purch_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_invoice_date` date DEFAULT NULL,
  `payment_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_created_by` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_ref_no`, `payment_type`, `sale_id`, `purchase_id`, `payment_customer_id`, `payment_supplier_id`, `payment_method`, `payment_amount_paid`, `payment_amount_balance`, `customer_amount_paid`, `customer_amount_dues`, `supplier_amount_recieved`, `supplier_amount_dues`, `payment_cheque_no`, `payment_cheque_date`, `account_id`, `payment_note`, `payment_status`, `sale_purch_invoice_id`, `payment_invoice_id`, `payment_invoice_date`, `payment_document`, `payment_created_by`, `created_at`, `updated_at`) VALUES
(1, 'pM40r6cI', 'paying', NULL, 1, NULL, 3, 'cash', 200.0000, 0.0000, 0.0000, 0.0000, 7260.0000, 400.0000, '234', NULL, NULL, '234234234234', 'done', NULL, '234234', '2021-02-25', NULL, 1, '2021-02-25 00:36:42', NULL),
(2, 'm454dfg', 'receiving', 2, NULL, 2, NULL, 'cheque', 400.0000, 0.0000, 19596.0000, 801.0000, 0.0000, 0.0000, '678', '2021-02-27', NULL, 'fgghfgh', 'due', NULL, '980809', '2021-02-27', NULL, 1, '2021-02-25 00:36:42', NULL),
(3, 'j4sd56', 'receiving', 1, NULL, 2, NULL, 'cheque', 500.0000, 0.0000, 602.0000, 200.0000, 0.0000, 0.0000, '891', '2021-02-27', NULL, 'qwewqertret', 'due', NULL, '021567', '2021-02-27', NULL, 1, '2021-02-25 00:36:42', NULL),
(4, 'j4sd56', 'receiving', 1, NULL, 3, NULL, 'cash', 700.0000, 1000.0000, 1008.0000, 406.0000, 0.0000, 0.0000, '', '2021-03-02', NULL, 'rtretretret', 'due', NULL, '34234', '2021-03-02', NULL, 1, '2021-02-25 00:36:42', NULL),
(5, 'bQZFPWvF', 'paying', NULL, NULL, NULL, 3, 'cash', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 12494.0000, '54123156', NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000005', NULL, NULL, 2, '2021-03-26 01:07:26', NULL),
(6, '7TjubY6o', 'paying', NULL, NULL, NULL, NULL, 'cash', 100000.0000, 0.0000, 0.0000, 0.0000, 100000.0000, -100000.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000005', NULL, NULL, 2, '2021-03-26 01:07:54', NULL),
(7, 'VQmNVXtk', 'recieving', NULL, NULL, NULL, NULL, 'cash', 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000019', NULL, NULL, 2, '2021-03-30 05:49:36', NULL),
(8, '8p9yRnS0', 'recieving', NULL, NULL, 16, NULL, 'credit', 0.0000, 0.0000, 10937.0000, 10937.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000019', NULL, NULL, 2, '2021-03-30 05:50:33', NULL),
(9, 'dxjVVKD1', 'recieving', NULL, NULL, 16, NULL, 'credit', 50000.0000, 0.0000, 60937.0000, -39063.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000019', NULL, NULL, 2, '2021-03-30 05:52:15', NULL),
(10, 'Dyq2b5pd', 'recieving', NULL, NULL, 16, NULL, 'credit', 1000.0000, 0.0000, 61937.0000, -40063.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000019', '2021-03-30', NULL, 2, '2021-03-30 05:54:35', NULL),
(11, '30VdrJOh', 'paying', NULL, NULL, NULL, 1, 'cash', 100.0000, 0.0000, 0.0000, 0.0000, 100.0000, 550.0000, '123423', NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000005', '2021-03-30', NULL, 2, '2021-03-30 05:55:45', NULL),
(12, 'LXSa6OR1', 'recieving', NULL, NULL, 2, NULL, 'credit', 0.0000, 0.0000, 19928.0000, 11205.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000021', '2021-04-22', NULL, 2, '2021-04-22 03:39:32', NULL),
(13, 'AvzmuOoF', 'recieving', NULL, NULL, 5, NULL, 'cash', 100.0000, 0.0000, 6500.0000, 3500.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000021', '2021-04-22', NULL, 2, '2021-04-22 03:39:59', NULL),
(14, 'AFLIQ99L', 'recieving', NULL, NULL, 16, NULL, 'cash', 1000.0000, 0.0000, 62937.0000, -41063.0000, 0.0000, 0.0000, NULL, NULL, NULL, NULL, 'done', NULL, 'payment-2021-00000021', '2021-04-22', NULL, 2, '2021-04-22 03:40:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'browse bread 1', 'web', '2021-02-06 13:23:21', '2021-02-06 13:23:21'),
(2, 'read bread 1', 'web', '2021-02-06 13:23:21', '2021-02-06 13:23:21'),
(3, 'edit bread 1', 'web', '2021-02-06 13:23:21', '2021-02-06 13:23:21'),
(4, 'add bread 1', 'web', '2021-02-06 13:23:21', '2021-02-06 13:23:21'),
(5, 'delete bread 1', 'web', '2021-02-06 13:23:21', '2021-02-06 13:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(20) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_piece_per_packet` int(20) DEFAULT NULL,
  `product_packet_per_carton` int(20) DEFAULT NULL,
  `product_piece_per_carton` int(20) DEFAULT NULL,
  `product_pieces_total` int(20) NOT NULL DEFAULT '0',
  `product_packets_total` decimal(10,3) NOT NULL DEFAULT '0.000',
  `product_cartons_total` decimal(10,3) NOT NULL DEFAULT '0.000',
  `product_pieces_available` int(20) NOT NULL DEFAULT '0',
  `product_packets_available` decimal(10,3) NOT NULL DEFAULT '0.000',
  `product_cartons_available` decimal(10,3) NOT NULL DEFAULT '0.000',
  `product_quantity_total` int(20) NOT NULL,
  `product_quantity_available` int(20) NOT NULL,
  `product_quantity_damage` int(20) DEFAULT NULL,
  `product_alert_quantity` int(20) DEFAULT NULL,
  `product_trade_discount` int(20) DEFAULT NULL,
  `product_trade_price_piece` decimal(8,2) DEFAULT NULL,
  `product_trade_price_packet` decimal(10,2) DEFAULT NULL,
  `product_trade_price_carton` decimal(10,2) DEFAULT NULL,
  `product_credit_price_piece` decimal(10,2) DEFAULT NULL,
  `product_credit_price_packet` decimal(10,2) DEFAULT NULL,
  `product_credit_price_carton` decimal(10,2) DEFAULT NULL,
  `product_cash_price_piece` decimal(10,2) DEFAULT NULL,
  `product_cash_price_packet` decimal(10,2) DEFAULT NULL,
  `product_cash_price_carton` decimal(10,2) DEFAULT NULL,
  `product_nonbulk_price_piece` decimal(10,2) DEFAULT NULL,
  `product_nonbulk_price_packet` decimal(10,2) DEFAULT NULL,
  `product_nonbulk_price_carton` decimal(10,2) DEFAULT NULL,
  `product_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_expiry_date` date DEFAULT NULL,
  `product_info` text COLLATE utf8mb4_unicode_ci,
  `status_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_ref_no`, `warehouse_id`, `product_name`, `product_company`, `product_brand`, `product_piece_per_packet`, `product_packet_per_carton`, `product_piece_per_carton`, `product_pieces_total`, `product_packets_total`, `product_cartons_total`, `product_pieces_available`, `product_packets_available`, `product_cartons_available`, `product_quantity_total`, `product_quantity_available`, `product_quantity_damage`, `product_alert_quantity`, `product_trade_discount`, `product_trade_price_piece`, `product_trade_price_packet`, `product_trade_price_carton`, `product_credit_price_piece`, `product_credit_price_packet`, `product_credit_price_carton`, `product_cash_price_piece`, `product_cash_price_packet`, `product_cash_price_carton`, `product_nonbulk_price_piece`, `product_nonbulk_price_packet`, `product_nonbulk_price_carton`, `product_state`, `product_expiry_date`, `product_info`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'uyig6', 1, 'Galaxy S5', 'Samsung', 'Samsung Mobile', 1, 1, 1, 5, 5.000, 5.000, 3, 3.000, 3.000, 5, 3, NULL, 0, NULL, 1000.00, NULL, NULL, 1020.00, NULL, NULL, 1010.00, NULL, NULL, 1030.00, NULL, NULL, NULL, NULL, 'gukljhk', 1, '2021-04-27 12:52:31', NULL),
(2, 'H5c0T', 1, 'Water Bottle', 'Nestle', 'Nestlé Pure Life', 6, 4, 24, 34, 5.333, 1.333, 32, 5.000, 1.250, 34, 32, 2, 6, NULL, 80.00, NULL, NULL, 90.00, NULL, NULL, 85.00, NULL, NULL, 100.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-27 02:55:06', '2021-04-30 22:24:55'),
(3, 'df32', 1, 'Jumbo', 'Samsung', 'NULL', 1, 1, 1, -14, -14.000, -14.000, -16, -16.000, -16.000, -14, -16, 0, 0, NULL, 342.00, NULL, NULL, 423.00, NULL, NULL, 324.00, NULL, NULL, 234.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-29 12:49:21', '2021-04-30 22:24:55'),
(4, 'knorrC', 1, 'Knorr ch/40', 'Unilever', 'knorr', 1, 72, 72, -624, -624.000, -8.664, -624, -624.000, -8.664, -624, -624, 0, 5, NULL, 37.00, NULL, 2660.00, 39.00, NULL, 2710.00, 39.00, NULL, 2700.00, 39.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-30 09:46:08', '2021-04-30 22:24:55'),
(5, 'areal rs10', 1, 'areal rs10', 'P&g', 'areal', 1, 17, 17, 2627, 2622.000, 154.234, 2627, 2622.000, 154.234, 2627, 2627, 0, 100, NULL, 102.00, NULL, 1700.00, 111.00, NULL, 1820.00, 110.00, NULL, 1800.00, 114.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-04-30 10:42:24', NULL),
(6, 'ariel 20', 1, 'ariel rs 20', 'P&g', 'areal', 1, 21, 21, 2188, 2188.000, 104.190, 2188, 2188.000, 104.190, 2188, 2188, 0, 100, NULL, 105.00, NULL, 2100.00, 111.00, NULL, 2170.00, 110.00, NULL, 2150.00, 113.00, NULL, 2150.00, NULL, NULL, NULL, 1, '2021-04-30 10:48:47', NULL),
(7, 'med35', 1, 'Medicam 35g', 'Medicam', 'medicam toothpaste', 12, 24, 288, 42, 3.500, 0.147, 42, 3.500, 0.147, 42, 42, NULL, 6, NULL, 50.00, NULL, 14400.00, 53.00, NULL, 14700.00, 52.00, NULL, 14600.00, 55.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18 10:40:25', NULL),
(8, 'telcum', 1, 'Med/Telc/Small', 'Medicam', 'Telcum Powder', 12, 24, 288, -198, -16.501, -0.687, -198, -16.501, -0.687, -198, -198, NULL, 5, NULL, 70.00, NULL, NULL, 73.00, NULL, NULL, 72.00, NULL, NULL, 74.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-18 10:45:59', NULL),
(9, 'lac1s', 1, 'Lactogen 1 200g', 'Nestle', 'Lactogen', 1, 36, 36, 17, 16.000, 0.445, 17, 16.000, 0.445, 17, 17, 0, 5, NULL, 278.00, NULL, NULL, 282.00, NULL, NULL, 280.00, NULL, NULL, 285.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-26 08:25:36', NULL),
(10, 'lac1l', 1, 'Lactogen 1 400g', 'Nestle', 'Lactogen', 1, 24, 24, 62, 62.000, 2.583, 62, 62.000, 2.583, 62, 62, 0, 5, NULL, 575.00, NULL, NULL, 585.00, NULL, NULL, 580.00, NULL, NULL, 590.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-26 08:27:33', NULL),
(11, 'wh200', 1, 'Wheat 200g', 'Nestle', 'Cerelac', 1, 48, 48, 90, 90.000, 1.875, 90, 90.000, 1.875, 90, 90, 0, 10, NULL, 200.00, NULL, NULL, 204.00, NULL, NULL, 202.00, NULL, NULL, 208.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-26 08:33:59', NULL),
(12, 'sh/sin', 1, 'Shan Single Pack', 'Shan', 'Shan Masalah', 1, 1, 144, 485, 485.000, 3.368, 485, 485.000, 3.368, 485, 485, 0, 50, NULL, 65.00, NULL, NULL, 68.00, NULL, NULL, 67.00, NULL, NULL, 69.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-28 12:11:48', NULL),
(13, 'cr175', 1, 'Crelac 175', 'Nestle', 'Cerelac', 1, 48, 48, 95, 95.000, 1.979, 95, 95.000, 1.979, 95, 95, 0, 0, NULL, 200.00, NULL, NULL, 204.00, NULL, NULL, 202.00, NULL, NULL, 205.00, NULL, NULL, NULL, NULL, NULL, 1, '2021-05-31 08:16:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_barcodes`
--

CREATE TABLE `product_barcodes` (
  `product_barcode_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(10) UNSIGNED NOT NULL,
  `product_barcodes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_barcodes`
--

INSERT INTO `product_barcodes` (`product_barcode_id`, `product_id`, `product_barcodes`, `created_at`, `updated_at`) VALUES
(1, 1, '1234567891234567', NULL, NULL),
(3, 3, '1234567891234567', NULL, NULL),
(4, 4, '012184623123', NULL, NULL),
(5, 5, '353614383674', NULL, NULL),
(6, 6, '3626+26+6+', NULL, NULL),
(9, 2, '5045678214564579', NULL, NULL),
(12, 7, '8961100283331', NULL, NULL),
(14, 8, '1000', NULL, NULL),
(15, 9, '8961008213439', NULL, NULL),
(16, 10, '8961008213446', NULL, NULL),
(17, 11, '8961008210490', NULL, NULL),
(18, 12, '788821150394', NULL, NULL),
(19, 12, '788821150363', NULL, NULL),
(20, 12, '788821150790', NULL, NULL),
(21, 12, '788821150684', NULL, NULL),
(22, 13, '8961008210520', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchasereturn_products`
--

CREATE TABLE `purchasereturn_products` (
  `purchasereturn_products_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_return_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchasereturn_product_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `purchasereturn_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchasereturn_product_barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchasereturn_product_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchasereturn_product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchasereturn_piece_per_packet` int(11) NOT NULL,
  `purchasereturn_packet_per_carton` int(11) NOT NULL,
  `purchasereturn_piece_per_carton` int(11) NOT NULL,
  `purchasereturn_pieces_total` int(11) NOT NULL,
  `purchasereturn_packets_total` int(11) NOT NULL,
  `purchasereturn_cartons_total` int(11) NOT NULL,
  `purchasereturn_quantity_total` int(11) NOT NULL,
  `purchasereturn_quantity_damage` int(11) DEFAULT NULL,
  `purchasereturn_trade_discount` int(11) NOT NULL,
  `purchasereturn_trade_price_piece` int(11) NOT NULL,
  `purchasereturn_trade_price_packet` int(11) NOT NULL,
  `purchasereturn_trade_price_carton` int(11) NOT NULL,
  `purchasereturn_product_sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `purchase_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_supplier_id` int(11) NOT NULL,
  `purchase_total_items` int(11) NOT NULL,
  `purchase_total_quantity` int(11) NOT NULL,
  `purchase_free_piece` int(11) DEFAULT NULL,
  `purchase_free_amount` int(11) DEFAULT NULL,
  `purchase_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_note` text COLLATE utf8mb4_unicode_ci,
  `purchase_date` date DEFAULT NULL,
  `purchase_total_price` decimal(10,2) NOT NULL,
  `purchase_add_amount` decimal(10,2) DEFAULT NULL,
  `purchase_discount` decimal(10,2) DEFAULT NULL,
  `purchase_grandtotal_price` decimal(10,2) NOT NULL,
  `purchase_amount_paid` decimal(10,2) NOT NULL,
  `purchase_amount_dues` decimal(10,2) NOT NULL,
  `supplier_balance_paid` decimal(10,3) DEFAULT NULL,
  `supplier_balance_dues` decimal(10,3) DEFAULT NULL,
  `purchase_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_invoice_date` date DEFAULT NULL,
  `purchase_created_by` int(11) NOT NULL,
  `warehouse_id` int(255) DEFAULT NULL,
  `purchase_payment_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_payment_cheque` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`purchase_id`, `purchase_ref_no`, `purchase_supplier_id`, `purchase_total_items`, `purchase_total_quantity`, `purchase_free_piece`, `purchase_free_amount`, `purchase_status`, `purchase_note`, `purchase_date`, `purchase_total_price`, `purchase_add_amount`, `purchase_discount`, `purchase_grandtotal_price`, `purchase_amount_paid`, `purchase_amount_dues`, `supplier_balance_paid`, `supplier_balance_dues`, `purchase_payment_method`, `purchase_payment_status`, `purchase_document`, `purchase_invoice_id`, `purchase_invoice_date`, `purchase_created_by`, `warehouse_id`, `purchase_payment_type`, `purchase_payment_cheque`, `created_at`, `updated_at`) VALUES
(1, 'q4BylkDw', 3, 2, 57, 0, 0, 'pending', NULL, NULL, 5682.00, 0.00, 0.00, 5682.00, 5682.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, 'purchase-2021-00000001', '2021-05-02', 2, 1, NULL, NULL, '2021-05-02 09:35:03', NULL),
(2, 'craeaVnm', 3, 2, 57, 0, 0, 'pending', NULL, NULL, 5682.00, 0.00, 0.00, 5682.00, 5682.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, 'purchase-2021-00000002', '2021-05-02', 2, 1, NULL, NULL, '2021-05-02 09:35:04', NULL),
(3, 'jl2rUjyG', 3, 1, 1700, 0, 0, 'pending', NULL, NULL, 173400.00, 0.00, 0.00, 173400.00, 0.00, 173400.00, NULL, NULL, 'cash', 'paid', NULL, 'purchase-2021-00000003', '2021-05-31', 2, 1, NULL, NULL, '2021-05-31 08:21:13', NULL),
(4, 'sKdFObA6', 3, 1, 1050, 0, 0, 'pending', NULL, NULL, 110250.00, 0.00, 0.00, 110250.00, 0.00, 110250.00, NULL, NULL, 'cash', 'paid', NULL, 'purchase-2021-00000004', '2021-05-31', 2, 1, NULL, NULL, '2021-05-31 08:22:41', NULL),
(5, 'lwE3zNn2', 2, 2, 31, 0, 0, 'pending', NULL, NULL, 2575.00, 0.00, 0.00, 2575.00, 2575.00, 0.00, NULL, -2575.000, 'cash', 'due', NULL, 'purchase-2021-00000005', '2021-06-17', 2, 1, NULL, NULL, '2021-06-17 04:15:46', NULL),
(6, 'g0Rs5pQn', 1, 2, 15, 0, 0, 'pending', NULL, NULL, 2410.00, 0.00, 0.00, 2410.00, 2410.00, 0.00, NULL, -2410.000, 'cash', 'due', NULL, 'purchase-2021-00000006', '2021-06-17', 2, 1, NULL, NULL, '2021-06-17 04:20:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_products`
--

CREATE TABLE `purchase_products` (
  `purchase_products_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `purchase_product_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `purchase_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_product_barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_product_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_piece_per_packet` int(11) NOT NULL,
  `purchase_packet_per_carton` int(11) NOT NULL,
  `purchase_piece_per_carton` int(11) NOT NULL,
  `purchase_pieces_number` int(20) NOT NULL,
  `purchase_packets_number` int(20) NOT NULL,
  `purchase_cartons_number` int(20) NOT NULL,
  `purchase_pieces_total` decimal(10,3) NOT NULL,
  `purchase_packets_total` decimal(10,3) NOT NULL,
  `purchase_cartons_total` decimal(10,3) NOT NULL,
  `purchase_quantity_total` decimal(10,3) NOT NULL,
  `purchase_quantity_damage` int(11) DEFAULT NULL,
  `purchase_trade_discount` int(11) NOT NULL,
  `purchase_trade_price_piece` int(11) NOT NULL,
  `purchase_trade_price_packet` int(11) NOT NULL,
  `purchase_trade_price_carton` int(11) NOT NULL,
  `purchase_product_sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchase_products`
--

INSERT INTO `purchase_products` (`purchase_products_id`, `purchase_id`, `product_id`, `purchase_product_ref_no`, `warehouse_id`, `purchase_product_name`, `purchase_product_barcode`, `purchase_product_company`, `purchase_product_brand`, `purchase_piece_per_packet`, `purchase_packet_per_carton`, `purchase_piece_per_carton`, `purchase_pieces_number`, `purchase_packets_number`, `purchase_cartons_number`, `purchase_pieces_total`, `purchase_packets_total`, `purchase_cartons_total`, `purchase_quantity_total`, `purchase_quantity_damage`, `purchase_trade_discount`, `purchase_trade_price_piece`, `purchase_trade_price_packet`, `purchase_trade_price_carton`, `purchase_product_sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 6, 0, 0, 6.000, 1.000, 0.250, 6.000, NULL, 0, 80, 480, 1920, 480, NULL, NULL),
(2, 1, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 0, 0, 3, 51.000, 51.000, 3.000, 51.000, NULL, 0, 102, 102, 1734, 5202, NULL, NULL),
(3, 2, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 6, 0, 0, 6.000, 1.000, 0.250, 6.000, NULL, 0, 80, 480, 1920, 480, NULL, NULL),
(4, 2, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 0, 0, 3, 51.000, 51.000, 3.000, 51.000, NULL, 0, 102, 102, 1734, 5202, NULL, NULL),
(5, 3, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 0, 0, 100, 1700.000, 1700.000, 100.000, 1700.000, NULL, 0, 102, 102, 1734, 173400, NULL, NULL),
(6, 4, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 0, 0, 50, 1050.000, 1050.000, 50.000, 1050.000, NULL, 0, 105, 105, 2205, 110250, NULL, NULL),
(7, 5, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 10, 0, 0, 10.000, 10.000, 0.139, 10.000, NULL, 0, 37, 37, 2664, 370, NULL, NULL),
(8, 5, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 0, 0, 1, 21.000, 21.000, 1.000, 21.000, NULL, 0, 105, 105, 2205, 2205, NULL, NULL),
(9, 6, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 5, 0, 0, 5.000, 5.000, 0.139, 5.000, NULL, 0, 278, 278, 10008, 1390, NULL, NULL),
(10, 6, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 10, 0, 0, 10.000, 10.000, 0.588, 10.000, NULL, 0, 102, 102, 1734, 1020, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_returns`
--

CREATE TABLE `purchase_returns` (
  `purchase_return_id` bigint(20) UNSIGNED NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `purchase_return_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_return_supplier_id` int(11) NOT NULL,
  `purchase_return_total_items` int(11) NOT NULL,
  `purchase_return_total_quantity` int(11) NOT NULL,
  `purchase_return_free_piece` int(11) DEFAULT NULL,
  `purchase_return_free_amount` int(11) DEFAULT NULL,
  `purchase_return_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_return_date` date DEFAULT NULL,
  `purchase_return_total_price` decimal(10,2) NOT NULL,
  `purchase_return_add_amount` decimal(10,2) DEFAULT NULL,
  `purchase_return_discount` decimal(10,2) DEFAULT NULL,
  `purchase_return_grandtotal_price` decimal(10,2) NOT NULL,
  `purchase_return_amount_paid` decimal(10,2) NOT NULL,
  `purchase_return_amount_dues` decimal(10,2) NOT NULL,
  `supplier_balance_paid` decimal(10,3) DEFAULT NULL,
  `supplier_balance_dues` decimal(10,3) DEFAULT NULL,
  `purchase_return_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_return_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_return_invoice_id` int(11) DEFAULT NULL,
  `purchase_return_invoice_date` date DEFAULT NULL,
  `purchase_return_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_note` text COLLATE utf8mb4_unicode_ci,
  `purchase_return_returned_by` int(11) NOT NULL,
  `purchase_return_payment_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purchase_return_payment_cheque` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'web', '2021-02-06 13:23:13', '2021-02-06 13:23:13'),
(2, 'admin', 'web', '2021-02-06 13:23:13', '2021-02-06 13:23:13'),
(3, 'user', 'web', '2021-02-06 13:23:13', '2021-02-06 13:23:13'),
(4, 'guest', 'web', '2021-02-06 13:23:13', '2021-02-06 13:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `role_hierarchy`
--

CREATE TABLE `role_hierarchy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `hierarchy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_hierarchy`
--

INSERT INTO `role_hierarchy` (`id`, `role_id`, `hierarchy`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `salereturn_products`
--

CREATE TABLE `salereturn_products` (
  `salereturn_products_id` bigint(20) UNSIGNED NOT NULL,
  `sale_return_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `salereturn_product_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `salereturn_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salereturn_product_barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salereturn_product_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salereturn_product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salereturn_piece_per_packet` int(11) NOT NULL,
  `salereturn_packet_per_carton` int(11) NOT NULL,
  `salereturn_piece_per_carton` int(11) NOT NULL,
  `salereturn_pieces_total` int(11) NOT NULL,
  `salereturn_packets_total` int(11) NOT NULL,
  `salereturn_cartons_total` int(11) NOT NULL,
  `salereturn_quantity_total` int(11) NOT NULL,
  `salereturn_quantity_damage` int(11) DEFAULT NULL,
  `salereturn_trade_discount` int(11) NOT NULL,
  `salereturn_trade_price_piece` int(11) NOT NULL,
  `salereturn_trade_price_packet` int(11) NOT NULL,
  `salereturn_trade_price_carton` int(11) NOT NULL,
  `salereturn_product_sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salereturn_products`
--

INSERT INTO `salereturn_products` (`salereturn_products_id`, `sale_return_id`, `product_id`, `salereturn_product_ref_no`, `warehouse_id`, `salereturn_product_name`, `salereturn_product_barcode`, `salereturn_product_company`, `salereturn_product_brand`, `salereturn_piece_per_packet`, `salereturn_packet_per_carton`, `salereturn_piece_per_carton`, `salereturn_pieces_total`, `salereturn_packets_total`, `salereturn_cartons_total`, `salereturn_quantity_total`, `salereturn_quantity_damage`, `salereturn_trade_discount`, `salereturn_trade_price_piece`, `salereturn_trade_price_packet`, `salereturn_trade_price_carton`, `salereturn_product_sub_total`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 2, 0, 0, 2, NULL, 0, 85, 510, 2040, 170, NULL, NULL),
(2, 2, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 1, 0, 0, 1, NULL, 0, 280, 280, 10080, 280, NULL, NULL),
(3, 3, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 5, 0, 0, 5, NULL, 0, 110, 110, 1870, 550, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `sale_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_customer_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_total_items` int(11) NOT NULL,
  `sale_total_quantity` int(11) NOT NULL,
  `sale_free_piece` int(11) DEFAULT NULL,
  `sale_free_amount` int(11) DEFAULT NULL,
  `sale_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_note` text COLLATE utf8mb4_unicode_ci,
  `sale_total_price` decimal(10,2) NOT NULL,
  `sale_add_amount` decimal(10,2) DEFAULT NULL,
  `sale_discount` decimal(10,2) DEFAULT NULL,
  `sale_grandtotal_price` decimal(10,2) NOT NULL,
  `sale_amount_paid` decimal(10,2) NOT NULL,
  `sale_amount_dues` decimal(10,2) NOT NULL,
  `customer_balance_paid` decimal(10,3) DEFAULT NULL,
  `customer_balance_dues` decimal(10,3) DEFAULT NULL,
  `sale_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_payment_note` text COLLATE utf8mb4_unicode_ci,
  `sale_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_invoice_date` date DEFAULT NULL,
  `sale_added_by` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `sale_payment_type` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_payment_cheque` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `sale_ref_no`, `sale_customer_id`, `sale_total_items`, `sale_total_quantity`, `sale_free_piece`, `sale_free_amount`, `sale_status`, `sale_note`, `sale_total_price`, `sale_add_amount`, `sale_discount`, `sale_grandtotal_price`, `sale_amount_paid`, `sale_amount_dues`, `customer_balance_paid`, `customer_balance_dues`, `sale_payment_method`, `sale_payment_status`, `sale_payment_note`, `sale_document`, `sale_invoice_id`, `sale_invoice_date`, `sale_added_by`, `warehouse_id`, `sale_payment_type`, `sale_payment_cheque`, `created_at`, `updated_at`) VALUES
(1, '5K2bb37O', '1', 1, 27, 0, 0, 'created', NULL, 2685.00, 0.00, 15.00, 2685.00, 0.00, 2685.00, NULL, NULL, 'nonbulk', 'due', NULL, NULL, 'sale-2021-00000001', '2021-04-29', 1, 1, '', '', '2021-04-29 02:37:35', NULL),
(2, 'TJtqd9KT', '1', 1, 2, 0, 0, 'completed', NULL, 200.00, 0.00, 0.00, 200.00, 2885.00, -2685.00, NULL, NULL, 'nonbulk', 'paid', NULL, NULL, 'sale-2021-00000002', '2021-04-30', 2, 1, '', '', '2021-04-30 09:36:45', NULL),
(3, 'bXVLUrSs', '2', 3, 4, 0, 0, 'completed', NULL, 1504.00, 0.00, 0.00, 1504.00, 1504.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000003', '2021-04-30', 2, 1, '', '', '2021-04-30 09:38:37', NULL),
(4, 'SH97dPvo', '2', 1, 77, 0, 0, 'completed', NULL, 3003.00, 0.00, 0.00, 3003.00, 3003.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000004', '2021-04-30', 2, 1, '', '', '2021-04-30 09:46:59', NULL),
(6, 'GDMgFRey', '3', 1, 5, 0, 0, 'created', NULL, 450.00, 0.00, 0.00, 450.00, 0.00, 3798.00, NULL, NULL, 'credit', 'due', NULL, NULL, 'sale-2021-00000005', '2021-04-30', 2, 1, '', '', '2021-04-30 10:27:26', '2021-06-16 03:34:28'),
(7, 'pEzoAewQ', '2', 1, 1, 0, 0, 'pending', NULL, 85.00, 0.00, 0.00, 85.00, 0.00, 85.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000007', '2021-04-30', 2, 1, '', '', '2021-04-30 10:28:08', NULL),
(8, 'D4sbsI37', '2', 1, 5, 0, 0, 'created', NULL, 425.00, 0.00, 0.00, 425.00, 0.00, 425.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000008', '2021-04-30', 2, 1, '', '', '2021-04-30 10:28:32', '2021-06-10 06:06:52'),
(9, '46D1xkiq', '2', 3, 24, 0, 0, 'completed', NULL, 3282.00, 0.00, 0.00, 3282.00, 3300.00, -18.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000009', '2021-04-30', 2, 1, '', '', '2021-04-30 10:54:27', NULL),
(10, 'qHPl4nES', '2', 3, 15, 0, 0, 'completed', NULL, 1219.00, 0.00, 5.00, 1219.00, 1300.00, -81.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000010', '2021-04-30', 2, 1, '', '', '2021-04-30 10:59:40', NULL),
(11, 'w1bm5g6l', '2', 1, 6, 0, 0, 'completed', NULL, 234.00, 0.00, 0.00, 234.00, 600.00, -366.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000011', '2021-05-01', 2, 1, '', '', '2021-05-01 09:33:52', NULL),
(12, 'CpJMjNzQ', '3', 1, 2, 0, 0, 'completed', NULL, 2040.00, 0.00, 0.00, 2040.00, 2040.00, 0.00, NULL, NULL, 'credit', 'paid', NULL, NULL, 'sale-2021-00000012', '2021-05-02', 2, 1, '', '', '2021-05-02 04:08:26', '2021-05-02 04:12:29'),
(13, 'RqxyocMn', '4', 1, 2, 0, 0, 'created', NULL, 170.00, 0.00, 0.00, 170.00, 0.00, 170.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000013', '2021-05-02', 2, 1, '', '', '2021-05-02 04:15:40', NULL),
(14, 'QZoHv5WA', '5', 1, 12, 0, 0, 'created', NULL, 1320.00, 0.00, 0.00, 1320.00, 0.00, 1320.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000014', '2021-05-02', 2, 1, '', '', '2021-05-02 09:21:09', NULL),
(15, 'J7VbTy1Z', '5', 1, 72, 0, 0, 'created', NULL, 2808.00, 0.00, 0.00, 2808.00, 0.00, 2808.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000015', '2021-05-02', 2, 1, '', '', '2021-05-02 09:23:53', NULL),
(16, 'TXKVD7FO', '2', 1, 72, 0, 0, 'created', NULL, 2808.00, 0.00, 0.00, 2808.00, 0.00, 2808.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000016', '2021-05-02', 2, 1, '', '', '2021-05-02 11:20:24', '2021-05-31 08:26:10'),
(17, 'i9rf22HT', '8', 2, 74, 0, 0, 'completed', NULL, 3456.00, 0.00, 0.00, 3456.00, 6000.00, -2544.00, NULL, 7886.000, 'cash', 'paid', NULL, NULL, 'sale-2021-00000017', '2021-05-18', 2, 1, '', '', '2021-05-18 10:58:56', '2021-07-06 08:39:53'),
(18, 'VKl4eHjo', '9', 1, 360, 0, 0, 'completed', 'edited bill', 14040.00, 0.00, 0.00, 14040.00, 28400.00, -14095.00, NULL, NULL, 'credit', 'paid', NULL, NULL, 'sale-2021-00000018', '2021-05-18', 2, 1, '', '', '2021-05-18 11:07:23', '2021-05-18 11:10:16'),
(19, 'XWzX3EgD', '8', 1, 5, 0, 0, 'completed', NULL, 1010.00, 0.00, 0.00, 1010.00, 1010.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000019', '2021-05-26', 2, 1, '', '', '2021-05-26 08:37:28', '2021-06-16 03:13:24'),
(20, 'oqJnKxX2', '8', 1, 3, 0, 0, 'completed', NULL, 840.00, 0.00, 0.00, 840.00, 840.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000020', '2021-05-26', 2, 1, '', '', '2021-05-26 08:39:45', NULL),
(21, 'cY2CrrOt', '2', 1, 10, 0, 0, 'completed', NULL, 670.00, 0.00, 0.00, 670.00, 680.00, -10.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000021', '2021-05-28', 2, 1, '', '', '2021-05-28 12:13:52', NULL),
(22, 'udRzzkI5', '8', 1, 5, 0, 0, 'created', NULL, 335.00, 0.00, 0.00, 335.00, 0.00, 335.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000022', '2021-05-31', 2, 1, '', '', '2021-05-31 07:16:45', '2021-06-16 03:24:47'),
(23, '6SiqxSej', '8', 2, 10, 0, 0, 'completed', NULL, 1760.00, 0.00, 0.00, 1760.00, 1760.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000023', '2021-05-31', 2, 1, '', '', '2021-05-31 07:26:50', NULL),
(24, 'dZGZiQBY', '8', 1, 10, 0, 0, 'completed', NULL, 2800.00, 0.00, 0.00, 2800.00, 2800.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000024', '2021-05-31', 2, 1, '', '', '2021-05-31 07:29:50', '2021-06-16 03:04:56'),
(25, '4Ph7oGvS', '7', 1, 10, 0, 0, 'completed', NULL, 2850.00, 0.00, 0.00, 2850.00, 2850.00, 0.00, NULL, NULL, 'nonbulk', 'paid', NULL, NULL, 'sale-2021-00000025', '2021-05-31', 2, 1, '', '', '2021-05-31 07:33:08', NULL),
(26, 'KFflrozj', '9', 2, 6, 0, 0, 'completed', NULL, 1914.00, 0.00, 0.00, 1914.00, 2279.00, 0.00, NULL, NULL, 'credit', 'paid', NULL, NULL, 'sale-2021-00000026', '2021-05-31', 2, 1, '', '', '2021-05-31 07:48:32', '2021-05-31 07:51:19'),
(27, 'b2xLQzi9', '2', 1, 1, 0, 0, 'created', NULL, 1010.00, 0.00, 0.00, 1010.00, 0.00, 1010.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000027', '2021-05-31', 2, 1, '', '', '2021-05-31 08:35:04', NULL),
(28, 'KawJWdA5', '8', 3, 43, 0, 0, 'completed', NULL, 16480.00, 0.00, 0.00, 16480.00, 16480.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000028', '2021-05-31', 2, 1, '', '', '2021-05-31 08:56:30', NULL),
(29, 'TYKZHrpf', '1', 1, 5, 0, 0, 'completed', NULL, 195.00, 0.00, 0.00, 195.00, 200.00, -5.00, NULL, NULL, 'nonbulk', 'paid', NULL, NULL, 'sale-2021-00000029', '2021-05-31', 2, 1, '', '', '2021-05-31 09:03:26', NULL),
(30, 'tU77ZFhs', '2', 1, 10, 0, 0, 'completed', NULL, 1100.00, 0.00, 0.00, 1100.00, 1100.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000030', '2021-05-31', 2, 1, '', '', '2021-05-31 09:13:03', NULL),
(31, '2gAC8B3R', '4', 2, 298, 0, 0, 'created', NULL, 21836.00, 0.00, 0.00, 21836.00, 0.00, 21836.00, NULL, NULL, 'cash', 'due', NULL, NULL, 'sale-2021-00000031', '2021-06-10', 2, 1, '', '', '2021-06-10 10:38:09', NULL),
(32, 'UTGutph2', '2', 1, 1, 0, 0, 'completed', NULL, 1010.00, 0.00, 0.00, 1010.00, 1010.00, 0.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000032', '2021-06-10', 2, 1, '', '', '2021-06-10 10:41:08', NULL),
(33, 'RA296ny2', '4', 1, 36, 0, 0, 'completed', NULL, 10080.00, 0.00, 0.00, 10080.00, 11080.00, -1000.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000033', '2021-06-10', 2, 1, '', '', '2021-06-10 11:52:20', '2021-06-10 11:54:38'),
(34, '15OpWzNa', '6', 1, 5, 0, 0, 'completed', NULL, 1010.00, 0.00, 0.00, 1010.00, 2020.00, -1010.00, NULL, NULL, 'cash', 'paid', NULL, NULL, 'sale-2021-00000034', '2021-06-16', 2, 1, '', '', '2021-06-16 11:19:04', '2021-06-16 02:38:19'),
(35, 'Ft8Gsx0J', '4', 1, 2, 0, 0, 'created', NULL, 1010.00, 0.00, 0.00, 1010.00, 0.00, 1010.00, NULL, 22016.000, 'cash', 'due', NULL, NULL, 'sale-2021-00000035', '2021-07-12', 2, 1, NULL, NULL, '2021-07-12 10:30:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_products`
--

CREATE TABLE `sale_products` (
  `sale_products_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `sale_product_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `sale_product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_product_barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_product_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_product_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_piece_per_packet` int(11) NOT NULL,
  `sale_packet_per_carton` int(11) NOT NULL,
  `sale_piece_per_carton` int(11) NOT NULL,
  `sale_pieces_number` int(20) NOT NULL,
  `sale_packets_number` int(20) NOT NULL,
  `sale_cartons_number` int(20) NOT NULL,
  `sale_pieces_total` decimal(10,3) NOT NULL,
  `sale_packets_total` decimal(10,3) NOT NULL,
  `sale_cartons_total` decimal(10,3) NOT NULL,
  `sale_quantity_total` decimal(10,3) NOT NULL,
  `sale_quantity_damage` int(11) DEFAULT NULL,
  `sale_trade_discount` int(11) NOT NULL,
  `sale_product_punch_time` text COLLATE utf8mb4_unicode_ci,
  `sale_trade_price_piece` int(11) NOT NULL,
  `sale_trade_price_packet` int(11) NOT NULL,
  `sale_trade_price_carton` int(11) NOT NULL,
  `sale_product_sub_total` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_products`
--

INSERT INTO `sale_products` (`sale_products_id`, `sale_id`, `product_id`, `sale_product_ref_no`, `warehouse_id`, `sale_product_name`, `sale_product_barcode`, `sale_product_company`, `sale_product_brand`, `sale_piece_per_packet`, `sale_packet_per_carton`, `sale_piece_per_carton`, `sale_pieces_number`, `sale_packets_number`, `sale_cartons_number`, `sale_pieces_total`, `sale_packets_total`, `sale_cartons_total`, `sale_quantity_total`, `sale_quantity_damage`, `sale_trade_discount`, `sale_product_punch_time`, `sale_trade_price_piece`, `sale_trade_price_packet`, `sale_trade_price_carton`, `sale_product_sub_total`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 'uyig6', 1, 'Galaxy S5', '1234567891234567', NULL, NULL, 1, 1, 1, 0, 1, 0, 1.000, 1.000, 1.000, 1.000, NULL, 0, NULL, 1010, 1010, 1010, 1010, NULL, NULL),
(10, 7, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 1, 0, 0, 1.000, 0.167, 0.042, 1.000, NULL, 0, NULL, 85, 510, 2040, 85, NULL, NULL),
(11, 8, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 5, 0, 0, 5.000, 0.833, 0.208, 5.000, NULL, 0, NULL, 85, 510, 2040, 425, NULL, NULL),
(12, 9, 3, 'df32', 1, 'Jumbo', '1234567891234567', NULL, NULL, 1, 1, 1, 3, 0, 0, 3.000, 3.000, 3.000, 3.000, NULL, 0, NULL, 324, 324, 324, 972, NULL, NULL),
(13, 9, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 3, 0, 0, 3.000, 3.000, 0.143, 3.000, NULL, 0, NULL, 110, 110, 2310, 330, NULL, NULL),
(14, 9, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 1, 0, 1, 18.000, 18.000, 1.059, 18.000, NULL, 0, NULL, 110, 110, 1870, 1980, NULL, NULL),
(15, 10, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 6, 0, 0, 6.000, 6.000, 0.286, 6.000, NULL, 5, NULL, 110, 110, 2310, 655, NULL, NULL),
(16, 10, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 6, 0, 0, 6.000, 6.000, 0.083, 6.000, NULL, 0, NULL, 39, 39, 2808, 234, NULL, NULL),
(17, 10, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 3, 0, 0, 3.000, 3.000, 0.176, 3.000, NULL, 0, NULL, 110, 110, 1870, 330, NULL, NULL),
(18, 11, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 6, 0, 0, 6.000, 6.000, 0.083, 6.000, NULL, 0, NULL, 39, 39, 2808, 234, NULL, NULL),
(19, 12, 1, 'uyig6', 1, 'Galaxy S5', '1234567891234567', NULL, NULL, 1, 1, 1, 1, 0, 1, 2.000, 2.000, 2.000, 2.000, NULL, 0, NULL, 1020, 1020, 1020, 2040, NULL, NULL),
(20, 13, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 2, 0, 0, 2.000, 0.333, 0.083, 2.000, NULL, 0, NULL, 85, 510, 2040, 170, NULL, NULL),
(21, 14, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 12, 0, 0, 12.000, 12.000, 0.706, 12.000, NULL, 0, NULL, 110, 110, 1870, 1320, NULL, NULL),
(22, 15, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 0, 0, 1, 72.000, 72.000, 1.000, 72.000, NULL, 0, NULL, 39, 39, 2808, 2808, NULL, NULL),
(23, 16, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 0, 0, 1, 72.000, 72.000, 1.000, 72.000, NULL, 0, NULL, 39, 39, 2808, 2808, NULL, NULL),
(24, 17, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 0, 0, 1, 72.000, 72.000, 1.000, 72.000, NULL, 0, NULL, 39, 39, 2808, 2808, NULL, '2021-07-06 08:39:53'),
(25, 17, 3, 'df32', 1, 'Jumbo', '1234567891234567', NULL, NULL, 1, 1, 1, 2, 0, 0, 2.000, 2.000, 2.000, 2.000, NULL, 0, NULL, 324, 324, 324, 648, NULL, '2021-07-06 08:39:53'),
(29, 18, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 0, 0, 5, 360.000, 360.000, 5.000, 360.000, NULL, 0, NULL, 39, 39, 2808, 14040, NULL, NULL),
(30, 19, 11, 'wh200', 1, 'Wheat 200g', '8961008210490', NULL, NULL, 1, 48, 48, 5, 0, 0, 5.000, 5.000, 0.104, 5.000, NULL, 0, NULL, 202, 202, 9696, 1010, NULL, '2021-06-16 03:13:24'),
(33, 20, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 3, 0, 0, 3.000, 3.000, 0.083, 3.000, NULL, 0, NULL, 280, 280, 10080, 840, NULL, NULL),
(34, 21, 12, 'sh/sin', 1, 'Shan Single Pack', '788821150394', NULL, NULL, 1, 1, 144, 10, 0, 0, 10.000, 10.000, 0.069, 10.000, NULL, 0, NULL, 67, 67, 9648, 670, NULL, NULL),
(35, 22, 12, 'sh/sin', 1, 'Shan Single Pack', '788821150394', NULL, NULL, 1, 1, 144, 5, 0, 0, 5.000, 5.000, 0.035, 5.000, NULL, 0, NULL, 67, 67, 9648, 335, NULL, '2021-06-16 03:24:47'),
(36, 23, 8, 'telcum', 1, 'Med/Telc/Small', '1000', NULL, NULL, 12, 24, 288, 5, 0, 0, 5.000, 0.417, 0.017, 5.000, NULL, 0, NULL, 72, 864, 20736, 360, NULL, NULL),
(37, 23, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 5, 0, 0, 5.000, 5.000, 0.139, 5.000, NULL, 0, NULL, 280, 280, 10080, 1400, NULL, NULL),
(38, 24, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 10, 0, 0, 10.000, 10.000, 0.278, 10.000, NULL, 0, NULL, 280, 280, 10080, 2800, NULL, '2021-06-16 03:04:56'),
(39, 25, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 10, 0, 0, 10.000, 10.000, 0.278, 10.000, NULL, 0, NULL, 285, 285, 10260, 2850, NULL, NULL),
(40, 26, 7, 'med35', 1, 'Medicam 35g', '8961100283331', NULL, NULL, 12, 24, 288, 3, 0, 0, 3.000, 0.250, 0.010, 3.000, NULL, 0, NULL, 53, 636, 15264, 159, NULL, NULL),
(41, 26, 10, 'lac1l', 1, 'Lactogen 1 400g', '8961008213446', NULL, NULL, 1, 24, 24, 3, 0, 0, 3.000, 3.000, 0.125, 3.000, NULL, 0, NULL, 585, 585, 14040, 1755, NULL, NULL),
(43, 27, 1, 'uyig6', 1, 'Galaxy S5', '1234567891234567', NULL, NULL, 1, 1, 1, 1, 0, 0, 1.000, 1.000, 1.000, 1.000, NULL, 0, NULL, 1010, 1010, 1010, 1010, NULL, NULL),
(44, 28, 10, 'lac1l', 1, 'Lactogen 1 400g', '8961008213446', NULL, NULL, 1, 24, 24, 1, 0, 1, 25.000, 25.000, 1.042, 25.000, NULL, 0, NULL, 580, 580, 13920, 14500, NULL, NULL),
(45, 28, 5, 'areal', 1, 'areal rs10', '353614383674', NULL, NULL, 1, 17, 17, 0, 0, 1, 17.000, 17.000, 1.000, 17.000, NULL, 0, NULL, 110, 110, 1870, 1870, NULL, NULL),
(46, 28, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 1, 0, 0, 1.000, 1.000, 0.048, 1.000, NULL, 0, NULL, 110, 110, 2310, 110, NULL, NULL),
(47, 29, 4, 'knorrC', 1, 'Knorr ch/40', '012184623123', NULL, NULL, 1, 72, 72, 5, 0, 0, 5.000, 5.000, 0.069, 5.000, NULL, 0, NULL, 39, 39, 2808, 195, NULL, NULL),
(48, 30, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 10, 0, 0, 10.000, 10.000, 0.476, 10.000, NULL, 0, NULL, 110, 110, 2310, 1100, NULL, NULL),
(49, 31, 6, 'ariel', 1, 'ariel rs 20', '3626+26+6+', NULL, NULL, 1, 21, 21, 10, 0, 0, 10.000, 10.000, 0.476, 10.000, NULL, 0, NULL, 110, 110, 2310, 1100, NULL, NULL),
(50, 31, 8, 'telcum', 1, 'Med/Telc/Small', '1000', NULL, NULL, 12, 24, 288, 0, 0, 1, 288.000, 24.000, 1.000, 288.000, NULL, 0, NULL, 72, 864, 20736, 20736, NULL, NULL),
(51, 32, 1, 'uyig6', 1, 'Galaxy S5', '1234567891234567', NULL, NULL, 1, 1, 1, 1, 0, 0, 1.000, 1.000, 1.000, 1.000, NULL, 0, NULL, 1010, 1010, 1010, 1010, NULL, NULL),
(52, 33, 9, 'lac1s', 1, 'Lactogen 1 200g', '8961008213439', NULL, NULL, 1, 36, 36, 0, 0, 1, 36.000, 36.000, 1.000, 36.000, NULL, 0, NULL, 280, 280, 10080, 10080, NULL, NULL),
(54, 34, 11, 'wh200', 1, 'Wheat 200g', '8961008210490', NULL, NULL, 1, 48, 48, 5, 0, 0, 5.000, 5.000, 0.104, 5.000, NULL, 0, '11:14AM', 202, 202, 9696, 1010, '2021-06-16 11:19:04', '2021-06-16 02:38:19'),
(55, 6, 2, 'H5c0T', 1, 'Water Bottle', '5045678214564579', NULL, NULL, 6, 4, 24, 5, 0, 0, 5.000, 0.833, 0.208, 5.000, NULL, 0, '3:32PM', 90, 540, 2160, 450, '2021-06-16 03:32:44', '2021-06-16 03:34:28'),
(56, 35, 1, 'uyig6', 1, 'Galaxy S5', '1234567891234567', NULL, NULL, 1, 1, 1, 1, 1, 0, 2.000, 2.000, 2.000, 2.000, NULL, 0, '10:0AM', 1010, 1010, 1010, 1010, '2021-07-12 10:30:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sale_returns`
--

CREATE TABLE `sale_returns` (
  `sale_return_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `sale_return_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_return_customer_id` int(11) NOT NULL,
  `sale_return_total_items` int(11) NOT NULL,
  `sale_return_total_quantity` int(11) NOT NULL,
  `sale_return_free_piece` int(11) DEFAULT NULL,
  `sale_return_free_amount` int(11) DEFAULT NULL,
  `sale_return_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_return_date` date DEFAULT NULL,
  `sale_return_total_price` decimal(10,2) NOT NULL,
  `sale_return_add_amount` decimal(10,2) DEFAULT NULL,
  `sale_return_discount` decimal(10,2) DEFAULT NULL,
  `sale_return_grandtotal_price` decimal(10,2) NOT NULL,
  `sale_return_amount_return` decimal(10,2) NOT NULL,
  `sale_return_amount_dues` decimal(10,2) NOT NULL,
  `customer_balance_paid` decimal(10,3) DEFAULT NULL,
  `customer_balance_dues` decimal(10,3) DEFAULT NULL,
  `sale_return_payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_return_payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_return_invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_return_invoice_date` date DEFAULT NULL,
  `sale_return_document` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_return_note` text COLLATE utf8mb4_unicode_ci,
  `sale_return_returned_by` int(11) NOT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `sale_return_payment_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_return_payment_cheque` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sale_returns`
--

INSERT INTO `sale_returns` (`sale_return_id`, `sale_id`, `sale_return_ref_no`, `sale_return_customer_id`, `sale_return_total_items`, `sale_return_total_quantity`, `sale_return_free_piece`, `sale_return_free_amount`, `sale_return_status`, `sale_return_date`, `sale_return_total_price`, `sale_return_add_amount`, `sale_return_discount`, `sale_return_grandtotal_price`, `sale_return_amount_return`, `sale_return_amount_dues`, `customer_balance_paid`, `customer_balance_dues`, `sale_return_payment_method`, `sale_return_payment_status`, `sale_return_invoice_id`, `sale_return_invoice_date`, `sale_return_document`, `sale_return_note`, `sale_return_returned_by`, `warehouse_id`, `sale_return_payment_type`, `sale_return_payment_cheque`, `created_at`, `updated_at`) VALUES
(1, NULL, '6DgzXQLv', 3, 1, 2, 0, 0, 'pending', '2021-06-16', 170.00, 0.00, 0.00, 170.00, 0.00, 170.00, NULL, NULL, 'cash', 'due', 's.return-2021-00000001', '2021-06-16', NULL, NULL, 2, NULL, NULL, NULL, '2021-06-16 02:31:17', NULL),
(2, NULL, 'lAIS0l8A', 8, 1, 1, 0, 0, 'pending', '2021-07-06', 280.00, 0.00, 0.00, 280.00, 0.00, 280.00, NULL, 7606.000, 'cash', 'due', 's.return-2021-00000002', '2021-07-06', NULL, NULL, 2, NULL, NULL, NULL, '2021-07-06 08:32:55', NULL),
(3, NULL, 'AIjvljFz', 8, 1, 5, 0, 0, 'pending', '2021-07-06', 550.00, 0.00, 0.00, 550.00, 0.00, 550.00, NULL, 7336.000, 'cash', 'due', 's.return-2021-00000003', '2021-07-06', NULL, NULL, 2, NULL, NULL, NULL, '2021-07-06 08:33:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `class`) VALUES
(1, 'ongoing', 'badge badge-pill badge-primary'),
(2, 'stopped', 'badge badge-pill badge-secondary'),
(3, 'completed', 'badge badge-pill badge-success'),
(4, 'expired', 'badge badge-pill badge-warning');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_shop_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_shop_info` text COLLATE utf8mb4_unicode_ci,
  `supplier_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_alternate_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_cnic_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_shop_address` text COLLATE utf8mb4_unicode_ci,
  `supplier_resident_address` text COLLATE utf8mb4_unicode_ci,
  `supplier_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_office_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_alternate_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_total_balance` decimal(10,2) DEFAULT NULL,
  `supplier_balance_paid` decimal(10,2) DEFAULT NULL,
  `supplier_balance_dues` decimal(10,2) DEFAULT NULL,
  `status_id` int(20) NOT NULL,
  `supplier_created_by` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `supplier_ref_no`, `supplier_type`, `supplier_name`, `supplier_shop_name`, `supplier_shop_info`, `supplier_email`, `supplier_alternate_email`, `supplier_cnic_number`, `supplier_town`, `supplier_area`, `supplier_shop_address`, `supplier_resident_address`, `supplier_zipcode`, `supplier_phone_number`, `supplier_office_number`, `supplier_alternate_number`, `supplier_total_balance`, `supplier_balance_paid`, `supplier_balance_dues`, `status_id`, `supplier_created_by`, `created_at`, `updated_at`) VALUES
(1, 'R8Y53', 'general', 'Asif Ghafoor', 'Shop 101', 'A Wholeseller Store', NULL, NULL, NULL, 'Lee Market', 'Lyari, Karachi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2410.00, -2410.00, 1, 2, NULL, NULL),
(2, 'V3O6M', 'general', 'Danish Anwer', 'Shop 102', 'Big Supplier', NULL, NULL, NULL, 'Highway', 'North, Karachi, Karachi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2575.00, -2575.00, 1, 2, NULL, NULL),
(3, 'P&G', 'general', 'P7g', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5682.00, 283650.00, 1, 2, NULL, NULL),
(4, '001', 'general', 'medicam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menuroles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `menuroles`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Super Admin', 'superadmin', '2021-02-06 13:23:14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user,admin,superadmin', 'FJvV58VMFk00V6rVcDgXHYC4FaGvvlMzFcP1xbaoi1t9VOBgfN4or7A8Ecwz', '2021-02-06 13:23:14', '2021-02-06 13:23:14', NULL),
(2, 'Syed Azhar', 'syedazhar1971', '2021-02-06 13:23:14', '$2y$10$vDAh9navVkg8yZr68v/K6eW9Mq682psiIM3nALiXONMJg6hj/X4ES', 'user,admin,superadmin', 'tOxborvHe3WwCxJGBgVVsEcF4C8CREN6X4XLATqLNeLEnZSQj98RxhReqfy8', '2021-02-06 13:23:14', '2021-02-18 13:57:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_warehouses`
--

CREATE TABLE `user_warehouses` (
  `user_warehouses_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_warehouses`
--

INSERT INTO `user_warehouses` (`user_warehouses_id`, `user_id`, `warehouse_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-03-11 13:06:05', '2021-03-11 13:06:05'),
(2, 1, 1, '2021-03-11 13:06:05', '2021-03-11 13:06:05');

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `warehouse_id` bigint(20) UNSIGNED NOT NULL,
  `warehouse_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warehouse_location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warehouse_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_id`, `warehouse_name`, `warehouse_location`, `warehouse_phone_number`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'Al-Syed 5C4', 'Karachi', '03312345546', 1, '2021-02-10 06:45:38', '2021-02-10 06:45:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `accounts_account_ref_no_index` (`account_ref_no`),
  ADD KEY `accounts_account_customer_id_index` (`account_customer_id`),
  ADD KEY `accounts_account_supplier_id_index` (`account_supplier_id`),
  ADD KEY `accounts_account_name_index` (`account_name`),
  ADD KEY `accounts_account_created_by_index` (`account_created_by`);

--
-- Indexes for table `account_payments`
--
ALTER TABLE `account_payments`
  ADD PRIMARY KEY (`account_payments_id`),
  ADD KEY `account_payments_account_id_index` (`account_id`),
  ADD KEY `account_payments_payment_id_index` (`payment_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brands_brand_name_unique` (`brand_name`),
  ADD KEY `brands_brand_ref_no_index` (`brand_ref_no`),
  ADD KEY `brands_parent_company_index` (`parent_company`),
  ADD KEY `brands_status_id_index` (`status_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `companies_company_name_unique` (`company_name`),
  ADD KEY `companies_company_ref_no_index` (`company_ref_no`),
  ADD KEY `companies_parent_company_index` (`company_parent`),
  ADD KEY `companies_status_id_index` (`status_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `customers_customer_name_unique` (`customer_name`),
  ADD KEY `customers_customer_ref_no_index` (`customer_ref_no`),
  ADD KEY `customers_status_id_index` (`status_id`),
  ADD KEY `customers_created_by_index` (`customer_created_by`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_field`
--
ALTER TABLE `form_field`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `invoices_sale_id_index` (`sale_id`),
  ADD KEY `invoices_sale_return_id_index` (`sale_return_id`),
  ADD KEY `invoices_purchase_id_index` (`purchase_id`),
  ADD KEY `invoices_purchase_return_id_index` (`purchase_return_id`),
  ADD KEY `invoices_payment_id_index` (`payment_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menulist`
--
ALTER TABLE `menulist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_payment_ref_no_index` (`payment_ref_no`),
  ADD KEY `payments_payment_customer_id_index` (`payment_customer_id`),
  ADD KEY `payments_payment_supplier_id_index` (`payment_supplier_id`),
  ADD KEY `payments_account_id_index` (`account_id`),
  ADD KEY `payments_payment_invoice_no_index` (`payment_invoice_id`),
  ADD KEY `payments_created_by_index` (`payment_created_by`),
  ADD KEY `sale_id` (`sale_id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `sale_purch_invoice_id` (`sale_purch_invoice_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `products_product_name_unique` (`product_name`),
  ADD KEY `products_product_ref_no_index` (`product_ref_no`),
  ADD KEY `products_warehouse_id_index` (`warehouse_id`),
  ADD KEY `products_product_company_id_index` (`product_company`),
  ADD KEY `products_product_brand_id_index` (`product_brand`),
  ADD KEY `products_status_id_index` (`status_id`);

--
-- Indexes for table `product_barcodes`
--
ALTER TABLE `product_barcodes`
  ADD PRIMARY KEY (`product_barcode_id`),
  ADD KEY `product_barcodes_product_id_index` (`product_id`),
  ADD KEY `product_barcodes_product_barcode_index` (`product_barcodes`);

--
-- Indexes for table `purchasereturn_products`
--
ALTER TABLE `purchasereturn_products`
  ADD PRIMARY KEY (`purchasereturn_products_id`),
  ADD KEY `purchasereturn_products_purchasereturn_id_index` (`purchase_return_id`),
  ADD KEY `purchasereturn_products_product_id_index` (`product_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `purchases_purchase_ref_no_index` (`purchase_ref_no`),
  ADD KEY `purchases_purchase_supplier_id_index` (`purchase_supplier_id`),
  ADD KEY `purchases_purchase_invoice_id_index` (`purchase_invoice_id`),
  ADD KEY `purchases_warehouse_id_index` (`warehouse_id`);

--
-- Indexes for table `purchase_products`
--
ALTER TABLE `purchase_products`
  ADD PRIMARY KEY (`purchase_products_id`),
  ADD KEY `purchase_products_purchase_id_index` (`purchase_id`),
  ADD KEY `purchase_products_product_id_index` (`product_id`);

--
-- Indexes for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  ADD PRIMARY KEY (`purchase_return_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salereturn_products`
--
ALTER TABLE `salereturn_products`
  ADD PRIMARY KEY (`salereturn_products_id`),
  ADD KEY `salereturn_products_salereturn_id_index` (`sale_return_id`),
  ADD KEY `salereturn_products_product_id_index` (`product_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `sales_sale_ref_no_index` (`sale_ref_no`),
  ADD KEY `sales_sale_customer_id_index` (`sale_customer_id`),
  ADD KEY `sales_sale_invoice_id_index` (`sale_invoice_id`),
  ADD KEY `sales_sale_warehouse_id_index` (`warehouse_id`);

--
-- Indexes for table `sale_products`
--
ALTER TABLE `sale_products`
  ADD PRIMARY KEY (`sale_products_id`),
  ADD KEY `sale_products_sale_id_index` (`sale_id`),
  ADD KEY `sale_products_product_id_index` (`product_id`);

--
-- Indexes for table `sale_returns`
--
ALTER TABLE `sale_returns`
  ADD PRIMARY KEY (`sale_return_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `suppliers_supplier_name_unique` (`supplier_name`),
  ADD KEY `suppliers_supplier_ref_no_index` (`supplier_ref_no`),
  ADD KEY `suppliers_status_id_index` (`status_id`),
  ADD KEY `suppliers_created_by_index` (`supplier_created_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_warehouses`
--
ALTER TABLE `user_warehouses`
  ADD PRIMARY KEY (`user_warehouses_id`),
  ADD KEY `user_warehouses_user_id_index` (`user_id`),
  ADD KEY `user_warehouses_warehouse_id_index` (`warehouse_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`warehouse_id`),
  ADD KEY `warehouses_warehouse_name_index` (`warehouse_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_payments`
--
ALTER TABLE `account_payments`
  MODIFY `account_payments_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form_field`
--
ALTER TABLE `form_field`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `invoice_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_barcodes`
--
ALTER TABLE `product_barcodes`
  MODIFY `product_barcode_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `purchasereturn_products`
--
ALTER TABLE `purchasereturn_products`
  MODIFY `purchasereturn_products_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `purchase_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchase_products`
--
ALTER TABLE `purchase_products`
  MODIFY `purchase_products_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `purchase_returns`
--
ALTER TABLE `purchase_returns`
  MODIFY `purchase_return_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `role_hierarchy`
--
ALTER TABLE `role_hierarchy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `salereturn_products`
--
ALTER TABLE `salereturn_products`
  MODIFY `salereturn_products_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sale_products`
--
ALTER TABLE `sale_products`
  MODIFY `sale_products_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `sale_returns`
--
ALTER TABLE `sale_returns`
  MODIFY `sale_return_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_warehouses`
--
ALTER TABLE `user_warehouses`
  MODIFY `user_warehouses_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_barcodes`
--
ALTER TABLE `product_barcodes`
  ADD CONSTRAINT `product_barcodes_product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_warehouses`
--
ALTER TABLE `user_warehouses`
  ADD CONSTRAINT `user_warehouses_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_warehouses_warehouse_id` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouses` (`warehouse_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
