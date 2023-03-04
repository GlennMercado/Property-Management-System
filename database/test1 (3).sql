-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 06:21 PM
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
-- Table structure for table `commercial_spaces_applications`
--

CREATE TABLE `commercial_spaces_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `business_name` varchar(255) NOT NULL,
  `business_style` varchar(255) NOT NULL,
  `business_address` varchar(255) NOT NULL,
  `email_website_fb` varchar(255) NOT NULL,
  `business_landline_no` varchar(255) NOT NULL,
  `business_mobile_no` varchar(255) NOT NULL,
  `name_of_owner` varchar(255) NOT NULL,
  `spouse` varchar(255) NOT NULL,
  `home_address` varchar(255) NOT NULL,
  `landline` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `tax_identification_no` varchar(255) NOT NULL,
  `tax_cert_valid_gov_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `concern` varchar(255) NOT NULL,
  `concern_text` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `complaints_img` varchar(255) NOT NULL,
  `DB_Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `convention_center_applications`
--

CREATE TABLE `convention_center_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inquiry_status` varchar(255) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `contact_person_no` varchar(255) NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `no_of_guest` varchar(255) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `caterer` varchar(255) NOT NULL,
  `audio_visual` varchar(255) NOT NULL,
  `concept` varchar(255) NOT NULL,
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
-- Table structure for table `finance`
--

CREATE TABLE `finance` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finances`
--

CREATE TABLE `finances` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `proof_image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `cnumber` int(11) NOT NULL,
  `proof_image_b` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance_2_reports`
--

CREATE TABLE `finance_2_reports` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `ornum` int(11) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `eventdate` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `unearned` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `cheque` int(11) NOT NULL,
  `basketball` int(11) NOT NULL,
  `otherincome` int(11) NOT NULL,
  `parking` int(11) NOT NULL,
  `managementfee` int(11) NOT NULL,
  `event` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `commercialspace` int(11) NOT NULL,
  `outputvat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `finance_reports`
--

CREATE TABLE `finance_reports` (
  `userid` bigint(20) UNSIGNED NOT NULL,
  `ornum` int(11) NOT NULL,
  `payee` varchar(255) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `debit` varchar(255) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `eventdate` varchar(255) NOT NULL,
  `cash` int(11) NOT NULL,
  `unearned` int(11) NOT NULL,
  `bank` int(11) NOT NULL,
  `cheque` int(11) NOT NULL,
  `basketball` int(11) NOT NULL,
  `otherincome` int(11) NOT NULL,
  `parking` int(11) NOT NULL,
  `managementfee` int(11) NOT NULL,
  `events` int(11) NOT NULL,
  `hotel` int(11) NOT NULL,
  `commercialspace` int(11) NOT NULL,
  `outputvat` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `guest_requests`
--

CREATE TABLE `guest_requests` (
  `Request_ID` varchar(255) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Booking_No` varchar(255) NOT NULL,
  `Guest_Name` varchar(255) NOT NULL,
  `Date_Requested` date NOT NULL DEFAULT current_timestamp(),
  `Request` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Ongoing',
  `IsArchived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotelstocks`
--

