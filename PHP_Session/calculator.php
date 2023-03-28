<?php
include "function.php";


$angka1 = null;
$angka1 = null;
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
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kalkulator</title>
</head>

<body>
    <div>
        <div>
            <div>
                <h2>Kalkulator Keren Sekali
                    <a href="history.php">Lihat riwayat &raquo;</a>
                </h2>
                <form action="" method="post">
                    <table>
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
</body>

</html>