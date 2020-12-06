<!DOCTYPE html>
<html>
<?php
    // error_reporting(0);
    include 'config.php';
    $query = "SELECT * FROM event";
    $select = mysqli_query($conn, $query);
    $status = false;

    if (mysqli_num_rows($select)> 0 ) {
        $status = true;
    }
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Home</title>
</head>

<body>
    <!-- navbar -->
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand text-white" href="Home.php">EAD EVENTS</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="nav-item"><a class="nav-link text-white" href="Home.php">Home</a></li>
                <li class="nav-item active"><a class="nav-link btn btn-outline-light" href="createEvent.php">Buat
                        Event</a></li>
            </ul>
        </div>
    </nav>
    <!-- header -->
    <h4 class="text-center mt-3">WELCOME TO EAD EVENTS!</h4>
    <br>
    <!-- card -->
    <form action='detailEvent.php' method='POST'>
        <div class="row">
            <?php
            if($status){
                while(!$selects = mysqli_fetch_array($select)){ ?>
            <div class="col d-flex justify-content-center">
                <div class="card-deck" style="width: 300px;">
                    <div class="card bg-light">
                        <!-- gambar -->
                        <img class="card-img-top"
                            src="gambar/<?=$selects['gambar']?>"
                            style="height: 200px; width: auto;" alt="pict1">
                        <!-- isi -->
                        <div class="card-body">
                            <h4 class="card-title"><?= $selects['nama']?></h4>
                            <p>
                            <i class="fa fa-calendar" style="font-size: 20px; margin-right: 10px;"></i>
                                <?= $selects['tanggal'] ?>
                            </p>
                            <p>
                            <i class="fa fa-map-marker" style="font-size: 20px; margin-right: 10px;"></i>
                                <?= $selects['tempat'] ?>
                            </p>
                            <p>
                                Kategori: <?= $selects['kategori'] ?>
                            </p>
                        </div>
                        <div class="card-footer" style="background-color: white">
                            <button type=submit class="btn btn-primary float-right" style="width: 100px;" name="detail"
                                value="<?= $selects['id'] ?>">Detail</button></div>
                    </div>
                </div>
            </div>
            <?php }}else{
                echo '<div class = "col-12" <span>No Event Found<span>';}?>
        </div>
    </form>
</body>
</html>