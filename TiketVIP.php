<?php
require_once 'Tiket.php';

class TiketVIP extends Tiket
{
    private $biayaTambahan;

    public function __construct($id_tiket, $nama_film, $jadwal_tayang, $jumlah_kursi, $hargaDasarTiket, $biayaTambahan)
    {
        parent::__construct(
            $id_tiket,
            $nama_film,
            $jadwal_tayang,
            $jumlah_kursi,
            $hargaDasarTiket
        );

        $this->biayaTambahan = $biayaTambahan;
    }

    public function hitungTotalHarga()
    {
        return ($this->jumlah_kursi * $this->hargaDasarTiket) + $this->biayaTambahan;
    }

    public function tampilkanInfoFasilitas()
    {
        return "
        <ul>
            <li>Recliner Seat</li>
            <li>Snack Gratis</li>
            <li>Minuman Gratis</li>
            <li>Layar Premium</li>
        </ul>";
    }
}
?>