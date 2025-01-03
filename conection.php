<?php
session_start();

//db connection start
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login-db";

// buat koneksi ke mysql
$con = new mysqli($servername, $username, $password, $dbname);
//db connection end

?>