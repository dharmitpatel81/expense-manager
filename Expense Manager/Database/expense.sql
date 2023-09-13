-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2021 at 07:56 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expense`
--

-- --------------------------------------------------------

--
-- Table structure for table `plandetails`
--

CREATE TABLE `plandetails` (
  `plan_id` int(11) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `plan_title` varchar(255) NOT NULL,
  `plan_from_date` date NOT NULL,
  `plan_to_date` date NOT NULL,
  `plan_budget` varchar(255) NOT NULL,
  `no_of_people` int(11) NOT NULL,
  `rand_num` int(11) NOT NULL,
  `first_person` varchar(255) NOT NULL,
  `second_person` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plandetails`
--

INSERT INTO `plandetails` (`plan_id`, `user_email`, `plan_title`, `plan_from_date`, `plan_to_date`, `plan_budget`, `no_of_people`, `rand_num`, `first_person`, `second_person`) VALUES
(43, 'dk7479791784@gmail.com', 'Mumbai', '2019-04-12', '2019-04-09', '505', 2, 587946, 'Dharmendra Kumar', 'Ranjit Kumar'),
(44, 'dk7479791784@gmail.com', 'Goa', '2019-04-12', '2019-04-18', '909', 2, 587946, 'Dharmendra Kumar', 'Ranjit Kumar'),
(45, 'dk7479791784@gmail.com', 'Mumbai', '2019-04-12', '2019-04-16', '10010', 1, 587946, 'Dharmendra Kumar', ''),
(46, 'dk7479791784@gmail.com', 'Rame', '2019-04-16', '2019-04-20', '11011', 2, 589476, 'Ayush', 'Ranjit Kumar'),
(47, 'rajiv@gmail.com', 'Mumbai', '2019-04-12', '2019-04-14', '74', 1, 965478, 'Dharmendra Kumar', 'Ranjit Kumar'),
(48, 'rajiv@gmail.com', 'Goa', '2019-04-15', '2019-04-19', '808', 2, 654897, 'Ayush', 'Ranjit Kumar'),
(49, 'rajiv@gmail.com', 'Rame', '2019-04-12', '2019-04-15', '707', 1, 658947, 'Dharmendra Kumar', 'Ranjit Kumar'),
(50, 'rajiv@gmail.com', 'Goa', '2021-04-12', '2021-04-14', '909', 1, 567489, 'Dharmendra Kumar', 'Dharmid');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`) VALUES
(1, 'Ayush patel', 'boven11611@dvdoto.com', 'e51b8ec1840a48c9e0e5f90c3e2eda8d', '4565253256'),
(10, 'Dharmendra Kumar', 'dk7479791783@gmail.com', 'ad61ab143223efbc24c7d2583be69251', '7479791783'),
(15, 'rahim', 'rahim@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234568745'),
(13, '', '', 'd41d8cd98f00b204e9800998ecf8427e', ''),
(14, 'ram', 'ram@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567892'),
(12, 'lk', 'dk7479791784@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7896541235'),
(11, 'dh', 'hj@gmil.com', 'e10adc3949ba59abbe56e057f20f883e', '4789652158'),
(16, 'hjkm', 'hi@gmail.com', '9cf6f9edb58e7f3dadc1f65fdbe58b7a', '8478965235'),
(17, 'Dk', 'dk@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7777777777'),
(18, 'Rajiv Kumar', 'rajivkumar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7412589632'),
(19, 'rajiv kumar', 'rajiv@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1236547896');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `plandetails`
--
ALTER TABLE `plandetails`
  ADD PRIMARY KEY (`plan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `plandetails`
--
ALTER TABLE `plandetails`
  MODIFY `plan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
