-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 12, 2020 at 02:42 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE `doctor_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'user_id = doctor_id',
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_details`
--

INSERT INTO `doctor_details` (`id`, `user_id`, `designation`, `degree`, `department`, `specialist`, `experience`, `service_place`, `blood_group`, `about`, `created_at`, `updated_at`) VALUES
(1, 2, 'Asistant Professor', 'MBBS, MD', 'Neorology', 'Neorosergion', 'Experience', 'Dhaka', 'A+', 'About', '2020-09-08 00:58:41', '2020-09-08 00:58:41'),
(2, 4, 'Asistant Professor', 'MBBS, MD', 'Neorology', 'Neorosergon', 'experience', 'Dhaka', 'B+', 'about', '2020-09-08 05:58:40', '2020-09-08 05:58:40'),
(3, 6, 'Asistant Professor', 'MBBS, MD', 'Neorology', 'Neorologist', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'Dhaka', 'B+', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', '2020-09-09 04:07:05', '2020-09-09 04:07:05'),
(4, 7, 'Asistant Professor', 'MBBS, MD', 'Cardiology', 'Cardiologist', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', 'Dhaka', NULL, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard', '2020-09-09 04:08:25', '2020-09-09 04:08:25'),
(5, 8, 'Asistant Professor', 'MBBS, MD', 'Ginocology', 'Gynocologist', NULL, 'Dhaka', 'B+', NULL, '2020-09-09 04:09:42', '2020-09-09 04:09:42'),
(6, 17, 'Asistant Professor', 'MBBS, MD', 'Neorology', 'Neorosergon', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'Dhaka', 'B+', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', '2020-09-13 09:34:20', '2020-09-13 09:34:20'),
(7, 18, 'Asistant Professor', 'MBBS, MD', 'Cardiology', 'Cardiologist', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', 'Dhaka', 'B+', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled', '2020-09-13 09:35:24', '2020-09-13 09:35:24');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `delivery_date`, `delivery_time`, `status`, `created_at`, `updated_at`) VALUES
(47, 1, '2020-09-17', '2020-09-16', '21:10', 1, '2020-09-13 10:23:44', '2020-09-13 10:23:44'),
(48, 2, '2020-09-13', '2020-09-18', '22:33', 1, '2020-09-13 10:33:43', '2020-09-13 10:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `selling_qty` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `discount` double DEFAULT 0,
  `discount_price_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount_amount` double NOT NULL DEFAULT 0,
  `selling_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_id`, `date`, `doctor_id`, `test_id`, `selling_qty`, `unit_price`, `discount`, `discount_price_type`, `discount_amount`, `selling_price`, `created_at`, `updated_at`) VALUES
(67, 47, '2020-09-17', 18, 6, 1, 400, 5, 'percent', 20, 380, '2020-09-13 10:23:44', '2020-09-13 10:23:44'),
(68, 47, '2020-09-17', 18, 5, 1, 1500, 5, 'percent', 75, 1425, '2020-09-13 10:23:44', '2020-09-13 10:23:44'),
(69, 48, '2020-09-13', 17, 5, 1, 1500, 0, NULL, 0, 1500, '2020-09-13 10:33:43', '2020-09-13 10:33:43'),
(70, 48, '2020-09-13', 17, 7, 1, 3000, 0, NULL, 0, 3000, '2020-09-13 10:33:43', '2020-09-13 10:33:43');

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
(4, '2020_09_08_050247_create_doctor_details_table', 1),
(6, '2020_09_08_073614_create_services_table', 2),
(7, '2020_09_08_092230_create_invoices_table', 3),
(8, '2020_09_08_092249_create_invoice_details_table', 3),
(10, '2020_09_08_092322_create_payment_details_table', 3),
(12, '2020_09_08_092308_create_payments_table', 4),
(14, '2020_09_13_142506_create_settings_table', 5);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double NOT NULL,
  `discount_amount` double NOT NULL DEFAULT 0,
  `total_after_discount_amount` double NOT NULL DEFAULT 0,
  `special_discount_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_discount` double NOT NULL DEFAULT 0,
  `special_discount_amount` double NOT NULL DEFAULT 0,
  `total_after_special_discount` double NOT NULL DEFAULT 0,
  `tax` double NOT NULL DEFAULT 0,
  `tax_amount` double NOT NULL DEFAULT 0,
  `total_after_tax` double NOT NULL DEFAULT 0,
  `total_amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `patient_id`, `paid_amount`, `due_amount`, `discount_amount`, `total_after_discount_amount`, `special_discount_type`, `special_discount`, `special_discount_amount`, `total_after_special_discount`, `tax`, `tax_amount`, `total_after_tax`, `total_amount`, `created_at`, `updated_at`) VALUES
(24, 47, 23, 1000, 895.25, 95, 1805, 'percent', 5, 90.25, 1714.75, 10, 180.5, 1985.5, 1895.25, '2020-09-13 10:23:44', '2020-09-13 10:23:44'),
(25, 48, 19, 4000, 725, 0, 4500, 'percent', 5, 225, 4275, 10, 450, 4950, 4725, '2020-09-13 10:33:43', '2020-09-13 10:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `created_at`, `updated_at`) VALUES
(32, 47, 1000, '2020-09-17', '2020-09-13 10:23:44', '2020-09-13 10:23:44'),
(33, 48, 4000, '2020-09-13', '2020-09-13 10:33:43', '2020-09-13 10:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(5, 'CT-Scan(CS)', 1500, '2020-09-10 00:02:58', '2020-09-10 00:02:58'),
(6, 'Blood Test (BT)', 400, '2020-09-10 00:08:51', '2020-09-10 00:08:51'),
(7, 'Physio therapy  (PT)', 3000, '2020-09-10 00:09:41', '2020-09-10 00:09:41'),
(8, 'X-RAY(digital)', 1000, '2020-09-10 00:10:38', '2020-09-10 00:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `email`, `phone`, `address`, `image`, `created_at`, `updated_at`) VALUES
(1, 'ABC Clinik', 'abc@gmail.com', '01914862630, 015434432253', 'Dhaka, Motijeel', 'assets/backend/images/setting/om3dsDmS1E.png', '2020-09-13 08:56:42', '2020-09-13 08:57:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `userType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin,doctor,patient',
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'admin = head of software',
  `soft_delete` tinyint(4) NOT NULL DEFAULT 0,
  `verify_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verify_code` int(11) DEFAULT NULL,
  `verify_account` tinyint(4) NOT NULL DEFAULT 0,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `code`, `mobile`, `address`, `gender`, `image`, `dob`, `age`, `status`, `userType`, `role`, `soft_delete`, `verify_token`, `verify_code`, `verify_account`, `slug`, `remember_token`, `created_at`, `updated_at`) VALUES
