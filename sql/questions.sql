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
-- Tabeli struktuur tabelile `questions`
--

CREATE TABLE `questions` (
  `poll_id` int(11) NOT NULL,
  `question` varchar(255) COLLATE utf8mb4_estonian_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `poll_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_estonian_ci;

--
-- Andmete tõmmistamine tabelile `questions`
--

INSERT INTO `questions` (`poll_id`, `question`, `date`, `poll_day`) VALUES
(36, 'Kuidas tuleb tuld süüdata?', '2022-01-03 11:00:44', '2022-01-03'),
(43, 'Kas lapsi peaks kiirtestima?', '2022-01-03 09:50:37', '2022-01-03'),
(45, 'Millal saabub kevad?', '2022-01-03 11:37:12', '2022-01-04'),
(46, 'Kes vastutab elektrihinna tõusu eest?', '2022-01-03 17:42:05', '2022-01-04'),
(47, 'Kas pühad möödusid rahulikult?', '2022-01-03 17:42:42', '2022-01-05'),
(48, 'Kas uusaastaöö ilutulestik peaks olema keelatud?', '2022-01-04 09:16:52', '2022-01-04');

--
-- Indeksid tõmmistatud tabelitele
--

--
-- Indeksid tabelile `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`poll_id`);

--
-- AUTO_INCREMENT tõmmistatud tabelitele
--

--
-- AUTO_INCREMENT tabelile `questions`
--
ALTER TABLE `questions`
  MODIFY `poll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
