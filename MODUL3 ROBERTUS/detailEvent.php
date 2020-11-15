<!DOCTYPE html>
<html>

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

    <style>
        body .modal-dialog {
            max-width: 100%;
            width: auto !important;
            display: inline-block;
        }

        .modal {
            z-index: -1;
            display: flex !important;
            justify-content: center;
            align-items: center;
        }

        .modal-open .modal {
            z-index: 1050;
        }
    </style>

    <title>Detail Event</title>
</head>

<?php
$id = $_POST['detail'];
include 'config.php';
$query = "SELECT * FROM event WHERE id = $id";
$select = mysqli_query($conn, $query);
$selects = mysqli_fetch_array($select);
?>

<body>
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
    <h4 class="text-center mt-3">Detail Event</h4>
    <br>
    <!-- card -->
    <form action='update.php' method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col d-flex justify-content-center" style="margin-top: 30px;">
                <div class="card-deck" style="width: 250px;">
                    <div class="card-body bg-light">
                        <img src="gambar/<?= $selects['gambar'] ?>" style="height: 250px; width: auto;" alt="pict1">
                        <div class="card-body">
                            <h4 class="card-title"><?= $selects['nama'] ?></h4>
                            <p>
                                <b>Deskripsi</b><br>
                                <?= $selects['deskripsi'] ?>
                            </p>
                            <div class="row">
                                <div class="col">
                                    <p>
                                        <b>Detail Event</b>
                                        <i class="fa fa-calender" style="font-size: 20px; margin-right: 10px;"></i>
                                        <?= $selects['tanggal'] ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-map-marker" style="font-size: 20px; margin-right: 10px;"></i>
                                        <?= $selects['tempat'] ?>
                                    </p>
                                    <p>
                                        <i class="fa fa-clock-o" style="font-size: 20px; margin-right: 10px;"></i>
                                        <?= $selects['mulai'] ?>
                                        <?= $selects['berakhir'] ?>
                                    </p>
                                    <p>
                                        <b>Kategori: <?= $selects['kategori'] ?></b>
                                    </p>
                                    <p>
                                        <b>HTM Rp<?= $selects['harga'] ?></b>
                                    </p>
                                </div>
                                <div class="col">
                                    <p>
                                        <b>Benefit</b><br>
                                        <ul>
                                            <li><?= $selects['benefit'] ?>
                                                <?php $lists = $selects['benefit'];
                                                $pieces = array_map('trim', explode(",", $lists)); ?>
                                            </li>
                                        </ul>
                                    </p>
                                </div>
                            </div>



                            <div class="d-flex justify-content-center">
                                <button type=button class="btn btn-primary" data-toggle="modal" 
                                data-target="#edit_modal" style="width: 100px;margin-right: 10px;" name="edit">Edit</button>
                                <a name="delete" class="btn btn-danger" style="width: 100px"
                                    href="delete.php?id=<?=$selects['id']?>" role="button">Delete</a>
                            
                                <!-- The Modal -->
                                <div class="modal fade" id="edit_modal">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Content Event</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                                <form>
                                                    <table class="table table-borderless">
                                                        <tr>
                                                            <td>
                                                                <div class="card" style="width: 600px; height: 500px;">
                                                                    <div class="card-header bg-danger"></div>
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama:</label>
                                                                            <input type="text" class="form-control" name="nama" value="<?= $selects['nama'] ?>" />
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="deskripsi">Deskrpsi:</label>
                                                                            <textarea class="form-control" rows="3" name="deskripsi"><?= $selects['deskripsi'] ?></textarea>
                                                                        </div>
                                                                        <p>Upload Gambar:</p>
                                                                        <div class="custom-file">
                                                                            <input type="file" class="custom-file-input" name="gambar">
                                                                            <label class="custom-file-label" for="customFile"><?= $selects['gambar'] ?>
                                                                            </label>
                                                                        </div>
                                                                        <p style="margin-top: 10px">Katergori:</p>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="kategori" value="Online" <?php if ($selects['kategori'] == "Online") {
                                                                                                                                                                echo "checked";
                                                                                                                                                            }
                                                                                                                                                            ?>>Online
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="radio" class="form-check-input" name="kategori" value="Offline" <?php if ($selects['kategori'] == "Offline") {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>>Offline
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="card" style="width: 600px; height: 500px;">
                                                                    <div class="card-header bg-primary"></div>
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label for="check-in">Tanggal:</label>
                                                                            <input type="date" class="form-control" name="tanggal" value="<?= $selects['tanggal'] ?>" />
                                                                        </div>
                                                                        <div class="form-row">
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="jam">Jam Mulai:</label>
                                                                                    <select class="form-control" name="mulai">
                                                                                        <option>6:00</option>
                                                                                        <option>7:00</option>
                                                                                        <option>8:00</option>
                                                                                        <option>9:00</option>
                                                                                        <option>10:00</option>
                                                                                        <option>11:00</option>
                                                                                        <option>12:00</option>
                                                                                        <option>13:00</option>
                                                                                        <option>14:00</option>
                                                                                        <option>15:00</option>
                                                                                        <option>16:00</option>
                                                                                        <option>17:00</option>
                                                                                        <option>18:00</option>
                                                                                        <option>19:00</option>
                                                                                        <option>20:00</option>
                                                                                        <option>21:00</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="form-group">
                                                                                    <label for="jam">Jam Akhir:</label>
                                                                                    <select class="form-control" name="akhir">
                                                                                        <option>6:00</option>
                                                                                        <option>7:00</option>
                                                                                        <option>8:00</option>
                                                                                        <option>9:00</option>
                                                                                        <option>10:00</option>
                                                                                        <option>11:00</option>
                                                                                        <option>12:00</option>
                                                                                        <option>13:00</option>
                                                                                        <option>14:00</option>
                                                                                        <option>15:00</option>
                                                                                        <option>16:00</option>
                                                                                        <option>17:00</option>
                                                                                        <option>18:00</option>
                                                                                        <option>19:00</option>
                                                                                        <option>20:00</option>
                                                                                        <option>21:00</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Tempat">Tempat:</label>
                                                                            <input type="text" class="form-control" name="tempat" value="<?= $selects['tempat'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="Harga">Harga:</label>
                                                                            <input type="number" class="form-control" name="harga" value="<?= $selects['harga'] ?>" />
                                                                        </div>
                                                                        <p style="margin-top: 10px">Benefit:</p>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" name="benefit[]" class="form-check-input" value="Snacks" <?php if (in_array("Snacks", $pieces)) {
                                                                                                                                                                    echo "checked";
                                                                                                                                                                }
                                                                                                                                                                ?>>Snacks
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" name="benefit[]" class="form-check-input" value="Sertifikat" <?php if (in_array("Sertifikat", $pieces)) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    }
                                                                                                                                                                    ?>>Sertifikat
                                                                            </label>
                                                                        </div>
                                                                        <div class="form-check-inline">
                                                                            <label class="form-check-label">
                                                                                <input type="checkbox" name="benefit[]" class="form-check-input" value="Souvenir" <?php if (in_array("Souvenir", $pieces)) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    }
                                                                                                                                                                    ?>>Souvenir
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </form>
                                            </div>

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" data-dismiss="modal" name="cancel">Cancel</button>
                                                <button type="submit" class="btn btn-primary" name="save" value="<?= $id ?>">Save Changes</button>
                                                <!-- <a name = "update" class="btn btn-danger" style="width: 100px" href= "update.php?id=<?= $selects['id'] ?>" role="button">Save Changes</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    <script>
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
</body>

</html>