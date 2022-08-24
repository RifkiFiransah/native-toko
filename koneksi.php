<?php
$conn = mysqli_connect("localhost", "root", "", "native_toko");

if (!$conn) {
  die('Koneksi Database Gagal : ' . mysqli_connect_error($conn));
}
date_default_timezone_set('Asia/Jakarta');
