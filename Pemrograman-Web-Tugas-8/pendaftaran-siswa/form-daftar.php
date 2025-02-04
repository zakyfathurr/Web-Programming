<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Latihan Form</title>
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
        margin-top: 50px;
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
    .text-center{
        text-align: center;
        font-size: large;
        margin-bottom: 10px;
    }

</style>

<body>
    <form action="proses-pendaftaran.php" method="post">

    <a href="index.php" class="back-button">←← Back</a>
    <p class="text-center"><b>Formulir Pendaftaran</b></p>
    
    <table>
        <tr>
            <td >Name </td><td> : </td>
            <td> <input type="text" name="nama" required></td>
        </tr>
    </table>
    
    Gender : <br>
    <input type="radio" id="male" name="jenis_kelamin" value="Laki-laki">Male
    <input type="radio" id="female" name="jenis_kelamin" value="Perempuan">Female<br>

    Alamat :<br>
    <textarea name="alamat" rows="3" cols="60" required></textarea>
    Religion : <br>
    <select name="agama" id="Religion">
        <option value="Islam">Islam</option>
        <option value="Kristen">Kristen</option>
        <option value="Katolik">Katolik</option>
        <option value="Hindu">Hindu</option>
        <option value="Buddha">Buddha</option>
        <option value="Konghucu">Konghucu</option>
    </select>
    <br>
    Sekolah Asal : <td> <input type="text" name="sekolah_asal"  required></td>


    <p class="text-center" > <input  name="daftar" type="submit" value="Daftar"></p>
</form>

</body>
</html>