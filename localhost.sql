-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 18, 2026 at 10:12 AM
-- Server version: 8.0.40
-- PHP Version: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--
CREATE DATABASE IF NOT EXISTS `db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db`;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int NOT NULL,
  `release_year` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`title`, `price`, `release_year`) VALUES
('Minecraft', 30, 2009),
('Snake', 5, 1998),
('Roblox', 10, 2006);
--
-- Database: `db-jaman`
--
CREATE DATABASE IF NOT EXISTS `db-jaman` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `db-jaman`;

-- --------------------------------------------------------

--
-- Table structure for table `ooo`
--

CREATE TABLE `ooo` (
  `aqaqaqa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
--
-- Database: `escape-room`
--
CREATE DATABASE IF NOT EXISTS `escape-room` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `escape-room`;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `rating` int NOT NULL,
  `difficulty` varchar(50) NOT NULL,
  `review_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riddles`
--

CREATE TABLE `riddles` (
  `id` int NOT NULL,
  `riddle` varchar(255) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `hint` varchar(255) DEFAULT NULL,
  `roomId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `riddles`
--

INSERT INTO `riddles` (`id`, `riddle`, `answer`, `hint`, `roomId`) VALUES
(1, 'Ik wijs altijd naar het noorden, zuiden, oosten en westen. Wat ben ik?', 'Kompas', 'Handig als je verdwaald bent op een eiland.', 1),
(2, 'Ik ben vol zand maar geen strand. Je draait mij om om tijd te meten. Wat ben ik?', 'Zandloper', 'Denk aan tijd.', 1),
(3, 'Zonder mij kom je moeilijk van een eiland af over zee. Wat ben ik?', 'Boot', 'Je vaart ermee.', 1),
(4, 'Ik geef licht in het donker en warmte bij overleving. Wat ben ik?', 'Vuur', 'Je maakt mij met hout of een aansteker.', 2),
(5, 'Ik bescherm je tegen regen en zon, gemaakt van doek. Wat ben ik?', 'Tent', 'Handig om in te slapen buiten.', 2),
(6, 'Ik open een slot maar ben zelf geen deur. Wat ben ik?', 'Sleutel', 'Zonder mij blijf je opgesloten.', 2),
(7, 'Wat is de kleur van water', 'Doorzichtig', 'Denk niet aan de zee', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `player_one` varchar(100) NOT NULL,
  `player_two` varchar(100) NOT NULL,
  `score` int NOT NULL DEFAULT '0',
  `escaped` tinyint(1) NOT NULL DEFAULT '0',
  `end_time_seconds` int DEFAULT NULL,
  `finished_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_name`, `player_one`, `player_two`, `score`, `escaped`, `end_time_seconds`, `finished_at`) VALUES
(1, 'Epstein disciples', 'Damian', 'Dewish', 0, 0, NULL, NULL),
(2, 'Epstein disciples', 'Damian', 'Dewish', 0, 0, NULL, NULL),
(3, 'Epstein disciples', 'Damian', 'Dewish', 0, 0, NULL, NULL),
(4, 'Epstein disciples', 'Damian', 'Dewish', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riddles`
--
ALTER TABLE `riddles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riddles`
--
ALTER TABLE `riddles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
