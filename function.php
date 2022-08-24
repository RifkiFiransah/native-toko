<?php

$conn = mysqli_connect("localhost", "root", "", "native_toko");

function registrasi($data)
{
  global $conn;

  $username = strtolower(stripslashes($data['username']));
  $role = 'user';
  $nama_lengkap = strtolower(stripslashes($data['nama_lengkap']));
  $password1 = mysqli_escape_string($conn, $data['password']);

  $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
              alert('Username yang anda pilih sudah terdaftar silahkan cari username yang lain');
          </script>";
    return false;
  }

  $password = password_hash($password1, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$nama_lengkap', '$username', '$password', '$role')");

  return mysqli_affected_rows($conn);
}

function registrasiAdmin($data)
{
  global $conn;

  $username = strtolower(stripslashes($data['username']));
  $role = 'admin';
  $nama_lengkap = strtolower(stripslashes($data['nama_lengkap']));
  $password1 = mysqli_escape_string($conn, $data['password']);

  $result = mysqli_query($conn, "SELECT username FROM tb_user WHERE username = '$username'");

  if (mysqli_fetch_assoc($result)) {
    echo "<script>
              alert('Username yang anda pilih sudah terdaftar silahkan cari username yang lain');
          </script>";
    return false;
  }

  $password = password_hash($password1, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO tb_user VALUES('', '$nama_lengkap', '$username', '$password', '$role')");

  return mysqli_affected_rows($conn);
}
