-- phpMyAdmin SQL Dump
-- version 5.2.0-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 18 jan 2023 om 11:51
-- Serverversie: 10.5.18-MariaDB-cll-lve-log
-- PHP-versie: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deb141238_webworld`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Cinema`
--

CREATE TABLE `Cinema` (
  `cinema_id` int(11) NOT NULL,
  `cinema_name` varchar(255) NOT NULL,
  `cinema_desc` longtext DEFAULT NULL,
  `cinema_reachability` longtext NOT NULL,
  `cinema_img` varchar(256) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Cinema`
--

INSERT INTO `Cinema` (`cinema_id`, `cinema_name`, `cinema_desc`, `cinema_reachability`, `cinema_img`, `user_id`, `is_active`) VALUES
(1, 'Kinderpolis Utrecht', '<p>Informatie over Kinepolis</p>\r\n<p class=\"text-start fw-normal\">Kinepolis Jaarbeurs Utrecht is gevestigd aan het Jaarbeursplein in Utrecht en heeft 14 moderne zalen met 2.988 comfortabele zitplaatsen. Het filmaanbod is heel breed en ons personeel staat altijd klaar om je te helpen bij het uitkiezen van de geschikte film voor jouw filmuitje. Maak je filmuitje compleet met een hapje en een drankje bij een van de vele restaurants die rondom de bioscoop gevestigd zijn. Combineer je filmuitje met een etentje bij een van onderstaande CineMenu-partners en profiteer van korting op je diner en filmkaartje. De bioscoop is met de fiets, het openbaar vervoer of met de auto goed bereikbaar. Betaald parkeren kan rondom de bioscoop en de bussen stoppen op loopafstand van de bioscoop.</p>\r\n<p><strong>Belevingen</strong></p>\r\n<p class=\"text-start fw-normal\">Kinepolis Jaarbeurs Utrecht is op gebied van beeld en geluid uitgerust met de modernste technieken voor de beste filmbeleving. Daarnaast is de bioscoop ook uitgerust met een Laser ULTRA zaal die is voorzien van een 4K-laserprojector en Dolby Atmos geluid voor de ultieme filmbeleving. Wil je nog een stapje verder gaan? Bezoek dan onze ScreenX voorstelling en laat je meesleuren in een 170 graden kijkervaring waardoor je het gevoel krijgt middenin de film te zitten. Of bezoek een MX4D voorstelling en laat je zintuigen maximaal prikkelen door de bewegende stoelen en speciale omgevingseffecten. Naast de reguliere stoelen zijn bijna alle zalen ook voorzien van Cosy Seats die extra ruimte en privacy bieden zodat je in je eigen bubbel van film kan genieten.</p>\r\n<p><strong>Events</strong></p>\r\n<p class=\"text-start fw-normal\">Kinepolis Jaarbeurs Utrecht organiseert op regelmatige basis leuke events voor jong en oud. Denk hierbij aan een Ladies Night voor met vriendinnen, een Bier &amp; Blockbusters avond voor vrienden, de CinePlus voor de iets oudere of het Kids Weekend voor de kleintjes.</p>\r\n<p><span style=\"text-decoration: underline;\">Beschikbare game tijden</span></p>', '{\"1\":{\"title\":\"Openingstijden\",\"message\":\"<p>Maandag | Gesloten</p><p>Dinsdag | Gesloten</p><p>Woensdag | Gesloten</p><p>Donderdag | Gesloten</p><p>Vrijdag | Gesloten</p><p>Zaterdag | Gesloten</p><p>Zondag | Gesloten</p>\"},\"2\":{\"title\":\"Adres\",\"message\":\"<p>Jaarbeursboulevard 300<br>3521 BC UTRECHT<br>UTRECHT</p>\"},\"3\":{\"title\":\"Bereikbaarheid\",\"message\":\"\"},\"4\":{\"title\":\"Auto\",\"message\":\"<p>Met de auto bereikt u Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding Jaarbeurs te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid. Parkeren op het Jaarbeursterrein is per 1 mei gratis voor alle automobilisten die een kaartje voor de film hebben gekocht.</p>\"},\"5\":{\"title\":\"Openbaar vervoer\",\"message\":\"<p>Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden &lsquo;Jaarbeursplein&rsquo; en loop richting de Jaarbeurshallen. Binnen enkele minuten vindt u de bioscoop aan uw linkerhand.</p>\"},\"6\":{\"title\":\"Fiets\",\"message\":\"<p>U kunt uw fiets <strong>vlak </strong>naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>\"},\"7\":{\"title\":\"Rolstoeltoegankelijkheid\",\"message\":\"<p>Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.</p>\"}}', '055c68e99626a2b3a0b4d7605c1ddbda.jpg', 4, 1),
(16, 'Pathe leidsche rijn', '<p>Informatie over Pathe</p>\r\n<p class=\"text-start fw-normal\">Pathe leidsche rijn is gevestigd aan de snelweg in leidsche rijn en heeft 14 moderne zalen met 2.988 comfortabele zitplaatsen. Het filmaanbod is heel breed en ons personeel staat altijd klaar om je te helpen bij het uitkiezen van de geschikte film voor jouw filmuitje. Maak je filmuitje compleet met een hapje en een drankje bij een van de vele restaurants die rondom de bioscoop gevestigd zijn. Combineer je filmuitje met een etentje bij een van onderstaande CineMenu-partners en profiteer van korting op je diner en filmkaartje. De bioscoop is met de fiets, het openbaar vervoer of met de auto goed bereikbaar. Betaald parkeren kan rondom de bioscoop en de bussen stoppen op loopafstand van de bioscoop.</p>\r\n<p><strong>Belevingen</strong></p>\r\n<p class=\"text-start fw-normal\">Kinepolis Jaarbeurs Utrecht is op gebied van beeld en geluid uitgerust met de modernste technieken voor de beste filmbeleving. Daarnaast is de bioscoop ook uitgerust met een Laser ULTRA zaal die is voorzien van een 4K-laserprojector en Dolby Atmos geluid voor de ultieme filmbeleving. Wil je nog een stapje verder gaan? Bezoek dan onze ScreenX voorstelling en laat je meesleuren in een 170 graden kijkervaring waardoor je het gevoel krijgt middenin de film te zitten. Of bezoek een MX4D voorstelling en laat je zintuigen maximaal prikkelen door de bewegende stoelen en speciale omgevingseffecten. Naast de reguliere stoelen zijn bijna alle zalen ook voorzien van Cosy Seats die extra ruimte en privacy bieden zodat je in je eigen bubbel van film kan genieten.</p>\r\n<p><strong>Events</strong></p>\r\n<p class=\"text-start fw-normal\">Kinepolis Jaarbeurs Utrecht organiseert op regelmatige basis leuke events voor jong en oud. Denk hierbij aan een Ladies Night voor met vriendinnen, een Bier &amp; Blockbusters avond voor vrienden, de CinePlus voor de iets oudere of het Kids Weekend voor de kleintjes.</p>\r\n<p><span style=\"text-decoration: underline;\">Beschikbare game tijden</span></p>', '{\"1\":{\"title\":\"Openingstijden\",\"message\":\"<p>Maandag | Gesloten</p><p>Dinsdag | Gesloten</p><p>Woensdag | Gesloten</p><p>Donderdag | Gesloten</p><p>Vrijdag | Gesloten</p><p>Zaterdag | Gesloten</p><p>Zondag | Gesloten</p>\"},\"2\":{\"title\":\"Adres\",\"message\":\"<p>Jaarbeursboulevard 300<br>3521 BC UTRECHT<br>UTRECHT</p>\"},\"3\":{\"title\":\"Bereikbaarheid\",\"message\":\"\"},\"4\":{\"title\":\"Auto\",\"message\":\"<p>Met de auto bereikt u Kinepolis Jaarbeurs door op de Ring Utrecht de blauwe ANWB-borden met de aanduiding Jaarbeurs te volgen. Rondom de Jaarbeurs is volop parkeergelegenheid. Parkeren op het Jaarbeursterrein is per 1 mei gratis voor alle automobilisten die een kaartje voor de film hebben gekocht.</p>\"},\"5\":{\"title\":\"Openbaar vervoer\",\"message\":\"<p>Kinepolis Jaarbeurs ligt naast de Jaarbeurshallen tegenover het Centraal Station van Utrecht en is dus uitstekend te bereiken met trein, bus en tram. Volg vanaf het Centraal Station de borden &lsquo;Jaarbeursplein&rsquo; en loop richting de Jaarbeurshallen. Binnen enkele minuten vindt u de bioscoop aan uw linkerhand.</p>\"},\"6\":{\"title\":\"Fiets\",\"message\":\"<p>U kunt uw fiets vlak naast de bioscoop kwijt in de gratis fietsenstalling, gelegen tussen restaurant Miyagi and Jones en parkeerplaats P3.</p>\"},\"7\":{\"title\":\"Rolstoeltoegankelijkheid\",\"message\":\"<p>Kinepolis Jaarbeurs heeft rolstoelplaatsen in elke zaal. Lift en mindervalidentoilet zijn ook aanwezig.</p>\"}}', '', 9, 1),
(18, '', '', '{\"1\":{\"title\":\"Openingstijden\",\"message\":\"\"},\"2\":{\"title\":\"Adres\",\"message\":\"\"},\"3\":{\"title\":\"Bereikbaarheid\",\"message\":\"\"},\"4\":{\"title\":\"Auto\",\"message\":\"\"},\"5\":{\"title\":\"Openbaar vervoer\",\"message\":\"\"},\"6\":{\"title\":\"Fiets\",\"message\":\"\"},\"7\":{\"title\":\"Rolstoeltoegankelijkheid\",\"message\":\"\"}}', 'c676db404bbbec29857e9f0c1c598a77.', 5, 0),
(20, 'Kinepolis Houten', '', '{\"1\":{\"title\":\"Openingstijden\",\"message\":\"\"},\"2\":{\"title\":\"Adres\",\"message\":\"\"},\"3\":{\"title\":\"Bereikbaarheid\",\"message\":\"\"},\"4\":{\"title\":\"Auto\",\"message\":\"\"},\"5\":{\"title\":\"Openbaar vervoer\",\"message\":\"\"},\"6\":{\"title\":\"Fiets\",\"message\":\"\"},\"7\":{\"title\":\"Rolstoeltoegankelijkheid\",\"message\":\"\"}}', '18c0392bfc1c8d4b97421f9e70b58fdc.png', 11, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Content`
--

CREATE TABLE `Content` (
  `content_id` int(11) NOT NULL,
  `content_title` varchar(50) NOT NULL,
  `content_main` longtext NOT NULL,
  `content_extra` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Content`
--

INSERT INTO `Content` (`content_id`, `content_title`, `content_main`, `content_extra`) VALUES
(1, 'Game nu in de bioscoop!', '&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(8, 196, 71);&quot;&gt;POWER TO THE PLAYERS!&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(8, 196, 71);&quot;&gt;Breng jouw spel naar het volgende niveau op het grote scherm!&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(8, 196, 71);&quot;&gt;Met een priv&amp;eacute;-theater dat speciaal voor jou en je crew is gereserveerd, heb je nog nooit eerder zo gespeeld.&lt;/span&gt;&lt;/strong&gt;&lt;br&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(8, 196, 71);&quot;&gt;Maak er een toernooi van!&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;div&gt;\r\n&lt;div&gt;\r\n&lt;p&gt;&lt;strong&gt;&lt;span style=&quot;color: rgb(8, 196, 71);&quot;&gt;Neem je eigen favoriete Xbox One-spellen mee of kies uit het aanbod van je theater.&lt;/span&gt;&lt;/strong&gt;&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;', '&lt;h5 class=&quot;fs-5 fw-bold&quot;&gt;Dingen die je moet weten&lt;/h5&gt;\r\n&lt;div class=&quot;col-md-12&quot;&gt;\r\n&lt;p class=&quot;text-start fw-normal&quot;&gt;Er is geen minimum voor groepen, maar het wordt aanbevolen dat de groepsgrootte tussen de 8 en 12 personen is. Dit zal de speeltijd voor elke speler maximaliseren. Voel je vrij om je eigen Xbox-spel mee te nemen om te spelen&amp;nbsp;&lt;strong&gt;(persoonlijke spelconsoles of spellen voor andere spelconsoles zijn niet toegestaan)&lt;/strong&gt;. Er is geen leeftijdsgrens voor videospelletjes op Xbox, maar de ouders moeten wel zelf kunnen beslissen over de spelbeoordeling van oudere gamers (d.w.z., titels met een M-rating).&lt;/p&gt;\r\n&lt;p&gt;&lt;img style=&quot;float: right;&quot; src=&quot;https://images.unsplash.com/photo-1517604931442-7e0c8ed2963c?ixlib=rb-4.0.3&amp;amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;amp;auto=format&amp;amp;fit=crop&amp;amp;w=680&amp;amp;q=80&quot; width=&quot;508&quot; height=&quot;451&quot;&gt;&lt;/p&gt;\r\n&lt;div id=&quot;collapseExample&quot; class=&quot;collapse show&quot;&gt;Feesten kunnen&amp;nbsp;&lt;strong&gt;maximaal 6 weken&lt;/strong&gt; voor de datum van uw voorkeur worden aangevraagd en zijn niet gegarandeerd tot de datum is bevestigd en geboekt door het theater. Voor elke partij kan een aanbetaling van &amp;euro;50 worden gevraagd en kan op elk moment voor de partij aan de kassa worden betaald. De boeking kan pas worden gereserveerd na ontvangst van de aanbetaling.Annuleringen met een opzegtermijn van minder dan 24 uur kunnen leiden tot een niet-terugvorderbare aanbetaling. Buiten eten en drinken is niet toegestaan in de theatercomplexen, maar als u een verjaardag viert, kunt u uw eigen&amp;nbsp;&lt;strong&gt;verjaardagstaart&lt;/strong&gt;&amp;nbsp;meenemen! Wij zorgen voor de borden, servetten en bestek. Feesten kunnen op elk moment buiten de openingsuren geboekt worden. Een voorbeeldboeking is&amp;nbsp;&lt;strong&gt;zaterdag 10.00 - 12.00 uur of eender welke nacht na 22.30 uur&lt;/strong&gt;, in afwachting van beschikbaarheid in bepaalde theaters en kan rechtstreeks bij het theater worden bevestigd. Cadeaubonnen, alle belangrijke creditcards en debetkaarten worden geaccepteerd als betaalmiddel. Het is mogelijk dat er op sommige locaties doordeweeks geen partyboekingen beschikbaar zijn.&lt;/div&gt;\r\n&lt;/div&gt;'),
(2, 'About us GPP', '&lt;div&gt;\r\n&lt;h5&gt;&lt;strong&gt;Wie zijn wij?&lt;/strong&gt;&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Game play party is een organisatie die samen met bioscopen werkt. Bioscopen kunnen zich bij ons aansluiten en hun beschikbare gameplay tijden aangeven. U kunt op een van de beschikbare tijden een reservering maken. Game play party is het leukst met een grote aantal. Je kan absoluut je feestje bij ons komen vieren. Bij het reserveren kunt u er ook voor kiezen om er een taart bij te bestellen. Neem vooral je eigen favoriete Xbox One-spellen mee. Mocht je geen eigen xbox One-spellen hebben heeft het theater bij jou in de buurt een eigen aanbod aan spellen.&lt;/p&gt;', '&lt;div&gt;\r\n&lt;h5&gt;&lt;strong&gt;Contact ons&lt;/strong&gt;&lt;/h5&gt;\r\n&lt;/div&gt;\r\n&lt;p&gt;Om met ons contact op te kunnen zoeken kunt u ons alleen bereiken via de mail. Via de knop hieronder kunt u ons een mailen met het volgende e-mailadres:&amp;nbsp;&lt;strong&gt;gameplayparty@gmail.com&lt;/strong&gt;&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Lounge`
--

CREATE TABLE `Lounge` (
  `lounge_id` int(11) NOT NULL,
  `lounge_nmr` int(11) NOT NULL,
  `lounge_chair_places` int(11) NOT NULL,
  `lounge_wheelchair_places` int(11) NOT NULL,
  `lounge_screensize` varchar(50) NOT NULL,
  `lounge_open_date` date NOT NULL,
  `lounge_timeslots` longtext DEFAULT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Lounge`
--

INSERT INTO `Lounge` (`lounge_id`, `lounge_nmr`, `lounge_chair_places`, `lounge_wheelchair_places`, `lounge_screensize`, `lounge_open_date`, `lounge_timeslots`, `cinema_id`) VALUES
(27, 8, 102, 5, '7m x 12m', '2023-01-25', '[{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1}]', 1),
(28, 43, 101, 12, '7m x 12m', '2023-01-30', '[{\"slot_start_time\":\"10:00\",\"slot_end_time\":\"11:30\",\"active\":0},{\"slot_start_time\":\"11:30\",\"slot_end_time\":\"13:00\",\"active\":0},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":0},{\"slot_start_time\":\"14:30\",\"slot_end_time\":\"16:00\",\"active\":0},{\"slot_start_time\":\"16:00\",\"slot_end_time\":\"17:30\",\"active\":0},{\"slot_start_time\":\"17:30\",\"slot_end_time\":\"19:00\",\"active\":0},{\"slot_start_time\":\"19:00\",\"slot_end_time\":\"20:30\",\"active\":0},{\"slot_start_time\":\"20:30\",\"slot_end_time\":\"22:00\",\"active\":0},{\"slot_start_time\":\"08:30\",\"slot_end_time\":\"10:00\",\"active\":1}]', 1),
(29, 55, 101, 12, '7m x 12m', '2023-01-31', '[{\"slot_start_time\":\"08:30\",\"slot_end_time\":\"10:00\",\"active\":0},{\"slot_start_time\":\"10:00\",\"slot_end_time\":\"11:30\",\"active\":0},{\"slot_start_time\":\"11:30\",\"slot_end_time\":\"13:00\",\"active\":0},{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":0},{\"slot_start_time\":\"16:00\",\"slot_end_time\":\"17:30\",\"active\":0},{\"slot_start_time\":\"17:30\",\"slot_end_time\":\"19:00\",\"active\":0},{\"slot_start_time\":\"19:00\",\"slot_end_time\":\"20:30\",\"active\":0},{\"slot_start_time\":\"20:30\",\"slot_end_time\":\"22:00\",\"active\":0},{\"slot_start_time\":\"14:30\",\"slot_end_time\":\"16:00\",\"active\":1}]', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Rates`
--

CREATE TABLE `Rates` (
  `rates_id` int(11) NOT NULL,
  `rates_price` decimal(10,2) NOT NULL,
  `rates_desc` varchar(255) NOT NULL,
  `cinema_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Rates`
--

INSERT INTO `Rates` (`rates_id`, `rates_price`, `rates_desc`, `cinema_id`) VALUES
(3, '6.50', 'Kinderen t/m 11 jaar', 1),
(4, '10.80', 'Normaal', 1),
(5, '8.50', 'Jeugd 12 t/m 17 jaar', 1),
(6, '9.00', '65+', 1),
(7, '8.70', 'Studenten, CJP & BankGiro Lotterij VIP-KAART', 1),
(13, '6.25', 'Grote bezoekers (+1.80m)', 16),
(14, '4.25', 'Kleine bezoekers (-1.80m)', 16),
(15, '8.00', 'Taart (8 per)', 16),
(16, '10.80', 'Normaal', 18),
(17, '6.50', 'Kinderen t/m 11 jaar', 18),
(18, '8.50', 'Jeugd 12 t/m 17 jaar', 18),
(19, '8.70', 'Studenten, CJP, BankGiro Lotterij VIP-KAART', 18),
(20, '9.00', '65+', 18),
(21, '8.00', 'Taart (8 per)', 18);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Reservation`
--

CREATE TABLE `Reservation` (
  `reservation_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL DEFAULT current_timestamp(),
  `reservated_date` date NOT NULL,
  `reservated_people` longtext NOT NULL,
  `reservated_timeslot` longtext NOT NULL,
  `user_data` longtext NOT NULL,
  `lounge_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Reservation`
--

INSERT INTO `Reservation` (`reservation_id`, `reservation_date`, `reservated_date`, `reservated_people`, `reservated_timeslot`, `user_data`, `lounge_id`, `status_id`) VALUES
(80, '2023-01-12', '2023-01-25', '[{\"rates_id\":[\"4\"],\"people\":[\"1\"]},{\"rates_id\":[\"3\"],\"people\":[\"2\"]},{\"rates_id\":[\"5\"],\"people\":[\"3\"]},{\"rates_id\":[\"7\"],\"people\":[\"4\"]},{\"rates_id\":[\"6\"],\"people\":[\"5\"]}]', '{\"3\":{\"slot_start_time\":\"11:30\",\"slot_end_time\":\"13:00\",\"active\":1}}', '{\"fName\":\"Lenn\",\"mName\":\"van\",\"lName\":\"Esveld\",\"adres\":{\"street\":\"spotvogellaan\",\"houseNumber\":\"24\",\"zipcode\":\"3722CW\",\"city\":\"Bilthoven\"},\"tel\":\"0627017210\",\"email\":\"contact@imlenn.dev\"}', 27, 6),
(81, '2023-01-13', '2023-01-25', '[{\"rates_id\":[\"4\"],\"people\":[\"4\"]},{\"rates_id\":[\"3\"],\"people\":[\"2\"]},{\"rates_id\":[\"5\"],\"people\":[\"0\"]},{\"rates_id\":[\"7\"],\"people\":[\"0\"]},{\"rates_id\":[\"6\"],\"people\":[\"0\"]}]', '[{\"slot_start_time\":\"08:30\",\"slot_end_time\":\"10:00\",\"active\":1}]', '{\"fName\":\"Jack\",\"mName\":\".\",\"lName\":\"jones\",\"adres\":{\"street\":\"Harmonilaan\",\"houseNumber\":\"2\",\"zipcode\":\"3738DV\",\"city\":\"Nieuwegein\"},\"tel\":\"0627017210\",\"email\":\"jack.jones@gameplayparty.nl\"}', 27, 6),
(82, '2023-01-13', '2023-01-25', '[{\"rates_id\":[\"4\"],\"people\":[\"0\"]},{\"rates_id\":[\"3\"],\"people\":[\"0\"]},{\"rates_id\":[\"5\"],\"people\":[\"0\"]},{\"rates_id\":[\"7\"],\"people\":[\"0\"]},{\"rates_id\":[\"6\"],\"people\":[\"0\"]}]', '[{\"slot_start_time\":\"10:00\",\"slot_end_time\":\"11:30\",\"active\":1}]', '{\"fName\":\"Lenn\",\"mName\":\"\",\"lName\":\"Esveld\",\"adres\":{\"street\":\"Harmonilaan\",\"houseNumber\":\"7\",\"zipcode\":\"3738DV\",\"city\":\"Utrecht\"},\"tel\":\"0627017210\",\"email\":\"peterpan@gmail.com\"}', 27, 6),
(89, '2023-01-13', '2023-01-25', '[{\"rates_id\":[\"4\"],\"people\":[\"0\"]},{\"rates_id\":[\"3\"],\"people\":[\"0\"]},{\"rates_id\":[\"5\"],\"people\":[\"0\"]},{\"rates_id\":[\"7\"],\"people\":[\"0\"]},{\"rates_id\":[\"6\"],\"people\":[\"0\"]}]', '[{\"slot_start_time\":\"13:00\",\"slot_end_time\":\"14:30\",\"active\":1}]', '{\"fName\":\"Lenn\",\"mName\":\"van\",\"lName\":\"Esveld\",\"adres\":{\"street\":\"spotvogellaan\",\"houseNumber\":\"24\",\"zipcode\":\"3722CW\",\"city\":\"Bilthoven\"},\"tel\":\"0627017210\",\"email\":\"contact@imlenn.dev\"}', 27, 6),
(90, '2023-01-16', '2023-01-30', '[{\"rates_id\":[\"4\"],\"people\":[\"1\"]},{\"rates_id\":[\"3\"],\"people\":[\"1\"]},{\"rates_id\":[\"5\"],\"people\":[\"2\"]},{\"rates_id\":[\"7\"],\"people\":[\"1\"]},{\"rates_id\":[\"6\"],\"people\":[\"1\"]}]', '{\"1\":{\"slot_start_time\":\"08:30\",\"slot_end_time\":\"10:00\",\"active\":1}}', '{\"fName\":\"Jack\",\"mName\":\"van\",\"lName\":\"winterberg\",\"adres\":{\"street\":\"Harmonilaan\",\"houseNumber\":\"24\",\"zipcode\":\"3738DV\",\"city\":\"Bilthoven\"},\"tel\":\"0627017210\",\"email\":\"jack.jones@gameplayparty.nl\"}', 28, 6),
(91, '2023-01-18', '2023-01-31', '[{\"rates_id\":[\"4\"],\"people\":[\"3\"]},{\"rates_id\":[\"3\"],\"people\":[\"0\"]},{\"rates_id\":[\"5\"],\"people\":[\"1\"]},{\"rates_id\":[\"7\"],\"people\":[\"0\"]},{\"rates_id\":[\"6\"],\"people\":[\"2\"]}]', '{\"5\":{\"slot_start_time\":\"14:30\",\"slot_end_time\":\"16:00\",\"active\":1}}', '{\"fName\":\"Denise\",\"mName\":\"\",\"lName\":\"Verhoef\",\"adres\":{\"street\":\"Nimrodlaan\",\"houseNumber\":\"22\",\"zipcode\":\"3721 BX\",\"city\":\"Bilthoven\"},\"tel\":\"0612345678\",\"email\":\"553398@edu.rocmn.nl\"}', 29, 6);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Roles`
--

CREATE TABLE `Roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Roles`
--

INSERT INTO `Roles` (`role_id`, `role_name`) VALUES
(1, 'visitor'),
(2, 'customer'),
(3, 'Bioscoop Eigenaar'),
(4, 'Super Admin');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Status`
--

CREATE TABLE `Status` (
  `status_id` int(11) NOT NULL,
  `status_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Status`
--

INSERT INTO `Status` (`status_id`, `status_text`) VALUES
(1, 'Annulering'),
(2, 'Aanbetaald'),
(3, 'Volledig betaald'),
(4, 'Aanbetaling mislukt'),
(5, 'Bezig met gegevens'),
(6, 'Pre-orderd');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` longtext NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `Users`
--

INSERT INTO `Users` (`user_id`, `user_email`, `user_username`, `user_password`, `role_id`) VALUES
(4, 'lenn@gmail.com', 'imLenn', '38bdac11b5c2d51e71de582470987f246bc5e65d', 3),
(5, '553398@edu.rocmn.nl', 'Denise', '224c827dc1b1a054f41c4f39d406ed2d79615999', 3),
(9, 'standerijk@gmail.com', 'stendemen', '2f299edf52bd33cce84c4e8047596435cd825332', 4),
(10, 'jack.jones@gameplayparty.nl', 'lazyduck', 'dc5b0654ab503b25a2615727dbc57bfa097999cb', 4),
(11, 'mylittleponylover69@gmail.com', 'XxPonyLoverxX', '4b95a4bfd321fef21285c8723887c32d460c996e', 3);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `Cinema`
--
ALTER TABLE `Cinema`
  ADD PRIMARY KEY (`cinema_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexen voor tabel `Content`
--
ALTER TABLE `Content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexen voor tabel `Lounge`
--
ALTER TABLE `Lounge`
  ADD PRIMARY KEY (`lounge_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexen voor tabel `Rates`
--
ALTER TABLE `Rates`
  ADD PRIMARY KEY (`rates_id`),
  ADD KEY `cinema_id` (`cinema_id`);

--
-- Indexen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `lounge_id` (`lounge_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexen voor tabel `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexen voor tabel `Status`
--
ALTER TABLE `Status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `Cinema`
--
ALTER TABLE `Cinema`
  MODIFY `cinema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT voor een tabel `Content`
--
ALTER TABLE `Content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `Lounge`
--
ALTER TABLE `Lounge`
  MODIFY `lounge_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `Rates`
--
ALTER TABLE `Rates`
  MODIFY `rates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT voor een tabel `Reservation`
--
ALTER TABLE `Reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT voor een tabel `Roles`
--
ALTER TABLE `Roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `Status`
--
ALTER TABLE `Status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `Users`
--
ALTER TABLE `Users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `Cinema`
--
ALTER TABLE `Cinema`
  ADD CONSTRAINT `Cinema_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

--
-- Beperkingen voor tabel `Lounge`
--
ALTER TABLE `Lounge`
  ADD CONSTRAINT `Lounge_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `Cinema` (`cinema_id`);

--
-- Beperkingen voor tabel `Rates`
--
ALTER TABLE `Rates`
  ADD CONSTRAINT `Rates_ibfk_1` FOREIGN KEY (`cinema_id`) REFERENCES `Cinema` (`cinema_id`);

--
-- Beperkingen voor tabel `Reservation`
--
ALTER TABLE `Reservation`
  ADD CONSTRAINT `Reservation_ibfk_2` FOREIGN KEY (`lounge_id`) REFERENCES `Lounge` (`lounge_id`),
  ADD CONSTRAINT `Reservation_ibfk_3` FOREIGN KEY (`status_id`) REFERENCES `Status` (`status_id`);

--
-- Beperkingen voor tabel `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `Roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
