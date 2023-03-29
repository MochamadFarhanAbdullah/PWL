<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['nama_user'])) {
        // Jika session nama_user belum ada, tampilkan halaman login
        echo "
  <h2>Login</h2>
  <form action='index.php' method='POST'>
    <label for='nama_user'>Nama user:</label>
    <input type='text' id='nama_user' name='nama_user'><br><br>
    <input type='submit' value='Login'>
  </form>
  ";
    } else {
        // Jika session nama_user sudah ada, tampilkan menu
        echo "
  <h2>Menu</h2>
  <ul>
    <li><a href='tutorial.php'>List Tutorial PHP</a></li>
    <li><a href='temperatur.php'>Konversi Temperatur</a></li>
    <li><a href='logout.php'>Keluar</a></li>
  </ul>
  ";
    }
    if (isset($_POST['nama_user'])) {
        // Jika form login disubmit dengan nama_user diisi, simpan nama_user di session
        $_SESSION['nama_user'] = $_POST['nama_user'];
    }
    ?>
</body>

</html>