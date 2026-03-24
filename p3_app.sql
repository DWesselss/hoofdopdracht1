CREATE DATABASE IF NOT EXISTS `p3_app` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `p3_app`;

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titel` VARCHAR(100) NOT NULL,
  `genre` VARCHAR(100) NOT NULL,
  `jaartal` INT NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `games` (`titel`, `genre`, `jaartal`) VALUES
('Minecraft', 'Sandbox', 2011),
('Valorant', 'Shooter', 2020),
('Elden Ring', 'RPG', 2022),
('Rocket League', 'Sport', 2015);
