<?php 
require("auth.php"); 
include("connect.php");
include "warna.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>WAD Beauty</title>
    <title>Index</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
</head>

<body style="background-color:azure;">
    <nav class="<?= $navbar ?>">
        <a class="navbar-brand" href="index.php">WAD Beauty </a>

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
                        <?php echo  $_SESSION["user"]["nama"] ?>
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
    if (isset($_POST['tambah'])) {
        $nama_user = $_SESSION["user"]["id"];
        echo '<div class="alert alert-success">Item berhasil ditambahkan</div>';
        if ($_POST['tambah']==1) {
            $tambah = "INSERT INTO cart(user_id, nama_barang,harga)VALUES('$nama_user','The Ordinary Peeling Solution','400000')";
            $conn->exec($tambah);
        }
        if ($_POST['tambah']==2) {
            $tambah = "INSERT INTO cart(user_id, nama_barang,harga) VALUES ('$nama_user', 'Benton Aloe Vera','199000')";
            $conn->exec($tambah);
        }
        if ($_POST['tambah']==3) {
            $tambah = "INSERT INTO cart(user_id, nama_barang,harga) VALUES ('$nama_user', 'Avoskin Bundle','450000')";
            $conn->exec($tambah);
        }
    }
    ?>
    <!-- ISI WEB -->
    <div class="container">
        <form action="index.php" method="POST">
            <div class="text-center mt-4 shadow bg-white rounded" style="background-image: linear-gradient(pink,skyblue);">
                <h1>WAD Beauty</h1>
                <p class="text-center">Tersedia skin care dengan harga murah tapi bukan murahan dan berkualitas</p>
                <div class="card-group shadow bg-white rounded" style="text-align: left;">
                    <div class="card">
                        <img src="https://media.allure.com/photos/5ea31cf122099c000830301c/master/pass/best%20the%20ordinary%20skin-care%20products%20river.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-left">The Ordinary Peeling Solution</h5>
                            <p class="card-text">Skincare yang mengandung gabungan AHA dan BHA ini dapat membantu pengelupasan kulit atau peeling ke bagian kulit bagian atas dan lebih dalam daripada eksfoliasi fisik pada umumnya yang berbentuk scrub.</p>
                            <hr style="width: 90%;">
                            <p>Rp400.000</p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="tambah" value="1">Tambah ke
                                Keranjang</button>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://cf.shopee.co.id/file/7d8825f8cbb8ece42e3845bb783ee9a6" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-left">Benton Aloe Soothing Gel</h5>
                            <p class="card-text">Aloe Propolis Soothing Gel sudah diuji dibawah kontrol dermatologi dan terbukti tidak mengandung Paraben, Minyak Mineral, Alkohol, Benzophenone, pengawet sintesis, Steroid, perisa buatan, dan warna buatan.</p>
                            <hr style="width: 90%;">
                            <p>Rp199.000</p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="tambah" value="2">Tambah ke
                                Keranjang</button>
                        </div>
                    </div>
                    <div class="card">
                        <img src="https://imgcdn.femaledaily.com/2019/04/AVOSKIN-1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-left">Avoskin Miraculous Bundle</h5>
                            <p class="card-text">Produk ini merupakan salah satu rangkaian chemical eksfoliator dari Avoskin Beauty. Mempunyai kandungan utama berupa AHA, BHA, PHA, Niaciamide + 2% Tea tree - witch hazel - raspberry dan aloe vera.</p>
                            <hr style="width: 90%;">
                            <p>Rp450.000</p>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-block btn-primary" name="tambah" value="3">Tambah ke
                                Keranjang</button>
                        </div>
                    </div>
                </div>
</body>

</html>