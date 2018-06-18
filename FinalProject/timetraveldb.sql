-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 01, 2018 at 10:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `timetraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order#` int(13) NOT NULL,
  `paid` float(9,2) NOT NULL,
  `purchasedate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order#`, `paid`, `purchasedate`, `user_id`) VALUES
(3, 38.99, '2018-04-10 10:33:03', 2),
(4, 38.99, '2018-04-10 10:33:04', 3),
(5, 58.99, '2018-04-10 10:33:51', 4),
(6, 1833.99, '2018-04-10 10:33:51', 5),
(7, 58.99, '2018-04-10 10:33:51', 8);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_num` int(13) NOT NULL,
  `title` varchar(50) NOT NULL,
  `message` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `author_id` int(13) NOT NULL,
  `username` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_num`, `title`, `message`, `date_posted`, `author_id`, `username`) VALUES
(1, 'Winning the Lottery', 'The Time Travel Agency really got me what I wanted. I am a lottery winning multimillionaire!', '2018-04-09 18:05:11', 5, 'LetFreedomRing'),
(2, 'Al Stone Threatens to offer nukes to Soviet Union', 'I swear to you, if they don''t listen to me, I''ll go right to 2600 and take some right back to Stalin and destroy their technology for good!', '2018-04-09 18:08:10', 3, 'TimeforChang'),
(3, 'Anglos: British and Americans Reunite over Hunting', 'Ye my boy Bobby Dowenger here took us back to some dodo hunting, then I offered him some buffalos up in Indiana. Good times.', '2018-04-09 18:11:13', 4, 'BigGameHunters'),
(4, 'A Message to my Boy John by Henry Winchester', 'John, I swear to you I never meant to leave you this way. Also your boys are fine.', '2018-04-09 18:14:09', 2, 'ManofLetters'),
(5, 'Moore goes back in time nearly two years', 'The speed of computers will double every 18 months.', '2018-04-09 18:15:47', 8, 'MooreTime');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_num` int(13) NOT NULL,
  `destination` varchar(13) NOT NULL,
  `time_period` int(4) NOT NULL,
  `cost` float(9,2) NOT NULL,
  `user_id` int(13) NOT NULL,
  `images` varchar(256) DEFAULT NULL,
  `description` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_num`, `destination`, `time_period`, `cost`, `user_id`, `images`, `description`) VALUES
(2, 'Marion County', 0, 79.99, 4, 'https://i.imgur.com/Hj2lmoC.jpg', 'Where will you travel? Maybe you want to see your hometown in its earliest stages? Take a trip back in time to visit Marion County in its simplest times! You will not regret it. '),
(4, 'Soviet Union', 1949, 19.49, 3, 'https://i.imgur.com/8gjjLD5.jpg', 'Are you a thrill seeker? Take a trip to the war times of the Soviet Union. Remember, nukes are relative! The Time Travel Agency is not liable for any injuries occurring related to nukes, rifles, or other weapons of war.\n'),
(6, 'Next of Kin', 2013, 20.13, 2, 'https://i.imgur.com/NhcHFeq.jpg', 'Have you ever wondered what your children or grandchildren will be like in the future? Wonder no more! The Time Travel Agency will send you forward in time, so you can meet them before you are too old to really enjoy your time with them!'),
(8, 'IBM', 2017, 20.17, 8, 'https://i.imgur.com/AR3tSE4.jpg', 'Would you like to be predict the future? Moores Law was the principle that computers would double in speed every 2 years. With the help of The Time Travel Agency you can go back to 1965 to assist in the discovery of this principle. Or you could disprove it. The choice is yours!'),
(10, 'Virginia', 0, 18.25, 4, 'https://i.imgur.com/CnGI7M0.jpg', 'Do you like powdered wigs? What about riding stupid horses instead of driving cars? Who needs AC when you can sit around in full wool suits in the middle of summer? This is the trip for you!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(13) NOT NULL,
  `firstname` varchar(14) NOT NULL,
  `lastname` varchar(16) NOT NULL,
  `email` varchar(24) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(16) NOT NULL,
  `role` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 1),
(2, 'Randy', 'Winchester', 'hwinchester@aol.com', 'ManofLetters', 'SorrySon', 2),
(3, 'Albert', 'Einstein', 'alstone@aol.com', 'TimeforChang', 'NukesAreRelative', 2),
(4, 'Hemet', 'Nesingwary', 'OlNessMonster@aol.com', 'BigGameHunters', 'HuntingForever', 2),
(5, 'John', 'Locke', 'jlocke@excellency.com', 'LetFreedomRing', 'GloriousRev', 2),
(8, 'Gordon', 'Moore', 'gmoore@gmail.com', 'MooreTime', 'Getmoore', 2),
(10, 'test', 'test', 'teast@gmail.com', 'testboy', 'test', 2),
(13, 'testAgain', 'teat', 'tester@yao.com', 'here', 'wego', 2),
(15, 'five', 'siz', 'erawer@goma.com', 'hadfasd', 'dkdkdk', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order#`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_num`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`),
  ADD UNIQUE KEY `username_4` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order#` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_num` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_num` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(13) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
