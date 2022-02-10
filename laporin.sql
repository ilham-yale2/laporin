-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2021 pada 04.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity`
--

CREATE TABLE `activity` (
  `id_act` bigint(20) UNSIGNED NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `act` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity`
--

INSERT INTO `activity` (`id_act`, `avatar`, `username`, `level`, `act`, `created_at`, `updated_at`) VALUES
(1, 'avatar.png', 'admin123', 'petugas', 'Mengembalikan Pengaduan', '2021-03-22 07:51:12', '2021-03-22 07:51:12'),
(2, 'avatar.png', 'admin123', 'petugas', 'Mengembalikan Pengaduan', '2021-03-22 07:57:57', '2021-03-22 07:57:57'),
(3, 'avatar.png', 'admin123', 'petugas', 'Memverifikasi Pengaduan', '2021-03-22 07:59:03', '2021-03-22 07:59:03'),
(5, 'avatar.png', 'admin123', 'petugas', 'Memberi Tangapan', '2021-03-22 16:58:37', '2021-03-22 16:58:37'),
(6, 'avatar.png', 'ilham123', 'admin', 'Memverifikasi Pengaduan', '2021-04-11 19:20:24', '2021-04-11 19:20:24'),
(7, 'avatar.png', 'ilham123', 'admin', 'Memberi Tangapan', '2021-04-11 19:20:32', '2021-04-11 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` enum('admin','petugas') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `act` int(11) NOT NULL DEFAULT 0,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`id`, `nama_petugas`, `username`, `password`, `telp`, `level`, `avatar`, `status`, `act`, `alamat`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin123', '$2y$10$qzdNFnOSLWwJ3hhwFMDn5eeaiaikFeJNgcjrcWo.GNpjZZiU.NqOu', NULL, 'petugas', 'avatar.png', 1, 4, '', NULL, NULL, '2021-03-22 07:48:02', '2021-03-22 16:58:37'),
(2, 'Ilham Magfiro', 'ilham123', '$2y$10$2sxwP9EMpGaG1Zpxy8uv3.h8xVpiI2G.XR4Jw90LbZJEyK29yLzdi', NULL, 'admin', 'avatar.png', 1, 2, '', NULL, NULL, '2021-03-30 05:20:06', '2021-04-11 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mails`
--

CREATE TABLE `mails` (
  `id_mail` bigint(20) UNSIGNED NOT NULL,
  `nama_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mails`
--

INSERT INTO `mails` (`id_mail`, `nama_petugas`, `nik`, `message`, `type`, `id_pengaduan`, `judul_pengaduan`, `category`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', '1234567890123456', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta dolorem, quo molestias officia magni iure quibusdam? Harum, quae inventore et, esse itaque eveniet numquam, ex quas earum eaque dignissimos sit unde! Aliquid dolor soluta aperiam, magnam, ut animi officiis a voluptates ipsa saepe nemo debitis iste vitae earum, est id et doloremque quia nulla praesentium voluptas? Dolores, corporis? Aperiam provident numquam illum incidunt quisquam, alias cum dolores nihil consequuntur voluptatem perspiciatis soluta magnam reprehenderit ratione dolore inventore laudantium eos voluptates consectetur sit esse ullam hic exercitationem. Minima eligendi cupiditate beatae vitae, expedita quasi magni, quaerat consectetur distinctio harum architecto praesentium.', 'danger', '1', 'test', 'Pengembalian Pengaduan', 0, '2021-03-22 07:51:12', '2021-03-22 07:51:12'),
(2, 'admin', '1234567890123456', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta dolorem, quo molestias officia magni iure quibusdam? Harum, quae inventore et, esse itaque eveniet numquam, ex quas earum eaque dignissimos sit unde! Aliquid dolor soluta aperiam, magnam, ut animi officiis a voluptates ipsa saepe nemo debitis iste vitae earum, est id et doloremque quia nulla praesentium voluptas? Dolores, corporis? Aperiam provident numquam illum incidunt quisquam, alias cum dolores nihil consequuntur voluptatem perspiciatis soluta magnam reprehenderit ratione dolore inventore laudantium eos voluptates consectetur sit esse ullam hic exercitationem. Minima eligendi cupiditate beatae vitae, expedita quasi magni, quaerat consectetur distinctio harum architecto praesentium.', 'danger', '2', 'judul', 'Pengembalian Pengaduan', 0, '2021-03-22 07:57:57', '2021-03-22 07:57:57'),
(3, 'admin', '1234567890123456', 'Pengaduan Anda Telah diverifikasi, Mohon Tunggu Tanggapan dari Pengaduan Anda :)', 'success', '3', 'judul', 'Verifikasi', 0, '2021-03-22 07:59:04', '2021-03-22 07:59:04'),
(5, 'admin', '1234567890123456', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta dolorem, quo molestias officia magni iure quibusdam? Harum, quae inventore et, esse itaque eveniet numquam, ex quas earum eaque dignissimos sit unde! Aliquid dolor soluta aperiam, magnam, ut animi officiis a voluptates ipsa saepe nemo debitis iste vitae earum, est id et doloremque quia nulla praesentium voluptas? Dolores, corporis? Aperiam provident numquam illum incidunt quisquam, alias cum dolores nihil consequuntur voluptatem perspiciatis soluta magnam reprehenderit ratione dolore inventore laudantium eos voluptates consectetur sit esse ullam hic exercitationem. Minima eligendi cupiditate beatae vitae, expedita quasi magni, quaerat consectetur distinctio harum architecto praesentium.', 'primary', '3', 'judul', 'Tanggapan', 0, '2021-03-22 16:58:38', '2021-03-22 16:58:38'),
(6, 'Ilham Magfiro', '1234567890123456', 'Pengaduan Anda Telah diverifikasi, Mohon Tunggu Tanggapan dari Pengaduan Anda :)', 'success', '4', 'kartini', 'Verifikasi', 0, '2021-04-11 19:20:24', '2021-04-11 19:20:24'),
(7, 'Ilham Magfiro', '1234567890123456', '================  Fitur user ================\r\n\r\n 1. login & registrasi (localhost:8000/login)\r\n 2. Dashboard (localhost:8000/user)\r\n 3. Mails (localhost:8000/mails)\r\n 4. Pengaduan (localhost:8000/lapor)\r\n 5. Profile (localhost:8000/profile)\r\n 6. Logout\r\n\r\n================  Fitur admin ================', 'primary', '4', 'kartini', 'Tanggapan', 0, '2021-04-11 19:20:32', '2021-04-11 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_08_080344_create_admins_table', 1),
(5, '2021_03_09_003025_create_pengaduan_table', 1),
(6, '2021_03_09_100304_add_anonim_to_pengaduan_table', 1),
(7, '2021_03_11_062242_create_tanggapan_table', 1),
(8, '2021_03_13_051042_add_field_to_admins_table', 1),
(9, '2021_03_13_152951_create_activity_table', 1),
(10, '2021_03_19_015050_create_mails_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `wilayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','proses','selesai') COLLATE utf8mb4_unicode_ci NOT NULL,
  `lampiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anonim` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nik`, `judul`, `tanggal`, `wilayah`, `isi`, `kategori`, `status`, `lampiran`, `anonim`, `created_at`, `updated_at`) VALUES
(3, '1234567890123456', 'judul', '2021-03-02', 'jatim', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta dolorem, quo molestias officia magni iure quibusdam? Harum, quae inventore et, esse itaque eveniet numquam, ex quas earum eaque dignissimos sit unde! Aliquid dolor soluta aperiam, magnam, ut animi officiis a voluptates ipsa saepe nemo debitis iste vitae earum, est id et doloremque quia nulla praesentium voluptas? Dolores, corporis? Aperiam provident numquam illum incidunt quisquam, alias cum dolores nihil consequuntur voluptatem perspiciatis soluta magnam reprehenderit ratione dolore inventore laudantium eos voluptates consectetur sit esse ullam hic exercitationem. Minima eligendi cupiditate beatae vitae, expedita quasi magni, quaerat consectetur distinctio harum architecto praesentium.', 'Corona virus', 'selesai', 'judul_tuOL.jpg', 0, '2021-03-22 07:58:50', '2021-03-22 16:58:37'),
(4, '1234567890123456', 'kartini', '2021-04-12', 'jatim', '================  Fitur user ================\r\n\r\n 1. login & registrasi (localhost:8000/login)\r\n 2. Dashboard (localhost:8000/user)\r\n 3. Mails (localhost:8000/mails)\r\n 4. Pengaduan (localhost:8000/lapor)\r\n 5. Profile (localhost:8000/profile)\r\n 6. Logout\r\n\r\n================  Fitur admin ================', 'Social Media', 'selesai', 'kartini_N41g.jpg', 0, '2021-04-11 19:19:53', '2021-04-11 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` bigint(20) UNSIGNED NOT NULL,
  `id_pengaduan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_petugas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `isi`, `id_petugas`, `created_at`, `updated_at`) VALUES
(2, '3', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta dolorem, quo molestias officia magni iure quibusdam? Harum, quae inventore et, esse itaque eveniet numquam, ex quas earum eaque dignissimos sit unde! Aliquid dolor soluta aperiam, magnam, ut animi officiis a voluptates ipsa saepe nemo debitis iste vitae earum, est id et doloremque quia nulla praesentium voluptas? Dolores, corporis? Aperiam provident numquam illum incidunt quisquam, alias cum dolores nihil consequuntur voluptatem perspiciatis soluta magnam reprehenderit ratione dolore inventore laudantium eos voluptates consectetur sit esse ullam hic exercitationem. Minima eligendi cupiditate beatae vitae, expedita quasi magni, quaerat consectetur distinctio harum architecto praesentium.', '1', '2021-03-22 16:58:38', '2021-03-22 16:58:38'),
(3, '4', '================  Fitur user ================\r\n\r\n 1. login & registrasi (localhost:8000/login)\r\n 2. Dashboard (localhost:8000/user)\r\n 3. Mails (localhost:8000/mails)\r\n 4. Pengaduan (localhost:8000/lapor)\r\n 5. Profile (localhost:8000/profile)\r\n 6. Logout\r\n\r\n================  Fitur admin ================', '2', '2021-04-11 19:20:32', '2021-04-11 19:20:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` char(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatar.png',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `username`, `password`, `telp`, `avatar`, `gender`, `alamat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '1234567890123456', 'Ilham Magfiro', 'ilhamm', '$2y$10$6TuQFN97dpW4vud31tP3iuqtE5YMIQvtjtynmmFxKKaKZY9NIgyaW', '082123456789', 'user_ilhamm.jpg', 'laki-laki', 'Pandaan', NULL, '2021-03-22 07:42:21', '2021-04-11 19:17:57'),
(2, '1234561234561234', 'Ilham Magfiro', 'ilham123', '$2y$10$6TuQFN97dpW4vud31tP3iuqtE5YMIQvtjtynmmFxKKaKZY9NIgyaW', NULL, 'avatar.png', NULL, NULL, NULL, '2021-04-11 19:04:42', '2021-04-11 19:04:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_act`);

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id_mail`);

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
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`),
  ADD UNIQUE KEY `tanggapan_id_pengaduan_unique` (`id_pengaduan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activity`
--
ALTER TABLE `activity`
  MODIFY `id_act` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mails`
--
ALTER TABLE `mails`
  MODIFY `id_mail` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
