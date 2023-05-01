<!-- SESSION BUTUT
include "fungsi.php";

$nama = null;
$kategori = null;
$jumlah = null;
$keterangan = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $jumlah = $_POST['jumlah'];
    $keterangan = $_POST['keterangan'];
    addSessionHistt($nama, $kategori, $jumlah, $keterangan);
}
 --> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Transaksi Keuangan</h2>
        <!-- <h3>Kalkulator Keren Sekali SESSION BUTUT
                    <a href="riwayat.php">Lihat riwayat &raquo;</a>
                </h3> -->
        <a href="tambah.php" class="btn btn-primary">Tambah Transaksi</a>
        <br><br>
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Nama Transaksi</th>
                <th>Kategori</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
            <?php
            require "db_conn.php";
            $query = 'select * from transaksi where 1';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            $no = 0;
            while ($data = $stmt->fetch()) {
                $no++;
            ?>
                <tr>
                    <td><?= $no; ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= strtoupper($data['kategori']) ?></td>
                    <td style="text-align:right;"><?= number_format($data['jumlah'], 0, ',', '.') ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td>
                        <form action="aksi.php" method="post" onsubmit="return confirm('Apakah yakin akan menghapus data?')">
                            <a href="ngedit.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edt</a> ||

                            <input type="hidden" name="del" value="<?= $data['id'] ?>">
                            <input type="submit" name="aksi" value="Hps" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>