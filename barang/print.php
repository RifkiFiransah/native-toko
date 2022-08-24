<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print PDF</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link href="../assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="container container-fluid">
    <div class="row border my-3 justify-content-center rounded" style="height: 90vh">
      <div class="col-lg-10 mx-3">
        <h2 class="my-3 text-center">Print Data Barang</h2>
        <hr>
        <table class="table mt-5">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama barang</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Stok</th>
              <th>Gambar</th>
            </tr>
          </thead>

          <tbody>
            <?php
            require '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM tb_barang");
            $no = 1;
            while ($barang = mysqli_fetch_assoc($query)) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $barang['nama_barang']; ?></td>
                <td><?= $barang['deskripsi']; ?></td>
                <td>Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
                <td><?= $barang['stok']; ?></td>
                <td><img src="../assets/img/<?= $barang['gambar']; ?>" width="70"></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script>
    window.print();
  </script>
</body>

</html>