<?php

include "connect.php";
include "warna.php";

// filter data yang diinputkan
// $id = $_SESSION["user"]["id"];
// $email = "budi@example.com";
$email = $_SESSION['user']['email'];
$id = $_SESSION['user']['id'];
// $password = $_SESSION['user']['password'];

$nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
$no_hp = filter_input(INPUT_POST, 'no_hp', FILTER_SANITIZE_STRING);
// enkripsi password

// $konfirmasi_password = password_hash($_POST["konfirmasi_password"], PASSWORD_DEFAULT);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body style="background-color: whitesmoke;">
    <!-- Navigation bar -->
    <nav class="<?= $navbar ?>">
        <a class="navbar-brand" href="index.php">WAD Beauty</a>

        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="cart.php" style="<?= $warna ?>">
                        <i class="fas fa-shopping-cart" style="font-size:24px; margin-top: 10px; margin-right: 10px;">
                        </i>
                    </a>
                </li>
                <span style="margin-top: 7px; <?= $warna ?>">Selamat datang,</span>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        <?php echo $_SESSION["user"]["nama"] ?>


                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="profile.php">Profile</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- PHP -->
    <?php
    if (isset($_POST['submit'])) {
        // menyiapkan query

        $password = $_POST["password"];
        $konfirmasi_password = $_POST["konfirmasi_password"];

        if (empty($password)) {
            $password = $_SESSION['user']['password'];
        } else {
            if ($password != $konfirmasi_password) {
                echo '<div class="alert alert-success">Password tidak cocok</div>';
            } else {
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $sql = "UPDATE user SET nama=:nama, no_hp=:no_hp, password=:password WHERE id = 'id'";
                $stmt = $conn->prepare($sql);

                $params = array(
                    ":nama" => $nama,
                    ":no_hp" => $no_hp,
                    ":password" => $password
                );

                // eksekusi query untuk menyimpan ke database
                $saved = $stmt->execute($params);
                echo '<div class="alert alert-success">Berhasil di Update!</div>';

                $_SESSION['user']['nama'] = $nama;

                setcookie('theme', $_POST['warna']);
                header("location: index.php");
            }
        }
    }

    ?>
    <!-- Profile -->
    <div class="d-flex justify-content-center" style="margin-top:20px">
        <div class="card">
            <div class="card-body" style="width: 1000px;">
                <h3 style="text-align:center; margin-top: 10px;">Profile</h3>

                <form class="form" action="profile.php" method="POST">

                    <table class="table table-borderless" style="width: fit-content;">
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <div class="form-group" style="width: 800px;">
                                    <input type="text" class="form-control" name="email" value="<?php echo $_SESSION["user"]["email"] ?>" disabled>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="nama">Nama</label></td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION["user"]["nama"] ?>">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="no_hp">No. Handphone</label></td>
                            <td>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="no_hp" value="<?php echo $_SESSION["user"]["no_hp"] ?>">
                                </div>
                            </td>
                        </tr>
                        <hr>
                        <tr>
                            <td><label for="password">Kata Sandi</label></td>
                            <td>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="konfirmasi_password">Konfirmasi Kata Sandi</label></td>
                            <td>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="konfirmasi_password" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="warna">Warna Navbar</label></td>
                            <td>
                                <div class="form-group">
                                    <select class="form-control" name="warna">
                                        <option>--Pilih Warna--</option>
                                        <option>Hitam</option>
                                        <option>Putih</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-primary" name="submit">Submit</button>
                        <button type="submit" class="btn btn-block btn-light" name="login">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>