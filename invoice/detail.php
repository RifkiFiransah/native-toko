<?php include '../layouts/header.php'; ?>
<main class="my-5 mx-3">
  <div class="row">
    <div class="col-md-8 border rounded">
      <h2>Detail Invoice</h2>
      <hr>
      <?php
      $id = $_GET['id'];
      $no = 1;
      $queryJoin = "SELECT * FROM tb_pesanan INNER JOIN tb_barang ON tb_pesanan.id_barang=tb_barang.id_barang INNER JOIN tb_invoice ON tb_pesanan.id_invoice=tb_invoice.id_invoice INNER JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user WHERE id='$id'";
      $query = mysqli_query($conn, $queryJoin);
      while ($invoice = mysqli_fetch_assoc($query)) :
      ?>
        <div class="card my-3">
          <div class="card-header">
            Nama Lengkap : <b><?= $invoice['nama']; ?></b>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">No telp : <b><?= $invoice['telp']; ?></b></li>
            <li class="list-group-item">Alamat : <b><?= $invoice['alamat']; ?></b></li>
            <li class="list-group-item">Pembayaran : <b><?= $invoice['bank']; ?></b></li>
            <li class="list-group-item">Ekspedisi : <b><?= $invoice['kurir']; ?></b></li>
            <li class="list-group-item">Tanggal Pesanan : <b><?= $invoice['tgl_pesan']; ?></b></li>
            <li class="list-group-item">Batas Bayar : <b><?= $invoice['batas_bayar']; ?></b></li>
          </ul>
        </div>
      <?php endwhile; ?>
      <a href="http://localhost/native_toko/invoice/invoice.php" class="btn btn-secondary mb-3">Back</a>
    </div>
  </div>
</main>
<?php include '../layouts/footer.php'; ?>