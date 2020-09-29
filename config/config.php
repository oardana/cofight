<?php

$conn = mysqli_connect('localhost', 'maturnuwun', 'maturnuwun', 'cofight');

if(!$conn) {
    var_dump('Koneksi Database Gagal');
    die;
}