(16, 'Admin', 'clinikadmin@gmail.com', NULL, '$2y$10$g3wwKL.AzGbQf9gmz5y1Z.8yDMbavO6tT2.9oo4edrIdH1wHLR7he', NULL, '01654545336', 'Dhaka', NULL, NULL, NULL, NULL, 0, 'admin', 'admin', 0, NULL, NULL, 1, 'admin', NULL, NULL, '2020-09-13 10:35:38'),
(17, 'Eliyas Hossain', 'eliyas@gmail.com', NULL, '$2y$10$.OISk/5qyf/NNdTnxoqkAOPZn82lK1KQLNEf7ESBaipUolyDMkB7a', NULL, '01914862687', 'Dhaka', 'Male', NULL, '1970-01-01', NULL, 1, 'doctor', 'user', 0, NULL, NULL, 1, 'eliyas-hossain', NULL, '2020-09-13 09:34:20', '2020-09-13 09:34:20'),
(18, 'Anwar Hossain', 'anwar@gmail.com', NULL, '$2y$10$RVxBNUEwmnswKFHjDYKqZ.AhdHdsWeuI67mVdDtPBe9Lul2APmE.O', NULL, '01914862665', 'Dhaka', 'Male', NULL, '1989-03-09', NULL, 1, 'doctor', 'user', 0, NULL, NULL, 1, 'anwar-hossain', NULL, '2020-09-13 09:35:24', '2020-09-13 09:35:24'),
(19, 'Sakib', 'sakib@gmail.com', NULL, '$2y$10$pVdoA./EZ/SfPMsMuIw5o.NDt7skFGKJ0KjWujlyJ3PHKrMQz7/WW', 8919, '01914862653', 'Dhaka', 'Male', NULL, '1995-01-02', 25, 1, 'patient', 'user', 0, NULL, NULL, 1, 'sakib', NULL, '2020-09-13 09:36:21', '2020-09-13 09:36:21'),
(23, 'Sumon', 'patient1@gmail.com', NULL, '$2y$10$p/v2t58kiBNRTRX3zJjMnuj3vl6TGLAr32aU77.u5bcN3clZXnNM2', 7284, '01914862665', 'Dhaka', NULL, NULL, NULL, NULL, 1, 'patient', 'user', 0, NULL, NULL, 1, 'sumon', NULL, '2020-09-13 10:23:44', '2020-09-13 10:23:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor_details`
--
ALTER TABLE `doctor_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor_details`
--
ALTER TABLE `doctor_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
