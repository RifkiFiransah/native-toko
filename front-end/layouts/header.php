<?php
require '../koneksi.php';
session_start();
if (!$_SESSION['login'] || $_SESSION['role'] !== 'user') {
  header('location: http://localhost/native_toko/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  <style>
    .wrapper {
      width: 100%;
      height: 100vh;
      overflow-x: hidden;
    }
  </style>
</head>

<body>

  <div class="wrapper">
    <div class="row">
      <div class="col-md-2 border-right" style="height: 670px;">
        <div class="container">
          <div class="header text-center mt-3">
            <h4><i class="fas fa-shopping-bag"></i> Native Toko</h4>
          </div>
          <br>

          <div class="sidebar mt-3">
            <ul class="list-unstyled mt-3">
              <li class="my-4 mx-3">
                <a href="http://localhost/native_toko/" class="text-decoration-none text-secondary"><i class="fas fa-table"></i> Dashboard</a>
              </li>
              <li class="my-4 mx-3">
                <a href="barang.php" class="text-decoration-none text-secondary"><i class="fas fa-shopping-bag"></i> Barang</a>
              </li>
              <li class="my-4 mx-3">
                <a href="pesanan.php" class="text-decoration-none text-secondary"><i class="fas fa-tasks"></i> Pesanan</a>
              </li>
              <li class="my-4 mx-3">
                <a href="akun.php" class="text-decoration-none text-secondary"><i class="fas fa-cogs"></i> Akun</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-10">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Input Keyword" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="navbar-nav mr-auto">
            </div>
            <!-- <form class="form-inline my-2 my-lg-0"> -->
            <a href="../logout.php" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
            <!-- </form> -->
          </div>
        </nav>