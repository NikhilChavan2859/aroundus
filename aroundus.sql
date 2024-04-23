-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2024 at 07:40 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aroundus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `emailid`, `password`) VALUES
(1, 'admin1', 'admin@aroundus.com', '12345'),
(2, 'admin2', 'admin2@aroundus.com', '12345'),
(3, 'admin3', 'admin3@aroundus.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `emailid`, `name`, `subject`, `message`) VALUES
(1, 'rohit@gmail.com', 'Rohit', 'hi', 'bye');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(50) NOT NULL,
  `ProfilePic` varchar(200) NOT NULL,
  `availability` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `maplink` varchar(500) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `personname` varchar(50) NOT NULL,
  `personnumber` varchar(50) NOT NULL,
  `personemailid` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `ProfilePic`, `availability`, `emailid`, `title`, `description`, `type`, `country`, `state`, `city`, `address`, `maplink`, `pincode`, `price`, `personname`, `personnumber`, `personemailid`) VALUES
(1, 'd41d8cd98f00b204e9800998ecf8427e1684095128.png', 'yes', 'rohit@gmail.com', 'rohit', 'rohit bhadaneupdated', 'Rent', 'India', 'Maharashtra', 'Nandurbar', 'akurdiupdated', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d121058.93187086079!2d73.78056535957826!3d18.52476137546788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1684095069668!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '424304', '100074', 'Rohitupdated', '4141414141', 'rohitbhadane@gmail.in'),
(3, 'd41d8cd98f00b204e9800998ecf8427e1684518503.png', 'yes', 'sohan@gmail.com', 'asas', 'rohit shinde', 'Rent', 'India', 'Maharashtra', 'Sangli', 'asdfghjklqwertyuiopzxcvbnm', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60485.68056109482!2d73.73327689397563!3d18.648057554969743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b75925561ec9%3A0x9fc8fd9d1d556512!2sAppu%20Ghar!5e0!3m2!1sen!2sin!4v1684518473219!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '424242', '1000', 'asdfgl', '96385241', 'dvjk@gmail.com'),
(4, 'd41d8cd98f00b204e9800998ecf8427e1684518673.png', 'no', 'rohit@gmail.com', 'ad', 'ad', 'Rent', 'India', 'Maharashtra', 'Mumbai', 'asdfncvb', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60485.68056109482!2d73.73327689397563!3d18.648057554969743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b75925561ec9%3A0x9fc8fd9d1d556512!2sAppu%20Ghar!5e0!3m2!1sen!2sin!4v1684518473219!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '777', '375', 'esdf', '83453', 'erhfg@gmail.com'),
(5, 'd41d8cd98f00b204e9800998ecf8427e1684520276.png', 'yes', 'rohit@gmail.com', 'qw', 'qw', 'Service', 'India', 'Maharashtra', 'Thane', 'asqweqasdwe', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60485.68056109482!2d73.73327689397563!3d18.648057554969743!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2b75925561ec9%3A0x9fc8fd9d1d556512!2sAppu%20Ghar!5e0!3m2!1sen!2sin!4v1684518473219!5m2!1sen!2sin\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '727', '4', 'werf', '754', 'wrd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `emailid`, `password`) VALUES
(1, 'superadmin', 'superadmin@aroundus.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `emailid`, `password`) VALUES
(1, 'Rohit', 'rohit@gmail.com', '12345'),
(2, 'Sohan', 'sohan@gmail.com', '12345'),
(3, 'raj', 'raj@gmail.com', '12345'),
(4, 'pranav', 'pranav@gmail.com', '12345'),
(5, 'ganesh', 'ganesh@gmail.com', '12345'),
(6, 'sonali', 'sonalipawar@gmail.com', '2222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
