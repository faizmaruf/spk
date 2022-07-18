-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 03:02 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemain`
--

CREATE TABLE `pemain` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(155) NOT NULL,
  `fisik` varchar(155) NOT NULL,
  `passing` varchar(155) NOT NULL,
  `dribbling` varchar(155) NOT NULL,
  `shooting` varchar(155) NOT NULL,
  `heading` varchar(155) NOT NULL,
  `kognitif` varchar(155) NOT NULL,
  `preferensi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemain`
--

INSERT INTO `pemain` (`id`, `nama`, `posisi`, `fisik`, `passing`, `dribbling`, `shooting`, `heading`, `kognitif`, `preferensi`) VALUES
(773, 'Rendy Apriansyah S', 'Anchor', '7', '6', '5', '7', '5', '8', '0.63245004826557'),
(774, 'Tegar Rizanu Mulyana', 'Anchor', '6', '7', '6', '6', '7', '7', '0.71611459715521'),
(775, 'Deni Setiawan', 'Anchor', '4', '6', '7', '4', '4', '5', '0.56091049978044'),
(776, 'Lega Ferdiyansyah', 'Anchor', '8', '7', '6', '7', '7', '7', '0.76628714374532'),
(777, 'Muhammad Rivaldi', 'Anchor', '4', '7', '6', '5', '6', '6', '0.64827358695679'),
(778, 'Arlan Ferdy Sanjaya', 'Anchor', '4', '6', '6', '5', '7', '6', '0.56346638940967'),
(779, 'Dwi Kurniadi', 'Anchor', '3', '4', '6', '5', '7', '5', '0.33327440321564'),
(780, 'Eka Sriyanto', 'Anchor', '5', '4', '3', '6', '4', '5', '0.33015181742206'),
(781, 'Putra Fajar A', 'Anchor', '3', '3', '4', '4', '4', '5', '0.15795349653393'),
(782, 'Farhan Bayu Irawan', 'Anchor', '6', '7', '6', '7', '4', '6', '0.73517816632724'),
(783, 'Galang Rifky Ramadhan', 'Anchor', '7', '7', '5', '6', '4', '6', '0.70319270427921'),
(784, 'Muhammad Rifai', 'Anchor', '8', '8', '6', '8', '7', '7', '0.83950650516106'),
(785, 'Fu\'ad Khairi Asyraf', 'Anchor', '5', '7', '7', '6', '6', '6', '0.71366020419983'),
(786, 'Dani Lasi Muhsinun', 'Anchor', '3', '3', '4', '5', '3', '5', '0.18117225340963'),
(787, 'Riky Ramadhani Gandi', 'Flank', '5', '6', '7', '7', '4', '6', '0.63768950331397'),
(788, 'Muhammad Ikhsan', 'Flank', '7', '8', '7', '7', '7', '6', '0.84365386053134'),
(789, 'Bayu Aji Saputra', 'Flank', '7', '5', '6', '7', '6', '6', '0.54313759014306'),
(790, 'Rhaka Shay Pualam', 'Flank', '5', '6', '7', '5', '6', '6', '0.60089590076773'),
(791, 'Raditya Afifyansah', 'Flank', '5', '4', '4', '6', '5', '5', '0.34198941299587'),
(792, 'Robby Muhammad Fajri', 'Flank', '6', '6', '8', '6', '4', '7', '0.65718141859066'),
(793, 'Satya Sheva Purnomo', 'Flank', '5', '6', '7', '6', '5', '7', '0.62096380070018'),
(794, 'Halichal Eka Nugraha', 'Flank', '6', '5', '4', '4', '3', '5', '0.43926634752802'),
(795, 'Izzan Muhammad Musa', 'Flank', '7', '7', '8', '8', '7', '7', '0.82977499934998'),
(796, 'Muhammad Mufid Mubarok', 'Flank', '8', '6', '8', '8', '7', '8', '0.72143173323936'),
(797, 'Rihco Ary Prayoga', 'Flank', '3', '3', '4', '5', '5', '5', '0.18182488956569'),
(798, 'Ghatan Afdali Adam', 'Flank', '8', '7', '8', '7', '7', '8', '0.81915416279282'),
(799, 'Reynaldi Ahmad Dinar', 'Flank', '7', '7', '5', '7', '4', '6', '0.72252568080689'),
(800, 'Franscois', 'Flank', '4', '4', '5', '3', '3', '5', '0.29658714057184'),
(801, 'Rahman Efendi', 'Flank', '3', '4', '6', '5', '3', '5', '0.33197091235649'),
(802, 'M.Rizki', 'Flank', '8', '7', '9', '9', '8', '8', '0.86575632856346'),
(803, 'Rahmat Illahi', 'Pivot', '6', '6', '6', '6', '5', '6', '0.62048777626293'),
(804, 'Iqbal Rifa\'i', 'Pivot', '8', '7', '8', '7', '5', '8', '0.81798369075983'),
(805, 'Unggul Pandowo', 'Pivot', '4', '4', '5', '4', '4', '5', '0.30671556884527'),
(806, 'Fadhil Figo Ahmad Fahrezie', 'Pivot', '7', '5', '7', '5', '5', '6', '0.5272810506463'),
(807, 'Jeni Firdaus', 'Pivot', '3', '2', '5', '5', '5', '4', '0.14396293923925'),
(808, 'Adi Lugi Pamungkas', 'Pivot', '8', '7', '8', '8', '8', '7', '0.84226302219191');

-- --------------------------------------------------------

--
-- Table structure for table `pemainterpilih`
--

CREATE TABLE `pemainterpilih` (
  `id` int(255) NOT NULL,
  `nama` varchar(155) NOT NULL,
  `posisi` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemainterpilih`
