<?php include '../layouts/header.php'; ?>
<?php
if (isset($_POST['update'])) {
  $id_user = $_POST['id_admin'];
  $nama_lengkap = $_POST['nama_lengkap'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  // echo $newPassword = password_hash($password, PASSWORD_DEFAULT);

  if ($password == null) {
    $update = "UPDATE tb_user SET nama_lengkap='$nama_lengkap', username='$username' WHERE id_user='$id_user'";
    mysqli_query($conn, $update);
    $_SESSION['sukses'] = true;
    header('location: http://localhost/native_toko/setting/');
  } else {
    $newPassword = password_hash($password, PASSWORD_DEFAULT);
    $update = "UPDATE tb_user SET nama_lengkap='$nama_lengkap', username='$username', password='$newPassword' WHERE id_user='$id_user'";
    mysqli_query($conn, $update);
    $_SESSION['sukses'] = true;
    header('location: http://localhost/native_toko/setting/');
  }
}
?>
<main class="my-5">
  <div class="row">
    <div class="col-lg-6 border mx-3">
      <h2 class="my-3">Ubah Data Admin</h2>
      <hr>
      <?php
      $id = $_SESSION['id_admin'];
      $query = mysqli_query($conn, "SELECT * FROM tb_user WHERE id_user='$id'");
      while ($user = mysqli_fetch_assoc($query)) :
      ?>
        <form action="" method="POST">
          <input type="hidden" name="id_admin" value="<?= $user['id_user']; ?>">
          <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control" value="<?= $user['nama_lengkap']; ?>">
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= $user['username']; ?>">
          </div>
          <div class="form-group">
            <label for="password">New Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Isi Jika Ingin Mengganti password">
          </div>
          <button type="submit" class="btn btn-primary mb-3" name="update">Update</button>
        </form>
      <?php endwhile; ?>
    </div>
  </div>
</main>
<?php
if (isset($_SESSION['sukses'])) {
  $_SESSION['sukses'] = null;
  echo "<script>alert('Update Berhasil')</script>";
}
?>
<?php include '../layouts/footer.php'; ?>