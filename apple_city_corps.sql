-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2021 at 01:17 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apple_city_corps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('karla', 'adik');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `shipment_location` varchar(255) NOT NULL,
  `additional_information` varchar(255) NOT NULL,
  `creation_date` date NOT NULL DEFAULT current_timestamp(),
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `product_name`, `quantity`, `shipment_location`, `additional_information`, `creation_date`, `approved`) VALUES
(16, 22, 105, 'Nemedzi Castle', 3, 'kazibek bi', '3,castles,kek', '2021-11-24', 1),
(18, 22, 114, 'flowers', 55, 'Dumbldepr', 'e2e2131', '2021-11-24', 1),
(19, 23, 105, 'Nemedzi Castle', 4, 'japanese emperial castle', 'some', '2021-11-24', -1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image_path` text NOT NULL,
  `name` text NOT NULL,
  `country` text NOT NULL,
  `description` text NOT NULL,
  `body` text NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_path`, `name`, `country`, `description`, `body`, `tags`) VALUES
(105, '../uploaded_images/105/!.jpg', 'Nemedzi Castle', 'Japan', 'an island country in East Asia, located in the northwest Pacific Ocean. It is bordered on the west by the Sea of Japan, and extends from the Sea of Okhotsk in the north toward the East China Sea and Taiwan in the south.', 'Japan has been inhabited since the Upper Paleolithic period (30,000 BC), though the first written mention of the archipelago appears in a Chinese chronicle finished in the 2nd century AD. Between the 4th and 9th centuries, the kingdoms of Japan became unified under an emperor and the imperial court based in Heian-kyō. Beginning in the 12th century, political power was held by a series of military dictators (shōgun) and feudal lords (daimyō), and enforced by a class of warrior nobility (samurai). After a century-long period of civil war, the country was reunified in 1603 under the Tokugawa shogunate, which enacted an isolationist foreign policy. In 1854, a United States fleet forced Japan to open trade to the West, which led to the end of the shogunate and the restoration of imperial power in 1868. In the Meiji period, the Empire of Japan adopted a Western-modeled constitution and pursued a program of industrialization and modernization. In 1937, Japan invaded China; in 1941, it entered World War II as an Axis power. After suffering defeat in the Pacific War and two atomic bombings, Japan surrendered in 1945 and came under a seven-year Allied occupation, during which it adopted a new constitution. Under the 1947 constitution, Japan has maintained a unitary parliamentary constitutional monarchy with a bicameral legislature, the National Diet. ', 'Asia, exotic, cheap, popular'),
(108, '../uploaded_images/108/Earth.jpg', 'Earth', 'Earth', 'Earth is the third planet from the Sun and the only astronomical object known to harbour and support life. 29.2% of Earth\'s surface is land consisting of continents and islands. The remaining 70.8% is covered with water, mostly by oceans, seas, gulfs, and other salt-water bodies, but also by lakes, rivers, and other freshwater, which together constitute the hydrosphere. Much of Earth\'s polar regions are covered in ice. Earth\'s outer layer is divided into several rigid tectonic plates[list] that migrate across the surface over many millions of years, while its interior remains active with a solid iron inner core, a liquid outer core that generates Earth\'s magnetic field, and a convective mantle that drives plate tectonics. ', 'Earth\'s gravity interacts with other objects in space, especially the Moon, which is Earth\'s only natural satellite. Earth orbits around the Sun in about 365.25 days. Earth\'s axis of rotation is tilted with respect to its orbital plane, producing seasons on Earth. The gravitational interaction between Earth and the Moon causes tides, stabilizes Earth\'s orientation on its axis, and gradually slows its rotation. Earth is the densest planet in the Solar System and the largest and most massive of the four rocky planets.  According to radiometric dating estimation and other evidence, Earth formed over 4.5 billion years ago. Within the first billion years of Earth\'s history, life appeared in the oceans and began to affect Earth\'s atmosphere and surface, leading to the proliferation of anaerobic and, later, aerobic organisms. Some geological evidence indicates that life may have arisen as early as 4.1 billion years ago. Since then, the combination of Earth\'s distance from the Sun, physical properties, and geological history have allowed life to evolve and thrive. In the history of life on Earth, biodiversity has gone through long periods of expansion, occasionally punctuated by mass extinctions. More than 99% of all species that ever lived on Earth are extinct. Almost 8 billion humans live on Earth and depend on its biosphere and natural resources for their survival. Humans increasingly impact Earth\'s surface, hydrology, atmospheric processes, and other life. ', 'Hotel, Planet, Expensive'),
(111, '../uploaded_images/111/August_Friedrich_Albrecht_Schenck_-_Anguish_-_Google_Art_Project.jpg', 'sheep', 'kz', 'good', '40 kg, 50000tg', 'animal'),
(114, '../uploaded_images/114/flowers.jpg', 'flowers', 'China', 'black and white flowers', 'A flower, sometimes known as a bloom or blossom, is the reproductive structure found in flowering plants (plants of the division Magnoliophyta, also called angiosperms). The biological function of a flower is to facilitate reproduction, usually by providing a mechanism for the union of sperm with eggs. Flowers may facilitate outcrossing (fusion of sperm and eggs from different individuals in a population) resulting from cross-pollination or allow selfing (fusion of sperm and egg from the same flower) when self-pollination occurs.  The two types of pollination are: self-pollination and cross-pollination. Self-pollination happens when the pollen from the anther is deposited on the stigma of the same flower, or another flower on the same plant. Cross-pollination is the transfer of pollen from the anther of one flower to the stigma of another flower on a different individual of the same species. Self-pollination happens in flowers where the stamen and carpel mature at the same time, and are positioned so that the pollen can land on the flower\'s stigma. This pollination does not require an investment from the plant to provide nectar and pollen as food for pollinators.[1] ', 'flowers, Chinese, Asian');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(355) DEFAULT NULL,
  `login` varchar(100) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `login`, `phone_number`, `email`, `password`) VALUES
(20, 'adik', 'adik', '+77712344444', 'adik@gmail.com', '74fac68143274d0c9d5f452ff0451075'),
(21, 'nis', 'nis', '+77718888888', 'nis@fmsh.nis.edu.kz', '584ae3a6ab89d67b476b2e732e7f73d6'),
(22, 'kek', 'kek', 'kek', 'kek@gmail.com', '4cfdc2e157eefe6facb983b1d557b3a1'),
(23, 'asp', 'asp', 'asp', 'asp@gmail.com', '9451810adcc13a25e610332880cc447a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
