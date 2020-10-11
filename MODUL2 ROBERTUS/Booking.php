<!DOCTYPE html>
<?php
error_reporting(0);
$pilih = $_GET['book'];
?>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Booking</title>
</head>
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="#">Booking</a>
        </li>
    </ul>
</nav>
<!-- end navbar -->

<body>

    <div class="col d-flex justify-content-center mt-2>">
        <div class="row">
            <form action="myBook.php" method="get">
                <div class="form-group mt-3" style="width: 400px;">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="checkIn">Check-in</label>
                    <input type="date" class="form-control" name="masuk" id="checkIn" required>
                </div>
                <div class="form-group">
                    <label for="name">Duration</label>
                    <input type="number" class="form-control" id="duration" name="durasi" required>
                    <small>Day(s)</small>
                </div>
                <div class="form-group">
                    <label for="name">Room Type</label>
                    <?php
                    if ($pilih == 'Standard') {
                        echo
                            '<select class="form-control" name="type" selected disabled>
                    <option>Standard</option>
                    <input type ="hidden" name="type" value="Standard">
                    </select>';
                    } elseif ($pilih == 'Superior') {
                        echo
                            '<select class="form-control" name="type" selected disabled>
                    <option>Superior</option>
                    <input type ="hidden" name="type" value="Superior">
                    </select>';
                    } elseif ($pilih == 'Luxury') {
                        echo
                            '<select class="form-control" name="type" selected disabled>
                    <option>Luxury</option>
                    <input type ="hidden" name="type" value="Luxury">
                    </select>';
                    } else {
                        echo
                            '<select class="form-control" name="type">
                    <option>Standard</option>
                    <option>Superior</option>
                    <option>Luxury</option>
                    </select>';

                        $pilih = $_GET['type'];
                    }
                    ?>
                </div>
                <label for="Room Services">Add Service(s)</label>
                <small>$20/ service</small>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="add[]" value="Room Service">Room Service
                    </label>
                </div>
                <div class="form-group form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox" name="add[]" value="Breakfast">Breakfast
                    </label>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="telepon" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Book Now</button>
            </form>
            <div class="row col d-flex ml-5 mt-5">
                <?php
                if ($pilih == 'Standard') {
                    echo '<img class="rounded" src="https://thegallivantnyc.com/wp-content/uploads/2016/06/gts-photo-5-807x540.jpg" style="height: 360px;"alt="Standard Room">';
                } elseif ($pilih == 'Superior') {
                    echo '<img class="rounded" src="https://ik.imagekit.io/tvlk/apr-asset/TzEv3ZUmG4-4Dz22hvmO9NUDzw1DGCIdWl4oPtKumOg=/hotels/13000000/12310000/12303600/12303579/3da99c42_z.jpg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit" style="height: 360px;"alt="Superior Room">';
                } else {
                    echo '<img class="rounded" src="https://toptravellists.com/wp-content/uploads/2015/10/Luxury-Hotel-Room.jpg" style="height: 360px;"alt="Luxury Room">';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>