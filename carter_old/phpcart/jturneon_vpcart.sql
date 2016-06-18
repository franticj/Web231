-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 30, 2016 at 12:20 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csillsze_vpcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `serial` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(80) COLLATE latin1_general_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`serial`, `name`, `email`, `address`, `phone`) VALUES
(1, 'Jason Turner', 'franticj@gmail.com', '2526 Wolverton ave', '7023536508'),
(2, 'Jason Turner', 'franticj@gmail.com', '2526 Wolverton ave', '7023536508');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `serial` int(11) NOT NULL,
  `date` date NOT NULL,
  `customerid` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`serial`, `date`, `customerid`) VALUES
(1, '2016-05-30', 1),
(2, '2016-05-30', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderid`, `productid`, `quantity`, `price`) VALUES
(1, 1, 1, 250),
(2, 1, 1, 250),
(2, 2, 1, 80),
(2, 4, 1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `serial` int(11) NOT NULL,
  `name` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `description` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `price` float NOT NULL,
  `picture` varchar(80) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=1402 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`serial`, `name`, `description`, `price`, `picture`) VALUES
(1001, 'Fallout 4', 'Fallout 4 is an action role-playing open world video game developed by Bethesda Game Studios', 39.99, 'images/fallout4.png'),
(1304, 'Star Ocean', 'Epic Sci-Fi Odyssey: Battle strange monsters in sci-fi dungeons while diving into the saga of Fidel and his companions.', 59.99, 'images/starocean.png'),
(1002, 'Uncharted 4', 'Several years after his last adventure, retired fortune hunter, Nathan Drake, is forced back into the world of thieves.', 59.99, 'images/uncharted4.png'),
(1305, 'Overwatch', 'Clash on the battlefields of tomorrow and choose your hero from a diverse cast of soldiers, scientists, adventurers, and oddities.', 59.99, 'images/overwatch.png'),
(1003, 'The Witcher III', 'The Witcher 3 is standalone adventure, easily entered into by new players. Witcher fans will find subtle references to their adventures, but these elements are not necessary to enjoy the game fully.', 49.99, 'images/witcher3.png'),
(1401, 'Battlefield 4', 'Battlefield 4 is the genre-defining action blockbuster made from moments that blur the line between game and glory. Fueled by the next-generation power and fidelity of Frostbite 3, Battlefield 4 provides a visceral, dramatic experience unlike any other.', 39.99, 'images/battlefield4.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1402;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
