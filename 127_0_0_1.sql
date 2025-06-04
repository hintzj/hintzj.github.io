-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2025 at 12:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wsvprivate`
--
CREATE DATABASE IF NOT EXISTS `wsvprivate` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wsvprivate`;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `personID` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `superuser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`personID`, `username`, `password`, `superuser`) VALUES
(1, 'rvetter', '12345678', 0),
(8, 'ssand', '12345678', 0),
(13, 'jhintz', '12345678', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`personID`);
--
-- Database: `wsvpublic`
--
CREATE DATABASE IF NOT EXISTS `wsvpublic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wsvpublic`;

-- --------------------------------------------------------

--
-- Table structure for table `abteilungen`
--

CREATE TABLE `abteilungen` (
  `abteilungID` int(11) NOT NULL,
  `abteilungName` varchar(64) NOT NULL,
  `obmannID` int(11) NOT NULL,
  `iconName` varchar(32) NOT NULL,
  `abteilungsPage` varchar(64) DEFAULT NULL,
  `startPage` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `abteilungen`
--

INSERT INTO `abteilungen` (`abteilungID`, `abteilungName`, `obmannID`, `iconName`, `abteilungsPage`, `startPage`) VALUES
(2, 'Kanurennsport', 6, 'fa fa-trophy', 'kanurennsport.php', 1),
(3, 'Fitnesssport', 0, 'fa fa-heartbeat', 'fitnesssport.php', 1),
(4, 'Motorboot', 15, 'fa fa-ship', 'motorboot.php', 1),
(5, 'Kinderturnen', 30, 'fa fa-grav', 'kinderturnen.php', 1),
(6, 'Kindeswohl', 0, 'fa fa-child', 'kindeswohl.php', 0),
(7, 'Kultur', 0, 'fa fa-users', 'kultur.php', 1),
(8, 'Kanupolo', 1, 'fa fa-futbol-o', 'kanupolo.php', 1),
(9, 'Kanurennsport-Anfänger', 29, '', NULL, 0),
(10, 'Frauengymnastik', 0, '', NULL, 0),
(11, 'Bodyforming', 24, '', NULL, 0),
(12, 'Männergymnastik', 0, '', NULL, 0),
(13, 'Carnevals-Gremium Blau-Weiß', 25, '', NULL, 0),
(14, 'Nutzung Campingplatz', 31, '', NULL, 0),
(15, 'Mobile Kanueinheit', 1, '', 'mke.php', 0);

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
(1, '2025-03-30', 'Saisoneröffnung 2025', 'Der WSV Lampertheim startete mit Ehrengästen, sportlichem Ausblick, Bootstaufen und Kinderprogramm in die Saison. Höhepunkte sind die Regatten und Meisterschaften im Sommer.', 'Der WSV Lampertheim veranstaltete am vergangenen Sonntag seine traditionelle Saisoneröffnung auf dem Vereinsgelände am Altrhein.\n\nDer 1. Vorsitzende Rainer Vetter begrüßte neben den zahlreich erschienenen Sportlern, Angehörigen und Vereinsmitgliedern auch den 1. Stadtrat Marius Schmidt, die Fraktionsvorsitzenden von CDU (Alexander Scholl), SPD (Jens Klingler) und FDP (Gernot Diehlmann), den Vorsitzenden der Sportkommission Joachim Stumpf und seinen Vorgänger Hans Schlatter, vom Hessischen Kanuverband den Ressortleiter Kanurennsport Peter Horstfeld. Claudia Schlappner und Herrn Engert vom Rotary Club sowie Frau Schwarz vom Sparkassen und Giroverband Hessen-Thüringen.\n\nNach einer kurzen Einleitung und Ausblick auf die anstehenden Aufgaben wie die Lampertheimer Regatta und den geplanten barrierefreien Umbau der Toiletten übergab er das Wort an Marius Schmidt. Dieser lobte die vorbildliche Arbeit des Vereins seit vielen Jahren, was sich an den errungenen Erfolgen ablesen lässt und sich auch bei der Sportlerehrung der Stadt Lampertheim 2 Tage zuvor niederschlug. Besonders lobte er die seit 10 Jahren bestehende Ganztagesbetreuung der Kanuakademie.\n\nSportwart Dieter Brechenser berichtete von den Trainingslagern zur Saisonvorbereitung, von denen das erste in Portugal bereits stattgefunden hat. In den Osterferien geht es für 2 Wochen nach Saarlouis. Saisonhöhepunkte sind die Lampertheimer Regatta mit Hessenmeisterschaft Anfang Mai, die Süddeutsche Meisterschaft in Sandhofen im Juli und die Deutsche Meisterschaft in Köln im August.\n\nIm Anschluss erfolgte die Taufe von 6 neuen Kajaks. 4 Schülerboote taufte Frau Schwarz von der Sparkasse Hessen-Thüringen als Sponsor, 1 Masterboot Marion Roth-Hintz, die sich finanziell am Kauf beteiligt hatte. Letzter Taufpate war Kyara Marzahn, die ihr Privatboot auf den Namen Dori taufte.\n\nZum Ausklang gab es noch einen durch den Kulturausschuss vorbereiteten Imbiss und Getränke, für die kleinen Gäste standen eine Hüpfburg und eine Slackline bereit.', 1),
(2, '2025-03-22', 'Arbeitseinsatz am WSV', 'Beim Helfertag säuberte der WSV das Vereinsgelände und beteiligte sich an der Aktion „Saubere Gemarkung“. Im Anschluss gab es für die vielen Helfer einen Imbiss vom Kulturausschuss.', 'Wie immer im Frühjahr führte der WSV seinen Helfertag durch, verbunden mit der Teilnahme an der Aktion Saubere Gemarkung.\r\n\r\nDas gesamte Außengelände wurde auf Vordermann gebracht, das Altrheinufer bis zum Bau von Müll gesäubert und auch die Boxen und der Kraftraum aufgeräumt. So kann der Saisonauftakt kommen!\r\n\r\nIm Anschluß konnten sich die Helfer mit einem kleinen Imbiß stärken, um den sich der Kulturausschuß gekümmert hatte.\r\n\r\nVielen Dank an die zahlreichen Helfer!', 1),
(3, '2024-11-16', 'Ehrenabend 2024', 'Beim Ehrenabend ehrte der WSV langjährige Mitglieder und erfolgreiche Sportler. Besonders ausgezeichnet wurden Femke Rupf sowie Trainer und Helfer. Der Abend endete mit einem Imbiss und geselligem Beisammensein.', 'Am vergangenen Samstag führte der WSV Lampertheim seinen Ehrenabend in der Wassersporthalle durch.\r\n\r\nNach einer kurzen Begrüßung bat der 1. Vorsitzende Rainer Vetter die zahlreich erschienenen Jubilare auf die Bühne. Für 10, 25 und 40 Jahre erhielten die Geehrten eine Urkunde, die Ehrennadel sowie ein kleines Präsent.\r\n\r\nFür 50 Jahre wurde neben Ehrennadel und Präsent mit der Urkunde die Ehrenmitgliedschaft verliehen.\r\n\r\nEin besonderes Ereignis waren gleich 4 Mitglieder, die auf die stolze Dauer von 60 Jahren Vereinszugehörigkeit zurückblieben können, sowie weitere 4 Mitglieder, die dem WSV bereits seit 70 Jahren die Treue halten. Sie erhielten neben Urkunde und Präsent noch eine besondere Ehrengabe in Form einer gravierten Glastrophäe.\r\n\r\nDanach übernahm Kevin Marzahn die Ehrungen der erfolgreichen Sportler für das Jahr 2024. Geehrt wurden 25 Sportler, die entweder Hessenmeister oder Dritter bei der Süddeutschen Meisterschaft wurden.\r\n\r\nHerausragend dabei war Femke Rupf, die 2 Deutsche Meistertitel nach Lampertheim holte und Deutschland bei den Olympic Hope Games vertreten durfte, wo sie 2 Gold- und eine Silbermedaille errang.\r\n\r\nDiese Erfolge sind nicht möglich ohne die Hilfe der Eltern, aber es braucht auch den Einsatz vieler Trainer, die deshalb  durch den Vorsitzenden Rainer Vetter und Jugendvorstand Matteo Lunkenbein stellvertretend für die Sportler noch entsprechend geehrt wurden.\r\n\r\nKevin Marzahn wurde für seine Verdienste um den Verein in den zurückliegenden Jahren mit dem Vereinsehrenbrief ausgezeichnet, den er sichtlich gerührt unter dem Applaus der Anwesenden entgegennahm.\r\n\r\nAusklingen ließ man den Abend mit einem vom Kulturausschuss vorbereiteten Imbiß und geselligem Beisammensein von Jung und Alt.', 1),
(4, '2024-10-26', 'Arbeitseinsatz Oktober 2024', 'Beim Helfertag am 26. Oktober brachten viele engagierte Mitglieder das Vereinsgelände, die Halle, Boxen und Außenanlagen des WSV Lampertheim auf Vordermann. Zum Dank gab es eine kleine Stärkung für alle Helfer.', 'Wie jedes Jahr im Herbst fand am 26. Oktober Wassersportverein ein Helfertag statt.Dabei wurden durch zahlreiche fleißige Mitglieder aus verschiedenen Abteilungen die Boxen, Kraftraum und Halle sauber gemacht un d aufgeräumt.\r\n\r\nAuch die Außenanlage sowohl am Altrhein als auch am Damm wurden auf Vordermann gebracht, ebenso die Bpulebahn und die Bootsanlegestege.\r\n\r\nAnchließend gab es eine kleine Stärkung für die Helfer.\r\n\r\nDer Vorstand bedankt sich ganz herzlich für die Hilfe.', 1),
(5, '2025-03-09', 'Ehrungen beim Hessischen Kanutag', 'Beim Hessischen Kanutag am 9. März wurden Briska Horstfeld und Erika Gabler für ihr jahrzehntelanges ehrenamtliches Engagement im WSV Lampertheim mit Ehrennadeln und Urkunden des Hessischen Kanuverbands ausgezeichnet.', 'Am Sonntag, den 9. März, fand in Wiesbaden der Hessische Kanutag statt. Dabei waren als Delegierte Sportwart Dieter Brechenser für die Kanuakademie, Rainer Vetter als Vorsitzender des Wassersportvereins und  Referent für Kanupolo sowie Peter Horstfeld als Ressortleiter für Kanurennsport.\r\n\r\nIm Rahmen des Verbandstages wurden durch Vizepräsident Thomas Sommer 2 Ehrungen für Vorstandsmitglieder des Wassersportvereins vorgenommen.\r\n\r\nBriska Horstfeld wurde für mehr als 40jährige ehrenamtliche Tätigkeit im Verein und Verband mit der Ehrennadel in Silber und einer Urkunde ausgezeichnet.\r\n\r\nSie war von 1978 bis 1989 und von 1997 bis 2003 Schriftführerin, seit 2003 ist sie Kassenwartin des WSV, außerdem verwaltet sie die Finanzen für das Kajakteam Hessen, den WSV 2002 sowie die Regattagemeinschaft Lampertheim. Im Hessischen Kanuverband wird sie regelmäßig als Kassenprüferin eingesetzt. 2022 wurde sie zum Ehrenvorstandsmitglied des WSV Lampertheim ernannt.\r\n\r\n Erika Gabler erhielt für ihre jahrzentelange ehrenamtliche Tätigkeit die Ehrennadel in Gold sowie eine Ehrenurkunde.\r\n\r\nNachdem sie bereits in jungen Jahren seit 1989 als Schriftführerin tätig war, übernahm sie 1997 das Amt der 1. Vorsitzenden und führte den Verein 23 Jahre, seit 2020 übt sie das Amt der 2. Vorsitzenden aus. In ihre Amtszeit fielen mehrere große Bauprojekte, die sie koordinieren und Fördermittel beantragen musste, ebenso die Gründung der Kanuakademie 2014. Auch bei der Lampertheimer Regatta ist sie seit vielen Jahren nicht wegzudenken. „Ihr“ WSV ernannte sie 2020 zur Ehrenvorsitzenden.', 0),
(6, '2024-06-01', 'Hochwasser 2024', 'Ein Hochwasser überflutete Anfang Juni das Gelände des WSV Lampertheim. Dank über 100 Helfern, Sandsäcken und großer Solidarität konnten Schäden begrenzt werden. Nach Rückgang des Pegels begannen umfangreiche Aufräumarbeiten auf dem Gelände.', 'Der hohe Pegel des Rheins sorgte über den Altrheinarm am Biedensand auch für eine Überflutung des Vereinsgeländes und des Gebäudes beim WSV Lampertheim.\r\n\r\nBereits am Samstag, den 1. Juni, wurden durch Helfer die ersten tiefer gelegenen Boxen ausgeräumt und Möbel, Elektrogeräte und Maschinen in Sicherheit gebracht.\r\n\r\nDie Feuerwehr half zum wiederholten Male mit der Lieferung von 100 Sandsäcken aus.\r\n\r\nAm Sonntag mussten dann, nachdem die Prognosen des Wasserstands immer weiter nach oben gingen, auch die unteren Lagen in den Bootsboxen ausgeräumt werden, die Vereinsfahrzeuge wurden hinter dem Damm in Sicherheit gebracht.\r\n\r\n20 Helfer am Samstag und nochmal 40 am Sonntag konnten so einen allzu großen Schaden verhindern.\r\n\r\nLeider wurden, hauptsächlich durch Druckwasser, der Kraftraum und eine als Küche ausgebaute Box trotz Absperrung und Pumpe durch das Hochwasser in Mitleidenschaft gezogen.\r\n\r\nDas Sportstudio clever fit reagierte spontan und lud die Wassesportler zum Training in ihre Räumlichkeiten ein. Eine tolle Solidaritätsaktion!\r\n\r\nEbenso boten Vereine, die bereits zum Paddeln beim WSV waren, ihre Hilfe beim Aufräumen an.\r\n\r\nNachdem der Wasserstand am Mittwoch unter die für den Verein kritische Marke gesunken war, wurden die Boxen wieder geöffnet und tiefer gelegene Räume ausgepumpt.\r\n\r\nZurück ließ das Hochwasser hauptsächlich Treibgut, vom Schlamm blieb der WSV dieses Mal glücklicherweise verschont.\r\n\r\nAm 8. Juni, genau eine Woch nach den ersten Vorbereitungen auf das Hochwasser, wurden dann durch mehr als 100 Helfer die inzwischen größtenteils trockenen Boxen gereinigt und wieder eingeräumt.\r\n\r\nAuch das Gelände und die Zufahrt mussten gesäubert und von viel Müll befreit werden. Alleine 2 Anhänger voll mit Treibgut wurden bei der ZAKB entsorgt, der Rest erfolgt über die normale Müllabfuhr und eine Sperrmüllabholung.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contactperson`
--

