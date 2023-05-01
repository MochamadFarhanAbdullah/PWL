<?php //edit
require "db_conn.php";
$sql = 'select * from travel where id = ?';
$stmt = $conn->prepare($sql);
$stmt->execute(array($_GET['id']));
$data = $stmt->fetch();
if ($data != null) :
?>
    <!DOCTYPE html>
    <title>Form Tambah Travel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>

    <body>
        <div class="container" style="width:740px;">
            <h1>Edit</h1>
            <hr>
            <form action="aksi_travel.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id" value="<?= $data['id'] ?>">
                <div class="mb-3 row">
                    <label for="nama_travel" class="col-md-2">nama_travel</label>
                    <div class="col-md-10"><input type="text" name="nama_travel" id="nama_travel" value="<?= $data['nama_travel'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="asal" class="col-md-2">asal</label>
                    <div class="col-md-10"><input type="text" name="asal" id="asal" value="<?= $data['asal'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="tujuan" class="col-md-2">tujuan</label>
                    <div class="col-md-10"><input type="text" name="tujuan" id="tujuan" value="<?= $data['tujuan'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="harga" class="col-md-2">harga</label>
                    <div class="col-md-10"><input type="text" name="harga" id="harga" value="<?= $data['harga'] ?>" class="form-control"></div>
                </div>
                <div class="mb-3 row">
                    <label for="keterangan" class="col-md-2">Keterangan</label>
                    <div class="col-md-10"> <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"><?= $data['keterangan'] ?></textarea> </div>
                </div>

                <div class="mb-3 row">
                    <div class="offset-2 col-md-10">
                        <a href="index.php" class="btn btn-warning">Kembali</a>
                        <input type="submit" name="aksi" value="Edit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        <?php else : ?>
            <div>Data barang dengan ID tersebut tidak ditemukan.</div>
        <?php endif; ?>
        </div>
    </body>

    </html>