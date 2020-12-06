<?php
session_start();
if (isset($_COOKIE['login'])) {
    if ($_COOKIE['login'] == 'true') {
        $_SESSION['user'] = true;
    }
}

if(!isset($_SESSION["user"])) echo "login gagal";