<?php //aksi
require "db_conn.php";
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') { //tidak boleh akses query scr langsung
    if (strtolower($_POST['aksi']) == strtolower('tambah transaksi')) { //strtolower biar tulisan ga hrs sama dgn 'Tambah Data'
        function insert_data()
        {
            global $conn;
            $query = "INSERT INTO transaksi (nama, jumlah, kategori, keterangan) VALUE (:nama, :jumlah, :kategori, :keterangan)";
            $params = array(
                ':nama' => $_POST['nama'],
                ':jumlah' => $_POST['jumlah'],
                ':kategori' => $_POST['kategori'],
                ':keterangan' => $_POST['keterangan']
            );
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Kesalahan tambah: " . $e->getMessage();
            }
        }
        insert_data();
    } elseif (($_POST['aksi'] == 'Edit Data') && ($_POST['id'] > 0)) {
        function update_data()
        {
            global $conn;
            $query = 'update transaksi set nama = :nama, jumlah = :jumlah, kategori = :kategori, keterangan = :keterangan ';
            $params = array(
                ':nama' => $_POST['nama'],
                ':jumlah' => $_POST['jumlah'],
                ':kategori' => $_POST['kategori'],
                ':keterangan' => $_POST['keterangan'],
                ':id' => $_POST['id'],
            );
            $query .= ' where id = :id';
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Kesalahan edit: " . $e->getMessage();
                echo $query;
            }
        }
        update_data();
    } elseif (($_POST['aksi'] == 'Hps') && ($_POST['del'] > 0)) {
        function delete_data()
        {
            global $conn;
            $query = 'delete from transaksi where id = ?';
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute(array($_POST['del']));
            } catch (PDOException $e) {
                echo "Kesalahan hapus : " . $e->getMessage();
                echo $query;
            }
        }
        delete_data();
    }
    header("Location: index.php"); //redirect stlh tambah dll, klo mau debug, dikomen aja dulu
    exit;
} else {
    echo "halaman ini tidak boleh diakses secara langsung";
    exit;
}
