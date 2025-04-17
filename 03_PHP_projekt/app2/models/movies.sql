-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 17. dub 2025, 09:53
-- Verze serveru: 10.4.32-MariaDB
-- Verze PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `wa_2025_lt_02`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `movies`
--

CREATE TABLE `movies` (
  `title` varchar(300) NOT NULL,
  `author` varchar(300) NOT NULL,
  `category` varchar(300) NOT NULL,
  `year` int(4) NOT NULL,
  `director` varchar(255) NOT NULL,
  `subcategory` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `movies`
--

INSERT INTO `movies` (`title`, `author`, `category`, `year`, `director`, `subcategory`, `price`, `created_at`, `id`) VALUES
('znovu', '', '', 2225, 'pokus', 'rerer', 55, '2025-04-06 13:19:04', 1),
('Prvni', '', '', 4545, 'Pořádny', 'Pokus', 200, '2025-04-06 13:20:31', 2),
('Druhy', '', '', 2000, 'Snad_funkční', 'Pokus', 300, '2025-04-06 13:24:55', 3),
('Druhy', '', '', 2000, 'Snad_funkční', 'Pokus', 300, '2025-04-10 17:35:20', 4),
('Druhy', '', '', 2000, 'Snad_funkční', 'Pokus', 300, '2025-04-10 17:35:28', 5),
('Druhy', '', '', 2000, 'Snad_funkční', 'Pokus', 300, '2025-04-10 17:52:12', 6),
('Druhy', '', '', 2000, 'Snad_funkční', 'Pokus', 300, '2025-04-17 09:46:41', 7);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
