<?php
include("config.php");

// Cek apakah form sudah disubmit
if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah_asal = $_POST['sekolah_asal'];

    // Jika ada file foto baru
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];
        $foto_baru = date('dmYHis') . $foto;
        $path = "images/" . $foto_baru;

        if (move_uploaded_file($tmp, $path)) {
            // Hapus foto lama
            $sql_foto = "SELECT foto FROM calon_siswa WHERE id = $id";
            $query_foto = mysqli_query($db, $sql_foto);
            $data_foto = mysqli_fetch_assoc($query_foto);

            if (file_exists("images/" . $data_foto['foto'])) {
                unlink("images/" . $data_foto['foto']);
            }

            // Perbarui data termasuk foto
            $sql = "UPDATE calon_siswa SET 
                        nama = '$nama', 
                        alamat = '$alamat', 
                        jenis_kelamin = '$jenis_kelamin', 
                        agama = '$agama', 
                        sekolah_asal = '$sekolah_asal', 
                        foto = '$foto_baru' 
                    WHERE id = $id";
        }
    } else {
        // Perbarui data tanpa mengubah foto
        $sql = "UPDATE calon_siswa SET 
                    nama = '$nama', 
                    alamat = '$alamat', 
                    jenis_kelamin = '$jenis_kelamin', 
                    agama = '$agama', 
                    sekolah_asal = '$sekolah_asal' 
                WHERE id = $id";
    }

    // Eksekusi query
    $query = mysqli_query($db, $sql);

    if ($query) {
        header('Location: index.php?status=sukses');
        exit();
    } else {
        echo "Error: " . mysqli_error($db);
        exit();
    }
} else {
    die("Akses dilarang...");
}
