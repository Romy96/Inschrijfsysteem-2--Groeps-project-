-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Machine: 127.0.0.1
-- Gegenereerd op: 30 nov 2016 om 11:45
-- Serverversie: 5.6.17
-- PHP-versie: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `inschrijfsysteem2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activities`
--

CREATE TABLE IF NOT EXISTS `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banner_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Gegevens worden geëxporteerd voor tabel `activities`
--

INSERT INTO `activities` (`id`, `event_id`, `title`, `banner_url`, `description`) VALUES
(1, 1, 'Voetbal', 'img/voetbal.jpg', 'Voetbaltoernooi met teams van drie spelers. Het winnende team wint een speciale verrassing.'),
(2, 1, 'Volleybal', 'img/volleybal.JPG', 'Volleyballen met teams van twee spelers. Eerst wordt er oefeningen gedaan en dan spelen tegen elkaar.');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `large_banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `title`, `large_banner_url`, `small_banner_url`, `start_date`, `end_date`) VALUES
(1, 'Sportdag', 'img/Banner_Sportdag.png', 'img/sportdag.jpg', '2016-11-23 09:02:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voorvoegsel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `unhashed_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gebruikersnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `validation_token` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `gebruikersnaam` (`gebruikersnaam`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`id`, `voornaam`, `voorvoegsel`, `achternaam`, `email`, `wachtwoord`, `unhashed_password`, `gebruikersnaam`, `active`, `validation_token`) VALUES
(1, 'Romy', '', 'Bijkerk', 'romy-bijkerk@hotmail.com', 'Htmldiv1', '', 'Romy96', 0, ''),
(2, 'Sandra', 'van der', 'Sluis', 'sandradejager69@gmail.com', 'Leeuw69', '', 'Sandra69', 0, ''),
(3, 'Kevin', '', 'Kok', 'Admin@davinci.nl', '$2y$10$HNdgX9Y7U4zWbWnBGh1fXOuMDCSyUk0bjKyvAPbP.YFP.7WpW6gwu', 'Studentje1', 'Admin', 0, 'TCFMj57tQY');

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `events` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
