<?php

// =========================================================================
// 1. KELAS INDUK (ABSTRACT CLASS)
// =========================================================================
abstract class Tiket {
    // Properti umum yang diwariskan ke semua kelas anak
    protected $namaFilm;
    protected $hargaDasar;

    // Constructor kelas induk
    public function __construct($namaFilm, $hargaDasar) {
        $this->namaFilm = $namaFilm;
        $this->hargaDasar = $hargaDasar;
    }

    // Method abstract yang wajib diimplementasikan oleh setiap kelas anak
    abstract public function cetakInfo();
}

// =========================================================================
// 2. KELAS ANAK (SUBCLASS) KONKRIT
// =========================================================================

// Subclass 1: TiketRegular
class TiketRegular extends Tiket {
    // Properti tambahan spesifik TiketRegular
    private $tipeAudio;   // Contoh: Dolby Atmos, DTS:X
    private $lokasiBaris; // Contoh: Baris A, Baris F

    public function __construct($namaFilm, $hargaDasar, $tipeAudio, $lokasiBaris) {
        // Mengirimkan properti umum ke constructor kelas induk (Tiket)
        parent::__construct($namaFilm, $hargaDasar);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function cetakInfo() {
        echo "<h3>[REGULAR CLASS]</h3>";
        echo "Film: " . $this->namaFilm . "<br>";
        echo "Harga: Rp " . number_format($this->hargaDasar, 0, ',', '.') . "<br>";
        echo "Tipe Audio: " . $this->tipeAudio . "<br>";
        echo "Lokasi Baris: " . $this->lokasiBaris . "<br>";
        echo "<hr>";
    }
}

// Subclass 2: TiketIMAX
class TiketIMAX extends Tiket {
    // Properti tambahan spesifik TiketIMAX
    private $kacamata3dId;    // Contoh: IMX-3D-001
    private $efekGerakFitur;  // Contoh: true (jika studio mendukung motion seat)

    public function __construct($namaFilm, $hargaDasar, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($namaFilm, $hargaDasar);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function cetakInfo() {
        echo "<h3>[IMAX 3D CLASS]</h3>";
        echo "Film: " . $this->namaFilm . "<br>";
        echo "Harga: Rp " . number_format($this->hargaDasar, 0, ',', '.') . "<br>";
        echo "ID Kacamata 3D: " . $this->kacamata3dId . "<br>";
        echo "Fitur Efek Gerak: " . ($this->efekGerakFitur ? "Tersedia (4DX Motion)" : "Tidak Tersedia") . "<br>";
        echo "<hr>";
    }
}

// Subclass 3: TiketVelvet
class TiketVelvet extends Tiket {
    // Properti tambahan spesifik TiketVelvet
    private $bantalSelimutPack; // Contoh: Premium Silk Pack
    private $layananButler;      // Contoh: true (jika mendapatkan pelayan pribadi)

    public function __construct($namaFilm, $hargaDasar, $bantalSelimutPack, $layananButler) {
        parent::__construct($namaFilm, $hargaDasar);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function cetakInfo() {
        echo "<h3>[VELVET SUITE CLASS]</h3>";
        echo "Film: " . $this->namaFilm . "<br>";
        echo "Harga: Rp " . number_format($this->hargaDasar, 0, ',', '.') . "<br>";
        echo "Paket Bantal & Selimut: " . $this->bantalSelimutPack . "<br>";
        echo "Layanan Butler (Pelayan): " . ($this->layananButler ? "Aktif (Tombol Panggilan)" : "Tidak Tersedia") . "<br>";
        echo "<hr>";
    }
}

// =========================================================================
// 3. DEMO IMPLEMENTASI OBJEK
// =========================================================================

echo "<h2>Sistem Manajamen Tiket Bioskop</h2>";

// Menginstansiasi objek dari masing-masing kelas anak
$reg = new TiketRegular("Dune: Part Two", 50000, "Dolby Atmos 7.1", "Baris E - Kursi 10");
$imx = new TiketIMAX("Interstellar (Re-Run)", 90000, "KCM-IMX-99A", true);
$vvt = new TiketVelvet("The Godfather", 250000, "Sutra Blanket & Pillow Pack", true);

// Menjalankan method polimorfisme dari inheritance
$reg->cetakInfo();
$imx->cetakInfo();
$vvt->cetakInfo();