<?php
session_start();

// check user
if (isset($_SESSION["tingkat"])) {
    echo "
        <script>
            alert('Tidak dapat mengakses fitur ini!');
            window.history.back();
        </script>
        ";
    exit;
}

if (isset($_POST["login"])) {
    $CONN = mysqli_connect("localhost", "root", "", "spp");

    $email = $_POST["email"];
    $kata_sandi = $_POST["kata_sandi"];

    // get user
    $results = mysqli_query($CONN, "SELECT * FROM pengguna WHERE email = '$email'");

    // check email
    if (mysqli_num_rows($results) === 1) {

        $row = mysqli_fetch_assoc($results);
        // check kata_sandi
        if ($kata_sandi == $row["kata_sandi"]) {
            if ($row["tingkat"] == "admin") {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['nama'];
                $_SESSION["admin"] = true;
                $_SESSION["payment"] = true;
                header('Location: ../../admin.php');
            } else if ($row["tingkat"] == "petugas") {
                $_SESSION["id"] = $row['id'];
                $_SESSION["name"] = $row['nama'];
                $_SESSION["officer"] = true;
                $_SESSION["payment"] = true;
                header('Location: ../../officer.php');
            } else {
                header('Location: ../../index.php');
            }
        }
    }

    $info = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.ico">
</head>

<body>
    <div id="container">
        <form action="" method="POST">

            <?php if (isset($info)) : ?>
                <div class="info info-red">Email/Kata sandi salah</div>
            <?php endif; ?>

            <table class="table">
                <tr>
                    <td colspan="2">
                        <span class="action">
                            <h2>Masuk akun</h2>
                            <a href="../../index.php">Halaman utama</a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td><label class="text-bold" for="email">Email</label></td>
                    <td><input type="email" name="email" class="input-form" id="email" placeholder="Masukkan email!" autofocus required autocomplete="off"></td>
                </tr>
                <tr>
                    <td><label class="text-bold" for="kata_sandi">Kata sandi</label></td>
                    <td>
                        <input type="password" name="kata_sandi" class="input-form" id="kata_sandi" placeholder="Masukkan kata sandi!" required autocomplete="off">
                        <br>
                        <input type="checkbox" onclick="showPassword()"><label>Lihat password</label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;"><button type="submit" class="button green" name="login">Masuk</button></td>
                </tr>
            </table>
        </form>
    </div>

    <script>
        function showPassword() {
            let result = document.getElementById("kata_sandi");

            if (result.type === "password") {
                result.type = "text";
            } else {
                result.type = "password";
            }
        }
    </script>
</body>

</html>