CREATE TABLE `hotelstocks` (
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `allstock` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotelstocks`
--

INSERT INTO `hotelstocks` (`productid`, `name`, `description`, `category`, `total`, `allstock`, `Stock_Level`, `created_at`, `updated_at`) VALUES
(1, 'Bath Soap', 'Safeguard', 'Guest Supply', 29, 300, 20, '2023-03-03 08:58:05', '2023-03-03 08:58:05'),
(2, 'Dental Kit', 'Dental Hygiene', 'Guest Supply', 123, 100, 100, '2023-03-03 10:42:12', '2023-03-03 10:42:12'),
(3, 'Flat Sheet - Queen', 'Kumot', 'Linen', 0, 100, 50, '2023-03-03 10:48:32', '2023-03-03 10:48:32'),
(4, 'Shampoo', 'Anti-Dandruff Shampoo', 'Guest Supply', 10, 100, 50, '2023-03-03 12:35:49', '2023-03-03 12:35:49'),
(5, 'Bath Towel', 'agdjykwqe', 'Linen', 40, 100, 50, '2023-03-03 17:05:26', '2023-03-03 17:05:26');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_reservations`
--

CREATE TABLE `hotel_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Booking_No` varchar(255) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Guest_Name` varchar(255) NOT NULL,
  `Mobile_Num` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `No_of_Pax` int(11) NOT NULL,
  `Payment_Status` varchar(255) NOT NULL DEFAULT 'Pending',
  `Booking_Status` varchar(255) DEFAULT NULL,
  `IsArchived` tinyint(1) NOT NULL DEFAULT 0,
  `Down_Payment` double DEFAULT NULL,
  `Balance` double DEFAULT NULL,
  `Full_Payment` double DEFAULT NULL,
  `Check_In_Date` date NOT NULL,
  `Check_Out_Date` date NOT NULL,
  `Check_Out_Extension` date DEFAULT NULL,
  `Proof_Image` varchar(255) DEFAULT NULL,
  `DB_Proof_Image` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_reservations`
--

INSERT INTO `hotel_reservations` (`id`, `Booking_No`, `Room_No`, `Guest_Name`, `Mobile_Num`, `Email`, `No_of_Pax`, `Payment_Status`, `Booking_Status`, `IsArchived`, `Down_Payment`, `Balance`, `Full_Payment`, `Check_In_Date`, `Check_Out_Date`, `Check_Out_Extension`, `Proof_Image`, `DB_Proof_Image`, `created_at`, `updated_at`) VALUES
(1, '16483U755698303', 1, 'Anjelo Candelaria', '09874632541', NULL, 2, 'Paid', 'Checked-Out', 1, NULL, NULL, NULL, '2023-03-03', '2023-03-04', NULL, NULL, NULL, '2023-03-03 10:57:03', '2023-03-03 10:57:03'),
(2, '4357597660581G4', 2, 'Glenn Mercado', '09647654654', NULL, 1, 'Paid', 'Checked-Out', 1, NULL, NULL, NULL, '2023-03-03', '2023-03-21', NULL, NULL, NULL, '2023-03-03 12:37:45', '2023-03-03 12:37:45'),
(3, '4777068Z7044851', 3, 'Angela Alivio', '09647654654', NULL, 4, 'Paid', 'Checked-Out', 1, NULL, NULL, NULL, '2023-03-03', '2023-02-28', NULL, NULL, NULL, '2023-03-03 12:38:41', '2023-03-03 12:38:41'),
(4, '13875T101803292', 1, 'John Lamprea', '09647654654', NULL, 1, 'Paid', 'Checked-Out', 1, NULL, NULL, NULL, '2023-03-04', '2023-03-07', NULL, NULL, NULL, '2023-03-03 17:06:05', '2023-03-03 17:06:05'),
(5, 'Q75918282496618', 1, 'John Lamprea', '09874632541', NULL, 2, 'Paid', 'Checked-Out', 1, NULL, NULL, NULL, '2023-03-04', '2023-03-05', NULL, NULL, NULL, '2023-03-03 17:16:17', '2023-03-03 17:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_linens`
--

CREATE TABLE `hotel_room_linens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Room_No` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Discrepancy` int(11) NOT NULL DEFAULT 0,
  `Quantity_Requested` int(11) NOT NULL DEFAULT 0,
  `Attendant` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `Status` varchar(255) NOT NULL DEFAULT 'Received',
  `Remarks` text DEFAULT NULL,
  `Date_Requested` datetime DEFAULT NULL,
  `Date_Received` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_linens`
--

INSERT INTO `hotel_room_linens` (`id`, `Room_No`, `productid`, `name`, `Category`, `Quantity`, `Discrepancy`, `Quantity_Requested`, `Attendant`, `Status`, `Remarks`, `Date_Requested`, `Date_Received`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Flat Sheet - Queen', 'Linen', 9, 21, 10, 'Mark Delos Santos', 'Returned to Inventory', NULL, '2023-03-04 00:35:47', '2023-03-04 00:25:38', '2023-03-03 10:48:38', '2023-03-03 10:48:38'),
(2, 2, 3, 'Flat Sheet - Queen', 'Linen', 10, 10, 0, 'Marie B. Adams', 'Denied', NULL, '2023-03-04 00:24:50', '2023-03-04 00:25:43', '2023-03-03 12:36:21', '2023-03-03 12:36:21'),
(3, 3, 3, 'Flat Sheet - Queen', 'Linen', 15, 5, 0, 'Unassigned', 'Denied', NULL, '2023-03-04 00:25:02', '2023-03-04 00:25:49', '2023-03-03 12:36:36', '2023-03-03 12:36:36'),
(4, 1, 5, 'Bath Towel', 'Linen', 3, 7, 0, 'Unassigned', 'Returned to Inventory', NULL, NULL, '2023-03-04 01:05:37', '2023-03-03 17:05:37', '2023-03-03 17:05:37');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_linens_reports`
--

CREATE TABLE `hotel_room_linens_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Room_No` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Discrepancy` int(11) NOT NULL,
  `Quantity_Requested` int(11) NOT NULL,
  `Attendant` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Remarks` text NOT NULL,
  `Date_Requested` datetime DEFAULT NULL,
  `Date_Received` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_linens_reports`
--

INSERT INTO `hotel_room_linens_reports` (`id`, `Room_No`, `productid`, `name`, `Category`, `Quantity`, `Discrepancy`, `Quantity_Requested`, `Attendant`, `Status`, `Remarks`, `Date_Requested`, `Date_Received`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Flat Sheet - Queen', 'Linen', 15, 10, 5, 'Mark Delos Santos', 'Approved', '', '2023-03-03 20:50:23', '2023-03-03 20:51:02', '2023-03-03 12:51:02', '2023-03-03 12:51:02'),
(2, 2, 3, 'Flat Sheet - Queen', 'Linen', 10, 10, 5, 'Marie B. Adams', 'Denied', '', '2023-03-03 20:50:29', '2023-03-03 20:51:07', '2023-03-03 12:51:07', '2023-03-03 12:51:07'),
(5, 3, 3, 'Flat Sheet - Queen', 'Linen', 15, 5, 3, 'Jacob Del Rosario', 'Approved', '', '2023-03-03 20:50:33', '2023-03-03 20:53:12', '2023-03-03 12:53:12', '2023-03-03 12:53:12'),
(6, 1, 3, 'Flat Sheet - Queen', 'Linen', 20, 10, 7, 'Nathan Dela Cruz', 'Approved', '', '2023-03-04 00:23:38', '2023-03-04 00:25:38', '2023-03-03 16:25:38', '2023-03-03 16:25:38'),
(7, 2, 3, 'Flat Sheet - Queen', 'Linen', 10, 10, 7410, 'Nathan Dela Cruz', 'Denied', '', '2023-03-04 00:24:50', '2023-03-04 00:25:43', '2023-03-03 16:25:43', '2023-03-03 16:25:43'),
(8, 3, 3, 'Flat Sheet - Queen', 'Linen', 15, 5, 123123, 'Marie B. Adams', 'Denied', '', '2023-03-04 00:25:02', '2023-03-04 00:25:49', '2023-03-03 16:25:49', '2023-03-03 16:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_supplies`
--

CREATE TABLE `hotel_room_supplies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Room_No` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Quantity_Requested` int(11) NOT NULL DEFAULT 0,
  `Attendant` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `Status` varchar(255) NOT NULL DEFAULT 'Received',
  `Remarks` text DEFAULT NULL,
  `Date_Requested` datetime DEFAULT NULL,
  `Date_Received` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_supplies`
--

INSERT INTO `hotel_room_supplies` (`id`, `Room_No`, `productid`, `name`, `Category`, `Quantity`, `Quantity_Requested`, `Attendant`, `Status`, `Remarks`, `Date_Requested`, `Date_Received`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bath Soap', 'Guest Supply', 3, 123, 'Mark Delos Santos', 'Requested', NULL, '2023-03-04 00:25:17', '2023-03-03 22:25:04', '2023-03-03 10:42:42', '2023-03-03 10:42:42'),
(2, 2, 1, 'Bath Soap', 'Guest Supply', 6, 0, 'Unassigned', 'Denied', NULL, '2023-03-03 20:41:33', '2023-03-03 20:51:30', '2023-03-03 12:36:02', '2023-03-03 12:36:02'),
(3, 2, 4, 'Shampoo', 'Guest Supply', 20, 0, 'Unassigned', 'Approved', NULL, '2023-03-03 20:41:47', '2023-03-03 22:25:12', '2023-03-03 12:36:30', '2023-03-03 12:36:30'),
(4, 3, 4, 'Shampoo', 'Guest Supply', 20, 0, 'Unassigned', 'Approved', NULL, '2023-03-03 20:41:42', '2023-03-03 22:25:18', '2023-03-03 12:36:43', '2023-03-03 12:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_supplies_reports`
--

CREATE TABLE `hotel_room_supplies_reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Room_No` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `Category` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Quantity_Requested` int(11) NOT NULL DEFAULT 0,
  `Attendant` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL,
  `Date_Requested` datetime DEFAULT NULL,
  `Date_Received` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hotel_room_supplies_reports`
--

INSERT INTO `hotel_room_supplies_reports` (`id`, `Room_No`, `productid`, `name`, `Category`, `Quantity`, `Quantity_Requested`, `Attendant`, `Status`, `Date_Requested`, `Date_Received`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Bath Soap', 'Guest Supply', 7, 10, 'Jacob Del Rosario', 'Denied', '2023-03-03 20:41:25', '2023-03-01 22:25:04', '2023-03-03 14:25:04', '2023-03-03 14:25:04'),
(2, 2, 4, 'Shampoo', 'Guest Supply', 20, 10, 'Marie B. Adams', 'Approved', '2023-03-03 20:41:47', '2023-03-03 22:25:12', '2023-03-03 14:25:12', '2023-03-03 14:25:12'),
(3, 3, 4, 'Shampoo', 'Guest Supply', 20, 10, 'Jacob Del Rosario', 'Approved', '2023-03-03 20:41:42', '2023-02-25 22:25:18', '2023-03-03 14:25:18', '2023-03-03 14:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `housekeepings`
--

CREATE TABLE `housekeepings` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Booking_No` varchar(255) NOT NULL,
  `Facility_Type` varchar(255) NOT NULL,
  `Facility_Status` varchar(255) NOT NULL,
  `Housekeeping_Status` varchar(255) NOT NULL DEFAULT 'Cleaned',
  `Front_Desk_Status` varchar(255) NOT NULL,
  `Request_ID` varchar(255) DEFAULT NULL,
  `Housekeeping_Request` varchar(255) DEFAULT NULL,
  `Attendant` varchar(255) NOT NULL DEFAULT 'Unassigned',
  `IsArchived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `housekeepings`
--

INSERT INTO `housekeepings` (`ID`, `Room_No`, `Booking_No`, `Facility_Type`, `Facility_Status`, `Housekeeping_Status`, `Front_Desk_Status`, `Request_ID`, `Housekeeping_Request`, `Attendant`, `IsArchived`, `created_at`, `updated_at`) VALUES
(1, 1, '16483U755698303', 'Hotel Room', 'Vacant for Cleaning', 'Inspect', 'Checked-Out', NULL, NULL, 'Marie B. Adams', 1, NULL, NULL),
(2, 2, '4357597660581G4', 'Hotel Room', 'Vacant for Cleaning', 'Cleaned', 'Checked-Out', NULL, NULL, 'Mark Delos Santos', 1, NULL, NULL),
(3, 3, '4777068Z7044851', 'Hotel Room', 'Vacant for Cleaning', 'Cleaned', 'Checked-Out', NULL, NULL, 'Nathan Dela Cruz', 1, NULL, NULL),
(4, 1, '13875T101803292', 'Hotel Room', 'Vacant for Cleaning', 'Inspect', 'Checked-Out', NULL, NULL, 'Marie B. Adams', 1, NULL, NULL),
(5, 1, 'Q75918282496618', 'Hotel Room', 'Vacant for Cleaning', 'Out of Order', 'Checked-Out', NULL, NULL, 'Nathan Dela Cruz', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `key_management`
--

CREATE TABLE `key_management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Key_ID` varchar(255) NOT NULL,
  `Room_No` int(11) NOT NULL,
  `Booking_No` varchar(255) NOT NULL,
  `Attendant` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Issued',
  `Issued_Time` datetime NOT NULL,
  `Due_Time` datetime NOT NULL,
  `Returned_Time` datetime DEFAULT NULL,
  `IsArchived` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `key_management`
--

INSERT INTO `key_management` (`id`, `Key_ID`, `Room_No`, `Booking_No`, `Attendant`, `Status`, `Issued_Time`, `Due_Time`, `Returned_Time`, `IsArchived`, `created_at`, `updated_at`) VALUES
(1, 'Key - 01', 1, '16483U755698303', 'Marie B. Adams', 'Issued', '2023-03-03 20:39:19', '2023-03-03 22:39:19', NULL, 0, NULL, NULL),
(2, 'Key - 02', 2, '4357597660581G4', 'Mark Delos Santos', 'Issued', '2023-03-03 20:39:22', '2023-03-03 22:39:22', NULL, 0, NULL, NULL),
(3, 'Key - 03', 3, '4777068Z7044851', 'Nathan Dela Cruz', 'Issued', '2023-03-03 20:39:26', '2023-03-03 22:39:26', NULL, 0, NULL, NULL);

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
(1, '2022_12_06_140802_create_novadeci_suites_table', 1),
(2, '2022_12_06_000949_create_hotel_reservation_table', 2),
(3, '2023_02_09_164155_create_guest_requests_table', 3),
(4, '2022_12_09_050205_create_hotelstocks_table', 4),
(5, '2014_10_12_000000_create_users_table', 5),
(6, '2014_10_12_100000_create_password_resets_table', 5),
(7, '2019_08_19_000000_create_failed_jobs_table', 5),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(9, '2022_12_06_183548_create_purchasereport_table', 5),
(10, '2022_12_08_145456_create_housekeeping_table', 5),
(11, '2022_12_08_184157_create_purchasereports_table', 5),
(12, '2022_12_12_080347_create_guestticket_table', 5),
(13, '2022_12_15_080028_create_archived_hotel_reservation_table', 5),
(14, '2023_01_26_043452_create_stocksfunctions_table', 5),
(15, '2023_02_03_071755_create_finances_table', 5),
(16, '2023_02_04_195723_create_convention_center_applications_table', 5),
(17, '2023_02_06_131237_create_out_of_order_rooms_table', 5),
(18, '2023_02_09_150623_create_finance_table', 5),
(19, '2023_02_09_204322_create_commercial_spaces_application_table', 5),
(20, '2023_02_09_223803_create_stockscenters_table', 5),
(21, '2023_02_16_215712_create_key_management_table', 5),
(22, '2023_02_16_223928_create_reports_table', 5),
(23, '2023_02_19_153542_create_finance_reports_table', 5),
(24, '2023_02_23_085944_create_complaints_table', 5),
(25, '2023_02_24_032244_create_stockhistories_table', 5),
(26, '2023_02_24_191341_create_hotel_room_supplies_table', 5),
(27, '2023_02_25_151847_create_hotel_room_supplies_view', 5),
(28, '2023_02_25_170446_create_hotel_room_linens_table', 5),
(29, '2023_02_25_233003_create_finance_2_reports_table', 5),
(30, '2023_03_02_204236_create_hotel_room_supplies_reports_table', 5),
(31, '2023_03_02_222801_create_hotel_room_linens_reports_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `novadeci_suites`
--

CREATE TABLE `novadeci_suites` (
  `Room_No` int(11) NOT NULL,
  `Key_ID` varchar(255) NOT NULL,
  `Room_Size` varchar(255) NOT NULL,
  `No_of_Beds` varchar(255) NOT NULL,
  `Extra_Bed` varchar(255) NOT NULL,
  `No_Pax_Per_Room` int(11) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Vacant for Accommodation',
  `Rate_per_Night` int(11) NOT NULL,
  `Hotel_Image` varchar(255) NOT NULL,
  `DB_Image` blob NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `novadeci_suites`
--

INSERT INTO `novadeci_suites` (`Room_No`, `Key_ID`, `Room_Size`, `No_of_Beds`, `Extra_Bed`, `No_Pax_Per_Room`, `Status`, `Rate_per_Night`, `Hotel_Image`, `DB_Image`, `created_at`, `updated_at`) VALUES
(1, 'Key - 01', '37 (corner room)', 'One (1) queen-sized & One (1) twin-sized', 'One (1)', 4, 'Vacant for Accommodation', 2500, 'hotel_images\\1677833820--Room 1-.JPG', 0x536c4248, '2023-03-03 08:57:00', '2023-03-03 08:57:00'),
(2, 'Key - 02', '34', 'One (1) twin-sized', 'One (1)', 2, 'Vacant for Accommodation', 2500, 'hotel_images\\1677833836--Room 2-.JPG', 0x536c4248, '2023-03-03 08:57:16', '2023-03-03 08:57:16'),
(3, 'Key - 03', '37', 'One (1) queen-sized', 'One (1)', 3, 'Vacant for Accommodation', 2500, 'hotel_images\\1677833853--Room 3-.JPG', 0x536c4248, '2023-03-03 08:57:33', '2023-03-03 08:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `out_of_order_rooms`
--

CREATE TABLE `out_of_order_rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Facility_Type` varchar(255) NOT NULL,
  `Room_No` int(11) DEFAULT NULL,
  `Booking_No` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Discovered_By` varchar(255) DEFAULT NULL,
  `Priority_Level` varchar(255) NOT NULL,
  `Status` varchar(255) NOT NULL DEFAULT 'Ongoing',
  `IsArchived` tinyint(1) NOT NULL DEFAULT 0,
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp(),
  `Due_Date` date NOT NULL,
  `Date_Resolved` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `out_of_order_rooms`
--

INSERT INTO `out_of_order_rooms` (`id`, `Facility_Type`, `Room_No`, `Booking_No`, `Description`, `Discovered_By`, `Priority_Level`, `Status`, `IsArchived`, `Date_Created`, `Due_Date`, `Date_Resolved`, `created_at`, `updated_at`) VALUES
(1, 'Hotel Room', 1, '16483U755698303', 'Door Knob is broken', 'Marie B. Adams', 'High', 'Resolved', 1, '2023-03-03 12:40:09', '2023-03-11', '2023-03-02', '2023-03-03 12:40:09', '2023-03-03 12:40:09'),
(2, 'Hotel Room', 1, '13875T101803292', 'Door Knob is broken', 'Marie B. Adams', 'Moderate', 'Resolved', 1, '2023-03-03 17:07:59', '2023-03-04', '2023-03-04', '2023-03-03 17:07:59', '2023-03-03 17:07:59'),
(3, 'Hotel Room', 1, 'Q75918282496618', 'Broken da Broken', 'Nathan Dela Cruz', 'Moderate', 'Resolved', 1, '2023-03-03 17:17:37', '2023-03-10', '2023-03-04', '2023-03-03 17:17:36', '2023-03-03 17:17:36');

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
  `reqid` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `pax` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `receiver` varchar(255) NOT NULL,
  `supervisor` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockhistories`
--

CREATE TABLE `stockhistories` (
  `itemid` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `movement` varchar(255) NOT NULL,
  `movement_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stockscenters`
--

CREATE TABLE `stockscenters` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stocksfunctions`
--

CREATE TABLE `stocksfunctions` (
  `productid` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `Stock_Level` int(11) NOT NULL,
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
(1, 'Daniel Diapen', 'daniel@gmail.com', NULL, '$2y$10$Jq95HGf777sq21XC7cD0lu5cOdYhfUdhDQb3BIiH2qsQ51HFYobqm', 'Admin', NULL, '2023-03-03 08:55:22', '2023-03-03 08:55:22'),
(2, 'Nathan Dela Cruz', 'nathan@gmail.com', NULL, '$2y$10$ufUW6CLxHryYbIxYn7Dx5ejHoC8Ve.Kdb0gQj0Z.uFNJt9OlWSp5K', 'Housekeeping Supervisor', NULL, '2023-03-03 16:17:28', '2023-03-03 16:17:28'),
(3, 'Daniel Diaps', 'diaps@gmail.com', NULL, '$2y$10$beNjwXdnPpRj7QHZOG5A3utef6AwcAMlmhKlnMed6uV744VAVMjBm', 'Guest', NULL, '2023-03-03 16:48:06', '2023-03-03 16:48:06');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_hotel_room_supplies`
-- (See below for the actual view)
--
CREATE TABLE `view_hotel_room_supplies` (
`id` bigint(20) unsigned
,`Room_No` int(11)
,`productid` int(11)
,`name` varchar(255)
,`Quantity` int(11)
,`Quantity_Requested` int(11)
,`Attendant` varchar(255)
,`Date_Requested` datetime
,`Status` varchar(255)
,`Remarks` text
);

-- --------------------------------------------------------

--
-- Structure for view `view_hotel_room_supplies`
--
DROP TABLE IF EXISTS `view_hotel_room_supplies`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_hotel_room_supplies`  AS SELECT `hotel_room_supplies`.`id` AS `id`, `hotel_room_supplies`.`Room_No` AS `Room_No`, `hotel_room_supplies`.`productid` AS `productid`, `hotel_room_supplies`.`name` AS `name`, `hotel_room_supplies`.`Quantity` AS `Quantity`, `hotel_room_supplies`.`Quantity_Requested` AS `Quantity_Requested`, `hotel_room_supplies`.`Attendant` AS `Attendant`, `hotel_room_supplies`.`Date_Requested` AS `Date_Requested`, `hotel_room_supplies`.`Status` AS `Status`, `hotel_room_supplies`.`Remarks` AS `Remarks` FROM `hotel_room_supplies``hotel_room_supplies`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archived_hotel_reservation`
--
ALTER TABLE `archived_hotel_reservation`
  ADD PRIMARY KEY (`Reservation_No`);

--
-- Indexes for table `commercial_spaces_applications`
--
ALTER TABLE `commercial_spaces_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `convention_center_applications`
--
ALTER TABLE `convention_center_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `finance`
--
ALTER TABLE `finance`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `finances`
--
ALTER TABLE `finances`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `finance_2_reports`
--
ALTER TABLE `finance_2_reports`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `finance_reports`
--
ALTER TABLE `finance_reports`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `guestticket`
--
ALTER TABLE `guestticket`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `guest_requests`
--
ALTER TABLE `guest_requests`
  ADD PRIMARY KEY (`Request_ID`),
  ADD KEY `guest_requests_room_no_index` (`Room_No`),
  ADD KEY `guest_requests_booking_no_index` (`Booking_No`);

--
-- Indexes for table `hotelstocks`
--
ALTER TABLE `hotelstocks`
  ADD PRIMARY KEY (`productid`),
  ADD UNIQUE KEY `hotelstocks_name_unique` (`name`);

--
-- Indexes for table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hotel_reservations_booking_no_unique` (`Booking_No`),
  ADD KEY `hotel_reservations_room_no_index` (`Room_No`);

--
-- Indexes for table `hotel_room_linens`
--
ALTER TABLE `hotel_room_linens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_room_linens_room_no_index` (`Room_No`),
  ADD KEY `hotel_room_linens_productid_index` (`productid`),
  ADD KEY `hotel_room_linens_name_index` (`name`);

--
-- Indexes for table `hotel_room_linens_reports`
--
ALTER TABLE `hotel_room_linens_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_room_supplies`
--
ALTER TABLE `hotel_room_supplies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_room_supplies_room_no_index` (`Room_No`),
  ADD KEY `hotel_room_supplies_productid_index` (`productid`),
  ADD KEY `hotel_room_supplies_name_index` (`name`);

--
-- Indexes for table `hotel_room_supplies_reports`
--
ALTER TABLE `hotel_room_supplies_reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `housekeepings`
--
ALTER TABLE `housekeepings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `housekeepings_room_no_index` (`Room_No`),
  ADD KEY `housekeepings_booking_no_index` (`Booking_No`),
  ADD KEY `housekeepings_request_id_index` (`Request_ID`);

--
-- Indexes for table `key_management`
--
ALTER TABLE `key_management`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key_management_key_id_index` (`Key_ID`),
  ADD KEY `key_management_booking_no_index` (`Booking_No`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novadeci_suites`
--
ALTER TABLE `novadeci_suites`
  ADD PRIMARY KEY (`Room_No`),
  ADD UNIQUE KEY `novadeci_suites_key_id_unique` (`Key_ID`);

--
-- Indexes for table `out_of_order_rooms`
--
ALTER TABLE `out_of_order_rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `out_of_order_rooms_room_no_index` (`Room_No`),
  ADD KEY `out_of_order_rooms_booking_no_index` (`Booking_No`);

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
  ADD PRIMARY KEY (`reqid`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockhistories`
--
ALTER TABLE `stockhistories`
  ADD PRIMARY KEY (`itemid`);

--
-- Indexes for table `stockscenters`
--
ALTER TABLE `stockscenters`
  ADD PRIMARY KEY (`productid`);

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
-- AUTO_INCREMENT for table `commercial_spaces_applications`
--
ALTER TABLE `commercial_spaces_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `convention_center_applications`
--
ALTER TABLE `convention_center_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance`
--
ALTER TABLE `finance`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finances`
--
ALTER TABLE `finances`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance_2_reports`
--
ALTER TABLE `finance_2_reports`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `finance_reports`
--
ALTER TABLE `finance_reports`
  MODIFY `userid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestticket`
--
ALTER TABLE `guestticket`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hotel_room_linens`
--
ALTER TABLE `hotel_room_linens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_room_linens_reports`
--
ALTER TABLE `hotel_room_linens_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `hotel_room_supplies`
--
ALTER TABLE `hotel_room_supplies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hotel_room_supplies_reports`
--
ALTER TABLE `hotel_room_supplies_reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `housekeepings`
--
ALTER TABLE `housekeepings`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `key_management`
--
ALTER TABLE `key_management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `out_of_order_rooms`
--
ALTER TABLE `out_of_order_rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `reqid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockhistories`
--
ALTER TABLE `stockhistories`
  MODIFY `itemid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stockscenters`
--
ALTER TABLE `stockscenters`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stocksfunctions`
--
ALTER TABLE `stocksfunctions`
  MODIFY `productid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guest_requests`
--
ALTER TABLE `guest_requests`
  ADD CONSTRAINT `guest_requests_booking_no_foreign` FOREIGN KEY (`Booking_No`) REFERENCES `hotel_reservations` (`Booking_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `guest_requests_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_reservations`
--
ALTER TABLE `hotel_reservations`
  ADD CONSTRAINT `hotel_reservations_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_room_linens`
--
ALTER TABLE `hotel_room_linens`
  ADD CONSTRAINT `hotel_room_linens_name_foreign` FOREIGN KEY (`name`) REFERENCES `hotelstocks` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_room_linens_productid_foreign` FOREIGN KEY (`productid`) REFERENCES `hotelstocks` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_room_linens_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hotel_room_supplies`
--
ALTER TABLE `hotel_room_supplies`
  ADD CONSTRAINT `hotel_room_supplies_name_foreign` FOREIGN KEY (`name`) REFERENCES `hotelstocks` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_room_supplies_productid_foreign` FOREIGN KEY (`productid`) REFERENCES `hotelstocks` (`productid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hotel_room_supplies_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `housekeepings`
--
ALTER TABLE `housekeepings`
  ADD CONSTRAINT `housekeepings_booking_no_foreign` FOREIGN KEY (`Booking_No`) REFERENCES `hotel_reservations` (`Booking_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `housekeepings_request_id_foreign` FOREIGN KEY (`Request_ID`) REFERENCES `guest_requests` (`Request_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `housekeepings_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `key_management`
--
ALTER TABLE `key_management`
  ADD CONSTRAINT `key_management_booking_no_foreign` FOREIGN KEY (`Booking_No`) REFERENCES `hotel_reservations` (`Booking_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `key_management_key_id_foreign` FOREIGN KEY (`Key_ID`) REFERENCES `novadeci_suites` (`Key_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_of_order_rooms`
--
ALTER TABLE `out_of_order_rooms`
  ADD CONSTRAINT `out_of_order_rooms_booking_no_foreign` FOREIGN KEY (`Booking_No`) REFERENCES `hotel_reservations` (`Booking_No`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `out_of_order_rooms_room_no_foreign` FOREIGN KEY (`Room_No`) REFERENCES `novadeci_suites` (`Room_No`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
