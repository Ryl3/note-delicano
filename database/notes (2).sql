-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2024 at 02:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notes`
--

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `note`
--

INSERT INTO `note` (`id`, `title`, `content`, `created_at`) VALUES
(1, '', '', '2024-03-30 07:45:38'),
(2, 'dasda', 'adasdasdhagduguasgihsidhalsdhahahdhaoshdashdosahdashdsa', '2024-03-28 17:15:21'),
(3, '', 'asdadasasdad', '2024-03-30 07:38:07'),
(4, 'ywa', 'Visual Studio Code, also commonly referred to as VS Code, is a source-code editor developed by Microsoft for Windows, Linux and macOS. Features include support for debugging, syntax highlighting, intelligent code completion, snippets, code refactoring, and embedded Git. Wikipedia', '2024-03-30 10:19:23'),
(5, 'sadda', 'José Rizal (born June 19, 1861, Calamba, Philippines—died December 30, 1896, Manila) patriot, physician, and man of letters who was an inspiration to the Philippine nationalist movement.\r\n\r\nThe son of a prosperous landowner, Rizal was educated in Manila and at the University of Madrid. A brilliant medical student, he soon committed himself to the reform of Spanish rule in his home country, though he never advocated Philippine independence. Most of his writing was done in Europe, where he resided between 1882 and 1892.\r\n\r\nIn 1887 Rizal published his first novel, Noli me tangere (The Social Cancer), a passionate exposure of the evils of Spanish rule in the Philippines. A sequel, El filibusterismo (1891; The Reign of Greed), established his reputation as the leading spokesman of the Philippine reform movement. He published an annotated edition (1890; reprinted 1958) of Antonio Morga’s Sucesos de las Islas Filipinas, hoping to show that the native people of the Philippines had a long history before the coming of the Spaniards. He became the leader of the Propaganda Movement, contributing numerous articles to its newspaper, La Solidaridad, published in Barcelona. Rizal’s political program included integration of the Philippines as a province of Spain, representation in the Cortes (the Spanish parliament), the replacement of Spanish friars by Filipino priests, freedom of assembly and expression, and equality of Filipinos and Spaniards before the law.\r\n\r\nmonument to José Rizal\r\nmonument to José Rizal\r\nMonument (centre) to José Rizal in Rizal Park, Manila.\r\nHow José Rizal became the face of the Philippine independence movement\r\nHow José Rizal became the face of the Philippine independence movement\r\nLearn more about the life of José Rizal and how he became the face of the Philippine independence movement.\r\nSee all videos for this article\r\nRizal returned to the Philippines in 1892. He founded a nonviolent-reform society, the Liga Filipina, in Manila, and was deported to Dapitan in northwest Mindanao. He remained in exile for the next four years. In 1896 the Katipunan, a Filipino nationalist secret society, revolted against Spain. Although he had no connections with that organization and he had had no part in the insurrection, Rizal was arrested and tried for sedition by the military. Found guilty, he was publicly executed by a firing squad in Manila. His martyrdom convinced Filipinos that there was no alternative to independence from Spain. On the eve of his execution, while confined in Fort Santiago, Rizal wrote “Último adiós” (“Last Farewell”), a masterpiece of 19th-century Spanish verse.', '2024-03-30 10:57:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin123', '', '$2y$10$B.7JCgq7aZ71Hm8cwjfiM.jmUnjM7qNEWXBRut.UTdWr1RhgEVMNS'),
(2, 'admin', '', '$2y$10$60N71LBoZoOrh1X/6A36w.tc8RbjjzuXAvdnvyVXsKsk7S3rS4ykC'),
(3, 'admin', '', '$2y$10$ramx2ixe7gJ8wEJ3giHdcO/CzoL55DpZJiRX/JN28GIC5FLGtYTWy'),
(4, 'ernest', '', '$2y$10$W2OeSVmpaqd1RFiXFCnjD.9u7SU9V0QOzx8Ng1jhItGkisRK5HPOW'),
(5, 'admin', '', '$2y$10$3GIAzZbMfO3D3wthyyFotOfucHWcCc7jMVaJWsbPSJdVwMUH3rrbm'),
(6, 'admin', 'admin@admin', '$2y$10$3ba2w90.2kimVvrRJ.URV.tz9eEI.zRkN/1ZfKume4054ybYCydey'),
(7, 'ernest', 'dasgdkasdk@asdkasdgu', '$2y$10$k8OUaOv/WlcHOMU9SbCtLeTA5miz2CQGQgeL59AE04R2o03OGE3T.'),
(8, 'ernest', 'asdasda@sada', '$2y$10$DKy8KWEBx7LnNEc6437fdu87ZeHPxc7XLyWh0McQRXoV6.lsh9VHy'),
(9, 'admin', 'dasjdg@3asdjd', '$2y$10$627LYLmHtakb5kbX3pbVCuW2uqjx9QDSUgQZLxXRZLBYacfzgnrDi'),
(10, 'james', 'james@gmail.com', '$2y$10$Vz.Ecc1y.VCA4pmpVMK4WeKkHrdy8Bp5bjjQrRb5V/Y45HNRK2aee'),
(11, 'ernest', 'ernestjamesbrianquines@gmail.com', '$2y$10$SAybIIcH7AVh6dR5PiMbDeWUCcactwRhQhpQ0TYXJwW2ASznFZSCa'),
(12, 'admin', 'ernestjamesbrianquines@gmail.com', '$2y$10$Pzki3.cscEh.CI9GOzpRseVGW0ww2x0zJd.8MXOOWosmZxDA/.eIa'),
(13, 'admin1', 'dsasdas@asfjdsf', '$2y$10$xNKWVvxFHb9fYROyR8wBAe2pM5jzxhrxjDwLLmeNiPWSndm1Llqm2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
