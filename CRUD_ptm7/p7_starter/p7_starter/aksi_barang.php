<?php
require "db_conn.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //tidak boleh akses query scr langsung
    if (strtolower($_POST['aksi']) == strtolower('tambah data')) { //strtolower biar tulisan ga hrs sama dgn 'Tambah Data'
        function insert_data()
        {
            global $conn;

            $query = "INSERT INTO barang (nama, harga, jml, keterangan, foto) VALUE (:nama, :harga, :jml, :keterangan, :foto)";

            $params = array(
                ':nama' => $_POST['nama'],
                ':harga' => $_POST['harga'],
                ':jml' => $_POST['jml'],
                ':keterangan' => $_POST['keterangan'],
                ':foto' => $_FILES['foto']['name']
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

            $query = 'update barang set nama = :nama, harga = :harga, jml = :jml, keterangan = :keterangan ';
            $params = array(
                ':nama' => $_POST['nama'],
                ':harga' => $_POST['harga'],
                ':jml' => $_POST['jml'],
                ':keterangan' => $_POST['keterangan'],
                ':id' => $_POST['id'],
            );
            if (!empty($_FILES['foto']['name'])) {
                $query .= ', foto = :foto';
                $params[':foto'] = $_FILES['foto']['name'];
            }
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

            $query = 'delete from barang where id = ?';

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
