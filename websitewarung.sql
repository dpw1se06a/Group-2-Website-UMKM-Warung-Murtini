-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 08:21 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websitewarung`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id_about` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id_about`, `judul`, `konten`) VALUES
(2, 'Tentang Kami', 'Selamat datang di Warung Murtini!\r\nBerdiri sejak 2 Februari 2022, Warung Murtini adalah tempat di mana kelezatan hidangan khas Indonesia bertemu dengan kisah hidup yang dipenuhi dengan semangat dan kegigihan. Terletak di Jl. Sidodadi No.1176, Legok, Purwokerto Kidul, Purwokerto Selatan, Banyumas, Jawa Tengah, kami hadir dengan semangat untuk menghadirkan pengalaman kuliner yang tak terlupakan bagi Anda. Di sini, setiap hidangan bukan hanya sebuah sajian, tetapi juga sebuah cerita. Kami mempersembahkan rasa rumahan dan cita rasa autentik Indonesia yang telah menjadi bagian dari perjalanan hidup kami. Dari setiap suapan, Anda akan merasakan kehangatan dan kebahagiaan yang kami tuangkan dalam setiap hidangan. Mari bergabung dengan kami di Warung Murtini, tempat di mana makanan lezat dan kisah hidup saling bersatu dalam harmoni. Terima kasih atas dukungan dan kepercayaan Anda kepada kami. Jadikan setiap kunjungan Anda sebagai petualangan kuliner yang memuaskan! Selamat menikmati sajian khas Indonesia di Warung Murtini!'),
(4, 'Misi', 'Misi Warung Murtini!\r\nsing penting laris'),
(5, 'Visi', 'Visi Warung Murtini!sing penting makmur');

-- --------------------------------------------------------

--
-- Table structure for table `minuman`
--

CREATE TABLE `minuman` (
  `id_minuman` int(11) DEFAULT NULL,
  `nama_minuman` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minuman`
--

INSERT INTO `minuman` (`id_minuman`, `nama_minuman`, `deskripsi`, `harga`, `gambar`) VALUES
(0, 'es teh', 'es teh yang akan menyegarkan dahagamu', 3000, 'esteh.jpg'),
(NULL, 'es jeruk', 'es jeruk yang akan menyegarkan dahagamu', 4000, 'esjeruk.jpg'),
(NULL, 'es campur', 'es campur yang akan menyegarkan dahagamu', 5000, 'escampur.jpg'),
(NULL, 'pop ice', 'pop ice yang akan menyegarkan dahagamu', 4000, 'popice.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paketan`
--

CREATE TABLE `paketan` (
  `id_paketan` int(11) NOT NULL,
  `nama_paketan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paketan`
--

INSERT INTO `paketan` (`id_paketan`, `nama_paketan`, `deskripsi`, `harga`, `gambar`) VALUES
(0, 'Paket Nasi Ayam Rendang', 'Ayam Rendang + Nasi yang siap memanjakan seleramu', 22000, 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/e4c67a1b-d58b-4563-93a9-63c29963193c_Go-Biz_20220323_211937.jpeg?auto=format'),
(2, 'Paket Nasi Ayam Goreng Serundeng', 'Ayam Goreng Serundeng Kumplit + Nasi', 22000, 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/ad5dc77e-3aac-4f06-aa1e-ddfe50961a5a_Go-Biz_20220424_003948.jpeg?auto=format'),
(3, 'Paket Nasi Ayam Panggang', 'Ayam Panggang + Nasi Siap Memanjakan Selera', 22000, 'https://i.gojekapi.com/darkroom/gofood-indonesia/v2/images/uploads/388c27fd-b9f3-41bc-b41d-751a37a90e67_Go-Biz_20220323_211643.jpeg?auto=format'),
(4, 'Paket Nasi Ayam Goreng', 'Ayam Goreng + Nasi yang siap memanjakan seleramu', 22000, 'https://www.static-src.com/wcsstore/Indraprastha/images/catalog/full//catalog-image/96/MTA-120096247/no-brand_paket-nasi-ayam-goreng-siap-makan_full01.jpg'),
(5, 'Paket Nasi Ati Ampela', 'Ati Ampela + Nasi yang siap memanjakan seleramu', 22000, 'https://down-id.img.susercontent.com/file/id-11134207-7qul4-lf2slgzl1l0g40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indexes for table `paketan`
--
ALTER TABLE `paketan`
  ADD PRIMARY KEY (`id_paketan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `paketan`
--
ALTER TABLE `paketan`
  MODIFY `id_paketan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
