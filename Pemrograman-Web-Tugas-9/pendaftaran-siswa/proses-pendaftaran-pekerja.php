<?php
include("config.php");


// Cek apakah tombol daftar sudah diklik atau belum

if (isset($_POST['daftar'])) {
    // Ambil data dari formulir
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $posisi = $_POST['posisi'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    // Debug data yang diterima dari form
    echo "Nama: $nama <br>";
    echo "Alamat: $alamat <br>";
    echo "Jenis Kelamin: $jk <br>";
    echo "Agama: $agama <br>";
    echo "posisi $posisi <br>";
    echo "no_telp $phone <br>";
    echo "email $email <br>";

    // Buat query SQL
    $sql = "INSERT INTO calon_pekerja (nama, alamat, jenis_kelamin, agama, posisi,Email,no_telp) 
            VALUES ('$nama', '$alamat', '$jk', '$agama', '$posisi','$email','$phone')";

    // Eksekusi query dan cek apakah berhasil
    $query = mysqli_query($db, $sql);

    // Jika query berhasil
    if ($query) {
        header('Location: index.php?status=sukses-pekerja');
        exit(); // Hentikan script untuk menghindari error header
    } else {
        // Jika query gagal, tampilkan pesan error MySQL
        echo "Error: " . mysqli_error($db);
        header('Location: index.php?status=gagal');
        exit();
    }
} else {
    // Jika akses tanpa klik tombol daftar
    die("Akses dilarang...");
}
?>
