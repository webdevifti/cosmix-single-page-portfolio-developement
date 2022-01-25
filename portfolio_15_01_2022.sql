-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2022 at 03:24 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio_15_01_2022`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_section`
--

CREATE TABLE `about_section` (
  `id` int(11) NOT NULL,
  `about_heading` varchar(255) NOT NULL,
  `about_desc` text NOT NULL,
  `about_feature_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_section`
--

INSERT INTO `about_section` (`id`, `about_heading`, `about_desc`, `about_feature_image`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'We Are Creative And Awesome', ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing', '20221801055606.jpg', 1, 5, '2022-01-18 22:55:15', '2022-01-18 22:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `banner_heading` varchar(255) NOT NULL,
  `banner_subheading` varchar(255) NOT NULL,
  `banner_desc` text NOT NULL,
  `banner_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `banner_heading`, `banner_subheading`, `banner_desc`, `banner_image`, `status`, `created_at`, `updated_at`) VALUES
(16, 'We Are Cosmix', 'We Are Creative And Awesome', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '20221701074339.jpg', 0, '2022-01-17 12:43:39', '2022-01-23 01:28:08'),
(17, 'We Are Cosmix', 'We Are Creative And Awesome', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '20221701074359.jpg', 0, '2022-01-17 12:43:59', '2022-01-23 01:28:08'),
(18, 'We Are Cosmix', 'Creative Themestry', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable', '20221701074433.jpg', 0, '2022-01-17 12:44:33', '2022-01-23 01:28:08');

-- --------------------------------------------------------

--
-- Table structure for table `brands_section`
--

CREATE TABLE `brands_section` (
  `id` int(11) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands_section`
--

INSERT INTO `brands_section` (`id`, `brand_logo`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(5, '20222001044716.png', 5, 1, '2022-01-20 21:47:16', '2022-01-20 21:51:37'),
(6, '20222001044721.png', 5, 1, '2022-01-20 21:47:21', '2022-01-20 21:51:37'),
(7, '20222001044726.png', 5, 1, '2022-01-20 21:47:26', '2022-01-20 21:51:37'),
(8, '20222001044732.png', 5, 1, '2022-01-20 21:47:32', '2022-01-20 21:51:36'),
(9, '20222001044737.png', 5, 1, '2022-01-20 21:47:37', '2022-01-20 21:51:36'),
(10, '20222001044745.png', 5, 1, '2022-01-20 21:47:45', '2022-01-20 21:51:36'),
(11, '20222001044749.png', 5, 1, '2022-01-20 21:47:49', '2022-01-20 21:51:36');

-- --------------------------------------------------------

--
-- Table structure for table `contact_address`
--

CREATE TABLE `contact_address` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail_address` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_address`
--

INSERT INTO `contact_address` (`id`, `address`, `mail_address`, `contact_phone`, `website`) VALUES
(1, 'No 121/A, Moneshwar road, Zigatola, Dhanmondi,Dhaka, Bangladesh', 'webdevifti@gmail.com', '01933999657', 'https://webdevifti.com');

-- --------------------------------------------------------

--
-- Table structure for table `feature_images`
--

CREATE TABLE `feature_images` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `f_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_images`
--

INSERT INTO `feature_images` (`id`, `section_name`, `f_image`, `status`) VALUES
(1, 'experience', '20222501032045.png', 0),
(3, 'testimonial', '20222001061835.jpg', 1),
(4, 'testimonial', '20222001063530.jpg', 0),
(5, 'testimonial', '20222001063803.jpg', 0),
(6, 'testimonial', '20222001063846.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `feature_section`
--

CREATE TABLE `feature_section` (
  `id` int(11) NOT NULL,
  `feature_category` varchar(255) NOT NULL,
  `feature_description` text NOT NULL,
  `feature_tab_icons` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `feature_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feature_section`
--

INSERT INTO `feature_section` (`id`, `feature_category`, `feature_description`, `feature_tab_icons`, `status`, `feature_image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Graphic Design and Motion graphics', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\nindustry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing', 'fa fa-paper-plane', 1, '20221901103545.jpg', 5, '2022-01-18 23:50:28', '2022-01-21 12:47:17'),
(2, 'Web Design', 'Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing', 'fa fa-laptop', 1, '20221801070624.jpg', 5, '2022-01-19 00:06:24', '2022-01-19 14:10:17'),
(3, ' Web Development', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing\r\nLorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound', 'fa fa-code', 1, '20221801070657.jpg', 5, '2022-01-19 00:06:57', '2022-01-19 14:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `fun_facts`
--

CREATE TABLE `fun_facts` (
  `id` int(11) NOT NULL,
  `client_number` bigint(20) NOT NULL,
  `completed_project` bigint(20) NOT NULL,
  `cups_of_coffee` bigint(20) NOT NULL,
  `line_of_code` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fun_facts`
--

INSERT INTO `fun_facts` (`id`, `client_number`, `completed_project`, `cups_of_coffee`, `line_of_code`) VALUES
(1, 40, 100, 60, 98230332);

-- --------------------------------------------------------

--
-- Table structure for table `message_from_user`
--

CREATE TABLE `message_from_user` (
  `id` int(11) NOT NULL,
  `sender_name` varchar(255) NOT NULL,
  `sender_email` varchar(255) NOT NULL,
  `message_subject` varchar(255) NOT NULL,
  `sender_message` text NOT NULL,
  `sended_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_from_user`
--

INSERT INTO `message_from_user` (`id`, `sender_name`, `sender_email`, `message_subject`, `sender_message`, `sended_at`) VALUES
(8, 'Imran Hossain', 'imranmpi2017@gmail.com', 'Test Gmail', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam', '2022-01-19 20:57:39'),
(9, 'Imran Hossain', 'imranmpi2017@gmail.com', 'Test Gmail', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua. Ut enim ad minim veniam', '2022-01-19 20:59:01'),
(10, 'Robiul Islam', 'rabiul@gmail', 'Test Gmail', 'How are you?', '2022-01-23 01:19:40'),
(11, 'Eftekhar Alam', 'mehedi@gmail.com', 'Test Gmail', 'How are you?', '2022-01-23 01:20:15'),
(12, 'Eftekhar Alam', 'mehedi@gmail.com', 'Test Gmail', 'How are you?', '2022-01-23 01:21:10'),
(13, 'Eftekhar Alam', 'webdevifti@gmail.com', 'Test Gmail', 'How are you?', '2022-01-23 01:22:23'),
(14, 'Eftekhar Alam', 'mehedi@gmail.com', 'Test Gmail', 'TEst', '2022-01-23 01:22:44'),
(15, 'Eftekhar Alam', 'mehedi@gmail.com', 'Test Gmail', 'How are you?', '2022-01-23 01:24:23');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_section`
--

CREATE TABLE `portfolio_section` (
  `id` int(11) NOT NULL,
  `portfolio_category` varchar(255) NOT NULL,
  `portfolio_image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolio_section`
--

INSERT INTO `portfolio_section` (`id`, `portfolio_category`, `portfolio_image`, `title`, `short_desc`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Creative', '20221901113212.jpg', 'Item 1', 'There are many variations of passages of', 1, 5, '2022-01-19 16:32:12', '2022-01-19 17:00:43'),
(3, 'corporate', '20221901113242.jpg', 'Item 2', 'There are many variations of passages of', 1, 5, '2022-01-19 16:32:42', '2022-01-19 17:00:43'),
(4, 'portfolio', '20221901113300.jpg', 'Item 3', 'There are many variations of passages of', 1, 5, '2022-01-19 16:33:00', '2022-01-19 17:00:43'),
(5, 'Creative', '20221901113313.jpg', 'Item 4', 'There are many variations of passages of', 1, 5, '2022-01-19 16:33:13', '2022-01-19 16:51:35'),
(6, 'corporate', '20221901113326.jpg', 'Item 5', 'There are many variations of passages of', 1, 5, '2022-01-19 16:33:26', '2022-01-19 16:50:37'),
(7, 'corporate', '20221901113340.jpg', 'Item 6', 'There are many variations of passages of', 1, 5, '2022-01-19 16:33:40', '2022-01-19 16:50:37'),
(8, 'Business', '20221901120240.jpg', 'Item 7', 'Contrary to popular belief', 1, 5, '2022-01-19 17:02:40', '2022-01-19 17:02:40'),
(9, 'Creative', '20221901121937.jpg', 'Item 8', 'This is creative design and most wanted design', 1, 5, '2022-01-19 17:04:31', '2022-01-19 17:19:37');

-- --------------------------------------------------------

--
-- Table structure for table `section_headers`
--

CREATE TABLE `section_headers` (
  `id` int(11) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `short_desc` text NOT NULL,
  `section` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `icon`, `title`, `description`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(4, 'fa fa-line-chart', 'UX Design', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:34:58', '2022-01-17 20:34:58'),
(5, 'fa fa-cubes', 'UI Design', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:35:21', '2022-01-17 20:35:21'),
(6, 'fa fa-pie-chart', 'Marketing', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:35:43', '2022-01-17 20:35:43'),
(7, 'fa fa-bar-chart', 'SEO Services', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:36:12', '2022-01-17 20:36:12'),
(8, 'fa fa-language', 'Android App', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:36:43', '2022-01-17 20:36:43'),
(9, 'fa fa-bullseye', 'Clean Code', 'Backed by some of the biggest names in the industry, Firefox OS is an open platform that fosters greater', 5, 1, '2022-01-17 20:37:12', '2022-01-17 20:37:12');

-- --------------------------------------------------------

--
-- Table structure for table `services_experience`
--

CREATE TABLE `services_experience` (
  `id` int(11) NOT NULL,
  `exp_title` varchar(255) NOT NULL,
  `exp_ratio` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services_experience`
--

INSERT INTO `services_experience` (`id`, `exp_title`, `exp_ratio`, `user_id`, `status`) VALUES
(14, ' User Experiances', 87, 5, 1),
(15, 'Web Design', 90, 5, 1),
(16, 'Programming', 77, 5, 1),
(18, 'Fun', 95, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_information`
--

CREATE TABLE `site_information` (
  `id` int(11) NOT NULL,
  `site_description` text NOT NULL,
  `site_keywords` text NOT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_icon` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_information`
--

INSERT INTO `site_information` (`id`, `site_description`, `site_keywords`, `site_logo`, `site_icon`, `created_at`, `updated_at`) VALUES
(1, 'A meta description is the description of, or excerpt from, a webpage that appears when that page is listed in search results. It’s usually a couple of sentences long, and tells the searcher what they need to know about what the page contains and how relevant it might be to their query.\r\nA meta description is the description of, or excerpt from, a webpage that appears when that page is listed in search results. It’s usually a couple of sentences long, and tells the searcher what they need to know about what the page contains and how relevant it might be to their query.', 'A meta description is the description of, or excerpt from, a webpage that appears when that page is listed in search results. It’s usually a couple of sentences long, and tells the searcher what they need to know about what the page contains and how relevant it might be to their query.', 'site_logo20222201043445.png', 'site_icon_20222201043633.png', '2022-01-22 21:17:58', '2022-01-22 21:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `site_social_share`
--

CREATE TABLE `site_social_share` (
  `id` int(11) NOT NULL,
  `social_name` varchar(255) NOT NULL,
  `social_link` varchar(255) NOT NULL,
  `social_icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_social_share`
--

INSERT INTO `site_social_share` (`id`, `social_name`, `social_link`, `social_icon`, `status`, `created_at`, `updated_at`) VALUES
(3, 'instagram', 'https://instagram.com/be.ifti', NULL, 1, '2022-01-21 20:11:19', '2022-01-21 21:14:35'),
(4, 'youtube', 'https://youtube.com/c/webdevifti', NULL, 1, '2022-01-21 20:11:33', '2022-01-21 21:14:34'),
(5, 'linkedin', 'https://linkedin.com/webdevifti', NULL, 1, '2022-01-21 20:11:47', '2022-01-21 21:14:33'),
(6, 'facebook', 'https://facebook.com/webdevifti', NULL, 1, '2022-01-21 20:29:06', '2022-01-21 21:14:32'),
(7, 'behance', 'https://behance.com/webdevifti', NULL, 1, '2022-01-21 21:21:32', '2022-01-21 21:21:32'),
(8, 'pinterest', 'https://pinterest.com/webdevifti', NULL, 1, '2022-01-21 21:21:57', '2022-01-21 21:21:57'),
(9, 'whatsapp', 'https://whatsapp.com/webdevifti', NULL, 0, '2022-01-21 21:22:50', '2022-01-22 19:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bio` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `photo`, `name`, `designation`, `status`, `created_at`, `updated_at`, `bio`, `user_id`) VALUES
(1, '20222301015406.jpg', 'JULIA AMANDA', 'Web Developer', 1, '2022-01-23 18:54:06', '2022-01-23 18:54:06', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 5),
(2, '20222301015607.jpg', 'MERRY LUIS', 'Web Designer', 1, '2022-01-23 18:56:07', '2022-01-23 18:56:07', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 5);

-- --------------------------------------------------------

--
-- Table structure for table `team_members_social_links`
--

CREATE TABLE `team_members_social_links` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `social_name` varchar(20) NOT NULL,
  `social_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team_members_social_links`
--

INSERT INTO `team_members_social_links` (`id`, `member_id`, `social_name`, `social_url`) VALUES
(1, 1, 'facebook-f', 'https://facebook.com/julia_amanda'),
(2, 1, 'twitter', 'https://twitter.com/julia_amanda'),
(3, 1, 'instagram', 'https://instagram.com/julia_amanda'),
(4, 1, 'whatsapp', 'https://whatsapp.com/julia_amanda'),
(5, 2, 'facebook-f', 'https://facebook.com/merry_luis'),
(6, 2, 'twitter', 'https://twitter.com/merry_luis'),
(7, 2, 'instagram', 'https://instagram.com/merry_luis');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial_section`
--

CREATE TABLE `testimonial_section` (
  `id` int(11) NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `reviewer_designation` varchar(255) NOT NULL,
  `reviewer_photo` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial_section`
--

INSERT INTO `testimonial_section` (`id`, `reviewer_name`, `reviewer_designation`, `reviewer_photo`, `review`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Imran Hossain', 'Web Developer', '20222001071649.jpg', 'Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi.', 1, 5, '2022-01-20 12:16:49', '2022-01-20 21:09:40'),
(2, 'Eftekhar Alam', 'CEO', '20222001071728.jpg', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas', 1, 5, '2022-01-20 12:17:28', '2022-01-20 21:09:40'),
(3, 'SAM DEEN', 'Web Designer', '20222001040629.jpg', 'Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur', 1, 5, '2022-01-20 12:17:57', '2022-01-20 21:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `role`, `status`, `photo`, `created_at`, `updated_at`, `phone_number`) VALUES
(5, 'Eftekhar Alam', 'webdevifti', 'webdevifti@gmail.com', '$2y$10$8rNyjpUVJ0EdU0EIp0UguuCPIXRcKtJu2/KKvUskexPAMPBnkR6m.', 'admin', 1, 'user_20221701015706.jpg', '2022-01-17 18:13:00', '2022-01-17 18:57:06', '01933999657'),
(6, 'Mehedi Ashraf', 'mehedi01', 'mehedi@gmail.com', '$2y$10$10Gb1of36kEcAWbBGerebuITe8eEnkIT3fy9MhP2l8ti3Bys6ZDIq', 'moderator', 1, 'user_20221701015844.jpg', '2022-01-17 18:58:44', '2022-01-19 14:00:49', '01922888765');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_section`
--
ALTER TABLE `about_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands_section`
--
ALTER TABLE `brands_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_address`
--
ALTER TABLE `contact_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_images`
--
ALTER TABLE `feature_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_section`
--
ALTER TABLE `feature_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fun_facts`
--
ALTER TABLE `fun_facts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_from_user`
--
ALTER TABLE `message_from_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolio_section`
--
ALTER TABLE `portfolio_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section_headers`
--
ALTER TABLE `section_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services_experience`
--
ALTER TABLE `services_experience`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_information`
--
ALTER TABLE `site_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_social_share`
--
ALTER TABLE `site_social_share`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_members_social_links`
--
ALTER TABLE `team_members_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial_section`
--
ALTER TABLE `testimonial_section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_section`
--
ALTER TABLE `about_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brands_section`
--
ALTER TABLE `brands_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_address`
--
ALTER TABLE `contact_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `feature_images`
--
ALTER TABLE `feature_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feature_section`
--
ALTER TABLE `feature_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fun_facts`
--
ALTER TABLE `fun_facts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `message_from_user`
--
ALTER TABLE `message_from_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `portfolio_section`
--
ALTER TABLE `portfolio_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `section_headers`
--
ALTER TABLE `section_headers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `services_experience`
--
ALTER TABLE `services_experience`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `site_information`
--
ALTER TABLE `site_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_social_share`
--
ALTER TABLE `site_social_share`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `team_members_social_links`
--
ALTER TABLE `team_members_social_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimonial_section`
--
ALTER TABLE `testimonial_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
