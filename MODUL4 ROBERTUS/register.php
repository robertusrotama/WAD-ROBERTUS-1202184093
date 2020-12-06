<?php
include "connect.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body style="background-color:azure;">
    <!-- navigation bar -->
    <nav class="navbar navbar-expand-sm navbar-light justify-content-center">
        <a class="navbar-brand" href="#" style="margin-right:1090px;">WAD Beauty</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="register.php">Register</a>
            </li>
        </ul>
    </nav>
    <!-- PHP -->
    <?php
    if (isset($_POST['register'])) {

        // filter data yang diinputkan
        $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
        $no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
        // enkripsi password
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST["password"];
        $konfirmasi_password = $_POST["konfirmasi_password"];

        if ($password = $konfirmasi_password) {
            $password = password_hash($password, PASSWORD_DEFAULT);

            // menyiapkan query
            $sql = "INSERT INTO user (nama, email, no_hp, password)
                    VALUES (:nama, :email, :no_hp, :password)";
            $update = $conn->prepare($sql);

            // bind parameter ke query
            $params = array(
                ":nama" => $nama,
                ":email" => $email,
                ":no_hp" => $no_hp,
                ":password" => $password,
            );
            // eksekusi query untuk menyimpan ke database
            $saved = $update->execute($params);
            echo '<div class="alert alert-success">Berhasil Registrasi!</div>';
        } else {
            echo '<div class="alert alert-success">Password tidak cocok!</div>';
        }
    }
    ?>




    <!-- form regis -->
    <div class="d-flex justify-content-center" style="margin-top:20px">
        <div class="shadow bg-white rounded">
            <form action="register.php" method=POST>
                <div class="card">
                    <div class="card-body" style="width: 500px;">
                        <h3 style="text-align:center; margin-top: 10px;">Registrasi</h3>
                        <hr style="width: 80%;">

                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="no_hp">No. Handphone</label>
                            <input type="text" class="form-control" name="no_hp">
                        </div>
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="form-group" style="width: 300px; margin-left: 80px;">
                            <label for="konfirmasi_password">Konfirmasi Kata Sandi</label>
                            <input type="password" class="form-control" name="konfirmasi_password" />
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="register">Daftar</button>
                        </div><br>
                        <p style="text-align: center;">Sudah punya akun? <a href="login.php">Login</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>