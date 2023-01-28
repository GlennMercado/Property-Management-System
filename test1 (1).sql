-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 09:25 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_hotel_reservation`
--

CREATE TABLE `archived_hotel_reservation` (
  `Reservation_No` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Guest_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mobile_Num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Room_No` int(11) NOT NULL,
  `No_of_Pax` int(11) NOT NULL,
  `Payment_Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `Booking_Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Check_In_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Check_Out_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guestticket`
--

CREATE TABLE `guestticket` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DB_Image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelstocks`
--

CREATE TABLE `hotelstocks` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotelstocks`
--

INSERT INTO `hotelstocks` (`productid`, `name`, `description`, `category`, `total`, `Stock_Level`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Bed Pad - Queen', '22x19', 'Bed pad - Queen', 50, 40, '2022-12-16 02:45:59', '2022-12-15 08:24:01', '2022-12-15 08:24:01'),
(2, 'Bed Pad - Single', '22x21', 'Bed pad - Single', 27, 30, '2022-12-16 02:52:02', '2022-12-15 08:36:43', '2022-12-15 08:36:43'),
(4, 'Toothbrush', 'Hygiene', 'Invalid', 51, 50, '2022-12-16 02:25:15', '2022-12-15 19:06:38', '2022-12-15 19:06:38'),
(5, 'Hotel Pillows', 'White Flowery', 'Pillows', 40, 25, '2022-12-16 02:47:34', '2022-12-15 18:47:34', '2022-12-15 18:47:34'),
(6, 'Bath Towels', 'Color Green, Blue and Red', 'Invalid', 6, 10, '2023-01-10 06:29:13', '2022-12-15 18:48:36', '2022-12-15 18:48:36'),
(7, '1 Pair of Slipper', 'Color Green with flower design', 'Slippers', 10, 4, '2022-12-16 02:50:04', '2022-12-15 18:50:04', '2022-12-15 18:50:04'),
(8, 'Hand Towels', 'Plain Green color', 'Hand Towel', 20, 6, '2022-12-16 02:51:06', '2022-12-15 18:51:06', '2022-12-15 18:51:06'),
(9, 'Shampoo', '275ml', 'Shampoo', 10, 4, '2022-12-16 02:55:05', '2022-12-15 18:55:05', '2022-12-15 18:55:05'),
(10, '1 Pair of Cup and Saucer', 'Glossy white color', 'Cup And Saucer', 20, 6, '2022-12-16 02:56:02', '2022-12-15 18:56:02', '2022-12-15 18:56:02'),
(11, 'FlatSheet - Queen', '20x19, Color White', 'Flat Sheet - Queen', 20, 6, '2022-12-16 02:57:24', '2022-12-15 18:57:24', '2022-12-15 18:57:24'),
(12, 'FlatSheet - Single', '19x19, Color White', 'Flat Sheet - Single', 20, 6, '2022-12-16 02:58:37', '2022-12-15 18:58:37', '2022-12-15 18:58:37'),
(13, 'A Pack Of Creamer', 'Brand Nescafe', 'Creamer', 30, 6, '2022-12-16 02:59:45', '2022-12-15 18:59:45', '2022-12-15 18:59:45'),
(14, 'Soap', 'Brand Safeguard', 'Bath Soap', 30, 9, '2022-12-16 03:01:25', '2022-12-15 19:01:25', '2022-12-15 19:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_reservations`
--

