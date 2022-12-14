<?php require 'layouts/header.php'; ?>
<?php
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_barang WHERE id_barang='$id'");
?>
<main class="my-3">
  <div class="row mx-auto">
    <div class="col-lg-6">
      <h2>Detail Barang</h2>
      <hr>
      <?php
      while ($barang = mysqli_fetch_assoc($query)) :
        $stok = (int) $barang['stok'];
      ?>
        <div class="card mb-3">
          <div class="row no-gutters">
            <div class="col-md-6">
              <img src="../assets/img/<?= $barang['gambar']; ?>" width="100%">
            </div>
            <div class="col-md-6">
              <div class="card-body">
                <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
                <p class="card-text"><?= $barang['deskripsi']; ?>.</p>
                <p class="card-text">Stok : <?= $barang['stok']; ?></p>
                <p class="card-text"><small class="text-muted">Rp. <?= number_format($barang['harga'], 0, ',', '.'); ?></small></p>
                <?php if ($barang['stok'] <= 1) {
                  echo '<p class="card-text">Barang Sudah Habis Terjual.</p>';
                } else { ?>
                  <a href="pembayaran.php?id=<?= $barang['id_barang']; ?>&stok=<?= $stok; ?>" class="btn btn-primary">Beli</a>
                  <a href="barang.php" class="btn btn-secondary">back</a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
  <div class="row mx-auto mt-3">
    <?php
    $query = mysqli_query($conn, "SELECT * FROM tb_barang");
    while ($barang = mysqli_fetch_assoc($query)) :
      if ($barang['id_barang'] != $id) :
    ?>
        <div class="col-lg-3">
          <div class="card">
            <img src="../assets/img/<?= $barang['gambar']; ?>" class="card-img-top" height="140px" width="100%">
            <div class="card-body">
              <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
              <p class="card-text"><?= $barang['deskripsi']; ?>.</p>
              <a href="?id=<?= $barang['id_barang']; ?>" class="btn btn-success">Detail</a>
            </div>
          </div>
        </div>
    <?php
      endif;
    endwhile; ?>
  </div>
</main>

<?php require 'layouts/footer.php'; ?>