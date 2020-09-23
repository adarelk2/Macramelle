-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 07, 2020 at 11:42 PM
-- Server version: 5.6.49-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `macrame`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuppon`
--

CREATE TABLE `cuppon` (
  `id` int(6) NOT NULL,
  `email` varchar(45) NOT NULL,
  `code` int(5) NOT NULL,
  `mode` int(10) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuppon`
--

INSERT INTO `cuppon` (`id`, `email`, `code`, `mode`, `status`) VALUES
(2, '127.0.0.1', 18361, 10, 0),
(3, 'dsasad@gmail.com', 142084, 10, 0),
(5, 'adarelk2@gmail.com', 678927, 10, 0),
(6, 'adarelk2@gmail.com', 306050, 10, 0),
(7, 'macramellehelp@gmail.com', 997028, 10, 0),
(8, 'adarelk2@gmail.com', 294533, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(10) NOT NULL,
  `idItem` int(10) NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `idItem`, `img`) VALUES
(2, 4001221, 'items/gallery/4001221.webp'),
(3, 4001222, 'items/gallery/4001222.webp'),
(4, 4000591, 'items/gallery/4000591.webp'),
(5, 4000592, 'items/gallery/4000592.webp'),
(6, 4000593, 'items/gallery/4000593.webp'),
(7, 4000801, 'items/gallery/4000801.webp'),
(8, 4000802, 'items/gallery/4000802.webp'),
(9, 4001081, 'items/gallery/4001081.webp'),
(10, 4000594, 'items/gallery/4000594.webp'),
(11, 3292931, 'items/gallery/3292931.webp'),
(12, 3295991, 'items/gallery/3295991.webp'),
(13, 4001201, 'items/gallery/4001201.webp'),
(14, 4005203, 'items/gallery/4005203.webp'),
(15, 4001211, 'items/gallery/4001211.webp'),
(16, 4001231, 'items/gallery/4001231.webp'),
(17, 4001232, 'items/gallery/4001232.webp'),
(18, 6001211, 'items/gallery/6001211.webp'),
(19, 4000641, 'items/gallery/4000641.webp'),
(20, 4000642, 'items/gallery/4000642.webp'),
(21, 4000643, 'items/gallery/4000643.webp'),
(22, 4000971, 'items/gallery/4000971.webp'),
(23, 4000451, 'items/gallery/4000451.webp'),
(24, 4021231, 'items/gallery/4021231.webp'),
(25, 4021232, 'items/gallery/4021232.webp'),
(26, 4000861, 'items/gallery/4000861.webp');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(6) NOT NULL,
  `idItem` int(15) NOT NULL,
  `subject` varchar(480) NOT NULL,
  `title` varchar(100) NOT NULL,
  `background` varchar(100) NOT NULL,
  `price` int(3) NOT NULL,
  `rate` int(4) NOT NULL,
  `category` varchar(12) NOT NULL,
  `countRate` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `idItem`, `subject`, `title`, `background`, `price`, `rate`, `category`, `countRate`) VALUES
