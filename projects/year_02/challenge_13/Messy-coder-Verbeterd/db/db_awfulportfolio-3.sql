-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 10, 2025 at 07:55 AM
-- Server version: 8.0.40
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_awfulportfolio`
--
CREATE DATABASE IF NOT EXISTS `db_awfulportfolio`
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_general_ci;
USE `db_awfulportfolio`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_coretasks`
--

CREATE TABLE `tb_coretasks` (
  `id` int NOT NULL,
  `coretask` varchar(10) NOT NULL,
  `workproces` varchar(10) NOT NULL,
  `name` varchar(150) NOT NULL,
  `summary` text NOT NULL,
  `mytext` text NOT NULL,
  `document` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_projectimages`
--

CREATE TABLE `tb_projectimages` (
  `uuid` varchar(45) NOT NULL,
  `project_uuid` varchar(45) NOT NULL,
  `displayname` varchar(150) NOT NULL,
  `map` varchar(50) NOT NULL DEFAULT 'images/projects',
  `name` varchar(150) NOT NULL,
  `indexnummer` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_projectimages`
--

INSERT INTO `tb_projectimages` (`uuid`, `project_uuid`, `displayname`, `map`, `name`, `indexnummer`, `status`, `timestamp`) VALUES
('f47ac10b-58cc-4372-a567-0e02b2c3d479', '550e8400-e29b-41d4-a716-446655440001', 'Homepage', 'images/projects', 'ecommerce-home.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d480', '550e8400-e29b-41d4-a716-446655440001', 'Productpagina', 'images/projects', 'ecommerce-product.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d481', '550e8400-e29b-41d4-a716-446655440001', 'Winkelwagen', 'images/projects', 'ecommerce-cart.jpg', 3, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d482', '550e8400-e29b-41d4-a716-446655440002', 'App Dashboard', 'images/projects', 'portfolio-dashboard.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d483', '550e8400-e29b-41d4-a716-446655440002', 'Projectweergave', 'images/projects', 'portfolio-project.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d484', '550e8400-e29b-41d4-a716-446655440003', 'Klantoverzicht', 'images/projects', 'crm-clients.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d485', '550e8400-e29b-41d4-a716-446655440003', 'Sales Pipeline', 'images/projects', 'crm-pipeline.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d486', '550e8400-e29b-41d4-a716-446655440004', 'Reservatieformulier', 'images/projects', 'restaurant-booking.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d487', '550e8400-e29b-41d4-a716-446655440004', 'Admin Dashboard', 'images/projects', 'restaurant-admin.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d488', '550e8400-e29b-41d4-a716-446655440005', 'Trainingsschema', 'images/projects', 'fitness-workout.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d489', '550e8400-e29b-41d4-a716-446655440005', 'Voortgangsgrafiek', 'images/projects', 'fitness-progress.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d490', '550e8400-e29b-41d4-a716-446655440006', 'Projectoverzicht', 'images/projects', 'pm-projects.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d491', '550e8400-e29b-41d4-a716-446655440006', 'Teamdashboard', 'images/projects', 'pm-team.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d492', '550e8400-e29b-41d4-a716-446655440007', 'Weeroverzicht', 'images/projects', 'weather-dashboard.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d493', '550e8400-e29b-41d4-a716-446655440007', 'Voorspellingskaart', 'images/projects', 'weather-forecast.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d494', '550e8400-e29b-41d4-a716-446655440008', 'Social Analytics', 'images/projects', 'social-analytics.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d495', '550e8400-e29b-41d4-a716-446655440008', 'Rapportage', 'images/projects', 'social-reports.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d496', '550e8400-e29b-41d4-a716-446655440009', 'Cursusoverzicht', 'images/projects', 'elearning-courses.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d497', '550e8400-e29b-41d4-a716-446655440009', 'Quiz Module', 'images/projects', 'elearning-quiz.jpg', 2, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d498', '550e8400-e29b-41d4-a716-446655440010', 'Home Dashboard', 'images/projects', 'smarthome-dashboard.jpg', 1, 1, '2025-08-30 10:14:24'),
('f47ac10b-58cc-4372-a567-0e02b2c3d499', '550e8400-e29b-41d4-a716-446655440010', 'Energiemonitor', 'images/projects', 'smarthome-energy.jpg', 2, 1, '2025-08-30 10:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_projects`
--

CREATE TABLE `tb_projects` (
  `uuid` varchar(45) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_projects`
--

INSERT INTO `tb_projects` (`uuid`, `name`, `description`, `url`, `status`, `timestamp`) VALUES
('550e8400-e29b-41d4-a716-446655440001', 'E-commerce Website', 'Een volledige e-commerce oplossing ontwikkeld met React, Node.js en MySQL. Bevat een productcatalogus, winkelwagen, betalingsintegratie en beheerpaneel.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440002', 'Portfolio App', 'Mobile applicatie ontwikkeld met React Native voor het tonen van professionele portfolio\'s. Bevat offline mogelijkheden en een CMS.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440003', 'CRM Systeem', 'Customer Relationship Management systeem voor een middelgroot bedrijf met klantprofielen, sales pipeline en rapportagemodule.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440004', 'Restaurant Booking Platform', 'Reservatiesysteem voor restaurants met real-time beschikbaarheid, betalingsverwerking en e-mailbevestigingen.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440005', 'Fitness App', 'Personal trainer app met trainingsschema\'s, voortgangsmonitoring en voedingsadvies op maat.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440006', 'Project Management Tool', 'Collaboratief projectmanagement platform met taakverdeling, tijdsregistratie en teamcommunicatie.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440007', 'Weather Dashboard', 'Real-time weerdashboard met voorspellingen, historische data en persoonlijke locatievoorkeuren.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440008', 'Social Media Analytics', 'Analyseplatform voor social media prestaties met automatische rapportage en adviesmodule.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440009', 'E-learning Platform', 'Online leeromgeving met cursusbeheer, voortgangsmonitoring en interactieve quizzen.', '', 1, '2025-08-30 10:14:24'),
('550e8400-e29b-41d4-a716-446655440010', 'Smart Home Controller', 'Dashboard voor het beheren van slimme huisapparaten met automatisering en energie monitoring.', '', 1, '2025-08-30 10:14:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_coretasks`
--
ALTER TABLE `tb_coretasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_projectimages`
--
ALTER TABLE `tb_projectimages`
  ADD PRIMARY KEY (`uuid`);

--
-- Indexes for table `tb_projects`
--
ALTER TABLE `tb_projects`
  ADD PRIMARY KEY (`uuid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_coretasks`
--
ALTER TABLE `tb_coretasks`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
