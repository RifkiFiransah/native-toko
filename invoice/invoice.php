<?php include '../layouts/header.php'; ?>
<main class="my-5">
  <div class="row">
    <div class="col-lg-10 border mx-3">
      <h2 class="my-3">Data Invoice</h2>
      <hr>
      <a href="print.php" target="_blank" rel="noopener noreferrer" class="btn btn-secondary mb-3"><i class="fas fa-print"></i> Print</a>

      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Barang</th>
            <th>Alamat</th>
            <th>Tanggal Pesan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $queryJoin = "SELECT * FROM tb_pesanan INNER JOIN tb_barang ON tb_pesanan.id_barang=tb_barang.id_barang INNER JOIN tb_invoice ON tb_pesanan.id_invoice=tb_invoice.id_invoice INNER JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user";
          $query = mysqli_query($conn, $queryJoin);
          while ($invoice = mysqli_fetch_assoc($query)) :
          ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $invoice['nama']; ?></td>
              <td><?= $invoice['telp']; ?></td>
              <td><?= $invoice['nama_barang']; ?></td>
              <td><?= $invoice['alamat']; ?></td>
              <td><?= $invoice['tgl_pesan']; ?></td>
              <td>
                <a href="detail.php?id=<?= $invoice['id']; ?>" class="btn btn-primary"><i class="fas fa-search-plus"></i></a>
              </td>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include '../layouts/footer.php'; ?>