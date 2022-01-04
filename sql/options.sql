-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Loomise aeg: Jaan 04, 2022 kell 11:23 EL
-- Serveri versioon: 5.7.36-0ubuntu0.18.04.1
-- PHP versioon: 7.3.15-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Andmebaas: `marionraudsepp_poll`
--

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `options`
--

CREATE TABLE `options` (
  `option_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `option_text` varchar(255) COLLATE utf8mb4_estonian_ci NOT NULL,
  `option_vote` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Andmete tõmmistamine tabelile `options`
--

INSERT INTO `options` (`option_id`, `poll_id`, `option_text`, `option_vote`, `date`) VALUES
(82, 36, 'Pealt\r', 0, '2022-01-01 18:34:35'),
(83, 36, 'Alt\r', 1, '2022-01-03 11:19:39'),
(84, 36, 'Pole vahet', 2, '2022-01-03 11:22:32'),
(94, 43, 'suva\r', 1, '2022-01-03 10:05:23'),
(95, 43, 'pole vahet', 0, '2022-01-03 09:50:37'),
(97, 45, 'Varsti\r', 0, '2022-01-03 11:37:12'),
(98, 45, 'Ma ei tea', 1, '2022-01-04 06:55:17'),
(99, 46, 'Valitsus\r', 1, '2022-01-04 06:55:11'),
(100, 46, 'Euroopa Liit\r', 0, '2022-01-03 17:42:05'),
(101, 46, 'Puudub arvamus', 0, '2022-01-03 17:42:05'),
(102, 47, 'Jah\r', 0, '2022-01-03 17:42:42'),
(103, 47, 'Ei', 0, '2022-01-03 17:42:42'),
(104, 48, 'Jah\r', 0, '2022-01-04 09:16:52'),
(105, 48, 'Ei\r', 0, '2022-01-04 09:16:52'),
(106, 48, 'Vahet pole', 1, '2022-01-04 09:17:03');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`option_id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `options`
--
ALTER TABLE `options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
