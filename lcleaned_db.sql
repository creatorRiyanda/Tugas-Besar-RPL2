-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2022 at 04:27 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lcleaned`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(6, 'Pakaian', '2021-05-30 04:24:00', '2022-02-20 02:55:28'),
(7, 'Sepatu', '2022-02-11 09:00:01', '2022-02-20 02:55:43');

-- --------------------------------------------------------

--
-- Table structure for table `data_laundries`
--

CREATE TABLE `data_laundries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_laundry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_laundry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_laundries`
--

INSERT INTO `data_laundries` (`id`, `nama_laundry`, `alamat`, `rating`, `foto_laundry`, `status`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(4, 'Laundry Bersihin', 'JL Sekeloa Tengah No 103,Coblong ,Kota Bandung Jawa Barat', '4.5', '/img/02152022105219620b85e304c0ebersihin-thumbnail.png', 'Tutup', '2022-02-13 13:52:11', '2022-02-20 07:25:43', 12, 6),
(5, 'Laundry Bunda', 'Jl Madya Kebantenan RT 03 Kec. Cilincing,Bandung Timur', '4.6', '/img/02152022105309620b8615d95eadownload (1).jpg', 'Buka', '2022-02-13 21:28:15', '2022-02-20 02:58:34', 14, 6);

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
-- Table structure for table `laundry_types`
--

CREATE TABLE `laundry_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mitra_id` int(11) NOT NULL,
  `nama_jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `estimasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundry_types`
--

INSERT INTO `laundry_types` (`id`, `mitra_id`, `nama_jenis`, `harga`, `estimasi`, `created_at`, `updated_at`) VALUES
(1, 2, 'reguler', 14000, '3 hari', '2022-02-13 09:26:12', '2022-02-13 09:26:12'),
(2, 2, 'Kilat', 25000, '1', '2022-02-13 09:27:27', '2022-02-13 09:27:27'),
(4, 2, '1 day', 20000, '1 Hari', '2022-02-13 13:03:41', '2022-02-13 13:03:41'),
(5, 4, 'reguler', 6000, '3 hari', '2022-02-13 13:53:52', '2022-02-13 13:53:52'),
(6, 4, 'Cepat', 10000, '2 hari', '2022-02-13 13:54:08', '2022-02-13 13:54:08'),
(7, 4, 'Express', 15000, '1 hari', '2022-02-13 13:54:28', '2022-02-13 13:54:28'),
(8, 5, 'Biasa', 5000, '3 hari', '2022-02-13 21:32:05', '2022-02-13 21:32:05'),
(9, 5, 'Cepat', 9000, '2 Hari', '2022-02-13 21:32:25', '2022-02-13 21:32:25'),
(10, 5, 'Super', 14000, '1 hari', '2022-02-13 21:32:47', '2022-02-13 21:32:47');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2021_05_15_181037_create_categories', 1),
(4, '2021_05_15_181426_create_products', 1),
(6, '2021_05_22_065310_add_foto_product_in_products', 2),
(7, '2021_05_22_070705_add_stock_in_products', 3),
(8, '2022_02_12_164527_create_laundry_types', 4),
(9, '2021_05_15_181805_create_transactions', 5),
(10, '2022_02_12_174933_create_data_laundrys', 6),
(12, '2022_02_12_182848_add_field_status_to_data_laundries', 8),
(13, '2022_02_13_123841_add_field_userid_to_transactions', 9),
(14, '2022_02_13_125701_add_field_quantityand_laundry_type_to_transactions', 10),
(15, '2022_02_12_180647_create_data_laundries', 11),
(16, '2022_02_13_152423_add_field_userid_to_data_laundries', 12),
(17, '2022_02_13_153453_add_field_categoryid_to_data_laundries', 13),
(18, '2022_02_13_171101_add_field_no_telpon_to_transactions', 14),
(19, '2022_02_13_175042_add_field_quantity_to_transactions', 15),
(20, '2022_02_13_212816_add_field_data_laundry_id_to_transactions', 16),
(21, '2022_02_13_212852_add_field_nama_laundry_to_transactions', 16);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tgl_pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` int(11) NOT NULL,
  `jenis_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stasus_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stasus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `satuan` int(11) DEFAULT NULL,
  `jenis_paket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telpon` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_id` int(11) NOT NULL,
  `nama_laundry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `tgl_pesan`, `pembayaran`, `nama_pelanggan`, `alamat`, `total_harga`, `jenis_pembayaran`, `stasus_pembayaran`, `stasus`, `created_at`, `updated_at`, `user_id`, `satuan`, `jenis_paket`, `no_telpon`, `laundry_id`, `nama_laundry`) VALUES
