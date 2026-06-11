-- phpMyAdmin SQL Dump
-- version 6.0.0-dev+20260519.eecbf60603
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2026 at 07:26 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latihan_pbo_ti_1d_dwi nuha aulia zahra`
--

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int NOT NULL,
  `nama_film` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `jadwal_tayang` datetime NOT NULL,
  `jumlah_kursi` int NOT NULL,
  `harga_dasar_tiket` decimal(10,2) NOT NULL,
  `jenis_studio` enum('Regular','IMAX','Velvet') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipe_audio` varchar(30) DEFAULT NULL,
  `lokasi_baris` varchar(5) DEFAULT NULL,
  `kacamata_3d_id` varchar(20) DEFAULT NULL,
  `efek_gerak_fitur` varchar(50) DEFAULT NULL,
  `bantal_selimut_pack` varchar(30) DEFAULT NULL,
  `layanan_butler` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_film`, `jadwal_tayang`, `jumlah_kursi`, `harga_dasar_tiket`, `jenis_studio`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
(201, 'Dune: Part Three', '2026-06-12 13:00:00', 1, 45000.00, 'Regular', 'Dolby Digital 5.1', 'A12', NULL, NULL, NULL, NULL),
(202, 'Dune: Part Three', '2026-06-12 13:00:00', 2, 45000.00, 'Regular', 'Dolby Digital 5.1', 'A13', NULL, NULL, NULL, NULL),
(203, 'The Batman Part II', '2026-06-12 15:30:00', 1, 50000.00, 'Regular', 'Dolby Atmos', 'C05', NULL, NULL, NULL, NULL),
(204, 'The Batman Part II', '2026-06-12 15:30:00', 1, 50000.00, 'Regular', 'Dolby Atmos', 'C06', NULL, NULL, NULL, NULL),
(205, 'Project Hail Mary', '2026-06-13 10:00:00', 4, 40000.00, 'Regular', 'Standard Stereo', 'F01', NULL, NULL, NULL, NULL),
(206, 'Superman: Legacy', '2026-06-13 19:00:00', 2, 50000.00, 'Regular', 'Dolby Atmos', 'D07', NULL, NULL, NULL, NULL),
(207, 'Avengers: Doomsday', '2026-06-14 14:00:00', 1, 55000.00, 'Regular', 'Dolby Atmos', 'E11', NULL, NULL, NULL, NULL),
(208, 'Avengers: Doomsday', '2026-06-12 17:00:00', 2, 95000.00, 'IMAX', 'IMAX Enhanced Sound', 'H08', 'SG-3D-01', 'Standard IMAX Vibration', NULL, NULL),
(209, 'Avengers: Doomsday', '2026-06-12 17:00:00', 2, 95000.00, 'IMAX', 'IMAX Enhanced Sound', 'H09', 'SG-3D-02', 'Standard IMAX Vibration', NULL, NULL),
(210, 'Interstellar Rerelease', '2026-06-13 13:00:00', 1, 85000.00, 'IMAX', 'IMAX Laser Audio', 'G10', 'SG-3D-05', '4DX Motion Seat Pitching', NULL, NULL),
(211, 'Project Hail Mary', '2026-06-13 16:30:00', 2, 90000.00, 'IMAX', 'IMAX Enhanced Sound', 'F05', 'SG-3D-12', 'Standard IMAX Vibration', NULL, NULL),
(212, 'The Batman Part II', '2026-06-14 20:00:00', 1, 95000.00, 'IMAX', 'IMAX 12-Channel', 'J01', 'SG-3D-20', 'None (2D IMAX)', NULL, NULL),
(213, 'Avatar 3: Fire and Ash', '2026-06-15 11:00:00', 2, 110000.00, 'IMAX', 'IMAX 12-Channel Audio', 'E03', 'SG-3D-99', 'Full Motion 4D & Wind', NULL, NULL),
(214, 'Avatar 3: Fire and Ash', '2026-06-15 11:00:00', 2, 110000.00, 'IMAX', 'IMAX 12-Channel Audio', 'E04', 'SG-3D-10', 'Full Motion 4D & Wind', NULL, NULL),
(215, 'The Batman Part II', '2026-06-12 21:00:00', 2, 250000.00, 'Velvet', NULL, 'V-A1', NULL, NULL, 'Satin Quilt Pack', 'On-Call Service Button'),
(216, 'Dune: Part Three', '2026-06-13 18:30:00', 2, 250000.00, 'Velvet', NULL, 'V-B3', NULL, NULL, 'Premium Down Quilt', 'Dedicated Personal Butler'),
(217, 'Project Hail Mary', '2026-06-14 15:00:00', 2, 220000.00, 'Velvet', NULL, 'V-A2', NULL, NULL, 'Satin Quilt Pack', 'On-Call Service Button'),
(218, 'Avengers: Doomsday', '2026-06-14 19:30:00', 2, 300000.00, 'Velvet', NULL, 'V-C1', NULL, NULL, 'Luxury Silk Comfort Pack', 'VIP Dedicated Butler'),
(219, 'Avengers: Doomsday', '2026-06-14 19:30:00', 2, 300000.00, 'Velvet', NULL, 'V-C2', NULL, NULL, 'Luxury Silk Comfort Pack', 'VIP Dedicated Butler'),
(220, 'Avatar 3: Fire and Ash', '2026-06-15 18:00:00', 2, 300000.00, 'Velvet', NULL, 'V-B1', NULL, NULL, 'Luxury Silk Comfort Pack', 'VIP Dedicated Butler');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
