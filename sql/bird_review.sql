-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2016 at 09:57 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bird_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `birds`
--

CREATE TABLE `birds` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `birds`
--

INSERT INTO `birds` (`id`, `name`, `image_url`) VALUES
(1, 'Red tailed Hawk Buteo jamaicensis', 'http://localhost/birds/assets/images/Red-tailed_Hawk_Buteo_jamaicensis_Full_Body_1880px.jpg'),
(2, 'Brushland Tinamou', 'http://localhost/birds/assets/images/745px-Brushland_Tinamou.jpg'),
(3, 'Andean Tinamou RWD', 'http://localhost/birds/assets/images/Andean_Tinamou_RWD.jpg'),
(4, 'Athene noctua', 'http://localhost/birds/assets/images/Athene_noctua_(cropped).jpg'),
(5, 'California Condor', 'http://localhost/birds/assets/images/California_Condor.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bird_review`
--

CREATE TABLE `bird_review` (
  `id` int(11) NOT NULL,
  `birds_id` int(11) NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `viewer_key` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bird_review`
--

INSERT INTO `bird_review` (`id`, `birds_id`, `reviewer_name`, `viewer_key`, `review`, `rating`) VALUES
(1, 1, 'Nikil Sharma', 4756, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(2, 1, 'jamesh golshign', 2005, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5),
(3, 2, 'Ram James', 2323, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3),
(4, 2, 'Saagar Sharam', 2313, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(5, 3, 'Sumrabin Sharma', 4442, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 3),
(6, 3, 'Anish lin', 7567, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 2),
(7, 4, 'alex links', 1222, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 4),
(8, 4, 'Spana Kol', 8686, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5),
(12, 5, 'Lorem', 8978, 'this is review', 4),
(13, 2, 'suman', 4657, 'fasfasdf', 4),
(10, 5, 'Lorem Sharma', 6685, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `birds`
--
ALTER TABLE `birds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bird_review`
--
ALTER TABLE `bird_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bird_key` (`birds_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `birds`
--
ALTER TABLE `birds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `bird_review`
--
ALTER TABLE `bird_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
