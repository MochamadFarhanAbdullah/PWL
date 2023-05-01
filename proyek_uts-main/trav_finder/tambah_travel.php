<title>Form Tambah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width:740px;">
        <h1>Tambah</h1>
        <hr>
        <form action="aksi_travel.php" method="post" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="nama_travel" class="col-md-2">Nama Travel</label>
                <div class="col-md-10"><input type="text" name="nama_travel" id="nama_travel" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="asal" class="col-md-2">Asal</label>
                <div class="col-md-10"><input type="text" name="asal" id="asal" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="tujuan" class="col-md-2">Tujuan</label>
                <div class="col-md-10"><input type="text" name="tujuan" id="tujuan" class="form-control"></div>
            </div>

            <div class="row mb-3 ">
                <label for="harga" class="col-md-2">Harga</label>
                <div class="col-md-10"><input type="text" name="harga" id="harga" class="form-control"></div>
            </div>

            <div class="mb-3 row">
                <label for="keterangan" class="col-md-2">Keterangan</label>
                <div class="col-md-10"> <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="5"></textarea> </div>
            </div>

            <div class="mb-3 row">
                <div class="offset-2 col-md-10">
                    <a href="index.php" class="btn btn-warning">Kembali</a>
                    <input type="submit" name="aksi" value="Tambah" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>