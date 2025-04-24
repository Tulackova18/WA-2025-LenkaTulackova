-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 24. dub 2025, 11:13
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
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  `year` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`images`)),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password_hash`, `role`, `name`, `surname`, `created_at`, `updated_at`) VALUES
(1, 'jan', NULL, '$2y$10$f2i5VBRsEjkamPBjiFYII.BAiDhgiTddduyMOM9DHtfw5AK2RLTZe', 'user', NULL, NULL, '2025-04-20 15:20:31', NULL),
(2, 'honza novy', NULL, '$2y$10$uBAOYWlDjsbIE08o16AQsOkeOem0IKb1.N2rnPTnIkMGOVp0iI/Ja', 'user', NULL, NULL, '2025-04-20 15:34:01', NULL);

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
