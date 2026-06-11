<?php
require_once 'Tiket.php';

class TiketReguler extends Tiket
{
    public function hitungTotalHarga()
    {
        return $this->jumlah_kursi * $this->hargaDasarTiket;
    }

    public function tampilkanInfoFasilitas()
    {
        return "
        <ul>
            <li>Kursi Standar</li>
            <li>AC</li>
            <li>Audio Standar</li>
        </ul>";
    }
}
?>