-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Feb 2017 um 18:54
-- Server-Version: 10.1.21-MariaDB
-- PHP-Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `atap`
--
CREATE DATABASE IF NOT EXISTS `atap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `atap`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `flight`
--

CREATE TABLE `flight` (
  `id_flight` int(11) NOT NULL,
  `flight_from_to` varchar(20) DEFAULT NULL,
  `flightnumber` varchar(45) DEFAULT NULL,
  `terminal` varchar(45) DEFAULT NULL,
  `id_entry_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `luggage`
--

CREATE TABLE `luggage` (
  `id_luggage` int(11) NOT NULL,
  `big_suitcase` varchar(45) DEFAULT NULL,
  `medium_suitcase` varchar(45) DEFAULT NULL,
  `small_suitcase` varchar(45) DEFAULT NULL,
  `ski_snowboard` varchar(45) DEFAULT NULL,
  `other_luggage` varchar(45) DEFAULT NULL,
  `id_entry_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passengers`
--

CREATE TABLE `passengers` (
  `id_passengers` int(11) NOT NULL,
  `normal_passengers` varchar(45) DEFAULT NULL,
  `baby_passengers` varchar(45) DEFAULT NULL,
  `toddler_passengers` varchar(45) DEFAULT NULL,
  `kid_passengers` varchar(45) DEFAULT NULL,
  `id_entry_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `task_entry`
--

CREATE TABLE `task_entry` (
  `id_task_entry` int(11) NOT NULL,
  `contractor` varchar(45) DEFAULT NULL,
  `project_number` varchar(45) DEFAULT NULL,
  `lead_passenger` varchar(45) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `transfer_type` varchar(150) DEFAULT NULL,
  `special_needs` varchar(45) DEFAULT NULL,
  `phone_passenger` varchar(45) DEFAULT NULL,
  `comments` varchar(45) DEFAULT NULL,
  `accept_link` varchar(255) NOT NULL,
  `decline_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `travel`
--

CREATE TABLE `travel` (
  `id_travel` int(11) NOT NULL,
  `origin` varchar(150) DEFAULT NULL,
  `origin_address` varchar(255) NOT NULL,
  `pickup_time` varchar(45) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `destination_address` varchar(255) NOT NULL,
  `take_off_time` varchar(45) DEFAULT NULL,
  `id_entry_fk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id_flight`),
  ADD KEY `id_entry_fk` (`id_entry_fk`);

--
-- Indizes für die Tabelle `luggage`
--
ALTER TABLE `luggage`
  ADD PRIMARY KEY (`id_luggage`),
  ADD KEY `id_entry_fk` (`id_entry_fk`);

--
-- Indizes für die Tabelle `passengers`
--
ALTER TABLE `passengers`
  ADD PRIMARY KEY (`id_passengers`),
  ADD KEY `id_entry_fk` (`id_entry_fk`);

--
-- Indizes für die Tabelle `task_entry`
--
ALTER TABLE `task_entry`
  ADD PRIMARY KEY (`id_task_entry`);

--
-- Indizes für die Tabelle `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id_travel`),
  ADD KEY `id_entry_fk` (`id_entry_fk`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `flight`
--
ALTER TABLE `flight`
  MODIFY `id_flight` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `luggage`
--
ALTER TABLE `luggage`
  MODIFY `id_luggage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `passengers`
--
ALTER TABLE `passengers`
  MODIFY `id_passengers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `task_entry`
--
ALTER TABLE `task_entry`
  MODIFY `id_task_entry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `travel`
--
ALTER TABLE `travel`
  MODIFY `id_travel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_ibfk_1` FOREIGN KEY (`id_entry_fk`) REFERENCES `task_entry` (`id_task_entry`);

--
-- Constraints der Tabelle `luggage`
--
ALTER TABLE `luggage`
  ADD CONSTRAINT `luggage_ibfk_1` FOREIGN KEY (`id_entry_fk`) REFERENCES `task_entry` (`id_task_entry`);

--
-- Constraints der Tabelle `passengers`
--
ALTER TABLE `passengers`
  ADD CONSTRAINT `passengers_ibfk_1` FOREIGN KEY (`id_entry_fk`) REFERENCES `task_entry` (`id_task_entry`);

--
-- Constraints der Tabelle `travel`
--
ALTER TABLE `travel`
  ADD CONSTRAINT `travel_ibfk_1` FOREIGN KEY (`id_entry_fk`) REFERENCES `task_entry` (`id_task_entry`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
