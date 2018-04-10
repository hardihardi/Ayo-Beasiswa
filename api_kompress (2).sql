-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2018 at 10:14 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `api_kompress`
--

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa_kategori`
--

CREATE TABLE `beasiswa_kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `scholarship_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `judul`, `konten`, `created_at`, `updated_at`) VALUES
(1, 'komputer', 'beasiswa komputer', NULL, NULL),
(2, 'luar negeri', 'beasiswa luar negeri', NULL, NULL),
(3, 'hulas12', 'asdas', NULL, NULL),
(4, 'hul', 'asdas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `facilitators`
--

CREATE TABLE `facilitators` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_instansi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_instansi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token_facilitator` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `facilitators`
--

INSERT INTO `facilitators` (`id`, `nama_instansi`, `deskripsi_instansi`, `user_id`, `token_facilitator`, `created_at`, `updated_at`) VALUES
(23, 'Hacktiv8', 'Bekerja sama', 35, 'pX2wNWaB9uo5xWoSaSgo', '2018-04-10 00:14:56', '2018-04-10 00:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2018_03_02_091221_create_users_table', 1),
(3, '2018_03_02_091945_create_scholarships_table', 1),
(4, '2018_03_02_092026_create_categories_table', 1),
(5, '2018_03_02_160221_create_beasiswa_kategori_table', 1),
(6, '2018_03_02_163024_create_facilitator_table', 1),
(7, '2018_03_02_160132_create_users_beasiswa_table', 2),
(8, '2018_03_03_121800_create_facilitator_scholarship', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_beasiswa` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_instantsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quota` int(11) NOT NULL,
  `konten` text COLLATE utf8mb4_unicode_ci,
  `alamat_gambar` text COLLATE utf8mb4_unicode_ci,
  `masa_berlaku` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `prioritas` tinyint(1) NOT NULL DEFAULT '0',
  `facilitator_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `pendidikan` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `status` int(11) NOT NULL DEFAULT '0',
  `img_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `nama`, `alamat`, `pendidikan`, `telp`, `role`, `status`, `img_url`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(24, 'lolitrack', 'lolitrack97@gmail.com', '$2y$10$hXF4mOa1G.6c/4IuIZgHm.5cXUt9TDoGy3giBoVSCwwnss3dq.Mb.', 'aria', 'depok', 's1', '08963455095', 2, 1, '/img/profile/lolitrack.jpg', 'C6VTJ55LmE3f3NnC2QEv', 'sE7kigjJGyxZaVplysdDOzWoZgaYDgPoU7FwvGxXda404aFOF3UgmQNclnAE', '2018-04-09 12:56:23', '2018-04-09 21:46:36'),
(35, 'ariaelhamidy', 'ariaelhamidy@gmail.com', '$2y$10$gVDCQJXa4UPyvuJ8taaijuhetO29UHHbkJifVo8PivG0EpXIfR.NO', 'aria samudera elhamidy', 'sssss', 'gundarma university', '08963455095', 2, 1, '/img/profile/ariaelhamidy.jpg', 'KTjhE3KB9B1CEJ5eWISe', '4bTN6ZAVBgxtH0KyPPKoz9xNE4LuPOycIvGL2ApVPyuh4uD10QD3PKQra7vN', '2018-04-09 20:45:36', '2018-04-10 01:14:21');

-- --------------------------------------------------------

--
-- Table structure for table `user_scholarship`
--

CREATE TABLE `user_scholarship` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `scholarship_id` int(10) UNSIGNED NOT NULL,
  `berkas` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beasiswa_kategori`
--
ALTER TABLE `beasiswa_kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beasiswa_kategori_category_id_foreign` (`category_id`),
  ADD KEY `beasiswa_kategori_scholarship_id_foreign` (`scholarship_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facilitators`
--
ALTER TABLE `facilitators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facilitators_user_id_foreign` (`user_id`);

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
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholarships_facilitator_id_foreign` (`facilitator_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_scholarship`
--
ALTER TABLE `user_scholarship`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_scholarship_user_id_foreign` (`user_id`),
  ADD KEY `user_scholarship_scholarship_id_foreign` (`scholarship_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beasiswa_kategori`
--
ALTER TABLE `beasiswa_kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facilitators`
--
ALTER TABLE `facilitators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user_scholarship`
--
ALTER TABLE `user_scholarship`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `beasiswa_kategori`
--
ALTER TABLE `beasiswa_kategori`
  ADD CONSTRAINT `beasiswa_kategori_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beasiswa_kategori_scholarship_id_foreign` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `facilitators`
--
ALTER TABLE `facilitators`
  ADD CONSTRAINT `facilitators_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD CONSTRAINT `scholarships_facilitator_id_foreign` FOREIGN KEY (`facilitator_id`) REFERENCES `facilitators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_scholarship`
--
ALTER TABLE `user_scholarship`
  ADD CONSTRAINT `user_scholarship_scholarship_id_foreign` FOREIGN KEY (`scholarship_id`) REFERENCES `scholarships` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_scholarship_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