(5, 4001221, 'Moon-Inspired Dream catcher macrame wall art. A moon shaped macrame is sure to bring fortune and dreams come true. Decorate your bedroom with this unique styled macrame and add elegant beauty to your sleeping environment. Also, it is an ideal piece to decorate your working space at home.<br>\r\nLength: 20X94CM<br>Material: cotton<br>\r\nColor: off-white<br>1 piece\r\n', 'Moon-Inspired Dream catcher - 1X', 'items/4001221.webp', 25, 1, 'walls', 15),
(6, 4001222, ' Material: Made from high quality natural cotton, eco-friendly, nontoxic.\r\nDream catcher: Nightmare pass through the holes and out of the window and the good dreams are trapped in the web ,slide down the strips to the sleeping person.\r\nGreat decor: Beautiful wall art for bedroom, living room, baby tent, sitting room, balcony and more.\r\n<br>\r\nSize: 95* 20CM', 'A very special Dream Catcher', 'items/4001222.webp', 45, 1, 'walls', 5),
(7, 4000591, 'Original design, hand-woven, every detail of tapestry is full of love.\r\nIt is the perfect gift for any occasion such as Valentine\'s Day, birthday party, baby shower, etc. It is also a great decoration for Christmas, wedding and photo props.\r\nSize: 88*25 CM<br>\r\nMaterial:cotton + wood\r\n', 'A beautiful modren Dream Catcher', 'items/4000591.webp', 45, 1, 'walls', 5),
(8, 4000592, 'Made of high-quality natural cotton thread and natural wood, environmentally friendly, strong and durable, very suitable for kindergarten decoration or any other room with children.\r\n This is a beautifully designed wall tapestry, which can bring warmth, comfort and joy to everyone in your home.<br>\r\nLength: 107*35 CM<br>\r\nMaterial:cotton + wood\r\n', '100% natural and handcrafted macrame art', 'items/4000592.webp', 50, 1, 'walls', 5),
(9, 4000593, ' Add a pop of nature to your home with This Boho style macrame art decor with leafy design. It is a perfect gift item for nature lovers who will love to upgrade their place with these aesthetic macrame handcrafted using 100% natural cotton.<br>\r\nLength: 95cm - 45cm', 'Feathers shape of macrame', 'items/4000593.webp', 40, 1, 'walls', 5),
(10, 4000801, 'Galaxy-Inspired macrame wall art. This macrame has a crescent moon as its unique charm. Extremely ideal to decorate your bedroom with this macrame and yellow lights to get a cosy sleeping space. This macrame can be used as a dreamcatcher to keep bad dreams at bay.<br>\r\nLength: 96 cm', 'Galaxy-Inspired macrame wall art', 'items/4000801.webp', 35, 4, 'walls', 15),
(11, 4000802, 'Decorate your room with this star shaped Macrame is must to be included in your galaxy inspired wall decor art. Perfect to be hung on the wall of your bedroom. Light up your room with some candles and this macrame. Produces a calming effect on the mind and soul.<br>\r\nLength: 105cm', 'star shaped Macrame - [1X]', 'items/4000802.webp', 35, 4, 'walls', 15),
(12, 4001081, 'Garland macrame wall hanging. This macrame is a fantastic product to adore the walls of your bedroom or living room. Also, it can be used to decorate the entrance of your home. Perfect for gifting to your loved ones who have a special love for handmade things.<br>\r\nSize: 110cm Weight: 410g Packing: opp bag', 'Garland macrame wall hanging', 'items/4001081.webp', 55, 1, 'walls', 5),
(13, 4000594, 'Extremely Simple yet so Elegant. This macrame is carefully designed for the people who prefer beauty combined with simplicity. With no intricate designing, this piece of macrame art is simple yet elegant. Appropriate to decorate your living room with this beautiful Boho style wall art.<br> \r\nLength: 85*20 CM', 'Extremely Simple yet so Elegant', 'items/4000594.webp', 35, 4, 'walls', 15),
(14, 3292931, 'Woven with love by hands. A slightly heavy piece with a lot of intricate designing. One of the best wall hanging options available. Perfect to upgrade the standard of your home with this elegant macrame art.<br>\r\nSize: 36*84CM', 'Woven with love by hands - Special', 'items/3292931.webp', 55, 1, 'walls', 5),
(15, 3295991, 'Upgrade the walls of your home with this macrame art. This Bohemian styled macrame art is intricate in its design and extraordinarily beautiful. An ideal piece to decorate your house aligned with any kind of portrait paintings. All the delicacies are handcrafted and made from natural cotton.\r\n<br>Length:30*110CM<br>\r\nWeight: 330G', 'Macrame 11', 'items/3295991.webp', 50, 1, 'walls', 5),
(16, 4001201, 'Macrame wall hanging inspired from love. This Bohemian style wall art decor is knitted using natural cotton and wood. The heart shaped design crafted in the macrame is sure to steal away your heart. Extremely perfect to hang on the walls of your living room and bedrooms.<br>\r\n1. Material: cotton thread+ wood<br>\r\n2. Length: 75 cm/29.5\"<br>\r\n3. Wooden Pole: 25 cm/9.8\"<br> \r\n4. Style: Bohemian<br>\r\n<span style=\"font-family:boldFont;\">2 Piece HOT</span>', 'Macrame wall hanging inspired from love - [2X]', 'items/4001201.webp', 45, 1, 'walls', 5),
(17, 4005201, 'Enhance the aura of your home with this macrame art work. This premium quality Macrame wall hanging will complement any of your living room, bed room, kitchen or drawing room. This beautiful modern Boho Style macrame can also be used to decorate venues and nurseries.\r\n<br>\r\nSize: 20x26x50cm<br>\r\nWeight: 380G', 'Enhance the aura of your home #1 - DreamCatcher', 'items/4005201.webp', 35, 1, 'walls', 5),
(18, 4005202, 'Enhance the aura of your home with this macrame art work. This premium quality Macrame wall hanging will complement any of your living room, bed room, kitchen or drawing room. This beautiful modern Boho Style macrame can also be used to decorate venues and nurseries.\r\nSize: 20x26x50cm\r\nWeight: 380G', 'Enhance the aura of your home #2 - DreamCatcher', 'items/4005202.webp', 40, 1, 'walls', 5),
(19, 4005203, 'Enhance the aura of your home with this macrame art work. This premium quality Macrame wall hanging will complement any of your living room, bed room, kitchen or drawing room. This beautiful modern Boho Style macrame can also be used to decorate venues and nurseries.\r\n<br>\r\nSize: 20x26x50cm<br>\r\nWeight: 380G', 'Enhance the aura of your home #3 - DreamCatcher', 'items/4005203.webp', 40, 1, 'walls', 5),
(20, 4001211, 'Modernised Macrame wall Art for your home. This Bohemian macrame wall art is absolutely perfect to upgrade your home with its natural and handcrafted beauty. It can be used to decorate your home in any style traditional or modern.<br>\r\nLength: 68*25cm <span style=\"font-family:boldFont;\">2 Piece </span>\r\n', 'Modernised Macrame wall Art for your home - [2X]', 'items/4001211.webp', 45, 1, 'walls', 5),
(22, 4001231, 'Material: 100% COTTON<br>\r\nLength: 30-100 cm', 'Mandala-Inspired macrame art - Special', 'items/4001231.webp', 40, 1, 'walls', 5),
(23, 4001232, 'Turn around your home into a fairytale style with this Macrame art.This macrame is designed using natural cotton. The intricate designing is crafted with the quality of hands. Perfect to decorate your home in a fairytale style using fairy lights and this beautiful macrame.\r\n<br>\r\nLength: 20-72CM <span style=\"font-family:boldFont;\">2 Piece </span>', 'fairytale style with this Macrame art - [2X]', 'items/4001232.webp', 35, 1, 'walls', 5),
(24, 6001211, 'Peace- Inspired Macrame wall art. This unique Bohemian decor macrame is sure to add charm to your home decor with geometric design. Perfect for using as a wall hanging art. This macrame will look extremely pleasant on walls painted in white.<br>\r\nLength: 20cm / 45cm\r\n<span style=\"font-family:boldFont;\">2 Piece </span>', 'Peace- Inspired Macrame wall art\r\n - [2X]', 'items/6001211.webp', 25, 4, 'walls', 15),
(25, 4000641, 'Simple yet Beautiful Macrame. This extremely beautiful macrame piece is all set to go beyond your expectations. Finely crafted with knots done by hands, it is perfect to be used as coasters. They add a very stylish yet traditional touch to your home.<br>\r\nLength: 17x10CM<br><span style=font-family:boldFont;>2 Piece </span>', 'Simple yet Beautiful Macrame - [2X]', 'items/4000641.webp', 20, 4, 'tables', 15),
(26, 4000642, ' Love-Inspired Handmade Macrame art. These heart shaped macrame are sure to add a romantic touch to your home furnishings. Totally handcrafted, they are very unique in design and sure to take the beauty of your room to a next level.<br>\r\nLength: 18 x 15 CM<br>\r\n<span style=\"font-family:boldFont;\">2 Piece </span>', 'Love-Inspired Handmade Macrame art - [2X]', 'items/4000642.webp', 20, 1, 'tables', 5),
(27, 4000643, 'Premium wall hanging macrame art. These handmade macrame are round in shape and perfect for placing candles. They are sure to light up the aura of your living room. The tassles created all around the circumference impart antique beauty to these macrame.<br>\r\nLength: 16 x 16CM<br>\r\n<span style=\"font-family:boldFont;\">2 Piece </span>\r\n', 'Premium wall hanging macrame art - [2X]', 'items/4000643.webp', 20, 1, 'tables', 5),
(28, 4000971, 'Made from 100% cotton and woven by hands. These square shaped macrame table art is designed in a Boho chic style. These are sure to add some tint of modernity and tradition to your home decor. Ideal for keeping decorative pieces in your living room and drawing room.<br>\r\nLength: 17 x 17CM <span style=\"font-family:boldFont;\">2 Piece HOT</span>', 'Macrame 4 - [2X]', 'items/4000971.webp', 25, 1, 'tables', 5),
(29, 4000451, 'Cotton weave the cup mat it will bring a Bohemian folk and vintage to your decor.\r\nCarefully designed: The unique oval design adds more fun to your kitchen table and can be used as a good decoration to enhance the quality of your food<br>\r\nLength: 19.5x19.5CM', 'Macrame 5 - [2X]', 'items/4000451.webp', 25, 1, 'tables', 5),
(30, 4021231, 'Feather-Inspired Macrame piece. These round macrame art with fine cotton threads left loose around the circumference is an essential element for your living room. Perfect for placing decorative pots. May be used as coasters too.<br>\r\nLength: 18.5x18.5CM<br>\r\n<span style=\"font-family:boldFont;\">2 Piece </span>', 'Macrame 6 - [2X]', 'items/4021231.webp', 20, 4, 'tables', 15),
(31, 4021232, 'Dove-Inspired macrame art work. This white coloured Boho style macrame is very sleek and decent looking. Very appropriate for decorating your office with this very elegant macrame. Ideal to be used for decorating the tables at home also.<br>\r\nLength: 18.5x18.5 CM <span style=\"font-family:boldFont;\">2 Piece</span>', 'Macrame 7 - [2X]', 'items/4021232.webp', 25, 1, 'tables', 5),
(32, 4000861, 'Nature-Inspired Handmade Macrame art work. Made from 100% natural cotton and crafted by Hands, these leaf-shaped macrame will definitely add elegance to your home decor. It can be used as a holder on brown tables. Also, it can be used to decorate the walls of your home.<br>\r\nLength:20CM<br>\r\n<span style=\"font-family:boldFont;\">2 Piece </span>', 'Nature-Inspired Handmade Macrame art work - [2X]', 'items/4000861.webp', 20, 1, 'tables', 5),
(33, 3290951, 'Purely handmade, Elegant Macrame. This 100 cm long and beautiful macrame is perfect for hanging pots and decorating your home.\r\nIt is made with the goodness of 100% cotton, weaved with abundance of love. It can be used indoors as well as outdoors.<br> \r\n100% cotton & 100% handmade<br>\r\nLength: 100CM', 'Purely handmade, Elegant Macrame.', 'items/3290951.webp', 10, 4, 'outside', 15),
(34, 3290952, 'Handmade Macrame perfect for hanging pots. This uniquely designed macrame is 100 cm long and crafted with unique delicacies. Made from 100% cotton, this macrame is eco-friendly and elegant at the same time. It is the perfect option for gifts for a plant lover. <br>\r\n100% cotton & 100% handmade<br>\r\nLength: 100CM', 'Handmade Macrame perfect for hanging pots', 'items/3290952.webp', 10, 1, 'outside', 5),
(35, 3290953, 'Natural and Hand woven macrame. This macrame is simple yet so beautiful. Also, it is extremely ideal for hanging medium sized potted plants. Made from 100% cotton with the goodness of hands, it is a great gift option for your environment- conscious friends and family.<br> \r\n100% cotton & 100% handmade<br>\r\nLength: 100CM', 'Natural and Hand woven macrame', 'items/3290953.webp', 10, 1, 'outside', 5),
(36, 3290954, '100% cotton & 100% handmade\r\nLength: 100CM', 'Macrame 4', 'items/3290954.webp', 15, 1, 'outside', 5),
(37, 3290955, '100% cotton & 100% handmade\r\nLength: 100CM', 'Macrame 5', 'items/3290955.webp', 15, 1, 'outside', 5),
(38, 3290956, '100% cotton & 100% handmade\r\nLength: 100CM', 'Macrame 6', 'items/3290956.webp', 15, 1, 'outside', 5),
(39, 3290957, 'Macrame ideal for hanging potted plants. This handmade macrame knotted from natural cotton is an ideal piece to hang flower pots. The knots decorated with beads add a unique charm to this macrame. Also, this will add a timeless beauty to your home.<br>\r\n100% cotton & 100% handmade<br>\r\nLength: 100CM', 'Beaded Macrame ideal for hanging potted plants', 'items/3290957.webp', 15, 4, 'outside', 15),
(40, 3290958, 'Upgrade your home with this pure cotton macrame. Beautifully knotted and handcrafted, this macrame offers an antique stylish accent to your home. This piece goes perfectly with any kind of style preference, be it modern, conventional or traditional.\r\n<br>100% cotton & 100% handmade<br>\r\nLength: 100CM', 'Upgrade your home with this pure cotton macrame', 'items/3290958.webp', 15, 1, 'outside', 5);

