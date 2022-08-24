<?php include '../layouts/header.php'; ?>
<?php
$id = $_GET['editId'];

$barang  = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang='$id'");

?>
<main class="mt-3">
  <div class="row">
    <div class="col-lg-6">
      <h2>Edit Barang</h2>
      <hr>
      <?php
      while ($brng = mysqli_fetch_assoc($barang)) :
      ?>
        <form action="updateBarang.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?= $brng['id_barang']; ?>">
          <input type="hidden" name="gambarLama" value="<?= $brng['gambar']; ?>">
          <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" name="nama_barang" value="<?= $brng['nama_barang']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" value="<?= $brng['deskripsi']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="harga">Harga</label>
            <input type="number" name="harga" value="<?= $brng['harga']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="stok">Stok</label>
            <input type="number" name="stok" value="<?= $brng['stok']; ?>" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="gambar">Gambar</label>
            <img src="../assets/img/<?= $brng['gambar']; ?>" width="50"><br>
            <input type="file" name="gambar" id="gambar" class="form-control">
          </div>
          <div class="modal-footer">
            <a href="barang.php" class="btn btn-secondary">back</a>
            <button type="submit" class="btn btn-primary" name="update">Update Data</button>
          </div>
        </form>
      <?php endwhile; ?>
    </div>
  </div>
</main>
<?php include '../layouts/footer.php'; ?>