-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 09, 2020 alle 14:49
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecodb`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `aule`
--

CREATE TABLE `aule` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `zona` varchar(255) NOT NULL,
  `capienza` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `aule`
--

INSERT INTO `aule` (`id`, `nome`, `zona`, `capienza`, `active`) VALUES
(1, 'test', 'aaa', 25, 0),
(2, 'test2', 'b', 30, 0),
(3, 'uxlab', '25', 0, 1),
(4, 'uxlab', 'aaa', 25, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `prenotazione`
--

CREATE TABLE `prenotazione` (
  `id` int(20) NOT NULL,
  `id_user` int(20) NOT NULL,
  `id_aula` int(11) NOT NULL,
  `titolo` varchar(512) NOT NULL,
  `descrizione` varchar(512) NOT NULL,
  `isPublic` tinyint(1) NOT NULL DEFAULT 0,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `tot_ore` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `toggle` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `prenotazione`
--

INSERT INTO `prenotazione` (`id`, `id_user`, `id_aula`, `titolo`, `descrizione`, `isPublic`, `start_date`, `end_date`, `tot_ore`, `active`, `toggle`) VALUES
(10, 2, 1, 'evento', 'asdasasasf', 0, '2020-12-12 13:00:00', '2020-12-20 14:00:00', '01:0', 1, 1),
(11, 3, 2, 'evento', 'asdasasasf', 0, '2020-12-12 13:00:00', '2020-12-20 14:00:00', '01:0', 1, 1),
(12, 2, 1, 'evento', 'asdasasasf', 0, '2020-12-12 14:00:00', '2020-12-20 15:00:00', '01:0', 1, 1),
(13, 2, 1, 'evento', 'asdasasasf', 0, '2020-12-12 14:30:00', '2020-12-20 13:00:00', '22:30', 1, 1),
(14, 2, 1, 'evento', 'asdasasasf', 0, '2020-12-12 14:00:00', '2020-12-12 13:00:00', '01:0', 1, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'interno'),
(3, 'esterno');

-- --------------------------------------------------------

--
-- Struttura della tabella `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `nomeskill` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `skilltoprofile`
--

CREATE TABLE `skilltoprofile` (
  `idskills` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `freelancer` tinyint(1) NOT NULL,
  `state` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cap` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_verified_at`, `password`, `first_name`, `last_name`, `birthdate`, `profession`, `tel`, `description`, `freelancer`, `state`, `address`, `province`, `city`, `cap`, `remember_token`, `created_at`, `updated_at`, `role_id`) VALUES
(2, 'ZioCioccolatone', 'ziociocco@gmail.com', NULL, '$2y$10$A0UTbw1pN906TR0OqSUmhO2vHJXhvfdxDTmGv2xzAglESXjeZ4pRS', 'Alex', 'Filippo', '0000-00-00', NULL, 'asdasdasda', '1', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 15:32:11', NULL, 3),
(3, 'miri', 'miri@gmail.com', NULL, '$2y$10$MX73oqLUmGc0Xuihj0k0luUYhIATymHKLc/Mg7E8m4hV/ESXblORK', 'Alex', 'Filippo', '0000-00-00', NULL, 'asdasdasda', '1', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 15:40:38', NULL, 3),
(4, 'aaaa', 'aaa@gmail.com', NULL, '$2y$10$G4IUTG15as5ZBN3Ge3ra2edhtKkfkBfG1ipb/QcJjJR8HouNFcOOm', 'Alex', 'Filippo', '0000-00-00', NULL, NULL, '0', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 15:42:44', NULL, 3),
(5, 'aaaadasd', 'asdadsasd@gmail.com', NULL, '$2y$10$7F1hQnBGWH86Qd8Vqu274.Q79hNfj53OGy7O/OYGmUFQtK8/DUBym', 'Alex', 'Filippo', '0000-00-00', NULL, NULL, '0', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 15:46:17', NULL, 3),
(7, 'ciao', 'ciao@gmail.com', NULL, '$2y$10$WIFdSIbxy47AGEAlLWN9oOFjCyFH8T6GOHbVzOsji31mhdIf782X2', 'Alex', 'Filippo', '0000-00-00', NULL, NULL, '0', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 16:07:23', NULL, 3),
(8, 'casas', 'asvasfasf@gmail.com', NULL, '$2y$10$MQWwslQ8YXkZ1UQ1dg7mg.f3eOzox.HELhLbCeC1d3L2yA6ryZ16q', 'Alex', 'Filippo', '0000-00-00', '3705195525', NULL, '0', 0, 'asdasd', 'asdasd', 'asdasd', '37051', NULL, NULL, '2020-02-05 16:19:54', NULL, 3),
(9, 'mariorossi', 'mariorossi@gmail.com', NULL, '$2y$10$Z0L2agi5BCaxFTWAnBMGb.N/nJ9.1tmEAsM9xy2T6vcxfL.BEFhpG', 'Mario', 'Rossi', '0000-00-00', '3705195525', NULL, '1', 0, 'Via ignazio silone 8', 'Vr', 'Bovolone', '37051', '31/10/1999', NULL, '2020-02-05 16:23:43', NULL, 3),
(10, 'rossimario', 'rossimario@gmail.com', NULL, '$2y$10$WkaFyO6dk.6JdsTeBnsMCeeSjkRArPa99737GXEESesOqzIfRczIO', 'rossi', 'mario', '0000-00-00', 'Full Stack UX UI dESIGN ZANZA', '3705195525', NULL, 1, 'Italy', 'Via ignazio silone 8', 'Vr', 'Bovolone', '37051', NULL, '2020-02-05 16:30:46', NULL, 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `aule`
--
ALTER TABLE `aule`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD PRIMARY KEY (`id`,`id_user`,`id_aula`),
  ADD KEY `prenotante` (`id_user`),
  ADD KEY `prenotata` (`id_aula`);

--
-- Indici per le tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `tipo_utente` (`role_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `aule`
--
ALTER TABLE `aule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT per la tabella `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `prenotazione`
--
ALTER TABLE `prenotazione`
  ADD CONSTRAINT `prenotante` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `prenotata` FOREIGN KEY (`id_aula`) REFERENCES `aule` (`id`);

--
-- Limiti per la tabella `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `tipo_utente` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
