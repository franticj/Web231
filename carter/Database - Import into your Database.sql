-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 04, 2016 at 11:50 PM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jturneon_virtualplanet`
--

-- --------------------------------------------------------

--
-- Table structure for table `forgot`
--

CREATE TABLE IF NOT EXISTS `forgot` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(140) NOT NULL DEFAULT '',
  `regdate` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `line_items`
--

CREATE TABLE IF NOT EXISTS `line_items` (
  `itemID` int(11) NOT NULL,
  `prodname` varchar(250) DEFAULT NULL,
  `itemnumber` varchar(250) DEFAULT NULL,
  `itemqty` varchar(125) DEFAULT NULL,
  `orderid` int(11) NOT NULL,
  `itemprice` varchar(250) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `line_items`
--

INSERT INTO `line_items` (`itemID`, `prodname`, `itemnumber`, `itemqty`, `orderid`, `itemprice`) VALUES
(59, 'Fallout 4</BR> Uncharted 4</BR> The Witcher III</BR> ', 'VP1001</BR> VP1002</BR> VP1003</BR> ', '1</BR> 1</BR> 1</BR> ', 86, '39.99</BR> 59.99</BR> 49.99</BR> '),
(60, 'Mortal Combat X</BR> One Piece: Burning Blood</BR> UFC 2</BR> ', 'VP1101</BR> VP1102</BR> VP1103</BR> ', '6</BR> 5</BR> 8</BR> ', 87, '19.99</BR> 59.99</BR> 34.99</BR> '),
(61, 'The Witcher III</BR> Uncharted 4</BR> Fallout 4</BR> ', 'VP1003</BR> VP1002</BR> VP1001</BR> ', '1</BR> 1</BR> 1</BR> ', 88, '49.99</BR> 59.99</BR> 39.99</BR> ');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL,
  `accountname` varchar(150) DEFAULT NULL,
  `custname` varchar(150) DEFAULT NULL,
  `custemail` varchar(150) DEFAULT NULL,
  `transactionid` varchar(45) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL,
  `orderdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `accountname`, `custname`, `custemail`, `transactionid`, `totalprice`, `orderdate`) VALUES
