-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2025 at 02:08 AM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolkantine`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `imageSrc` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `title`, `imageSrc`, `price`, `description`, `category`) VALUES
(1, 'Broodje Gezond', 'media/broodje-gezond.jpg', 3.80, 'Op dit broodje zit kaas, veldsla, komkommer, tomaat, ei, ham en/of kip en bufkes saus.', 'Broodjes'),
(2, 'Bagel', 'media/bagel.jpeg', 4.20, 'Doughnut brood met spek, ei en kaas', 'Broodjes'),
(3, 'Broodje Gehakt met Joppiesaus', 'media/GehaktJoppie.png', 3.80, 'Een wit of bruin broodje met Gehakt, Ei, Sla en Joppiesaus', 'Broodjes'),
(4, 'Frikandelbroodje', 'media/frikandelbroodje.png', 1.20, 'Een knapperige korstje met een warme frikandel en curry saus erin', 'Broodjes'),
(5, 'Saucijzenbroodje', 'media/Saucijz.png', 1.20, 'Een knapperig korstje met een warme, kruidige vleesvulling', 'Broodjes'),
(6, 'Croissant', 'https://th.bing.com/th/id/OIP._NRJfKZ0twQKDaljLKfvLAHaEt?rs=1&pid=ImgDetMain', 1.20, 'Verschilende diverse croisantje beschikbaar bij de counter', 'Broodjes'),
(7, 'Chocolade broodje', 'https://www.bakkerijtommie.nl/wp-content/uploads/2020/02/chocoladebroodje-600x599.png', 1.20, 'Een krokrantig korstje met chocolade erin', 'Broodjes'),
(8, 'Broodje kip', 'https://th.bing.com/th/id/OIP.sVGmYdUWj25TkUaJR2FCUwHaHa?rs=1&pid=ImgDetMain', 3.20, 'Op het broodje kip zit komkommer, salade, kip en bufkes saus', 'Broodjes'),
(9, 'Panini broodje', 'https://th.bing.com/th/id/OIP.aTQpC7sGUdi1HntM7OP6nwAAAA?w=350&h=517&rs=1&pid=ImgDetMain', 1.20, 'Verschillende diverse paninis zijn te vinden op de counter!', 'Broodjes'),
(10, 'Spa Water', 'media/spa.webp', 2.00, 'Koude verfrissende water.', 'Koude-Dranken'),
(11, 'Spa Rood', 'media/spa-rood.jpg', 2.00, 'Koude verfrissende water.', 'Koude-Dranken'),
(12, 'Cola zero', 'media/cola-zero.jpg', 1.80, 'Koude verfrissende cola zero.', 'Koude-Dranken'),
(13, 'Cola vanille', 'media/cola-vanilla.jpg', 1.80, 'Koude verfrissende cola vanille.', 'Koude-Dranken'),
(14, 'Cola cherry', 'media/cola-cherry.jpg', 1.80, 'Koude verfrissende cola cherry.', 'Koude-Dranken'),
(15, 'Cola', 'media/cola.jpg', 1.80, 'Koude verfrissende cola.', 'Koude-Dranken'),
(16, 'Sprite', 'media/sprite.jpg', 1.80, 'Koude verfrissende sprite.', 'Koude-Dranken'),
(17, 'Dr pepper', 'media/drpepper.png', 1.80, 'Koude verfrissende dr pepper.', 'Koude-Dranken'),
(18, 'Fanta orange original', 'media/fanta.jpg', 1.80, 'Koude verfrissende fanta orange original.', 'Koude-Dranken'),
(19, 'Fanta orange zero', 'media/fanta-zero.jpg', 1.80, 'Koude verfrissende fanta orange zero.', 'Koude-Dranken'),
(20, 'Fanta exotic zero', 'media/fanta-exotic-zero.jpg', 1.80, 'Koude verfrissende fanta exotic zero.', 'Koude-Dranken'),
(21, 'Fanta lemon zero', 'media/fanta-lemon-zero.jpg', 1.80, 'Koude verfrissende fanta lemon zero.', 'Koude-Dranken'),
(22, 'Ice tea', 'https://www.manutan.nl/img/S/GRP/ST/AIG12165970.jpg', 1.80, 'Koude verfrissende ice tea.', 'Koude-Dranken'),
(23, 'Fanta cassis', 'media/fanta-cassis.jpg', 1.80, 'Koude verfrissende fanta cassis.', 'Koude-Dranken'),
(24, 'Milkshake', 'https://s3.amazonaws.com/static.realcaliforniamilk.com/media/recipes_2/sunset-sprinkle-shakes.jpg', 3.00, 'Verschillende diverse milkshake (keuze bij de counter maken)', 'Koude-Dranken'),
(25, 'Redbull', 'media/Redbull.png', 2.10, 'De orginele Redbull.', 'Koude-Dranken'),
(26, 'Lente Redbull', 'media/Spring.png', 2.10, 'De Red Bull Spring Edition Walstro & Pink Grapefruit.', 'Koude-Dranken'),
(27, 'Warme Chocomel', 'media/choco-gs.jpg', 2.30, 'Een lekker warme chocolade melk.', 'Warme-Dranken'),
(28, 'Warme Chocomel met slagroom', 'media/chocomel.jpg', 3.00, 'Een lekkere warme chocolade melk met slagroom.', 'Warme-Dranken'),
(29, 'Koffie', 'media/koffie.jpg', 2.20, 'Een lekker warme koffie.', 'Warme-Dranken'),
(30, 'Thee', 'media/thee.jpg', 2.00, 'Heerlijke warme thee (keuze bij de kassa).', 'Warme-Dranken'),
(31, 'Frikandel', 'media/frikandel.jpg', 1.60, 'Gemalen gehakt in een staafje.', 'Snacks'),
(32, 'Bitterballen', 'media/bitterbal.jpg', 2.50, 'Een bakje met 9 Bitterballen.', 'Snacks'),
(33, 'Mexicano', 'media/Mexicano.png', 1.60, 'Een pittige mexicano.', 'Snacks'),
(34, 'Kipcorn', 'media/Kipcorn.png', 1.60, 'Een lekkere krokante Kipcorn.', 'Snacks'),
(35, 'Friet', 'media/Friet.png', 4.00, 'Een bakje friet.', 'Snacks'),
(36, 'Kipnuggets', 'media/Kipnuggets.png', 2.50, 'Een bakje met 9 kipnuggets.', 'Snacks'),
(37, 'Kroket', 'media/Kroket.png', 1.80, 'Een lekkere krokante kroket!', 'Snacks'),
(38, 'Kaassoufle', 'media/Kaassoufle.png', 1.80, 'Een lekkere krokante kaassoufle!', 'Snacks'),
(39, 'Ijsjes', 'media/ijs.png', 2.30, 'Een lekker ijsje met vele smaken, zoals aardbei, vanille, chocolade, mint, bosbes en nog veel meer (alleen in de zomer!).', 'Desserts'),
(40, 'Sorbet', 'media/sorbet.webp', 3.20, 'Lekkeresorbet met saus naar keuze.', 'Desserts'),
(41, 'Softijs', 'media/softijs.jpg', 1.50, 'Een melk ijsje.', 'Desserts'),
(42, 'Sundea ijs', 'media/sundea.jpg', 2.30, 'Een softijs ijsje in een bakje met een sas naar keuze!', 'Desserts'),
(43, 'Appelflap', 'https://www.royalsmilde.com/uploads/og_image/c172e39c-5f71-59c3-b904-52a773b60239/3168309207/Appelflap%20met%20rozijnen.jpg', 2.30, 'Een lekker korstje met fijn gesneden appels, rozijnen en kaneel erin.', 'Desserts'),
(44, 'Koekjes', 'https://rutgerbakt.nl/wp-content/uploads/2020/02/chocolat_chip_cookies_recept-scaled.jpg', 2.50, 'Lekkere knapperige chocolade koekjes!', 'Desserts'),
(45, 'Lunch Deal', 'media/deals.jpg', 7.00, 'Bij deze deal krijg je 1 snack naar keuze, wat frietjes en drinken naar keuze erbij!', 'Deals'),
(46, 'Gezonde Deal', 'media/deals.jpg', 7.00, 'Bij deze deal krijg je een keuze naar een broodje en een keuze naar een koude drank!!', 'Deals'),
(47, 'Tomatensoep', 'media/soep.jpg', 3.80, 'Tomatensoep met gehakt balletje.', 'Soepen'),
(48, 'Kippensoep', 'media/kippensoep.jpg', 3.80, 'Kippensoep met kip en groenten.', 'Soepen'),
(49, 'Erwtensoep', 'media/erwtensoep.webp', 3.80, 'Gemalen erwten met stukjes worst erin.', 'Soepen'),
(50, 'Groentesoep (met gehaktballetjes)', 'media/groentesoep.jpg', 4.80, 'Een soep met veel groente erin en gehaktballetjes.', 'Soepen'),
(51, 'Caesar Salade', 'media/salade.jpg', 5.10, 'In een klassieke Ceesar salade zit sla romaine, ui, kipfilet, citroen, mayonaise en olijfolie.', 'Salades'),
(52, 'Griekse Salade', 'media/griekse.jpg', 5.10, 'In een Griekse salade zit komkommer, snoeptomatjes, klein beetje rode ui, olijven, feta kaas en croutons.', 'Salades'),
(53, 'Krokante Kip Salade', 'media/krokante-kip.jpg', 3.50, 'In de krokante Kip Salade zit kip, sla, klein beetje rode ui, snoeptomaatjes, olijfolie en komkommer', 'Salades'),
(54, 'Aardappel Salade', 'media/aardappel.jpg', 3.50, 'In de aardappel salade zit aardappelen, prei, erwten, peper en zout', 'Salades'),
(55, 'Ketchup', 'media/ketchup.jpg', 0.50, '', 'Sausjes'),
(56, 'Mayonaise', 'media/mayo.jpeg', 0.50, '', 'Sausjes'),
(57, 'Mosterd', 'media/mosterd.jpg', 0.50, '', 'Sausjes'),
(58, 'Sweet Chili', 'media/zoetzuur.jpg', 0.50, '', 'Sausjes'),
(59, 'Curry saus', 'media/curry.png', 0.50, '', 'Sausjes'),
(60, 'Aardbij Yoghurt', 'media/aardbij-yoghurt.png', 1.50, 'Yoghurt met aardbei', 'Yoghurt'),
(61, 'Optimel klein 250ml', 'media/optimel-klein.jpg', 1.00, 'Een klein pakje drink yoghurt', 'Yoghurt'),
(62, 'Optimel groot', 'media/optimel-groot.png', 1.50, 'Een groot pakje drink yoghurt', 'Yoghurt'),
(63, 'Melk', 'media/melk.jpeg', 1.00, 'Halfvolle melk in een klein pakje', 'Yoghurt'),
(64, 'Fristi', 'media/fristi.png', 1.00, 'Melkdrank met vruchtensmaak', 'Yoghurt'),
(65, 'Koude chocomelk', 'media/koude-chocomel.jpg', 1.50, 'Koude chocomelk in een flesje', 'Yoghurt'),
(66, 'Breaker', 'media/breaker.jpg', 1.50, 'Verschillende diverse smaken bij de counter', 'Yoghurt'),
(67, 'Yoghurt beker', 'media/images.jpeg', 1.50, 'Een klein bakje met yoghurt en musli erbij', 'Yoghurt'),
(68, 'Kwark 150 gram', 'media/kwark.png', 1.50, 'Een klein bakje kwark', 'Yoghurt'),
(69, 'Haribo starmix', 'media/Starmix.png', 1.00, 'Een mixzakje met 75g snoepjes.', 'Snoep'),
(70, 'Haribo Kikkers', 'media/Kikkertjes.png', 1.00, 'Een zakje met 75g kikkertjes.', 'Snoep'),
(71, 'Haribo Goudberen', 'media/Goudberen.png', 1.00, 'Een zakje met 75g beertjes', 'Snoep'),
(72, 'Haribo Bananen', 'media/Bananas.png', 1.00, 'Een zakje met 75g banaantjes.', 'Snoep'),
(73, 'Haribo Perzikken', 'media/Perzikken.png', 1.00, 'Een zakje met 75g Perzikken.', 'Snoep'),
(74, 'Haribo Tropifrutti', 'media/Tropifrutti.png', 1.00, 'Een mix zakje met 75g Snoepjes.', 'Snoep'),
(75, 'Haribo Tangfastics', 'media/Tangfastics.png', 1.00, 'Een mixzakje met 75g zure snoepjes.', 'Snoep'),
(76, 'Haribo Kersen', 'media/Kersen.png', 1.00, 'Een zakje met 75g kersjes.', 'Snoep'),
(77, 'Haribo Rolletje', 'media/Rolletje.png', 1.00, 'Een rolletje met snoepjes.', 'Snoep'),
(78, 'Bestek', 'media/bestek.jpg', 0.50, 'Plastice vorken, messen en lepels', 'Overige'),
(79, 'Hervul baar bekers', 'media/beker.jpeg', 0.50, 'Bekers die je kunt hervullen en daarna weg kan gooien', 'Overige'),
(80, 'Rietjes', 'media/rietjes.jpeg', 0.50, 'Plastice rietjes', 'Overige');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` varchar(10) NOT NULL,
  `items` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `items`, `total_price`, `order_time`) VALUES
(78, '#001', '[{\"title\":\"Erwtensoep\",\"price\":3.8},{\"title\":\"Haribo starmix\",\"price\":1}]', 4.80, '2025-02-28 09:04:40'),
(81, '#002', '[{\"title\":\"Bestek\",\"price\":0.5}]', 0.50, '2025-02-28 15:41:16');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
