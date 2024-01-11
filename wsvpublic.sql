-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2023 at 10:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsvpublic`
--

-- --------------------------------------------------------

--
-- Table structure for table `abteilungen`
--

CREATE TABLE `abteilungen` (
  `abteilungID` int(11) NOT NULL,
  `abteilungName` varchar(20) NOT NULL,
  `obmannID` int(11) NOT NULL,
  `iconName` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abteilungen`
--

INSERT INTO `abteilungen` (`abteilungID`, `abteilungName`, `obmannID`, `iconName`) VALUES
(2, 'Kanurennsport', 1, 'fa fa-trophy'),
(3, 'Fitnesssport', 0, 'fa fa-heartbeat'),
(4, 'Motorboot', 0, 'fa fa-ship'),
(5, 'Kinderturnen', 0, 'fa fa-grav'),
(6, 'Kindeswohl', 0, 'fa fa-child'),
(7, 'Kultur', 0, 'fa fa-users'),
(8, 'Kanupolo', 0, 'fa fa-futbol-o');

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `artikelID` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `summary` tinytext DEFAULT NULL,
  `text` longtext DEFAULT NULL,
  `artikelType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`artikelID`, `date`, `title`, `summary`, `text`, `artikelType`) VALUES
(1, '2023-04-04', 'Trainingslager in Frankreich', 'Die Rennsportgruppe des WSV Lampertheims macht ein Trainingslager in Südfrankreich.', 'Die Rennsportgruppe des WSV Lampertheims macht ein Trainingslager in Südfrankreich. Dort haben sie sehr viel Spaß!', NULL),
(12, '2022-03-03', 'Jugendfeier', 'Die Jugend macht eine Feier.', 'Die Jugend feiert ihr ein jähriges Bestehen mit einer großen Feier.', 1),
(13, '2023-04-10', 'Trainingslagerbericht', 'Das Trainingslager in Süd-Frankreich macht den Kanurennpoetlern viel Spaß!', 'Der Text muss nicht weiter ausgeführt werden, er ist nur als Demo hier...', NULL),
(14, '2024-07-04', 'Sommerfest 2024', 'Hier feiert der WSV ein großes Sommerfest', 'Jeder ist zu diesem Spektakel eingeladen, es ist ein Fest für jeden! Für Essen, Getränke und Unterhaltung ist natürlich gesorgt. Es wird wieder ein Canadierrennen geben', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsorID` int(11) NOT NULL,
  `sponsorName` varchar(255) DEFAULT NULL,
  `sponsorUrl` varchar(255) DEFAULT NULL,
  `sponsorLogoFile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsorID`, `sponsorName`, `sponsorUrl`, `sponsorLogoFile`) VALUES
(19, 'Stadt Lampertheim', 'https://www.lampertheim.de/', 'stadtLampertheim.png\r'),
(20, 'Eis Oberfeld', 'https://eis-oberfeld.de/', 'eisOberfeld.png\r'),
(21, 'Volksbank Darmstadt-Suedhessen eG', 'https://www.volksbanking.de/', 'volksbank.png\r'),
(22, 'BASF', 'https://www.basf.com/za/en/who-we-are/sites-and-companies/germany.html', 'basf.png\r'),
(23, 'Weber Rohrleitungsbau', 'https://www.weber-unternehmensgruppe.com/geschaeftsfelder/rohrleitungsbau/', 'weberRohrleitungsbau.png\r'),
(24, 'RWE - Vorweg gehen', 'https://www.rwe.com/', 'rwe.png\r'),
(25, 'Wetzel Tuer- & Tortechnik', 'https://www.kartogiraffe.de/deutschland/hessen/regierungsbezirk+darmstadt/kreis+bergstra%C3%9Fe/lampertheim/wetzel+gmbh+-+t%C3%BCr-+und+tortechnik/', 'wetzel.jpg'),
(26, 'Energie Ried', 'https://www.energieried.de/startseite/', 'energieried.svg\r'),
(27, 'Foerderverein des Wassersportverein Lampertheim 1929 e.V.', 'https://www.wsv-lampertheim.de/index.php/foerderverein', 'foerdervereinWSVLA.jpg\r'),
(28, 'Merck', 'https://www.merckgroup.com/de', 'merck.jpg\r'),
(29, 'KCS', 'http://www.kcs-beratung.de/', 'kcs.png\r'),
(30, 'Lampertheimer Zeitung', 'https://www.lampertheimer-zeitung.de/', 'lampertheimerZeitung.svg\r'),
(31, 'Gerling Werbetechnik', 'https://www.gerling-werbetechnik.de/', 'gerling.jpg\r'),
(32, 'Allianz', 'https://vertretung.allianz.de/harald.haumueller/', 'allianz.png\r'),
(33, 'Platten-Noll', 'http://www.platten-noll.de/fliesen.html', 'plattenNoll.png\r'),
(34, 'Modert-Recycling GmbH', 'https://www.medert-gmbh.de/', 'medert.jpg\r'),
(35, 'Feldhofen\'sche Apotheke', 'https://www.apotheke-lampertheim.de/', 'feldhofenApotheke.jpg\r'),
(36, 'Andreas Apotheke', 'https://www.andreas-apotheke-lampertheim.de/', 'andreasApotheke.jpg\r'),
(37, 'Hubertus Apotheke', 'https://www.hubertus-apotheke-la.de/', 'hubertusApotheke.jpg\r'),
(38, 'Amts Apotheke', 'https://www.amts-apotheke-lampertheim.de/', 'amtsApotheke.jpg\r'),
(39, 'Dr. Seelinger & Kollegen', 'https://www.praxis-seelinger.com/', 'seelinger.png\r'),
(40, 'Neckermann & Boxheimer Getränkehandel', 'https://www.getraenke-boxheimer.de/', 'boxheimer.png'),
(41, 'Bauernladen Strauß', 'https://strauss-gemuesebau.de/direktvermarktung/hofladen/', 'strauss.png'),
(42, 'Alle Mitglieder des \"Club der 100\"', NULL, NULL),
(43, 'Gartenklause Rainer Hilsheimer', NULL, NULL),
(44, 'Steuerberaterin Frau Inge Weyrich-Konopka', NULL, NULL),
(45, 'Klaus Schlappner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `termine`
--

CREATE TABLE `termine` (
  `terminID` int(11) NOT NULL,
  `terminTitle` varchar(255) DEFAULT NULL,
  `terminDate` date DEFAULT NULL,
  `terminTime` time DEFAULT NULL,
  `terminType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termine`
--

INSERT INTO `termine` (`terminID`, `terminTitle`, `terminDate`, `terminTime`, `terminType`) VALUES
(6, 'Ehrenabend', '2023-11-04', '19:00:00', NULL),
(7, 'Weihnachtsfest am WSV', '2023-12-16', '18:30:00', NULL),
(8, 'Jugendabend', '2024-01-13', '16:00:00', 1),
(9, 'Vereinsjugend im Kletterwald', '2023-06-24', '13:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abteilungen`
--
ALTER TABLE `abteilungen`
  ADD PRIMARY KEY (`abteilungID`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelID`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsorID`);

--
-- Indexes for table `termine`
--
ALTER TABLE `termine`
  ADD PRIMARY KEY (`terminID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abteilungen`
--
ALTER TABLE `abteilungen`
  MODIFY `abteilungID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `termine`
--
ALTER TABLE `termine`
  MODIFY `terminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
