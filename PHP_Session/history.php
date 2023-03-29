<?php
session_start();

if (isset($_GET['del'])) {
    unset($_SESSION['history'][$_GET['del']]);
}
?>
<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <title>Riwayat Perhitungan Kalkulator</title>
</head>

<body>
    <div>
        <div class="container">
            <header>
                <h3>Riwayat Perhitungan</h3>
                <a href="calculator.php">&laquo; Kembali ke Kalkulator</a>
            </header>
            <table class="table table-success table-striped">
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