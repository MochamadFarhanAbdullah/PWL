<?php //aksi
require "db_conn.php";
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') { //tidak boleh akses query scr langsung
    if (strtolower($_POST['aksi']) == strtolower('tambah catatan')) { //strtolower biar tulisan ga hrs sama dgn 'Tambah Data'
        function insert_data()
        {
            global $conn;
            $query = "INSERT INTO notes (judul, kategori, tanggal) VALUE (:judul, :kategori, :tanggal)";
            $params = array(
                ':judul' => $_POST['judul'],
                ':kategori' => $_POST['kategori'],
                ':tanggal' => $_POST['tanggal']
            );
            try {
                $stmt = $conn->prepare($query);
                $stmt->execute($params);
            } catch (PDOException $e) {
                echo "Kesalahan tambah: " . $e->getMessage();
            }
        }
        insert_data();
    } elseif (($_POST['aksi'] == 'Edit Data')) {
        function update_data()
        {
            global $conn;
            $query = 'update notes set judul = :judul, kategori = :kategori, tanggal = :tanggal ';
            $params = array(
                ':judul' => $_POST['judul'],
                ':kategori' => $_POST['kategori'],
                ':tanggal' => $_POST['tanggal'],
                ':id' => $_POST['id']
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
            $query = 'delete from notes where id = ?';
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
