<?php

include("config.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $posisi = $_POST['posisi'];
    $no_telp = $_POST['no_telp'];
    $email = $_POST['email'];

    // buat query update
    $sql = "UPDATE calon_pekerja SET 
            nama = '$nama',
            alamat = '$alamat',
            jenis_kelamin = '$jenis_kelamin',
            agama = '$agama',
            posisi = '$posisi',
            no_telp = '$no_telp',
            Email = '$email'
            WHERE id = $id";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: list-pekerja.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>