(86, 'Carter Sills', 'test buyer', 'csills2313-buyer@gmail.com', '1MS18442KU129690Y', '149.97', '2016-06-03 12:00:26'),
(87, 'Carter Sills', 'test buyer', 'csills2313-buyer@gmail.com', '6C505360657335706', '699.81', '2016-06-03 12:01:55'),
(88, 'Carter Sills', 'test buyer', 'csills2313-buyer@gmail.com', '010100801Y356241X', '149.97', '2016-06-03 13:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `product_code`, `product_name`, `platform`, `product_desc`, `product_img_name`, `price`, `available`) VALUES
(1, 'Action', 'X1F4', 'Fallout 4', 'Xbox One', 'Fallout 4 is an action role-playing open world video game developed by Bethesda Game Studios.', 'fallout4.png', '39.99', 'Yes'),
(2, 'Action', 'P4U4', 'Uncharted 4', 'PS4', 'Uncharted 4: A Thief''s End is an action-adventure third-person shooter video game developed by Naughty Dog and published by Sony Interactive Entertainment.', 'uncharted.png', '59.99', 'Yes'),
(3, 'Action', 'X1W3', 'The Witcher III', 'Xbox One', 'The Witcher 3: Wild Hunt is a open world action role-playing video game developed by CD Projekt RED.', 'witcher.png', '49.99', 'Yes'),
(4, 'Fighting', 'X1MC', 'Mortal Kombat X', 'Xbox One', 'Mortal Kombat X is a fighting video game developed by NetherRealm Studios and published by Warner Bros. Interactive Entertainment.', 'mortalkombat.png', '19.99', 'Yes'),
(5, 'Fighting', 'X1OP', 'One Piece: Burning Blood', 'Xbox One', 'One Piece: Burning Blood is a fighting video game based on One Piece developed by Spike Chunsoft and published by Bandai Namco Entertainment.', 'onepiece.png', '59.99', 'Pre-Order'),
(6, 'Fighting', 'X1U2', 'UFC 2', 'Xbox One', 'EA Sports UFC 2 is a mixed martial arts fighting video game developed by EA Canada, and published in March 2016 by Electronic Arts.', 'ufc2.png', '34.99', 'Yes'),
(7, 'Retro', 'NSSM', 'Super Mario', 'NES', 'Blah Blah', 'controller.png', '15.99', 'Yes'),
(8, 'Role-Playing', 'X1FF', 'Final Fantasy XV', 'Xbox One', 'Final Fantasy XV is an upcoming action role-playing video game being developed and published by Square Enix for the PlayStation 4 and Xbox One, and currently scheduled for a worldwide release on September 30, 2016.', 'ff.png', '59.99', 'Pre-Order'),
(9, 'Role-Playing', '3DPM', 'Pokemon Moon', '3DS', 'Pokemon Moon is an upcoming role-playing video game in the Pokemon series developed by Game Freak and published by The Pokemon Company for the Nintendo 3DS handheld game console. It is set to be released in November 2016.', 'pokemonmoon.png', '39.99', 'Pre-Order'),
(10, 'Role-Playing', '3DPS', 'Pokemon Sun', '3DS', 'Pokemon Sun is an upcoming role-playing video game in the Pokemon series developed by Game Freak and published by The Pokemon Company for the Nintendo 3DS handheld game console. It is set to be released in November 2016.', 'pokemonsun.png', '39.99', 'Pre-Order'),
(11, 'Role-Playing', 'P4SO', 'Star Ocean 5', 'PS4', 'Star Ocean: Integrity and Faithlessness is an action role-playing video game developed by tri-Ace and published by Square.', 'so5.png', '59.99', 'Pre-Order'),
(12, 'Role-Playing', 'X1OW', 'Overwatch', 'Xbox One', 'Overwatch is a multiplayer first-person shooter video game developed and published by Blizzard Entertainment. The game emphasizes cooperative gameplay using a cast of various "heroes", each with their own abilities and roles within a team.', 'overwatch.png', '59.99', 'Yes'),
(13, 'Shooter', 'X1B4', 'Battlefield 4', 'Xbox One', 'Battlefield 4 is a first-person shooter video game developed by Swedish video game developer EA Digital Illusions CE (DICE) and published by Electronic Arts.', 'battlefield4.png', '39.99', 'Yes'),
(14, 'Shooter', 'X1CD', 'Call of Duty: Infinite Warfare', 'Xbox One', 'Call of Duty: Infinite Warfare is an upcoming first-person shooter video game developed by Infinity Ward and published by Activision. It is Scheduled for release in November 2016.', 'cod.png', '29.99', 'Pre-Order'),
(15, 'Shooter', 'X1DM', 'DOOM', 'Xbox One', 'Doom is a first-person shooter video game developed by id Software and published by Bethesda Softworks. It is a reboot of the Doom series and is the first major installment in the series since the release of Doom 3 in 2004', 'doom.png', '59.99', 'Yes'),
(16, 'Role-Playing', '3DMH', 'Monster Hunter Generations', '3DS', 'Monster Hunter Generations is an action role-playing video game developed and published by Capcom for the Nintendo 3DS and is scheduled to be released internationally in July 2016. ', 'monsterhunter.png', '39.99', 'Pre-Order'),
(18, 'Action', 'P4F4', 'Fallout 4', 'PS4', 'Fallout 4 is an action role-playing open world video game developed by Bethesda Game Studios.', 'fallout4.png', '39.99', 'Yes'),
(19, 'Action', 'PCF4', 'Fallout 4', 'PC', 'Fallout 4 is an action role-playing open world video game developed by Bethesda Game Studios.', 'fallout4.png', '39.99', 'Yes'),
(20, 'Action', 'PCW3', 'The Witcher III', 'PC', 'The Witcher 3: Wild Hunt is a open world action role-playing video game developed by CD Projekt RED.', 'witcher.png', '49.99', 'Yes'),
(21, 'Fighting', 'P4MC', 'Mortal Kombat X', 'PS4', 'Mortal Kombat X is a fighting video game developed by NetherRealm Studios and published by Warner Bros. Interactive Entertainment.', 'mortalkombat.png', '19.99', 'Yes'),
(22, 'Fighting', 'PCMC', 'Mortal Kombat X', 'PC', 'Mortal Kombat X is a fighting video game developed by NetherRealm Studios and published by Warner Bros. Interactive Entertainment.', 'mortalkombat.png', '19.99', 'Yes'),
(23, 'Fighting', 'P4OP', 'One Piece: Burning Blood', 'PS4', 'One Piece: Burning Blood is a fighting video game based on One Piece developed by Spike Chunsoft and published by Bandai Namco Entertainment.', 'onepiece.png', '59.99', 'Pre-Order'),
(24, 'Fighting', 'PCOP', 'One Piece: Burning Blood', 'PC', 'One Piece: Burning Blood is a fighting video game based on One Piece developed by Spike Chunsoft and published by Bandai Namco Entertainment.', 'onepiece.png', '59.99', 'Pre-Order'),
(25, 'Fighting', 'P4U2', 'UFC 2', 'PS4', 'EA Sports UFC 2 is a mixed martial arts fighting video game developed by EA Canada, and published in March 2016 by Electronic Arts.', 'ufc2.png', '34.99', 'Yes'),
(26, 'Role-Playing', 'P4FF', 'Final Fantasy XV', 'PS4', 'Final Fantasy XV is an upcoming action role-playing video game being developed and published by Square Enix for the PlayStation 4 and Xbox One, and currently scheduled for a worldwide release on September 30, 2016.', 'ff.png', '59.99', 'Pre-Order'),
(28, 'Role-Playing', 'P4OW', 'Overwatch', 'PS4', 'Overwatch is a multiplayer first-person shooter video game developed and published by Blizzard Entertainment. The game emphasizes cooperative gameplay using a cast of various "heroes", each with their own abilities and roles within a team.', 'overwatch.png', '59.99', 'Yes'),
(29, 'Role-Playing', 'PCOW', 'Overwatch', 'PC', 'Overwatch is a multiplayer first-person shooter video game developed and published by Blizzard Entertainment. The game emphasizes cooperative gameplay using a cast of various "heroes", each with their own abilities and roles within a team.', 'overwatch.png', '59.99', 'Yes'),
(30, 'Shooter', 'P4B4', 'Battlefield 4', 'PS4', 'Battlefield 4 is a first-person shooter video game developed by Swedish video game developer EA Digital Illusions CE (DICE) and published by Electronic Arts.', 'battlefield4.png', '39.99', 'Yes'),
(31, 'Shooter', 'PCB4', 'Battlefield 4', 'PC', 'Battlefield 4 is a first-person shooter video game developed by Swedish video game developer EA Digital Illusions CE (DICE) and published by Electronic Arts.', 'battlefield4.png', '39.99', 'Yes'),
(32, 'Shooter', 'PCCD', 'Call of Duty: Infinite Warfare', 'PC', 'Call of Duty: Infinite Warfare is an upcoming first-person shooter video game developed by Infinity Ward and published by Activision. It is Scheduled for release in November 2016.', 'cod.png', '29.99', 'Pre-Order'),
(33, 'Shooter', 'P4DM', 'DOOM', 'PS4', 'Doom is a first-person shooter video game developed by id Software and published by Bethesda Softworks. It is a reboot of the Doom series and is the first major installment in the series since the release of Doom 3 in 2004', 'doom.png', '59.99', 'Yes'),
(34, 'Shooter', 'PCDM', 'DOOM', 'PC', 'Doom is a first-person shooter video game developed by id Software and published by Bethesda Softworks. It is a reboot of the Doom series and is the first major installment in the series since the release of Doom 3 in 2004', 'doom.png', '59.99', 'Yes'),
(35, 'Role-Playing', '3DFE', 'Fire Emblem Fates', '3DS', 'Fire Emblem Fates is a tactical role-playing video game developed by Intelligent Systems and published by Nintendo for the Nintendo 3DS. It is set for release in June of 2016.', 'fireemblem.png', '39.99', 'Pre-Order'),
(36, 'Role-Playing', '3DBS', 'Bravely Second', '3DS', 'Bravely Second: End Layer is a Japanese role-playing video game developed by Silicon Studio and published by Square Enix.', 'bravely.png', '39.99', 'Yes'),
(37, 'Role-Playing', '3DML', 'Mario & Luigi: Paper Jam', '3DS', 'Mario & Luigi: Paper Jam is a role-playing video game developed by AlphaDream and published by Nintendo.', 'mario.png', '39.99', 'Yes'),
(38, 'Action', '3DHW', 'Hyrule Warriors Legends', '3DS', 'Hyrule Warriors Legends is a hack-and-slash action video game developed by Omega Force and Team Ninja.', 'hyrule.png', '29.99', 'Yes'),
(39, 'Action', '3DMP', 'Metroid Prime: Federation Force', '3DS', 'Metroid Prime: Federation Force is an Action game, developed by Next Level Games and published by Nintendo, scheduled to be released in August of 2016.', 'metroid.png', '39.99', 'Pre-Order');

-- --------------------------------------------------------

--
-- Table structure for table `products_old`
--

CREATE TABLE IF NOT EXISTS `products_old` (
  `prodId` int(11) NOT NULL,
  `prodcode` varchar(20) NOT NULL,
  `prodname` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `unitprice` decimal(10,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `custId` int(11) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(140) NOT NULL DEFAULT '',
  `regdate` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `lastdate` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`custId`, `username`, `password`, `email`, `regdate`, `ip`, `lastdate`) VALUES
(1, 'Carter Sills', '1860778d4d2ec042600134385f58026146da3e60', 'csills2313@gmail.com', '2016-05-18  13:59:51', '96.33.122.50', '2016-06-03  07:33:39'),
(2, 'rdesil01', '59396e9f856bacbe453e85ae2fd5b667f291e54f', 'techatina@gmail.com', '2016-05-18  15:26:56', '99.67.230.39', '2016-05-18  15:27:15'),
(4, 'csills2313', '1860778d4d2ec042600134385f58026146da3e60', 'csills2313@aol.com', '2016-05-19  08:31:58', '96.33.122.50', '2016-06-02  07:37:45'),
(5, 'franticj', 'c087c58053dd7acfd36b57b1764582ced6f04cda', 'franticj@gmail.com', '2016-05-29  00:19:20', '71.49.253.215', '2016-05-29  00:19:36'),
(6, 'Monty Python', '1860778d4d2ec042600134385f58026146da3e60', 'monty@aol.com', '2016-06-03  03:25:17', '24.125.242.215', '2016-06-03  03:26:08'),
(7, 'namanjji', '566c33c4b485d04293a4698ebaa5f27b7204b92e', 'lmason09@baker.edu', '2016-06-03  22:50:44', '97.87.238.204', '2016-06-03  23:32:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `line_items`
--
ALTER TABLE `line_items`
  ADD PRIMARY KEY (`itemID`), ADD KEY `FK_lineitems_idx` (`orderid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `products_old`
--
ALTER TABLE `products_old`
  ADD PRIMARY KEY (`prodId`), ADD UNIQUE KEY `prodcode` (`prodcode`,`prodname`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`custId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `line_items`
--
ALTER TABLE `line_items`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `products_old`
--
ALTER TABLE `products_old`
  MODIFY `prodId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `custId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `line_items`
--
ALTER TABLE `line_items`
ADD CONSTRAINT `PK_Orders_LineItems` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
