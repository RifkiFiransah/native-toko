<?php
require_once '../vendor/autoload.php';
require '../koneksi.php';
$no = 1;
$queryJoin = "SELECT * FROM tb_pesanan INNER JOIN tb_barang ON tb_pesanan.id_barang=tb_barang.id_barang INNER JOIN tb_invoice ON tb_pesanan.id_invoice=tb_invoice.id_invoice INNER JOIN tb_user ON tb_pesanan.id_user=tb_user.id_user";
$query = mysqli_query($conn, $queryJoin);

$html = '<!DOCTYPE html>
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
        <h2 class="my-3 text-center">Print Data Invoice</h2>
        <hr>
        <table class="table" border="2" cellpadding="0" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>No Telp</th>
              <th>Barang</th>
              <th>Alamat</th>
              <th>Tanggal Pesan</th>
            </tr>
          </thead>
          <tbody>';
while ($invoice = mysqli_fetch_assoc($query)) {
  $html .= '<tr>
              <td>' . $no++ . '</td>
              <td>' . $invoice['nama'] . '</td>
              <td>' . $invoice['telp'] . '</td>
              <td>' . $invoice['nama_barang'] . '</td>
              <td>' . $invoice['alamat'] . '</td>
              <td>' . $invoice['tgl_pesan'] . '</td>
            </tr>';
}

$html .= '</tbody>
</table>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>';

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4');
$dompdf->render();
$dompdf->stream('DataInvoice.pdf', ['Attachment' => false]);
