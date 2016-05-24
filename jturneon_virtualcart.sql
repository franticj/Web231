-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2016 at 11:20 AM
-- Server version: 5.5.42-37.1-log
-- PHP Version: 5.4.31

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jturneon_virtualcart`
--

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `select_categories`$$
CREATE DEFINER=`jturneon`@`localhost` PROCEDURE `select_categories`(type VARCHAR(6))
BEGIN
IF type = 'coffee' THEN
SELECT * FROM general_coffees ORDER by category;
ELSEIF type = 'other' THEN
SELECT * FROM non_coffee_categories ORDER by category;
END IF;
END$$

DROP PROCEDURE IF EXISTS `select_products`$$
CREATE DEFINER=`jturneon`@`localhost` PROCEDURE `select_products`(type VARCHAR(6), cat TINYINT)
BEGIN
	IF type = 'coffee' THEN
SELECT	gc.description, gc.image, CONCAT("C", sc.id) AS sku, 
CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole, sc.price) AS name, 
sc.stock 
FROM specific_coffees AS sc INNER JOIN sizes AS s ON s.id=sc.size_id 
INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id 
WHERE general_coffee_id=cat AND stock>0 
ORDER by name ASC;
	ELSEIF type = 'other' THEN
SELECT ncc.description AS g_description, ncc.image AS g_image, 
CONCAT("O", ncp.id) AS sku, ncp.name, ncp.description, ncp.image, 
ncp.price, ncp.stock 
FROM non_coffee_products AS ncp INNER JOIN non_coffee_categories AS ncc 
ON ncc.id=ncp.non_coffee_category_id 
WHERE non_coffee_category_id=cat ORDER by date_created DESC;
	END IF;
END$$

DROP PROCEDURE IF EXISTS `select_sale_items`$$
CREATE DEFINER=`jturneon`@`localhost` PROCEDURE `select_sale_items`(get_all BOOLEAN)
BEGIN
IF get_all = 1 THEN 
SELECT CONCAT("O", ncp.id) AS sku, sa.price AS sale_price, ncc.category, ncp.image, ncp.name, ncp.price, ncp.stock, ncp.description FROM sales AS sa INNER JOIN non_coffee_products AS ncp ON sa.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id WHERE sa.product_type="other" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) )
UNION SELECT CONCAT("C", sc.id), sa.price, gc.category, gc.image, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole), sc.price, sc.stock, gc.description FROM sales AS sa INNER JOIN specific_coffees AS sc ON sa.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id WHERE sa.product_type="coffee" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) );
ELSE 
(SELECT CONCAT("O", ncp.id) AS sku, sa.price AS sale_price, ncc.category, ncp.image, ncp.name FROM sales AS sa INNER JOIN non_coffee_products AS ncp ON sa.product_id=ncp.id INNER JOIN non_coffee_categories AS ncc ON ncc.id=ncp.non_coffee_category_id WHERE sa.product_type="other" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) ORDER BY RAND() LIMIT 2) UNION (SELECT CONCAT("C", sc.id), sa.price, gc.category, gc.image, CONCAT_WS(" - ", s.size, sc.caf_decaf, sc.ground_whole) FROM sales AS sa INNER JOIN specific_coffees AS sc ON sa.product_id=sc.id INNER JOIN sizes AS s ON s.id=sc.size_id INNER JOIN general_coffees AS gc ON gc.id=sc.general_coffee_id WHERE sa.product_type="coffee" AND ((NOW() BETWEEN sa.start_date AND sa.end_date) OR (NOW() > sa.start_date AND sa.end_date IS NULL) ) ORDER BY RAND() LIMIT 2);
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `prodname` varchar(50) NOT NULL,
  `itemprice` decimal(10,2) NOT NULL,
  `shipaddress` varchar(150) NOT NULL,
  `custname` varchar(150) NOT NULL,
  `shipstate` varchar(50) NOT NULL,
  `shipzipcode` varchar(20) NOT NULL,
  `custphone` varchar(50) NOT NULL,
  `custemail` varchar(150) NOT NULL,
  `custID` int(11) NOT NULL,
  `cardnumber` varchar(50) NOT NULL,
  `prodId` int(11) NOT NULL,
  `prodcode` varchar(20) NOT NULL,
  `orderdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_code` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `platform` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_desc` tinytext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `product_img_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` varchar(10) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `product_code`, `product_name`, `platform`, `product_desc`, `product_img_name`, `price`, `available`) VALUES
(1, 'Action', 'VP1001', 'Fallout 4', 'Xbox One, PS4, PC', 'Fallout 4 is an action role-playing open world video game developed by Bethesda Game Studios.', 'controller.png', '39.99', 'Yes'),
(11, 'Role-Playing', 'VP1304', 'Star Ocean', 'PS4', 'Blah Blah', 'controller.png', '59.99', 'Pre-Order'),
(2, 'Action', 'VP1002', 'Uncharted 4', 'PS4', 'Blah Blah', 'controller.png', '59.99', 'Yes'),
(12, 'Role-Playing', 'VP1305', 'Overwatch', 'Xbox One, PS4, PC', 'Blah Blah', 'controller.png', '59.99', 'Yes'),
(3, 'Action', 'VP1003', 'The Witcher III', 'Xbox One, PS4', 'Blah Blah', 'controller.png', '49.99', 'Yes'),
(13, 'Shooter', 'VP1401', 'Battlefield 4', 'Xbox One, PS4, PC', 'Blah Blah', 'controller.png', '39.99', 'Yes'),
(14, 'Shooter', 'VP1402', 'Call of Duty: Infinite Warfare', 'Xbox One, PC', 'Blah Blah', 'controller.png', '29.99', 'Yes'),
(4, 'Fighting', 'VP1101', 'Mortal Combat X', 'Xbox One, PS4', 'Blah Blah', 'controller.png', '19.99', 'Yes'),
(15, 'Shooter', 'VP1403', 'DOOM', 'Xbox One, PS4, PC', 'Blah Blah', 'controller.png', '59.99', 'Yes'),
(5, 'Fighting', 'VP1102', 'One Piece: Burning Blood', 'Xbox One, PS4, PC', 'Blah Blah', 'controller.png', '59.99', 'Pre-Order'),
(6, 'Fighting', 'VP1103', 'UFC 2', 'Xbox One, PS4', 'Blah Blah', 'controller.png', '34.99', 'Yes'),
(7, 'Retro', 'VP1201', 'Super Mario', 'NES', 'Blah Blah', 'controller.png', '15.99', 'Yes'),
(8, 'Role-Playing', 'VP1301', 'Final Fantasy XV', 'Xbox One, PS4, PC', 'Blah Blah', 'controller.png', '59.99', 'Pre-Order'),
(9, 'Role-Playing', 'VP1302', 'Pokemon Moon', '3DS', 'Blah Blah', 'controller.png', '39.99', 'Pre-Order'),
(10, 'Role-Playing', 'VP1303', 'Pokemon Sun', '3DS', 'Blah Blah', 'controller.png', '39.99', 'Pre-Order'),
(16, 'Strategy', 'VP1501', 'Monster Hunters', '3DS', 'Blah Blah', 'controller.png', '37.99', 'Yes');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
