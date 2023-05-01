<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List Belum Selesai</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container" style="width: 700px;">
        <h2>To Do yang Belum Dikerjakan</h2>
        <a href="add.php" class="btn btn-primary">Tambah To Do</a>
        <br><br>
        <?php
        require "db_conn.php";
        $query = "select * from todo where 1 order by tanggal desc";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        while ($data = $stmt->fetch()) {
        ?>
            <div class="list-group">
                <a href="#" class="list-group-item flex-column list-group-item-action align-items-start" style="margin-bottom: 10px;">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= $data['aktivitas'] ?></h5>
                        <small class="text-muted"><?= $data['tanggal'] ?></small>
                    </div>
                    <p class="mb-1"><?= $data['deskripsi'] ?></p>
                    <small class="text-muted"><?= $data['kategori'] ?></small>
                </a>
                <form action="aksi_todo.php" method="post" onsubmit="return confirm('Apakah yakin akan menghapus data?')">
                    <a href="edit_todo.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edt</a> ||

                    <input type="hidden" name="del" value="<?= $data['id'] ?>">
                    <input type="submit" name="aksi" value="Hps" class="btn btn-danger btn-sm">
                    <br><br>
                </form>
            </div>
        <?php } ?>
    </div>
</body>

</html>