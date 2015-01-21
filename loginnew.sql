-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2014 at 03:27 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loginnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_2_cart`
--

CREATE TABLE IF NOT EXISTS `add_2_cart` (
`Cart_id` int(200) NOT NULL COMMENT 'Cart Id',
  `p_id` int(200) NOT NULL COMMENT 'Product Id',
  `P name` text NOT NULL COMMENT 'Product Name',
  `no_of_products` int(200) NOT NULL COMMENT 'number of products added',
  `id` int(5) NOT NULL COMMENT 'id or username',
  `p image` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Add_2_cart' AUTO_INCREMENT=104 ;

-- --------------------------------------------------------

--
-- Table structure for table `contact us`
--

CREATE TABLE IF NOT EXISTS `contact us` (
  `c_id` int(5) NOT NULL COMMENT 'Contact id',
  `c_name` text NOT NULL COMMENT 'Contact name',
  `c_email_id` text NOT NULL COMMENT 'Contact Email id',
  `c_phonenumber` int(15) NOT NULL COMMENT 'Contact Phonenumber',
  `c_comment` text NOT NULL COMMENT 'Contact Comment'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contact us ';

-- --------------------------------------------------------

--
-- Table structure for table `products_ls`
--

CREATE TABLE IF NOT EXISTS `products_ls` (
  `p_id` int(5) NOT NULL COMMENT 'Products Id',
  `p_name` text NOT NULL COMMENT 'Products Name',
  `p_description` text NOT NULL COMMENT 'Products Description',
  `p_prize` int(10) NOT NULL COMMENT 'Products Prize',
  `p_quantity` int(10) NOT NULL COMMENT 'Products Quantity',
  `p_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Products list';

--
-- Dumping data for table `products_ls`
--

INSERT INTO `products_ls` (`p_id`, `p_name`, `p_description`, `p_prize`, `p_quantity`, `p_image`) VALUES
(1, 'product001', 'gsgswdgmcwahgcaw', 120, 12, 'img.jpg'),
(2, 'product002', 'dfawfawf', 123, 12, 'img.jpg'),
(3, 'product003', 'wdcwga', 12, 12, 'img.jpg'),
(4, 'sadas', 'adas', 122, 12, 'img.jpg'),
(5, 'weqrwe', 'asdfsdafd', 1233, 12, 'img.jpg'),
(6, 'fesrgfesfg', 'fsgsdfg', 123, 12, 'img.jpg'),
(7, 'ewreet', 'sfsdgse', 4345, 343, 'img.jpg'),
(8, 'aasf', 'afaf', 123, 23, 'img.jpg'),
(9, 'fdsfsdg', 'sdgsdgsdg', 56, 34, 'img.jpg'),
(10, 'hhhnghn', 'cvbcvh', 176, 67, 'img.jpg'),
(11, 'gvdcgvds', 'fdgd', 67, 45, 'img.jpg'),
(12, 'c vxcbdxgf', 'dfvdfbdf', 23, 23, 'img.jpg'),
(13, 'efergreg', 'efgegrtg', 123, 112, 'img.jpg'),
(14, 'wefweqfrew', 'wefwef', 12, 23, 'img.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product_quotes`
--

CREATE TABLE IF NOT EXISTS `product_quotes` (
  `pr_id` int(5) NOT NULL COMMENT 'Product id',
  `pr_pname` text NOT NULL COMMENT 'Product name',
  `pr_number` int(10) NOT NULL COMMENT 'Product Number',
  `pr_manufacturer` text NOT NULL COMMENT 'Product Manufacturer',
  `pr_quantity` int(255) NOT NULL COMMENT 'Product quantity',
  `pr_comment` text NOT NULL COMMENT 'Product Comment'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Product_quotes_db';

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `passcnfrmn` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `username`, `email`, `password`, `passcnfrmn`, `address`) VALUES
(1, '', '', '1234', '1234', 'Type here'),
(2, '', '', '123', '123', 'Type here'),
(3, '', '', '123', '123', 'Type here'),
(4, '', '', '123', '123', 'Type herer'),
(5, '', '', '123', '123', 'Type herevf'),
(6, '', '', '123', '123', 'Type here'),
(7, '', '', 'wer', 'wer', 'Type heredfs'),
(8, '', '', '1234', '1234', 'Type here'),
(9, '', '', '12345', '12345', 'Type here'),
(10, '', '', '1234', '1234', 'Type here'),
(11, '', '', '1234', '1234', 'Type here'),
(12, '', '', '', '', 'Type here');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned zerofill NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created`) VALUES
(00000000001, 'rrrrrr', '$2a$08$/c0TAvPp/psO3HMQMtuD6eiv0pLPy610eVCHJhqNTyAUOu9tL.NaS', 'rrrrrr@gggg.in', '2014-09-29 12:25:51'),
(00000000002, 'rsdsafsdaf', '$2a$08$JqvMx6.fH3FlqxEdULUvKu3Nw8Kr8WicFZxmCBmKebYkVy4bTAemO', 'qsdwe@gmail.com', '2014-09-29 13:00:29'),
(00000000003, 'kkk', '$2a$08$m.zzQHWFlB7t7FkVuzZIb.OSj0NejcS5uTxLhUP9LFP9fRctch7OO', 'rajeesha@g.in', '2014-10-03 12:58:22'),
(00000000004, 'user1', '$2a$08$n8.ncRXh5.M4WgxTGn.aiufMuifeQ.MTPRSoZHOFtHsI2F2X.Hehu', 'user1@gmail.com', '2014-10-03 14:30:53'),
(00000000005, 'rvk', '$2a$08$cbmqbGgR0Y602n2lhHvbaeTExD8P/bDKRD6h96TK8A.UkmJUKHWfG', 'kkk@gmail.com', '2014-10-03 19:31:09'),
(00000000006, 'rr', '$2a$08$pGiCpH1m5XId9FSkb3UNzenoN.0c6P4fbLo.C0eNEDiUaR.AJQDyK', 'qw@ghm.in', '2014-10-03 19:35:55'),
(00000000007, 'bnk', '$2a$08$2wgt/mwVjxthsp7JDIVq9ugFMtoYuMTcsgu3qUCJT24RocQB/VySq', 'kkk@g.in', '2014-10-04 00:17:20'),
(00000000008, 'rajeesh', '$2a$08$bl9RvlLvw75CpTm0vqHtcOfMgIDGSYOWW4gp4M/amDqSyxZkD.jMW', 'rajeesh@foofys.com', '2014-10-05 12:48:39'),
(00000000009, 'roppp', '$2a$08$NtTVcNOTnXx5FLqLXl.Y3.N8ROfCoMjN.EOa97h7bUWsuBqPp3uHO', 'kkk@df.im', '2014-10-05 18:25:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_2_cart`
--
ALTER TABLE `add_2_cart`
 ADD UNIQUE KEY `Cart id` (`Cart_id`,`p_id`,`id`);

--
-- Indexes for table `contact us`
--
ALTER TABLE `contact us`
 ADD UNIQUE KEY `c_id` (`c_id`);

--
-- Indexes for table `products_ls`
--
ALTER TABLE `products_ls`
 ADD UNIQUE KEY `p_id` (`p_id`);

--
-- Indexes for table `product_quotes`
--
ALTER TABLE `product_quotes`
 ADD UNIQUE KEY `pr_id` (`pr_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_2_cart`
--
ALTER TABLE `add_2_cart`
MODIFY `Cart_id` int(200) NOT NULL AUTO_INCREMENT COMMENT 'Cart Id',AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
