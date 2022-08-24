<?php
require 'koneksi.php';
session_start();
if (!$_SESSION['login'] || $_SESSION['role'] !== 'admin') {
  header('location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
  <style>
    .wrapper {
      width: 100%;
      height: 100vh;
      overflow: hidden;
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

          <div class="sidebar mt-5 mx-3">
            <ul class="list-unstyled">
              <li class="my-4">
                <a href="http://localhost/native_toko/dashboard.php" class="text-decoration-none text-secondary"><i class="fas fa-table"></i> Dashboard</a>
              </li>
              <li class="my-4">
                <a href="http://localhost/native_toko/barang/barang.php" class="text-decoration-none text-secondary"><i class="fas fa-laptop"></i> Barang</a>
              </li>
              <li class="my-4">
                <a href="http://localhost/native_toko/invoice/invoice.php" class="text-decoration-none text-secondary"><i class="fas fa-book"></i> Invoice</a>
              </li>
              <li class="my-4">
                <a href="http://localhost/native_toko/user/" class=" text-decoration-none text-secondary"><i class="fas fa-address-book"></i> Data User</a>
              </li>
              <li class="my-4">
                <a href="http://localhost/native_toko/setting/" class=" text-decoration-none text-secondary"><i class="fas fa-cogs"></i> Setting</a>
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
            <a href="logout.php" class="btn btn-outline-danger my-2 my-sm-0">Logout</a>
            <!-- </form> -->
          </div>
        </nav>
        <main style="height: 75%; overflow-x: hidden;">
          <div class="row mx-auto mt-3 mb-3">
            <div class="col-md-8">
              <h2 class="border-bottom">Dashboard</h2>

              <div class="row mt-3">
                <div class="col-md-4">
                  <div class="card text-white bg-info mb-3 text-center" style="max-width: 18rem;">
                    <div class="card-header"><i class="fas fa-laptop"></i> Data Barang</div>
                    <div class="card-body">
                      <?php
                      $qry_barang = mysqli_query($conn, "SELECT * FROM tb_barang");
                      $no_barang = mysqli_num_rows($qry_barang);
                      ?>
                      <h2 class="card-title"><?= $no_barang; ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card text-white bg-warning mb-3 text-center" style="max-width: 18rem;">
                    <div class="card-header"><i class="fas fa-book"></i> Data Invoice</div>
                    <div class="card-body">
                      <?php
                      $qry_pesanan = mysqli_query($conn, "SELECT * FROM tb_pesanan");
                      $no_pesanan = mysqli_num_rows($qry_pesanan);
                      ?>
                      <h2 class="card-title"><?= $no_pesanan; ?></h2>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="card text-white bg-danger mb-3 text-center" style="max-width: 18rem;">
                    <div class="card-header"><i class="fas fa-address-book"></i> Data User</div>
                    <div class="card-body">
                      <?php
                      $qry_user = mysqli_query($conn, "SELECT * FROM tb_user WHERE role='user'");
                      $no_user = mysqli_num_rows($qry_user);
                      ?>
                      <h2 class="card-title"><?= $no_user; ?></h2>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </main>
        <footer class="footer bg-light text-center text-secondary mt-3 p-1 border-top">
          <p>Footer</p>
        </footer>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>