--

INSERT INTO `pemainterpilih` (`id`, `nama`, `posisi`) VALUES
(1, 'M.Rizki', 'Flank'),
(2, 'Iqbal Rifa\'i', 'Flank'),
(3, 'Muhammad Mufid Mubarok', 'Flank'),
(4, 'Galang Rifky Ramadhan', 'Anchor'),
(5, 'Izzan Muhammad Musa', 'Flank'),
(6, 'Lega Ferdiyansyah', 'Anchor'),
(7, 'Satya Sheva Purnomo', 'Flank'),
(8, 'Adi Lugi Pamungkas', 'Pivot'),
(9, 'Ghatan Afdali Adam', 'Flank'),
(10, 'Arlan Ferdy Sanjaya', 'Anchor'),
(11, 'Muhammad Rifai', 'Anchor'),
(12, 'Fadhil Figo Ahmad Fahrezie', 'Pivot'),
(13, 'Rendy Apriansyah S', 'Anchor'),
(14, 'Riky Ramadhani Gandi', 'Flank');

-- --------------------------------------------------------

--
-- Table structure for table `tblperbandingan`
--

CREATE TABLE `tblperbandingan` (
  `fisik` varchar(155) NOT NULL,
  `passing` varchar(155) NOT NULL,
  `dribbling` varchar(155) NOT NULL,
  `shooting` varchar(155) NOT NULL,
  `heading` varchar(155) NOT NULL,
  `kognitif` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblperbandingan`
--

INSERT INTO `tblperbandingan` (`fisik`, `passing`, `dribbling`, `shooting`, `heading`, `kognitif`) VALUES
('1.000', '0.333', '1.000', '1.000', '7.000', '7.000'),
('3.000', '1.000', '3.000', '3.000', '9.000', '9.000'),
('1.000', '0.333', '1.000', '1.000', '7.000', '7.000'),
('1.000', '0.333', '1.000', '1.000', '7.000', '5.000'),
('0.143', '0.111', '0.143', '0.143', '0.100', '0.333'),
('0.143', '0.111', '0.143', '0.200', '3.000', '1.000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemain`
--
ALTER TABLE `pemain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemainterpilih`
--
ALTER TABLE `pemainterpilih`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemain`
--
ALTER TABLE `pemain`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=809;

--
-- AUTO_INCREMENT for table `pemainterpilih`
--
ALTER TABLE `pemainterpilih`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
