<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wad_modul3_robertus";

//creating connection
$conn = mysqli_connect('localhost','root','','wad_modul3_robertus');

//checking connection
if (!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