-- --------------------------------------------------------

--
-- Table structure for table `newSletter`
--

CREATE TABLE `newSletter` (
  `email` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newSletter`
--

INSERT INTO `newSletter` (`email`) VALUES
('adarelk2@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `idItem` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(1) NOT NULL,
  `idOrder` int(8) DEFAULT NULL,
  `given_name` varchar(15) DEFAULT NULL,
  `surname` varchar(14) DEFAULT NULL,
  `email_address` varchar(35) DEFAULT NULL,
  `city` varchar(25) DEFAULT NULL,
  `postal_code` varchar(15) DEFAULT NULL,
  `country_code` varchar(30) DEFAULT NULL,
  `street` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `idItem`, `title`, `date`, `status`, `idOrder`, `given_name`, `surname`, `email_address`, `city`, `postal_code`, `country_code`, `street`) VALUES
(103, 4001221, 'Moon-Inspired Dream catcher - 1X', '07/09/20', 0, 162108, 'elkabetz', 'adar', 'adarelk2@gmail.com', 'afula', '18361', 'New York', 'yahlaom 27');

-- --------------------------------------------------------

--
-- Table structure for table `orders_success`
--

CREATE TABLE `orders_success` (
  `id` int(4) NOT NULL,
  `idOrder` int(8) NOT NULL,
  `zen` int(4) NOT NULL,
  `discount` int(8) NOT NULL,
  `status` int(1) NOT NULL,
  `lastZen` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_success`
--

INSERT INTO `orders_success` (`id`, `idOrder`, `zen`, `discount`, `status`, `lastZen`) VALUES
(42, 162108, 2, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuppon`
--
ALTER TABLE `cuppon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_success`
--
ALTER TABLE `orders_success`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuppon`
--
ALTER TABLE `cuppon`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `orders_success`
--
ALTER TABLE `orders_success`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
