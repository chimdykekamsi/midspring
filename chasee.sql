-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2023 at 12:58 PM
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
-- Database: `chasee`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `account_type` varchar(50) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `routing` varchar(100) DEFAULT NULL,
  `balance` int(50) DEFAULT 0,
  `status` varchar(50) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `user_id`, `account_type`, `account_number`, `routing`, `balance`, `status`, `created_at`, `updated_at`) VALUES
(1, '7636243395', 'GBP', '8809448567', NULL, 0, 'active', '2023-07-10 11:36:04', '2023-07-10 11:36:04'),
(2, '7636243395', 'USD', '6831928116', NULL, 0, 'active', '2023-07-10 11:36:04', '2023-07-10 19:22:54'),
(3, '7636243395', 'EUR', '9530363020', NULL, 0, 'active', '2023-07-10 11:36:05', '2023-07-10 11:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `role` varchar(22) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@admin.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'ROLE_SUPER_ADMIN', NULL, '2023-01-02 23:48:54'),
(2, 'mane', 'mane', 'adam20@hotmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 'ROLE_SUPER_ADMIN', NULL, '2022-12-07 17:21:40'),
(4, 'admin', 'admin', 'admin32admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'ROLE_SUPER_ADMIN', '2023-07-05 08:25:53', '2023-07-05 08:26:25'),
(5, 'admin3', 'admin3', 'admin3@admin.com', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 'ROLE_SUPER_ADMIN', '2023-07-05 09:44:08', '2023-07-05 09:44:08');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `agent` varchar(20) NOT NULL,
  `total_refered` varchar(20) NOT NULL DEFAULT '0',
  `total_activated` varchar(20) DEFAULT '0',
  `earnings` varchar(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `agent`, `total_refered`, `total_activated`, `earnings`, `created_at`, `updated_at`) VALUES
(1, '172', '1', '2', '5500', '2018-05-02 16:52:11', '2018-06-08 13:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `trx` varchar(40) NOT NULL,
  `acoount_id` varchar(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `payment_mode` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `deposits`
--

INSERT INTO `deposits` (`id`, `trx`, `acoount_id`, `user`, `amount`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES
(1, '53698', '2', '7636243395', '100', 'btc', 'confirmed', '2023-07-10 11:36:30', '2023-07-10 12:38:42'),
(2, '77239', '2', '7636243395', '100', 'btc', 'confirmed', '2023-07-10 11:37:02', '2023-07-10 12:39:04'),
(3, '43139', '2', '7636243395', '100', 'btc', 'canceled', '2023-07-10 11:37:02', '2023-07-10 12:37:54'),
(4, '19590', '2', '7636243395', '100', 'btc', 'canceled', '2023-07-10 11:37:35', '2023-07-10 12:37:59'),
(5, '59183', '3', '7636243395', '100', 'eth', 'pending', '2023-07-10 11:40:29', '2023-07-10 11:40:29'),
(6, '30170', '2', '7636243395', '100', 'btc', 'pending', '2023-07-10 11:43:34', '2023-07-10 11:43:34'),
(7, '35225', '2', '7636243395', '100', 'btc', 'pending', '2023-07-10 11:45:21', '2023-07-10 11:45:21'),
(8, '20887', '2', '7636243395', '100', 'btc', 'pending', '2023-07-10 11:45:47', '2023-07-10 11:45:47'),
(9, '77754', '2', '7636243395', '100', 'btc', 'pending', '2023-07-10 11:46:54', '2023-07-10 11:46:54'),
(10, '94406', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:21:14', '2023-07-11 10:21:14'),
(11, '77657', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:34:05', '2023-07-11 10:34:05'),
(12, '77505', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:35:40', '2023-07-11 10:35:40'),
(13, '67518', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:36:13', '2023-07-11 10:36:13'),
(14, '30243', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:37:13', '2023-07-11 10:37:13'),
(15, '39815', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:38:13', '2023-07-11 10:38:13'),
(16, '94600', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:38:56', '2023-07-11 10:38:56'),
(17, '55219', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:39:50', '2023-07-11 10:39:50'),
(18, '90565', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:40:17', '2023-07-11 10:40:17'),
(19, '60479', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:43:38', '2023-07-11 10:43:38'),
(20, '66132', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:44:27', '2023-07-11 10:44:27'),
(21, '17218', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:44:48', '2023-07-11 10:44:48'),
(22, '74583', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:45:02', '2023-07-11 10:45:02'),
(23, '38632', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:45:19', '2023-07-11 10:45:19'),
(24, '37197', '2', '7636243395', '100', 'btc', 'pending', '2023-07-11 10:45:47', '2023-07-11 10:45:47'),
(25, '55590', '2', '7636243395', '100', 'eth', 'pending', '2023-07-11 10:46:17', '2023-07-11 10:46:17'),
(26, '43979', '2', '7636243395', '20', 'usdt', 'pending', '2023-07-11 10:46:41', '2023-07-11 10:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `id` int(11) NOT NULL,
  `user_id` varchar(25) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `loan` varchar(255) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `amount` varchar(50) DEFAULT NULL,
  `interest` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `member` varchar(50) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `paid_from` varchar(50) NOT NULL,
  `paid_to` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `info` varchar(3000) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `info`, `status`) VALUES
(1, '<h2><b>Hello Members</b></h2><i></i><blockquote><p><i>Welcome to midspring bank</i><b><i></i></b></p></blockquote>', 'inactive'),
(2, '<h2><b>Hello Members</b></h2><i></i><blockquote><p><i>Welcome to midspring bank</i><b><i></i></b></p></blockquote>', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `depo` varchar(100) NOT NULL,
  `wthd` varchar(100) NOT NULL,
  `key1` text NOT NULL,
  `key2` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'Method Currency',
  `status` varchar(44) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `image`, `depo`, `wthd`, `key1`, `key2`, `currency`, `status`, `created_at`, `updated_at`) VALUES
(1, 'PayPal', '59f809c931cb0.png', '2', '1.5', 'admin@rexbd.com', NULL, 'USD', 'active', NULL, '2017-12-27 01:45:00'),
(6, 'Skrill', 'skrill.png', '0.7', '1.50', 'paygrain@grain.skrill.com', 'welcome', 'USD', 'inactive', '2017-12-12 18:00:00', '2017-12-20 14:46:01'),
(8, 'VoguePay', 'vogue.jpg', '0.9', '1.3', '', NULL, 'USD', 'active', '2018-04-19 07:25:24', '2018-04-19 05:17:19');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `expected_return` varchar(20) NOT NULL,
  `type` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `increment_interval` varchar(20) NOT NULL,
  `increment_type` varchar(20) NOT NULL,
  `increment_amount` varchar(20) DEFAULT NULL,
  `expiration` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `expected_return`, `type`, `created_at`, `updated_at`, `increment_interval`, `increment_type`, `increment_amount`, `expiration`) VALUES
(1, 'Micro', '1000', '5000', 'Promo', '2018-04-24 21:25:37', '2018-05-18 13:26:21', '', '', NULL, ''),
(2, 'Basic', '5000', '15000', 'Promo', '2018-04-25 09:33:37', '2018-05-18 13:26:29', '', '', NULL, ''),
(7, 'Diamond', '50000', '7000', 'Main', '2018-05-16 10:40:27', '2018-06-08 19:31:50', 'Daily', 'Percentage', '10', 'One year'),
(9, 'Premium', '10000', '25000', 'Promo', '2018-05-18 13:20:51', '2018-05-18 13:26:41', '', '', NULL, ''),
(5, 'Basic', '1000', '3000', 'Main', '2018-04-25 15:02:29', '2018-06-08 19:31:21', 'Weekly', 'Percentage', '14', 'One week'),
(6, 'Silver', '10000', '4000', 'Main', '2018-04-28 12:58:40', '2018-06-08 19:31:32', 'Weekly', 'Fixed', '20', 'One month'),
(8, 'Gold', '100000', '12000', 'Promo', '2018-05-16 10:41:02', '2018-06-08 13:40:20', '', '', NULL, ''),
(10, 'Platinum', '50000', '150000', 'Promo', '2018-05-18 13:21:17', '2018-05-18 13:27:18', '', '', NULL, ''),
(11, 'Gold', '100000', '300000', 'Main', '2018-06-08 19:00:04', '2018-06-08 19:32:08', 'Monthly', 'Percentage', '30', 'One year');

-- --------------------------------------------------------

--
-- Table structure for table `predictions`
--

CREATE TABLE `predictions` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `trade_min` varchar(40) NOT NULL,
  `trade_max` varchar(40) NOT NULL,
  `trade_type` varchar(40) NOT NULL,
  `trade_method` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `currency` varchar(100) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `eth_address` varchar(200) NOT NULL,
  `btc_address` varchar(200) NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  `site_address` varchar(100) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `trade_mode` varchar(20) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `referral_commission` varchar(20) DEFAULT NULL,
  `update` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `description`, `currency`, `bank_name`, `account_name`, `account_number`, `eth_address`, `btc_address`, `payment_mode`, `keywords`, `site_title`, `site_address`, `logo`, `trade_mode`, `contact_email`, `referral_commission`, `update`, `created_at`, `updated_at`) VALUES
(1, 'Online trade', 'online forex and cryptocurrencies Investment system', '$', '', '', '', 'njhjhkskhjgjsgashghghhgy73767efe63te653767776737', 'f655787gjgjsgashghghhgy73767efe63te653767776737', 'BTC', 'make money online, hyips', 'online forex and cryptocurrencies Investment system', 'sitename.com', 'loogo.png', 'on', 'rialekingsley@gmail.com', '20', 'Hello, we successfully launched', '2017-02-27 01:10:03', '2018-06-08 22:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `phone`, `created_at`, `updated_at`) VALUES
(1, '08169701672', '2017-04-05 11:28:33', '0000-00-00 00:00:00'),
(2, '07030626644', '2017-04-05 11:38:26', '0000-00-00 00:00:00'),
(3, '08037252468', '2017-04-06 01:28:19', '0000-00-00 00:00:00'),
(4, '08037252468', '2017-04-06 01:28:21', '0000-00-00 00:00:00'),
(5, '08037252468', '2017-04-06 01:28:59', '0000-00-00 00:00:00'),
(6, '08037252468', '2017-04-06 01:29:00', '0000-00-00 00:00:00'),
(7, '08130991778', '2017-04-13 07:02:10', '0000-00-00 00:00:00'),
(8, '08061155143', '2017-04-14 04:43:21', '0000-00-00 00:00:00'),
(9, '08037252468', '2017-04-14 08:22:00', '0000-00-00 00:00:00'),
(10, '9063559664', '2017-04-17 15:18:42', '0000-00-00 00:00:00'),
(11, '9063559664', '2017-04-17 15:18:55', '0000-00-00 00:00:00'),
(12, '08120284913', '2017-04-18 16:03:11', '0000-00-00 00:00:00'),
(13, '08038763462', '2017-04-19 02:33:51', '0000-00-00 00:00:00'),
(14, '07066745546', '2017-04-20 02:49:31', '0000-00-00 00:00:00'),
(15, '08124806609', '2017-04-21 05:12:05', '0000-00-00 00:00:00'),
(16, '08032688250', '2017-04-21 05:42:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `reply_to` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `phone_two` varchar(11) NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `state` varchar(250) DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `postal_code` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `salary` bigint(25) DEFAULT NULL,
  `work` varchar(250) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `acc_type` varchar(10) DEFAULT NULL,
  `acc_number` varchar(20) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `acc_pin` text DEFAULT NULL,
  `created_at` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `updated_at` datetime(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `location` varchar(200) NOT NULL,
  `status` varchar(250) NOT NULL DEFAULT 'active',
  `transfer` varchar(250) NOT NULL DEFAULT 'freeze',
  `photo` varchar(250) DEFAULT NULL,
  `proof_id` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `phone`, `phone_two`, `address`, `state`, `city`, `postal_code`, `country`, `salary`, `work`, `company`, `dob`, `acc_type`, `acc_number`, `password`, `acc_pin`, `created_at`, `updated_at`, `location`, `status`, `transfer`, `photo`, `proof_id`) VALUES
(1, 'Chimdike Kamsi Anagboso', 'ckamsi04@gmail.com', '09027855617', '', 'No 2 Emma Ezikah Closeoff Chief sn ugwu street, last bus stop', 'Enugu', 'Abakpa', '100201', 'Nigeria', 10, 'emp', 'Nova', NULL, '1', '7636243395', '4ebe8dfc8b20ec735161323c970eb43d67b51472', '12240', '2023-07-10 12:36:03.000000', '2023-07-11 11:18:49.858225', '', 'active', 'active', '64ad2c534d8f0.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `id` int(11) NOT NULL,
  `trx` varchar(40) NOT NULL,
  `user` varchar(25) NOT NULL,
  `acoount_id` int(11) DEFAULT NULL,
  `amount` varchar(40) NOT NULL,
  `bank` varchar(200) DEFAULT NULL,
  `account_number` varchar(100) DEFAULT NULL,
  `account_name` varchar(350) NOT NULL,
  `routing` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `description` varchar(400) DEFAULT NULL,
  `gateway` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`id`, `trx`, `user`, `acoount_id`, `amount`, `bank`, `account_number`, `account_name`, `routing`, `type`, `description`, `gateway`, `status`, `created_date`, `updated_date`) VALUES
(1, '5701621756', '7636243395', 2, '100', 'Access', '7567454678990', '', NULL, 'wire', '', 'USD', 'pending', '2023-07-10 19:22:31', '2023-07-10 19:22:31'),
(2, '7842604067', '7636243395', 2, '100', 'Access', '7567454678990', '', NULL, 'wire', 'jdcugfjkv', 'USD', 'pending', '2023-07-10 19:22:55', '2023-07-10 19:22:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `predictions`
--
ALTER TABLE `predictions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
