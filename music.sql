-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2017 at 04:11 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `album_id` int(11) NOT NULL,
  `album_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `album_img` varchar(255) DEFAULT NULL,
  `album_info` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `cate_id` int(11) NOT NULL,
  `album_viewed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`album_id`, `album_name`, `album_img`, `album_info`, `cate_id`, `album_viewed`) VALUES
(1, 'Ngày Ta Xa Nhau', NULL, NULL, 1, 0),
(2, 'Nơi Này Có Anh (Single)', NULL, NULL, 1, 0),
(3, 'Cảm Ơn Anh (Single)', NULL, NULL, 1, 0),
(4, 'My Voice (The 1st Album)', NULL, NULL, 4, 0),
(5, 'K-Pop Top Hits', NULL, NULL, 4, 0),
(6, 'Act.2 Narcissus (Mini Album)', NULL, NULL, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `album_singer`
--

CREATE TABLE `album_singer` (
  `album_id` int(11) NOT NULL,
  `singer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int(11) NOT NULL,
  `cate_name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `cate_type` tinyint(1) NOT NULL DEFAULT '0',
  `cate_order` int(3) NOT NULL DEFAULT '0',
  `cate_parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_type`, `cate_order`, `cate_parent`) VALUES
(1, 'Việt Nam', 0, 0, NULL),
(2, 'US-UK', 0, 0, NULL),
(3, 'Nhạc Hoa', 0, 0, NULL),
(4, 'Nhạc Hàn', 0, 0, NULL),
(5, 'Nhạc Nhật', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `m_id` int(11) NOT NULL,
  `m_title` varchar(150) NOT NULL,
  `album_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `m_poster` varchar(150) DEFAULT NULL,
  `m_lyric` varchar(500) DEFAULT NULL,
  `m_type` tinyint(1) NOT NULL DEFAULT '0',
  `m_created` date NOT NULL,
  `m_url` varchar(250) NOT NULL,
  `m_viewed` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`m_id`, `m_title`, `album_id`, `cate_id`, `m_poster`, `m_lyric`, `m_type`, `m_created`, `m_url`, `m_viewed`) VALUES
(1, 'test', 1, 1, 'eeeeeeeeeeeeee', 'eeeeeeeeeeee', 1, '2017-03-08', 'gfdgfdgfgfd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `media_singer`
--

CREATE TABLE `media_singer` (
  `m_id` int(11) NOT NULL,
  `singer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `playlist_id` int(11) NOT NULL,
  `playlist_name` varchar(150) CHARACTER SET utf8mb4 NOT NULL,
  `playlist_description` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `singer`
--

CREATE TABLE `singer` (
  `singer_id` int(11) NOT NULL,
  `singer_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `singer_img` varchar(255) DEFAULT NULL,
  `singer_info` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `singer_type` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `singer`
--

INSERT INTO `singer` (`singer_id`, `singer_name`, `singer_img`, `singer_info`, `singer_type`) VALUES
(1, 'Huỳnh Lộc', NULL, NULL, 0),
(2, 'Nguyễn Hữu Thành', NULL, NULL, 0),
(3, 'Sarah Lê', NULL, NULL, 0),
(4, 'Sơn Tùng M-TP', NULL, NULL, 0),
(5, 'Quốc Thiên', NULL, NULL, 0),
(6, 'Hoàng Yến Chibi', NULL, NULL, 0),
(7, 'Bằng Cường', NULL, NULL, 0),
(8, 'Chi Dân', NULL, NULL, 0),
(9, 'Trung Quân Idol', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_playlist`
--

CREATE TABLE `user_playlist` (
  `user_id` int(11) NOT NULL,
  `playlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Indexes for table `album_singer`
--
ALTER TABLE `album_singer`
  ADD PRIMARY KEY (`album_id`,`singer_id`),
  ADD KEY `singer_id` (`singer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`),
  ADD KEY `cate_parent` (`cate_parent`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `cate_id` (`cate_id`),
  ADD KEY `album_id` (`album_id`);

--
-- Indexes for table `media_singer`
--
ALTER TABLE `media_singer`
  ADD PRIMARY KEY (`m_id`,`singer_id`),
  ADD KEY `singer_id` (`singer_id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`playlist_id`);

--
-- Indexes for table `singer`
--
ALTER TABLE `singer`
  ADD PRIMARY KEY (`singer_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD PRIMARY KEY (`user_id`,`playlist_id`),
  ADD KEY `playlist_id` (`playlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `playlist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `singer`
--
ALTER TABLE `singer`
  MODIFY `singer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`);

--
-- Constraints for table `album_singer`
--
ALTER TABLE `album_singer`
  ADD CONSTRAINT `album_singer_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `album_singer_ibfk_2` FOREIGN KEY (`singer_id`) REFERENCES `singer` (`singer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`cate_parent`) REFERENCES `category` (`cate_id`);

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`album_id`) REFERENCES `album` (`album_id`);

--
-- Constraints for table `media_singer`
--
ALTER TABLE `media_singer`
  ADD CONSTRAINT `media_singer_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `media` (`m_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `media_singer_ibfk_2` FOREIGN KEY (`singer_id`) REFERENCES `singer` (`singer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_playlist`
--
ALTER TABLE `user_playlist`
  ADD CONSTRAINT `user_playlist_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlist` (`playlist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_playlist_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
