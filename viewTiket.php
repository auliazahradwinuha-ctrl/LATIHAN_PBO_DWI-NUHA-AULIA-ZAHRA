<?php
// =========================================================================
// 1. KONEKSI DATABASE
// =========================================================================
$host = "localhost";
$user = "root";
$pass = "";
$db   = "toko"; // Sesuaikan dengan nama database Anda

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// =========================================================================
// 2. STRUKTUR CLASS OOP (INHERITANCE & POLYMORPHISM)
// =========================================================================
abstract class Tiket {
    public $namaFilm;
    public $hargaDasarTiket;

    public function __construct($namaFilm, $hargaDasarTiket) {
        $this->namaFilm = $namaFilm;
        $this->hargaDasarTiket = $hargaDasarTiket;
    }

    abstract public function hitungTotalHarga($jumlah_kursi);
    abstract public function renderAtributUnik();
}

class TiketRegular extends Tiket {
    private $tipeAudio;
    private $lokasiBaris;

    public function __construct($namaFilm, $hargaDasarTiket, $tipeAudio, $lokasiBaris) {
        parent::__construct($namaFilm, $hargaDasarTiket);
        $this->tipeAudio = $tipeAudio;
        $this->lokasiBaris = $lokasiBaris;
    }

    public function hitungTotalHarga($jumlah_kursi) {
        return $jumlah_kursi * $this->hargaDasarTiket;
    }

    public function renderAtributUnik() {
        return "<li><b>Audio:</b> {$this->tipeAudio}</li><li><b>Posisi:</b> {$this->lokasiBaris}</li>";
    }
}

class TiketIMAX extends Tiket {
    private $kacamata3dId;
    private $efekGerakFitur;

    public function __construct($namaFilm, $hargaDasarTiket, $kacamata3dId, $efekGerakFitur) {
        parent::__construct($namaFilm, $hargaDasarTiket);
        $this->kacamata3dId = $kacamata3dId;
        $this->efekGerakFitur = $efekGerakFitur;
    }

    public function hitungTotalHarga($jumlah_kursi) {
        return ($jumlah_kursi * $this->hargaDasarTiket) + 35000;
    }

    public function renderAtributUnik() {
        $statusGerak = $this->efekGerakFitur ? "Aktif (4DX)" : "Tidak Aktif";
        return "<li><b>ID Kacamata 3D:</b> {$this->kacamata3dId}</li><li><b>Efek Gerak:</b> {$statusGerak}</li>";
    }
}

class TiketVelvet extends Tiket {
    private $bantalSelimutPack;
    private $layananButler;

    public function __construct($namaFilm, $hargaDasarTiket, $bantalSelimutPack, $layananButler) {
        parent::__construct($namaFilm, $hargaDasarTiket);
        $this->bantalSelimutPack = $bantalSelimutPack;
        $this->layananButler = $layananButler;
    }

    public function hitungTotalHarga($jumlah_kursi) {
        return ($jumlah_kursi * $this->hargaDasarTiket) * 1.50;
    }

    public function renderAtributUnik() {
        $statusButler = $this->layananButler ? "Termasuk Layanan Panggilan" : "Tidak Ada";
        return "<li><b>Fasilitas:</b> {$this->bantalSelimutPack}</li><li><b>Layanan Butler:</b> {$statusButler}</li>";
    }
}

// =========================================================================
// 3. PENGAMBILAN DATA SECARA DINAMIS & PENGELOMPOKAN (FACTORY W/ ARRAYS)
// =========================================================================
$query = "SELECT * FROM pesanan_tiket";
$result = $conn->query($query);

// Wadah pengelompokan komponen antarmuka
$list_pesanan = [
    'Regular' => [],
    'IMAX'    => [],
    'Velvet'  => []
];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Memetakan data database ke dalam objek kelas anak yang sesuai
        if ($row['jenis_studio'] == 'Regular') {
            $objekTiket = new TiketRegular($row['nama_film'], $row['harga_dasar'], $row['tipe_audio'], $row['lokasi_baris']);
        } elseif ($row['jenis_studio'] == 'IMAX') {
            $objekTiket = new TiketIMAX($row['nama_film'], $row['harga_dasar'], $row['kacamata_3d_id'], $row['efek_gerak_fitur']);
        } elseif ($row['jenis_studio'] == 'Velvet') {
            $objekTiket = new TiketVelvet($row['nama_film'], $row['harga_dasar'], $row['bantal_selimut_pack'], $row['layanan_butler']);
        }

        // Simpan objek dan jumlah kursi ke dalam grup studionya
        $list_pesanan[$row['jenis_studio']][] = [
            'objek' => $objekTiket,
            'jumlah_kursi' => $row['jumlah_kursi']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pesanan Tiket Bioskop</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f6f9; margin: 0; padding: 20px; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { text-align: center; color: #333; margin-bottom: 30px; }
        .studio-group { margin-bottom: 40px; }
        .studio-title { font-size: 24px; font-weight: bold; padding-bottom: 10px; border-bottom: 3px solid #ccc; margin-bottom: 15px; }
        .title-Regular { color: #2ecc71; border-color: #2ecc71; }
        .title-IMAX { color: #3498db; border-color: #3498db; }
        .title-Velvet { color: #9b59b6; border-color: #9b59b6; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 100px)); gap: 20px; }
        .card { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); border-top: 5px solid #ccc; }
        .card-Regular { border-top-color: #2ecc71; }
        .card-IMAX { border-top-color: #3498db; }
        .card-Velvet { border-top-color: #9b59b6; }
        .film-title { font-size: 20px; margin: 0 0 10px 0; color: #2c3e50; }
        ul { padding-left: 20px; margin: 10px 0; color: #555; }
        .total-harga { font-size: 18px; color: #e74c3c; font-weight: bold; margin-top: 15px; border-top: 1px dashed #ddd; padding-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h1>🎟️ Daftar Tiket Penonton Bioskop (Tahap 6)</h1>

    <?php foreach ($list_pesanan as $jenis_studio => $items): ?>
        <div class="studio-group">
            <div class="studio-title title-<?= $jenis_studio; ?>">Studio <?= $jenis_studio; ?></div>
            
            <?php if (empty($items)): ?>
                <p style="color: #888; font-style: italic;">Belum ada pesanan tiket untuk tipe studio ini.</p>
            <?php else: ?>
                <div class="grid">
                    <?php foreach ($items as $item): 
                        $tiket = $item['objek'];
                        $kursi = $item['jumlah_kursi'];
                    ?>
                        <div class="card card-<?= $jenis_studio; ?>">
                            <h3 class="film-title"><?= htmlspecialchars($tiket->namaFilm); ?></h3>
                            <ul>
                                <li><b>Harga Dasar:</b> Rp <?= number_format($tiket->hargaDasarTiket, 0, ',', '.'); ?></li>
                                <li><b>Jumlah Tiket:</b> <?= $kursi; ?> Kursi</li>
                                <?= $tiket->renderAtributUnik(); ?>
                            </ul>
                            <div class="total-harga">
                                Total: Rp <?= number_format($tiket->hitungTotalHarga($kursi), 0, ',', '.'); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
<?php $conn->close(); ?>