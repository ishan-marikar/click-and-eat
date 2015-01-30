-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for cne-database
CREATE DATABASE IF NOT EXISTS `cne-database` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cne-database`;


-- Dumping structure for table cne-database.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cartId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `purchased` bit(1) NOT NULL,
  `payment_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cartId`),
  KEY `FK_cart_users` (`userId`),
  CONSTRAINT `FK_cart_users` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.cart: ~1 rows (approximately)
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`cartId`, `userId`, `purchased`, `payment_id`) VALUES
	(1, 7, b'0', NULL);
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;


-- Dumping structure for table cne-database.cart_items
CREATE TABLE IF NOT EXISTS `cart_items` (
  `cartItem_ID` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cartId` int(11) NOT NULL,
  PRIMARY KEY (`cartItem_ID`),
  KEY `FK_cart_items_meal` (`meal_id`),
  KEY `FK_cart_items_cart` (`cartId`),
  CONSTRAINT `FK_cart_items_cart` FOREIGN KEY (`cartId`) REFERENCES `cart` (`cartId`),
  CONSTRAINT `FK_cart_items_meal` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`meal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.cart_items: ~3 rows (approximately)
/*!40000 ALTER TABLE `cart_items` DISABLE KEYS */;
INSERT INTO `cart_items` (`cartItem_ID`, `meal_id`, `quantity`, `cartId`) VALUES
	(26, 1, 6, 1),
	(27, 3, 1, 1),
	(28, 5, 1, 1);
/*!40000 ALTER TABLE `cart_items` ENABLE KEYS */;


-- Dumping structure for table cne-database.confirm
CREATE TABLE IF NOT EXISTS `confirm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(128) NOT NULL DEFAULT '',
  `key` varchar(128) NOT NULL DEFAULT '',
  `email` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumping data for table cne-database.confirm: 1 rows
/*!40000 ALTER TABLE `confirm` DISABLE KEYS */;
INSERT INTO `confirm` (`id`, `userid`, `key`, `email`) VALUES
	(6, '7', '2c608a9342e3ccf57a2fa22ebf5a9923', 'ishan.marikar@outlook.com');
/*!40000 ALTER TABLE `confirm` ENABLE KEYS */;


-- Dumping structure for table cne-database.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` text NOT NULL,
  `groupPermissions` text NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.groups: ~2 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`groupId`, `groupName`, `groupPermissions`) VALUES
	(1, 'Standard', ''),
	(2, 'Administrator', '{"admin":1}'),
	(3, 'Manager', '{"manager":1}');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;


-- Dumping structure for table cne-database.meal
CREATE TABLE IF NOT EXISTS `meal` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `mealName` text NOT NULL,
  `mealDescription` text NOT NULL,
  `mealPrice` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  PRIMARY KEY (`meal_id`),
  KEY `FK_RestaurantId` (`restaurantId`),
  CONSTRAINT `FK_RestaurantId` FOREIGN KEY (`restaurantId`) REFERENCES `restaurant` (`Restaurant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.meal: ~3 rows (approximately)
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` (`meal_id`, `mealName`, `mealDescription`, `mealPrice`, `restaurantId`) VALUES
	(1, 'French Fries', 'Big, Tasty French Fries', 150, 3),
	(3, 'Nasi Goreng', 'Tasty Nasi Goreng', 300, 4),
	(5, 'Fried Rice', 'Amazing Fried Rice', 400, 1);
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;


-- Dumping structure for table cne-database.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) DEFAULT NULL,
  `restaurant_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `FK_menu_meal` (`meal_id`),
  KEY `FK_menu_restaurant` (`restaurant_id`),
  CONSTRAINT `FK_menu_meal` FOREIGN KEY (`meal_id`) REFERENCES `meal` (`meal_id`),
  CONSTRAINT `FK_menu_restaurant` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`Restaurant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.menu: ~5 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`menu_id`, `meal_id`, `restaurant_id`) VALUES
	(1, 3, 4),
	(2, 5, 4),
	(7, 5, 2),
	(8, 3, 1),
	(9, 1, 4);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;


-- Dumping structure for table cne-database.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `pageID` int(11) NOT NULL AUTO_INCREMENT,
  `pageTitle` text NOT NULL,
  `pageLocation` text NOT NULL,
  PRIMARY KEY (`pageID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.pages: ~2 rows (approximately)
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` (`pageID`, `pageTitle`, `pageLocation`) VALUES
	(1, 'Home', 'index.php'),
	(2, 'Restauraunts', 'restaurants.php'),
	(3, 'Order', 'order.php'),
	(4, 'Shopping Cart', 'shoppingcart.php');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;


-- Dumping structure for table cne-database.payment
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `deliveryAddress` text,
  `contactNo` int(11) DEFAULT NULL,
  `creditcardNo` int(11) DEFAULT NULL,
  `ccn` int(11) DEFAULT NULL,
  `orderPlacedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`),
  KEY `FK_userId` (`user_id`),
  KEY `FK_cartId` (`cart_id`),
  CONSTRAINT `FK_cartId` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cartId`),
  CONSTRAINT `FK_userId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.payment: ~0 rows (approximately)
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;


-- Dumping structure for table cne-database.restaurant
CREATE TABLE IF NOT EXISTS `restaurant` (
  `Restaurant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Restaurant_Name` varchar(50) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `rating` int(11) DEFAULT NULL,
  `restaurantLogo` text,
  `createdDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `locationLongitude` text NOT NULL,
  `locationLatitude` text NOT NULL,
  PRIMARY KEY (`Restaurant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cne-database.restaurant: ~5 rows (approximately)
/*!40000 ALTER TABLE `restaurant` DISABLE KEYS */;
INSERT INTO `restaurant` (`Restaurant_ID`, `Restaurant_Name`, `Address`, `Contact`, `rating`, `restaurantLogo`, `createdDate`, `locationLongitude`, `locationLatitude`) VALUES
	(1, 'Pizza Hut', 'Dehiwala', '0112729729', 1, '/images/restaurant/1/logo.jpg', '2014-12-30 12:57:25', '', ''),
	(2, 'Dominos', 'Welawatta', '0118899886', 2, '/images/restaurant/2/logo.jpg', '2014-12-30 12:57:25', '', ''),
	(3, 'KFC', 'Kollupitiya', '0112382388', 1, '/images/restaurant/3/logo.jpg', '2014-12-30 12:57:25', '', ''),
	(4, 'Subway', 'Kollupitiya', '0114434343', 2, '/images/restaurant/4/logo.jpg', '2014-12-30 12:57:25', '', ''),
	(5, 'Shiyaz\'s Pizza Palour', 'Bambalapitiya', '779289238', 2, '/images/restaurant/4/logo.jpg', '2015-01-03 15:03:43', '', '');
/*!40000 ALTER TABLE `restaurant` ENABLE KEYS */;


-- Dumping structure for table cne-database.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL DEFAULT '',
  `fullName` varchar(300) NOT NULL DEFAULT '',
  `password` varchar(128) NOT NULL DEFAULT '',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `group` int(11) NOT NULL DEFAULT '1',
  `joinDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Dumping data for table cne-database.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `fullName`, `password`, `active`, `group`, `joinDate`) VALUES
	(7, 'ishan.marikar@outlook.com', 'Ishan Marikar', '202cb962ac59075b964b07152d234b70', 1, 1, '2014-12-30 12:49:03'),
	(32, 'shiyaz@outlook.com', 'Hassan Shiyaz', '202cb962ac59075b964b07152d234b70', 1, 1, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
