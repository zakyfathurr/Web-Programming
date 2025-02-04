<?php
include("config.php");


// Cek apakah tombol daftar sudah diklik atau belum

if (isset($_POST['daftar'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];
    $foto= $_FILES['foto']['name'];
    $tmp=$_FILES['foto']['tmp_name'];
    $foto_baru = date('dmYHis').$foto;
    $path="images/".$foto_baru;

    // Debug data yang diterima dari form
    echo "Nama: $nama <br>";
    echo "Alamat: $alamat <br>";
    echo "Jenis Kelamin: $jk <br>";
    echo "Agama: $agama <br>";
    echo "Sekolah Asal: $sekolah <br>";

    // Buat query SQL
    if (move_uploaded_file($tmp, $path)) {
        // Buat query SQL di sini
        $sql = "INSERT INTO calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) 
                VALUES ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$foto_baru')";
    
        $query = mysqli_query($db, $sql);
    
        if ($query) {
            header('Location: index.php?status=sukses');
            exit();
        } else {
            echo "Error: " . mysqli_error($db);
            header('Location: index.php?status=gagal');
            exit();
        }
    } else {
        echo "File gagal diunggah.";
        exit();
    }
} else {
    // Jika akses tanpa klik tombol daftar
    die("Akses dilarang...");
}
?>
