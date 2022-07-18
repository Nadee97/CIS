-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 11:54 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cisdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `login_time` datetime NOT NULL,
  `logout_time` datetime NOT NULL,
  `login_ip` text NOT NULL,
  `login_status` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `login_time`, `logout_time`, `login_ip`, `login_status`, `user_id`) VALUES
(199, '2022-07-18 15:15:32', '0000-00-00 00:00:00', '::1', 'in', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pwd` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `user_name`, `user_pwd`, `user_id`) VALUES
(1, 'nadeeshan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1),
(2, 'cis114', '1e910dc491b9213f2f7fde56aa9f4bcad5a2480f', 12),
(3, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 13),
(4, 'cis115', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 14),
(5, 'cis116', 'ead72fe7d71362eebe6f580074f02272ad62d551', 15),
(6, 'cis117', 'f2380de5626ea407a2bb7e84f7db68bf747c6844', 16),
(7, 'cis118', '6c7e00cccb6038dff5e271a463decce460117192', 17),
(8, 'cis119', 'c56ac6518f84d6960092f06b600f7f159db521a7', 18),
(9, 'cis119', 'c56ac6518f84d6960092f06b600f7f159db521a7', 19),
(10, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 20),
(11, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 21),
(12, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 22),
(13, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 23),
(14, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 24),
(15, 'cis020', '5728f3072ac1b0b8a4909e5188ee660b239ad513', 25),
(16, 'cis021', '147f6d1ca60ebba6798a2afc38e15967ed943960', 26),
(17, 'cisjhgjh', '9b789b5ec5d45bcf73a5bb178b08483ea280e4fb', 27),
(18, 'cis007', '58c3bf5d4b2d6900e9f0b6fda506f8d26e8ad3f6', 28),
(19, 'cis007', '5b1b278dd413cb78ef48898a4257efa6247dd192', 29),
(20, 'cis', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 30),
(21, 'cistest555', 'b04e5e3520e82b7e544603afa741ca4544217fcf', 31);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`) VALUES
(1, 'User Management');

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`module_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(2, 4),
(3, 1),
(3, 2),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 4),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(8, 3),
(9, 1),
(9, 2),
(10, 1),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_desc`) VALUES
(1, 'Super User', 'This is the highest privileged user in the system'),
(2, 'Admin', 'This is the 2nd highest privileged user in the system'),
(3, 'Manager', 'This is the manager role in the system.'),
(4, 'Staff', 'This is the staff role in the system');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `emp_id` varchar(50) NOT NULL,
  `user_f_name` varchar(20) NOT NULL,
  `user_l_name` varchar(20) NOT NULL,
  `user_nic` varchar(50) NOT NULL,
  `user_dob` date NOT NULL DEFAULT current_timestamp(),
  `user_tel` varchar(15) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_address` text NOT NULL,
  `user_image` text NOT NULL,
  `user_status` varchar(50) NOT NULL,
  `user_title` varchar(20) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_created_date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `user_created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `emp_id`, `user_f_name`, `user_l_name`, `user_nic`, `user_dob`, `user_tel`, `user_email`, `user_address`, `user_image`, `user_status`, `user_title`, `user_gender`, `role_id`, `user_created_date_time`, `user_created_by`) VALUES
(1, '001', 'nadeeshan', 'dangalla', '973341382v', '1997-12-19', '0715403865', 'nadeeshandangalla@gmail.com', 'sidurupitiya,nivithigala                                        ', '', 'active', 'Mr.', 'Male', 1, '2021-12-31 22:00:57', 1),
(6, '0125', 'Kasun', 'Dilhara', '993541382v', '1999-02-02', '2147483647', 'kasundilhara@gmail.com', ' ', '', 'active', 'Mr.', 'Male', 2, '2022-01-21 15:55:00', 1),
(8, '111', 'Suneth', 'Perera', '987654367v', '1998-06-02', '0788345678', 'sunethperera@gmail.com', '    ', '', 'active', '', 'Female', 3, '2022-01-28 14:53:28', 1),
(28, '0666', 'dineshika', 'Gunawardhana', '985647852v', '1995-01-12', '0715426856', 'dineshikagunawardhana@gmail.com', ' ', '', 'active', 'Miss.', 'Female', 4, '2022-05-30 23:00:22', 1),
(31, 'test555', 'test555', 'last555', '776656554v', '1998-02-03', '0715403865', 'test555@gmail.com', '', '', 'active', 'Mr.', 'Male', 1, '2022-07-18 15:22:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `fun_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_privileges`
--

INSERT INTO `user_privileges` (`fun_id`, `user_id`) VALUES
(1, 1),
(1, 2),
(1, 6),
(1, 9),
(1, 25),
(1, 27),
(1, 29),
(2, 1),
(2, 2),
(2, 6),
(2, 9),
(2, 25),
(2, 27),
(2, 29),
(3, 1),
(3, 2),
(3, 6),
(3, 9),
(3, 27),
(3, 29),
(4, 1),
(4, 2),
(4, 6),
(4, 9),
(4, 27),
(4, 29),
(5, 1),
(5, 2),
(5, 6),
(5, 9),
(5, 29),
(6, 1),
(6, 6),
(6, 9),
(6, 27),
(6, 29),
(7, 1),
(7, 6),
(7, 9),
(7, 27),
(7, 29),
(8, 1),
(8, 6),
(8, 9),
(8, 27),
(8, 29),
(9, 1),
(9, 6),
(9, 9),
(9, 27),
(9, 29),
(10, 1),
(10, 6),
(10, 9),
(10, 27),
(10, 29),
(11, 1),
(11, 6),
(11, 9),
(11, 27),
(11, 29),
(12, 1),
(12, 6),
(12, 9),
(12, 27),
(12, 29),
(13, 1),
(13, 6),
(13, 9),
(13, 27),
(13, 29),
(14, 1),
(14, 6),
(14, 9),
(14, 27),
(14, 29),
(15, 1),
(15, 6),
(15, 27),
(15, 29),
(16, 1),
(16, 6),
(16, 8),
(16, 27),
(16, 29),
(17, 1),
(17, 6),
(17, 8),
(17, 27),
(17, 29),
(18, 1),
(18, 6),
(18, 8),
(18, 27),
(18, 29),
(19, 1),
(19, 6),
(19, 8),
(19, 27),
(19, 29),
(20, 1),
(20, 6),
(20, 27),
(20, 29),
(21, 1),
(21, 6),
(21, 27),
(21, 29),
(22, 1),
(22, 6),
(22, 27),
(22, 29),
(23, 1),
(23, 6),
(23, 27),
(23, 29),
(24, 6),
(24, 29),
(25, 6),
(25, 29),
(26, 6),
(26, 8),
(26, 29),
(27, 6),
(27, 8),
(27, 29),
(28, 6),
(28, 8),
(28, 29),
(29, 6),
(29, 29),
(30, 29),
(31, 29),
(32, 29),
(33, 6),
(33, 8),
(33, 29),
(34, 6),
(34, 8),
(34, 29),
(35, 6),
(35, 8),
(35, 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`module_id`,`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`fun_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
