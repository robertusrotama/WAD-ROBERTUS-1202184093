<?php
require("auth.php");
include("connect.php");
include "warna.php";

$id = (int)$_SESSION["user"]["id"];
// echo gettype($id);
// echo $id;


$stmt = $conn->query("SELECT * FROM cart WHERE user_id = $id ");
$sum = $conn->query(" SELECT SUM(harga) as total FROM cart WHERE user_id = $id ");
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$sum->setFetchMode(PDO::FETCH_ASSOC);
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
    if (isset($_POST["delete"])) {
        $id = $_POST["delete"];
        echo '<div class="alert alert-success">Item berhasil dihapus</div>';
        $delete = "DELETE FROM cart WHERE id=$id";
        $conn->exec($delete);
        header("Location: cart.php");
    }
    ?>
    <!-- Tabel Cart -->
    <form action='cart.php' method='POST'>
        <div class="container" style="margin-top: 30px;">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($selects = $stmt->fetch()) {
                    ?>
                        <tr>
                            <td><?= $selects['id'] ?></td>
                            <td><?= $selects['nama_barang'] ?></td>
                            <td>Rp<?= $selects['harga'] ?></td>
                            <td><button type="submit" class="btn btn-danger" name='delete' value="<?= $selects['id'] ?>">delete</button></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <th colspan="2">Total</th>
                        <th colspan="2">Rp<?php
                                            while ($selects = $sum->fetch()) {
                                                echo $selects['total'];
                                            }
                                            ?></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</body>

</html>