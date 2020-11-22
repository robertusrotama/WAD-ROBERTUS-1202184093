<?php
if (isset($_COOKIE['theme'])) {
    if ($_COOKIE['theme'] == 'Hitam') {
        $navbar = 'navbar navbar-expand-sm navbar-dark bg-dark';
        $warna = 'color: whitesmoke';
    } else {
        $navbar = 'navbar navbar-expand-sm navbar-light';
        $warna = 'color: black';
        // header("Location: profile.php");
    }
    // header("Location: profile.php");
} else {
    $navbar = 'navbar navbar-expand-sm navbar-light';
    $warna = 'color: black';
}
