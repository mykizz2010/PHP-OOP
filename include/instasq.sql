-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2017 at 06:46 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `instasq`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 1, 1, 'Nice Picture bro, well done sir,', '2017-11-04 09:14:56'),
(2, 1, 2, 'Hello Dear!', '2017-11-04 09:21:02'),
(3, 1, 2, 'Maya i like your picture can you share it please, thankx.', '2017-11-04 09:24:26'),
(4, 2, 1, 'Mr Adam longest time, where hav you been.', '2017-11-04 09:26:13'),
(5, 2, 2, 'My sis i dey oo, how is work?', '2017-11-04 09:27:34'),
(6, 1, 2, 'Hello mary\n', '2017-11-06 11:53:14'),
(7, 2, 2, 'Am fin nd u', '2017-11-16 09:46:28'),
(8, 1, 2, 'I hear u', '2017-11-16 09:47:02'),
(9, 2, 2, 'hfhffkfhfhffk', '2017-11-16 12:12:28'),
(10, 1, 2, 'ldddddddddddddddd', '2017-11-16 12:12:47'),
(11, 2, 2, 'Hello Sir', '2017-11-17 17:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `followed` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `follower`, `followed`, `created_at`) VALUES
(4, 2, 1, '2017-11-05 20:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`, `created_at`) VALUES
(20, 2, 1, '2017-11-06 11:52:54');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_path` varchar(255) NOT NULL,
  `caption` varchar(60) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `media_path`, `caption`, `description`, `created_at`) VALUES
(1, 1, 'upload/73c0e4d12c353f14b336617f6aec1f596e99f0e1f7dfcab438a77a45d7867a31_1509782785.jpg', 'HAPPY BIRTHDAY TO MY LOVELY NEPHEW', 'HAPPY BIRTHDAY TO MY LOVELY NEPHEW', '2017-11-04 09:06:25'),
(2, 2, 'upload/62f8aab05748b03468d7e049935b2f846d2e18fc5eebc559dc089a634e1319f8_1509782908.jpg', 'Hello Guys, Happy New Month', 'I took this photo this morning. What do you guys think?', '2017-11-04 09:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(34) DEFAULT NULL,
  `role` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `salt`, `role`, `created_at`) VALUES
(1, 'adminmike', 'Admin Michael Domince', 'admin@gmail.com', 'da331719e15416d2580bd71a3767e0940a3c5c32ed5d4df6e73c6f4eea585e69', 'ëUÀýŠ¶ó‰yc>_>›¢oCò“•³š‰3', 1, '2017-10-25 23:44:42'),
(2, 'osohomike', 'Adam William P', 'me@me.com', '2ea74966e66673101f2ff270f38e4a34386a6b985def17469cc9f0ff3735be15', '¨:‹Ë,KP*”†¼mHÓ{æ5YHo(qO', 1, '2017-10-26 00:01:40'),
(3, 'michael', 'mike mikal', 'mike@me.com', '726f869fcf87d7ce4007bcf3edc661b467320dcb85267284771f214475ca3b2e', 'Ÿð½¸Ã”Š ‚·ÌÇ‹=›°*Ö\n¬*·Í£aœ…', 1, '2017-11-05 10:50:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
