-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2022 at 04:18 AM
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
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `archived_hotel_reservation`
--

CREATE TABLE `archived_hotel_reservation` (
  `Reservation_No` varchar(255) NOT NULL,
  `Guest_Name` varchar(255) NOT NULL,
  `Mobile_Num` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Room_No` int(11) NOT NULL,
  `No_of_Pax` int(11) NOT NULL,
  `Payment_Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Booking_Status` varchar(255) DEFAULT NULL,
  `Check_In_Date` varchar(255) NOT NULL,
  `Check_Out_Date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guestticket`
--

CREATE TABLE `guestticket` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `DB_Image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelstock`
--

CREATE TABLE `hotelstock` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
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
(1, 'Bed Pad', '22x19', 'Invalid', 50, 40, '2022-12-16 03:08:16', '2022-12-15 08:24:01', '2022-12-15 08:24:01'),
(2, 'Bed Pad', '22x21', 'Invalid', 30, 30, '2022-12-16 03:08:35', '2022-12-15 08:36:43', '2022-12-15 08:36:43'),
(4, 'Toothbrush', 'Hygiene', 'Dental Kit', 20, 50, '2022-12-16 03:06:38', '2022-12-15 19:06:38', '2022-12-15 19:06:38');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_reservations`
--

CREATE TABLE `hotel_reservations` (
  `Reservation_No` varchar(255) NOT NULL,
  `Guest_Name` varchar(255) NOT NULL,
  `Mobile_Num` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Room_No` int(11) NOT NULL,
  `No_of_Pax` int(11) NOT NULL,
  `Payment_Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Booking_Status` varchar(255) DEFAULT NULL,
  `Isvalid` tinyint(1) NOT NULL DEFAULT 1,
  `Check_In_Date` varchar(255) NOT NULL,
  `Check_Out_Date` varchar(255) NOT NULL,
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
  `Housekeeping_Status` varchar(255) NOT NULL DEFAULT 'Cleaned',
  `Room_Attendant` varchar(255) NOT NULL DEFAULT 'Unassigned',
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
  `migration` varchar(255) NOT NULL,
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
(13, '2022_12_15_080028_create_archived_hotel_reservation_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `novadeci_suites`
--

CREATE TABLE `novadeci_suites` (
  `Room_No` int(11) NOT NULL,
  `Room_Size` varchar(255) NOT NULL,
  `No_of_Beds` varchar(255) NOT NULL,
  `Extra_Bed` varchar(255) NOT NULL,
  `No_Pax_Per_Room` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Available',
  `Rate_per_Night` int(11) NOT NULL,
  `Hotel_Image` varchar(255) NOT NULL,
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
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `productcode` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `suppliername` varchar(255) NOT NULL,
  `description` text NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `suppliername` varchar(255) NOT NULL,
  `description` text NOT NULL,
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
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `User_Type` varchar(255) NOT NULL DEFAULT 'Guest',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `User_Type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Daniel Diapen', 'daniel@gmail.com', NULL, '$2y$10$6F.ivg3vgNqQe8DTgkIl7uMCM31lzEOVe215p2l0WDzw.MSLgroTm', 'Admin', NULL, '2022-12-15 00:51:19', '2022-12-15 00:51:19'),
(2, 'John Lamprea', 'johnreylamprea@gmail.com', NULL, '$2y$10$DUbavvXiLLJJedOF5o5Aau2XvsGpq99YIgEmuc.JVQfD2RW1graDy', 'Guest', NULL, '2022-12-15 01:08:46', '2022-12-15 01:08:46'),
(3, 'Glenn Mercado', 'glennlainardmercado@gmail.com', NULL, '$2y$10$DfdjvE717zNv57ZGf0Ec4O/b.e05CoyoLJvd0Z9ugv2yL.hvxL3.W', 'Guest', NULL, '2022-12-15 18:51:56', '2022-12-15 18:51:56');

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
-- AUTO_INCREMENT for table `hotelstock`
--
ALTER TABLE `hotelstock`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotelstocks`
--
ALTER TABLE `hotelstocks`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `housekeepings`
--
ALTER TABLE `housekeepings`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
