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
    <title>Buat Event</title>
</head>

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

    <!-- heading -->
    <h3 class="ml-4 mt-2">Buat Event</h3>
    <!-- card -->
    <form action='create.php' method='POST' enctype="multipart/form-data">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-deck" style="width: auto;">
                    <div class=card>
                        <div class="card-header bg-danger"></div>
                        <div class=card-body>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                            </div>
                            <p>Upload Gambar:</p>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="gambar">
                                <label class="custom-file-label" for="customFile">Choose Image</label>
                            </div>
                            <p style="margin-top: 10px;">Kategori</p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori" value="Online">Online
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="kategori" value="Offline">Offline
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class=card>
                        <div class="card-header bg-primary"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="check-in">Tanggal: </label>
                                <input type="date" class="form-control" name="tanggal">
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jam">Jam Mulai: </label>
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
                                <input type="text" class="form-control" name="tempat">
                            </div>
                            <div class="form-group">
                                <label for="Harga">Harga</label>
                                <input type="number" class="form-control" name="harga">
                            </div>
                            <p style="margin-top: 10px">Benefit</p>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="benefit[]" class="form-check-input" value="Snacks">Snacks
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="benefit[]" class="form-check-input" value="Sertifikat">Sertifikat
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="benefit[]" class="form-check-input" value="Souvenir">Souvenir
                                </label>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-danger float-right" style="margin-left: 5px;">Cancel</button>
                            <button type="submit" class="btn btn-primary float-right" name="submit">Submit</button>
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