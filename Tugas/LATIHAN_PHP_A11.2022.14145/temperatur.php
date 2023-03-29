<?php
if (isset($_POST['submit'])) {
    $temp = $_POST['temperature'];
    $convert = $_POST['convert'];

    if ($convert == 'celcius') {
        $result = ($temp - 32) * 5 / 9;
        $symbol = 'C';
    } elseif ($convert == 'fahrenheit') {
        $result = ($temp * 9 / 5) + 32;
        $symbol = 'F';
    } else {
        $result = $temp - 273.15;
        $symbol = 'K';
    }

    echo "<h2>Hasil konversi: $result &deg;$symbol</h2>";
}
?>

<h1>Konversi Suhu</h1>
<form method="post" action="temperatur.php">
    <input type="text" name="temperature" placeholder="Masukkan suhu" required><br><br>
    <input type="radio" name="convert" value="celcius" required>Celcius ke Fahrenheit<br>
    <input type="radio" name="convert" value="fahrenheit">Fahrenheit ke Celcius<br>
    <input type="radio" name="convert" value="kelvin">Celcius ke Kelvin<br><br>
    <input type="submit" name="submit" value="Konversi">
</form>
<ul>
    <li>
        <a href="logout.php">Keluar</a>
    </li>
</ul>
<!-- <a href="logout.php">Keluar</a> -->