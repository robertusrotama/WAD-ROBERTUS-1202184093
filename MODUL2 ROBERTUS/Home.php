<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Home</title>
</head>
</body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Booking.php">Booking</a>
        </li>
    </ul>
</nav>
<!-- end navbar -->
<!-- header -->
<h4 class="text-center text-primary mt-2">EAD HOTEL</h4>
<h5 class="text-center text-info mb-2">Welcome to 5 Stars Hotel</h5>
<br>
<!-- nyusun card -->
    <form action='Booking.php' method='get'>
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card-deck " style="width: 1000px;" align="center">
                    <div class="card">
                        <!-- gambar -->
                        <img class="card-img-top" src="https://thegallivantnyc.com/wp-content/uploads/2016/06/gts-photo-5-807x540.jpg" alt="Standard Room" style="height: 200px; width: auto;">
                        <!-- isi card -->
                        <div class="card-body">
                            <h4 class="card-title text-center">Standard</h4>
                            <h5 class="text-center text-primary">$90/Day</h5>
                            <br>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Facilities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1 Single Bed</td>
                                    </tr>
                                    <tr>
                                        <td>1 Single Bathroom</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- tombol book now -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" nama="book" value="Standard">Book Now</button>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://ik.imagekit.io/tvlk/apr-asset/TzEv3ZUmG4-4Dz22hvmO9NUDzw1DGCIdWl4oPtKumOg=/hotels/13000000/12310000/12303600/12303579/3da99c42_z.jpg?tr=q-40,c-at_max,w-740,h-500&_src=imagekit" alt="Superior Room" style="height: 200px; width: auto;">
                        <div class="card-body">
                            <h4 class="card-title text-center">Superior</h4>
                            <h5 class="text-center text-primary">$150/Day</h5>
                            <br>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Facilities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1 Double Bed</td>
                                    </tr>
                                    <tr>
                                        <td>1 Television and Wi-fi</td>
                                    </tr>
                                    <tr>
                                        <td>1 Single Bathroom and Water Heater</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" nama="book" value="Superior">Book Now</button>
                        </div>
                    </div>
                    <div class="card">
                        <img class="card-img-top" src="https://toptravellists.com/wp-content/uploads/2015/10/Luxury-Hotel-Room.jpg" alt="Luxury Room" style="height: 200px; width: auto;">
                        <div class="card-body">
                            <h4 class="card-title text-center">Luxury</h4>
                            <h5 class="text-center text-primary">$200/Day</h5>
                            <br>
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>Facilities</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>2 Double Bed</td>
                                    </tr>
                                    <tr>
                                        <td>2 Bathroom with Water Heater</td>
                                    </tr>
                                    <tr>
                                        <td>1 Kitchen</td>
                                    </tr>
                                    <tr>
                                        <td>1 Television and Wi-fi</td>
                                    </tr>
                                    <tr>
                                        <td>1 Workroom</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" nama="book" value="Luxury">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </body>
</html>