<?php
require "menu.php";
$menu = array_merge($makanan, $minuman);
if (isset($_POST["pemesan"])) {
    $pemesan = $_POST["pemesan"];
    unset($_POST["pemesan"]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kuitansi Pemesanan</title>
</head>

<body>
    <div class="container">
        <h1>Kuitansi Pemesanan</h1>
        <table>
            <tr>
                <th>No.</th>
                <th>Pesanan</th>
                <th>Qty</th>
                <th>Jumlah</th>
            </tr>
            <?php
            $no = 0;
            $total = 0;
            foreach ($_POST as $name => $qty) {
                if ($qty == "" || $qty == "0") continue;
                $no++;
                $harga = $menu[$name];
                $jumlah = $harga * $qty;
                $total += $jumlah;
            ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= strtoupper(str_replace('_', ' ', $name)) ?></td>
                    <td>Rp. <?= $harga ?> x <?= $qty ?></td>
                    <td>Rp. <?= $jumlah ?></td>
                </tr>
            <?php } ?>
            <tr>
                <th colspan="3">Total Bayar</th>
                <th>Rp. <?= $total ?></th>
            </tr>
        </table>
        <table>
            <tr>
                <td>Pesanan Atas Nama</td>
                <td><?= $pemesan; ?></td>
            </tr>
        </table>
        <a href="index.php">Kembali ke pemesanan menu.</a>
    </div>
</body>

</html>