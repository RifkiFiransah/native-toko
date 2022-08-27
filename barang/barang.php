<?php include '../layouts/header.php'; ?>
<?php
$query = mysqli_query($conn, "SELECT * FROM tb_barang");
if (isset($_POST['search'])) {
  $keyword = $_POST['keyword'];
  $search_query = mysqli_query($conn, "SELECT * FROM tb_barang WHERE nama_barang LIKE '%$keyword%'");
  if (mysqli_num_rows($search_query) > 0) {
    $query = $search_query;
  }
}
?>
<main class="my-5">
  <div class="row">
    <div class="col-sm-10 border mx-3">
      <h2 class="my-3">Data Barang</h2>
      <hr>
      <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-plus-circle"></i> Tambah Data
      </button>
      <a href="print.php" target="_blank" rel="noopener noreferrer" class="btn btn-danger mb-3"><i class="fas fa-print"></i> Print PDF</a>
      <button class="btn btn-success mb-3" id="excelBarang">
        <i class="fas fa-print">
        </i> Print Excel
      </button>
      <?php
      if (isset($_SESSION['sukses'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>' . $_SESSION['sukses'] . '.</strong>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
        unset($_SESSION['sukses']);
      }
      ?>
      <table class="table" id="tableBarang">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama barang</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Gambar</th>
            <th>Aksi</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $no = 1;
          while ($barang = mysqli_fetch_assoc($query)) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $barang['nama_barang']; ?></td>
              <td><?= $barang['deskripsi']; ?></td>
              <td>Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></td>
              <td><?= $barang['stok']; ?></td>
              <td><img src="../assets/img/<?= $barang['gambar']; ?>" width="50"></td>
              <td colspan="2">
                <a href="editBarang.php?editId=<?= $barang['id_barang']; ?>" class="badge badge-warning"><i class="fas fa-edit"></i></a>
                <a href="?hapusId=<?= $barang['id_barang']; ?>" class="badge badge-danger" onclick="javascript:confirm('Yakin ingin menghapus data?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="inputBarang.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" id="harga" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" id="stok" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" name="gambar" id="gambar" class="form-control" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="input">Input Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="../assets/js/jquery.table2excel.js"></script>
<script>
  $('#excelBarang').click(function() {
    $('#tableBarang').table2excel({
      exclude: ".excludeThisClass",
      name: "Data Barang",
      filename: "DataBarang.xls"
    });
  });
</script>
<?php
if (isset($_GET['hapusId'])) {
  $id  = $_GET['hapusId'];
  mysqli_query($conn, "DELETE FROM tb_barang WHERE id_barang='$id'");
  echo "<script>
        alert('Data Berhasil Dihapus');
        window.location='barang.php';
        </script>";
}
?>
<?php include '../layouts/footer.php'; ?>