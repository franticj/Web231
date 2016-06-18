CREATE DATABASE `csillsze_virtualplanet` /*!40100 DEFAULT CHARACTER SET latin1 */;

CREATE TABLE `forgot` (
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(140) NOT NULL DEFAULT '',
  `regdate` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `line_items` (
  `itemID` int(11) NOT NULL AUTO_INCREMENT,
  `prodname` varchar(250) DEFAULT NULL,
  `itemnumber` varchar(250) DEFAULT NULL,
  `itemqty` varchar(125) DEFAULT NULL,
  `orderid` int(11) NOT NULL,
  `itemprice` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`itemID`),
  KEY `FK_lineitems_idx` (`orderid`),
  CONSTRAINT `PK_Orders_LineItems` FOREIGN KEY (`orderid`) REFERENCES `orders` (`orderid`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `accountname` varchar(150) DEFAULT NULL,
  `custname` varchar(150) DEFAULT NULL,
  `custemail` varchar(150) DEFAULT NULL,
  `transactionid` varchar(45) DEFAULT NULL,
  `totalprice` decimal(10,2) DEFAULT NULL,
  `orderdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orderid`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=latin1;

CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `platform` varchar(50) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `available` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_code` (`product_code`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `custId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(40) NOT NULL DEFAULT '',
  `email` varchar(140) NOT NULL DEFAULT '',
  `regdate` varchar(30) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `lastdate` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`custId`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
