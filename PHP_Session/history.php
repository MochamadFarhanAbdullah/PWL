<?php
session_start();

if (isset($_GET['del'])) {
    unset($_SESSION['history'][$_GET['del']]);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Riwayat Perhitungan Kalkulator</title>
</head>

<body>
    <div>
        <div>
            <header>
                <h1>Riwayat Perhitungan</h1>
                <a href="calculator.php">&laquo; Kembali ke Kalkulator</a>
            </header>
            <table>
                <?php foreach ($_SESSION['history'] as $idx => $data) : ?>
                    <tr>
                        <?php
                        if ($data[1] == null || $data[0] == null) {
                            $data[0] = 0;
                            $data[1] = 0;
                        }
                        ?>
                        <th><?= $data[0] ?></th>
                        <th><?= $data[2] ?></th>
                        <th><?= $data[1] ?></th>
                        <th><?= $data[3] ?></th>
                        <td>
                            <a href="history.php?del=<?= $idx ?>"> Hapus </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</body>

</html>