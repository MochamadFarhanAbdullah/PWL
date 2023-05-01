<?php //edit
require "db_conn.php";
$query = 'select * from transaksi where id = ?';
$stmt = $conn->prepare($query);
$stmt->execute(array($_GET['id']));
$data = $stmt->fetch();
if ($data != null) :
?>
    <!DOCTYPE html>
    <title>Form Tambah Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body>
        <div class="container" style="width:740px;">
            <h1>Edit Transaksi</h1>
            <hr>
            <form action="aksi.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
                <div class="mb-3 row">
                    <label for="nama" class="col-md-2">Nama Transaksi</label>
                    <div class="col-md-10"><input type="text" name="nama" id="nama" value="<?= $data['nama'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah" class="col-md-2">jumlah</label>
                    <div class="col-md-10"><input type="text" name="jumlah" id="jumlah" value="<?= $data['jumlah'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="kategori" class="col-md-2">kategori</label>
                    <div class="col-md-10"><input type="text" name="kategori" id="kategori" value="<?= $data['kategori'] ?>" placeholder="pengeluaran atau pemasukan" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="keterangan" class="col-md-2">Keterangan</label>
                    <div class="col-md-10"> <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?= $data['keterangan'] ?></textarea> </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-2 col-md-10">
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                        <input type="submit" name="aksi" value="Edit Data" class="btn btn-primary">
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div>Data barang dengan ID tersebut tidak ditemukan.</div>
        <?php endif; ?>
        </div>
    </body>
    </html>