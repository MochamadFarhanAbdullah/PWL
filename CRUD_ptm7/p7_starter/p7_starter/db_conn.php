<!-- db_conn selamanya akan seperti ini codingannya, klo dijalankan kok keluar putih maka sudah benar -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CRUD_ptm7";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
