-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2020 at 09:02 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fish_room`
--
CREATE DATABASE IF NOT EXISTS `fish_room` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `fish_room`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE IF NOT EXISTS `admin_detail` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`admin_id`, `admin_name`, `email_id`, `pwd`) VALUES
(1, 'admin', 'admin@fishroom.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE IF NOT EXISTS `bill_detail` (
  `bill_id` int(10) NOT NULL,
  `bill_date` date NOT NULL,
  `order_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `bill_amt` int(10) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_id`, `bill_date`, `order_id`, `cart_id`, `cust_id`, `bill_amt`) VALUES
(1, '2020-10-23', 1, 2, 1, 1144);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE IF NOT EXISTS `cart_detail` (
  `cart_detail_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  PRIMARY KEY (`cart_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `cart_id`, `prod_id`, `qty`, `price`) VALUES
(1, 1, 10, 3, 799),
(2, 1, 21, 5, 80),
(3, 2, 6, 1, 225),
(4, 2, 10, 1, 799),
(5, 2, 22, 2, 60),
(6, 3, 3, 1, 599),
(7, 3, 7, 1, 699),
(8, 3, 21, 4, 80),
(9, 4, 8, 1, 699),
(10, 4, 4, 1, 599),
(11, 4, 24, 2, 90);

-- --------------------------------------------------------

--
-- Table structure for table `cart_master`
--

CREATE TABLE IF NOT EXISTS `cart_master` (
  `cart_id` int(10) NOT NULL,
  `cart_date` date NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_master`
--

INSERT INTO `cart_master` (`cart_id`, `cart_date`) VALUES
(1, '2020-10-16'),
(2, '2020-10-22'),
(3, '2020-10-22'),
(4, '2020-10-22');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE IF NOT EXISTS `category_master` (
  `cat_id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `category`) VALUES
(1, 'Aquarium decore'),
(2, 'Fish'),
(3, 'Water Care'),
(4, 'Food');

-- --------------------------------------------------------

--
-- Table structure for table `cust_regis`
--

CREATE TABLE IF NOT EXISTS `cust_regis` (
  `cust_id` int(10) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(10) NOT NULL,
  `mobile_no` varchar(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust_regis`
--

INSERT INTO `cust_regis` (`cust_id`, `cust_name`, `address`, `city`, `pincode`, `mobile_no`, `email_id`, `pwd`) VALUES
(1, 'shikha parekh', 'srinagar society', 'valsad', 396001, '9874563210', 'shikha@yahoo.com', '111111'),
(2, 'Fanty', 'kolak', 'udwada', 396115, '7412583690', 'fanty@yahoo.com', '111111');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int(10) NOT NULL,
  `order_date` date NOT NULL,
  `cust_id` int(10) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `del_address` varchar(200) NOT NULL,
  `del_mobile_no` varchar(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_id`, `order_date`, `cust_id`, `cart_id`, `del_address`, `del_mobile_no`, `total_amount`) VALUES
(1, '2020-10-22', 1, 2, 'Rameshwar Appt\r\nhalar\r\nvalsad 396001', '7485963210', 1144),
(2, '2020-10-22', 1, 3, 'Ramehwar appt\r\nhalar\r\nvalsad 396001', '7485213690', 1618),
(3, '2020-10-22', 2, 4, 'kolak \r\nzanda chowk\r\nudwada ', '7425836901', 1478);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE IF NOT EXISTS `product_detail` (
  `prod_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` int(10) NOT NULL,
  `prod_img` varchar(50) NOT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `cat_id` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`prod_id`, `prod_name`, `cat_id`, `description`, `price`, `prod_img`) VALUES
(1, 'Home Garden and Aquarium Decor', 1, 'Material:Stone, Color:Multi\r\nItem Dimension 8 cm   5 cm  10 cm\r\nPackage Contents1 Packet\r\nMaterial Other\r\nColor White', 108, 'prod_img/P1_6815.jpg'),
(2, 'The OceansWhite Sugar Sand Gravel for Aquarium Dec', 1, 'Suitable For Freshwater Tropical, Cold Water & Marine Aquarium Tanks and This Provide a Very Healthy Environment For Plant & Fishes.\r\nAlso, Work as a Good Biological Filter Because Most of The Healthy', 235, 'prod_img/P2_6540.jpg'),
(3, 'Jainsons Pet Products Desolate Tower Aquarium Deco', 1, 'Aquarium Decorative product\r\nType:Decorative Ornaments/Toy\r\n\r\nMaterial Resin\r\nPackage Contents 1 Piece', 599, 'prod_img/P3_8107.jpg'),
(4, 'URAQ Aquarium Plants Fish Tank Decorations Artific', 1, 'Aquarium decorations set with different species in package it can bring different feelings to you fishes all the colors are vibrant and vivid even in the water thus can beautify your aquarium\r\nThis Ar', 599, 'prod_img/P4_3261.jpg'),
(5, 'AQUAPETZWORLD Large Artificial European Rockery Ca', 1, 'ã€Dimensions & Weightã€‘Size Approx.: L9.4" *W 3.5" * H9.4". Weight Approx.:485g\r\nAQUAPETZWORLD aquarium ornament is made of durable resin, non-toxic that is absolutely safe for use in both freshwate', 549, 'prod_img/P5_1934.jpg'),
(6, 'Petzlifeworld Fish Tank Decoration Landscape Ornam', 1, 'Size Small\r\nFish Tank Decoration\r\nDouble Leaf Aquarium Plants Seeds Live Plant', 225, 'prod_img/P6_8082.jpg'),
(7, 'AST Aquarium Happy Fins LED Lamp', 1, 'Power 10W\r\nColour black/white\r\nMaterial abs plastic', 699, 'prod_img/P7_4241.jpg'),
(8, 'Jainsons Glass Fish Bowl With Baby Plant Multi Col', 1, 'Includes 1 Glass Bowl 1Baby Plants \r\n Multi Color Stone and 2 Artificial Fish\r\nGlass Bowl  Depth 8 inch\r\nCircumference 24 inch', 699, 'prod_img/P8_1973.jpg'),
(9, 'Petzlifeworld Hailea Betta Tank  Fresh Water Aquar', 1, 'Dimension  15 17 15 cm\r\nFresh Water Aquarium\r\nHailea Betta Tank', 615, 'prod_img/P9_9203.jpg'),
(10, 'Parko Home Decoration Turtle Aquarium Tank Beautif', 1, 'Unique Design Light Weight  Ideal for Betta Fish or Small Fish & Turtle\r\nFully submersible with suction cups included for placement anywhere in the aquarium\r\nEasy to Use and Clean & Energy Efficient A', 799, 'prod_img/P10_1261.jpg'),
(11, 'DESPACITO Aquarium Bio Sponge Filter Sponge Filter', 3, 'Material  Plastic bio sponge Model XY2830 Product Dimension 6x3x2cm Recommend Tank Size 40 Litres Note: Air pump Motor not included Helps your small fish or shrimp to live a happy healthy life\r\nSponge', 299, 'prod_img/P11_5883.jpg'),
(12, 'Futurekart Aquarium Cleaning Kit', 3, 'Easy to install and use,remove the dirty things from the bottom of your aquarium effectively\r\nAssemble the handle and accessory holder to the rod, now you can choose which accessory you want to fit to', 500, 'prod_img/P12_3530.jpg'),
(13, 'Foodie Puppies  Sobo Aquarium Internal Filter  wit', 3, 'Ideal Filter For Upto 200-300 Liter Tank.\r\nThe Filter Sponge Absorbs Dirt And Clears The Water.\r\nSuper Quite, Efficient Energy Economizing, Easy To Clean.\r\nCompletely Submersible And Ideal For Fresh W', 699, 'prod_img/P13_1823.jpg'),
(14, 'RS Electrical Aquarium Magnetic Cleaner', 3, 'Strong magnetic materials\r\nGreat magnetic suction, streamlined design\r\nBeautiful outlook, floating design and very conveniently using\r\nProduct Dimensions are 7 x 7 x 3.5 cm', 298, 'prod_img/P14_8385.jpg'),
(15, 'Aquosis Crystal Aquarium Vacuum Cleaner Rs Electri', 3, 'Aquarium cleaning pack\r\nVery useful while draining out aquarium water, removes debris and dirt between gravels\r\nFloating design avoids lost magnets on the bottom of your aquarium and makes it convenie', 370, 'prod_img/P15_8268.jpg'),
(16, 'Venus Aqua Green Aquarium Fish Net for Aquarium an', 3, 'Aquarium fish net is safe for all fish. Fine nylon net lining is designed with their safety in mind. 4inch and 8inch net is a great size for many different small or medium size fish and aquariums.\r\nVe', 399, 'prod_img/P16_5328.jpg'),
(17, 'aiyo Pluss Discovery Aquarium Fish Net Quick Catch', 3, 'Ideal for fragile fish easy to handle and a quality one made of soft mesh\r\nGreat for landing fishing use With strong grip solid handle\r\n4 Inch Fish Net (1 Piece) + 8 Inch Fish Net (1 Piece)', 180, 'prod_img/P17_9260.jpg'),
(18, 'Star Universal Submersible Pump for Cooler  Founta', 3, 'NO RUSTING, NO JAMMING,EASY MAINTENANCE & CLEANING\r\nVOLTAGE : 220 - 240 V 50 Hz ; Wattage: 40 Watts\r\nLOW ELECTRICITY CONSUMPTION\r\nFULLY SUBMERSIBLE ,COMPLETELY NOISELESS\r\nWARRANTY 1 YEAR( REPLACEMENT ', 599, 'prod_img/P18_3648.jpg'),
(19, 'Venus Aqua Aquarium Air Pump Accessory Bubble Size', 3, 'Made from high quality plastic material, environmentally friendly materials, durable and stable.\r\nA submersible accessories to provide oxygen for the water.\r\nFirmly stand in the fish tank with the str', 346, 'prod_img/P19_4346.jpg'),
(20, 'Flual Biological Cleaner for Aquariums Ounce', 3, 'Reduces aquarium maintenance by cleaning gravel, power filters, decorations and interior surfaces\r\nRapidly reduces organic waste\r\nDigests waste in filters, gravel and aquarium surfaces\r\nVery beneficia', 1100, 'prod_img/P20_3326.jpg'),
(21, 'Gold Fish', 2, 'The goldfish (Carassius auratus) is a freshwater fish in the family Cyprinidae of order Cypriniformes. It is one of the most commonly kept aquarium fish. A relatively small member of the carp family (', 80, 'prod_img/P21_2473.jpg'),
(22, 'Suckermouth catfish', 2, 'Hypostomus plecostomus, also known as the suckermouth catfish or the common pleco, is a tropical fish belonging to the armored catfish family, named for the armor-like longitudinal rows of scutes that', 60, 'prod_img/P22_5777.jpg'),
(23, 'Marble Angel fish black', 2, 'Suitable with community tanks\r\nSuggested to add School group around 6 to 9', 40, 'prod_img/P23_2192.jpg'),
(24, 'Red Cap Goldfish A grade', 2, 'The goldfish is a freshwater fish in the family Cyprinidae of order Cypriniformes. It is one of the most commonly kept aquarium fish. A relatively small member of the carp family, the goldfish is nati', 90, 'prod_img/P24_8416.jpg'),
(25, 'flower horn fish', 2, 'As per the demand of the industry as well as of our clients, we are involved in providing our clients wide collection of Flower Horn Fish. The aquarium lovers from across the country can avail these i', 2000, 'prod_img/P25_4050.jpg'),
(26, 'Diamondback Terrapin', 2, 'grooves on the scutes (plates) of their carapaces (top shells), which range from medium gray or brown to nearly black.\r\n\r\nTheir skin color is a pale to dark gray or black, flecked with dark spots, blo', 299, 'prod_img/P26_9349.jpg'),
(27, 'Elephant ear Betta ', 2, 'Elephant ear betta\r\n\r\nSelect colors from live chat team', 230, 'prod_img/P27_3422.jpg'),
(28, 'Electric Blue Jack Dempsey', 2, 'Adorned in brilliant blue, this showcase cichlid is typically smaller and reported to be less aggressive than its popular counterpart. The Electric Blue Jack Dempsey is a freshwater fish that originat', 470, 'prod_img/P28_1832.jpg'),
(29, 'Tiger Shark', 2, 'This product has a minimum quantity of 2', 37, 'prod_img/P29_8758.jpg'),
(30, 'Reidi Seahorse Captive Bred', 2, 'The Reidi is also known as the Longsnout Seahorse and is found in the Western Caribbean. These seahorses are Captive-Bred in Tiawan and are available in the Yellow or Black color variant. The colorati', 5000, 'prod_img/P30_1143.jpg'),
(31, 'Optimum Betta food', 4, 'Genuine Betta Food', 59, 'prod_img/P31_2861.jpg'),
(32, 'Tetra Bits complete', 4, 'Tetra bits complete 30 grams.( Original)\r\nFor all cichlids and discus.\r\nBio active formula.', 180, 'prod_img/P32_3376.jpg'),
(33, 'Inch Gold Parrot Aquarium Fish Food ', 4, 'Natural fish food - high protein - fast growth and colour\r\nIt is appropriates for feeding large sizes fishes or for color enhancing effect\r\nProtein: 40% for cell tissue growth', 570, 'prod_img/P33_8916.jpg'),
(34, 'Taiyo Turtle Food', 4, 'It contains all high-quality protein, vitamins, and minerals to promote growth and keep turtles in healthy condition\r\nThe size and shape of this food is specially designed to meet the habit of the tur', 370, 'prod_img/P34_8115.jpg'),
(35, 'OKIKO PLATINUM Head Huncher  Color Faster ', 4, 'Okiko Platinum is a unique formulated Fish Feed to induce speedy head growth for all flowerhorn breed. Shape of head growth Will also improve through constant feeding. Feed is high in protien so as to', 180, 'prod_img/P35_1738.jpg'),
(36, 'DR FISH Food Growth for Complete Nutrition with Vi', 4, 'Complete nutritional food color enhancing formula enrich with catotene,\r\nVegetable oil, Vitamin A, C, D, & E and minerals and trace elements, Feed 3 to 4 times daily but in small quantity Floating typ', 325, 'prod_img/P36_9619.jpg'),
(37, 'ProtynGrubs Whole Dried Black Soldier Fly Larvae T', 4, 'High in calcium: 23-61x higher in calcium than other feeder insects. A diet high in calcium promotes healthier bones.\r\nHigh in good fats: Omega 6 and 9 promote better heart health. Low in overall fat.', 350, 'prod_img/P37_3469.jpg'),
(38, 'Maalavya Common Fish Feed Food Hi Quality Make in ', 4, 'Make in India\r\nRed & Green pellets\r\nA Complete food for all type of fishes\r\n1.2 MM pellet size\r\nFloating type (Never clouds the water)', 120, 'prod_img/P38_4662.jpg'),
(39, 'Taiyo Pro Rich Red Parrot Food', 4, 'High Protein formula with natural flavour\r\nYeast, Krill, Lutein, Canthaxanthin, Astaxanthin\r\nSuitable for Red parrot and other tropical fish\r\nColour enhancing fish food for red parrot\r\nContains Vitami', 360, 'prod_img/P39_2236.jpg'),
(40, 'Petzlifeworld Horizone Royal Breeding Feed for Bet', 4, 'Pack of 2\r\nQuantity: 22G\r\nRoyal Breeding Feed for Betta Fish', 129, 'prod_img/P40_4340.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `fk_cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category_master` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
