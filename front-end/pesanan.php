<?php
include 'layouts/header.php';
?>
<main class="mt-3">
  <div class="row">
    <div class="col-md-10 border my-3 mx-3 rounded">
      <h2>Pesanan</h2>
      <hr>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Barang</th>
            <th>Harga</th>
            <th>Pembayaran</th>
            <th>Tanggal Pesan</th>
            <th>Batas Bayar</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $id_user = $_SESSION['id_user'];
          $no = 1;
          $queryJoin =  "SELECT * FROM tb_pesanan INNER JOIN tb_barang ON tb_pesanan.id_barang=tb_barang.id_barang INNER JOIN tb_invoice ON tb_pesanan.id_invoice=tb_invoice.id_invoice INNER JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user WHERE tb_pesanan.id_user='$id_user'";
          $query = mysqli_query($conn, $queryJoin);
          while ($pesanan_user = mysqli_fetch_assoc($query)) :
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $pesanan_user['nama']; ?></td>
              <td><?= $pesanan_user['nama_barang']; ?></td>
              <td>Rp. <?= number_format($pesanan_user['harga'], 0, ',', '.'); ?></td>
              <td><?= $pesanan_user['bank']; ?></td>
              <td><?= $pesanan_user['tgl_pesan']; ?></td>
              <td><?= $pesanan_user['batas_bayar']; ?></td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include 'layouts/footer.php'; ?>