-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2021 at 07:49 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL,
  `admin_name` varchar(22) NOT NULL,
  `admin_email` varchar(33) NOT NULL,
  `admin_password` varchar(22) NOT NULL,
  `admin_pic` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_pic`) VALUES
(6, 'Mesum Raza', 'rmesum786@gmail.com', '123456', 'adminpic/safian-removebg-preview.png');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(22) NOT NULL,
  `room_no` varchar(22) NOT NULL,
  `type` varchar(22) NOT NULL,
  `guest_email` varchar(22) NOT NULL,
  `guest_name` varchar(22) NOT NULL,
  `contact no` varchar(12) NOT NULL,
  `city` varchar(22) NOT NULL,
  `child` varchar(22) NOT NULL,
  `adult` varchar(22) NOT NULL,
  `cin` date NOT NULL,
  `cout` date NOT NULL,
  `nodays` varchar(22) NOT NULL,
  `stat` varchar(11) NOT NULL,
  `final_stat` int(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `room_no`, `type`, `guest_email`, `guest_name`, `contact no`, `city`, `child`, `adult`, `cin`, `cout`, `nodays`, `stat`, `final_stat`) VALUES
(60, '3', 'Double_Non_Ac', 'mohsin4332@gmail.com', 'Mohsin Younis', '03078687654', 'Multan', '1', '2', '2021-07-29', '2021-08-05', '7', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(15) NOT NULL,
  `city_name` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`) VALUES
(1, 'Multan'),
(2, 'Lahore'),
(3, 'IslamAbad'),
(4, 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `message` varchar(150) NOT NULL,
  `status` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(15) NOT NULL,
  `guest_name` varchar(22) NOT NULL,
  `guest_email` varchar(33) NOT NULL,
  `guest_password` varchar(15) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `city_id` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `guest_name`, `guest_email`, `guest_password`, `contact_no`, `address`, `gender`, `city_id`) VALUES
(32, 'Mohsin Younis', 'mohsin4332@gmail.com', '123456', '03078687654', 'Mohallah Shah shams road multam', 'Male', '1'),
(33, 'Zahida Parveen', 'ali@gmail.com', '123456', '03216398398', 'Muhallah Hussain abad multan saraikistan', 'Male', '4');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(22) NOT NULL,
  `name` varchar(22) NOT NULL,
  `email` varchar(22) NOT NULL,
  `message` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`, `date`, `status`) VALUES
(1, 'Mohsin Younis', 'mohsin4332@gmail.com', '                              Welcome! Mohsin Younis.  Room No 3 Has Booked for You.                            ', '2021-07-29 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(22) NOT NULL,
  `title` varchar(33) NOT NULL,
  `news` varchar(150) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` int(15) NOT NULL,
  `rent` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `rent`) VALUES
(1, '1000'),
(2, '2000'),
(3, '3000'),
(4, '4000');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(15) NOT NULL,
  `room_no` varchar(30) NOT NULL,
  `type_id` varchar(20) NOT NULL,
  `status_id` varchar(5) NOT NULL,
  `f_status_id` int(22) NOT NULL,
  `image` varchar(350) NOT NULL,
  `rent_id` varchar(300) NOT NULL,
  `facilities` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_no`, `type_id`, `status_id`, `f_status_id`, `image`, `rent_id`, `facilities`, `description`) VALUES
(22, '3', '10', '1', 1, 'room/7f8c9f3b523ec34720283ba1675e1ccc-removebg-preview.png', '3', 'dfcsdfcsdfsdfsdfsdfsdcffcasdfasdwfsefvasdefcsewdfsdewf', 'sdfgvasdfgvsdagfvsdfgvsdafasd'),
(23, '4', '10', '0', 0, 'room/7f8c9f3b523ec34720283ba1675e1ccc-removebg-preview.png', '4', 'addewfewfcewfewvewrfvewfewrfcer', 'fewrfewrcfewrfgverfvgergvervgergvergvergv');

-- --------------------------------------------------------

--
-- Table structure for table `room_type`
--

CREATE TABLE `room_type` (
  `type_id` int(15) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room_type`
--

INSERT INTO `room_type` (`type_id`, `type`) VALUES
(8, 'Single_Non_Ac'),
(9, 'Single_Ac'),
(10, 'Double_Non_Ac'),
(11, 'Double_Ac');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(22) NOT NULL,
  `title` varchar(22) NOT NULL,
  `description` varchar(150) NOT NULL,
  `image` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `image`) VALUES
(3, 'Free WI-FI', 'There is fully signal available Wi-Fi in our LUXURY INN hotel for our beloved customers.', 'room/7a5f8e7f8d5cb0c511a55793c3f3309b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status`) VALUES
(0, 'Available'),
(1, 'Booked');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `room_type`
--
ALTER TABLE `room_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rent`
--
ALTER TABLE `rent`
  MODIFY `rent_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `room_type`
--
ALTER TABLE `room_type`
  MODIFY `type_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
