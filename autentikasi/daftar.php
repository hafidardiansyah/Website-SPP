<?php
require '../functions.php';

if (isset($_POST["daftar"])) {
    if (daftar($_POST) > 0) {
        echo "<script>
				alert('User baru berhasil ditambahkan!');
                document.location.href = 'masuk.php';
			  </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat akun</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        a {
            color: #333;
        }

        input[type=password],
        input[type=email] {
            border: 0;
            font-family: "Poppins", Arial, Helvetica, sans-serif;
            height: 38px;
            width: 100%;
            padding: 6px 10px;
            box-sizing: border-box;
            background-color: rgb(250, 250, 250);
            border-radius: 5px;
        }

        input[type=checkbox] {
            cursor: pointer;
            width: 16px;
            height: 16px;
            margin-top: 8px
        }
    </style>
</head>

<body>
    <form action="" method="POST" style="margin: auto; width: 50%; margin-top: 10%">
        <span id="aksi">
            <p class="h2">Buat akun</p>
            <a href="masuk.php">Sudah punya akun?</a>
        </span>
        <table>
            <tr>
                <td><label for="nama">Nama pengguna</label></td>
                <td><input type="text" name="nama" class="input-form" id="nama" placeholder="Masukkan nama pengguna!" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="email">Email</label></td>
                <td><input type="email" name="email" class="input-form" id="email" placeholder="Masukkan email!" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="kata_sandi">Kata sandi</label></td>
                <td><input type="password" min="3" name="kata_sandi" class="input-form password" id="kata_sandi" placeholder="Masukkan kata sandi!" min="3" required autocomplete="off"></td>
            </tr>
            <tr>
                <td><label for="kata_sandi2">Ulangi kata sandi</label></td>
                <td>
                    <input type="password" min="3" name="kata_sandi2" class="input-form password" id="kata_sandi2" placeholder="Masukkan kata sandi!" min="3" required autocomplete="off">
                    <br>
                    <input type="checkbox" onclick="lihatPassword()"><label style="font-size:14px; color: #333;">Lihat password</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;"><button type="submit" class="hijau" name="daftar">Daftar</button></td>
            </tr>
        </table>
    </form>

    <script>
        function lihatPassword() {
            var kataSandi1 = document.getElementById("kata_sandi");
            var kataSandi2 = document.getElementById("kata_sandi2");
            if (kataSandi1.type === "password" && kataSandi1.type === "password") {
                kataSandi1.type = "text";
                kataSandi2.type = "text";
            } else {
                kataSandi1.type = "password";
                kataSandi2.type = "password";
            }
        }
    </script>
</body>

</html>