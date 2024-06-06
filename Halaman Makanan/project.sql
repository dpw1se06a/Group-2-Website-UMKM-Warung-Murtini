-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 08:29 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `konten` text NOT NULL,
  `kategori` varchar(300) NOT NULL,
  `gambar` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `judul`, `konten`, `kategori`, `gambar`, `created_at`) VALUES
(1, 'Jokowi Nge-vlog Makan Mie Gacoan Bareng Basuki di NTB: Pedes Sekali\r\n', 'Jakarta - Presiden Joko Widodo (Jokowi) membuat vlog mencicipi Mie Gacoan saat berkunjung ke Mataram, Nusa Tenggara Barat (NTB). Jokowi ditemani Menteri PUPR Basuki Hadimuljono hingga Mentan Andi Amran Sulaiman.\r\nMomen ini dibagikan di Instagram @jokowi, Rabu (1/5/2024). Jokowi mengajak semua pihak untuk mendukung usaha lokal.\r\n\r\n\"Menikmati kuliner andalan dan berjumpa masyarakat di Mataram tadi malam. Mari kita dukung pengembangan usaha lokal yang juga meningkatkan perekonomian daerahnya,\" tulis Jokowi di postingan tersebut.\r\n', 'Politik', 'https://picsum.photos/200/100', '2024-05-02 08:38:18'),
(2, 'Jokowi Nge-vlog Makan Mie Gacoan Bareng Basuki di NTB: Pedes Sekali\r\n', 'Jakarta - Presiden Joko Widodo (Jokowi) membuat vlog mencicipi Mie Gacoan saat berkunjung ke Mataram, Nusa Tenggara Barat (NTB). Jokowi ditemani Menteri PUPR Basuki Hadimuljono hingga Mentan Andi Amran Sulaiman.\r\nMomen ini dibagikan di Instagram @jokowi, Rabu (1/5/2024). Jokowi mengajak semua pihak untuk mendukung usaha lokal.\r\n\r\n\"Menikmati kuliner andalan dan berjumpa masyarakat di Mataram tadi malam. Mari kita dukung pengembangan usaha lokal yang juga meningkatkan perekonomian daerahnya,\" tulis Jokowi di postingan tersebut.\r\n', 'Politik', 'https://picsum.photos/200/100', '2024-05-02 08:38:30'),
(3, 'Game Idle Blockchain Terbaru Elysium’s Edge Diumumkan! Adaptasi dari Novel Karya Minato Kushimachi', 'Japan Media Arts resmi mengumumkan Elysium’s Edge, sebuah game blockchain idle baru yang kini tengah dikembangkan, yang mana telah merilis situs beserta X/Twitter resmi untuk kalangan gamer.\r\n\r\nGame ini diangkat berdasarkan novel “Elysium’s Edge ~Paradise Boundary~” yang ditulis Minato Kushimachi dengan gaya science-fiction dan fantasi, yang akan dibuat untuk Web 3.0 dalam pengembangan franchise bentuk novel, anime, dan game kepada para pemain dengan memperkenalkan NFT dan Play to Earn dalam game ini.\r\n\r\n', 'Game', 'https://picsum.photos/200/100', '2024-05-02 08:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `url` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `judul`, `url`, `created_at`) VALUES
(1, 'Gambar 1', 'https://picsum.photos/seed/picsum/600/200', '2024-05-02 09:15:33'),
(2, 'Gambar 1', 'https://picsum.photos/seed/picsum/600/200', '2024-05-02 09:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `Id_makanan` int(11) NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`Id_makanan`, `nama_makanan`, `deskripsi`, `harga`, `gambar`) VALUES
(1, 'Nasi Putih', 'Ini adalah sepiring nasi', 5000, 'nasi.jpg'),
(2, 'Sate Ati Ampela', 'Disini memiliki banyak sekali sate satean yang berbagai macam jenis', 17000, 'sate.jpg'),
(3, 'Ayam Goreng Serundeng', 'Ini ayam yang digoreng dengan cara di kasih luak', 17000, 'ayam_serundeng.jpg'),
(4, 'Ayam Rendang', 'ini adalah ayam dengan campuran bumbu rendang', 17000, 'ayam_rendang.jpg'),
(5, 'Ayam Bakar', 'ini adalah menu ayam dengan cara dibakar dengan bumbu yang khas', 17000, 'ayam_bakar.jpg'),
(6, 'Ayam Goreng ', 'Ini adalah ayam dengan cara digoreng dengan bumbu kuning yang lezat', 17000, 'ayam_goreng.jpg'),
(7, 'Ayam Panggang', 'ini adalah ayam yang dihidangkan dengan cara di panggang dengan bumbu yang khas', 17000, 'ayam_panggang.jpg'),
(8, 'Nasi Putih', 'Ini adalah sebuah nasi putih hangat', 10000, 'nasi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `pesanan` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `nama`, `no_hp`, `pesanan`, `jumlah`) VALUES
(4, 'Afad', '08343478', 'Ayam Goreng Serundeng', 4),
(8, 'Lutfhi', '081987654234', 'Nasi Putih', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `nama`, `no_hp`, `password`) VALUES
(12, 'gide@gmail.com', 'Gide', '081987654234', '123'),
(14, 'wahyu@gmail.com', 'Wahyu', '081987654234', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`Id_makanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `makanan`
--
ALTER TABLE `makanan`
  MODIFY `Id_makanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