CREATE TABLE `contactperson` (
  `site` varchar(64) NOT NULL,
  `personID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactperson`
--

INSERT INTO `contactperson` (`site`, `personID`) VALUES
('archiv', 1),
('kontakt', 1),
('news', 1),
('termine', 1),
('WSV_Webpage', 1),
('kanurennsport', 6),
('adminArticle', 13),
('adminDashboard', 13),
('adminDate', 13),
('adminEditArticle', 13),
('adminEditDate', 13),
('adminMitgliederinfo', 13),
('adminUser', 13),
('login', 13),
('newArticle', 13),
('jugendnews', 14),
('jugendvorstand', 14),
('foerderverein', 28),
('kinderturnen', 30);

-- --------------------------------------------------------

--
-- Table structure for table `personen`
--

CREATE TABLE `personen` (
  `personID` int(11) NOT NULL,
  `Vorname` varchar(32) NOT NULL,
  `Nachname` varchar(32) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email` varchar(64) NOT NULL,
  `bildURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personen`
--

INSERT INTO `personen` (`personID`, `Vorname`, `Nachname`, `gender`, `email`, `bildURL`) VALUES
(1, 'Rainer', 'Vetter', 'm', 'webmaster@wsv-lampertheim.de', 'Rainer.jpg'),
(2, 'Erika', 'Gabler', 'f', 'vorstand@wsv-lampertheim.de', 'Erika.jpg'),
(3, 'Briska', 'Horstfeld', 'f', 'kassierer@wsv-lampertheim.de', 'Briska.jpg'),
(4, 'Erika', 'Fuchs', 'f', 'schriftfuehrerin@wsv-lampertheim.de', 'Erika_Fuchs.jpg'),
(5, 'Justine', 'Sand-Soballa', 'f', 'mitgliederverwaltung@wsv-lampertheim.de', 'Justine.jpg'),
(6, 'Dieter', 'Brechenser', 'm', 'kanurennsport@wsv-lampertheim.de', 'Dieter.jpg'),
(7, 'Andreas', 'Leppich', 'm', 'beisitzer1@wsv-lampertheim.de', 'Andreas.jpg'),
(8, 'Stefan', 'Sand', 'm', 'mitgliederinfo@wsv-lampertheim.de', 'Stefan.jpg'),
(9, 'Sven', 'Stollhöfer', 'm', 'beisitzer2@wsv-lampertheim.de', 'Sven.jpg'),
(10, 'Michael', 'Vetter', 'm', 'beisitzer3@wsv-lampertheim.de', 'Michael.jpg'),
(11, 'Erik', 'Messirek', 'm', 'beisitzer4@wsv-lampertheim.de', 'Erik.jpg'),
(12, 'Lukas', 'Heilmann', 'm', 'beisitzer5@wsv-lampertheim.de', 'Lukas.jpg'),
(13, 'Jonathan', 'Hintz', 'm', 'beisitzer6@wsv-lampertheim.de', 'Jonathan.jpg'),
(14, 'Matteo', 'Lunkenbein', 'm', 'matteo.lunkenbein@icloud.com', 'Matteo.jpg'),
(15, 'Joachim', 'Stapler', 'm', 'motorboot@wsv-lampertheim.de', ''),
(16, 'Nico', 'Kruczek', 'm', 'wirtschaftsausschuss@wsv-lampertheim.de', ''),
(17, 'Peter', 'Weber', 'm', '', ''),
(18, 'Peter', 'Horstfeld', 'm', '', 'Peter_Horstfeld.jpg'),
(19, 'Volker', 'Altenbach', 'm', '', ''),
(20, 'Claudia', 'Forg', 'f', '', ''),
(21, 'Carmen', 'Geppert', 'f', '', ''),
(22, 'Werner', 'Herweh', 'm', '', ''),
(23, 'Hans', 'Schlatter', 'm', '', 'Hans_Schlatter.jpg'),
(24, 'Angela', 'Samson', 'f', '', ''),
(25, 'Christa', 'Müller', 'f', 'carnevals-gremium-blau-weiss@wsv-lampertheim.de', ''),
(26, 'Stefanie', 'Geiger', 'f', 'poloabteilung@wsv-lampertheim.de', ''),
(27, 'Peter', 'Pfeifer', 'm', '', ''),
(28, 'Mechthild', 'Kiebel', 'f', 'Mechthild.Kiebel@kcs-beratung.de', ''),
(29, 'Patricia', 'Altamore', 'f', 'kinderturnen@wsv-lampertheim.de', ''),
(30, 'Vanessa', 'Marzahn', 'f', '', ''),
(31, 'Bernd', 'Volk', 'm', '', '');

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
  `terminType` int(11) DEFAULT NULL,
  `artikelID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `termine`
--

INSERT INTO `termine` (`terminID`, `terminTitle`, `terminDate`, `terminTime`, `terminType`, `artikelID`) VALUES
(1, 'Mitgliederversammlung', '2025-03-07', '19:30:00', 0, NULL),
(2, 'Arbeitseinsatz', '2025-03-22', '09:30:00', 1, NULL),
(3, 'Saisoneröffnung', '2025-03-30', '10:30:00', 1, NULL),
(4, 'Lampertheimer Regatta', '2025-05-03', NULL, 1, NULL),
(5, 'Vatertag am WSV', '2025-05-29', '10:30:00', 0, NULL),
(6, 'Ehrenabend', '2025-11-08', '19:00:00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vorstandsmitglieder`
--

CREATE TABLE `vorstandsmitglieder` (
  `personID` int(11) NOT NULL,
  `positionsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vorstandsmitglieder`
--

INSERT INTO `vorstandsmitglieder` (`personID`, `positionsID`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 7),
(9, 7),
(10, 7),
(11, 7),
(13, 7);

-- --------------------------------------------------------

--
-- Table structure for table `vorstandspositionen`
--

CREATE TABLE `vorstandspositionen` (
  `vorstandspositionenID` int(11) NOT NULL,
  `positionsID` int(11) NOT NULL,
  `positionName` varchar(64) NOT NULL,
  `gender` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vorstandspositionen`
--

INSERT INTO `vorstandspositionen` (`vorstandspositionenID`, `positionsID`, `positionName`, `gender`) VALUES
(1, 1, '1. Vorsitzende/r', 'd'),
(2, 2, '2. Vorsitzede/r', 'd'),
(3, 3, 'Kassierer/in', 'd'),
(4, 4, 'Schriftfürer/in', 'd'),
(5, 5, 'Mitgliederverwaltung', 'd'),
(6, 6, 'Sportwart/in', 'd'),
(7, 7, 'Beisitzer/in', 'd'),
(8, 1, '1. Vorsitzende', 'f'),
(9, 2, '2. Vorsitzede', 'f'),
(10, 3, 'Kassiererin', 'f'),
(11, 4, 'Schriftfürerin', 'f'),
(12, 5, 'Mitgliederverwaltung', 'f'),
(13, 6, 'Sportwartin', 'f'),
(14, 7, 'Beisitzerin', 'f'),
(15, 1, '1. Vorsitzender', 'm'),
(16, 2, '2. Vorsitzeder', 'm'),
(17, 3, 'Kassierer', 'm'),
(18, 4, 'Schriftfürer', 'm'),
(19, 5, 'Mitgliederverwaltung', 'm'),
(20, 6, 'Sportwart', 'm'),
(21, 7, 'Beisitzer', 'm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abteilungen`
--
ALTER TABLE `abteilungen`
  ADD PRIMARY KEY (`abteilungID`),
  ADD KEY `obmannID` (`obmannID`);

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`artikelID`);

--
-- Indexes for table `contactperson`
--
ALTER TABLE `contactperson`
  ADD PRIMARY KEY (`site`),
  ADD KEY `personID` (`personID`);

--
-- Indexes for table `personen`
--
ALTER TABLE `personen`
  ADD PRIMARY KEY (`personID`);

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
-- Indexes for table `vorstandsmitglieder`
--
ALTER TABLE `vorstandsmitglieder`
  ADD PRIMARY KEY (`personID`),
  ADD KEY `positionsID` (`positionsID`);

--
-- Indexes for table `vorstandspositionen`
--
ALTER TABLE `vorstandspositionen`
  ADD PRIMARY KEY (`vorstandspositionenID`),
  ADD KEY `positionsID` (`positionsID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abteilungen`
--
ALTER TABLE `abteilungen`
  MODIFY `abteilungID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `artikelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personen`
--
ALTER TABLE `personen`
  MODIFY `personID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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

--
-- AUTO_INCREMENT for table `vorstandspositionen`
--
ALTER TABLE `vorstandspositionen`
  MODIFY `vorstandspositionenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
