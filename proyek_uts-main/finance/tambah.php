<title>Form Tambah Transaksi</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:740px;">
        <h1>Tambah Transaksi</h1>
        <hr>
        <form action="aksi.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="nama" class="col-md-2">Nama Transaksi</label>
                <div class="col-md-10"><input type="text" name="nama" id="nama" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="jumlah" class="col-md-2">jumlah</label>
                <div class="col-md-10"><input type="text" name="jumlah" id="jumlah" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="kategori" class="col-md-2">kategori</label>
                <div class="col-md-10"><input type="text" name="kategori" id="kategori" placeholder="pemasukan atau pengeluaran" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="keterangan" class="col-md-2">Keterangan</label>
                <div class="col-md-10"> <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"></textarea> </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-2 col-md-10">
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                    <input type="submit" name="aksi" value="Tambah Transaksi" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>