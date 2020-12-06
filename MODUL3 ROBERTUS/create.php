<?php

include ('config.php');

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

$rand = rand();
$ekstensi = array('png','jpg','jpeg','gif');
$filename = $_FILES['gambar']['name'];
$ukuran = $_FILES['gambar']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

$kategori = $_POST['kategori'];

$tanggal = $_POST['tanggal'];
$mulai = $_POST['mulai'];
$akhir = $_POST['akhir'];
$tempat = $_POST['tempat'];
$harga = $_POST['harga'];

$benefit = $_POST['benefit'];
if (!empty($benefit)) {
    foreach($benefit as $selected) {
        $isi .= $selected . ', '; 
    }
}else {
echo "no benefit";
}

if (isset($_POST['submit'])) {
    $image = $rand.'_'.$filename;
    move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/'.$rand.'_'.$filename);
    $query = "INSERT INTO event (nama, deskripsi, gambar, kategori, tanggal, mulai, berakhir, tempat, harga, benefit) 
    VALUES ('$nama', '$deskripsi', '$image', '$kategori', '$tanggal', '$mulai', '$akhir', '$tempat', '$harga', '$isi')";
    $insert = mysqli_query($conn, $query);
}
header("Location: Home.php");
?>