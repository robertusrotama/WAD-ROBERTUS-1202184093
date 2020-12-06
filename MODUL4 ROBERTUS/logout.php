<?php

session_start();
session_unset("user");

setcookie('login', '', time() - 3600);
setcookie('theme', '', time() - 3600);
header("Location: login.php");