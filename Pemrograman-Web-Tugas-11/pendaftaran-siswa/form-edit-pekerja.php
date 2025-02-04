<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: list-pekerja.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_pekerja WHERE id=$id";
$query = mysqli_query($db, $sql);
$pekerja = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Edit Data Pekerja</title>
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
        input[type=text], input[type=email], textarea {
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: medium;
        }
        select {
            padding: 4px 12px;
            margin: 4px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
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
        }
        input[type=submit]:hover {
            transform: scale(1.05);
        }
        .text-center {
            text-align: center;
            font-size: large;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="proses-edit-pekerja.php" method="POST">
        <a href="index.php" class="back-button">←← Back</a>
        <p class="text-center"><b>Edit Data Pekerja</b></p>

        <input type="hidden" name="id" value="<?php echo $pekerja['id']; ?>">

        Nama:
        <input type="text" name="nama" value="<?php echo $pekerja['nama']; ?>" required><br>

        Gender:<br>
        <input type="radio" name="jenis_kelamin" value="Laki-laki" <?php echo ($pekerja['jenis_kelamin'] == 'Laki-laki') ? 'checked' : ''; ?>> Male
        <input type="radio" name="jenis_kelamin" value="Perempuan" <?php echo ($pekerja['jenis_kelamin'] == 'Perempuan') ? 'checked' : ''; ?>> Female<br>

        Alamat:<br>
        <textarea name="alamat" rows="3" cols="60" required><?php echo $pekerja['alamat']; ?></textarea><br>

        Religion:<br>
        <select name="agama" required>
            <option value="Islam" <?php echo ($pekerja['agama'] == 'Islam') ? 'selected' : ''; ?>>Islam</option>
            <option value="Kristen" <?php echo ($pekerja['agama'] == 'Kristen') ? 'selected' : ''; ?>>Kristen</option>
            <option value="Katolik" <?php echo ($pekerja['agama'] == 'Katolik') ? 'selected' : ''; ?>>Katolik</option>
            <option value="Hindu" <?php echo ($pekerja['agama'] == 'Hindu') ? 'selected' : ''; ?>>Hindu</option>
            <option value="Buddha" <?php echo ($pekerja['agama'] == 'Buddha') ? 'selected' : ''; ?>>Buddha</option>
            <option value="Konghucu" <?php echo ($pekerja['agama'] == 'Konghucu') ? 'selected' : ''; ?>>Konghucu</option>
        </select><br>

        Posisi:
        <input type="text" name="posisi" value="<?php echo $pekerja['posisi']; ?>" required><br>

        No Telp:
        <input type="text" name="no_telp" value="<?php echo $pekerja['no_telp']; ?>" maxlength="16" size="16" required><br>

        Email:
        <input type="email" name="email" value="<?php echo $pekerja['Email']; ?>" required><br>

        <p class="text-center"><input type="submit" value="simpan" name="simpan"></p>
    </form>
</body>
</html>
