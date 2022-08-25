<?php include 'layouts/header.php'; ?>
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
<main style="overflow-x: hidden;">
  <div class="row mx-auto mt-3 mb-3">
    <div class="col-md-12">
      <h2>Barang</h2>
      <hr>

      <div class="row mt-3">
        <?php
        while ($barang = mysqli_fetch_assoc($query)) :
        ?>
          <div class="col-lg-3 mb-3">
            <div class="card">
              <img src="../assets/img/<?= $barang['gambar']; ?>" class="card-img-top" height="140px" width="100%">
              <div class="card-body">
                <h5 class="card-title"><?= $barang['nama_barang']; ?></h5>
                <p class="card-text"><?= $barang['deskripsi']; ?>.</p>
                <a href="detail.php?id=<?= $barang['id_barang']; ?>" class="btn btn-success">Detail</a>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>
</main>
<?php include 'layouts/footer.php'; ?>