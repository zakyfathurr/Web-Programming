<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-siswa.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulir Edit Siswa | SMK Coding</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: medium;
            background-color: rgba(35, 35, 174, 0.481);  
        }
        form {
            max-width: 500px;
            margin: auto;
            margin-top: 50px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: aliceblue;
        }
        input[type=text], textarea, select {
            width: calc(100% - 20px);
            margin: 8px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: medium;
        }
        input[type=radio] {
            margin: 0 8px 0 0;
        }
        option {
            padding: 8px 16px;
            text-decoration: none;
            display: block;
            border: none;
            cursor: pointer;
            color: black;
            background-color: #f1f1f1;
        }
        input[type=submit] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            padding: 8px 30px;
            border-radius: 10px;
            font-weight: bold;
            display: block;
            margin: 10px auto 0;
        }
        input[type=submit]:hover {
            transform: scale(1.05);
        }
        .text-center {
            text-align: center;
            font-size: large;
            margin-bottom: 10px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="proses-edit-siswa.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $siswa['id'] ?>" />

        <p class="text-center"><b>Formulir Edit Siswa</b></p>

        <label for="nama">Nama:</label>
        <input type="text" name="nama" placeholder="Nama Lengkap" value="<?php echo $siswa['nama'] ?>" required>

        <label for="alamat">Alamat:</label>
        <textarea name="alamat" rows="3" required><?php echo $siswa['alamat'] ?></textarea>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <?php $jk = $siswa['jenis_kelamin']; ?>
        <label><input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : "" ?>>Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : "" ?>>Perempuan</label>

        <label for="agama">Agama:</label>
        <?php $agama = $siswa['agama']; ?>
        <select name="agama">
            <option value="Islam" <?php echo ($agama == 'Islam') ? "selected" : "" ?>>Islam</option>
            <option value="Kristen" <?php echo ($agama == 'Kristen') ? "selected" : "" ?>>Kristen</option>
            <option value="Hindu" <?php echo ($agama == 'Hindu') ? "selected" : "" ?>>Hindu</option>
            <option value="Budha" <?php echo ($agama == 'Budha') ? "selected" : "" ?>>Budha</option>
            <option value="Atheis" <?php echo ($agama == 'Atheis') ? "selected" : "" ?>>Atheis</option>
        </select>

        <label for="sekolah_asal">Sekolah Asal:</label>
        <input type="text" name="sekolah_asal" placeholder="Nama Sekolah" value="<?php echo $siswa['sekolah_asal'] ?>" required>
        <label for="foto">Foto:</label>
        <input type="file" name="foto">
        <br>
        Foto saat ini: <img src="images/<?php echo $siswa['foto']; ?>" width="100">
        <br>
        <input type="submit" value="Simpan" name="simpan">
    </form>
</body>
</html>
