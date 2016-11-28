-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Gegenereerd op: 28 nov 2016 om 12:12
-- Serverversie: 10.1.16-MariaDB
-- PHP-versie: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inschrijfsysteem2`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `banner_url` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `large_banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `small_banner_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `events`
--

INSERT INTO `events` (`id`, `title`, `large_banner_url`, `small_banner_url`, `start_date`, `end_date`) VALUES
(1, 'Sportdag', 'img/Banner_Sportdag.png', 'img/sportdag.jpg', '2016-11-23 09:02:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `gebruikersnaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wachtwoord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voornaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `voorvoegsel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achternaam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `unhashed_password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Gegevens worden geëxporteerd voor tabel `members`
--

INSERT INTO `members` (`id`, `email`, `gebruikersnaam`, `wachtwoord`, `voornaam`, `voorvoegsel`, `achternaam`, `active`, `unhashed_password`) VALUES
(1, 'romy-bijkerk@hotmail.com', 'Romy96', 'Htmldiv1', 'Romy', '', 'Bijkerk', 0, ''),
(4, 'Admin@davinci.nl', 'Admin', '$2y$10$ytVpKNWI44xAufGLqScz5O/iM2I2GZsD/8CrrBguiQv2Bv4057/bm', 'Kevin', '', 'Drakenpen', 1, 'Studentje1'),
(5, 'ecyrecseys@live.nl', 'ecysrcyesrec', '$2y$10$ytVpKNWI44xAufGLqScz5O/iM2I2GZsD/8CrrBguiQv2Bv4057/bm', 'vcyre', 'ecyrseycr', 'eycrsyec', 1, 'Studentje1');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexen voor tabel `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexen voor tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT voor een tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
