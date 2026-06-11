<?php
require_once 'TiketReguler.php';
require_once 'TiketVIP.php';

$tiket1 = new TiketReguler(
    "TK001",
    "Avengers Endgame",
    "18:00",
    2,
    50000
);

$tiket2 = new TiketVIP(
    "TK002",
    "Avatar 3",
    "20:00",
    2,
    75000,
    50000
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Tiket</title>
</head>
<body>

<h2>Tiket Reguler</h2>
<p>Total Harga: Rp <?= number_format($tiket1->hitungTotalHarga(), 0, ',', '.') ?></p>
<?= $tiket1->tampilkanInfoFasilitas(); ?>

<hr>

<h2>Tiket VIP</h2>
<p>Total Harga: Rp <?= number_format($tiket2->hitungTotalHarga(), 0, ',', '.') ?></p>
<?= $tiket2->tampilkanInfoFasilitas(); ?>

</body>
</html>