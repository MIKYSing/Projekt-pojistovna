-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2023 at 06:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pojistovna`
--

-- --------------------------------------------------------

--
-- Table structure for table `pojistenci`
--

CREATE TABLE `pojistenci` (
  `id_pojistence` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `prijmeni` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` int(12) NOT NULL,
  `ulice` varchar(255) NOT NULL,
  `mesto` varchar(255) NOT NULL,
  `psc` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `pojistenci`
--

INSERT INTO `pojistenci` (`id_pojistence`, `jmeno`, `prijmeni`, `email`, `telefon`, `ulice`, `mesto`, `psc`) VALUES
(191, 'Terezka', 'Halamová', 'terezahala@gmial.com', 2147483647, 'Na statku 2', 'Pelhřimov', 78541),
(192, 'Terezka', 'Halamová', 'terezahala@gmail.com', 2147483647, 'Na statku 278', 'Pelhřimov', 78541),
(193, 'David', 'Opel', 'opel@seznam.cz', 78965412, 'Na Kopci 2', 'Hromov', 78369),
(195, 'Terezka', 'Halamová', 'terezahala@gmial.com', 2147483647, 'Na statku 2', 'Pelhřimov', 78541),
(200, 'Prdelka', 'Moje', 'mojeprdelka@google.com', 666555444, 'U střeleného šípu 22', 'U březového háje', 11223),
(201, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(202, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(203, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(204, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(205, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(206, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(207, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(208, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(209, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(210, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 33701),
(211, 'admin', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na Husinic 1092', 'rokyccan', 33701),
(212, 'Michael', 'Eret', 'michaeleret@gmail.com', 78822516, 'Na svahu', 'Chomutov', 98745);

-- --------------------------------------------------------

--
-- Table structure for table `pojisteni`
--

CREATE TABLE `pojisteni` (
  `id_pojisteni` int(11) NOT NULL,
  `id_pojistnika` int(11) DEFAULT NULL,
  `nazev` varchar(255) NOT NULL,
  `castka` int(11) NOT NULL,
  `predmet` varchar(255) NOT NULL,
  `platnost_od` date NOT NULL,
  `platnost_do` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `pojisteni`
--

INSERT INTO `pojisteni` (`id_pojisteni`, `id_pojistnika`, `nazev`, `castka`, `predmet`, `platnost_od`, `platnost_do`) VALUES
(61, NULL, 'Pojištění krádeže', 998877, 'Osoba,Věc', '2023-03-03', '2023-04-08'),
(63, NULL, 'Pojištění Hodinek', 1200, 'hodinky', '2023-03-04', '2023-04-07'),
(64, NULL, 'Pojištění psa', 10909090, 'zvíře, pes, miláček', '2023-03-03', '2023-03-25'),
(98, NULL, 'testtest', 55555, 'testovací', '0000-00-00', '2023-03-31'),
(100, NULL, 'Pojistění koloběžky', 20000, 'Koloběžka', '2023-03-10', '2023-03-22'),
(102, NULL, '', 0, '', '0000-00-00', '0000-00-00'),
(103, 201, 'testovací', 32000, 'test', '2023-03-23', '2023-08-31'),
(104, 201, 'Pojistění koloběžky', 8050, 'Koloběžka', '2023-03-17', '2023-04-07'),
(105, NULL, '', 0, '', '0000-00-00', '0000-00-00'),
(106, NULL, 'Pojistění koloběžky', 0, 'testovací', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `uzivatele`
--

CREATE TABLE `uzivatele` (
  `uzivatele_id` int(11) NOT NULL,
  `jmeno` varchar(255) NOT NULL,
  `heslo` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Dumping data for table `uzivatele`
--

INSERT INTO `uzivatele` (`uzivatele_id`, `jmeno`, `heslo`, `admin`) VALUES
(17, 'admin', '$2y$10$AdNMI9WI8n4ZnZvne8Y3sen8MRfLA7jvefIlmjXRt2s/5K2da4EjK', 1),
(19, 'test', '$2y$10$gf2swMpcLU9DBnAMUWyI3.mnCx1o5uwy0e4OA3GXIYLUvT/XVRt8S', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pojistenci`
--
ALTER TABLE `pojistenci`
  ADD PRIMARY KEY (`id_pojistence`);

--
-- Indexes for table `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD PRIMARY KEY (`id_pojisteni`),
  ADD KEY `pojistenipojistnik` (`id_pojistnika`);

--
-- Indexes for table `uzivatele`
--
ALTER TABLE `uzivatele`
  ADD PRIMARY KEY (`uzivatele_id`),
  ADD UNIQUE KEY `jmeno` (`jmeno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pojistenci`
--
ALTER TABLE `pojistenci`
  MODIFY `id_pojistence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `pojisteni`
--
ALTER TABLE `pojisteni`
  MODIFY `id_pojisteni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `uzivatele`
--
ALTER TABLE `uzivatele`
  MODIFY `uzivatele_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pojisteni`
--
ALTER TABLE `pojisteni`
  ADD CONSTRAINT `pojistenipojistnik` FOREIGN KEY (`id_pojistnika`) REFERENCES `pojistenci` (`id_pojistence`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
