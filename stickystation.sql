-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 02:21 PM
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
-- Database: `stickystation`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2024_05_28_102330_create_products_table', 1),
(6, '2024_05_30_145319_create_carts_table', 1),
(7, '2024_05_31_123144_create_orders_table', 2),
(8, '2024_05_31_123152_create_payments_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 32, 6, 'Suscipit reprehenderit tempore.', 1, 796.84, '2024-05-31 04:53:32', '2024-05-31 04:53:32'),
(2, 32, 22, 'ESRC', 12, 24.00, '2024-05-31 04:54:19', '2024-05-31 04:54:19'),
(3, 32, 15, 'Id laboriosam eum quos.', 1, 878.31, '2024-05-31 04:55:51', '2024-05-31 04:55:51'),
(4, 32, 4, 'Quos modi nesciunt.', 1, 597.51, '2024-05-31 04:56:32', '2024-05-31 04:56:32'),
(5, 32, 22, 'ESRC', 20, 40.00, '2024-05-31 04:57:55', '2024-05-31 04:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_price` double NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_quantity`, `product_price`, `product_image`, `product_description`, `product_status`, `product_type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Quis rem delectus rerum.', 75, 938.05, 'https://via.placeholder.com/640x480.png/001155?text=ea', 'Omnis et error alias aut optio. Est quis nam sit et odio a beatae. Omnis labore est eligendi dolorum odit molestiae. Quidem velit nihil quo maiores impedit nulla.', 'featured', 'glossy', 11, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(2, 'Neque minima ex sunt.', 12, 849.75, 'https://via.placeholder.com/640x480.png/001144?text=aut', 'Et maiores quam quaerat neque incidunt eum nam. Harum commodi quidem qui voluptatem soluta quidem. Cumque quis dolores laudantium quae non. Consequatur aut dolore facere tempora qui. Ipsa et consectetur quia.', 'not featured', 'paper', 12, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(3, 'Odio soluta tenetur molestiae.', 64, 452.96, 'https://via.placeholder.com/640x480.png/004499?text=aliquam', 'Facilis at et reprehenderit cumque autem non repellat. Enim aut consequatur quod qui. Corrupti commodi tempore quas.', 'featured', 'vinyl', 13, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(4, 'Quos modi nesciunt.', 96, 597.51, 'https://via.placeholder.com/640x480.png/0000cc?text=officia', 'Quam odit exercitationem quia blanditiis error. Molestiae culpa occaecati dolorum voluptatem. Rerum nihil corporis ducimus error aut ab.', 'not featured', 'plastic', 14, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(5, 'Modi et mollitia illum.', 57, 328.65, 'https://via.placeholder.com/640x480.png/003322?text=ad', 'Nisi porro ratione sed et. Molestias provident dicta rerum maxime. Voluptatem a doloremque atque modi.', 'featured', 'glossy', 15, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(6, 'Suscipit reprehenderit tempore.', 59, 796.84, 'https://via.placeholder.com/640x480.png/003311?text=ad', 'Modi eaque asperiores quia sequi iure dolore. Aut dolores nihil assumenda error sint occaecati.', 'featured', 'vinyl', 16, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(7, 'Aut qui natus dolorem.', 88, 783.52, 'https://via.placeholder.com/640x480.png/005500?text=aut', 'Cupiditate dolorem nisi voluptatem reprehenderit deserunt. Aut tempore natus quos fuga et ex inventore similique. Labore ducimus et harum illo. Sed quod incidunt voluptatum.', 'featured', 'plastic', 17, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(8, 'Veniam quisquam nobis.', 15, 668.71, 'https://via.placeholder.com/640x480.png/00cc88?text=magnam', 'Sunt exercitationem itaque tempora perferendis. Autem quidem itaque repellendus perspiciatis. Aut voluptatem consequatur cum iusto.', 'featured', 'vinyl', 18, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(9, 'Accusamus vitae.', 51, 945.4, 'https://via.placeholder.com/640x480.png/008800?text=praesentium', 'Ipsam in maiores temporibus velit. Voluptas quae molestiae autem eveniet. Fugiat aspernatur deleniti mollitia.', 'not featured', 'paper', 19, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(10, 'Quibusdam quis rerum aspernatur.', 61, 848.53, 'https://via.placeholder.com/640x480.png/0066ff?text=in', 'Veritatis veniam sint fugit voluptatem porro perspiciatis facere fugit. Similique cupiditate nulla placeat maxime. Quisquam minus optio quis autem molestiae labore. Est odio aliquam sunt dolore.', 'featured', 'glossy', 20, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(11, 'Eligendi voluptatem molestiae.', 55, 757, 'https://via.placeholder.com/640x480.png/00cc00?text=ipsum', 'Quod vitae mollitia et quisquam qui laudantium. Vel et aut ea aliquid ducimus dolorem.', 'featured', 'plastic', 21, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(12, 'Unde dolorem.', 46, 982.92, 'https://via.placeholder.com/640x480.png/006633?text=minima', 'Aut consequatur sed similique sit incidunt. Blanditiis est et quia veniam sit.', 'featured', 'vinyl', 22, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(13, 'Minima et facilis.', 78, 804.79, 'https://via.placeholder.com/640x480.png/00aaaa?text=aut', 'Enim sit et possimus. Dicta culpa ipsa distinctio illo voluptatum itaque deleniti consequuntur. Quia quia similique sapiente nam velit veritatis qui. Nam eum id ea quia iusto deserunt.', 'not featured', 'glossy', 23, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(14, 'Ab quod architecto rem.', 72, 642.02, 'https://via.placeholder.com/640x480.png/00dd77?text=voluptatem', 'Vero iure et eligendi sit. Placeat voluptas deleniti rem consequatur. Inventore rerum repudiandae enim qui facilis.', 'featured', 'vinyl', 24, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(15, 'Id laboriosam eum quos.', 44, 878.31, 'https://via.placeholder.com/640x480.png/000033?text=nesciunt', 'Modi impedit rerum omnis sunt qui. Qui nisi autem quia. Laboriosam esse et asperiores quia minima. Saepe perspiciatis fugit vel.', 'not featured', 'vinyl', 25, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(16, 'Quaerat nemo ut.', 60, 663.54, 'https://via.placeholder.com/640x480.png/003366?text=dignissimos', 'Voluptas iure recusandae pariatur aliquam molestias possimus eos. Debitis omnis quia ut qui ratione omnis aut. Reprehenderit est aliquid tempore id non non nobis culpa. Suscipit est facere maxime qui facilis eos. Officia fugiat vel repudiandae consequatur tenetur.', 'featured', 'paper', 26, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(17, 'Aut accusamus sed sit.', 68, 640.25, 'https://via.placeholder.com/640x480.png/006600?text=perspiciatis', 'Quia optio rerum nihil sit. Aspernatur dolorum perferendis explicabo qui vitae dolorum qui.', 'not featured', 'vinyl', 27, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(18, 'Rerum quisquam esse.', 13, 20.76, 'https://via.placeholder.com/640x480.png/006655?text=qui', 'Omnis ut quo eveniet impedit voluptate. Cumque quidem rerum beatae eaque quaerat molestias nam nemo. Praesentium eveniet tenetur facilis et et est vel modi. Voluptatem sint qui et aut voluptatem.', 'featured', 'paper', 28, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(19, 'Ut sit sed rerum.', 62, 773.16, 'https://via.placeholder.com/640x480.png/00aa33?text=aut', 'Sequi rem eum asperiores minus. Voluptas vel qui quaerat dolorem. Praesentium error unde amet illo. Alias odio numquam ipsam non aut voluptatem id.', 'featured', 'vinyl', 29, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(20, 'Quia sequi voluptate rerum.', 11, 295.43, 'https://via.placeholder.com/640x480.png/00ccbb?text=maxime', 'Sunt ipsa corporis autem veritatis quasi nobis eaque. Est explicabo et sed eligendi modi ipsa. Aut enim dignissimos quisquam non. Et commodi magnam nostrum cum ut est et.', 'featured', 'paper', 30, '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(22, 'ESRC', 20, 2, 'photos/K3GL25GjQzAR6We0KViW7ZNBhzBg9CYfer9YpNG9.jpg', 'ESCR', 'available', 'vinyl', 31, '2024-05-31 01:09:13', '2024-05-31 01:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Wiley White', 'alvina.armstrong@example.com', 'vendor', '2024-05-30 23:52:41', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'rilX3JnAfb', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(2, 'Charles Von', 'mward@example.org', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 's0GFqTilZJ', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(3, 'Esteban Douglas', 'mitchell.tierra@example.net', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'IRtIst9OUy', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(4, 'Ryley Jacobi', 'prutherford@example.com', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'JbRfTfeR8Q', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(5, 'Prof. Lucile Russel PhD', 'danial80@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '8LxdE759Ig', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(6, 'Jerry Schmitt', 'hank.gibson@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '0Oe3ipgtrA', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(7, 'Mandy Ebert IV', 'mante.columbus@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'WuJKJa2sHB', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(8, 'Mr. Franz Bradtke MD', 'bert.kirlin@example.net', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'DT571zduQa', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(9, 'Alfred Metz', 'kessler.rose@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '1tMfKPjERN', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(10, 'Mitchell Brekke DDS', 'garett51@example.net', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'G8GtjphTrP', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(11, 'Mrs. Elody Windler V', 'tgoldner@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '4Vr1okWP9d', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(12, 'Stanford Berge', 'lily.harber@example.org', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'KDFjKknU40', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(13, 'Hettie Wolf', 'sauer.mohammed@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'XeFlFCJvGu', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(14, 'Ronny Bednar', 'kohler.haven@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'zQI4nvZGUv', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(15, 'Prof. Joesph Hammes I', 'dora94@example.org', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'DPOzsfdboo', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(16, 'Rosamond Schaefer MD', 'wilbert91@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'pdrcmd93hS', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(17, 'Ms. Laila Johns', 'deshaun.hermann@example.net', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '40mIuQOoO9', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(18, 'Anissa Schneider', 'belle.schneider@example.net', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '3AGAZtAdN3', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(19, 'Esteban Morar', 'caterina.legros@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'vC2d3JTEvc', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(20, 'Mekhi Morissette', 'gkassulke@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'hyJtD5mva4', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(21, 'Dr. Gilbert Macejkovic Sr.', 'jayde38@example.org', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'tXcdjKJSSr', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(22, 'Jackie Simonis', 'vince23@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'blHfEBXjLC', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(23, 'Clyde Mante', 'dickens.khalil@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'JpL3Wu8qJl', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(24, 'Emerson Mills', 'stanley.mann@example.net', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '5BjPEj9FcM', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(25, 'Jackie Ward', 'mable03@example.net', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'AMnctaPWtw', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(26, 'Eryn Kulas', 'emelie71@example.com', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '695XeQHJ8g', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(27, 'Brandyn Kuhlman', 'cole.mertz@example.org', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'SYLRDQNUHF', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(28, 'Larry Krajcik', 'sporer.nannie@example.net', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'uCazQSJcAq', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(29, 'Aric Yundt', 'borer.jolie@example.com', 'vendor', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', '492GUn93Lj', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(30, 'Mrs. Myrtis Bashirian', 'bheller@example.com', 'customer', '2024-05-30 23:52:42', '$2y$12$e2MM2LEefGjO9IxiP3kQ8.iU.6fxz9aMiSD86OxkHddNWZgm6teiK', 'Q8XTOCZvDB', '2024-05-30 23:52:42', '2024-05-30 23:52:42'),
(31, 'Syomai', 'syomairays29@gmail.com', 'vendor', NULL, '$2y$12$nLk2Atba80glQ3y3IONWM.M0xoQMpCvq1Sh/RRBKgKjDp/CpAhJCm', NULL, '2024-05-30 23:54:10', '2024-05-30 23:54:10'),
(32, 'christian jays', 'asd@gmail.com', 'customer', NULL, '$2y$12$J2lxdiIDHiw.hwaO5ZrCDOdczdji.jfiDInVGPooBEmh3kTafipAW', NULL, '2024-05-30 23:54:28', '2024-05-31 04:37:11'),
(33, 'sample', 'qwe@gmail.com', 'customer', NULL, '$2y$12$G4NbsIx12mPuQk37k2eSeOP6DminQwXgxpFWPjxFsqrR34XvGtvka', NULL, '2024-05-31 02:24:08', '2024-05-31 02:24:08'),
(34, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$vT8KR2xI2xiGdk2E.r4eKes.21WTN9TXJ0TR.o4Z6/F4qJqUXKtm2', NULL, '2024-06-01 03:08:28', '2024-06-01 03:08:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
