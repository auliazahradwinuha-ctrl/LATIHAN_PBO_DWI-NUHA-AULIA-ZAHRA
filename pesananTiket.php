CREATE TABLE IF NOT EXISTS `pesanan_tiket` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `nama_film` VARCHAR(100) NOT NULL,
    `harga_dasar` INT NOT NULL,
    `jenis_studio` ENUM('Regular', 'IMAX', 'Velvet') NOT NULL,
    `jumlah_kursi` INT NOT NULL,
    -- Atribut Khusus Regular
    `tipe_audio` VARCHAR(50) NULL,
    `lokasi_baris` VARCHAR(20) NULL,
    -- Atribut Khusus IMAX
    `kacamata_3d_id` VARCHAR(50) NULL,
    `efek_gerak_fitur` TINYINT(1) NULL,
    -- Atribut Khusus Velvet
    `bantal_selimut_pack` VARCHAR(50) NULL,
    `layanan_butler` TINYINT(1) NULL
);

-- Mengisi data sampel untuk simulasi dinamis
INSERT INTO `pesanan_tiket` (`nama_film`, `harga_dasar`, `jenis_studio`, `jumlah_kursi`, `tipe_audio`, `lokasi_baris`, `kacamata_3d_id`, `efek_gerak_fitur`, `bantal_selimut_pack`, `layanan_butler`) VALUES
('Avengers: Endgame', 40000, 'Regular', 3, 'Dolby Atmos 7.1', 'Baris F - Kursi 5', NULL, NULL, NULL, NULL),
('Interstellar (Re-Run)', 60000, 'IMAX', 2, NULL, NULL, 'IMX-3D-99A', 1, NULL, NULL),
('Inception', 150000, 'Velvet', 2, NULL, NULL, NULL, NULL, 'Premium Gold Pack', 1),
('The Matrix', 40000, 'Regular', 1, 'DTS:X Ultra', 'Baris C - Kursi 12', NULL, NULL, NULL, NULL);