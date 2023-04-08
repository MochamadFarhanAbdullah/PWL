<?php
if (isset($_POST['submit'])) {
    $temp = $_POST['temperature'];
    $convert = $_POST['convert'];
    $convert2 = $_POST['convert2'];

    if ($convert == 'fahrenheit' && $convert2 == 'celcius') {
        $hasil = ($temp - 32) * 5 / 9;
        $symbol = 'C';
    } else if ($convert == 'celcius' && $convert2 == 'fahrenheit') {
        $hasil = ($temp * 9 / 5) + 32;
        $symbol = 'F';
    } else if ($convert == 'celcius' && $convert2 == 'kelvin') {
        $hasil = $temp + 273.15;
        $symbol = 'K';
    } else if ($convert == 'kelvin' && $convert2 == 'celcius') {
        $hasil = $temp - 273.15;
        $symbol = 'C';
    } else if ($convert == 'kelvin' && $convert2 == 'fahrenheit') {
        $hasil = 1.8 * ($temp - 273) + 32;
        $symbol = 'F';
    } else if ($convert == 'fahrenheit' && $convert2 == 'kelvin') {
        $hasil = ($temp + 459.67) * 5 / 9;
        $symbol = 'K';
    }

    echo "<h2>Hasil konversi: $hasil &deg;$symbol</h2>";
}
?>

<h1>Konversi Suhu</h1>
<form method="post" action="temperatur.php">
    <input type="text" name="temperature" required><br><br>
    <select name="convert" id="">
        <option value="celcius">celcius</option>
        <option value="kelvin">kelvin</option>
        <option value="fahrenheit">fahrenheit</option>
    </select>
    <select name="convert2" id="">
        <option value="celcius">celcius</option>
        <option value="kelvin">kelvin</option>
        <option value="fahrenheit">fahrenheit</option>
    </select>
    <input type="submit" name="submit" value="Konversi">
</form>
<a href="logout.php">Keluar</a>
<!-- <a href="logout.php">Keluar</a> -->