<?php

$koneksi = mysqli_connect("localhost", "root", "", "rara");

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

?>