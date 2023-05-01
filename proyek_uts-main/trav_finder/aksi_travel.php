<?php //aksi
require "db_conn.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') { //tidak boleh akses query scr langsung
    if (strtolower($_POST['aksi']) == strtolower('tambah')) { //strtolower biar tulisan ga hrs sama dgn 'Tambah Data'
        function insert_data()
        {
            global $conn;
            $sql = "INSERT INTO travel (nama_travel, keterangan, asal, tujuan, harga) VALUE (:nama_travel, :keterangan, :asal, :tujuan, :harga)";
            $params = array(
                ':nama_travel' => $_POST['nama_travel'],
                ':keterangan' => $_POST['keterangan'],
                ':asal' => $_POST['asal'],
                ':tujuan' => $_POST['tujuan'],
                ':harga' => $_POST['harga']
            );
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Kesalahan tambah: " . $e->getMessage();
            }
        }
        insert_data();
    } elseif (($_POST['aksi'] == 'Edit') && ($_POST['id'] > 0)) {
        function update_data()
        {
            global $conn;
            $sql = 'update travel set nama_travel = :nama_travel, keterangan = :keterangan, asal = :asal, tujuan = :tujuan , harga = :harga';
            $params = array(
                ':nama_travel' => $_POST['nama_travel'],
                ':keterangan' => $_POST['keterangan'],
                ':asal' => $_POST['asal'],
                ':tujuan' => $_POST['tujuan'],
                ':harga' => $_POST['harga'],
                ':id' => $_POST['id'],
            );
            $sql .= ' where id = :id';
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Kesalahan edit: " . $e->getMessage();
                echo $sql;
            }
        }
        update_data();
    } elseif (($_POST['aksi'] == 'Hps') && ($_POST['del'] > 0)) {
        function delete_data()
        {
            global $conn;
            $sql = 'delete from travel where id = ?';
            try {
                $stmt = $conn->prepare($sql);
                $stmt->execute(array($_POST['del']));
            } catch (PDOException $e) {
                echo "Kesalahan hapus : " . $e->getMessage();
                echo $sql;
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
