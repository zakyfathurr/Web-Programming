<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <link rel="stylesheet" href="css/styles.css">
    <title>Latihan Backend</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        font-size: medium;
        background-color: rgba(35, 35, 174, 0.481);  
    }
    form {
        max-width: 500px;
        /* text-align: center; */
        margin:auto;
        margin-top: 200px;
        /* margin-bot:auto; */
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color:aliceblue;
    }
    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    input[type=text], input[type=email], textarea {
        /* width:auto; */
        /* padding: 12px 20px; */
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        box-sizing: border-box;
        font-size: medium;
    }
    select{
        /* width: 100%; */
        padding: 4px 12px;
        margin: 4px 0;
        display: inline-block;
        border: 1px solid #ccc; /* untuk garis border*/
        box-sizing: border-box;
        border-radius: 5px; /* untuk lengkungan border*/
    }
    option{
        padding: 8px 16px;
        text-decoration: none;
        display: block;
        border: none;
        cursor: pointer;
        color: black;
        background-color: #f1f1f1;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
        padding: 8px 30px;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
    .text-center{
        text-align: center;
        font-size: large;
        margin-bottom: 10px;
    }
    ul{
        margin-top : 40px;
    }
    li{
        margin-bottom: 30px;
        font-size: 15px;
        list-style-type: none;
        text-align: center;
    }

</style>

<body>

    <div class="container">
    <header class="text-center"><b>Pendaftaran Siswa dan pekerja Baru</b></header>
    <p class="text-center" style="font-size: medium; margin-top:40px;"><b>Sekolah Teknologi Nopember</b></p>
    <a href="form-daftar-siswa.php" class="product-button" id ="goBackButton">
        Daftar Siswa Baru
    </a>
    <a href="form-daftar-pekerja.php" class="product-button" id ="goBackButton">
        Daftar Pekerja Baru
    </a>
    <a href="list-siswa.php" class="product-button" id ="goBackButton">
        List Pendaftar Siswa
    </a>
    <a href="list-pekerja.php" class="product-button" id ="goBackButton">
        List Pendaftar Pekerja
    </a>
    <?php if(isset($_GET['status'])): ?>
    <p>
        <?php
            if($_GET['status'] == 'sukses'){
                echo "Pendaftaran siswa baru berhasil!";
            }else if($_GET['status'] == 'sukses-pekerja'){
                echo "Pendaftaran pekerja baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
<?php endif; ?>
    </div>

</body>
</html>