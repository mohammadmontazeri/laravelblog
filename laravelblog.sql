-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 23, 2019 at 01:31 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `laravelblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNumber` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instaUrl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tellId` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `image`, `name`, `email`, `phoneNumber`, `instaUrl`, `tellId`, `detail`, `created_at`, `updated_at`) VALUES
(1, '/uploads/1569165177_IMG_0783.jpg', 'محمد منتظری', 'montazeriput95@gmail.com', '09117132205', 'ewqweqwe', 'asdasdasdasd', '<p>&nbsp;</p>\r\n\r\n<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>', NULL, '2019-09-22 15:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`id`, `image`, `url`, `created_at`, `updated_at`) VALUES
(2, '/uploads/1568810856_09608.JPG', 'ad1', '2019-09-18 12:47:36', '2019-09-18 13:05:32'),
(3, '/uploads/1568810864_09601.JPG', 'ad2', '2019-09-18 12:47:44', '2019-09-18 13:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `is_parent` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `parent`, `is_parent`, `created_at`, `updated_at`) VALUES
(13, 'مدیریت', '/uploads/1568640990_09605.JPG', NULL, '0', '2019-09-16 13:36:30', '2019-09-19 11:51:29'),
(14, 'تفریح و سرگرمی', '/uploads/1568893816_09601.JPG', NULL, '0', '2019-09-19 11:50:16', '2019-09-19 11:50:16'),
(15, 'ورزش', '/uploads/1568893831_09600.JPG', NULL, '0', '2019-09-19 11:50:31', '2019-09-19 11:50:31'),
(16, 'مالی', '/uploads/1568893849_09597.JPG', NULL, '0', '2019-09-19 11:50:49', '2019-09-19 11:50:49'),
(17, 'برنامه نویسی', '/uploads/1568894024_09605.JPG', NULL, '0', '2019-09-19 11:53:44', '2019-09-19 11:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `is_parent` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `user_id`, `post_id`, `status`, `created_at`, `updated_at`, `parent`, `is_parent`) VALUES
(1, 'ddasdasdsas', 1, 8, '1', '2019-09-22 03:52:16', '2019-09-22 03:52:16', NULL, '0'),
(2, 'sdfsdsdfsdfsd', 1, 8, '1', '2019-09-22 03:52:34', '2019-09-22 03:52:34', NULL, '0'),
(3, 'fsdfsdfsdfsdfs', 1, 7, '1', '2019-09-22 03:52:40', '2019-09-22 09:26:13', NULL, '0'),
(5, 'خخخخخخخخخخ', 1, 8, '1', '2019-09-22 09:41:08', '2019-09-22 09:44:41', NULL, '1'),
(6, 'urytoirtiwer', 1, 8, '1', '2019-09-22 09:44:41', '2019-09-22 09:44:51', 5, '0'),
(7, 'چه پست خوبی ؟', 1, 10, '1', '2019-09-23 06:31:26', '2019-09-23 06:31:58', NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `instaposts`
--

CREATE TABLE `instaposts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instaposts`
--

INSERT INTO `instaposts` (`id`, `post_id`, `url`, `created_at`, `updated_at`) VALUES
(1, 8, 'adsasdasda', '2019-09-19 12:32:20', '2019-09-19 12:32:20'),
(2, 9, 'asdasdadasdas', '2019-09-19 12:32:28', '2019-09-19 12:32:28'),
(3, 7, 'asdasasdasdasd', '2019-09-19 12:45:00', '2019-09-19 12:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(103, 1, 9, '2019-09-21 11:41:25', '2019-09-21 11:41:25'),
(105, 1, 7, '2019-09-21 12:07:15', '2019-09-21 12:07:15'),
(110, 1, 8, '2019-09-22 10:33:29', '2019-09-22 10:33:29'),
(111, 1, 10, '2019-09-23 06:27:18', '2019-09-23 06:27:18');

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
(139, '2019_09_11_173032_update_users_table', 1),
(140, '2014_10_12_100000_create_password_resets_table', 2),
(141, '2019_09_07_181001_create_users_table', 2),
(142, '2019_09_07_181027_create_categories_table', 2),
(144, '2019_09_07_181122_create_comments_table', 2),
(145, '2019_09_07_181136_create_likes_table', 2),
(147, '2019_09_07_185121_update_posts_table', 2),
(149, '2019_09_07_185422_update_likes_table', 2),
(150, '2019_09_15_201646_update_posts_table', 3),
(153, '2019_09_07_181102_create_posts_table', 2),
(154, '2019_09_07_184246_create_update_categories_table', 2),
(155, '2019_09_16_153129_update_categories_table', 4),
(156, '2019_09_17_151420_create_instaposts_table', 5),
(157, '2019_09_17_151654_create_advertisements_table', 5),
(158, '2019_09_17_151910_create_abouts_table', 5),
(159, '2019_09_17_152500_create_newsletters_table', 5),
(160, '2019_09_17_152632_update_instaposts_table', 5),
(162, '2019_09_07_185310_update_comment_table', 6),
(163, '2019_09_18_132828_create_tags_table', 7),
(164, '2019_09_19_111948_update_newsletters_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`, `status`) VALUES
(1, 'montazeriput95@gmail.com', '2019-09-22 10:41:01', '2019-09-22 10:41:01', '0');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `summery` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `viewed` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `tags`, `detail`, `summery`, `image`, `cat_id`, `created_at`, `updated_at`, `viewed`, `likes`) VALUES
(5, 'asdasasd', '-برچسب ۳-برچسب ۶', '<p>asdasdasdasds</p>', 'adsasasda', '/uploads/1568801171_09609.JPG', 13, '2019-09-18 10:06:11', '2019-09-18 10:06:11', 0, 0),
(7, 'آموزش ایجکس', 'برچسب ۳', '<p>adasdasdasdasda</p>', 'adasdasdasdasd', '/uploads/1568893745_09608.JPG', 13, '2019-09-19 11:49:05', '2019-09-19 11:49:05', 5, 0),
(8, 'سفر به ماه', 'برچسب ۳', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '/uploads/1568895209_09606.JPG', 14, '2019-09-19 12:13:29', '2019-09-22 15:33:09', 4, 0),
(9, 'کد نویسی تمیز', 'تمرین زندگی', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '/uploads/1569153760_09594.JPG', 17, '2019-09-19 12:14:26', '2019-09-22 12:02:40', 0, 0),
(10, 'کار کردن در ایران', 'برنامه نویسی,بیماری', '<p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.&nbsp;<img alt=\"\" src=\"http://localhost:8888/blog/public/uploads/09600_1569219937.JPG\" style=\"height:214px; width:300px\" /></p>', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.', '/uploads/1569219983_09593.JPG', 17, '2019-09-23 06:26:23', '2019-09-23 06:32:09', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'برچسب ۳', '2019-09-18 09:12:11', '2019-09-18 09:20:15'),
(2, 'برنامه نویسی', '2019-09-19 13:23:13', '2019-09-19 13:23:13'),
(3, 'بیماری', '2019-09-19 13:23:19', '2019-09-19 13:23:19'),
(4, 'وبا', '2019-09-19 13:23:22', '2019-09-19 13:23:22'),
(5, 'تمرین زندگی', '2019-09-19 13:23:33', '2019-09-19 13:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'محمد منتظری', 'admin', 'montazeriput95@gmail.com', '$2y$10$iczGkFA3wC.6NMTSmnDG3upA8y7FcGFVwVXE9e7IY23tGJteHwWl.', '1', '2019-09-14 09:09:06', '2019-09-14 10:09:28'),
(5, 'نویسنده', 'user', 'a@a.com', '$2y$10$smnAkryU71w5FGPeC94X8u.OUbGW6MEsSdPnHqpiJe7MZNdBM8pyS', '0', '2019-09-14 10:37:26', '2019-09-16 08:43:54'),
(7, 'ali', 'user', 's@s.com', '$2y$10$Xu1Lmel6m/27I8bmn8YySupO8mmWf.0a9604QXlR1XpNzf/sNdP7q', '1', '2019-09-19 11:29:36', '2019-09-19 11:29:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_foreign` (`parent`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_parent_foreign` (`parent`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `instaposts`
--
ALTER TABLE `instaposts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instaposts_post_id_foreign` (`post_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `likes_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_cat_id_foreign` (`cat_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instaposts`
--
ALTER TABLE `instaposts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `instaposts`
--
ALTER TABLE `instaposts`
  ADD CONSTRAINT `instaposts_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
