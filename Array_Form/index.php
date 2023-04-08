<?php
require "menu.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pilihan Menu</title>
</head>

<body>
    <div class="container">
        <h1>Pilihan Menu</h1>
        <form action="kuitansi.php" method="post">
            <table class="table">
                <tr>
                    <th colspan="3">Makanan</th>
                </tr>
                <tr>
                    <th>Makanan</th>
                    <th>Harga</th>
                    <th>Qty</th>
                </tr>
                <?php foreach ($makanan as $key => $val) : ?>
                    <tr>
                        <td><?= strtoupper($key) ?></td>
                        <td><?= $val ?></td>
                        <td><input type="text" name="<?= $key ?>"></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th colspan="3">Minuman</th>
                </tr>
                <tr>
                    <th>Minuman</th>
                    <th>Harga</th>
                    <th>Qty</th>
                </tr>
                <?php foreach ($minuman as $key => $val) : ?>
                    <tr>
                        <td><?= strtoupper($key) ?></td>
                        <td><?= $val ?></td>
                        <td><input type="text" name="<?= $key ?>"></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3">
                        <input type="submit" value="Hitung Total">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>