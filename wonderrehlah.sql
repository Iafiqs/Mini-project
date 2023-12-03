-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2023 at 06:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wonderrehlah`
--

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

DROP TABLE IF EXISTS `problem`;
CREATE TABLE IF NOT EXISTS `problem` (
  `problemId` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`problemId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`problemId`, `email`, `message`) VALUES
(1, 'iafiqshome@gmail.com', 'This is an example of a problem.');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

DROP TABLE IF EXISTS `schedule`;
CREATE TABLE IF NOT EXISTS `schedule` (
  `dayId` int NOT NULL,
  `activity` varchar(100) NOT NULL,
  `url` varchar(500) NOT NULL,
  `time` varchar(20) NOT NULL,
  `destination` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  UNIQUE KEY `activity` (`activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`dayId`, `activity`, `url`, `time`, `destination`) VALUES
(1, 'The Ganga Cafe', 'https://www.theganga.com.my/', '1 hour', 'Selangor'),
(1, 'Masjid Jamek Abdullah Hukum (Zohor Prayers)', 'https://goo.gl/maps/PypHVmPiWYUYPCDk6', '45 minutes', 'Selangor'),
(1, 'Skytrex Adventure', 'https://www.skytrex-adventure.org/', '45 minutes', 'Selangor'),
(1, 'Snowalk I-city', 'https://iticket.i-city.my/products/snowalk-aurora', '1 hour', 'Selangor'),
(1, 'Setia Alam Central Park', 'https://www.triphobo.com/places/shah-alam-malaysia/setia-alam-central-park', '30 minutes', 'Selangor'),
(1, 'Surau As-Salam (Asar Prayers)', 'https://goo.gl/maps/7gzzKKMFDiCPsGci7', '45 minutes', 'Selangor'),
(1, 'Aquaria KLCC', 'https://aquariaklcc.com/', '2 hours', 'Selangor'),
(2, 'Laman Seni 7', 'https://www.triphobo.com/places/shah-alam-malaysia/laman-seni-7', '45 minutes', 'Selangor'),
(2, 'I City Park', 'https://www.triphobo.com/places/shah-alam-malaysia/i-city-park', '30 minutes', 'Selangor'),
(2, 'Wet World Water Park Shah Alam', 'https://www.triphobo.com/places/shah-alam-malaysia/wet-world-water-park-shah-alam', '1 hour', 'Selangor'),
(2, 'Serai Thai Restaurant', 'https://goo.gl/maps/YciMrjR4nDhZxWJ4A', '45 minutes', 'Selangor'),
(2, 'Madrasatul Nahdatul Islamiah, Surau Section 3 (Zohor Prayers)', 'https://goo.gl/maps/gdXMWokTvycnyLhK9', '45 minutes', 'Selangor'),
(2, 'Petronas Twin Towers', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/petronas-twin-towers', '1 hour', 'Selangor'),
(2, 'Asy-Syakirin Mosque KLCC (Asar Prayers)', 'https://goo.gl/maps/SvRZHCpLRkJKxriU7', '45 minutes', 'Selangor'),
(2, 'Menara Kl Tower', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/menara-kl-tower', '1 hour', 'Selangor'),
(3, 'Klcc-bukit Bintang Walkway', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/klcc-bukit-bintang-walkway', '30 minutes', 'Selangor'),
(3, 'National Mosque (Zohor Prayers)', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/national-mosque', '45 minutes', 'Selangor'),
(3, 'China Town', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/china-town', '1 hour', 'Selangor'),
(3, 'Masjid Wilayah Persekutuan (Asar Prayers)', 'https://goo.gl/maps/DpMj7Rp4ahj6eZ4d6', '45 minutes', 'Selangor'),
(3, 'Batu Caves', 'https://www.triphobo.com/places/kuala-lumpur-malaysia/batu-caves', '2 hours', 'Selangor'),
(1, 'Menara Taming Sari, Melaka', 'https://www.menaratamingsari.com/', '1 hour', 'Melaka'),
(1, 'Taman Costa Mahkota (Zohor Prayers)', 'https://goo.gl/maps/WbYdVKZW1wXX9e4M7', '45 minutes', 'Melaka'),
(1, 'Upside Down House Melaka', 'https://www.upsidedownhousemelaka.com.my/', '45 minutes', 'Melaka'),
(1, 'Surau Warisan Dunia (Asar Prayers)', 'https://goo.gl/maps/df2o5QSnZwfQcSSM6', '45 minutes', 'Melaka'),
(1, 'Jonker Street', 'https://www.triphobo.com/places/melaka-malaysia/jonker-street', '3 hours', 'Melaka'),
(2, 'A Famosa, Melaka', 'https://www.triphobo.com/places/melaka-malaysia/a-famosa', '1.5 hour', 'Melaka'),
(2, 'Coconut Shake Bandar Hilir', 'https://goo.gl/maps/Wpjw6xswRxjkRGzQA', '30 minutes', 'Melaka'),
(2, 'Surau Mahkota Parade (Zohor Prayers)', 'https://goo.gl/maps/Y74AdoKJAzKeZwvbA', '45 minutes', 'Melaka'),
(2, 'Sultanate Palace', 'https://www.triphobo.com/places/melaka-malaysia/sultanate-palace', '1 hour', 'Melaka'),
(2, 'Kampong Kling Mosque (Asar Prayers)', 'https://www.triphobo.com/places/melaka-malaysia/kampong-kling-mosque', '45 minutes', 'Melaka'),
(3, 'Malacca Zoo', 'https://www.triphobo.com/places/melaka-malaysia/malacca-zoo', '3 hours', 'Melaka'),
(3, 'Surau Malacca Zoo (Zohor Prayers)', 'https://goo.gl/maps/qLZXMKjuDVUu2kmB9', '30 minutes', 'Melaka'),
(3, 'Surau Malacca Zoo (Asar Prayers)', 'https://goo.gl/maps/qLZXMKjuDVUu2kmB9', '30 minutes', 'Melaka'),
(1, 'Legoland Malaysia', 'https://www.triphobo.com/places/johor-bahru-malaysia/legoland-malaysia', '6 hour', 'Johor'),
(1, 'Legoland Malaysia (Zohor Prayers)', 'https://goo.gl/maps/BcNBQzwZRqimV2mh8', '45 minutes', 'Johor'),
(1, 'Legoland Malaysia (Asar Prayers)', 'https://goo.gl/maps/BcNBQzwZRqimV2mh8', '45 minutes', 'Johor'),
(2, 'Danga Bay', 'https://www.triphobo.com/places/johor-bahru-malaysia/danga-bay', '2 hours', 'Johor'),
(2, 'Kolam Ayer Mosque (Zohor Prayers)', 'https://goo.gl/maps/gSn5mbnf2rQpxkAc9', '45 minutes', 'Johor'),
(2, 'Murtabak Singapura Sungai Chat Kolam Air', 'https://goo.gl/maps/NDUfGKxLfMTSK5M87', '2 hours', 'Johor'),
(2, 'Kolam Ayer Mosque (Asar Prayers)', 'https://goo.gl/maps/gSn5mbnf2rQpxkAc9', '45 minutes', 'Johor'),
(2, 'Dataran Bandaraya Johor Bahru', 'https://www.triphobo.com/places/johor-bahru-malaysia/dataran-bandaraya-johor-bahru', '2 hours', 'Johor'),
(3, 'Ksl City Mall', 'https://www.triphobo.com/places/johor-bahru-malaysia/ksl-city-mall', '2 hours', 'Johor'),
(3, 'Taman Dato Onn Mosque (Zohor Prayers)', 'https://goo.gl/maps/5crZFwGufM4hRX5HA', '45 minutes', 'Johor'),
(3, 'Hutan Bandar MBJB', 'https://goo.gl/maps/WLUhaMbjjwSGseg47', '2 hours', 'Johor'),
(3, 'Ashoka Curry House', 'https://goo.gl/maps/aST9PmBBZNhP64xi9', '1.5 hour', 'Johor'),
(3, 'Sultan Abu Bakar Mosque (Asar Prayers)', 'https://goo.gl/maps/5xbzrdRAeYSn8fUu5', '45 minutes', 'Johor');

-- --------------------------------------------------------

--
-- Table structure for table `trip`
--

DROP TABLE IF EXISTS `trip`;
CREATE TABLE IF NOT EXISTS `trip` (
  `tripId` int NOT NULL AUTO_INCREMENT,
  `destination` varchar(50) NOT NULL,
  `startDate` date NOT NULL,
  `residence` varchar(100) NOT NULL,
  `noOfDays` int NOT NULL,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`tripId`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trip`
--

INSERT INTO `trip` (`tripId`, `destination`, `startDate`, `residence`, `noOfDays`, `username`) VALUES
(1, 'Johor', '2023-09-29', 'Johor Bahru', 2, 'Iafiqs');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `name`, `username`, `password`, `email`) VALUES
(2, 'IMAN AFIQ BIN ABD SHUKOR', 'Iafiqs', 'o32oio27B!', 'iafiqshome@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