(14, '2022-02-15 10:24:19', 'Lunas', 'riyan', 'indramayu remaja', 30000, '', 'Menunggu Pengiriman', 'Pesanan telah di ambil', '2022-02-15 03:24:19', '2022-02-15 03:26:12', 13, 2, 'Express', '08033445533', 4, 'Laundry Bersihin'),
(16, '2022-02-15 11:37:51', 'Belum Lunas', 'Revano', 'Jl Madya Kebantenan RT 03, 06, 07, 08, 09/RW 02, Kel. Semper Timur, Kec. Cilincing,Jakarta Utara', 12000, '', 'Menunggu Pengiriman', 'Kurir sedang menuju ke alamat tujuan', '2022-02-15 04:37:51', '2022-02-15 04:44:34', 8, 2, 'reguler', '0898765476', 4, 'Laundry Bersihin'),
(17, '2022-02-20 15:21:29', 'Tunai', 'user', 'garut', 27000, '', 'Menunggu Pengiriman', 'Sedang Diproses', '2022-02-20 08:21:29', '2022-02-20 08:21:29', 12, 3, 'Cepat', '081122334455', 5, 'Laundry Bunda');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `no_hp`, `alamat`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '2021-05-27 07:25:44', '$2y$10$mdRh0GPb59pHR2kAjEvYGuDemy3IPisu49gYiRsIGEwVXDGz57Yv2', NULL, '-', '-', 'admin', '2021-05-27 07:25:44', '2021-05-27 07:25:44'),
(8, 'user', 'user@gmail.com', '2021-05-29 23:27:25', '$2y$10$ZXLVumrSdUXGf8uYsfTO2.57qtcWkDzAf/AL9711/p7zvkEPy4yZq', NULL, '-', '-', 'user', '2021-05-29 23:27:25', '2021-05-29 23:27:25'),
(12, 'mitra1', 'mitra1@gmail.com', '2022-02-13 13:52:11', '$2y$10$xQsSFdoidpaejOjpX1Rgp.JPm.yQFjdvpi296jR2DN1Ju/oglR9He', NULL, '-', '-', 'mitra', '2022-02-13 13:52:11', '2022-02-13 13:52:11'),
(13, 'vano', 'vano@gmail.com', '2022-02-13 13:55:13', '$2y$10$hR1y3Ir2l7HYAH1aJOhrAudq44ax0KQzfL51QHKkVgmq2oTlGujJy', NULL, '-', '-', 'user', '2022-02-13 13:55:13', '2022-02-13 13:55:13'),
(14, 'mitra2', 'mitra2@gmail.com', '2022-02-13 21:28:15', '$2y$10$SdMAaDFa2uNYf2HlThCrROACepQAb/QaK5ezLhBQcHoS2qJjgwP9W', NULL, '-', '-', 'mitra', '2022-02-13 21:28:15', '2022-02-13 21:28:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_laundries`
--
ALTER TABLE `data_laundries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laundry_types`
--
ALTER TABLE `laundry_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `data_laundries`
--
ALTER TABLE `data_laundries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_types`
--
ALTER TABLE `laundry_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
