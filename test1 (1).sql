-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 06:23 AM
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
-- Table structure for table `add_maintenances`
--

CREATE TABLE `add_maintenances` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Asset` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Due_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
-- Table structure for table `hotelstock`
--

CREATE TABLE `hotelstock` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in` int(11) NOT NULL,
  `out` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `in` int(11) NOT NULL,
  `out` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `Check_In_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Check_Out_Date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_reservations`
--

INSERT INTO `hotel_reservations` (`Reservation_No`, `Guest_Name`, `Mobile_Num`, `Email`, `Room_No`, `No_of_Pax`, `Payment_Status`, `Check_In_Date`, `Check_Out_Date`, `created_at`, `updated_at`) VALUES
('40C216401422574', 'John Rey Lamprea', '09874632541', 'johnreylamprea@gmail.com', 2, 2, 'Paid', '2022-12-10', '2022-12-15', '2022-12-08 19:48:42', '2022-12-08 19:48:42'),
('548L43530171378', 'Anjelo Candelaria', '09874632541', NULL, 2, 3, 'Pending', '2022-12-10', '2022-12-12', '2022-12-08 19:29:10', '2022-12-08 19:29:10');

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
(1, 1, 'Cleaned', 'Unassigned', NULL, '2022-12-08 19:23:04', '2022-12-08 19:23:04'),
(2, 2, 'Dirty', 'Unassigned', NULL, '2022-12-08 19:25:01', '2022-12-08 19:25:01'),
(3, 3, 'Cleaned', 'Unassigned', NULL, '2022-12-08 19:27:35', '2022-12-08 19:27:35'),
(4, 4, 'Cleaned', 'Unassigned', NULL, '2022-12-08 19:27:51', '2022-12-08 19:27:51'),
(5, 5, 'Cleaned', 'Unassigned', NULL, '2022-12-08 19:28:08', '2022-12-08 19:28:08'),
(6, 9, 'Cleaned', 'Unassigned', NULL, '2022-12-08 21:21:35', '2022-12-08 21:21:35');

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
(5, '2022_12_02_165937_create_add_maintenances_table', 1),
(6, '2022_12_06_000949_create_hotel_reservation_table', 1),
(7, '2022_12_06_001028_create_hotelstock_table', 1),
(8, '2022_12_06_140802_create_novadeci_suites_table', 1),
(9, '2022_12_06_183548_create_purchasereport_table', 1),
(10, '2022_12_08_145456_create_housekeeping_table', 1),
(11, '2022_12_08_184157_create_purchasereports_table', 1),
(12, '2022_12_09_050205_create_hotelstocks_table', 2);

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
  `Membership` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Hotel_Image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `novadeci_suites`
--

INSERT INTO `novadeci_suites` (`Room_No`, `Room_Size`, `No_of_Beds`, `Extra_Bed`, `No_Pax_Per_Room`, `Status`, `Rate_per_Night`, `Membership`, `Hotel_Image`, `created_at`, `updated_at`) VALUES
(1, '37 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'Guests', 'hotel_images\\1670556184--Room 1-.jpg', '2022-12-08 19:23:04', '2022-12-08 19:23:04'),
(2, '35', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Checked-Out', 2500, 'Guests', 'hotel_images\\1670556301--Room 2-.jpg', '2022-12-08 19:25:01', '2022-12-08 19:25:01'),
(3, '37', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'Guests', 'hotel_images\\1670556455--Room 3-.jpg', '2022-12-08 19:27:35', '2022-12-08 19:27:35'),
(4, '34', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'Guests', 'hotel_images\\1670556471--Room 4-.jpg', '2022-12-08 19:27:51', '2022-12-08 19:27:51'),
(5, '38 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Available', 2500, 'Guests', 'hotel_images\\1670556488--Room 5-.jpg', '2022-12-08 19:28:08', '2022-12-08 19:28:08'),
(9, '36 (corner room)', 'One (1) queen-sized', 'None', 3, 'Available', 2500, 'Guests', 'hotel_images\\1670563295--Room 9-.JPG', '2022-12-08 21:21:35', '2022-12-08 21:21:35');

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
-- Table structure for table `purchasereport`
--

CREATE TABLE `purchasereport` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `productcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `suppliername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `unit` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(1, 'Daniel Diapen', 'daniel@gmail.com', NULL, '$2y$10$4EEHJKr8qW6Ic2UArGhPMeB9VuF1D..5VT5Fp7gvFRuorch2ukpaa', 'Admin', NULL, '2022-12-08 19:20:22', '2022-12-08 19:20:22'),
(2, 'John Rey Lamprea', 'johnreylamprea@gmail.com', NULL, '$2y$10$nAc2cxaDFRX1rxu0/Kt.Z.YM4U.kIKIIOb5dxaooC0FuMvtIrsPdG', 'Guest', NULL, '2022-12-08 19:20:56', '2022-12-08 19:20:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_maintenances`
--
ALTER TABLE `add_maintenances`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotelstock`
--
ALTER TABLE `hotelstock`
  ADD PRIMARY KEY (`productid`);

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
-- Indexes for table `purchasereport`
--
ALTER TABLE `purchasereport`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchasereports`
--
ALTER TABLE `purchasereports`
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
-- AUTO_INCREMENT for table `add_maintenances`
--
ALTER TABLE `add_maintenances`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelstock`
--
ALTER TABLE `hotelstock`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelstocks`
--
ALTER TABLE `hotelstocks`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `housekeepings`
--
ALTER TABLE `housekeepings`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereport`
--
ALTER TABLE `purchasereport`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchasereports`
--
ALTER TABLE `purchasereports`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;