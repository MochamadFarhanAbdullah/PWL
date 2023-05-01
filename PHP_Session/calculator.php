<?php
include "function.php";


$angka1 = null;
$angka2 = null;
$hasil = null;
$operator = '+';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];
    $operator = $_POST['operator'];
    $hasil = hitung($angka1, $angka2, $operator);
    addSessionHist($angka1, $angka2, $operator, $hasil);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Kalkulator</title>
</head>

<body>
    <div>
        <div>
            <div class="container">
                <h3>Kalkulator Keren Sekali
                    <a href="history.php">Lihat riwayat &raquo;</a>
                </h3>
                <form action="" method="post">
                    <table class="table table-success table-striped">
                        <tr>
                            <th>Angka 1</th>
                            <th>Opr</th>
                            <th>Angka 2</th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="angka1" value="<?= $angka1 ?>">
                            </td>
                            <td>
                                <select name="operator">
                                    <option value="+" <?= ($operator == '+' ? "selected" : "") ?>>+</option>
                                    <option value="-" <?= ($operator == '-' ? "selected" : "") ?>>-</option>
                                    <option value="x" <?= ($operator == 'x' ? "selected" : "") ?>>x</option>
                                    <option value="/" <?= ($operator == '/' ? "selected" : "") ?>>/</option>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="angka2" value="<?= $angka1 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="submit" value="HITUNG"></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div id="hasil"> Hasilnya adalah : <?= $hasil ?></div>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>