-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2026 at 05:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_olahraga`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `penerima` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `kota` varchar(60) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `is_utama` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `penerima`, `no_hp`, `alamat_lengkap`, `kota`, `kode_pos`, `is_utama`) VALUES
(1, 2, 'Rina Pembeli', '081200000004', 'Jl. Merdeka No. 10', 'Jakarta', '10110', 1),
(2, 3, 'Dina Pembeli', '081200000005', 'Jl. Melati No. 5', 'Bandung', '40111', 1),
(4, 4, 'Satria Nugroho Klaten', '0812 3456 7890', 'Temuwangi, Pedan, Klaten', 'Klaten', '23450', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `qty` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(80) NOT NULL,
  `slug` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nama_kategori`, `slug`) VALUES
(1, 'Sepatu Olahraga', 'sepatu-olahraga'),
(2, 'Pakaian Olahraga', 'pakaian-olahraga'),
(3, 'Alat Fitness', 'alat-fitness'),
(4, 'Camping & Hiking', 'camping-hiking'),
(5, 'Aksesoriss', 'aksesoriss'),
(6, 'Bola', 'bola');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `recipient_key` varchar(100) NOT NULL,
  `recipient_type` varchar(20) NOT NULL,
  `source_key` varchar(150) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `pesan` text NOT NULL,
  `ikon` varchar(100) DEFAULT 'bi-bell',
  `warna` varchar(30) DEFAULT 'primary',
  `link` varchar(500) DEFAULT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `recipient_key`, `recipient_type`, `source_key`, `judul`, `pesan`, `ikon`, `warna`, `link`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 6, 'admin', 'admin', 'order:14:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan ORD-20261109101731493 menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(2, 6, 'admin', 'admin', 'order:13:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan ORD-20261109101648504 menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(3, 6, 'admin', 'admin', 'order:12:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan ORD-20261109101618670 menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(4, 6, 'admin', 'admin', 'order:4:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan ORD-20261106095153172 menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(5, 6, 'admin', 'admin', 'order:1:dikemas', 'Pesanan Perlu Diproses', 'Pesanan ORD-2611-001 sedang dalam tahap pengemasan.', 'bi-box-seam', 'info', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(6, 6, 'admin', 'admin', 'variant:4:low-stock:0', 'Stok Varian Menipis', 'Sepatu Lari Pria Cloudrun (43 / Biru) tersisa 0.', 'bi-exclamation-triangle', 'danger', 'http://127.0.0.1:8000/admin/stock-logs', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(7, 6, 'admin', 'admin', 'variant:3:low-stock:5', 'Stok Varian Menipis', 'Sepatu Lari Pria Cloudrun (42 / Biru) tersisa 5.', 'bi-exclamation-triangle', 'danger', 'http://127.0.0.1:8000/admin/stock-logs', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(8, 6, 'admin', 'admin', 'variant:5:low-stock:5', 'Stok Varian Menipis', 'Sepatu Futsal Speedkick (40 / Putih) tersisa 5.', 'bi-exclamation-triangle', 'danger', 'http://127.0.0.1:8000/admin/stock-logs', '2026-11-10 03:18:27', '2026-11-10 03:10:26', '2026-11-10 03:18:27'),
(9, 6, 'admin', 'admin', 'variant:6:low-stock:5', 'Stok Varian Menipis', 'Sepatu Futsal Speedkick (41 / Putih) tersisa 5.', 'bi-exclamation-triangle', 'danger', 'http://127.0.0.1:8000/admin/stock-logs', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(10, 6, 'admin', 'admin', 'variant:7:low-stock:5', 'Stok Varian Menipis', 'Sepatu Futsal Speedkick (42 / Merah) tersisa 5.', 'bi-exclamation-triangle', 'danger', 'http://127.0.0.1:8000/admin/stock-logs', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(11, 6, 'admin', 'admin', 'review:4', 'Ulasan Produk Baru', 'Produk Sepatu Futsal Speedkick mendapatkan rating 5 bintang.', 'bi-star', 'warning', 'http://127.0.0.1:8000/products/2', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(12, 6, 'admin', 'admin', 'review:3', 'Ulasan Produk Baru', 'Produk Bola Sepak Specs Ruma FB Training Ball mendapatkan rating 5 bintang.', 'bi-star', 'warning', 'http://127.0.0.1:8000/products/11', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(13, 6, 'admin', 'admin', 'review:2', 'Ulasan Produk Baru', 'Produk Bola Sepak Specs Ruma FB Training Ball mendapatkan rating 5 bintang.', 'bi-star', 'warning', 'http://127.0.0.1:8000/products/11', '2026-11-10 03:18:38', '2026-11-10 03:10:26', '2026-11-10 03:18:38'),
(14, 6, 'admin', 'admin', 'review:1', 'Ulasan Produk Baru', 'Produk Bola Sepak Specs Ruma FB Training Ball mendapatkan rating 5 bintang.', 'bi-star', 'warning', 'http://127.0.0.1:8000/products/11', '2026-11-10 03:18:19', '2026-11-10 03:10:26', '2026-11-10 03:18:19'),
(99, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(100, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(101, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(102, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(103, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(104, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(105, NULL, 'guest:oaFuIIvl2JdP87KinOnKjV0VxbSwdKJn7C4nmcmi', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', '2026-11-10 03:28:51', '2026-11-10 03:28:44', '2026-11-10 03:28:51'),
(113, 4, 'customer:4', 'customer', 'order:14:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261109101731493.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/14', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(114, 4, 'customer:4', 'customer', 'order:13:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261109101648504.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/13', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(115, 4, 'customer:4', 'customer', 'order:12:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261109101618670.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/12', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(116, 4, 'customer:4', 'customer', 'order:11:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261109043922522 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/11', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(117, 4, 'customer:4', 'customer', 'order:10:customer:ditolak', 'Pembayaran Ditolak', 'Pesanan ORD-20261109043811620 ditolak. Silakan periksa detail pesanan.', 'bi-x-circle', 'danger', 'http://127.0.0.1:8000/customer/orders/10', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(118, 4, 'customer:4', 'customer', 'order:9:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261109034904928 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/9', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(119, 4, 'customer:4', 'customer', 'order:8:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261109032628187 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/8', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(120, 4, 'customer:4', 'customer', 'order:7:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261107034913321 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/7', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(121, 4, 'customer:4', 'customer', 'order:6:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261106130446760 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/6', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(122, 4, 'customer:4', 'customer', 'order:5:customer:ditolak', 'Pembayaran Ditolak', 'Pesanan ORD-20261106095432269 ditolak. Silakan periksa detail pesanan.', 'bi-x-circle', 'danger', 'http://127.0.0.1:8000/customer/orders/5', '2026-11-10 03:29:20', '2026-11-10 03:29:04', '2026-11-10 03:29:20'),
(133, 4, 'customer:4', 'customer', 'order:15:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261110102939699.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/15', '2026-11-10 03:45:41', '2026-11-10 03:29:43', '2026-11-10 03:45:41'),
(153, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(154, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(155, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(156, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(157, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(158, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(159, NULL, 'guest:DKwB8riOOPbohLn8KPmQJmmRc3pFpOI2tOGCir36', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:32:15', '2026-11-10 03:32:15'),
(160, 6, 'admin', 'admin', 'order:15:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan ORD-20261110102939699 menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:32:28', '2026-11-10 03:32:23', '2026-11-10 03:32:28'),
(190, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(191, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(192, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(193, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(194, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(195, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(196, NULL, 'guest:YRKUtsTf1djDEYuZDFAdzkHULJKtmwbYwBqR8t5u', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:44:27', '2026-11-10 03:44:27'),
(207, NULL, 'admin', 'admin', 'order:16:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261110104446741 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:46:07', '2026-11-10 03:44:46', '2026-11-10 03:46:07'),
(208, 4, 'customer:4', 'customer', 'order:16:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261110104446741.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/16', '2026-11-10 03:44:59', '2026-11-10 03:44:50', '2026-11-10 03:44:59'),
(228, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(229, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(230, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(231, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(232, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(233, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(234, NULL, 'guest:TirL3PvlYrROnry45EsQ1zIGX7BbDpbTC5p37feb', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:45:56', '2026-11-10 03:45:56'),
(280, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(281, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(282, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(283, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(284, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(285, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(286, NULL, 'guest:yRSTrmQ4il2gzURlTr0MdJVY4g6sanuq73qITCgm', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:56:48', '2026-11-10 03:56:48'),
(297, NULL, 'admin', 'admin', 'order:17:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261110105720464 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 03:58:50', '2026-11-10 03:57:20', '2026-11-10 03:58:50'),
(298, 4, 'customer:4', 'customer', 'order:17:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261110105720464.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/17', '2026-11-10 03:57:28', '2026-11-10 03:57:20', '2026-11-10 03:57:28'),
(319, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(320, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(321, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(322, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(323, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(324, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(325, NULL, 'guest:flRkilZv1kCYj7lHFWV0fU01u1iHAeD4nU7M5wKC', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:58:18', '2026-11-10 03:58:18'),
(356, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(357, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(358, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(359, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(360, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(361, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(362, NULL, 'guest:nBaMc9FKKTJdBLk9HpODTWBEQvMPkOnQODIUU3px', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 03:59:17', '2026-11-10 03:59:17'),
(373, 4, 'customer:4', 'customer', 'order:17:customer:pembayaran-diperiksa', 'Pembayaran Sedang Diperiksa', 'Bukti pembayaran pesanan ORD-20261110105720464 sedang menunggu verifikasi admin.', 'bi-hourglass-split', 'info', 'http://127.0.0.1:8000/customer/orders/17', '2026-11-10 04:02:30', '2026-11-10 03:59:59', '2026-11-10 04:02:30'),
(383, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(384, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(385, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(386, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(387, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(388, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(389, NULL, 'guest:og1gbDox6BxtXPzrSbMMDyEuzVRg7iGQQ6ElMNBh', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:00:20', '2026-11-10 04:00:20'),
(395, 6, 'admin', 'admin', 'order:17:bukti-pembayaran', 'Bukti Pembayaran Masuk', 'Periksa pembayaran pesanan ORD-20261110105720464.', 'bi-credit-card', 'primary', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 04:00:34', '2026-11-10 04:00:29', '2026-11-10 04:00:34'),
(411, 6, 'admin', 'admin', 'order:17:dikemas', 'Pesanan Perlu Diproses', 'Pesanan ORD-20261110105720464 sedang dalam tahap pengemasan.', 'bi-box-seam', 'info', 'http://127.0.0.1:8000/admin/orders', '2026-11-10 04:01:22', '2026-11-10 04:01:10', '2026-11-10 04:01:22'),
(437, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(438, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(439, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(440, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(441, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(442, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(443, NULL, 'guest:VAFkTQUxrNfsjWs0ZSNr62usyFzo94IAEPxiWpBE', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:01:51', '2026-11-10 04:01:51'),
(444, 4, 'customer:4', 'customer', 'order:17:customer:dikirim', 'Pesanan Sedang Dikirim', 'Pesanan ORD-20261110105720464 sedang dalam perjalanan.', 'bi-truck', 'info', 'http://127.0.0.1:8000/customer/orders/17', '2026-11-10 04:02:03', '2026-11-10 04:01:59', '2026-11-10 04:02:03'),
(474, 4, 'customer:4', 'customer', 'order:17:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261110105720464 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/17', '2026-11-10 04:03:21', '2026-11-10 04:03:18', '2026-11-10 04:03:21'),
(494, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(495, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(496, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(497, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(498, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(499, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(500, NULL, 'guest:FDdauaYr6Uttn4z2E3T1lhSN0DBk1WQTuE4oR9mg', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 04:07:23', '2026-11-10 04:07:23'),
(531, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(532, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(533, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(534, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(535, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(536, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(537, NULL, 'guest:XcLumq7MEBU92xoxRo8osIvMxTlxY7k51HHNOpO7', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 09:04:06', '2026-11-10 09:04:06'),
(538, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(539, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(540, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(541, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(542, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(543, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(544, NULL, 'guest:RFa3QJmxg50AfzLXg2NU5q0aqxL5JvCM3bAgeMnZ', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 09:08:45', '2026-11-10 09:08:45'),
(665, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(666, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(667, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(668, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(669, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(670, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(671, NULL, 'guest:crbMvEswFGXeHJ0Dm3Kt6BjveAaJfqkBanLo6dyj', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 21:32:10', '2026-11-10 21:32:10'),
(732, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(733, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(734, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(735, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(736, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(737, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(738, NULL, 'guest:Azny3Bv2HQrX4Pn9RaMbNgSINtS0IEb6WmH0NoQL', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA25 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 21:51:28', '2026-11-10 21:51:28'),
(1326, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1327, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1328, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1329, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1330, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1331, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1332, NULL, 'guest:hogBR5S990JVUlnH9oxImwlqAFzHHs7yYvznYsXu', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-10 23:50:43', '2026-11-10 23:50:43'),
(1373, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1374, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1375, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1376, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1377, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1378, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1379, NULL, 'guest:vWQ9Opvr02fueR11NK65y4czeJ8DkJqsiAVFRqla', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:03:51', '2026-11-11 00:03:51'),
(1395, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1396, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1397, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1398, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1399, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1400, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1401, NULL, 'guest:Ic3UFcZQbauNR1ElVguFBGo2MPP7rkgtvTbYYJaq', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:11:49', '2026-11-11 00:11:49'),
(1432, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1433, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1434, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1435, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1436, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1437, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1438, NULL, 'guest:nlRsyEZ2RBgRy9lEcqF1e1WLsjSwcrarlBKMTcwy', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:21:05', '2026-11-11 00:21:05'),
(1544, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1545, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1546, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1547, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1548, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1549, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1550, NULL, 'guest:ivynpte3XYzRELL2MIBPkY89fuhbP0VyXxGgigxU', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:35:25', '2026-11-11 00:35:25'),
(1641, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1642, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1643, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1644, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1645, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1646, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1647, NULL, 'guest:ZoWHMv21gufWWWuFYsuoobkCAezhpJ9LLS1IEeIa', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 00:46:21', '2026-11-11 00:46:21'),
(1725, NULL, 'admin', 'admin', 'order:18:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111075508644 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 00:55:08', '2026-11-11 00:55:08'),
(1726, 4, 'customer:4', 'customer', 'order:18:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111075508644.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/18', '2026-11-11 01:02:04', '2026-11-11 00:55:08', '2026-11-11 01:02:04'),
(1907, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51');
INSERT INTO `notifications` (`id`, `user_id`, `recipient_key`, `recipient_type`, `source_key`, `judul`, `pesan`, `ikon`, `warna`, `link`, `read_at`, `created_at`, `updated_at`) VALUES
(1908, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1909, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1910, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1911, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1912, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1913, NULL, 'guest:frYfp6jMxwJHBjrZGg6XEvVMrnleMNpL7ckA5s9b', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 01:45:51', '2026-11-11 01:45:51'),
(1999, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2000, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2001, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2002, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2003, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2004, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2005, NULL, 'guest:5nzbqGLsiaxwNnvhmotLFcgEKSbbzqGrIMPnsFE8', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 02:03:14', '2026-11-11 02:03:14'),
(2496, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2497, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2498, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2499, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2500, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2501, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2502, NULL, 'guest:sNRGyZ1npnNZAuB5aa4R7soYSldcMyMrud4I9DW7', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 03:33:45', '2026-11-11 03:33:45'),
(2685, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2686, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2687, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2688, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2689, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2690, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2691, NULL, 'guest:zUmRFkO8kB8QAeLwoR7MW1SCIUSnXVbigVmFexuX', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:20:44', '2026-11-11 04:20:44'),
(2702, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2703, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2704, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2705, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2706, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2707, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2708, NULL, 'guest:XFcshKenc5G6qGuF79lY7pbIYOYaC48r89LpOfh5', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:21:01', '2026-11-11 04:21:01'),
(2929, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2930, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2931, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2932, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2933, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2934, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2935, NULL, 'guest:RQ3aQk0ScEIhKfsq2HNKZuSlFjQrfYymPlcL3SGP', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:36:55', '2026-11-11 04:36:55'),
(2966, NULL, 'admin', 'admin', 'order:19:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111114159424 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 04:41:59', '2026-11-11 04:41:59'),
(2967, 4, 'customer:4', 'customer', 'order:19:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111114159424.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/19', '2026-11-11 04:58:07', '2026-11-11 04:41:59', '2026-11-11 04:58:07'),
(2978, NULL, 'admin', 'admin', 'order:20:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111114446135 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 04:44:46', '2026-11-11 04:44:46'),
(2979, 4, 'customer:4', 'customer', 'order:20:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111114446135.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/20', '2026-11-11 04:58:07', '2026-11-11 04:44:46', '2026-11-11 04:58:07'),
(2990, NULL, 'admin', 'admin', 'order:21:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111115402964 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 04:54:02', '2026-11-11 04:54:02'),
(2991, 4, 'customer:4', 'customer', 'order:21:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111115402964.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/21', '2026-11-11 04:58:07', '2026-11-11 04:54:02', '2026-11-11 04:58:07'),
(3042, NULL, 'admin', 'admin', 'order:22:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111115754993 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 04:57:54', '2026-11-11 04:57:54'),
(3043, 4, 'customer:4', 'customer', 'order:22:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111115754993.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/22', '2026-11-11 04:58:07', '2026-11-11 04:57:54', '2026-11-11 04:58:07'),
(3074, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3075, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3076, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3077, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3078, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3079, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3080, NULL, 'guest:qWWivPgxn4P6W5h5Zq3P4PGTucqz4iNAO1mxMTSv', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 04:59:41', '2026-11-11 04:59:41'),
(3109, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3110, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3111, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3112, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3113, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3114, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3115, NULL, 'guest:WHC1gjKviRjrVgp7gHqtovx9WhI3IGWowI4JN8Gn', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:06:06', '2026-11-11 05:06:06'),
(3116, 4, 'customer:4', 'customer', 'order:22:customer:ditolak', 'Pembayaran Ditolak', 'Pesanan ORD-20261111115754993 ditolak. Silakan periksa detail pesanan.', 'bi-x-circle', 'danger', 'http://127.0.0.1:8000/customer/orders/22', '2026-11-11 08:38:04', '2026-11-11 05:06:18', '2026-11-11 08:38:04'),
(3126, NULL, 'admin', 'admin', 'order:23:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111120655834 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 05:06:55', '2026-11-11 05:06:55'),
(3127, 4, 'customer:4', 'customer', 'order:23:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111120655834.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/23', '2026-11-11 08:38:04', '2026-11-11 05:06:55', '2026-11-11 08:38:04'),
(3138, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3139, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3140, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3141, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3142, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3143, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3144, NULL, 'guest:sNV21hF7sNgZHdjutalFyDTUWiVwEOJkIQbdpDU8', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:07:17', '2026-11-11 05:07:17'),
(3173, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3174, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3175, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3176, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3177, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3178, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3179, NULL, 'guest:C6PcY8rkNdD8R9Bk2LlHPtuzcjJJoJ5r8s2jmrlF', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:17:24', '2026-11-11 05:17:24'),
(3180, 4, 'customer:4', 'customer', 'order:23:customer:ditolak', 'Pembayaran Ditolak', 'Pesanan ORD-20261111120655834 ditolak. Silakan periksa detail pesanan.', 'bi-x-circle', 'danger', 'http://127.0.0.1:8000/customer/orders/23', '2026-11-11 08:38:04', '2026-11-11 05:17:31', '2026-11-11 08:38:04'),
(3190, NULL, 'admin', 'admin', 'order:24:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261111121750478 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-11 05:17:50', '2026-11-11 05:17:50'),
(3191, 4, 'customer:4', 'customer', 'order:24:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261111121750478.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/24', '2026-11-11 08:38:04', '2026-11-11 05:17:50', '2026-11-11 08:38:04'),
(3202, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3203, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3204, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3205, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3206, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3207, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3208, NULL, 'guest:wS2Oz6nc5uae99QAkulcievkoTFcJGCJYm3cz9td', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:17:59', '2026-11-11 05:17:59'),
(3223, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3224, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3225, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3226, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3227, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3228, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3229, NULL, 'guest:fOd3cbD3j8Rs68bvSYxqtKrgcxJApHoYgtsULfdS', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:18:46', '2026-11-11 05:18:46'),
(3258, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3259, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3260, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3261, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3262, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3263, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3264, NULL, 'guest:XUpPevBGeTbBaPqdfa21xX500NaW2fhz6HjEj8M0', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:25:44', '2026-11-11 05:25:44'),
(3279, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3280, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3281, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3282, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3283, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3284, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3285, NULL, 'guest:5jOmeZx5xyzTr773vU7W1lgvc2plEKYOCmYmV2XC', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:44:34', '2026-11-11 05:44:34'),
(3300, 4, 'customer:4', 'customer', 'order:24:customer:ditolak', 'Pembayaran Ditolak', 'Pesanan ORD-20261111121750478 ditolak. Silakan periksa detail pesanan.', 'bi-x-circle', 'danger', 'http://127.0.0.1:8000/customer/orders/24', '2026-11-11 08:38:04', '2026-11-11 05:47:53', '2026-11-11 08:38:04'),
(3310, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3311, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3312, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3313, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3314, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3315, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3316, NULL, 'guest:uhpZhStFYId5snPMd5p9Pk5HQ36ilEX12STRQvJc', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 05:52:11', '2026-11-11 05:52:11'),
(3317, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3318, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3319, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3320, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3321, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3322, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3323, NULL, 'guest:G146BSazIKjhSfErB34FIhmdNVd6MomZyDuwkADM', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 06:18:26', '2026-11-11 06:18:26'),
(3338, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3339, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3340, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3341, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3342, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3343, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3344, NULL, 'guest:95NE6Ne0SnXcYpklvVO9YZmUyEPrN9jRs9c96leu', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 06:19:24', '2026-11-11 06:19:24'),
(3352, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3353, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3354, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3355, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3356, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3357, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3358, NULL, 'guest:CMGsvLelaUbKUcR3kW94U0458uwrVMisRoWckQfr', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:29:40', '2026-11-11 08:29:40'),
(3359, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3360, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3361, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3362, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3363, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3364, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3365, NULL, 'guest:Jry6RhsiCwInIGdDDT26Tes4q7wMwcrb4zlPQyeb', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:29:41', '2026-11-11 08:29:41'),
(3485, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3486, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3487, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3488, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3489, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3490, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3491, NULL, 'guest:WCtYxrp5J9TtLAEnTtoeGfcdi1EXnCeJJbFyWTlw', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:37:42', '2026-11-11 08:37:42'),
(3562, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3563, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3564, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3565, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3566, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3567, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3568, NULL, 'guest:GBNaRwxgkyA6EJQxOGbIU532h3APSBJol4a02d9v', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 08:47:07', '2026-11-11 08:47:07'),
(3597, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3598, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3599, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3600, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3601, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3602, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3603, NULL, 'guest:Ju4MFRJc6AkpPLs1NjXckHxEHFzrBPE0PL0yphDG', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:08', '2026-11-11 19:09:08'),
(3604, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3605, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3606, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3607, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3608, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3609, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3610, NULL, 'guest:eqvZ2DCBI72VRMjrz0uMKiGW1twikAVtugBVMp88', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:12', '2026-11-11 19:09:12'),
(3611, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3612, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58');
INSERT INTO `notifications` (`id`, `user_id`, `recipient_key`, `recipient_type`, `source_key`, `judul`, `pesan`, `ikon`, `warna`, `link`, `read_at`, `created_at`, `updated_at`) VALUES
(3613, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3614, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3615, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3616, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3617, NULL, 'guest:yfAGWkIDn7wS5rfECDiDMga4yPi7puAenOca0syq', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:09:58', '2026-11-11 19:09:58'),
(3632, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3633, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3634, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3635, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3636, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3637, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3638, NULL, 'guest:WQ8LiQU0SmPViZtm2noVnJmHNx6C0aZYlZgZZsxz', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:10:14', '2026-11-11 19:10:14'),
(3669, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3670, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3671, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3672, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3673, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3674, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3675, NULL, 'guest:qxVGvVqLxF53dCeHYUS2OPaBRq06paH5JDBINvDt', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-11 19:11:08', '2026-11-11 19:11:08'),
(3816, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-12 08:16:37', '2026-11-12 08:16:37'),
(3817, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-12 08:16:37', '2026-11-12 08:16:37'),
(3818, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-12 08:16:37', '2026-11-12 08:16:37'),
(3819, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-12 08:16:37', '2026-11-12 08:16:37'),
(3820, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-12 08:16:37', '2026-11-12 08:16:37'),
(3821, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:16:38', '2026-11-12 08:16:38'),
(3822, NULL, 'guest:fc4obFPmuNtbVPsFJddfUKbPjvDdExKOohBt5tMf', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:16:38', '2026-11-12 08:16:38'),
(3823, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3824, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3825, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3826, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3827, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3828, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3829, NULL, 'guest:DJfdB0FbDN2EZNFvyf84WQaKOtGYtRNonMnr1zn0', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:16:42', '2026-11-12 08:16:42'),
(3858, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3859, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3860, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3861, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3862, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3863, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3864, NULL, 'guest:GgrTcUyHxC48I1uYFyrRGHij7WHRje7kRYIz4kCR', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-12 08:29:15', '2026-11-12 08:29:15'),
(3865, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3866, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3867, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3868, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3869, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3870, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3871, NULL, 'guest:XUW1jMoEWyVQaNDiFu7oxOs9fEg2DdBJ4oc6et4I', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-13 00:04:19', '2026-11-13 00:04:19'),
(3872, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3873, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3874, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3875, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3876, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3877, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3878, NULL, 'guest:zIP707wnjNtps8qFdsebhnKC8LkwLTLECS7w44cS', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-13 00:04:23', '2026-11-13 00:04:23'),
(3970, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3971, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3972, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3973, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3974, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3975, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3976, NULL, 'guest:VKHKoB4qb5HFFmaMyZXhq1Mub0G04M8i0jVBXS47', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-14 20:29:31', '2026-11-14 20:29:31'),
(3987, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3988, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3989, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3990, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3991, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3992, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(3993, NULL, 'guest:D1tJ0OR9qFaHJ6paHCdmLVjVmrWlmAXkZufu0oiv', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-14 20:30:00', '2026-11-14 20:30:00'),
(4008, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4009, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4010, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4011, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4012, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4013, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4014, NULL, 'guest:UxyAai961nUgnYHpj9lkNFkHOKEW5svSwxxm3uf3', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:24:41', '2026-11-17 20:24:41'),
(4055, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4056, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4057, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4058, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4059, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4060, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4061, NULL, 'guest:q9brIbsFBhRqebCXDVB6FAhGoh72U0p1EvtMUDj9', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', '2026-11-17 20:30:17', '2026-11-17 20:26:13', '2026-11-17 20:30:17'),
(4143, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4144, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4145, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4146, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4147, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4148, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4149, NULL, 'guest:BmEKEdlCElC5FlkuWURGFPXOZNWVCeqnA96laaqg', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:33:19', '2026-11-17 20:33:19'),
(4164, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4165, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4166, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4167, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4168, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4169, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4170, NULL, 'guest:PjpZPUSfOc4uWROGygix4VXW5PSeN2ovh7EbRUfi', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:35:55', '2026-11-17 20:35:55'),
(4201, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4202, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4203, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4204, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4205, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4206, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4207, NULL, 'guest:DrPwog7sPcFngmTw2WWN3ZaJuFGbfOao1JYtjkjv', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:42:30', '2026-11-17 20:42:30'),
(4250, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4251, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4252, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4253, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4254, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4255, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4256, NULL, 'guest:8KbJ5BH6qvwbJViVJS15G5Tc1PUK5T3pJg9WA40e', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:48:59', '2026-11-17 20:48:59'),
(4257, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4258, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4259, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4260, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4261, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4262, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4263, NULL, 'guest:QnvB5sAPLIgWIaMEsAB6jWw095BeasdcyucY55I3', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:50:24', '2026-11-17 20:50:24'),
(4390, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4391, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4392, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4393, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4394, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4395, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4396, NULL, 'guest:ay34giwZc12cwiuFI2xwDJ8CgLad8U6w8MZe7eEc', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 20:55:31', '2026-11-17 20:55:31'),
(4432, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4433, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4434, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4435, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4436, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4437, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4438, NULL, 'guest:FMp8jNUUK0V0OlUkB6wS8K6dlCQir0DGBvL3MfCR', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:18:10', '2026-11-17 21:18:10'),
(4523, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4524, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4525, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4526, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4527, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4528, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4529, NULL, 'guest:VZx2rgfX2LnqONnH5JnCye72McjzYrsEPpnoQtAJ', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:43:18', '2026-11-17 21:43:18'),
(4558, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4559, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4560, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4561, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4562, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4563, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4564, NULL, 'guest:0d9WzGgO63sDneu9G0ZWwRIlhmN58HdDnAuH9oCy', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:52:11', '2026-11-17 21:52:11'),
(4585, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4586, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4587, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4588, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4589, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4590, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4591, NULL, 'guest:HjcDIZeGzzxbpAfQ9pYgyyEMQIWMj7y5l2f5TDsj', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 21:56:38', '2026-11-17 21:56:38'),
(4622, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4623, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4624, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4625, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4626, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4627, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4628, NULL, 'guest:OpILy046g3gPPpeij9ZvNaN2yCDBXj4Exb5fyZyF', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 22:00:25', '2026-11-17 22:00:25'),
(4643, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4644, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4645, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4646, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4647, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4648, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4649, NULL, 'guest:x81c8woS3pVNuiD1KNHzpE76IVFQpc3QPaqsfrLU', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 22:00:37', '2026-11-17 22:00:37'),
(4850, NULL, 'admin', 'admin', 'order:25:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261118055204339 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-17 22:52:04', '2026-11-17 22:52:04'),
(4851, 4, 'customer:4', 'customer', 'order:25:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261118055204339.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/25', '2026-11-19 06:58:26', '2026-11-17 22:52:04', '2026-11-19 06:58:26'),
(4872, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4873, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4874, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4875, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4876, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4877, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4878, NULL, 'guest:vByzBsBAg3iv9liRoa3t6Bq5SOLlW4F5QWFRIcjr', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:02:56', '2026-11-17 23:02:56'),
(4921, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4922, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4923, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14');
INSERT INTO `notifications` (`id`, `user_id`, `recipient_key`, `recipient_type`, `source_key`, `judul`, `pesan`, `ikon`, `warna`, `link`, `read_at`, `created_at`, `updated_at`) VALUES
(4924, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4925, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4926, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4927, NULL, 'guest:1BTrkIUg2eFC8E5OsCFch2wJ4N6fOr1x44v9Gwhb', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:08:14', '2026-11-17 23:08:14'),
(4942, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4943, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4944, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4945, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4946, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4947, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4948, NULL, 'guest:R3LWSBKKpxCpH2wqkjzn9q501LsWQ4fb99HGWwi7', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:08:42', '2026-11-17 23:08:42'),
(4949, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4950, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4951, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4952, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4953, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4954, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4955, NULL, 'guest:MYEiF29mUt029Jq2tesbi8rd2gbxvsobrVPQLSTw', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:26:10', '2026-11-17 23:26:10'),
(4970, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4971, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4972, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4973, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4974, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4975, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(4976, NULL, 'guest:fmlAOGBiMCa4FIU5vQVcvcpIOVBpucfTCAGpIiF4', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-17 23:27:02', '2026-11-17 23:27:02'),
(5201, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5202, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5203, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5204, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5205, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5206, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5207, NULL, 'guest:ml1uhcJCSYYWIqrhBc0JqKQcTfAqD9xbfzI0KWnD', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 00:05:06', '2026-11-18 00:05:06'),
(5278, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5279, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5280, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5281, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5282, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5283, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5284, NULL, 'guest:2GhbfGq0GDicWmoFNQjNSJUkM8KisdNZxj62SSTv', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 00:10:15', '2026-11-18 00:10:15'),
(5285, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5286, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5287, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5288, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5289, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5290, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5291, NULL, 'guest:PIvZlfI774XsAeA9RiFFxN81eMQbKkNSkN8Xbxer', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:14:48', '2026-11-18 01:14:48'),
(5302, NULL, 'admin', 'admin', 'order:26:menunggu-pembayaran', 'Pesanan Baru', 'Pesanan baru dengan kode ORD-20261118081749273 berhasil dibuat dan menunggu pembayaran.', 'bi-cart', 'warning', 'http://127.0.0.1:8000/admin/orders', NULL, '2026-11-18 01:17:49', '2026-11-18 01:17:49'),
(5303, 4, 'customer:4', 'customer', 'order:26:customer:belum-bayar', 'Menunggu Pembayaran', 'Silakan selesaikan pembayaran pesanan ORD-20261118081749273.', 'bi-credit-card', 'warning', 'http://127.0.0.1:8000/customer/orders/26', '2026-11-18 01:18:52', '2026-11-18 01:17:49', '2026-11-18 01:18:52'),
(5314, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5315, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5316, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5317, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5318, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5319, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5320, NULL, 'guest:ZSyFYsVuU8HGXeC0zd3ShBJjvXDMvCMWAe68vDkR', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:20:19', '2026-11-18 01:20:19'),
(5335, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5336, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5337, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5338, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5339, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5340, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5341, NULL, 'guest:pnjdGe1anEBNHvBtgJ6H7J7P3j4WaiIKBSrOJMKa', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:23:07', '2026-11-18 01:23:07'),
(5356, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5357, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5358, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5359, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5360, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5361, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5362, NULL, 'guest:2nwEsz5XHS9pxopy1ymtT4SYDT3qUDPZez0BUjma', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:23:17', '2026-11-18 01:23:17'),
(5373, 4, 'customer:4', 'customer', 'order:26:customer:pembayaran-diperiksa', 'Pembayaran Sedang Diperiksa', 'Bukti pembayaran pesanan ORD-20261118081749273 sedang menunggu verifikasi admin.', 'bi-hourglass-split', 'info', 'http://127.0.0.1:8000/customer/orders/26', '2026-11-18 01:25:12', '2026-11-18 01:23:53', '2026-11-18 01:25:12'),
(5383, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5384, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5385, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5386, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5387, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5388, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5389, NULL, 'guest:3BHBFlhJPTfmGHQyQ0C0pxQTjVw3ugPR8R2h6Hsl', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGA2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:25:21', '2026-11-18 01:25:21'),
(5395, 6, 'admin', 'admin', 'order:26:bukti-pembayaran', 'Bukti Pembayaran Masuk', 'Periksa pembayaran pesanan ORD-20261118081749273.', 'bi-credit-card', 'primary', 'http://127.0.0.1:8000/admin/orders', '2026-11-18 01:25:39', '2026-11-18 01:25:30', '2026-11-18 01:25:39'),
(5432, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5433, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5434, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5435, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5436, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5437, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5438, NULL, 'guest:6CeGZtF93htB8THib873qamIyaDLF1maxydBiSZ4', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 01:34:18', '2026-11-18 01:34:18'),
(5439, 4, 'customer:4', 'customer', 'order:26:customer:dikirim', 'Pesanan Sedang Dikirim', 'Pesanan ORD-20261118081749273 sedang dalam perjalanan.', 'bi-truck', 'info', 'http://127.0.0.1:8000/customer/orders/26', '2026-11-18 01:34:43', '2026-11-18 01:34:34', '2026-11-18 01:34:43'),
(5449, 4, 'customer:4', 'customer', 'order:26:customer:selesai', 'Pesanan Selesai', 'Pesanan ORD-20261118081749273 telah selesai.', 'bi-check-circle', 'success', 'http://127.0.0.1:8000/customer/orders/26', '2026-11-18 01:35:38', '2026-11-18 01:35:33', '2026-11-18 01:35:38'),
(5459, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5460, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5461, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5462, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5463, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5464, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5465, NULL, 'guest:dvxfgOIUXW1RH9T1kBA6PzbWZWyqHedc77zKv2Gv', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:58:09', '2026-11-18 04:58:09'),
(5466, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5467, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5468, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5469, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5470, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5471, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5472, NULL, 'guest:KS45UPlxdAPHKB52kgG5I4OlJOl61oA9bqZ3spXZ', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:58:10', '2026-11-18 04:58:10'),
(5505, 6, 'admin', 'admin', 'review:5', 'Ulasan Produk Baru', 'Produk Botol Minum Sport 1 Liter mendapatkan rating 5 bintang.', 'bi-star', 'warning', 'http://127.0.0.1:8000/products/9', NULL, '2026-11-18 04:59:00', '2026-11-18 04:59:00'),
(5508, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5509, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5510, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5511, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5512, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5513, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5514, NULL, 'guest:whmaHceKllvFH7xpPAbDoy8jhTkmbvM22WntOvw2', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 04:59:06', '2026-11-18 04:59:06'),
(5607, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5608, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5609, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5610, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5611, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5612, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5613, NULL, 'guest:gLJVkUIgkXzRJZpcgaZZqWPQKiz5irrv0AkcxZ3J', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:48:28', '2026-11-18 05:48:28'),
(5679, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5680, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5681, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5682, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5683, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5684, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5685, NULL, 'guest:6aR4TQtve2JV26xBDhPmj1u9Pq5bc8qxTbXYwwI4', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:51:48', '2026-11-18 05:51:48'),
(5686, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5687, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5688, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5689, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5690, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5691, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5692, NULL, 'guest:A3iUMuTfrTQn2qeUG7OhpcCphebkc4zRXanrti23', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 05:52:04', '2026-11-18 05:52:04'),
(5693, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5694, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5695, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5696, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5697, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5698, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5699, NULL, 'guest:2okkexRvlAOsrw7NeitvENyP7Bv7plU7XydWZsHt', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:06:06', '2026-11-18 06:06:06'),
(5700, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5701, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5702, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5703, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5704, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5705, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5706, NULL, 'guest:3kXT7Dy0F8VLuztQznE6SZMrFwMjSJB8pSB3Ckhe', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:11:22', '2026-11-18 06:11:22'),
(5733, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5734, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5735, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5736, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5737, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5738, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5739, NULL, 'guest:b5fvM1Y5rfEzKWuu29wjA4tZYCiwVSErS096jgTU', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-18 06:11:57', '2026-11-18 06:11:57'),
(5747, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5748, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5749, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5750, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5751, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5752, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5753, NULL, 'guest:5VptqpUtUpvH1eVovRc8upADawcBdUM8qpcpHcaI', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:29:05', '2026-11-19 06:29:05'),
(5754, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5755, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5756, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5757, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5758, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5759, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5760, NULL, 'guest:NdZ8qzCzk34aUeAmZjpHLlV5GVuqO9vZd5JgEZDA', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:29:08', '2026-11-19 06:29:08'),
(5820, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5821, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5822, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5823, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5824, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5825, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5826, NULL, 'guest:vrmmhSWtsQJKItymINTufQdxuC0AvsTyDbt6qEsC', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:57:27', '2026-11-19 06:57:27'),
(5847, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 06:58:58', '2026-11-19 06:58:58'),
(5848, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59'),
(5849, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59'),
(5850, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59'),
(5851, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59'),
(5852, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59');
INSERT INTO `notifications` (`id`, `user_id`, `recipient_key`, `recipient_type`, `source_key`, `judul`, `pesan`, `ikon`, `warna`, `link`, `read_at`, `created_at`, `updated_at`) VALUES
(5853, NULL, 'guest:WMtVj19XXVgQgZgv1KCHMj5Z7LnabquGlyLRPgHe', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:58:59', '2026-11-19 06:58:59'),
(5880, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5881, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5882, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5883, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5884, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5885, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5886, NULL, 'guest:9ygbeIzieBNU1GWa22ECETX8ZGNX4LlmeZpvdH8S', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 06:59:58', '2026-11-19 06:59:58'),
(5917, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5918, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5919, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5920, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5921, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5922, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5923, NULL, 'guest:QDsYrDlKQNS80kwIZHHqLsGZCZKz1VAVY5MkajOd', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:10:53', '2026-11-19 07:10:53'),
(5924, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5925, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5926, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5927, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5928, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5929, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5930, NULL, 'guest:ianOHAw4Fhiz5OR2izHxu4K1H9Lxa3vpMas8C3mc', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:25:28', '2026-11-19 07:25:28'),
(5931, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5932, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5933, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5934, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5935, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5936, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(5937, NULL, 'guest:pwYgWjbUMxsWyYWAgo51JB5iwdx9lPMcF9MQJKVi', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:33:01', '2026-11-19 07:33:01'),
(6228, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6229, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6230, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6231, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6232, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6233, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6234, NULL, 'guest:1TSBcgz0PHLx8SALSZXsO5S7tcqYfTG3ImDakl5R', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 07:51:43', '2026-11-19 07:51:43'),
(6326, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6327, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6328, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6329, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6330, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6331, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6332, NULL, 'guest:GrD6twho6eGbltyj6LCx69nA2XifEZDLCinRdKi4', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 08:34:48', '2026-11-19 08:34:48'),
(6343, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6344, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6345, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6346, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6347, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6348, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6349, NULL, 'guest:r4GSN1Ey2T1MrYKFKc9T8xqBnoi9Ljt4VB0pBYXx', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-19 08:44:47', '2026-11-19 08:44:47'),
(6363, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6364, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6365, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6366, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6367, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6368, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6369, NULL, 'guest:MXchGnOzs6vbpfeV26DEyt5iGgwmEE45fhihZWim', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:48:52', '2026-11-20 08:48:52'),
(6370, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6371, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6372, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6373, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6374, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6375, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6376, NULL, 'guest:4QsoJd6BOBmmmMlJ2kEkZNMEZR7x9Gjf0kwLZl02', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:48:55', '2026-11-20 08:48:55'),
(6384, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-product:11', 'Produk Terbaru', 'Lihat produk terbaru kami: Bola Sepak Specs Ruma FB Training Ball.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/11', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6385, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-product:1', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Lari Pria Cloudrun.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/1', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6386, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-product:2', 'Produk Terbaru', 'Lihat produk terbaru kami: Sepatu Futsal Speedkick.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/2', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6387, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-product:3', 'Produk Terbaru', 'Lihat produk terbaru kami: Jersey Training Dry-Fit.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/3', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6388, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-product:4', 'Produk Terbaru', 'Lihat produk terbaru kami: Celana Training Panjang.', 'bi-box', 'primary', 'http://127.0.0.1:8000/products/4', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6389, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-voucher:1', 'Voucher Tersedia', 'Gunakan kode HEMAT10K untuk mendapatkan potongan Rp 10.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10'),
(6390, NULL, 'guest:vvA59KfGMhcifMDNERhsaNK1fctttfykgnCgqGCD', 'guest', 'guest-voucher:2', 'Voucher Tersedia', 'Gunakan kode OLAHRAGAJOS2026 untuk mendapatkan potongan Rp 25.000.', 'bi-ticket-perforated', 'success', 'http://127.0.0.1:8000', NULL, '2026-11-20 08:56:10', '2026-11-20 08:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `kode_order` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  `voucher_id` int(11) DEFAULT NULL,
  `subtotal` int(11) NOT NULL,
  `diskon` int(11) DEFAULT 0,
  `ongkir` int(11) DEFAULT 0,
  `total` int(11) NOT NULL,
  `metode_bayar` enum('transfer','cod','ewallet') DEFAULT 'transfer',
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `status` enum('menunggu_bayar','dikemas','dikirim','selesai','ditolak') DEFAULT 'menunggu_bayar',
  `resi` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `kode_order`, `user_id`, `address_id`, `voucher_id`, `subtotal`, `diskon`, `ongkir`, `total`, `metode_bayar`, `bukti_bayar`, `status`, `resi`, `created_at`) VALUES
(1, 'ORD-2611-001', 2, 1, NULL, 240000, 0, 15000, 255000, 'transfer', NULL, 'dikemas', NULL, '2026-11-01 03:00:00'),
(2, 'ORD-2611-002', 3, 2, NULL, 150000, 0, 15000, 165000, 'transfer', NULL, 'dikirim', 'JNE8820011', '2026-11-02 07:30:00'),
(3, 'ORD-2610-009', 2, 1, NULL, 275000, 0, 15000, 290000, 'transfer', NULL, 'selesai', 'JNT5500231', '2026-10-29 02:15:00'),
(4, 'ORD-20261106095153172', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-06 09:51:53'),
(5, 'ORD-20261106095432269', 4, 4, NULL, 544000, 0, 0, 544000, 'transfer', NULL, 'ditolak', NULL, '2026-11-06 09:54:32'),
(6, 'ORD-20261106130446760', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', 'bukti-pembayaran/88wbtqznqUZD4Iz0swPls4bqDrBd9n4Q6cF2ehlA.jpg', 'selesai', 'JNE578910', '2026-11-06 13:04:46'),
(7, 'ORD-20261107034913321', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', 'bukti-pembayaran/iInZ8pPe9VudonMlBElCH7eqSeFEXx1f4Ys0M1DE.jpg', 'selesai', 'JNT34521', '2026-11-07 03:49:13'),
(8, 'ORD-20261109032628187', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', 'bukti-pembayaran/KsQGHASuIU8J9Hq3JyqVPqlOIkYLPRqqznSBjQvK.jpg', 'selesai', 'JNE990123', '2026-11-09 03:26:28'),
(9, 'ORD-20261109034904928', 4, 4, NULL, 275000, 0, 0, 275000, 'transfer', 'bukti-pembayaran/npRLK3AbzMDaAjipfMEvcvYOl2LZwZZ1rCPnMM06.jpg', 'selesai', 'JNE123987', '2026-11-09 03:49:04'),
(10, 'ORD-20261109043811620', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'ditolak', NULL, '2026-11-09 04:38:11'),
(11, 'ORD-20261109043922522', 4, 4, NULL, 280000, 0, 0, 280000, 'transfer', 'bukti-pembayaran/NzQQfdX7Vgb7JwHzaY5hvur04xohrVE95mChUpAj.jpg', 'selesai', 'JTR12345', '2026-11-09 04:39:22'),
(12, 'ORD-20261109101618670', 4, 4, NULL, 350000, 0, 0, 350000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-09 10:16:18'),
(13, 'ORD-20261109101648504', 4, 4, NULL, 350000, 0, 0, 350000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-09 10:16:48'),
(14, 'ORD-20261109101731493', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-09 10:17:31'),
(15, 'ORD-20261110102939699', 4, 4, NULL, 150000, 0, 0, 150000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-10 10:29:39'),
(16, 'ORD-20261110104446741', 4, 4, NULL, 350000, 0, 0, 350000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-10 10:44:46'),
(17, 'ORD-20261110105720464', 4, 4, NULL, 350000, 0, 0, 350000, 'transfer', 'bukti-pembayaran/8FovczwH5Am1V1hDAztdXAS2hYCjdHSMksD9Rt2Z.jpg', 'selesai', 'JNT124578', '2026-11-10 10:57:20'),
(18, 'ORD-20261111075508644', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-11 07:55:08'),
(19, 'ORD-20261111114159424', 4, 4, 2, 420000, 25000, 0, 395000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-11 11:41:59'),
(20, 'ORD-20261111114446135', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-11 11:44:46'),
(21, 'ORD-20261111115402964', 4, 4, NULL, 45000, 0, 0, 45000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-11 11:54:02'),
(22, 'ORD-20261111115754993', 4, 4, NULL, 150000, 0, 0, 150000, 'transfer', NULL, 'ditolak', NULL, '2026-11-11 11:57:54'),
(23, 'ORD-20261111120655834', 4, 4, NULL, 85000, 0, 0, 85000, 'cod', NULL, 'ditolak', NULL, '2026-11-11 12:06:55'),
(24, 'ORD-20261111121750478', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'ditolak', NULL, '2026-11-11 12:17:50'),
(25, 'ORD-20261118055204339', 4, 4, NULL, 499000, 0, 0, 499000, 'transfer', NULL, 'menunggu_bayar', NULL, '2026-11-18 05:52:04'),
(26, 'ORD-20261118081749273', 4, 4, NULL, 45000, 0, 0, 45000, 'transfer', 'bukti-pembayaran/lrqwlO3idE0qIN0XbETDbgtiKJKniDnfWRygBlFM.jpg', 'selesai', 'JTR2345', '2026-11-18 08:17:49');

--
-- Triggers `orders`
--
DELIMITER $$
CREATE TRIGGER `trg_riwayat_status_pesanan` AFTER UPDATE ON `orders` FOR EACH ROW BEGIN

    IF NOT (NEW.status <=> OLD.status) THEN

        INSERT INTO order_status_history (
            order_id,
            status,
            created_at
        )
        VALUES (
            NEW.id,
            NEW.status,
            NOW()
        );

    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `nama_produk` varchar(150) NOT NULL,
  `varian` varchar(60) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `variant_id`, `nama_produk`, `varian`, `qty`, `harga_satuan`) VALUES
(1, 1, 3, 9, 'Jersey Training Dry-Fit', 'L / Merah', 2, 120000),
(2, 2, 4, 11, 'Celana Training Panjang', 'M / Hitam', 1, 150000),
(3, 3, 2, 6, 'Sepatu Futsal Speedkick', '41 / Putih', 1, 275000),
(4, 4, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(5, 5, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(6, 5, 9, 21, 'Botol Minum Sport 1 Liter', '1L Biru', 1, 45000),
(7, 6, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(8, 7, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(9, 8, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(10, 9, 2, 5, 'Sepatu Futsal Speedkick', '40 Putih', 1, 275000),
(11, 10, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(12, 11, 2, 7, 'Sepatu Futsal Speedkick', '42 Merah', 1, 280000),
(13, 12, 1, 1, 'Sepatu Lari Pria Cloudrun', '40 Hitam', 1, 350000),
(14, 13, 1, 1, 'Sepatu Lari Pria Cloudrun', '40 Hitam', 1, 350000),
(15, 14, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(16, 15, 4, 11, 'Celana Training Panjang', 'M Hitam', 1, 150000),
(17, 16, 1, 1, 'Sepatu Lari Pria Cloudrun', '40 Hitam', 1, 350000),
(18, 17, 1, 1, 'Sepatu Lari Pria Cloudrun', '40 Hitam', 1, 350000),
(19, 18, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(20, 19, 8, 19, 'Tas Carrier 50L', '50L Hitam', 1, 420000),
(21, 20, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(22, 21, 9, 21, 'Botol Minum Sport 1 Liter', '1L Biru', 1, 45000),
(23, 22, 4, 12, 'Celana Training Panjang', 'L Abu-abu', 1, 150000),
(24, 23, 6, 15, 'Dumbbell Vinyl Set', '2kg', 1, 85000),
(25, 24, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(26, 25, 11, NULL, 'Bola Sepak Specs Ruma FB Training Ball', NULL, 1, 499000),
(27, 26, 9, 22, 'Botol Minum Sport 1 Liter', '1L Hitam', 1, 45000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status_history`
--

CREATE TABLE `order_status_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_status_history`
--

INSERT INTO `order_status_history` (`id`, `order_id`, `status`, `created_at`) VALUES
(1, 5, 'ditolak', '2026-11-06 12:49:24'),
(2, 6, 'dikemas', '2026-11-06 13:07:59'),
(3, 6, 'dikirim', '2026-11-06 13:33:31'),
(4, 6, 'selesai', '2026-11-07 03:06:58'),
(5, 7, 'dikemas', '2026-11-07 03:50:18'),
(6, 7, 'dikirim', '2026-11-07 03:50:30'),
(7, 7, 'selesai', '2026-11-07 03:51:07'),
(8, 8, 'dikemas', '2026-11-09 03:29:17'),
(9, 8, 'dikirim', '2026-11-09 03:29:31'),
(10, 8, 'selesai', '2026-11-09 03:31:44'),
(11, 9, 'dikemas', '2026-11-09 03:50:57'),
(12, 9, 'dikirim', '2026-11-09 03:51:09'),
(13, 9, 'selesai', '2026-11-09 03:51:58'),
(14, 1, 'dikemas', '2026-11-01 03:00:00'),
(15, 2, 'dikirim', '2026-11-02 07:30:00'),
(16, 3, 'selesai', '2026-10-29 02:15:00'),
(17, 4, 'menunggu_bayar', '2026-11-06 09:51:53'),
(21, 10, 'menunggu_bayar', '2026-11-08 21:38:11'),
(22, 11, 'menunggu_bayar', '2026-11-08 21:39:22'),
(23, 10, 'ditolak', '2026-11-09 04:40:42'),
(24, 11, 'dikemas', '2026-11-09 04:43:19'),
(25, 11, 'dikirim', '2026-11-09 04:44:07'),
(26, 11, 'selesai', '2026-11-09 04:45:34'),
(27, 12, 'menunggu_bayar', '2026-11-09 03:16:18'),
(28, 13, 'menunggu_bayar', '2026-11-09 03:16:48'),
(29, 14, 'menunggu_bayar', '2026-11-09 03:17:31'),
(30, 15, 'menunggu_bayar', '2026-11-10 03:29:39'),
(31, 16, 'menunggu_bayar', '2026-11-10 03:44:46'),
(32, 17, 'menunggu_bayar', '2026-11-10 03:57:20'),
(33, 17, 'dikemas', '2026-11-10 11:00:53'),
(34, 17, 'dikirim', '2026-11-10 11:01:35'),
(35, 17, 'selesai', '2026-11-10 11:03:13'),
(36, 18, 'menunggu_bayar', '2026-11-11 00:55:08'),
(37, 19, 'menunggu_bayar', '2026-11-11 04:41:59'),
(38, 20, 'menunggu_bayar', '2026-11-11 04:44:46'),
(39, 21, 'menunggu_bayar', '2026-11-11 04:54:02'),
(40, 22, 'menunggu_bayar', '2026-11-11 04:57:54'),
(41, 22, 'ditolak', '2026-11-11 12:05:42'),
(42, 23, 'menunggu_bayar', '2026-11-11 05:06:55'),
(43, 23, 'ditolak', '2026-11-11 12:17:05'),
(44, 24, 'menunggu_bayar', '2026-11-11 05:17:50'),
(45, 24, 'ditolak', '2026-11-11 12:18:33'),
(46, 25, 'menunggu_bayar', '2026-11-17 22:52:04'),
(47, 26, 'menunggu_bayar', '2026-11-18 01:17:49'),
(48, 26, 'dikemas', '2026-11-18 08:25:57'),
(49, 26, 'dikirim', '2026-11-18 08:26:13'),
(50, 26, 'selesai', '2026-11-18 08:34:56');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `merek` varchar(60) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_dasar` int(11) NOT NULL,
  `jenis_produk` enum('biasa','variasi') NOT NULL DEFAULT 'variasi',
  `stok` int(11) NOT NULL DEFAULT 0,
  `berat_gram` int(11) DEFAULT 500,
  `terjual` int(11) DEFAULT 0,
  `status` enum('aktif','nonaktif') DEFAULT 'aktif',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `nama`, `merek`, `deskripsi`, `harga_dasar`, `jenis_produk`, `stok`, `berat_gram`, `terjual`, `status`, `created_at`) VALUES
(1, 1, 'Sepatu Lari Pria Cloudrun', 'Ortus', 'Ringan, bantalan empuk.', 350000, 'variasi', 0, 800, 121, 'aktif', '2026-11-04 14:34:05'),
(2, 1, 'Sepatu Futsal Speedkick', 'Ortus', 'Sol karet anti slip.', 275000, 'variasi', 0, 700, 87, 'aktif', '2026-11-04 14:34:05'),
(3, 2, 'Jersey Training Dry-Fit', 'Kinetic', 'Bahan cepat kering.', 120000, 'variasi', 0, 250, 200, 'aktif', '2026-11-04 14:34:05'),
(4, 2, 'Celana Training Panjang', 'Kinetic', 'Nyaman untuk latihan.', 150000, 'variasi', 0, 350, 90, 'aktif', '2026-11-04 14:34:05'),
(5, 3, 'Matras Yoga 8mm', 'FitLife', 'Anti slip, tebal 8mm.', 95000, 'variasi', 0, 1000, 150, 'aktif', '2026-11-04 14:34:05'),
(6, 3, 'Dumbbell Vinyl Set', 'FitLife', 'Pilihan 2kg sampai 10kg.', 85000, 'variasi', 0, 2500, 60, 'aktif', '2026-11-04 14:34:05'),
(7, 4, 'Tenda Camping 4 Orang', 'Ridgeway', 'Waterproof, mudah dipasang.', 650000, 'variasi', 0, 4500, 40, 'aktif', '2026-11-04 14:34:05'),
(8, 4, 'Tas Carrier 50L', 'Ridgeway', 'Back system nyaman.', 420000, 'variasi', 0, 1600, 55, 'aktif', '2026-11-04 14:34:05'),
(9, 5, 'Botol Minum Sport 1 Liter', 'Hydra', 'Bebas BPA.', 55000, 'variasi', 0, 300, 311, 'aktif', '2026-11-04 14:34:05'),
(11, 6, 'Bola Sepak Specs Ruma FB Training Ball', 'SPECS', 'Bola Praktis dan Elegan', 499000, 'biasa', 9953, 500, 2, 'aktif', '2026-11-05 21:07:39');

--
-- Triggers `products`
--
DELIMITER $$
CREATE TRIGGER `trg_log_stok_produk` AFTER UPDATE ON `products` FOR EACH ROW BEGIN

    IF NEW.jenis_produk = 'biasa'
       AND NEW.stok <> OLD.stok THEN

        INSERT INTO stock_logs (
            product_id,
            variant_id,
            selisih,
            stok_akhir,
            created_at
        )
        VALUES (
            NEW.id,
            NULL,
            NEW.stok - OLD.stok,
            NEW.stok,
            NOW()
        );

    END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `is_utama` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `file_name`, `is_utama`) VALUES
(2, 9, 'products/2IEmgeHfhPLhSq6YcMQgQ7L8D6vm4Zy0Nf7ZUKG3.jpg', 1),
(3, 11, 'products/Z2CN5g8lKx6rQonE7S5CJxnAoEByNZIs6lMatKWi.jpg', 1),
(4, 2, 'products/GiWfhnCBeO0bjFt4T28kv2DRera3BZVoI9oRrrN3.jpg', 1),
(5, 1, 'products/tMr7lHNSfVR40BsCZCnEXYZ53WrUDS1BGzqR0c1u.jpg', 1),
(6, 8, 'products/GuMbAcF6EaHEScQwN0pRjg4Ws8dxVCXsSJjqbQzA.jpg', 1),
(7, 7, 'products/nBNAoSnPXC7RJwnausmf2Yfwu21fAYj4YyDFAmUR.jpg', 1),
(8, 6, 'products/LSnWzQk2lvNDD2K1TbiUbt6rb8WvvqA2E7vR32P1.jpg', 1),
(9, 4, 'products/epew6rnZWPrV2ClmOedbzNnXwyEM9zJ0PwrH6ejr.jpg', 1),
(10, 3, 'products/4etWrgP9ob347oC3Kk8IlGp4AEvI1OnUoGtmt1mv.jpg', 1),
(11, 5, 'products/D7DFiDb3sKx3sz5ImNp5EiIA6mBNVauvqdA4YaQr.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `warna` varchar(30) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0
) ;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `ukuran`, `warna`, `harga`, `stok`) VALUES
(1, 1, '40', 'Hitam', 350000, 6),
(2, 1, '41', 'Hitam', 350000, 8),
(3, 1, '42', 'Biru', 360000, 5),
(4, 1, '43', 'Biru', 360000, 0),
(5, 2, '40', 'Putih', 275000, 5),
(6, 2, '41', 'Putih', 275000, 5),
(7, 2, '42', 'Merah', 280000, 5),
(8, 3, 'M', 'Merah', 120000, 25),
(9, 3, 'L', 'Merah', 120000, 30),
(10, 3, 'XL', 'Hitam', 125000, 15),
(11, 4, 'M', 'Hitam', 150000, 19),
(12, 4, 'L', 'Abu-abu', 150000, 18),
(13, 5, '8mm', 'Ungu', 95000, 35),
(14, 5, '8mm', 'Hijau', 95000, 20),
(15, 6, '2kg', NULL, 85000, 25),
(16, 6, '5kg', NULL, 150000, 15),
(17, 6, '10kg', NULL, 260000, 8),
(18, 7, '4 Orang', 'Hijau', 650000, 7),
(19, 8, '50L', 'Hitam', 420000, 11),
(20, 8, '50L', 'Hijau', 420000, 9),
(21, 9, '1L', 'Biru', 55000, 49),
(22, 9, '1L', 'Hitam', 55000, 39);

--
-- Triggers `product_variants`
--
DELIMITER $$
CREATE TRIGGER `trg_log_stok` AFTER UPDATE ON `product_variants` FOR EACH ROW BEGIN
  IF NEW.stok <> OLD.stok THEN
    INSERT INTO stock_logs (variant_id, selisih, stok_akhir)
    VALUES (NEW.id, NEW.stok - OLD.stok, NEW.stok);
  END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `komentar` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `order_id`, `rating`, `komentar`, `created_at`) VALUES
(4, 2, 4, 9, 5, 'JOSJISS, ENAK BANGET SEPATUNYAA. BERKAH TERUS BUAT SPORT ZONE', '2026-11-08 20:52:37'),
(5, 9, 4, 26, 5, 'JOS, LANGGANAN DISINI POKOKNYAA', '2026-11-18 01:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `stock_logs`
--

CREATE TABLE `stock_logs` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `variant_id` int(11) DEFAULT NULL,
  `selisih` int(11) NOT NULL,
  `stok_akhir` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock_logs`
--

INSERT INTO `stock_logs` (`id`, `product_id`, `variant_id`, `selisih`, `stok_akhir`, `created_at`) VALUES
(1, NULL, 21, -1, 49, '2026-11-06 09:54:32'),
(2, NULL, 21, 1, 50, '2026-11-06 12:49:24'),
(3, NULL, 5, -1, 5, '2026-11-09 03:49:04'),
(4, 11, NULL, -1, 995, '2026-11-09 04:38:11'),
(5, NULL, 7, -1, 3, '2026-11-09 04:39:22'),
(6, 11, NULL, 1, 996, '2026-11-09 04:40:42'),
(7, NULL, 6, -4, 5, '2026-11-09 09:27:55'),
(8, NULL, 7, 2, 5, '2026-11-09 09:27:55'),
(9, NULL, 1, -1, 9, '2026-11-09 10:16:18'),
(10, NULL, 1, -1, 8, '2026-11-09 10:16:48'),
(11, 11, NULL, -1, 995, '2026-11-09 10:17:31'),
(12, NULL, 11, -1, 19, '2026-11-10 10:29:39'),
(13, NULL, 1, -1, 7, '2026-11-10 10:44:46'),
(14, NULL, 1, -1, 6, '2026-11-10 10:57:20'),
(15, 11, NULL, 8961, 9956, '2026-11-11 06:11:44'),
(16, 11, NULL, -1, 9955, '2026-11-11 07:55:08'),
(17, NULL, 19, -1, 11, '2026-11-11 11:41:59'),
(18, 11, NULL, -1, 9954, '2026-11-11 11:44:46'),
(19, NULL, 21, -1, 49, '2026-11-11 11:54:02'),
(20, NULL, 12, -1, 17, '2026-11-11 11:57:54'),
(21, NULL, 12, 1, 18, '2026-11-11 12:05:42'),
(22, NULL, 15, -1, 24, '2026-11-11 12:06:55'),
(23, NULL, 15, 1, 25, '2026-11-11 12:17:05'),
(24, 11, NULL, -1, 9953, '2026-11-11 12:17:50'),
(25, 11, NULL, 1, 9954, '2026-11-11 12:18:33'),
(26, 11, NULL, -1, 9953, '2026-11-18 05:52:04'),
(27, NULL, 22, -1, 39, '2026-11-18 08:17:49');

-- --------------------------------------------------------

--
-- Table structure for table `store_settings`
--

CREATE TABLE `store_settings` (
  `id` tinyint(4) NOT NULL DEFAULT 1,
  `nama_toko` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `kota` varchar(60) DEFAULT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `bank_nama` varchar(30) DEFAULT NULL,
  `bank_rekening` varchar(30) DEFAULT NULL,
  `bank_atas_nama` varchar(80) DEFAULT NULL,
  `ongkir_flat` int(11) DEFAULT 15000
) ;

--
-- Dumping data for table `store_settings`
--

INSERT INTO `store_settings` (`id`, `nama_toko`, `deskripsi`, `logo`, `kota`, `no_wa`, `bank_nama`, `bank_rekening`, `bank_atas_nama`, `ongkir_flat`) VALUES
(1, 'SportZone Official Store', 'Perlengkapan olahraga, fitness, dan outdoor lengkap.', 'store/YhtLxft7MItHVibUv8wStyrP4ISYCniH9uyGRNUJ.jpg', 'Klaten', '081200000001', 'BRI', '1234567890', 'Kelompok 11', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `role` enum('customer','admin') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `no_hp`, `foto`, `role`, `remember_token`, `created_at`) VALUES
(1, 'Budi (Pemilik Toko)', 'admin@sportzone.test', 'GANTI_HASH', '081200000001', NULL, 'admin', NULL, '2026-11-04 14:34:05'),
(2, 'Rina Pembeli', 'rina@sportzone.test', 'GANTI_HASH', '081200000004', NULL, 'customer', NULL, '2026-11-04 14:34:05'),
(3, 'Dina Pembeli', 'dina@sportzone.test', 'GANTI_HASH', '081200000005', NULL, 'customer', NULL, '2026-11-04 14:34:05'),
(4, 'azka', 'azkasatria2007@gmail.com', '$2y$12$RDiXk917eDnYXAKBMGQnzu05Y3wqiQn6X4L9wj/KhICuet4Ygj8qK', '085741854468', NULL, 'customer', NULL, '2026-11-05 00:19:54'),
(5, 'devin', 'devin2007@gmail.com', '$2y$12$VmxLC07OiF8lGOc.G6c8su/HGHTmsjTdBsTTRBJSpNlUsA.9OgqqC', '0895422394129', NULL, 'customer', NULL, '2026-11-05 00:37:19'),
(6, 'Admin SportZone', 'admin@sportzone.com', '$2y$12$6F4JGGvedSjOxskIBScQbeN/oQMFfKvNBZluiF7uJB/nKP.R..856', '081234567890', NULL, 'admin', NULL, '2026-11-05 00:58:54'),
(7, 'Hilmi', 'hilmi0123@gmail.com', '$2y$12$17fpQkbLxUBHM.5sSq03feokGnFrfD4EnnowMuLhCO2v2Tx5cMJQ2', '0895422394129', NULL, 'customer', NULL, '2026-11-11 05:51:32'),
(8, 'Azka Satria', 'satria2007@gmail.com', '$2y$12$yK8gR/WjJhfYynwOX96IjusZWaRU4UnT5WYH6AJgRPMKoQgiJOHje', NULL, NULL, 'customer', NULL, '2026-11-19 07:24:22'),
(9, 'customer', 'customer@gmail.com', '$2y$12$aqhdM41ZUt4YIq5QSLRFu.yXg25gosgtUpUnaZ/xW2F9JzI45QHIe', '08123456789', NULL, 'customer', NULL, '2026-11-20 09:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` int(11) NOT NULL,
  `kode` varchar(30) NOT NULL,
  `potongan` int(11) NOT NULL,
  `min_belanja` int(11) DEFAULT 0,
  `kuota` int(11) DEFAULT 100,
  `expired` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `kode`, `potongan`, `min_belanja`, `kuota`, `expired`) VALUES
(1, 'HEMAT10K', 10000, 100000, 100, '2026-12-31'),
(2, 'OLAHRAGAJOS2026', 25000, 300000, 49, '2026-12-31');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_katalog`
-- (See below for the actual view)
--
CREATE TABLE `v_katalog` (
`id` int(11)
,`nama` varchar(150)
,`merek` varchar(60)
,`harga_dasar` int(11)
,`terjual` int(11)
,`created_at` timestamp
,`nama_kategori` varchar(80)
,`slug` varchar(80)
,`rating_rata` decimal(5,1)
,`jumlah_ulasan` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_laporan_penjualan`
-- (See below for the actual view)
--
CREATE TABLE `v_laporan_penjualan` (
`tanggal` date
,`jumlah_pesanan` bigint(21)
,`item_terjual` decimal(32,0)
,`omzet` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_penjualan_kategori`
-- (See below for the actual view)
--
CREATE TABLE `v_penjualan_kategori` (
`nama_kategori` varchar(80)
,`item_terjual` decimal(32,0)
,`omzet` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure for view `v_katalog`
--
DROP TABLE IF EXISTS `v_katalog`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_katalog`  AS SELECT `p`.`id` AS `id`, `p`.`nama` AS `nama`, `p`.`merek` AS `merek`, `p`.`harga_dasar` AS `harga_dasar`, `p`.`terjual` AS `terjual`, `p`.`created_at` AS `created_at`, `c`.`nama_kategori` AS `nama_kategori`, `c`.`slug` AS `slug`, coalesce(`r`.`rating_rata`,0) AS `rating_rata`, coalesce(`r`.`jumlah_ulasan`,0) AS `jumlah_ulasan` FROM ((`products` `p` join `categories` `c` on(`c`.`id` = `p`.`category_id`)) left join (select `reviews`.`product_id` AS `product_id`,round(avg(`reviews`.`rating`),1) AS `rating_rata`,count(`reviews`.`id`) AS `jumlah_ulasan` from `reviews` group by `reviews`.`product_id`) `r` on(`r`.`product_id` = `p`.`id`)) WHERE `p`.`status` = 'aktif' ;

-- --------------------------------------------------------

--
-- Structure for view `v_laporan_penjualan`
--
DROP TABLE IF EXISTS `v_laporan_penjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_laporan_penjualan`  AS SELECT cast(`o`.`created_at` as date) AS `tanggal`, count(distinct `o`.`id`) AS `jumlah_pesanan`, sum(`oi`.`qty`) AS `item_terjual`, sum(`oi`.`qty` * `oi`.`harga_satuan`) AS `omzet` FROM (`orders` `o` join `order_items` `oi` on(`oi`.`order_id` = `o`.`id`)) WHERE `o`.`status` in ('dikemas','dikirim','selesai') GROUP BY cast(`o`.`created_at` as date) ;

-- --------------------------------------------------------

--
-- Structure for view `v_penjualan_kategori`
--
DROP TABLE IF EXISTS `v_penjualan_kategori`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_penjualan_kategori`  AS SELECT `c`.`nama_kategori` AS `nama_kategori`, sum(`oi`.`qty`) AS `item_terjual`, sum(`oi`.`qty` * `oi`.`harga_satuan`) AS `omzet` FROM (((`order_items` `oi` join `orders` `o` on(`o`.`id` = `oi`.`order_id`)) join `products` `p` on(`p`.`id` = `oi`.`product_id`)) join `categories` `c` on(`c`.`id` = `p`.`category_id`)) WHERE `o`.`status` in ('dikemas','dikirim','selesai') GROUP BY `c`.`id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_cart` (`user_id`,`variant_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_notification_source` (`recipient_key`,`source_key`),
  ADD KEY `idx_notification_recipient` (`recipient_key`,`read_at`),
  ADD KEY `idx_notification_created` (`created_at`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_order` (`kode_order`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`),
  ADD KEY `voucher_id` (`voucher_id`),
  ADD KEY `idx_status` (`status`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `variant_id` (`variant_id`);

--
-- Indexes for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nama` (`nama`),
  ADD KEY `idx_kategori` (`category_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_review` (`user_id`,`product_id`,`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `stock_logs`
--
ALTER TABLE `stock_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variant_id` (`variant_id`),
  ADD KEY `fk_stock_logs_product` (`product_id`);

--
-- Indexes for table `store_settings`
--
ALTER TABLE `store_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6405;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_status_history`
--
ALTER TABLE `order_status_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stock_logs`
--
ALTER TABLE `stock_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`);

--
-- Constraints for table `order_status_history`
--
ALTER TABLE `order_status_history`
  ADD CONSTRAINT `order_status_history_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stock_logs`
--
ALTER TABLE `stock_logs`
  ADD CONSTRAINT `fk_stock_logs_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stock_logs_ibfk_1` FOREIGN KEY (`variant_id`) REFERENCES `product_variants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
