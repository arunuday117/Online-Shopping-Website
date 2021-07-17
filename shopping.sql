-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 17, 2020 at 06:31 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

DROP TABLE IF EXISTS `addtocart`;
CREATE TABLE IF NOT EXISTS `addtocart` (
  `aid` int(50) NOT NULL AUTO_INCREMENT,
  `uid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `pid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `quantity` int(50) NOT NULL,
  `amount` int(11) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cid` int(50) NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `cname`) VALUES
(1, 'TVs & Appliances'),
(2, 'Mobiles'),
(3, 'Tablets'),
(4, 'Gaming & Accessories'),
(5, 'Men'),
(6, 'Women'),
(7, 'Books'),
(8, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `uid` int(50) NOT NULL AUTO_INCREMENT,
  `did` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `useremail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `utype` varchar(50) NOT NULL,
  `status` int(50) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`uid`, `did`, `useremail`, `password`, `utype`, `status`) VALUES
(1, 1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 0),
(2, 2, 'aruni@gmail.com', '202cb962ac59075b964b07152d234b70', 'user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

DROP TABLE IF EXISTS `orderdetails`;
CREATE TABLE IF NOT EXISTS `orderdetails` (
  `odid` bigint(11) NOT NULL AUTO_INCREMENT,
  `orid` bigint(11) NOT NULL COMMENT 'FOREIGN KEY',
  `ofirstname` varchar(255) NOT NULL,
  `olastname` varchar(255) NOT NULL,
  `oaddress` longtext NOT NULL,
  `olandmark` longtext NOT NULL,
  `opincode` int(11) NOT NULL,
  `ophone` varchar(255) NOT NULL,
  PRIMARY KEY (`odid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`odid`, `orid`, `ofirstname`, `olastname`, `oaddress`, `olandmark`, `opincode`, `ophone`) VALUES
(1, 1, 'Akash', 'Sart', 'tt                                                                            ', 'hh                                    ', 691577, '7985642350'),
(2, 2, 'Akash', 'Sart', 'tt                                                                            ', 'hh                                    ', 691577, '7985642350');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orid` int(255) NOT NULL AUTO_INCREMENT,
  `uid` int(255) NOT NULL COMMENT 'FOREIGN KEY',
  `pid` int(255) NOT NULL COMMENT 'FOREIGN KEY',
  `qnty` int(255) NOT NULL,
  `oamount` int(50) NOT NULL,
  `ostatus` varchar(255) DEFAULT NULL,
  `paymentmethod` varchar(255) NOT NULL,
  `orderdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`orid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orid`, `uid`, `pid`, `qnty`, `oamount`, `ostatus`, `paymentmethod`, `orderdate`) VALUES
(1, 2, 12, 1, 5218, 'NULL', 'paypal', '2020-02-17 18:00:38'),
(2, 2, 1, 1, 9999, 'NULL', 'paypal', '2020-02-17 18:00:38');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrack`
--

DROP TABLE IF EXISTS `ordertrack`;
CREATE TABLE IF NOT EXISTS `ordertrack` (
  `tid` int(50) NOT NULL AUTO_INCREMENT,
  `uid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `orid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `status` varchar(255) NOT NULL,
  `postingdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productreviews`
--

DROP TABLE IF EXISTS `productreviews`;
CREATE TABLE IF NOT EXISTS `productreviews` (
  `rid` int(50) NOT NULL AUTO_INCREMENT,
  `pid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `username` varchar(255) NOT NULL,
  `prating` varchar(50) NOT NULL,
  `preview` varchar(50) NOT NULL,
  `rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `pid` int(50) NOT NULL AUTO_INCREMENT,
  `cid` int(50) NOT NULL COMMENT 'FOREIGN KEY',
  `pname` varchar(50) NOT NULL,
  `pcompany` varchar(50) NOT NULL,
  `pprice` varchar(50) NOT NULL,
  `ppricebd` int(11) NOT NULL,
  `pdescription` longtext NOT NULL,
  `shippingcharge` varchar(50) NOT NULL,
  `pavailability` varchar(50) NOT NULL,
  `pquantity` varchar(50) NOT NULL,
  `pimage1` varchar(255) NOT NULL,
  `pimage2` varchar(255) NOT NULL,
  `pimage3` varchar(255) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `pname`, `pcompany`, `pprice`, `ppricebd`, `pdescription`, `shippingcharge`, `pavailability`, `pquantity`, `pimage1`, `pimage2`, `pimage3`) VALUES
(1, 1, 'Samsung UN50RU7100FXZA Flat', 'Samsung', '9999', 11900, 'Deatails:Ultra HD Smart TV with HDR and Alexa Compatibility (2019 Model)\r\nSize:82\",75\",65\",58\",55\",50\",43\"	\r\nResolution: HD Ready (1366x768) | Refresh Rate: 60 hertz | Indian Cinema Mode\r\nSound : 20 W output, Screen Capture and Sound Capture\r\nWarranty Information: 1 year comprehensive and 1 year additional warranty on Panel by Samsung\r\n								', '0', 'In Stock', '50', 'Samsung UN50RU7100FXZA Flat1.jpg', 'Samsung UN50RU7100FXZA Flat2.jpg', 'Samsung UN50RU7100FXZA Flat3.jpg'),
(2, 1, 'Samsung 80 cm(32 Inches) Series 4', 'Samsung', '9999', 25364, 'Resolution: HD Ready (1366x768) | Refresh Rate: 60 hertz | Indian Cinema Mode\r\nConnectivity: 2 HDMI ports to connect set top box, Blu Ray players, gaming console | 1 USB ports to connect hard drives and other USB devices\r\nSound : 20 W output, Screen Capture and Sound Capture\r\nDisplay : LED Panel | Wide Colour Enhancer | HD Picture Quality\r\nWarranty Information: 1 year comprehensive and 1 year additional warranty on Panel by Samsung									', '0', 'In Stock', '51', 'Samsung 80 cm1.jpg', 'Samsung 80 cm2.jpg', 'Samsung 80 cm3.jpg'),
(3, 1, 'Mi 80 cm HD Ready Android LED TV (Black)', 'Mi', '12990', 14990, 'Resolution : HD Ready (1366x768p) | Refresh Rate: 60 hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console, 2 USB ports to connect hard drives and other USB devices\r\nSound: 20 W output | DTS-HD Sound\r\nWarranty Information: 1 year warranty on product and 1 year extra on Panel\r\nEasy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided										', '0', 'In Stock', '51', 'Mi 80 cm (32 inches)1.jpg', 'Mi 80 cm (32 inches)2.jpg', 'Mi 80 cm (32 inches)3.jpg'),
(4, 1, 'Mi LED TV 4X', 'Mi', '29648', 34000, 'Resolution: 4K Ultra HD (3840x2160) | Refresh Rate: 60 hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound: 20 Watts Output | Dolby+ DTS-HD\r\nSmart TV features : Built-In Wi-Fi | PatchWall | Netflix | Prime Video | Hotstar and moe | Android TV 9.0 + Google Assistant Data Saver\r\nDisplay : LED Panel | 4K HDR 10-bit display\r\nWarranty Information: 1 year warranty on product and 1 year extra on Panel\r\nEasy returns: This product is eligible for replacement within 10 days of delivery in case of any product defects, damage or features not matching the description provided										', '0', 'In Stock', '51', 'Mi LED TV 4X1.jpg', 'Mi LED TV 4X2.jpg', 'Mi LED TV 4X3.jpg'),
(5, 1, 'Micromax 81 cm ', 'Micromax', '11850', 19990, 'Resolution : HD Ready (1366 x 768) | Refresh Rate: 60 hertz | Image Formats Supported: JPEG\r\nConnectivity : 2 HDMI ports to connect set top box, Blue Ray players | 2 USB ports to connect hard drives and other USB devices | 1 VGA\r\nSound : 24 Watts output; Brightness: 250 nits\r\nPower Saving Music Mode | Hindi Language interface | Surround Sound | Full Range Speakers | USB To USB Cop										', '0', 'In Stock', '51', 'Micromax 81 cm1.jpg', 'Micromax 81 cm2.jpg', 'Micromax 81 cm3.jpg'),
(6, 1, 'Micromax 109 cm', 'Micromax', '25485', 43990, 'Resolution: Full HD (1920x1080) | Refresh Rate: 60 hertz\r\nConnectivity: 2 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices | 1 VGA\r\nSound : 24 Watts Output | Audio only mode\r\nDisplay : LED Panel | FHD\r\nAdditional TV Features : OSD games | USB to USB copy										', '0', 'In Stock', '51', 'Micromax 109 cm1.jpg', 'Micromax 109 cm2.jpg', 'Micromax 109 cm3.jpg'),
(7, 1, 'LG 80 cms (32 Inches) HD Ready LED Smart TV', 'LG', '12854', 26580, 'Resolution: HD Ready (1366x768) | Refresh Rate: 50 hertz | BackLight Module: Slim LED\r\nConnectivity: 2 HDMI ports to connect set top box, Blu Ray players, gaming console | 1 USB ports to connect hard drives and other USB devices\r\nSound : 10 Watts Output\r\nSmart TV Features: Web OS smart TV | Quick access | Quad core processor | Screen share | Web browser | Cloud photo and video  Expandable memory\r\nDisplay : IPS panel | Active HDR | DTS virtual: X										', '0', 'In Stock', '51', 'LG 80 cms1.jpg', 'LG 80 cms2.jpg', 'LG 80 cms3.jpg'),
(8, 1, 'LG 108 cm (43 inches) 4K UHD Smart LED TV', 'LG', '35074', 54845, 'Resolution: 4K Ultra HD (3840x2160) | Refresh Rate: 50 hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices\r\nSound : 20 Watts Output | Powerful Sound, Amazon Alexa: Enabled\r\nSmart TV Features : AI ThinQ (Needs Magic Remote that can be purchased separately) | Web OS | Magic mobile connection | Quad core processor | Cloud photo and video\r\nDisplay : 4K IPS display | Wide viewing angle | 4K active HDR | 4K upscaler | DTS virtual: X										', '0', 'In Stock', '51', 'LG 108 cm1.jpg', 'LG 108 cm2.jpg', 'LG 108 cm3.jpg'),
(9, 1, 'Onida 108 cm (43 Inches) Full HD Smart IPS LED TV', 'Onida', '21549', 29458, 'Fire TV experience built-in brings together your favorite streaming content on the home screen. Choose from a vast catalog of movies and TV shows from Prime Video, Hotstar, Netflix, Zee5, Sony LIV and more\r\nResolution : Full HD (1920x1080) | Refresh Rate: 60 hertz\r\nConnectivity: 3 HDMI ports to connect set top box, Blu-ray players, gaming console | 1 USB port to connect hard drives and other USB devices\r\nSound: 16 Watts Output | Dolby Digital Plus | DTS TruSurround\r\nSmart TV features : Dual band Wi-Fi | Built-in Fire TV OS | Alexa Voice Control | Apps: YouTube, Prime Video, Netflix, Hotstar, Zee5, SonyLiv and more | Display Mirroring for compatible devices | Voice Remote with Alexa										', '0', 'In Stock', '51', 'Onida 108 cm1.jpg', 'Onida 108 cm2.jpg', 'Onida 108 cm3.jpg'),
(10, 1, 'Onida 138 cm (55 Inches) 4K UHD LED Smart TV', 'Onida', '25167', 45874, 'Resolution : 4K Ultra HD (3840x2160p) | Refresh Rate: 60 hertz | Viewing Angle: 178 degrees\r\nDisplay: Slim Edge LED | ADS Panel | High Contrast Ratio | Vibrant Colours\r\nSmart TV Features: Built-in WiFi | Android Lollipop | Play Store | Mira Cast\r\nConnectivity: 3 HDMI ports to connect set top box, Blu Ray players, gaming console | 2 USB ports to connect hard drives and other USB devices | 1 VGA port to connect the laptops\r\nSound : 200 Watts Output										', '0', 'In Stock', '51', 'Onida 138 cm1.jpg', 'LG 108 cm2.jpg', 'Onida 138 cm3.jpg'),
(11, 2, 'Redmi Note 8 (Neptune Blue, 4GB RAM, 64GB Storage)', 'Xiaomi', '10874', 12548, '48MP AI Quad camera with portrait, ultra-wide lens, macro lens, LED flash, AI support, beautify support | 13MP front camera with AI portrait mode\r\n16.002 centimeters (6.3-inch) IPS LCD multi-touch capacitive touchscreen with 2280 x 1080 pixels resolution, 403 ppi pixel density and 19.5:9 aspect ratio | 2.5D curved glass\r\nMemory, Storage & SIM: 4GB RAM | 64GB internal memory expandable up to 512GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid Pie v9 operating system with 2.0GHz Qualcomm Snapdragon 665 octa core processor\r\n4000mAH lithium-polymer battery providing talk-time of 32 hours and standby time of 540 hours | 18W fast charger. Built-in rechargeable battery. USB Type-C connector port										', '0', 'In Stock', '51', 'Redmi Note 8 1.jpg', 'Redmi Note 8 2.jpg', 'Redmi Note 8 3.jpg'),
(12, 2, 'Redmi 7A (Matte Blue, 2GB RAM, 16GB Storage)', 'Xiaomi', '5218', 7458, '13.84 centimeters (5.45 inch) HD+ full screen display with 1440 x 720 pixels resolution\r\n12MP rear camera with large 1.25Î¼m pixels | 5MP front camera | Low light enhancement										', '0', 'In Stock', '51', 'Redmi 7A1.jpg', 'Redmi 7A2.jpg', 'Redmi 7A3.jpg'),
(13, 2, 'Samsung Galaxy M30s (Blue, 4GB RAM, 64GB Storage)', 'Samsung', '12548', 15847, '48MP + 8MP + 5MP triple rear camera | 16MP front facing camera\r\n16.21 centimeters (6.4-inch) FHD+ capacitive touchscreen with 2340 x 1080 pixels resolution 16M color support\r\nMemory, Storage & SIM: 4GB RAM | 64GB storage expandable up to 512GB | Dual nano SIM with dual standby (4G+4G)\r\nAndroid v9.0 Pie operating system with 2.3GHz + 1.7GHz Exynos 9611 octa core processor\r\n6000mAH lithium-ion battery with fast charging | 15W Type-C fast charger in the box										', '0', 'In Stock', '51', 'Samsung Galaxy M30s1.jpg', 'Samsung Galaxy M30s2.jpg', 'Samsung Galaxy M30s3.jpg'),
(14, 2, 'Samsung Galaxy M30 (Stainless Black', 'Samsung', '7845', 11000, '13MP + 5MP + 5MP Triple Rear Camera | 16MP front facing camera\r\n16.21 centimeters (6.4-inch) FHD+ capacitive touchscreen with 2340 x 1080 pixels resolution 16M color support\r\nMemory, Storage & SIM: 3GB RAM | 32GB storage expandable up to 512GB | Dual nano SIM with dual standby (4G+4G)\r\nAndroid Pie operating system with 1.8 GHz Exynos 7904 octa core processor\r\n5000mAH lithium-ion battery with fast charging | 15W Type-C fast charger in the box										', '0', 'In Stock', '51', 'Samsung Galaxy M301.jpg', 'Samsung Galaxy M302.jpg', 'Samsung Galaxy M303.jpg'),
(15, 2, 'Vivo U10', 'Vivo', '7842', 10999, '16.15 centimeters (6.35-inch) halo fullview display with 720 x 1544 pixels resolution\r\nMemory, Storage & SIM: 3GB RAM | 32GB internal memory expandable up to 256GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid Pie v9.0 operating system with Qualcomm Snapdragon 665AIE octa core processor\r\n5000mAh lithium_ion battery with 18W fast charging										', '0', 'In Stock', '51', 'Vivo U101.jpg', 'Vivo U102.jpg', 'Vivo U103.jpg'),
(16, 2, 'Vivo U20', 'Vivo', '11254', 14587, '16MP+8MP+2MP AI triple rear camera with Sony IMX499 sensor and electronic image stabilization| 16MP selfie camera\r\n16.58 centimeters (6.53-inch) with 1080 x 2340 pixels resolution, OTG Compatible: Yes\r\nMemory, Storage & SIM: 6GB RAM | 64GB internal memory expandable up to 256GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid Pie v9.0 operating system with Qualcomm Snapdragon 675 AIE octa core processor\r\n5000mAH lithium-ion battery with 18W fast charging | 18W fast charger in the box										', '0', 'In Stock', '51', 'Vivo U201.jpg', 'Vivo U202.jpg', 'Vivo U203.jpg'),
(17, 2, 'Realme U1 (Ambitious Black, 3GB RAM, 32GB Storage)', 'Realme', '8547', 12990, '13MP+2MP dual rear camera | 25MP front camera | Camera Aperture: f/2.0\r\n16.002 centimeters (6.3-inch) FHD+ multi-touch capacitive touchscreen with 2340 x 1080 pixels resolution, 409 ppi pixel density\r\nMemory, Storage and SIM: 3GB | 32GB internal memory expandable up to 256GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid v8.1 Oreo based on Funtouch OS 5.2 operating system with 2.1GHz MediaTek Helio P70 octa core processor\r\n3500mAH lithium-ion battery										', '0', 'In Stock', '51', 'Realme U11.jpg', 'Realme U12.jpg', 'Realme U13.jpg'),
(18, 2, 'Realme 5 Pro', 'Realme', '11250', 14990, '48MP+8MP+2MP+2MP rear camera | 16MP front camera\r\n16.002 centimeters (6.3-inch) Full HD+ capacitive touchscreen with 1080 x 2340 pixels resolution, 409 ppi pixel density\r\nMemory, Storage & SIM: 4GB RAM | 64GB internal memory expandable up to 256GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid Pie 9.0 operating system with 2.3GHz Qualcomm Snapdragon SDM712 octa core processor, Adreno 616\r\n4035mAH lithium-ion battery										', '0', 'In Stock', '51', 'realme 5 Pro1.jpg', 'realme 5 Pro2.jpg', 'realme 5 Pro3.jpg'),
(19, 2, 'OPPO F11', 'OPPO', '13224', 23997, '48MP+5MP dual rear camera with normal, video, expert, time-lapse, panorama, portrait, slow-motion | 16MP front camera\r\n16.58 centimeters (6.5-inch) FHD+ multi-touch capacitive touchscreen with 2340 x 1080 pixels resolution, 394 ppi pixel density\r\nMemory, Storage & SIM: 6GB RAM | 128GB internal memory expandable up to 256GB | Dual SIM (nano+nano) dual-standby (4G+4G)\r\nAndroid ColorOS v6.0 operating system with 2.1 GHz MediaTek Helio P70 octa core processor, ARM Mali G72\r\n4020mAH lithium-ion battery providing talk-time of 36 hours and standby time of 360 hours										', '0', 'In Stock', '51', 'OPPO F111.jpg', 'OPPO F112.jpg', 'OPPO F113.jpg'),
(20, 2, 'OPPO A9', 'OPPO', '12458', 16654, '16MP+2MP rear camera beautification, filter, HDR, panorama, ultra night mode | 16MP front facing camera\r\n16.5 centimeters (6.5-inch) water drop multi capacitive touchscreen with 2340 x 1080 pixels resolution and 394 ppi pixel density\r\nMemory, Storage & SIM: 4GB RAM | 128GB storage expandable up to 256GB | Dual nano SIM with dual standby (4G+4G)\r\nAndroid v9 Pie Color OS 6.0 operating system with 2.1GHz Mediatek 6771 octa core processor, ARM Mali-G72 GPU\r\n4020mAH lithium-polymer battery ; Fast Charging ; Non-Removable ; Screen Protection: Corning Gorilla Glass v5										', '0', 'In Stock', '51', 'OPPO A91.jpg', 'OPPO A92.jpg', 'OPPO A93.jpg'),
(21, 3, 'Samsung Galaxy Tab A 10.1', 'Samsung', '11000', 16500, '8MP primary camera and 5MP front facing camera\r\n25.654 centimeters (10.1-inch) with 1920 x 1200 pixels resolution\r\n32 GB internal memory, expandable up to 512 GB\r\n6000mAH lithium-ion battery										', '0', 'In Stock', '51', 'Samsung Galaxy Tab A 10.11.jpg', 'Samsung Galaxy Tab A 10.12.jpg', 'Samsung Galaxy Tab A 10.13.jpg'),
(22, 3, 'Samsung Galaxy Tab S5e', 'Samsung', '30874', 38547, '13MP primary camera and 8MP front facing camera\r\n26.67 centimeters (10.5-inch) with 2560 x 1600 pixels resolution\r\nAndroid v9.0 Pie operating system with 2GHz+1.7GHz Qualcomm | SDM670 octa core processor, 4GB RAM, 64GB internal memory expandable up to 512GB\r\n7040mAH lithium-ion battery										', '0', 'In Stock', '51', 'Samsung Galaxy Tab S5e1.jpg', 'Samsung Galaxy Tab S5e2.jpg', 'Samsung Galaxy Tab S5e3.jpg'),
(23, 3, 'Apple iPad', 'Apple', '18450', 29900, '10.2-inch Retina display\r\nA10 Fusion chip\r\nTouch ID fingerprint sensor and Apple Pay\r\n8MP back camera, 1.2MP FaceTime HD front camera\r\nStereo speakers\r\n802.11ac Wi-Fi\r\nUp to 10 hours of battery life										', '0', 'In Stock', '51', 'Apple iPad1.jpg', 'Apple iPad2.jpg', 'Apple iPad3.jpg'),
(24, 3, 'Apple iPad Pro', 'Apple', '107842', 157980, '12.9-inch edge-to-edge Liquid Retina display with ProMotion, True Tone, and wide color\r\nA12X Bionic chip with Neural Engine\r\nFace ID for secure authentication\r\n12-megapixel back camera, 7-megapixel TrueDepth front camera\r\nFour speaker audio with wider stereo sound\r\n802.11ac Wi-Fi\r\nUp to 10 hours of battery life										', '0', 'In Stock', '51', 'Apple iPad Pro1.jpg', 'Apple iPad Pro2.jpg', 'Apple iPad Pro3.jpg'),
(25, 3, 'Lenovo Tab M8', 'Lenovo', '11487', 14990, '8MP primary camera with auto focus 8 mp rear camera and 2MP front facing camera\r\n20.32 centimeters (8-inch) with 1280 X 800 pixels resolution\r\nAndroid v9 Pie operating system with 2.0Ghz MediaTek Helio A22 Tab processor, 2GB RAM, 32GB internal memory expandable up to 128GB\r\n5000mAH lithium-ion polymer battery										', '0', 'In Stock', '51', 'Lenovo Tab M81.jpg', 'Lenovo Tab M82.jpg', 'Lenovo Tab M83.jpg'),
(26, 3, 'Lenovo Tab V7 Tablet', 'Lenovo', '10748', 18940, '13MP primary camera with auto focus, flash, HDR, panorama, night shot modes, front camera with bokeh suport | 5MP front facing camera\r\n17.52 centimeters (6.9 inch) FHD IPS LCD Display multi-touch capacitive touchscreen with 1080 x 2160 pixels resolution 16M color support with 81% screen-to-body ratio\r\nAndroid Pie v9.0 operating system with 1.8GHz Qualcomm Snapdragon 450 octa core processor, 3GB RAM, 32GB internal memory expandable up to 128GB and Dual SIM (nano+nano) dual-standby (4G+4G) with VoLTE Support\r\n5180mAH lithium-ion-polymer battery giving 10 Hours of Playback time and 30 Hours of Talk Time										', '0', 'In Stock', '51', 'Lenovo Tab V7 Tablet1.jpg', 'Lenovo Tab V7 Tablet2.jpg', 'Lenovo Tab V7 Tablet3.jpg'),
(27, 3, 'iBall iTAB MovieZ Pro Tablet', 'iBall', '11254', 24990, 'CAMERA - 13MP primary camera with auto focus, flash, 4x digital zoom, HD video recording, 3x digital zoom | 8MP front facing camera\r\nDISPLAY - 25.65 centimeters (10.1-inch) IPS FHD LED multi-touch capacitive touchscreen with 400 Nits brightness, 1200 x 1920 pixels resolution\r\nOperating System and Processor - Android v9 Pie operating system with Powerful 1.6GHz+1.2GHz ARM Cortex-A55 octa core processor\r\nMEMORY & STORAGE - 4GB RAM | 64GB internal memory | expandable up to 256 GB | Single SIM (Micro SIM)										', '0', 'In Stock', '51', 'iBall iTAB MovieZ Pro Tablet1.jpg', 'iBall iTAB MovieZ Pro Tablet2.jpg', 'iBall iTAB MovieZ Pro Tablet3.jpg'),
(28, 3, 'iBall iTAB MovieZ Tablet', 'iBall', '11542', 19990, 'CAMERA - 8MP primary camera with auto focus, flash, 4x digital zoom, HD video recording, 3x digital zoom | 8MP front facing camera\r\nDISPLAY - 25.65 centimeters (10.1-inch) IPS FHD LED multi-touch capacitive touchscreen with 400 Nits brightness, 1200 x 1920 pixels resolution\r\nOperating System and Processor - Android v9 Pie operating system with Powerful 1.6GHz+1.2GHz ARM Cortex-A55 octa core process\r\nMEMORY & STORAGE - 2GB RAM | 32GB internal memory | expandable up to 256 GB | Single SIM (Mirco SIM)\r\nDual stereo speakers for superior sound\r\nBATTERY - 7000mAH lithium-polymer battery										', '0', 'In Stock', '51', 'iBall iTAB MovieZ Tablet1.jpg', 'iBall iTAB MovieZ Tablet2.jpg', 'iBall iTAB MovieZ Tablet3.jpg'),
(29, 3, 'HUAWEI MediaPad T5 Tablet', 'Huawei', '12548', 21990, '10.1â€ 1080P Full HD Display â€“ HUAWEI MediaPad T5 comes with 10.1â€, 1920 x 1200 IPS, 224 PPI screen, and 16:10 aspect ratio, bringing every moment to life and offering you a video feast all the time\r\nOcta-core processor â€“ The powerful octa-core processor with a main frequency up to 2.36GHz gives you great performance while smoothly running multiple applications simultaneously. And the memory size is expandable up to 256GB with a MicroSD card\r\nThin,Light,Durable â€“ Elegantly designed with metal body, HUAWEI MediaPad T5 outstands for its luxurious look while its slimness, lightweight delivers a spectacular hand-feeling\r\nDual Stereo Speakers â€“ It houses dual stereo speakers with HUAWEI Histen audio technology, delivering concert hall audio effect and providing with multi-layered and penetrating 3D surround sound\r\nEye-Comfort Mode - This Android Tablet features Google Android 8.0 (Oreo) & latest Huawei Emotion UI 8.0. HUAWEI MediaPad T5 10â€™â€™ offers an Eye-comfort Mode reduces harmful blue light to create healthy reading conditions for you and your family\r\nWonderland for your kids â€“ The Childrenâ€™s Corner includes lots of innovative games, and offers enhanced eye-comfort modes for your kidsâ€™ eyesight health: posture guidance, blue light filter, limited using time										', '0', 'In Stock', '51', 'HUAWEI MediaPad T5 Tablet1.jpg', 'HUAWEI MediaPad T5 Tablet2.jpg', 'HUAWEI MediaPad T5 Tablet3.jpg'),
(30, 3, 'Huawei Android Tablet MediaPad T5', 'Huawei', '42158', 52489, 'The Android Tablet MediaPad T5 with 10.1\" IPS FHD Display\r\nOcta Core, Dual Harman Kardon-Tuned Speakers, WiFi Only, 2GB and 16GB\r\nColour - Black									', '0', 'In Stock', '51', 'Huawei Android Tablet MediaPad T51.jpg', 'Huawei Android Tablet MediaPad T52.jpg', 'Huawei Android Tablet MediaPad T53.jpg'),
(31, 4, ' Intex Gaming KB & Mouse Combo-400 ', 'Intex', '899', 1099, 'WHETHER YOU ARE A LATE-NIGHT GAMER OR NEED CONVENIENT GAMING IN LOW-LIGHT, THIS COMBO IS JUST FOR YOU.\r\nTHE BACKLIT KEYS ARE BRIGHT & SHARP. THE NEXT LEVEL IN GAMING The 7D gaming mouse with 7 functional buttons is the perfect treat for all the gamers out there.\r\nJUST THE RIGHT PARTNER FOR THE ULTIMATE GAMER IN YOU. PLAY ON. NO COMPATIBILITY ISSUES.\r\nEQUALLY SMOOTH GAMING WITH ALL POSSIBLE OS. SMOOTH GAMING, COMFORTABLE HANDLING, SWIFT & EASY. GAME ON.										', '0', 'In Stock', '51', 'Intex Gaming KB1.jpg', 'Intex Gaming KB2.jpg', 'Intex Gaming KB3.jpg'),
(32, 4, 'INTEX GM Rapid Gaming Optical Mouse', 'Intex', '548', 800, 'Installation: -Plug and Play\r\nIt is of 3200 DPI Optical Sensor, 7D Gaming Mouse\r\nInterface: - USB wired Mouse\r\nButtons: - 7, Resolution 1200/1600/2400/3200 DPI\r\nSupported Operation System, Win7, Win 8, Win 10, MAC. 1500+ Service Touch Points										', '0', 'In Stock', '51', 'INTEX GM Rapid Gaming1.jpg', 'INTEX GM Rapid Gaming2.jpg', ''),
(33, 4, 'TeckNet Raptor M268 USB LED Gaming Mouse ', 'Tecknet', '845', 1099, '6d optical gaming mouse with blue wave sensor\r\nIntegrated 2000 dpi optical gaming sensor and adjustable dpi setting (600/1200/2000) for precise cursor control\r\nFrame rate: 4000 frame/sec										', '0', 'In Stock', '51', 'TeckNet Raptor M2681.jpg', 'TeckNet Raptor M2682.jpg', 'TeckNet Raptor M2683.jpg'),
(34, 4, 'Tecknet Combo', 'Tecknet', '1500', 2578, '12 Dedicated multimedia controls - Play, stop, pause, skip tracks and adjust volume directly from the keyboard. Game/Desktop mode switch disables the Windows and Context Menu keys\r\nMouse: 2000 DPI, 4000 FPS, 15G ACC, Super fast game engine, 6 function buttons, built-in weights, 3 speed switch 1000/1600/2000, 2 side buttons										', '0', 'In Stock', '51', 'Tecknet X8611.jpg', 'Tecknet X8612.jpg', 'Tecknet X8613.jpg'),
(35, 4, 'Red Dead Redemption 2  (for PS4)', 'Rockstar Games', '2000', 2499, 'Title Name:Red Dead Redemption 2\r\nPlatform:PS4\r\nEdition:Standard Edition\r\nType:Full Game\r\nGenre:Action-Adventure\r\nGame Modes:Multi-Player, Single-Player\r\nPublisher:Rockstar Games\r\nDeveloper:Rockstar Games										', '0', 'In Stock', '51', 'reddead1.jpeg', 'reddead2.jpeg', 'reddead3.jpeg'),
(36, 4, 'Call Of Duty: World War II  (for PS4)', 'Activision', '678', 2899, 'Title Name:Call Of Duty: World War II\r\nPlatform:PS4\r\nEdition:Standard Edition\r\nType:Full Game\r\nSeries:Call of Duty\r\nGenre:First-Person Shooter\r\nGame Modes:Multi-Player, Single-Player\r\nPublisher:Activision\r\nDeveloper:Sledgehammer Games										', '0', 'In Stock', '51', 'callofduty1.jpeg', 'callofduty2.jpeg', 'callofduty3.jpeg'),
(37, 4, 'Grand Theft Auto V  (for PS3)', 'Rockstar Games', '1580', 2459, 'Platform: PS3\r\nGenre: Action-Adventure\r\nEdition: Standard Edition\r\nGame Modes: Multi-Player, Single-Player										', '0', 'In Stock', '51', 'gta1.jpeg', 'gta2.jpeg', 'gta3.jpeg'),
(38, 4, 'PUBG  (for Xbox One)', 'Tencent Games', '678', 2899, 'Platform: Xbox One\r\nGenre: Battle Royale\r\nEdition: Standard Edition\r\nGame Modes: Multi-player										', '0', 'In Stock', '51', 'pubg1.jpeg', 'pubg2.jpeg', 'pubg3.jpeg'),
(39, 4, 'Call Of Duty Modern Warfare', 'Activision', '1568', 4699, 'Platform: PS4\r\nGenre: Shooter\r\nEdition: Standard\r\nGame Modes: Single Player										', '0', 'In Stock', '51', 'cod1.jpeg', 'cod2.jpeg', 'cod3.jpeg'),
(40, 5, '445 Sports Shoes', 'Chevit', '256', 499, 'Lightweighted and durable										', '0', 'In Stock', '51', 'sportsh1.jpeg', 'sportsh2.jpeg', 'sportsh3.jpeg'),
(41, 5, 'Climber Boots For Men', 'Krassa', '499', 999, 'Brown and black										', '0', 'In Stock', '51', 'boot1.jpeg', 'boot2.jpeg', 'boot3.jpeg'),
(42, 5, 'Park Avenue Good Morning', 'Park Avenue', '245', 398, ' Deodorant Spray 										', '0', 'In Stock', '51', 'parkavenue1.jpeg', 'parkavenue2.jpeg', ''),
(43, 5, 'Fogg Scent Impressio ', 'Fogg', '245', 500, 'Fogg Scent Impressio Eau de Parfum - 100 ml  (For Men)\r\n										', '0', 'In Stock', '51', 'fogg1.jpeg', 'fogg2.jpg', ''),
(44, 5, 'Ustraa Cologne Spray - Scuba ', 'Ustraa', '450', 650, 'Ustraa Cologne Spray - Scuba (100 ml) Perfume - 100 ml  (For Men)\r\n										', '0', 'In Stock', '51', 'Ustraa1.jpeg', 'Ustraa2.jpeg', ''),
(45, 5, 'Ustraa Cologne Spray - Tattoo', 'Ustraa', '325', 552, 'Ustraa Cologne Spray - Tattoo (100 ml) Perfume - 100 ml  (For Men)										', '0', 'In Stock', '51', 'Cologne Spray1.jpeg', 'Cologne Spray2.jpeg', ''),
(46, 6, 'Women Black Heels Sandal', 'TOSHINA SHOES KING ', '256', 699, 'Women Black Heels Sandal										', '0', 'In Stock', '51', 'Toshina1.jpeg', 'Toshina2.jpeg', 'Toshina3.jpeg'),
(47, 6, 'Women Black Heels Sandal', 'Denill', '354', 999, 'Women Black Heels Sandal										', '0', 'In Stock', '51', 'Denill1.jpeg', 'Denill2.jpeg', 'Denill3.jpeg'),
(48, 6, 'Lakme Eyeconic Kajal Pencil ', 'Lakme', '120', 180, 'Color: Black\r\nWaterproof\r\nPencil Form\r\n22 hr Smudge Proof\r\nQuantity: 0.35 g										', '0', 'In Stock', '51', 'lakme1.jpeg', 'laakme2.jpeg', ''),
(49, 6, 'Lakme Enrich Matte Lipstick', 'Lakme', '200', 285, 'Gives a Matte finish look\r\nTexture is: Cream\r\nQuantity: 4.7 g\r\nLakme enrich matte lipsticks are long lasting and designed to give an even and luscious finish to your lips.Enriched with Vitamin E, the creamy matte textured lipstick does not drag on or dry the lips, and instead leaves them feeling hydrated.										', '0', 'In Stock', '51', 'lipstick1.jpeg', 'lipstick2.jpeg', ''),
(50, 6, 'Fogg Paradise Deodorant Spray', 'Fogg', '145', 230, 'Quantity: 150 ml\r\nFragrance: Deodorant Spray\r\nFor Women										', '0', 'In Stock', '51', 'foggw1.jpeg', 'foggw2.jpg', ''),
(51, 6, 'Women Blue Shoulder Bag', 'Urban Trend', '222', 999, 'Women Blue Shoulder Bag										', '0', 'In Stock', '51', 'handbag1.jpeg', 'handbag2.jpeg', 'handbag3.jpeg'),
(52, 7, 'Murder on the Orient Express', 'Harper', '145', 299, 'Language: English\r\nBinding: Paperback\r\nPublisher: Harper\r\nGenre: Fiction\r\nPages: 288										', '0', 'In Stock', '54', 'murder-on-the-orient-express-original-imafbpqtfghyfkhy.jpeg', 'murder-on-the-orient-express-original-imafbpqtfghyfkhy.jpeg', ''),
(53, 7, 'The Chestnut Man', 'Penguin', '155', 399, 'Language: English\r\nBinding: Paperback\r\nPublisher: Penguin\r\nGenre: Fiction\r\nPages: 512										', '0', 'In Stock', '51', 'the-chestnut-man-original-imafb4zk5cjpmf6y.jpeg', 'the-chestnut-man-original-imafjcwntmf79ed2.jpeg', ''),
(54, 7, 'Designing Data-Intensive Applications', 'Packt', '785', 1600, 'Language: English\r\nBinding: Paperback\r\nPublisher: Packt\r\nGenre: Computers\r\nPages: 616										', '0', 'In Stock', '54', 'designing-data-intensive-applications-the-big-ideas-behind-original-imaeu4xdfuakzmgx.jpeg', 'designing-data-intensive-applications-the-big-ideas-behind-original-imaeu4xdfuakzmgx.jpeg', ''),
(55, 7, 'Java: The Complete Reference', 'Mcgrawhill HED', '458', 850, 'Language: English\r\nBinding: Paperback\r\nPublisher: Mcgrawhill HED\r\nGenre: Computers\r\nPages: 1056										', '0', 'In Stock', '51', 'java-the-complete-reference-original-imafbdtazhghcbmg.jpeg', 'java-the-complete-reference-original-imafbdtazhghcbmg.jpeg', ''),
(56, 7, 'Meri Pratham Hindi Sulekh Varnmala ', 'Wonder House Books', '89', 140, 'Language: Hindi\r\nBinding: Paperback\r\nPublisher: Wonder House Books\r\nGenre: Children\r\nPages: 56										', '0', 'In Stock', '51', 'meri-pratham-hindi-sulekh-varnmala-original-imafgayfgsnuaujr.jpeg', 'meri-pratham-hindi-sulekh-varnmala-original-imafgayfgsnuaujr.jpeg', ''),
(57, 7, 'The Rudest Book Ever', 'Westland Publications Limited', '200', 299, 'Language: English\r\nBinding: Paperback\r\nPublisher: Westland Publications Limited\r\nGenre: Self-Help\r\nPages: 224										', '0', 'In Stock', '51', 'the-rudest-book-ever-original-imafmgbcvbwrztbt.jpeg', 'the-rudest-book-ever-original-imafmgbcvbwrztbt.jpeg', ''),
(58, 8, 'Blade Poplar Cricket Bat ', 'CEAT', '399', 1399, 'Age Group 15+ Yrs\r\nBlade Made of Poplar Willow\r\nAdvanced, Training Playing Level\r\nBat Grade: Grade 2\r\nSport Type: Cricket\r\nWeight Range 1.2 kg										', '0', 'In Stock', '51', 'ceat1.jpeg', 'ceat2.jpeg', 'ceat3.jpeg'),
(59, 8, 'MRF TENNIS CRICKET BAT', 'MRF', '300', 900, 'Age Group 15+ Yrs\r\nBlade Made of Poplar Willow\r\nAdvanced, Intermediate, Training, Beginner Playing Level\r\nBat Grade: Grade 1+\r\nSport Type: Cricket\r\nWith Cover\r\nWeight Range 1-1.2 kg										', '0', 'In Stock', '51', 'mrfc1.jpeg', 'mrfc2.jpeg', ''),
(60, 8, 'Nivia Heavy Cricket Tennis Ball', 'Nivia', '555', 995, 'Cricket Tennis Ball\r\nWater Resistant\r\nOuter Material: Synthetic Rubber\r\nWeight: 200 g										', '0', 'In Stock', '51', 'niviab1.jpeg', 'niviab2.jpeg', ''),
(61, 8, 'Maestro White Cricket Leather ball', 'Adrenex', '254', 599, 'Cricket Leather Ball\r\nWater Resistant\r\nOuter Material: Leather\r\nWeight: 150-170 g										', '0', 'In Stock', '51', 'adenexb1.jpeg', 'adenexb2.jpeg', ''),
(62, 8, 'Nivia Storm Football - Size: 5 ', 'Nivia', '254', 560, 'Football\r\nWater Resistant\r\nOuter Material: Rubber\r\nWeight: 420-470 g\r\nSuitable for: Hard Ground without Grass, Wet & Grassy Ground, Artificail Turf										', '0', 'In Stock', '51', 'niviaf1.jpeg', 'niviaf2.jpeg', ''),
(63, 8, 'Nivia Ultra Armour Goalkeeping Gloves', 'Nivia', '325', 740, 'Left & Right Gloves\r\nFor Men\r\nFor Football\r\nWeight: 220 g\r\nMaterial: PVC Latex Foam										', '0', 'In Stock', '51', 'niviag1.jpeg', 'niviag2.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

DROP TABLE IF EXISTS `userdetails`;
CREATE TABLE IF NOT EXISTS `userdetails` (
  `did` int(50) NOT NULL AUTO_INCREMENT,
  `First Name` varchar(50) NOT NULL,
  `Last Name` varchar(50) NOT NULL,
  `uaddress` longtext NOT NULL,
  `contactno` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `landmark` longtext NOT NULL,
  PRIMARY KEY (`did`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`did`, `First Name`, `Last Name`, `uaddress`, `contactno`, `pincode`, `landmark`) VALUES
(1, 'Admin', 'Shop', 'fff                                        \r\n                                    ', '9744227330', '691577', 'rrr                                    '),
(2, 'Akash', 'Sart', 'tt                                        \r\n                                    ', '7985642350', '691577', 'hh                                    ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
