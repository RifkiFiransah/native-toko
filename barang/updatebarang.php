<?php
require '../koneksi.php';
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


if (isset($_POST['update'])) {
  $id  = $_POST['id'];
  $nama_barang = htmlspecialchars($_POST['nama_barang']);
  $deskripsi = htmlspecialchars($_POST['deskripsi']);
  $harga = htmlspecialchars($_POST['harga']);
  $stok = htmlspecialchars($_POST['stok']);
  $gambarLama = htmlspecialchars($_POST['gambarLama']);

  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }

  $query = "UPDATE tb_barang SET nama_barang='$nama_barang', deskripsi='$deskripsi', harga='$harga', stok='$stok', gambar='$gambar' WHERE id_barang='$id'";
  mysqli_query($conn, $query);

  header('Location: barang.php');
}
