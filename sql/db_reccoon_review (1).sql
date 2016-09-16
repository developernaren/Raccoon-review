-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2016 at 01:14 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reccoon_review`
--

-- --------------------------------------------------------

--
-- Table structure for table `example`
--

CREATE TABLE `example` (
  `id` int(11) NOT NULL,
  `name` varchar(252) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `example`
--

INSERT INTO `example` (`id`, `name`, `location`) VALUES
(1, 'rabin', 'New'),
(2, 'rabin', 'New'),
(3, 'rabin', 'New'),
(4, 'fadf', 'dfsadsf'),
(5, 'fadf', 'dfsadsf'),
(6, 'fadf', 'dfsadsf'),
(7, 'Subash', 'Kathddd'),
(8, 'dfasdf', 'Kathddd'),
(9, 'mayaalu', 'Hello'),
(10, 'New Content', 'is going there'),
(11, 'Mayaa ko ', 'Aggo laagyo'),
(12, 'malai', 'bachaau'),
(13, 'malai', 'bachaau'),
(14, 'malai', 'bachaau'),
(15, 'malai', 'bachaau'),
(16, 'malai', 'bachaau'),
(17, 'malai', 'bachaau'),
(18, 'malai', 'bachaau'),
(19, 'malai', 'bachaau'),
(20, 'malai', 'bachaau'),
(21, 'malai', 'bachaau'),
(22, 'malai', 'bachaau'),
(23, 'malai', 'bachaau'),
(24, 'malai', 'bachaau'),
(25, 'malai', 'bachaau'),
(26, 'malai', 'bachaau'),
(27, 'malai', 'bachaau'),
(28, 'malai', 'bachaau'),
(29, 'malai', 'bachaau'),
(30, 'malai', 'bachaau'),
(31, '', ''),
(32, '', ''),
(33, '', ''),
(34, '', ''),
(35, '', ''),
(36, '', ''),
(37, 'hello', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `raccoon_id` int(11) NOT NULL,
  `reviewer_name` varchar(255) NOT NULL,
  `viewer_key` int(11) NOT NULL,
  `review` text NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `raccoon_id`, `reviewer_name`, `viewer_key`, `review`, `rating`) VALUES
(1, 1, 'John Methew', 1234, 'In the wild, raccoons often dabble for underwater food near the shore-line. They then often pick up the food item with their front paws to examine it and rub the item, sometimes to remove unwanted parts.', 4),
(2, 1, 'Albert Einstein', 4321, 'This gives the appearance of the raccoon "washing" the food. The tactile sensitivity of raccoons\' paws is increased if this rubbing action is performed underwater, since the water softens the hard layer covering the paws.', 5),
(3, 2, 'Anna K. Behrensmeyer', 1111, 'Bandit-masked raccoons are a familiar sight just about everywhere, because they will eat just about anything. These ubiquitous mammals are found in forests, marshes, prairies, and even in cities.', 3),
(4, 2, 'Caroline Herschel', 2222, 'In the natural world, raccoons snare a lot of their meals in the water. These nocturnal foragers use lightning-quick paws to grab crayfish, frogs, and other aquatic creatures. On land, they pluck mice and insects from their hiding places and raid nests for tasty eggs.', 2),
(5, 3, 'Dorothy Hodgkin', 3333, 'Raccoons are highly intelligent and curious creatures, but they can also be a nuisance to any homeowner. These nocturnal mammals can destroy gardens, make a mess by tipping over garbage cans, and can cause structural damage in search of food. On this page, you will learn general raccoon facts and how to identify raccoon damage.', 5),
(6, 3, 'Edmond Halley', 4444, 'Raccoons are extremely adaptable. They are often found in suburban and urban areas, making their homes in man-made structures like attics, sewers, barns and sheds. In urban areas, raccoons tend to stay closer to their dens with a range of only about 1 mile, depending on their age and sex.', 3),
(7, 4, 'Flossie Wong-Staal', 5555, 'Raccoons are omnivores with an opportunistic diet; eating almost anything they can get their paws on. In urban areas, where wildlife and fresh vegetation are limited, raccoons will be more likely to eat human food and invade trashcans. The majority of their diet consists of sweet foods like fruits and invertebrates.', 2),
(8, 4, 'Geraldine Seydoux', 6666, 'Although raccoons are notorious for carrying rabies, there has only been one recorded human death from raccoon rabies in the United States. Some signs that a raccoon may have rabies include aggressiveness, unusual vocalization, and excessive drool or foam from the mouth. If you think you may have identified a rabid raccoon, call your local animal control authority immediately.', 4),
(9, 5, 'Jacqueline K. Barton', 7777, 'Raccoons in the northern parts of their range gorge themselves in spring and summer to store up body fat. They then spend much of the winter asleep in a den. There are six other species of raccoons, in addition to the familiar northern (North American) raccoon. Most other species live on tropical islands.', 5),
(10, 5, 'Michael Faraday', 8888, 'These ring-tailed animals are equally opportunistic when it comes to choosing a denning site. They may inhabit a tree hole, fallen log, or a house\'s attic. Females have one to seven cubs in early summer. The young raccoons often spend the first two months or so of their lives high in a tree hole. Later, mother and children move to the ground when the cubs begin to explore on their own.', 4),
(12, 1, 'Narendra', 1, 'this is aweoine', 1),
(13, 1, 'Narendra', 1, 'this is aweoine', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_raccoon`
--

CREATE TABLE `tbl_raccoon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT 'raccoon name',
  `image_url` varchar(255) NOT NULL COMMENT 'Licence image url'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_raccoon`
--

INSERT INTO `tbl_raccoon` (`id`, `name`, `image_url`) VALUES
(1, 'Florida raccoo', 'http://localhost/Raccoon-review/assets/images/Curious_Raccoon.jpg'),
(2, 'Cozumel raccoon', 'http://localhost/Raccoon-review/assets/images/Cozumel_Raccoon1.jpg'),
(3, 'Albino raccoon', 'http://localhost/Raccoon-review/assets/images/Albino_raccoon.png'),
(4, 'Raccoon Cudjoe Key Florida', 'http://localhost/Raccoon-review/assets/images/Raccoon_Cudjoe_Key_Florida.jpg'),
(5, 'Hello ', 'http://localhost/Raccoon-review/assets/images/Waschbaer_auf_dem_Dach.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `example`
--
ALTER TABLE `example`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_raccoon` (`raccoon_id`);

--
-- Indexes for table `tbl_raccoon`
--
ALTER TABLE `tbl_raccoon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `example`
--
ALTER TABLE `example`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_raccoon`
--
ALTER TABLE `tbl_raccoon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