CREATE TABLE `hotel_reservations` (
  `Reservation_No` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Guest_Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Mobile_Num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Room_No` int(11) NOT NULL,
  `No_of_Pax` int(11) NOT NULL,
  `Payment_Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Pending',
  `Booking_Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Isvalid` tinyint(1) NOT NULL DEFAULT 1,
  `Check_In_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Check_Out_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_reservations`
--

INSERT INTO `hotel_reservations` (`Reservation_No`, `Guest_Name`, `Mobile_Num`, `Email`, `Room_No`, `No_of_Pax`, `Payment_Status`, `Booking_Status`, `Isvalid`, `Check_In_Date`, `Check_Out_Date`, `created_at`, `updated_at`) VALUES
('10285982780D751', 'Anjelo Candelaria', '09874632541', NULL, 3, 2, 'Paid', 'Checked-Out', 0, '2022-12-22', '2022-12-29', '2022-12-15 19:15:11', '2022-12-15 19:15:11'),
('429749684C64712', 'Glenn Mercado', '09874632541', 'glennlainardmercado@gmail.com', 2, 2, 'Paid', 'Checked-Out', 0, '2022-12-16', '2022-12-17', '2022-12-15 18:54:24', '2022-12-15 18:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `housekeepings`
--

CREATE TABLE `housekeepings` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Room_No` int(10) UNSIGNED DEFAULT NULL,
  `Housekeeping_Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Cleaned',
  `Room_Attendant` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Unassigned',
  `Date_Time_Accomplished` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housekeepings`
--

INSERT INTO `housekeepings` (`ID`, `Room_No`, `Housekeeping_Status`, `Room_Attendant`, `Date_Time_Accomplished`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:52:05', '2022-12-15 00:52:05'),
(2, 2, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:52:20', '2022-12-15 00:52:20'),
(3, 3, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:54:12', '2022-12-15 00:54:12'),
(4, 4, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:54:25', '2022-12-15 00:54:25'),
(5, 5, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:54:48', '2022-12-15 00:54:48'),
(6, 9, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:55:13', '2022-12-15 00:55:13'),
(7, 10, 'Cleaned', 'Unassigned', NULL, '2022-12-15 00:56:01', '2022-12-15 00:56:01'),
(8, 6, 'Cleaned', 'Unassigned', NULL, '2022-12-15 07:07:20', '2022-12-15 07:07:20'),
(9, 7, 'Cleaned', 'Unassigned', NULL, '2022-12-15 18:57:14', '2022-12-15 18:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_12_06_000949_create_hotel_reservation_table', 1),
(6, '2022_12_06_001028_create_hotelstock_table', 1),
(7, '2022_12_06_140802_create_novadeci_suites_table', 1),
(8, '2022_12_06_183548_create_purchasereport_table', 1),
(9, '2022_12_08_145456_create_housekeeping_table', 1),
(10, '2022_12_08_184157_create_purchasereports_table', 1),
(11, '2022_12_09_050205_create_hotelstocks_table', 1),
(12, '2022_12_12_080347_create_guestticket_table', 1),
(13, '2022_12_15_080028_create_archived_hotel_reservation_table', 1),
(14, '2023_01_12_015231_create_stockscenter_table', 2),
(15, '2023_01_18_051543_create_stockcenter_table', 2),
(16, '2023_01_18_053846_create_stockfunction_table', 2),
(17, '2023_01_26_031627_create_stocksfunction_table', 3),
(18, '2023_01_26_034615_create_stocksfunctions_table', 4),
(19, '2023_01_26_035537_create_stockscenters_table', 4),
(20, '2023_01_26_042527_create_stockscenters_table', 5),
(21, '2023_01_26_042711_create_stocksfunctions_table', 5),
(22, '2023_01_26_043452_create_stocksfunctions_table', 6),
(23, '2023_01_26_043711_create_stockscenters_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `novadeci_suites`
--

CREATE TABLE `novadeci_suites` (
  `Room_No` int(11) NOT NULL,
  `Room_Size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `No_of_Beds` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Extra_Bed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `No_Pax_Per_Room` int(11) NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Available',
  `Rate_per_Night` int(11) NOT NULL,
  `Hotel_Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DB_Image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `novadeci_suites`
--

INSERT INTO `novadeci_suites` (`Room_No`, `Room_Size`, `No_of_Beds`, `Extra_Bed`, `No_Pax_Per_Room`, `Status`, `Rate_per_Night`, `Hotel_Image`, `DB_Image`, `created_at`, `updated_at`) VALUES
(1, '37 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094325--Room 1-.jpg', 0x616e426e, '2022-12-15 00:52:05', '2022-12-15 00:52:05'),
(2, '35', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094340--Room 2-.jpg', 0x616e426e, '2022-12-15 00:52:20', '2022-12-15 00:52:20'),
(3, '37', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094452--Room 3-.jpg', 0x616e426e, '2022-12-15 00:54:12', '2022-12-15 00:54:12'),
(4, '34', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094465--Room 4-.jpg', 0x616e426e, '2022-12-15 00:54:25', '2022-12-15 00:54:25'),
(5, '38 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094488--Room 5-.jpg', 0x616e426e, '2022-12-15 00:54:48', '2022-12-15 00:54:48'),
(6, '31', 'One (1) queen-sized & One (1) twin-sized', 'None', 3, 'Available', 2500, 'hotel_images\\1671116840--Room 6-.JPG', 0x536c4248, '2022-12-15 07:07:20', '2022-12-15 07:07:20'),
(7, '31', 'One (1) queen-sized', 'One (1)', 3, 'Available', 2500, 'hotel_images\\1671159434--Room 7-.JPG', 0x536c4248, '2022-12-15 18:57:14', '2022-12-15 18:57:14'),
(9, '36 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094513--Room 9-.JPG', 0x536c4248, '2022-12-15 00:55:13', '2022-12-15 00:55:13'),
(10, '34', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'hotel_images\\1671094561--Room 10-.JPG', 0x536c4248, '2022-12-15 00:56:01', '2022-12-15 00:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchasereports`
--

CREATE TABLE `purchasereports` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suppliername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `purchasereports`
--

INSERT INTO `purchasereports` (`productid`, `name`, `suppliername`, `description`, `unit`, `quantity`, `Stock_Level`, `date`, `created_at`, `updated_at`) VALUES
(1, 'asdasd', 'Sample Supplier 1', 'asdasd', 2, 2, 0, '2022-12-16 05:21:41', '2022-12-15 21:21:41', '2022-12-15 21:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `stockscenters`
--

CREATE TABLE `stockscenters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocksfunctions`
--

CREATE TABLE `stocksfunctions` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stocksfunctions`
--

INSERT INTO `stocksfunctions` (`productid`, `name`, `description`, `category`, `total`, `Stock_Level`, `created_at`, `updated_at`) VALUES
(1, 'dasdasd', 'asdasd', 'Invalid', 17, 10, '2023-01-25 20:43:38', '2023-01-25 20:43:38'),
(2, 'Boom Sounds', 'Boombastic', 'Flat Sheet - Single', 2, 1, '2023-01-27 00:06:31', '2023-01-27 00:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `User_Type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Guest',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `User_Type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Diapen', 'daniel@gmail.com', NULL, '$2y$10$6F.ivg3vgNqQe8DTgkIl7uMCM31lzEOVe215p2l0WDzw.MSLgroTm', 'Admin', NULL, '2022-12-15 00:51:19', '2022-12-15 00:51:19'),
(2, 'John Lamprea', 'johnreylamprea@gmail.com', NULL, '$2y$10$DUbavvXiLLJJedOF5o5Aau2XvsGpq99YIgEmuc.JVQfD2RW1graDy', 'Guest', NULL, '2022-12-15 01:08:46', '2022-12-15 01:08:46'),
(3, 'Glenn Mercado', 'glennlainardmercado@gmail.com', NULL, '$2y$10$DfdjvE717zNv57ZGf0Ec4O/b.e05CoyoLJvd0Z9ugv2yL.hvxL3.W', 'Guest', NULL, '2022-12-15 18:51:56', '2022-12-15 18:51:56'),
(4, 'johncarl', 'johncarl@gmail.com', NULL, '$2y$10$rkRCtIyIgeXOONI981sBYe5Scrqti4Pz57B2ET.FHTZmcI/8V6q02', 'Admin', NULL, '2022-12-15 18:23:15', '2022-12-15 18:23:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_hotel_reservation`
--
ALTER TABLE `archived_hotel_reservation`
  ADD PRIMARY KEY (`Reservation_No`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guestticket`
--
ALTER TABLE `guestticket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hotelstocks`
--
ALTER TABLE `hotelstocks`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  ADD PRIMARY KEY (`Reservation_No`);

--
-- Indexes for table `housekeepings`
--
ALTER TABLE `housekeepings`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novadeci_suites`
--
ALTER TABLE `novadeci_suites`
  ADD PRIMARY KEY (`Room_No`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `purchasereports`
--
ALTER TABLE `purchasereports`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `stockscenters`
--
ALTER TABLE `stockscenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocksfunctions`
--
ALTER TABLE `stocksfunctions`
  ADD PRIMARY KEY (`productid`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestticket`
--
ALTER TABLE `guestticket`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelstocks`
--
ALTER TABLE `hotelstocks`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `housekeepings`
--
ALTER TABLE `housekeepings`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereports`
--
ALTER TABLE `purchasereports`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockscenters`
--
ALTER TABLE `stockscenters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocksfunctions`
--
ALTER TABLE `stocksfunctions`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
