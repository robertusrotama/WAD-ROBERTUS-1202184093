<?php
include('config.php');

$id = $_GET['id'];
$query = "DELETE FROM event WHERE id = '$id'";
$delete = mysqli_query($conn, $query);

header("Location: Home.php");
?>