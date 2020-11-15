<?php
include 'config.php';

$id = $_POST['save'];

$nama = $_POST['nama'];

$deskripsi = $_POST['deskripsi'];
 
$rand = rand();
$ekstensi =  array('png','jpg','jpeg','gif');
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



$image = $rand . '_' . $filename;
move_uploaded_file($_FILES['gambar']['tmp_name'], 'gambar/' . $rand . '_' . $filename);
$query = "UPDATE event SET nama = '$nama',
                 deskripsi = '$deskripsi',
                 gambar = '$image',
                 kategori = '$kategori',
                 tanggal = '$tanggal',
                 mulai = '$mulai',
                 berakhir = '$akhir',
                 tempat = '$tempat',
                 harga = '$harga',
                 benefit = '$isi'
            WHERE id = '$id'";
$update = mysqli_query($conn, $query);

header("Location: Home.php");
