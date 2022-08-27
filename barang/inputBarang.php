<?php
include '../koneksi.php';
session_start();
function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  if ($error === 4) {
    echo "<script>
        alert('Pilih gambar terlebih dahulu');
        </script>";
    return false;
  }

  // cek format file upload
  $formatGambarValid = ['jpg', 'png', 'jpeg'];
  $formatGambar = explode('.', $namaFile);
  $formatGambar = strtolower(end($formatGambar));
  if (!in_array($formatGambar, $formatGambarValid)) {
    echo "<script>
            alert('yang kamu di upload itu bukan gambar');
            </script>";
    return false;
  }

  // cek ukuran file upload
  if ($ukuranFile > 2000000) {
    echo "<script>
            alert('Ukuran gambar kamu terlalu besar');
            </script>";
    return false;
  }

  // upload gambar berhasil
  $namabaru = uniqid();
  $namabaru .= '.';
  $namabaru .= $formatGambar;
  move_uploaded_file($tmpName, '../assets/img/' . $namabaru);
  return $namabaru;
}

if (isset($_POST['input'])) {
  $nama_barang = htmlspecialchars($_POST['nama_barang']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);
  $harga = $_POST['harga'];
  $stok = $_POST['stok'];
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO tb_barang VALUES('', '$nama_barang', '$deskripsi', '$harga', '$stok', '$gambar')";
  mysqli_query($conn, $query);
  $_SESSION['sukses'] = 'Data Berhasil Ditambahkan';
  return header('location: barang.php');
} else {
  die("Error : " . mysqli_error($conn));
}
