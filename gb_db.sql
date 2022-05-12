/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP DATABASE IF EXISTS `gb`;
CREATE DATABASE IF NOT EXISTS `gb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `gb`;

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` tinytext NOT NULL,
  `email` tinytext NOT NULL,
  `phone` tinytext NOT NULL,
  `comment` text NOT NULL,
  `picture` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `modified_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` (`id`, `username`, `email`, `phone`, `comment`, `picture`, `published`, `created_at`, `modified_at`) VALUES
	(1, 'admin', 'dmitry.smoler@gmail.com', '+(375) (25) 444-44-44', '2 text 2', '', 1, '2022-05-11 11:46:27', '2022-05-11 18:28:00'),
	(2, 'testuser1', 'testuser1@email.com', '+(375) (25) 777-71-20', '1 text 1', '', 1, '2022-05-10 23:05:04', '2022-05-11 18:33:00'),
	(13, 'admin', 'admin@gb.by', '+(375) (33) 333-33-33', '123', '1652285067_Penguins.jpg', 1, '2022-05-11 19:04:27', '2022-05-11 19:04:27'),
	(14, 'test', 'admin@gb.by', '+(375) (33) 333-33-33', '123', '1652285175_Koala.jpg', 0, '2022-05-11 19:06:15', '2022-05-11 19:06:15');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
