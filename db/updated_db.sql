-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2015 at 12:02 AM
-- Server version: 5.5.38
-- PHP Version: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `imgupload`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
`id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`) VALUES
(7, 'this is a comment 1'),
(8, 'this is a comment 2'),
(9, 'this is a profile pic comment 1'),
(10, 'this is a profile pic comment 2');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
`id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`) VALUES
(6, 'https://lh5.googleusercontent.com/-ZGl_1Pp9iqc/AAAAAAAAAAI/AAAAAAAAADk/C9V2K9ZG3_M/photo.jpg'),
(7, 'http://barkpost-assets.s3.amazonaws.com/wp-content/uploads/2013/11/grumpy-dog-11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images_comments`
--

CREATE TABLE `images_comments` (
  `image_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images_comments`
--

INSERT INTO `images_comments` (`image_id`, `comment_id`) VALUES
(6, 7),
(7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
`id` int(11) NOT NULL,
  `path` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `path`) VALUES
(19, 'http://www.rovers.co.uk/images/common/bg_player_profile_default_big.png'),
(20, 'http://displaypix.com/images/items/thumb/220_itm_little-boys-profile-pictures2013-02-04_21-50-47_3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profiles_comments`
--

CREATE TABLE `profiles_comments` (
  `profile_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profiles_comments`
--

INSERT INTO `profiles_comments` (`profile_id`, `comment_id`) VALUES
(19, 9),
(20, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'testy1', 'testy1'),
(2, 'testy2', 'testy2'),
(3, 'testy1', 'testy1'),
(4, 'testy2', 'testy2');

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`user_id`, `image_id`) VALUES
(1, 6),
(1, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE `user_profiles` (
  `user_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profiles`
--

INSERT INTO `user_profiles` (`user_id`, `profile_id`) VALUES
(1, 19),
(1, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_comments`
--
ALTER TABLE `images_comments`
 ADD UNIQUE KEY `image_id` (`image_id`,`comment_id`) COMMENT 'images and comments should be unique', ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profiles_comments`
--
ALTER TABLE `profiles_comments`
 ADD UNIQUE KEY `profile_id` (`profile_id`,`comment_id`) COMMENT 'profile_id and comment_id must be unique', ADD KEY `comment_id` (`comment_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
 ADD UNIQUE KEY `user_id` (`user_id`,`image_id`) COMMENT 'unique image and user id combi', ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `user_profiles`
--
ALTER TABLE `user_profiles`
 ADD UNIQUE KEY `user_id` (`user_id`,`profile_id`) COMMENT 'user id and profile id unique', ADD KEY `profile_id` (`profile_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `images_comments`
--
ALTER TABLE `images_comments`
ADD CONSTRAINT `images_comments_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `images_comments_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profiles_comments`
--
ALTER TABLE `profiles_comments`
ADD CONSTRAINT `profiles_comments_ibfk_2` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `profiles_comments_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_images`
--
ALTER TABLE `user_images`
ADD CONSTRAINT `user_images_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_images_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_profiles`
--
ALTER TABLE `user_profiles`
ADD CONSTRAINT `user_profiles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `user_profiles_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
