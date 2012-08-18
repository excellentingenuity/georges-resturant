-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 18, 2012 at 02:00 PM
-- Server version: 5.1.62
-- PHP Version: 5.3.6-13ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `georges`
--

-- --------------------------------------------------------

--
-- Table structure for table `Available_Menu_Item_Options`
--

CREATE TABLE IF NOT EXISTS `Available_Menu_Item_Options` (
  `idAvailable_Menu_Item_Options` int(11) NOT NULL AUTO_INCREMENT,
  `Menu_item_id` int(11) NOT NULL,
  `Menu_Item_Options_id` int(11) NOT NULL,
  PRIMARY KEY (`idAvailable_Menu_Item_Options`),
  UNIQUE KEY `idAvailable_Menu_Item_Options_UNIQUE` (`idAvailable_Menu_Item_Options`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Options that are avaiable for each menu item' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `idCategories` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Ordered_By` int(11) DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCategories`),
  UNIQUE KEY `Name_UNIQUE` (`Name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='Categories for the menu	' AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`idCategories`, `Name`, `Ordered_By`, `group`) VALUES
(1, 'Pasta', 0, 1),
(2, 'Italian Appetizers', 0, 1),
(4, 'Italian Salad', 0, 1),
(5, 'Lebanese Salad', 0, 2),
(6, 'Italian Entrees', 0, 1),
(7, 'Off the Grill - Lebanese Entrees', 0, 2),
(8, 'Sandwiches', 0, 3),
(10, 'Pizza', 0, 4),
(11, 'Calzones', 0, 5),
(12, 'Manakeesh - Lebanese Pizza', 0, 4),
(13, 'Kids Menu', 0, 6),
(15, 'Desserts', 0, 7),
(16, 'Soft Drinks', 0, 8),
(17, 'Wine and Beer', 0, 8),
(19, 'Lebanese Sandwhiches', 0, 3),
(20, 'Lebanese Appetizers', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `idconfig` int(11) NOT NULL,
  `Name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Value` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`idconfig`),
  UNIQUE KEY `idconfig_UNIQUE` (`idconfig`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='config variables';

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`idconfig`, `Name`, `Value`) VALUES
(1, 'Restuarant Name', 'Georges Bistro'),
(2, 'Version', '1.0'),
(0, 'Single Login', 'False');

-- --------------------------------------------------------

--
-- Table structure for table `Meals`
--

CREATE TABLE IF NOT EXISTS `Meals` (
  `idMeals` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Categoryid` int(11) NOT NULL,
  PRIMARY KEY (`idMeals`),
  UNIQUE KEY `idMeals_UNIQUE` (`idMeals`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=163 ;

--
-- Dumping data for table `Meals`
--

INSERT INTO `Meals` (`idMeals`, `Title`, `Description`, `Price`, `Categoryid`) VALUES
(91, 'House Salad', 'Served with your choice of dressing.', '5.99', 4),
(92, 'Caesar Salad', 'Fresh romaine lettuce with Parmesan  cheese served with Caesar dressing.', '6.99', 4),
(148, 'Chicken Fingers', 'Served with specialty sauce.', '6.99', 2),
(82, 'Cheese Sticks', 'Served with marinara sauce.', '6.99', 2),
(89, 'Cheese Bread ', 'With garlic butter spread. ', '6.99', 2),
(80, 'Fried Zucchini ', 'Crispy breaded fried zucchini slices served with specialty sauce. ', '6.99', 2),
(79, 'Fried Calamari ', 'Lightly breaded fried calamari rings served with marinara sauce. ', '8.99', 2),
(88, 'Fried Poppers', 'Deep fried breaded cheese stuffed jalapeños.', '6.99', 2),
(93, 'Meatball', 'Topped with meat sauce and cheese, served on hoagie bread.', '6.99', 8),
(97, 'Chicken Parmigiana', 'Topped with marinara sauce and cheese, served on hoagie bread.', '6.99', 8),
(96, 'Eggplant Parmigiana', 'Topped with marinara sauce and  cheese, served on hoagie bread', '6.99', 8),
(95, 'Veal Parmigiana', 'Topped with meat sauce and cheese, served on hoagie bread', '7.99', 8),
(87, 'Fried Mushrooms ', 'Battered deep fried mushrooms served with specialty sauce.', '6.99', 2),
(94, 'Italian Sausage', 'Topped with meat sauce, served on  hoagie bread. ', '6.99', 8),
(90, 'Antipasto', 'Lettuce, Tomato, Ham, and Provolone Cheese', '7.99', 4),
(77, 'Bruschetta', 'Grilled Bread Topped with Fresh Chopped Tomato, Red Onion, Garlic, Basil, Feta Cheese, Olive Oil and balsamic vinaigrette.', '6.99', 2),
(122, 'George''s House Pizza', 'Pepperoni, Italian sausage,  mushrooms, onions, and green peppers.', '11.99', 10),
(99, 'Veal Parmagiana', 'Tender breaded veal cutlets topped  with meat sauce and cheese, and baked to perfection over  spaghetti. Served with side salad and garlic bread.', '14.99', 6),
(100, 'Chicken Parmagiana', 'Breaded chicken breast baked  with marinara sauce and cheese over spaghetti. Served  with side salad and garlic bread', '12.99', 6),
(101, 'Eggplant Parmigiana', 'a Breaded Eggplant, baked with  marinara sauce and cheese. Served with side salad and  garlic bread.', '11.99', 6),
(102, 'Chicken Carbonara', 'Grilled boneless chicken with  bacon, mushrooms, and sundried tomatoes in a creamy  Alfredo sauce tossed with ziti pasta. Served with side  salad and garlic bread.', '14.99', 6),
(104, 'Ribeye Steak', ' Grilled 10 to 12 Oz Angus 1st  choice prime  cut. Served with rice or steak fries and steamed  vegetables.', '17.99', 6),
(105, 'Salmon', '6-8 ounce salmon seasoned with special spices.  Served with rice and steamed vegetables.', '13.99', 6),
(106, 'Shrimp Skewers', 'Seasoned grilled shrimp. Served with  rice or steak fries and steamed vegetables.', '14.99', 6),
(107, 'Catch of the Day', 'Whole Fish served with rice or steak  fries and steamed vegetables. ', '13.99', 6),
(108, 'Surf and Turf', 'A combination of our grilled Ribeye steak  and grilled Salmon. Served with rice or steak fries and  steamed vegetables.', '24.99', 6),
(109, 'Pepperoni', 'Pepperoni and cheese, stuffed in a fresh pizza  dough pocket.', '10.99', 11),
(110, 'Sausage', 'Sausage and cheese, stuffed in a fresh pizza  dough pocket.', '10.99', 11),
(111, 'Chicken', 'Grilled chicken tenders, ham, and diced  tomatoes, stuffed in a fresh pizza dough pocket', '10.99', 11),
(112, 'Philly Cheese Steak', 'Steak, onions, peppers,  mushrooms, and cheese, stuffed in a fresh pizza dough  pocket.', '10.99', 11),
(113, 'Vegetarian', 'Diced tomatoes, onions, green peppers,  mushrooms, black olives, and feta cheese, stuffed in a  fresh pizza dough pocket.', '10.99', 11),
(114, 'Cheese Ravioli', 'Baked with meat sauce and cheese. Served with side salad and garlic bread.', '11.99', 1),
(115, 'Spinach Ravioli', 'Oven baked. Served with marinara sauce  and topped with cheese. Served with side salad and garlic bread.', '11.99', 1),
(116, 'Cheese Manicotti', 'Oven baked pasta ﬁlled with ricotta  cheese topped with meat sauce and cheese. Served with side salad and garlic bread.', '11.99', 1),
(117, 'Cheese Tortellini', 'Oven baked pasta ﬁlled with a creamy  four-cheese sauce. Served with side salad and garlic bread.', '11.99', 1),
(118, 'Lasagna', 'Layers of pasta, sausage and ricotta, covered  with meat sauce and cheese. Served with side salad and garlic bread.', '11.99', 1),
(119, 'Baked Ziti', 'Oven Baked Ziti pasta, with ricotta and  mozzarella cheese. Served with side salad and garlic bread.', '11.99', 1),
(120, 'George''s Trio', 'Manicotti, Ravioli, and Lasagna. Served with side salad and garlic bread.', '13.99', 1),
(121, 'Fettuccine Alfredo', 'Fettuccine pasta tossed with  Parmesan cheese and Alfredo sauce. Served with side salad and garlic bread.', '10.99', 1),
(123, 'George''s Veggie Pizza', 'Diced tomatoes, onions, feta cheese,  mushrooms, green peppers, and black olives.', '11.99', 10),
(124, 'George''s Specialty Pizza', 'Olive oil base, artichokes, ﬁre  roasted peppers, basil, diced tomatoes, olives, with  Parmesan and mozzarella cheese.', '13.99', 10),
(125, 'Hawaiian Pizza', 'Ham, Pineapple, and Cheese.', '10.99', 10),
(126, 'Chicken Alfredo Pizza', 'Chicken, Alfredo Sauce, and  cheese.', '11.99', 10),
(127, 'Meat Lovers Pizza', 'Pepperoni, Italian Sausage, Ham,  Salami, bacon, and cheese.', '11.99', 10),
(128, 'Spaghetti', 'Served with marinara sauce. Served with side salad and garlic bread.', '7.99', 1),
(129, 'Taboule', 'Parsley, tomatoes, chopped onions, cracked wheat,  lemon juice, and olive oil.', '5.99', 5),
(130, 'Fatouch', 'Lettuce, tomatoes, radish, cucumbers, onions, green  pepper, lemon juice, pomegranate juice, garlic, fried Lebanese  bread and olive oil.', '6.99', 5),
(131, 'George''s Salad', 'Chickpeas, Fava beans, tomatoes, lettuce,  cucumbers, with our special dressing.', '4.99', 5),
(132, 'Kabob', 'Grilled beef on a bed of seasoned Lebanese rice, and  grilled onions. Served with your choice of a side salad or  hummus.', '12.99', 7),
(133, 'Samky Harra', 'Spicy baked ﬁsh cooked with tahini sauce and  topped with nuts.', '12.99', 7),
(134, 'Tawook', 'Marinated grilled chicken tenderloin served on a bed of  seasoned Lebanese rice, and garlic dip.', '10.99', 7),
(135, 'Kafta', 'Grilled ground beef mixed with parsley and  onions on a bed of seasoned Lebanese rice. Served with  your choice of a side salad or hummus. ', '11.99', 7),
(136, 'Zaatar', 'Zaatar', '3.99', 12),
(137, 'Gebneh', 'Gebneh', '5.99', 12),
(138, 'Half Zaatar & Half Gebneh', 'Half Zaatar & Half Gebneh', '7.99', 12),
(139, 'Falafel', 'Chickpeas, onions, herbs, fried in vegetable oil,  served in wrapped Lebanese bread with tomatoes, pickled  turnips and cucumbers, radish, parsley, and tahini sauce.', '4.99', 19),
(140, 'Hummus', 'Chickpeas, tahini sauce, lemon juice, garlic, and  olive oil, served in wrapped Lebanese bread with tomatoes,  pickled turnips, pickled cucumbers, onions, parsley, radish,  and green peppers.', '4.99', 19),
(141, 'Baba Ganooj', 'Grilled eggplant, tahini sauce, lemon juice,  garlic, and olive oil, served in wrapped Lebanese bread with  tomatoes, pickled turnips, pickled cucumbers, parsley, green  peppers, radish, and onions.', '4.99', 19),
(142, 'Tawook', 'Marinated grilled chicken tenderloin with garlic  spread, served in wrapped Lebanese bread with tomatoes,  pickled turnips and pickled cucumbers. ', '5.99', 19),
(143, 'Kabob', 'Grilled beef, served in wrapped Lebanese bread with  grilled tomatoes, grilled onions and tahini sauce.', '6.99', 19),
(144, 'Kafta', 'Grilled ground beef mixed with parsley and onions,  with hummus spread, served in wrapped Lebanese bread  with tomatoes, pickled turnips and pickled cucumbers.', '5.99', 19),
(145, 'Samky Harra', 'Spicy baked ﬁsh cooked with tahini sauce and  topped with nuts, served in wrapped Lebanese bread.', '6.99', 19),
(149, 'Baklawa', 'Any three pieces.', '4.99', 15),
(150, 'Assorted Lebanese Cakes', 'One Lebanese Cake', '5.99', 15),
(151, 'Create Your Own - Cheese Pizza', 'Create your own.', '7.99', 10),
(152, 'Hummus', 'Chickpeas with tahini sauce, garlic, and lemon  juice, garnished with parsley and olive oil.', '3.99', 20),
(153, 'Hummus', 'Chickpeas with tahini sauce, garlic, and lemon  juice, garnished with parsley and olive oil.', '4.99', 20),
(154, 'Foul Mudammas', 'Fava beans with garlic, parsley, tomatoes,  lemon juice, and olive oil.', '4.99', 20),
(155, 'Yogurt Dip', 'Freshly made yogurt with chopped cucumbers,  mint, and garlic', '4.99', 20),
(156, 'Baba Ghanouj', 'Grilled eggplant with tahini sauce, garlic,  and lemon juice, garnished with parsley and olive oil. ', '4.99', 20),
(157, 'Vegetarian Grape Leaves', 'Rolled with rice, tomatoes,  parsley, onions, and green peppers, cooked with olive oil and  lemon juice. When available.', '4.99', 20),
(158, 'Sambousek', 'Decadent pastry pockets stuffed with seasoned  ground beef, onions, and toasted nuts.', '4.99', 20),
(159, 'Kibbie', 'Stuffed with seasoned ground beef, onions, and  toasted nuts.', '6.99', 20),
(160, 'Falafel', 'Deep-fried Chickpeas, onions, and herbs. Served  with tomatoes, pickled turnips and cucumbers, parsley and  tahini sauce.', '3.99', 20),
(161, 'Spinach Pies', 'Delicate miniature pastries stuffed with  spinach, onions, sumac, lemon juice, and olive oil.  ', '3.99', 20),
(162, 'Cheese Pies', 'Delicate miniature pastries stuffed with feta  cheese, onions, mint, and olive oil.', '3.99', 20);

-- --------------------------------------------------------

--
-- Table structure for table `MenuOptionList`
--

CREATE TABLE IF NOT EXISTS `MenuOptionList` (
  `idMenuOptionList` int(11) NOT NULL AUTO_INCREMENT,
  `Mealid` int(11) DEFAULT NULL,
  `Itemid` int(11) DEFAULT NULL,
  `Optionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`idMenuOptionList`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='table to record which items and meals have whcih options or ' AUTO_INCREMENT=309 ;

--
-- Dumping data for table `MenuOptionList`
--

INSERT INTO `MenuOptionList` (`idMenuOptionList`, `Mealid`, `Itemid`, `Optionid`) VALUES
(66, 91, 11, NULL),
(65, 91, 10, NULL),
(64, 90, NULL, 10),
(63, 90, 7, NULL),
(62, 89, NULL, 10),
(61, 89, 7, NULL),
(60, 88, NULL, 10),
(59, 88, 7, NULL),
(58, 87, NULL, 10),
(57, 87, 7, NULL),
(56, 86, NULL, 10),
(55, 86, 7, NULL),
(54, 83, NULL, 12),
(53, 85, NULL, 10),
(52, 85, 8, NULL),
(51, 84, NULL, 10),
(50, 84, 7, NULL),
(49, 83, NULL, 11),
(48, 83, 7, NULL),
(47, 82, NULL, 10),
(46, 82, 7, NULL),
(45, 81, NULL, 10),
(44, 81, 7, NULL),
(43, 80, NULL, 10),
(42, 80, 7, NULL),
(41, 79, NULL, 10),
(40, 79, 7, NULL),
(39, 78, NULL, 10),
(38, 78, 7, NULL),
(37, 77, NULL, 10),
(36, 77, 7, NULL),
(35, 75, 1, 10),
(34, 74, 7, 10),
(67, 91, 12, NULL),
(68, 91, NULL, 14),
(69, 91, NULL, 11),
(70, 92, 10, NULL),
(71, 92, 11, NULL),
(72, 92, 12, NULL),
(73, 92, NULL, 14),
(74, 92, NULL, 11),
(75, 93, 7, NULL),
(76, 93, NULL, 10),
(77, 94, 7, NULL),
(78, 94, NULL, 10),
(79, 95, 7, NULL),
(80, 95, NULL, 10),
(81, 96, 7, NULL),
(82, 96, NULL, 10),
(83, 97, 7, NULL),
(84, 97, NULL, 10),
(88, 98, NULL, 13),
(87, 98, 1, NULL),
(89, 99, 13, NULL),
(90, 99, 14, NULL),
(91, 99, NULL, 14),
(92, 99, NULL, 11),
(93, 100, 13, NULL),
(94, 100, 14, NULL),
(95, 100, NULL, 14),
(96, 100, NULL, 11),
(97, 101, 13, NULL),
(98, 101, 14, NULL),
(99, 101, NULL, 14),
(100, 101, NULL, 11),
(101, 102, 13, NULL),
(102, 102, 14, NULL),
(103, 102, NULL, 14),
(104, 102, NULL, 11),
(108, 103, 21, NULL),
(107, 103, 20, NULL),
(109, 103, 22, NULL),
(110, 104, 20, NULL),
(111, 104, 21, NULL),
(112, 104, 22, NULL),
(113, 104, NULL, 10),
(114, 105, 20, NULL),
(115, 105, 22, NULL),
(116, 105, NULL, 10),
(117, 106, 20, NULL),
(118, 106, 21, NULL),
(119, 106, 22, NULL),
(120, 106, NULL, 10),
(121, 107, 20, NULL),
(122, 107, 21, NULL),
(123, 107, 22, NULL),
(124, 107, NULL, 10),
(125, 108, 20, NULL),
(126, 108, 21, NULL),
(127, 108, 22, NULL),
(128, 108, NULL, 10),
(129, 109, 7, NULL),
(130, 109, NULL, 10),
(131, 110, 7, NULL),
(132, 110, NULL, 10),
(133, 111, 7, NULL),
(134, 111, NULL, 10),
(135, 112, 7, NULL),
(136, 112, NULL, 10),
(137, 113, 7, NULL),
(138, 113, NULL, 10),
(139, 114, 13, NULL),
(140, 114, 14, NULL),
(141, 114, NULL, 14),
(142, 114, NULL, 11),
(143, 115, 13, NULL),
(144, 115, 14, NULL),
(145, 115, 23, NULL),
(146, 115, NULL, 14),
(147, 115, NULL, 11),
(148, 116, 13, NULL),
(149, 116, 14, NULL),
(150, 116, NULL, 14),
(151, 116, NULL, 11),
(152, 117, 13, NULL),
(153, 117, 14, NULL),
(154, 117, NULL, 14),
(155, 117, NULL, 11),
(156, 118, 13, NULL),
(157, 118, 14, NULL),
(158, 118, NULL, 14),
(159, 118, NULL, 11),
(160, 119, 13, NULL),
(161, 119, 14, NULL),
(162, 119, NULL, 14),
(163, 119, NULL, 11),
(164, 120, 13, NULL),
(165, 120, 14, NULL),
(166, 120, NULL, 14),
(167, 120, NULL, 11),
(168, 121, 13, NULL),
(169, 121, 14, NULL),
(170, 121, 15, NULL),
(171, 121, 16, NULL),
(172, 121, NULL, 14),
(173, 121, NULL, 11),
(174, 122, 7, NULL),
(175, 122, NULL, 10),
(187, 123, NULL, 10),
(186, 123, 7, NULL),
(178, 124, 7, NULL),
(179, 124, NULL, 10),
(180, 125, 7, NULL),
(181, 125, NULL, 10),
(182, 126, 7, NULL),
(183, 126, NULL, 10),
(184, 127, 7, NULL),
(185, 127, NULL, 10),
(188, 128, 13, NULL),
(189, 128, 14, NULL),
(190, 128, 24, NULL),
(191, 128, 25, NULL),
(192, 128, NULL, 15),
(193, 128, NULL, 14),
(194, 128, NULL, 11),
(195, 129, 7, NULL),
(196, 129, NULL, 10),
(197, 130, 7, NULL),
(198, 130, NULL, 10),
(199, 131, 7, NULL),
(200, 131, NULL, 10),
(201, 132, 13, NULL),
(202, 132, 19, NULL),
(203, 132, NULL, 14),
(204, 132, NULL, 11),
(205, 133, 7, NULL),
(206, 133, NULL, 10),
(207, 134, 7, NULL),
(208, 134, NULL, 10),
(209, 135, 13, NULL),
(210, 135, 19, NULL),
(211, 135, NULL, 14),
(212, 135, NULL, 11),
(213, 136, 7, NULL),
(214, 136, NULL, 10),
(215, 137, 7, NULL),
(216, 137, NULL, 10),
(217, 138, 7, NULL),
(218, 138, NULL, 10),
(219, 139, 7, NULL),
(220, 139, NULL, 10),
(221, 140, 7, NULL),
(222, 140, NULL, 10),
(223, 141, 7, NULL),
(224, 141, NULL, 10),
(225, 142, 7, NULL),
(226, 142, NULL, 10),
(227, 143, 7, NULL),
(228, 143, NULL, 10),
(229, 144, 7, NULL),
(230, 144, NULL, 10),
(231, 145, 7, NULL),
(232, 145, NULL, 10),
(233, 146, 26, NULL),
(234, 147, 26, NULL),
(235, 147, NULL, 10),
(236, 148, 7, NULL),
(237, 148, NULL, 10),
(238, 149, 26, NULL),
(239, 149, NULL, 10),
(240, 150, 7, NULL),
(241, 150, NULL, 10),
(287, 151, NULL, 10),
(286, 151, 46, NULL),
(285, 151, 45, NULL),
(284, 151, 44, NULL),
(283, 151, 43, NULL),
(282, 151, 42, NULL),
(281, 151, 41, NULL),
(280, 151, 40, NULL),
(279, 151, 39, NULL),
(278, 151, 38, NULL),
(277, 151, 37, NULL),
(276, 151, 36, NULL),
(275, 151, 35, NULL),
(274, 151, 34, NULL),
(273, 151, 33, NULL),
(272, 151, 32, NULL),
(271, 151, 31, NULL),
(270, 151, 30, NULL),
(269, 151, 29, NULL),
(268, 151, 28, NULL),
(267, 151, 27, NULL),
(266, 151, 18, NULL),
(265, 151, 17, NULL),
(288, 152, 47, NULL),
(289, 153, 47, NULL),
(290, 153, NULL, 10),
(291, 154, 7, NULL),
(292, 154, NULL, 10),
(293, 155, 7, NULL),
(294, 155, NULL, 10),
(295, 156, 7, NULL),
(296, 156, NULL, 10),
(297, 157, 7, NULL),
(298, 157, NULL, 10),
(299, 158, 7, NULL),
(300, 158, NULL, 10),
(301, 159, 7, NULL),
(302, 159, NULL, 10),
(303, 160, 7, NULL),
(304, 160, NULL, 10),
(305, 161, 7, NULL),
(306, 161, NULL, 10),
(307, 162, 7, NULL),
(308, 162, NULL, 10);

-- --------------------------------------------------------

--
-- Table structure for table `Menu_Items`
--

CREATE TABLE IF NOT EXISTS `Menu_Items` (
  `idMenu_Items` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Menu Item ID number',
  `Name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Order_by` int(11) DEFAULT NULL,
  `Category_id` int(11) DEFAULT NULL,
  `Cost` decimal(6,2) NOT NULL,
  `Prep_Time` varchar(45) COLLATE utf8_general_mysql500_ci DEFAULT NULL,
  PRIMARY KEY (`idMenu_Items`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='Menu Items' AUTO_INCREMENT=48 ;

--
-- Dumping data for table `Menu_Items`
--

INSERT INTO `Menu_Items` (`idMenu_Items`, `Name`, `Description`, `Order_by`, `Category_id`, `Cost`, `Prep_Time`) VALUES
(1, 'Extra Cheese', 'Extra Cheese', NULL, NULL, '0.50', '1:00'),
(7, 'None', 'No Items', NULL, NULL, '0.00', '0:00'),
(8, 'Grilled chicken', 'Add Grilled Chicken with House salad', NULL, NULL, '2.99', '10'),
(9, 'Marinara Sauce', 'Red', NULL, NULL, '2.00', '0'),
(10, 'Grilled Chicken', 'Grilled Chicken', NULL, NULL, '2.99', '0'),
(11, 'Grilled Steak', 'Grilled Steak', NULL, NULL, '3.99', '0'),
(12, 'Grilled Shrimp', 'Grilled Shrimp', NULL, NULL, '3.99', '0'),
(13, 'Side Salad', 'Side Salad', NULL, NULL, '0.00', '0'),
(14, 'Garlic Bread', 'Garlic Bread', NULL, NULL, '0.00', '0'),
(15, 'Grilled Chicken - Fettuccine Alfredo', 'Grilled Chicken - Fettuccine Alfredo', NULL, NULL, '2.00', '0'),
(16, 'Grilled Shrimp - Fettuccine Alfredo', 'Grilled Shrimp - Fettuccine Alfredo', NULL, NULL, '3.00', '0'),
(17, 'Chicken - Pizza', 'Chicken - Pizza', NULL, NULL, '3.00', '0'),
(18, 'Shrimp - Pizza', 'Shrimp - Pizza', NULL, NULL, '3.00', '0'),
(19, 'Hummus', 'Hummus', NULL, NULL, '0.00', '0'),
(20, 'Rice', 'Rice', NULL, NULL, '0.00', '0'),
(21, 'Steak Fries', 'Steak Fries', NULL, NULL, '0.00', '0'),
(22, 'Steamed Vegetables', 'Steamed Vegetables', NULL, NULL, '0.00', '0'),
(23, 'Alfredo Sauce - Spinach Ravioli', 'Alfredo Sauce - Spinach Ravioli', NULL, NULL, '2.00', '0'),
(24, 'Mushrooms - Spaghetti', 'Mushrooms - Spaghetti', NULL, NULL, '4.00', '0'),
(25, 'Meatballs - Spaghetti', 'Meatballs - Spaghetti', NULL, NULL, '4.00', '0'),
(26, 'Additional Pieces - Baklawa', 'Additional Pieces - Baklawa', NULL, NULL, '1.99', '0'),
(27, 'Pepperoni - Pizza', 'Pepperoni', NULL, NULL, '1.99', '0'),
(28, 'Ham - Pizza', 'Ham', NULL, NULL, '1.99', '0'),
(29, 'Salami - Pizza', 'Salami', NULL, NULL, '1.99', '0'),
(30, 'Bacon - Pizza', 'Bacon', NULL, NULL, '1.99', '0'),
(31, 'Italian Sausage - Pizza', 'Italian Sausage', NULL, NULL, '1.99', '0'),
(32, 'Tomatoes - Pizza', 'Tomatoes', NULL, NULL, '1.99', '0'),
(33, 'Mushrooms - Pizza', 'Mushrooms ', NULL, NULL, '1.99', '0'),
(34, 'Onions - Pizza', 'Onions', NULL, NULL, '1.99', '0'),
(35, 'Pineapple - Pizza', 'Pineapple', NULL, NULL, '1.99', '0'),
(36, 'Green Peppers - Pizza', 'Green Peppers', NULL, NULL, '1.99', '0'),
(37, 'Sun Dried Tomatoes - Pizza', 'Sun Dried Tomatoes ', NULL, NULL, '1.99', '0'),
(38, 'Anchovies - Pizza', 'Anchovies', NULL, NULL, '1.99', '0'),
(39, 'Fire Roasted Peppers - Pizza', 'Fire Roasted Peppers', NULL, NULL, '1.99', '0'),
(40, 'Artichokes - Pizza', 'Artichokes', NULL, NULL, '1.99', '0'),
(41, 'Black Olives - Pizza', 'Black Olives', NULL, NULL, '1.99', '0'),
(42, 'Spinach - Pizza', 'Spinach', NULL, NULL, '1.99', '0'),
(43, 'Jalapeno Peppers - Pizza', 'Jalapeno Peppers', NULL, NULL, '1.99', '0'),
(44, 'Banana Peppers - Pizza', 'Banana Peppers', NULL, NULL, '1.99', '0'),
(45, 'Diced Tomatoes - Pizza', 'Diced Tomatoes', NULL, NULL, '1.99', '0'),
(46, 'Feta Cheese - Pizza', 'Feta Cheese', NULL, NULL, '1.99', '0'),
(47, 'Meat Topping - Hummus', 'Meat Topping', NULL, NULL, '1.99', '0');

-- --------------------------------------------------------

--
-- Table structure for table `Menu_Options`
--

CREATE TABLE IF NOT EXISTS `Menu_Options` (
  `Menu_Optionsid` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(200) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Cost_Increase` decimal(6,2) NOT NULL,
  `Order_By` int(11) DEFAULT NULL,
  PRIMARY KEY (`Menu_Optionsid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='Options for Menu Items such as side, or cooking preferance' AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Menu_Options`
--

INSERT INTO `Menu_Options` (`Menu_Optionsid`, `Name`, `Description`, `Cost_Increase`, `Order_By`) VALUES
(15, 'Baked - Spaghetti', 'Baked - Spaghetti', '2.00', NULL),
(14, 'Caesar Dressing', 'Caesar Dressing', '0.00', NULL),
(13, 'Meatballs', 'Meatballs', '4.00', NULL),
(12, 'BBQ', 'Change Suace to BBQ', '0.00', NULL),
(11, 'Ranch Dressing', 'Ranch Dressing', '0.00', NULL),
(10, 'None', 'No Options', '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `idMessages` int(11) NOT NULL AUTO_INCREMENT,
  `to` int(11) NOT NULL,
  `message` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `read` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`idMessages`),
  UNIQUE KEY `idMessages_UNIQUE` (`idMessages`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=157 ;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`idMessages`, `to`, `message`, `read`) VALUES
(1, 1, 'Hello', b'1'),
(2, 1, 'Message 2', b'1'),
(156, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(155, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(154, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(153, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(152, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(151, 1, 'Order: 288 for table: 8 is ready to be served.', b'0'),
(150, 1, 'Order: 287 for table: 1 is ready to be served.', b'0'),
(149, 1, 'Order: 285 for table: 2 is ready to be served.', b'0'),
(148, 1, 'Order: 271 for table: 1 is ready to be served.', b'1'),
(147, 1, 'Order: 277 for table: 1 is ready to be served.', b'1'),
(146, 1, 'Order: 276 for table: 0 is ready to be served.', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE IF NOT EXISTS `Orders` (
  `idOrders` int(11) NOT NULL AUTO_INCREMENT,
  `Tableid` int(11) NOT NULL,
  `Staffid` int(11) NOT NULL,
  `PlacedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReadyTime` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `ServedTime` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `isReady` int(11) NOT NULL DEFAULT '0',
  `isServed` int(11) NOT NULL DEFAULT '0',
  `isPlaced` bit(1) NOT NULL,
  `isChanged` int(11) NOT NULL,
  `paid` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`idOrders`),
  UNIQUE KEY `idOrders_UNIQUE` (`idOrders`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=294 ;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`idOrders`, `Tableid`, `Staffid`, `PlacedTime`, `ReadyTime`, `ServedTime`, `isReady`, `isServed`, `isPlaced`, `isChanged`, `paid`) VALUES
(293, 7, 12, '2012-08-18 03:45:53', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'0', 0, b'0'),
(292, 7, 1, '2012-08-18 03:01:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'1', 0, b'0'),
(291, 7, 1, '2012-08-18 02:33:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'0', 0, b'0'),
(290, 7, 1, '2012-08-18 02:32:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'0', 0, b'0'),
(289, 13, 1, '2012-08-18 02:31:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'1', 0, b'0'),
(288, 8, 1, '2012-08-18 02:50:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0, b'1', 0, b'0'),
(285, 2, 1, '2012-08-17 20:58:11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, b'1', 0, b'0'),
(286, 1, 1, '2012-08-17 19:31:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, b'1', 0, b'0'),
(287, 1, 1, '2012-08-17 20:54:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 1, b'1', 0, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Order_Items`
--

CREATE TABLE IF NOT EXISTS `Order_Items` (
  `idOrder_Items` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `ItemID` int(11) DEFAULT NULL,
  `MealID` int(11) DEFAULT NULL,
  `OptionID` int(11) DEFAULT NULL,
  `Meal_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`idOrder_Items`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=261 ;

--
-- Dumping data for table `Order_Items`
--

INSERT INTO `Order_Items` (`idOrder_Items`, `OrderID`, `ItemID`, `MealID`, `OptionID`, `Meal_num`) VALUES
(195, 269, 7, 82, NULL, 2),
(194, 269, NULL, 83, 10, 1),
(193, 269, 7, 83, NULL, 1),
(192, 269, NULL, 75, 10, 0),
(191, 269, 7, 75, NULL, 0),
(190, 268, NULL, 74, 10, 5),
(189, 268, 7, 74, NULL, 5),
(188, 268, NULL, 85, 10, 4),
(187, 268, 7, 85, NULL, 4),
(186, 268, NULL, 85, 10, 3),
(185, 268, 7, 85, NULL, 3),
(184, 268, NULL, 80, 10, 2),
(183, 268, 7, 80, NULL, 2),
(182, 268, NULL, 83, 10, 1),
(181, 268, 7, 83, NULL, 1),
(180, 268, NULL, 83, 11, 0),
(179, 268, NULL, 83, 12, 0),
(178, 268, 7, 83, NULL, 0),
(177, 267, NULL, 85, 10, 1),
(176, 267, 7, 85, NULL, 1),
(175, 267, NULL, 75, 10, 0),
(174, 267, 7, 75, NULL, 0),
(173, 266, NULL, 74, 10, 2),
(172, 266, 7, 74, NULL, 2),
(171, 266, NULL, 83, 10, 1),
(170, 266, 7, 83, NULL, 1),
(169, 266, NULL, 75, 10, 0),
(168, 266, 7, 75, NULL, 0),
(167, 265, NULL, 85, 10, 3),
(166, 265, 8, 85, NULL, 3),
(165, 265, NULL, 82, 10, 2),
(164, 265, 7, 82, NULL, 2),
(163, 265, NULL, 83, 10, 1),
(162, 265, 7, 83, NULL, 1),
(161, 265, NULL, 75, 10, 0),
(160, 265, 1, 75, NULL, 0),
(159, 264, NULL, 75, 10, 0),
(158, 264, 1, 75, NULL, 0),
(157, 263, NULL, 83, 12, 0),
(156, 263, 7, 83, NULL, 0),
(155, 263, NULL, 83, 12, 0),
(154, 263, 7, 83, NULL, 0),
(196, 269, NULL, 82, 10, 2),
(197, 269, 7, 85, NULL, 3),
(198, 269, NULL, 85, 10, 3),
(199, 269, 7, 85, NULL, 4),
(200, 269, NULL, 85, 10, 4),
(201, 270, 7, 75, NULL, 0),
(202, 270, NULL, 75, 10, 0),
(203, 271, 1, 75, NULL, 0),
(204, 271, 1, 75, NULL, 0),
(205, 271, NULL, 75, 10, 0),
(206, 272, 7, 74, NULL, 0),
(207, 272, NULL, 74, 10, 0),
(208, 273, 7, 75, NULL, 0),
(209, 273, NULL, 75, 10, 0),
(210, 273, 7, 85, NULL, 1),
(211, 273, NULL, 85, 10, 1),
(212, 273, 7, 76, NULL, 2),
(213, 273, NULL, 76, 10, 2),
(214, 274, 7, 83, NULL, 0),
(215, 274, NULL, 83, 10, 0),
(216, 275, 7, 75, NULL, 0),
(217, 275, NULL, 75, 10, 0),
(218, 276, 1, 75, NULL, 0),
(219, 276, NULL, 75, 10, 0),
(220, 277, 1, 75, NULL, 0),
(221, 277, NULL, 75, 10, 0),
(222, 277, 7, 82, NULL, 1),
(223, 277, NULL, 82, 10, 1),
(224, 278, 7, 75, NULL, 0),
(225, 278, NULL, 75, 10, 0),
(226, 282, 7, 75, NULL, 0),
(227, 282, NULL, 75, 10, 0),
(228, 282, 1, 75, NULL, 1),
(229, 282, 1, 75, NULL, 1),
(230, 282, NULL, 75, 10, 1),
(231, 283, 7, 75, NULL, 0),
(232, 283, NULL, 75, 10, 0),
(233, 283, 1, 75, NULL, 1),
(234, 283, NULL, 75, 10, 1),
(235, 285, 7, 114, NULL, 0),
(236, 285, NULL, 114, 10, 0),
(237, 285, 14, 115, NULL, 1),
(238, 285, NULL, 115, 10, 1),
(239, 285, 7, 117, NULL, 2),
(240, 285, NULL, 117, 14, 2),
(241, 286, 7, 91, NULL, 0),
(242, 286, NULL, 91, 10, 0),
(243, 286, 7, 92, NULL, 1),
(244, 286, NULL, 92, 10, 1),
(245, 286, 7, 90, NULL, 2),
(246, 286, NULL, 90, 10, 2),
(247, 287, 7, 99, NULL, 0),
(248, 287, NULL, 99, 10, 0),
(249, 287, 20, 104, NULL, 1),
(250, 287, NULL, 104, 10, 1),
(251, 287, 20, 108, NULL, 2),
(252, 287, NULL, 108, 10, 2),
(253, 288, 7, 123, NULL, 0),
(254, 288, NULL, 123, 10, 0),
(255, 289, 7, 116, NULL, 0),
(256, 289, NULL, 116, 10, 0),
(257, 292, 7, 127, NULL, 0),
(258, 292, NULL, 127, 10, 0),
(259, 292, 7, 124, NULL, 1),
(260, 292, NULL, 124, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `idPermissions` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPermissions`),
  UNIQUE KEY `idPermissions_UNIQUE` (`idPermissions`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=14 ;

--
-- Dumping data for table `Permissions`
--

INSERT INTO `Permissions` (`idPermissions`, `staff_id`, `permission`) VALUES
(1, 1, 777),
(2, 2, 666),
(3, 3, 666),
(4, 6, 555),
(5, 7, 444),
(6, 8, 555),
(7, 9, 666),
(8, 12, 444),
(9, 13, 333),
(10, 14, 333),
(11, 15, 555),
(12, 16, 666),
(13, 17, 777);

-- --------------------------------------------------------

--
-- Table structure for table `Permission_list`
--

CREATE TABLE IF NOT EXISTS `Permission_list` (
  `idPermission_list` int(11) NOT NULL AUTO_INCREMENT,
  `Permission` int(11) NOT NULL,
  `Position` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`idPermission_list`),
  UNIQUE KEY `idPermission_list_UNIQUE` (`idPermission_list`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Permission_list`
--

INSERT INTO `Permission_list` (`idPermission_list`, `Permission`, `Position`) VALUES
(1, 777, 'admin'),
(2, 666, 'manager'),
(3, 555, 'hostes'),
(4, 444, 'kitchen'),
(5, 333, 'waitstaff');

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE IF NOT EXISTS `Staff` (
  `idStaff` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `UID` int(10) unsigned NOT NULL,
  `firstname` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `lastname` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `staff_name` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `passcode` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  PRIMARY KEY (`idStaff`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`idStaff`, `UID`, `firstname`, `lastname`, `staff_name`, `passcode`) VALUES
(2, 2, 'Rod', 'Francis', 'Rod', '1234'),
(9, 0, 'Elizabeth', 'Johnson', 'ElizabethJ', '2046'),
(15, 0, 'Test', 'Hostess', 'Hostess Test', '1234'),
(12, 0, 'Kitchen', 'Kitchen', 'Kitchen', '1234'),
(14, 0, 'Test', 'Waitstaff', 'Waitstaff test', '1234'),
(16, 0, 'Test', 'Manager', 'Manager Test', '1234'),
(17, 0, 'James', 'Johnson', 'admin', '2046');

-- --------------------------------------------------------

--
-- Table structure for table `Tables`
--

CREATE TABLE IF NOT EXISTS `Tables` (
  `idTables` int(11) NOT NULL AUTO_INCREMENT,
  `Location` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `Number of Seats` int(11) NOT NULL,
  `Combine_With_id` int(11) DEFAULT NULL,
  `Reserved_Flag` bit(1) NOT NULL,
  `Assigned_to_id` int(11) DEFAULT NULL,
  `Occupied_Flag` bit(1) NOT NULL,
  `Clean` int(11) NOT NULL,
  `Ready_flag` bit(1) NOT NULL,
  PRIMARY KEY (`idTables`),
  UNIQUE KEY `idTables_UNIQUE` (`idTables`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci COMMENT='Tables in the Resturant' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Tables`
--

INSERT INTO `Tables` (`idTables`, `Location`, `Number of Seats`, `Combine_With_id`, `Reserved_Flag`, `Assigned_to_id`, `Occupied_Flag`, `Clean`, `Ready_flag`) VALUES
(1, 'behind door 1', 6, NULL, b'0', 1, b'0', 1, b'1'),
(2, 'behind door 2', 4, NULL, b'0', 1, b'1', 1, b'0');

-- --------------------------------------------------------

--
-- Table structure for table `Table_Assignments`
--

CREATE TABLE IF NOT EXISTS `Table_Assignments` (
  `idTable_Assignments` int(11) NOT NULL AUTO_INCREMENT,
  `Table_id` int(11) NOT NULL,
  `Staff_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`idTable_Assignments`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Table_Assignments`
--

INSERT INTO `Table_Assignments` (`idTable_Assignments`, `Table_id`, `Staff_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 1),
(5, 5, NULL),
(6, 6, NULL),
(7, 7, NULL),
(8, 8, NULL),
(9, 9, NULL),
(10, 10, NULL),
(11, 11, NULL),
(12, 12, NULL),
(13, 13, NULL),
(14, 14, NULL),
(15, 15, NULL),
(16, 16, NULL),
(17, 17, NULL),
(18, 18, NULL),
(19, 19, NULL),
(20, 20, NULL),
(21, 21, NULL),
(22, 22, NULL),
(23, 23, NULL),
(24, 24, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) COLLATE utf8_general_mysql500_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_general_mysql500_ci NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idusers`),
  UNIQUE KEY `idusers_UNIQUE` (`idusers`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idusers`, `username`, `password`, `datecreated`) VALUES
(1, 'admin', 'd699e6913f5c022d8675d3b3d24a1e096361c827', '0000-00-00 00:00:00'),
(2, 'test', 'ab4d8d2a5f480a137067da17100271cd176607a1', '2012-08-01 16:24:20'),
(3, 'georges', 'e559e43c2ee8ce84d42dfc2518e5a69e902499f2', '2012-08-16 20:14:14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
