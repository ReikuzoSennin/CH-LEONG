-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 02:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chleong`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `userID`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `cartID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`cartID`, `productID`, `quantity`) VALUES
(1, 1, 1),
(2, 3, 4),
(2, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `subCategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `subCategoryName`) VALUES
(1, 'VEGETABLES', ''),
(2, 'VEGETABLES', 'Fruity Vegetables'),
(3, 'VEGETABLES', 'Potato type Vegetables'),
(4, 'VEGETABLES', 'Vegetable Beans'),
(5, 'VEGETABLES', 'Mushroom'),
(6, 'VEGETABLES', 'Leafy Vegetables'),
(7, 'MEAT & POULTRY', ''),
(8, 'MEAT & POULTRY', 'Turkey'),
(9, 'MEAT & POULTRY', 'Duck'),
(10, 'MEAT & POULTRY', 'Quail'),
(11, 'MEAT & POULTRY', 'Ostrich'),
(12, 'MEAT & POULTRY', 'Venicon Meat'),
(13, 'MEAT & POULTRY', 'Chicken'),
(14, 'MEAT & POULTRY', 'Lamb & Mutton'),
(15, 'MEAT & POULTRY', 'beef'),
(16, 'MEAT & POULTRY', 'Egg'),
(17, 'SEAFOOD', 'Shell'),
(18, 'SEAFOOD', 'Fish'),
(19, 'SEAFOOD', 'Grab'),
(20, 'SEAFOOD', 'Fillet Fish'),
(21, 'SEAFOOD', 'Prawn'),
(22, 'SEAFOOD', 'Squid'),
(23, 'SEAFOOD', ''),
(24, 'FRUIT', '');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `productID` int(11) NOT NULL,
  `productInventory` enum('In Stock','Out of Stock') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`productID`, `productInventory`) VALUES
(1, 'In Stock'),
(2, 'Out of Stock'),
(3, 'In Stock'),
(4, 'In Stock'),
(5, 'In Stock'),
(6, 'In Stock'),
(7, 'Out of Stock'),
(8, 'In Stock'),
(9, 'In Stock'),
(10, 'In Stock'),
(11, 'In Stock'),
(12, 'In Stock'),
(13, 'In Stock'),
(14, 'In Stock'),
(15, 'In Stock'),
(16, 'In Stock'),
(17, 'In Stock'),
(18, 'In Stock'),
(19, 'In Stock'),
(20, 'In Stock'),
(21, 'In Stock'),
(22, 'In Stock'),
(23, 'In Stock'),
(24, 'In Stock'),
(25, 'In Stock'),
(26, 'In Stock'),
(27, 'In Stock'),
(28, 'In Stock'),
(29, 'In Stock'),
(30, 'In Stock'),
(31, 'In Stock'),
(32, 'In Stock'),
(33, 'In Stock'),
(34, 'In Stock'),
(35, 'In Stock'),
(36, 'In Stock'),
(37, 'In Stock'),
(38, 'In Stock'),
(39, 'In Stock'),
(40, 'In Stock'),
(41, 'In Stock'),
(42, 'In Stock'),
(43, 'In Stock'),
(44, 'In Stock'),
(45, 'In Stock'),
(46, 'In Stock'),
(47, 'In Stock'),
(48, 'In Stock'),
(49, 'In Stock'),
(50, 'In Stock'),
(51, 'In Stock'),
(52, 'In Stock'),
(53, 'In Stock'),
(54, 'In Stock'),
(55, 'In Stock'),
(56, 'In Stock'),
(57, 'In Stock'),
(58, 'In Stock'),
(59, 'In Stock'),
(60, 'In Stock'),
(61, 'In Stock'),
(62, 'In Stock'),
(63, 'In Stock'),
(64, 'In Stock'),
(65, 'In Stock'),
(66, 'In Stock'),
(67, 'In Stock'),
(68, 'In Stock'),
(69, 'In Stock'),
(70, 'In Stock'),
(71, 'In Stock'),
(72, 'In Stock'),
(73, 'In Stock'),
(74, 'In Stock'),
(75, 'In Stock'),
(76, 'In Stock'),
(77, 'In Stock'),
(78, 'In Stock'),
(79, 'In Stock'),
(80, 'In Stock'),
(81, 'In Stock'),
(82, 'In Stock'),
(83, 'In Stock'),
(84, 'In Stock'),
(85, 'In Stock'),
(86, 'In Stock'),
(87, 'In Stock'),
(88, 'In Stock'),
(89, 'In Stock'),
(90, 'In Stock'),
(91, 'In Stock'),
(92, 'In Stock'),
(93, 'In Stock'),
(94, 'In Stock'),
(95, 'In Stock'),
(96, 'In Stock'),
(97, 'In Stock'),
(98, 'In Stock'),
(99, 'In Stock'),
(100, 'In Stock'),
(101, 'In Stock'),
(102, 'In Stock'),
(103, 'In Stock'),
(104, 'In Stock'),
(105, 'In Stock'),
(106, 'In Stock'),
(107, 'In Stock'),
(108, 'In Stock'),
(109, 'In Stock'),
(110, 'In Stock'),
(111, 'In Stock'),
(112, 'In Stock'),
(113, 'In Stock'),
(114, 'In Stock'),
(115, 'In Stock'),
(116, 'In Stock'),
(117, 'In Stock'),
(118, 'In Stock'),
(119, 'In Stock'),
(120, 'In Stock'),
(121, 'In Stock'),
(122, 'In Stock'),
(123, 'In Stock'),
(124, 'In Stock'),
(125, 'In Stock'),
(126, 'In Stock'),
(127, 'In Stock'),
(128, 'In Stock'),
(129, 'In Stock'),
(130, 'In Stock'),
(131, 'In Stock'),
(132, 'In Stock'),
(133, 'In Stock'),
(134, 'In Stock'),
(135, 'In Stock'),
(136, 'In Stock'),
(137, 'In Stock'),
(138, 'In Stock'),
(139, 'In Stock'),
(140, 'In Stock'),
(141, 'In Stock'),
(142, 'In Stock'),
(143, 'In Stock'),
(144, 'In Stock'),
(145, 'In Stock'),
(146, 'In Stock'),
(147, 'In Stock'),
(148, 'In Stock'),
(149, 'In Stock'),
(150, 'In Stock'),
(151, 'In Stock'),
(152, 'In Stock'),
(153, 'In Stock'),
(154, 'In Stock'),
(155, 'In Stock'),
(156, 'In Stock'),
(157, 'In Stock'),
(158, 'In Stock'),
(159, 'In Stock'),
(160, 'In Stock'),
(161, 'In Stock'),
(162, 'In Stock'),
(163, 'In Stock'),
(164, 'In Stock'),
(165, 'In Stock'),
(166, 'In Stock'),
(167, 'In Stock'),
(168, 'In Stock'),
(169, 'In Stock'),
(170, 'In Stock'),
(171, 'In Stock'),
(172, 'In Stock'),
(173, 'In Stock'),
(174, 'In Stock'),
(175, 'In Stock'),
(176, 'In Stock'),
(177, 'In Stock'),
(178, 'In Stock'),
(179, 'In Stock'),
(180, 'In Stock'),
(181, 'In Stock'),
(182, 'In Stock'),
(183, 'In Stock'),
(184, 'In Stock'),
(185, 'In Stock'),
(186, 'In Stock'),
(187, 'In Stock'),
(188, 'In Stock'),
(189, 'In Stock'),
(190, 'In Stock'),
(191, 'In Stock'),
(192, 'In Stock'),
(193, 'In Stock'),
(194, 'In Stock'),
(195, 'In Stock'),
(196, 'In Stock'),
(197, 'In Stock'),
(198, 'In Stock'),
(199, 'In Stock'),
(200, 'In Stock'),
(201, 'In Stock'),
(202, 'In Stock'),
(203, 'In Stock'),
(204, 'In Stock'),
(205, 'In Stock'),
(206, 'In Stock'),
(207, 'In Stock'),
(208, 'In Stock'),
(209, 'In Stock'),
(210, 'In Stock'),
(211, 'In Stock'),
(212, 'In Stock'),
(213, 'In Stock'),
(214, 'In Stock'),
(215, 'In Stock'),
(216, 'In Stock'),
(217, 'In Stock'),
(218, 'In Stock'),
(219, 'In Stock'),
(220, 'In Stock'),
(221, 'In Stock'),
(222, 'In Stock'),
(223, 'In Stock'),
(224, 'In Stock'),
(225, 'In Stock'),
(226, 'In Stock'),
(227, 'In Stock'),
(228, 'In Stock'),
(229, 'In Stock'),
(230, 'In Stock'),
(231, 'In Stock'),
(232, 'In Stock'),
(233, 'In Stock'),
(234, 'In Stock'),
(235, 'In Stock'),
(236, 'In Stock'),
(237, 'In Stock'),
(238, 'In Stock'),
(239, 'In Stock'),
(240, 'In Stock'),
(241, 'In Stock'),
(242, 'In Stock'),
(243, 'In Stock'),
(244, 'In Stock'),
(245, 'In Stock'),
(246, 'In Stock'),
(247, 'In Stock'),
(248, 'In Stock'),
(249, 'In Stock'),
(250, 'In Stock'),
(251, 'In Stock'),
(252, 'In Stock'),
(253, 'In Stock'),
(254, 'In Stock'),
(255, 'In Stock'),
(256, 'In Stock'),
(257, 'In Stock'),
(258, 'In Stock'),
(259, 'In Stock'),
(260, 'In Stock'),
(261, 'In Stock'),
(262, 'In Stock'),
(263, 'In Stock'),
(264, 'In Stock'),
(265, 'In Stock'),
(266, 'In Stock'),
(267, 'In Stock'),
(268, 'In Stock'),
(269, 'In Stock'),
(270, 'In Stock'),
(271, 'In Stock'),
(272, 'In Stock'),
(273, 'In Stock'),
(274, 'In Stock'),
(275, 'In Stock'),
(276, 'In Stock'),
(277, 'In Stock'),
(278, 'In Stock'),
(279, 'In Stock'),
(280, 'In Stock'),
(281, 'In Stock'),
(282, 'In Stock'),
(283, 'In Stock'),
(284, 'In Stock'),
(285, 'In Stock'),
(286, 'In Stock'),
(287, 'In Stock'),
(288, 'In Stock'),
(289, 'In Stock'),
(290, 'In Stock'),
(291, 'In Stock');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `variantName` varchar(255) NOT NULL,
  `productPrice` float(8,2) NOT NULL,
  `productImage` varchar(255) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productID`, `productName`, `variantName`, `productPrice`, `productImage`, `categoryID`) VALUES
