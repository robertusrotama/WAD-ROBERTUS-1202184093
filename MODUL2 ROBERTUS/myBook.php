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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Home</title>
    </head>
    <body>
        <!-- navbar -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark justify-content-center">
    <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="Home.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="Booking.php">Booking</a>
        </li>
    </ul>
</nav>
<!-- end navbar -->
    </body>
    <?php
    $name = $_GET['nama'];
    $check =$_GET['masuk'];
    $duration =$_GET['durasi'];
    $type = $_GET['type'];
    $phone = $_GET['telepon'];
    $service_count = count($_GET['add']);

    $checkout = date('m/d/y', strtotime($check . + '+' . $_GET['durasi'] . 'days'));

    $totalPrice= $service_count **20;

    ?>
    <div class="col d-flex justify-content-center mt-2">
        <table class=table style= "width: 1000px; text-align: center;">
        <tr>
            <th>Booking Number</th>
            <th>Name</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Room Type</th>
            <th>Phone Number</th>
            <th>Service</th>
            <th>Total</th>
        </tr>
        
        <tr>
            <th>
                <?php
                echo(rand(10000,99999));
                ?>
            </th>
            <td><?php echo $name; ?> </td>
            <td><?php echo date("m/d/y", strtotime($check)); ?> </td>
            <td><?php echo $checkout; ?> </td>
            <td><?php echo $type; ?> </td>
            <td><?php echo $phone; ?> </td>
            <td><?php
                if(empty($_GET['add'])){
                    foreach($_GET['add'] as $selected);{
                        echo $selected . '<br>';
                    }}else{
                        echo "no service";
                }?>
            </td>
            <td><?php
                if($type == "Standard"){
                    echo ($duration*90) + $totalPrice;
                }elseif($type == "Superior"){
                    echo ($duration*150) + $totalPrice;
                }elseif($type == "Luxury"){
                    echo ($duration*200) + $totalPrice;
                }
                ?>
            </td>
        </tr>
        </table>
    </div>
</html>