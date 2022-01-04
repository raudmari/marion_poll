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
-- Tabeli struktuur tabelile `votes`
--

CREATE TABLE `votes` (
  `v_id` int(11) NOT NULL,
  `poll_id` int(11) NOT NULL,
  `ip_add` varchar(50) COLLATE utf8mb4_estonian_ci DEFAULT NULL,
  `vote_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Andmete tõmmistamine tabelile `votes`
--

INSERT INTO `votes` (`v_id`, `poll_id`, `ip_add`, `vote_date`) VALUES
(1, 43, '46.131.41.169', '2022-01-03 10:05:23'),
(2, 36, '46.131.41.169', '2022-01-03 11:22:32'),
(4, 44, NULL, '2022-01-03 11:32:44'),
(5, 45, '46.131.41.169', '2022-01-04 06:55:17'),
(6, 46, '46.131.41.169', '2022-01-04 06:55:11'),
(7, 47, NULL, '2022-01-03 17:42:42'),
(8, 48, '46.131.41.169', '2022-01-04 09:17:03');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`v_id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `votes`
--
ALTER TABLE `votes`
  MODIFY `v_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
