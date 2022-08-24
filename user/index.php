<?php include '../layouts/header.php'; ?>
<main class="my-5">
  <div class="row">
    <div class="col-md-8 border mx-3">
      <h2 class="my-3">Data User</h2>
      <hr>
      <table class="table">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE role='user'");
          while ($data = mysqli_fetch_assoc($query)) :
          ?>
            <tr>
              <th><?= $no++; ?></th>
              <th><?= $data['nama_lengkap']; ?></th>
              <th><?= $data['username']; ?></th>
            </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</main>
<?php include '../layouts/footer.php'; ?>