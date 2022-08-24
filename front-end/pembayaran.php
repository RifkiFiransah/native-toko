<?php include 'layouts/header.php'; ?>
<?php
if (isset($_POST['selesai'])) {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];
  $bank = $_POST['bank'];
  $kurir = $_POST['kurir'];
  $tgl_pesan = date("Y-m-d H:i:s");
  $batas_bayar = date("Y-m-d H:i:s", strtotime("+1 days"));

  mysqli_query($conn, "INSERT INTO tb_invoice VALUES('', '$nama', '$telp', '$alamat', '$bank', '$kurir', '$tgl_pesan', '$batas_bayar')");

  $queryInvoice = mysqli_query($conn, "SELECT * FROM tb_invoice ORDER BY id_invoice DESC LIMIT 1");
  while ($invoice = mysqli_fetch_assoc($queryInvoice)) {
    $invoice_id = (int) $invoice['id_invoice'];
    // var_dump($invoice_id);
  }
  $id_barang = (int) $_GET['id'];
  $id_user = (int) $_SESSION['id_user'];
  $keterangan = 'Proses';

  $berhasil = mysqli_query($conn, "INSERT INTO tb_pesanan VALUES('', '$id_barang', '$invoice_id', '$id_user', '$keterangan')");
  if ($berhasil) {
    $_SESSION['sukses'] = true;
    header("location: detail.php?id=$id_barang");
  }
}
?>
<main class="my-3">
  <div class="row">
    <div class="col-lg-6">
      <h2>Pembayaran</h2>
      <hr>
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="alamat">Alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="telp">No Telp</label>
          <input type="number" name="telp" id="telp" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="bank">Metode Pembayaran</label>
          <select name="bank" id="bank" class="form-control">
            <option value="BRI">BRI</option>
            <option value="Mandiri">Mandiri</option>
            <option value="Alfamart">Alfamart</option>
            <option value="Indomart">Indomart</option>
            <option value="COD">COD</option>
          </select>
        </div>
        <div class="form-group">
          <label for="kurir">Kurir</label>
          <select name="kurir" id="kurir" class="form-control">
            <option value="Jnt">Jnt</option>
            <option value="Jne">Jne</option>
            <option value="Si Cepat">Si Cepat</option>
            <option value="Ninja Express">Ninja Express</option>
          </select>
        </div>
        <div class="modal-footer">
          <a href="detail.php?id=<?= $_GET['id']; ?>" class="btn btn-secondary">Close</a>
          <button type="submit" class="btn btn-primary" name="selesai">Selesai</button>
        </div>
      </form>
    </div>
  </div>
</main>
<?php include 'layouts/footer.php'; ?>