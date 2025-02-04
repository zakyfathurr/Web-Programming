<?php include("config.php"); ?>

<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/styles.css">
<head>
    <title>Pendaftaran pekerja Baru | Sekolah Teknologi Nopember</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: medium;
        background-color: rgba(35, 35, 174, 0.481);  
    }
    
</style>
<body>
    <div class="container" style="max-width:1350px">
    <a href="index.php" class="back-button">← Back</a>
    <header>
        <h3>pekerja yang sudah mendaftar</h3>
    </header>

    <nav>
        <a href="form-daftar-pekerja.php">[+] Tambah Baru</a>
    </nav>

    <br>

    <table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Posisi</th>
            <th>Email</th>
            <th>No_Telp</th>
            <th>Tindakan</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $sql = "SELECT * FROM calon_pekerja";
        $query = mysqli_query($db, $sql);

        while($pekerja = mysqli_fetch_array($query)){
            echo "<tr>";

            echo "<td>".$pekerja['id']."</td>";
            echo "<td>".$pekerja['nama']."</td>";
            echo "<td>".$pekerja['alamat']."</td>";
            echo "<td>".$pekerja['jenis_kelamin']."</td>";
            echo "<td>".$pekerja['agama']."</td>";
            echo "<td>".$pekerja['posisi']."</td>";
            echo "<td>".$pekerja['Email']."</td>";
            echo "<td>".$pekerja['no_telp']."</td>";

            echo "<td>";
            echo "<a href='form-edit-pekerja.php?id=".$pekerja['id']."'>Edit</a> | ";
            echo "<a href='hapus-pekerja.php?id=".$pekerja['id']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }
        ?>

    </tbody>
    </table>

    <p>Total: <?php echo mysqli_num_rows($query) ?></p>

    </div>
    
    </body>
</html>