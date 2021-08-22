-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 07:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paintbrush`
--

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `a_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`email`, `password`, `a_id`, `name`) VALUES
('vangogh@gmail.com', 'sunflowers', 1, 'Van Gogh'),
('monet@gmail.com', '1234', 2, 'Claude Monet'),
('test@test.com', 'test', 3, 'Test artist');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `c_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email`, `password`, `c_id`, `name`, `address`, `phone_number`) VALUES
('sheersho@some.com', '1234', 1, 'Sheersho Zaman', '178 Banani Dhaka', '0912317237'),
('zaman@some.com', '1234', 2, 'Zaman Osheer', '43 Dhanmondi Dhaka', '0191231231');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `o_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `pay_type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`o_id`, `p_id`, `c_id`, `a_id`, `quantity`, `total`, `pay_type`, `status`) VALUES
(1, 6, 1, 1, 2, 740, 'cash', 'Delivered'),
(2, 16, 1, 2, 1, 160, 'cash', 'Declined'),
(3, 5, 2, 1, 1, 290, 'cash', 'Declined'),
(4, 17, 1, 1, 3, 940, 'bkash', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `a_id`, `price`, `img`, `title`, `description`) VALUES
(4, 1, 123, 'marat-zakirov-jngl-042.jpg', 'askld', 'kjashdkahsd'),
(6, 1, 350, 'michael-johnson-ed-v04.jpg', 'Circle', 'I saw to the sky and saw myself looking back at me.'),
(7, 1, 787, 'raphael-lacoste-white-desert-by-raphael-lacoste.jpg', 'Sands', 'Into Dust'),
(8, 1, 877, 'wojciech-wilk-forest.jpg', 'Forest', 'Trees'),
(9, 1, 2323, 'shanjie-hao-20171101.jpg', 'Retro', 'kalsjd'),
(11, 1, 120, '6q9PhgE.jpg', 'Street', 'Photography japan'),
(14, 1, 200, '6d6001b575a84c9cbf0fc56b9d62da1c.jpg', 'Moon', 'moon moon'),
(15, 1, 120, 'tflE1ci.jpg', 'Metropolis', 'Civilization or Ruin'),
(16, 2, 120, 'mehmet-ozen-mehmet-ozen.jpg', 'Temple of Osiris', 'Not my usual kind of work, but I saw it in a dream.'),
(17, 1, 300, 'i61ucfz5vu5z.jpg', 'Field', 'some description');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`a_id`,`email`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`,`email`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
