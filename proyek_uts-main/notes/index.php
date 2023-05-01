<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Keuangan Pribadi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Catatan Pribadi</h2>
        <a href="tambah_notes.php" class="btn btn-primary">Tambah Catatan</a>
        <br><br>
        <div class="row">
            <?php
            require "db_conn.php";
            $query = 'select * from notes where 1';
            $stmt = $conn->prepare($query);
            $stmt->execute();
            while ($data = $stmt->fetch()) {
            ?>
                <div class="col-md-4" style="margin-bottom: 10px;">
                    <div class="card">
                        <div class="card-header">
                            <h5> <?= $data['judul'] ?> </h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                            <ul>
                                <li><strong>Kategori:</strong> <?= $data['kategori'] ?></li>
                                <li><strong>Tanggal:</strong> <?= $data['tanggal'] ?></li>
                            </ul>
                            </p>
                            <form action="aksi_notes.php" method="post" onsubmit="return confirm('Apakah yakin akan menghapus data?')">
                                <a href="edit_notes.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edt</a> ||

                                <input type="hidden" name="del" value="<?= $data['id'] ?>">
                                <input type="submit" name="aksi" value="Hps" class="btn btn-danger btn-sm">
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>