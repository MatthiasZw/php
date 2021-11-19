-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 19. Nov 2021 um 12:57
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
-- Datenbank: `obstladen`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_bestellung`
--

CREATE TABLE `tbl_bestellung` (
  `bstlg_id` int(11) NOT NULL,
  `bstlg_vorname` varchar(50) DEFAULT NULL,
  `bstlg_nachname` varchar(50) NOT NULL,
  `bstlg_ort` varchar(50) NOT NULL,
  `bstlg_sorte` varchar(20) NOT NULL,
  `bstlg_menge` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tbl_bestellung`
--

INSERT INTO `tbl_bestellung` (`bstlg_id`, `bstlg_vorname`, `bstlg_nachname`, `bstlg_ort`, `bstlg_sorte`, `bstlg_menge`) VALUES
(1, 'Arndt', 'Hoffmann', 'Stuttgart', 'Elstar', 15),
(2, 'Corinna', 'Delphi', 'Hamburg', 'Jonagold', 3),
(3, 'Petra', 'Meyer', 'Wien', 'Gala', 5),
(4, 'Peter', 'Schmidt', 'Berlin', 'Elstar', 25);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `tbl_bestellung`
--
ALTER TABLE `tbl_bestellung`
  ADD PRIMARY KEY (`bstlg_id`),
  ADD KEY `idx_nachname` (`bstlg_nachname`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `tbl_bestellung`
--
ALTER TABLE `tbl_bestellung`
  MODIFY `bstlg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
