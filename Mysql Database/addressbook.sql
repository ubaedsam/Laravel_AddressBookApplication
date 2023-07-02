-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jul 2023 pada 08.13
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `user_id`, `group_id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Jaka Susanto', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab incidunt in ad, quibusdam minima quos.', '081388200012', NULL, NULL),
(2, 2, 7, 'Putri Sulis', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ab incidunt in ad, quibusdam minima quos.', '02199925632', NULL, '2023-06-20 01:27:31'),
(3, 2, 2, 'Angga Purnomo', 'Lorem, ipsum dolor sit amet consectetur adipisicin', '0823448898291', '2023-06-20 01:07:55', '2023-06-20 01:07:55'),
(4, 2, 2, 'Mutia Putri', 'sit amet consectetur adipisici', '021388893222', '2023-06-20 01:14:53', '2023-06-20 01:14:53'),
(8, 2, 7, 'Uknown', 'aadad', '021887222946', '2023-06-21 01:49:01', '2023-06-21 01:49:01'),
(10, 2, 11, 'Bule ABCD', 'loroemm jnajdajda', '021887222946', '2023-06-21 02:21:16', '2023-06-21 02:27:05'),
(11, 2, 1, 'Bismo', 'lorem jadjadjbadba', '02189377822', '2023-06-21 13:43:25', '2023-06-21 13:43:25'),
(15, 2, 13, 'Mr. Jules Flatley', '246 Schumm Way\nBoyerville, VA 10815-0765', '+1-360-994-4084', '2023-06-24 02:11:06', '2023-06-24 02:11:06'),
(18, 2, 17, 'Etha Mayert', '856 Hahn Meadows\nMargueritestad, DC 41324', '678.744.3893', '2023-06-24 02:11:07', '2023-06-24 02:11:07'),
(31, 2, 8, 'Kendrick Cole', '765 Myra Land\nRauchester, VA 03099-3461', '531.323.4316', '2023-06-24 02:11:09', '2023-06-24 02:11:09'),
(36, 2, 1, 'Landen Murazik', '192 Edwina Land\nNorth Breanaborough, CA 69307', '+13206498519', '2023-06-24 02:11:10', '2023-06-24 02:11:10'),
(42, 2, 19, 'Dedrick Halvorson', '64541 Hoeger Fall\nEast Lorena, NC 97265-3496', '231-367-3500', '2023-06-24 02:11:11', '2023-06-24 02:11:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `group`
--

CREATE TABLE `group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `group`
--

INSERT INTO `group` (`id`, `user_id`, `group`, `created_at`, `updated_at`) VALUES
(1, 2, 'Group 1', NULL, NULL),
(2, 2, 'Group 2 Ubaed', NULL, '2023-06-21 00:23:07'),
(7, 2, 'Group 3 Ubaed', '2023-06-19 22:28:10', '2023-06-19 22:28:10'),
(8, 2, 'Group 4 Ubaed', '2023-06-21 00:19:40', '2023-06-21 00:19:40'),
(10, 2, 'Group 6', '2023-06-21 00:25:59', '2023-06-21 00:25:59'),
(11, 2, 'Group 5', '2023-06-21 00:43:52', '2023-06-21 00:43:52'),
(12, 2, 'Group Baru Diubah', '2023-06-21 11:59:11', '2023-06-21 13:23:53'),
(13, 2, 'Grup Futsal', '2023-06-21 22:52:48', '2023-06-21 22:52:48'),
(17, 2, 'Ratione.', '2023-06-24 02:10:41', '2023-06-24 02:10:41'),
(19, 2, 'Incidunt quia.', '2023-06-24 02:10:42', '2023-06-24 02:10:42'),
(21, 2, 'Ut voluptate.', '2023-06-24 02:10:43', '2023-06-24 02:10:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_19_133646_create_verify_users_table', 1),
(6, '2023_06_19_200224_create_group_table', 1),
(7, '2023_06_19_200940_create_contact_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'authToken', '645db7486a2a40e3398ab341d22b5709e7c84891f0b091ee31b2837b8dba4344', '[\"*\"]', '2023-06-22 01:14:08', '2023-06-22 01:11:26', '2023-06-22 01:14:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `email_verified`, `created_at`, `updated_at`) VALUES
(2, 'User 1', 'ubaedasam@gmail.com', NULL, '$2y$10$dSb6Umux.q4lF0wj28DnOOnytXDzLqPDqm0DPCbmRTJgAHjveKpV.', NULL, 1, '2023-06-19 20:04:02', '2023-06-19 20:16:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `verify_users`
--

CREATE TABLE `verify_users` (
  `user_id` int(11) NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `verify_users`
--

INSERT INTO `verify_users` (`user_id`, `token`, `created_at`, `updated_at`) VALUES
(1, '1e8dcef2c2b22b0fa2dd3f673b1b6fc805ff4854ebfb4bf7e2b04d99b05bdf433', '2023-06-19 19:38:11', '2023-06-19 19:38:11'),
(2, '24655053242e55924db48da1d7720c3ca26905b144a67a1093dca4db948dda110', '2023-06-19 19:51:51', '2023-06-19 19:51:51'),
(3, '3df19a0f721489d0169ca2df6585155cfbf9b464ef9dab1c28667d67436d4b936', '2023-06-19 19:55:32', '2023-06-19 19:55:32'),
(1, '1a1ead88d1dbc1f912a425476ef218ddb6e2470073262e3ddd13e72f06e9aedfb', '2023-06-19 20:01:24', '2023-06-19 20:01:24'),
(2, '2302d9c784777df005245deb5ea1869a3c88b1c0a447c6db10368f6536138422f', '2023-06-19 20:04:02', '2023-06-19 20:04:02'),
(3, '326ba66f445b573ebbae86e538a29eae18f66207943a3114a52aa5f6d911b4cdb', '2023-06-19 21:05:09', '2023-06-19 21:05:09'),
(4, '4b1f59a35438983fd1a8e76dd49932cbf9b16987d9736a58b4f410bafc4ed79bc', '2023-06-20 09:19:22', '2023-06-20 09:19:22'),
(5, '53970a88d1e4bc81616121de814af643f70c0749202a86b58f8f02c4ffab06594', '2023-06-20 09:24:23', '2023-06-20 09:24:23'),
(6, '6ec48e20ba7796b6dfe1bededdf5c29476bcbea8d7025f4a202415cc22ca55966', '2023-06-20 14:45:50', '2023-06-20 14:45:50'),
(7, '75b89104ab560dff72f1b5d2f58c9cae6f1fe3b7122cfe2bfe675fba13587bfba', '2023-06-21 10:32:10', '2023-06-21 10:32:10'),
(8, '8a0dd0c766b89865feba08e36a7167c9f0a756b6dc97e0522f84284e6d551ab62', '2023-06-22 12:56:44', '2023-06-22 12:56:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contact_user_id_foreign` (`user_id`),
  ADD KEY `contact_group_id_foreign` (`group_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `group`
--
ALTER TABLE `group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contact_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `group`
--
ALTER TABLE `group`
  ADD CONSTRAINT `group_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
