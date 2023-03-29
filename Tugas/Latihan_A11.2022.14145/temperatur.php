<?php
if (isset($_POST['celcius'])) {
    $celcius = $_POST['celcius'];
    $fahrenheit = ($celcius * 9 / 5) + 32;
} else {
    $celcius = "";
    $fahrenheit = "";
}
?>
<h2>Konversi Temperatur</h2>
<form action="temperatur.php" method="POST">
    Masukkan suhu dalam celcius: <input type="text" name="celcius" value="<?php echo $celcius; ?>"><br><br>
    <input type="submit" value="Konversi">
</form>
<?php
if ($fahrenheit !== "") {
    echo "<br>Hasil konversi: $celcius derajat Celcius = $fahrenheit derajat Fahrenheit";
}
?>