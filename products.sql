-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 10, 2020 at 06:03 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.8

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";

--
-- Database: `shopping_Cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products`
(`id` int
(10) NOT NULL,`name` varchar
(250) NOT NULL,`code` varchar
(100) NOT NULL,`price` double
(9,2) NOT NULL,`image` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`,`name`, `code`, `price`, `image`) VALUES
(1, 'Hrx Tshirt', 'hrxtshirt', 499.00, 'product/hrx.jpeg'),
(2, 'Hrx Shirt', 'hrxshirt', 899.00, 'product/shirt-hrx.jpeg'),
(3, 'Wrogn Jeans', 'wrognjeans', 700.00, 'product/jeans-wrogn.jpeg'),
(4, 'Wrogn Kurti', 'wrognkurti', 1900.00, 'product/kurti.jpeg'),
(5, 'Loreal', 'loreal', 400.00, 'product/loreal.jpeg'),
(6, 'Wrogn Women', 'wrognwomen', 1700.00, 'product/wrogn.jpeg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products` ADD PRIMARY KEY(`id`), ADD UNIQUE KEY `code`(`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products` MODIFY `id` int (10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
