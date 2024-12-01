-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2024 at 08:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gskola`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(20) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `e_mail` varchar(50) NOT NULL,
  `k_ime` varchar(20) NOT NULL,
  `lozinka` varchar(20) NOT NULL,
  `uloga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `e_mail`, `k_ime`, `lozinka`, `uloga`) VALUES
(1, 'Admin', 'Adminović', 'admin@ferit.hr', 'admin', '123456', 'admin'),
(2, 'Matija', 'Mihalec', 'mmatty1337@gmail.com', 'McHern', '123456', 'kupac'),
(3, 'Vjekoslav', 'Mihalec', 'vjekoslav.mihalec@gmail.com', 'Vjekara', 'BenTen10', 'kupac'),
(4, 'Adriano', 'Kresić', 'akres13@gmail.com', 'akres13', 'asdf', 'kupac'),
(5, 'Luka', 'Morović', 'mora@wom2.ro', 'MoraTrollsYou', 'lol123', 'kupac'),
(6, 'Matija', 'McBrain', 'mmatty1337@gmail.com', 'Matty1337', '123', 'kupac');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(5) NOT NULL,
  `proizvod` varchar(100) NOT NULL,
  `opis` varchar(1000) NOT NULL,
  `cijena` varchar(100) NOT NULL,
  `slika` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_croatian_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `proizvod`, `opis`, `cijena`, `slika`) VALUES
(1, 'Picking Lesson 1', 'U ovoj lekciji učite trzati.', '19.99', 'https://www.guitarlessondojo.com/wp-content/uploads/2020/04/Guitar-Strumming-Basics-Cover-Image.png'),
(3, 'Blues Lesson 1', 'SRV te uči blues!', '999.99', 'https://guitarspace.org/wp-content/uploads/2022/02/Stevie-Ray-Vaughan.png'),
(4, 'Blues Lesson 2', 'Jimi Hendrix style lickovi i chord progressioni!', '130.99', 'https://images.fineartamerica.com/images/artworkimages/medium/3/jimi-hendrix-chapunk-sandia-transparent.png'),
(5, 'Drum Lesson 1', 'Lesson sa McBrainom', '420', 'https://drummertothebone.com/cdn/shop/articles/Lars_Ulrich_s_recordings_outside_Metallica_-_Blog_Featured_Image.png?v=1710949712&width=1100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