(1, 'Fuji Apple(CHN)', 'Fuji Apple(CHN)(88/113p)', 80.00, 'media/Site Files/Apples-Red.jpg', 24),
(2, 'Fuji Apple(CHN)', 'Fuji Apple(CHN)(64/72/80p)', 112.00, 'media/Site Files/Apples-Red.jpg', 24),
(3, 'Fuji Apple(CHN)', 'Fuji Apple(CHN)(125/138/150)', 78.00, 'media/Site Files/Apples-Red.jpg', 24),
(4, 'Fuji Apple SA', 'Fuji Apple SA(100)', 0.00, 'media/Site Files/Fuji Apple Sa.jpg', 24),
(5, 'Fuji Apple SA', 'Fuji Apple SA(150)', 118.00, 'media/Site Files/Fuji Apple Sa.jpg', 24),
(6, 'Fuji Apple SA', 'Fuji Apple SA(180)', 108.00, 'media/Site Files/Fuji Apple Sa.jpg', 24),
(7, 'Royal Gala Apple(SA)/135p', '', 102.00, 'media/Site Files/royal-gala-apples--sa---bulk.webp.png', 24),
(8, 'Honey Mandarin(CHN)/84', '', 55.00, 'media/Site Files/honey mandarin.jpg', 24),
(9, 'Valencia Orange (EGY)', 'Valencia Orange (EGY)(72)', 55.00, 'media/Site Files/valencia.png', 24),
(10, 'Valencia Orange (EGY)', 'Valencia Orange (EGY)(88)', 55.00, 'media/Site Files/valencia.png', 24),
(11, 'Valencia Orange (EGY)', 'Valencia Orange (EGY)(100)', 55.00, 'media/Site Files/valencia.png', 24),
(12, 'Century Pear(CHN)/42p', '', 88.00, 'media/Site Files/cncenturypear.jpg', 24),
(13, 'Fragrant Pear(CHN)/7kg/XL', '', 65.00, 'media/Site Files/Fragrant.jfif.jpg', 24),
(14, 'Ya Pear(CHN)', 'Ya Pear(CHN)(80p)', 55.00, 'media/Site Files/ya pear.png', 24),
(15, 'Ya Pear(CHN)', 'Ya Pear(CHN)(96p)', 50.00, 'media/Site Files/ya pear.png', 24),
(16, 'Ya Pear(CHN)', 'Ya Pear(CHN)(112p)', 45.00, 'media/Site Files/ya pear.png', 24),
(17, 'Gong Pear(CHN)/36p', '', 55.00, 'media/Site Files/gong-pear-1-kg.jpg', 24),
(18, 'Sonaka Grape(IND)/500g*10p', '', 0.00, 'media/Site Files/Grapes-Sonaka-1.jpg', 24),
(19, 'Lychee(CHN)', 'Lychee(CHN)(1kg*12p)', 0.00, 'media/Site Files/Lychee-Fruit.jpg', 24),
(20, 'Lychee(CHN)', 'Lychee(CHN)(9kg)', 0.00, 'media/Site Files/Lychee-Fruit.jpg', 24),
(21, 'Cherry(USA)/5kg', '', 0.00, 'media/Site Files/cherry.jpg', 24),
(22, 'Hami Melon CHINA/9kg', '', 60.00, 'media/Site Files/hami melon china.jpeg', 24),
(23, 'Lemon', 'Lemon(CHN(75))', 85.00, 'media/Site Files/0007137_yellow-lemon-nimbu-big-australia_600.jpeg', 24),
(24, 'Lemon', 'Lemon(SA(113))', 88.00, 'media/Site Files/0007137_yellow-lemon-nimbu-big-australia_600.jpeg', 24),
(25, 'BANGLADESH/Potato/500g*10p', '', 13.00, 'media/Site Files/potato bangladesh.jpg', 3),
(26, 'Big Shallot(IND)/500g*10p', '', 15.00, 'media/Site Files/RedOnions_2x.jpg', 3),
(27, 'Dried Chilli(IND)/100g*10p', '', 18.00, 'media/Site Files/17480769.jpg', 2),
(28, 'Sweet Corn(25packet*2pcs)', '', 68.00, 'media/Site Files/sweet corn.jfif.jpg', 2),
(29, 'Sweet Tamarind(1kg*10p)', '', 135.00, 'media/Site Files/Swwt-tamarind-e1553651180248.jpg', 2),
(30, 'Dried Seaweed(50g*30p)', '', 65.00, 'media/Site Files/seaweeds.jpg', 1),
(31, 'GroundNut(5kg)', '', 50.00, 'media/Site Files/138071379-peanut-isolated-on-white-background-.jpg', 4),
(32, 'Salt Plum', 'Salt Plum(168g*48)', 80.00, 'media/Site Files/salt plum.jpg', 24),
(33, 'Salt Plum', 'Salt Plum(2kg*6)', 85.00, 'media/Site Files/salt plum.jpg', 24),
(34, 'Sichuan Whole', 'Sichuan Whole(250g*50p)', 0.00, 'media/Site Files/sichuan.jpeg', 7),
(35, 'Sichuan Whole', 'Sichuan Whole(38kg)', 0.00, 'media/Site Files/sichuan.jpeg', 7),
(36, 'Garlic Pulp', '', 270.00, 'media/Site Files/garlic pulp.webp.png', 3),
(37, 'Lotus Seed(100g*50p)', '', 130.00, 'media/Site Files/Tangy_Lotus_Seeds_2x.jpg', 4),
(38, 'Ginkgo Nut(80g*100p)', '', 95.00, 'media/Site Files/ginkgo-nuts-1598941156-5570755.jpeg', 4),
(39, 'Bamboo Shoot (10kg)', '', 130.00, 'media/Site Files/bamboo shoot.jpg', 1),
(40, 'Fresh Black Fungus(200g*25p)', '', 65.00, 'media/Site Files/black fungus.jfif.jpg', 1),
(41, 'Wax Gourd(1kg)', '', 4.00, 'media/Site Files/wax-gourd-seeds-benincasa-hispida.jpg', 2),
(42, 'Arrow Root (10kg)', '', 0.00, 'media/Site Files/arrow root-910x1155.jpg', 3),
(43, 'Yacon(7kg)', '', 0.00, 'media/Site Files/yacon_jpg3.jpg', 3),
(44, 'Baby Qing Bak(4kg)', '', 50.00, 'media/Site Files/china-baby-qing-bak-200g-pack.jpg', 1),
(45, 'Baby Dou Bak (4kg)', '', 50.00, 'media/Site Files/Dou Bak.jpg', 1),
(46, 'Burdock Root (10kg)', '', 48.00, 'media/Site Files/RMLEG100BURDOCKROOT-100-g-Burdock-Root-Liquid-Extract-_91_Glycerine-Based_93_-L-20191108_ml.jpg', 3),
(47, 'Huai Shan(10kg)', 'Huai Shan(10kg)(Normal)', 70.00, 'media/Site Files/1626242873_huai shan (1).png', 3),
(48, 'Huai Shan(10kg)', 'Huai Shan(10kg)(Vacuum)', 60.00, 'media/Site Files/1626242873_huai shan (1).png', 3),
(49, 'Mixed Mushroom(400g*20p)', '', 95.00, 'media/Site Files/cultivated_mushroom_mix.jpg', 5),
(50, 'Snow White Mushroom(150g*40p)', '', 75.00, 'media/Site Files/SNOW-WHITE-MUSHROOM-150G-1-980x980.jpg', 5),
(51, 'Sweet Pea(130g*30p)', '', 53.00, 'media/Site Files/sweet-peas.jpg', 4),
(52, 'Garlic Sprout (10kg)', '', 0.00, 'media/Site Files/garlic sprout.jfif.jpg', 6),
(53, 'Lettuce Shoot(10kg)', '', 0.00, 'media/Site Files/shoot.jpg', 6),
(54, 'Spinach(200g*20p)', '', 60.00, 'media/Site Files/spinach (1).jpg', 6),
(55, 'Mak Choy (300g*13p)', '', 50.00, 'media/Site Files/yau-mak-choy-500g.jpg', 6),
(56, 'Kale/Baby Kale/Stem Kale', 'Stem Kale(10kg)', 80.00, 'media/Site Files/Easy-Way-Remove-Kale-Stems.jpg', 6),
(57, 'Kale/Baby Kale/Stem Kale', 'Kale(5.5kg)', 65.00, 'media/Site Files/kale.jpg', 6),
(58, 'Kale/Baby Kale/Stem Kale', 'Baby Kale(4kg)', 60.00, 'media/Site Files/8454 (1).png', 6),
(59, 'CHN Wong Bok/Baby Wong Bok', 'Baby Wong Bok(Small)', 25.00, 'media/Site Files/wong bok.jpg', 6),
(60, 'CHN Wong Bok/Baby Wong Bok', 'CHN Wong Bok(Large)', 65.00, 'media/Site Files/wong bok.jpg', 6),
(61, 'Purple Cabbage(10kg)', '', 65.00, 'media/Site Files/kubis merah.jpg', 6),
(62, 'CHINA Cabbage(20kg)', '', 22.00, 'media/Site Files/B4433273-C975-4B4F-BF5B-95A69B2FE950_4_5005_c-e1593064273205.jpg', 6),
(63, 'VIET Carrot', 'VIET Carrot(10kg)', 21.00, 'media/Site Files/carrot vietname.jpg', 2),
(64, 'VIET Carrot', 'VIET Carrot(4.5kg)', 12.00, 'media/Site Files/carrot vietname.jpg', 2),
(65, 'VIET Sweet Potato (Yellow) /10kg', 'VIET Sweet Potato/10kg(Yellow)', 65.00, 'media/Site Files/Sweet-Potato-Yellow.jpg', 3),
(66, 'VIET Sweet Potato (Purple) /10kg', 'VIET Sweet Potato/10kg(Purple)', 65.00, 'media/Site Files/Sweet-Potato-Purple-1.jpg', 3),
(67, 'VIET Sweet Potato (Yellow) /5kg', 'VIET Sweet Potato/5kg(Yellow)', 38.00, 'media/Site Files/Sweet-Potato-Yellow.jpg', 3),
(68, 'VIET Sweet Potato (Purple) /5kg', 'VIET Sweet Potato/5kg(Purple)', 38.00, 'media/Site Files/Sweet-Potato-Purple-1.jpg', 3),
(69, 'JAPAN Huai Shan (10kg)', '', 290.00, 'media/Site Files/Fresh-Chinese-yam.jpg', 3),
(70, 'USA Baby Carrot(250kg*40p)', '', 180.00, 'media/Site Files/baby carrot.png', 3),
(71, 'CHN Baby Pumpkin (2kg)', '', 0.00, 'media/Site Files/baby pumpkin.jpg', 2),
(72, 'AUS Purple Carrot', 'AUS Purple Carrot(9kg)', 80.00, 'media/Site Files/carrot puplr.png', 3),
(73, 'AUS Purple Carrot', 'AUS Purple Carrot(500g*15p)', 0.00, 'media/Site Files/carrot puplr.png', 3),
(74, 'AUS Potato Nadine/Ruby Lou/Royal Blue/Chat Baby (15kg)', 'AUS Potato Nadine (15kg)', 100.00, 'media/Site Files/nadine-potato.jpg', 3),
(75, 'AUS Potato Nadine/Ruby Lou/Royal Blue/Chat Baby (15kg)', 'AUS Potato Ruby Lou (15kg)', 100.00, 'media/Site Files/555_ruby-lou.jpg', 3),
(76, 'AUS Potato Nadine/Ruby Lou/Royal Blue/Chat Baby (15kg)', 'AUS Potato Royal Blue (15kg)', 100.00, 'media/Site Files/royal blue potato.jpg', 3),
(77, 'AUS Potato Nadine/Ruby Lou/Royal Blue/Chat Baby (15kg)', 'AUS Potato Chat Baby (15kg)', 100.00, 'media/Site Files/chat potato.jpg', 3),
(78, 'Turkey Whole Raw', '', 0.00, 'media/Site Files/turkey1.jpg', 8),
(79, 'Turkey Breast', '', 0.00, 'media/Site Files/20000005552-10.jpg', 8),
(80, 'Sliced Turkey Toast', '', 0.00, 'media/Site Files/hennies-premium-turkey-toast-slice.jpg', 8),
(81, 'Turkey Bacon', '', 0.00, 'media/Site Files/paleo-nutrition-wales-outdoor-reared-thick-cut-back-bacon-800x600.jpg', 8),
(82, 'Duck Breast Raw Meat', '', 0.00, 'media/Site Files/11-barbary-duck-breast-170-230gr-pack-of-2-400x400.jpg', 9),
(83, 'Smoked Duck', '', 0.00, 'media/Site Files/6qDsWTityZEvsWLYNpreaTlIt5GlvWm2p2c4ShmH.jpeg', 9),
(84, 'Whole Duck', '', 0.00, 'media/Site Files/Duck-Whole-1.jpg', 9),
(85, 'Quail', '', 0.00, 'media/Site Files/frozen-france-quail-2pcs.jpg', 10),
(86, 'Ostrich Steak/Meat', '', 0.00, 'media/Site Files/Ostrich Steak.jpg', 11),
(87, 'Venicon Meat', '', 0.00, 'media/Site Files/venicon.jpg', 12),
(88, 'Minced Chicken (2kg)', '', 29.40, 'media/Site Files/Fresh-minced-chicken.jpg', 13),
(89, 'Fresh Chicken Skin (800g-1kg) [Halal]', '', 6.50, 'media/Site Files/Fresh-chicken-skin.jpg', 13),
(90, 'Fresh Chicken Gizzard (800g-1kg) [Halal]', '', 7.80, 'media/Site Files/Fresh-chicken-gizzard.jpg', 13),
(91, 'Old Hen (1 bird) [Halal]', '', 10.40, 'media/Site Files/Old-Hen.jpg', 13),
(92, 'Fresh Chicken Neck (800g-1kg) [Halal]', '', 4.75, 'media/Site Files/Fresh-chicken-neck.jpg', 13),
(93, 'Fresh Chicken Feet (800g-1kg) [Halal]', '', 8.90, 'media/Site Files/Fresh-chicken-feet.jpg', 13),
(94, 'Fresh Chicken Liver (800g-1kg) [Halal]', '', 3.90, 'media/Site Files/Fresh-chicken-liver.jpg', 13),
(95, 'Fresh Chicken Quarter (800g-1kg) [Halal]', '', 15.60, 'media/Site Files/Fresh-chicken-mc-wholeleg.jpg', 13),
(96, 'Fresh Chicken Drumstick (800g-1kg) [Halal]', '', 16.40, 'media/Site Files/Fresh-chicken-drumstick.jpg', 13),
(97, 'Fresh Chicken Wing (800g-1kg) [Halal]', '', 16.20, 'media/Site Files/Fresh-chicken-wing.jpg', 13),
(98, 'Fresh Chicken Thigh (800g-1kg) [Halal]', '', 12.00, 'media/Site Files/Fresh-chicken-thigh.jpg', 13),
(99, 'Fresh Chicken Chop +/-2kg [Halal]', '', 36.80, 'media/Site Files/Fresh-chicken-chop.jpg', 13),
(100, 'Fresh Kampung Chicken (1.5-1.8kg) [Halal]', '', 39.00, 'media/Site Files/Fresh-kampung-chicken-jantan.jpg', 13),
(101, 'Fresh Chicken Fillet (800g-1kg) [Halal]', '', 15.30, 'media/Site Files/Chicken-Fillet-Halal.jpg', 13),
(102, 'Fresh Chicken Whole Leg (800g-1kg) [Halal]', '', 15.00, 'media/Site Files/Whole-Chicken-No-Head-Feet.jpg', 13),
(103, 'Whole Chicken – No Head and Feet (1.5-1.7kg) [Halal]', '', 18.10, 'media/Site Files/Whole-Chicken-No-Head-Feet.jpg', 13),
(104, 'Fresh Chicken Carcass (800g-1kg) [Halal]', '', 3.00, 'media/Site Files/Fresh-chicken-carcass.jpg', 13),
(105, 'Fresh Chicken Breastmeat (800g-1kg) [Halal]', '', 13.40, 'media/Site Files/Fresh-chicken-breastmeat.jpg', 13),
(106, 'Australian Lamb Leg Boneless', '', 0.00, 'media/Site Files/compass_fresh_compass_fresh_-_denpasar_lamb_leg_boneless_aus_-500_gr-_full02_pkd5l9vd.jpg', 14),
(107, 'Fresh Lamb Shanks', '', 0.00, 'media/Site Files/istockphoto-857252480-612x612.jpg', 14),
(108, 'Lamb Chops', '', 0.00, 'media/Site Files/273408011_0_640x640.jpg', 14),
(109, 'Lamb Rack Frenched', '', 0.00, 'media/Site Files/Lamb_rack_frenched_NZ_300x300.jpg', 14),
(110, 'Frozen Leg Australian', '', 0.00, 'media/Site Files/Frozen Leg Australian.jpg', 14),
(111, 'Mutton Cube', '', 0.00, 'media/Site Files/mutton cube.jfif.jpg', 14),
(112, 'Lamb Leg Boneless', '', 0.00, 'media/Site Files/lamb-leg-boneless-12-15kg.jpg', 14),
(113, 'Mutton Truck 28kg', '', 0.00, 'media/Site Files/Mutton Trunk.webp.png', 14),
(114, 'Lamb/Mutton Carcass', '', 0.00, 'media/Site Files/Mutton Full.png', 14),
(115, 'Lamb Shoulder', '', 0.00, 'media/Site Files/lamb shoulder.jpeg', 14),
(116, 'Shortibs NZ Cut', '', 0.00, 'media/Site Files/image.jfif.jpg', 15),
(117, 'Beef lungs', '', 0.00, 'media/Site Files/234c1819-ec11-4273-b249-1047aeaa3197.jpg.webp.png', 15),
(118, 'Mince Beef', '', 0.00, 'media/Site Files/beef-mince.jpg', 15),
(119, 'Ox Tail Cut', '', 0.00, 'media/Site Files/unnamed.jpg', 15),
(120, 'Shank Indian 20kg', '', 0.00, 'media/Site Files/beef-shanks-2.jpg', 15),
(121, 'Cooked Tripe 5kg', '', 0.00, 'media/Site Files/Beef-Tripe-Not-Cleaned-1Kg.jpg', 15),
(122, 'Beef Topside (800g-1kg) [HALAL]', '', 24.00, 'media/Site Files/Beef-Topside-1.jpg', 15),
(123, 'Beef Striploin/Sirloin (800g-1kg) [HALAL]', '', 27.00, 'media/Site Files/Beef-Striploin-1.jpg', 15),
(124, 'Beef Tenderloin (800g-1kg) [HALAL]', '', 30.00, 'media/Site Files/Beef-Tenderloin-1.jpg', 15),
(125, 'Beef Knuckle (800g-1kg) [HALAL]', '', 24.00, 'media/Site Files/Beef-Knuckle-1.jpg', 15),
(126, 'Beef Silverside (800g-1kg) [HALAL]', '', 23.00, 'media/Site Files/Beef-Silverside-1.jpg', 15),
(127, 'Beef Trimmings (800g-1kg) [HALAL]', '', 16.00, 'media/Site Files/Beef-Trimming-1.jpg', 15),
(128, 'Beef Brisket (800g-1kg) [HALAL]', '', 21.20, 'media/Site Files/Beef-Brisket-1.jpg', 15),
(129, 'Beef Rump (800g-1kg) [HALAL]', '', 23.00, 'media/Site Files/Beef-Rump-1.jpg', 15),
(130, 'Beef Blade (800g-1kg) [HALAL]', '', 21.00, 'media/Site Files/Beef-Blade.jpg', 15),
(131, 'Beef Neck Bone (800g-1kg) [HALAL]', '', 25.40, 'media/Site Files/Beef-Neck-Bone-1.jpg', 15),
(132, 'NZ Black Mussels / NZ 黑蚝 (1 packet)', '', 11.70, 'media/Site Files/NZ-Black-Mussels-1.jpg', 17),
(133, 'Mussel Meat / 冷冻青口肉 (500g)', '', 24.00, 'media/Site Files/Frozen-Mussel-Meat.jpg', 17),
(134, 'Half Shell Scallop / 半边壳带子 (1kg)', '', 24.00, 'media/Site Files/scallop-1.jpg', 17),
(135, 'Cockle Meat / 蛤蜊肉 / Isi Kerang (1kg)', '', 14.00, 'media/Site Files/Cockle-Clam-Meat.jpg', 17),
(136, 'Frozen Cooked White Clam Whole Shell ( Hamaguri ) 冷凍熟白蛤 (1kg)', '', 23.00, 'media/Site Files/Frozen-Cooked-White-Clam-Whole-Shell-Hamaguri-.jpg', 17),
(137, 'Dried Oyster / 蚝干 (200g)', '', 24.00, 'media/Site Files/Dried-Oyster-200G-1.jpg', 17),
(138, 'Grade A USA Scallop / 美国带子 (500g)', '', 48.00, 'media/Site Files/Grade-A-USA-Scallop-500g.jpg', 17),
(139, 'Pink Half Shell Scallop / 粉壳半壳带子 (500g)', '', 16.00, 'media/Site Files/Pink-Half-Shell-Scallop-1.jpg', 17),
(140, 'Sanma Fish', '', 0.00, 'media/Site Files/unnamed_1.jpg', 18),
(141, 'Saba Fish', '', 0.00, 'media/Site Files/saba fish.jpg', 18),
(142, 'Shishamo (1 packet)', '', 10.00, 'media/Site Files/1300-6-e1593067294737.png', 18),
(143, 'Grab Meat', '', 0.00, 'media/Site Files/71f67488b0857639cee631943a3fc6fa_L.jpg', 19),
(144, 'Flower Grab', '', 0.00, 'media/Site Files/flower.jpg', 19),
(145, 'Stone Crab Live', '', 0.00, 'media/Site Files/de crabe.jpg', 19),
(146, 'Whole Squid', '', 0.00, 'media/Site Files/frozen-squid-500x500-1.jpg', 22),
(147, 'Boiled Giant Octopus / Ni Tako / (Halal) 冷凍真蛸 (1pc)', '', 115.00, 'media/Site Files/Ni-Tako-Boiled-Giant-Octopus-HALAL-.jpg', 22),
(148, 'Soft Shell Crab 软壳蟹 (1kg)', '', 58.00, 'media/Site Files/Soft-Shell-Crab-30-Glazing.jpg', 19),
(149, 'King Crab / 帝王蟹 (1 pc)', '', 190.00, 'media/Site Files/King-Crab.jpg', 19),
(150, 'Squid Ring / 苏东圈 (1kg)', '', 9.10, 'media/Site Files/Squid-Ring-1.jpg', 22),
(151, 'Wild Chilean sea bass', '', 0.00, 'media/Site Files/0000177_cod-fish_360.jpeg', 20),
(152, 'Squid whole clean', '', 0.00, 'media/Site Files/squid whole clean.jpg', 22),
(153, 'CuttleFish 1kg', '', 0.00, 'media/Site Files/360_F_51156871_SPOrAyXC4MVNMYpkd6iy74UOVJRjHVaa.jpg', 22),
(154, 'Baby cuttlefish', '', 0.00, 'media/Site Files/raw-cuttlefish-whole-cleaned-2040-pcs-1-kg-bag-frozen-540383.jpg', 22),
(155, 'Unagi Kabayaki (1 pc)', '', 22.10, 'media/Site Files/Unagi-Kabayaki.jpg', 18),
(156, 'Grouper / 石班 / Kerapu – Whole Fish (+/- 1.1kg)', '', 48.00, 'media/Site Files/Grouper-.jpg', 18),
(157, 'Butter Fish Fillet', '', 0.00, 'media/Site Files/butter fish fillet.jpg', 20),
(158, 'Cod Loin', '', 0.00, 'media/Site Files/cod loin.jpg', 20),
(159, 'Saba Mackerel Fillet / Fillet Tenggiri Saba / 鲭鱼厚片(2 pcs)', '', 9.80, 'media/Site Files/Saba-Mackerel-Fillet.jpg', 18),
(160, 'Redfish Slice / 红鱼片 (1 pc)', '', 12.00, 'media/Site Files/Redfish-Fillet.jpg', 18),
(161, 'Lobster / 龙虾 / Udang Kara (2 pcs) +/- 2kg', '', 243.00, 'media/Site Files/Lobster.jpg', 21),
(162, 'Red Coral Grouper Fillet +/-700g', '', 60.00, 'media/Site Files/Red-Coral-Grouper-Fillet.jpg', 18),
(163, 'Big Prawn / 大虾 / Udang Besar – 21/25 (1kg)', '', 50.00, 'media/Site Files/Prawn-DL-2125.jpg', 21),
(164, 'Flounder Fillet / 无骨鲽鱼 +/-1kg', '', 30.00, 'media/Site Files/Flounder-Fillet.jpg', 20),
(165, 'Grouper Fillet / 石斑鱼片 (1kg)', '', 56.00, 'media/Site Files/Grouper-Fillet.jpg', 20),
(166, 'Big Prawn / 大虾 / Udang Besar – 31/35 (1kg)', '', 39.00, 'media/Site Files/Prawn-TL-3135-.jpg', 21),
(167, 'Big Prawn / 大虾 / Udang Besar – 21/30 (1kg)', '', 43.00, 'media/Site Files/Prawn-DT-2130--rotated.jpg', 21),
(168, 'Mantis Shrimp Meat / 虾姑肉 (300g)', '', 10.00, 'media/Site Files/Mantis-Shrimp-Meat.jpg', 21),
(169, 'Big Prawn / 大虾 / Udang Besar – 41/50 (1kg)', '', 35.00, 'media/Site Files/Prawn-EL-41_50.jpg', 21),
(170, 'Baby Octopus (300g)', '', 12.00, 'media/Site Files/baby octupus.jpg', 22),
(171, 'Norwegian Salmon Head 冷冻三文鱼头 (1 pc)', '', 8.00, 'media/Site Files/Frozen-Salmon-Head.jpg', 20),
(172, 'Dory Fish / 时多利鱼肉片 (900-1kg)', '', 13.20, 'media/Site Files/Dory-Fillet.jpg', 20),
(173, 'Tilapia Fish Fillet / 非洲鱼片 (2 pcs) +/-380g', '', 10.00, 'media/Site Files/Tilapia-Fillet.jpg', 20),
(174, 'Dried Shrimps 200G / 虾米 / Udang Kering (200g)', '', 13.00, 'media/Site Files/dried-shrimp-1-1.jpg', 21),
(175, 'Local Ming Prawn 本地明虾 (400-500g)', '', 30.00, 'media/Site Files/Ming-Prawn.jpg', 21),
(176, 'Perch fillet / 宝石鲈鱼片 (2 pcs) +/-700', '', 14.00, 'media/Site Files/Perch-Fillet.jpg', 20),
(177, 'Chilean Atlantic Salmon Fillet / 智利三文鱼 (2 or 4 pcs)', '', 26.70, 'media/Site Files/Chile-Salmon-Fillet.jpg', 20),
(178, 'Washed W.Chestnut/Water Chestnut', 'Washed Water Chestnut(500g*20p)', 0.00, 'media/Site Files/c43d2d_6a5094b786bb469a9ce3151d0d32657a_mv2.webp.png', 24),
(179, 'Washed W.Chestnut/Water Chestnut', 'Water Chestnut(10kg)', 85.00, 'media/Site Files/c43d2d_6a5094b786bb469a9ce3151d0d32657a_mv2.webp.png', 24),
(180, 'Chestnut(40-60)/10kg', '', 95.00, 'media/Site Files/chestnut.jpg', 24),
(181, 'Cavendish Banana / Pisang Montel (1kg)', '', 6.50, 'media/Site Files/Montel-Banana.jpg', 24),
(182, 'Berangan Banana (1kg)', '', 7.80, 'media/Site Files/Berangan-Banana.jpg', 24),
(183, 'Navel Orange/CHINA/113p', '', 55.00, 'media/Site Files/navel orange.jpg', 24),
(184, 'Mango (1 pc)', '', 4.00, 'media/Site Files/mango-e1592500407209.jpg', 24),
(185, 'Avocado (AUS)/9kg', '', 60.00, 'media/Site Files/avocado.jpg', 24),
(186, 'China Golden Pear (30p)', '', 90.00, 'media/Site Files/pear.jpg', 24),
(187, 'Mix Berries (500g)', '', 11.70, 'media/Site Files/Mix-Berries-500GM_PKT-.jpg', 24),
(188, 'Local Honeydew (1 pc)', '', 20.00, 'media/Site Files/Local-Honeydew.jpg', 24),
(189, 'MD2 Pineapple (1 pc)', '', 12.00, 'media/Site Files/pineapple-e1592500694372.jpg', 24),
(190, 'Local Watermelon (1 pc)', '', 20.00, 'media/Site Files/watermelon.jpeg', 24),
(191, 'Crimson Seedless Grape (4.5kg)', '', 70.00, 'media/Site Files/chileseedlessredgrape-e1592981850967.jpg', 24),
(192, 'Grapefruit (1 pc)', '', 3.20, 'media/Site Files/grapefruit.jpg', 24),
(193, 'Green Apple', 'Green Apple(TUR(198))', 100.00, 'media/Site Files/apple afica.jpg', 24),
(194, 'Green Apple', 'Green Apple(TUR(138))', 110.00, 'media/Site Files/apple afica.jpg', 24),
(195, 'Green Apple', 'Green Apple(SA(150))', 100.00, 'media/Site Files/apple afica.jpg', 24),
(196, 'Lime (100g/pack)', '', 1.20, 'media/Site Files/limau.jpeg', 24),
(197, 'Salted Egg (6 pcs)', '', 5.40, 'media/Site Files/Century-Eggs.jpg', 16),
(198, 'Eggs (Grade A) (30pcs/tray)', '', 15.50, 'media/Site Files/eggs-grade-b-e1592471187840.jpeg', 16),
(199, 'Omega Egg (10 pcs/tray)', '', 5.75, 'media/Site Files/Omega-Eggs.png', 16),
(200, 'Kampung Eggs (30pcs/tray)', '', 18.00, 'media/Site Files/1100-0025-e1593067012109.jpg', 16),
(201, 'Duck Egg (5 pcs)', '', 5.00, 'media/Site Files/Duck-eggs.jpg', 16),
(202, 'Eggs (Grade C) (30pcs/tray)', '', 12.60, 'media/Site Files/eggs-grade-b-e1592471187840.jpeg', 16),
(203, 'Eggs (Grade B) (30pcs/tray)', '', 14.50, 'media/Site Files/eggs-grade-b-e1592471187840.jpeg', 16),
(204, 'Century Egg / Pidan (5 pcs)', '', 6.00, 'media/Site Files/9db03f_6ddc296ce6a04012ad436329acf26f01_mv2.jpg', 16),
(205, 'Omega Egg (3×10 pcs)', '', 16.50, 'media/Site Files/Omega-Eggs-Bundle.jpg', 16),
(206, 'Ma Cao Eggs 马草蛋 (Grade A) (30pcs/tray)', '', 23.00, 'media/Site Files/Ma-Cao-Eggs.jpg', 16),
(207, 'Ma Cao Eggs / 马草蛋 (Grade A) (10pcs)', '', 8.50, 'media/Site Files/Ma-Cao-Eggs-1.jpg', 16),
(208, 'Daun Sup / Leaf Celery (100g/pack)', '', 2.00, 'media/Site Files/daun sup.jpg', 6),
(209, 'Labu Air (+/-1kg per pack)', '', 7.70, 'media/Site Files/labu air.jpg', 2),
(210, 'Bunga Kantan / Torch Ginger Flower (3 pcs/bundle)', '', 3.90, 'media/Site Files/bungakantan-e1592981873746.jpg', 1),
(211, 'Petai (200g/pack)', '', 12.80, 'media/Site Files/petai-e1592979301181.jpg', 4),
(212, 'Turmeric / Kunyit Hidup (300g/pack)', '', 3.50, 'media/Site Files/kunyit hidup.jpeg', 3),
(213, 'Lengkuas / Galangal (300g/pack)', '', 3.50, 'media/Site Files/lengkuas.jpeg', 3),
(214, 'Lime Leaves, Daun Limau (10 pcs/pack)', '', 1.00, 'media/Site Files/B304DF79-F719-4BB1-9B09-20AF8EE2F881_4_5005_c-e1592986405342.jpeg', 6),
(215, 'Holland Pea / Snow Pea /130g*30p', '', 55.00, 'media/Site Files/holland pea.jpg', 4),
(216, 'Green Chilli Padi/Cili Padi Hijau (100g/pack)', '', 1.80, 'media/Site Files/cili padi hijau.jpeg', 2),
(217, 'Mini Yam ( 7kg )', '', 28.00, 'media/Site Files/Yam-keladi.jpg', 3),
(218, 'Mint Leaves/Daun Pudina (100g/pack)', '', 1.50, 'media/Site Files/daun pudina.jpg', 6),
(219, 'Curry Leaves, Daun Kari (50g/pack)', '', 1.50, 'media/Site Files/daun kari.jpeg', 6),
(220, 'Chat Potato (15kg)', '', 0.00, 'media/Site Files/chat potato.jpg', 3),
(221, 'Honey Sweet Potato / 蜜糖番薯 +/-500g', '', 5.50, 'media/Site Files/sweet orange potato.jpg', 3),
(222, '(Organic) Tomato / 番茄 +/-300g', '', 5.50, 'media/Site Files/Tomato-1.jpg', 2),
(223, 'Sengkuang', '', 4.50, 'media/Site Files/Sengkuang.png', 1),
(224, 'Green Pepper (1 pc)', '', 5.40, 'media/Site Files/05B0C3A5-5851-44FB-B18B-F5A25FF57AB2_4_5005_c-e1593058900467.jpg', 2),
(225, 'Local Sweet Potato - 500g*10p', 'Local Sweet Potato - 500g*10p(Purple)', 6.50, 'media/Site Files/Sweet-Potato-Purple-1.jpg', 3),
(226, 'Local Sweet Potato - 500g*10p', 'Local Sweet Potato - 500g*10p(Yellow)', 6.50, 'media/Site Files/local sweet potato yellow.jpg', 3),
(227, 'Petola (500g+/-pack)', '', 5.10, 'media/Site Files/petola.jpeg', 2),
(228, 'Yellow Pepper (1 pc)', '', 5.40, 'media/Site Files/yellow chili.jpg', 1),
(229, 'Small Bittergourd (250g/pack)', '', 2.90, 'media/Site Files/smallbittergourd-e1592981694286.jpg', 2),
(230, 'Beetroot (500g/pack)', '', 4.00, 'media/Site Files/84BCAE99-9BC2-4E86-9C1A-BB70450281AC_4_5005_c-e1593064430741.jpg', 3),
(231, 'Sweet Potato (Japanese) / 日本番薯 +/-500g', '', 5.50, 'media/Site Files/Sweet-Potato-Japanese-1-1.jpg', 3),
(232, 'Red Chilli (200g/pack)', '', 3.00, 'media/Site Files/E65CCE48-0CC4-44A2-BED1-AFA036E15130_4_5005_c-e1593064247877.jpg', 2),
(233, 'TAIWAN Sweet Potato/500kg*10p', 'TAIWAN Sweet Potato/500kg*10p(Orange)', 35.00, 'media/Site Files/sweet orange potato.jpg', 3),
(234, 'Red Pepper (1 pc)', '', 5.40, 'media/Site Files/Red Paper.jpg', 2),
(235, 'Red Chilli Padi (100g/pack)', '', 3.50, 'media/Site Files/71C69288-1789-44D1-8182-42460F0FD3A0_4_5005_c-e1592986215716.jpeg', 2),
(236, 'Local Leek /Korea Leek\n', 'Local Leek(8kg)', 0.00, 'media/Site Files/AF207180-1573-4EEB-A518-2B2D33B348FE_4_5005_c-e1593062688284.jpg', 6),
(237, 'Local Leek /Korea Leek\n', 'Korea Leek(5kg)', 0.00, 'media/Site Files/AF207180-1573-4EEB-A518-2B2D33B348FE_4_5005_c-e1593062688284.jpg', 6),
(238, 'Shitake Mushroom (200g*25p)', '', 85.00, 'media/Site Files/587055D2-D31C-480D-8876-FD79255830F0_4_5005_c-e1593061497845.jpg', 1),
(239, 'Dai Pak Choy / Sawi Putih (250g/pack)', '', 3.00, 'media/Site Files/FC2A8831-E4A7-4C8E-B7D0-2F47AEA7607E_4_5005_c-e1593064140438.jpg', 6),
(240, 'Hong Kong Nai Bak (200g/pack)', '', 4.50, 'media/Site Files/china-baby-qing-bak-200g-pack.jpg', 6),
(241, 'Butter Lettuce (1 pc)', '', 4.80, 'media/Site Files/257C78C1-2ACC-4FA6-8F47-BF2660E80664_4_5005_c-e1593063109720.jpg', 6),
(242, '(Organic) Mini Cos / Romaine Lettuce / 油麦 +/-280g', '', 5.50, 'media/Site Files/Mini-Cos-1.jpg', 6),
(243, 'Kuchai / Garlic Chives (100g/pack)', '', 1.50, 'media/Site Files/B8B78F6B-5801-4BAF-A803-086D9FADE43C_4_5005_c-e1592987406319.jpeg', 6),
(244, '(Organic) Cabbage Shoot / Choy Tam / 菜旦 +/-270g', '', 5.50, 'media/Site Files/Choy-Tam-1.jpg', 6),
(245, 'Cherry Tomato (300g/pack)', '', 4.00, 'media/Site Files/A89C1479-12D1-476B-9CB7-AD3BE3D6214E_4_5005_c-e1593058806713.jpg', 2),
(246, 'AUS Jap Pumpkin / Butternut Pumpkin', 'AUS Jap Pumpkin(Jap)', 200.00, 'media/Site Files/AFE65E4E-257B-423D-87F5-0697C3B0D31A_4_5005_c-e1593063418476.jpg', 2),
(247, 'AUS Jap Pumpkin / Butternut Pumpkin', 'Butternut Pumpkin(Butternut)', 200.00, 'media/Site Files/butternut pumpkin.jpg', 2),
(248, 'Washed Lotus Root (10kg)', '', 120.00, 'media/Site Files/Lotus-Root.png', 3),
(249, 'Button Mushroom (200g/pack)', '', 7.00, 'media/Site Files/624F4822-8BE6-48A3-AB15-8194C0406510_4_5005_c-e1593061638437.jpg', 5),
(250, 'US / Russet Potato 120 /22.7kg', '', 95.00, 'media/Site Files/US-Russet-Potato.jpg', 3),
(251, 'Beijing Cabbage', '', 45.00, 'media/Site Files/1617789692521-Cut Cabbage Beijing1.jfif.jpg', 6),
(252, 'Chinese Parsley / Coriander / Daun Ketumbar (100g/pack)', '', 2.00, 'media/Site Files/daun ketumbar.jpg', 6),
(253, 'Celery (15Kg)', '', 120.00, 'media/Site Files/Celery-1.jpg', 6),
(254, 'Cauliflower(12kg)', '', 60.00, 'media/Site Files/82E6209C-ECD9-4131-B8EA-BDCA749F1F85_4_5005_c-e1593064406809.jpg', 2),
(255, 'Baby Corn (1 pack)', '', 3.00, 'media/Site Files/Baby-Corn.jpg', 2),
(256, 'Almond Mushroom / King Oyster Mushroom', 'King Oyster Mushroom(200g*30p)', 75.00, 'media/Site Files/king-oyster-mushroom-e1592983780898.jpg', 5),
(257, 'Almond Mushroom / King Oyster Mushroom', 'Almond Mushroom(300g*15p)', 60.00, 'media/Site Files/king-oyster-mushroom-e1592983780898.jpg', 5),
(258, 'Baby Siew Pak Choy (200g/pack)', '', 4.00, 'media/Site Files/babysiewpakchoy-e1590754014296.jpg', 6),
(259, 'Old Cucumber (1 pc)', '', 4.50, 'media/Site Files/Old-Cucumber.png', 2),
(260, 'Shimeji Mushroom(Brown/White)-150g*40p', 'Shimeji Mushroom-150g*40p(Brown)', 68.00, 'media/Site Files/Brown-Shimeiji-Mushroom-e1593653378919.jpeg', 5),
(261, 'Shimeji Mushroom(Brown/White)-150g*40p', 'Shimeji Mushroom-150g*40p(White)', 65.00, 'media/Site Files/Brown-Shimeiji-Mushroom-e1593653378919.jpeg', 5),
(262, '(Natural) Baby French Bean / 桂豆苗 +/-180g', '', 5.50, 'media/Site Files/Baby-French-Bean-1.jpg', 4),
(263, 'Ginger/Ginger King', 'Ginger(5kg)', 24.00, 'media/Site Files/8604CD57-0283-4159-95CB-AE625B58D881_4_5005_c-e1592986271448.jpeg', 3),
(264, 'Ginger/Ginger King', 'Ginger King(10kg)', 58.00, 'media/Site Files/8604CD57-0283-4159-95CB-AE625B58D881_4_5005_c-e1592986271448.jpeg', 3),
(265, 'Eggplant / Brinjal / Aubergine (1 pc)', '', 3.30, 'media/Site Files/A7211247-C2FB-4133-8577-E449D5015496_4_5005_c-e1593064056327.jpg', 2),
(266, 'Long Bean (250g/pack)', '', 3.50, 'media/Site Files/longbean-e1592981717719.jpg', 4),
(267, 'Japanese Cucumber (500g/pack)', '', 4.30, 'media/Site Files/6351D2F5-B4F2-4AEE-9BDE-05350BE02AE8_4_5005_c-e1593063400871.jpg', 2),
(268, 'Hong Kong Kai Lan / 香港芥兰 (200g/pack)', '', 4.00, 'media/Site Files/Kailan-1.jpg', 6),
(269, 'NZ/Brown Onion/500g*10p', '', 18.00, 'media/Site Files/C43A0476-9C57-4734-8EB4-B98BA78B4A15_4_5005_c-e1593058920866.jpg', 3),
(270, 'Romaine (1 pc)', '', 4.50, 'media/Site Files/romaine.jpg', 6),
(271, 'Lemongrass / Serai (3pcs/bundle)', '', 0.70, 'media/Site Files/Serai 0.7.jpeg', 1),
(272, 'AUS Cabbage/AUS Purple Cabbage', 'AUS Cabbage', 0.00, 'media/Site Files/Cabbage.jpg', 6),
(273, 'AUS Cabbage/AUS Purple Cabbage', 'AUS Purple Cabbage', 0.00, 'media/Site Files/kubis merah.jpg', 6),
(274, 'Broccoli', 'Broccoli(7kg)', 60.00, 'media/Site Files/Broccoli-1.jpg', 1),
(275, 'AUS Carrot(Farmgate/Ozzy/C3/Pack)', 'AUS Carrot(Farmgate)', 48.00, 'media/Site Files/Carrot-1.jpg', 1),
(276, 'AUS Carrot(Farmgate/Ozzy/C3/Pack)', 'AUS Carrot(Ozzy)', 45.00, 'media/Site Files/Carrot-1.jpg', 1),
(277, 'AUS Carrot(Farmgate/Ozzy/C3/Pack)', 'AUS Carrot(C3)', 40.00, 'media/Site Files/Carrot-1.jpg', 1),
(278, 'AUS Carrot(Farmgate/Ozzy/C3/Pack)', 'AUS Carrot(Pack)', 95.00, 'media/Site Files/Carrot-1.jpg', 1),
(279, 'Siew Pak Choy (200g/pack)', '', 2.20, 'media/Site Files/Siew Pak Choy.jpg', 6),
(280, 'Okra / Lady Finger (250g/pack)', '', 3.60, 'media/Site Files/okra.jpg', 4),
(281, 'Spring Onion (100g/pack)', '', 1.10, 'media/Site Files/spring onion.jpg', 6),
(282, 'White Garlic (CHN)/500g*10p', '', 32.00, 'media/Site Files/Unpeeled Garlic.jpg', 3),
(283, 'Small Shallot(500g*10p)', 'Small Shallot(500g*10p)(CHINA)', 15.00, 'media/Site Files/red onion.jpg', 3),
(284, 'Small Shallot(500g*10p)', 'Small Shallot(500g*10p)(THAILAND)', 43.00, 'media/Site Files/red onion.jpg', 3),
(285, 'Enoki Mushroom (100g*50p)', '', 32.00, 'media/Site Files/enoki-e1593061619596.jpg', 5),
(286, 'Ubi Kayu / Cassava / Yuca Root (+/-1kg per pack)', '', 4.55, 'media/Site Files/Ubi-Kayu.jpg', 3),
(287, 'White Radish/Red Radish/Green Radish(10kg)', 'White Radish(10kg)', 38.00, 'media/Site Files/radish.jpg', 3),
(288, 'White Radish/Red Radish/Green Radish(10kg)', 'Red Radish(10kg)', 45.00, 'media/Site Files/Red-radish-2.jpg', 3),
(289, 'White Radish/Red Radish/Green Radish(10kg)', 'Green Radish(10kg)', 0.00, 'media/Site Files/9680.png', 3),
(290, 'Choy Sum / Baby Choy Sum', 'Choy Sum(Normal 5.5kg)', 60.00, 'media/Site Files/Cameron-Sawi.jpg', 6),
(291, 'Choy Sum / Baby Choy Sum', 'Baby Choy Sum(Baby 4kg)', 40.00, 'media/Site Files/Hong-Kong-Sawi.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `dateRegistered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `username`, `userPass`, `userEmail`, `dateRegistered`) VALUES
(1, 'chleong.marketing', 'c4ca4238a0b923820dcc509a6f75849b', 'chleong.marketing@gmail.com', '2022-01-24 07:52:28'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.com', '2022-01-24 13:00:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cart-user` (`userID`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cartID`,`productID`) USING BTREE,
  ADD KEY `items_product` (`productID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`productID`,`productInventory`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `product-category` (`categoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart-user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `items_cart` FOREIGN KEY (`cartID`) REFERENCES `cart` (`cartID`),
  ADD CONSTRAINT `items_product` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `product-inventory` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `product-category` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
