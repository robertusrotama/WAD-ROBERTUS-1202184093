<?php
// error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=wad_modul4", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "sukses";
} 
catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>