-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 02. Dez 2021 um 09:51
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `miniblog`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_autoren`
--

CREATE TABLE `tbl_autoren` (
  `autor_id` int(11) NOT NULL,
  `autor_vorname` varchar(50) DEFAULT NULL,
  `autor_nachname` varchar(50) NOT NULL,
  `autor_email` varchar(100) NOT NULL,
  `autor_passwort` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_autoren`
--

INSERT INTO `tbl_autoren` (`autor_id`, `autor_vorname`, `autor_nachname`, `autor_email`, `autor_passwort`) VALUES
(8, 'Bart', 'Simpson', 'Bart@internet.com', '$2y$10$cN2Bb84HZRVPHxb.GTAXpuRVG6itaGyipD3b7bNrBzfElK3TsV/oe'),
(10, 'Lisa', 'Simpson', 'Lisa@internet.com', '$2y$10$cmcEmDfZqjJbE4ByiORiyuicDb79i7V8UINv5ON4oaqrBQBDc30Cu'),
(11, 'Marge', 'Simpson', 'Marge@internet.de', '$2y$10$5hIayyHAtCo2DTyfD5F1mOiEPBMGGDZ8SNxqKG35arD5a5X3wSVhC'),
(13, 'Homer', 'Simpson', 'Homer@internet.com', '$2y$10$NV.UineSEAvFbPSX4wwXneSxhBQFrgQE.pX8Z818iuTEMFm5K3glS'),
(14, 'Maggie', 'Simpson', 'Maggie@internet.com', '$2y$10$H61nCSDxWn1PzPjVaAt7cOvzJBGQOXUQY3Q91WpKN9YbAAH/vDL9e');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_kategorien`
--

CREATE TABLE `tbl_kategorien` (
  `kateg_id` int(11) NOT NULL,
  `kateg_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_kategorien`
--

INSERT INTO `tbl_kategorien` (`kateg_id`, `kateg_name`) VALUES
(4, 'Gitarre'),
(5, 'Bass'),
(7, 'Schlagzeug'),
(8, 'Saxophon');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `posts_id` int(11) NOT NULL,
  `posts_autor_id_ref` int(11) NOT NULL,
  `posts_kateg_id_ref` int(11) NOT NULL,
  `posts_titel` varchar(20) NOT NULL,
  `posts_inhalt` text NOT NULL,
  `posts_bild` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_posts`
--

INSERT INTO `tbl_posts` (`posts_id`, `posts_autor_id_ref`, `posts_kateg_id_ref`, `posts_titel`, `posts_inhalt`, `posts_bild`) VALUES
(9, 8, 7, 'Drum-Solo', 'Lorem Ipsum Tralala', '../img/bart.jpg'),
(10, 10, 8, 'Reed-Solo', 'Lorem Ipsum Tralala', '../img/lisa.png'),
(11, 13, 5, 'Bass Solo', 'Lorem Ipsum Tralala', '../img/homer.jpg'),
(12, 11, 4, 'Guitar Solo', 'Lorem Ipsum tralala', '../img/marge.jpg'),
(13, 14, 4, 'Guitar Comp', 'Lorem Ipsum tralala', '../img/maggie.png');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_autoren`
--
ALTER TABLE `tbl_autoren`
  ADD PRIMARY KEY (`autor_id`),
  ADD UNIQUE KEY `autor_email` (`autor_email`);

--
-- Indizes für die Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  ADD PRIMARY KEY (`kateg_id`);

--
-- Indizes für die Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`posts_id`),
  ADD KEY `posts_autor_id_ref` (`posts_autor_id_ref`),
  ADD KEY `posts_kateg_id_ref` (`posts_kateg_id_ref`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_autoren`
--
ALTER TABLE `tbl_autoren`
  MODIFY `autor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT für Tabelle `tbl_kategorien`
--
ALTER TABLE `tbl_kategorien`
  MODIFY `kateg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT für Tabelle `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `posts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
